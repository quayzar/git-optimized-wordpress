Git-Optimized WordPress Structure
=================================

This repository contains a Git-optimized boilerplate structure for use with version-controlled WordPress projects.

**Changes**
 * There's a separate subdirectory for the WordPress core (`cms/`).
 * The active `wp-content/` subdirectory is located outside the WordPress subdirectory, at the project root. 
 * The `wp-config.php` file has been reconfigured for version control, now containing only general project data and not sensitive, environment-specific data, such as salts & keys.
 * This sensitive information is now contained in a localized config file that, for added security, can be placed outside of the web root.
 * A template for this localized config file (`sample-config.php`) has been added.
 * `.gitignore` files have been configured so only the project structure and files are under version control.

*Note: While this project uses Git for version control, the structure itself is software-agnostic. With a few minor modifications it could be used with any vcs (such as [Subversion](https://subversion.apache.org/)).*

Installation
------------

##### Set up a new project
 1. Navigate into the web root.
 2. Clone the repository: `git clone https://github.com/quayzar/git-optimized-wordpress.git .`
 3. Delete the `.git` directory to disconnect your clone from this project: `rm -rf .git`
 4. Create a new, project-specific repository:
```
git init
git add .
git commit -m 'initial commit'
```
 5. Create an empty database. Note the host, database name, username, and password, as you'll need them shortly.

The boilerplate comes pre-configured with two `.gitignore` files:
 * `/.gitignore`
 * `/cms/.gitignore`

`/.gitignore` contains all of the project ignore rules; `/cms/.gitignore` is just there to force Git to create the `/cms/` subdirectory.

*Note: If you're using something other than Git for version control, don't forget to recreate these ignore rules once you've set up your repository.*

##### Create a localized config file
 1. Copy `sample-config.php` to create a localized config file in position on the server (see note below). Replace "sample" in the new name with "local", "dev", or "live", depending on the environment. For example, to create a config file localized for "dev", one level above the web root: `cp sample-config.php ../local-config.php`
 2. Open this new file and make the following changes:
 * Set `WP_ENV` as "local", "dev", or "live", depending on the environment.
 * Provide `ADDL_SUBDIR` (if any).
 * Enter the database credentials placeholder text with the actual database name, host, username, and password.
 * [Generate](https://api.wordpress.org/secret-key/1.1/salt/) and add the salts & keys.
 * Configure the debug settings.
 * Remove the `die` configuration warning at the bottom of the file.
 3. Confirm no untracked files: `git status`

`.gitignore` contains rules for each of the three possible localized config files, so if you see untracked files you know you've deviated from the naming convention and `wp-config.php` won't find them. FIXTHIS >> add note about variable names

 Note: This boilerplate is configured to look for the localized config file either at the web root (on the same level as `wp-config.php`) or, for enhanced security, [one level above](http://wordpress.stackexchange.com/questions/58391/is-moving-wp-config-outside-the-web-root-really-beneficial). 

If you want to put it elsewhere for *all* environments, edit the `PROJECT_DIRECTORY` path defined at the top of `wp-config.php`. If you want to put it elsewhere for just *one* environment, edit the `file_exists` line for the appropriate environment.

##### Install and configure WordPress
 1. Download WordPress to the web root: `wget https://wordpress.org/latest.tar.gz`
 2. Extract WordPress into the `cms` subdirectory: `tar xvf latest.tar.gz -C cms --strip-components=1`
 3. Remove the WordPress archive: `rm latest.tar.gz`
 4. Create a blank `.htaccess` file and set permissions: `touch .htaccess && chmod 0644 .htaccess`
 5. Load the project URL in a browser window. Complete the WordPress installation form and submit. 
 6. Log into the WordPress backend.
 7. Click `Settings > Permalinks`. Update the Permalink structures and save. If you don't receive the "Permalinks structure updated" success message, adjust write permissions on `.htaccess` and try again.
 8. FIXTHIS >> theme
 9. FIXTHIS >> plugins
 
You should now have a working installation of WordPress that's optimized for version control. Run `git status` again, to confirm no untracked files or unexpected modifications. Now get to work!

Frequently Asked Questions
--------------------------

**Q:** Why don't you configure WordPress as a git submodule or use a dependency manager like Composer to install it?  
**A:** Even though WordPress could certainly be considered a dependency here, I prefer to keep it entirely separate from the project repository. In this fashion, I can keep my focus on the project itself and leave it to WordPress to keep itself current to the latest security patches. This way, I don't have to keep updating this project just to iterate the WordPress version.

**Q:** Couldn't you just create a shell script to automate the entire process?  
**A:** Yes, and I will, soon enough.

