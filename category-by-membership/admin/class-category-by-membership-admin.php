<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Category_By_Membership
 * @subpackage Category_By_Membership/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Category_By_Membership
 * @subpackage Category_By_Membership/admin
 * @author     Your Name <email@example.com>
 */
class Category_By_Membership_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $category_by_membership    The ID of this plugin.
	 */
	private $category_by_membership;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $category_by_membership       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $category_by_membership, $version ) {

		$this->category_by_membership = $category_by_membership;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Category_By_Membership_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Category_By_Membership_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->category_by_membership, plugin_dir_url( __FILE__ ) . 'css/category-by-membership-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Category_By_Membership_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Category_By_Membership_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->category_by_membership, plugin_dir_url( __FILE__ ) . 'js/category-by-membership-admin.js', array( 'jquery' ), $this->version, false );

	}

}
