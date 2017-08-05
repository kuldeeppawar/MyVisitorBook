<?php

class Setting_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}
	
	// --Function used get all Mobile list---//
	public function getAllmobile()
	{
		
		$clientId=$this->session->userdata('client_id');
		
		
		$result=$this->db->query("SELECT mreg_id_pk, mreg_no, mreg_createdDate, mreg_createdBy,mreg_status FROM tblmvbmoreg WHERE mreg_clientId_fk='".$clientId."'
				                  AND mreg_status!='2'");
		
		return $result->result();
	
	}
	
	// --Function used get Specific mobile Details---//
	public function getModetails($mobileId)
	{
	
		$result=$this->db->query("SELECT mreg_id_pk, mreg_no FROM tblmvbmoreg  WHERE mreg_id_pk='".$mobileId."'");
	
		return $result->result();
	
	}
	

	// --- Function used to add Mobile---//
	public function addMo()
	{
		$Mobile=$this->input->post('txtMobile');
		$adminId=$this->session->userdata('admin_id');
		$clientId=$this->session->userdata('client_id');
		$date=date('Y-m-d h:i:s');
	
		$chkMo=$this->chkMobile($clientId,$Mobile);
				
		if(count($chkMo)==0)
		{	
		
			$data=array('mreg_clientId_fk'=>$clientId,
						'mreg_no'=>$Mobile,
						'mreg_createdDate'=>$date,
						'mreg_createdBy'=>$adminId,
						'mreg_modifiedDate'=>$date,
						'mreg_modifiedBy'=>$adminId,
						'mreg_status'=>1);
			$this->db->insert('tblmvbmoreg',$data);
			$insert_id=$this->db->insert_id();
			return $insert_id;
			
			setAActivityLogs('Transaction_activity','AAmoregistration_Add',"Added Mobile Number :-".mreg_no);
		}
		else 
		{
			return false;
		}	
	}
	
	
	public function chkMobile($clientId,$Mobile)
	{
		$result=$this->db->query("SELECT mreg_no FROM tblmvbmoreg  WHERE mreg_clientId_fk='".$clientId."' AND mreg_no='".$Mobile."'");
		
		return $result->result();
	}
	
	
	// --- Function used to add Mobile---//
	public function editMo()
	{
		$Mobile=$this->input->post('txtMobile');
		$id=$this->input->post('txtMoid');
		$adminId=$this->session->userdata('admin_id');
		$date=date('Y-m-d h:i:s');
	
		
		$chkMo=$this->chkMobile($clientId,$Mobile);
		
		
			$data=array('mreg_no'=>$Mobile,
						'mreg_modifiedDate'=>$date,
						'mreg_modifiedBy'=>$adminId);
			$this->db->where('mreg_id_pk',$id);
			$this->db->update('tblmvbmoreg',$data);
			setAActivityLogs('Transaction_activity','AAmoregistration_Edit',"Edited Mobile Number :-".mreg_no." Id is:-".$id);
			return $id;
		
	
	}
	
	
    // --functin used to deactivate/activate Mobile Registartion status--//
	public function changeMostatus($status,$mobileid)
	{
		for($i=0;$i < count($mobileid);$i ++)
		{
			$data=array('mreg_status'=>$status);
			$this->db->where('mreg_id_pk',$mobileid[$i]);
			
			$this->db->update('tblmvbmoreg',$data);
		}
		
		return true;
	
	}
	
	// --functin used to delete Mobile Registartion--//
	public function deleteMo($mobileid)
	{
		for($i=0;$i < count($mobileid);$i ++)
		{
			$data=array('mreg_status'=>2);
			$this->db->where('mreg_id_pk',$mobileid[$i]);
				
			$this->db->update('tblmvbmoreg',$data);
		}
	
		return true;
	
	}
	
	// --Function used get all Load SMS signature ---//
	public function getAllsignature()
	{
	
		$clientId=$this->session->userdata('client_id');
		$result=$this->db->query("SELECT `sig_id_pk`, `sig_clientId_fk`,`sig_title`, `sig_content`, `sig_nonenlish`, `sig_default`, `sig_createdDate`, `sig_createdBy`, 
				                 `sig_status` FROM `tblmvbsmssignature` WHERE sig_clientId_fk='".$clientId."' AND sig_status!='2'");
	
		return $result->result();
	
	}
	
	// --Function used get aspecific signature ---//
	public function getSpecificsign($id)
	{
	  $result=$this->db->query("SELECT `sig_id_pk`, `sig_clientId_fk`,`sig_title`, `sig_content`, `sig_nonenlish`, `sig_default`, `sig_createdDate`, `sig_createdBy`,
				                 `sig_status` FROM `tblmvbsmssignature` WHERE sig_id_pk='".$id."'");
	
		return $result->result();
	
	}

	

	
	// --- Function used to add Signature---//
	public function addsmsSignature()
	{
	
		$signTitle=$this->input->post('txtTitle');
		$signText=$this->input->post('txtSigntext');
		$signLanguage=$this->input->post('chkEnglish');
		if($signLanguage=="")
		{
			$signLanguage=0;
		}
		
		$adminId=$this->session->userdata('admin_admin_id');
		$clientId=$this->session->userdata('client_id');
		$date=date('Y-m-d h:i:s');
		
		$data=array('sig_clientId_fk'=>$clientId,
					'sig_title'=>$signTitle,
					'sig_content'=>$signText,
					'sig_nonenlish'=>$signLanguage,
					'sig_default'=>0,
					'sig_createdDate'=>$date,
					'sig_createdBy'=>$adminId,
					'sig_modifiedDate'=>$date,
					'sig_modifiedBy'=>$adminId,
					'sig_status'=>1);
		$this->db->insert('tblmvbsmssignature',$data);
		$insert_id=$this->db->insert_id();
		return $insert_id;
		
		setAActivityLogs('Transaction_activity','AAsmssignature_add',"Signature Added :-".$signId);
		
	}
		
	// --- Function used to edit sign---//
	public function editsmsSignature()
	{
		$signTitle=$this->input->post('txtTitle');
		$signId=$this->input->post('txtSignid');
		$signText=$this->input->post('txtSigntext');
		$signLanguage=$this->input->post('chkEnglish');
		if($signLanguage=="")
		{
			$signLanguage=0;
		}
		
		$adminId=$this->session->userdata('admin_admin_id');
		$clientId=$this->session->userdata('client_id');
		$date=date('Y-m-d h:i:s');
		
		$data=array('sig_title'=>$signTitle,
					'sig_content'=>$signText,
					'sig_nonenlish'=>$signLanguage,
					'sig_modifiedDate'=>$date,
					'sig_modifiedBy'=>$adminId);
		$this->db->where('sig_id_pk',$signId);
		$this->db->update('tblmvbsmssignature',$data);
		
		$idlist=explode(",",$data);
		setAActivityLogs('Transaction_activity','AAsmssignature_edit',"Signature Edited :-".$signId."Data:-".$idlist);
		
		return $signId;
	
	}
	
	// --functin used to delete SMS Template--//
	public function deletesmsSign($signId)
	{
		for($i=0;$i < count($signId);$i ++)
		{
			$data=array('sig_status'=>2);
			$this->db->where('sig_id_pk',$signId[$i]);
	
			$this->db->update('tblmvbsmssignature',$data);
		}
	
		return true;
	
	}
	
	// --functin used to set default sign--//
	public function setDefaultsmssign($signId)
	{
		    $clientId=$this->session->userdata('client_id');
		    $this->db->query(" UPDATE tblmvbsmssignature SET sig_default='0'  WHERE sig_clientId_fk='".$clientId."'  ");
		    $data=array('sig_default'=>1);
			$this->db->where('sig_id_pk',$signId);
	
			$this->db->update('tblmvbsmssignature',$data);
		
		return true;
	
	}
	
	//----function used get address labeling details----//
	public function addressLabeling()
	{
		$branch_id=$this->session->userdata('branch_id');
	
	    $result=$this->db->query("SELECT `labeling_id_pk`, `labeling_branch_pk`, `labeling_font`, `labeling_size`, `labeling_style`, `labeling_color`, `labeling_allign`,
	    	                     `labeling_labelsize`, `labeling_createdBy`, `labelign_createdDate`, `labeling_modifiedDate`, `labeling_modifiedBy`, `labeling_status` 
	    	                      FROM `tblmvbaddresslabeling` WHERE labeling_branch_pk='".$branch_id."'");
	    
	    return $result->result();
	
	}
	
	//----------------function used to save /edit setting for label-----//
	public function saveAddresslabeling($labelsize,$selFont,$txtId,$txtColor,$rdbButton,$style,$selFontsize)
	{
		
		$branch_id=$this->session->userdata('branch_id');
		$adminId=$this->session->userdata('admin_admin_id');
		$date=date("Y-m-d H:i:s");
	     
		if($txtId==0)
		{  
			 $data=array('labeling_branch_pk'=>$branch_id,
			 		     'labeling_font'=>$selFont,
			 		     'labeling_size'=>$selFontsize,
				 		 'labeling_style'=>$style,
				 		 'labeling_color'=>$txtColor,
				 		 'labeling_allign'=>$rdbButton,
				 		 'labeling_labelsize'=>$labelsize,
				 		 'labeling_createdBy'=>$adminId,
				 		 'labelign_createdDate'=>$date,
				 		 'labeling_modifiedBy'=>$adminId,
				 		 'labeling_modifiedDate'=>$date,
				 		 'labeling_status'=>1 );
		
		
			$this->db->insert('tblmvbaddresslabeling',$data);
			
			$idlist=explode(",",$data);
			setAActivityLogs('Transaction_activity','AAaddresslabelling_Add'."data Added".$idlist);
	       
		}
		else
		{
			$data=array('labeling_font'=>$selFont,
						'labeling_size'=>$selFontsize,
						'labeling_style'=>$style,
						'labeling_color'=>$txtColor,
						'labeling_allign'=>$rdbButton,
						'labeling_labelsize'=>$labelsize,
						'labeling_modifiedBy'=>$adminId,
						'labeling_modifiedDate'=>$date
						 );
			$this->db->where('labeling_id_pk',$txtId);
			$this->db->update('tblmvbaddresslabeling',$data);
			
			$idlist=explode(",",$data);
			setAActivityLogs('Transaction_activity','AAaddresslabelling_Edit'."data edited".$idlist."id is :-".$txtId);
			
			
		}	
			
		return true;
	}


	public function getVisitorsDetails($visitors_id)
	{
				$result_visitors_details=$this->db->query("Select vt.vis_firstName,vt.vis_middleName,vt.vis_lastName,vt.vis_mobile,vt.vis_address,vt.vis_zipCode,ct.cntr_name as country_name from tblmvbvisitors vt left join tblmvbcountry ct on (vt.vis_countryId_fk=ct.cntr_id_pk) where find_in_set(vt.vis_id_pk,'".$visitors_id."')");

				$row_visitor_details=$result_visitors_details->result();

				return $row_visitor_details;
	}
	
	
	
}
	

