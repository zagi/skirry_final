<?php

/*
 * Admin class
 * Class which contains all admin actions and filters callbacks.
 * Author: michal[at]zagalski.pl
 */

include SKIRRY_DIR . 'admin/helper/table.class.php';

class Admin
{   
    /*
     * Callback function, which loads the js script and css style
     * return: void
     */
    public function enqueue_styles()
    {
        /*
         * Add plugin style file to be loaded into admin view
         */
        wp_enqueue_style( 'skirry-admin', SKIRRY_DIR . 'admin/css/skirry.css' );
        
        /*
         * Add plugin javascript file to be loaded into admin view
         */
        wp_enqueue_script( 'skirry-admin-script', SKIRRY_DIR . 'admin/js/skirry.js', array(), '1.0.0', true );
    }
    
    /*
     * Callback function, which adds the plugin elements into admin menu 
     * return: void
     */
    public function add_menu_page()
    {
        add_menu_page( 'Panel sterowania Skirry', 'Skirry', 'manage-options', 'skirry-dashboard', array( 'Admin', 'render_dashboard_page' ), '' , 20 );
        add_submenu_page( 'skirry-dashboard', 'Lista zamówień', 'Lista zamówień', 'manage-options', 'skirry-list', array( 'Admin', 'render_list_page' ) );
        
        /*
         * Trick to add admin page without menu element, pass the false value as the parent slug argument
         */
        add_submenu_page( false, 'Zamówienie', '', 'manage-options', 'skirry-order', array( 'Admin', 'render_single_page' ) );
    }
    
    /*
     * Callback function, which loads dashboard view file
     * return: void
     */
    public function render_dashboard_page()
    {
        global $wpdb;
        
        
        //count the orders,
        //get 5 recent orders,
        
        
        $data = array(
            'order_count'   => $order_count,
            'order_recent'  => $order_recent,
        );
        
        include SKIRRY_DIR . 'admin/view/dashboard.php';
    }
    
    /*
     * Callback function, which loads list view file
     * return: void
     */
    public function render_list_page()
    {
        include SKIRRY_DIR . 'admin/view/list.php';
    }
    
    /*
     * Callback function, which loads edit single order view file
     * return: void
     */
    public function render_single_page()
    {
        include SKIRRY_DIR . 'admin/view/single.php';
    }
}