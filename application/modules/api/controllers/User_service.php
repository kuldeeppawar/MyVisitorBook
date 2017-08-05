<?php

class User_service extends CI_Controller
{
    
    public function __construct()
    {
       parent::__construct();
		
		$this->load->database();
		$this->load->model('user_service_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('encryption');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('jwt-master/JWT');
		$this->load->library('encryption');
		$this->load->library('email');
	
    }
    
    
    
    

  	public function userLogin()
	{
			$jsondata=  file_get_contents("php://input");
        	$mydata=json_decode($jsondata,true);

        	$email=$mydata['email'];
        	$password=$mydata['password'];
        	
            if($email!="" && $password!="")
            {
            	
            	   $userData=$this->user_service_model->userLogin($email,$password);
            	
            	   $posts['status'] = true;
            	   $posts['msg'] = "User Details.";
            	   $posts['data']=$userData;
            	
            }	
        	else
        	{
        			$posts['status'] = false;
		            $posts['msg'] = "Please Enter Password And Email.";        
		            $posts['data']=array();
        	}

        	header('Content-type: application/json');
        	echo json_encode($posts);
	}


	
	
}
?>