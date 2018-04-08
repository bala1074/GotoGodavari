<?php get_header(); ?>

<?php do_action( 'bp_before_content' ) ?>

<!-- CONTENT START -->
<div class="content home-content">
<div class="content-inner">

<?php do_action( 'bp_before_blog_home' ) ?>

<!-- POST ENTRY START -->
<div id="post-entry">
<section class="post-entry-inner">

<?php get_template_part( 'lib/templates/breadcrumbs' ); ?>

<?php $oddpost = 'alt-post'; $postcount = 1; if (have_posts()) : while (have_posts()) :  the_post();
$thepostlink = '<a href="'. get_permalink() . '" title="' . the_title_attribute('echo=0') . '">';
?>

<?php do_action( 'bp_before_blog_post' ) ?>

<!-- POST START -->
<article <?php post_class('home-post ' . $oddpost); ?> id="post-<?php the_ID(); ?>">

<?php echo get_featured_post_image("<div class='post-thumb in-archive'>".$thepostlink, "</a></div>", 350, 200, "alignleft", "medium", get_singular_cat('false') ,the_title_attribute('echo=0'), false); ?>

<div class="article-blk">
<h1 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
<?php get_template_part( 'lib/templates/post-meta-home' ); ?>
<div class="post-content">
<?php echo get_custom_the_excerpt(20); ?>
</div>
<?php get_template_part( 'lib/templates/post-meta-bottom' ); ?>
</div>

</article>
<!-- POST END -->

<?php do_action( 'bp_after_blog_post' ) ?>

<?php $get_google_code = get_theme_option('adsense_post'); if($get_google_code): ?>
<?php if( 2 == $postcount  ) : ?>
<div class="adsense-post"><?php echo stripcslashes(do_shortcode($get_google_code)); ?></div>
<?php endif; endif; ?>

<?php ($oddpost == "alt-post") ? $oddpost="" : $oddpost="alt-post"; $postcount++; ?>

<?php endwhile; ?>

<?php comments_template( '', true ); ?>

<?php else: ?>

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