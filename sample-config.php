<?php
/**
 * Environment-specific configuration file for Git-Optimized WordPress
 * 
 * This file contains all sensitive, environment-specific data for a Git-optimized 
 * WordPress installation. It should *not* be committed to the project repository.
 * 
 * To use, save a copy of this file (either at the web root or, for added security, 
 * one level above), replacing "sample" in the name with "local", "dev", "stage", 
 * or "live", then update your new file with environment-specific data.
 * Read more about placement here:
 * http://wordpress.stackexchange.com/questions/58391/is-moving-wp-config-outside-the-web-root-really-beneficial
 */

/*
 * Additional subdirectory
 * If this instance of the project is inside an additional subdirectory (i.e. localhost dev
 * environment) add the subdirectory name here, with a preceding (but no following) slash.
 */
define( 'ADDL_SUBDIR', '/additional_subdirectory' );

/* Database credentials */
define( 'DB_HOST', 		'' );
define( 'DB_NAME', 		'' );
define( 'DB_USER', 		'' );
define( 'DB_PASSWORD',	'' );

/*
 * Environment-specific salts & keys
 * These will replace the default set stored in /wp-config.php
 * Generate them here: https://api.wordpress.org/secret-key/1.1/salt/
 */
/* UNCOMMENT THIS SECTION AND REPLACE PLACEHOLDER TEXT WITH PROPERLY-GENERATED, ENVIRONMENT-SPECIFIC SALTS & KEYS
define( 'AUTH_KEY',         'replace_this_with_a_unique_phrase' );
define( 'SECURE_AUTH_KEY',  'replace_this_with_a_unique_phrase' );
define( 'LOGGED_IN_KEY',    'replace_this_with_a_unique_phrase' );
define( 'NONCE_KEY',        'replace_this_with_a_unique_phrase' );
define( 'AUTH_SALT',        'replace_this_with_a_unique_phrase' );
define( 'SECURE_AUTH_SALT', 'replace_this_with_a_unique_phrase' );
define( 'LOGGED_IN_SALT',   'replace_this_with_a_unique_phrase' );
define( 'NONCE_SALT',       'replace_this_with_a_unique_phrase' );
*/

/*
 * Debug flags
 * https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG',			false );
define( 'WP_DEBUG_LOG',		false ); // writes to wp-content/debug.log
define( 'WP_DEBUG_DISPLAY',	false );

/* REMOVE THIS LINE ONCE YOU'VE FINISHED CONFIGURING THIS FILE */
die ( "<h1 style='font-weight:bold;font-family:sans-serif;color:#F00;'>".__FILE__." is not configured!</h1>" );