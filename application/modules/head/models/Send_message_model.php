<?php

class Send_message_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}
	
	// --Function used get all FAQ---//
	public function getAllSendMessage()
	{
		$result=$this->db->query("SELECT sm.smsg_title,sm.smsg_content,sm.smsg_attachment,DATE_FORMAT(sm.smsg_sent_on,'%d-%m-%Y') as sent_on,cl.clnt_name,cl.clnt_mobile,cl.clnt_email from tblmvbsendmessage sm left join tblmvbclients cl on (sm.smsg_client_id_fk=cl.clnt_id_pk) order by sm.smsg_id_pk DESC");
		
		return $result->result();	
	}


	public function getAllClients()
	{
			$result=$this->db->query("SELECT clnt_id_pk,clnt_name from tblmvbclients order by clnt_name DESC");
		
			return $result->result();
	}
	
	// --- Function used to add Faq---//
	public function addSendMessage()
	{

		$client_id=$this->input->post('selClient');
		$title=$this->input->post('txtTitle');
		$content=$this->input->post('txtContent');
		$attachment=$_FILES['fileAttachment']['name'];

		$admin_id=$this->session->userdata('admin_id');

		$date=date('Y-m-d h:i:s');

		move_uploaded_file($_FILES['fileAttachment']['tmp_name'], "./uploads/send_msg_files/" . $attachment);

		chown("./uploads/send_msg_files/" . $attachment,"mvbcellx");
		
		$data=array('smsg_client_id_fk'=>$client_id,'smsg_title'=>$title,'smsg_content'=>$content,'smsg_attachment'=>$attachment,'smsg_sent_on'=>$date,'smsg_sent_by'=>$admin_id);
		
		$this->db->insert('tblmvbsendmessage',$data);
		$insert_id=$this->db->insert_id();

		$message_details=implode(",",$data);

		$log_details="Message Sent Details - ".$message_details;

		//---------------------------------- Start Save Transaction Logs ---------------------------------//

			setSAActivityLogs('Transaction_activity','SA_message_sent_to_client',$log_details);			

		//--------------------------------- End Save Transaction Logs ------------------------------------//
		
		return $insert_id;
	
	}
}
