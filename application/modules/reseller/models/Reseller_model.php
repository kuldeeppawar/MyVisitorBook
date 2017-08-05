<?php

class Reseller_Model extends CI_Model
{
	// --Function Used To check Login details---//
	public function checkLogin($user,$pass)
	{
		$flag="0";
		$result=$this->db->query("SELECT sysmu_id_pk,sysmu_username,sysmu_email,sysmu_mobile,sysmu_password,sysmu_profile,sysmu_empid,sysmu_userTypeId_fk FROM
			                      `tblmvbsysmainusers` WHERE sysmu_status='1' and sysmu_userTypeId_fk=4");
		$result=$result->result();
		
		
		
		for($i=0;$i < count($result);$i ++)
		{
			$userEmail=$this->encryption->decrypt($result[$i]->sysmu_email);
			$userMobile=$this->encryption->decrypt($result[$i]->sysmu_mobile);
			$userPassword=$this->encryption->decrypt($result[$i]->sysmu_password);
		
			
			if ($user == $userEmail && $pass == $userPassword)
			{
				$flag=1;
				$data=array('reseller_id'=>$result[$i]->sysmu_id_pk,
							'reseller_name'=>$result[$i]->sysmu_username,
							'reseller_email'=>$user,
							'reseller_mobile'=>$userMobile,
							'reseller_user_type_id'=>$result[$i]->sysmu_userTypeId_fk,
							'reseller_profile'=>$result[$i]->sysmu_profile);
				$this->session->set_flashdata('message','You have successfully logged in');
				$this->session->set_userdata($data);
				
				// ------------------- Save Login Logs ---------------------//
				setRSActivityLogs('Login_activity','Login');
				
				// ------------------- Save Login Logs ---------------------//
			}
		}
		
		return $flag;
	
	}

	public function forgot_password()
	{
		$this->db->select('*');
		$this->db->from('tblmvbsysmainusers');
		$this->db->where('sysmu_email',$this->input->post('email'));
		$this->db->where('sysmu_status','1');
		$this->db->where('sysmu_userTypeId_fk','4');
		
		$query=$this->db->get();
		
		$row=$query->row();
	
		send_mail($row->sysmu_name,$row->sysmu_email,'admin_password_help',$row->sysmu_email);
		 if ($query->num_rows() == 1)
		   	  return true;
		else
			  return false;
	
	}

}
