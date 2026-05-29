<?php
$convening_date_range  = "27 May - 30 May, 2024";
$post_id        = get_the_ID();
$permalink      = get_the_permalink();
$feat_img_id    = get_post_thumbnail_id( $post_id );
$thumbnail      = wp_get_attachment_image_src( $feat_img_id, 'full' );
$background_img = !empty( $thumbnail ) ? 'style="background-image:url('.$thumbnail[0].');"' : "";
$title          = get_the_title( $post_id );
$image_alt      = !empty( $feat_img_id ) ? get_post_meta( $feat_img_id, '_wp_attachment_image_alt', true ) : 'Placeholder featured image for article titled '.$title;
$image_label    = !empty( $image_alt ) ? $image_alt : 'Featured image for the article titled '.$title;
$regions_list   = get_the_term_list( $post_id, 'regions', '', ', ');
?>
<article class="orbit-article-db">
  <div class="featured-img">
    <div class="orbit-thumbnail-bg" tabindex="0" role="img" aria-label="<?php echo $image_label; ?>" <?php _e( $background_img ); ?>>
      <a href="<?php _e( $permalink );?>"></a>
    </div>
  </div>
  <div class="post-content">
    <h5 class="post-title rgnrfs-link-color"><a href="<?php _e( $permalink );?>"><?php echo $title; ?></a></h5>
    <div class="post-meta font-calibre">
      <?php if( !empty( $regions_list ) ):?>
        <div class="tax-regions-list rgnrfs-link-color" ><?php echo $regions_list; ?></div>
      <?php endif;?>
      <span class="post-date"><?php echo $convening_date_range;?></span>
    </div>
  </div>
</article>
