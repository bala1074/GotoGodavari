<div id="tabber-widget">
<div class="tabber">
<?php if ( is_active_sidebar( 'tabbed-sidebar' ) ) : ?>
<?php dynamic_sidebar( 'tabbed-sidebar' ); ?>
<?php else: ?>
<div class="tabbertab">
<aside class="widget">
<h3 class="widget-title"><?php _e('Comments', TEMPLATE_DOMAIN); ?></h3>
<?php get_avatar_recent_comment(5); ?>
</aside></div>
<div class="tabbertab">
<aside class="widget">
<h3 class="widget-title"><?php _e('Popular',TEMPLATE_DOMAIN); ?></h3>
<?php get_hot_topics(5); ?>
</aside></div>
<div class="tabbertab">
<aside class="widget">
<h3 class="widget-title"><?php _e('Tags',TEMPLATE_DOMAIN); ?></h3>
<div class="tagcloud"><?php wp_tag_cloud('orderby=count&order=DESC&&number=25&smallest=10&largest=20'); ?></div>
</aside>
</div>
<?php endif; ?>
</div>
</div>