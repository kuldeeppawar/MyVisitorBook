<?php

class Email_settings_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}
	
	// --Function used get all FAQ---//
	public function getAllEmailSettings()
	{
				//where ort.optreq_client_id_fk='".$client_id."' and 

				$client_id=$this->session->userdata('client_id');
				$branchId=$this->session->userdata('branch_id');

				$result=$this->db->query("SELECT etr.etr_id_pk,DATE_FORMAT(etr.etr_requestedDate,'%d/%m/%Y,%I:%i %p') as requested_date,DATE_FORMAT(etr.etr_appr_rejt_date,'%d/%m/%Y,%I:%i %p')
					                      as app_rejt_date,etr.etr_template_name,etr.etr_admin_status as request_status FROM tblmvbemailtemprequest etr where etr.etr_status='1' 
					                      AND etr_branchId_fk='".$branchId."' AND etr_client_id_fk='".$client_id."' order by etr.etr_id_pk");
				
				return $result->result();	
	}

	public function addEmailSettings()
	{					
					$clientId=$this->session->userdata('client_id');
					$admin_user_id=$this->session->userdata('admin_admin_id');
					$template_name=$_POST['txttemplatename'];
					$template_content=$_POST['txtemailcontent'];
					$date=date('Y-m-d H:i:s');
					$branchId=$this->session->userdata('branch_id');

					//---------------------------------- Start Save Transaction Logs ---------------------------//			
					setAActivityLogs('Transaction_activity','Email_settings_add');

					//-------------------------------  End Save Transaction Logs ------------------------------//

					$data=array('etr_client_id_fk'=>$clientId,
								'etr_template_name'=>$template_name,
								'etr_description'=>$template_content,
								'etr_requestedDate'=>$date,
							    'etr_branchId_fk'=>$branchId,
								'etr_createdBy'=>$admin_user_id,
							    'etr_modifiedDate'=>$date,
							    'etr_modifiedBy'=>$admin_user_id
							   );
					$this->db->insert('tblmvbemailtemprequest',$data);
					$insert_id=$this->db->insert_id();

                    $data_notification=array('ntfy_clientId_fk'=>$clientId,
								 'ntfy_createdDate'=>$date,
								 'ntfy_admin_id_fk'=>$admin_user_id,
								 'ntfy_show_status'=>'0',
								 'ntfy_request_type'=>'email_temp');
			                $this->db->insert('tblmvbnotifyrequest',$data_notification);
			                $insert_notify_id=$this->db->insert_id();  					

					return $insert_id;					
	}

	public function editEmailSettings()
	{					
					$store_edit_logs='';
					$clientId=$this->session->userdata('client_id');
					$admin_user_id=$this->session->userdata('admin_admin_id');
					$template_name=$_POST['txttemplatename'];
					$template_content=$_POST['txttemplatecontent'];
					$hidden_temp_id=$_POST['hidden_temp_id'];
					$date=date('Y-m-d H:i:s');

					$store_edit_logs='Email Template Data Edited for ID - '.$hidden_temp_id.'  Template Name - '.$template_name.' & Description - '.$template_content;


					//--------------------------- Start Save Transaction Logs ---------------------------//			
					setAActivityLogs('Transaction_activity','Email_settings_edit',$store_edit_logs);

					//--------------------------- End Save Transaction Logs ----------------------------//

                                $result_exists=$this->db->query("SELECT etr_admin_status,etr_description,etr_template_name FROM tblmvbemailtemprequest WHERE etr_id_pk='".$hidden_temp_id . "'");
	 	                        
	 	                        $row_exists=$result_exists->result();

                                if($row_exists[0]->etr_description==$template_content)
                                {                                                 
                                         $admin_status=$row_exists[0]->etr_admin_status; 
                                         $is_edited='0';
                                }
                                else
                                {
                                         $admin_status='pending'; 
                                         $is_edited='1';
                                } 

								$data=array('etr_template_name'=>$template_name,
											'etr_description'=>$template_content,
											'etr_modifiedDate'=>$date,
			                                'etr_admin_status'=>$admin_status,
											'etr_modifiedBy'=>$admin_user_id,
											'etr_is_edited'=>$is_edited);

								$this->db->where('ert_id_pk',$hidden_temp_id);
								$this->db->update('tblmvbemailtemprequest',$data);										
								return true;					
	}


	public function getRecordById($temp_id)
	{
			$result=$this->db->query("SELECT etr_id_pk,etr_template_name,etr_description FROM tblmvbemailtemprequest where etr_id_pk='".$temp_id."'");
				
			$row=$result->result();

			return $row;
	}


	public function deleteEmailTemp($temp_id)
	{		
			$this->db->query("Update tblmvbemailtemprequest set etr_status='0' where etr_id_pk='".$temp_id."'");

			//-------------------------------- Start Save Transaction Logs ---------------------------//			
				setAActivityLogs('Transaction_activity','Email_settings_delete',"Deleted Id:-".$temp_id);

			//-------------------------------  End Save Transaction Logs ------------------------------//
	}

}
