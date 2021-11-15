<?php
/**
 * Register custom post types
 */

// Create 'News' post type
function create_post_type_news() {
  $labels = array(
    'name'                 => __( 'News' ),
    'singular_name'        => __( 'News' ),
    'add_new'              => __( 'Add News Post' ),
    'add_new_item'         => __( 'Add News Post' ),
    'edit_item'            => __( 'Edit News Post' ),
    'new_item'             => __( 'New News Post' ),
    'all_items'            => __( 'All News Posts' ),
    'view_item'            => __( 'View News Post' ),
    'search_items'         => __( 'Search News Posts' ),
    'not_found'            => __( 'No News Posts found' ),
    'not_found_in_trash'   => __( 'No News Posts found in the Trash' ),
    'parent_item_colon'    => '',
    'menu_name'            => 'News'
  );
  $args = array(
    'labels'               => $labels,
    'description'          => 'Holds our News Posts',
    'public'               => true,
    'rewrite'              => array('slug' => 'news'),
    'has_archive'          => true,
    'menu_position'        => 4,
    'menu_icon'            => 'dashicons-text',
    'supports'             => array( 'title', 'editor', 'excerpt', 'thumbnail'),
  );
  register_post_type( 'news', $args );
}
add_action( 'init', 'create_post_type_news' );



// Custom Messages
function custom_messages( $messages ) {
  global $post, $post_ID;
  $messages['news'] = array(
    0 => '', 
    1 => sprintf( __('News Post updated. <a href="%s">View Post</a>'), esc_url( get_permalink($post_ID) ) ),
    4 => __('News Post updated.'),
    5 => isset($_GET['revision']) ? sprintf( __('News Post restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('News Post published. <a href="%s">View Post</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('News Post saved.'),
    8 => sprintf( __('News Post submitted. <a target="_blank" href="%s">Preview Post</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('News Post scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Post</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('News Post draft updated. <a target="_blank" href="%s">Preview Post</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
}
add_filter( 'post_updated_messages', 'custom_messages' );

?>