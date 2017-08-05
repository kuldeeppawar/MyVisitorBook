<?php

class Customfield_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}
	
	// --Function used get all field---//
	public function getAllfield()
	{
		$result=$this->db->query("select tblmvbcustomfields.cfi_id_pk,tblmvbcustomfields.cfi_length,tblmvbcustomfields.cfi_status,
			                      (CASE when cfi_picklist_type !='none' then 
			                      concat(cfi_field_type,' - ',tblmvbcustomfields.cfi_picklist_type) else cfi_field_type END) as cfi_field_type,
			                      tblmvbcustomfields.cfi_label,tblmvbcustomfields.cfi_value,tblmvbcustomfields.cfi_length,tblmvbcustomfields.cfi_category,
			                      tblmvbcustomfields.cfi_createdDate,tblmvbcustomfields.cfi_createdBy,tblmvbcustomfields.cfi_modifiedDate,tblmvbcustomfields.cfi_modifiedBy,
			                      GROUP_CONCAT(tblmvbcustomfieldvalue.cfv_value) AS val, (SELECT tblmvbsysmainusers.sysmu_username FROM tblmvbsysmainusers WHERE 
			                      tblmvbcustomfields.cfi_createdBy = tblmvbsysmainusers.sysmu_id_pk) AS created_by, (SELECT  tblmvbsysmainusers.sysmu_username
                                  FROM tblmvbsysmainusers WHERE tblmvbcustomfields.cfi_modifiedBy = tblmvbsysmainusers.sysmu_id_pk) AS modified_by from  tblmvbcustomfields 
			                      left join tblmvbcustomfieldvalue ON tblmvbcustomfields.cfi_id_pk = tblmvbcustomfieldvalue.cfv_fieldId_fk 
			                      GROUP BY tblmvbcustomfields.cfi_id_pk");
		return $result->result();
	
	}
	
	
     //--function used to check user package custom fields counts--//
     
	public function checkCustomfields()
	{
		$clientId=$this->session->userdata('client_id');
		
	    $customresult=$this->db->query("SELECT tblmvbclients.clnt_id_pk,tblmvbclients.clnt_packageId_fk, tblmvbpackagedetails.pkgd_customFields FROM tblmvbclients
	    	                            LEFT JOIN tblmvbpackagedetails on tblmvbclients.clnt_packageId_fk=tblmvbpackagedetails.pkgd_packId_fk");
	    
	    
	    $customresult=$customresult->result();
	    
	    
		return $customresult[0]->pkgd_customFields; 
		
		
			
	}
	
	
	// --public function used to get field Value--//
	public function getVisitfieldvalue($id)
	{
		$result=$this->db->query("SELECT cfv_id_pk,cfv_value FROM tblmvbcustomfieldvalue WHERE cfv_fieldId_fk='".$id."'");
		return $result->result();
	
	}
	
	// ---Function used to all field--//
	public function getVisitfield($id)
	{
		$result=$this->db->query("SELECT cfi_id_pk,cfi_field_type,cfi_label,cfi_length,cfi_category
                                  FROM tblmvbcustomfields WHERE cfi_id_pk='".$id."'");
		return $result->result();
	
	}
	
	// --- Function used to add Fields---//
	public function addVisitfield()
	{
		$fieldType=$this->input->post('selFieldtype');
		$fieldLabel=$this->input->post('txtTextfieldlabel');
		$fieldValues=$this->input->post('field');
		$fieldLength=$this->input->post('txtTextfieldlength');
		$chkMandatory=$this->input->post('chkMandatory');
		if($chkMandatory=="")
		{
			$chkMandatory="0";
		}	
		
		$selectCriteria=$this->input->post('optradio');
		if($selectCriteria=="")
		{
			$selectCriteria="none";
		}
		
		$admin_id=$this->session->userdata('admin_admin_id');
		$date=date('Y-m-d h:i:s');
		
		
	
		$data=array('cfi_field_type'=>$fieldType,
				    'cfi_picklist_type'=>$selectCriteria,
				    'cfi_length'=>$fieldLength,
				    'cfi_category'=>$chkMandatory,
				    'cfi_label'=>$fieldLabel,
				    'cfi_createdBy'=>$admin_id,
				    'cfi_createdDate'=>$date,
				    'cfi_modifiedBy'=>$admin_id,
			    	'cfi_modifiedDate'=>$date,
			    	'cfi_clientId'=>$this->session->userdata('client_id'),
				    'cfi_status'=>'1');
		
	
		$this->db->insert('tblmvbcustomfields',$data);
		$insert_id=$this->db->insert_id();

		$idlist=implode(",",$data);
		$otherdata="";
		if(count($fieldValues)==0)
		{
			$data=array('cfv_fieldId_fk'=>$insert_id,
				    	'cfv_value'=>"");
			
			$this->db->insert('tblmvbcustomfieldvalue',$data);
			$otherdata=implode(",",$data);
		}
		else 
		{
			for($i=0;$i<count($fieldValues);$i++)
			{
				$data=array('cfv_fieldId_fk'=>$insert_id,
						'cfv_value'=>$fieldValues[$i]);
					
				$this->db->insert('tblmvbcustomfieldvalue',$data);
				$otherdata=$otherdata.implode(",",$data);
			}
		}	
		
			
		setAActivityLogs('Transaction_activity','AAddvisitorform_Add',"Added Data :- ".$idlist."  field Values:-".$otherdata);
		
    	return $insert_id;
	
	}
	
	// --- Function used to edit Fields---//
	public function editVisitfield()
	{	
		$insert_id=$this->input->post('txtFieldid');
	    $fieldType=$this->input->post('selFieldtype');
		$fieldLabel=$this->input->post('txtTextfieldlabel');
		$fieldValues=$this->input->post('field');
		$fieldLength=$this->input->post('txtTextfieldlength');
		$chkMandatory=$this->input->post('chkMandatory');
		if($chkMandatory=="")
		{
			$chkMandatory="0";
		}	
		
		$selectCriteria=$this->input->post('optradio');
		if($selectCriteria=="")
		{
			$selectCriteria="0";
		}
		
		$admin_id=$this->session->userdata('admin_admin_id');
		$date=date('Y-m-d h:i:s');
		

		$data=array('cfi_field_type'=>$fieldType,
				    'cfi_picklist_type'=>$selectCriteria,
				    'cfi_length'=>$fieldLength,
				    'cfi_category'=>$chkMandatory,
				    'cfi_label'=>$fieldLabel,
				    'cfi_modifiedBy'=>$admin_id,
			    	'cfi_modifiedDate'=>$date);
	
		
		$this->db->where('cfi_id_pk',$insert_id);
		
		$this->db->update('tblmvbcustomfields',$data);
		
		$idlist=implode(",",$data);
		$otherdata="";

		$this->db->query("delete from tblmvbcustomfieldvalue where cfv_fieldId_fk='".$insert_id."'") ;
		
		if(count($fieldValues)==0)
		{
			$data=array('cfv_fieldId_fk'=>$insert_id,
					'cfv_value'=>"");
			
			$this->db->insert('tblmvbcustomfieldvalue',$data);
			$otherdata=$otherdata.implode(",",$data);
		}
		else 
		{
			for($i=0;$i<count($fieldValues);$i++)
			{
				$data=array('cfv_fieldId_fk'=>$insert_id,
						'cfv_value'=>$fieldValues[$i]);
					
				$this->db->insert('tblmvbcustomfieldvalue',$data);
				$otherdata=$otherdata.implode(",",$data);
			}
		}	
		
		
		setAActivityLogs('Transaction_activity','AAddvisitorform_Edit',"Edited Data :- ".$idlist."  field Values:-".$otherdata);
		
		return $insert_id;
	
	}
	
	// --- Function used to change status of Field---//
	public function changefieldStatus($status,$field)
	{  
		for($i=0;$i < count($field);$i ++)
		{
			$data=array('cfi_status'=>$status);
			$this->db->where('cfi_id_pk',$field[$i]);
  		    $this->db->update('tblmvbcustomfields',$data);
 
			
		}
		
		return true;
	
	}
	
	
	// --function used to get specific user details--//
	public function getSpecificuser($id)
	{
		$query=$this->db->query("SELECT `sysu_id_pk`, `sysu_branchId_fk`, `sysu_userTypeId_fk`, `sysu_clientId_fk`, 
			                    `sysu_parentClient`, `sysu_profile`, `sysu_title`, `sysu_name`, `sysu_mname`, `sysu_lname`, `sysu_mobile`,
			                    `sysu_email`, `sysu_password`, `sysu_countryId_fk`, `sysu_stateId_fk`, `sysu_cityId`, 
			                    `sysu_address`, `sysu_zipcode`, `sysu_landline_no`, `sysu_fax`, `sysu_bussiness_name`, 
			                    `sysu_bussiness_category`, `sysu_website`, `sysu_date_of_birth`, `sysu_aniversary_date`,
			                     `sysu_Info`, `sysu_addInfo`, `sysu_createdDate`, `sysu_createdBy`, `sysu_modifiedDate`,
			                    `sysu_modifiedby`, `sysu_isLogin`, `sysu_status` FROM `tblmvbsystemusers` WHERE sysu_id_pk='" . $id . "'");
		return $query->result();
	}


	public function getClientPkgDetails()
	{
			$client_id=$this->session->userdata('client_id');

			$result=$this->db->query("SELECT clntp_customFields
                                  FROM tblmvbclientpackage WHERE clntp_clntId_fk='".$client_id."'");
			
			$row=$result->result();

			return $row[0]->clntp_customFields;	
	}

}
	

