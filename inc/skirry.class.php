<?php

/*
 * Main plugin class
 * 
 * Author: michal[at]zagalski.pl
 */

/*
 * Include Hook_Loader class, Admin and Public and Ajax class
 */
include SKIRRY_DIR . 'inc/hook_loader.class.php';
include SKIRRY_DIR . 'admin/admin.class.php';
include SKIRRY_DIR . 'public/public.class.php';
include SKIRRY_DIR . 'inc/ajax.class.php';
include SKIRRY_DIR . 'inc/options.class.php'

class Skirry
{
    
    protected $options;
    protected $hook_loader;
    
    /*
     * Constructor method calls the private methods to add actions and filters into the hook loader object
     * return: void
     */
    public function __construct()
    {
        /*
         * Create hook loader object
         */
        $this->hook_loader = new Hook_Loader();
        
        /*
         * Call admin and public hooks methods, which
         */
        $this->admin_hooks();
        $this->public_hooks();
        
    }
    
    /*
     * Admin hook adder
     * return: void
     */
    private function admin_hooks()
    {
        /*
         * Create admin and ajax object
         */
        $admin = new Admin();
        $ajax = new Ajax();
        
        
        /*
         * Add actions
         */
        $this->hook_loader->add_action( 'wp_enqueue_scripts', $admin, 'enqueue_styles' );
        $this->hook_loader->add_action( 'admin_menu', $admin, 'add_menu_page' ); 
        $this->hook_loader->add_action( '', $admin, '' );
        
        $this->hook_loader->add_action( 'get_' 
    }
    
    /*
     * Public hook adder
     * return: void
     */
    private function public_hooks()
    {
        /*
         * Create 
         */
    }
    
    /*
     * Load method, it intagrates the actions and filters with WP
     * return: void
     */
    public function load()
    {
        /*
         * Get actions and filters from hook loader object
         */
        $actions = $this->hook_loader->get_actions();
        $filtres = $this->hook_loader->get_filters();
        
        /*
         * Loop over the actions
         */
        foreach( $actions as $action )
        {
            add_action( $action['hook'], array( $action['object'], $action['method'] );   
        }
        
        /*
         * Loop over the filters
         */
        foreach ( $filters as $filter )
        {
            add_filter( $filter['hook'], array( $filter['object'], $filter['method'] );
        }
    }
}