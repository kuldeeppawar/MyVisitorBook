<?php
class Subscription_service extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('subscription_service_model');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('user_agent');
		$this->load->library('email');
		$this->load->library('encryption');
	}

	//-----finction used To subscribe/unsubscribe newsletter-----//
	public function subscribe()
	{
		$jsonarray=file_get_contents("php://input");
		$mydata=json_decode($jsonarray,true);
		if (isset($mydata['email']) && isset($mydata['subscription_flag']))
		{
			    $res=$this->subscription_service_model->subscribe($mydata);
				if ($res=="1")
				{
						$posts['status']=true;
						$posts['msg']="Subscription Request Saved Successfully";
						
				}
				else if($res=="2")
				{
					$posts['status']=true;
					$posts['msg']="Subscription Request Allready Stored  ";
					
				}
				else if($res=="3")
				{
					$posts['status']=true;
					$posts['msg']="Unsubscription Request Saved Successfully  ";
						
				}
		} 
		else
		{
			$posts['status']=false;
			$posts['msg']="Please Enter valid Information";
			
		}
		
		header('Content-type: application/json');
		echo json_encode($posts);
	
	}


}
