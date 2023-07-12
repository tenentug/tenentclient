<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Dashboard extends Secure_Controller {

    
    
        public function __construct()
       {
            parent::__construct();
            $this->load->model('Dashboard_model');    
       } 
    
        public function index()
        {
        
            if (!$this->ion_auth->logged_in())
		{
            $this->session->set_userdata('referred_from', current_url());
			// redirect them to the login page
			redirect('/auth/login', 'refresh');
		} 

            $this->data['type'] = 'dashboard';

            $this->data['user'] = $this->the_user;
            
            $this->data['tenancy'] = $this->Dashboard_model->getUserTenancy($this->the_user->id);

            $this->data['transactions'] = $this->Dashboard_model->getTenantTransactions($this->data['tenancy']->id);

            $this->data['tenancy']->balance = '-500000';
            if($this->data['tenancy']->balance > 0){
               $this->data['color'] = 'success';
               $this->data['text'] = 'Balance Owed to You';
            }else{
             $this->data['color'] = 'danger'; 
             $this->data['text'] = 'Balance Owed';
            }

            $this->load->view('layout',$this->data);
        }
    


}
