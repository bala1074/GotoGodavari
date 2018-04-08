<?php if (is_single()) { ?>

<div class="post-nav-archive" id="post-navigator-single">
<div class="alignleft"><?php previous_post_link(__('&laquo;Next Post&nbsp;%link', TEMPLATE_DOMAIN)) ?></div>
<div class="alignright"><?php next_post_link(__('%link&nbsp;Previous Post&raquo;', TEMPLATE_DOMAIN)) ?></div>
</div>

<?php } else { ?>

<div id="post-navigator">
<?php if( function_exists('custom_woo_pagination') ) : ?>
<?php custom_woo_pagination(); ?>
<?php else: ?>
<div class="wp-pagenavi">
<div class="alignright"><?php next_posts_link(__('Older Entries &raquo;', TEMPLATE_DOMAIN) ); ?></div>
<div class="alignleft"><?php previous_posts_link(__('&laquo; Newer Entries', TEMPLATE_DOMAIN) ); ?></div>
</div>
<?php endif; ?>
</div>

<?php } ?>