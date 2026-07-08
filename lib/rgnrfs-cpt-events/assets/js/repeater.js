jQuery.fn.rgnrfs_allies_repeater = function(){

  return this.each(function() {
    const container   = jQuery(this);
    const metaKey     = container.data('meta-key') || '';
    const rowsWrapper = container.find('.repeater-rows');
    const addButton   = container.find('#add_' + metaKey + '_row');

    const rowTemplate =
        '<div class="repeater-row">' +
          '<div class="field-group">' +
            '<label>Ally Name:</label>' +
            '<input type="text" name="' + metaKey + '[{{index}}][name]" value="" class="widefat" />' +
          '</div>' +
          '<div class="field-group">' +
            '<label>Ally URL:</label>' +
            '<input type="text" name="' + metaKey + '[{{index}}][url]" value="" class="widefat" />' +
          '</div>' +
          '<div>' +
            '<button type="button" class="button remove-row-btn">Delete</button>' +
          '</div>' +
        '</div>';

    // NORMALIZES INPUT ARRAY SEQUENCE FORMATTING TO PREVENT DB MAPPING DROPS
    function reindexRepeaterRows() {
      rowsWrapper.find('.repeater-row').each(function(rowIndex) {
        jQuery(this).find('input').each(function() {
          const currentName = jQuery(this).attr('name');
          if (currentName) {
            // OVERWRITES STRUCTURED PATTERN PATHS: meta_key[old_index][property]
            const updatedName = currentName.replace(/\[\d+\]/, '[' + rowIndex + ']');
            jQuery(this).attr('name', updatedName);
          }
        });
      });
    }

    // APPENDS A NEW LAYOUT GROUP ROW
    addButton.off('click').on('click', function(e) {
      e.preventDefault();
      const currentIndex = rowsWrapper.find('.repeater-row').length;
      const newRowHTML = rowTemplate.replace(/\{\{index\}\}/g, currentIndex);
      rowsWrapper.append(newRowHTML);
    });

    // DELEGATED CLICK EVENT FOR DYNAMICALLY GENERATED DELETE BUTTONS
    rowsWrapper.off('click', '.remove-row-btn').on('click', '.remove-row-btn', function(e) {
      e.preventDefault();
      jQuery(this).closest('.repeater-row').remove();
      reindexRepeaterRows();
    });

  });

};

jQuery(document).ready(function() {
  jQuery('[data-behaviour~=rgnrfs-allies-repeater]').rgnrfs_allies_repeater();
});
