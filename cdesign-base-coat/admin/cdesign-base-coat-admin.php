<?php

/**
 *
 * @package    Cdesign_Base_Coat
 * @subpackage Cdesign_Base_Coat/admin
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
	 * Register the script and styles
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'assets/cd-basecoat-admin.css', array(), $this->version, 'all' );

	}
	
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'assets/cd-basecoat-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	/**
	 * Register settings and options page
	 */
	 
	public function wpbc_reg_settings() {
	   add_option( 'wpbc_opt_name', 'option value here');
	   register_setting( 'wpbc_opt_group', 'wpbc_opt_name', 'wpbc_callback' );
	}
	
	public function wpbc_callback(){
		//on setting registered
	}
	
	public function wpbc_opt_page(){
	?>
	  <div class="wpbc-wrapper">
	  <h1>WP-BaseCoat Tweaks &amp; Settings</h1>
	  <form method="post" action="options.php">
	  <?php settings_fields( 'wpbc_opt_group' ); ?>
	  <h2>Disable Blog Features</h2>
	  <p>Remove common blog features: comments, avatars, xmlrpc, pingback</p>
	  <div class="wpbc-input-form">
		<label for="wpbc_opt_name">Test Label</label>
		<input type="text" id="wpbc_opt_name" name="wpbc_opt_name" value="<?php echo get_option('wpbc_opt_group'); ?>" />
	  </div>
	  <?php  submit_button(); ?>
	  </form>
	  </div>
	<?php
	}
	
	public function wpbc_reg_opts_page() {
		add_options_page('WPBaseCoat Settings', 'WP-BaseCoat Options', 'manage_options', 'wpbc-settings', array(
				$this,'wpbc_opt_page') );
	}


}
