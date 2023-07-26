<?php

/*******************************/
/**** CUSTOMIZE ADMIN PAGES ****/
/*******************************/


// Remove WP logo from admin nav bar
function annointed_admin_bar_remove() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('wp-logo');
}
add_action('wp_before_admin_bar_render', 'annointed_admin_bar_remove', 0);

// Remove comments icon from admin nav bar
function my_admin_bar_render() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'my_admin_bar_render' );

/* Disable WordPress Admin Bar for all users */
add_filter( 'show_admin_bar', '__return_false' );

/* REMOVE ADMIN PAGES */

// Hide Admin Menu Items
function hide_menu() {

  // Hide for all user types
  remove_menu_page('index.php');          // Dashboard
  remove_menu_page('jetpack');            // Jetpack*
  remove_menu_page('edit.php');           // Posts
  remove_menu_page('edit-comments.php');  // Comments

  // Hide for all non-admin users
  if (!current_user_can('administrator')) {
    remove_menu_page('edit.php?post_type=acf-field-group');  // Advanced Custom Fields
    remove_menu_page('plugins.php');                         // Plugins
    remove_menu_page('users.php');                           // Users
    remove_menu_page('options-general.php');                 // Settings
    remove_menu_page('tools.php');                           // Tools
  }

  // Hide for editor user type
  if (current_user_can('editor')) {
    remove_submenu_page('themes.php', 'themes.php');         // Themes
    remove_submenu_page('themes.php', 'nav-menus.php');      // Menus
    remove_submenu_page('themes.php', 'theme-editor.php');   // Theme Editor
  }
}
add_action('admin_head', 'hide_menu');



// Hide customize sub menu in appearance menu for all users
function remove_header_and_bg(){
  global $submenu;
  unset($submenu['themes.php'][6]); // customize
  unset($submenu['themes.php'][15]); // header_image
  unset($submenu['themes.php'][20]); // background_image
}
add_action( 'admin_menu', 'remove_header_and_bg', 999 );


// Reorder menu items
function custom_menu_order($menu_ord) {
  if (!$menu_ord) return true;
  return array(
    'edit.php?post_type=news',     // News
    'edit.php?post_type=page',     // Pages
    'upload.php',                  // Media
    'plugins.php',                 // Plugins
    'themes.php',                  // Appearance
    'users.php',                   // Users
    'options-general.php',         // Settings
    'tools.php',                   // Tools
  );
}
add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
add_filter('menu_order', 'custom_menu_order');


// Disable the user admin bar on public side on registration
add_action('user_register','trash_public_admin_bar');
function trash_public_admin_bar($user_ID) {
  update_user_meta( $user_ID, 'show_admin_bar_front', 'false' );
}

/**
 * Remove Appearance > Themes and Appearance > Theme Editor admin menu items
 */

function custom_remove_menu_items() {
  // remove_submenu_page( 'themes.php', 'themes.php' );
  remove_submenu_page( 'themes.php', 'theme-editor.php' );
  remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
}
add_action( 'admin_menu', 'custom_remove_menu_items', 999 );

?>