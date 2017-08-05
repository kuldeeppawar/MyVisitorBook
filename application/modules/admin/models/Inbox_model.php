<?php

class Inbox_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}
	
	// --Function used get all FAQ---//
	public function getAllInboxMessage()
	{
		$client_id=$this->session->userdata('client_id');

		$result=$this->db->query("SELECT sm.smsg_title,sm.smsg_content,sm.smsg_attachment,DATE_FORMAT(sm.smsg_sent_on,'%d-%m-%Y') as receive_on from tblmvbsendmessage sm where sm.smsg_client_id_fk='".$client_id."' order by sm.smsg_sent_on DESC");
		
		return $result->result();	
	}


	public function getAllClients()
	{
			$result=$this->db->query("SELECT clnt_id_pk,clnt_name from tblmvbclients order by clnt_name DESC");
		
			return $result->result();
	}
	
}
