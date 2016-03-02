Git-Optimized WordPress
=======================

This repository contains a Git-optimized boilerplate structure for use with version-controlled WordPress projects.

**Changes**
 * There's a separate subdirectory for the WordPress core (`cms/`).
 * The active `wp-content/` subdirectory is located outside the WordPress subdirectory, at the project root. 
 * The `wp-config.php` file has been reconfigured for inclusion in the project repository, now containing only general project data and not sensitive, environment-specific data, such as database credentials or salts & keys.
 * This sensitive information is now contained in a localized config file that, for added security, can be placed outside of the web root.
 * A template for this localized config file (`sample-config.php`) has been added.
 * A `.gitignore` file has been configured so only the project structure and files are under version control.

*Note: While this project uses Git for version control, the structure itself is software-agnostic. With a few minor modifications it could be used with any vcs (such as [Subversion](https://subversion.apache.org/)).*

Setting up a new project repository
-----------------------------------

 1. Navigate into the web root of your localhost or dev environment.
 2. Clone this repository: `git clone https://github.com/quayzar/git-optimized-wordpress.git .`
 3. Delete the `.git` directory to separate your files from this repository: `rm -rf .git`
 4. Create a new, project-specific repository:
```
git init
git add .
git commit -m 'initial commit'
```
 5\. [Push your local repository to GitHub](http://quayzar.com/git/pushing-a-local-repository-to-github/).

The boilerplate comes pre-configured with two `.gitignore` files:
 * `/.gitignore` <-- this contains all of the project ignore rules
 * `/cms/.gitignore` <-- this is here just to force Git to create the `cms/` subdirectory

*Note: If you're using something other than Git for version control, don't forget to recreate these ignore rules once you've set up your repository.*

Configuring an instance
-----------------------

Once the project repository is set up, you need to create a localized config file and then install WordPress:

##### Creating a localized config file
 1. Create an empty database. Note the host, database name, username, and password, as you'll need them shortly.
 2. Copy `sample-config.php` to create a localized config file *in position* on the server (see note below). Replace "sample" in the new name with "local", "dev", or "live", depending on the environment.
 3. Open this new file and make the following changes:
  * Provide `ADDL_SUBDIR` (if any).
  * Enter the database credentials.
  * [Generate](https://api.wordpress.org/secret-key/1.1/salt/) and add the salts & keys.
  * Configure the debug settings.
  * Remove the `die` configuration warning at the bottom.

Running `git status` at this point should return no untracked files.

Note: This boilerplate is configured to look for the localized config file either at the web root (on the same level as `wp-config.php`) or, for enhanced security, [one level above](http://wordpress.stackexchange.com/questions/58391/is-moving-wp-config-outside-the-web-root-really-beneficial/74972#74972). 

##### Installing WordPress
 1. Download WordPress to the web root: `wget https://wordpress.org/latest.tar.gz`
 2. Extract WordPress into the `cms` subdirectory: `tar xvf latest.tar.gz -C cms --strip-components=1`
 3. Remove the WordPress archive: `rm latest.tar.gz`
 4. Create a blank `.htaccess` file and set permissions: `touch .htaccess && chmod 0644 .htaccess`
 5. Load the project URL in a browser window. Complete the WordPress installation form and submit. 
 6. Log into the WordPress backend.
 7. Click `Settings > Permalinks`, then update the Permalink structures and save. If you don't receive the "Permalinks structure updated" success message, adjust write permissions on `.htaccess` and try again.
 8. FIXTHIS >> theme || parent themes via COMPOSER
 9. FIXTHIS >> plugins via COMPOSER
 
You should now have a working installation of WordPress that's optimized for version control. Run `git status` again, to confirm no untracked files or unexpected modifications.

Deploy a project
----------------
When you're ready to deploy your project (say, to your dev environment on your remote host) start by cloning your project repository to the new environment, then repeat **Configure an instance** above.

FIXTHIS: Install and run Composer to install plugins

Frequently Asked Questions
--------------------------

**Q:** Why don't you configure WordPress as a git submodule or use a dependency manager like Composer to install it?  
**A:** Even though WordPress could certainly be considered a dependency here, I prefer to keep it entirely separate from the project repository. In this fashion, I can keep my focus on the project itself and leave it to WordPress to keep itself current to the latest security patches. This way, I don't have to keep updating this project just to iterate the WordPress version.

**Q:** Couldn't you just create a shell script to automate the entire process?  
**A:** Yes, and I will, soon enough.

