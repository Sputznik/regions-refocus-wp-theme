/**
 * RGNRFS TAB LAYOUT MANAGER
 */
jQuery(document).ready(function() {
  jQuery('[data-behaviour~=rgnrfs-tabs]').each( function(){
    var container = jQuery(this);
    var tabs      = container.find('.tab-link');
    var panels    = container.find('.tab-panel');

    tabs.on( 'click', function(){
      var clickedTab    = jQuery(this);
      var targetPanelId = clickedTab.attr('data-tab');

      // RESET MATCHING CLASSES & ROLES INSIDE CURRENT CONTAINER INSTANCE
      tabs.removeClass('active').attr('aria-selected', 'false');
      panels.removeClass('active');

      // UPDATE STATES FOR ACTIVATED SELECTORS
      clickedTab.addClass('active').attr('aria-selected', 'true');

      var activePanel = container.find('#' + targetPanelId);
      if( activePanel.length ){
        activePanel.addClass('active');

        // FORCES COMPLEX LAYOUT OBJECTS INSIDE(LIKE GRIDS OR GALLERIES) TO RECALCULATE LAYOUT FIELDS
        jQuery(window).trigger('resize');
      }
    });
  });
});
