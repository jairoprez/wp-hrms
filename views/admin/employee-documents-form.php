<div class="wp_hrms_meta_data">     
    <p class="form-field">
        <label><?php _e( 'Resume', 'wp-hrms' ); ?>: </label>
        <span class="file_url"><input type="text" id="resume" name="resume" value="<?php echo get_post_meta( get_the_ID(), 'resume', true ); ?>"><button data-uploader_button_text="Usar archivo" class="button button-small wp_job_manager_upload_file_button">Subir</button></span>      
    </p>
    <p class="form-field">
        <label><?php _e( 'Offer Letter', 'wp-hrms' ); ?>: </label>
        <span class="file_url"><input type="text" id="offer_letter" name="offer_letter" value="<?php echo get_post_meta( get_the_ID(), 'offer_letter', true ); ?>"><button data-uploader_button_text="Usar archivo" class="button button-small wp_job_manager_upload_file_button">Subir</button></span>      
    </p>
    <p class="form-field">
        <label><?php _e( 'Joining Letter', 'wp-hrms' ); ?>: </label>
        <span class="file_url"><input type="text" id="joining_letter" name="joining_letter" value="<?php echo get_post_meta( get_the_ID(), 'joining_letter', true ); ?>"><button data-uploader_button_text="Usar archivo" class="button button-small wp_job_manager_upload_file_button">Subir</button></span>      
    </p>
    <p class="form-field">
        <label><?php _e( 'Contract and Agreement', 'wp-hrms' ); ?>: </label>
        <span class="file_url"><input type="text" id="contract_and_agreement" name="contract_and_agreement" value="<?php echo get_post_meta( get_the_ID(), 'contract_and_agreement', true ); ?>"><button data-uploader_button_text="Usar archivo" class="button button-small wp_job_manager_upload_file_button">Subir</button></span>      
    </p>
    <p class="form-field">
        <label><?php _e( 'ID Proof', 'wp-hrms' ); ?>: </label>
        <span class="file_url"><input type="text" id="id_proof" name="id_proof" value="<?php echo get_post_meta( get_the_ID(), 'id_proof', true ); ?>"><button data-uploader_button_text="Usar archivo" class="button button-small wp_job_manager_upload_file_button">Subir</button></span>      
    </p>
</div>