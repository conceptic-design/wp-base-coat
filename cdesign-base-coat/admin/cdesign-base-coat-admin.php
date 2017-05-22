<?php

/**
 *
 * @package    Cdesign_Base_Coat
 * @subpackage Cdesign_Base_Coat/admin
 * @since      1.0.1
 * @link       http://concepticdesign.com
 * @author     Kyle Reid <info@concepticdesign.com>
 */
 
class Cdesign_Base_Coat_Admin {

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

	/**
	 * Register the styles
	 * @since    1.0.1
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'assets/cd-basecoat-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JS
	 * @since    1.0.1
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'assets/plugin-name-admin.js', array( 'jquery' ), $this->version, false );

	}

}
