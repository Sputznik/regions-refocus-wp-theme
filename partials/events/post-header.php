<?php
/**
 * The template for displaying single-events header
*/
$event_date_range = get_post_meta( $post->ID, "rgnrfs_event_date_range", true );
$event_location   = get_post_meta( $post->ID, "rgnrfs_event_location", true );
?>
<div class="events-post-header">
  <?php get_template_part('partials/events/breadcrumb'); ?>
  <div class="container layout-wrap">
    <div class="col-left">
      <h1 class="title"><?php the_title();?></h1>
    </div>
    <div class="col-right date-location font-calibre">
      <p><?php echo $event_date_range; ?></p>
      <p><?php echo $event_location; ?></p>
    </div>
  </div>
</div>
