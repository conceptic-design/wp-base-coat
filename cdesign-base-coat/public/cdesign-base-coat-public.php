<?php

/**
 *
 * @package    Cdesign_Base_Coat
 * @subpackage Cdesign_Base_Coat/public
 * @since      1.0.1
 * @link       http://concepticdesign.com
 * @author     Kyle Reid <info@concepticdesign.com>
 */
class Cdesign_Base_Coat_Public {

	/**
	 * @since    1.0.1
	 * @access   private
	 * @var      string    $plugin_name   
	 */
	private $plugin_name;

	/**
	 * @since    1.0.1
	 * @access   private
	 * @var      string    $version 
	 */
	private $version;

	/**
	 * @since    1.0.1
	 * @param      string    $plugin_name
	 * @param      string    $version
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

}
