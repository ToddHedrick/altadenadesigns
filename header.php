<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Altadena
 * @since Altadnena 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
    <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width">
        <meta name="keywords" content="Altadena, woodworking, furniture, cabinets, custom woodworking, custom furniture, custom cabinets, altadena designs">
        <meta name="description" content="<?php bloginfo('name'); ?> <?php bloginfo('description'); ?>">
        <title><?php bloginfo('name') ?><?php wp_title('|', true, 'left'); ?></title>
        <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/functions.js"></script>
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <noscript>JavaScript is not active in your browser</noscript>
        <div id="page">
            <div id="border">
                <div id="container">
                    <header id="masthead" class="site-header" role="banner">
                        <div id="header">
                            <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
                            <span class="site-title" style="color: #<?php header_textcolor(); ?>;"><?php bloginfo('name'); ?></span> <span class="site-description" style="color: #<?php header_textcolor(); ?>;"><?php bloginfo('description'); ?></span>
                            <br>
                            <span class="page-title" style="color: #<?php header_textcolor(); ?>"><?php wp_title(); ?></span>
                        </div>
                    </header>
                    <div id="nav">
                        <nav>
                            <?php menu_items(); ?>
                        </nav>
                    </div><!-- nav -->
                    <div id="main">