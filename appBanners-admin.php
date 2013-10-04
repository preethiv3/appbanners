<?php
/*
 * Administration functionality for App Banners Plugin
 * Author: Matt Pramschufer of E-Moxie
 * URL: www.emoxie.com
 * Date: 10/2/2013
 */

define('APP_BANNERS_ID', 'app-banners-plugin-options');
define('APP_BANNERS_NICK', 'App Banners');

class App_Banners_Admin {

    public static function init() {
        add_action('admin_init', array(__CLASS__, 'register'));
        add_action('admin_menu', array(__CLASS__, 'menu'));
    }

    public static function register() {
        register_setting(APP_BANNERS_ID . '_options', 'APP_BANNERS_apple_id');
        register_setting(APP_BANNERS_ID . '_options', 'APP_BANNERS_android_id');
        register_setting(APP_BANNERS_ID . '_options', 'APP_BANNERS_author');
        register_setting(APP_BANNERS_ID . '_options', 'APP_BANNERS_price');
        register_setting(APP_BANNERS_ID . '_options', 'APP_BANNERS_title');
        register_setting(APP_BANNERS_ID . '_options', 'APP_BANNERS_icon');
    }

    public static function menu() {
        // Create menu tab
        add_options_page(APP_BANNERS_NICK . ' Plugin Options', APP_BANNERS_NICK, 'manage_options', APP_BANNERS_ID . '_options', array('App_Banners_Admin', 'options_page'));
    }

    public static function options_page() {
        if (!current_user_can('manage_options')) {
            wp_die(__('You do not have sufficient permissions to access this page.'));
        }

        $plugin_id = APP_BANNERS_ID;
        // display options page
        require_once dirname(__FILE__) . '/tpl/admin-options.php';
    }

}