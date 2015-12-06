<?php

class WP_HRMS_Employees_Post_Type {

    public function initialize() {
        add_action( 'init', array( $this, 'employees_post_type' ) );
        add_action( 'add_meta_boxes', array( $this, 'employees_metaboxes' ) );
        add_action( 'save_post', array( $this, 'save_employee' ) );
    }

    public function employees_post_type() {
        $args = array(
            'labels' => array(
                'name' => 'Employees',
                'singular_name' => 'Employee',
                'add_new' => 'Add New Employee',
                'add_new_item' => 'Add New Employee',
                'edit_item' => 'Edit Item',
                'new_item' => 'Add New Item',
                'view_item' => 'View Employee',
                'search_items' => 'Search Employees',
                'not_found' => 'No Employees Found',
                'not_found_in_trash' => 'No Employees Found in Trash'
            ),
            'query_var' => 'employees',
            'rewrite' => array(
                'slug' => 'employees/'
            ),
            'public' => true,
            'show_in_menu' => 'wp-hrms',
            'supports' => false
        );
        
        register_post_type( 'wp_hrms_employees', $args );
    }

    public function employees_metaboxes() {
        add_meta_box( 'employee_meta_box', 'Personal Details', array( $this, 'employee_personal_details' ), 'wp_hrms_employees' );
        add_meta_box( 'employee_meta_box_2', 'Company Details', array( $this, 'employee_company_details' ), 'wp_hrms_employees' );
        add_meta_box( 'employee_meta_box_3', 'Bank Details', array( $this, 'employee_bank_details' ), 'wp_hrms_employees' );
        add_meta_box( 'employee_meta_box_4', 'Documents', array( $this, 'employee_documents' ), 'wp_hrms_employees' );
    }

    public function employee_personal_details( $post ) {
        require_once( plugin_dir_path( dirname( __FILE__ ) ) . 'views/admin/employees-personal-details-form.php' );
    }

    public function employee_company_details( $post ) {
        require_once( plugin_dir_path( dirname( __FILE__ ) ) . 'views/admin/employees-company-details-form.php' );
    }

    public function employee_bank_details( $post ) {
        require_once( plugin_dir_path( dirname( __FILE__ ) ) . 'views/admin/employees-bank-details-form.php' );
    }

    public function employee_documents( $post ) {
        require_once( plugin_dir_path( dirname( __FILE__ ) ) . 'views/admin/employees-documents-form.php' );
    }

    public function save_employee( $employee_id ) {
        if ( ! $this->user_can_save ( $employee_id ) ) {
            return;
        }

        $data = array();

        // Employee personal details
        $data['name'] = stripslashes( strip_tags( $_POST['name'] ) );
        $data['father_name'] = stripslashes( strip_tags( $_POST['father_name'] ) );
        $data['date_of_birth'] = stripslashes( strip_tags( $_POST['date_of_birth'] ) );
        $data['gender'] = stripslashes( strip_tags( $_POST['gender'] ) );
        $data['phone'] = stripslashes( strip_tags( $_POST['phone'] ) );
        $data['local_address'] = stripslashes( strip_tags( $_POST['local_address'] ) );
        $data['permanent_address'] = stripslashes( strip_tags( $_POST['permanent_address'] ) );
        $data['image'] = stripslashes( strip_tags( $_POST['image'] ) );
        
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

        // Save each custom field
        foreach ( $data as $key => $value ) {
            update_post_meta( $employee_id, $key, $value );
        }
        
    }

    public function user_can_save( $employee_id ) {
        $is_valid_nonce = ( isset( $_POST['employee-nonce'] ) ) && wp_verify_nonce( $_POST['employee-nonce'], 'employee-save' );
        $is_autosave = wp_is_post_autosave( $employee_id );
        $is_revision = wp_is_post_revision( $employee_id );

        return ! ( $is_autosave || $is_revision ) && $is_valid_nonce;
    }
}