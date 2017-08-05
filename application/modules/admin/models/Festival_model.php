<?php

class Festival_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}
	
	// --Function used get all festival list---//
	public function getAllFestival()
	{
		
	 //	$adminId=$this->session->userdata('admin_admin_id');
	 //	$clientId=$this->session->userdata('client_id');
	 //	$parentClient=$this->session->userdata('parent_client');
		$branchId=$this->session->userdata('branch_id');
		
		$location=$this->getClientlocation($branchId);
        $state=0;
		
		if(count($location)>0)
		{
			$state=$location[0]->brn_stateId_fk;
		}	
		
		
		$result=$this->db->query("SELECT tblmvbfestival.fest_id_pk,tblmvbbranches.brn_id_pk,tblmvbbranches.brn_name,tblmvbbranches.brn_clientId_fk,
                                  tblmvbfestivallocation.festl_id_pk,tblmvbbranchfestival.brnfs_id_pk,tblmvbfestival.fest_name,tblmvbfestival.fest_date,
				                  tblmvbfestival.fest_createdDate,tblmvbfestival.fest_category,tblmvbfestivallocation.festl_status,tblmvbstate.stat_id_pk,
				                  tblmvbstate.stat_name from tblmvbfestival tblmvbfestival LEFT JOIN tblmvbfestivallocation tblmvbfestivallocation on 
				                  (tblmvbfestivallocation.festl_festId_fk=tblmvbfestival.fest_id_pk)LEFT JOIN tblmvbstate on
				                  (tblmvbstate.stat_id_pk=tblmvbfestivallocation.festl_stateId_fk) LEFT JOIN  tblmvbbranches on
				                  (tblmvbbranches.brn_stateId_fk=tblmvbstate.stat_id_pk )LEFT JOIN tblmvbbranchfestival on 
				                  (tblmvbbranchfestival.brnfs_festId_fk=tblmvbfestival.fest_id_pk and tblmvbbranchfestival.brns_brnId_fk=tblmvbbranches.brn_id_pk)                                  
                                  WHERE find_in_set(tblmvbfestivallocation.festl_stateId_fk,'".$state."') and
				                  tblmvbfestival.fest_status='1' AND tblmvbbranches.brn_id_pk='".$branchId."' ORDER BY tblmvbfestival.fest_date DESC");
		
		return $result->result();
	
	}
	
	//---Function used to get Client locations---//
	public  function getClientlocation($branchId)
	{
	   
	   	 $sql="SELECT brn_id_pk,brn_clientId_fk,brn_name,brn_stateId_fk FROM tblmvbbranches WHERE brn_id_pk='".$branchId."'";
	  
	     $resultLoction=$this->db->query($sql);
	    
	     $resultLoction=$resultLoction->result();
	    
		return $resultLoction;
	}
	
	
	
	// -- function get Active cities --//
	public function getActivecity()
	{
		$result=$this->db->query("select cty_id_pk,cty_name,cty_status from tblmvbcity Where cty_status='1'");
		return $result->result();
	
	}
	
	// -- function get All Cities --//
	public function getAllcity()
	{
		$result=$this->db->query("select cty_id_pk,cty_name,cty_status from tblmvbcity");
		return $result->result();
	
	}
	
	// --- Function used to add Festival---//
	public function getConfirmfestival($festival)
	{
		$idlist="";
		$admin_id=$this->session->userdata('admin_admin_id');
		$date=date('Y-m-d h:i:s');
		$branchId=$this->session->userdata('branch_id');
		$parentClient=$this->session->userdata('parent_client');
		$clientId=$this->session->userdata('client_id');
	
		$location=$this->getClientlocation($clientId, $parentClient, $adminId,$branchId);
		$brnList=0;
		
		if(count($location)>0)
		{
			$brnList=$location[0]->brn_id_pk;
		}
		
		
		if(count($festival)>0)
		{	
			$this->db->query("DELETE FROM tblmvbbranchfestival WHERE find_in_set(brns_brnId_fk,'".$brnList."') ");
			
			
			
			
			for($i=0;$i < count($festival);$i ++)
			{
				  $info=explode('-',$festival[$i]);
				
				
				$data=array('brnfs_festId_fk'=>$info[0],
						    'brns_brnId_fk'=>$info[1],
						    'brns_createdBy'=>$admin_id,
						    'brns_createdDate'=>$date,
						    'brns_status'=>'1');
			
				$this->db->insert('tblmvbbranchfestival',$data);
				$otherdata=$otherdata.implode(",",$data);
				
				setAActivityLogs('Transaction_activity','AAddFstvl_Mgmt',"Added Data :- ".$idlist."  field Values:-".$otherdata);
			}
			$insert_id=$this->db->insert_id();
			return $insert_id;
		}
		else 
		{
			return  false;
		}	
	}
	
	

}
