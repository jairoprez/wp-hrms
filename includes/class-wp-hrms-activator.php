<?php

class WP_HRMS_Activator {
    
    public static function activate() {
        self::create_roles();
    }

    private static function create_roles() {
        add_role( 'wp_hrms_employee', 'HRMS Employee', array( 'read' => true ) );
    }
}