<?php

class Branch_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}
	
	// --Function used get all Branch---//
	public function getAllBranch()
	{
		$clientId=$this->session->userdata('client_id');
		$result=$this->db->query("SELECT tblmvbbranches.brn_id_pk,tblmvbbranches.brn_name,tblmvbbranches.brn_cityId_fk,tblmvbbranches.brn_address, tblmvbbranches.brn_smsCredit,
				                  tblmvbbranches.brn_emailCredit,tblmvbbranches.brn_validity,tblmvbbranches.brn_status, tblmvbcity.cty_name ,
				                  (SELECT COUNT(tblmvbsystemusers.sysu_id_pk) FROM tblmvbsystemusers WHERE tblmvbsystemusers.sysu_branchId_fk=tblmvbbranches.brn_id_pk) 
				                  as userCount, (SELECT COUNT(tblmvbvisitors.vis_id_pk) FROM tblmvbvisitors WHERE tblmvbvisitors.vis_branchId_fk=tblmvbbranches.brn_id_pk)
				                  as visiterCount FROM tblmvbbranches LEFT JOIN tblmvbcity on tblmvbbranches.brn_cityId_fk=tblmvbcity.cty_id_pk LEFT JOIN tblmvbsystemusers
				                  ON tblmvbsystemusers.sysu_branchId_fk=tblmvbbranches.brn_id_pk LEFT JOIN tblmvbvisitors on tblmvbvisitors.vis_branchId_fk=tblmvbbranches.brn_id_pk 
				                  WHERE tblmvbbranches.brn_clientId_fk ='" . $clientId . "' group by tblmvbbranches.brn_id_pk ");
		
		return $result->result();
	
	}
	
	// --function used to get specific branch details---//
	public function getBranchdetails($id)
	{
		$result=$this->db->query("SELECT brn_id_pk,brn_name,brn_cityId_fk,brn_address,brn_smsCredit,brn_isChildBranch,brn_emailCredit,brn_validity,brn_status
				                  FROM tblmvbbranches WHERE brn_id_pk='" . $id . "'");
		
		return $result->result();
	
	}
	
	// --function used to get parent branch--//
	public function getParentbranch()
	{
		$clientId=$this->session->userdata('client_id');
		
		$result=$this->db->query("SELECT brn_id_pk FROM tblmvbbranches WHERE brn_clientId_fk='" . $clientId . "'");
		
		return $result->result();
	
	}
	
	// -- function get Active cities --//
	public function getActivecity()
	{
		$result=$this->db->query("select cty_id_pk,cty_name,cty_status from tblmvbcity Where cty_status='1'");
		return $result->result();
	
	}
	
	// -- function get All Cities --//
	public function getAllcity()
	{
		$result=$this->db->query("select cty_id_pk,cty_name,cty_status from tblmvbcity");
		return $result->result();
	
	}
	
	// --function used to get specific -//
	public function getSpecificcity($id)
	{
		$result=$this->db->query("SELECT cty_countryId_fk,cty_stateId_fk FROM tblmvbcity WHERE cty_id_pk='" . $id . "'");
		return $result->result();
	
	}
	
	// --Function used to get sms/email credits to package --//
	public function getCreditdetails()
	{
		$clientId=$this->session->userdata('client_id');
		$result=$this->db->query("SELECT clnt_totalSmsCredit,clnt_totalEmailCredit FROM `tblmvbclients` WHERE clnt_id_pk='" . $clientId . "'");
		return $result->result();
	
	}
	
	// --- Function used to add Branch---//
	public function addBranch()
	{
		$branchName=$this->input->post('txtBranch');
		$branchAddress=$this->input->post('txtAddress');
		$branchCity=$this->input->post('selCity');
		$branchsmsCredit=$this->input->post('txtSmscredit');
		$branchEmailcredit=$this->input->post('txtEmailcredit');
		$city_details=$this->getSpecificcity($branchCity);
		$branchCountry=$city_details[0]->cty_countryId_fk;
		$branchState=$city_details[0]->cty_stateId_fk;
		$parentBranch=$this->getParentbranch();
		$adminId=$this->session->userdata('admin_admin_id');
		$clientId=$this->session->userdata('client_id');
		$parentClient=$this->session->userdata('parent_client');
		$date=date('Y-m-d h:i:s');
		
		$childbranch=0;
		
		if (count($parentBranch) > 0)
		{
			
			$data=array(
						'brn_clientId_fk'=>$clientId,
						'brn_name'=>$branchName,
						'brn_countryId_fk'=>$branchCountry,
						'brn_stateId_fk'=>$branchState,
						'brn_cityId_fk'=>$branchCity,
						'brn_address'=>$branchAddress,
						'brn_smsCredit'=>$branchsmsCredit,
						'brn_emailCredit'=>$branchEmailcredit,
						'brn_validity'=>90,
						'brn_isChildBranch'=>1,
						'brn_parenBranchId_fk'=>$parentBranch[0]->brn_id_pk,
						'brn_createdDate'=>$date,
						'brn_createdBy'=>$adminId,
						'brn_modifiedDate'=>$date,
						'brn_modifiedBy'=>$adminId,
						'brn_status'=>1);
			$this->db->insert('tblmvbbranches',$data);
			$insert_id=$this->db->insert_id();
			
			$idlist=implode(",",$data);
			setAActivityLogs('Transaction_activity','AABranch_add',"Added Branch Id=" . $insert_id . "Data:-" . $idlist);
		} else
		{
			
			$data=array(
						'brn_clientId_fk'=>$clientId,
						'brn_name'=>$branchName,
						'brn_countryId_fk'=>$branchCountry,
						'brn_stateId_fk'=>$branchState,
						'brn_cityId_fk'=>$branchCity,
						'brn_address'=>$branchAddress,
						'brn_smsCredit'=>$branchsmsCredit,
						'brn_emailCredit'=>$branchEmailcredit,
						'brn_validity'=>90,
						'brn_isChildBranch'=>0,
						'brn_createdDate'=>$date,
						'brn_createdBy'=>$adminId,
						'brn_modifiedDate'=>$date,
						'brn_modifiedBy'=>$adminId,
						'brn_status'=>1);
			$this->db->insert('tblmvbbranches',$data);
			$insert_id=$this->db->insert_id();
			
			$this->db->query("UPDATE tblmvbbranches SET brn_parenBranchId_fk='" . $insert_id . "'
					          WHERE brn_id_pk='" . $insert_id . "'");
			
			$idlist=explode(",",$data);
			setAActivityLogs('Transaction_activity','AABranch_add',"Added Branch Id=" . $insert_id . "Data:-" . $idlist);
		}
		
		// /transaction for sms and email
		$data=array(
					'brcr_brnId_fk'=>$insert_id,
					'brcr_clntId_fk'=>$clientId,
					'brcr_smsCredit'=>$branchsmsCredit,
					'brcr_emailCredit'=>$branchEmailcredit,
					'brcr_transactionDate'=>$date,
					'brcr_transactionBy'=>$adminId,
					'brcr_transactionType'=>'Credit',
					'brcr_status'=>1);
		$this->db->insert('tblmvbbranchcredit',$data);
		
		$this->db->query("UPDATE tblmvbclients SET clnt_totalSmsCredit=clnt_totalSmsCredit-'" . $branchsmsCredit . "',
				          clnt_totalEmailCredit=clnt_totalEmailCredit-'" . $branchEmailcredit . "'  WHERE clnt_id_pk='" . $clientId . "' ");
		
		return $insert_id;
	
	}
	
	// --- Function used to edit Branch---//
	public function editBranch()
	{
		$branchName=$this->input->post('txtBranch');
		$branchId=$this->input->post('txtBranchid');
		$branchAddress=$this->input->post('txtAddress');
		$branchCity=$this->input->post('selCity');
		$branchsmsCredit=$this->input->post('txtSmscredit');
		$branchEmailcredit=$this->input->post('txtEmailcredit');
		$branchsmsCredit=$this->input->post('txtSmscredit');
		$branchEmailcredit=$this->input->post('txtEmailcredit');
		$brancholdsms=$this->input->post('txtoldSms');
		$brancholdEmail=$this->input->post('txtoldEmail');
		
		$resultCredit=$this->getCreditdetails();
		
		$clientSMS=$resultCredit[0]->clnt_totalSmsCredit;
		$clientEmail=$resultCredit[0]->clnt_totalEmailCredit;
		$clientId=$this->session->userdata('client_id');
		$adminId=$this->session->userdata('admin_admin_id');
		$clientEmailnew=$clientSMSnew=0;
		
		$city_details=$this->getSpecificcity($branchCity);
		
		$branchCountry=$city_details[0]->cty_countryId_fk;
		$branchState=$city_details[0]->cty_stateId_fk;
		
		$admin_id=$this->session->userdata('admin_admin_id');
		$date=date('Y-m-d h:i:s');
		
		$data=array(
					'brn_clientId_fk'=>$clientId,
					'brn_name'=>$branchName,
					'brn_countryId_fk'=>$branchCountry,
					'brn_stateId_fk'=>$branchState,
					'brn_cityId_fk'=>$branchCity,
					'brn_address'=>$branchAddress,
					'brn_smsCredit'=>$branchsmsCredit,
					'brn_emailCredit'=>$branchEmailcredit,
					'brn_modifiedDate'=>$date,
					'brn_modifiedBy'=>$adminId);
		
		$this->db->where('brn_id_pk',$branchId);
		$this->db->update('tblmvbbranches',$data);
		
		$idlist=implode(",",$data);
		setAActivityLogs('Transaction_activity','AABranch_add',"Edited Branch Id=" . $branchId . "Data:-" . $idlist);
		
		if ($brancholdsms > $branchsmsCredit || $brancholdEmail > $branchEmailcredit)
		{
			if ($brancholdsms > $branchsmsCredit)
			{
				$clientSMSnew=$brancholdsms - $branchsmsCredit;
			}
			if ($brancholdEmail > $branchEmailcredit)
			{
				$clientEmailnew=$brancholdEmail - $branchEmailcredit;
			}
			
			$data=array(
						'brcr_brnId_fk'=>$branchId,
						'brcr_clntId_fk'=>$clientId,
						'brcr_smsCredit'=>$clientSMSnew,
						'brcr_emailCredit'=>$clientEmailnew,
						'brcr_transactionDate'=>$date,
						'brcr_transactionBy'=>$adminId,
						'brcr_transactionType'=>'Debit',
						'brcr_status'=>1);
			$this->db->insert('tblmvbbranchcredit',$data);
			
			$this->db->query("UPDATE tblmvbclients SET clnt_totalSmsCredit=clnt_totalSmsCredit+'" . $clientSMSnew . "',
						          clnt_totalEmailCredit=clnt_totalEmailCredit+'" . $clientEmailnew . "'  WHERE clnt_id_pk='" . $clientId . "' ");
		} else if ($brancholdsms < $branchsmsCredit || $brancholdEmail < $branchEmailcredit)
		{
			if ($brancholdsms < $branchsmsCredit)
			{
				$clientSMSnew=$branchsmsCredit - $brancholdsms;
			}
			if ($brancholdEmail > $branchEmailcredit)
			{
				$clientEmailnew=$branchEmailcredit - $brancholdEmail;
			}
			
			$data=array(
						'brcr_brnId_fk'=>$branchId,
						'brcr_clntId_fk'=>$clientId,
						'brcr_smsCredit'=>$clientSMSnew,
						'brcr_emailCredit'=>$clientEmailnew,
						'brcr_transactionDate'=>$date,
						'brcr_transactionBy'=>$adminId,
						'brcr_transactionType'=>'Credit',
						'brcr_status'=>1);
			$this->db->insert('tblmvbbranchcredit',$data);
			
			$this->db->query("UPDATE tblmvbclients SET clnt_totalSmsCredit=clnt_totalSmsCredit-'" . $clientSMSnew . "',
						          clnt_totalEmailCredit=clnt_totalEmailCredit-'" . $clientEmailnew . "'  WHERE clnt_id_pk='" . $clientId . "' ");
		}
		
		return true;
	
	}
	
	// --- Function used to Refill sms for branch---//
	public function addRefillsms()
	{
		$branchId=$this->input->post('txtBranchid');
		$branchsmsCredit=$this->input->post('txtRefillsms');
		$adminId=$this->session->userdata('admin_admin_id');
		$clientId=$this->session->userdata('client_id');
		$date=date('Y-m-d h:i:s');
		
		// this for update branch sms
		$this->db->query("UPDATE tblmvbbranches SET brn_smsCredit=brn_smsCredit+'" . $branchsmsCredit . "'
				               WHERE brn_id_pk='" . $branchId . "' ");
		
		// /transaction for sms and email
		$data=array(
					'brcr_brnId_fk'=>$branchId,
					'brcr_clntId_fk'=>$clientId,
					'brcr_smsCredit'=>$branchsmsCredit,
					'brcr_emailCredit'=>0,
					'brcr_transactionDate'=>$date,
					'brcr_transactionBy'=>$adminId,
					'brcr_transactionType'=>'Credit',
					'brcr_status'=>1);
		$this->db->insert('tblmvbbranchcredit',$data);
		
		$idlist=implode(",",$data);
		setAActivityLogs('Transaction_activity','AABranch_refillsms',"Refill sms branch=" . $branchId . "Branchdata:-" . $idlist);
		
		$this->db->query("UPDATE tblmvbclients SET clnt_totalSmsCredit=clnt_totalSmsCredit-'" . $branchsmsCredit . "'
				          WHERE clnt_id_pk='" . $clientId . "' ");
		
		return $branchId;
	
	}
	
	// --- Function used to Refill email for branch---//
	public function addRefillemail()
	{
		$branchId=$this->input->post('txtBranchid');
		$branchemailCredit=$this->input->post('txtRefillemail');
		$adminId=$this->session->userdata('admin_admin_id');
		$clientId=$this->session->userdata('client_id');
		$date=date('Y-m-d h:i:s');
		
		// this for update branch sms
		$this->db->query("UPDATE tblmvbbranches SET brn_emailCredit=brn_emailCredit+'" . $branchemailCredit . "'
				               WHERE brn_id_pk='" . $branchId . "' ");
		
		// /transaction for sms and email
		$data=array(
					'brcr_brnId_fk'=>$branchId,
					'brcr_clntId_fk'=>$clientId,
					'brcr_smsCredit'=>0,
					'brcr_emailCredit'=>$branchemailCredit,
					'brcr_transactionDate'=>$date,
					'brcr_transactionBy'=>$adminId,
					'brcr_transactionType'=>'Credit',
					'brcr_status'=>1);
		$this->db->insert('tblmvbbranchcredit',$data);
		
		$idlist=implode(",",$data);
		setAActivityLogs('Transaction_activity','AABranch_refillemail',"Refill email branch=" . $branchId . "Branchdata:-" . $idlist);
		
		$this->db->query("UPDATE tblmvbclients SET clnt_totalEmailCredit=clnt_totalEmailCredit-'" . $branchemailCredit . "'
				          WHERE clnt_id_pk='" . $clientId . "' ");
		
		return $branchId;
	
	}
	
	// --- Function used to change status of Branch---//
	public function getActivatebranch($branchId)
	{
		for($i=0;$i < count($branchId);$i ++)
		{
			$data=array(
						'brn_status'=>1);
			$this->db->where('brn_id_pk',$branchId[$i]);
			$this->db->update('tblmvbbranches',$data);
		}
		
		return true;
	
	}
	
	// ---function used to check main branch or not--//
	public function mergeBranch($branchId,$mainbranchId)
	{
		$branchDetails=$this->getBranchdetails($branchId);
		
		$branchSms=$branchDetails[0]->brn_smsCredit;
		$branchEmail=$branchDetails[0]->brn_emailCredit;
		$adminId=$this->session->userdata('admin_admin_id');
		$clientId=$this->session->userdata('client_id');
		$date=date('Y-m-d h:i:s');
		
		$data=array(
					'brmr_activebrId_fk'=>$mainbranchId,
					'brmr_deactivebrmrId_fk'=>$branchId,
					'brmr_smsCredit'=>$branchSms,
					'brmr_emailCredit'=>$branchEmail,
					'brmr_createdDate'=>$date,
					'brmr_createdBy'=>$adminId,
					'brmr_status'=>1);
		$this->db->insert('tblbranchmerge',$data);
		
		setAActivityLogs('Transaction_activity','AABranch_merge',"branch=" . $branchId . "Merge Branch To:-" . $mainbranchId);
		
		// this for update branch sms
		$this->db->query("UPDATE tblmvbbranches SET brn_emailCredit='0',brn_smsCredit='0' ,brn_status=0
				               WHERE brn_id_pk='" . $branchId . "' ");
		
		$this->db->query("UPDATE tblmvbsystemusers SET sysu_branchId_fk='" . $mainbranchId . "'  WHERE sysu_branchId_fk='" . $branchId . "' ");
		
		$this->db->query("UPDATE tblmvbvisitors SET vis_branchId_fk='" . $mainbranchId . "'  WHERE vis_branchId_fk='" . $branchId . "' ");
		
		// /transaction for sms and email
		$data=array(
					'brcr_brnId_fk'=>$branchId,
					'brcr_clntId_fk'=>$clientId,
					'brcr_smsCredit'=>$branchSms,
					'brcr_emailCredit'=>$branchEmail,
					'brcr_transactionDate'=>$date,
					'brcr_transactionBy'=>$adminId,
					'brcr_transactionType'=>'Debit',
					'brcr_status'=>1);
		$this->db->insert('tblmvbbranchcredit',$data);
		
		$this->db->query("UPDATE tblmvbclients SET clnt_totalEmailCredit=clnt_totalEmailCredit+'" . $branchEmail . "',
				             clnt_totalSmsCredit=clnt_totalSmsCredit+'" . $branchSms . "' WHERE clnt_id_pk='" . $clientId . "' ");
		
		return $branchId;
	
	}

}
