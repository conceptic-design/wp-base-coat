<?php

/**
 *
 * @package    Cdesign_Base_Coat
 * @subpackage Cdesign_Base_Coat/public
 * @link       http://concepticdesign.com
 * @author     Kyle Reid <info@concepticdesign.com>
 */
class Cdesign_Base_Coat_Public {

	/**
	 * @access   private
	 * @var      string    $plugin_name   
	 */
	private $plugin_name;

	/**
	 * @access   private
	 * @var      string    $version 
	 */
	private $version;

	/**
	 * @param      string    $plugin_name
	 * @param      string    $version
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}
	
	// remove WP generator tag from RSS and HEAD tag
	public function remove_gen_tag() {
			return '';
	}
	
	//set default to HTML
	public function set_default_editor() {
			return 'html'; // html or tinymce
	}
	
	// disable emojis
	public function disable_emojis() {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );	
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		add_filter( 'tiny_mce_plugins', 'disable_emojis_editor' );
	}

	/**
	 * remove emojis from tinymce editor
	 * @param    array  $plugins  
	 * @return   array    the array_diff results
	 */
	public function disable_emojis_editor( $plugins ) {
		if ( is_array( $plugins ) ) {
			return array_diff( $plugins, array( 'wpemoji' ) );
		} else {
			return array();
		}
	}
	
	
	/** Core END -- Add custom project functions below this line **/

}
