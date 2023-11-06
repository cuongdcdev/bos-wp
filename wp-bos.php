<?php

/*
  Plugin Name: WP-BOS connector
  Author URI: https://cuongdcdev.near.social
  Author: Kent
  Version: 0.0.1
*/

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class WP_BOS
{
    function __construct()
    {
        add_action('init',[$this, 'onInit']);
        add_action('init' , [$this, 'add_shortcodes']);
    }

    function onInit()
    {
        // wp_register_script('makeUpANameHereScript', plugin_dir_url(__FILE__) . 'build/index.js', array('wp-blocks', 'wp-element', 'wp-editor'));
        // wp_register_style('makeUpANameHereStyle', plugin_dir_url(__FILE__) . 'build/index.css');
        wp_enqueue_script("wpbos-runtime-js" , plugin_dir_url(__FILE__) . "dist/runtime.bundle.js" , array("react") , "1,0" , true );
        wp_enqueue_script("wpbos-bundle-js" , plugin_dir_url(__FILE__) . "dist/main.bundle.js" , array("react") , "1,0" , true );

        register_block_type("boswp/add-component", array(
            'render_callback' => [$this, 'renderCallback'],
            'editor_script' => 'makeUpANameHereScript',
            'editor_style' => 'makeUpANameHereStyle'
        )
        );

    }

    function renderCallback($attributes)
    {
        if (!is_admin()) {
            //   wp_enqueue_style('boilerplateFrontendStyles', plugin_dir_url(__FILE__) . 'build/frontend.css');
            //   wp_enqueue_script('boilerplateFrontendScript', plugin_dir_url(__FILE__) . 'build/frontend.js', array('wp-element' , 'react') , "" , true );

            // wp_enqueue_script("wpbos-runtime-js", plugin_dir_url(__FILE__) . "dist/runtime.bundle.js", array("react"), "1,0", true);
            // wp_enqueue_script("wpbos-bundle-js", plugin_dir_url(__FILE__) . "dist/main.bundle.js", array("react"), "1,0", true);

        }
        ob_start(); ?>
        <div class="bos-wp-placeholder">
            <pre style="display: none;"><?php echo wp_json_encode($attributes) ?></pre>
        </div>
        <?php return ob_get_clean();

    }

    function renderCallbackBasic($attributes)
    {
        return '<div class="boilerplate-frontend">Hello, the sky is ' . $attributes['skyColor'] . ' and the grass is ' . $attributes['grassColor'] . '.</div>';
    }

    function add_shortcodes(){
        add_shortcode("bos-wp", function($attrs){
            ob_start(); 
            ?>
                <div class="bos-wp-placeholder" data-attrs="<?= htmlentities(json_encode($attrs)) ?>"></div>
            <?php 
            return ob_get_clean();
        });
    }
}

$bradsBoilerplate = new WP_BOS();
