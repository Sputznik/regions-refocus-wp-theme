<?php
/**
 * The template for displaying all single posts in CPT convenings
*/
get_header();
?>
<div class="rgnrfs-single-convening">
  <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    <div class="bg-top-terrain" style="background-image: url(<?php echo RGNRFS_THEME_URI.'/images/pacific-terrain.svg';?>);"></div>
    <?php get_template_part('partials/convenings/post-header'); ?>
    <div class="container">
      <div class="entry-content rgnrfs-link-color">
        <?php the_content(); ?>
      </div>
    </div>
    <?php get_template_part('partials/convenings/related-convenings'); ?>
  <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>
