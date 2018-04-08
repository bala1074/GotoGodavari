<?php $get_google_code = get_theme_option('adsense_right_sidebar'); if($get_google_code != '') { ?>
<aside class="widget" id="ctr-ad">
<h3 class="widget-title"><?php _e('Advertisement',TEMPLATE_DOMAIN); ?></h3>
<div class="textwidget"><?php echo stripcslashes($get_google_code); ?></div>
</aside>
<?php } ?>

<?php $header_banner = get_theme_option('header_embed'); if($header_banner != '') : ?>
<?php if( !is_active_widget( false, false, 'search' ) ) { ?>
<aside class="widget">
<h3 class="widget-title"><?php _e('Search',TEMPLATE_DOMAIN); ?></h3>
<?php get_search_form(); ?>
</aside>
<?php } ?>
<aside class="widget">
<h3 class="widget-title"><?php _e('Stay Update',TEMPLATE_DOMAIN); ?></h3>
<div class="textwidget">
<?php get_template_part( 'lib/templates/social-box' ); ?>
</div>
</aside>
<?php endif; ?>

<?php get_template_part('lib/templates/tabber-widget'); ?>
<?php get_template_part('lib/templates/advertisement'); ?>
<?php get_template_part('lib/templates/sidebar-feat-cat'); ?>

<aside class="widget widget_recent_entries">
<h3 class="widget-title"><?php _e('Recent Posts', TEMPLATE_DOMAIN); ?></h3>
<ul><?php wp_get_archives('type=postbypost&limit=5'); ?></ul>
</aside>

<aside class="widget">
<h3 class="widget-title"><?php _e('Popular Tags',TEMPLATE_DOMAIN); ?></h3>
<div class="tagcloud"><?php wp_tag_cloud('orderby=count&order=DESC&&number=25&smallest=10&largest=20'); ?></div>
</aside>

<aside class="widget">
<h3 class="widget-title"><?php _e('Calendar', TEMPLATE_DOMAIN); ?></h3>
<?php get_calendar(); ?>
</aside>