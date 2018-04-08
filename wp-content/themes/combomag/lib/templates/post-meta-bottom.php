<div class="post-meta the-icons pm-bottom">
<?php if(is_singular()) { ?>
<?php if( has_tag() ) { ?>
<span class="post-tags"><?php the_tags(__('Tagged in ', TEMPLATE_DOMAIN), ' '); ?></span>
<?php } ?>
<?php } else { ?>
<span class="post-category"><?php _e('Filed in', TEMPLATE_DOMAIN); ?> <?php echo get_singular_cat(); ?> </span>
<?php } ?>
</div>