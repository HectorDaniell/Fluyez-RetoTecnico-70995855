<?php
function fluyez_child_enqueue_styles() {
    // Estilos del tema padre
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    
    // Estilos del tema hijo
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));
    
    // Estilos de Tailwind
    wp_enqueue_style('tailwind-styles', get_stylesheet_directory_uri() . '/assets/css/tailwind.css', array('child-style'), '1.0.0');
}

require_once get_stylesheet_directory() . '/inc/custom-post-types.php';
require_once get_stylesheet_directory() . '/inc/taxonomies.php';
require_once get_stylesheet_directory() . '/inc/taxonomy-thumbnails.php';

add_action('wp_enqueue_scripts', 'fluyez_child_enqueue_styles');
?>
