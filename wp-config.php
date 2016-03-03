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
 * config file (containing all sensitive, environment-specific configurations) in either
 * the web root or one level above.
 * 
 * IMPORTANT: REPLACE THE PLACEHOLDER TEXT WITH PROPERLY-GENERATED SALTS & KEYS BEFORE DEPLOYING!
 * 
 */

/* Define absolute path to the WordPress directory */
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

// Live
if ( file_exists( ABOVE_WEB_ROOT . 'live-config.php' ) || file_exists( WEB_ROOT . 'live-config.php' )) {
	define( 'IS_LIVE', true );
	if ( file_exists( ABOVE_WEB_ROOT . 'live-config.php' )) {
		require ABOVE_WEB_ROOT . 'live-config.php';
	} else {
		require WEB_ROOT . 'live-config.php';
	}
}

// Staging
elseif ( file_exists( ABOVE_WEB_ROOT . 'staging-config.php' ) || file_exists( WEB_ROOT . 'staging-config.php' )) {
	define( 'IS_STAGING', true );
	if ( file_exists( ABOVE_WEB_ROOT . 'staging-config.php' )) {
		require ABOVE_WEB_ROOT . 'staging-config.php';
	} else {
		require WEB_ROOT . 'staging-config.php';
	}
}

// Dev
elseif ( file_exists( ABOVE_WEB_ROOT . 'dev-config.php' ) || file_exists( WEB_ROOT . 'dev-config.php' )) {
	define( 'IS_DEV', true );
	if ( file_exists( ABOVE_WEB_ROOT . 'dev-config.php' )) {
		require ABOVE_WEB_ROOT . 'dev-config.php';
	} else {
		require WEB_ROOT . 'dev-config.php';
	}
}

// Local
elseif ( file_exists( ABOVE_WEB_ROOT . 'local-config.php' ) || file_exists( WEB_ROOT . 'local-config.php' )) {
	define( 'IS_LOCAL', true );
	if ( file_exists( ABOVE_WEB_ROOT . 'local-config.php' )) {
		require ABOVE_WEB_ROOT . 'local-config.php';
	} else {
		require WEB_ROOT . 'local-config.php';
	}
}

// No localized config was found so stop everything
else {
	die ("<h1 style='font-weight:bold;font-family:sans-serif;color:#F00;'>No localized config file found!</h1>");
}

/*
 * Default salts & keys
 * These will be used if none are defined in the localized config file loaded above
 * Generate them here: https://api.wordpress.org/secret-key/1.1/salt/
 * 
 * IMPORTANT: REPLACE THE PLACEHOLDER TEXT WITH PROPERLY-GENERATED VALUES!
 * 
 */
if ( !defined( 'AUTH_KEY' )) {
	define( 'AUTH_KEY',			'replace_this_with_a_unique_phrase' );
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

/* Define site paths */
if ( !defined( 'ADDL_SUBDIR' )) {
	define( 'ADDL_SUBDIR', '' );
}
define( 'SITE_URL',			'http://' . $_SERVER['SERVER_NAME'] . ADDL_SUBDIR );
define( 'WP_CONTENT_DIR',	$_SERVER['DOCUMENT_ROOT'] . ADDL_SUBDIR . '/wp-content' );
define( 'WP_SITEURL',		SITE_URL . '/cms' );
define( 'WP_HOME',			SITE_URL );
define( 'WP_CONTENT_URL',	SITE_URL . '/wp-content' );

/* Define common database settings */
define( 'DB_CHARSET',	'utf8' );
define( 'DB_COLLATE',	'' );
$table_prefix  = 'wp_';

/* Load WordPress */
require_once( ABSPATH . 'wp-settings.php' );