jQuery( document ).ready(function( $ ) {
    // Datepicker
    $( 'input#date_of_birth, input#date_of_joining, input#exit_date' ).datepicker({
        dateFormat: 'yy-mm-dd',
        // minDate: 0,
        yearRange: "-100:+0",
        changeMonth: true,
        changeYear: true
    });

    // Uploading files
    var fileFrame;
    var fileTargetInput;
    var fileTargetWrapper;

    $( '.wp_job_manager_upload_file_button' ).live( 'click', function( event ) {
        event.preventDefault();

        fileTargetWrapper = $( this ).closest( '.file_url' );
        fileTargetInput = fileTargetWrapper.find( 'input' );

        // If the media frame already exists, reopen it.
        if ( fileFrame ) {
            fileFrame.open();
            return;
        }

        // Create the media frame.
        fileFrame = wp.media.frames.fileFrame = wp.media({
            title: $( this ).data( 'uploader_title' ),
            button: {
                text: $( this ).data( 'uploader_button_text' ),
            },
            multiple: false  // Set to true to allow multiple files to be selected
        });

        // When an image is selected, run a callback.
        fileFrame.on( 'select', function() {
            // We set multiple to false so only get one image from the uploader
            attachment = fileFrame.state().get('selection').first().toJSON();

            $( fileTargetInput ).val( attachment.url );
        });

        // Finally, open the modal
        fileFrame.open();
    });
});