<?php
$thumbnail        = wp_get_attachment_image_src( $instance['spotlight_img'], 'full' );
$background_img   = !empty( $thumbnail ) ? 'style="background-image:url('.$thumbnail[0].');"' : "";
$spotlight_title  = !empty( $instance['spotlight_title'] ) ? $instance['spotlight_title'] : "";
$spotlight_url    = !empty( $instance['spotlight_url'] ) ? $instance['spotlight_url'] : "";
?>
<div class="rr-cross-regional-spotlight">
  <div class="orbit-thumbnail-bg" <?php _e( $background_img ); ?>>
    <a href="<?php _e( $spotlight_url );?>"></a>
  </div>
  <div class="spotlight-content rgnrfs-link-color">
    <h5><a href="<?php _e( $spotlight_url );?>" target="_blank" rel="noopener noreferrer" class="title"><?php echo $spotlight_title; ?></a></h5>
  </div>
</div>
