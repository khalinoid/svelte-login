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
class Svelte_Login_API
{
    public function __construct()
    {
        $this->init_actions();
    }

    public function init_actions() {
        add_action('rest_api_init',[$this, 'svelte_login_register_routes']);
    }

    function svelte_login_register_routes() {
        register_rest_route('wp_jwt/v2', '/login', array(
            'methods' => 'POST',
            'callback' =>[$this, 'rest_callback_rest'],
            'permission_callback' => '__return_true', 
        ));
    }

    function rest_callback_rest($request){
        $username = $request->get_param('username');
        $password = $request->get_param('password');
    
        // Authenticate the user
        $user = wp_authenticate($username, $password);
        if (is_wp_error($user)) {
            return new WP_Error('invalid_credentials', 'Invalid username or password', array('status' => 403));
        }
    
        return array('message' => 'Login successful','sesson_token' => get_user_meta($user->ID,'session_tokens',true));
    }
}