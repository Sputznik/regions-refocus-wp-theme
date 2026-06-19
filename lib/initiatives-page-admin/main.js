jQuery(document).ready( function(){

  function toggleMetafieldBox(){
    var selectedTemplate = jQuery('#page_template').val();

    // rgnrfsData is an object passed from PHP
    if( selectedTemplate === rgnrfsData.targetTemplate ){
      jQuery(rgnrfsData.metaFieldBoxId).show();
    } else {
      jQuery(rgnrfsData.metaFieldBoxId).hide();
    }
  }

  // RUN ON PAGE LOAD
  toggleMetafieldBox();

  jQuery('#page_template').change(toggleMetafieldBox);
});


// SELECT MULTIPLE IMAGES
jQuery(document).ready( function(){
  var file_frame;

  jQuery('#initiatives-upload-btn').on('click', function(e){
    e.preventDefault();

    // CREATE MEDIA_FRAME IF IT DOESN'T EXISTS
    if( !file_frame ){
      file_frame = wp.media.frames.file_frame = wp.media({
        title: 'Select or Upload Images',
        button: { text: 'Use these images' },
        multiple: 'add'
      });

      // HANDLE NEW SELECTIONS
      file_frame.on('select', function(){
        var current_ids = [];
        var attachments = file_frame.state().get('selection').toJSON();

        // CLEAR EXISTING UI THUMBNAILS TO AVOID DUPLICATES, THEN REBUILD
        jQuery('.initiatives-gallery-thumbs').empty();

        attachments.forEach( function( attachment ){
          if( attachment.type === 'image' ){
            current_ids.push(attachment.id);

            var thumbUrl = attachment.sizes && attachment.sizes.thumbnail ? attachment.sizes.thumbnail.url : attachment.url;
            jQuery('.initiatives-gallery-thumbs').append(
            '<li data-id="' + attachment.id + '">' +
            '<img src="' + thumbUrl + '" />' +
            '<a href="#" class="initiatives-remove-image">&times;</a>' +
            '</li>'
            );
          }
        });

        jQuery('#initiatives-gallery-ids').val(current_ids.join(','));
      });
    }

    // PRE-SELECT PREVIOUSLY SELECTED IMAGES AND ADD INTO THE MODAL STATE
    file_frame.on('open', function() {
      var selection = file_frame.state().get('selection');
      var raw_ids   = jQuery('#initiatives-gallery-ids').val();

      // CLEAR ANY PREVIOUSLY ACTIVE TEMPORARY MODAL SELECTIONS
      selection.reset();

      if( raw_ids ){
        var ids_array = raw_ids.split(',');

        ids_array.forEach( function(id){
          // FETCH EXISTING WP ATTACHMENT OBJECT BY ID & ADD THEM BACK TO THE ACTIVE VIEW
          var attachment = wp.media.attachment(id);
          attachment.fetch();
          selection.add(attachment ? [attachment] : []);
        });
      }
    });

    // OPEN THE MODAL
    file_frame.open();
  });

  // DELETE-BUTTON
  jQuery(document).on('click', '.initiatives-remove-image', function(e){
    e.preventDefault();

    var li          = jQuery(this).closest('li');
    var idToRemove  = li.attr('data-id');
    var current_ids = jQuery('#initiatives-gallery-ids').val().split(',');

    current_ids = current_ids.filter( function(id){
      return id !== idToRemove;
    });

    jQuery('#initiatives-gallery-ids').val(current_ids.join(','));

    li.remove();
  });
});
