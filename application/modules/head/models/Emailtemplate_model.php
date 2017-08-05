<?php

class Emailtemplate_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}
	
	// --Function used get all Email Template---//
	public function getAlltemplate()
	{
		$result=$this->db->query("SELECT tblmvbemailtemplate.email_id_pk,tblmvbemailtemplate.email_festId_fk,tblmvbemailtemplate.email_templateName,
								  tblmvbemailtemplate.email_description,tblmvbemailtemplate.email_status,tblmvbfestival.fest_name,tblmvbfestival.fest_date,
				                  tblmvbfestival.fest_category from tblmvbemailtemplate LEFT JOIN tblmvbfestival ON tblmvbemailtemplate.email_festId_fk=tblmvbfestival.fest_id_pk where tblmvbemailtemplate.email_delete='0' order by tblmvbemailtemplate.email_id_pk DESC");
		
		return $result->result();
	
	}
	
	// --public function used to get active festival list--//
	public function getActivefestival()
	{
		$result=$this->db->query("SELECT fest_id_pk,fest_name,fest_date,fest_status from tblmvbfestival WHERE fest_status='1'");
		return $result->result();
	
	}
	
	// ---Function used to all festival list--//
	public function getAllfestival()
	{
		$result=$this->db->query("SELECT fest_id_pk,fest_name,fest_date,fest_status from tblmvbfestival");
		return $result->result();
	
	}
	
	// --- Function used to add Template---//
	public function addTemplate()
	{
		$festid=$this->input->post('selFestival');
		$stateid=$this->input->post('selState');
		$festid=explode("/",$festid);
		$description=$this->input->post('summernote_1');
		$template=$this->input->post('txtTemplatename');
		$admin_id=$this->session->userdata('admin_id');
		$date=date('Y-m-d h:i:s');
		
		$data=array('email_festId_fk'=>$festid[0],
					'email_stateId_fk'=>$stateid,
				    'email_templateName'=>$template,
				    'email_description'=>$description,
				    'email_createdDate'=>$date,
				    'email_createdBy'=>$admin_id,
				    'email_modifiedDate'=>$date,
				    'email_modifiedBy'=>$admin_id,
				    'email_status'=>'1');
		
		$this->db->insert('tblmvbemailtemplate',$data);
		$insert_id=$this->db->insert_id();
		$idlist=implode(",",$data);
		setSAActivityLogs('Transaction_activity','SAEmailtemplate_add',"Added Data :- ".$idlist);
		return $insert_id;
	}
	
	// --- Function used to edit Template---//
	public function editTemplate()
	{
		$id=$this->input->post('txtTemplateid');
		$stateid=$this->input->post('selState');
		$festid=$this->input->post('selFestival');
		$festid=explode("/",$festid);
		$description=$this->input->post('summernote_1');
		$template=$this->input->post('txtTemplatename');
		$admin_id=$this->session->userdata('admin_id');
		$date=date('Y-m-d h:i:s');
		
		$data=array('email_festId_fk'=>$festid[0],
					'email_stateId_fk'=>$stateid,
				    'email_templateName'=>$template,
				    'email_description'=>$description,
				    'email_modifiedDate'=>$date,
				    'email_modifiedBy'=>$admin_id);
		
		
		$this->db->where('email_id_pk',$id);
		$this->db->update('tblmvbemailtemplate',$data);

		$this->db->query("Update tblmvbemailtemprequest set etr_description='".$description."' where 	etr_email_temp_id_fk='".$id."' and etr_admin_status='approved' and etr_is_edited='0'");

		
		$idlist=implode(",",$data);
		setSAActivityLogs('Transaction_activity','SAEmailtemplate_edit',"Edited Data :- ".$idlist);
		
		return true;
	
	}
	
	// --- Function used to change status of Email Template---//
	public function changetemplateStatus($status,$tempId)
	{
		for($i=0;$i < count($tempId);$i ++)
		{
			$data=array('email_status'=>$status);
			$this->db->where('email_id_pk',$tempId[$i]);
			$this->db->update('tblmvbemailtemplate',$data);
		}
		
		return true;
	
	}
	
	// --- Function used to change status of Email Template---//
	public function submitPushrevoke($status,$tempId)
	{
		for($i=0;$i < count($tempId);$i ++)
		{
			$data=array('email_pushRevoke'=>$status);
			$this->db->where('email_id_pk',$tempId[$i]);
			$this->db->update('tblmvbemailtemplate',$data);
		}

		if($status==1)
		{
					$result_getAllClients=$this->db->query("Select * from tblmvbclients where clnt_status='1'");

					$row_getAllClients=$result_getAllClients->result();


					for($cl=0;$cl<count($row_getAllClients);$cl++)
					{
							$result_getBranchesClients=$this->db->query("Select * from tblmvbbranches where brn_clientId_fk='".$row_getAllClients[$cl]->clnt_id_pk."'");

							$row_getBranchesClients=$result_getBranchesClients->result();


							$result_sysuser=$this->db->query("Select * from tblmvbsystemusers where sysu_clientId_fk='".$row_getAllClients[$cl]->clnt_id_pk."' and sysu_parentClient='1'");

							$row_sysuser=$result_sysuser->result();


							for($bc=0;$bc<count($row_getBranchesClients);$bc++)
							{
										for($et=0;$et<count($tempId);$et++)
										{

												$result_emailtempreq_check=$this->db->query("Select etr_id_pk from tblmvbemailtemprequest where etr_email_temp_id_fk='".$tempId[$et]."' and etr_client_id_fk='".$row_getAllClients[$cl]->clnt_id_pk."' and etr_branchId_fk='".$row_getBranchesClients[$bc]->brn_id_pk."'");

												$row_emailtempreq_check=$result_emailtempreq_check->result();

												
												if(count($row_emailtempreq_check)==0)
												{
													$result_email_template=$this->db->query("Select * from tblmvbemailtemplate where email_id_pk='".$tempId[$et]."'");

													$row_email_template=$result_email_template->result();

													$data=array('etr_client_id_fk'=>$row_getAllClients[$cl]->clnt_id_pk,
															    'etr_branchId_fk'=>$row_getBranchesClients[$bc]->brn_id_pk,
															    'etr_festId_fk'=>$row_email_template[0]->email_festId_fk,
															    'etr_template_name'=>$row_email_template[0]->email_templateName,
															    'etr_description'=>$row_email_template[0]->email_description,
															    'etr_requestedDate'=>date('Y-m-d H:i:s'),
															    'etr_modifiedBy'=>$row_sysuser[0]->sysu_id_pk,
															    'etr_modifiedDate'=>date('Y-m-d H:i:s'),
															    'etr_appr_rejt_date'=>date('Y-m-d H:i:s'),
															    'etr_admin_status'=>'approved',
															    'etr_createdBy'=>$row_sysuser[0]->sysu_id_pk,
															    'etr_created_by'=>'superadmin',
															    'etr_email_temp_id_fk'=>$tempId[$et]);


													$this->db->insert('tblmvbemailtemprequest',$data);

													
												}
										}
							}	
					}

					setSAActivityLogs('Transaction_activity','SAEmailtemplate_push_to_clients',"Email Template ids:- ".implode(",",$tempId));
		}
		else
		{
				$template_id=implode(",",$tempId);
				
				$this->db->query("Delete from tblmvbemailtemprequest where find_in_set(etr_email_temp_id_fk,'".$template_id."') and etr_admin_status='approved' and etr_created_by='superadmin'");		
		}
	
		return true;
	
	}
	
	// --- Function used to get Specific Template---//
	public function getTemplate($Id)
	{
		$result=$this->db->query("SELECT tblmvbemailtemplate.email_id_pk,tblmvbemailtemplate.email_stateId_fk,tblmvbemailtemplate.email_festId_fk,tblmvbemailtemplate.email_templateName,
								  tblmvbemailtemplate.email_description,tblmvbemailtemplate.email_status,tblmvbfestival.fest_name,tblmvbfestival.fest_date,
				                  tblmvbfestival.fest_category from tblmvbemailtemplate LEFT JOIN tblmvbfestival ON tblmvbemailtemplate.email_festId_fk=tblmvbfestival.fest_id_pk
				                  WHERE tblmvbemailtemplate.email_id_pk='".$Id."'");
		
		return $result->result();
	
	}

	public function deleteETM($template_id)
	{
		   $this->db->query("Update tblmvbemailtemplate set email_delete='1' where email_id_pk='".$template_id."'");

		   return true;
	}


	public function getActiveStates()
	{
			$result=$this->db->query("Select * from tblmvbstate where stat_status='1' and stat_delete='0'");

			$row=$result->result();

			return $row;
	}

}
