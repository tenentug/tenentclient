<?php

/**
 * @author Spagetticode
 * @copyright 2018
 */
 
 class MY_Controller extends CI_Controller
{
    protected $page;
    
    function __construct()
     {
        parent::__construct();
        $this->page = new stdClass();
        
        
        $this->load->library('user_agent');
        $browser = $this->agent->browser();
        $ver = $this->agent->version();
        $bv = explode('.',$ver);
        
        $this->page->degraded = FALSE;
        $this->page->degraded = TRUE;
        if($browser == 'Internet Explorer')
        {
            if($bv[0] < 10) $this->page->degraded = TRUE;
        }
        
        
     }
      
      public function is_post()
      {
        return $_SERVER['REQUEST_METHOD'] == 'POST' ? TRUE : FALSE;
      }
}

require(APPPATH.'core/Secure_Controller.php');