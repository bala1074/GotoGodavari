<?php
$featured_on = get_theme_option('slider_on');
$featured_category = get_theme_option('feat_cat');
$featured_number = get_theme_option('feat_cat_count');
$featured_post = get_theme_option('feat_post');
?>

<?php if($featured_on == 'Enable'): ?>
<?php if(!$featured_category && !$featured_post): ?>
<?php else: ?>
<?php if($featured_category): ?>

<!-- GALLERY SLIDER START -->
<div id="featuredbox">
<div id="featured">
<div id="Gallerybox">
<div id="myGallery">
<?php
$query = new WP_Query( "cat=$featured_category&posts_per_page=$featured_number&orderby=date" );
while ( $query->have_posts() ) : $query->the_post(); ?>
<div class="imageElement post-<?php the_ID(); ?>">

<?php echo get_featured_post_image("", "", 800, 400, "alignleft full", "full", get_singular_cat('false') ,the_title_attribute('echo=0'), true); ?>

<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo the_title(); ?></a></h3>
<p><?php echo get_custom_the_excerpt(30); ?></p>
<a href="<?php the_permalink(); ?>" title="<?php _e('Continue reading this post', TEMPLATE_DOMAIN); ?>" class="open"></a>
</div>
<?php endwhile; wp_reset_query(); ?>
</div><!-- MYGALLERY END -->
</div><!-- GALLERBOX END -->
</div><!-- FEATURED END -->
</div>
<!-- GALLERY SLIDER END -->


<?php elseif($featured_post && !$featured_category): ?>

<!-- GALLERY SLIDER START -->
<div id="featuredbox">
<div id="featured">
<div id="Gallerybox">
<div id="myGallery">
<?php
$allposttype = mp_get_all_posttype();
query_posts( array( 'post__in' => explode(',', $featured_post), 'post_type'=> $allposttype, 'posts_per_page' => 100, 'ignore_sticky_posts' => 1, 'orderby' => 'post__in', 'order' => '') );
while ( have_posts() ) : the_post(); ?>
<div class="imageElement post-<?php the_ID(); ?>">

<?php echo get_featured_post_image("", "", 800, 400, "alignleft full", "full", get_singular_cat('false') ,the_title_attribute('echo=0'), true); ?>

<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo the_title(); ?></a></h3>
<p><?php echo get_custom_the_excerpt(30); ?></p>
<a href="<?php the_permalink(); ?>" title="<?php _e('Continue reading this post', TEMPLATE_DOMAIN); ?>" class="open"></a>
</div>
<?php endwhile; wp_reset_query(); ?>
</div><!-- MYGALLERY END -->
</div><!-- GALLERBOX END -->
</div><!-- FEATURED END -->
</div>
<!-- GALLERY SLIDER END -->

<?php endif; ?>

<?php endif; ?>

<?php endif; ?>