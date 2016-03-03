Git-Optimized WordPress
=======================

This repository contains a version-control-optimized boilerplate structure for use in WordPress projects.

*[Note: While this project uses Git for version control, the structure itself is software-agnostic. With a few minor modifications it could be used with any version control software (such as [Subversion](https://subversion.apache.org/)).]*

##### What's different?
 * WordPress is installed in its own subdirectory (`cms/`).
 * The active `wp-content/` subdirectory is located at the web root. 
 * The `wp-config.php` file is designed for inclusion in the project repository. It now contains only general project data and not sensitive, environment-specific data, such as database credentials or salts & keys.
 * This sensitive information is now contained in a localized config file that, for added security, has the option of being placed outside of the web root.
 * A template for this localized config file (`sample-config.php`) has been added to the repository.
 * A preconfigured `.gitignore` file has been added to the repository.
 * A `composer.json` file has been added to the repository, to install WordPress and any theme or plugin dependencies.

Setting up a new project repository
-----------------------------------

 1. Navigate into the web root of your localhost or dev environment.
 2. Clone this repository: `git clone https://github.com/quayzar/git-optimized-wordpress.git .`
 3. Delete the `.git` directory to separate your files from this repository: `rm -rf .git`
 4. [Generate](https://api.wordpress.org/secret-key/1.1/salt/) and add default salts & keys to `wp-config.php`.
 5. Create a new, project-specific repository:
```
git init
git add .
git commit -m 'initial commit'
```
 6\. [Push your local repository to GitHub](http://quayzar.com/git/pushing-a-local-repository-to-github/).

Configuring an instance
-----------------------

Once the project repository is set up, you need to create a localized config file and then install WordPress:

##### Creating a localized config file
 1. Create an empty database. Note the host, database name, username, and password, as you'll need them shortly.
 2. Copy `sample-config.php` to create a localized config file, replacing "sample" in the new name with "local", "dev", "staging", or "live", depending on the environment. Save it either at the web root (on the same level as `wp-config.php`) or, for enhanced security, one level up. [Read more on this here.] (http://wordpress.stackexchange.com/questions/58391/is-moving-wp-config-outside-the-web-root-really-beneficial/74972#74972)
 3. Open this new file and make the following changes:
  * Provide `ADDL_SUBDIR` (if any).
  * Enter the database credentials.
  * [Generate](https://api.wordpress.org/secret-key/1.1/salt/) and add the salts & keys.
  * Configure the debug settings.
  * Remove the `die` configuration warning at the bottom.

Running `git status` at this point should return no untracked files.

##### Installing & configuring WordPress
This project uses [Composer](https://getcomposer.org/) both to install WordPress and to manage any theme or plugin dependencies. If you don't already have Composer, here's how to [install it locally](https://getcomposer.org/download/). The resulting `composer.phar` is already in the `.gitignore` file. 

If you *do* have Composer installed, run `php composer.phar self-update`.

 1. Create a blank `.htaccess` file and set permissions: `touch .htaccess && chmod 0644 .htaccess`
 2. Open `composer.json`, add any plugin or theme dependencies at the bottom of the `"require"` section, and save. There is both a plugin ([Akismet](https://wordpress.org/plugins/akismet/)) and a theme ([Twenty Sixteen](https://wordpress.org/themes/twentysixteen/)) already in `composer.json` for reference. 
 3. Run Composer to install WordPress and all dependencies: `php composer.phar install`
 4. Load the project URL in a browser window. Complete the WordPress installation form and submit. 
 5. Log into the WordPress backend.
 6. Click `Settings > Permalinks`, then update the Permalink structures and save. If you don't receive the "Permalinks structure updated" success message, adjust write permissions on `.htaccess` and try again.
 7. Run `git status` to see all modified or untracked files. 
  * Add the Composer-generated lock file: `git add composer.lock`
  * If you edited theme or plugin dependencies: `git add composer.json`
  * If you have any theme dependencies (such as a parent theme), add them to `.gitignore`.
  * Once all modified or untracked files have been either added or ignored, commit your changes: `git commit -m 'update .gitignore and composer.json, add composer.lock'`

You now have a working Git-optimzied installation of WordPress. Proceed to in-WordPress configuration: Activate plugins, import data, etc. 

Deployment
----------

 1. Review `composer.json` to confirm it reflects all current dependencies. Do not run `php composer.phar update` unless you are prepared to perform compatibility testing prior to deployment. If you modify `composer.json`, commit those changes to your repository on GitHub:
```
git add composer.json
git commit -m 'update composer.json to reflect current dependencies'
git push
```
 2\. SSH to the target host and navigate to the web root.
 3. Clone your repository.
 4. Follow the instructions listed under **Creating a localized config file** above.
 5. Install Composer (if not already installed).
 6. Create a blank `.htaccess` file and set permissions: `touch .htaccess && chmod 0644 .htaccess`
 7. Run Composer to install WordPress and all dependencies: `php composer.phar install`
 8. Load the project URL in a browser window. Complete the WordPress installation form and submit. 
 9. Log into the WordPress backend.
 10. Click `Settings > Permalinks`, then update the Permalink structures and save. If you don't receive the "Permalinks structure updated" success message, adjust write permissions on `.htaccess` and try again.

Maintenance
-----------
WordPress will handle updates. Can also update via Composer.
