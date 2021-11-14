<?php

add_filter( 'acf/fields/wysiwyg/toolbars' , 'my_toolbars' );
function my_toolbars( $toolbars ) {

  $toolbars['Basic'] = array();
  $toolbars['Basic'][1] = array(
    'bold',
    'italic',
    'underline',
    'strikethrough',
    'link',
    'unlink',
    'undo',
    'redo'
  );

  $toolbars['No Alignment'] = array();
  $toolbars['No Alignment'][1] = array(
    'formatselect',
    'bold',
    'italic',
    'underline',
    'strikethrough',
    'blockquote',
    'link',
    'unlink',
    'hr',
    'undo',
    'redo'
  );

  $toolbars['No Headers'] = array();
  $toolbars['No Headers'][1] = array(
    'bold',
    'italic',
    'underline',
    'strikethrough',
    'bullist',
    'numlist',
    'blockquote',
    'link',
    'unlink',
    'alignleft',
    'aligncenter',
    'alignright',
    'hr',
    'undo',
    'redo'
  );

  return $toolbars;
}

?>