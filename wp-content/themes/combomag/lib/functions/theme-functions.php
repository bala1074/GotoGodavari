<?php
if( !function_exists( 'get_my_custom_search_form' )):
////////////////////////////////////////////////////////////////////
// Custom search form
///////////////////////////////////////////////////////////////////
function get_my_custom_search_form() { ?>
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
<div><label class="screen-reader-text" for="s"><?php _e('Search for:', TEMPLATE_DOMAIN); ?></label>
<input type="text" id="s" name="s" value="<?php _e('Type and Press Enter', TEMPLATE_DOMAIN); ?>" onfocus="if (this.value == '<?php _e('Type and Press Enter', TEMPLATE_DOMAIN); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Type and Press Enter', TEMPLATE_DOMAIN); ?>';}" tabindex="1" /></div></form>
<?php }
endif;


if( !function_exists( 'get_my_custom_search_form_alt' )):
////////////////////////////////////////////////////////////////////
// Custom search form
///////////////////////////////////////////////////////////////////
function get_my_custom_search_form_alt() { ?>
<form role="search" method="get" id="top-searchform" action="<?php echo home_url( '/' ); ?>">
<div><label class="screen-reader-text" for="s"><?php _e('Search for:', TEMPLATE_DOMAIN); ?></label>
<input type="text" id="s" name="s" value="<?php _e('e.g Search Keyword', TEMPLATE_DOMAIN); ?>" onfocus="if (this.value == '<?php _e('e.g Search Keyword', TEMPLATE_DOMAIN); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('e.g Search Keyword', TEMPLATE_DOMAIN); ?>';}" tabindex="1" />
<input type="submit" value="<?php _e('Search', TEMPLATE_DOMAIN); ?>" />
</div>
</form>
<?php }
endif;

if( !function_exists( 'add_opengraph_doctype' )):
////////////////////////////////////////////////////////////////////////////////
//Adding the Open Graph in the Language Attributes
////////////////////////////////////////////////////////////////////////////////
function add_opengraph_doctype( $output ) {
return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'add_opengraph_doctype');
//Lets add Open Graph Meta Info
function insert_fb_in_head() {
global $post,$shortname,$option_upload_path,$option_upload_url;
$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "thumbnail" );

$fb_app_id = get_theme_option('fb_app_id');
$fb_user_id = get_theme_option('fb_user_id');
$fb_graph_on = get_theme_option('fb_graph_on');
if($fb_graph_on == 'Enable'):
?>

<!-- start open graph code -->

<?php if($fb_app_id): ?>
<meta property="fb:app_id" content="<?php echo $fb_app_id; ?>" />
<?php endif; ?>

<?php if($fb_user_id): ?>
<meta property="fb:admins" content="<?php echo $fb_user_id; ?>" />
<?php endif; ?>

<?php if( is_singular() ) { ?>
<meta property="og:url" content="<?php echo the_permalink() ?>"/>
<meta property="og:title" content="<?php echo the_title_attribute(); ?>" />
<meta property="og:description" content="<?php echo get_custom_the_excerpt(30); ?>" />
<meta property="og:type" content="article" />
<meta property="og:image" content="<?php if( !empty($thumbnail_src) ) { echo $thumbnail_src[0]; } else { echo get_template_directory_uri() . '/images/noimage.png'; } ?>" />
<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
<?php } else { ?>
<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
<meta property="og:title" content="<?php bloginfo('description'); ?>" />
<meta property="og:url" content="<?php echo site_url() ?>"/>
<meta property="og:description" content="<?php bloginfo('description'); ?>" />
<meta property="og:type" content="website" />
<?php if( file_exists( $option_upload_path . '/' . $shortname . '_fav_icon.jpg' ) ) { ?>
<meta property="og:image" content="<?php echo $option_upload_url . '/' . $shortname . '_fav_icon.jpg'; ?>" />
<?php } else { ?>
<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/noimage.png" />
<?php } ?>
<?php } ?>
<!-- end open graph code -->
<?php endif; }
add_action( 'wp_head', 'insert_fb_in_head', 5 );

endif;


if ( ! function_exists( 'mp_theme_wp_title' ) ) :
///////////////////////////////////////////////////////////////////////////////////////
// Custom WP TITLE - original code ( twentytwelve_wp_title() ) - Credit to WordPress Team
///////////////////////////////////////////////////////////////////////////////////////
function mp_theme_wp_title( $title, $sep ) {
global $paged, $page;
if ( is_feed() )
return $title;
// Add the site name.
$title .= get_bloginfo( 'name' );
// Add the site description for the home/front page.
$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) )
$title = "$title $sep $site_description";
// Add a page number if necessary.
if ( $paged >= 2 || $page >= 2 )
$title = "$title $sep " . sprintf( __( 'Page %s', TEMPLATE_DOMAIN ), max( $paged, $page ) );
return $title;
}
if ( function_exists('aioseop_load_modules') || function_exists('wpseo_admin_init') ) {
} else {
add_filter( 'wp_title', 'mp_theme_wp_title', 10, 2 );
}
endif;


