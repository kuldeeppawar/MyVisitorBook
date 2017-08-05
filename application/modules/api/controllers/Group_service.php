<?php

class Group_service extends CI_Controller
{
    
    public function __construct()
    {
       parent::__construct();
		
		$this->load->database();
		$this->load->model('group_service_model');
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
    
    public function editGroup()
	{
			$jsondata=  file_get_contents("php://input");
        	$mydata=json_decode($jsondata,true);

        	if($mydata['groupName']!="" && $mydata['adminId']!="" && $mydata['branchId']!="" && $mydata['groupId']!="")
            {
            	
             	   $grpCheck=$this->group_service_model->getGroupDetails($mydata['branchId'],$mydata['groupName']);
            	 
             	   if(count($grpCheck)==0)
             	   {	
	            	   $id=$this->group_service_model->editGroup($mydata['branchId'],$mydata['groupName'],$mydata['adminId'],$mydata['groupId']);
	            	
	            	   if($id)
	            	   {
		            	   	$posts['status'] = true;
		            	   	$posts['msg'] = "Group Has Been Edited Successfully.";
		            	   	$posts['data']=array();
		               }
	            	   else 
	            	   {
		            	   	$posts['status'] = true;
		            	   	$posts['msg'] = "Something Went Wrong.";
		            	   	$posts['data']=array();
	            	   }
             	   }
             	   else 
             	   {   
             	   	    if($grpCheck[0]->grp_id_pk==$mydata['groupId'])
             	   	    {
             	   	    	$id=$this->group_service_model->editGroup($mydata['branchId'],$mydata['groupName'],$mydata['adminId'],$mydata['groupId']);
             	   	    	
             	   	    	if($id)
             	   	    	{
             	   	    		$posts['status'] = true;
             	   	    		$posts['msg'] = "Group Has Been Edited Successfully.";
             	   	    		$posts['data']=array();
             	   	    	}
             	   	    	else
             	   	    	{
             	   	    		$posts['status'] = true;
             	   	    		$posts['msg'] = "Something Went Wrong.";
             	   	    		$posts['data']=array();
             	   	    	}
             	   	    }	
             	   	    else 
             	   	    {	
	             	   		$posts['status'] = true;
	             	   		$posts['msg'] = "Group Name Allready Exists .";
	             	   		$posts['data']=array();
             	   	    }	
             	   }	
            
            	
            }	
        	else
        	{
        			$posts['status'] = false;
		            $posts['msg'] = "Please Enter All Details Proper.";        
		            $posts['data']=array();
        	}

        	header('Content-type: application/json');
        	echo json_encode($posts);
	}

	
	public function createGroup()
	{
		$jsondata=  file_get_contents("php://input");
		$mydata=json_decode($jsondata,true);
	
		if($mydata['groupName']!="" && $mydata['adminId']!="" && $mydata['branchId']!="")
		{
			 
			$grpCheck=$this->group_service_model->getGroupDetails($mydata['branchId'],$mydata['groupName']);
	
			if(count($grpCheck)==0)
			{
				$id=$this->group_service_model->createGroup($mydata['branchId'],$mydata['groupName'],$mydata['adminId']);
	
				if($id)
				{
					$posts['status'] = true;
					$posts['msg'] = "Group Has Been Added Successfully.";
					$posts['data']=array();
				}
				else
				{
					$posts['status'] = true;
					$posts['msg'] = "Something Went Wrong.";
					$posts['data']=array();
				}
			}
			else
			{
				$posts['status'] = true;
				$posts['msg'] = "Group Name Allready Exists .";
				$posts['data']=array();
			}
	
			 
		}
		else
		{
			$posts['status'] = false;
			$posts['msg'] = "Please Enter All Details Proper.";
			$posts['data']=array();
		}
	
		header('Content-type: application/json');
		echo json_encode($posts);
	}

	
	public function getGrouplist()
	{
		$jsondata=  file_get_contents("php://input");
		$mydata=json_decode($jsondata,true);
	
		if($mydata['adminId']!="" && $mydata['branchId']!="")
		{
			 	$result=$this->group_service_model->getGrouplist($mydata['branchId']);
			 	
			 	if(count($result)>0)
			 	{
			 		$data=array();
			 		
			 		for($i=0;$i<count($result);$i++)
			 		{
			 			 
			 			$resultGroup=$this->group_service_model->getGroupvisitor($result[$i]->grp_id_pk);
			 			
			 			$data[$i]=array("groupId"=>$result[$i]->grp_id_pk,
			 					        "groupName"=>$result[$i]->grp_name,
			 					        "groupCreated"=>$result[$i]->grp_createdDate,
			 					        "groupVisitors"=>count($resultGroup) 
			 					      );
			 		}	
			 		
			 		$posts['status'] = true;
			 		$posts['msg'] = "Group Details.";
			 		$posts['data']=$data;
			 	}	
			 	else 
			 	{
			 		$posts['status'] = false;
			 		$posts['msg'] = "No group Found.";
			 		$posts['data']=array();
			 	}	
	
			 
		}
		else
		{
			$posts['status'] = false;
			$posts['msg'] = "Please Enter All Details Proper.";
			$posts['data']=array();
		}
	
		header('Content-type: application/json');
		echo json_encode($posts);
	}
	
	
	public function getGroupvisitor()
	{
		$jsondata=  file_get_contents("php://input");
		$mydata=json_decode($jsondata,true);
	
		if($mydata['adminId']!="" && $mydata['groupId']!="")
		{
			$result=$this->group_service_model->getGroupvisitor($mydata['groupId']);
				
			if(count($result)>0)
			{
				$data=array();
	
				for($i=0;$i<count($result);$i++)
				{
	
				
					 
					$data[$i]=array("visitorId"=>$result[$i]->vis_id_pk,
								    "visitorName"=>$result[$i]->vis_firstName." ".$result[$i]->vis_lastName,
								    "visitorEmail"=>$result[$i]->vis_email,
								    "visitorMobile"=>$result[$i]->vis_mobile);
				}
	
				$posts['status'] = true;
				$posts['msg'] = "Visitors Details.";
				$posts['data']=$data;
			}
			else
			{
				$posts['status'] = false;
				$posts['msg'] = "No Visitors Found.";
				$posts['data']=array();
			}
	
	
		}
		else
		{
			$posts['status'] = false;
			$posts['msg'] = "Please Enter All Details Proper.";
			$posts['data']=array();
		}
	
		header('Content-type: application/json');
		echo json_encode($posts);
	}
	
	
}
?>