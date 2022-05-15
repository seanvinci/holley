<?php

add_filter('body_class','my_class_names');

function my_class_names($classes) {

  global $post;
  $arr = array();
  $arr[] = 'preload';

  // Home Page
  if (is_front_page()) {
    $arr[] = 'home';
  } else {
    $arr[] = $post->post_name;
  }

  return $arr;

} ?>