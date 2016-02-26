<?php
/**
 * Environment-specific configuration file for WordPress
 * 
 * This file will contain all of the environment-specific variables for a WordPress installation.
 * Instructions for use:
 * 1) Open this file.
 * 2) Edit all variables per environment.
 * 3) Save file as [environment]-config.php, where [environment] is local / dev / live.
 * 
 * NOTE: Do NOT commit the new file to the repository. Run 'git status' after saving the new file
 * to confirm no error. The .giignore file includes all three variations so if you get an error
 * after saving the new file, it's not named correctly.
 * 
 * FIXTHIS:
 * add Github link (when ready)
 * add link to blog parts 1 & 2 (when ready)
 * tidy up description
 * conform to WordPress standard styles
 * 
 */

// REMOVE THIS LINE ONCE YOU'VE CONFIGURED FILE AND ARE READY TO SAVE AS ENVIRONMENT-SPECIFIC CONFIG:
die ("<h1 style='font-weight:bold;color:#F00;'>Environment-specific config not configured!</H1>");

// Define environment (IS_LOCAL / IS_DEV / IS_LIVE)
define('IS_LOCAL', true);

// Additional subdirectory (if any) >> add preceding slash if not blank
define('ADDL_SUBDIR', '/sample-subdirectory');

// Database credentials
define('DB_NAME', 'sample-database');
define('DB_USER', 'sample-user');
define('DB_PASSWORD', 'sample-password');
define('DB_HOST', 'localhost');

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
