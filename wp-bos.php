<?php

/*
  Plugin Name: WP-BOS connector
  Description: Make #NEAR #BOS greater by ability to embed to the most popular open source CMS in the world!! Powered by Web3! #BuiltOnNEAR
  Author URI: https://cuongdcdev.near.social
  Author: Kent
  Version: 0.0.1
*/

if (!defined('ABSPATH'))
    exit;

add_action('init', function(){
    wp_enqueue_script("bos-wp-runtime-js" , plugin_dir_url(__FILE__) . "dist/runtime.bundle.js" , array("react") , "1,0" , true );
    wp_enqueue_script("bos-wp-bundle-js" , plugin_dir_url(__FILE__) . "dist/main.bundle.js" , array("react") , "1,0" , true );
});

require_once( dirname(__FILE__) ."/inc/wp-block/bos-block.php");
require_once( dirname(__FILE__) ."/inc/wp-shortcode/bos-shortcode.php");
