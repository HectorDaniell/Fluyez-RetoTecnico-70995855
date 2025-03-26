<?php get_header(); ?>

<main class="container mx-auto py-10">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="max-w-4xl mx-auto bg-white p-6 shadow-lg rounded-lg">
            <?php if (has_post_thumbnail()) : ?>
                <img src="<?php the_post_thumbnail_url('large'); ?>" class="w-full h-64 object-cover rounded">
            <?php endif; ?>
            
            <h1 class="text-3xl font-bold mt-4"><?php the_title(); ?></h1>
            <p class="text-gray-600"><?php echo get_the_term_list(get_the_ID(), 'categorias_empresas', '', ', '); ?></p>

            <p class="mt-4"><?php the_field('parrafo_acerca_de'); ?></p>
            <p class="mt-4 font-semibold">Servicios:</p>
            <p><?php the_field('parrafo_servicios'); ?></p>

            <div class="mt-4">
                <p><strong>Dirección:</strong> <?php the_field('direccion'); ?></p>
                <p><strong>Ubicación:</strong> <?php the_field('ubicacion'); ?></p>
                <p><strong>WhatsApp:</strong> <?php the_field('whatsapp'); ?></p>
                <p><a href="<?php the_field('pagina_web'); ?>" target="_blank" class="text-blue-600">Visitar sitio web</a></p>
            </div>
        </article>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
