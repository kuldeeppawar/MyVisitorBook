<?php

class Admin_Model extends CI_Model
{



	
	// --Function Used To check Login details---//
	public function checkLogin($user,$pass)
	{
		$flag="0";
		
		$result=$this->db->query("SELECT sysu_id_pk,sysu_languageId_fk,sysu_name,sysu_clientId_fk,sysu_parentClient,sysu_email,sysu_mobile,sysu_password,sysu_userTypeId_fk,sysu_branchId_fk FROM `tblmvbsystemusers` WHERE sysu_status='1'");
		$result=$result->result();
		
		for($i=0;$i < count($result);$i ++)
		{
			
			$userEmail=$this->encryption->decrypt($result [$i]->sysu_email);
			
			$userMobile=$this->encryption->decrypt($result [$i]->sysu_mobile);
			
			$userPassword=$this->encryption->decrypt($result [$i]->sysu_password);
			
			if ($user == $userEmail && $pass == $userPassword)
			{
				$flag=1;
				$data=array('admin_admin_id'=>$result [$i]->sysu_id_pk,
						    'admin_admin_name'=>$result [$i]->sysu_name,
						    'admin_admin_email'=>$user,
						    'admin_admin_language'=>$result [$i]->sysu_languageId_fk,
						    'admin_mobile'=>$userMobile,
						    'parent_client'=>$result [$i]->sysu_parentClient,
						    'branch_id'=>$result [$i]->sysu_branchId_fk,
				            'client_id'=> $result[$i]->sysu_clientId_fk,
				            'admin_admin_user_type_id'=>$result[$i]->sysu_userTypeId_fk); 
				$this->session->set_flashdata('message','You have successfully logged in');
				$this->session->set_userdata($data);

				$this->db->query("UPDATE `tblmvbsystemusers` SET `sysu_isLogin` = '1' WHERE sysu_id_pk = '".$result [$i]->sysu_id_pk ."'");
				
				
				
			}
		}


		return $flag;
	
	}

	public function forgot_password()
	{
		$this->db->select('*');
		$this->db->from('tblmvbsystemusers');
		$this->db->where('sysu_email',$this->input->post('email'));
		$this->db->where('sysu_status','1');
		
		$query=$this->db->get();
		
		$row=$query->row();
		// echo $row->email.'======';;
		
		send_mail($row->sysu_name,$row->sysu_email,'admin_password_help',$row->sysu_email);
		if ($query->num_rows() == 1)
			return true;
		else
			return false;
	
	}


	public function getSmsEmailNotifyCount()
	{
			//WHERE sid_requestDate='1'

			$client_id=$this->session->userdata('client_id');
			$branch_id=$this->session->userdata('branch_id');

			//$deduct_days=date('Y-m-d',strtotime('-10 day',strtotime(date('Y-m-d'))));

			//DATE_FORMAT(sntfy_createdDate,'%Y-%m-%d')>='".$deduct_days."' and DATE_FORMAT(sntfy_createdDate,'%Y-%m-%d')<='".date('Y-m-d')."' and

			$result=$this->db->query("SELECT count(sntfy_id_pk) as total_smsemail_count FROM tblmvbsanotify where  sntfy_show_status='0' and (sntfy_request_type='email_request_approval' or sntfy_request_type='sms_request_approval') and sntfy_clientId_fk='".$client_id."' and sntfy_branchId_fk='".$branch_id."'");
			
			$row=$result->result();

			return $row[0]->total_smsemail_count;
	}

	public function getEmailCounterCount()
	{
			$client_id=$this->session->userdata('client_id');
			$branch_id=$this->session->userdata('branch_id');

			//$deduct_days=date('Y-m-d',strtotime('-10 day',strtotime(date('Y-m-d'))));

			$result=$this->db->query("SELECT brn_emailCredit_deduct as total_email_counter FROM tblmvbbranches where brn_clientId_fk='".$client_id."' and brn_id_pk='".$branch_id."'");
			
			$row=$result->result();

			if($row[0]->total_email_counter>0)
			{
					return $row[0]->total_email_counter;
			}
			else
			{
					return 0;
			}
	}

