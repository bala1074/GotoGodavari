<?php
function theme_ms_css_option_register() {
global $choose_count, $wp_cats, $theme_name, $shortname, $options, $option_upload_path, $option_upload_url;
?>

<div id="custom-theme-option" class="wrap">
<?php screen_icon('edit'); echo "<h2>" . $theme_name . __( ' Custom CSS Options', TEMPLATE_DOMAIN ) . "</h2>"; ?>
<?php
if( isset($_GET["saved"]) ){
if ( $_REQUEST['saved'] ) echo '<div class="updated fade"><p><strong>'. $theme_name . __(' settings saved.', TEMPLATE_DOMAIN) . '</strong></p></div>';
}
if( isset($_GET["reset"]) ){
if ( $_REQUEST['reset'] ) echo '<div class="updated fade"><p><strong>'. $theme_name . __(' settings reset.', TEMPLATE_DOMAIN) . '</strong></p></div>';
}
?>

<form id="template" method="post" action="" enctype="multipart/form-data">
<table class="form-table">
<tr valign="top">
<td>
<?php
$valuex = $shortname . '_custom_css';
$valuey = stripslashes($valuex);
$valid_code = get_option($valuey);
?>

<textarea id="<?php echo $shortname . '_custom_css'; ?>" name="<?php echo $shortname . '_custom_css'; ?>" cols="70" rows="30" /><?php if ( get_option($valuey) != "") { echo stripslashes($valid_code); } ?>
</textarea><br />
<label class="description" for="<?php echo $shortname . '_custom_css'; ?>"><?php _e('Insert your custom css here', TEMPLATE_DOMAIN); ?></label>
</td>
</tr>
</table>
<div style="float: left; margin: 20px 40px 0 0;" class="submit">
<input name="save" type="submit" class="button-primary sbutton" value="<?php echo esc_attr(__('Save Custom CSS',TEMPLATE_DOMAIN)); ?>" /><input type="hidden" name="action" value="save" />
</div>
</form>
<form method="post">
<div style="float: left; margin: 20px 40px 0 0;" class="submit">
<?php
$alert_message = __("Are you sure you want to delete all saved custom css for this theme?.", TEMPLATE_DOMAIN ); ?>
<input name="reset" type="submit" class="button-secondary" onclick="return confirm('<?php echo $alert_message; ?>')" value="<?php echo esc_attr(__('Reset Custom CSS',TEMPLATE_DOMAIN)); ?>" />
<input type="hidden" name="action" value="reset" />
</div>
</form>
</div>
<?php
}


function theme_ms_css_admin_register() {
global $choose_count, $wp_cats, $theme_name, $shortname, $options, $option_upload_path, $option_upload_url;
if ( isset($_GET['page']) && $_GET['page'] == 'custom-css' ) {
if ( isset($_POST["save"]) && 'save' == $_REQUEST['action'] ) {
update_option( $shortname . '_custom_css',  $_REQUEST[ $shortname . '_custom_css' ] );
if( isset( $_REQUEST[ $shortname . '_custom_css' ] ) ) { update_option( $shortname . '_custom_css',  $_REQUEST[ $shortname . '_custom_css' ] ); } else { delete_option( $shortname . '_custom_css' ); }
header("Location: themes.php?page=custom-css&saved=true");
die;
}
if( isset($_POST["reset"]) && 'reset' == $_REQUEST['action'] ) {
delete_option( $shortname . '_custom_css' );
header("Location: themes.php?page=custom-css&reset=true");
die;
}
}
add_theme_page(_g ($theme_name . __(' Custom CSS' , TEMPLATE_DOMAIN)),  _g (__('Custom CSS', TEMPLATE_DOMAIN)),  'edit_theme_options', 'custom-css', 'theme_ms_css_option_register');
}
add_action('admin_menu', 'theme_ms_css_admin_register');

?>