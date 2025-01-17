<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Category_By_Membership
 *
 * @wordpress-plugin
 * Plugin Name:       Category by Membership
 * Plugin URI:        http://example.com/category-by-membership-uri/
 * Description:       Selects the post category by the user's membership
 * Version:           1.0.0
 * Author:            Leaflet
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       category-by-membership
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CATEGORY_BY_MEMBERSHIP_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-category-by-membership-activator.php
 */
function activate_category_by_membership() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-category-by-membership-activator.php';
	Category_By_Membership_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-category-by-membership-deactivator.php
 */
function deactivate_category_by_membership() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-category-by-membership-deactivator.php';
	Category_By_Membership_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_category_by_membership' );
register_deactivation_hook( __FILE__, 'deactivate_category_by_membership' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-category-by-membership.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_category_by_membership() {

	$plugin = new Category_By_Membership();
	$plugin->run();

}
run_category_by_membership();
