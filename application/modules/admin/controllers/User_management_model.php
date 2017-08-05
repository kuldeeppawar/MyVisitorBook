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
			$adminId=$this->session->userdata('admin_admin_id');
			$clientId=$this->session->userdata('client_id');
			$parentClient=$this->session->userdata('parent_client');
			$branchId=$this->session->userdata('branch_id');
			// if($parentClient==1)
			// {
			// $sql="select tblmvbbranches.brn_name,tblmvbcity.cty_name,tblmvbusertypes.utyp_userType, tblmvbsystemusers.sysu_id_pk,tblmvbsystemusers.sysu_branchId_fk,
			// tblmvbsystemusers.sysu_userTypeId_fk,tblmvbsystemusers.sysu_name,tblmvbsystemusers.sysu_mobile, tblmvbsystemusers.sysu_email,tblmvbsystemusers.sysu_cityId,
			// tblmvbsystemusers.sysu_status,tblmvbcity.cty_name,tblmvbbranches.brn_name from tblmvbsystemusers LEFT JOIN tblmvbcity on
			// tblmvbcity.cty_id_pk=tblmvbsystemusers.sysu_cityId LEFT JOIN tblmvbbranches on tblmvbbranches.brn_id_pk=tblmvbsystemusers.sysu_branchId_fk
			// LEFT JOIN tblmvbusertypes ON tblmvbusertypes.utyp_id_pk=tblmvbsystemusers.sysu_userTypeId_fk Where tblmvbsystemusers.sysu_clientId_fk='".$clientId."' and
			// tblmvbsystemusers.sysu_branchId_fk !='' ";
			// }
			// else
			// {
			$sql="select tblmvbbranches.brn_name,tblmvbcity.cty_name,tblmvbusertypes.utyp_userType, tblmvbsystemusers.sysu_id_pk,tblmvbsystemusers.sysu_branchId_fk,
					  tblmvbsystemusers.sysu_userTypeId_fk,tblmvbsystemusers.sysu_name,tblmvbsystemusers.sysu_mobile, tblmvbsystemusers.sysu_email,tblmvbsystemusers.sysu_cityId,
					  tblmvbsystemusers.sysu_status,tblmvbcity.cty_name,tblmvbbranches.brn_name from tblmvbsystemusers LEFT JOIN tblmvbcity on 
					  tblmvbcity.cty_id_pk=tblmvbsystemusers.sysu_cityId LEFT JOIN tblmvbbranches on tblmvbbranches.brn_id_pk=tblmvbsystemusers.sysu_branchId_fk
					  LEFT JOIN tblmvbusertypes ON tblmvbusertypes.utyp_id_pk=tblmvbsystemusers.sysu_userTypeId_fk Where tblmvbsystemusers.sysu_branchId_fk='" . $branchId . "'";
			// }
			
			$query=$this->db->query($sql);
			return $query->result();
		
		}
		
		// --Function Used to get all user type-//
		public function getUsertypelist()
		{
			$query=$this->db->query("SELECT `utyp_id_pk`, `utyp_userType`, `utyp_status` FROM `tblmvbusertypes` ");
			return $query->result();
		
		}
		
		// --Function used to get Country--//
		Public function getCountrylist()
		{
			$result=$this->db->query("select cntr_id_pk,cntr_name,cntr_status from tblmvbcountry ");
			return $result->result();
		
		}
		
		// --Function used to get State--//
		Public function getStatelist($id)
		{
			$result=$this->db->query("select stat_id_pk,stat_name,stat_status from tblmvbstate  WHERE stat_countryId_fk='" . $id . "'");
			return $result->result();
		
		}
		
		// --Function used to get State--//
		Public function getCitylist($id)
		{
			$result=$this->db->query("select cty_id_pk,cty_name,cty_status from tblmvbcity  WHERE cty_stateId_fk='" . $id . "'");
			return $result->result();
		
		}
		
		// ----function used to get branch details----//
		public function getBranchDetails()
		{
			$clientId=$this->session->userdata('client_id');
			$result=$this->db->query("	SELECT brn_id_pk, brn_clientId_fk, brn_name, brn_status FROM tblmvbbranches WHERE brn_clientId_fk='" . $clientId . "'");
			
			return $result->result();
		
		}
		
		// --function used to get specific user details--//
		public function getSpecificuser($id)
		{
			$query=$this->db->query("SELECT `sysu_id_pk`, `sysu_branchId_fk`, `sysu_userTypeId_fk`, `sysu_clientId_fk`, `sysu_parentClient`,`sysu_title`, `sysu_name`,`sysu_mname`,`sysu_lname`, `sysu_mobile`,
					                `sysu_email`, `sysu_password`, `sysu_countryId_fk`, `sysu_stateId_fk`, `sysu_cityId`, `sysu_address`,  `sysu_status` FROM 
					                `tblmvbsystemusers` WHERE sysu_id_pk='" . $id . "'");
			return $query->result();
		
		}
		
		// --Function Used to get all Add New user-//
		public function addUser()
		{
			$created_date=date('Y-m-d H:i:s');
			$user_type_id=$this->input->post('selUsertype');
			$userBranch=$this->input->post('selBranch');
			$usertitle=$this->input->post('selUsertitle');
			$username=$this->input->post('txtUsername');
			$usermname=$this->input->post('txtMiddlename');
			$userlname=$this->input->post('txtLastname');
			$email=$this->input->post('txtEmail');
			$email=$this->encryption->encrypt($email);
			$mobile_no=$this->input->post('txtMobile');
			$mobile_no=$this->encryption->encrypt($mobile_no);
			$country=$this->input->post('selCountry');
			$city=$this->input->post('selCity');
			$state=$this->input->post('selState');
			$address=$this->input->post('txtAddress');
			$check_password_type=$this->input->post('optradio');
			$created_by=$this->session->userdata('admin_admin_id');
			$clientId=$this->session->userdata('client_id');
			if ($check_password_type == '0')
			{
				$final_password=$this->input->post('txtPassword');
			} else
			{
				$final_password=$this->input->post('txtAutopassword');
			}
			
			$final_password=$this->encryption->encrypt($final_password);
			
			$data=array(
						'sysu_branchId_fk'=>$userBranch,
						'sysu_userTypeId_fk'=>$user_type_id,
						'sysu_clientId_fk'=>$clientId,
						'sysu_parentClient'=>0,
						'sysu_title'=>$usertitle,
						'sysu_name'=>$username,
						'sysu_mname'=>$usermname,
						'sysu_lname'=>$userlname,
						'sysu_mobile'=>$mobile_no,
						'sysu_email'=>$email,
						'sysu_password'=>$final_password,
						'sysu_countryId_fk'=>$country,
						'sysu_stateId_fk'=>$state,
						'sysu_cityId'=>$city,
						'sysu_address'=>$address,
						'sysu_createdDate'=>$created_date,
						'sysu_createdBy'=>$created_by,
						'sysu_modifiedDate'=>$created_date,
						'sysu_modifiedby'=>$created_by,
						'sysu_status'=>1);
			
			$this->db->insert('tblmvbsystemusers',$data);
			$insert_id=$this->db->insert_id();
			
			$idlist=implode(",",$data);
			setAActivityLogs('Transaction_activity','Adduser_add','User added ' . $idlist . 'id is:-' . $insert_id);
			
			return $insert_id;
		
		}

		public function editUser()
		{
			$created_date=date('Y-m-d H:i:s');
			$user_type_id=$this->input->post('selUsertype');
			$userBranch=$this->input->post('selBranch');
			$username=$this->input->post('txtUsername');
			$created_by=$this->session->userdata('admin_admin_id');
			$id=$this->input->post('txtUserid');
			$email=$this->input->post('txtEmail');
			$email=$this->encryption->encrypt($email);
			$mobile_no=$this->input->post('txtMobile');
			$mobile_no=$this->encryption->encrypt($mobile_no);
			$country=$this->input->post('selCountry');
			$city=$this->input->post('selCity');
			$state=$this->input->post('selState');
			$address=$this->input->post('txtAddress');
			$clientId=$this->session->userdata('client_id');
			
			$title=$this->input->post('selUsertitle');
			$mname=$this->input->post('txtMiddlename');
			$lname=$this->input->post('txtLastname');
			$data=array(
						'sysu_branchId_fk'=>$userBranch,
						'sysu_userTypeId_fk'=>$user_type_id,
						'sysu_title'=>$title,
						'sysu_name'=>$username,
						'sysu_mname'=>$mname,
						'sysu_lname'=>$lname,
						'sysu_mobile'=>$mobile_no,
						'sysu_email'=>$email,
						'sysu_countryId_fk'=>$country,
						'sysu_stateId_fk'=>$state,
						'sysu_cityId'=>$city,
						'sysu_address'=>$address,
						'sysu_modifiedDate'=>$created_date,
						'sysu_modifiedby'=>$created_by);
			
			$this->db->where('sysu_id_pk',$id);
			
			$rid=$this->db->update('tblmvbsystemusers',$data);
			
			$idlist=implode(",",$data);
			setAActivityLogs('Transaction_activity','Adduser_add','User added ' . $idlist . 'id is:-' . $rid);
			return $id;
		
		}
		
		// --- Function used to change status of User---//
		public function changeuserStatus($status,$userId)
		{
			for($i=0;$i < count($userId);$i ++)
			{
				$data=array(
							'sysu_status'=>$status);
				$this->db->where('sysu_id_pk',$userId[$i]);
				
				$this->db->update('tblmvbsystemusers',$data);
			}
			
			return true;
		
		}
		
		// --Function get user details from email--//
		public function getUserbyemail()
		{
			$email=$this->input->post('email');
			$flag="0";
			
			$result=$this->db->query("SELECT sysu_id_pk,sysu_email FROM tblmvbsystemusers");
			$result=$result->result();
			
			for($i=0;$i < count($result);$i ++)
			{
				
				$userEmail=$this->encryption->decrypt($result[$i]->sysu_email);
				
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
					$randomString.=$characters[rand(0,$charactersLength - 1)];
				}
				$randomString=$this->encryption->encrypt($randomString);
				$data=array(
							'sysu_password'=>$randomString);
				$this->db->where('sysu_id_pk',$userId[$i]);
				
				$this->db->update('tblmvbsystemusers',$data);
			}
			
			return true;
		
		}

		public function getUserType()
		{
			$query=$this->db->query("SELECT mut1.utyp_id_pk,mut1.utyp_userType,DATE_FORMAT(mut1.utyp_createdDate,'%d/%m/%Y %k:%i %p') as created_date,mut.utyp_userType as created_by,(CASE WHEN mut1.utyp_status='1' THEN 'Active' ELSE 'Deactive' END) as status FROM tblmvbusertypes mut inner join tblmvbusertypes mut1 on (mut.utyp_id_pk=mut1.utyp_createdBy) order by mut.utyp_id_pk");
			return $query->result();
		
		}

		public function getAllUserTypeList()
		{
			$query=$this->db->query("SELECT mut.utyp_id_pk,mut.utyp_userType FROM tblmvbusertypes mut order by mut.utyp_userType");
			return $query->result();
		
		}

		public function getallmodule()
		{
			$result=$this->db->query("SELECT mod_id_pk,mod_module_name FROM tblmvbmodules WHERE mod_menu_id='0' and mod_submenu_id='0' and mod_sub_submenu_id='0' and mod_status='1'");
			return $result->result();
		
		}

		public function getallsubmodule($id="")
		{
			$result=$this->db->query("SELECT mod_id_pk,mod_module_name,mod_menu_id FROM tblmvbmodules WHERE mod_menu_id='" . $id . "' and mod_submenu_id='0' and mod_sub_submenu_id='0' and mod_status='1'");
			return $result->result();
		
		}

		public function getallsubsubmodule($menu_id,$sub_module_id)
		{
			$result=$this->db->query("SELECT mod_id_pk,mod_module_name FROM tblmvbmodules WHERE mod_menu_id='" . $menu_id . "' and mod_submenu_id='" . $sub_module_id . "' and mod_sub_submenu_id='0' and mod_status='1'");
			return $result->result();
		
		}

		public function addUserType()
		{
			$created_date=date('Y-m-d H:i:s');
			$created_by=$this->session->userdata('admin_admin_id');
			$branch_id=$this->session->userdata('branch_id');
			$user_type_name=$this->input->post('txtUserTypeName');
			
			$data=array(
						'utyp_userType'=>$user_type_name,
						'utyp_createdDate'=>$created_date,
						'utyp_createdBy'=>$created_by,
						'utyp_modifiedDate'=>$created_date,
						'utyp_modifiedBy'=>$created_by,
						'utyp_status'=>'1');
			
			$this->db->insert('tblmvbusertypes',$data);
			
			$insert_id=$this->db->insert_id();
			
			$modules=$this->input->post('modules');
			
			for($k=0;$k < count($modules);$k ++)
			{
				$data_mapping=array(
									'mmap_module_id_fk'=>$modules[$k],
									'mmap_UsersId_fk'=>$insert_id,
									'mmap_createdDate'=>$created_date,
									'mmap_createdBy'=>$created_by,
									'mmap_modifiedDate'=>$created_date,
									'mmap_modifiedBy'=>$created_by,
									'mmap_status'=>'1');
				
				$this->db->insert('tblmvbmodulemapping',$data_mapping);
			}
			
			// ---------------------------------- Start Save Transaction Logs ---------------------------------//
			
			setAActivityLogs('Transaction_activity','user_type_add');
			
			// --------------------------------- End Save Transaction Logs ------------------------------------//
			
			return $insert_id;
		
		}

		public function editUserType()
		{
			$user_type_id=$this->input->post('hidden_user_type_id');
			
			$created_date=date('Y-m-d H:i:s');
			$created_by=$this->session->userdata('admin_admin_id');
			
			$user_type_name=$this->input->post('txtUserTypeName');
			
			// ---------------------------------- Start Save Transaction Logs ---------------------------------//
			
			$transaction_logs_details='';
			
			$result_user_type_details=$this->db->query("Select utyp_userType from tblmvbusertypes where utyp_id_pk='" . $user_type_id . "'");
			
			$row_user_type_details=$result_user_type_details->result();
			
			if ($user_type_name != $row_user_type_details[0]->mutyp_userType)
			{
				$transaction_logs_details.='Edited for User Type Id - ' . $user_type_id . ' // ';
				
				$transaction_logs_details.='Before User Type name - ' . $row_user_type_details[0]->mutyp_userType . ' && After User Type Name - ' . $user_type_name;
			}
			
			setAActivityLogs('Transaction_activity','user_type_edit',$transaction_logs_details);
			
			// --------------------------------- End Save Transaction Logs ------------------------------------//
			
			$data=array(
						'utyp_userType'=>$user_type_name,
						'utyp_modifiedDate'=>$created_date,
						'utyp_modifiedBy'=>$created_by);
			
			$this->db->where('utyp_id_pk',$user_type_id);
			$this->db->update('tblmvbusertypes',$data);
			
			$this->db->query("delete from tblmvbmodulemapping where mmap_UsersId_fk='" . $user_type_id . "'");
			
			$modules=$this->input->post('modules');
			
			for($k=0;$k < count($modules);$k ++)
			{
				$data_mapping=array(
									'mmap_module_id_fk'=>$modules[$k],
									'mmap_UsersId_fk'=>$user_type_id,
									'mmap_createdDate'=>$created_date,
									'mmap_createdBy'=>$created_by,
									'mmap_modifiedDate'=>$created_date,
									'mmap_modifiedBy'=>$created_by,
									'mmap_status'=>'1');
				
				$this->db->insert('tblmvbmodulemapping',$data_mapping);
			}
			
			return $user_type_id;
		
		}

		public function getIdWiseUserType($id)
		{
			$query=$this->db->query("SELECT mut.utyp_id_pk,mut.utyp_userType FROM tblmvbusertypes mut where mut.utyp_id_pk='" . $id . "'");
			
			return $query->row_array();
		
		}

		public function getIdWiseUserTypePrivileges($id)
		{
			$temp_array=array();
			
			$query=$this->db->query("SELECT mmap_module_id_fk FROM tblmvbmodulemapping where mmap_UsersId_fk='" . $id . "'");
			
			$user_type_privileges=$query->result();
			// print_r($user_type_privileges);die();
			for($x=0;$x < count($user_type_privileges);$x ++)
			{
				array_push($temp_array,$user_type_privileges[$x]->mmap_module_id_fk);
			}
			/*
			 * print_r($temp_array);
			 * die();
			 */
			return $temp_array;
		
		}

		public function changeUserTypeIdStatus($status,$usertypeid)
		{
			$assign_id_for_status_change='';
			
			$transaction_logs_details='';
			
			for($i=0;$i < count($usertypeid);$i ++)
			{
				$data=array(
							'utyp_status'=>$status);
				$this->db->where('utyp_id_pk',$usertypeid[$i]);
				$this->db->update('tblmvbusertypes',$data);
				
				$assign_id_for_status_change.=$usertypeid[$i] . ',';
			}
			
			// ------------------------------ Start Save Transaction Logs -----------------------------------//
			
			if ($status == '0')
			{
				$current_status='Deactivate';
			} else
			{
				$current_status='Activate';
			}
			
			$transaction_logs_details.='Status change to ' . $current_status . ' for IDs - ' . $assign_id_for_status_change;
			
			setAActivityLogs('Transaction_activity','user_type_status',$transaction_logs_details);
			
			// ------------------------------- End Save Transaction Logs -----------------------------------//
			
			return true;
		
		}

		public function getModuleId($module_code)
		{
			$admin_user_type_id=$this->session->userdata('admin_admin_user_type_id');
			
			$final_status=false;
			
			$query_module_id=$this->db->query("SELECT mod_id_pk FROM tblmvbmodules where mod_module_code='" . $module_code . "'");
			
			$row_module_id=$query_module_id->result();
			
			if ($admin_user_type_id != 1)
			{
				if (count($row_module_id) > 0)
				{
					if ($row_module_id[0]->mm_id_pk != 0)
					{
						$query_access_rights_id=$this->db->query("SELECT mmap_id_pk FROM tblmvbmodulemapping where mmap_module_id_fk='" . $row_module_id[0]->mm_id_pk . "' and mmap_UsersId_fk='" . $admin_user_type_id . "'");
						
						$row_access_rights_id=$query_access_rights_id->result();
						
						if (count($row_access_rights_id) > 0)
						{
							$final_status=true;
						}
					}
				}
			} else
			{
				$final_status=true;
			}
			
			return $final_status;
		
		}
	
	}
	
	?>