<?php
/**
 * The template for displaying search-form modal
*/
?>
<div id="search-modal" class="rgnrfs-modal" tabindex="-1" role="dialog">
  <div class="modal-backdrop" data-dismiss="rgnrfs-modal"></div>
  <div class="modal" role="dialog" aria-labelledby="modalTitle" aria-describedby="modalDescription">
    <div class="modal-header" id="modalTitle">
      <button class="close-modal" type="button" aria-label="Close modal" data-dismiss="rgnrfs-modal"><i class="fa-solid fa-xmark"></i></button>
    </div>
    <div class="modal-body">
      <div class="search-field">
        <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
          <label for="s"><?php _e( 'Enter search term(s)', 'regions-refocus-wp-theme' ); ?></label>
          <input type="text" autocomplete="off" class="search-input" name="s" id="s" />
          <button type="submit" class="search-submit">Search</button>
        </form>
      </div>
    </div>
  </div>
</div>
