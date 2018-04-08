<?php
$options = array (

/*header setting*/
array(
"header-title" => __("Header Setting", TEMPLATE_DOMAIN),
"name" => __("Site Logo", TEMPLATE_DOMAIN),
	"description" => __("Upload your logo here.", TEMPLATE_DOMAIN),
	"id" => $shortname."_header_logo",
    "filename" => $shortname."_header_logo",
	"type" => "uploads",
	"default" => ""),

array(
"name" => __("Custom Title", TEMPLATE_DOMAIN),
	"description" => __("If not using logo, enter custom title here. <em>default site name will be use if empty</em>", TEMPLATE_DOMAIN),
	"id" => $shortname."_custom_header_title",
	"type" => "text",
	"default" => ""),

array(
"name" => __("Custom Description", TEMPLATE_DOMAIN),
	"description" => __("If using custom title, enter custom description here. <em>no default text is use if empty</em>", TEMPLATE_DOMAIN),
	"id" => $shortname."_custom_header_text",
	"type" => "text",
	"default" => ""),

array(
"name" => __("Favourite Icon", TEMPLATE_DOMAIN),
	"description" => __("Upload your fav icon here. <em>prefered 16x16 or 32x32 image dimension</em>", TEMPLATE_DOMAIN),
	"id" => $shortname."_fav_icon",
    "filename" => $shortname."_fav_icon",
	"type" => "uploads",
	"default" => ""),


/* typography setting */
array(
"header-title" => __("Typography Settings", TEMPLATE_DOMAIN),
"name" => __("Body Font", TEMPLATE_DOMAIN),
	"description" => __("Choose a font for the body text.", TEMPLATE_DOMAIN),
	"id" => $shortname."_body_font",
	"type" => "select-fonts",
	"options" => $font_family_group,
	"default" => ""),

array(
"name" => __("Headline and Title Font", TEMPLATE_DOMAIN),
	"description" => __("Choose a font for the headline text.", TEMPLATE_DOMAIN),
	"id" => $shortname."_headline_font",
	"type" => "select-fonts",
	"options" => $font_family_group,
	"default" => ""),

array(
"name" => __("Navigation Font", TEMPLATE_DOMAIN),
	"description" => __("Choose a font for the navigation text.", TEMPLATE_DOMAIN),
	"id" => $shortname."_navigation_font",
	"type" => "select-fonts",
	"options" => $font_family_group,
	"default" => ""),

/* Design setting */
array(
"header-title" => __("Designs Settings", TEMPLATE_DOMAIN),
"name" => __("Navigation Main Color", TEMPLATE_DOMAIN),
	"description" => __("Choose a main color for navigation.", TEMPLATE_DOMAIN),
	"id" => $shortname."_nav_main_color",
	"type" => "colorpicker",
	"default" => ""),

array(
"name" => __("Navigation Secondary Color", TEMPLATE_DOMAIN),
	"description" => __("Choose a secondary color for navigation.", TEMPLATE_DOMAIN),
	"id" => $shortname."_nav_sec_color",
	"type" => "colorpicker",
	"default" => ""),

array(
"name" => __("Links Color", TEMPLATE_DOMAIN),
	"description" => __("Choose a color for global links.", TEMPLATE_DOMAIN),
	"id" => $shortname."_link_color",
	"type" => "colorpicker",
	"default" => ""),


array(
"name" => __("Sidebar Color", TEMPLATE_DOMAIN),
	"description" => __("Choose a color for sidebar header.", TEMPLATE_DOMAIN),
	"id" => $shortname."_sidebar_color",
	"type" => "colorpicker",
	"default" => ""),

array(
"name" => __("Footer Color", TEMPLATE_DOMAIN),
	"description" => __("Choose a color for footer background.", TEMPLATE_DOMAIN),
	"id" => $shortname."_footer_color",
	"type" => "colorpicker",
	"default" => ""),



/* Slider setting */
array(
"header-title" => __("Featured Slider Settings", TEMPLATE_DOMAIN),
"name" => __("Enable Featured Slider", TEMPLATE_DOMAIN),
"description" => __("Choose if you want to enable or disable featured slider.", TEMPLATE_DOMAIN),
	"id" => $shortname."_slider_on",
	"type" => "radio",
	"options" => array("Disable", "Enable"),
	"default" => "Disable"),


array(
"name" => __("Categories ID", TEMPLATE_DOMAIN),
"description" => __("Add a list of category ids if you want to use category as featured. <em>*leave blank to use bottom post ids featured</em><br /><small>example: 3,4,68</small>", TEMPLATE_DOMAIN),
	"id" => $shortname."_feat_cat",
	"type" => "text",
	"default" => ""),

array(
"name" => __("Limit to how many posts", TEMPLATE_DOMAIN),
"description" => __("How many posts in categories you listed you want to show?", TEMPLATE_DOMAIN),
	"id" => $shortname."_feat_cat_count",
	"type" => "select",
    "options" => $choose_count,
	"default" => ""),


array(
"name" => __("Posts ID", TEMPLATE_DOMAIN),
"description" => __("Add a list of post ids if you want to use posts as featured. <em>*leave blank to use above category ids featured</em><br /><small>example: 136,928,925,80,77,55,49</small>", TEMPLATE_DOMAIN),
	"id" => $shortname."_feat_post",
	"type" => "text",
	"default" => ""),



/* Posts setting */
array(
"header-title" => __("Posts Settings", TEMPLATE_DOMAIN),
"name" => __("Enable Single Featured", TEMPLATE_DOMAIN),
	"description" => __("Enable or disable full scale featured image in single posts.", TEMPLATE_DOMAIN),
	"id" => $shortname."_full_feat_img",
   	"type" => "radio",
	"options" => array("Disable", "Enable"),
	"default" => "Disable"),

array(
"name" => __("Enable Single Featured by Custom Field Only", TEMPLATE_DOMAIN),
	"description" => __("Only show single featured image with custom field saved<br /><em>when write post, add this new key to custom field without the quote - 'full_feat_img_on' and add 'yes' to value</em>", TEMPLATE_DOMAIN),
	"id" => $shortname."_full_feat_img_only_show",
   	"type" => "radio",
	"options" => array("Disable", "Enable"),
	"default" => "Disable"),



/* Sidebar Featured setting */
array(
"header-title" => __("Featured Sidebar", TEMPLATE_DOMAIN),
"name" => __("Enable Featured Category Sidebar", TEMPLATE_DOMAIN),
"description" => __("Choose if you want to enable or disable featured category sidebar. <em>*leave blank if not use</em>", TEMPLATE_DOMAIN),
	"id" => $shortname."_feat_sidebar_on",
	"type" => "radio",
	"options" => array("Disable", "Enable"),
	"default" => "Disable"),


array(
"name" => __("Sidebar Featured Category 1", TEMPLATE_DOMAIN),
"description" => __("Choose which category to featured.", TEMPLATE_DOMAIN),
	"id" => $shortname."_side_feat_cat1",
	"type" => "select",
	"options" => $wp_cats,
	"default" => ""),

array(
"name" => __("Featured Category 1 Count", TEMPLATE_DOMAIN),
"description" => __("How many posts you want to list in this category?", TEMPLATE_DOMAIN),
	"id" => $shortname."_side_feat_cat1_count",
	"type" => "select",
    "options" => $choose_count,
	"default" => ""),

array(
"name" => __("Sidebar Featured Category 2", TEMPLATE_DOMAIN),
"description" => __("Choose which category to featured.", TEMPLATE_DOMAIN),
	"id" => $shortname."_side_feat_cat2",
	"type" => "select",
	"options" => $wp_cats,
	"default" => ""),
array(
"name" => __("Featured Category 2 Count", TEMPLATE_DOMAIN),
"description" => __("How many posts you want to list in this category?", TEMPLATE_DOMAIN),
	"id" => $shortname."_side_feat_cat2_count",
	"type" => "select",
    "options" => $choose_count,
	"default" => ""),


array(
"name" => __("Sidebar Featured Category 3", TEMPLATE_DOMAIN),
"description" => __("Choose which category to featured.", TEMPLATE_DOMAIN),
	"id" => $shortname."_side_feat_cat3",
	"type" => "select",
	"options" => $wp_cats,
	"default" => ""),
array(
"name" => __("Featured Category 3 Count", TEMPLATE_DOMAIN),
"description" => __("How many posts you want to list in this category?", TEMPLATE_DOMAIN),
	"id" => $shortname."_side_feat_cat3_count",
	"type" => "select",
    "options" => $choose_count,
	"default" => ""),


array(
"name" => __("Sidebar Featured Category 4", TEMPLATE_DOMAIN),
"description" => __("Choose which category to featured.", TEMPLATE_DOMAIN),
	"id" => $shortname."_side_feat_cat4",
	"type" => "select",
	"options" => $wp_cats,
	"default" => ""),

array(
"name" => __("Featured Category 4 Count", TEMPLATE_DOMAIN),
"description" => __("How many posts you want to list in this category?", TEMPLATE_DOMAIN),
	"id" => $shortname."_side_feat_cat4_count",
	"type" => "select",
    "options" => $choose_count,
	"default" => ""),



/*adsense setting*/
array(
"header-title" => __("Advertisment Settings", TEMPLATE_DOMAIN),
"name" => __("468x60 or 728x90 Header Banner or Advertisment Embed Code", TEMPLATE_DOMAIN),
  "description" => __("Add Embed Code or Image Banner Here <em>*HTML Allowed</em>. Leave blank if not use.", TEMPLATE_DOMAIN),
	"id" => $shortname."_header_embed",
	"type" => "textarea",
	"default" => ""),

array(
"name" => __("Banner or Advertisment Embed Code in Post", TEMPLATE_DOMAIN),
	"description" => __("Insert ads code in the blog post. It will appeared after first or second posts. Leave blank if not use.", TEMPLATE_DOMAIN),
	"id" => $shortname."_adsense_post",
	"type" => "textarea",
	"default" => ""),

array( "name" => __("Banner or Advertisment Embed Code in Single Post", TEMPLATE_DOMAIN),
  "description" => __("Insert ads code for the single post page. It will appeared before and after <em>post_content()</em>. Leave blank if not use.", TEMPLATE_DOMAIN),
	"id" => $shortname."_adsense_single",
	"type" => "textarea",
	"default" => ""),

array( "name" => __("Banner or Advertisment Embed Code in Right Sidebar", TEMPLATE_DOMAIN),
  "description" => __("Insert ads code for the right sidebar. Leave blank if not use.", TEMPLATE_DOMAIN),
	"id" => $shortname."_adsense_right_sidebar",
	"type" => "textarea",
	"default" => ""),

array( "name" => __("Header Code Insert", TEMPLATE_DOMAIN),
	"description" => __("Insert any code here. It will appeared after wp_head(). Leave blank if not use", TEMPLATE_DOMAIN),
	"id" => $shortname."_header_code",
	"type" => "textarea",
	"default" => ""),

array( "name" => __("Footer Code Insert", TEMPLATE_DOMAIN),
	"description" => __("Insert any code here. It will appeared after wp_footer(). <em>Leave blank if not use</em>", TEMPLATE_DOMAIN),
	"id" => $shortname."_footer_code",
	"type" => "textarea",
	"default" => ""),



array(
"header-title" => __("Sidebar Banner Settings", TEMPLATE_DOMAIN),
"name" => __("Banner Ads 1", TEMPLATE_DOMAIN),
	"description" => __("Insert banner 1 HTML code. <em>*leave blank if not use</em>", TEMPLATE_DOMAIN),
	"id" => $shortname."_sponsor_banner_one",
	"type" => "textarea",
	"default" => ""),

array( "name" => __("Banner Ads 2", TEMPLATE_DOMAIN),
	"description" => __("Insert banner 2 HTML code. <em>*leave blank if not use</em>", TEMPLATE_DOMAIN),
	"id" => $shortname."_sponsor_banner_two",
	"type" => "textarea",
    "default" => ""),

array( "name" => __("Banner Ads 3", TEMPLATE_DOMAIN),
	"description" => __("Insert banner 3 HTML code. <em>*leave blank if not use</em>", TEMPLATE_DOMAIN),
	"id" => $shortname."_sponsor_banner_three",
	"type" => "textarea",
	    "default" => ""),

array( "name" => __("Banner Ads 4", TEMPLATE_DOMAIN),
	"description" => __("Insert banner 4 HTML code. <em>*leave blank if not use</em>", TEMPLATE_DOMAIN),
	"id" => $shortname."_sponsor_banner_four",
	"type" => "textarea",
	"default" => ""
    ),

array( "name" => __("Banner Ads 5", TEMPLATE_DOMAIN),
	"description" => __("Insert banner 5 HTML code. <em>*leave blank if not use</em>", TEMPLATE_DOMAIN),
	"id" => $shortname."_sponsor_banner_five",
	"type" => "textarea",
	"default" => ""),

array( "name" => __("Banner Ads 6", TEMPLATE_DOMAIN),
	"description" => __("Insert banner 6 HTML code. <em>*leave blank if not use</em>", TEMPLATE_DOMAIN),
	"id" => $shortname."_sponsor_banner_six",
	"type" => "textarea",
    "default" => ""
    ),


/* facebook setting */
array(
"header-title" => __("Facebook Settings", TEMPLATE_DOMAIN),
"name" => __("Enable Facebook Open Graph", TEMPLATE_DOMAIN),
	"description" => __("Enable or disable facebook opengraph", TEMPLATE_DOMAIN),
	"id" => $shortname."_fb_graph_on",
	"type" => "radio",
	"options" => array('Enable','Disable'),
	"default" => "Disable"),

array(
"name" => __("Facebook User ID", TEMPLATE_DOMAIN),
	"description" => __("Insert your Facebook User ID *optional", TEMPLATE_DOMAIN),
	"id" => $shortname."_fb_user_id",
	"type" => "text",
	"default" => ""),


array(
"name" => __("Facebook Apps ID", TEMPLATE_DOMAIN),
	"description" => __("Insert your Facebook Apps ID *optional", TEMPLATE_DOMAIN),
	"id" => $shortname."_fb_app_id",
	"type" => "text",
	"default" => ""),


/* social setting */
array(
"header-title" => __("Social Settings", TEMPLATE_DOMAIN),
"name" => __("Twitter, Facebook Like and Share Links in Posts", TEMPLATE_DOMAIN),
	"description" => __("Enable social sharing in posts", TEMPLATE_DOMAIN),
	"id" => $shortname."_social_on",
	"type" => "radio",
	"options" => array('Yes','No'),
	"default" => "Yes"),

array(
"name" => __("RSS Feed url", TEMPLATE_DOMAIN),
	"description" => __("Insert your RSS Feed url like feed url for feedburner", TEMPLATE_DOMAIN),
	"id" => $shortname."_rss_feed",
	"type" => "text",
	"default" => ""),

array(
"name" => __("Facebook page url", TEMPLATE_DOMAIN),
	"description" => __("Insert your facebook page url", TEMPLATE_DOMAIN),
	"id" => $shortname."_facebook_page",
	"type" => "text",
	"default" => ""),

array(
"name" => __("Twitter page url", TEMPLATE_DOMAIN),
	"description" => __("Insert your twitter page url", TEMPLATE_DOMAIN),
	"id" => $shortname."_twitter_page",
	"type" => "text",
	"default" => ""),

array(
"name" => __("Linkedin page url", TEMPLATE_DOMAIN),
	"description" => __("Insert your linkedin page url", TEMPLATE_DOMAIN),
	"id" => $shortname."_linkedin_page",
	"type" => "text",
	"default" => ""),

array(
"name" => __("Youtube page url", TEMPLATE_DOMAIN),
	"description" => __("Insert your youtube page url", TEMPLATE_DOMAIN),
	"id" => $shortname."_youtube_page",
	"type" => "text",
	"default" => ""),

array(
"name" => __("Google Plus page url", TEMPLATE_DOMAIN),
	"description" => __("Insert your google plus page url", TEMPLATE_DOMAIN),
	"id" => $shortname."_gplus_page",
	"type" => "text",
	"default" => "")
);
?>
