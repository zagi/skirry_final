<?php
 /*
  *
  *
  */

class Options
{
    protected $options;
    
    public function __construct()
    {
        
    }
    
    public function register_setting()
    {
        
        register_setting(
            'skirry_options_group',
            'skirry_otpions',
            array( 'Options', 'sanitize' );
        );
        
        add_setting_section(
            'skirry_main_options',
            'Główne opcje wtyczki Skirry',
            array( 'Options', 'render_info_section' ),
            'skirry-dashboard'
        );
        
        add_settings_field(
            //todo  
        );
        
        add_settings_field(
            //todo  
        );
    }
    
    public function sanitize()
    {
        
    }
    
    public function get_options()
    {
        return $this->options;   
    }
}