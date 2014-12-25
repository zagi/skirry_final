<?php

/*
 * Table class
 * WP admin table list plugin implementation
 * Author: michal[at]zagalski.pl
 */

if ( ! class_exists( '' ) )
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );

class Table extends WP_List_Table
{   
    function __construct()
    {
        global $status, $page;
        
        parent::__construct(
            array(
                'singluar'  => 'Zamówienie',
                'plural'    => 'Zamówienia',
                'ajax'      => true
            )
        );
    }
    
    function column_defalut()
    {
        
    }
    
    function column_title()
    {
        
    }
    
    function column_cb( $item )
    {
        
    }
    
    function get_columns()
    {
        
    }
    
    function get_sortable_columns()
    {
        
    }
    
    function get_bulk_actions()
    {
        
    }
    
    function process_bulk_action()
    {
           
    }
    
    function prepare_items()
    {
        
    }
    
    function display()
    {
        
    }
    
    function ajax_response()
    {
        
    }
    
}