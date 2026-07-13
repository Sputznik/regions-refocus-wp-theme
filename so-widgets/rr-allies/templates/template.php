<?php
$template_style = $instance['template_style'];
$items          =  $instance['allies'];

// FETCH DATA FROM CPT EVENTS CUSTOM FIELD
if( isset( $instance['rgnrfs_allies_cf'] ) && !empty( $instance['rgnrfs_allies_cf'] ) ){
  $post_id = get_queried_object_id();
  $template_style = 'hide_img_desc';

  if( !empty( $post_id ) ){
    $allies = get_post_meta( $post_id, 'rgnrfs_event_allies', true );

    if( !empty( $allies ) ){
      foreach( $allies as $key => $item ){
        $allies[$key] = array( 'ally_name' => $item['name'], 'ally_url' => $item['url'] );
      }
      $items = $allies;
    }
  }
}

$template_class = 'rr-allies-'.str_replace( '_', '-', $template_style );
?>
<div class="rr-allies rgnrfs-link-color <?php echo $template_class; ?>">
  <?php foreach( $instance['allies'] as $item ): $ally_name = $item['ally_name']; $ally_url  = !empty( $item['ally_url'] ) ? $item['ally_url'] : "#"; ?>
    <?php if( $template_style == 'show_img_desc' ): ?>
      <div class="rr-ally-item">
        <a href="<?php _e( $ally_url );?>">
          <?php echo wp_get_attachment_image( $item['ally_logo'], 'full' ); ?>
        </a>
        <div class="rr-ally-info">
          <a href="<?php echo $ally_url; ?>" target="_blank" rel="noopener noreferrer" class="rr-ally-name"><?php echo $ally_name; ?></a>
          <div class="description"><?php echo $item['ally_description']; ?></div>
        </div>
      </div>
    <?php elseif( $template_style == 'hide_img_desc' ): ?>
      <a href="<?php echo $ally_url; ?>" target="_blank" rel="noopener noreferrer" class="rr-ally-name"><?php echo $ally_name; ?></a>
    <?php endif; ?>
  <?php endforeach;?>
</div>
