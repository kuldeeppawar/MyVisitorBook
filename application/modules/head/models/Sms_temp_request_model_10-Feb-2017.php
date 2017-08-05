<?php

class Sms_temp_request_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}
	
	// --Function used get all FAQ---//
	public function getAllSMSTemp()
	{
				$result=$this->db->query("SELECT srt.str_id_pk,DATE_FORMAT(srt.str_requestedDate,'%d/%m/%Y,%h:%i %p') as requested_date,DATE_FORMAT(srt.str_appr_rejt_date,'%d/%m/%Y,%h:%i %p') as app_rejt_date,st.sms_templatename,
										 st.sms_description,cl.clnt_name,srt.str_status,srt.str_comment FROM tblmvbsmstemprequest srt 
										 left join tblmvbsmstemplate st on (srt.str_sms_temp_id_fk=st.sms_id_pk) 
										 left join tblmvbclients cl on (srt.str_client_id_fk=cl.clnt_id_pk) order by srt.str_id_pk");
				
				return $result->result();	
	}

	public function setStatus($value,$sms_temp_id,$comment)
	{
				$current_date=date('Y-m-d H:i:s');

				for($str=0;$str<count($sms_temp_id);$str++)
				{
							$data=array('str_comment'=>$comment,'str_status'=>$value,'str_appr_rejt_date'=>$current_date);
		
							$this->db->where('str_id_pk',$sms_temp_id[$str]);
							$this->db->update('tblmvbsmstemprequest',$data);
				}

				//---------------------------------- Start Save Transaction Logs ---------------------------//

				$all_sms_temp_request_ids=implode(",",$sms_temp_id);

				$transaction_logs_details='';

				$transaction_logs_details.='Status change to '.$value.' for SMS Template Request IDs - '.$all_sms_temp_request_ids;

				setSAActivityLogs('Transaction_activity','SMS_temp_request_status',$transaction_logs_details);

				//-------------------------------  End Save Transaction Logs ------------------------------//
	}

}
