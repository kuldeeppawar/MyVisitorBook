<?php

class Head_Model extends CI_Model
{
	
	// --Function Used To check Login details---//
	public function checkLogin($user,$pass)
	{
		$flag="0";
		
                
		$result=$this->db->query("SELECT sysmu_id_pk,sysmu_languageId_fk,sysmu_username,sysmu_email,sysmu_mobile,sysmu_password,sysmu_empid,sysmu_userTypeId_fk FROM `tblmvbsysmainusers` WHERE sysmu_status='1'");
		$result=$result->result();
		
		for($i=0;$i < count($result);$i ++)
		{
			
			$userEmail=$this->encryption->decrypt($result [$i]->sysmu_email);
			
			$userMobile=$this->encryption->decrypt($result [$i]->sysmu_mobile);
			
			$userPassword=$this->encryption->decrypt($result [$i]->sysmu_password);
 
                        //echo $user.'=='.$userEmail;

                        //echo "<br>";

                        //echo $pass .'=='. $userPassword;

               

			
			if ($user == $userEmail && $pass == $userPassword)
			{
				$flag=1;
				
				$this->db->query("UPDATE `tblmvbsysmainusers` SET `sysmu_isLogin` = '1' WHERE sysmu_id_pk = '".$result [$i]->sysmu_id_pk ."'");
				
				
				$data=array('admin_id'=>$result [$i]->sysmu_id_pk,'admin_name'=>$result [$i]->sysmu_username,'admin_email'=>$user,'admin_mobile'=>$userMobile,'admin_user_type_id'=>$result[$i]->sysmu_userTypeId_fk,'admin_language'=>$result[$i]->sysmu_languageId_fk);
				$this->session->set_flashdata('message','You have successfully logged in');
				$this->session->set_userdata($data);

				//------------------- Save Login Logs ---------------------//

				setSAActivityLogs('Login_activity','Login');

				//------------------- Save Login Logs ---------------------//
				
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


	public function getSenderidCount()
	{
			//WHERE sid_requestDate='1'

			$deduct_days=date('Y-m-d',strtotime('-10 day',strtotime(date('Y-m-d'))));

			$result=$this->db->query("SELECT count(ntfy_id_pk) as total_senderid FROM tblmvbnotifyrequest where DATE_FORMAT(ntfy_createdDate,'%Y-%m-%d')>='".$deduct_days."' and DATE_FORMAT(ntfy_createdDate,'%Y-%m-%d')<='".date('Y-m-d')."' and ntfy_show_status='0' and 	ntfy_request_type='sender_id'");
			
			$row=$result->result();

			return $row[0]->total_senderid;
	}

	public function getSmsRequestCount()
	{
			$deduct_days=date('Y-m-d',strtotime('-10 day',strtotime(date('Y-m-d'))));

			$result=$this->db->query("SELECT count(ntfy_id_pk) as total_sms_request FROM `tblmvbnotifyrequest` where DATE_FORMAT(ntfy_createdDate,'%Y-%m-%d')>='".$deduct_days."' and DATE_FORMAT(ntfy_createdDate,'%Y-%m-%d')<='".date('Y-m-d')."' and ntfy_show_status='0' and 	ntfy_request_type='sms_temp'");
			
			$row=$result->result();

			return $row[0]->total_sms_request;
	}

	public function getEmailRequestCount()
	{
			$deduct_days=date('Y-m-d',strtotime('-10 day',strtotime(date('Y-m-d'))));

			$result=$this->db->query("SELECT count(ntfy_id_pk) as total_email_request FROM tblmvbnotifyrequest where DATE_FORMAT(ntfy_createdDate,'%Y-%m-%d')>='".$deduct_days."' and DATE_FORMAT(ntfy_createdDate,'%Y-%m-%d')<='".date('Y-m-d')."' and ntfy_show_status='0' and 	ntfy_request_type='email_temp'");
			
			$row=$result->result();

			return $row[0]->total_email_request;
	}

	public function getOptRequestCount()
	{
			$deduct_days=date('Y-m-d',strtotime('-10 day',strtotime(date('Y-m-d'))));

			$result=$this->db->query("SELECT count(ntfy_id_pk) as total_opt_request FROM tblmvbnotifyrequest where DATE_FORMAT(ntfy_createdDate,'%Y-%m-%d')>='".$deduct_days."' and DATE_FORMAT(ntfy_createdDate,'%Y-%m-%d')<='".date('Y-m-d')."' and ntfy_show_status='0' and 	ntfy_request_type='opt_request'");
			
			$row=$result->result();

			return $row[0]->total_opt_request;
	}


	public function getAllSenderidRequest()
	{
			$deduct_days=date('Y-m-d',strtotime('-10 day',strtotime(date('Y-m-d'))));

			$result=$this->db->query("SELECT sr.ntfy_id_pk as notify_id,cl.clnt_name as client_name,sr.ntfy_createdDate as created_time FROM tblmvbnotifyrequest sr left join tblmvbclients cl on (sr.ntfy_clientId_fk=cl.clnt_id_pk) where DATE_FORMAT(sr.ntfy_createdDate,'%Y-%m-%d')>='".$deduct_days."' and DATE_FORMAT(sr.ntfy_createdDate,'%Y-%m-%d')<='".date('Y-m-d')."' and sr.ntfy_show_status='0' and sr.ntfy_request_type='sender_id' order by sr.ntfy_createdDate DESC");
			
			$row=$result->result();

			return $row;
	}


	public function getAllSmsTempRequest()
	{
			$deduct_days=date('Y-m-d',strtotime('-10 day',strtotime(date('Y-m-d'))));

			$result=$this->db->query("SELECT str.ntfy_id_pk as notify_id,cl.clnt_name as client_name,str.ntfy_createdDate as created_time FROM tblmvbnotifyrequest str left join tblmvbclients cl on (str.ntfy_clientId_fk=cl.clnt_id_pk) where DATE_FORMAT(str.ntfy_createdDate,'%Y-%m-%d')>='".$deduct_days."' and DATE_FORMAT(str.ntfy_createdDate,'%Y-%m-%d')<='".date('Y-m-d')."' and str.ntfy_show_status='0' and str.ntfy_request_type='sms_temp' order by str.ntfy_createdDate DESC");
			
			$row=$result->result();

			return $row;
	}

	public function getAllEmailTempRequest()
	{
			$deduct_days=date('Y-m-d',strtotime('-10 day',strtotime(date('Y-m-d'))));

			$result=$this->db->query("SELECT etr.ntfy_id_pk as notify_id,cl.clnt_name as client_name,etr.etr_requestedDate as created_time FROM tblmvbnotifyrequest etr left join tblmvbclients cl on (etr.	ntfy_clientId_fk=cl.clnt_id_pk) where DATE_FORMAT(etr.ntfy_createdDate,'%Y-%m-%d')>='".$deduct_days."' and DATE_FORMAT(etr.ntfy_createdDate,'%Y-%m-%d')<='".date('Y-m-d')."' and etr.ntfy_show_status='0' and etr.ntfy_request_type='email_temp' order by etr.ntfy_createdDate DESC");
			
			$row=$result->result();

			return $row;
	}

	public function getAllOptRequest()
	{
			$deduct_days=date('Y-m-d',strtotime('-10 day',strtotime(date('Y-m-d'))));

			$result=$this->db->query("SELECT opr.ntfy_id_pk as notify_id,cl.clnt_name as client_name,opr.optreq_requestDate as created_time FROM tblmvbnotifyrequest opr left join tblmvbclients cl on (opr.ntfy_clientId_fk=cl.clnt_id_pk) where DATE_FORMAT(opr.ntfy_createdDate,'%Y-%m-%d')>='".$deduct_days."' and DATE_FORMAT(opr.ntfy_createdDate,'%Y-%m-%d')<='".date('Y-m-d')."' and opr.ntfy_show_status='0' and opr.ntfy_request_type='opt_request' order by opr.ntfy_createdDate DESC");
			
			$row=$result->result();

			return $row;
	}


}

