<?php

class Localization_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}
	
	// -- function get all record--//
	public function getAllKeywords()
	{

		$result=$this->db->query("SELECT `keywd_id_pk`, `kewd_name`, `kewd_createdDate`, `kewd_status` FROM `tblmvbkeywords`");
		
		return $result->result();
	
	}
	
	// ----Get Specific Keyword---//
	public function getSpecificKeyword($id)
	{

		$result=$this->db->query("SELECT `keywd_id_pk`, `kewd_name`, `kewd_createdDate`, `kewd_createdBy`, `kewd_modifiedDate`, `kewd_modifiedBy`, `kewd_status` 
			                      FROM `tblmvbkeywords` WHERE keywd_id_pk='" . $id . "'");
		return $result->result();
	
	}

	
	// function used to get keyword listing--//
	public function	getLocalkeywords($id)
	{
		$result=$this->db->query("SELECT tblmvblocalization.localise_id_pk,tblmvblocalization.localise_langId_fk,tblmvblocalization.localise_keyword ,
			                      tblmvblanguages.lng_name FROM tblmvblocalization LEFT JOIN tblmvblanguages ON 
			                      tblmvblocalization.localise_langId_fk=tblmvblanguages.lng_id_pk WHERE tblmvblocalization.localise_keyId_fk='".$id."'");
		return $result->result();
	}
	
	// function used to get language list--//
	public function getAlllanguage()
	{
		$result=$this->db->query("SELECT `lng_id_pk`, `lng_name`, `lng_createdDate`, `lng_status` FROM `tblmvblanguages`");
		return $result->result();
	}
	
	
	
	// --- Function used to add Keyword---//
	public function addKeyword()
	{
		$name=$this->input->post('keyword');
		$admin_id=$this->session->userdata('admin_id');
		$date=date('Y-m-d h:i:s');
		$dataCheck=$this->db->query("Select kewd_name from tblmvbkeywords where kewd_name='".$name."'");
		$dataCheck=$dataCheck->result();
		
		if(count($dataCheck)==0)
		{
		
			$data=array('kewd_name'=>$name,
						'kewd_createdDate'=>$date,
						'kewd_createdBy'=>$admin_id,
						'kewd_modifiedDate'=>$date,
						'kewd_modifiedBy'=>$admin_id,
						'kewd_status'=>'1');
			
			$this->db->insert('tblmvbkeywords',$data);
			$insert_id=$this->db->insert_id();
			
			setSAActivityLogs('Transaction_activity','SALocalization_add');
			return $insert_id;
		}
		else 
		{
			return false;
		}	
	     
	}
	
	// --- Function used to Edit Keyword---//
	public function editKeyword()
	{

		$name=$this->input->post('txtEditkeyword');
		$id=$this->input->post('txtEditkeywordid');
		$admin_id=$this->session->userdata('admin_id');
		$date=date('Y-m-d h:i:s');
		
		$details=$this->getSpecificKeyword($id);
		
		$updatedData="";
		
		if ($name != $details[0]->kewd_name)
		{
			$updatedData="Old Name:-" . $details[0]->kewd_name . " Updated Name:-" . $name;
		}
		
		
		$dataCheck=$this->db->query("Select keywd_id_pk,kewd_name from tblmvbkeywords where kewd_name='".$name."'");
		$dataCheck=$dataCheck->result();
		if(count($dataCheck)==0)
		{	
			$data=array('kewd_name'=>$name,
						'kewd_modifiedDate'=>$date,
						'kewd_modifiedBy'=>$admin_id);
			
			$this->db->where('keywd_id_pk',$id);
			$this->db->update('tblmvbkeywords',$data);
			
			setSAActivityLogs('Transaction_activity','SALocalizationkeyword_Edit',$updatedData);
			return true;
		}	
		else 
		{
			if($dataCheck[0]->keywd_id_pk==$id)
			{
				$data=array('kewd_name'=>$name,
						'kewd_modifiedDate'=>$date,
						'kewd_modifiedBy'=>$admin_id);
					
				$this->db->where('keywd_id_pk',$id);
				$this->db->update('tblmvbkeywords',$data);
					
				setSAActivityLogs('Transaction_activity','SALocalizationkeyword_Edit',$updatedData);
				return true;
			}	
			else
			{	
			  return false;
			}  
		}	
		
	
	}
	
		//---Public function Get Specific User----//
	public function getSpecificuser($id)
	{
		$result=$this->db->query("SELECT `sysmu_id_pk`, `sysmu_userTypeId_fk`, `sysmu_email`, `sysmu_password`, `sysmu_mobile`, `sysmu_empid`, `sysmu_location`,
			                     `sysmu_profile`, `sysmu_username`, `sysmu_description`, `sysmu_createdDate`, `sysmu_createdBy`, `sysmu_modifiedDate`, `sysmu_modifiedby`,
			                     `sysmu_isLogin`, `sysmu_status` FROM `tblmvbsysmainusers` WHERE sysmu_id_pk='".$id."'");
	    return $result->result();
	
	}
	
	
	// --- Function used to Upload csv of groups---//
	function uploadkeywordCsv()
	{
		ini_set('auto_detect_line_endings',true);
		if ($_FILES ['txtFile']!='')
		{
			$adminId=$this->session->userdata('admin_id');
		
			setSAActivityLogs('Transaction_activity','SAKeywordscv',"upload By :- ".$adminId);
			$error=array();
			$line_error=1;
			$base_url=base_url();
			$file_name=time() . $_FILES ["txtFile"] ["name"];
			move_uploaded_file($_FILES ["txtFile"] ["tmp_name"],"./uploads/keywordcsv/" . $file_name);
	
			$upfile="./uploads/keywordcsv/$file_name";
			$fp=fopen($upfile,"r");
			$n=0;
	
			while ( $line1=fgets($fp) )
			{
				$importData=str_getcsv($line1,',','"');
	
				if ($importData [0] != '')
				{
					if ($n > 0)
					{
						 
						$txtName=$importData[0];
						$date=date('Y-m-d h:i:s');
	       
						$dataCheck=$this->db->query("Select kewd_name from tblmvbkeywords where kewd_name='".$txtName."'");
						$dataCheck=$dataCheck->result();
						
						if(count($dataCheck)==0)
						{	
							
						
							$date=date('Y-m-d h:i:s');
							$data=array('kewd_name'=>$txtName,
										'kewd_createdDate'=>$date,
										'kewd_createdBy'=>$adminId,
										'kewd_modifiedDate'=>$date,
										'kewd_modifiedBy'=>$adminId,
										'kewd_status'=>'1');
						   $this->db->insert('tblmvbkeywords',$data);
						   
						  
						}		
	
							
					}
						
					$n ++;
						
				}
	
	
			}
	
			return true;
		}
	
	return false;
	
	}
	
	
	

	// --- Function used to add Keyword---//
	public function addlocalKeyword()
	{
		$name=$this->input->post('keyword');
		$id=$this->input->post('keyword_id');
		$language=$this->input->post('selLanguage');
		$admin_id=$this->session->userdata('admin_id');
		$date=date('Y-m-d h:i:s');
		$dataCheck=$this->db->query("DELETE FROM tblmvblocalization where localise_keyId_fk='".$id."'
			                          AND localise_langId_fk='".$language."' ");
		
	
			$data=array('localise_langId_fk'=>$language,
						'localise_keyId_fk'=>$id,
						'localise_keyword'=>$name,
						'localise_createdDate'=>$date,
						'localise_createdBy'=>$admin_id,
					    'localise_modifiedDate'=>$date,
						'localise_modifiedBy'=>$admin_id,
					    'localise_status'=>1);
				
			$this->db->insert('tblmvblocalization',$data);
			$insert_id=$this->db->insert_id();
				
			setSAActivityLogs('Transaction_activity','SALocalization_add');
			return $insert_id;
		
	
	}
	
	// --- Function used to Edit Keyword---//
	public function editlocalKeyword()
	{
	
		$name=$this->input->post('txtEditkeyword');
		$id=$this->input->post('txtEditkeywordid');
		$admin_id=$this->session->userdata('admin_id');
		$date=date('Y-m-d h:i:s');
		$updatedData=" Updated Name:-" . $name."$id".$id;
	
	
			$data=array('localise_keyword'=>$name,
						'localise_modifiedDate'=>$date,
						'localise_modifiedBy'=>$admin_id);
			$this->db->where('localise_id_pk',$id);
			$this->db->update('tblmvblocalization',$data);
			
	
			
			setSAActivityLogs('Transaction_activity','SALocalizationkeywordlocal_Edit',$updatedData);
			
			return true;
	}
	
	
	// --- Function used to Upload csv of groups---//
	function uploadCsv()
	{
		ini_set('auto_detect_line_endings',true);
		if ($_FILES ['txtFile']!='')
		{
			$adminId=$this->session->userdata('admin_id');
			$language=$this->input->post('selLanguage');
	
			setSAActivityLogs('Transaction_activity','SAKeywordscv',"upload By :- ".$adminId);
			$error=array();
			$line_error=1;
			$base_url=base_url();
			$file_name=time() . $_FILES ["txtFile"] ["name"];
			move_uploaded_file($_FILES ["txtFile"] ["tmp_name"],"./uploads/keywordcsv/" . $file_name);
	
			$upfile="./uploads/keywordcsv/$file_name";
			$fp=fopen($upfile,"r");
			$n=0;
	
			while ( $line1=fgets($fp) )
			{
				$importData=str_getcsv($line1,',','"');
	
				if ($importData [0] != '')
				{
					if ($n > 0)
					{
								
							$txtid=$importData[0];
							$txtName=$importData[1];
							$date=date('Y-m-d h:i:s');
	
							$dataCheck=$this->db->query("DELETE FROM tblmvblocalization where localise_keyId_fk='".$txtid."'
			                                             AND localise_langId_fk='".$language."' ");
	
								
	
							
							$data=array('localise_langId_fk'=>$language,
										'localise_keyId_fk'=>$txtid,
										'localise_keyword'=>$txtName,
										'localise_createdDate'=>$date,
										'localise_createdBy'=>$adminId,
									    'localise_modifiedDate'=>$date,
										'localise_modifiedBy'=>$adminId,
									    'localise_status'=>1);
								
							$this->db->insert('tblmvblocalization',$data);
												
	
					
	
							
					}
	
					$n ++;
	
				}
	
	
			}
	
			return true;
		}
	
		return false;
	
	}
	

}
