<?php

add_filter('body_class','my_class_names');

function my_class_names($classes) {

  // Home
  if (is_front_page()) $arr[] = 'home';

  return $arr;

} ?>