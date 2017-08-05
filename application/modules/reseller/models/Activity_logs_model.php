<?php



class Activity_logs_model extends CI_Model

{



	public function __construct()

	{

		parent::__construct();

	

	}





	public function setLoginLogs($type="",$login_act="")

	{

				$user_ip = $this->getUserIP();	



				$admin_user_id=$this->session->userdata('admin_id');



				$current_time=date('Y-m-d H:i:s');	



				$data=array('ll_admin_user_id_fk'=>$admin_user_id,'ll_type'=>$login_act,'ll_ip_address'=>$user_ip,'ll_activity_time'=>$current_time);

						

				$this->db->insert('tblmvbsaloginlogs',$data);

				$insert_id=$this->db->insert_id();			

	}





	public function setTransactionLogs($type,$login_act,$activity_details)

	{

				$admin_user_id=$this->session->userdata('admin_id');



				$current_time=date('Y-m-d H:i:s');	



				$data=array('tl_admin_user_id_fk'=>$admin_user_id,'tl_type'=>$login_act,'tl_activity_time'=>$current_time,'tl_activity_details'=>$activity_details);

						

				$this->db->insert('tblmvbtransactionlogs',$data);

				$insert_id=$this->db->insert_id();	

	}





	public function getUserIP()

	{

	    $client  = @$_SERVER['HTTP_CLIENT_IP'];

	    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];

	    $remote  = $_SERVER['REMOTE_ADDR'];



	    if(filter_var($client, FILTER_VALIDATE_IP))

	    {

	        $ip = $client;

	    }

	    elseif(filter_var($forward, FILTER_VALIDATE_IP))

	    {

	        $ip = $forward;

	    }

	    else

	    {

	        $ip = $remote;

	    }



	    return $ip;

	}



	

	

}

