<?php

/*
 * Main plugin class
 * 
 * Author: michal[at]zagalski.pl
 */

/*
 * Include Hook_Loader class, Admin and Public class
 */
include SKIRRY_DIR . 'inc/hook_loader.class.php';
include SKIRRY_DIR . 'admin/admin.class.php';
include SKIRRY_DIR . 'public/public.class.php';


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
         * Define options property as array
         */
        $this->options = array();

        /*
         * Create hook loader object
         */
        $hook_loader = new Hook_Loader();
        
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
         * Create admin object
         */
        $admin = new Admin();
        
        /*
         * Add actions
         */
        $this->hook_loader->add_action( 'wp_enqueue_scripts', $admin, 'enqueue_styles' );
        $this->hook_loader->
    }
    
    /*
     * Public hook adder
     * return: void
     */
    private function public_hooks()
    {
        
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