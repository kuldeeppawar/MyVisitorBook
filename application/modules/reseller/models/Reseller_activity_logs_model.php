<?php
class Reseller_activity_logs_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function setLoginLogs($type="",$login_act="")
	{
		$user_ip=$this->getUserIP();
		$admin_user_id=$this->session->userdata('reseller_id');
		if ($admin_user_id == "")
		{
			$res=$this->db->query("SELECT rsl_admin_user_id_fk FROM tblmvbrsloginlogs WHERE rsl_activity_time = (SELECT max( rsl_activity_time )FROM tblmvbrsloginlogs )AND rsl_type = 'Login'");
			
			$result=$res->result();
			if (count($result) > 0)
			{
				$admin_user_id=$result[0]->rsl_admin_user_id;
			} else
			{
				$admin_user_id=0;
			}
		}
		$current_time=date('Y-m-d H:i:s');
		$data=array('rsl_admin_user_id_fk'=>$admin_user_id,
					'rsl_type'=>$login_act,
					'rsl_ip_address'=>$user_ip,
					'rsl_activity_time'=>$current_time);
		$this->db->insert('tblmvbrsloginlogs',$data);
		$insert_id=$this->db->insert_id();
	}

	public function setTransactionLogs($type,$login_act,$activity_details)
	{
		$admin_user_id=$this->session->userdata('reseller_id');
		if ($admin_user_id == "")
		{
			$res=$this->db->query("SELECT rsl_admin_user_id_fk FROM tblmvbrsloginlogs WHERE rsl_activity_time = (SELECT max( rsl_activity_time )FROM tblmvbrsloginlogs )AND rsl_type = 'Login'");
			
			$result=$res->result();
			if (count($result) > 0)
			{
				$admin_user_id=$result[0]->rsl_admin_user_id;
			} else
			{
				$admin_user_id=0;
			}
		}
		
		$current_time=date('Y-m-d H:i:s');
		
		$data=array(
					'rstl_admin_user_id_fk'=>$admin_user_id,
					'rstl_type'=>$login_act,
					'rstl_activity_time'=>$current_time,
					'rstl_activity_details'=>$activity_details);
		
		$this->db->insert('tblmvbrstransactionlogs',$data);
		
		$insert_id=$this->db->insert_id();
	}

	public function getUserIP()
	
	{
		$client=@$_SERVER['HTTP_CLIENT_IP'];
		
		$forward=@$_SERVER['HTTP_X_FORWARDED_FOR'];
		
		$remote=$_SERVER['REMOTE_ADDR'];
		
		if (filter_var($client,FILTER_VALIDATE_IP))
		
		{
			
			$ip=$client;
		} 

		elseif (filter_var($forward,FILTER_VALIDATE_IP))
		
		{
			
			$ip=$forward;
		} 

		else
		
		{
			
			$ip=$remote;
		}
		
		return $ip;
	}

}

