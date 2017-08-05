	<?php

	class User_management_model extends CI_Model
	{

		public function __construct()
		{
			parent::__construct();
		
		}
		
		// ---FUnction used to get details of system user--//
		public function getSystemuser()
		{
			$query=$this->db->query("SELECT tblmvbsysmainusers.sysmu_id_pk,tblmvbsysmainusers.sysmu_email,tblmvbsysmainusers.sysmu_empid,tblmvbsysmainusers.sysmu_username,tblmvbsysmainusers.sysmu_status,
					                 tblmvbcity.cty_name,tblmvbsysmainusertypes.mutyp_userType FROM tblmvbsysmainusers left join tblmvbsysmainusertypes on
					                 (tblmvbsysmainusers.sysmu_userTypeId_fk=tblmvbsysmainusertypes.mutyp_id_pk)left join tblmvbcity on (tblmvbcity.cty_id_pk=tblmvbsysmainusers.sysmu_location) 
									 order by tblmvbsysmainusers.sysmu_id_pk desc");
			return $query->result();
		
		}
		
		// --Function Used to get all user type-//
		public function getUsertypelist()
		{
			$query=$this->db->query("SELECT mutyp_id_pk,mutyp_userType FROM `tblmvbsysmainusertypes` WHERE mutyp_status='1'");
			return $query->result();
		
		}
		
		// --function used to get all user types--//
		public function getAllusertype()
		{
			$query=$this->db->query("SELECT mutyp_id_pk,mutyp_userType FROM `tblmvbsysmainusertypes`");
			return $query->result();
		
		}
		
		// --Function used to get Active locations--//
		Public function getActiveLocations()
		{
			$result=$this->db->query("select cty_id_pk,cty_name,cty_status from tblmvbcity Where cty_status='1'");
			return $result->result();
		
		}
		
		// --Function used to get All locations--//
		Public function getLocations()
		{
			$result=$this->db->query("select cty_id_pk,cty_name,cty_status from tblmvbcity ");
			return $result->result();
		
		}
		
		// --function used to get specific user details--//
		public function getSpecificuser($id)
		{
			$query=$this->db->query("SELECT sysmu_id_pk,sysmu_userTypeId_fk,sysmu_email,sysmu_mobile,sysmu_empid,sysmu_username,
					                    sysmu_location,sysmu_description FROM tblmvbsysmainusers where sysmu_id_pk='" . $id . "'");
			return $query->result();
		
		}
		
		// --Function Used to get all Add New user-//
		public function addUser()
		{
			$created_date=date('Y-m-d H:i:s');
			$user_type_id=$this->input->post('selUsertype');
			$username=$this->input->post('txtUsername');
			
			$email=$this->input->post('txtEmail');
			$email=$this->encryption->encrypt($email);
			
			$mobile_no=$this->input->post('txtMobile');
			$mobile_no=$this->encryption->encrypt($mobile_no);
			
			$emp_id=$this->input->post('txtEmployeeid');
			$location=$this->input->post('selLocations');
			$description=$this->input->post('txtDescription');
			$check_password_type=$this->input->post('optradio');
			$created_by=$this->session->userdata('admin_id');
			
			if ($check_password_type == '0')
			{
				$final_password=$this->input->post('txtPassword');
			} else
			{
				$final_password=$this->input->post('txtAutopassword');
			}
			
			$final_password=$this->encryption->encrypt($final_password);
			
			$data=array('sysmu_userTypeId_fk'=>$user_type_id,
				'sysmu_email'=>$email,
				'sysmu_password'=>$final_password,
				'sysmu_mobile'=>$mobile_no,
				'sysmu_empid'=>$emp_id,
				'sysmu_email'=>$email,
				'sysmu_location'=>$location,
				'sysmu_username'=>$username,
				'sysmu_description'=>$description,
				'sysmu_createdDate'=>$created_date,
				'sysmu_createdBy'=>$created_by,
				'sysmu_modifiedDate'=>$created_date,
				'sysmu_modifiedBy'=>$created_by,
				'sysmu_status'=>'1');
			
			$this->db->insert('tblmvbsysmainusers',$data);
			$insert_id=$this->db->insert_id();
			return $insert_id;
		
		}

		public function editUser()
		{
			$created_date=date('Y-m-d H:i:s');
			$user_type_id=$this->input->post('selUsertype');
			$username=$this->input->post('txtUsername');
			$emp_id=$this->input->post('txtEmployeeid');
			$location=$this->input->post('selLocations');
			$description=$this->input->post('txtDescription');
			$created_by=$this->session->userdata('admin_id');
			$id=$this->input->post('txtUserid');
			
			$email=$this->input->post('txtEmail');
			$email=$this->encryption->encrypt($email);
			
			$mobile_no=$this->input->post('txtMobile');
			$mobile_no=$this->encryption->encrypt($mobile_no);
			
			$data=array('sysmu_userTypeId_fk'=>$user_type_id,
				'sysmu_email'=>$email,
				'sysmu_mobile'=>$mobile_no,
				'sysmu_empid'=>$emp_id,
				'sysmu_email'=>$email,
				'sysmu_location'=>$location,
				'sysmu_username'=>$username,
				'sysmu_description'=>$description,
				'sysmu_modifiedDate'=>$created_date,
				'sysmu_modifiedBy'=>$created_by);
			
			$this->db->where('sysmu_id_pk',$id);
			$this->db->update('tblmvbsysmainusers',$data);
			
			return $id;
		
		}
		
		// --- Function used to change status of User---//
		public function changeuserStatus($status,$userId)
		{
			for($i=0;$i < count($userId);$i ++)
			{
				$data=array('sysmu_status'=>$status);
				$this->db->where('sysmu_id_pk',$userId [$i]);
				
				$this->db->update('tblmvbsysmainusers',$data);
			}
			
			return true;
		
		}
		
		// --Function get user details from email--//
		public function getUserbyemail()
		{
			$email=$this->input->post('email');
			$flag="0";
			
			$result=$this->db->query("SELECT sysmu_id_pk,sysmu_email  FROM `tblmvbsysmainusers`");
			$result=$result->result();
			
			for($i=0;$i < count($result);$i ++)
			{
				
				$userEmail=$this->encryption->decrypt($result [$i]->sysmu_email);
				
				if ($email == $userEmail)
				{
					$flag=1;
				}
			}
			
			return $flag;
		
		}
		
		// ---Function used to reset password--/
		public function resetUserpassword($userId)
		{
			for($i=0;$i < count($userId);$i ++)
			{
				
				$characters='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$charactersLength=strlen($characters);
				
				$randomString='';
				for($j=0;$j < 11;$j ++)
				{
					$randomString.=$characters [rand(0,$charactersLength - 1)];
				}
				$randomString=$this->encryption->encrypt($randomString);
				$data=array('sysmu_password'=>$randomString);
				$this->db->where('sysmu_id_pk',$userId [$i]);
				
				$this->db->update('tblmvbsysmainusers',$data);
			}
			
			return true;
		
		}
	
	}
	
	?>