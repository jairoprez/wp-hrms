<div class="wp_hrms_meta_data">     
    <p class="form-field">
        <label><?php _e( 'Account Holder Name', 'wp-hrms' ); ?>: </label>
        <input type="text" id="account_holder_name" name="account_holder_name" value="<?php echo get_post_meta( get_the_ID(), 'account_holder_name', true ); ?>">
    </p>
    <p class="form-field">
        <label><?php _e( 'Account Number', 'wp-hrms' ); ?>: </label>
        <input type="text" id="account_number" name="account_number" value="<?php echo get_post_meta( get_the_ID(), 'account_number', true ); ?>">
    </p>
    <p class="form-field">
        <label><?php _e( 'Bank Name', 'wp-hrms' ); ?>: </label>
        <input type="text" id="bank_name" name="bank_name" value="<?php echo get_post_meta( get_the_ID(), 'bank_name', true ); ?>">
    </p>
    <p class="form-field">
        <label><?php _e( 'IFSC Code', 'wp-hrms' ); ?>: </label>
        <input type="text" id="ifsc_code" name="ifsc_code" value="<?php echo get_post_meta( get_the_ID(), 'ifsc_code', true ); ?>">
    </p>
    <p class="form-field">
        <label><?php _e( 'BSB(if any)', 'wp-hrms' ); ?>: </label>
        <input type="text" id="bsb" name="bsb" value="<?php echo get_post_meta( get_the_ID(), 'bsb', true ); ?>">
    </p>
    <p class="form-field">
        <label><?php _e( 'PAN Number', 'wp-hrms' ); ?>: </label>
        <input type="text" id="pan_number" name="pan_number" value="<?php echo get_post_meta( get_the_ID(), 'pan_number', true ); ?>">
    </p>
    <p class="form-field">
        <label><?php _e( 'Branch', 'wp-hrms' ); ?>: </label>
        <input type="text" id="branch" name="branch" value="<?php echo get_post_meta( get_the_ID(), 'branch', true ); ?>">
    </p>
</div>