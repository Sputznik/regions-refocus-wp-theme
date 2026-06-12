<?php
$thumbnail      = wp_get_attachment_image_src( $instance['hero_image'], 'full' );
$background_img = !empty( $thumbnail ) ? 'style="background-image:url('.$thumbnail[0].');"' : "";
$convening_url  = get_permalink( $instance['featured_post_id'] );
?>
<div class="rr-regions-hero" <?php _e( $background_img ); ?>>
  <div class="container rr-regions-hero-inner">
    <div class="region-headline font-calibre">
      <h6 class="region-label"><?php echo $instance['region_title']?></h6>
      <h3 class="region-name"><?php echo $instance['region_name']?></h3>
    </div>
    <div class="featured-convening">
      <div class="featured-top font-calibre">
        <h6 class="title">Featured Convening</h6>
        <a href="#rgnrfs-pg-regions-other-convenings" class="other-convening other-convening-lg">See other convenings</a>
      </div>
      <div class="featured-content">
        <h2 class="post-title"><a class="post-title-link" href="<?php echo $convening_url; ?>"><?php echo get_the_title( $instance['featured_post_id'] ); ?></a></h2>
        <a href="#rgnrfs-pg-regions-other-convenings" class="other-convening other-convening-sm font-calibre">See other convenings</a>
        <div class="post-excerpt"><?php echo wp_trim_words( strip_shortcodes( get_the_excerpt( $instance['featured_post_id'] ) ), 50, '... <a class="read-more" href="'.$convening_url.'">See More</a>' ); ?></div>
      </div>
      <div class="co-conveners">
        <h6 class="title font-calibre">Co-conveners</h6>
        <?php foreach( $instance['co_conveners'] as $item ): ?>
          <a href="<?php echo $item['convener_url']; ?>" target="_blank" rel="noopener noreferrer" class="rr-outcome-title"><?php echo $item['convener_name']; ?></a>
        <?php endforeach; ?>
        <span aria-hidden="true">...</span>
      </div>
    </div>
  </div>
</div>
