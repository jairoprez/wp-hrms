<?php

/**
 * Employee Data Display
 *
 * Allows the management of the WP HRMS employee data display
 * in the front-end.
 *
 * @since      1.0.0
 * @package    WP_HRMS
 * @author     Jairo Pérez
 */
class WP_HRMS_Employee_Data_Display {

    /**
     * Represents the current version of this plugin.
     *
     * @var       string
     */
    private $version;

    /**
     * Initializes properties, actions and filters of the class.
     *
     * @return    void
     */
    public function initialize() {
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
        add_shortcode( 'show_employee_info', array( $this, 'show_employee_info' ) );
        add_action( 'init', array( $this, 'employee_taxonomies' ) );

        $this->version = '1.0.0';
    }

    public function show_employee_info( $atts ) {
        if ( is_user_logged_in() ) {
            $user = wp_get_current_user();

            $args = array(
                'post_type' => 'wp_hrms_employee',
                'meta_key' => 'email',
                'meta_value' => $user->user_login,
                'meta_compare' => '='
            );
            $query = new WP_Query( $args );

            if ( isset( $query->post->ID ) ) {
                $employee = get_post_meta( $query->post->ID );
                $departments = get_departments( $query->post->ID );

                ob_start();
                require_once( plugin_dir_path( dirname( __FILE__ ) ) . 'views/public/employee-info.php' );
                return ob_get_clean();  
            } else {
                return '<p>There is no information available for this user yet.</p>';
            }
        } else {
            return '<p>You need to be signed in to manage your profile. <a href="' . apply_filters( "job_manager_job_dashboard_login_url", wp_login_url( get_permalink() ) ) . '">Log in</a></p>';
        }
    }

    /**
     * Registers employee taxonomies.
     *
     * @return    void
     */
    public function employee_taxonomies() {
        $taxonomies = array();

        $taxonomies['department'] = array(
            'hierarchical' => true,
            'query_var' => 'employee_department',
            'rewrite' => array(
                'slug' => 'employees/department'
            )
        );

        foreach ( $taxonomies as $name => $arr ) {
            register_taxonomy( $name, array( 'wp_hrms_employee' ), $arr );
        }
    }

    /**
     * Enqueues the styles.
     *
     * @return    void
     */
    public function enqueue_styles() {
        wp_enqueue_style(
            'wp-hrms-bootstrap',
            plugins_url( 'assets/css/bootstrap.min.css', dirname( __FILE__ ) ),
            array(),
            $this->version
        );

        wp_enqueue_style(
            'wp-hrms',
            plugins_url( 'assets/css/public.css', dirname( __FILE__ ) ),
            array(),
            $this->version
        );

        wp_enqueue_style(
            'wp-hrms-font-awesome',
            plugins_url( 'assets/css/font-awesome.min.css', dirname( __FILE__ ) ),
            array(),
            $this->version
        );
    }
}