<?php

/**
 * Employee Post Type
 *
 * Allows the management of the WP HRMS employee post type.
 *
 * @since      1.0.0
 * @package    WP_HRMS
 * @author     Jairo Pérez
 */
class WP_HRMS_Employee_Post_Type {

    /**
     * Initializes properties, actions and filters of the class.
     *
     * @return    void
     */
    public function initialize() {
        add_action( 'init', array( $this, 'employee_post_type' ) );
        add_action( 'add_meta_boxes', array( $this, 'employee_metaboxes' ) );
        add_action( 'save_post', array( $this, 'save_employee' ) );
        add_action( 'init', array( $this, 'employee_taxonomies' ) );
        add_filter( 'manage_wp_hrms_employee_posts_columns', array( $this, 'set_employee_columns' ) );
        add_action( 'manage_wp_hrms_employee_posts_custom_column', array( $this, 'custom_employee_columns' ), 10, 2 );
        add_filter( 'post_row_actions', array( $this, 'remove_row_actions' ) );
        add_filter( 'manage_edit-wp_hrms_employee_sortable_columns', array( $this, 'sortable_columns' ) );
        add_filter( 'request', array( $this, 'sort_columns' ) );
        add_filter( 'pre_get_posts', array( $this, 'custom_search_query' ) );
    }

    /**
     * Creates or modifies the employee post type.
     *
     * @return    void
     */
    public function employee_post_type() {
        $args = array(
            'labels' => array(
                'name' => __( 'Employees', 'wp-hrms' ),
                'singular_name' => __( 'Employee', 'wp-hrms' ),
                'add_new' => __( 'Add New Employee', 'wp-hrms' ),
                'add_new_item' => __( 'Add New Employee', 'wp-hrms' ),
                'edit_item' => __( 'Edit Item', 'wp-hrms' ),
                'new_item' => __( 'Add New Item', 'wp-hrms' ),
                'view_item' => __( 'View Employee', 'wp-hrms' ),
                'search_items' => __( 'Search Employees', 'wp-hrms' ),
                'not_found' => __( 'No Employees Found', 'wp-hrms' ),
                'not_found_in_trash' => __( 'No Employees Found in Trash', 'wp-hrms' )
            ),
            'query_var' => 'employees',
            'rewrite' => array(
                'slug' => 'employees/'
            ),
            'public' => true,
            'show_in_menu' => 'wp-hrms',
            'supports' => false
        );
        
        register_post_type( 'wp_hrms_employee', $args );
    }

    /**
     * Registers employee metaboxes.
     *
     * @return    void
     */
    public function employee_metaboxes() {
        add_meta_box( 'employee_meta_box', 'Personal Details', array( $this, 'employee_personal_details' ), 'wp_hrms_employee' );
        add_meta_box( 'employee_meta_box_2', 'Company Details', array( $this, 'employee_company_details' ), 'wp_hrms_employee' );
        add_meta_box( 'employee_meta_box_3', 'Bank Details', array( $this, 'employee_bank_details' ), 'wp_hrms_employee' );
        add_meta_box( 'employee_meta_box_4', 'Documents', array( $this, 'employee_documents' ), 'wp_hrms_employee' );
    }

    /**
     * Render employee personal details metabox content.
     *
     * @param     WP_Post $post The post object.
     *
     * @return    void
     */
    public function employee_personal_details( $post ) {
        require_once( WP_HRMS_PLUGIN_DIR . '/views/admin/employee-personal-details-form.php' );
    }

    /**
     * Render employee company details metabox content.
     *
     * @param     WP_Post $post The post object.
     *
     * @return    void
     */
    public function employee_company_details( $post ) {
        require_once( WP_HRMS_PLUGIN_DIR . '/views/admin/employee-company-details-form.php' );
    }

    /**
     * Render employee bank details metabox content.
     *
     * @param     WP_Post $post The post object.
     *
     * @return    void
     */
    public function employee_bank_details( $post ) {
        require_once( WP_HRMS_PLUGIN_DIR . '/views/admin/employee-bank-details-form.php' );
    }

    /**
     * Render employee documents metabox content.
     *
     * @param     WP_Post $post The post object.
     *
     * @return    void
     */
    public function employee_documents( $post ) {
        require_once( WP_HRMS_PLUGIN_DIR . '/views/admin/employee-documents-form.php' );
    }