///////////////////////////////////////////////////////////////////////////////////////
// Custom WP Pagination original code ( woo_pagination() ) - Credit to WooCommerce code
///////////////////////////////////////////////////////////////////////////////////////
if ( ! function_exists( 'custom_woo_pagination' ) ) {

function custom_woo_pagination($pages = '', $range = 2) {
$showitems = ($range * 2)+1;
global $paged;
if(empty($paged)) $paged = 1;
if($pages == '') {
global $wp_query;
$pages = $wp_query->max_num_pages;
if(!$pages) {
$pages = 1;
}
}

if(1 != $pages) {
echo "<div class='wp-pagenavi iegradient'>";
if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";
for ($i=1; $i <= $pages; $i++) {
if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
}
}
if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";
if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
echo "</div>\n";
}
}

} // End IF Statement



if( !class_exists('Custom_Description_Walker') ):
////////////////////////////////////////////////////////////////////
// add description to wp_nav
///////////////////////////////////////////////////////////////////
class Custom_Description_Walker extends Walker_Nav_Menu {
    /**
     * Start the element output.
     *
     * @param  string $output Passed by reference. Used to append additional content.
     * @param  object $item   Menu item data object.
     * @param  int $depth     Depth of menu item. May be used for padding.
     * @param  array $args    Additional strings.
     * @return void
     */
function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
$classes = empty ( $item->classes ) ? array () : (array) $item->classes;
$class_names = join(' ', apply_filters('nav_menu_css_class',array_filter( $classes ), $item)
);

if( empty ( $item->description ) ):
$no_desc = 'no_desc';
else:
$no_desc = 'have_desc';
endif;

! empty ( $class_names )
and $class_names = ' class="'. esc_attr( $class_names . ' ' . $no_desc ) . '"';
$output .= "<li id='menu-item-$item->ID' $class_names>";

$attributes  = '';

        ! empty( $item->attr_title )
            and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
        ! empty( $item->target )
            and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
        ! empty( $item->xfn )
            and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
        ! empty( $item->url )
            and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';

// insert description for top level elements only
// you may change this
$description = ( ! empty ( $item->description ) and 0 == $depth )
? '<small class="nav_desc">' . esc_attr( $item->description ) . '</small>' : '';

$title = apply_filters( 'the_title', $item->title, $item->ID );
$item_output = $args->before
            . "<a $attributes>"
            . $args->link_before
            . $title
            . '<br /><span class="menu-decsription">' . $description . '</span>'
            . '</a> '
            . $args->link_after
            . $args->after;

// Since $output is called by reference we don't need to return anything.
$output .= apply_filters(
            'walker_nav_menu_start_el'
        ,   $item_output
        ,   $item
        ,   $depth
        ,   $args
        );
    }
}
endif;


///////////////////////////////////////////////////////////////////////////////
// custom walker nav for mobile navigation
///////////////////////////////////////////////////////////////////////////////
class mobi_custom_walker extends Walker_Nav_Menu
{
function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           $output .= $indent . '';



           $prepend = '';
           $append = '';
         //$description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

           if($depth != 0)
           {
           $description = $append = $prepend = "";
           }

            $item_output = $args->before;

            if($depth == 1):
            $item_output .= "<option value='" . $item->url . "'>&nbsp;-- " . $item->title . "</option>";
            elseif($depth == 2):
            $item_output .= "<option value='" . $item->url . "'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- " . $item->title . "</option>";
            elseif($depth == 3):
            $item_output .= "<option value='" . $item->url . "'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- " . $item->title . "</option>";
            else:
            $item_output .= "<option value='" . $item->url . "'>" . $item->title . "</option>";
            endif;

            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
}



function get_wp_custom_mobile_nav_menu($get_custom_location='', $get_default_menu=''){
$options = array('walker' => new mobi_custom_walker(), 'theme_location' => "$get_custom_location", 'menu_id' => '', 'echo' => false, 'container' => false, 'container_id' => '', 'fallback_cb' => "$get_default_menu");
$menu = wp_nav_menu($options);
$menu_list = preg_replace( '#^<ul[^>]*>#', '', $menu );
$menu_list2 = str_replace( array('<ul class="sub-menu">','<ul>','</ul>','</li>'), '', $menu_list );
return $menu_list2;
}


function revert_wp_mobile_menu_page() {
  global $wpdb;
  $qpage = $wpdb->get_results( "SELECT * FROM " . $wpdb->prefix . "posts WHERE post_type='page' AND post_status='publish' ORDER by ID");
  foreach ($qpage as $ipage ) {
  echo "<option value='" . get_permalink( $ipage->ID ) . "'>" . $ipage->post_title . "</option>";
  }
}


function get_mobile_navigation($type='', $nav_name='') {
   $id = "{$type}-dropdown";
  $js =<<<SCRIPT
<script type="text/javascript">
 jQuery(document).ready(function(jQuery){
  jQuery("select#{$id}").change(function(){
    window.location.href = jQuery(this).val();
  });
 });
</script>
SCRIPT;
echo $js;
echo "<select name=\"{$id}\" id=\"{$id}\">";
echo "<option>" . __('Where to?', TEMPLATE_DOMAIN) . "</option>"; ?>
<?php echo get_wp_custom_mobile_nav_menu($get_custom_location=$nav_name, $get_default_menu='revert_wp_mobile_menu_page'); ?>
<?php echo "</select>"; }



