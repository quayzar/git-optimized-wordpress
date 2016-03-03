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

Once your project repository has been set up, you'll need to create a localized config file and then install WordPress.

##### Creating a localized config file
 1. Create an empty database. Note the host, database name, username, and password, as you'll need them shortly.
 2. Copy `sample-config.php` to create a localized config file, replacing "sample" in the new name with "local", "dev", "staging", or "live", depending on the environment. Save it either at the web root (on the same level as `wp-config.php`) or, for enhanced security, one level up. [Read more here.] (http://wordpress.stackexchange.com/questions/58391/is-moving-wp-config-outside-the-web-root-really-beneficial/74972#74972)
 3. Open this new file and make the following changes:
  * Provide `ADDL_SUBDIR` (if any).
  * Enter the database credentials.
  * [Generate](https://api.wordpress.org/secret-key/1.1/salt/) and add environment-specific salts & keys.
  * Configure the debug settings.
  * Remove the `die` configuration warning at the bottom.

Running `git status` at this point should return neither modifications nor untracked files.

##### Installing & configuring WordPress
This project uses [Composer](https://getcomposer.org/) both to install WordPress and to manage any theme or plugin dependencies. If you don't already have Composer, here's how to [install it locally](https://getcomposer.org/download/). The resulting `composer.phar` is already in the `.gitignore` file. 

If you *do* have Composer installed, run `php composer.phar self-update`.

 1. Create a blank `.htaccess` file and set permissions: `touch .htaccess && chmod 0644 .htaccess`
 2. Open `composer.json`, add any plugin or theme dependencies at the bottom of the `"require"` section, and save. There is both a plugin ([Akismet](https://wordpress.org/plugins/akismet/)) and a theme ([Twenty Sixteen](https://wordpress.org/themes/twentysixteen/)) already in this section for reference. 
 3. Run Composer to install WordPress and all dependencies: `php composer.phar install`
 4. Load the project URL in a browser window. Complete the WordPress installation form and submit. 
 5. Log into the WordPress backend.
 6. Select `Settings > Permalinks`, then update the Permalink structures and save. If you don't receive the "Permalinks structure updated" success message, adjust write permissions on `.htaccess` and try again.
 7. Run `git status` to see all modified or untracked files. 
  * Add the Composer-generated lock file: `git add composer.lock`
  * If you edited theme or plugin dependencies, add them: `git add composer.json`
  * If you have any theme dependencies (such as a parent theme) that shouldn't be in the repository, add them to `.gitignore`.
  * Once all modified or untracked files have been either added or ignored, commit your changes: `git commit -m 'update .gitignore and composer.json, add composer.lock'`

You now have a working Git-optimized installation of WordPress. Proceed with in-WordPress configuration (activate plugins, import data, customize theme, etc). 

Deployment
----------

Before deployment, review `composer.json` to confirm it reflects the current dependency set. Do not run `php composer.phar update` unless you are prepared to perform compatibility testing prior to deployment. If you modify `composer.json`, commit those changes to your repository on GitHub:
```
git add composer.json
git commit -m 'update composer.json to reflect current dependencies'
git push
```

 1. SSH to the target host and navigate to the web root.
 2. Clone your repository.
 3. Follow the instructions listed under **Creating a localized config file** above.
 4. Install Composer (if not already installed).
 5. Create a blank `.htaccess` file and set permissions: `touch .htaccess && chmod 0644 .htaccess`
 6. Run Composer to install WordPress and all dependencies: `php composer.phar install`
 7. Load the project URL in a browser window. Complete the WordPress installation form and submit. 
 8. Log into the WordPress backend.
 9. Click `Settings > Permalinks`, then update the Permalink structures and save. If you don't receive the "Permalinks structure updated" success message, adjust write permissions on `.htaccess` and try again.
 10. Perform in-WordPress configuration.

Maintenance
-----------

**Repository code**
For changes to code the project repository, use `git pull`.

**Updating dependencies via WordPress**
It's much simpler to manage updates to WordPress and theme or plugin dependencies through WordPress itself (after a local compatibility review).

**Updating dependencies via Composer**
 1. Run `php composer.phar update` locally and perform compatibility testing. If there are compatibility issues, update `composer.json` with the preferred version number.
 2. Add the updated `composer.json` and `composer.lock` files to the repository and commit.
 3. On the remote host, run `git pull` to update `composer.lock`.
 4. Run `php composer.phar self-update`.
 5. Run `php composer.phar install`. This will install all dependencies locked to the specific versions tested locally. Do not run `php composer.phar update` unless there are no compatibility issues.
