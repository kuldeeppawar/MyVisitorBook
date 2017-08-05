<?php

class Email_temp_request_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}
	
	// --Function used get all FAQ---//
	public function getAllEmailTemp()
	{
				$result=$this->db->query("SELECT ert.etr_id_pk,DATE_FORMAT(ert.etr_requestedDate,'%d/%m/%Y,%h:%i %p') as requested_date,(CASE ert.etr_appr_rejt_date WHEN '0000-00-00 00:00:00' THEN '-' ELSE DATE_FORMAT(ert.etr_appr_rejt_date,'%d/%m/%Y,%h:%i %p') END) as app_rejt_date,ert.etr_template_name,ert.etr_description,cl.clnt_name,ert.etr_status,ert.etr_comment,ert.etr_admin_status FROM tblmvbemailtemprequest ert 
										 left join tblmvbclients cl on (ert.etr_client_id_fk=cl.clnt_id_pk) order by ert.etr_id_pk DESC");
				
				return $result->result();	
	}

	public function setStatus($value,$email_temp_id,$comment)
	{
			$current_date=date('Y-m-d H:i:s');

			$admin_user_id=$this->session->userdata('admin_id');
			

			for($str=0;$str<count($email_temp_id);$str++)
			{
						$data=array('etr_comment'=>$comment,'etr_admin_status'=>$value,'etr_appr_rejt_date'=>$current_date);
	
						$this->db->where('etr_id_pk',$email_temp_id[$str]);
						$this->db->update('tblmvbemailtemprequest',$data);				
			}

			for($s=0;$s<count($email_temp_id);$s++)
			{
					$result_client_details=$this->db->query("SELECT etr_client_id_fk,etr_branchId_fk FROM tblmvbemailtemprequest where etr_id_pk='".$email_temp_id[$s]."'");
				
					$row_client_details=$result_client_details->result();

					$client_id=$row_client_details[0]->etr_client_id_fk;
					$branch_id=$row_client_details[0]->etr_branchId_fk;

					$data_notification=array('sntfy_clientId_fk'=>$client_id,
											 'sntfy_branchId_fk'=>$branch_id,
											 'sntfy_createdDate'=>$current_date,
											 'sntfy_admin_id_fk'=>$admin_user_id,
											 'sntfy_show_status'=>'0',
											 'sntfy_request_type'=>'email_request_approval');
					            
		            $this->db->insert('tblmvbsanotify',$data_notification);
		            
		            $insert_notify_id=$this->db->insert_id();
        	}

			//---------------------------------- Start Save Transaction Logs ---------------------------//

			$all_sms_temp_request_ids=implode(",",$email_temp_id);

			$transaction_logs_details='';

			$transaction_logs_details.='Status change to '.$value.' for Email Template Request IDs - '.$all_sms_temp_request_ids;

			setSAActivityLogs('Transaction_activity','Email_temp_request_status',$transaction_logs_details);

			//-------------------------------  End Save Transaction Logs ------------------------------//

			return true;
	}

	public function getTemplateContent($email_temp_id)
	{		
				$result=$this->db->query("SELECT etr_description FROM tblmvbemailtemprequest where etr_id_pk='".$email_temp_id."'");
				
				return $result->result();
	}

}
