<?php
/*
Plugin Name: OOWCODE Custom Menu Shortcode
Plugin URI: https://profiles.wordpress.org/oowpress/
Description: A powerful tool that allows users to customize and display WordPress menus with full flexibility using a shortcode. Easily configure inline options like menu style and separators for tailored display. No coding required.
Version: 1.0
Author: oowpress
Author URI: https://oowcode.com
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: oowcode-custom-menu-shortcode
Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class COM_OOWCODE_Custom_Menu_Shortcode {

    /**
     * Constructor method.
     * Hooks the necessary actions to add the menu in the admin area and register the shortcode.
     */
    public function __construct() {
        // Hook to add the custom info page in the admin menu.
        add_action('admin_menu', array($this, 'com_oowcode_add_info_page'));
        
        // Hook to register the custom shortcode during the WordPress initialization phase.
        add_action('init', array($this, 'com_oowcode_register_menu_shortcode'));
    }

    /**
     * Adds a custom info page in the WordPress admin area.
     * This method will add a new page under the "Appearance" menu in the admin dashboard.
     */
    public function com_oowcode_add_info_page() {
        // Check if the Oowcode menu already exists
        if (is_admin() && current_user_can('manage_options')) {

            // Add the parent "Oowcode" menu only if it doesn't already exist
            global $menu;
            $menu_exists = false;
            foreach ($menu as $menu_item) {
                if ($menu_item[2] == 'oowcode_menu') {
                    $menu_exists = true;
                    break;
                }
            }

            // If the menu doesn't exist, create it
            if (!$menu_exists) {
                add_menu_page(
                esc_html__('Oowcode', 'oowcode-custom-menu-shortcode'), // Parent menu title
                esc_html__('Oowcode', 'oowcode-custom-menu-shortcode'), // Parent menu text
                'manage_options', // Capability required
                'oowcode_menu', // Slug for the parent menu
                '', // No callback needed for the parent
                'dashicons-admin-generic' // Icon for the parent menu
            );
            }

            // Add this plugin's submenu under the Oowcode parent menu
            add_submenu_page(
            'oowcode_menu', // Use the same slug for the parent menu
            esc_html__('OOWCODE Menu Shortcode', 'oowcode-custom-menu-shortcode'), // Submenu title
            esc_html__('OOWCODE Menu Shortcode', 'oowcode-custom-menu-shortcode'), // Submenu text
            'manage_options', // Capability required
            'com_oowcode_shortcode_menu_info', // Slug for the submenu
            array($this, 'com_oowcode_render_info_page') // Callback to render the submenu page content
        );
        }
    }


    /**
     * Renders the content of the custom info page in the admin area.
     * Displays information about how to use the plugin and examples of shortcodes.
     */
    public function com_oowcode_render_info_page() {
        // Ensure the user has permission to view this page.
        if (!current_user_can('manage_options')) {
            return;
        }

        // Output the HTML content for the admin page.
        ?>
        <div class="wrap">
            <h1 class="oowcode-admin-title"><?php echo esc_html__('✨ OOWCODE Custom Menu Shortcode', 'oowcode-custom-menu-shortcode'); ?></h1>
            <p class="oowcode-admin-description">
                <?php echo esc_html__('Welcome to the OOWCODE Custom Menu Shortcode plugin. This tool allows you to display WordPress menus in custom formats using simple shortcodes. No need for complex settings—just add the shortcode where you want the menu to appear!', 'oowcode-custom-menu-shortcode'); ?>
            </p>
            <h3 class="oowcode-admin-subtitle"><?php echo esc_html__('🎯 Basic Shortcode Usage:', 'oowcode-custom-menu-shortcode'); ?></h3>
            <p><code><?php echo esc_html__('[oowcode_custom_menu name="your-menu-slug"]', 'oowcode-custom-menu-shortcode'); ?></code></p>

            <h3 class="oowcode-admin-subtitle"><?php echo esc_html__('🛠️ Available Attributes:', 'oowcode-custom-menu-shortcode'); ?></h3>
            <ul class="oowcode-admin-list">
                <li><strong><?php echo esc_html__('name', 'oowcode-custom-menu-shortcode'); ?></strong> (<?php echo esc_html__('required', 'oowcode-custom-menu-shortcode'); ?>): <?php echo esc_html__('The name or slug of the menu to display.', 'oowcode-custom-menu-shortcode'); ?></li>
                <li><strong><?php echo esc_html__('class', 'oowcode-custom-menu-shortcode'); ?></strong> (<?php echo esc_html__('optional', 'oowcode-custom-menu-shortcode'); ?>): <?php echo esc_html__('Add a custom CSS class to the menu container.', 'oowcode-custom-menu-shortcode'); ?></li>
                <li><strong><?php echo esc_html__('style', 'oowcode-custom-menu-shortcode'); ?></strong> (<?php echo esc_html__('optional, default: list', 'oowcode-custom-menu-shortcode'); ?>): <?php echo esc_html__('Set to "inline" for an inline menu with a separator.', 'oowcode-custom-menu-shortcode'); ?></li>
                <li><strong><?php echo esc_html__('separator', 'oowcode-custom-menu-shortcode'); ?></strong> (<?php echo esc_html__('optional, default: |', 'oowcode-custom-menu-shortcode'); ?>): <?php echo esc_html__('Define a custom separator for inline menus.', 'oowcode-custom-menu-shortcode'); ?></li>
            </ul>

            <h3 class="oowcode-admin-subtitle"><?php echo esc_html__('💡 Examples:', 'oowcode-custom-menu-shortcode'); ?></h3>
            <p><code><?php echo esc_html__('[oowcode_custom_menu name="main-menu"]', 'oowcode-custom-menu-shortcode'); ?></code> — <?php echo esc_html__('Renders the menu as a list (default).', 'oowcode-custom-menu-shortcode'); ?></p>
            <p><code><?php echo esc_html__('[oowcode_custom_menu name="main-menu" style="inline" separator=" - "]', 'oowcode-custom-menu-shortcode'); ?></code> — <?php echo esc_html__('Renders the menu inline with a custom separator.', 'oowcode-custom-menu-shortcode'); ?></p>

            <h3 class="oowcode-admin-subtitle"><?php echo esc_html__('🚀 Get Started Now!', 'oowcode-custom-menu-shortcode'); ?></h3>
            <p><?php echo esc_html__('Insert the shortcode in your posts, pages, or widgets to display your menus with full customization. For support, visit', 'oowcode-custom-menu-shortcode'); ?> <a href="https://oowcode.com" target="_blank"><?php echo esc_html__('OOWCODE', 'oowcode-custom-menu-shortcode'); ?></a>.</p>
        </div>
        <?php
    }

    /**
     * Displays a WordPress menu based on the shortcode attributes provided.
     * 
     * @param array $atts Array of shortcode attributes.
     *  - 'name': The name or slug of the menu to display (required).
     *  - 'class': Custom CSS class for the menu container (optional).
     *  - 'style': Defines the menu style, 'list' (default) or 'inline' (optional).
     *  - 'separator': Custom separator for inline menus (optional, default: '|').
     * 
     * @return string The HTML output of the menu.
     */
    public function com_oowcode_display_menu_by_shortcode($atts) {
        // Extract shortcode attributes and set default values.
        $atts = shortcode_atts(array(
            'name' => '',
            'class' => '',
            'style' => 'list',  // Default menu style is 'list'
            'separator' => '|',  // Default separator for inline style
        ), $atts);

        // Return an error message if no menu name is provided.
        if (empty($atts['name'])) {
            return esc_html__('Please specify a menu name or slug.', 'oowcode-custom-menu-shortcode');
        }

        // Fetch the menu items based on the provided menu name/slug.
        $menu_items = wp_get_nav_menu_items($atts['name']);
        if (!$menu_items) {
            return esc_html__('Menu not found. Please check the menu name or slug.', 'oowcode-custom-menu-shortcode');
        }

        // Generate menu output depending on the selected style.
        if ($atts['style'] === 'inline') {
            // Create an inline menu with the specified separator.
            $output = '<div class="menu-inline ' . esc_attr($atts['class']) . '">';
            $menu_output = array();
            foreach ($menu_items as $item) {
                $menu_output[] = '<a href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a>';
            }
            // Join the menu items with the custom separator.
            $output .= implode(' ' . esc_html($atts['separator']) . ' ', $menu_output);
            $output .= '</div>';
        } else {
            // Generate a standard list-style menu.
            $output = '<ul class="' . esc_attr($atts['class']) . '">';
            foreach ($menu_items as $item) {
                $output .= '<li><a href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a></li>';
            }
            $output .= '</ul>';
        }

        // Return the generated menu HTML.
        return $output;
    }

    /**
     * Registers the custom shortcode [oowcode_custom_menu].
     * This shortcode can be used in posts, pages, or widgets to display a WordPress menu.
     */
    public function com_oowcode_register_menu_shortcode() {
        // Register the shortcode with a callback to display the menu.
        add_shortcode('oowcode_custom_menu', array($this, 'com_oowcode_display_menu_by_shortcode'));
    }
}

// Instantiate the class to initialize the plugin.
new COM_OOWCODE_Custom_Menu_Shortcode();
