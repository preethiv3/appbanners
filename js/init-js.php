<?php
define('WP_USE_THEMES', false);

/// This is pretty nasty here and will cause issues with folks running wordpress out of a directory.. Not sure of proper fix at the moment.
include($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');
header('Content-Type: application/javascript');

$author           = get_option( 'APP_BANNERS_author' );
$price            = get_option( 'APP_BANNERS_price' );
$title            = get_option( 'APP_BANNERS_title' );
$icon             = get_option( 'APP_BANNERS_icon' );
$button           = get_option( 'APP_BANNERS_button' );
$daysHidden       = get_option( 'APP_BANNERS_daysHidden' );
$daysReminder     = get_option( 'APP_BANNERS_daysReminder' );
$speedOut         = get_option( 'APP_BANNERS_speedOut' );
$speedIn          = get_option( 'APP_BANNERS_speedIn' );
$iconGloss        = get_option( 'APP_BANNERS_iconGloss' );
$inAppStore       = get_option( 'APP_BANNERS_inAppStore' );
$inGooglePlay     = get_option( 'APP_BANNERS_inGooglePlay' );
$appStoreLanguage = get_option( 'APP_BANNERS_appStoreLanguage' );

/*
 * Future plans to incorporate all of the options into the Settings of plugin
 * for this moment though I just needed a few.
 */
echo "
jQuery(function() {
	jQuery.smartbanner({
	  title: '" . htmlspecialchars( $title, ENT_QUOTES ) . "', // What the title of the app should be in the banner (defaults to <title>)
	  author: '" . htmlspecialchars( $author, ENT_QUOTES ) . "', // What the author of the app should be in the banner (defaults to <meta name='author'> or hostname)
	  price: '" . $price . "', // Price of the app
	  appStoreLanguage: '" . $appStoreLanguage . "', // Language code for App Store
	  inAppStore: '" . htmlspecialchars( $inAppStore, ENT_QUOTES ) . "', // Text of price for iOS
	  inGooglePlay: '" . htmlspecialchars( $inGooglePlay, ENT_QUOTES ) . "', // Text of price for Android
	  inAmazonAppStore: 'In the Amazon Appstore',
	  inWindowsStore: 'In the Windows Store', // Text of price for Windows
	  GooglePlayParams: null, // Additional parameters for the market
	  icon: '" . $icon . "', // The URL of the icon (defaults to <meta name='apple-touch-icon'>)
	  iconGloss: " . $iconGloss . ", // Force gloss effect for iOS even for precomposed
	  url: null, // The URL for the button. Keep null if you want the button to link to the app store.
	  button: '" . htmlspecialchars( $button, ENT_QUOTES ) . "', // Text for the install button
	  scale: 'auto', // Scale based on viewport size (set to 1 to disable)
	  speedIn: " . $speedIn . ", // Show animation speed of the banner
	  speedOut: " . $speedOut . ", // Close animation speed of the banner
	  daysHidden: " . $daysHidden . ", // Duration to hide the banner after being closed (0 = always show banner)
	  daysReminder: " . $daysReminder . ", // Duration to hide the banner after 'VIEW' is clicked *separate from when the close button is clicked* (0 = always show banner)
	  force: null, // Choose 'ios', 'android' or 'windows'. Don't do a browser check, just always show this banner
	  hideOnInstall: true, // Hide the banner after 'VIEW' is clicked.
	  layer: false, // Display as overlay layer or slide down the page
	  iOSUniversalApp: true, // If the iOS App is a universal app for both iPad and iPhone, display Smart Banner to iPad users, too.
	  appendToSelector: 'body' //Append the banner to a specific selector
	})
});" . PHP_EOL;
