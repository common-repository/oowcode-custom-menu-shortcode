=== OOWCODE Custom Menu Shortcode ===

Contributors: oowpress
Donate link: https://profiles.wordpress.org/oowpress/
Tags: menu, shortcode, custom menus, navigation, inline menu
Requires at least: 5.8
Tested up to: 6.6
Stable tag: 1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A powerful shortcode plugin to display and customize WordPress menus with ease.

== Description ==

**OOWCODE Custom Menu Shortcode** is a powerful and flexible tool that allows you to display WordPress menus using a simple shortcode. This plugin is perfect for users looking to customize the appearance and behavior of menus without needing to modify the theme's code.

With the ability to configure inline menus, set custom separators, and add CSS classes, this plugin provides a fast and easy way to create personalized menus across your site. Whether you're building a navigation system for a blog, portfolio, or ecommerce site, this plugin is designed to be flexible and intuitive.

= Features =
* Display any WordPress menu using a shortcode.
* Options to switch between list-style or inline-style menus.
* Customizable separators for inline menus.
* Add custom CSS classes for further styling control.
* No coding knowledge required—just use the shortcode!

= Example Shortcodes =
1. Default list-style menu:
   `[oowcode_custom_menu name="main-menu"]`
   
2. Inline menu with a custom separator:
   `[oowcode_custom_menu name="main-menu" style="inline" separator=" - "]`

= Available Shortcode Attributes =
* **name** (required): The name or slug of the menu to display.
* **class** (optional): A custom CSS class for styling the menu container.
* **style** (optional): Display the menu as a list (`list`, default) or inline (`inline`).
* **separator** (optional): The separator used between items in an inline menu (default is `|`).

For additional support or to contribute, visit [OOWCODE](https://oowcode.com).

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/oowcode-custom-menu-shortcode` directory, or install the plugin directly through the WordPress plugins screen.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Add the shortcode `[oowcode_custom_menu name="your-menu-slug"]` to the post, page, or widget where you want to display the menu.

== Frequently Asked Questions ==

= What is the main shortcode for the plugin? =
Use `[oowcode_custom_menu name="your-menu-slug"]` to display your menu.

= Can I add a custom CSS class to the menu? =
Yes, simply use the `class` attribute in the shortcode. For example: `[oowcode_custom_menu name="your-menu-slug" class="custom-menu"]`.

= Does the plugin support inline menus? =
Yes, set the `style` attribute to `inline` and use the `separator` attribute to define custom separators. Example: `[oowcode_custom_menu name="main-menu" style="inline" separator=" - "]`.

== Changelog ==

= 1.0 =
* Initial release with support for custom WordPress menus using shortcodes.
* Added inline menu feature with customizable separators.
* Custom CSS classes for additional styling.

== Upgrade Notice ==

= 1.0 =
* This is the initial release, providing the core features for displaying WordPress menus using shortcodes.

== License ==

This plugin is licensed under the GPLv2 or later.
