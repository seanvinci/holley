<?php

// Customizations to login page

// Custom logo URL
function myLoginLogoUrl() {
  return site_url();
}
add_filter( 'login_headerurl', 'myLoginLogoUrl' );

// Custom logo title
function myLoginLogoTitle() {
  return get_bloginfo();
}
add_filter( 'login_headertitle', 'myLoginLogoTitle' );

function login_checked_remember_me() {
  add_filter( 'login_footer', 'rememberme_checked' );
}
add_action( 'init', 'login_checked_remember_me' );

function rememberme_checked() {
  echo "<script>document.getElementById('rememberme').checked = true;</script>";
}

?>