<?php
class User_service_Model extends CI_Model
{
    public function __construct()
    {
            parent::__construct();
    }
    

    public function userLogin($email,$password)
    {
        $data=array();
		
		$result=$this->db->query("SELECT sysu_id_pk,sysu_name,sysu_clientId_fk,sysu_parentClient,sysu_email,sysu_mobile,sysu_password,sysu_userTypeId_fk,sysu_branchId_fk FROM `tblmvbsystemusers` WHERE sysu_status='1'");
		$result=$result->result();
		
		for($i=0;$i < count($result);$i ++)
		{
			
			$userEmail=$this->encryption->decrypt($result [$i]->sysu_email);
			
			$userMobile=$this->encryption->decrypt($result [$i]->sysu_mobile);
			
			$userPassword=$this->encryption->decrypt($result [$i]->sysu_password);
			
			if ($email == $userEmail && $password == $userPassword)
			{
				
			 	 $branch=0;
			 	 $branchName="";
				 
			 	 $branchDetails=array();
				if($result [$i]->sysu_branchId_fk!=0)
				{
					$branch=$result [$i]->sysu_branchId_fk;
				    $bd=$this->getBranch($result[$i]->sysu_branchId_fk);
				    if(count($bd)>0)
				    {	
				     $branchName=$bd[0]->brn_name;
				    }
				}
				else
				{
					
					$details=$this->getAllBranch( $result[$i]->sysu_clientId_fk);
					
					for($x=0;$x<count($details);$x++)
					{
						$branchDetails[$x]=array('branchId'=>$details[$x]->brn_id_pk,
								                 'branchName'=>$details[$x]->brn_name);
					}	
				}
				
				
				$data=array('adminId'=>$result [$i]->sysu_id_pk,
						    'adminName'=>$result [$i]->sysu_name,
						    'adminEmail'=>$email,
						    'adminMobile'=>$userMobile,
						    'parentClient'=>$result [$i]->sysu_parentClient,
						    'branchId'=>$branch,
						    'branchName'=>$branchName,
				            'clientId'=> $result[$i]->sysu_clientId_fk,
				            'adminusertypeId'=>$result[$i]->sysu_userTypeId_fk,
						    'branchDetails'=>$branchDetails 
				); 
				$this->db->query("UPDATE `tblmvbsystemusers` SET `sysu_isLogin` = '1' WHERE sysu_id_pk = '".$result [$i]->sysu_id_pk ."'");
			
		
				
				$this->setLoginLogs($result [$i]->sysu_id_pk, "User Login From Mobile App");
				
				
				
			}
		}


		return $data;
        
    }

    
    // --Function used get all Branch---//
    public function getAllBranch($clientId)
    {
    	
    	$result=$this->db->query("SELECT tblmvbbranches.brn_id_pk,tblmvbbranches.brn_name,tblmvbbranches.brn_cityId_fk,tblmvbbranches.brn_address, tblmvbbranches.brn_smsCredit,
				                  tblmvbbranches.brn_emailCredit,tblmvbbranches.brn_validity,tblmvbbranches.brn_status, tblmvbcity.cty_name ,
				                  (SELECT COUNT(tblmvbsystemusers.sysu_id_pk) FROM tblmvbsystemusers WHERE tblmvbsystemusers.sysu_branchId_fk=tblmvbbranches.brn_id_pk)
				                  as userCount, (SELECT COUNT(tblmvbvisitors.vis_id_pk) FROM tblmvbvisitors WHERE tblmvbvisitors.vis_branchId_fk=tblmvbbranches.brn_id_pk)
				                  as visiterCount FROM tblmvbbranches LEFT JOIN tblmvbcity on tblmvbbranches.brn_cityId_fk=tblmvbcity.cty_id_pk LEFT JOIN tblmvbsystemusers
				                  ON tblmvbsystemusers.sysu_branchId_fk=tblmvbbranches.brn_id_pk LEFT JOIN tblmvbvisitors on tblmvbvisitors.vis_branchId_fk=tblmvbbranches.brn_id_pk
				                  WHERE tblmvbbranches.brn_clientId_fk ='" . $clientId . "' group by tblmvbbranches.brn_id_pk ");
    
    	return $result->result();
    
    }
    
    public function getBranch($branchId)
    {
    	$result=$this->db->query("SELECT brn_id_pk,brn_name,brn_cityId_fk,brn_address FROM tblmvbbranches WHERE brn_id_pk='".$branchId."' ");
    	
    	return $result->result();
    }
    
    
    
    
    
    
    //logs functions
	public function setLoginLogs($admin_user_id,$login_act)
	{	
		$user_ip=$this->getUserIP();
		$current_time=date('Y-m-d H:i:s');
		
		$data=array('al_admin_user_id_fk'=>$admin_user_id,
					'al_type'=>$login_act,
					'al_ip_address'=>$user_ip,
					'al_activity_time'=>$current_time);
		
		$this->db->insert('tblmvbaloginlogs',$data);
		$insert_id=$this->db->insert_id();
	
	}


	public function setTransactionLogs($admin_user_id,$login_act,$activity_details)
	{

		$current_time=date('Y-m-d H:i:s');
		$user_ip=$this->getUserIP();
		
		$data=array('atl_admin_user_id_fk'=>$admin_user_id,
					'atl_type'=>$login_act,
					'atl_activity_time'=>$current_time,
					'atl_activity_details'=>$activity_details,
					'atl_ip_address'=>$user_ip);
		
		$this->db->insert('tblmvbatransactionlogs',$data);
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
?>
