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

    <form method="post" name="mp_query_options" action="options.php">
        <fieldset>

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
                       value=""/>
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
                       value=""/>
            </label>

            <!-- MinistryPlatform API Password -->
            <legend class="screen-reader-text">
                <span><?php _e('Your Ministry Platform API password', $this->plugin_name); ?></span>
            </legend>
            <label for="<?php echo $this->plugin_name; ?>-api_password">MinistryPlatform API Password
                <input type="password"
                       class="regular-text"
                       id="<?php echo $this->plugin_name; ?>-api_password"
                       name="<?php echo $this->plugin_name; ?>[api_password]"
                       value=""/>
            </label>

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
                       value=""/>
            </label>

        </fieldset>

        <?php submit_button('Save all changes', 'primary', 'submit', TRUE); ?>

    </form>

</div>

