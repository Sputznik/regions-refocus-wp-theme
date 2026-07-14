<?php
/**
* The template for displaying related-events based on regions.
*/
$post_id     = get_the_ID();
$regions     = wp_get_post_terms( $post_id, 'regions', array( 'fields' => 'slugs' ) );
$regions_str = implode( ',', $regions );
?>
<?php if( !empty( $regions_str ) ):
  $related_events = do_shortcode("[orbit_query style='grid3' posts_per_page='3' post_type='events' tax_query='regions:".$regions_str."' post__not_in='".$post_id."']"); ?>
  <?php if( !empty( $related_events ) ): ?>
    <div class="container">
      <div class="related-events">
        <h6 class="related-events-title font-calibre">Related Events</h6>
        <?php echo $related_events; ?>
      </div>
    </div>
  <?php endif; ?>
<?php endif; ?>
