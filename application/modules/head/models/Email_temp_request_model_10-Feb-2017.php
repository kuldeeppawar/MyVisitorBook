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
				$result=$this->db->query("SELECT st.email_id_pk,ert.etr_id_pk,DATE_FORMAT(ert.etr_requestedDate,'%d/%m/%Y,%h:%i %p') as requested_date,DATE_FORMAT(ert.etr_appr_rejt_date,'%d/%m/%Y,%h:%i %p') as app_rejt_date,st.	email_templateName,st.email_description,cl.clnt_name,ert.etr_status,ert.etr_comment FROM tblmvbemailtemprequest ert 
										 left join tblmvbemailtemplate st on (ert.etr_email_temp_id_fk=st.email_id_pk) 
										 left join tblmvbclients cl on (ert.etr_client_id_fk=cl.clnt_id_pk) order by ert.etr_id_pk");
				
				return $result->result();	
	}

	public function setStatus($value,$email_temp_id,$comment)
	{
			$current_date=date('Y-m-d H:i:s');

			for($str=0;$str<count($email_temp_id);$str++)
			{
						$data=array('etr_comment'=>$comment,'etr_status'=>$value,'etr_appr_rejt_date'=>$current_date);
	
						$this->db->where('etr_id_pk',$email_temp_id[$str]);
						$this->db->update('tblmvbemailtemprequest',$data);
			}

			//---------------------------------- Start Save Transaction Logs ---------------------------//

			$all_sms_temp_request_ids=implode(",",$email_temp_id);

			$transaction_logs_details='';

			$transaction_logs_details.='Status change to '.$value.' for Email Template Request IDs - '.$all_sms_temp_request_ids;

			setSAActivityLogs('Transaction_activity','Email_temp_request_status',$transaction_logs_details);

			//-------------------------------  End Save Transaction Logs ------------------------------//
	}

	public function getTemplateContent($email_temp_id)
	{		
				$result=$this->db->query("SELECT email_description FROM tblmvbemailtemplate where email_id_pk='".$email_temp_id."'");
				
				return $result->result();
	}

}
