<?php

/*
Plugin Name: Option Page Plugin
Description: This is custom option page plugin for learning purpose.
Version: 1.0.0
Author: Rahman
*/


function custom_option_menu()
{
    add_menu_page(
        "theme-options",
        "Theme Options",
        "manage_options",
        "theme-options",
        "mycustom_options",
        "dashicons-sos",
        8
    );
}
add_action("admin_menu","custom_option_menu");

function mycustom_options()
{
    ?>
    <div class="container">
        <h3 class="text-center bg-dark text-white">Theme Option Setting</h3>
        <form action="options.php" method="post">
            <?php
            settings_fields("section");
            do_settings_sections("theme-options");
            submit_button();
            ?>
        </form>
    </div>

    <?php
}

function theme_options_setting()
{
    add_settings_section(
        "section",
        "All Pages",
        "",
        "theme-options"
    );

    add_settings_field(
        "channel_name",
        "Channel Name",
        "display_channel_name",
        "theme-options",
        "section"
    );

    add_settings_field(
        "facebook_url",
        "Facebook Url",
        "display_facebook_url",
        "theme-options",
        "section"
    );

    register_setting("section","channel_name");
    register_setting("section","facebook_url");
}
add_action("admin_init","theme_options_setting");

function display_channel_name()
{
    ?>
    <input type="text" name="channel_name" id="channelName" value="<?php echo get_option('channel_name')?>">
    <?php
}
function display_facebook_url()
{
    ?>
    <input type="text" name="facebook_url" id="facebookUrl" value="<?php echo get_option('facebook_url') ?>">
    <?php
}

?>