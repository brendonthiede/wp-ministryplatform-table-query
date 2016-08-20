<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    MPQuery
 * @subpackage MPQuery/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">

    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>

    <!--suppress HtmlUnknownTarget -->
    <form method="post" name="mp_query_options" action="options.php">
        <?php
        //Grab all options
        $options = get_option($this->plugin_name);

        $server_name = $options['server_name'];
        $wsdl_url = $options['wsdl_url'];
        $domain_guid = $options['domain_guid'];
        $api_password = $options['api_password'];

        settings_fields($this->plugin_name);
        do_settings_sections($this->plugin_name);
        ?>

        <fieldset>

            <!-- MinistryPlatform Server Name -->
            <legend class="screen-reader-text">
                <span><?php _e('Your Ministry Platform server name', $this->plugin_name); ?></span>
            </legend>
            <label for="<?php echo $this->plugin_name; ?>-server_name">MinistryPlatform Server Name
                <input type="text"
                       class="regular-text"
                       id="<?php echo $this->plugin_name; ?>-server_name"
                       name="<?php echo $this->plugin_name; ?>[server_name]"
                       placeholder="i.e. my.church.org"
                       autocomplete="off"
                       value="<?php if (!empty($server_name)) {
                           echo $server_name;
                       } ?>"/>
            </label>

            <!-- MinistryPlatform URL for WSDL -->
            <legend class="screen-reader-text">
                <span><?php _e('URL of the WSDL for the target Ministry Platform instance', $this->plugin_name); ?></span>
            </legend>
            <label for="<?php echo $this->plugin_name; ?>-wsdl_url">MinistryPlatform WSDL URL
                <input type="url"
                       class="regular-text"
                       id="<?php echo $this->plugin_name; ?>-wsdl_url"
                       name="<?php echo $this->plugin_name; ?>[wsdl_url]"
                       placeholder="i.e. https://my.church.org/ministryplatformapi/api.svc?WSDL"
                       autocomplete="off"
                       value="<?php if (!empty($wsdl_url)) {
                           echo $wsdl_url;
                       } ?>"/>
            </label>

            <!-- MinistryPlatform Domain GUID -->
            <legend class="screen-reader-text">
                <span><?php _e('Your Ministry Platform Domain GUID', $this->plugin_name); ?></span>
            </legend>
            <label for="<?php echo $this->plugin_name; ?>-domain_guid">MinistryPlatform Domain GUID
                <input type="text"
                       class="regular-text"
                       id="<?php echo $this->plugin_name; ?>-domain_guid"
                       name="<?php echo $this->plugin_name; ?>[domain_guid]"
                       pattern="[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}"
                       placeholder="i.e. 1234abcd-12ab-34cd-56ef-1234567890ab"
                       autocomplete="off"
                       value="<?php if (!empty($domain_guid)) {
                           echo $domain_guid;
                       } ?>"/>
            </label>

            <!-- MinistryPlatform API Password -->
            <legend class="screen-reader-text">
                <span><?php _e('Check here to change your Ministry Platform API password', $this->plugin_name); ?></span>
            </legend>
            <label for="<?php echo $this->plugin_name; ?>-change_api_password">
                <input type="checkbox"
                       id="<?php echo $this->plugin_name; ?>-change_api_password"
                       name="<?php echo $this->plugin_name; ?>[change_api_password]"
                       onclick="handleChangePasswordClick(this)" />
                Change MinistryPlatform API Password?<br/>
            </label>
            <fieldset id="change-api-password">
                <legend class="screen-reader-text">
                    <span><?php _e('Your Ministry Platform API password', $this->plugin_name); ?></span>
                </legend>
                <label for="<?php echo $this->plugin_name; ?>-api_password">MinistryPlatform API Password
                    <input type="password"
                           class="regular-text"
                           id="<?php echo $this->plugin_name; ?>-api_password"
                           name="<?php echo $this->plugin_name; ?>[api_password]"
                           autocomplete="off"
                           value="<?php if (!empty($api_password)) {
                               echo $api_password;
                           } ?>"/>
                    <input type="hidden"
                           id="<?php echo $this->plugin_name; ?>-previous_api_password"
                           name="<?php echo $this->plugin_name; ?>[previous_api_password]"
                           autocomplete="off"
                           value="<?php if (!empty($api_password)) {
                               echo $api_password;
                           } ?>"/>
                </label>
            </fieldset>

        </fieldset>

        <?php submit_button('Save all changes', 'primary', 'submit', TRUE); ?>

    </form>

</div>

