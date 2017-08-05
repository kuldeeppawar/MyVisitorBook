<?php
class Group_service_Model extends CI_Model
{
    public function __construct()
    {
            parent::__construct();
    }
    
    public function getGroupDetails($branchId,$groupName)
    {
    	$result=$this->db->query("SELECT `grp_id_pk`, `grp_branchId_fk`, `grp_visitorIds_fk`, `grp_name`, `grp_description`, `grp_createdDate`, `grp_createdBy`,
    		                     `grp_modifiedDate`, `grp_modifiedBy`, `grp_status` FROM `tblmvbgroups` WHERE grp_branchId_fk='".$branchId."'
    		                      AND grp_name='".$groupName."'");
    	return $result->result();
    	
    }
    
    
	public function createGroup($branchId,$groupName,$adminId)
	{
		
		ini_set('auto_detect_line_endings',true);
		
		$date=date('Y-m-d h:i:s');
		
			$data=array('grp_branchId_fk'=>$branchId,
						'grp_name'=>$groupName,
						'grp_description'=>"",
						'grp_createdDate'=>$date,
						'grp_createdBy'=>$adminId,
						'grp_modifiedDate'=>$date,
						'grp_modifiedBy'=>$adminId,
				 		'grp_status'=>1
				        );
			$this->db->insert('tblmvbgroups',$data);
			$insert_id=$this->db->insert_id();
		
	
	    $this->setTransactionLogs($adminId,"SAGroupCreate_mobile", "Group Has Been Created".$insert_id);		
			
	    return $insert_id;
	}
	
	// --- Function used to Edit group---//
	public function editGroup($branchId,$groupName,$adminId,$groupId)
	{
	
		$date=date('Y-m-d h:i:s');
	
			$data=array('grp_name'=>$groupName,
						'grp_description'=>"",
						'grp_modifiedDate'=>$date,
						'grp_modifiedBy'=>$adminId);
		    $this->db->where('grp_id_pk',$groupId);
			$this->db->update('tblmvbgroups',$data);
		
		$idlist=explode(",",$data);
		$this->setTransactionLogs($adminId,'AAGroupu_editmobile',"Edited  Group :- ".$groupId."Data:".$idlist );
		return $groupId;
		

	
	}


	public function getGrouplist($branchId)
	{
		$result=$this->db->query("SELECT `grp_id_pk`, `grp_branchId_fk`, `grp_visitorIds_fk`, `grp_name`, `grp_description`, `grp_createdDate`, `grp_createdBy`,
    		                     `grp_modifiedDate`, `grp_modifiedBy`, `grp_status` FROM `tblmvbgroups` WHERE grp_branchId_fk='".$branchId."'AND grp_status='1' ");
		return $result->result();
		 
	}
	
	
	public function getGroupvisitor($id)
	{
		$result=$this->db->query("SELECT tblmvbvisitors.vis_id_pk,tblmvbvisitors.vis_firstName, tblmvbgroupvisitors.gv_grpId_fk,tblmvbvisitors.vis_lastName,tblmvbvisitors.vis_email, tblmvbvisitors.vis_mobile
				                  ,tblmvbvisitors.vis_profile FROM tblmvbvisitors LEFT JOIN tblmvbgroupvisitors on tblmvbvisitors.vis_id_pk=tblmvbgroupvisitors.gv_visitorId_fk WHERE
				                  tblmvbgroupvisitors.gv_grpId_fk='".$id."'");
		return  $result->result();
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
