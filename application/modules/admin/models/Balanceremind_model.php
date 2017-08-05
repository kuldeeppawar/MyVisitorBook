<?php
class Balanceremind_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}
	
	// --Function used get getClientreminder---//
	public function getClientreminder()
	{
		
		$clientId=$this->session->userdata('client_id');
		$branchId=$this->session->userdata('branch_id');
		
		
		$result=$this->db->query("SELECT `balance_id_pk`, `balance_clientId_fk`, `balance_smsValue`, `balance_smsMode`, `balance_emailValue`, `balance_emailMode`,
				                  `balance_createdDate`, `balance_createdBy`, `balance_status` FROM `tblbalancereminder` WHERE balance_clientId_fk='".$clientId."'
			                        ");
		
		return $result->result();
	
	}
	

	

	// --- Function used to add Sender id---//
	public function addBalance()
	{
	
		$sms=$this->input->post('txtSms');
		$smsMode=$this->input->post('btnsmsMode');
		$email=$this->input->post('txtEmail');
		$emailMode=$this->input->post('btnemailMode');
		$adminId=$this->session->userdata('admin_admin_id');
		$clientId=$this->session->userdata('client_id');
		$branchId=$this->session->userdata('branch_id');
		$date=date('Y-m-d h:i:s');
		

		$this->db->query("DELETE FROM tblbalancereminder WHERE balance_clientId_fk='".$clientId."' AND balance_branchId_fk='".$branchId."'");
		
			$data=array('balance_clientId_fk'=>$clientId,
						'balance_smsValue'=>$sms,
						'balance_smsMode'=>$smsMode,
						'balance_emailValue'=>$email,
						'balance_emailMode'=>$emailMode,
					    'balance_branchId_fk'=>$branchId,
						'balance_createdDate'=>$date,
					    'balance_createdBy'=>$adminId,
						'balance_status'=>1);
			$this->db->insert('tblbalancereminder',$data);
			$insert_id=$this->db->insert_id();
			$otherdata=$otherdata.implode(",",$data);
			setAActivityLogs('Transaction_activity','AAddBalanceRemind_Add',"Added Data :- ".$insert_id."  field Values:-".$otherdata);
			return $insert_id;
	
	}
	
	
}
	

