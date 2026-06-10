<?php
$template_style = $instance['template_style'];
$template_class = 'rr-outcomes-'.str_replace( '_', '-', $template_style );

if( $template_style == 'grid_three_card' ){
  $template_class .= ' orbit-three-grid';
}

$outcome_ids = ( isset( $instance['outcomes__in'] ) && !empty( $instance['outcomes__in'] ) )  ? explode( ',', $instance['outcomes__in'] ) : array();
?>
<div class="rr-outcomes rgnrfs-link-color <?php echo $template_class; ?>">
  <?php foreach( $outcome_ids as $outcome_id ):
    $outcome_title = get_the_title( $outcome_id );
    $resource_url  = get_post_meta( $outcome_id, 'rgnrfs_resource_url', true );
  ?>
    <?php if( $template_style == 'grid_three_card' ): $regions_list = get_the_term_list( $outcome_id, 'regions', '', ', '); ?>
      <div class="rr-outcome-item orbit-article-db">
        <h3 class="rr-outcome-title">
          <a href="<?php echo $resource_url; ?>" target="_blank" rel="noopener noreferrer"><?php echo $outcome_title; ?></a>
        </h3>
        <div class="outcome-excerpt">
          <?php if( has_excerpt( $outcome_id ) ):?>
          <?php echo get_the_excerpt( $outcome_id ); ?>
          <?php endif; ?>
        </div>
        <div class="rr-outcome-meta font-calibre">
          <a href="<?php echo $resource_url; ?>" target="_blank" rel="noopener noreferrer" class="rr-outcome-more font-calibre">See More</a>
          <?php if( !empty( $regions_list ) ):?>
            <div class="tax-regions-list"><?php echo $regions_list; ?></div>
          <?php endif;?>
          <span class="post-date"><?php echo get_the_date( 'Y-m-d', $outcome_id );?></span>
        </div>
      </div>
    <?php elseif( $template_style == 'list' ): ?>
      <a href="<?php echo $resource_url; ?>" target="_blank" rel="noopener noreferrer" class="rr-outcome-title"><?php echo $outcome_title; ?></a>
    <?php endif; ?>
  <?php endforeach;?>
</div>
