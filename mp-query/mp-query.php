<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://whatbrendonthinks.com
 * @since             1.0.0
 * @package           MPQuery
 *
 * @wordpress-plugin
 * Plugin Name:       WordPress MinistryPlatform Query
 * Plugin URI:        http://example.com/plugin-name-uri/
 * Description:       Queries tables in a MinistryPlatform instance.  Primary use case is to pull from an events table for items within a certain date range.
 * Version:           1.0.0
 * Author:            Brendon Thiede
 * Author URI:        https://whatbrendonthinks.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mp-query
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-mp-query-activator.php
 */
function activate_mp_query()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-mp-query-activator.php';
    MPQueryActivator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-mp-query-deactivator.php
 */
function deactivate_mp_query()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-mp-query-deactivator.php';
    MPQueryDeactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_mp_query');
register_deactivation_hook(__FILE__, 'deactivate_mp_query');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-mp-query.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_mp_query()
{

    $plugin = new MPQuery();
    $plugin->run();

}

run_mp_query();
