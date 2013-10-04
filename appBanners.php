<?php

/*
  Plugin Name: App Banners
  Plugin URI: www.emoxie.com
  Description: Ability to promote iOS and Android Applications with an App Banner similar to iOS6 App Banner.  Utilizes jQuery Smart Banner by Arnold Daniels <arnold@jasny.net>
  Version: 1.0
  Author: E-Moxie
  Author URI: www.emoxie.com
 */

if (!class_exists('AppBanners')) :

    class AppBanners {

        /**
         * Initialization function for enqueuing scripts and wordpress shortcodes
         */
        public static function init() {
            add_action('wp_enqueue_scripts', 'AppBanners_enqueue_scripts');

            /**
             * If logged into administration area call the Admin functions of the AppBanners
             */

            if (is_admin()) {
                require_once dirname(__FILE__) . '/appBanners-admin.php';
                /*
                 * Initilize Admin Functions
                 */
                App_Banners_Admin::init();
            }
        }

    }

    /*
     * Scripts to be enqueued into Wordpress.  Making sure that jquery is added as a depenency
     * for SmartBanner.js
     */

    function AppBanners_enqueue_scripts() {
        wp_register_style('app-banners-styles', plugins_url('/lib/smartbanner/jquery.smartbanner.css', __FILE__));
        wp_enqueue_style('app-banners-styles');
        wp_register_script('app-banners-scripts', plugins_url('/lib/smartbanner/jquery.smartbanner.js', __FILE__),array( 'jquery' ));
        wp_enqueue_script('app-banners-scripts');        
    }

    
    /*
     * Function to inject the SmartBanner javascript into the footer of the page
     * After the wp_footer
     */
    
    function AppBanners_Scripts(){
        $appleID = get_option('APP_BANNERS_apple_id');
        $author = get_option('APP_BANNERS_author');
        $price = get_option('APP_BANNERS_price');
        $title = get_option('APP_BANNERS_title');
        $icon = get_option('APP_BANNERS_icon');
        
        /*
         * Future plans to incorporate all of the options into the Settings of plugin
         * for this moment though I just needed a few.
         */
        echo "
                <script type='text/javascript'>
                jQuery.smartbanner({
                    title: '" . $title . "', // What the title of the app should be in the banner (defaults to <title>)
                    author: '" . $author . "', // What the author of the app should be in the banner (defaults to <meta name='author'> or hostname)
                    price: '" . $price . "', // Price of the app
                    appStoreLanguage: 'us', // Language code for App Store
                    inAppStore: 'On the App Store', // Text of price for iOS
                    inGooglePlay: 'In Google Play', // Text of price for Android
                    icon: '" . $icon . "', // The URL of the icon (defaults to <link>)
                    iconGloss: null, // Force gloss effect for iOS even for precomposed (true or false)
                    button: 'VIEW', // Text on the install button
                    scale: 'auto', // Scale based on viewport size (set to 1 to disable)
                    speedIn: 300, // Show animation speed of the banner
                    speedOut: 400, // Close animation speed of the banner
                    daysHidden: 0, // Duration to hide the banner after being closed (0 = always show banner)
                    daysReminder: 0, // Duration to hide the banner after 'VIEW' is clicked (0 = always show banner)
                    force: null // Choose 'ios' or 'android'. Don't do a browser check, just always show this banner
                })            
                </script>
                ".PHP_EOL;
    }
    
    add_action('wp_footer', 'AppBanners_Scripts');
    
    
    /*
     * Function to inject the default app banner meta tags into the head of the 
     * site.  Utilizing wp_head action.
     */
    function AppBanners_Meta(){
        $appleID = get_option('APP_BANNERS_apple_id');
        $androidID = get_option('APP_BANNERS_android_id');

        echo '<meta name="apple-itunes-app" content="app-id='. $appleID . ', affiliate-data=, app-argument=">'.PHP_EOL;
        echo '<meta name="google-play-app" content="app-id=' . $androidID . '">'.PHP_EOL;
    }
    
    add_action('wp_head', 'AppBanners_Meta');
    
    
    /*
     * Starts Plugin 
     */
    AppBanners::init();

endif;