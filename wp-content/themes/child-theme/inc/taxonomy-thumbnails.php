<?php
// Agregar campo de imagen en la pantalla de añadir nueva criptomoneda
function agregar_campo_imagen_cripto($taxonomy) {
    ?>
    <div class="form-field term-thumbnail-wrap">
        <label><?php _e('Ícono de la Criptomoneda', 'textdomain'); ?></label>
        <div id="cripto_thumbnail" style="float: left; margin-right: 10px;">
            <img src="<?php echo esc_url(wp_get_attachment_url(get_option('default_icon_cripto'))); ?>" width="60px" height="60px" />
        </div>
        <div style="line-height: 60px;">
            <input type="hidden" id="cripto_thumbnail_id" name="cripto_thumbnail_id" />
            <button type="button" class="upload_image_button button"><?php _e('Subir/Agregar imagen', 'textdomain'); ?></button>
            <button type="button" class="remove_image_button button"><?php _e('Eliminar imagen', 'textdomain'); ?></button>
        </div>
    </div>
    <?php
}

// Agregar campo de imagen en la pantalla de edición de criptomoneda
function editar_campo_imagen_cripto($term, $taxonomy) {
    $thumbnail_id = get_term_meta($term->term_id, 'cripto_thumbnail_id', true);
    $image = $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : wp_get_attachment_url(get_option('default_icon_cripto'));
    ?>
    <tr class="form-field term-thumbnail-wrap">
        <th scope="row" valign="top"><label><?php _e('Ícono de la Criptomoneda', 'textdomain'); ?></label></th>
        <td>
            <div id="cripto_thumbnail" style="float: left; margin-right: 10px;">
                <img src="<?php echo esc_url($image); ?>" width="60px" height="60px" />
            </div>
            <div style="line-height: 60px;">
                <input type="hidden" id="cripto_thumbnail_id" name="cripto_thumbnail_id" value="<?php echo esc_attr($thumbnail_id); ?>" />
                <button type="button" class="upload_image_button button"><?php _e('Subir/Agregar imagen', 'textdomain'); ?></button>
                <button type="button" class="remove_image_button button"><?php _e('Eliminar imagen', 'textdomain'); ?></button>
            </div>
        </td>
    </tr>
    <?php
}

// Guardar la imagen de la taxonomía
function guardar_imagen_cripto($term_id) {
    if (isset($_POST['cripto_thumbnail_id'])) {
        update_term_meta($term_id, 'cripto_thumbnail_id', absint($_POST['cripto_thumbnail_id']));
    }
}

// Agregar columna de imagen en la lista de términos
function agregar_columna_imagen_cripto($columns) {
    $columns['thumb'] = __('Ícono', 'textdomain');
    return $columns;
}

// Mostrar imagen en la columna de la lista de términos
function mostrar_columna_imagen_cripto($content, $column_name, $term_id) {
    if ($column_name === 'thumb') {
        $thumbnail_id = get_term_meta($term_id, 'cripto_thumbnail_id', true);
        if ($thumbnail_id) {
            $image = wp_get_attachment_thumb_url($thumbnail_id);
            $content = '<img src="' . esc_url($image) . '" alt="" style="width:48px;height:48px;" />';
        } else {
            $content = '<img src="' . esc_url(wp_get_attachment_url(get_option('default_icon_cripto'))) . '" alt="" style="width:48px;height:48px;" />';
        }
    }
    return $content;
}

// Cargar scripts de medios para subir imágenes
function cargar_media_para_cripto($hook) {
    if ('edit-tags.php' === $hook || 'term.php' === $hook) {
        wp_enqueue_media();
    }
}
function cargar_script_taxonomia() {
    wp_enqueue_script('taxonomy-thumbnail', get_stylesheet_directory_uri() . '/assets/js/taxonomy-thumbnail.js', array('jquery'), null, true);
}
add_action('admin_enqueue_scripts', 'cargar_script_taxonomia');

add_action('admin_enqueue_scripts', 'cargar_media_para_cripto');
// Registrar hooks en la taxonomía `cripto_aceptadas`
add_action('cripto_aceptadas_add_form_fields', 'agregar_campo_imagen_cripto');
add_action('cripto_aceptadas_edit_form_fields', 'editar_campo_imagen_cripto', 10, 2);
add_action('edited_cripto_aceptadas', 'guardar_imagen_cripto');
add_action('created_cripto_aceptadas', 'guardar_imagen_cripto');
add_filter('manage_edit-cripto_aceptadas_columns', 'agregar_columna_imagen_cripto');
add_filter('manage_cripto_aceptadas_custom_column', 'mostrar_columna_imagen_cripto', 10, 3);
?>
