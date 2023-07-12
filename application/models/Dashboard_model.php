<?php

/**
 * @author spagetticode
 * @copyright 2020
 */

class Dashboard_model extends CI_Model {
    
  
    
       public function getUserTenancy($id)
    {
        
        $ret = array();
      
         
        $this->db->select('*');
        $this->db->where('active_tenants.tenantid',$id);
        $query = $this->db->get('active_tenants');
           

        foreach ($query->result() as $row)
        {
                $ret = $row;
        }
       
        return $ret; 
        
    }


    public function getTenantTransactions($id)
    {
        
        $ret = array();
      
        $this->db->select('*');
        $this->db->where('transaction_report.entryexitid',$id);
        $query = $this->db->get('transaction_report');
           

        foreach ($query->result() as $row)
        {
                $ret[] = $row;
        }
       
        return $ret; 
        
    }


  
}
