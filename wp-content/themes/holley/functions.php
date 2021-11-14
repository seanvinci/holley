<?php

// Enable and register menus
add_theme_support('menus');
function register_theme_menus() {
  register_nav_menus(
    array(
      'primary-nav'       => __('Primary Nav'),
      'precollege-nav'    => __('Pre-College Nav'),
      'gapyear-nav'       => __('Gap Year Nav'),
      'professional-nav'  => __('Professional Nav'),
      'admissions-nav'    => __('Admissions Nav'),
      'about-nav'         => __('About Nav'),
      'support-nav'       => __('Support Nav'),
      'community-nav'     => __('Community Nav'),
      'features-nav'      => __('Features Nav')
    )
  );
}
add_action('init', 'register_theme_menus');


// Enable Featured Images
if (function_exists('add_image_size')) add_theme_support('post-thumbnails');


// Hide WP update alerts for non-admins
function show_updated_only_to_admins() {
  if (!current_user_can('update_core')) {
    remove_action( 'admin_notices', 'update_nag', 3 );
    remove_action( 'network_admin_notices', 'update_nag', 3 ); 
  }
}
add_action( 'admin_head', 'show_updated_only_to_admins', 1 );


// Hide private posts when logged in
function no_private_posts($where) {
  if (is_admin() || is_single()) return $where;
  global $wpdb;
  return " $where AND {$wpdb->posts}.post_status != 'private' ";
}
add_filter('posts_where', 'no_private_posts');


/**
 * This function will connect wp_mail to your authenticated
 * SMTP server. This improves reliability of wp_mail, and 
 * avoids many potential problems.
 * 
 * Values are constants set in wp-config.php
 */

add_action( 'phpmailer_init', 'send_smtp_email' );
function send_smtp_email( $phpmailer ) {
  $phpmailer->isSMTP();
  $phpmailer->Host       = SMTP_HOST;
  $phpmailer->SMTPAuth   = SMTP_AUTH;
  $phpmailer->Port       = SMTP_PORT;
  $phpmailer->Username   = SMTP_USER;
  $phpmailer->Password   = SMTP_PASS;
  $phpmailer->SMTPSecure = SMTP_SECURE;
  $phpmailer->From       = SMTP_FROM;
  $phpmailer->FromName   = SMTP_NAME;
}


// CSS & JS LINKAGE

// Link CSS files

// Custom styles for login page
function custom_login_styles() {
  wp_enqueue_style('login-styles', get_template_directory_uri() . '/css/custom-login.css');
}
add_action( 'login_enqueue_scripts', 'custom_login_styles' );

// Custom styles for CMS
function custom_admin_styles() {
  wp_enqueue_style('admin-styles', get_template_directory_uri() . '/css/custom-admin.css');
}
add_action('admin_enqueue_scripts', 'custom_admin_styles');

// All other CSS files
function nytedu_theme_styles() {
  wp_dequeue_style('wp-block-library');
  wp_enqueue_style('normalize', get_template_directory_uri().'/css/normalize.custom.min.css');
  wp_enqueue_style('foundation', get_template_directory_uri().'/css/foundation.custom.min.css');
  wp_enqueue_style('main', get_template_directory_uri().'/css/main.css');
}
add_action('wp_enqueue_scripts', 'nytedu_theme_styles');

// Link JS files
function nytedu_theme_js() {
  wp_deregister_script('jquery');
  wp_deregister_script('wp-embed');
  wp_enqueue_script('jquery', get_template_directory_uri()."/js/jquery-1.12.4.min.js", false, null, true);
  wp_enqueue_script('validate_js', get_template_directory_uri().'/js/jquery.validate.min.js', array('jquery'), '', true );
  wp_enqueue_script('main_js', get_template_directory_uri().'/js/main.js', array('jquery'), '', true );
  wp_enqueue_script('fitvids_js', get_template_directory_uri().'/js/jquery.fitvids.js', array('jquery'), '', true );
}
add_action('wp_enqueue_scripts', 'nytedu_theme_js');