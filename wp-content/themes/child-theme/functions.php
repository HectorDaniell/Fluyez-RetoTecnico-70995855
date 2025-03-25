<?php
// Cargar estilos del tema padre
function cargar_estilos_padre() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'cargar_estilos_padre');

// Cargar estilos del Child Theme (Tailwind compilado)
function cargar_estilos_child_theme() {
    wp_enqueue_style('tailwind-css', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'cargar_estilos_child_theme');
?>
