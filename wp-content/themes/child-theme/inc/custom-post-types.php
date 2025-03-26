<?php
function registrar_cpt_empresas() {
    $labels = array(
        'name'               => 'Empresas',
        'singular_name'      => 'Empresa',
        'menu_name'          => 'Empresas',
        'add_new'            => 'Añadir Nueva Empresa',
        'new_item'           => 'Nueva Empresa',
        'edit_item'          => 'Editar Empresa',
        'view_item'          => 'Ver Empresa',
        'all_items'          => 'Todas las Empresas',
        'search_items'       => 'Buscar Empresas',
        'not_found'          => 'No se encontraron empresas'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'menu_icon'          => 'dashicons-store',
        'supports'           => array('title', 'editor', 'thumbnail'),
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'empresas'),
        'show_in_rest'       => true
    );

    register_post_type('empresas', $args);
}
add_action('init', 'registrar_cpt_empresas');
