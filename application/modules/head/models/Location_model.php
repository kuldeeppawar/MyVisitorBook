<?php

class Location_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}
	
	// -- function get all record--//
	public function getAllCountry()
	{
		$result=$this->db->query("SELECT tblmvbcountry.cntr_id_pk,tblmvbcountry.cntr_name,tblmvbcountry.cntr_createdDate,tblmvbcountry.cntr_modifiedDate,
	     		                   tblmvbcountry.cntr_status,(select tblmvbsysmainusers.sysmu_username from tblmvbsysmainusers where tblmvbcountry.cntr_createdBy
	                               =tblmvbsysmainusers.sysmu_id_pk) as created_by, (select tblmvbsysmainusers.sysmu_username from tblmvbsysmainusers where 
	                               tblmvbcountry.cntr_modifiedBy=tblmvbsysmainusers.sysmu_id_pk) as modified_by FROM `tblmvbcountry` tblmvbcountry where tblmvbcountry.cntr_delete='0' order by tblmvbcountry.cntr_id_pk DESC");
		
		return $result->result();
	
	}
	
	
	//----Get Specific Country---//
	public function getSpecificCountry($id)
	{
		$result=$this->db->query("SELECT `cntr_id_pk`, `cntr_name`, `cntr_createdDate`, `cntr_createdBy`, 
				                 `cntr_modifiedDate`, `cntr_modifiedBy`, `cntr_status` FROM `tblmvbcountry` WHERE cntr_id_pk='".$id."'"); 
		return $result->result();
		
	}

	//----Get Specific State---//
	public function getSpecificState($id)
	{
		$result=$this->db->query("SELECT `stat_id_pk`, `stat_countryId_fk`, `stat_name`, `stat_createdDate`, `stat_createdBy`, `stat_modifiedDate`, `stat_modifiedBy`,
				                 `stat_status` FROM `tblmvbstate` WHERE stat_id_pk='".$id."'");
		return $result->result();
	
	}
	
	//----Get Specific City---//
	public function getSpecificCity($id)
	{
	
		$result=$this->db->query("SELECT `cty_id_pk`, `cty_countryId_fk`, `cty_stateId_fk`, `cty_name`, `cty_createdDate`, `cty_createdBy`, `cty_modifiedDate`,
				                 `cty_modifiedBy`, `cty_status` FROM `tblmvbcity` WHERE cty_id_pk='".$id."'");
		return $result->result();
		
	}
	
	// --- Function used to add country---//
	public function addCountry()
	{
		$name=$this->input->post('country');
		$admin_id=$this->session->userdata('admin_id');
		$date=date('Y-m-d h:i:s');
		
		$data=array('cntr_name'=>$name,'cntr_createdDate'=>$date,'cntr_createdBy'=>$admin_id,'cntr_modifiedDate'=>$date,'cntr_modifiedBy'=>$admin_id,'cntr_status'=>'1');
		
		$this->db->insert('tblmvbcountry',$data);
		$insert_id=$this->db->insert_id();
		
		setSAActivityLogs('Transaction_activity','SALocationcountry_add');
		return $insert_id;
	
	}
	
	// --- Function used to add country---//
	public function editCountry()
	{
		$name=$this->input->post('txtEditcountry');
		$id=$this->input->post('txtEditcountryid');
		$admin_id=$this->session->userdata('admin_id');
		$date=date('Y-m-d h:i:s');
		
		$details=$this->getSpecificCountry($id);
		
		$updatedData="";
		
		if($name!=$details[0]->cntr_name)
		{
			$updatedData="Old Name:-".$details[0]->cntr_name." Updated Name:-".$name;
		}
		
		
	
		
		$data=array('cntr_name'=>$name,'cntr_modifiedDate'=>$date,'cntr_modifiedBy'=>$admin_id);
		
		$this->db->where('cntr_id_pk',$id);
		$this->db->update('tblmvbcountry',$data);
		
		
		setSAActivityLogs('Transaction_activity','SALocationcountry_Edit',$updatedData);
		
		return true;
	
	}
	
	
	// --- Function used to change status of country---//
	public function changecountryStatus($status,$country)
	{
		
		$admin_id=$this->session->userdata('admin_id');
		$date=date('Y-m-d h:i:s');
		for($i=0;$i < count($country);$i ++)
		{
            
            	$data=array('cntr_status'=>$status,'cntr_modifiedDate'=>$date,'cntr_modifiedBy'=>$admin_id);
				$this->db->where('cntr_id_pk',$country [$i]);
				$this->db->update('tblmvbcountry',$data);
            
		}
		
		return true;
	
	}
	
	// -- function get all Stae listt--//
	public function getallState($id)
	{
		$result=$this->db->query("SELECT tblmvbstate.stat_id_pk,tblmvbstate.stat_name,tblmvbstate.stat_countryId_fk,tblmvbstate.stat_createdDate,
	    		                  tblmvbstate.stat_modifiedDate,tblmvbstate.stat_status,tblmvbcountry.cntr_name,(select tblmvbsysmainusers.sysmu_username 
	    		                  from tblmvbsysmainusers where tblmvbstate.stat_createdBy =tblmvbsysmainusers.sysmu_id_pk) as created_by,
	    		                  (select tblmvbsysmainusers.sysmu_username from tblmvbsysmainusers where tblmvbstate.stat_modifiedBy=tblmvbsysmainusers.sysmu_id_pk)
	    		                  as modified_by FROM `tblmvbstate` tblmvbstate LEFT JOIN tblmvbcountry tblmvbcountry on 
	    		                  (tblmvbcountry.cntr_id_pk=tblmvbstate.stat_countryId_fk) where tblmvbcountry.cntr_id_pk='".$id."' and tblmvbstate.stat_delete='0' order by tblmvbstate.stat_id_pk DESC");
		
		return $result->result();
	
	}
	
	// --- Function used to add State---//
	public function addState()
	{
		$name=$this->input->post('txtState');
		$id=$this->input->post('txtCountry');
		$admin_id=$this->session->userdata('admin_id');
		$date=date('Y-m-d h:i:s');
		$data=array('stat_name'=>$name,'stat_countryId_fk'=>$id,'stat_createdDate'=>$date,'stat_createdBy'=>$admin_id,'stat_modifiedDate'=>$date,'stat_modifiedBy'=>$admin_id,'stat_status'=>'1');
		
		$this->db->insert('tblmvbstate',$data);
		$insert_id=$this->db->insert_id();
		setSAActivityLogs('Transaction_activity','SALocationstate_add');
		return $insert_id;
	
	}
	
	// --- Function used to Edit State---//
	public function editState()
	{
		$name=$this->input->post('txtEditstate');
		$id=$this->input->post('txtEditstateid');
		$admin_id=$this->session->userdata('admin_id');
		$date=date('Y-m-d h:i:s');
		$details=$this->getSpecificState($id);
		
		$updatedData="";
		
		if($name!=$details[0]->stat_name)
		{
			$updatedData="Old Name:-".$details[0]->stat_name." Updated Name:-".$name;
		}
		
		
		$data=array('stat_name'=>$name,'stat_modifiedDate'=>$date,'stat_modifiedBy'=>$admin_id);
		
		$this->db->where('stat_id_pk',$id);
		$this->db->update('tblmvbstate',$data);
		setSAActivityLogs('Transaction_activity','SALocationstate_Edit',$updatedData);
		return true;
	
	}
	
	// --- Function used to change status of State---//
	public function changestateStatus($status,$state)
	{
		$admin_id=$this->session->userdata('admin_id');
		$date=date('Y-m-d h:i:s');
		for($i=0;$i < count($state);$i ++)
		{
			$data=array('stat_status'=>$status,'stat_modifiedDate'=>$date,'stat_modifiedBy'=>$admin_id);
			$this->db->where('stat_id_pk',$state [$i]);
			$this->db->update('tblmvbstate',$data);
		}
		
		return true;
	
	}
	
	// -- function get all City listt--//
	public function getallCity($id)
	{
		$result=$this->db->query("SELECT tblmvbcity.cty_id_pk,tblmvbcity.cty_countryId_fk,tblmvbcity.cty_stateId_fk,tblmvbcity.cty_name,tblmvbcity.cty_createdDate,
	    		                  tblmvbcity.cty_modifiedDate,tblmvbcity.cty_status,tblmvbcountry.cntr_name,tblmvbstate.stat_name,
	    		                  (select tblmvbsysmainusers.sysmu_username from tblmvbsysmainusers where tblmvbstate.stat_createdBy =tblmvbsysmainusers.sysmu_id_pk)
	    		                  as created_by, (select tblmvbsysmainusers.sysmu_username from tblmvbsysmainusers where tblmvbstate.stat_modifiedBy=tblmvbsysmainusers.sysmu_id_pk)
	    		                  as modified_by FROM `tblmvbcity` tblmvbcity LEFT JOIN tblmvbcountry tblmvbcountry on (tblmvbcountry.cntr_id_pk=tblmvbcity.cty_countryId_fk)
	                              LEFT JOIN tblmvbstate tblmvbstate on (tblmvbstate.stat_id_pk=tblmvbcity.cty_stateId_fk) where tblmvbcity.cty_stateid_fk='" . $id . "' and tblmvbcity.cty_delete='0' order by tblmvbcity.cty_id_pk DESC");
		
		return $result->result();
	
	}
	
	// --- Function used to add City---//
	public function addCity()
	{
		$name=$this->input->post('txtCity');
		$id=$this->input->post('txtCountry');
		$sid=$this->input->post('txtState');
		$admin_id=$this->session->userdata('admin_id');
		$date=date('Y-m-d h:i:s');
		$data=array('cty_name'=>$name,'cty_countryId_fk'=>$id,'cty_stateId_fk'=>$sid,'cty_createdDate'=>$date,'cty_createdBy'=>$admin_id,'cty_modifiedDate'=>$date,'cty_modifiedBy'=>$admin_id,'cty_status'=>'1');
		
		$this->db->insert('tblmvbcity',$data);
		$insert_id=$this->db->insert_id();
		setSAActivityLogs('Transaction_activity','SALocationcity_add');
		return $insert_id;
	
	}
	
	// --- Function used to Edit City---//
	public function editCity()
	{
		$name=$this->input->post('txtEditcity');
		$id=$this->input->post('txtEditcityid');
		$admin_id=$this->session->userdata('admin_id');
		$date=date('Y-m-d h:i:s');
		$details=$this->getSpecificCity($id);
		
		$updatedData="";
		
		if($name!=$details[0]->cty_name)
		{
			$updatedData="Old Name:-".$details[0]->cty_name." Updated Name:-".$name;
		}
		
		
		$data=array('cty_name'=>$name,'cty_modifiedDate'=>$date,'cty_modifiedBy'=>$admin_id);
		
		$this->db->where('cty_id_pk',$id);
		$this->db->update('tblmvbcity',$data);
		setSAActivityLogs('Transaction_activity','SALocationcity_Edit',$updatedData);
		return true;
	
	}
	
	// --- Function used to change status of City---//
	public function changecityStatus($status,$city)
	{
		$admin_id=$this->session->userdata('admin_id');
		$date=date('Y-m-d h:i:s');
		for($i=0;$i < count($city);$i ++)
		{
			$data=array('cty_status'=>$status,'cty_modifiedDate'=>$date,'cty_modifiedBy'=>$admin_id);
			$this->db->where('cty_id_pk',$city [$i]);
			$this->db->update('tblmvbcity',$data);
		}
		
		return true;
	
	}

}
