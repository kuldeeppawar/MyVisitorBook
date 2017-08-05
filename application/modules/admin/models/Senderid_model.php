<?php

class Senderid_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}
	
	// --Function used get all Senderid list---//
	public function getAllsenderid()
	{
		
		$clientId=$this->session->userdata('client_id');
		
		
		$result=$this->db->query("SELECT `sid_id_pk`,`sid_default` ,`sid_clientId_fk`, `sid_content`, `sid_createdDate`, `sid_createdBy`, `sid_modifiedDate`, `sid_modifiedBy`, 
				                 `sid_status`, `sid_adminStatus` FROM `tblmvbsenderid` WHERE sid_clientId_fk='".$clientId."'");
		
		return $result->result();
	
	}
	
	// --Function used get Specific id Details---//
	public function getSpecificSenderid($id)
	{
	
		$result=$this->db->query("SELECT `sid_id_pk`,`sid_default` ,`sid_clientId_fk`, `sid_content`, `sid_createdDate`, `sid_createdBy`, `sid_modifiedDate`, `sid_modifiedBy`, 
				                 `sid_status`, `sid_adminStatus` FROM `tblmvbsenderid` WHERE sid_id_pk='".$id."'");
	
		return $result->result();
	
	}
	

	//-----check Sender Id is Present o not----//
	public function checkSenderid($id)
	{
		$result=$this->db->query("SELECT `sid_id_pk`,`sid_default` ,`sid_clientId_fk`, `sid_content`, `sid_createdDate`, `sid_createdBy`, `sid_modifiedDate`, `sid_modifiedBy`,
				                 `sid_status`, `sid_adminStatus` FROM `tblmvbsenderid` WHERE sid_clientId_fk='".$id."'");
		
		return $result->result();
	}
	
	// --- Function used to add Sender id---//
	public function addSenderid()
	{
		$senderId=$this->input->post('txtSenderid');
		$adminId=$this->session->userdata('admin_admin_id');
		$clientId=$this->session->userdata('client_id');
		$date=date('Y-m-d h:i:s');
	
		$verify=$this->checkSenderid($senderId);
		if(count($verify)==0)
		{	
			$data=array('sid_clientId_fk'=>$adminId,
						'sid_content'=>$senderId,
						'sid_requestDate'=>$date,
						'sid_createdBy'=>$adminId,
						'sid_modifiedDate'=>$date,
						'sid_modifiedBy'=>$adminId,
					    'sid_default'=>0,
						'sid_status'=>1,
						'sid_adminStatus'=>'pending',
						'sid_created_by'=>'admin');
			$this->db->insert('tblmvbsenderidrequest',$data);
			$insert_id=$this->db->insert_id();

            $data_notification=array('ntfy_clientId_fk'=>$clientId,
						             'ntfy_createdDate'=>$date,
						             'ntfy_admin_id_fk'=>$adminId,
						             'ntfy_show_status'=>'0',
						             'ntfy_request_type'=>'sender_id');
			$this->db->insert('tblmvbnotifyrequest',$data_notification);
			$insert_notify_id=$this->db->insert_id();
			
			$idlist=explode(",",$data);
			setAActivityLogs('Transaction_activity','AAsenderid_Add','Added Data:-'.$idlist.'id is:-'.$insert_id);
			return $insert_id;
		}
		else 
		{
			return false;
		}	
	}
	
	// --- Function used to edit id---//
	public function editSenderid()
	{
		$id=$this->input->post('txtId');
		$senderId=$this->input->post('txtSenderid');
		$adminId=$this->session->userdata('admin_admin_id');
		$clientId=$this->session->userdata('client_id');
		$date=date('Y-m-d h:i:s');

		$result_senderid_exists=$this->db->query("Select sid_content,sid_admin_status from tblmvbsenderidrequest where sid_id_pk='".$id."'");

		$row_senderid_exists=$result_senderid_exists->result();

		$senderid_exists=$row_senderid_exists[0]->sid_content;

		if($senderid_exists!=$senderId)
		{
				$senderid_approve_status='pending';
		}
		else
		{
				$senderid_approve_status=$row_senderid_exists[0]->sid_admin_status;
		}
		
		$data=array('sid_content'=>$senderId,
					'sid_modifiedDate'=>$date,
					'sid_modifiedBy'=>$adminId,
					'sid_admin_status'=>$senderid_approve_status);
		$this->db->where('sid_id_pk',$id);
		$this->db->update('tblmvbsenderidrequest',$data);


		if($senderid_exists!=$senderId)
		{
				$data_notification=array('ntfy_clientId_fk'=>$clientId,
								         'ntfy_createdDate'=>$date,
								         'ntfy_admin_id_fk'=>$adminId,
								         'ntfy_show_status'=>'0',
								         'ntfy_request_type'=>'sender_id');
				$this->db->insert('tblmvbnotifyrequest',$data_notification);
				$insert_notify_id=$this->db->insert_id();
		}


        setAActivityLogs('Transaction_activity','AAsenderid_Edit','Edited Data:-'.implode(",",$data).'id is:-'.$id); 

		return $id;
	}
	
	
    // --functin used to deactivate/activate id status--//
	public function changeIdstatus($status,$senderid)
	{
		for($i=0;$i < count($senderid);$i ++)
		{
			$data=array('sid_status'=>$status);
			$this->db->where('sid_id_pk',$senderid[$i]);
			
			$this->db->update('tblmvbsenderid',$data);
		
			setAActivityLogs('Transaction_activity','AAsenderid_Change_id_status','Status Data Changed:-'.implode(",",$data).'id is:-'.$senderid[$i]);
		}
		
		return true;
	
	}
	

	


	

	// --functin used to set default sign--//
	public function setDefaultid($senderId)
	{
		    $clientId=$this->session->userdata('client_id');
		    $this->db->query(" UPDATE tblmvbsenderid SET sid_default='0'  WHERE sid_clientId_fk='".$clientId."'  ");
		    $data=array('sid_default'=>1);
			$this->db->where('sid_id_pk',$senderId);
	
			$this->db->update('tblmvbsenderid',$data);

			setAActivityLogs('Transaction_activity','AAsenderid_Default_id','Default id Changed:-'.implode(",",$data).'id is:-'.$senderId);
		
		return true;
	
	}
}
	

