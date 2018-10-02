<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
  <?php if(is_front_page()): ?>
    <title><?= get_bloginfo( 'name' ); ?></title>
  <?php else: ?>
    <title><?php wp_title( '|', true, 'right' ); ?><?= get_bloginfo( 'name' ); ?></title>
  <?php endif; ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, user-scalable=no" />
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
