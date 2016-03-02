<?php
/**
 * Base configuration for VCS-optimized Wordpress
 *
 * This file contains all non-environment-specific variables for a WordPress installation;
 * it is designed to be placed under version control. It looks for an environment-specific
 * config file in the root of the project directory.
 * 
 * FIXTHIS:
 * add Github link (when ready)
 * add link to blog parts 1 & 2 (when ready)
 * tidy up description
 * conform to WordPress standard styles
 * 
 */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH'))
	define('ABSPATH', dirname(__FILE__) . '/');
	
/* fixthis >> create array of environment names
$environments = array(
	'local' => 'local',
	'dev' => 'development',
	'live' => 'production'
);
This unifies the reference name (eg. "live")
while permitting variation in the actual name
(eg. "production");

OR I could define them:
define('LIVE', 'production')

Then I reference them below like so:
if (file_exists(PROJECT_DIRECTORY . LOCAL . '-config.php' ) )

This has the greatest flexibility. Although if I use an array
I can loop through and search for first one, perhaps defaulting
to live. This would do away with the large block below.

FIXTHIS >> add for "staging"

The section below would need to be edited as well.

*/
// Look for environment-specific config file and, if found, require it
define('PROJECT_DIRECTORY', dirname(ABSPATH).'/');
// FIXTHIS >> also have it look outside the project directory
// add a note explaining that it can be placed in either spot
if (file_exists(PROJECT_DIRECTORY.'local-config.php')) {
	require PROJECT_DIRECTORY.'local-config.php';
	define('IS_LOCAL', true);
} elseif (file_exists( PROJECT_DIRECTORY.'dev-config.php')) {
	require PROJECT_DIRECTORY.'dev-config.php';
	define('IS_DEV', true);
} elseif (file_exists( PROJECT_DIRECTORY.'live-config.php')) {
	require PROJECT_DIRECTORY.'live-config.php';
	define('IS_LIVE', true);
} else { // stop everything
	die ("<h1 style='font-weight:bold;color:#F00;'>No environment-specific config file found!</H1>");
}

// set defaults for values possibly hardcoded in localized config files
if (!defined('ADDL_SUBDIR')) { // project subdirectory (if any)
	define('ADDL_SUBDIR', '');
}
define('SITE_URL', 'http://' . $_SERVER['SERVER_NAME'] . ADDL_SUBDIR);
define('WP_CONTENT_DIR', $_SERVER['DOCUMENT_ROOT'] . ADDL_SUBDIR . '/wp-content');
define('WP_SITEURL', SITE_URL . '/cms');
define('WP_HOME', SITE_URL);
define('WP_CONTENT_URL', SITE_URL . '/wp-content');
define('WP_DEFAULT_THEME', 'twentyeleven');

// Common database settings
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
$table_prefix  = 'wp_';

// Default salts & keys >> generate valid keys here: https://api.wordpress.org/secret-key/1.1/salt/
if (!defined('AUTH_KEY')) {
	define('AUTH_KEY', 'put your unique phrase here');
}
if (!defined('SECURE_AUTH_KEY')) {
	define('SECURE_AUTH_KEY', 'put your unique phrase here');
}
if (!defined('LOGGED_IN_KEY')) {
	define('LOGGED_IN_KEY', 'put your unique phrase here');
}
if (!defined('NONCE_KEY')) {
	define('NONCE_KEY', 'put your unique phrase here');
}
if (!defined('AUTH_SALT')) {
	define('AUTH_SALT', 'put your unique phrase here');
}
if (!defined('SECURE_AUTH_SALT')) {
	define('SECURE_AUTH_SALT', 'put your unique phrase here');
}
if (!defined('LOGGED_IN_SALT')) {
	define('LOGGED_IN_SALT', 'put your unique phrase here');
}
if (!defined('NONCE_SALT')) {
	define('NONCE_SALT', 'put your unique phrase here');
}

require_once(ABSPATH . 'wp-settings.php');
