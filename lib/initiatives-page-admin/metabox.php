<?php
$valid_ids = array(); // VALID_IMAGE_IDS THAT EXISTS IN THE DB
$image_ids = get_post_meta( $post->ID, $this->meta_field_slug, true );
wp_nonce_field( 'rgnrfs_initiatives_page_meta_box', 'rgnrfs_initiatives_page_meta_box_nonce' );
?>
<div id="initiatives-gallery">
  <ul class="initiatives-gallery-thumbs">
    <?php if( !empty( $image_ids ) ): $ids_array = explode( ',', $image_ids ); ?>
      <?php foreach( $ids_array as $id ): $img_src = wp_get_attachment_image_src( $id, 'thumbnail' ); ?>
        <?php if( $img_src ): $valid_ids[] = $id; ?>
          <li data-id="<?php echo esc_attr( $id );?>">
            <img src="<?php echo esc_url( $img_src[0] );?>" />
            <a href="#" class="initiatives-remove-image">&times;</a>
          </li>
        <?php endif;?>
      <?php endforeach;?>
    <?php endif;?>
  </ul>
  <input type="hidden" name="<?php echo $this->meta_field_slug; ?>" id="initiatives-gallery-ids" value="<?php echo esc_attr( implode( ',', $valid_ids ) ); ?>" />
  <p><button type="button" class="button button-primary" id="initiatives-upload-btn">Select/Upload Images</button></p>
</div>
