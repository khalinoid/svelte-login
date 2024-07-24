<?php

/**
 * Register all actions and filters for the plugin
 *
 * @link       https://khalinoid.com
 * @since      1.0.0
 *
 * @package    Svelte_Login
 * @subpackage Svelte_Login/public
 */

/**
 * Register all actions and filters for the plugin.
 *
 * Maintain a list of all hooks that are registered throughout
 * the plugin, and register them with the WordPress API. Call the
 * run function to execute the list of actions and filters.
 *
 * @package    Svelte_Login
 * @subpackage Svelte_Login/public
 * @author     Khalid <khalicog@gmail.com>
 */
class Svelte_Login_Page
{
    public function __construct()
    {
        
    }


    public function svelte_login_frontend()
    {

        ob_start();
        echo "Hello";
        return ob_get_clean();

    }
}
