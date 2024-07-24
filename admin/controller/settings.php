<?php

/**
 * Register all actions and filters for the plugin
 *
 * @link       https://khalinoid.com
 * @since      1.0.0
 *
 * @package    Svelte_Login
 * @subpackage Svelte_Login/admin
 */

/**
 * Register all actions and filters for the plugin.
 *
 * Maintain a list of all hooks that are registered throughout
 * the plugin, and register them with the WordPress API. Call the
 * run function to execute the list of actions and filters.
 *
 * @package    Svelte_Login
 * @subpackage Svelte_Login/admin
 * @author     Khalid <khalicog@gmail.com>
 */
class Svelte_Register_Shortcode
{
    public function __construct()
    {
       
    }
    public function svelte_login_register_shortcode(){
        $page_title = 'Svelte Login';
        $page_content = '[svelte_login_front]';
        $page_name = 'svelte-login';

        // Check if the page already exists

        $page = get_posts(array(
            'post_type' => 'page',
            'name'     => $page_name,
            'post_status' => 'publish',
            'numberposts' => 1
        ));

        if ($page == null) {
            // Create post object
            $new_page = array(
                'post_name'    => $page_name,
                'post_title'    => $page_title,
                'post_content'  => $page_content,
                'post_status'   => 'publish',
                'post_type'     => 'page'
            );

            // Insert the post into the database
            $page_id = wp_insert_post($new_page);

        }
    } 
}