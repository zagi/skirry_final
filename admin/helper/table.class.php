<?php

/*
 * Table class
 * WP admin table list plugin implementation
 * Author: michal[at]zagalski.pl
 */

/*
 * Check whether the WP_List_Table is avaiable, if not require file
 */
if ( ! class_exists( 'WP_List_Table' ) )
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );

/*
 * Table class
 * WP_List_Table child
 */
class Table extends WP_List_Table
{  
    /*
     * Constructor function
     */
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
    
    function column_defalut( $item, $column_name )
    {
        switch( $column_name )
        {
            case '':
            case '':
                return $item[ $column_name ]
            default:
                return print_r( $item, true );
        }
    }
    
    function column_title()
    {
        $actions = array(
            'edit'  => sprintf( '<a href="?page=%s&action=%s&dish=%s">Edytuj</a>', $_REQUEST['page'], 'edit', $item['id'] ),
            'delete'  => sprintf( '<a href="?page=%s&action=%s&dish=%s">Edytuj</a>', $_REQUEST['delete'], 'edit', $item['id'] ),
        );
        
        return sprintf( 
            '%1$s <span style="color: silver">(id:%2$s)</span>%3$s',
            count($item['dishes']),
            $item['id'],
            $this->row_actions( $actions )
        );
    }
    
    
    function column_cb( $item )
    {
        return sprintf( 
            '<input type="checkbox" name="%1$s[]" value="%2$s" />',
            $this->_args['singular'],
            $item['id']
        );
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