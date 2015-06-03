<?php

/*
  Plugin Name: App Banners
  Plugin URI: www.emoxie.com
  Description: Ability to promote iOS, Android and MS Applications with an App Banner similar to iOS6 App Banner.  Utilizes jQuery Smart Banner by Arnold Daniels <arnold@jasny.net>
  Version: 1.5.4
  Author: E-Moxie
  Author URI: www.emoxie.com
 */

if ( ! class_exists( 'AppBanners' ) ) :

	class AppBanners {

		/**
		 * Initialization function
		 */
		public static function init() {
			add_action( 'wp_enqueue_scripts', 'AppBanners_enqueue_scripts' );
			add_action( 'wp_footer', 'AppBanners_Scripts' );
			add_action( 'wp_head', 'AppBanners_Meta' );
			add_filter( "plugin_action_links_" . plugin_basename( __FILE__ ), 'AppBanners_settings_link' );

			/**
			 * If logged into administration area call the Admin functions of the AppBanners
			 */

			if ( is_admin() ) {
				require_once dirname( __FILE__ ) . '/appBanners-admin.php';
				App_Banners_Admin::init();
			}
		}

	}

	/*
	 * Scripts to be enqueued into Wordpress.  Making sure that jquery is added as a depenency
	 * for SmartBanner.js
	 */

	function AppBanners_enqueue_scripts() {
		wp_register_style( 'app-banners-styles', plugins_url( '/lib/smartbanner/jquery.smartbanner.css', __FILE__ ) );
		wp_enqueue_style( 'app-banners-styles' );

	}


	/*
	 * Function to inject the SmartBanner javascript into the footer of the page
	 * After the wp_footer
	 */

	function AppBanners_Scripts() {

		wp_register_script( 'app-banners-scripts', plugins_url( '/lib/smartbanner/jquery.smartbanner.js', __FILE__ ), array( 'jquery' ) );
		wp_enqueue_script( 'app-banners-scripts' );

		wp_register_script( 'app-banners-custom-scripts', plugins_url( '/js/init-js.php', __FILE__ ), array( 'jquery' ) );
		wp_enqueue_script( 'app-banners-custom-scripts' );
	}


	/*
	 * Function to inject the default app banner meta tags into the head of the
	 * site.  Utilizing wp_head action.
	 */
	function AppBanners_Meta() {
		$appleID                  = get_option( 'APP_BANNERS_apple_id' );
		$androidID                = get_option( 'APP_BANNERS_android_id' );
		$author                   = get_option( 'APP_BANNERS_author' );
		$msApplicationID          = get_option( 'APP_BANNERS_ms_application_id' );
		$msApplicationPackageName = get_option( 'APP_BANNERS_ms_application_package_name' );

		if ( $appleID ) {
			echo '<meta name="apple-itunes-app" content="app-id=' . $appleID . '">' . PHP_EOL;
		}
		if ( $androidID ) {
			echo '<meta name="google-play-app" content="app-id=' . $androidID . '">' . PHP_EOL;
		}
		if ( $msApplicationID ) {
			echo '<meta name="msApplication-ID" content="' . $msApplicationID . '"/>' . PHP_EOL;
		}
		if ( $msApplicationPackageName ) {
			echo '<meta name="msApplication-PackageFamilyName" content="' . $msApplicationPackageName . '"/>' . PHP_EOL;
		}
		if ( $author ) {
			echo '<meta name="author" content="' . $author . '">' . PHP_EOL;
		}
		echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">' . PHP_EOL;

	}


	/**
	 * Add in Settings link to plugin details.
	 * @param $links
	 *
	 * @return mixed
	 */
	function AppBanners_settings_link( $links ) {
		$settings_link = '<a href="options-general.php?page=app-banners-plugin-options_options">Settings</a>';
		array_unshift( $links, $settings_link );

		return $links;
	}

	AppBanners::init();

endif;