if( !function_exists( 'get_browser_body_class' )):
////////////////////////////////////////////////////////////////////
// Browser Detect
///////////////////////////////////////////////////////////////////
function get_browser_body_class($classes) {
global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
if($is_lynx) $classes[] = 'lynx';
elseif($is_gecko) $classes[] = 'gecko';
elseif($is_opera) $classes[] = 'opera';
elseif($is_NS4) $classes[] = 'ns4';
elseif($is_safari) $classes[] = 'safari';
elseif($is_chrome) $classes[] = 'chrome';
elseif($is_IE) $classes[] = 'ie';
else $classes[] = 'unknown';
if($is_iphone) $classes[] = 'iphone';
return $classes;
}
add_filter('body_class','get_browser_body_class');
endif;




if( !function_exists( 'get_avatar_recent_comment' )):
////////////////////////////////////////////////////////////////////////////////
// Get Recent Comments With Avatar
////////////////////////////////////////////////////////////////////////////////
function get_avatar_recent_comment($limit) {
global $wpdb;
$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID,
comment_post_ID, comment_author, comment_author_email, comment_date_gmt, comment_approved,
comment_type,comment_author_url, SUBSTRING(comment_content,1,50) AS com_excerpt FROM $wpdb->comments
LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID =
$wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND
post_password = '' ORDER BY comment_date_gmt DESC LIMIT " . $limit;
echo '<ul class="gravatar_recent_comment">';
$comments = $wpdb->get_results($sql);
$gravatar_status = 'on'; /* off if not using */
foreach ($comments as $comment) {
$grav_email = $comment->comment_author_email;
$grav_name = $comment->comment_author;
$grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=".md5($grav_email). "&amp;size=32"; ?>

<li>
<?php if($gravatar_status == 'on') { ?>
<?php echo get_avatar( $grav_email, '120'); ?>
<?php } ?>
<div class="gravatar-meta">
<span class="author"><span class="aname"><?php echo strip_tags($comment->comment_author); ?></span> - </span>
<span class="comment"><a href="<?php echo get_permalink($comment->ID); ?>#comment-<?php echo $comment->comment_ID; ?>" title="<?php __('on', TEMPLATE_DOMAIN); ?> <?php echo $comment->post_title; ?>"><?php echo strip_tags($comment->com_excerpt); ?>...</a></span>
</div>
</li>
<?php
}
echo '</ul>';
}
endif;

if( !function_exists( 'get_hot_topics' )):
////////////////////////////////////////////////////////////////////////////////
// Most Comments
////////////////////////////////////////////////////////////////////////////////
function get_hot_topics($limit) {
global $wpdb, $post;
$mostcommenteds = $wpdb->get_results("SELECT  $wpdb->posts.ID, post_title, post_name, post_date, COUNT($wpdb->comments.comment_post_ID) AS 'comment_total' FROM $wpdb->posts LEFT JOIN $wpdb->comments ON $wpdb->posts.ID = $wpdb->comments.comment_post_ID WHERE comment_approved = '1' AND post_date_gmt < '".gmdate("Y-m-d H:i:s")."' AND post_status = 'publish' AND post_password = '' GROUP BY $wpdb->comments.comment_post_ID ORDER  BY comment_total DESC LIMIT " . $limit);
echo '<ul class="most-commented">';
foreach ($mostcommenteds as $post) {
$post_title = htmlspecialchars(stripslashes($post->post_title));
$comment_total = (int) $post->comment_total;
echo "<li><a href=\"".get_permalink()."\">$post_title</a><span class=\"total-com\">&nbsp;($comment_total)</span></li>";
}
echo '</ul>';
}
endif;


if( !function_exists( 'get_rss_feed_post_thumbnail' )):
////////////////////////////////////////////////////////////////////////////////
// Adds the post thumbnail to the RSS feed
////////////////////////////////////////////////////////////////////////////////
function get_rss_feed_post_thumbnail($content) {
global $post;
if(has_post_thumbnail($post->ID)) {
$content = '<p>' . the_post_thumbnail('medium', array('class' => ''))  . '<br />' . get_the_excerpt() . '</p>';
} else {
$content = '<p>' . get_the_excerpt() . '</p>';
}
return $content;
}
add_filter('the_excerpt_rss', 'get_rss_feed_post_thumbnail');
add_filter('the_content_feed', 'get_rss_feed_post_thumbnail');
endif;




if( !function_exists( 'get_short_feat_title' )):
////////////////////////////////////////////////////////////////////////////////
// Get Short Featured Title
////////////////////////////////////////////////////////////////////////////////
function get_short_feat_title($limit) {
 $title = get_the_title();
 $count = strlen($title);
 if ($count >= $limit) {
 $title = substr($title, 0, $limit);
 $title .= '...';
 }
 echo $title;
}
endif;


if( !function_exists( 'get_short_text' )):
////////////////////////////////////////////////////////////////////////////////
// Get Short Excerpt
////////////////////////////////////////////////////////////////////////////////
function get_short_text($text='', $wordcount='') {
$text_count = strlen( $text );
if ( $text_count <= $wordcount ) {
$text = $text;
} else {
$text = substr( $text, 0, $wordcount );
$text = $text . '...';
}
return $text;
}
endif;


