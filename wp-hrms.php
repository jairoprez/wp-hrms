<?php

/**
 * Plugin Name: WP HRMS
 * Plugin URI: http://perezlabs.com
 * Description: Human Resource Management System for WordPress
 * Version: 0.1.0
 * Author: Perez Labs
 * Author URI: http://perezlabs.com
 * License: GNU General Public License version 3.0
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

require_once( plugin_dir_path( __FILE__ ) . 'includes/class-wp-hrms-employees-post-type.php' );
require_once( plugin_dir_path( __FILE__ ) . 'includes/class-wp-hrms.php' );

function wp_hrms_start() {
    if ( is_admin() ) {
        $wp_hrms_employees = new WP_HRMS_Employees_Post_Type();
        $wp_hrms = new WP_HRMS( $wp_hrms_employees );
        $wp_hrms->initialize();
    } else {

    }
}
wp_hrms_start();