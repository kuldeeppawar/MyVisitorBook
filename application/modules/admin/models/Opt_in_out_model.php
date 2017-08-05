<?php

class Opt_in_out_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}
	
	// --Function used get all FAQ---//
	public function getAllOPT()
	{
		// where ort.optreq_client_id_fk='".$client_id."' and
		$client_id=$this->session->userdata('client_id');
		$branch_id=$this->session->userdata('branch_id');
		$result=$this->db->query("SELECT ort.optreq_id_pk,DATE_FORMAT(ort.optreq_requestDate,'%d/%m/%Y,%I:%i %p') as requested_date,
			                      DATE_FORMAT(ort.optreq_app_rej_date,'%d/%m/%Y,%I:%i %p') as app_rejt_date,ort.optreq_opt_name,
			                     (CASE ort.optreq_admin_status WHEN 0 THEN 'Pending' WHEN 1 THEN 'Approved' WHEN 2 THEN 'Rejected' END) 
			                      as request_status FROM tblmvboptrequest ort where ort.optreq_status='0' AND
			                      ort.optreq_client_id_fk='".$client_id."' AND ort.optreq_branchId_fk='".$branch_id."'
			                      order by ort.optreq_id_pk");
		
		return $result->result();
	
	}

	public function addOptInOut()
	{
		$clientId=$this->session->userdata('client_id');
		$branchId=$this->session->userdata('branch_id');
		$admin_user_id=$this->session->userdata('admin_admin_id');
		$opt_name=$_POST['txtoptname'];
		$date=date('Y-m-d H:i:s');
		
		// ---------------------------------- Start Save Transaction Logs ---------------------------//
		setAActivityLogs('Transaction_activity','OPT_in_out_add');
		
		// ------------------------------- End Save Transaction Logs ------------------------------//
		
		$data=array(
					'optreq_client_id_fk'=>$clientId,
				    'optreq_branchId_fk'=>$branchId,
					'optreq_opt_name'=>$opt_name,
					'optreq_requestDate'=>$date);
		$this->db->insert('tblmvboptrequest',$data);
		$insert_id=$this->db->insert_id();

                $data_notification=array('ntfy_clientId_fk'=>$clientId,
					 'ntfy_createdDate'=>$date,
					 'ntfy_admin_id_fk'=>$admin_user_id,
					 'ntfy_show_status'=>'0',
					 'ntfy_request_type'=>'opt_request');
		$this->db->insert('tblmvbnotifyrequest',$data_notification);
		$insert_notify_id=$this->db->insert_id();
		
		return $insert_id;
	
	}

	public function deleteOptInOut($opt_id)
	{
		$this->db->query("Update tblmvboptrequest set optreq_status='1' where optreq_id_pk='" . $opt_id . "'");
		
		// -------------------------------- Start Save Transaction Logs ---------------------------//
		setAActivityLogs('Transaction_activity','OPT_in_out_delete');
		
		// ------------------------------- End Save Transaction Logs ------------------------------//
	}

}
