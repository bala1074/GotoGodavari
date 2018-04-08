<?php
////////////////////////////////////////////////////////////////////////////////
// get theme option
////////////////////////////////////////////////////////////////////////////////
if( !function_exists('get_theme_option') ):
function get_theme_option($option)
{
global $shortname;
return stripslashes(get_option($shortname . '_' . $option));
}
endif;

if( !function_exists('get_theme_settings') ):
function get_theme_settings($option)
{
return stripslashes(get_option($option));
}
endif;


////////////////////////////////////////////////////////////////////////////////
// get alt style list
////////////////////////////////////////////////////////////////////////////////
$alt_stylesheet_path = get_template_directory() . '/lib/styles/alt-styles/';
$alt_stylesheets = array();
if ( is_dir($alt_stylesheet_path) ) {
if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) {
while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
if(stristr($alt_stylesheet_file, ".css") !== false) {
$alt_stylesheets[] = $alt_stylesheet_file;
}
}
}
}
$styles_bulk_list = array_unshift($alt_stylesheets, "default.css");

////////////////////////////////////////////////////////////////////////////////
// global upload path
////////////////////////////////////////////////////////////////////////////////
$option_upload = wp_upload_dir();
$option_upload_path = $option_upload['basedir'];
$option_upload_url = $option_upload['baseurl'];


////////////////////////////////////////////////////////////////////////////////
// multiple string option page
////////////////////////////////////////////////////////////////////////////////
function _g($str) { return $str; }

function theme_admin_head_script() {
global $theme_version;
if ( isset($_GET["page"]) && $_GET["page"] == "theme-options" ) {
wp_enqueue_script( 'theme-color-picker-js', get_template_directory_uri() . '/lib/admin/js/colorpicker.js', array( 'jquery' ), $theme_version );
wp_enqueue_script( 'theme-option-custom-js', get_template_directory_uri() . '/lib/admin/js/options-custom.js', array( 'jquery' ), $theme_version );
?>

<?php
}
}

function theme_admin_head_style() {
global $theme_version;
if ( isset($_GET["page"]) && $_GET["page"] == "theme-options") {
wp_enqueue_style( 'admin-css', get_template_directory_uri() . '/lib/admin/css/admin.css', array(), $theme_version );
wp_enqueue_style( 'color-picker-main', get_template_directory_uri() . '/lib/admin/css/colorpicker.css', array(), $theme_version );
?>
<?php }
}
add_action('admin_footer', 'theme_admin_head_script');
add_action('admin_print_styles', 'theme_admin_head_style');


////////////////////////////////////////////////////////////////////////////////
// Theme Option
////////////////////////////////////////////////////////////////////////////////
$theme_data = wp_get_theme( TEMPLATE_DOMAIN );
$theme_version = $theme_data['Version'];
$theme_name = $theme_data['Name'];
$shortname = 'tn_'.TEMPLATE_DOMAIN;

$choose_count = array("Select a number","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20");

/* including fonts functions */
include_once( get_template_directory() . '/lib/functions/fonts-functions.php');

$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
$wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}
array_unshift($wp_cats, "Choose a category");


