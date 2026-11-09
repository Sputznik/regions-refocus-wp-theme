<?php
$post_id   = get_the_ID();
$post_type = get_post_type( $post_id );
$post_type_chip = $post_type;
$post_permalink = get_the_permalink( $post_id );

if( $post_type_chip === 'outcomes' ){
  $post_type_chip = 'publication';
}

?>
<div class="rgnrfs-library-search-result-item rgnrfs-link-color">
  <div class="resource-icon">
    <?php if( $post_type === 'outcomes' ): $outcome_resource_type = get_post_meta( $post_id, 'rgnrfs_resource_type', true ); ?>
      <?php echo RGNRFS_OUTCOMES_CPT::get_resource_type_icon( $outcome_resource_type ); ?>
    <?php elseif( $post_type === 'events' ): ?>
      <i class="fa-regular fa-calendar-days" aria-hidden="true"></i>
    <?php endif;?>
  </div>
  <div class="resource-content">
    <h5><?php echo get_the_title( $post_id ); ?></h5>
    <div class="post-excerpt">
      <?php if( has_excerpt( $post_id ) ):?>
        <?php echo wp_trim_words( strip_shortcodes( get_the_excerpt( $post_id ) ), 25, ' ... '.'<a href="'.$post_permalink.'">See More</a>' ); ?>
      <?php endif; ?>
    </div>
    <ul class="post-meta list-unstyled">
      <li>
        <span class="post-type text-capitalize"><?php echo $post_type_chip; ?></span>
      </li>
      <?php if( $post_type === 'outcomes' ):
        $resource_url  = get_post_meta( $post_id, 'rgnrfs_resource_url', true );
        $resource_type = get_post_meta( $post_id, 'rgnrfs_resource_type', true );
      ?>
        <li>
          <a href="<?php echo $resource_url; ?>" target="_blank" rel="noopener noreferrer" class="see-resource font-calibre">
            <?php echo RGNRFS_OUTCOMES_CPT::get_resource_action_text( $resource_type ); ?>
          </a>
        </li>
        <li>
          <span class="post-date"><?php echo get_the_date( 'j F Y', $post_id );?></span>
        </li>
      <?php endif; ?>
      <?php if( $post_type === 'events' ): $event_date_range = get_post_meta( $post_id, "rgnrfs_event_date_range", true ); ?>
        <li>
          <span class="post-date"><?php echo $event_date_range;?></span>
        </li>
      <?php endif; ?>
    </ul>
  </div>
  <?php if( has_post_thumbnail() ): ?>
    <div class="resource-featured-image-wrapper">
      <div class="feat-sm">
        <a href="<?php echo $post_permalink; ?>">
          <?php the_post_thumbnail( array( 50, 50 ) ); ?>
        </a>
      </div>
      <div class="feat-lg">
        <a href="<?php echo $post_permalink; ?>">
          <?php the_post_thumbnail( array( 200, 200 ) ); ?>
        </a>
      </div>
    </div>
  <?php endif; ?>
</div>
