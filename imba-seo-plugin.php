<?php
/*
Plugin Name: Imba Admin Central
Description: A plugin that lets our customers have a hub and always reach us.
Version: 1.7
Author: Mikael
Author URI: https://imbaseo.se
Text Domain: imba-seo-plugin
Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Load plugin textdomain for translations
add_action('plugins_loaded', 'imba_seo_load_textdomain');

function imba_seo_load_textdomain() {
    load_plugin_textdomain('imba-seo-plugin', false, dirname(plugin_basename(__FILE__)) . '/languages');
}

// Define the plugin slug and current version
define('IMBA_SEO_PLUGIN_VERSION', '1.7');  // Current plugin version
define('IMBA_SEO_PLUGIN_SLUG', 'ImbaAdminCentral/imba-seo-plugin.php');  // Plugin slug

// Hook into the update system
add_filter('pre_set_site_transient_update_plugins', 'imba_seo_check_for_plugin_update');

function imba_seo_check_for_plugin_update($transient) {
    if (empty($transient->checked)) {
        return $transient;  // No plugins checked yet
    }

    // Remote version JSON file
    $remote_version_url = 'https://raw.githubusercontent.com/ImbaSEO2/ImbaAdminCentral/refs/heads/main/version.json';

    // Fetch the remote version data
    $response = wp_remote_get($remote_version_url);

    if (!is_wp_error($response)) {
        $version_data = json_decode(wp_remote_retrieve_body($response), true);

        // Check if the remote version is greater than the current version
        if (isset($version_data['version']) && version_compare(IMBA_SEO_PLUGIN_VERSION, $version_data['version'], '<')) {
            // Plugin data for the update
            $plugin_data = array(
                'slug'        => IMBA_SEO_PLUGIN_SLUG,
                'new_version' => $version_data['version'],
                'url'         => 'https://imbaseo.se', // Optional info page for your plugin
                'package'     => $version_data['url'],  // The URL to download the updated plugin ZIP file
            );

            // Add the plugin to the list of plugins that need updates
            $transient->response[IMBA_SEO_PLUGIN_SLUG] = (object) $plugin_data;
        }
    }

    return $transient;
}

// Hook into the plugins API to provide more details about the plugin update
add_filter('plugins_api', 'imba_seo_plugin_update_info', 10, 3);

function imba_seo_plugin_update_info($false, $action, $arg) {
    if (isset($arg->slug) && $arg->slug === IMBA_SEO_PLUGIN_SLUG) {
        // Remote version JSON file
        $remote_version_url = 'https://raw.githubusercontent.com/ImbaSEO2/ImbaAdminCentral/refs/heads/main/version.json';

        // Fetch the remote version data
        $response = wp_remote_get($remote_version_url);

        if (!is_wp_error($response)) {
            $version_data = json_decode(wp_remote_retrieve_body($response), true);

            // Build the response object with plugin details
            $response = new stdClass();
            $response->name = 'Imba SEO Plugin';
            $response->slug = IMBA_SEO_PLUGIN_SLUG;
            $response->version = $version_data['version'];
            $response->tested = '6.6.2'; // Last WordPress version you tested against
            $response->requires = '5.0'; // Minimum WordPress version required
            $response->author = '<a href="https://imbaseo.se">Imba SEO</a>';
            $response->homepage = 'https://imbaseo.se';
            $response->download_link = $version_data['url'];

            // Add sections such as Changelog, Description, and Installation Instructions
            $response->sections = array(
                'description' => '<p>A plugin that lets our customers have a hub and always reach us.</p>',
                'changelog' => '<h4>Version ' . $version_data['version'] . '</h4><ul>' .
                                '<li>Added some links in the SEO section tab.</li>' .
                                '<li>Added some links in the Google Ads tab.</li>' .
                                '</ul>',
                'installation' => '<p>To install this plugin, simply click on the button down in the right corner of this popup.</p>'
            );

            return $response;
        }
    }

    return $false;
}

// Include the admin page
require_once plugin_dir_path( __FILE__ ) . 'admin/admin-page.php';

// Include the floating section
require_once plugin_dir_path( __FILE__ ) . 'admin/floating-section.php';

// Register the admin menu and submenu pages
function imba_seo_menu() {
    add_menu_page(
        __('Imba SEO', 'imba-seo-plugin'),      // Translatable page title
        __('Imba', 'imba-seo-plugin'),          // Translatable menu title
        'manage_options', 
        'imba-seo-plugin', 
        'imba_seo_admin_page', 
        'dashicons-analytics', 
        3
    );

    // Submenu 1: External page - open in new tab
    add_submenu_page(
        'imba-seo-plugin',
        __('Check Imba SEO website', 'imba-seo-plugin'),   // Submenu title
        __('Check Imba SEO website', 'imba-seo-plugin'),   // Submenu label
        'manage_options',
        'seo-services-external',
        function() {}
    );

    // Submenu 2: External page - open in new tab
    add_submenu_page(
        'imba-seo-plugin',
        __('Check Web Imba website', 'imba-seo-plugin'),   // Submenu title
        __('Check Web Imba website', 'imba-seo-plugin'),   // Submenu label
        'manage_options',
        'googleads-services-external',
        function() {}
    );
}
add_action('admin_menu', 'imba_seo_menu');

// Add JavaScript to make links open in new tab and redirect to external URLs
add_action('admin_footer', 'imba_seo_external_links_js');
function imba_seo_external_links_js() {
    ?>
    <script type="text/javascript">
        // Only update the specific external links
        document.querySelectorAll('#toplevel_page_imba-seo-plugin ul.wp-submenu a').forEach(function(link) {
            if (link.href.includes('seo-services-external')) {
                link.href = 'https://imbaseo.se';
                link.setAttribute('target', '_blank');
            } else if (link.href.includes('googleads-services-external')) {
                link.href = 'https://hosting.imbaseo.se/';
                link.setAttribute('target', '_blank');
            }
        });
    </script>
    <?php
}
