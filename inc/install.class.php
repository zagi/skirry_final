<?php

/*
 * Install class
 * Use wpdb object and dbDelta function to create
 * database tables to enhance the functionality of 
 * the plugin
 * Author: michal[at]zagalski.pl
 */
class Install
{   
    /*
     * Plugin activation hook callback
     * return: void
     */
    public function install()
    {
        //get wpdb object
        global $wpdb; 
        //get charset collate
        $charset_collate = $wpdb->get_charset_collate();
        //set tables names
        $dishes = $wpdb->prefix . 'dishes';
        $dish_orders = $wpdb->prefix . 'dish_orders';
        
        //define sql query
        $sql = "CREATE TABLE $dishes (
                    id mediumint(9) NOT NULL AUTO_INCREMENT,
                    post_id mediumint(9) NOT NULL,
                    
                    
                    
                    
                ) $charset_collate;";
        
        //require WP file, which contains the dbDelta function
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        //run the query
        dbDelta( $sql );
    }
    
    /*
     * Plugin deactivation hook callback
     * return: void
     */
    public function uninstall()
    {
        
    }
    
    /*
     * Plugin activation hook callback, after the table creation
     * we put some example data into them
     * return: void
     */
    public function load_eg_data()
    {
        global $wpdb;
           
    }
}