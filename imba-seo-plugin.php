<?php
/*
Plugin Name: Imba Admin Central
Description: A plugin that let our customer to have a hub and always reach us.
Version: 1.5
Author: Mikael
Author URI: https://imbaseo.se
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Define the plugin slug and current version
define('IMBA_SEO_PLUGIN_VERSION', '1.5');  // Current plugin version
define('IMBA_SEO_PLUGIN_SLUG', 'ImbaAdminCentral/imba-seo-plugin.php');  // Plugin slug (plugin-folder/plugin-file.php)

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
                'description' => '<p>A plugin that let our customer to have a hub and always reach us.</p>',
                'changelog' => '<h4>Version ' . $version_data['version'] . '</h4><ul>
                                    <li>Added some links in the SEO section tab.</li>
                                    <li>Added some links in the Google Ads tab.</li>
                                </ul>',
                'installation' => '<p>To install this plugin, simply click on the button down in the right corner of this popup.</p>'
            );
            $response->banners = array(); // Optionally, you can add banners or other info here

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
        'Imba SEO',              // Page title
        'Imba',                  // Menu title
        'manage_options',        // Capability
        'imba-seo-plugin',       // Menu slug
        'imba_seo_admin_page',   // Function to display the page
        'dashicons-analytics',   // Icon
        3                        // Position in menu
    );

    // Submenus
    add_submenu_page(
        'imba-seo-plugin',
        'SEO Services',
        'SEO',
        'manage_options',
        'imba-seo-plugin-seo',
        'imba_seo_admin_page'
    );

    add_submenu_page(
        'imba-seo-plugin',
        'Google Ads',
        'Google Ads',
        'manage_options',
        'imba-seo-plugin-googleads',
        'imba_seo_admin_page'
    );

    add_submenu_page(
        'imba-seo-plugin',
        'Social Media',
        'Social Media',
        'manage_options',
        'imba-seo-plugin-socialmedia',
        'imba_seo_admin_page'
    );

    add_submenu_page(
        'imba-seo-plugin',
        'Web Development',
        'Web Development',
        'manage_options',
        'imba-seo-plugin-webdev',
        'imba_seo_admin_page'
    );
}
add_action('admin_menu', 'imba_seo_menu');
