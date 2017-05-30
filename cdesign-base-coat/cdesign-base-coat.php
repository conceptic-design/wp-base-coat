<?php

/**
 *
 * @link              http://concepticdesign.com
 * @package       Cdesign_Base_Coat
 *
 * @wordpress-plugin
 * Plugin Name:     Base Coat
 * Plugin URI:        http://concepticdesign.com
 * Description:       A base plugin to prepare new installs of WP with preferred settings and framework
 * Version:           1.0.2
 * Author:            Conceptic Design
 * Author URI:        http://concepticdesign.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cdesign-base-coat
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Activate base coat
 */
function activate_base_coat() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/cdesign-base-coat-activator.php';
	Cdesign_Base_Coat_Activator::activate();
}

/**
 * Deactivate base coat
 */
function deactivate_base_coat() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/cdesign-base-coat-deactivator.php';
	Cdesign_Base_Coat_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_base_coat' );
register_deactivation_hook( __FILE__, 'deactivate_base_coat' );

/**
 * Used to define admin and public hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/cdesign-base-coat.php';

function init_baseCoat() {

	$plugin = new Cdesign_Base_Coat();
	$plugin->run();

}

init_baseCoat();
