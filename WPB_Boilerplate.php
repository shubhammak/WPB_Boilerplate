<?php
/**
 * Plugin Name: WPB_Boilerplate
 * Author: TechEniac
 * Author URI: http://techeniac.com
 * Version: 1.0.0
 */

 add_action('vc_before_init', 'vc_before_init_actions');

function vc_before_init_actions()
{

// Require new custom Element

    include(plugin_dir_path(__FILE__) . 'vc_directory/vc-directory-element.php');
}

// Link directory stylesheet

function community_directory_scripts()
{
    wp_enqueue_style('community_directory_stylesheet', plugin_dir_url(__FILE__) . 'styling/directory-styling.css');
}
add_action('wp_enqueue_scripts', 'community_directory_scripts');