function theme_admin_option_register() {
global $background_pattern_list,$font_family_group, $choose_count, $wp_cats, $theme_name, $shortname, $options, $option_upload_path, $option_upload_url;
/* including settings functions */
include_once( get_template_directory() . '/lib/functions/option-settings.php');
?>

<div id="custom-theme-option" class="wrap">
<?php screen_icon(); echo "<h2>" . $theme_name . __( ' Theme Options', TEMPLATE_DOMAIN ) . "</h2>"; ?>
<?php
if ( isset($_REQUEST['saved']) && $_REQUEST['saved'] ) echo '<div class="updated fade"><p><strong>'. $theme_name . __(' settings saved.', TEMPLATE_DOMAIN) . '</strong></p></div>';
if ( isset($_REQUEST['reset']) && $_REQUEST['reset'] ) echo '<div class="updated fade"><p><strong>'. $theme_name . __(' settings reset.', TEMPLATE_DOMAIN) . '</strong></p></div>';
?>

<!-- START ANNOUCE -->
<div id="announce">
<div id="socialbox">
<p>Thank You For Using <?php echo $theme_name; ?> WordPress Theme By <a rel="nofollow" href="http://www.magpress.com" target="_blank">MagPress.com</a></p>
<a title="Like MagPress on Facebook" href="https://www.facebook.com/magpresswpthemes"><img class="alignleft" src="<?php echo get_template_directory_uri(); ?>/lib/admin/images/facebook.png" alt="Facebook" /></a>
<a title="Follow MagPress on Twitter" href="https://twitter.com/magpresswptheme"><img class="alignleft" src="<?php echo get_template_directory_uri(); ?>/lib/admin/images/twitter.png" alt="Twitter" /></a>
<a title="Connect with MagPress on Google+" href="https://plus.google.com/+Magpress"><img class="alignleft" src="<?php echo get_template_directory_uri(); ?>/lib/admin/images/googleplus.png" alt="Google+" /></a>
<a title="Share with MagPress on Pinterest" href="http://pinterest.com/magpresswptheme/"><img class="alignleft" src="<?php echo get_template_directory_uri(); ?>/lib/admin/images/pinit.png" alt="Pinit" /></a>
<a title="Stay Update with MagPress on Feeds" href="http://feeds.feedburner.com/MagPress"><img class="alignleft" src="<?php echo get_template_directory_uri(); ?>/lib/admin/images/feeds.png" alt="RSS Feeds" /></a>
<p class="bigp"><strong>Please Note: This Free version contained theme author or contributor credits link. check <a href="http://www.magpress.com/license-terms" target="_blank" title="Theme License and Terms">license and terms</a></strong></p>
<p>If you're interested in purchasing a developer's license for this theme, you can go to <?php echo $theme_name; ?> <a href="http://www.magpress.com/wordpress-themes/<?php echo strtolower($theme_name); ?>.html">purchase link</a> or go to this <a href="http://www.magpress.com/developer-license?theme=<?php echo strtolower($theme_name); ?>" target="_blank">developer license purchase page</a>.</p>
</div>
</div>
<!-- END ANNOUCE -->


<form id="wp-theme-options" method="post" action="" enctype="multipart/form-data">

<table class="form-table">

<?php foreach ($options as $value) { ?>

<?php if ( isset( $value['header-title'] ) && $value['header-title'] != "" ) { ?>
<tr class="trtitle" valign="top"><th scope="row"><h3><?php echo stripslashes($value['header-title']); ?></h3></th></tr>
<?php } ?>


<?php if ( $value['type'] == "text" ) { ?>

<tr valign="top"><th scope="row"><?php echo $value['name']; ?></th>
<td>
<input class="regular-text" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo stripslashes($value['default']); } ?>" /><br />
<label class="description" for="<?php echo $value['id']; ?>"><?php echo $value['description']; ?></label>
</td>
</tr>

<?php } else if ( $value['type'] == "uploads" ) { ?>

<tr valign="top"><th scope="row"><?php echo $value['name']; ?></th>
<td>
<?php if( file_exists( $option_upload_path . '/' . $value['filename'] . '.jpg') ) { ?>
<img src="<?php echo $option_upload_url . '/' . $value['filename'] . '.jpg'; ?>" alt="<?php echo $value['id']; ?>" />
<br /><input type="submit" class="button-secondary" name="delete_<?php echo $value['filename']; ?>" value="<?php _e('Delete this image &raquo;', TEMPLATE_DOMAIN); ?>" />
<?php } else { ?>
<input type="file" id="<?php echo $value['id']; ?>" name="<?php echo $value['filename']; ?>" size="50" />
<br />
<label class="description" for="<?php echo $value['id']; ?>"><?php echo $value['description']; ?></label>
<?php } ?>
</td>
</tr>

<?php } elseif ( $value['type'] == "radio" ) { // setting ?>

<tr valign="top"><th scope="row"><?php echo $value['name']; ?></th>
<td>
<?php foreach ($value['options'] as $option) {
$radio_setting = get_option($value['id']);
if($radio_setting != '') {
if (get_option($value['id']) == $option) { $checked = "checked=\"checked\""; } else { $checked = ""; }
} else {
if(get_option($value['id']) == $value['default'] ){ $checked = "checked=\"checked\""; } else { $checked = ""; }
} ?>
<input id="<?php echo $value['hide_call']; ?>" type="radio" name="<?php echo $value['id']; ?>" value="<?php echo $option; ?>" <?php echo $checked; ?> />&nbsp;<?php echo $option; ?>&nbsp;&nbsp;&nbsp;
<?php } ?>
<br /><label class="description" for="<?php echo $value['id']; ?>"><?php echo $value['description']; ?></label>
</td>
</tr>


<?php } elseif ( $value['type'] == "checkbox" ) { // setting ?>

<tr valign="top"><th scope="row"><?php echo $value['name']; ?></th>
<td>
<?php if(get_option($value['id'])) { $checked = "checked=\"checked\""; } else { $checked = ""; } ?>
<input type="<?php echo $value['type']; ?>" class="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="<?php echo $value['id']; ?>" <?php echo $checked; ?> />&nbsp;&nbsp;<?php echo $value['name']; ?>
<br /><label class="description" for="<?php echo $value['id']; ?>"><?php echo $value['description']; ?></label>
</td>
</tr>

<?php } elseif ( $value['type'] == "textarea" ) { // setting ?>

<tr valign="top"><th scope="row"><?php echo $value['name']; ?></th>
<td>
<?php
$valuex = $value['id'];
$valuey = stripslashes($valuex);
$video_code = get_option($valuey);
?>
<textarea name="<?php echo $valuey; ?>" class="mytext" cols="60%" rows="8" /><?php if ( get_option($valuey) != "") { echo stripslashes($video_code); } else { echo $value['default']; } ?>
</textarea><br />
<label class="description" for="<?php echo $value['id']; ?>"><?php echo $value['description']; ?></label>
</td>
</tr>

<?php } elseif ( $value['type'] == "colorpicker" ) { ?>

<tr valign="top"><th scope="row"><?php echo $value['name']; ?></th>
<td>

<div id="<?php echo esc_attr( $value['id'] . '_picker' ); ?>" class="colorSelector">
<div style="background-color:<?php if( get_option( $value['id'] )) { echo get_option( $value['id'] ); } ?>"></div></div>&nbsp;
<input class="of-color" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if( get_option( $value['id'] )) { echo get_option( $value['id'] ); } ?>" /><br /><label class="description" for="<?php echo $value['id']; ?>">&nbsp;&nbsp;<?php echo $value['description']; ?></label>
</td>
</tr>


<?php } elseif ( $value['type'] == "select" ) { ?>

<tr class="<?php echo $value['hide_blk']; ?>" valign="top"><th scope="row"><?php echo $value['name']; ?></th>
<td>
<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
<option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['default']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
<?php } ?>
</select><br />
<label class="description" for="<?php echo $value['id']; ?>"><?php echo $value['description']; ?></label>
</td>
</tr>


<?php } elseif ( $value['type'] == "select-fonts" ) { ?>

<tr valign="top"><th scope="row"><?php echo $value['name']; ?></th>
<td>
<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
<option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == get_option( $value['default']) ) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
<?php } ?>
</select>
<br />
<label class="description" for="<?php echo $value['id']; ?>"><?php echo $value['description']; ?></label>
</td>
</tr>


