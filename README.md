Git-Optimized WordPress Structure
=============================================

This repository contains a version-control-optimized boilerplate structure for use with WordPress projects.

Key changes:
1. There is a separate subdirectory (_cms_) for the WordPress core.
2. The active _wp-content_ subdirectory (home to plugins, themes, etc.) is located outside the WordPress subdirectory, at the project directory root.
3. The _wp-config.php_ contains only project-specific data (suitable for version control). It's configured to look for and, if found, `require` a localized config file for environment-specific data (such as database credentials) that is *not* under version control. This localized config file can be placed outside of the web root for added security.
4. A template for the localized config file (_sample-config.php_) has been added.

Note: While this project uses Git for version control, the structure itself is software-agnostic. With a few minor modifications it could be used with any vcs (such as [Subversion](https://subversion.apache.org/)). 

Installation
------------
1. Ttett


Note: These instructions assume the remote host is configured for SSH and has both [Git](http://www.git-scm.com/) and [Wget](https://www.gnu.org/software/wget/) accessible via the command-line.

Also, while these instructions are tailored for use with Git, the structure itself is software-agnostic and could be used, with a few modifications, with any other vcs (such as Subversion).

1. SSH to the remote host.
2. Navigate to the web root and clone the repository: `git clone https://github.com/quayzar/git-optimized-wordpress.git .`
3. Remove 
3. Download WordPress to the web root: `wget https://wordpress.org/latest.tar.gz`
4. Extract WordPress into the _cms_ subdirectory: `tar xvf latest.tar.gz -C cms --strip-components=1`
5. Remove the archive: `rm latest.tar.gz`
6. Create a blank _.htaccess_ file: `touch .htaccess && chmod 0644 .htaccess`
7. Create an empty database. You'll need the host, database name, username, and password shortly.
8. Create a localized config file from _sample-config.php_, replacing [environment] with "local", "dev", or "live", depending on the environment: `cp sample-config.php [environment]-config.php` 
9. Open the localized config file, update the following, and save:
 * define `IS_LOCAL` / `IS_DEV` / `IS_LIVE`
 * `ADDL_SUBDIR` (if any)
 * database parameters
 * salts & keys
 * debug flags
 10. Load the project URL in a browser window. Complete the WordPress installation form and submit. 
 11. Log into the WordPress backend.
 12. Click _Settings > Permalinks_. Update the Permalink structures and save. If you don't receive the "Permalinks structure updated" success message, adjust write permissions on _.htaccess_ and try again.
 13. FIXTHIS >> theme

Frequently Asked Questions
--------------------------
 **Q:** Why don't you configure WordPress as a git submodule, like in Mark Jaquith's better-named [WordPress Skeleton](https://github.com/markjaquith/WordPress-Skeleton)?
 **A:** Even though WordPress could certainly be considered a dependency here, I prefer to keep it entirely separate from the project repository. In this fashion, I can keep my focus on the project itself and leave it to WordPress to keep itself current to the latest security patches. 

 **Q:** Why don't you create a shell script to automate the entire process?
 **A:** Soon enough.

