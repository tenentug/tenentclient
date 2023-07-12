<?php

/**
 * @author spagetticode
 * @copyright 2020
 */

class Scripts_model extends CI_Model {
    
  
    
       public function getOlddispatches()
    {
        
        $ret = array();
        
        $currentdate = date("Y-m-d", time() - 259200);
           
         
        $this->db->select('*');
        $this->db->where('dispatch.updated','0'); 
        $this->db->where('dispatch.dateofrepayment < ', $currentdate);
        $this->db->where('dispatch.amount >','0');
       /* $this->db->where('dispatch.typeofdispatch', '1');
        $this->db->or_where('dispatch.typeofdispatch','5'); */
        $query = $this->db->get('dispatch');
           
        //echo $this->db->last_query(); exit;

        foreach ($query->result() as $row)
        {
                $ret[] = $row;
        }
       
        return $ret; 
        
    }
    
     public function getReconcileDispatches()
    {
        
        $ret = array();
        
        $currentdate = date("Y-m-d", time() - 259200);
         
        $this->db->select('*');
        $this->db->where('dispatch.dateofrepayment = ', $currentdate);
        $this->db->where('dispatch.amount >','0');
        /*
        $this->db->where('dispatch.typeofdispatch', '1');
        $this->db->or_where('dispatch.typeofdispatch','5'); */
         
        $query = $this->db->get('dispatch');
         
        //echo $this->db->last_query(); exit;

        foreach ($query->result() as $row)
        {
                $ret[] = $row;
        }
       
        return $ret; 
        
    }
    
        public function Dispatchit()
    {
        
        $ret = array();
        
        $currentdate = date("Y-m-d", time() - 259200);
           
        $this->db->distinct(); 
        $this->db->select('*');
       // $this->db->where('dispatch.id > 34');
        
        $query = $this->db->get('dispatch');
           
        //echo $this->db->last_query(); exit;

        foreach ($query->result() as $row)
        {
                $ret[] = $row;
        }
       
        return $ret; 
        
    }
    
        public function Collectit()
    {
        
        $ret = array();
        
        $currentdate = date("Y-m-d", time() - 259200);
           
        $this->db->distinct(); 
        $this->db->select('*');
        //$this->db->where('collections.id > 17');
        
        $query = $this->db->get('collections');
           
        //echo $this->db->last_query(); exit;

        foreach ($query->result() as $row)
        {
                $ret[] = $row;
        }
       
        return $ret; 
        
    }
    
 /*   
    public function upddata($data) {
        
        $this->db->where('id', $data->id);
        
        $this->db->update('dispatch', $data);
    
        return true;
}
 */   
 
  
}
