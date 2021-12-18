<?php

add_filter('body_class','my_class_names');

function my_class_names($classes) {

  global $post;
  $arr = array();
  $arr[] = 'preload';

  // Home Page
  if (is_front_page()) $arr[] = 'home';

  // Media Page
  if (is_page('media')) $arr[] = 'media';

  return $arr;

} ?>