    /**
     * Save the meta when the post is saved.
     *
     * @param     int $post_id The ID of the post being saved.
     *
     * @return    void
     */
    public function save_employee( $post_id ) {
        if ( ! $this->user_can_save ( $post_id ) ) {
            return;
        }

        $data = array();

        // Employee personal details
        $data['name'] = stripslashes( strip_tags( $_POST['name'] ) );
        $data['father_name'] = stripslashes( strip_tags( $_POST['father_name'] ) );
        $data['date_of_birth'] = stripslashes( strip_tags( $_POST['date_of_birth'] ) );
        $data['gender'] = stripslashes( strip_tags( $_POST['gender'] ) );
        $data['phone'] = stripslashes( strip_tags( $_POST['phone'] ) );
        $data['address'] = stripslashes( strip_tags( $_POST['address'] ) );
        $data['image'] = stripslashes( strip_tags( $_POST['image'] ) );
        $data['email'] = stripslashes( strip_tags( $_POST['email'] ) );

        // Employee company details
        $data['employee_id'] = stripslashes( strip_tags( $_POST['employee_id'] ) );
        $data['designation'] = stripslashes( strip_tags( $_POST['designation'] ) );
        $data['date_of_joining'] = stripslashes( strip_tags( $_POST['date_of_joining'] ) );
        $data['exit_date'] = stripslashes( strip_tags( $_POST['exit_date'] ) );
        $data['basic_salary'] = stripslashes( strip_tags( $_POST['basic_salary'] ) );

        // Employee bank details
        $data['account_holder_name'] = stripslashes( strip_tags( $_POST['account_holder_name'] ) );
        $data['account_number'] = stripslashes( strip_tags( $_POST['account_number'] ) );
        $data['bank_name'] = stripslashes( strip_tags( $_POST['bank_name'] ) );
        $data['ifsc_code'] = stripslashes( strip_tags( $_POST['ifsc_code'] ) );
        $data['bsb'] = stripslashes( strip_tags( $_POST['bsb'] ) );
        $data['pan_number'] = stripslashes( strip_tags( $_POST['pan_number'] ) );
        $data['branch'] = stripslashes( strip_tags( $_POST['branch'] ) );

        // Employee documents
        $data['resume'] = stripslashes( strip_tags( $_POST['resume'] ) );
        $data['offer_letter'] = stripslashes( strip_tags( $_POST['offer_letter'] ) );
        $data['joining_letter'] = stripslashes( strip_tags( $_POST['joining_letter'] ) );
        $data['contract_and_agreement'] = stripslashes( strip_tags( $_POST['contract_and_agreement'] ) );
        $data['id_proof'] = stripslashes( strip_tags( $_POST['id_proof'] ) );

        // Remove email data if empty
        if ( $data['email'] == '' ) {
            unset( $data['email'] );
        }

        // Account login
        if ( $data['email'] && username_exists( $data['email'] ) == null ) {
            // Generate the password and create the user
            $password = wp_generate_password( 12, false );
            $user_id = wp_create_user( $data['email'], $password, $data['email'] );

            // Set the name and last name
            wp_update_user(
                array(
                  'ID' => $user_id,
                  'first_name' => $data['name'],
                  'last_name' => $data['father_name'],
                  'nickname' => $data['email']
                )
            );
            
            // Set the role
            $user = new WP_User( $user_id );
            $user->set_role( 'wp_hrms_employee' );

            // Email the user
            // wp_mail( 
            //     $email_address, 
            //     'Welcome!', 
            //     'Your User: ' . $data['email'] . ' and Password ' . $password 
            // );
        }

        // Save each custom field
        foreach ( $data as $key => $value ) {
            update_post_meta( $post_id, $key, $value );
        }
        
    }

    /**
     * Verifies if the post came from the our screen and with proper authorization,
     * because save_post can be triggered at other times.
     *
     * @param     int $post_id The ID of the post being saved.
     *
     * @return    boolean True on successful validation, else false.
     */
    private function user_can_save( $post_id ) {
        $is_valid_nonce = ( isset( $_POST['employee-nonce'] ) ) && wp_verify_nonce( $_POST['employee-nonce'], 'employee-save' );
        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );

