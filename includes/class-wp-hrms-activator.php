<?php

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the 
 * plugin's activation.
 *
 * @since      1.0.0
 * @package    WP_HRMS/includes
 * @author     Jairo Pérez
 */
class WP_HRMS_Activator {
    
    /**
     * Called on plugin activation.
     *
     * @return    void
     */
    public static function activate() {
        self::create_roles();
    }

    /**
     * Init user roles.
     *
     * @return    void
     */
    private static function create_roles() {
        add_role( 'wp_hrms_employee', 'HRMS Employee', array( 'read' => true ) );
    }
}