<?php
/**
 * AL 2015 Sidebar Post Type
 *
 * Plugin Name:       AL 2015 Admin Touch-up
 * Plugin URI:        http://gu.se
 * Description:       Customization to admin css, TinyMCE and meta boxes to use in combination with theme AL Mag 2015.
 * Version:           0.2
 * Author:            Pontus Sundén
 * Author URI:        http://gu.se
 * Text Domain:       al15-admin
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


/// Remove Genesis Page Templates /////////////////////////////////////////
add_filter( 'theme_page_templates', 'psu_al15admin_remove_genesis_page_templates' );
function psu_al15admin_remove_genesis_page_templates( $page_templates ) {
//	unset( $page_templates['page_archive.php'] );
//	unset( $page_templates['page_blog.php'] );
	unset( $page_templates['page_landing.php'] );
	return $page_templates;
}

/// Remove Genesis in-post SEO Settings /////////////////////////////////////////
if ( function_exists('genesis_add_inpost_seo_box') )
	remove_action( 'admin_menu', 'genesis_add_inpost_seo_box' );

/// Remove Genesis Layout Settings /////////////////////////////////////////
if ( function_exists('genesis-inpost-layouts') )
	remove_theme_support( 'genesis-inpost-layouts' );


/// Add admin custom css /////////////////////////////////////////
add_action('admin_enqueue_scripts', 'psu_al15admin_custom_css');
function psu_al15admin_custom_css() {
  wp_enqueue_style(
		'al15-admin-customization',
		plugin_dir_url( __FILE__ ) . 'al15-admin-customization.css?' . time()
	);
}

/// Modifying TinyMCE editor to remove unused items. /////////////////////////////////////////
// https://codex.wordpress.org/TinyMCE
//add_filter( 'tiny_mce_before_init', 'psu_al15admin_customize_tinymce' );
function psu_al15admin_customize_tinymce( $in ) {
//	$in['remove_linebreaks'] = false;
//	$in['gecko_spellcheck'] = false;
//	$in['keep_styles'] = true;
//	$in['accessibility_focus'] = true;
//	$in['tabfocus_elements'] = 'major-publishing-actions';
//	$in['media_strict'] = false;
//	$in['paste_remove_styles'] = false;
//	$in['paste_remove_spans'] = false;
//	$in['paste_strip_class_attributes'] = 'none';
//	$in['paste_text_use_dialog'] = true;
//	$in['wpeditimage_disable_captions'] = true;
//	$in['plugins'] = 'tabfocus,paste,media,fullscreen,wordpress,wpeditimage,wpgallery,wplink,wpdialogs,wpfullscreen';
//	$in['content_css'] = get_template_directory_uri() . "/editor-style.css";
//	$in['wpautop'] = true;
//	$in['apply_source_formatting'] = false;
  $in['block_formats'] = "Paragraph=p; Heading 2=h2; Heading 3=h3";
//	$in['toolbar1'] = 'bold,italic,strikethrough,bullist,numlist,blockquote,hr,alignleft,aligncenter,alignright,link,unlink,wp_more,spellchecker,wp_fullscreen,wp_adv ';
	$in['toolbar1'] = 'bold,italic,strikethrough,bullist,numlist,blockquote,link,unlink,wp_fullscreen,wp_adv';
//	$in['toolbar2'] = 'formatselect,underline,alignjustify,forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo,wp_help ';
	$in['toolbar2'] = 'formatselect,pastetext,removeformat,undo,redo';
//	$in['toolbar3'] = '';
//	$in['toolbar4'] = '';
	return $in;
}

/// Remove meta boxes /////////////////////////////////////////
add_action('admin_menu','psu_al15admin_remove_post_metaboxes');
function psu_al15admin_remove_post_metaboxes() {
//	remove_meta_box( 'authordiv','post','normal' ); // Author Metabox
	remove_meta_box( 'formatdiv','post','normal' ); // Formats
	remove_meta_box( 'postcustom','post','normal' ); // Custom Fields Metabox
	//remove_meta_box( 'postexcerpt','post','normal' ); // Excerpt Metabox
	remove_meta_box( 'revisionsdiv','post','normal' ); // Revisions Metabox
	remove_meta_box( 'slugdiv','post','normal' ); // Slug Metabox
	remove_meta_box( 'trackbacksdiv','post','normal' ); // Trackback Metabox
}



/// Activate/Deactivate plugin /////////////////////////////////////////
// https://developer.wordpress.org/plugins/the-basics/activation-deactivation-hooks/

register_activation_hook( __FILE__, 'psu_al15admin_install' );
function psu_al15admin_install() {

}

register_deactivation_hook( __FILE__, 'psu_al15admin_deactivation' );
function psu_al15admin_deactivation() {

}
