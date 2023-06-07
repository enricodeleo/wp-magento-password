# Password Migration Magento

Donate link: [Support me on Patreon](https://patreon.com/enricodeleo)
Tags: migration, magento, login, authentication
Requires at least: 5.5
Tested up to: 6.2.2
Stable tag: 6.0
Requires PHP: 7.2
License: GPLv2 or later
License URI: [http://www.gnu.org/licenses/gpl-2.0.html](http://www.gnu.org/licenses/gpl-2.0.html)

This plugin allows WordPress to authenticate users with password hashes imported from a Magento 2 database, enabling seamless integration between the two platforms.

## Description

This plugin is designed to bridge the gap between Magento 2 and WordPress user authentication systems. It enables WordPress to recognize and authenticate users with password hashes that have been imported from a Magento 2 database.

This plugin is particularly useful for website owners who are migrating from Magento 2 to WordPress. It eliminates the need for users to reset their passwords or create new accounts, providing a seamless user experience.

The plugin uses the Sodium Crypto library to replicate Magento 2's password hashing algorithm, ensuring that all password hashes are processed securely. It's easy to install and doesn't require any modifications to your WordPress or Magento installations.

Please note that this plugin requires PHP 7.2 or higher due to its reliance on the Sodium Crypto library included in these versions. It's also recommended to back up your WordPress database before importing any data from Magento.

For any issues or feature requests, please use the support forum. Contributions to the plugin are welcome on [GitHub](https://github.com/enricodeleo/your-plugin).

## Installation

1. Upload the `magento-password` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.

## Frequently Asked Questions

### What is the purpose of this plugin?

This plugin allows WordPress to authenticate users using password hashes imported from a Magento 2 database. It's designed to facilitate seamless integration between Magento 2 and WordPress platforms.

### What are the requirements to use this plugin?

This plugin requires PHP 7.2 or higher due to its reliance on the Sodium Crypto library included in these versions.

### Which Magento version is supported?

This plugin targets Magento 2 and has been specifically tested against Magento 2.4.

### How do I install the plugin?

You can install the plugin directly from the WordPress plugin repository. After installation, you can import your Magento 2 password hashes into your WordPress database. The password hashes from Magento 2 should be imported into the usual `user_pass` column in `wp_users`.

### Will this plugin affect my existing WordPress users?

No, users will not need to reset their passwords. The plugin allows WordPress to authenticate users using their existing Magento 2 passwords.

### What should I do if I encounter issues with the plugin?

If you encounter any issues, please use the support forum for help. You can also contribute to the plugin or report issues on our [GitHub page](https://github.com/enricodeleo/your-plugin).

### Can I contribute to the development of this plugin?

Yes, contributions are welcome. You can contribute to the plugin on our [GitHub page](https://github.com/enricodeleo/your-plugin).

## Changelog

### 1.0.0
* Initial release.
