TO DO
 * spell out ignored file structure in these instructions
 * add link to download ZIP
 * add GitHub link
 * add "Inspired by" links


Version Control Optimzed WordPress Structure
============================================

By default, [WordPress](https://wordpress.org/) is self-contained within a single directory. This is not the optimal arrangement for implementation of version control.

In addition, the use of a single configuration file (`wp-config.php`) presents a challenge when deploying a version-controlled WordPress-based project to multiple environments (e.g. localhost / dev / production), necessitating manual recreation of an environment-specific config file for each.

The purpose of this repository is to provide a clean, intuitive base for a WordPress-based project with only the project-specific 

This repository addresses these issues via the following configuration changes:
1. There is a separate subdirectory (named `cms`) for the WordPress core.
2. The active `wp-content` subdirectory (home to plugins, themes, etc.) is located outside the WordPress subdirectory, at the project directory root.
3. The `wp-config.php` now contains only project-specific data (suitable for version control). It's configured to look for and `require` a localized config file for environment-specific data (such as database credentials).
4. A template for the localized config file (`sample-config.php`) has been added.

Installation
------------

Note: These instructions assume the remote host is configured for SSH and has both [Git](http://www.git-scm.com/) and [Wget](https://www.gnu.org/software/wget/) accessible via the command-line.

While these instructions rely on Git for version control, the structure itself is software-agnostic. Download the repository as a ZIP, then recreate the  

1. 
