<?php
/*
Plugin Name: Imba SEO Plugin
Description: SEO plugin for managing SEO, Google Ads, and Web Development services.
Version: 1.0
Author: Imba SEO
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Define the remote version JSON file and plugin slug
define('IMBA_SEO_PLUGIN_VERSION', '1.0');  // Current plugin version
define('IMBA_SEO_PLUGIN_SLUG', 'ImbaAdminCentral');  // Plugin folder name

// Hook into the 'init' action to check for updates
add_action('init', 'imba_seo_check_for_updates');

function imba_seo_check_for_updates() {
    $remote_version_url = 'https://example.com/version.json';  // Remote version file

    // Fetch the remote version data
    $response = wp_remote_get($remote_version_url);

    if (is_wp_error($response)) {
        return;  // Exit if there's an error fetching the version file
    }

    // Parse the response body as JSON
    $version_data = json_decode(wp_remote_retrieve_body($response), true);

    if (!$version_data || empty($version_data['version'])) {
        return;  // Exit if version data is invalid
    }

    // Compare the remote version with the current version
    if (version_compare(IMBA_SEO_PLUGIN_VERSION, $version_data['version'], '<')) {
        // If a new version is available, proceed with the update
        add_action('admin_notices', 'imba_seo_update_notice');
        update_option('imba_seo_update_url', $version_data['url']);
    }
}

function imba_seo_update_notice() {
    $update_url = get_option('imba_seo_update_url');
    ?>
    <div class="notice notice-warning is-dismissible">
        <p>A new version of Imba SEO Plugin is available. <a href="<?php echo esc_url(admin_url('?action=imba_seo_update_plugin&update_url=' . urlencode($update_url))); ?>">Update now</a>.</p>
    </div>
    <?php
}

// Add a custom action to handle the plugin update
add_action('admin_init', 'imba_seo_update_plugin');

function imba_seo_update_plugin() {
    if (isset($_GET['action']) && $_GET['action'] == 'imba_seo_update_plugin') {
        if (isset($_GET['update_url'])) {
            $update_url = esc_url_raw($_GET['update_url']);
            imba_seo_perform_update($update_url);
        }
    }
}

function imba_seo_perform_update($url) {
    // Download the plugin ZIP file from the remote server
    $download_file = download_url($url);

    if (is_wp_error($download_file)) {
        wp_die('Failed to download the plugin update.');
    }

    // Unzip and replace the old plugin files
    $plugin_dir = WP_PLUGIN_DIR . '/' . IMBA_SEO_PLUGIN_SLUG;

    // Unzip the file and replace the plugin folder
    $result = unzip_file($download_file, $plugin_dir);

    if (is_wp_error($result)) {
        wp_die('Failed to unzip and update the plugin.');
    }

    // Delete the downloaded ZIP file
    unlink($download_file);

    // Display a success message
    wp_redirect(admin_url('plugins.php?updated=true'));
    exit;
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
