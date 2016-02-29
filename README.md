##### TO DO
 - [ ] spell out ignored file structure in these instructions
 - [ ] add GitHub link
 - [ ] add "Inspired by" links


Git-Optimized WordPress Structure
=============================================

By default, [WordPress](https://wordpress.org/) is self-contained within a single directory. This is not optimal for implementation of version control.

In addition, the use of a single configuration file (_wp-config.php_) presents a challenge when deploying a version-controlled WordPress-based project to multiple environments (e.g. localhost / dev / production), necessitating manual recreation of an environment-specific config file for each.

The purpose of this repository is to provide an intuitive boilerplate structure for version-controlled WordPress-based projects, configured so only the project-specific files are under version control. I've set this up primarily for my own use but hopefully it might be helpful to others. 

Key changes:
 1. There is a separate subdirectory (_cms_) for the WordPress core.
 2. The active _wp-content_ subdirectory (home to plugins, themes, etc.) is located outside of the WordPress subdirectory, at the project directory root.
 3. The _wp-config.php_ now contains only project-specific data (suitable for version control). It's configured to look for and, if found, `require` a localized config file for environment-specific data (such as database credentials) that is *not* under version control.
 4. A template for this localized config file (_sample-config.php_) has been added, to facilitate creation of the environmental-specific version.


Installation
------------

Note: These instructions assume the remote host is configured for SSH and has both [Git](http://www.git-scm.com/) and [Wget](https://www.gnu.org/software/wget/) accessible via the command-line.

1. SSH to the remote host.
2. Navigate to the web root and clone the repository: `git clone FIXTHIS .`
3. Download WordPress to the web root: `wget https://wordpress.org/latest.tar.gz`
4. Extract WordPress into the _cms_ subdirectory: `tar xvf latest.tar.gz -C cms --strip-components=1`
5. Remove the archive: `rm latest.tar.gz`
6. Create a blank _.htaccess_ file: `touch .htaccess && chmod 0655 .htaccess`
7. Create an empty database. You'll need the host, database name, username, password shortly so make a note of them.
8. Create a localized config file from _sample-config.php_, replacing [environment] with "local", "dev", or "live", depending on the environment: `cp sample-config.php [environment]-config.php` 
9. Open the localized config file, update the following, then save:
 * define `IS_LOCAL` / `IS_DEV` / `IS_LIVE`
 * `ADDL_SUBDIR` (if any)
 * database parameters
 * salts & keys
 * debug flags
 10. Load the project URL in a browser window. Complete the WordPress install form and submit. 
 11. Log into the WordPress backend.
 12. Click _Settings > Permalinks_. Update the Permalink structures and save. If you don't receive the "Permalinks structure updated" success message, adjust write permissions on _.htaccess_ and try again.
 13. FIXTHIS >> theme

Frequently Asked Questions
--------------------------
 **Q:** Why don't you configure WordPress as a git submodule, like in Mark Jaquith's better-named [WordPress Skeleton](https://github.com/markjaquith/WordPress-Skeleton)?
 **A:** Even though WordPress could certainly be considered a dependency here, I prefer to keep it entirely separate from the project repository. In this fashion, I can keep my focus on the project itself and leave it to WordPress to keep itself current to the latest security patches. 

 **Q:** Why don't you create a shell script to automate the entire process?
 **A:** Soon enough.

