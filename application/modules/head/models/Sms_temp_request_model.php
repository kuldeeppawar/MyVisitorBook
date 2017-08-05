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
		$result=$this->db->query("SELECT srt.str_id_pk,DATE_FORMAT(srt.str_requestedDate,'%d/%m/%Y,%h:%i %p') as requested_date,(CASE srt.str_appr_rejt_date WHEN '0000-00-00 00:00:00' THEN '-' ELSE DATE_FORMAT(srt.str_appr_rejt_date,'%d/%m/%Y,%h:%i %p') END) as app_rejt_date,srt.str_template_name,
										 srt.str_description,cl.clnt_name,srt.str_status,srt.str_comment,srt.str_admin_status FROM tblmvbsmstemprequest srt 										 
										 left join tblmvbclients cl on (srt.str_client_id_fk=cl.clnt_id_pk) order by srt.str_id_pk DESC");
		
		return $result->result();
	
	}

	public function setStatus($value,$sms_temp_id,$comment)
	{
		$current_date=date('Y-m-d H:i:s');

		$admin_user_id=$this->session->userdata('admin_id');
		$client_id=$this->session->userdata('client_id');
		
		for($str=0;$str < count($sms_temp_id);$str ++)
		{
			$data=array(
						'str_comment'=>$comment,
						'str_admin_status'=>$value,
						'str_appr_rejt_date'=>$current_date);
			
			$this->db->where('str_id_pk',$sms_temp_id[$str]);
			$this->db->update('tblmvbsmstemprequest',$data);
		}

		for($s=0;$s<count($sms_temp_id);$s++)
		{
				$result_client_details=$this->db->query("SELECT str_client_id_fk,str_branchId_fk FROM tblmvbsmstemprequest where str_id_pk='".$sms_temp_id[$s]."'");
				
				$row_client_details=$result_client_details->result();

				$client_id=$row_client_details[0]->str_client_id_fk;
				$branch_id=$row_client_details[0]->str_branchId_fk;


				$data_notification=array('sntfy_clientId_fk'=>$client_id,
										 'sntfy_branchId_fk'=>$branch_id,
										 'sntfy_createdDate'=>$current_date,
										 'sntfy_admin_id_fk'=>$admin_user_id,
										 'sntfy_show_status'=>'0',
										 'sntfy_request_type'=>'sms_request_approval');
					            
		        $this->db->insert('tblmvbsanotify',$data_notification);
		        
		        $insert_notify_id=$this->db->insert_id();
    	}
		
		// ---------------------------------- Start Save Transaction Logs ---------------------------//
		
		$all_sms_temp_request_ids=implode(",",$sms_temp_id);
		
		$transaction_logs_details='';
		
		$transaction_logs_details.='Status change to ' . $value . ' for SMS Template Request IDs - ' . $all_sms_temp_request_ids;
		
		setSAActivityLogs('Transaction_activity','SMS_temp_request_status',$transaction_logs_details);
		
		// ------------------------------- End Save Transaction Logs ------------------------------//
	}

}