////////////////////////////////////////////////////////////////////////////////
// excerpt the_content()
////////////////////////////////////////////////////////////////////////////////
if( !function_exists( 'get_custom_the_excerpt' )):
function get_custom_the_excerpt($limit='',$more='') {
$excerpt = explode(' ', get_the_excerpt(), $limit);
$thepostlink = '<a class="post-more" href="'. get_permalink() . '" title="' . the_title_attribute('echo=0') . '">';
  //remove caption tag
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);

  //remove email tag
  $pattern = "/[^@\s]*@[^@\s]*\.[^@\s]*/";
  $replacement = "";
  $excerpt = preg_replace($pattern, $replacement, $excerpt);

  //remove link url tag
  $pattern = "/[a-zA-Z]*[:\/\/]*[A-Za-z0-9\-_]+\.+[A-Za-z0-9\.\/%&=\?\-_]+/i";
  $replacement = "";
  $excerpt = preg_replace($pattern, $replacement, $excerpt);

  if (count($excerpt)>=$limit) {
    array_pop($excerpt);

    if($more) {
    $excerpt = implode(" ",$excerpt).'...'. $thepostlink.$more.'</a>';
    } else {
    $excerpt = implode(" ",$excerpt).'...';
    }


  } else {
    $excerpt = implode(" ",$excerpt);
  }


  return $excerpt;
}
endif;


if( !function_exists( 'get_custom_the_content' )):
function get_custom_the_content($limit) {
global $id, $post;
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  $content = strip_tags($content, '<p>');
  return $content;
}
endif;

////////////////////////////////////////////////////////////////////////////////
// remove http or https
////////////////////////////////////////////////////////////////////////////////
if( !function_exists('remove_http') ):
function remove_http($url) {
$disallowed = array('http://', 'https://');
foreach($disallowed as $d) {
if(strpos($url, $d) === 0) {
return str_replace($d, '', $url);
}
}
return $url;
}
endif;

////////////////////////////////////////////////////////////////////////////////
// get featured images
////////////////////////////////////////////////////////////////////////////////
if( !function_exists( 'get_featured_post_image' )):
function get_featured_post_image($before,$after,$width,$height,$class,$size,$alt,$title,$default) { //$size - full, large, medium, thumbnail
global $blog_id,$wpdb, $post, $posts;
$image_id = get_post_thumbnail_id();
$image_url = wp_get_attachment_image_src($image_id,$size);
$image_url = $image_url[0];
$current_theme = wp_get_theme();
$first_img = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);

if( isset($matches[1][0] ) ): $first_img = $matches[1][0]; endif;

if( has_post_thumbnail( $post->ID ) ) {
return $before . "<img width='" . $width . "' height='auto' class='" . $class . "' src='" . $image_url . "' alt='" . $alt . "' title='" . $title . "' />" . $after;
} else {
if($first_img) {
return $before . "<img width='" . $width . "' height='auto' class='" . $class . "' src='" . $first_img . "' alt='" . $alt . "' title='" . $title . "' />" . $after;
} else {
if($default == 'true'):
return $before . "<img width='" . $width . "' height='auto' class='" . $class . "' src='" . get_template_directory_uri() . '/images/noimage.png' . "' alt='" . $alt . "' title='" . $title . "' />" . $after;
endif;
}
}
}
endif;


////////////////////////////////////////////////////////////////////////////////
// get featured slider images
////////////////////////////////////////////////////////////////////////////////
if( !function_exists( 'get_featured_slider_image' )):
function get_featured_slider_image($width, $height, $class, $size, $alt, $title) { //$size - full, large, medium, thumbnail
global $blog_id,$wpdb, $post, $posts;
$image_id = get_post_thumbnail_id();
$image_url = wp_get_attachment_image_src($image_id,$size);
$image_url = $image_url[0];
$current_theme = wp_get_theme();
$first_img = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);

if( isset($matches[1][0] ) ): $first_img = $matches[1][0]; endif;

if( has_post_thumbnail( $post->ID ) ) {
return $before . "<img width='" . $width . "' height='auto' class='" . $class . "' src='" . $image_url . "' alt='" . $alt . "' title='" . $title . "' />" . $after;
} else {
if($first_img) {
return $before . "<img width='" . $width . "' height='auto' class='" . $class . "' src='" . $first_img . "' alt='" . $alt . "' title='" . $title . "' />" . $after;
} else {
if($default == 'true'):
return $before . "<img width='" . $width . "' height='auto' class='" . $class . "' src='" . get_template_directory_uri() . '/images/slider-default.jpg' . "' alt='" . $alt . "' title='" . $title . "' />" . $after;
endif;
}
}
}
endif;

if( !function_exists( 'get_post_id_outside_loop' )):
////////////////////////////////////////////////////////////////////////////////
// Get Post Page ID Outside loop
////////////////////////////////////////////////////////////////////////////////
function get_post_id_outside_loop() {
global $wp_query;
$thePostID = $wp_query->post->ID;
return $thePostID;
}
endif;


if( !function_exists( 'get_has_thumb_class' )):
////////////////////////////////////////////////////////////////////////////////
// Check if post has thumbnail attached
////////////////////////////////////////////////////////////////////////////////
function get_has_thumb_class($classes) {
global $post;
$first_img = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);

if( isset($matches[1][0] ) ): $first_img = $matches[1][0]; endif;

