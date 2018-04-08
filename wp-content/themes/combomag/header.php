<!DOCTYPE html>
<!--[if lt IE 7 ]>	<html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>		<html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>		<html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>		<html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
<link rel="profile" href="http://gmpg.org/xfn/11">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<!-- STYLESHEET INIT -->
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />

<!-- favicon.ico location -->
<?php
global $shortname, $option_upload_path, $option_upload_url;
if( file_exists( $option_upload_path . '/' . $shortname . '_fav_icon.jpg' ) ) { ?>
<link rel="icon" href="<?php echo $option_upload_url . '/' . $shortname . '_fav_icon.jpg'; ?>" type="images/x-icon" />
<?php } ?>

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>

<?php do_action( 'bp_head' ) ?>

<?php $header_code = get_theme_option('header_code'); echo stripcslashes($header_code); ?>

</head>

<body <?php body_class(); ?> id="custom">

<?php do_action( 'bp_before_wrapper' ) ?>

<div id="wrapper">

<div id="wrapper-main">

<div id="bodywrap" class="innerwrap">
<div id="bodycontent">

<?php do_action( 'bp_before_header' ) ?>
<!-- HEADER START -->
<header class="iegradient" id="header" role="banner">
<div class="header-inner">

<div id="header-top">
<div id="siteinfo">
<?php
global $shortname, $option_upload_path, $option_upload_url;
if( file_exists( $option_upload_path . '/' . $shortname . '_header_logo.jpg' ) ) { ?>
<a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo $option_upload_url . '/' . $shortname . '_header_logo.jpg'; ?>" alt="<?php bloginfo('name'); ?>" /></a>
<?php } else { ?>
<?php if( get_theme_option('custom_header_title') ): ?>
<h1 class="custom-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo stripcslashes( get_theme_option('custom_header_title') ); ?></a></h1><p id="site-description"><?php echo stripcslashes( get_theme_option('custom_header_text') ); ?></p>
<?php else: ?>
<h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1><p id="site-description"><?php bloginfo( 'description' ); ?></p>
<?php endif; ?>
<?php } ?>
</div><!-- SITEINFO END -->
<div id="header-right">

<?php $header_banner = get_theme_option('header_embed'); if($header_banner != '') : ?>
<!-- TOPBANNER -->
<div id="topbanner">
<?php echo get_theme_option('header_embed'); ?>
</div>
<!-- TOPBANNER END -->
<?php else: ?>
<div class="social-and-search">
<?php if(function_exists('get_my_custom_search_form')) { get_my_custom_search_form(); } ?>
<?php get_template_part( 'lib/templates/social-box' ); ?>
</div>
<?php endif; ?>

</div>

</div>

<div id="header-bottom">
<?php do_action( 'bp_before_nav' ) ?>
<!-- NAVIGATION START -->
<nav class="iegradient" id="main-navigation" role="navigation">
<?php if ( function_exists( 'wp_nav_menu' ) ) {  ?>
<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'sf-menu', 'fallback_cb' => 'revert_wp_menu_page','walker' => new Custom_Description_Walker )); ?>
<?php } ?>
<div id="mobile-nav">
<?php get_mobile_navigation( $type='top', $nav_name="primary" ); ?>
</div>
</nav>
<!-- NAVIGATION END -->
<?php do_action( 'bp_after_nav' ) ?>
</div>

</div><!-- end header-inner -->
</header>
<!-- HEADER END -->

<?php do_action( 'bp_after_header' ) ?>

<?php if( get_header_image() ): ?>
<div class="innerwrap-custom-header">
<div id="custom-img-header"><a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo header_image(); ?>" alt="" /></a></div>
</div>
<?php endif; ?>

<?php do_action( 'bp_before_container' ) ?>

<!-- CONTAINER START -->
<section id="container">
<div class="container-wrap">