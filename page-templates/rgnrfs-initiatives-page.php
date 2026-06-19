<?php
/*
Template Name: Initiatives Page
Template Post Type: page
*/
get_header();
$image_ids_string = get_post_meta( get_the_ID(), 'rgnrfs_initiatives_page_hero_ids', true );
?>
<div id="rgnrfs-initiatives-page-template">
  <?php if( !empty( $image_ids_string ) ) : $image_ids = explode( ',', $image_ids_string ); ?>
  <div class="initiatives-page-slider-wrapper">
    <div class="initiatives-page-slider-overlay"></div>
    <div class="initiatives-page-slider">
      <?php foreach ( $image_ids as $image_id ) : $image_url = wp_get_attachment_image_url( intval( $image_id ), 'large' ); ?>
        <?php if( $image_url ): ?>
          <div class="initiatives-page-slider-item" style="background-image: url('<?php echo esc_url( $image_url ); ?>');"></div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>
  <?php endif; ?>
  <div class="container">
    <div class="initiatives-page-post-content">
      <h2 class="initiatives-page-slider-title"><?php the_title(); ?></h2>
      <?php the_content(); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
