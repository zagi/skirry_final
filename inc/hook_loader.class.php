<?php

/*
 * Hook and filter loader class
 * It adds the hooks and filters into WP.
 * Author: michal[at]zagalski.pl
 */

class Hook_Loader 
{
    /*
     * Protected array containing action hooks
     */
    protected $actions ;
    /*
     * Protected array containing filter hooks
     */
    protected $filters;
    
    /*
     * Hook loader constructor function
     * return: void
     */
    public function __construct()
    {
        /*
         * Define those values as arrays
         */
        $this->actions = array();
        $this->filters = array();
    }
    
    /*
     * Adds the filter into the filters array
     * return: void
     */
    public function add_filter($filter, $object, $method)
    {
        $this->filters = $this->add($this->filters, $filter, $object, $method);   
    }

    /*
     * Adds the action into the actions array
     * return: void
     */
    public function add_action($hook, $object, $method)
    {
        $this->actions $this->add($this->actions, $hook, $object, $method);
    }
    
    /*
     * Private method which puts the actions and filters and theirs object methods callbacks into array
     * return: array
     */
    private function add($hooks, $hook, $object, $method)
    {
        $hooks[] = array(
            'hook'   => $hook,
            'object' => $object, 
            'method' => $method,
        );
        
        return $hooks;
    }
    
    /*
     * Returns the actions array 
     * return: array
     */
    public function get_actions()
    {
        return $this->actions;
    }
    
    /*
     * Returns the filters array 
     * return: array
     */
    public function get_filters()
    {
        return $this->filters;   
    }
}
 