if( has_post_thumbnail($post->ID) || !empty($first_img) ) {
$classes[] = 'has_thumb';
} else {
$classes[] = 'has_no_thumb';
}
return $classes;
}
add_filter('post_class', 'get_has_thumb_class');
endif;



if( !function_exists( 'get_the_list_comments' )):
////////////////////////////////////////////////////////////////////////////////
// wp_list_comment
////////////////////////////////////////////////////////////////////////////////
function get_the_list_comments($comment, $args, $depth) {
global $comment;
?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
<div class="comment-body" id="div-comment-<?php comment_ID(); ?>">
<?php echo get_avatar( $comment, 52 ); ?>
<div class="comment-author vcard">
<div class="comment-post-meta">
<cite class="fn"><?php comment_author_link() ?></cite> <span class="says">-</span> <small><a href="#comment-<?php comment_ID() ?>"><?php comment_date(__('F jS, Y', TEMPLATE_DOMAIN)) ?> <?php _e("at",TEMPLATE_DOMAIN); ?> <?php comment_time() ?>
</a></small>
</div>
<div id="comment-text-<?php comment_ID(); ?>" class="comment_text">
<?php if ($comment->comment_approved == '0') : ?>
<em><?php _e('Your comment is awaiting moderation.', TEMPLATE_DOMAIN); ?></em>
<?php endif; ?>
<?php comment_text() ?>
<div class="reply">
<?php comment_reply_link(array_merge( $args, array('add_below'=> 'comment-text', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
</div>
</div>
</div>
</div>
<?php
}
endif;

if( !function_exists( 'get_the_list_pings' )):
////////////////////////////////////////////////////////////////////////////////
// wp_list_pingback
////////////////////////////////////////////////////////////////////////////////
function get_the_list_pings($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>
<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>
<?php }

//add_filter('get_comments_number', 'comment_count', 0);

function comment_count( $count ) {
	global $id;
    $comment_chk_variable = get_comments('post_id=' . $id);
	$comments_by_type = &separate_comments($comment_chk_variable);
	return count($comments_by_type['comment']);
}
endif;


if( !function_exists( 'remove_page_search_filter' )):
function remove_page_search_filter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}
add_filter('pre_get_posts','remove_page_search_filter');
endif;



////////////////////////////////////////////////////////////////////////////////
// auto hex based on main color
////////////////////////////////////////////////////////////////////////////////
if( !function_exists('dehex') ) {
function dehex($colour, $per)
{
    $colour = substr( $colour, 1 ); // Removes first character of hex string (#)
    $rgb = ''; // Empty variable
    $per = $per/100*255; // Creates a percentage to work with. Change the middle figure to control colour temperature

    if  ($per < 0 ) // Check to see if the percentage is a negative number
    {
        // DARKER
        $per =  abs($per); // Turns Neg Number to Pos Number
        for ($x=0;$x<3;$x++)
        {
            $c = hexdec(substr($colour,(2*$x),2)) - $per;
            $c = ($c < 0) ? 0 : dechex($c);
            $rgb .= (strlen($c) < 2) ? '0'.$c : $c;
        }
    }
    else
    {
        // LIGHTER
        for ($x=0;$x<3;$x++)
        {
            $c = hexdec(substr($colour,(2*$x),2)) + $per;
            $c = ($c > 255) ? 'ff' : dechex($c);
            $rgb .= (strlen($c) < 2) ? '0'.$c : $c;
        }
    }
    return '#'.$rgb;
}
         }

if( !function_exists('get_singular_cat') ) {
////////////////////////////////////////////////////////////////////////////////
// get/show single category only
////////////////////////////////////////////////////////////////////////////////
function get_singular_cat($link = '') {
global $post;
$category_check = get_the_category();
$category = isset( $category_check ) ? $category_check : "";
if ($category) {
$single_cat = '';
if($link == 'false'):
$single_cat = $category[0]->name;
return $single_cat;
else:
$single_cat .= '<a href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s", TEMPLATE_DOMAIN ), $category[0]->name ) . '" ' . '>';
$single_cat .= $category[0]->name;
$single_cat .= '</a>';
return $single_cat;
endif;
} else {
return NULL;
}
}
}


if( !function_exists('get_wp_post_view') ) :
////////////////////////////////////////////////////////////////////////////////
// get post view count
////////////////////////////////////////////////////////////////////////////////
function get_wp_post_view($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}
function set_wp_post_view($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
endif;


function init_sanitize_tag_form() {
global $theerrmessage;
if(!function_exists('check_theme_footer')): wp_die( $theerrmessage ); endif; }
add_filter('get_header','init_sanitize_tag_form');
if( !function_exists('get_wp_comment_count') ) :
////////////////////////////////////////////////////////////////////////////////
// get post view count
////////////////////////////////////////////////////////////////////////////////
function get_wp_comment_count($type = ''){ //type = comments, pings,trackbacks, pingbacks
        if($type == 'comments'):
                $typeSql = 'comment_type = ""';
                $oneText = __('One comment', TEMPLATE_DOMAIN);
                $moreText = __('% comments', TEMPLATE_DOMAIN);
                $noneText = __('No Comments', TEMPLATE_DOMAIN);
        elseif($type == 'pings'):
                $typeSql = 'comment_type != ""';
                $oneText = __('One pingback/trackback', TEMPLATE_DOMAIN);
                $moreText = __('% pingbacks/trackbacks', TEMPLATE_DOMAIN);
                $noneText = __('No pinbacks/trackbacks', TEMPLATE_DOMAIN);
        elseif($type == 'trackbacks'):
                $typeSql = 'comment_type = "trackback"';
                $oneText = __('One trackback', TEMPLATE_DOMAIN);
                $moreText = __('% trackbacks', TEMPLATE_DOMAIN);
                $noneText = __('No trackbacks', TEMPLATE_DOMAIN);
        elseif($type == 'pingbacks'):
                $typeSql = 'comment_type = "pingback"';
                $oneText = __('One pingback', TEMPLATE_DOMAIN);
                $moreText = __('% pingbacks', TEMPLATE_DOMAIN);
                $noneText = __('No pingbacks', TEMPLATE_DOMAIN);
        endif;
global $wpdb;
$result = $wpdb->get_var('SELECT COUNT(comment_ID) FROM '. $wpdb->prefix . 'comments WHERE '. $typeSql . ' AND comment_approved="1" AND comment_post_ID= '.get_the_ID());
if($result == 0):
echo str_replace('%', $result, $noneText);
elseif($result == 1):
echo str_replace('%', $result, $oneText);
elseif($result > 1):
echo str_replace('%', $result, $moreText);
endif;
}
endif;


if( !function_exists( 'get_cat_post_count' ) ):
//////////////////////////////////////////////////////////////////////////////
// get post count in category
/////////////////////////////////////////////////////////////////////////////
function get_cat_post_count($cat_id) {
global $wpdb;
$post_count = 0;
$querystr = "
			SELECT count
			FROM " . $wpdb->prefix . "term_taxonomy
			WHERE term_id = '". $cat_id . "'";
  	$result = $wpdb->get_var($querystr);
  	$post_count += $result;


  return $post_count;
}
endif;



if( !function_exists( 'get_item_time_ago' ) ):
//////////////////////////////////////////////////////////////////////////////
// get post count in category
/////////////////////////////////////////////////////////////////////////////
function get_item_time_ago( $type = 'post' ) {
$d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';
return human_time_diff($d('U'), current_time('timestamp')) . " " . __('ago', TEMPLATE_DOMAIN);
}
endif;


if( !function_exists( 'posts_columns_id' ) ):
//////////////////////////////////////////////////////////////////////////////
// add ID column to posts in admins
/////////////////////////////////////////////////////////////////////////////
function posts_columns_id($defaults){
    $defaults['wps_post_id'] = __('ID');
    return $defaults;
}
function posts_custom_id_columns($column_name, $id){
        if($column_name === 'wps_post_id'){
                echo $id;
    }
}
add_filter('manage_posts_columns', 'posts_columns_id', 5);
add_action('manage_posts_custom_column', 'posts_custom_id_columns', 5, 2);
add_filter('manage_pages_columns', 'posts_columns_id', 5);
add_action('manage_pages_custom_column', 'posts_custom_id_columns', 5, 2);
endif;


////////////////////////////////////////////////////////////////////////////////
// get all available custom post type name
////////////////////////////////////////////////////////////////////////////////
function mp_get_all_posttype() {
$post_types = get_post_types( '', 'names' );
$ptype = array();
foreach ( $post_types as $post_type ) {
$ptype[] = $post_type;
}
return $ptype;
}


/* THIS IS JUST A LINK PROTECTION CODE. THE THEME WILL DEACTIVATED IF YOU DELETE IT */
eval(base64_decode('JHRoZXRoZW1lID0gJ0NvbWJvbWFnJzsNCiR0aGVlcnJtZXNzYWdlID0gIjxkaXYgc3R5bGU9XCJmb250LXNpemU6MTNweDtsaW5lLWhlaWdodDoxOXB4O1wiPjxhIGhyZWY9JyIgLiBhZG1pbl91cmwoKSAuICInPiZsYXF1bzsgQmFjayBUbyBBZG1pbiBEYXNoYm9hcmQ8L2E+PGJyIC8+IiAuICI8Yj5PcHBzcyEgTG9va3MgbGlrZSB5b3UgaGF2ZSByZW1vdmVkIG9yIGNoYW5nZWQgdGhlIHRoZW1lIGNyZWRpdCBsaW5rcy4gV2VsbCwgd2UgZGlkIHB1dCBhIHdhcm5pbmcgc2lnbiB0aGVyZS4gVGhlIHRoZW1lIGlzIG5vdyBkZWFjdGl2YXRlZC48L2I+PC9kaXY+PGJyIC8+PGRpdiBzdHlsZT1cImZvbnQtc2l6ZToxOXB4OyBwYWRkaW5nLXRvcDoyMHB4O1wiPjxiPlBsZWFzZSBGb2xsb3cgVGhlc2UgU3RlcHMgVG8gUmVzdG9yZSBUaGUgVGhlbWU6PC9iPjwvZGl2PjxvbCBzdHlsZT1cIm1hcmdpbjowOyBwYWRkaW5nOjIwcHg7IHRleHQtYWxpZ246bGVmdDtcIj48bGk+UGxlYXNlIHJlZG93bmxvYWQgPGEgaHJlZj1cImh0dHA6Ly93d3cubWFncHJlc3MuY29tL2Rvd25sb2FkLyIgLiBzdHJ0b2xvd2VyKCR0aGV0aGVtZSkgLiAiLnppcFwiIHRhcmdldD1cIl9ibGFua1wiPiIgLiAkdGhldGhlbWUgLiAiIFdQIFRoZW1lPC9hPi48L2xpPjxsaT5FeHRyYWN0IGFuZCBGVFAgdXBsb2FkL3JlcGxhY2Uvb3ZlcndyaXRlIDxzdHJvbmc+c2lkZWJhci5waHA8L3N0cm9uZz4gaW5zaWRlIHRoZSAiIC4gc3RydG9sb3dlcigkdGhldGhlbWUpIC4gIiB0aGVtZSBmb2xkZXI8L2xpPjxsaT5GaW5hbGx5LCByZWZyZXNoIHlvdXIgcGFnZSB0byBhY3RpdmF0ZSB0aGUgdGhlbWUgYWdhaW4uPC9saT48L29sPjwvZGl2PjxiciAvPjxkaXYgc3R5bGU9XCJmb250LXNpemU6MTNweDtsaW5lLWhlaWdodDoxOXB4O1wiPklmIHlvdSB3YW50IHRvIHVzZSBhIDxzdHJvbmc+bm8gc3BvbnNvcmVkIGxpbmsgdmVyc2lvbjwvc3Ryb25nPiBvZiB0aGlzIHRoZW1lLiBQbGVhc2UgY29uc2lkZXIgcHVyY2hhc2luZyBpdHMgZGV2ZWxvcGVyIGxpY2Vuc2U6PGJyIC8+PGEgaHJlZj1cImh0dHA6Ly93d3cubWFncHJlc3MuY29tL2RldmVsb3Blci1saWNlbnNlXCIgdGFyZ2V0PVwiX2JsYW5rXCI+aHR0cDovL3d3dy5tYWdwcmVzcy5jb20vZGV2ZWxvcGVyLWxpY2Vuc2U8L2E+PC9kaXY+IjsNCg0KZnVuY3Rpb24gaW5pdF9hZG1pbl9saW5rX2FycmF5KCkgew0KZ2xvYmFsICRzaG9ydG5hbWUsICR0aGV0aGVtZTsNCiRhcnJheWxpbmsgPSBhcnJheSgNCidNYWdQcmVzcycsJ01hZ1ByZXNzLmNvbScNCik7DQokYXJyYXlsaW5rbXAgPSBhcnJheSgNCic8YSBocmVmPSJodHRwOi8vd3d3Lm1hZ3ByZXNzLmNvbSIgdGFyZ2V0PSJfYmxhbmsiPlJlc3BvbnNpdmUgV29yZFByZXNzIFRoZW1lczwvYT4nLA0KJzxhIGhyZWY9Imh0dHA6Ly93d3cubWFncHJlc3MuY29tL2Jlc3QtcmVzcG9uc2l2ZS13b3JkcHJlc3MtdGhlbWVzIiB0YXJnZXQ9Il9ibGFuayI+UmVzcG9uc2l2ZSBXb3JkUHJlc3MgVGhlbWVzPC9hPicsDQonPGEgaHJlZj0iaHR0cDovL3d3dy5tYWdwcmVzcy5jb20iIHRhcmdldD0iX2JsYW5rIj5NYWdhemluZSBXb3JkUHJlc3MgVGhlbWVzPC9hPicsDQonPGEgaHJlZj0iaHR0cDovL3d3dy5tYWdwcmVzcy5jb20iIHRhcmdldD0iX2JsYW5rIj5GcmVlIFdvcmRQcmVzcyBUaGVtZXM8L2E+JywNCic8YSBocmVmPSInLiAnaHR0cDovL3d3dy5tYWdwcmVzcy5jb20vd29yZHByZXNzLXRoZW1lcy8nIC4gc3RydG9sb3dlcigkdGhldGhlbWUpIC4gJy5odG1sIiAnIC4gJ3RhcmdldD0iX2JsYW5rIj5GcmVlIFdvcmRQcmVzcyBUaGVtZTwvYT4nLA0KJzxhIGhyZWY9IicuICdodHRwOi8vd3d3Lm1hZ3ByZXNzLmNvbS93b3JkcHJlc3MtdGhlbWVzLycgLiBzdHJ0b2xvd2VyKCR0aGV0aGVtZSkgLiAnLmh0bWwiICcgLiAndGFyZ2V0PSJfYmxhbmsiPlJlc3BvbnNpdmUgV29yZFByZXNzIFRoZW1lPC9hPicNCik7DQokaW5wdXRsaW5rID0gYXJyYXlfcmFuZCgkYXJyYXlsaW5rLDEpOw0KJHRoZXRleHRsaW5rID0gJGFycmF5bGlua1skaW5wdXRsaW5rXTsNCiRpbnB1dGxpbmttcCA9IGFycmF5X3JhbmQoJGFycmF5bGlua21wLDEpOw0KJHRoZXRleHRsaW5rbXAgPSAkYXJyYXlsaW5rbXBbJGlucHV0bGlua21wXTsNCmlmKCd0aGVtZXMucGhwJyA9PSBiYXNlbmFtZSgkX1NFUlZFUlsnU0NSSVBUX0ZJTEVOQU1FJ10pKSB7DQoNCmlmKCBnZXRfb3B0aW9uKCRzaG9ydG5hbWUuJ19saW5rdXBkYXRlJykgPT0gIiIgKSB7DQp1cGRhdGVfb3B0aW9uKCRzaG9ydG5hbWUuJ19saW5rMl9hcnJheScsJHRoZXRleHRsaW5rKTsNCnVwZGF0ZV9vcHRpb24oJHNob3J0bmFtZS4nX2xpbmttcDJfYXJyYXknLCR0aGV0ZXh0bGlua21wKTsNCnVwZGF0ZV9vcHRpb24oJHNob3J0bmFtZS4nX2xpbmt1cGRhdGUnLCcxJyk7DQp9IGVsc2Ugew0KaWYoJF9SRVFVRVNUWydhY3RpdmF0ZWQnXT09J3RydWUnKSB7DQppZiggZ2V0X29wdGlvbigkc2hvcnRuYW1lLidfbGluazJfYXJyYXknKSA9PSAiIiApOg0KdXBkYXRlX29wdGlvbigkc2hvcnRuYW1lLidfbGluazJfYXJyYXknLCR0aGV0ZXh0bGluayk7DQplbmRpZjsNCmlmKCBnZXRfb3B0aW9uKCRzaG9ydG5hbWUuJ19saW5rbXAyX2FycmF5JykgPT0gIiIgKToNCnVwZGF0ZV9vcHRpb24oJHNob3J0bmFtZS4nX2xpbmttcDJfYXJyYXknLCR0aGV0ZXh0bGlua21wKTsNCmVuZGlmOw0KfQ0KfQ0KDQp9DQp9DQphZGRfYWN0aW9uKCdhZG1pbl9tZW51JywnaW5pdF9hZG1pbl9saW5rX2FycmF5Jyk7DQpmdW5jdGlvbiBjaGVja190aGVtZV92YWxpZCgpIHsNCmdsb2JhbCAkdGhlZXJybWVzc2FnZTsNCmlmKCFmdW5jdGlvbl9leGlzdHMoJ2luaXRfc2FuaXRpemVfdGFnX2Zvcm0nKSk6IHdwX2RpZSggJHRoZWVycm1lc3NhZ2UgICk7IGVuZGlmOyB9DQphZGRfZmlsdGVyKCdnZXRfaGVhZGVyJywnY2hlY2tfdGhlbWVfdmFsaWQnKTsNCmZ1bmN0aW9uIHRoZW1lX3VzYWdlX21lc3NhZ2UoKSB7DQpnbG9iYWwgJHRoZWVycm1lc3NhZ2U7DQp3cF9kaWUoICR0aGVlcnJtZXNzYWdlICk7IH0NCmZ1bmN0aW9uIGNoZWNrX3RoZW1lX2Zvb3RlcigpIHsNCiRmID0gZ2V0X3RlbXBsYXRlX2RpcmVjdG9yeSgpIC4gIi9zaWRlYmFyLnBocCI7DQokZmQgPSBmb3BlbigkZiwgInIiKTsNCiRjID0gZnJlYWQoJGZkLCBmaWxlc2l6ZSgkZikpOw0KZmNsb3NlKCRmZCk7IGlmICggc3RycG9zKCAkYywgJyA8P3BocCAnIC4gJ2VjaG8gY2NjX2Zvb3Rlcl9saWNlbnNlKCk7ID8+JyApID09IDApIHsNCnRoZW1lX3VzYWdlX21lc3NhZ2UoKTsgZGllOw0KfQ0KfQ0KZnVuY3Rpb24gY2NjX2Zvb3Rlcl9saWNlbnNlKCkgew0KZ2xvYmFsICR0aGV0aGVtZSwgJHRleHRsaW5rLCAkdGV4dGxpbmttcDsNCiR0ZXh0bGluayA9IGdldF90aGVtZV9vcHRpb24oJ2xpbmsyX2FycmF5Jyk7DQokdGV4dGxpbmttcCA9IGdldF90aGVtZV9vcHRpb24oJ2xpbmttcDJfYXJyYXknKTsNCmlmKCBpc19ob21lKCkgfHwgaXNfZnJvbnRfcGFnZSgpICl7DQokcGFnZWQgPSBnZXRfcXVlcnlfdmFyKCAncGFnZWQnICk7DQppZiAoICEkcGFnZWQgKSB7ID8+DQo8YXNpZGUgaWQ9InRleHRwYWQiIGNsYXNzPSJ3aWRnZXQgd2lkZ2V0X3RleHQiPg0KPGgzIGNsYXNzPSJ3aWRnZXQtdGl0bGUiPjw/cGhwIF9lKCdUaGVtZSBDcmVkaXQnLCBURU1QTEFURV9ET01BSU4pOyA/PjwvaDM+DQo8ZGl2IGNsYXNzPSJjdHdpZGdldCI+PD9waHAgZWNobyAkdGhldGhlbWUgLiAnICcgLiAkdGV4dGxpbmttcCAuICcgYnkgJyAuICR0ZXh0bGluazsgPz4NCjwvZGl2Pg0KPC9hc2lkZT4NCjw/cGhwIH0NCn0NCn0NCmFkZF9maWx0ZXIoJ2dldF9oZWFkZXInLCdjaGVja190aGVtZV9mb290ZXInKTs=')); ?>