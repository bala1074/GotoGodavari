<?php
/* options css */
$header_image = get_header_image();
$bg_image = get_background_image();
$bg_color = get_background_color();
?>

<?php if( get_theme_option('body_font') == 'Choose a font' || get_theme_option('body_font') == '') { ?>
body { font-family: Open Sans, arial, sans-serif; }
<?php } else { ?>
body { font-family: <?php echo get_theme_option('body_font'); ?> !important; }
<?php } ?>

<?php if( get_theme_option('headline_font') == 'Choose a font' || get_theme_option('headline_font') == '') { ?>
h1,h2,h3,h4,h5,h6,.header-title,#main-navigation, #featured #featured-title, #cf .tinput, #wp-calendar caption,.flex-caption h1,#portfolio-filter li,.nivo-caption a.read-more,.form-submit #submit,.fbottom,ol.commentlist li div.comment-post-meta, .home-post span.post-category a,ul.tabbernav li a {
font-family: Open Sans, arial, sans-serif; }
<?php } else { ?>
h1,h2,h3,h4,h5,h6,.header-title,#main-navigation, #featured #featured-title, #cf .tinput, #wp-calendar caption,.flex-caption h1,#portfolio-filter li,.nivo-caption a.read-more,.form-submit #submit,.fbottom,ol.commentlist li div.comment-post-meta, .home-post span.post-category a,ul.tabbernav li a {
font-family:  <?php echo get_theme_option('headline_font'); ?> !important; }
<?php } ?>

<?php if( get_theme_option('navigation_font') == 'Choose a font' || get_theme_option('navigation_font') == '') { ?>
#main-navigation, .sf-menu li a {font-family: Open Sans, arial, sans-serif;}
<?php } else { ?>
#main-navigation, .sf-menu li a { font-family:  <?php echo get_theme_option('navigation_font'); ?> !important; }
<?php } ?>

