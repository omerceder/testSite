<?php

// Meta Box Class: ProductImageGalleryMetaBox
// Get the field value: $metavalue = get_post_meta( $post_id, $field_id, true );
class ProductImageGalleryMetaBox extends MetaBoxGenerator{
  public function __construct(...$args) {
      parent:: __construct(...$args);
      add_action( 'admin_footer', array( $this, 'media_fields' ) );
  }

  public function media_fields() {
      ?><script>
          jQuery(document).ready(function($){
              if ( typeof wp.media !== 'undefined' ) {
                  var _custom_media = true,
                  _orig_send_attachment = wp.media.editor.send.attachment;
                  $('.new-media').click(function(e) {
                      var send_attachment_bkp = wp.media.editor.send.attachment;
                      var button = $(this);
                      var id = button.attr('id').replace('_button', '');
                      _custom_media = true;
                          wp.media.editor.send.attachment = function(props, attachment){
                          if ( _custom_media ) {
                              if ($('input#' + id).data('return') == 'url') {
                                  $('input#' + id).val(attachment.url);
                              } else {
                                  $('input#' + id).val(attachment.id);
                              }
                              $('div#preview'+id).css('background-image', 'url('+attachment.url+')');
                          } else {
                              return _orig_send_attachment.apply( this, [props, attachment] );
                          };
                      }
                      wp.media.editor.open(button);
                      return false;
                  });
                  $('.add_media').on('click', function(){
                      _custom_media = false;
                  });
                  $('.remove-media').on('click', function(){
                      var parent = $(this).parents('td');
                      parent.find('input[type="text"]').val('');
                      parent.find('div').css('background-image', 'url()');
                  });
              }
          });
      </script><?php
  }
}

if (class_exists('ProductImageGalleryMetabox')) {
	new ProductImageGalleryMetabox(
    array('product'),
    array(
                  array(
                      'label' => 'Image 1',
                      'id' => '11',
                      'type' => 'media',
                      'returnvalue' => 'url'
                  ),

                  array(
                      'label' => 'Image 2',
                      'id' => '12',
                      'type' => 'media',
                      'returnvalue' => 'url'
                  ),

                  array(
                      'label' => 'Image 3',
                      'id' => '13',
                      'type' => 'media',
                      'returnvalue' => 'url'
                  ),

                  array(
                      'label' => 'Image 4',
                      'id' => '14',
                      'type' => 'media',
                      'returnvalue' => 'url'
                  ),

                  array(
                      'label' => 'Image 5',
                      'id' => '15',
                      'type' => 'media',
                      'returnvalue' => 'url'
                  ),

                  array(
                      'label' => 'Image 6',
                      'id' => '16',
                      'type' => 'media',
                      'returnvalue' => 'url'
                  )
  	),
    'Product Image Gallery',
    'ProductImageGallery',
    'wptest',
    'side',
    'default'
  );
};