<?php } elseif ( $value['type'] == "notice" ) { ?>

<tr valign="top"><th scope="row"></th>
<td>
<p class="<?php echo $value['hide_blk']; ?> notice"><?php echo $value['description']; ?></p>
</td>
</tr>


<?php } ?>

<?php } ?>
</table>

<div style="float: left; margin: 20px 40px 0 0;" class="submit">
<input name="save" type="submit" class="button-primary sbutton" value="<?php echo esc_attr(__('Save Options',TEMPLATE_DOMAIN)); ?>" /><input type="hidden" name="action" value="save" />
</div>
</form>

<form method="post">
<div style="float: left; margin: 20px 40px 0 0;" class="submit">
<?php
$alert_message = __("Are you sure you want to delete all saved settings for this theme?.", TEMPLATE_DOMAIN ); ?>
<input name="reset" type="submit" class="button-secondary" onclick="return confirm('<?php echo $alert_message; ?>')" value="<?php echo esc_attr(__('Reset Options',TEMPLATE_DOMAIN)); ?>" />
<input type="hidden" name="action" value="reset" />
</div>
</form>


</div>

<?php }



function theme_admin_menu_register() {
global $background_pattern_list,$font_family_group, $choose_count, $wp_cats, $theme_name, $shortname, $options, $option_upload_path, $option_upload_url;
/* including settings functions */
include_once( get_template_directory() . '/lib/functions/option-settings.php');

if ( isset($_GET["page"]) && $_GET['page'] == 'theme-options' ) {
if ( isset($_REQUEST['action']) && $_REQUEST['action'] == 'save' ) {

foreach ($options as $value) {

if( isset( $_REQUEST[ $value['id'] ] ) ) {
update_option( $value['id'], $_REQUEST[ $value['id'] ] );
}

$file_upload_check = isset( $value['filename'] ) ? $value['filename'] : "";

if( $file_upload_check != '' ) {
if( $_FILES[ $value['filename'] ]['type'] ) {

//Get the file information
$userfile_name = $_FILES[ $value['filename'] ]['name'];
$userfile_sanitize_name = str_replace(" ","-",$userfile_name);
$userfile_sanitize_ext = substr($userfile_sanitize_name, strripos($userfile_sanitize_name, '.'));
$userfile_size = $_FILES[ $value['filename'] ]['size'];
$userfile_tmp = $_FILES[ $value['filename'] ]['tmp_name'];
$allowed_file_types = array('.png','.jpg','.jpeg','.gif');
if ( in_array($userfile_sanitize_ext,$allowed_file_types) ) {
$large_image_location = $option_upload_path . '/' . $value['filename'] . '.jpg';
if(ereg('[^a-zA-Z0-9 ._.-]', $userfile_sanitize_name)){
echo "<p class=\"uperror\">" . __('The image name contain invalid character, rename it and try upload it again', TEMPLATE_DOMAIN) . "</p>";
} else {
move_uploaded_file($userfile_tmp, $large_image_location);
chmod($large_image_location, 0777);
}
}
}
}
}

if ( isset( $_POST[ 'delete_' . $shortname . '_header_logo' ] )){
if( file_exists( $option_upload_path . '/' . $shortname . '_header_logo.jpg') ) {
unlink($option_upload_path . '/' . $shortname . '_header_logo.jpg' );
}
}

if ( isset( $_POST[ 'delete_' . $shortname . '_fav_icon' ] )){
if( file_exists( $option_upload_path . '/' . $shortname . '_fav_icon.jpg') ) {
unlink($option_upload_path . '/' . $shortname . '_fav_icon.jpg' );
}
}

foreach ($options as $value) {
if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'],  $_REQUEST[ $value['id'] ] ); } else { delete_option( $value['id'] ); }
}

header("Location: themes.php?page=theme-options&saved=true");
die;

} else if( isset($_REQUEST['action']) && 'reset' == $_REQUEST['action'] ) {

foreach ($options as $value) {
delete_option( $value['id'] );
if( isset($value['filename']) && file_exists( $option_upload_path . '/' . $value['filename'] . '.jpg' )) {
unlink($option_upload_path . '/' . $value['filename'] . '.jpg');
}
}
header("Location: themes.php?page=theme-options&reset=true");
die;
}
}

add_theme_page(_g ($theme_name . __(' Options' , TEMPLATE_DOMAIN)),  _g (__('Theme Options', TEMPLATE_DOMAIN)),  'edit_theme_options', 'theme-options', 'theme_admin_option_register');
}

add_action('admin_menu', 'theme_admin_menu_register');


/* including multisite custom css functions */
include_once( get_template_directory() . '/lib/functions/ms-css-functions.php');

?>