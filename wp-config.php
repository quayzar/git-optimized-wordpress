<?php
/**
 * Project-wide configuration file for Git-Optimized WordPress
 * 
 * @package Git-Optimized WordPress
 * @version 1.0
 * @author Ian MacKenzie
 * @link https://github.com/quayzar/git-optimized-wordpress
 * 
 * This file contains all project-wide configurations for a Git-optimized WordPress site.
 * It is (and should remain) part of the project repository. This file looks for a localized 
 * config file (containing all sensitive, environment-specific configurations) in the web 
 * root or one level above.
 */

/* Define absolute path to the WordPress subdirectory */
if ( !defined( 'ABSPATH' )) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/* Define path options for localized config files */
define( 'WEB_ROOT', dirname( ABSPATH ) . '/' );
define( 'ABOVE_WEB_ROOT', dirname( WEB_ROOT ) . '/' );

/* 
 * Find and require localized config file
 * Comment out any environments you're not using
*/

// Local
if ( file_exists( WEB_ROOT . 'local-config.php' ) || file_exists( ABOVE_WEB_ROOT . 'local-config.php' )) {
	define( 'IS_LOCAL', true );
	if ( file_exists( WEB_ROOT . 'local-config.php' )) {
		require WEB_ROOT . 'local-config.php';
	} else {
		require ABOVE_WEB_ROOT . 'local-config.php';
	}
}

// Dev
elseif ( file_exists( WEB_ROOT . 'dev-config.php' ) || file_exists( ABOVE_WEB_ROOT . 'dev-config.php' )) {
	define( 'IS_DEV', true );
	if ( file_exists( WEB_ROOT . 'dev-config.php' )) {
		require WEB_ROOT . 'dev-config.php';
	} else {
		require ABOVE_WEB_ROOT . 'dev-config.php';
	}
}

// Staging
elseif ( file_exists( WEB_ROOT . 'staging-config.php' ) || file_exists( ABOVE_WEB_ROOT . 'staging-config.php' )) {
	define( 'IS_STAGING', true );
	if ( file_exists( WEB_ROOT . 'staging-config.php' )) {
		require WEB_ROOT . 'staging-config.php';
	} else {
		require ABOVE_WEB_ROOT . 'staging-config.php';
	}
}

// Live
elseif ( file_exists( WEB_ROOT . 'live-config.php' ) || file_exists( ABOVE_WEB_ROOT . 'live-config.php' )) {
	define( 'IS_LIVE', true );
	if ( file_exists( WEB_ROOT . 'live-config.php' )) {
		require WEB_ROOT . 'live-config.php';
	} else {
		require ABOVE_WEB_ROOT . 'live-config.php';
	}
}

// No localized config was found so stop everything
else {
	die ( "<h1 style='font-weight:bold;font-family:sans-serif;color:#F00;'>No localized config file found!</h1>" );
}

/*
 * Default salts & keys
 * These will be used if none are defined in the localized config file loaded above
 * Generate them here: https://api.wordpress.org/secret-key/1.1/salt/
 * 
 * IMPORTANT: REPLACE THE PLACEHOLDER TEXT HERE WITH PROPERLY-GENERATED VALUES!
 * 
 */
if ( !defined( 'AUTH_KEY' )) {
	define( 'AUTH_KEY',		'replace_this_with_a_unique_phrase' );
}
if ( !defined( 'SECURE_AUTH_KEY' )) {
	define( 'SECURE_AUTH_KEY',	'replace_this_with_a_unique_phrase' );
}
if ( !defined( 'LOGGED_IN_KEY' )) {
	define( 'LOGGED_IN_KEY',	'replace_this_with_a_unique_phrase' );
}
if ( !defined( 'NONCE_KEY' )) {
	define( 'NONCE_KEY',		'replace_this_with_a_unique_phrase' );
}
if ( !defined( 'AUTH_SALT' )) {
	define( 'AUTH_SALT',		'replace_this_with_a_unique_phrase' );
}
if ( !defined( 'SECURE_AUTH_SALT' )) {
	define( 'SECURE_AUTH_SALT',	'replace_this_with_a_unique_phrase' );
}
if ( !defined( 'LOGGED_IN_SALT' )) {
	define( 'LOGGED_IN_SALT',	'replace_this_with_a_unique_phrase' );
}
if ( !defined( 'NONCE_SALT' )) {
	define( 'NONCE_SALT',		'replace_this_with_a_unique_phrase' );
}
/* Confirm all salts & keys have been updated */
if ( 
	'replace_this_with_a_unique_phrase' == AUTH_KEY ||
	'replace_this_with_a_unique_phrase' == SECURE_AUTH_KEY ||
	'replace_this_with_a_unique_phrase' == LOGGED_IN_KEY ||
	'replace_this_with_a_unique_phrase' == NONCE_KEY ||
	'replace_this_with_a_unique_phrase' == AUTH_SALT ||
	'replace_this_with_a_unique_phrase' == SECURE_AUTH_SALT ||
	'replace_this_with_a_unique_phrase' == LOGGED_IN_SALT ||
	'replace_this_with_a_unique_phrase' == NONCE_SALT
) {
	die ( "<h1 style='font-weight:bold;font-family:sans-serif;color:#F00;'>Replace placeholder text in /wp-config.php with properly-generated salts & keys!</h1>" );
}

/* Define site paths */
if ( !defined( 'ADDL_SUBDIR' )) {
	define( 'ADDL_SUBDIR', '' );
}
/* If SSL, uncomment this section and replace active WP_HOME define:
// Force admin through SSL
if ( defined( 'IS_LIVE' ) && IS_LIVE ) { // assumes only LIVE instance has SSL
	define( 'FORCE_SSL_ADMIN', true );
	define( 'FORCE_SSL_LOGIN', true );
}
define( 'WP_HOME',		(( defined( 'IS_LIVE' ) && IS_LIVE ) ? 'https' : 'http' ) . '://' . $_SERVER['SERVER_NAME'] . ADDL_SUBDIR );
*/
define( 'WP_HOME',		'http://' . $_SERVER['SERVER_NAME'] . ADDL_SUBDIR ); // If SSL, replace this line with commented line above
define( 'WP_CONTENT_DIR',	WEB_ROOT . 'wp-content' );
define( 'WP_SITEURL',		WP_HOME . '/cms' );
define( 'WP_CONTENT_URL',	WP_HOME . '/wp-content' );

/* Define common database settings */
define( 'DB_CHARSET',	'utf8' );
define( 'DB_COLLATE',	'' );
$table_prefix  = 'wp_';

/* Load WordPress */
require_once( ABSPATH . 'wp-settings.php' );
