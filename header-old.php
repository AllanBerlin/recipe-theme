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

  <link rel="dns-prefetch" href="//fonts.googleapis.com">

  <link rel="dns-prefetch" href="//www.google-analytics.com">

  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <meta name="robots" content="index, follow" />

  <meta name="referrer" content="always" />

  <link rel="profile" href="http://gmpg.org/xfn/11">

  <?php wp_head(); ?>

  <?php if( get_theme_mod('recipe_main_google_font_list') ): ?>

    <!--Customizer CSS-->
    <style type="text/css">
      body {--body-font:<?php echo '"' . get_theme_mod('recipe_main_google_font_list') . '"'; ?>, sans-serif;}
    </style>
    <!--/Customizer CSS-->

  <?php endif; ?>

</head>

<body <?php body_class('layout'); ?>>

  <div class="page-wrapper">

    <header id="masthead" class="layout-header" role="banner">

      <div class="header-container layout-module">

        <div class="mobile-logo">

          <a href='<?php echo esc_url(home_url('/')); ?>' title='<?php echo esc_attr(get_bloginfo('name', 'display')); ?>' rel='home'>

            <?php if (get_theme_mod('recipe_logo')) : ?>

              <img class="logo" src='<?php echo esc_url(get_theme_mod('recipe_logo')); ?>' alt='<?php echo esc_attr(get_bloginfo('name', 'display')); ?>'>

            <?php else: ?>

              <span class="logo"><?php echo get_bloginfo('name'); ?></span>

            <?php endif; ?>
          </a>

        </div>

        <button type="button" class="menu-toggle"><span></span><span></span><span></span></button>

        <nav class="main-navigation" role="navigation">

          <?php
          $menuLocations = get_nav_menu_locations();
          $menuID = $menuLocations['primary'];
          $secondMenuID = $menuLocations['secondary'];
          $primaryNav = wp_get_nav_menu_items($menuID);
          $secondaryNav = wp_get_nav_menu_items($secondMenuID);

          $subNav = [];

          // pull all child menu items into separate object
          foreach ($primaryNav as $key => $navItem) {
            if ($navItem->menu_item_parent) {
              array_push($subNav, $navItem);
              unset($primaryNav[$key]);
            }
          }

          // push child items into their parent item in the original object
          foreach ($primaryNav as $navItem) {
            foreach ($subNav as $key => $child) {
              if ($child->menu_item_parent == $navItem->post_name) {
                if (!$navItem->child_items) {
                  $navItem->child_items = [];
                }

                array_push($navItem->child_items, $child);
                unset($subNav[$key]);
              }
            }
          }

          ?>

          <ul class="menu-list">

            <?php foreach ( $primaryNav as $primaryNavItem ):
              $navItemTitle = $primaryNavItem->title;
              $navLink = recipe_remove_special_chars( $navItemTitle );

              ?>

              <li class="menu-item<?php if( $subNav[0]->menu_item_parent == $primaryNavItem->object_id ) echo ' has-children'; ?>">

                <button type="button" class="menu-link" data-link="<?php echo $navLink; ?>" title="<?php echo $navItemTitle; ?>" aria-label="<?php echo $navItemTitle; ?>"><?php echo $navItemTitle; ?></button>

                <?php if( $subNav[0]->menu_item_parent == $primaryNavItem->object_id ): ?>

                  <ul class="submenu">

                    <?php foreach ( $subNav as $subNavNavItem ):
                      $subNavItemTitle = $subNavNavItem->title;
                      $subNavLink = recipe_remove_special_chars( $subNavItemTitle );

                      ?>

                      <li class="submenu-item">

                        <button type="button" class="menu-link" data-link="<?php echo $subNavLink; ?>" title="<?php echo $subNavItemTitle; ?>" aria-label="<?php echo $subNavItemTitle; ?>"><?php echo $subNavItemTitle; ?></button>

                      </li>

                    <?php endforeach; ?>

                  </ul>

                <?php endif; ?>

              </li>

            <?php endforeach; ?>

          </ul>

          <div class="logo-container">

            <a href='<?php echo esc_url(home_url('/')); ?>' title='<?php echo esc_attr(get_bloginfo('name', 'display')); ?>' rel='home'>

              <?php if (get_theme_mod('recipe_logo')) : ?>

                <img class="logo" src='<?php echo esc_url(get_theme_mod('recipe_logo')); ?>' alt='<?php echo esc_attr(get_bloginfo('name', 'display')); ?>'>

              <?php else: ?>

                <span class="logo"><?php echo get_bloginfo('name'); ?></span>

              <?php endif; ?>
            </a>

          </div>

          <ul class="menu-list secondary">

            <?php foreach ( $secondaryNav as $secondNavItem ):
              $secondNavItemTitle = $secondNavItem->title;
              $secondNavLink = recipe_remove_special_chars( $secondNavItemTitle );

              ?>

              <li class="menu-item">

                <button type="button" class="menu-link" data-link="<?php echo $secondNavLink; ?>" title="<?php echo $secondNavItemTitle; ?>" aria-label="<?php echo $secondNavItemTitle; ?>"><?php echo $secondNavItemTitle; ?></button>

              </li>

            <?php endforeach; ?>

          </ul>

        </nav>

      </div>

    </header>

    <div class="site">

      <div class="site-content">