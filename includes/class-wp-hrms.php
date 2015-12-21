<?php 

class WP_HRMS {
    
    private $post_types = array();
    private $version;

    public function __construct( $employees ) {
        $employees->initialize();
    }

    public function initialize() {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scrtips' ) );
        add_action( 'admin_menu', array( $this, 'wp_hrms_admin_menu' ) );
        add_action( 'parent_file', array( $this, 'recipe_tax_menu_correction' ) );

        $this->post_types = array( 'wp_hrms_employees' );
        $this->version = '1.0.0';
    }

    public function enqueue_styles() {
        $screen = get_current_screen();
        if ( ! in_array( $screen->post_type, $this->post_types ) ) {
            return;
        }

        wp_enqueue_style(
            'wp-hrms-admin',
            plugins_url( 'assets/css/admin.css', dirname( __FILE__ ) ),
            array(),
            $this->version
        );
    }

    public function enqueue_scrtips() {
        $screen = get_current_screen();
        if ( ! in_array( $screen->post_type, $this->post_types ) ) {
            return;
        }

        // Load media files needed for Uploader
        wp_enqueue_media();

        wp_enqueue_script(
            'wp-hrms-admin',
            plugins_url( 'assets/js/admin.js', dirname( __FILE__ ) ),
            array( 'jquery' ),
            $this->version
        );
    }

    public function wp_hrms_admin_menu() {
        add_menu_page( 'WP HRMS', 'WP HRMS', 'manage_options', 'wp-hrms', '', 'dashicons-universal-access-alt' );
        add_submenu_page( 'wp-hrms', 'Departments', 'Departments', 'manage_options', 'edit-tags.php?taxonomy=departments');
    }

    // highlight the proper top level menu
    public function recipe_tax_menu_correction( $parent_file ) {
        $screen = get_current_screen();
        if ( $screen->taxonomy == 'departments' ) {
            $parent_file = 'wp-hrms';
        }

        return $parent_file;
    }
}