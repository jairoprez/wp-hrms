<?php 

/**
 * The primary class for the plugin.
 *
 * Loads and enqueues dependencies for the plugin.
 *
 * @since      1.0.0
 * @package    WP_HRMS
 * @author     Jairo Pérez
 */
class WP_HRMS {

    /**
     * The list of available post types.
     *
     * @var       array
     */
    private $post_types = array();

    /**
     * Initializes the properties of the class.
     *
     * @return    void
     */
    public function __construct( $employee ) {
        $employee->initialize();
    }

    /**
     * Initializes this plugin to function.
     *
     * @return    void
     */
    public function initialize() {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scrtips' ) );
        add_action( 'admin_menu', array( $this, 'wp_hrms_admin_menu' ) );
        add_action( 'parent_file', array( $this, 'recipe_tax_menu_correction' ) );
        add_action( 'plugins_loaded', array( $this, 'wp_hrms_load_textdomain' ) );

        $this->post_types = array( 'wp_hrms_employee' );
    }

    /**
     * Enqueues the styles.
     *
     * @return    void
     */
    public function enqueue_styles() {
        global $wp_scripts;

        $screen = get_current_screen();
        if ( ! in_array( $screen->post_type, $this->post_types ) ) {
            return;
        }

        $jquery_version = isset( $wp_scripts->registered['jquery-ui-core']->ver ) ? $wp_scripts->registered['jquery-ui-core']->ver : '1.9.2';

        wp_enqueue_style( 
            'jquery-ui-style', 
            '//code.jquery.com/ui/' . $jquery_version . '/themes/smoothness/jquery-ui.css', 
            array(), 
            $jquery_version 
        );

        wp_enqueue_style(
            'wp-hrms-admin',
            WP_HRMS_PLUGIN_URL . '/assets/css/admin.css',
            array(),
            WP_HRMS_VERSION
        );
    }

    /**
     * Enqueues the scripts.
     *
     * @return    void
     */
    public function enqueue_scrtips() {
        $screen = get_current_screen();
        if ( ! in_array( $screen->post_type, $this->post_types ) ) {
            return;
        }

        // Load media files needed for Uploader
        wp_enqueue_media();

        wp_enqueue_script(
            'wp-hrms-admin',
            WP_HRMS_PLUGIN_URL . '/assets/js/admin.js',
            array( 'jquery', 'jquery-ui-datepicker' ),
            WP_HRMS_VERSION
        );
    }

    /**
     * Creates a new top level menu section in the admin menu 
     * sidebar for this plugin.
     *
     * @return    void
     */
    public function wp_hrms_admin_menu() {
        add_menu_page( 'WP HRMS', 'WP HRMS', 'manage_options', 'wp-hrms', '', 'dashicons-universal-access-alt' );
        add_submenu_page( 'wp-hrms', __( 'Departments', 'wp-hrms' ), __( 'Departments', 'wp-hrms' ), 'manage_options', 'edit-tags.php?taxonomy=department');
    }

    /**
     * Allows this plugin move sub-menu items around.
     *
     * @param     string $parent_file The parent file.
     * 
     * @return    string A single string containing parent file.
     */
    public function recipe_tax_menu_correction( $parent_file ) {
        $screen = get_current_screen();
        if ( $screen->taxonomy == 'department' ) {
            $parent_file = 'wp-hrms';
        }

        return $parent_file;
    }

    /**
     * Load plugin textdomain.
     *
     * @return void
     */
    public function wp_hrms_load_textdomain() {
        load_plugin_textdomain( 'wp-hrms', false, plugin_basename( WP_HRMS_PLUGIN_DIR ) . '/languages' ); 
    }
}