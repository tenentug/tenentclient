<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Update backlog of more than one month 

class Scripts extends CI_Controller {

    
    
        public function __construct()
       {
            parent::__construct();
            $this->load->model('Scripts_model');    
       } 
    
        public function index()
        {
            //$this->load->view('welcome_message');
        }
    
        
          public function UpdateBacklog()
        {
            $backlog = array(); 
              
            $dipatches = $this->Scripts_model->getOlddispatches();
              
        //print_r($dipatches); exit;
              
            foreach($dipatches as $dispatch){
                
                $due = date("Y-m-d", time() - 259200);
                
                $currentdate = strtotime($due);
                
                $dateofloan = strtotime($dispatch->date);
                
                $dateofrepayment = strtotime($dispatch->dateofrepayment);
                
                $datediff = $dateofrepayment - $dateofloan;

                $dayspassed = round($datediff / (60 * 60 * 24));  
                
                $noofmonths = round($dayspassed/30);
                
                $forwarddays = ($noofmonths*30);

               
                if($dispatch->typeofdispatch == 1){
                    
                    
                    $interestadded = (0.2*$noofmonths)*$dispatch->amount;
                    
                    
                    $datemovedforward =  date('Y-m-d',strtotime('+'.$forwarddays.' days',strtotime($dispatch->dateofrepayment))) . PHP_EOL;
                    
                   // echo $dispatch->id.' | '.$dispatch->date.' | '.$interestadded.' | '.$noofmonths.' | '.$dispatch->interest.' | '.$datemovedforward.'<br>';
                    
                    $dispatch->{"interestadded"} = $interestadded;
                    
                    $dispatch->{"dateadded"} = $datemovedforward;  
                    
                    $this->upd342875538385($dispatch);
                    
                 
                }
                else if($dispatch->typeofdispatch == 5){
                    
                    $interestadded = ($dispatch->interestpercentage*$noofmonths)*$dispatch->amount;
                    
                    $datemovedforward =  date('Y-m-d',strtotime('+'.$forwarddays.' days',strtotime($dispatch->dateofrepayment))) . PHP_EOL;
                    
                    $dispatch->{"interestadded"} = $interestadded;
                    
                    $dispatch->{"dateadded"} = $datemovedforward;
                    
                    
                    $this->upd342875538385($dispatch);
                    
                    
                }
                
            }
              
   

        }
    
    
        public function ReconcileDispatches()
        {
              
            $dipatches = $this->Scripts_model->getReconcileDispatches();
            
            //print_r($dipatches); exit;
              
             
            foreach($dipatches as $dispatch){
               
                if($dispatch->typeofdispatch == 1){
                    
                    
                    $interestadded = 0.2*$dispatch->amount;
                    
                    
                    $datemovedforward =  date('Y-m-d',strtotime('+30 days',strtotime($dispatch->dateofrepayment))) . PHP_EOL;
                    
                    $dispatch->{"interestadded"} = $interestadded;
                    
                    $dispatch->{"dateadded"} = $datemovedforward;  
                    
                    $this->upd342875538385($dispatch);
                    
                 
                }
                else if($dispatch->typeofdispatch == 5){
                    
                    $interestadded = $dispatch->interestpercentage*$dispatch->amount;
                    
                    $datemovedforward =  date('Y-m-d',strtotime('+30 days',strtotime($dispatch->dateofrepayment))) . PHP_EOL;
                    
                    $dispatch->{"interestadded"} = $interestadded;
                    
                    $dispatch->{"dateadded"} = $datemovedforward;
                    
                    
                    $this->upd342875538385($dispatch);
                    
                    
                }
                
            }
              
            
               //print_r($dipatches); exit;  
              
              //$this->db->update_batch('po_order_details',$updateArray, 'poid');
              
            


        }
    
        
        private function upd342875538385($dispatch){
            
                $data = array(
                    'interest' => $dispatch->interest+$dispatch->interestadded,
                    'datemovedforward' => $dispatch->dateadded,
                    'updated' => '1'
                );
            
            

                $this->db->where('id', $dispatch->id);
                $this->db->update('dispatch', $data);
            
                /*
                if($this->Scripts_model->upddata($data)) // call the method from the model
                {
                    return 'success';
                }
                else
                {
                    return 'naah';
                }
                
                */

        }
    
    
        public function Dispatcher(){
            
            
            $dipatches = $this->Scripts_model->dispatchit();
            
            //print_r($dipatches); exit;
            
            foreach($dipatches as $dipatch){
                
                $dateofbalance = $dipatch->date;
                $openingbal = '';
                $DR = $dipatch->DR;
                $pid = $dipatch->id;
                $addedTS = date('Y-m-d H:i:s');
                
                $insertdispatch = array(
                    
                    'balance_date' => $dateofbalance,
                    'opening_balance' => $openingbal,
                    'dr' => $DR,
                    'pid' => $pid,
                    'addedTS' => $addedTS
                
                );
                
                $bulk[] = $insertdispatch;
                
                
              }
            
            //print_r($bulk); exit;
            
              $this->db->insert_batch('opening_balance', $bulk);
            

        }
    
    public function Collector(){
            
            
            $collections = $this->Scripts_model->collectit();
            
            foreach($collections as $collect){
                
                $dateofbalance = $collect->date;
                $openingbal = '';
                $CR = $collect->CR;
                $pid = $collect->id;
                $addedTS = date('Y-m-d H:i:s');
                
                $insertcollect = array(
                    
                    'balance_date' => $dateofbalance,
                    'opening_balance' => $openingbal,
                    'CR' => $CR,
                    'pid' => $pid,
                    'addedTS' => $addedTS
                
                );
                
                $bulk[] = $insertcollect;
                
                
              }
            
            
              $this->db->insert_batch('opening_balance', $bulk);
            

        }



}
