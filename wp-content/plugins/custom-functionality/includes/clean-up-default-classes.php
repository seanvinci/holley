<?php

// Turn off default WP classes
function discard_menu_classes($classes, $item) {
  return (array)get_post_meta( $item->ID, '_menu_item_classes', true );
}
add_filter('nav_menu_css_class', 'discard_menu_classes', 10, 2);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {
  return is_array($var) ? array() : '';
}

?>