	public function getSmsCounterCount()
	{
			$client_id=$this->session->userdata('client_id');
			$branch_id=$this->session->userdata('branch_id');

			//$deduct_days=date('Y-m-d',strtotime('-10 day',strtotime(date('Y-m-d'))));

			$result=$this->db->query("SELECT brn_smsCredit_deduct as total_sms_counter FROM tblmvbbranches where brn_clientId_fk='".$client_id."' and brn_id_pk='".$branch_id."'");
			
			$row=$result->result();
			
			if($row[0]->total_sms_counter>0)
			{
					return $row[0]->total_sms_counter;
			}
			else
			{
					return 0;
			}	
	}

	public function getLowBalanceCount()
	{
			$client_id=$this->session->userdata('client_id');
			$branch_id=$this->session->userdata('branch_id');

			//$deduct_days=date('Y-m-d',strtotime('-10 day',strtotime(date('Y-m-d'))));

			$result=$this->db->query("SELECT count(sntfy_id_pk) as total_low_balance FROM tblmvbsanotify where sntfy_show_status='0' and (sntfy_request_type='email_low_balance' or sntfy_request_type='sms_low_balance') and sntfy_clientId_fk='".$client_id."' and sntfy_branchId_fk='".$branch_id."'");
			
			$row=$result->result();

			return $row[0]->total_low_balance;
	}

	public function getAllSmsEmailNotify()
	{
			$client_id=$this->session->userdata('client_id');

			//$deduct_days=date('Y-m-d',strtotime('-10 day',strtotime(date('Y-m-d'))));

			//DATE_FORMAT(sr.sntfy_createdDate,'%Y-%m-%d')>='".$deduct_days."' and DATE_FORMAT(sr.sntfy_createdDate,'%Y-%m-%d')<='".date('Y-m-d')."' and

			$result=$this->db->query("SELECT sr.sntfy_id_pk as notify_id,cl.clnt_name as client_name,sr.sntfy_createdDate as created_time,sntfy_request_type FROM tblmvbsanotify sr left join tblmvbclients cl on (sr.sntfy_clientId_fk=cl.clnt_id_pk) where sr.sntfy_show_status='0' and (sr.sntfy_request_type='sms_request_approval' OR sr.sntfy_request_type='email_request_approval') and sr.sntfy_clientId_fk='".$client_id."' order by sr.sntfy_createdDate DESC");
			
			$row=$result->result();

			return $row;
	}


	public function getAllLowBalance()
	{
			$client_id=$this->session->userdata('client_id');
			$branch_id=$this->session->userdata('branch_id');

			//$deduct_days=date('Y-m-d',strtotime('-10 day',strtotime(date('Y-m-d'))));

			$result=$this->db->query("SELECT sr.sntfy_id_pk as notify_id,sr.sntfy_createdDate as created_time,(CASE sr.sntfy_request_type WHEN 'email_low_balance' THEN 'Email Balance is low' ELSE 'SMS balance is low' END) as low_balance_type FROM tblmvbsanotify sr where sr.sntfy_show_status='0' and (sr.sntfy_request_type='email_low_balance' or sr.sntfy_request_type='sms_low_balance') and sr.sntfy_clientId_fk='".$client_id."' and sr.sntfy_branchId_fk='".$branch_id."' order by sr.sntfy_createdDate DESC");
			
			$row=$result->result();

			return $row;
	}


	public function checkPackageExpiration($client_id)
	{
			

			$result_package_details=$this->db->query("SELECT * FROM tblmvbclientpackage where clntp_clntId_fk='".$client_id."' and ('".date('Y-m-d')."' between clntp_startDate and clntp_endDate)");
		
			$row_package_details=$result_package_details->result();

			if(count($row_package_details)>0)
			{
					return true;
			}
			else
			{
					$this->session->set_flashdata('message','');
					return false;
			}
	}

}

