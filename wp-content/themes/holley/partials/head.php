<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="referrer" content="always">
<?php
// Page Title
echo '<title>';
if ($post_type) echo get_post_type_object($post_type)->labels->name;
elseif (get_the_title()) echo get_the_title();
if (!is_front_page()) echo ' | '.get_bloginfo('name');
echo '</title>'; ?>

<?php if (get_bloginfo('description')) echo '<meta name="description" content="' . get_bloginfo('description') . '" />'; ?>

<?php
wp_head();
include_once('favicons.php');
include_once('social-meta.php'); ?>
</head>
<body>
