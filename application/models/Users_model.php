<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Users_model extends MY_Model
{
    public function __construct()
	{
	   parent::__construct();
    }
    
    public function getLastUpl($uid)
    {
        $ret = '-';
        $this->db->where('user_id',$uid);
        $this->db->order_by('upl_datetime','desc');
        $this->db->limit(1);
        $query = $this->db->get('ref_numbers');
        if ($query->num_rows() > 0)
        {
            $row = $query->row();
            $ret = $row->upl_datetime;
        }
        return $ret;
    }
    
    public function getLastRef($uid)
    {
        $ret = '-';
        $this->db->where('user_id',$uid);
        $this->db->order_by('upl_datetime','desc');
        $this->db->limit(1);
        $query = $this->db->get('ref_numbers');
        if ($query->num_rows() > 0)
        {
            $row = $query->row();
            $ret = $row->reference;
        }
        return $ret;
    }
    
    public function getLastIP($uid)
    {
        $ret = '-';
        $this->db->where('id',$uid);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0)
        {
            $row = $query->row();
            //do not use $ret = long2ip(hexdec($row->ip_address));
            //blanked out because of error if(!empty($row->ip_address)) $ret = inet_ntop($row->ip_address);
            $ret='';
        }
        return $ret;
    }
    
    public function getLastLogin($uid)
    {
        $ret = '-';
        $this->db->where('id',$uid);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0)
        {
            $row = $query->row();
            $ret = unix_to_human($row->last_login,true,'eu');
        }
        return $ret;
    }
    
    public function countUploads($uid)
    {
        $this->db->where('user_id',$uid);
        $this->db->from('ref_numbers');
        return $this->db->count_all_results();
    }
    
    public function getEmployers($user_id)
    {
        $this->db->select('GROUP_CONCAT(employers.company_name) as employers');
        $this->db->join('employers', 'employers.nssf_number = users_employers.nssf_number','left');
        $query = $this->db->get_where('users_employers', array('user_id' => $user_id));
        if($query->num_rows() > 0)
        {
            return $query->row()->employers;
        }
        return false;
    }
    
    public function sendFeedback($resp)
    {
        $data['user_id'] = $resp['uid'];
        $data['posted_on'] = date('Y-m-d H:i:s');
        $data['comment'] = $resp['comment'];
        $ret = $this->db->insert('feedback', $data); 
        
        
        
        return $ret;
    }
	
	
	
}
