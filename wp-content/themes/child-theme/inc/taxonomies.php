<?php
function registrar_taxonomias_empresas() {
    register_taxonomy(
        'categorias_empresas',
        'empresas',
        array(
            'label'             => 'Categorías',
            'rewrite'           => array('slug' => 'categoria-empresa'),
            'hierarchical'      => true,
            'show_admin_column' => true,
            'show_in_rest'      => true
        )
    );

    register_taxonomy(
        'tags_empresas',
        'empresas',
        array(
            'label'             => 'Tags',
            'rewrite'           => array('slug' => 'tag-empresa'),
            'hierarchical'      => false,
            'show_admin_column' => true,
            'show_in_rest'      => true
        )
    );
    register_taxonomy(
        'cripto_aceptadas',
        'empresas',
        array(
            'label'             => 'Criptomonedas Aceptadas',
            'rewrite'           => array('slug' => 'cripto'),
            'hierarchical'      => false,
            'show_admin_column' => true,
            'show_in_rest'      => true
        )
    );
}
add_action('init', 'registrar_taxonomias_empresas');
