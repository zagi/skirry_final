<?php

/*
 * Plugin Name:       skirry
 * Plugin URI:        http://github.com/zagi/skirry
 * Description:       Plugin operates the orders of the dishes.
 * Version:           0.1.1r
 * Author:            Michal Zagalski <michal[at]zagalski.pl>
 * Author URI:        http://zagalski.pl
 * Text Domain:       skirry-locale
 * License:           Commercial
 * Domain Path:       /languages
 */

/*
 * check whether the file is called directly,
 * if yes finalize the execution
 */
if ( ! defined( 'WPINC' ) )
{
    die;   
}

/*
 * define const value to store the plugin directory path
 * const: SKIRRY_DIR 
 */
define( 'SKIRRY_DIR', plugin_dir_path( __FILE__ ) );

/*
 * require main plugin class and install class
 */
require_once SKIRRY_DIR . 'inc/skirry.class.php';
require_once SKIRRY_DIR . 'inc/install.class.php';

/*
 * define initialization function
 * return: void
 */
function run_plugin() 
{
    //create plugin object
    $skirry = new Skirry();
    //call the load method
    $skirry->load();
}

/*
 * define plugin activation callback
 */
register_activation_hook( __FILE__, array( 'Install', 'install' ) );
register_activation_hook( __FILE__, array( 'Install', 'load_eg_data' ) );

/*
 * run the plugin startup function
 */
run_plugin();
