<div class="wp_hrms_meta_data">     
    <p class="form-field">
        <label><?php _e( 'Employee ID', 'wp-hrms' ); ?>: </label>
        <input type="text" id="employee_id" name="employee_id" value="<?php echo get_post_meta( get_the_ID(), 'employee_id', true ); ?>">
    </p>
    <p class="form-field">
        <label><?php _e( 'Designation', 'wp-hrms' ); ?>: </label>
        <input type="text" id="designation" name="designation" value="<?php echo get_post_meta( get_the_ID(), 'designation', true ); ?>">
    </p>
    <p class="form-field">
        <label><?php _e( 'Date of Joining', 'wp-hrms' ); ?>: </label>
        <input type="text" id="date_of_joining" name="date_of_joining" value="<?php echo get_post_meta( get_the_ID(), 'date_of_joining', true ); ?>">
    </p>
    <p class="form-field">
        <label><?php _e( 'Exit Date', 'wp-hrms' ); ?>: </label>
        <input type="text" id="exit_date" name="exit_date" value="<?php echo get_post_meta( get_the_ID(), 'exit_date', true ); ?>">
    </p>
    <p class="form-field">
        <label><?php _e( 'Basic Salary', 'wp-hrms' ); ?>: </label>
        <input type="text" id="basic_salary" name="basic_salary" value="<?php echo get_post_meta( get_the_ID(), 'basic_salary', true ); ?>">
    </p>
</div>