<?php
$orig_post = $post;
global $post;
$tags = wp_get_post_tags($post->ID);
$tag_ids = array();
foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
	$args=array(
	'tag__in' => $tag_ids,
	'post__not_in' => array($post->ID),
	'posts_per_page'=>3, // Number of related posts to display.
	'ignore_sticky_posts'=>1
);


$my_query = new wp_query( $args );

if( $my_query->have_posts() ) {
echo '<div id="post-related">' . '<h4>' . __('You might also like to read:', TEMPLATE_DOMAIN) . '</h4>';
    $ic = 0;
    while( $my_query->have_posts() ) {
	$my_query->the_post();
    $thepostlink = '<a href="'. get_permalink() . '" title="' . the_title_attribute('echo=0') . '">';
		?>
<div class="feat-cat-meta post-<?php the_ID(); ?><?php if($ic=='1'){ echo ' feat-middle'; } ?>">
<?php echo get_featured_post_image("<div class='related-post-thumb'>".$thepostlink, "</a></div>", 200, 200, "alignleft", "thumbnail", get_singular_cat('false') ,the_title_attribute('echo=0'), true); ?>
<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
</div>
 <?php
  $ic++; }
  wp_reset_query();
echo '</div>';

} else {


$categories = get_the_category($post->ID);


	$category_ids = array();
	foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
	$args=array(
		'category__in' => $category_ids,
		'post__not_in' => array($post->ID),
		'showposts'=>3, // Number of related posts that will be shown.
		'ignore_sticky_posts'=>1
	);

    $my_query = new wp_query( $args );
    if( $my_query->have_posts() ) {
    echo '<div id="post-related">' . '<h4>' . __('Other People Also Reading:', TEMPLATE_DOMAIN) . '</h4>'; 
    $ic = 0;
    while( $my_query->have_posts() ) {
	$my_query->the_post();
    $thepostlink = '<a href="'. get_permalink() . '" title="' . the_title_attribute('echo=0') . '">';
		?>
<div class="feat-cat-meta post-<?php the_ID(); ?><?php if($ic=='1'){ echo ' feat-middle'; } ?>">
<?php echo get_featured_post_image("<div class='related-post-thumb'>".$thepostlink, "</a></div>", 200, 200, "alignleft", "thumbnail", get_singular_cat('false') ,the_title_attribute('echo=0'), true); ?>
<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
</div>
 <?php
  $ic++; }
  wp_reset_query();
echo '</div>';
}

}

?>