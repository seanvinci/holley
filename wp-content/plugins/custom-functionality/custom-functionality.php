<?php
/**
 * Plugin Name:       Custom Functionality
 * Plugin URI:        
 * Description:       Custom functionality plugin
 * Version:           
 * Author:            Sean Vinci
 * Author URI:        https://github.com/seanvinci
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

 // If this file is called directly, abort.
if (!defined('WPINC')) { die; }

require_once('includes/custom-body-classes.php');
require_once('includes/clean-up-default-classes.php');
require_once('includes/clean-up-head.php');
require_once('includes/custom-acf-editor.php');
require_once('includes/custom-admin-pages.php');
require_once('includes/custom-content-editor.php');
require_once('includes/custom-login.php');
require_once('includes/custom-post-sorting.php');
require_once('includes/custom-video-embed-wrapper.php');
require_once('includes/custom-widgets.php');
require_once('includes/register-post-types.php');
require_once('includes/register-taxonomies.php');
require_once('includes/remove-default-image-linkage.php');

?>