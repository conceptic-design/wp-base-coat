<?php

/**
 *
 * @package    Cdesign_Base_Coat
 * @subpackage Cdesign_Base_Coat/includes
 * @link       http://concepticdesign.com
 * @author     Kyle Reid <info@concepticdesign.com>
 */
class Cdesign_Base_Coat {

	/**
	 * @access   protected
	 * @var      Cdesign_Base_Coat_Loader    $loader
	 */
	protected $loader;

	/**
	 * @access   protected
	 * @var      string    $plugin_name
	 */
	protected $plugin_name;

	/**
	 *
	 * @access   protected
	 * @var      string    $version
	 */
	protected $version;


	public function __construct() {

		$this->plugin_name = 'cdesign-base-coat';
		$this->version = '1.0.1';

		$this->load_dependencies();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies
	 * @access   private
	 */
	private function load_dependencies() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/cdesign-base-coat-loader.php';

		/**
		 * Admin area + Public facing class
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/cdesign-base-coat-admin.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/cdesign-base-coat-public.php';

		$this->loader = new Cdesign_Base_Coat_Loader();

	}

	/**
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Cdesign_Base_Coat_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		//$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Public hooks
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Cdesign_Base_Coat_Public( $this->get_plugin_name(), $this->get_version() );
		
		$this->loader->add_action('the_generator', $plugin_public, 'remove_gen_tag');
		$this->loader->add_action('wp_default_editor', $plugin_public, 'set_default_editor');
		$this->loader->add_action('init', $plugin_public, 'disable_emojis');

	}

	/**
	 * Run the loader to execute all of the hooks
	 */
	public function run() {
		$this->loader->run();
	}

	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * @return    Cdesign_Base_Coat_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	
	public function get_version() {
		return $this->version;
	}

}
