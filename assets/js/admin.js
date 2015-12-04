jQuery( document ).ready(function( $ ) {
    // Uploading files
    var file_frame;
    var file_target_input;
    var file_target_wrapper;

    $('.wp_job_manager_upload_file_button').live('click', function( event ){
        event.preventDefault();

        file_target_wrapper = $( this ).closest('.file_url');
        file_target_input   = file_target_wrapper.find('input');

        // If the media frame already exists, reopen it.
        if ( file_frame ) {
            file_frame.open();
            return;
        }

        // Create the media frame.
        file_frame = wp.media.frames.file_frame = wp.media({
            title: $( this ).data( 'uploader_title' ),
            button: {
                text: $( this ).data( 'uploader_button_text' ),
            },
            multiple: false  // Set to true to allow multiple files to be selected
        });

        // When an image is selected, run a callback.
        file_frame.on( 'select', function() {
            // We set multiple to false so only get one image from the uploader
            attachment = file_frame.state().get('selection').first().toJSON();

            $( file_target_input ).val( attachment.url );
        });

        // Finally, open the modal
        file_frame.open();
    });
});