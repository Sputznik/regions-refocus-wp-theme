<?php get_header(); ?>

<main class="site-main">

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('template-parts/content/post'); ?>
    <?php endwhile; ?>
<?php endif; ?>

</main>

<?php get_footer(); ?>
