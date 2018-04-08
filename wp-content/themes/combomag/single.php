<?php get_header(); ?>

<?php do_action( 'bp_before_content' ) ?>
<!-- CONTENT START -->
<div id="single-content" class="content">
<div class="content-inner">

<?php do_action( 'bp_before_blog_home' ) ?>

<!-- POST ENTRY START -->
<div id="post-entry">
<section class="post-entry-inner">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php $full_img = get_theme_option('full_feat_img'); if($full_img == 'Enable') {
if( get_theme_option('full_feat_img_only_show') == 'Enable') {
$get_featon = get_post_meta($post->ID, 'full_feat_img_on', true); if($get_featon == 'yes') {
echo get_featured_post_image("<div class='post-thumb in-single'>", "</div>", 1000, 300, "alignleft", "full", get_singular_cat('false') ,the_title_attribute('echo=0'), false); }
} else {
echo get_featured_post_image("<div class='post-thumb in-single'>", "</div>", 1000, 300, "alignleft", "full", get_singular_cat('false') ,the_title_attribute('echo=0'), false);
}
}
?>

<!-- POST START -->

<article <?php post_class('post-single'); ?> id="post-<?php the_ID(); ?>">

<h1 class="post-title"><?php the_title(); ?></h1>
<?php get_template_part( 'lib/templates/post-meta' ); ?>

<div class="post-content">
<?php the_content( __('...more &raquo;',TEMPLATE_DOMAIN) ); ?>
</div>

<?php get_template_part( 'lib/templates/post-meta-bottom' ); ?>

</article>
<!-- POST END -->

<?php get_template_part( 'lib/templates/author-bio' ); ?>

<div class="sharebox-wrap">
<?php get_template_part( 'lib/templates/share-box' ); ?>
</div>

<?php get_template_part( 'lib/templates/related' ); ?>

<?php set_wp_post_view( get_the_ID() ); ?>

<?php endwhile; ?>

<?php comments_template( '', true );  ?>

<?php else : ?>

<?php get_template_part( 'lib/templates/result' ); ?>

<?php endif; ?>

<?php get_template_part( 'lib/templates/paginate' ); ?>

</section>
</div>
<!-- POST ENTRY END -->

<?php do_action( 'bp_after_blog_home' ) ?>

</div><!-- CONTENT INNER END -->
</div><!-- CONTENT END -->

<?php do_action( 'bp_after_content' ) ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>