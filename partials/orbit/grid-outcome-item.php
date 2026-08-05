<?php
$post_id        = get_the_ID();
$resource_url  = get_post_meta( $post_id, 'rgnrfs_resource_url', true );
$resource_type = get_post_meta( $post_id, 'rgnrfs_resource_type', true );
$regions_list  = get_the_term_list( $post_id, 'regions', '', ', ');
?>
<article class="rr-outcome-item orbit-article-db">
  <h3 class="rr-outcome-title">
    <a href="<?php echo $resource_url; ?>" target="_blank" rel="noopener noreferrer"><?php echo get_the_title( $post_id ); ?></a>
  </h3>
  <div class="outcome-excerpt">
    <?php if( has_excerpt( $post_id ) ):?>
    <?php echo get_the_excerpt( $post_id ); ?>
    <?php endif; ?>
  </div>
  <div class="rr-outcome-meta font-calibre">
    <a href="<?php echo $resource_url; ?>" target="_blank" rel="noopener noreferrer" class="rr-outcome-more font-calibre">
      <?php echo RGNRFS_OUTCOMES_CPT::get_resource_action_text( $resource_type ); ?>
    </a>
    <?php if( !empty( $regions_list ) ):?>
      <div class="tax-regions-list"><?php echo $regions_list; ?></div>
    <?php endif;?>
    <span class="post-date"><?php echo get_the_date( 'Y-m-d', $post_id );?></span>
  </div>
</article>
