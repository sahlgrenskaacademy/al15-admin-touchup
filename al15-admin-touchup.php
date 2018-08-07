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



/// Activate/Deactivate plugin /////////////////////////////////////////
// https://developer.wordpress.org/plugins/the-basics/activation-deactivation-hooks/

register_activation_hook( __FILE__, 'psu_al15admin_install' );
function psu_al15admin_install() {
    // trigger our function that registers the custom post type
    //psu_al15admin_XXX();
}

register_deactivation_hook( __FILE__, 'psu_al15admin_deactivation' );
function psu_al15admin_deactivation() {
}
