<?php

class Package_service extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('package_service_model');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('user_agent');
		$this->load->library('email');
		$this->load->library('encryption');
	
	}

	//-----function used To get all packages----//
	public function getallPackages()
	{
		$jsonarray=file_get_contents("php://input");
		$mydata=json_decode($jsonarray,true);
		
		$result=$this->package_service_model->getallPackages();
		if(count($result)>0)
		{
			$data=array();
			
			for($i=0;$i<count($result);$i++)
			{
		
				$emailSupport=$techSupport=$shceduleReport=$mobileApplication=$addressLabelling="Yes";
				if($result[$i]->pkgd_emailSupport==0)
				{
					$emailSupport="No";
				}
				if($result[$i]->pkgd_techlSupport==0)
				{
					$techSupport="No";
				}
				if($result[$i]->pkgd_scheduleReport==0)
				{
					$shceduleReport="No";
				}
				if($result[$i]->pkgd_mobileApp==0)
				{
					$mobileApplication="No";
				}
				if($result[$i]->pkgd_addressLebeling==0)
				{
					$addressLabelling="No";
				}
			
				$data[$i]=array("packageId"=>$result[$i]->pkg_id_pk,
						        "packageName"=>$result[$i]->pkg_name,	
						        "smsCredit"=>$result[$i]->pkg_smsCredit,  
						        "emailCredit"=>$result[$i]->pkg_emailCredit,
						        "packageValidity"=>$result[$i]->pkg_validity,
						        "smsTemplate"=>$result[$i]->pkgd_smsTemplate,
								"emailTemplate"=>$result[$i]->pkgd_emailTemplate,
								"smsBulk"=>$result[$i]->pkgd_smsBulk,
							    "emailBulk"=>$result[$i]->pkgd_emailBulk,
								"customFileds"=>$result[$i]->pkgd_customFields,
								"visitorRecord"=>$result[$i]->pkgd_visitorRecord,
								"documentSize"=>$result[$i]->pkgd_documentSize,
								"mobileRegister"=>$result[$i]->pkgd_moRegstr,
						        "userManagement"=>$result[$i]->pkgd_userMgt,
								"senderId"=>$result[$i]->pkgd_senderId,
						        "branch"=>$result[$i]->pkgd_branch,
								"emailSupport"=>$emailSupport,
						        "techSupport"=>$techSupport, 
						        "scheduleReport"=>$shceduleReport,
						 	    "mobileApplication"=>$mobileApplication,
						        "addressLabeling"=>$addressLabelling,
						        "packagePrice"=>$result[$i]->pkgd_price,
						        "packageDiscount"=>$result[$i]->pkgd_discount,
						        "taxes"=>$result[$i]->pkgds_tax,
						        "packageFinalprice"=>$result[$i]->pkgd_finalPrice);
		    }	
			 	
			$posts['status']=true;
			$posts['msg']="Available Packages";
			$posts['package']=$data;
			
		} else
		{
			$posts['status']=false;
			$posts['msg']="Package Not Available";
		}
			
		
		header('Content-type: application/json');
		echo json_encode($posts);
	
	}

	
	//-----function used To get All renewal  Packages-----//
	public function getallrenewalPackages()
	{
		$jsonarray=file_get_contents("php://input");
		$mydata=json_decode($jsonarray,true);
	
		$result=$this->package_service_model->getallrenewalPackages();
		
		print_r($result);
		
		if(count($result)>0)
		{
			$data=array();
				
			for($i=0;$i<count($result);$i++)
			{
	
				$data[$i]=array("renewalpackageId"=>$result[$i]->rpkg_id_pk,
								"renewalpackageType"=>$result[$i]->rpkg_packageType,
								"renewalpackageName"=>$result[$i]->rpkg_packageName,
								"smsCredit"=>$result[$i]->rpkg_smsCredit,
								"smsPrice"=>$result[$i]->rpkg_smsPrice,
								"emailCredit"=>$result[$i]->rpkg_emailCredit,
								"emailPrice"=>$result[$i]->rpkg_emailPrice,
								"renewalpackageValidity"=>$result[$i]->rpkg_validity,
								"renewalpackageTax"=>$result[$i]->rpkg_tax,
								"renewalpackageTotal"=>$result[$i]->rpkg_total,
								"renewalpackageDsicount"=>$result[$i]->rpkg_discount,
								"renewalpackagePrice"=>$result[$i]->rpkg_finalPrice);
			}
				
			$posts['status']=true;
			$posts['msg']="Available Renewal Packages";
			$posts['package']=$data;
				
		} else
		{
			$posts['status']=false;
			$posts['msg']="Package Not Available";
		}
			
	
		header('Content-type: application/json');
		echo json_encode($posts);
	
	}
	
	
	
	
	
}
