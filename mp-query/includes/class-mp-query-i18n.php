<?php

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    MPQuery
 * @subpackage MPQuery/includes
 * @author     Brendon Thiede <brendon@whatbrendonthinks.com>
 */
class MPQueryi18n
{


    /**
     * Load the plugin text domain for translation.
     *
     * @since    1.0.0
     */
    public function load_plugin_textdomain()
    {

        load_plugin_textdomain(
            'mp-query',
            false,
            dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
        );

    }


}
