<?php
get_header();

$categories = get_terms(array(
    'taxonomy'   => 'categorias_empresas',
    'hide_empty' => true,
));
$current_category = get_query_var('categorias_empresas');
?>

<div class="archive-cover" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/cover1.webp');">
    <div class="container">
        <h1>Empresas</h1>
        <div class="categories-filter">
            <a href="<?php echo get_post_type_archive_link('empresas'); ?>" class="<?php echo empty($current_category) ? 'active' : ''; ?>">Ver Todo</a>
            <?php foreach ($categories as $category) : ?>
                <a href="<?php echo get_term_link($category); ?>" class="<?php echo ($current_category == $category->slug) ? 'active' : ''; ?>">
                    <?php echo esc_html($category->name); ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="container empresas-list">
    <?php if (have_posts()) : ?>
        <div class="empresas-grid">
            <?php while (have_posts()) : the_post(); ?>
                <div class="empresa-card">
                    <div class="empresa-img">
                        <a href="<?php the_permalink(); ?>">
                            <?php
                            $image = get_field('imagen');
                            if ($image) {
                                echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr(get_the_title()) . '" />';
                            }
                            ?>
                        </a>
                    </div>
                    <div class="empresa-info">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p class="empresa-categoria">
                            <?php
                            $terms = get_the_terms(get_the_ID(), 'categorias_empresas');
                            if ($terms && !is_wp_error($terms)) {
                                foreach ($terms as $term) {
                                    echo '<span>' . esc_html($term->name) . '</span> ';
                                }
                            }
                            ?>
                        </p>
                        <p class="empresa-tags">
                            <?php
                            $tags = get_the_terms(get_the_ID(), 'tags_empresas');
                            if ($tags && !is_wp_error($tags)) {
                                foreach ($tags as $tag) {
                                    echo '<span class="tag">' . esc_html($tag->name) . '</span> ';
                                }
                            }
                            ?>
                        </p>
                        <p class="empresa-ubicacion">
                            <?php echo esc_html(get_field('ubicacion')); ?>
                        </p>
                        <a href="<?php the_permalink(); ?>" class="btn">Conocer la empresa</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="pagination">
            <?php echo paginate_links(array(
                'prev_text' => __('« Anterior'),
                'next_text' => __('Siguiente »'),
            )); ?>
        </div>
    <?php else : ?>
        <p>No se encontraron empresas.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
