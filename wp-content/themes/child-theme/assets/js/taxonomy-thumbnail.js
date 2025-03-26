jQuery(document).ready(function($) {
    var file_frame;

    $('.upload_image_button').on('click', function(event) {
        event.preventDefault();

        var button = $(this);
        var id = button.prev();

        // Si ya existe un frame, lo reutilizamos
        if (file_frame) {
            file_frame.open();
            return;
        }

        // Crear el frame de medios de WordPress
        file_frame = wp.media.frames.file_frame = wp.media({
            title: 'Selecciona o sube una imagen',
            button: {
                text: 'Usar esta imagen'
            },
            multiple: false
        });

        file_frame.on('select', function() {
            var attachment = file_frame.state().get('selection').first().toJSON();
            id.val(attachment.id);
            $('#cripto_thumbnail img').attr('src', attachment.sizes.thumbnail.url);
        });

        file_frame.open();
    });

    $('.remove_image_button').on('click', function(event) {
        event.preventDefault();
        $('#cripto_thumbnail img').attr('src', '');
        $('#cripto_thumbnail_id').val('');
    });
});
