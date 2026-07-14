<?php
/**
 * The template for displaying all single posts in CPT events
*/
get_header();
?>
<div class="rgnrfs-single-events">
  <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    <div class="bg-top-terrain"></div>
    <?php get_template_part('partials/events/post-header'); ?>
    <div class="container">
      <div class="entry-content rgnrfs-link-color">
        <?php the_content(); ?>
      </div>
    </div>
    <?php get_template_part('partials/events/related-events'); ?>
  <?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>
