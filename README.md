Git-Optimized WordPress Structure
=================================

This repository contains Git-optimized boilerplate structure for use with WordPress. 

Key changes:
 * There's a separate subdirectory (_cms_) for the WordPress core.
 * The active _wp-content_ subdirectory is located outside the WordPress subdirectory, at the project root. 
 * The _wp-config.php_ file contains only project-specific data (suitable for version control). It's configured to look for and, if found, `require` a localized config file for sensitive environment-specific data (such as database credentials) that is *not* under version control. For added security, this localized config file can be placed outside of the web root.
 * A template for the localized config file (_sample-config.php_) is included.

Note: While this project uses Git for version control, the structure itself is software-agnostic. With a few minor modifications it could be used with any vcs (such as [Subversion](https://subversion.apache.org/)). 

Installation
------------

##### 1. Set up new project repository
 1. Navigate into the web root and clone the repository: `git clone https://github.com/quayzar/git-optimized-wordpress.git .`
 2. Delete the _.git_ directory to remove the link back to this project: `rm -rf .git`
 3. Create a new, project-specific repository:
```
git init
git add .
git commit -m 'initial commit'
```
The boilerplate comes with pre-configured _.gitignore_ files here:
 * /.gitignore
 * /cms/.gitignore
 * /wp-content/plugins/.gitignore
 
Note: If you're using a different vcs, don't forget to recreate these ignore rules once you've set up your repository.

##### 2. Create localized config file
 1. Create an empty database. Make note of the host, database name, username, and password, as you'll need them shortly.
 2. Navigate to where you want to keep the localized config file, such as [one level above the web root](http://wordpress.stackexchange.com/questions/58391/is-moving-wp-config-outside-the-web-root-really-beneficial).
 3. Create a copy of _sample-config.php_, replacing "sample" in the new name with "local", "dev", or "live", depending on the environment: `cp sample-config.php [environment]-config.php`
 4. Open the new localized config file and make the following changes:
 * define `WP_ENV` as "local", "dev", or "live", depending on the environment
 * provide `ADDL_SUBDIR` (if any)
 * add the database name, host, username, and password
 * [generate](https://api.wordpress.org/secret-key/1.1/salt/) then add the salts & keys
 * configure the debug settings
 * remove the `die` configuration warning at the bottom
 2. Save the file as _[environment]-config.php_, replacing [environment] with "local", "dev", or "live", depending on the environment
 3. : `cp sample-config.php [environment]-config.php` 
 2. Open the localized config file, update the following, and save:
 * define `IS_LOCAL` / `IS_DEV` / `IS_LIVE`
 * `ADDL_SUBDIR` (if any)
 * database parameters
 * salts & keys
 * debug flags


##### 2. Install WordPress
 1. Download WordPress to the web root: `wget https://wordpress.org/latest.tar.gz`
 2. Extract WordPress into the _cms_ subdirectory: `tar xvf latest.tar.gz -C cms --strip-components=1`
 3. Remove the archive: `rm latest.tar.gz`
 4. Create a blank _.htaccess_ file: `touch .htaccess && chmod 0644 .htaccess`
 5. 
 6. 
 
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
