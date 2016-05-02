<div class="profile container-fluid content">
    <div class="row">
        <!--Left Sidebar-->
        <div class="col-md-12 md-margin-bottom-40">
            <img alt="ProfileImage" class="profile-image rounded-x img-responsive margin-bottom-20" src="<?php echo ( $employee['image'][0] ) ? $employee['image'][0] : WP_HRMS_PLUGIN_URL . '/assets/images/no-profile-img.gif'; ?>">

            <h3 style="text-align: center"><?php echo $employee['name'][0]; ?> <?php echo $employee['father_name'][0]; ?></h3>
            <h6 style="text-align: center"><?php echo ( $employee['designation'][0] ) ? ucwords( $employee['designation'][0] ): ''; ?></h6>
            <h6 style="text-align: center;background: rgb(235, 235, 235);padding: 10px;"><strong><?php _e( 'At work for', 'wp-hrms' ); ?> : </strong><?php echo ( $employee['date_of_joining'][0] ) ? calculate_age( $employee['date_of_joining'][0] ) : ''; ?></h6>
        </div>
        <!--End Left Sidebar-->
        <div class="col-md-12">
            <!--Profile Body-->
            <div class="profile-body">
                <div class="row margin-bottom-20">
                    <!--Profile Post-->
                    <div class="col-sm-12">
                        <div class="panel panel-profile no-bg">
                            <div class="panel-heading overflow-h">
                                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-user"></i><?php _e( 'Personal Details', 'wp-hrms' ); ?></h2>
                            </div>
                            <div class="panel-body panelHolder">
                                <table class="table table-light margin-bottom-0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span class="primary-link"><?php _e( 'Name', 'wp-hrms' ); ?></span>
                                            </td>
                                            <td>
                                                <?php echo $employee['name'][0]; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link"><?php _e( "Father's Name", 'wp-hrms' ); ?></span>
                                            </td>
                                            <td>
                                                <?php echo $employee['father_name'][0]; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link"><?php _e( 'Gender', 'wp-hrms' ); ?></span>
                                            </td>
                                            <td>
                                                <?php echo $employee['gender'][0]; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link"><?php _e( 'Email', 'wp-hrms' ); ?></span>
                                            </td>
                                            <td>
                                                <?php echo $employee['email'][0]; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link"><?php _e( 'Phone', 'wp-hrms' ); ?></span>
                                            </td>
                                            <td>
                                                <?php echo $employee['phone'][0]; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link"><?php _e( 'Address', 'wp-hrms' ); ?></span>
                                            </td>
                                            <td>
                                                <?php echo $employee['address'][0]; ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="panel panel-profile no-bg margin-top-20">
                            <div class="panel-heading overflow-h">
                                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-briefcase"></i><?php _e( 'Company Details', 'wp-hrms' ); ?></h2>
                            </div>
                            <div class="panel-body panelHolder">
                                <table class="table table-light margin-bottom-0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span class="primary-link"><?php _e( 'Employee ID', 'wp-hrms' ); ?></span>
                                            </td>
                                            <td>
                                                <?php echo $employee['employee_id'][0]; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link"><?php _e( 'Department', 'wp-hrms' ); ?></span>
                                            </td>
                                            <td>
                                                <?php echo $departments; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link"><?php _e( 'Designation', 'wp-hrms' ); ?></span>
                                            </td>
                                            <td>
                                                <?php echo $employee['designation'][0]; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link"><?php _e( 'Date of Joining', 'wp-hrms' ); ?></span>
                                            </td>
                                            <td>
                                                <?php echo $employee['date_of_joining'][0]; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link"><?php _e( 'Salary', 'wp-hrms' ); ?> ( <i class="fa fa-usd"></i> )</span>
                                            </td>
                                            <td>
                                                <?php echo $employee['basic_salary'][0]; ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="panel panel-profile no-bg margin-top-20">
                            <div class="panel-heading overflow-h">
                                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-bank"></i><?php _e( 'Bank Details', 'wp-hrms' ); ?></h2>
                            </div>
                            <div class="panel-body panelHolder">
                                <table class="table table-light margin-bottom-0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span class="primary-link"><?php _e( 'Account Holder Name', 'wp-hrms' ); ?></span>
                                            </td>
                                            <td>
                                                <?php echo $employee['account_holder_name'][0]; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link"><?php _e( 'Account Number', 'wp-hrms' ); ?></span>
                                            </td>
                                            <td>
                                                <?php echo $employee['account_number'][0]; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link"><?php _e( 'Bank Name', 'wp-hrms' ); ?></span>
                                            </td>
                                            <td>
                                                <?php echo $employee['bank_name'][0]; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link"><?php _e( 'PAN Number', 'wp-hrms' ); ?></span>
                                            </td>
                                            <td>
                                                <?php echo $employee['pan_number'][0]; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link"><?php _e( 'IFSC Code', 'wp-hrms' ); ?></span>
                                            </td>
                                            <td>
                                                <?php echo $employee['ifsc_code'][0]; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link"><?php _e( 'Branch', 'wp-hrms' ); ?></span>
                                            </td>
                                            <td>
                                                <?php echo $employee['branch'][0]; ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--End Profile Post-->
                </div>      
            </div>
        </div>
    </div>
</div>