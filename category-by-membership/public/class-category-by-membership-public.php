<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Category_By_Membership
 * @subpackage Category_By_Membership/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Category_By_Membership
 * @subpackage Category_By_Membership/public
 * @author     Your Name <email@example.com>
 */
class Category_By_Membership_Public
{

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
	 * @param      string    $category_by_membership       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($category_by_membership, $version)
	{

		$this->category_by_membership = $category_by_membership;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

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

		wp_enqueue_style($this->category_by_membership, plugin_dir_url(__FILE__) . 'css/category-by-membership-public.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

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

		wp_enqueue_script($this->category_by_membership, plugin_dir_url(__FILE__) . 'js/category-by-membership-public.js', array('jquery'), $this->version, false);
	}


	/**
	 * Function to retrieve the correct category from post's customfield by memberpress membership and user meta data
	 */
	public function getCategoryForMembership()
	{

		$membership = 'cat_main_public';

		if (class_exists('MeprUtils')) {
			$user = MeprUtils::get_currentuserinfo();

			if ($user !== false && isset($user->ID)) {
				//Returns an array of Membership ID's that the current user is active on
				//Can also use 'products' or 'transactions' as the argument type
				$active_prodcuts = $user->active_product_subscriptions('ids');

				if (!empty($active_prodcuts)) {
					$membership_id = $active_prodcuts[0];
					if ($membership_id == 8535) {
						$membership = 'cat_main_independent_ars';
					} else if ($membership_id == 6738) {
						$membership = 'cat_main_independent_cs';
						//      } else if ($membership_id == 8538) {
						//        $membership = 'cat_sub_owner_cam';
						//      } else if ($membership_id == 8540) {
						//        $membership = 'cat_sub_owner_sd';
						//      } else if ($membership_id == 8542) {
						//        $membership = 'cat_sub_pilot_owner';
					} else if ($membership_id == 6732) {
						$membership = 'cat_main_pilot_operators';

						// returns either 'on' if set, otherwise it is an empty string
						$isOwnerCam = get_user_meta($user->ID, 'mepr_owner_cam', true);
						$isOwnerSd = get_user_meta($user->ID, 'mepr_owner_sd', true);
						$isPilotOwner = get_user_meta($user->ID, 'mepr_pilot_owner', true);

						if ($isOwnerCam == 'on') {
							$membership = 'cat_sub_owner_cam';
						}

						if ($isOwnerSd == 'on') {
							$membership = 'cat_sub_owner_sd';
						}

						if ($isPilotOwner == 'on') {
							$membership = 'cat_sub_pilot_owner';
						}
					} else if ($membership_id == 8600) {
						$membership = 'cat_main_public';
					} else {
						$membership = 'cat_main_public';
					}
				}
			}
		}

		$customFieldValues = get_post_custom_values($membership);
		$realValue = 'unknown';

		if (!empty($customFieldValues)) {
			$shortValue = $customFieldValues[0];

			if ($shortValue == 'h') {
				$realValue = 'hint';
			} else if ($shortValue == 'm') {
				$realValue = 'meaning';
			} else if ($shortValue == 'c') {
				$realValue = 'compliance';
			} else {
				$realValue = '';
			}
			return '<div class="ar-elementor-ribbon ar-elementor-ribbon-right"><div class="ar-elementor-ribbon-inner">' + $realValue + '</div>  </div>';
		}

		return 'halligalli';
	}
}
