##### TO DO
 - [ ] spell out ignored file structure in these instructions
 - [ ] add GitHub link
 - [ ] add "Inspired by" links


Version-Control-Optimized WordPress Structure
=============================================

By default, [WordPress](https://wordpress.org/) is self-contained within a single directory. This is not the optimal arrangement for implementation of version control.

In addition, the use of a single configuration file (`wp-config.php`) presents a challenge when deploying a version-controlled WordPress-based project to multiple environments (e.g. localhost / dev / production), necessitating manual recreation of an environment-specific config file for each.

The purpose of this repository is to provide a clean, intuitive structure in which to install WordPress, with only the project-specific files placed under version control.

These are the key changes:
 1. There is a separate subdirectory (named `cms`) for the WordPress core.
 2. The active `wp-content` subdirectory (home to plugins, themes, etc.) is located outside the WordPress subdirectory, at the project directory root.
 3. The `wp-config.php` now contains only project-specific data (suitable for version control). It's configured to look for and `require` a localized config file for environment-specific data (such as database credentials) that is *not* under version control.
 4. A template for this localized config file (`sample-config.php`) has been added, to facilitate creation of the environmental-specific version.

Installation
------------

Note: These instructions assume the remote host is configured for SSH and has both [Git](http://www.git-scm.com/) and [Wget](https://www.gnu.org/software/wget/) accessible via the command-line.

While these instructions rely on Git for version control, the structure itself is software-agnostic and could be modified for use with other vcs (such as Subverison).

1. 
