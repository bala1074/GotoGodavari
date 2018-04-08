<div class="post-meta the-icons pmeta-single">
<span class="post-author"><strong><?php _e('By', TEMPLATE_DOMAIN); ?> <?php the_author_posts_link(); ?></strong></span>&nbsp;|&nbsp;
<span class="post-category"><?php if( is_singular() ) { echo the_category(', '); } else { echo get_singular_cat(); } ?></span>&nbsp;|&nbsp;
<span class="post-time"><?php the_time('d F Y') ?></span>
<?php if ( comments_open() ) { ?>&nbsp;|&nbsp;<span class="post-comment"><?php comments_popup_link(__('Add Comment',TEMPLATE_DOMAIN), __('1 Comment',TEMPLATE_DOMAIN), __('% Comments',TEMPLATE_DOMAIN) ); ?></span>
<?php } ?>
</div>