<?php if($bg_color): ?>
#post-entry article.home-post {border: 1px solid #<?php echo $bg_color; ?>;}
.widget-area aside {border-right: 1px solid #<?php echo $bg_color; ?>;border-bottom: 1px solid #<?php echo $bg_color; ?>;border-left: 1px solid #<?php echo $bg_color; ?>;}
<?php endif; ?>

<?php if( get_theme_option('nav_main_color') != '' ) { $nav_main_color = get_theme_option('nav_main_color'); ?>
#main-navigation {
background: <?php echo $nav_main_color; ?>;
background: -moz-linear-gradient(top,  <?php echo $nav_main_color; ?> 0%, <?php echo dehex($nav_main_color, -20); ?> 100%);background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,<?php echo $nav_main_color; ?>), color-stop(100%,<?php echo dehex($nav_main_color, -20); ?>));background: -webkit-linear-gradient(top,  <?php echo $nav_main_color; ?> 0%,<?php echo dehex($nav_main_color, -20); ?> 100%);background: -o-linear-gradient(top,  <?php echo $nav_main_color; ?> 0%,<?php echo dehex($nav_main_color, -20); ?> 100%);background: -ms-linear-gradient(top,  <?php echo $nav_main_color; ?> 0%,<?php echo dehex($nav_main_color, -20); ?> 100%);background: linear-gradient(to bottom,  <?php echo $nav_main_color; ?> 0%,<?php echo dehex($nav_main_color, -20); ?> 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $nav_main_color; ?>', endColorstr='<?php echo dehex($nav_main_color, -20); ?>',GradientType=0 ); }
.sf-menu a {color: #fff;border-right: 1px solid <?php echo dehex($nav_main_color, -25); ?>;}
.sf-menu li li a { color: <?php echo dehex($nav_main_color, 70); ?> !important; }
.sf-menu a span.menu-decsription {color: #fff;}
.sf-menu ul  {background: <?php echo dehex($nav_main_color, -15); ?> none !important;box-shadow: 0 2px 3px <?php echo dehex($nav_main_color, -50); ?>;}
.sf-menu li li,.sf-menu li li li {border-bottom: 1px solid <?php echo dehex($nav_main_color, -25); ?> !important;}
<?php } ?>

<?php if( get_theme_option('nav_sec_color') != '' ) { $nav_sec_color = get_theme_option('nav_sec_color'); ?>
.sf-menu .current_page_item a, .sf-menu .current_menu_item a, .sf-menu .current-menu-item a,.sf-menu .current_page_item a:hover, .sf-menu .current_menu_item a:hover, .sf-menu .current-menu-item a:hover {background: <?php echo $nav_sec_color; ?>;background: -moz-linear-gradient(top,  <?php echo $nav_sec_color; ?> 0%, <?php echo dehex($nav_sec_color, -20); ?> 100%);background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,<?php echo $nav_sec_color; ?>), color-stop(100%,<?php echo dehex($nav_sec_color, -20); ?>));background: -webkit-linear-gradient(top,  <?php echo $nav_sec_color; ?> 0%,<?php echo dehex($nav_sec_color, -20); ?> 100%);background: -o-linear-gradient(top,  <?php echo $nav_sec_color; ?> 0%,<?php echo dehex($nav_sec_color, -20); ?> 100%);background: -ms-linear-gradient(top,  <?php echo $nav_sec_color; ?> 0%,<?php echo dehex($nav_sec_color, -20); ?> 100%);background: linear-gradient(to bottom,  <?php echo $nav_sec_color; ?> 0%,<?php echo dehex($nav_sec_color, -20); ?> 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $nav_sec_color; ?>', endColorstr='<?php echo dehex($nav_sec_color, -20); ?>',GradientType=0 ); }.sf-menu a {color: #fff;border-right: 1px solid <?php echo dehex($nav_sec_color, -25); ?>;}
<?php } ?>


<?php if( get_theme_option('link_color') != '' ) { $link_color = get_theme_option('link_color'); ?>
span.single-post-category {background: none repeat scroll 0 0 <?php echo $link_color; ?>;}
.post-nav-archive a, #commentpost a,#author-bio a,#post-entry .post-content a, #post-entry article h1.post-title a:hover,#post-entry article .post-meta a:hover,#right-sidebar aside li a:hover, #right-sidebar aside div a:hover,#right-sidebar table a,#right-sidebar .twitterbox a { color: <?php echo $link_color; ?>; }
#commentpost small a { color: #888 !important; }.wp-pagenavi .current {background: none repeat scroll 0 0 <?php echo $link_color; ?>;border: 1px solid <?php echo $link_color; ?>;}
<?php } ?>


<?php if( get_theme_option('sidebar_color') != '' ) { $sidebar_color = get_theme_option('sidebar_color');?>
#right-sidebar h3.widget-title, ul.tabbernav {background: <?php echo $sidebar_color; ?>;background: -moz-linear-gradient(top,  <?php echo $sidebar_color; ?> 0%, <?php echo dehex($sidebar_color, -20); ?> 100%);background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,<?php echo $sidebar_color; ?>), color-stop(100%,<?php echo dehex($sidebar_color, -20); ?>));background: -webkit-linear-gradient(top,  <?php echo $sidebar_color; ?> 0%,<?php echo dehex($sidebar_color, -20); ?> 100%);background: -o-linear-gradient(top,  <?php echo $sidebar_color; ?> 0%,<?php echo dehex($sidebar_color, -20); ?> 100%);background: -ms-linear-gradient(top,  <?php echo $sidebar_color; ?> 0%,<?php echo dehex($sidebar_color, -20); ?> 100%);background: linear-gradient(to bottom,  <?php echo $sidebar_color; ?> 0%,<?php echo dehex($sidebar_color, -20); ?> 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $sidebar_color; ?>', endColorstr='<?php echo dehex($sidebar_color, -20); ?>',GradientType=0 );border: 1px solid <?php echo dehex($sidebar_color,-5); ?>; }
ul.tabbernav li.tabberactive a,ul.tabbernav li.tabberactive a:hover{background-color: <?php echo dehex($sidebar_color,-20); ?>;}
ul.tabbernav li a,ul.tabbernav li a:hover{border-right: 1px solid <?php echo dehex($sidebar_color,-20); ?>;}
<?php } ?>

<?php
if( get_theme_option('footer_color') != '' ) {
$footer_color = get_theme_option('footer_color'); ?>
#custom .footer-top {background-color: <?php echo $footer_color; ?>;}
#custom .footer-bottom {background-color: <?php echo dehex($footer_color,-20); ?>;}
footer .ftop a, #custom .fbottom a {color: #fff;}
footer .textwidget a, footer .twitterbox a {color: <?php echo dehex($footer_color,60); ?> !important;}
#custom footer .ftop a:hover, #custom .fbottom a:hover {text-decoration:underline !important;color: #fff;}
footer { text-shadow: 0 1px 1px <?php echo dehex($footer_color,-20); ?>; }
.ftop .widget caption { background: <?php echo dehex($footer_color,-20); ?> !important; }
footer .ftop h3.widget-title  {color: <?php echo dehex($footer_color,60); ?>;}
.fbottom, .ftop, .ftop div.textwidget {color: #FFFFFF;}
div.fbox.last {background-color:<?php echo dehex($footer_color,3); ?>;}
<?php } ?>