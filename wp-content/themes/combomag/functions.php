<?php
////////////////////////////////////////////////////////////////////////////////
// Global Define
////////////////////////////////////////////////////////////////////////////////
define('TEMPLATE_DOMAIN', 'combomag'); // do not change this, its for translation and options string
define('SUPER_STYLE', 'yes');

////////////////////////////////////////////////////////////////////////////////
// Global Setup
////////////////////////////////////////////////////////////////////////////////
function combomag_theme_setup() {
if ( !isset( $content_width ) ) { $content_width = 550; }
//Add Language Support
load_theme_textdomain( TEMPLATE_DOMAIN, get_template_directory() . '/languages' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'woocommerce' );
add_image_size( 'thumbnail', 300, 300, true);
add_image_size( 'featured-slider-img', 640, 480, true );
set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
// Add default posts and comments RSS feed links to head
add_theme_support( 'automatic-feed-links' );
add_editor_style();
add_theme_support( 'menus' );
if( class_exists('woocommerce') ) { add_theme_support('woocommerce'); }

register_nav_menus( array(
'primary' => __( 'Primary Menu', TEMPLATE_DOMAIN ),
'footer' => __( 'Footer Menu', TEMPLATE_DOMAIN ),
));

$custom_background_support = array(
	'default-color'          => '',
	'default-image'          => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $custom_background_support );

// Add support for custom headers.
$custom_header_support = array(
// The default header text color.
		'default-text-color' => 'ffffff',
        'default-image' => '',
        'header-text'  => true,
		// The height and width of our custom header.
		'width' => 1440,
		'height' => '',
		// Support flexible heights.
		'flex-height' => true,
		// Random image rotation by default.
	   'random-default'	=> false,
		// Callback for styling the header.
		'wp-head-callback' => '',
		// Callback for styling the header preview in the admin.
		'admin-head-callback' => '',
		// Callback used to display the header preview in the admin.
		'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $custom_header_support );
}
add_action( 'after_setup_theme', 'combomag_theme_setup' );



// add default callback for wp_list_pages
if(!function_exists('revert_wp_menu_page')):
function revert_wp_menu_page($args) {
global $bp_active,$bp;
$pages_args = array('depth' => 0,'echo' => false,'exclude' => '','title_li' => '');
$menu = wp_page_menu( $pages_args );
$menu = str_replace( array( '<div class="menu"><ul>', '</ul></div>' ), array( '<ul class="sf-menu">', '</ul>' ), $menu );
echo $menu;
if( $bp_active=='true' ): do_action( 'bp_nav_items' ); endif;
?>
<?php }
endif;

// add default callback for wp_list_categories
if ( !function_exists( 'revert_wp_menu_cat' ) ):
function revert_wp_menu_cat() {
global $bp;
$menu = wp_list_categories('orderby=name&show_count=0&title_li=');
return $menu;
 ?>
<?php }
endif;

// add home link in wp_nav_menu selection
if (!function_exists('wp_dtheme_page_menu_args')) :
function wp_dtheme_page_menu_args( $args ) {
$args['show_home'] = true; return $args; }
add_filter( 'wp_page_menu_args', 'wp_dtheme_page_menu_args' );
endif;

//load google webfont style
if ( ! function_exists( 'theme_load_gwf_styles' ) ) :
function theme_load_gwf_styles() {
if( get_theme_option('body_font') == 'Choose a font' || get_theme_option('body_font') == '') {
wp_register_style('default_gwf', 'http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,700italic,300,300italic');
wp_enqueue_style( 'default_gwf');
}
}
add_action('wp_print_styles', 'theme_load_gwf_styles');
endif;

//load custom style init
function custom_theme_style_init() {
global $theme_version,$shortname,$is_IE,$bp_active;
echo "<style type='text/css' media='all'>";
if($is_IE): ?>
#main-navigation,.post-meta,a.button,input[type='button'], input[type='submit'],h1.post-title,.wp-pagenavi a,#sidebar .item-options,.iegradient,h3.widget-title,.footer-bottom,.sf-menu .current_page_item a, .sf-menu .current_menu_item a, .sf-menu .current-menu-item a,.sf-menu .current_page_item a:hover, .sf-menu .current_menu_item a:hover, .sf-menu .current-menu-item a:hover {filter: none !important;}
<?php endif; ?>
@font-face {
  font-family: 'FontAwesome';
  src: url('<?php echo get_template_directory_uri(); ?>/lib/scripts/fontawesome/font/fontawesome-webfont.eot');
  src: url('<?php echo get_template_directory_uri(); ?>/lib/scripts/fontawesome/font/fontawesome-webfont.eot?#iefix') format('eot'), url('<?php echo get_template_directory_uri(); ?>/lib/scripts/fontawesome/font/fontawesome-webfont.woff') format('woff'), url('<?php echo get_template_directory_uri(); ?>/lib/scripts/fontawesome/font/fontawesome-webfont.ttf') format('truetype'), url('<?php echo get_template_directory_uri(); ?>/lib/scripts/fontawesome/font/fontawesome-webfont.otf') format('opentype'), url('<?php echo get_template_directory_uri(); ?>/lib/scripts/fontawesome/font/fontawesome-webfont.svg#FontAwesome') format('svg');
  font-weight: normal;
  font-style: normal;
}
<?php get_template_part ( '/lib/options/options-css' ); ?>

<?php if( get_theme_option('custom_css') ): ?>
<?php echo get_theme_option('custom_css'); ?>
<?php endif; ?>

<?php echo "</style>"; ?>
<?php }
add_action('wp_head','custom_theme_style_init');

///////////////////////////////////////////////////////////////////////////////
// Load Theme Styles and Javascripts
///////////////////////////////////////////////////////////////////////////////
/*---------------------------load styles--------------------------------------*/
if ( ! function_exists( 'theme_load_styles' ) ) :
function theme_load_styles() {
global $theme_version,$is_IE;

wp_enqueue_style( 'superfish', get_template_directory_uri(). '/lib/scripts/superfish-menu/css/superfish.css', array(), $theme_version );
wp_enqueue_style( 'tabber', get_template_directory_uri() . '/lib/scripts/tabber/tabber.css', array(), $theme_version );

if ( ( is_home() || is_page_template('page-templates/template-blog.php') ) && get_theme_option('slider_on') == 'Enable'  ){ wp_enqueue_style( 'jd-gallery-css', get_template_directory_uri(). '/lib/scripts/jd-gallery/jd.gallery.css', array(), $theme_version ); }

/*load font awesome */
wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/lib/scripts/fontawesome/css/font-awesome.css', array(), $theme_version );

if($is_IE):
wp_enqueue_style( 'font-awesome-ie7', get_template_directory_uri() . '/lib/scripts/fontawesome/css/font-awesome-ie7.css', array(), $theme_version );
endif;

?>

<?php
}
endif;
add_action( 'wp_enqueue_scripts', 'theme_load_styles' );

/*---------------------------load js scripts--------------------------------------*/
if ( ! function_exists( 'theme_load_scripts' ) ) :
function theme_load_scripts() {
global $theme_version,$is_IE;
wp_enqueue_script("jquery");
wp_enqueue_script('modernizr', get_template_directory_uri() . '/lib/scripts/modernizr/modernizr.js', false,$theme_version, true );
if($is_IE):
wp_enqueue_script('html5shim', '//html5shiv.googlecode.com/svn/trunk/html5.js',false,$theme_version, false );
endif;
wp_enqueue_script( 'tabber', get_template_directory_uri() . '/lib/scripts/tabber/tabber.js', false, $theme_version,true );

wp_enqueue_script('superfish-js', get_template_directory_uri() . '/lib/scripts/superfish-menu/js/superfish.js', false, $theme_version,true );
wp_enqueue_script('supersub-js', get_template_directory_uri() . '/lib/scripts/superfish-menu/js/supersubs.js', false, $theme_version,true );

if ( ( is_home() || is_page_template('page-templates/template-blog.php') ) && get_theme_option('slider_on') == 'Enable' ) {
wp_enqueue_script('mootools-js', get_template_directory_uri(). '/lib/scripts/jd-gallery/mootools.v1.11.js', false, $theme_version, true );
wp_enqueue_script('jd-gallery2-js', get_template_directory_uri(). '/lib/scripts/jd-gallery/jd.gallery.v2.js', false, $theme_version, true );
wp_enqueue_script('jd-gallery-set-js', get_template_directory_uri(). '/lib/scripts/jd-gallery/jd.gallery.set.js', false, $theme_version, true );
wp_enqueue_script('jd-gallery-transitions-js', get_template_directory_uri(). '/lib/scripts/jd-gallery/jd.gallery.transitions.js', false, $theme_version, true );
}

if( get_theme_option('social_on') == 'Yes' ):
wp_enqueue_script('addthis-js', '//s7.addthis.com/js/300/addthis_widget.js', false, $theme_version, true );
endif;

wp_enqueue_script('custom-js', get_template_directory_uri() . '/lib/scripts/custom.js', false,$theme_version, true );

if ( is_singular() && get_option( 'thread_comments' ) && comments_open() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php }
endif;
add_action( 'wp_enqueue_scripts', 'theme_load_scripts' );

//////////////////////////////////////////////////////////////////////////////
// CUSTOMIZE PREVIEW
/////////////////////////////////////////////////////////////////////////////
function mptheme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_image' )->transport = 'postMessage';
}
add_action( 'customize_register', 'mptheme_customize_register' );

function mptheme_customize_preview_js() {
	wp_enqueue_script( 'mytheme-customizer', get_template_directory_uri() . '/lib/scripts/customizer.js', array( 'customize-preview' ), '20130301', true );
}
add_action( 'customize_preview_init', 'mptheme_customize_preview_js' );


////////////////////////////////////////////////////////////////////////////////
// Add Theme Custom Functions
////////////////////////////////////////////////////////////////////////////////
include( get_template_directory() . '/lib/functions/theme-functions.php' );
include( get_template_directory() . '/lib/functions/option-functions.php' );
include( get_template_directory() . '/lib/functions/widget-functions.php' );

////////////////////////////////////////////////////////////////////////////////
// Add Theme Extra Functions
////////////////////////////////////////////////////////////////////////////////
if ( file_exists( get_template_directory() . '/dev-functions.php' ) ) {
include( get_template_directory() . '/dev-functions.php' );
}
?>