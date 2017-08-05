<?php

class Senderid_request_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}
	
	// --Function used get all FAQ---//
	public function getAllSenderidRequest()
	{
				$result=$this->db->query("SELECT str.sid_id_pk,DATE_FORMAT(cl.sysu_createdDate,'%d/%m/%Y,%h:%i %p') as created_date,CONCAT(cl.sysu_name,' ',cl.sysu_lname) as clnt_name,str.sid_id_pk,DATE_FORMAT(str.sid_requestDate,'%d/%m/%Y,%h:%i %p') as requested_date,(CASE str.sid_app_rej_date WHEN '0000-00-00 00:00:00' THEN '-' ELSE DATE_FORMAT(str.sid_app_rej_date,'%d/%m/%Y,%h:%i %p') END) as app_rejt_date,str.sid_content,str.sid_comment,(CASE str.sid_admin_status WHEN 0 THEN 'Pending' WHEN 1 THEN 'Approved' WHEN 2 THEN 'Rejected' END) as request_status,str.sid_comment FROM tblmvbsenderidrequest str left join tblmvbsystemusers cl on (str.sid_clientId_fk=cl.sysu_id_pk) order by str.sid_id_pk");
				
				return $result->result();	
	}

	public function setStatus($value,$optreq_id,$comment)
	{
				$current_date=date('Y-m-d H:i:s');

				for($str=0;$str<count($optreq_id);$str++)
				{
						$data=array('sid_comment'=>$comment,'sid_admin_status'=>$value,'sid_app_rej_date'=>$current_date);
		
						$this->db->where('sid_id_pk',$optreq_id[$str]);
						$this->db->update('tblmvbsenderidrequest',$data);
				}

				//---------------------------------- Start Save Transaction Logs ---------------------------//

				$all_sms_temp_request_ids=implode(",",$optreq_id);

				$transaction_logs_details='';

				$transaction_logs_details.='Status change to '.$value.' for Senderid Request IDs - '.$all_sms_temp_request_ids;

				setSAActivityLogs('Transaction_activity','Senderid_request_status',$transaction_logs_details);

				//-------------------------------  End Save Transaction Logs ------------------------------//
	}

	
}
