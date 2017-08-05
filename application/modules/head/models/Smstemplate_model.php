<?php

class Smstemplate_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}
	
	// --Function used get all Email Template---//
	public function getAlltemplate()
	{
		$result=$this->db->query("SELECT tblmvbsmstemplate.sms_id_pk,tblmvbsmstemplate.sms_festId_fk,tblmvbsmstemplate.sms_templateName,tblmvbsmstemplate.sms_description,
				                  tblmvbsmstemplate.sms_nonenglish,tblmvbsmstemplate.sms_charcount,tblmvbsmstemplate.sms_status,tblmvbfestival.fest_name,tblmvbfestival.fest_date,
				                  tblmvbfestival.fest_category from tblmvbsmstemplate LEFT JOIN tblmvbfestival ON tblmvbsmstemplate.sms_festId_fk=tblmvbfestival.fest_id_pk where tblmvbsmstemplate.sms_delete='0' order by tblmvbsmstemplate.sms_id_pk DESC");
		
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
		$description=$this->input->post('txtDescription');
		$template=$this->input->post('txtTemplatename');
		$chkNonenglish=$this->input->post('chkNonenglish');
		$txtCharcount=$this->input->post('txtCharcount');
		$admin_id=$this->session->userdata('admin_id');
		$date=date('Y-m-d h:i:s');
		if($chkNonenglish=="" || $chkNonenglish==null)
		{
			$chkNonenglish=0;
		}
		
		$data=array('sms_festId_fk'=>$festid[0],
					'sms_stateId_fk'=>$stateid,
				    'sms_templateName'=>$template,
				    'sms_description'=>$description,
				    'sms_nonenglish'=>$chkNonenglish,
				    'sms_charcount'=>$txtCharcount,
				    'sms_createdDate'=>$date,
				    'sms_createdBy'=>$admin_id,
				    'sms_modifiedDate'=>$date,
				    'sms_modifiedBy'=>$admin_id,
				    'sms_status'=>'1');
		
		$this->db->insert('tblmvbsmstemplate',$data);
		$insert_id=$this->db->insert_id();
		
		$idlist=implode(",",$data);
		setSAActivityLogs('Transaction_activity','SASmstemplate_add',"Added Data :- ".$idlist);
		
		return $insert_id;
	
	}
	
	// --- Function used to edit Template---//
	public function editTemplate()
	{
		$id=$this->input->post('txtTemplateid');
		$stateid=$this->input->post('selState');
		$festid=$this->input->post('selFestival');
		$festid=explode("/",$festid);
		$description=$this->input->post('txtDescription');
		$template=$this->input->post('txtTemplatename');
		$admin_id=$this->session->userdata('admin_id');
		$date=date('Y-m-d h:i:s');
		$chkNonenglish=$this->input->post('chkNonenglish');
		$txtCharcount=$this->input->post('txtCharcount');
		if($chkNonenglish=="" || $chkNonenglish==null)
		{
			$chkNonenglish=0;
		}
		
		$data=array('sms_festId_fk'=>$festid[0],
					'sms_stateId_fk'=>$stateid,
				    'sms_templateName'=>$template,
				    'sms_description'=>$description,
					'sms_nonenglish'=>$chkNonenglish,
					'sms_charcount'=>$txtCharcount,
				    'sms_modifiedDate'=>$date,
				    'sms_modifiedBy'=>$admin_id
				   );
		
		$this->db->where('sms_id_pk',$id);
		$this->db->update('tblmvbsmstemplate',$data);

		$this->db->query("Update tblmvbsmstemprequest set str_description='".$description."' where 	str_sms_temp_id_fk='".$id."' and str_admin_status='approved' and str_is_edited='0'");
		
		$idlist=implode(",",$data);
		setSAActivityLogs('Transaction_activity','SASmstemplate_edit',"Edited Data :- ".$idlist);
		return true;
	
	}
	
	// --- Function used to change status of Email Template---//
	public function changetemplateStatus($status,$tempId)
	{
		for($i=0;$i < count($tempId);$i ++)
		{
			$data=array('sms_status'=>$status);
			$this->db->where('sms_id_pk',$tempId[$i]);
			$this->db->update('tblmvbsmstemplate',$data);
		}
		
		return true;
	
	}
	
	// --- Function used to change status of Email Template---//
	public function submitPushrevoke($status,$tempId)
	{
		for($i=0;$i < count($tempId);$i ++)
		{
			$data=array('sms_pushRevoke'=>$status);
			$this->db->where('sms_id_pk',$tempId[$i]);
			$this->db->update('tblmvbsmstemplate',$data);
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
												$result_smstempreq_check=$this->db->query("Select str_id_pk from tblmvbsmstemprequest where str_sms_temp_id_fk='".$tempId[$et]."' and str_client_id_fk='".$row_getAllClients[$cl]->clnt_id_pk."' and str_branchId_fk='".$row_getBranchesClients[$bc]->brn_id_pk."'");

												$row_smstempreq_check=$result_smstempreq_check->result();

												if(count($row_smstempreq_check)==0)
												{
													$result_sms_template=$this->db->query("Select * from tblmvbsmstemplate where sms_id_pk='".$tempId[$et]."'");

													$row_sms_template=$result_sms_template->result();

													$data=array('str_client_id_fk'=>$row_getAllClients[$cl]->clnt_id_pk,
															    'str_branchId_fk'=>$row_getBranchesClients[$bc]->brn_id_pk,
															    'str_festId_fk'=>$row_sms_template[0]->sms_festId_fk,
															    'str_template_name'=>$row_sms_template[0]->sms_templatename,
															    'str_description'=>$row_sms_template[0]->sms_description,
															    'str_requestedDate'=>date('Y-m-d H:i:s'),
															    'str_modifiedBy'=>$row_sysuser[0]->sysu_id_pk,
															    'str_modified_date'=>date('Y-m-d H:i:s'),
															    'str_appr_rejt_date'=>date('Y-m-d H:i:s'),
															    'str_admin_status'=>'approved',
															    'str_createdBy'=>$row_sysuser[0]->sysu_id_pk,
															    'str_created_by'=>'superadmin',
															    'str_sms_temp_id_fk'=>$tempId[$et]);
													
													$this->db->insert('tblmvbsmstemprequest',$data);
												}	
										}
							}	
					}

					setSAActivityLogs('Transaction_activity','SASmstemplate_push_to_clients',"SMS Template ids:- ".implode(",",$tempId));
		}
		else
		{
					$template_id=implode(",",$tempId);
				
					$this->db->query("Delete from tblmvbsmstemprequest where find_in_set(str_sms_temp_id_fk,'".$template_id."') and str_admin_status='approved' and str_created_by='superadmin'");
		}
	
		return true;
	
	}
	
	// --- Function used to get Specific Template---//
	public function getTemplate($Id)
	{
		$result=$this->db->query("SELECT tblmvbsmstemplate.sms_id_pk,tblmvbsmstemplate.sms_stateId_fk,tblmvbsmstemplate.sms_festId_fk,tblmvbsmstemplate.sms_templateName,tblmvbsmstemplate.sms_description,
				                  tblmvbsmstemplate.sms_nonenglish,tblmvbsmstemplate.sms_charcount,tblmvbsmstemplate.sms_status,tblmvbfestival.fest_name,tblmvbfestival.fest_date,
				                  tblmvbfestival.fest_category from tblmvbsmstemplate LEFT JOIN tblmvbfestival ON tblmvbsmstemplate.sms_festId_fk=tblmvbfestival.fest_id_pk
				                  WHERE tblmvbsmstemplate.sms_id_pk='".$Id."'");
		
		return $result->result();
	
	}

	public function deleteSTM($template_id)
	{
		   $this->db->query("Update tblmvbsmstemplate set sms_delete='1' where sms_id_pk='".$template_id."'");

		   return true;
	}

	public function getActiveStates()
	{
			$result=$this->db->query("Select * from tblmvbstate where stat_status='1' and stat_delete='0'");

			$row=$result->result();

			return $row;
	}

}
