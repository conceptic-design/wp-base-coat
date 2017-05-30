<?php

/**
 * @package    Cdesign_Base_Coat
 * @subpackage Cdesign_Base_Coat/includes
 * @link       http://concepticdesign.com
 * @author     Kyle Reid <info@concepticdesign.com>
 */
class Cdesign_Base_Coat_Activator {

	/**
	 * Init the activation functions
	 */
	public static function activate() {
				//modify base options/settings
				update_option( 'default_comment_status', 'closed' );
				update_option( 'show_avatars', 0);
				update_option( 'uploads_use_yearmonth_folders', 0);
				// disable xmlrpc for security
				add_filter( 'xmlrpc_enabled', '__return_false' );
	}

}
