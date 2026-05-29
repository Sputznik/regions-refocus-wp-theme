<?php
/**
* The template for displaying related-convenings based on regions.
*/
$related_convenings = do_shortcode("[orbit_related_query posts_per_page='3' style='grid3' taxonomy='regions']");
?>
<?php if( !empty( $related_convenings ) ): ?>
  <div class="container">
    <div class="related-convenings">
      <h6 class="related-convenings-title font-calibre">Related Convenings</h6>
      <?php echo $related_convenings; ?>
    </div>
  </div>
<?php endif; ?>
