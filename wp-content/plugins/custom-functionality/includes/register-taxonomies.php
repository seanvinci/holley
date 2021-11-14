<?php

/**
 * Register custom taxonomies
 */

// Create 'Division' taxonomy
// function create_taxonomy_division() {
//   $labels = array(
//     'name'                       => __( 'Division' ),
//     'singular_name'              => __( 'Division' ),
//     'search_items'               => __( 'Search Divisions' ),
//     'popular_items'              => __( 'Popular Divisions' ),
//     'all_items'                  => __( 'All Divisions' ),
//     'parent_item'                => null,
//     'parent_item_colon'          => null,
//     'edit_item'                  => __( 'Edit Division' ),
//     'update_item'                => __( 'Update Division' ),
//     'add_new_item'               => __( 'Add New Division' ),
//     'new_item_name'              => __( 'New Division Name' ),
//     'separate_items_with_commas' => __( 'Separate Divisions with commas' ),
//     'add_or_remove_items'        => __( 'Add or remove Divisions' ),
//     'choose_from_most_used'      => __( 'Choose from the most used Divisions' ),
//     'not_found'                  => __( 'No Divisions found.' ),
//     'menu_name'                  => __( 'Divisions' ),
//   );
//   $args = array(
//     'hierarchical'               => false,
//     'labels'                     => $labels,
//     'show_admin_column'          => true,
//     'update_count_callback'      => '_update_post_term_count',
//     'rewrite'                    => array( 'slug' => 'division' ),
//   );
//   register_taxonomy( 'division', array('course', 'event', 'faculty', 'landing', 'profile'), $args );
// }
// add_action( 'init', 'create_taxonomy_division', 0 );



// Remove Meta Boxes
function remove_meta_boxes() {
  // Courses meta boxes
  // remove_meta_box('revisionsdiv', 'course', 'normal');
  // remove_meta_box('tagsdiv-division', 'course', 'side');
  // remove_meta_box('tagsdiv-location', 'course', 'side');
  // remove_meta_box('tagsdiv-program', 'course', 'side');
  // remove_meta_box('tagsdiv-topic', 'course', 'side');
  // remove_meta_box('tagsdiv-type', 'course', 'side');

  // Remove template metabox from Home page
  if( isset( $_GET, $_GET['post'] ) && 1948 == $_GET['post'] ) {
    remove_meta_box( 'pageparentdiv', 'page', 'side' );
  }



}
add_action( 'admin_menu', 'remove_meta_boxes' );

?>