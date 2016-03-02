<?php
/**
 * Localized config file for Git-Optimized WordPress project
 * 
 * @package Git-Optimized WordPress Structure
 * @version 1.0
 * @author Ian MacKenzie
 * @link https://github.com/quayzar/git-optimized-wordpress
 * 
 * This file contains all of the sensitive, environment-specific data that shouldn't
 * be committed to the project repository. Create a copy of this file in each environment, 
 * with "sample" in the name replaced with "local", "dev", or "live", depending.
 * 
 * This file can be placed outside the web root for added security (recommended).
 * Read more about the pros and cons of doing this here:
 * http://wordpress.stackexchange.com/questions/58391/is-moving-wp-config-outside-the-web-root-really-beneficial
 * 
 */

// Additional subdirectory (if any) >> add preceding slash if not blank
define('ADDL_SUBDIR', '/sample-subdirectory');

// Database credentials
define('DB_HOST', 'localhost');
define('DB_NAME', 'sample-database');
define('DB_USER', 'sample-user');
define('DB_PASSWORD', 'sample-password');

// Salts & keys
// generate from https://api.wordpress.org/secret-key/1.1/salt/
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

// Debug flag (if any)
// for more: https://codex.wordpress.org/Debugging_in_WordPress
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true); // writes to wp-content/debug.log
define('WP_DEBUG_DISPLAY', true);

// REMOVE THIS LINE ONCE YOU'VE CONFIGURED FILE AND ARE READY TO SAVE AS ENVIRONMENT-SPECIFIC CONFIG:
die ("<h1 style='font-weight:bold;color:#F00;'>localized config file not edited!</H1>");