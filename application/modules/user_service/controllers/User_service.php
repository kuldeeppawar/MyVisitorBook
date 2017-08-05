<?php

class User_service extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('user_service_model');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('user_agent');
		$this->load->library('email');
		$this->load->library('encryption');
	
	}

	//-----finction used To signup client-----//
	public function signUpClient()
	{
		$jsonarray=file_get_contents("php://input");
		$mydata=json_decode($jsonarray,true);
		if (isset($mydata['title']) && isset($mydata['fname']) && isset($mydata['mname']) && isset($mydata['lname']) && isset($mydata['mobile_number']) && 
			    isset($mydata['email_id']) && isset($mydata['password']) && isset($mydata['reseller_id']) &&
			      isset($mydata['countryid']) && isset($mydata['stateid']) && isset($mydata['cityid']) && isset($mydata['zipcode']) && isset($mydata['address']) &&
			         isset($mydata['website']) && isset($mydata['lno']) && isset($mydata['fax']) && isset($mydata['bname']) && isset($mydata['bcategory']) &&
			           isset($mydata['dob']) && isset($mydata['anidate']) && isset($mydata['odetails']) && isset($mydata['addInfo']) && isset($mydata['profile']) &&
			             isset($mydata['package_id']) && isset($mydata['payment_mode']) && isset($mydata['payment_type']) && isset($mydata['payment_value']) &&
			              isset($mydata['coupon_id']) && isset($mydata['coupon_value'])   
			                    )
		{
			
			if (strlen($mydata['title']) && strlen($mydata['fname']) && strlen($mydata['mname']) && strlen($mydata['lname']) && (strlen($mydata['mobile_number']) == 10)
				 && strlen($mydata['email_id']) && strlen($mydata['password']) && strlen($mydata['reseller_id']) && strlen($mydata['countryid']) && 
				 strlen($mydata['stateid']) && strlen($mydata['cityid']) && strlen($mydata['zipcode']) && strlen($mydata['address']) && strlen($mydata['website']) && 
				strlen($mydata['lno']) && strlen($mydata['fax']) && strlen($mydata['bname']) && strlen($mydata['bcategory']) && strlen($mydata['dob']) &&
				strlen($mydata['anidate']) && strlen($mydata['odetails']) && strlen($mydata['addInfo']) && strlen($mydata['profile']) && strlen($mydata['package_id']) &&
				strlen($mydata['payment_mode']) && strlen($mydata['payment_type']) && strlen($mydata['payment_value']) &&
				 strlen($mydata['coupon_id']) && strlen($mydata['coupon_value']))
			{
				
				//$res=$this->user_service_model->checkMobileNumber($mydata['mobile_number']);
				$res1=$this->user_service_model->checkEmail($mydata['email_id']);
				if ($res1)
				{
					$id=$this->user_service_model->addClient($mydata);
					if ($id)
					{
						
						$posts['status']=true;
						$posts['msg']="Client added Successfully";
						$posts['data']=array("order_id"=>$id);
					} else
					{
						$posts['status']=false;
						$posts['msg']="Data Insertion Failed";
						$posts['data']=array("order_id"=>"");
					}
				} else
				{
					$posts['status']=false;
					$posts['msg']="Email Allready Present";
					$posts['data']=array("order_id"=>"");
				}
			} else
			{
				$posts['status']=false;
				$posts['msg']="Please Enter valid Information";
				$posts['data']=array("order_id"=>"");
			}
		} else
		{
			$posts['status']=false;
			$posts['msg']="Client Add Failed";
			$posts['data']=array("order_id"=>"");
		}
		
		header('Content-type: application/json');
		echo json_encode($posts);
	
	}

}
