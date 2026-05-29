<?php
/**
 * The template for displaying breadcrumb on single-convenings
*/
$regions_list = get_the_term_list( $post->ID, 'regions', '', ', ');
?>
<div class="container breadcrumb rgnrfs-link-color font-calibre">
  <?php if( !empty( $regions_list ) ):?>
    <span class="tax-regions"><?php echo $regions_list; ?></span>
    <span>/</span>
  <?php endif;?>
  <span>Convening</span>
</div>
