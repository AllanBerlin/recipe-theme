<?php

/**

 * The header for our theme.

 *

 * This is the template that displays all of the <head> section and everything up until <div id="content">

 *

 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials

 *

 * @package recipe

 */



?><!DOCTYPE html>

<html class="landing" lang="en-EN">

<head>

  <meta charset="<?php bloginfo( 'charset' ); ?>">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta http-equiv="x-dns-prefetch-control" content="on">

  <meta name="description" content="Lola & The Bean - a Berlin-based creative agency. We specialise in all aspects of media production." />

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <meta name="robots" content="index, follow" />

  <meta name="referrer" content="always" />

  <link rel="profile" href="http://gmpg.org/xfn/11">

  <?php wp_head(); ?>

  <?php if( get_theme_mod('primary_colour') ): ?>

    <!--Customizer CSS-->
    <style type="text/css">
      body {
        --primary-colour: <?php echo get_theme_mod('primary_colour'); ?>;
        --second-colour: <?php echo get_theme_mod('second_colour'); ?>;
        --third-colour: <?php echo get_theme_mod('third_colour'); ?>;
        --fourth-colour: <?php echo get_theme_mod('fourth_colour'); ?>;
      }
    </style>
    <!--/Customizer CSS-->

  <?php endif; ?>

</head>

<body <?php body_class('layout'); ?>>

  <header id="masthead" class="layout-header" role="banner">

    <div class="header-container layout-module">

      <a href='<?php echo esc_url( home_url( '/' ) ); ?>' class="logo-link" title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>

        <div class="logo-container">

          <?php if ( get_theme_mod('custom_logo') ) :
            $customLogoID = get_theme_mod( 'custom_logo' );
            $image = wp_get_attachment_image_src( $customLogoID , 'full' );

            ?>

            <img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" class="logo" alt="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>" />

          <?php else: ?>

            <span class="logo"><?php echo get_bloginfo('name'); ?></span>

          <?php endif; ?>

        </div>

      </a>

      <?php if( is_front_page() ): ?>

        <button type="button" class="menu-toggle"><span></span><span></span><span></span></button>

        <nav class="main-navigation" role="navigation">

          <ul class="menu-list">

            <?php
            $menuLocations = get_nav_menu_locations();
            $menuID = $menuLocations['primary'];
            $primaryNav = wp_get_nav_menu_items( $menuID );

            foreach ( $primaryNav as $navItem ): ?>

              <li class="menu-item">

                <a href="<?php echo $navItem->url; ?>" class="menu-link" title="<?php echo $navItem->title; ?>"><?php echo $navItem->title; ?></a>

              </li>

            <?php endforeach; ?>

          </ul>

        </nav>

      <?php endif; ?>

    </div>

  </header>

  <div class="page-wrapper">

    <div class="site">

      <div class="site-content">