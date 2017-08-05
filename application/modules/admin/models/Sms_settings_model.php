<?php

class Sms_settings_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}
	
	// --Function used get all FAQ---//
	public function getAllSmsSettings()
	{
				//where ort.optreq_client_id_fk='".$client_id."' and 

				$client_id=$this->session->userdata('client_id');
				$branch_id=$this->session->userdata('branch_id');

				$result=$this->db->query("SELECT str.str_id_pk,DATE_FORMAT(str.str_requestedDate,'%d/%m/%Y,%I:%i %p') as requested_date,DATE_FORMAT(str.str_appr_rejt_date,'%d/%m/%Y,%I:%i %p') as 
					                     app_rejt_date,str.str_template_name,str.str_description,str.str_admin_status as request_status,su.sysu_name as admin_user_name 
					                    FROM tblmvbsmstemprequest str left join tblmvbsystemusers su on (str.str_client_id_fk=su.sysu_id_pk) where str.str_branchId_fk='".$branch_id."' AND str.str_client_id_fk='".$client_id."' order by str.str_id_pk");
			
				return $result->result();	
	}

	public function addSmsSettings()
	{					
					$clientId=$this->session->userdata('client_id');
					$admin_user_id=$this->session->userdata('admin_admin_id');
					$branch_id=$this->session->userdata('branch_id');
					$template_name=$_POST['txttemplatename'];
					$template_content=$_POST['txtemailcontent'];
					$date=date('Y-m-d H:i:s');

					//---------------------------------- Start Save Transaction Logs ---------------------------//			
					setAActivityLogs('Transaction_activity','SMS_settings_add');

					//-------------------------------  End Save Transaction Logs ------------------------------//

					$data=array('str_client_id_fk'=>$clientId,
								'str_template_name'=>$template_name,
								'str_description'=>$template_content,
							    'str_branchId_fk'=>$branch_id,
								'str_requestedDate'=>$date,
								'str_createdBy'=>$admin_user_id);
					$this->db->insert('tblmvbsmstemprequest',$data);
					$insert_id=$this->db->insert_id();

                            $data_notification=array('ntfy_clientId_fk'=>$clientId,
								 'ntfy_createdDate'=>$date,
								 'ntfy_admin_id_fk'=>$admin_user_id,
								 'ntfy_show_status'=>'0',
								 'ntfy_request_type'=>'sms_temp');
			                $this->db->insert('tblmvbnotifyrequest',$data_notification);
			                $insert_notify_id=$this->db->insert_id();					

					return $insert_id;					
	}

	public function editSmsSettings()
	{
					$store_edit_logs='';
					$clientId=$this->session->userdata('client_id');
					$admin_user_id=$this->session->userdata('admin_admin_id');
					$template_name=$_POST['txttemplatename'];
					$template_content=$_POST['txtemailcontent'];
					//$template_content=$_POST['txttemplatecontent'];
					$hidden_temp_id=$_POST['hidden_temp_id'];
					$date=date('Y-m-d H:i:s');

					$store_edit_logs='SMS Template Data Edited for ID - '.$hidden_temp_id.'  Template Name - '.$template_name.' & Description - '.$template_content;

					//--------------------------- Start Save Transaction Logs ---------------------------//			
					setAActivityLogs('Transaction_activity','SMS_settings_edit',$store_edit_logs);

					//--------------------------- End Save Transaction Logs ----------------------------//

                                        $result_exists=$this->db->query("SELECT str_admin_status,str_description,str_template_name FROM tblmvbsmstemprequest WHERE str_id_pk='".$hidden_temp_id . "'");
	 	                        
	 	                        		$row_exists=$result_exists->result();

                                        if($row_exists[0]->str_description==$template_content)
                                        {                                                 
                                                 $admin_status=$row_exists[0]->str_admin_status; 
                                                 $is_edited='0';
                                        }
                                        else
                                        {
                                                 $admin_status='pending';
                                                 $is_edited='1'; 
                                        }

										$data=array('str_template_name'=>$template_name,
													'str_description'=>$template_content,
													'str_modified_date'=>$date,
					                                'str_admin_status'=>$admin_status,  
													'str_modifiedBy'=>$admin_user_id,
													'str_is_edited'=>$is_edited);

										$this->db->where('str_id_pk',$hidden_temp_id);
										$this->db->update('tblmvbsmstemprequest',$data);										

										return true;					
	}


	public function getRecordById($temp_id)
	{
			$result=$this->db->query("SELECT etr_id_pk,etr_template_name,etr_description FROM tblmvbemailtemprequest where etr_id_pk='".$temp_id."'");
				
			$row=$result->result();

			return $row;
	}


	public function deleteSmsTemp($temp_id)
	{		
			$this->db->query("Update tblmvbsmstemprequest set str_status='0' where str_id_pk='".$temp_id."'");

			//-------------------------------- Start Save Transaction Logs ---------------------------//			
				setAActivityLogs('Transaction_activity','SMS_settings_delete');

			//-------------------------------  End Save Transaction Logs ------------------------------//
	}

}
