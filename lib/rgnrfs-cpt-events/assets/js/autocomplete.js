/**
 * RGNRFS MULTI-SELECT AUTOCOMPLETE FIELD
 */
jQuery.fn.rgnrfs_multiselect_autocomplete = function() {

  return this.each(function() {
    var $idValueInput = jQuery(this);
    var $searchBoxField = jQuery('#rgnrfs-multiselect-autocomplete-display');
    var $searchBoxWrapper = jQuery('#rgnrfs-multiselect-autocomplete-search');
    var isSearchContainerActive = false;

    /**
     * Helper Function: Parses the input text value string, strips duplicate entries,
     * cleans trailing whitespaces, and returns a sanitized array of numerical IDs.
     */
    function getSanitizedSelectedIds(){
      var rawValueString = $idValueInput.val().trim();

      if( !rawValueString ){
        return [];
      }

      // RegEx splits on comma and handles any accidental whitespace, cleaning it instantly
      var basicIdArray = rawValueString.split(/,\s*/).map( function( individualId ){
        return individualId.trim();
      });

      var uniqueIdArray = Array.from(new Set(basicIdArray)).filter(function(parsedId) {
        return parsedId !== '' && !isNaN(parsedId);
      });

      return uniqueIdArray;
    }

    if( $idValueInput.length && $searchBoxField.length ){

      /**
       * Event Hook: Sanitizes manual typed items instantly whenever focus leaves
       * the ID input container or changes are detected inside the layout.
       */
      $idValueInput.on('blur change', function(){
        var validatedIds = getSanitizedSelectedIds();
        $idValueInput.val(validatedIds.join(','));
      });

      /**
       * Event Hook: Displays the search panel when clicking on the ID field.
       */
      $idValueInput.on( 'click', function( event ){
        event.stopPropagation();

        if( !isSearchContainerActive ){
          isSearchContainerActive = true;
          $searchBoxWrapper.show();
          $searchBoxField.focus().autocomplete("search", $searchBoxField.val());
        }
      });

      /**
       * Event Hook: Instantly hides the search box whenever the user's cursor leaves
       * the search text field, using a timeout delay loop to process selections securely first.
       */
      $searchBoxField.on('blur', function() {
        setTimeout(function() {
          var isFocusInsidePlugin = jQuery('.rgnrfs-multiselect-autocomplete-wrapper').find(':focus').length > 0 || jQuery('.ui-autocomplete:visible').find(':focus').length > 0;

          if( !isFocusInsidePlugin ){
            isSearchContainerActive = false;
            $searchBoxField.autocomplete("close");
            $searchBoxField.val('');
            $searchBoxWrapper.hide();
          }
        }, 200);
      });

      /**
       * Global Document Catch: If a user clicks completely outside the autocomplete field,
       * force the entire searching framework to collapse smoothly.
       */
      jQuery(document).on('click', function(event) {
        var $target = jQuery(event.target);
        if( !$target.closest('.rgnrfs-multiselect-autocomplete-wrapper').length && !$target.closest('.ui-autocomplete').length ){
          isSearchContainerActive = false;
          $searchBoxField.autocomplete("close");
          $searchBoxField.val('');
          $searchBoxWrapper.hide();
        }
      });

      /**
       * Initialize jQuery UI Autocomplete Widget Setup Rules
       */
      $searchBoxField.autocomplete({
        appendTo: ".rgnrfs-multiselect-autocomplete-wrapper",
        source: function(request, responseDataCallback){
          jQuery.ajax({
            url: ajaxurl,
            dataType: "json",
            data: {
              action: 'rgnrfs_event_outcomes_json',
              term: request.term
            },
            success: function(databaseResponsePayload){
              if( !databaseResponsePayload || databaseResponsePayload.length === 0 ){
                responseDataCallback([{
                  id: -1,
                  label: 'No results found',
                  value: '',
                  isNoResultsPlaceholder: true
                }]);
              } else {
                responseDataCallback(databaseResponsePayload);
              }
            }
          });
        },
        minLength: 0,
        focus: function(event, ui){
          return false;
        },
        select: function(event, ui){
          if (ui.item.isNoResultsPlaceholder){
            return false;
          }

          var activeSelectedIdList = getSanitizedSelectedIds();
          var targetedPostIdString = ui.item.id.toString();
          var existingIdPositionIndex = activeSelectedIdList.indexOf(targetedPostIdString);

          if( existingIdPositionIndex === -1 ){
            activeSelectedIdList.push(targetedPostIdString);
          } else {
            activeSelectedIdList.splice(existingIdPositionIndex, 1);
          }

          $idValueInput.val(activeSelectedIdList.join(','));

          var autocompleteWidgetInstance = $searchBoxField.autocomplete("instance");

          autocompleteWidgetInstance.menu.element.find('.ui-menu-item').each( function(){
            var singleRowData = jQuery(this).data("ui-autocomplete-item") || jQuery(this).data("item.autocomplete");
            if( singleRowData && singleRowData.id && singleRowData.id.toString() === targetedPostIdString ){
              jQuery(this).toggleClass('rgnrfs-multiselect-autocomplete-item-selected');
            }
          });

          $searchBoxField.focus();
          event.preventDefault();
          return false;
        },
        open: function(event, ui){
          var autocompleteMenuElement = jQuery(this).autocomplete("instance").menu.element;
          autocompleteMenuElement.outerWidth(jQuery(this).outerWidth());
        }
      });

      /**
       * Override default widget close routine method completely.
       */
      $searchBoxField.autocomplete("instance").close = function(event){
        if( isSearchContainerActive ){
          return false;
        }
        return jQuery.ui.autocomplete.prototype.close.apply(this, arguments);
      };

      /**
       * Custom Core Menu Renderer
       */
      $searchBoxField.autocomplete("instance")._renderItem = function(ulTargetElement, itemObjectPayload){
        var $listItemRow = jQuery("<li>");

        if( itemObjectPayload.isNoResultsPlaceholder ){
          $listItemRow.addClass("ui-state-disabled rgnrfs-multiselect-autocomplete-no-results");
          return $listItemRow.append("<div>" + itemObjectPayload.label + "</div>").appendTo(ulTargetElement);
        }

        var activeSelectedIdList = getSanitizedSelectedIds();
        if( activeSelectedIdList.indexOf(itemObjectPayload.id.toString()) !== -1 ){
          $listItemRow.addClass("rgnrfs-multiselect-autocomplete-item-selected");
        }

        return $listItemRow.append("<div>" + itemObjectPayload.label + " (" + itemObjectPayload.id + ")</div>").appendTo(ulTargetElement);
      };
    }

  });
};

jQuery(document).ready(function() {
  jQuery('[data-behaviour~=rgnrfs-multiselect-autocomplete]').rgnrfs_multiselect_autocomplete();
});
