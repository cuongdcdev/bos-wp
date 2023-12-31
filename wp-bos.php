<?php

/*
  Plugin Name: WP-BOS connector
  Description: Make NEAR BOS even greater by enabling the ability to embed it into WordPress, the most popular open-source web2 CMS in the world! Powered by Web3! #BuiltOnNEAR
  Author URI: https://cuongdcdev.near.social
  Author: Kent
  Version: 0.0.2
*/

if (!defined('ABSPATH'))
    exit;

add_action('wp_enqueue_scripts', function(){
    wp_enqueue_script("bos-wp-runtime-js" , plugin_dir_url(__FILE__) . "dist/runtime.bundle.js" , array("react") , "1,0" , true );
    wp_enqueue_script("bos-wp-bundle-js" , plugin_dir_url(__FILE__) . "dist/main.bundle.js" , array("react") , "1,0" , true );

    wp_enqueue_script('bos-wp-block-script' ,  plugin_dir_url(__FILE__). "inc/wp-block/bos-frontend.js", [], true );
    wp_enqueue_style('bos-wp-block-style' ,  plugin_dir_url(__FILE__). "inc/wp-block/bos-frontend.css" );
  });


require_once( dirname(__FILE__) ."/inc/wp-block/bos-block.php");
require_once( dirname(__FILE__) ."/inc/wp-shortcode/bos-shortcode.php");
