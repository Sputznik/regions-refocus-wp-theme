<?php
/**
 * The template for displaying single-convenings header
*/
$convening_date_range  = get_post_meta( $post->ID, "rgnrfs_date_range", true );
$convening_location    = get_post_meta( $post->ID, "rgnrfs_location", true );
?>
<div class="convenings-post-header">
  <?php get_template_part('partials/convenings/breadcrumb'); ?>
  <div class="container layout-wrap">
    <div class="col-left">
      <h1 class="title"><?php the_title();?></h1>
    </div>
    <div class="col-right date-location font-calibre">
      <p><?php echo $convening_date_range; ?></p>
      <p><?php echo $convening_location; ?></p>
    </div>
  </div>
</div>
