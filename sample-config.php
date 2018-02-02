<?php
/**
 * Environment-specific configuration file for Git-Optimized WordPress
 * 
 * This file contains all sensitive, environment-specific data for a Git-optimized 
 * WordPress installation. It should *not* be committed to the project repository.
 * 
 * To use, create a copy of this file named "config.php" and save it either at the
 * web root or, for added security, one level above. Read more about placement here:
 * https://wordpress.stackexchange.com/a/74972
 *
 * Once you've saved the file, update the contents per the current environment.
 */

/*
 * Additional subdirectory
 * If this instance of the project is inside an additional subdirectory (i.e. localhost dev
 * environment) add the subdirectory name here, with a preceding (but no following) slash.
 */
define( 'ADDL_SUBDIR', '/additional_subdirectory' );

/* Database credentials */
define( 'DB_HOST', 	'' );
define( 'DB_NAME', 	'' );
define( 'DB_USER',	'' );
define( 'DB_PASSWORD',	'' );

/* Enforce SSL (if enabled) */
define( 'SSL_ENABLED', false ); // change to 'true' if SSL is enabled for this particular instance

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
define( 'WP_DEBUG',		false );
define( 'WP_DEBUG_LOG',		false ); // writes to wp-content/debug.log
define( 'WP_DEBUG_DISPLAY',	false );
define( 'SCRIPT_DEBUG',		false ); // force use of non-minified CSS / JS files

/*
 * PHP error reporting
 * for sorting out The White Screen of Death
 */
/*
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );
*/

/* REMOVE THIS LINE ONCE YOU'VE FINISHED CONFIGURING THIS FILE */
die ( "<h1 style='font-weight:bold;font-family:sans-serif;color:#F00;'>" . __FILE__ . " is not configured!</h1>" );
