<div class="wp_hrms_meta_data">     
        <p class="form-field">
            <label>Name: </label>
            <input type="text" id="name" name="name" value="<?php echo get_post_meta( get_the_ID(), 'name', true ); ?>">
        </p>
        <p class="form-field">
            <label>Father's Name: </label>
            <input type="text" id="father_name" name="father_name" value="<?php echo get_post_meta( get_the_ID(), 'father_name', true ); ?>">
        </p>
        <p class="form-field">
            <label>Date of Birth: </label>
            <input type="text" id="date_of_birth" name="date_of_birth" value="<?php echo get_post_meta( get_the_ID(), 'date_of_birth', true ); ?>">
        </p>
        <p class="form-field">
            <label>Gender: </label>
            <select id="gender" name="gender">
                <option <?php echo ( get_post_meta( get_the_ID(), 'gender', true ) == 'male' )?'selected':''; ?> value="male">Male</option>
                <option <?php echo ( get_post_meta( get_the_ID(), 'gender', true ) == 'female' )?'selected':''; ?> value="female">Female</option>
            </select>
        </p>
        <p class="form-field">
            <label>Phone: </label>
            <input type="text" id="phone" name="phone" value="<?php echo get_post_meta( get_the_ID(), 'phone', true ); ?>">
        </p>
        <p class="form-field">
            <label>Image: </label>
            <span class="file_url"><input type="text" id="image" name="image" value="<?php echo get_post_meta( get_the_ID(), 'image', true ); ?>"><button data-uploader_button_text="Usar archivo" class="button button-small wp_job_manager_upload_file_button">Subir</button></span>      
        </p>
        <p class="form-field">
            <label>Local Address: </label>
            <textarea id="local_address" name="local_address"><?php echo get_post_meta( get_the_ID(), 'local_address', true ); ?></textarea>
        </p>
        <p class="form-field">
            <label>Permanent Address: </label>
            <textarea id="permanent_address" name="permanent_address"><?php echo get_post_meta( get_the_ID(), 'permanent_address', true ); ?></textarea>
        </p>
</div>

<?php wp_nonce_field( 'employee-save', 'employee-nonce' ); ?>