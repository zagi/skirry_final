<?php
/*
 *
 *
 *
 *
 *
 *
 *
 *
 */

include SKIRRY_DIR . 'inc/hook_loader.class.php'

class Skirry
{
    protected $options;
    protected $hook_loader;
    
    public function __construct()
    {
        $options = array();
        
        $hook_loader = new HookLoader();
        
        $this->admin_hooks();
        $this->public_hooks();
    }
    
    private function admin_hooks()
    {
        $admin = new Admin();
        
        $this->hook_loader->add_action( 'wp_enqueue_scripts', $admin, 'enqueue_styles' );
    }
    
    private function public_hooks
    
    public function load()
    {
        
    }
}