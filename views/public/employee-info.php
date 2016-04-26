<div class="profile container-fluid content">
    <div class="row">
        <!--Left Sidebar-->
        <div class="col-md-12 md-margin-bottom-40">
            <img alt="ProfileImage" class="profile-image rounded-x img-responsive margin-bottom-20" src="<?php echo ( $employee['image'][0] ) ? $employee['image'][0] : plugins_url() . '/wp-hrms/assets/images/no-profile-img.gif'; ?>">

            <h3 style="text-align: center"><?php echo $employee['name'][0]; ?> <?php echo $employee['father_name'][0]; ?></h3>
            <h6 style="text-align: center"><?php echo ( $employee['designation'][0] ) ? ucwords( $employee['designation'][0] ): ''; ?></h6>
            <h6 style="text-align: center;background: rgb(235, 235, 235);padding: 10px;"><strong>At work for : </strong><?php echo ( $employee['date_of_joining'][0] ) ? calculate_age( $employee['date_of_joining'][0] ) : ''; ?></h6>
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
                                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-user"></i>Personal Details</h2>
                            </div>
                            <div class="panel-body panelHolder">
                                <table class="table table-light margin-bottom-0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span class="primary-link">Name</span>
                                            </td>
                                            <td>
                                                <?php echo $employee['name'][0]; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link">Father's Name</span>
                                            </td>
                                            <td>
                                                <?php echo $employee['father_name'][0]; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link">Gender</span>
                                            </td>
                                            <td>
                                                <?php echo $employee['gender'][0]; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link">Email</span>
                                            </td>
                                            <td>
                                                <?php echo $employee['email'][0]; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link">Phone</span>
                                            </td>
                                            <td>
                                                <?php echo $employee['phone'][0]; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link">Address</span>
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
                                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-briefcase"></i>Company Details</h2>
                            </div>
                            <div class="panel-body panelHolder">
                                <table class="table table-light margin-bottom-0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span class="primary-link">Employee ID</span>
                                            </td>
                                            <td>
                                                <?php echo $employee['employee_id'][0]; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link">Department</span>
                                            </td>
                                            <td>
                                                <?php echo $departments; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link">Designation</span>
                                            </td>
                                            <td>
                                                <?php echo $employee['designation'][0]; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link">Date of Joining</span>
                                            </td>
                                            <td>
                                                <?php echo $employee['date_of_joining'][0]; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link">Salary ( <i class="fa fa-usd"></i> )</span>
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
                                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-bank"></i>Bank Details</h2>
                            </div>
                            <div class="panel-body panelHolder">
                                <table class="table table-light margin-bottom-0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span class="primary-link">Account Holder Name</span>
                                            </td>
                                            <td>
                                                <?php echo $employee['account_holder_name'][0]; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link">Account Number</span>
                                            </td>
                                            <td>
                                                <?php echo $employee['account_number'][0]; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link">Bank Name</span>
                                            </td>
                                            <td>
                                                <?php echo $employee['bank_name'][0]; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link">PAN Number</span>
                                            </td>
                                            <td>
                                                <?php echo $employee['pan_number'][0]; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link">IFSC Code</span>
                                            </td>
                                            <td>
                                                <?php echo $employee['ifsc_code'][0]; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="primary-link">Branch</span>
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