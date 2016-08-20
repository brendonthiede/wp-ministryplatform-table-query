<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    MPQuery
 * @subpackage MPQuery/admin
 * @author     Brendon Thiede <brendon@whatbrendonthinks.com>
 */
class MPQueryAdmin
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string $plugin_name The name of this plugin.
     * @param      string $version The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in MPQueryLoader as all of the hooks are defined
         * in that particular class.
         *
         * The MPQueryLoader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/mp-query-admin.css', array(), $this->version, 'all');

    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in MPQueryLoader as all of the hooks are defined
         * in that particular class.
         *
         * The MPQueryLoader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/mp-query-admin.js', array('jquery'), $this->version, false);

    }

    /**
     *
     * admin/class-mp-query-admin.php - Don't add this
     *
     **/

    /**
     * Register the administration menu for this plugin into the WordPress Dashboard menu.
     *
     * @since    1.0.0
     */

    public function add_plugin_admin_menu()
    {

        /*
         * Add a settings page for this plugin to the Settings menu.
         *
         * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
         *
         *        Administration Menus: http://codex.wordpress.org/Administration_Menus
         *
         */
        add_options_page('MP Query Setup', 'MP Query', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page')
        );
    }

    /**
     * Add settings action link to the plugins page.
     *
     * @since    1.0.0
     * @param    string $links The existing links for the plugin (Activate, Edit, etc.)
     * @return   array
     */

    public function add_action_links($links)
    {
        /*
        *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
        */
        $links[] = '<a href="' . admin_url('options-general.php?page=' . $this->plugin_name) . '">' . __('Settings', $this->plugin_name) . '</a>';
        return $links;

    }

    /**
     * Render the settings page for this plugin.
     *
     * @since    1.0.0
     */

    public function display_plugin_setup_page()
    {
        include_once('partials/mp-query-admin-display.php');
    }

    public function validate($input)
    {
        $wsdl_url_key = 'wsdl_url';
        $domain_guid_key = 'domain_guid';
        $server_name_key = 'server_name';
        $change_api_creds_key = 'change_api_password';
        $api_creds_key = 'api_password';
        $previous_api_creds_key = 'previous_api_password';
        $valid = array();

        $valid[$server_name_key] = sanitize_text_field($input[$server_name_key]);
        $valid[$wsdl_url_key] = esc_url($input[$wsdl_url_key]);
        $valid[$domain_guid_key] = sanitize_text_field($input[$domain_guid_key]);
        if (isset($input[$change_api_creds_key]) && !empty($input[$change_api_creds_key])) {
            $valid[$api_creds_key] = sanitize_text_field($input[$api_creds_key]);
        } else {
            $valid[$api_creds_key] = sanitize_text_field($input[$previous_api_creds_key]);
        }

        return $valid;
    }

    public function options_update()
    {
        register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
    }

}
