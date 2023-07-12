<?php



/**

 * @author Spagetticode

 * @copyright 2018

 */



class Secure_Controller extends MY_Controller

{

      protected $the_user;

      public $data;

      

      public function __construct()

      {

        parent::__construct();

        $this->load->model('users_model');
        //$this->load->model('uploads_model');
        //

        // Require members to be logged in. If not logged in, redirect to the Ion Auth login page.

        //

        $this->session->set_userdata('redirect', current_url());

        


             //Put User in Class-wide variable

            $this->the_user = $this->ion_auth->user()->row();
            
            $this->load->model('ion_auth_model');
            

            //Store user in $data

            $data = new stdClass();

            $data->the_user = $this->the_user;

            

            //Load $the_user in all views

            $this->load->vars($data);

       
        

      }

}