<?php
/**
* The template for displaying related-convenings based on regions.
*/
$post_id     = get_the_ID();
$regions     = wp_get_post_terms( $post_id, 'regions', array( 'fields' => 'slugs' ) );
$regions_str = implode( ',', $regions );
?>
<?php if( !empty( $regions_str ) ):
  $related_convenings = do_shortcode("[orbit_query style='grid3' posts_per_page='3' post_type='convenings' tax_query='regions:".$regions_str."']"); ?>
  <?php if( !empty( $related_convenings ) ): ?>
    <div class="container">
      <div class="related-convenings">
        <h6 class="related-convenings-title font-calibre">Related Convenings</h6>
        <?php echo $related_convenings; ?>
      </div>
    </div>
  <?php endif; ?>
<?php endif; ?>
