<?php

class Faq_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}
	
	// --Function used get all FAQ---//
	public function getAllFaq()
	{
		$result=$this->db->query("SELECT tblmvbfaqmanagement.faq_id_pk,tblmvbfaqmanagement.faq_question,tblmvbfaqmanagement.faq_description,tblmvbfaqmanagement.faq_createdDate,
				                      tblmvbfaqmanagement.faq_modifiedDate,tblmvbfaqmanagement.faq_status,(select tblmvbsysmainusers.sysmu_username from tblmvbsysmainusers 
				                      where tblmvbfaqmanagement.faq_createdBy=tblmvbsysmainusers.sysmu_id_pk) as created_by, (select tblmvbsysmainusers.sysmu_username from
				                      tblmvbsysmainusers where tblmvbfaqmanagement.faq_modifiedBy=tblmvbsysmainusers.sysmu_id_pk) as modified_by FROM `tblmvbfaqmanagement` 
				                      tblmvbfaqmanagement order by tblmvbfaqmanagement.faq_id_pk DESC");
		
		return $result->result();
	
	}
	
	// --- Function used to add Faq---//
	public function addFaq()
	{
		$title=$this->input->post('txtFaq');
		$description=$this->input->post('summernote');
		$admin_id=$this->session->userdata('admin_id');
		$date=date('Y-m-d h:i:s');
		
		$data=array('faq_question'=>$title,'faq_description'=>$description,'faq_createdDate'=>$date,'faq_createdBy'=>$admin_id,'faq_modifiedDate'=>$date,'faq_modifiedBy'=>$admin_id,'faq_status'=>'1');
		
		$this->db->insert('tblmvbfaqmanagement',$data);
		$insert_id=$this->db->insert_id();
		
		$idlist=implode(",",$data);
		setSAActivityLogs('Transaction_activity','SAFaq_add',"Added Data :-".$idlist);
		return $insert_id;
	
	}
	
	// --- Function used to edit Faq---//
	public function editFaq()
	{
		$id=$this->input->post('txtFaqid');
		$title=$this->input->post('txtFaq');
		$description=$this->input->post('summernote');
		$admin_id=$this->session->userdata('admin_id');
		$date=date('Y-m-d h:i:s');
		
		$data=array('faq_question'=>$title,'faq_description'=>$description,'faq_modifiedDate'=>$date,'faq_modifiedBy'=>$admin_id);
		
		$this->db->where('faq_id_pk',$id);
		$this->db->update('tblmvbfaqmanagement',$data);
		
		$idlist=implode(",",$data);
		setSAActivityLogs('Transaction_activity','SAFaq_edit',"Edit Data :-".$idlist);
		
		return true;
	
	}
	
	// --- Function used to change status of FAQ---//
	public function changefaqStatus($status,$faqId)
	{
		for($i=0;$i < count($faqId);$i ++)
		{
			$data=array('faq_status'=>$status);
			$this->db->where('faq_id_pk',$faqId [$i]);
			$this->db->update('tblmvbfaqmanagement',$data);
		}
		
		return true;
	
	}
	
	// --- Function used to get Specific FAQ---//
	public function getFaq($faqId)
	{
		$result=$this->db->query("SELECT faq_id_pk,faq_question,faq_description from tblmvbfaqmanagement where faq_id_pk='" . $faqId . "'");
		
		return $result->result();
	
	}

}
