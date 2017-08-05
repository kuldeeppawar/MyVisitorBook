<?php

class Newsletter_management_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	// --Function used get all FAQ---//
	public function getAllNewsletter()
	{
		$result=$this->db->query("SELECT sb_email,sb_id_pk,DATE_FORMAT(sb_subscribe_date,'%d/%m/%Y,%h:%i %p') as subscribe_date,
			                      DATE_FORMAT(sb_unsubscribe_date,'%d/%m/%Y,%h:%i %p') as unsubscribe_date,(CASE sb_status WHEN 0 
			                      THEN 'Subscribed' WHEN 1 THEN 'Unsubscribed' END) as status FROM tblmvbsubscription order by sb_id_pk");
		return $result->result();
	}

	public function sendNewsletter($newsletter_id,$subject,$description,$email_send_mandrill)
	{

		$created_date=date('Y-m-d H:i:s');
	    $data=array('tblnll_email'=>$newsletter_id,
	    			'tblnll_subject'=>$subject,
	    			'tblnll_decription'=>$description,
	    			'tblnll_sent_status'=>$email_send_mandrill[0]->sent,
	    			'tblnll_reject_reason'=>$email_send_mandrill[0]->reject_reason,
	    			'tblnll_status_id'=>$email_send_mandrill[0]->_id,
					'tblnll_createdDate'=>$created_date);
	
	    $this->db->insert('tblmvbnewsletterlogs',$data);
		$insert_id=$this->db->insert_id();
	
	}
	
	
	//----function used to get subscribed userd----//
	public function getSubscribeduser()
	{
		$result=$this->db->query("SELECT sb_email FROM tblmvbsubscription WHERE sb_status='1' order by sb_id_pk");
		return $result->result();
		
	}

}
