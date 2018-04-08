<?php if( get_theme_option('social_on') == 'Yes') {
global $post;
$src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "medium" );
?>
<h4>Share this post</h4>
<div class="share_box">
<div class="addthis_toolbox addthis_default_style"
addthis:url="<?php the_permalink(); ?>"
addthis:title="<?php the_title_attribute(); ?>"
addthis:description="<?php echo get_custom_the_excerpt(30); ?>">

<a style="margin:0 10px 0 0;" class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a style="width:85px;" class="addthis_button_tweet"></a>

<?php if( is_single() ): ?>
<a style="width:70px;" class="addthis_button_google_plusone" g:plusone:size="medium"></a>
<?php endif; ?>

<?php if($src[0]): ?>
<div style="margin: 0px" class="share_btn">
<a pi:pinit:media="<?php echo $src[0]; ?>" class="addthis_button_pinterest_pinit"></a>
</div>
<?php endif; ?>

<?php if( is_single() ): ?>
<a style="margin: 0 0 0 20px;" class="addthis_counter addthis_pill_style"></a>
<?php endif; ?>

</div>
</div>
<?php } ?>