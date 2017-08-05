	<?php

	class Myprofile_model extends CI_Model
	{

		public function __construct()
		{
			parent::__construct();
		
		}
		// ---FUnction used to get details of system user--//
		public function getProfileDetailes($id)
		{
			$result=$this->db->query("select * from tblmvbsysmainusers where sysmu_id_pk='" . $id . "'");
			return $result->result();
		
		}
		
		public function getOtp($id)
		{
			$res=$this->db->query("select sysmu_password from tblmvbsysmainusers where sysmu_id_pk='" . $id . "'");
			$result=$res->result();
			$dbotp=$this->encryption->decrypt($result[0]->sysmu_password);
			return $dbotp;
		
		}
		// this function to change Password of System user
		public function updatePassword($id,$password)
		{
			$this->db->where('sysmu_id_pk',$id);
			$oldpassword=$this->getOtp($id);
			$newpassword=$this->encryption->encrypt($password);
			$array=array(
						'sysmu_password'=>$newpassword);
			$k=$this->db->update('tblmvbsysmainusers',$array);
			$data=implode(",",$array);
			
			setRSActivityLogs('Transaction_activity','Updated_Password','Password for id' . $id . 'is changed. old Password is=' . $oldpassword);
			
			return $k;
		
		}

		
		// function to update data in systemusers
		public function savedata()
		{
			$id=$this->session->userdata('reseller_id');
			$name=$this->input->post('txtName');
			$mob=$this->input->post('txtMobile');
			$mobile=$this->encryption->encrypt($mob);
			$em=$this->input->post('txtEmail');
			$email=$this->encryption->encrypt($em);
			$address=$this->input->post('txtLocation');
			
			$filename="";
			$filename=$this->input->post('pfilename');
			if ($filename == "")
			{
				
				if ($_FILES["profilepic"]["name"]!="")
				{
					
					$filename=time() . $_FILES["profilepic"]["name"];
					
					move_uploaded_file($_FILES["profilepic"]["tmp_name"],"./uploads/systemusers_images/" . $filename);
				}
			}
			
			$arrupdate=array('sysmu_username'=>$name,
							'sysmu_mobile'=>$mobile,
							'sysmu_email'=>$email,
							'sysmu_location'=>$address,
							'sysmu_profile'=>$filename)

			;
			$this->db->where('sysmu_id_pk',$id);
			$k=$this->db->update('tblmvbsysmainusers',$arrupdate);
			$data=implode(",",$arrupdate);
			
			setRSActivityLogs('Transaction_activity','Update_Profile','Profile Data :' . $data . ' updated for id=' . $id);
			return $k;
		
		}
		
	
		
		
		// --function used to get specific user details--//
		public function getSpecificuser($id)
		{
			$query=$this->db->query("SELECT `sysu_id_pk`, `sysu_branchId_fk`, `sysu_userTypeId_fk`, `sysu_clientId_fk`, `sysu_parentClient`, `sysu_name`, `sysu_mobile`,
					                `sysu_email`, `sysu_password`, `sysu_countryId_fk`, `sysu_stateId_fk`, `sysu_cityId`, `sysu_address`,  `sysu_status` FROM 
					                `tblmvbsystemusers` WHERE sysu_id_pk='" . $id . "'");
			return $query->result();
		
		}
		
	
	
	}
	
	?>