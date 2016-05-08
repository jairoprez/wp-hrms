<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation function and defines a function that starts the plugin.
 *
 * @since             1.0.0
 * @package           WP_HRMS
 * 
 * @wordpress-plugin
 * Plugin Name: WP HRMS
 * Plugin URI: http://perezlabs.com
 * Description: Human Resource Management System for WordPress
 * Version: 1.0.1
 * Author: Perez Labs
 * Author URI: http://perezlabs.com
 * Text Domain: wp-hrms
 * Domain Path: /languages
 * License: GNU General Public License version 3.0
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Define constants
 */
define( 'WP_HRMS_VERSION', '1.0.1' );
define( 'WP_HRMS_PLUGIN_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'WP_HRMS_PLUGIN_URL', untrailingslashit( plugins_url( basename( plugin_dir_path( __FILE__ ) ), basename( __FILE__ ) ) ) );

/**
 * Helper functions definitions.
 */
require_once WP_HRMS_PLUGIN_DIR . '/includes/wp-hrms-core-helper.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-hrms-activator.php
 */
require_once WP_HRMS_PLUGIN_DIR . '/includes/class-wp-hrms-activator.php';
register_activation_hook( __FILE__, array( 'WP_HRMS_Activator', 'activate' ) );

/**
 * Include required core files used in admin and on the frontend.
 */
require_once WP_HRMS_PLUGIN_DIR . '/includes/class-wp-hrms-employee-post-type.php'; // Registers employee post type
require_once WP_HRMS_PLUGIN_DIR . '/includes/class-wp-hrms-employee-data-display.php'; // Displays employee info in the front-end

/**
 * The primary class for the plugin.
 */
require_once WP_HRMS_PLUGIN_DIR . '/includes/class-wp-hrms.php';

/**
 * Instantiates the main class and initializes the plugin.
 */
function wp_hrms_start() {
    if ( is_admin() ) {
        $wp_hrms_employee = new WP_HRMS_Employee_Post_Type();
        $wp_hrms = new WP_HRMS( $wp_hrms_employee );
    } else {
        $wp_hrms = new WP_HRMS_Employee_Data_Display();
    }

    $wp_hrms->initialize();
}
wp_hrms_start();