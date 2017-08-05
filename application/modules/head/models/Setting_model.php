<?php

class Setting_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}
	
	// --Function used get all field---//
	public function getAllfield()
	{
		$result=$this->db->query("SELECT tblmvbvisitfield.visitfield_id_pk,tblmvbvisitfield.visitfield_length,tblmvbvisitfield.visitfield_type,tblmvbvisitfield.visitfield_name,tblmvbvisitfield.visitfield_selection,
				                  tblmvbvisitfield.visitfield_selection,tblmvbvisitfield.visitfield_category,tblmvbvisitfield.visitfield_status,tblmvbvisitfield.visitfield_createdDate,
				                  tblmvbvisitfield.visitfield_modifiedDate,GROUP_CONCAT(tblmvbvisitfieldvalue.visitval_value) as val,(select tblmvbsysmainusers.sysmu_username from
				                  tblmvbsysmainusers where tblmvbvisitfield.visitfield_createdBy=tblmvbsysmainusers.sysmu_id_pk) as created_by,
				                  (select tblmvbsysmainusers.sysmu_username from  tblmvbsysmainusers where tblmvbvisitfield.visitfield_modifiedBy=tblmvbsysmainusers.sysmu_id_pk)
				                  as modified_by FROM `tblmvbvisitfield` LEFT JOIN tblmvbvisitfieldvalue on tblmvbvisitfield.visitfield_id_pk=tblmvbvisitfieldvalue.visitval_fieldId_fk where tblmvbvisitfield.visitfield_delete='0'
				                   GROUP BY tblmvbvisitfield.visitfield_id_pk order by tblmvbvisitfield.visitfield_id_pk DESC");
		
		return $result->result();
	
	}


	

	public function  getAllfieldQuickadd()
	{
			$result=$this->db->query("SELECT tblmvbvisitfield.visitfield_id_pk,tblmvbvisitfield.visitfield_length,tblmvbvisitfield.visitfield_type,tblmvbvisitfield.visitfield_name,tblmvbvisitfield.visitfield_selection,
				                  tblmvbvisitfield.visitfield_selection,tblmvbvisitfield.visitfield_category,tblmvbvisitfield.visitfield_status,tblmvbvisitfield.visitfield_createdDate,
				                  tblmvbvisitfield.visitfield_modifiedDate,GROUP_CONCAT(tblmvbvisitfieldvalue.visitval_value) as val,(select tblmvbsysmainusers.sysmu_username from
				                  tblmvbsysmainusers where tblmvbvisitfield.visitfield_createdBy=tblmvbsysmainusers.sysmu_id_pk) as created_by,
				                  (select tblmvbsysmainusers.sysmu_username from  tblmvbsysmainusers where tblmvbvisitfield.visitfield_modifiedBy=tblmvbsysmainusers.sysmu_id_pk)
				                  as modified_by FROM `tblmvbvisitfield` LEFT JOIN tblmvbvisitfieldvalue on tblmvbvisitfield.visitfield_id_pk=tblmvbvisitfieldvalue.visitval_fieldId_fk where tblmvbvisitfield.visitfield_delete='0' and tblmvbvisitfield.visitfield_status='1'
				                   GROUP BY tblmvbvisitfield.visitfield_id_pk order by tblmvbvisitfield.visitfield_id_pk DESC");
		
			return $result->result();
	}


	
	// --public function used to get field Value--//
	public function getVisitfieldvalue($id)
	{
		$result=$this->db->query("SELECT visitval_id_pk,visitval_value FROM tblmvbvisitfieldvalue WHERE visitval_fieldId_fk='".$id."'");
		return $result->result();
	
	}
	
	// ---Function used to all field--//
	public function getVisitfield($id)
	{
		$result=$this->db->query("SELECT visitfield_id_pk,visitfield_type,visitfield_name,visitfield_selection,visitfield_length,visitfield_category
                                  FROM tblmvbvisitfield WHERE visitfield_id_pk='".$id."'");
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

		if(!isset($selectCriteria))
		{
				$selectCriteria="0";				
		}
		

		
		$admin_id=$this->session->userdata('admin_id');
		$date=date('Y-m-d h:i:s');
		
		
	
		$data=array('visitfield_type'=>$fieldType,
				    'visitfield_selection'=>$selectCriteria,
				    'visitfield_length'=>$fieldLength,
				    'visitfield_category'=>$chkMandatory,
				    'visitfield_name'=>$fieldLabel,
				    'visitfield_createdBy'=>$admin_id,
				    'visitfield_createdDate'=>$date,
				    'visitfield_modifiedBy'=>$admin_id,
			    	'visitfield_modifiedDate'=>$date,
				    'visitfield_status'=>'1');
		
		$this->db->insert('tblmvbvisitfield',$data);
		$insert_id=$this->db->insert_id();

		$idlist=implode(",",$data);
		$otherdata="";
		if(count($fieldValues)==0)
		{
			$data=array('visitval_fieldId_fk'=>$insert_id,
				    	'visitval_value'=>"");
			
			$this->db->insert('tblmvbvisitfieldvalue',$data);
			$otherdata=implode(",",$data);
		}
		else 
		{
			for($i=0;$i<count($fieldValues);$i++)
			{
				$data=array('visitval_fieldId_fk'=>$insert_id,
						'visitval_value'=>$fieldValues[$i]);
					
				$this->db->insert('tblmvbvisitfieldvalue',$data);
				$otherdata=$otherdata.implode(",",$data);
			}
		}	
		
		
		setSAActivityLogs('Transaction_activity','SAAddvisitorform_Add',"Added Data :- ".$idlist."  field Values:-".$otherdata);
		
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
		if(!isset($selectCriteria))
		{
				$selectCriteria="0";				
		}
		
		$admin_id=$this->session->userdata('admin_id');
		$date=date('Y-m-d h:i:s');
		
		
	
		$data=array('visitfield_type'=>$fieldType,
				    'visitfield_selection'=>$selectCriteria,
				    'visitfield_length'=>$fieldLength,
				    'visitfield_category'=>$chkMandatory,
				    'visitfield_name'=>$fieldLabel,
				    'visitfield_modifiedBy'=>$admin_id,
			    	'visitfield_modifiedDate'=>$date);


		$this->db->where('visitfield_id_pk',$insert_id);
		$this->db->update('tblmvbvisitfield',$data);
		
		$idlist=implode(",",$data);
		$otherdata="";

		$this->db->query("delete from tblmvbvisitfieldvalue where visitval_fieldId_fk='".$insert_id."'") ;
		
		if(count($fieldValues)==0)
		{
			$data=array('visitval_fieldId_fk'=>$insert_id,
					'visitval_value'=>"");
			
			$this->db->insert('tblmvbvisitfieldvalue',$data);
			$otherdata=$otherdata.implode(",",$data);
		}
		else 
		{
			for($i=0;$i<count($fieldValues);$i++)
			{
				$data=array('visitval_fieldId_fk'=>$insert_id,
						'visitval_value'=>$fieldValues[$i]);
					
				$this->db->insert('tblmvbvisitfieldvalue',$data);
				$otherdata=$otherdata.implode(",",$data);
			}
		}	
		
		
		setSAActivityLogs('Transaction_activity','SAAddvisitorform_Edit',"Edited Data :- ".$idlist."  field Values:-".$otherdata);
		
		return $insert_id;
	
	}
	
	// --- Function used to change status of Field---//
	public function changefieldStatus($status,$field)
	{
		for($i=0;$i < count($field);$i ++)
		{
			$data=array('visitfield_status'=>$status);
			$this->db->where('visitfield_id_pk',$field[$i]);
			$this->db->update('tblmvbvisitfield',$data);
		}
		
		return true;
	
	}
	
	
	// --function used to get validate Otp--//
	public function getSpecificuser($id)
	{
		$query=$this->db->query("SELECT sysmu_id_pk,sysmu_password,sysmu_userTypeId_fk,sysmu_email,sysmu_mobile,sysmu_empid,sysmu_username,
					                    sysmu_location,sysmu_description FROM tblmvbsysmainusers where sysmu_id_pk='" . $id . "'");
		return $query->result();
	
	}
	
	//-----------function get gauge chart value----------//
	
	public function getGaugechartvalue()
	{
		$query=$this->db->query("SELECT `gchart_id_pk`, `gchart_totalclients`, `gchart_totalrecharges`, `gchart_totalvevenue`, `gchart_newsales`,  
			                     `gchart_rechargesales`, `gchart_newsalesrevenue`, `gchart_rechargesalerevenue` FROM `tblmvbgaugechart` ");
		return $query->result();
	}

	
	//----function used chart value-----//
	public function  saveChartvalue()
	{
		$txtTotalclients=$this->input->post('txtTotalclients');
		$txtTotalrecharges=$this->input->post('txtTotalrecharges');
		$txtTotalrevenue=$this->input->post('txtTotalrevenue');
		$txtNewsales=$this->input->post('txtNewsales');
		$txtRechargesales=$this->input->post('txtRechargesales');
		$txtSalesrevenue=$this->input->post('txtSalesrevenue');
		$txtRechargesalesrevunue=$this->input->post('txtRechargesalesrevunue');
		
		$data=array('gchart_totalclients'=>$txtTotalclients,
				    'gchart_totalrecharges'=>$txtTotalrecharges,
				    'gchart_totalvevenue'=>$txtTotalrevenue,
				    'gchart_newsales'=>$txtNewsales,
				    'gchart_rechargesales'=>$txtRechargesales,
				    'gchart_newsalesrevenue'=>$txtSalesrevenue,
				    'gchart_rechargesalerevenue'=>$txtRechargesalesrevunue
				     );
		$this->db->update('tblmvbgaugechart',$data);
		$this->db->where('gchart_id_pk','1');
		
		$otherdata=implode(",",$data);
		setSAActivityLogs('Transaction_activity','SAAgaugechart Value',"Added Data ".$otherdata);
		
	return true;	
		
		
		
		
	}
	
  //---------function used to get predefine field value-----//
  public function getAllpredefinefield()
  {
     $result=$this->db->query("SELECT `predefine_id_pk`, `predefine_name`, `predefine_show`, `predefine_status` FROM tblmvbquickpredefine");
     return $result->result();
  }
  
  
  //----------Set Predefine field visibility--------//
  public function setPredefinefields($fields,$fieldsadditional)
  {
  	 
  	  $this->db->query("Update tblmvbquickpredefine set predefine_show=0 ");
  	  $this->db->query("Delete from tblmvbquickadditional ");
  	  for($i=0;$i<count($fields);$i++)
  	  {
  	  	
  	  	   $data=array('predefine_show'=>'1');
  	  	   $this->db->where('predefine_name',$fields[$i]);
  	  	   $this->db->update('tblmvbquickpredefine',$data);
  	  	  
  	  	
  	  }
  	  
  	  for($i=0;$i<count($fieldsadditional);$i++)
  	  {
  	  
  	  	$data=array('additional_visitfieldid_fk'=>$fieldsadditional[$i],
  	  			    'additional_status'=>1
  	  	);
  	  	$this->db->insert('tblmvbquickadditional',$data);
  	  
  	  
  	  }
  	  
  	  return true;
  }
  
 
}
