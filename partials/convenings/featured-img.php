<?php
/**
 * The template for displaying single-convenings featured-image
*/
$feat_img_id = get_post_thumbnail_id( $post->ID );
?>
<?php if( $feat_img_id ): ?>
  <figure class="featured-image">
    <?php the_post_thumbnail( 'full', array( 'loading' => 'lazy' ) ); ?>
  </figure>
<?php endif;?>