        return ! ( $is_autosave || $is_revision ) && $is_valid_nonce;
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
            ),
            'labels' => array(
                'name' => __( 'Departments', 'wp-hrms' ),
                'singular_name' => __( 'Department', 'wp-hrms' ),
                'edit_item' => __( 'Edit Department', 'wp-hrms' ),
                'update_item' => __( 'Update Department', 'wp-hrms' ),
                'add_new_item' => __( 'Add Department', 'wp-hrms' ),
                'all_items' => __( 'All Departments', 'wp-hrms' ),
                'search_items' => __( 'Search Departments', 'wp-hrms' ),
                'popular_items' => __( 'Popular Departments', 'wp-hrms' ),
                'separate_items_with_commas' => __( 'Separate departments with commas', 'wp-hrms' ),
                'add_or_remove_items' => __( 'Add or remove departments', 'wp-hrms' ),
                'choose_from_most_used' => __( 'Choose from most used departments', 'wp-hrms' )
            )
        );

        foreach ( $taxonomies as $name => $arr ) {
            register_taxonomy( $name, array( 'wp_hrms_employee' ), $arr );
        }
    }

    /**
     * Adds custom columns for the employee table list.
     *
     * @param     array $columns An array of column name => label.
     *
     * @return    array An array of column name => label.
     */
    public function set_employee_columns( $columns ) {
        $columns = array(
            'cb' => '<input type="checkbox" />',
            'employee_id' => __( 'Employee ID', 'wp-hrms' ),
            'name' => __( 'Name', 'wp-hrms' ),
            'image' => __( 'Image', 'wp-hrms' ),
            'gender' => __( 'Gender', 'wp-hrms' ),
            'department' => __( 'Department', 'wp-hrms' ),
            'designation' => __( 'Designation', 'wp-hrms' )
        );

        return $columns;
    }

    /**
     * Adds or removes (unset) custom columns to the list post/page/custom 
     * post type pages (which automatically appear in Screen Options).
     *
     * @param     string $column The name of the column to display.
     * @param     int $post_id The ID of the current post.
     *
     * @return    void
     */
    public function custom_employee_columns( $column, $post_id ) {
        switch ( $column ) {
            case 'employee_id':
                $employee_id = get_post_meta( $post_id, 'employee_id', true ); 
                if ( $employee_id ) {
                    echo '<strong><a href="' . admin_url( 'post.php?post=' . $post_id . '&action=edit' ) . '">' . $employee_id . '</a></strong>';
                } else {
                    echo '<strong><a href="' . admin_url( 'post.php?post=' . $post_id . '&action=edit' ) . '">' . __( 'Unknown', 'wp-hrms' ) . '</a></strong>';
                }
                break;

            case 'name':
                $full_name = get_post_meta( $post_id, 'name', true ) . ' ' . get_post_meta( $post_id, 'father_name', true );
                if ( $full_name ) {
                    echo ucwords( $full_name );
                }
                break;

            case 'image':
                $image = get_post_meta( $post_id, 'image', true );
                $image = ($image) ? $image : plugins_url( 'assets/images/no-profile-img.gif', dirname( __FILE__ ) );
                echo '<img class="employee-image" src="' . $image . '">';
                break;

            case 'gender':
                $gender = get_post_meta( $post_id, 'gender', true );
                if ( $gender ) {
                    echo ucfirst( $gender );
                }
                break;

            case 'department':
                $terms = get_the_terms( $post_id, 'department' );
                if ( $terms && ! is_wp_error( $terms ) ) {
                    $departments = array();
                    foreach ( $terms as $term ) {
                        $departments[] = $term->name;
                    }
           
                    echo join( ', ', $departments );
                }
                break;

            case 'designation':
                $designation = get_post_meta( $post_id, 'designation', true ); 
                if ( $designation ) {
                    echo ucwords( $designation );
                }
                break;
        }
    }

    /**
     * Filter the array of row action links on the employee list table.
     *
     * @param     array $actions An array of row action links.
     *
     * @return    array An array of row action links.
     */
    public function remove_row_actions( $actions ) {
        global $post;

        if( $post->post_type == 'wp_hrms_employee' ) {
            unset( $actions['inline hide-if-no-js'] );
            unset( $actions['view'] );
        }

        return $actions;
    }

    /**
     * Declare a column as sortable.
     *
     * @param     array $columns An array of column name => label.
     *
     * @return    array An array of column name => label.
     */
    public function sortable_columns( $columns ) {

        $columns['name'] = 'name';
        $columns['gender'] = 'gender';
        $columns['designation'] = 'designation';

        return $columns;
    }

    /**
     * Sorts the content of multiple columns.
     *
     * @param     array $vars An array with the query vars.
     *
     * @return    array An array with the query vars.
     */
    public function sort_columns( $vars ) {
        if ( isset( $vars['orderby'] ) ) {
            if ( $vars['orderby'] === 'name' ) {
                $vars = array_merge( $vars, array(
                    'meta_key'  => 'name',
                    'orderby'   => 'meta_value'
                ) );
            }

            if ( $vars['orderby'] === 'gender' ) {
                $vars = array_merge( $vars, array(
                    'meta_key'  => 'gender',
                    'orderby'   => 'meta_value'
                ) );
            }

            if ( $vars['orderby'] === 'designation' ) {
                $vars = array_merge( $vars, array(
                    'meta_key'  => 'designation',
                    'orderby'   => 'meta_value'
                ) );
            }
        }

        return $vars;
    }

    /**
     * Gives access to the $query object by reference.
     *
     * @param     object $query An object with the query reference.
     *
     * @return    void
     */
    public function custom_search_query( $query ) {
        // Put all the meta fields you want to search for here
        $custom_fields = array(
            'employee_id',
            'name',
            'father_name',
            'gender',
            'designation'
        );

        $searchterm = $query->query_vars['s'];

        // Remove the "s" parameter from the query, because it will prevent the posts from being found
        $query->query_vars['s'] = "";

        if ( $searchterm != '' ) {
            $meta_query = array('relation' => 'OR');
            foreach( $custom_fields as $cf ) {
                array_push( $meta_query, array(
                    'key' => $cf,
                    'value' => $searchterm,
                    'compare' => 'LIKE'
                ) );
            }
            $query->set( 'meta_query', $meta_query );
        };
    }
}