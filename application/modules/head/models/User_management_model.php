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
					                 tblmvbcity.cty_name,tblmvbsysmainusertypes.mutyp_userType,tblmvbsysmainusers.sysmu_password FROM tblmvbsysmainusers left join tblmvbsysmainusertypes on
					                 (tblmvbsysmainusers.sysmu_userTypeId_fk=tblmvbsysmainusertypes.mutyp_id_pk)left join tblmvbcity on (tblmvbcity.cty_id_pk=tblmvbsysmainusers.sysmu_location) where tblmvbsysmainusers.sysmu_id_pk!='1'
									 order by tblmvbsysmainusers.sysmu_id_pk desc");
			return $query->result();
		
		}
		
		// --Function Used to get all user type-//
		public function getUsertypelist()
		{
			$query=$this->db->query("SELECT mutyp_id_pk,mutyp_userType FROM `tblmvbsysmainusertypes` WHERE mutyp_status='1' and mutyp_delete='0' ORDER BY mutyp_userType ASC");
			return $query->result();
		
		}
		
		// --function used to get all user types--//
		public function getAllusertype()
		{
			$query=$this->db->query("SELECT mutyp_id_pk,mutyp_userType FROM `tblmvbsysmainusertypes` where mutyp_delete='0' and mutyp_status='1' ORDER BY mutyp_userType ASC");
			return $query->result();
		
		}
		
		// --Function used to get Active locations--//
		Public function getActiveCountry()
		{
			$result=$this->db->query("select * from tblmvbcountry Where cntr_status='1' and cntr_delete='0'");
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
			$query=$this->db->query("SELECT sysmu_id_pk,sysmu_userTypeId_fk,sysmu_email,sysmu_mobile,sysmu_empid,sysmu_username,sysmu_profile,sysmu_username,sysmu_password,
					                    sysmu_location,sysmu_country,sysmu_state,sysmu_description FROM tblmvbsysmainusers where sysmu_id_pk='" . $id . "'");
			return $query->result();
		
		}
		
		// --Function Used to get all Add New user-//
		public function addUser()
		{
			$created_date=date('Y-m-d H:i:s');
			$user_type_id=$this->input->post('selUsertype');
			$username=$this->input->post('txtUsername');
			
			$ini_email=$this->input->post('txtEmail');
			$email=$this->encryption->encrypt($ini_email);
			
			$mobile_no=$this->input->post('txtMobile');
			$mobile_no=$this->encryption->encrypt($mobile_no);
			
			$emp_id=$this->input->post('txtEmployeeid');
			$country=$this->input->post('selCountry');
			$state=$this->input->post('selState');
			$location=$this->input->post('selLocations');
			$description=$this->input->post('txtDescription');
			$check_password_type=$this->input->post('optradio');
			$created_by=$this->session->userdata('admin_id');
			
			if ($check_password_type == '0')
			{
				$final_password_ini=$this->input->post('txtPassword');
			} else
			{
				$final_password_ini=$this->input->post('txtAutopassword');
			}
			
			$final_password=$this->encryption->encrypt($final_password_ini);
			
			$data=array('sysmu_userTypeId_fk'=>$user_type_id,
				'sysmu_password'=>trim($final_password),
				'sysmu_mobile'=>trim($mobile_no),
				'sysmu_empid'=>trim($emp_id),
				'sysmu_email'=>trim($email),
				'sysmu_country'=>$country,
				'sysmu_state'=>$state,
				'sysmu_location'=>$location,
				'sysmu_username'=>trim($username),
				'sysmu_description'=>trim($description),
				'sysmu_createdDate'=>$created_date,
				'sysmu_createdBy'=>$created_by,
				'sysmu_modifiedDate'=>$created_date,
				'sysmu_modifiedBy'=>$created_by,
				'sysmu_status'=>'1');
			
			$this->db->insert('tblmvbsysmainusers',$data);
			$insert_id=$this->db->insert_id();

			//---------------------------------- Start Save Transaction Logs ---------------------------------//

			setSAActivityLogs('Transaction_activity','user_management_add');			

			//--------------------------------- End Save Transaction Logs ------------------------------------//

			$msg_to_send="Welcome to MVB. Thanks for registering.<br><br> Your Login Credentials are as follows: <br><br> Username - ".$ini_email."<br> Password - ".$final_password_ini;


			//$this->sendMandrillEmail($ini_email,'Welcome to MVB',$msg_to_send);
	
			return $insert_id;
		
		}

		public function editUser()
		{
			$created_date=date('Y-m-d H:i:s');
			$user_type_id=$this->input->post('selUsertype');
			$username=$this->input->post('txtUsername');
			$emp_id=$this->input->post('txtEmployeeid');
			$country=$this->input->post('selCountry');
			$state=$this->input->post('selState');
			$location=$this->input->post('selLocations');
			$description=$this->input->post('txtDescription');
			$created_by=$this->session->userdata('admin_id');
			$id=$this->input->post('txtUserid');
			
			$email=$this->input->post('txtEmail');
			$email=$this->encryption->encrypt($email);
			
			$mobile_no=$this->input->post('txtMobile');
			$mobile_no=$this->encryption->encrypt($mobile_no);


			//-------------------------------- Start Save Transaction Logs ----------------------------------//

			$query_user_manage_id=$this->db->query("SELECT sysmu_id_pk,sysmu_userTypeId_fk,sysmu_email,sysmu_mobile,sysmu_empid,sysmu_username,
					                    sysmu_location,sysmu_description FROM tblmvbsysmainusers where sysmu_id_pk='" . $id . "'");
			$row_user_manage_id=$query_user_manage_id->result();

			$transaction_logs_details='';

			$transaction_logs_details.='Edited for User Id - '.$id.' // ';

			if($user_type_id!=$row_user_manage_id[0]->sysmu_userTypeId_fk)
			{
					$transaction_logs_details.='Before User Type Id - '.$row_user_manage_id[0]->sysmu_userTypeId_fk.' && After User Type Id - '.$user_type_id.' // ';
			}
			
			if($email!=$row_user_manage_id[0]->sysmu_email)
			{
					$transaction_logs_details.='Before Email - '.$row_user_manage_id[0]->sysmu_email.' && After Email - '.$email.' // ';
			}

			if($mobile_no!=$row_user_manage_id[0]->sysmu_mobile)
			{
					$transaction_logs_details.='Before Mobile No - '.$row_user_manage_id[0]->sysmu_mobile.' && After Mobile No - '.$mobile_no.' // ';
			}

			if($emp_id!=$row_user_manage_id[0]->sysmu_empid)
			{
					$transaction_logs_details.='Before Emp Id - '.$row_user_manage_id[0]->sysmu_empid.' && After Emp Id - '.$emp_id.' // ';
			}

			if($location!=$row_user_manage_id[0]->sysmu_empid)
			{
					$transaction_logs_details.='Before location - '.$row_user_manage_id[0]->sysmu_empid.' && After location - '.$location.' // ';
			}

			if($username!=$row_user_manage_id[0]->sysmu_username)
			{
					$transaction_logs_details.='Before Username - '.$row_user_manage_id[0]->sysmu_username.' && After Username - '.$username.' // ';
			}

			if($description!=$row_user_manage_id[0]->sysmu_description)
			{
					$transaction_logs_details.='Before Description - '.$row_user_manage_id[0]->sysmu_description.' && After Description - '.$description.' // ';
			}

			setSAActivityLogs('Transaction_activity','user_management_edit',$transaction_logs_details);			

			//-----------------------------  End Save Transaction Logs -----------------------------------//

			
			$data=array('sysmu_userTypeId_fk'=>$user_type_id,
						'sysmu_email'=>trim($email),
						'sysmu_mobile'=>trim($mobile_no),
						'sysmu_empid'=>trim($emp_id),
						'sysmu_email'=>trim($email),
						'sysmu_country'=>$country,
						'sysmu_state'=>$state,
						'sysmu_location'=>$location,
						'sysmu_username'=>trim($username),
						'sysmu_description'=>trim($description),
						'sysmu_modifiedDate'=>$created_date,
						'sysmu_modifiedBy'=>$created_by);
			
			$this->db->where('sysmu_id_pk',$id);
			$this->db->update('tblmvbsysmainusers',$data);
			
			
			return $id;
		
		}
		
		// --- Function used to change status of User---//
		public function changeuserStatus($status,$userId)
		{
			$assign_id_for_status_change='';

			$transaction_logs_details='';

			for($i=0;$i < count($userId);$i ++)
			{
				$data=array('sysmu_status'=>$status);
				$this->db->where('sysmu_id_pk',$userId[$i]);
				
				$this->db->update('tblmvbsysmainusers',$data);

				$assign_id_for_status_change.=$userId[$i].',';
			}

			//------------------------------ Start Save Transaction Logs -----------------------------------//

			if($status=='0')
			{					
					$current_status='Deactivate';
			}
			else
			{					
					$current_status='Activate';
			}

			$transaction_logs_details.='Status change to '.$current_status.' for IDs - '.$assign_id_for_status_change;

			setSAActivityLogs('Transaction_activity','user_management_status',$transaction_logs_details);

			//-------------------------------  End Save Transaction Logs -----------------------------------//
			
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
				$result=$this->db->query("select sysmu_email from tblmvbsysmainusers where sysmu_id_pk='".$userId[$i]."'");

				$row=$result->result();

				$user_email_id=$this->encryption->decrypt($row[0]->sysmu_email);

				$characters='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$charactersLength=strlen($characters);
				
				$randomString='';
				for($j=0;$j < 11;$j ++)
				{
					$randomString_ini.=$characters [rand(0,$charactersLength - 1)];
				}
				$randomString=$this->encryption->encrypt($randomString_ini);
				$data=array('sysmu_password'=>$randomString);
				$this->db->where('sysmu_id_pk',$userId [$i]);
				
				$this->db->update('tblmvbsysmainusers',$data);

				$msg_to_send="Your Password has been reset successfully.<br><br> Your New Password are as follows: <br><br> New Password - ".$randomString_ini;


				$this->sendMandrillEmail($user_email_id,'Reset Password',$msg_to_send);

			}
			
			return true;
		
		}


		public function getUserType()
		{
					$query=$this->db->query("SELECT mut1.mutyp_id_pk,mut1.mutyp_userType,DATE_FORMAT(mut1.mutyp_createdDate,'%d/%m/%Y %k:%i %p') as created_date,mut.mutyp_userType as created_by,(CASE WHEN mut1.mutyp_status='1' THEN 'Active' ELSE 'Deactive' END) as status FROM tblmvbsysmainusertypes mut inner join tblmvbsysmainusertypes mut1 on (mut.mutyp_id_pk=mut1.mutyp_createdBy) where mut1.mutyp_delete='0' order by mut1.mutyp_id_pk DESC");
					return $query->result();
		}


		public function getAllUserTypeList()
		{
					$query=$this->db->query("SELECT mut.mutyp_id_pk,mut.mutyp_userType FROM tblmvbsysmainusertypes mut where mut.mutyp_delete='0' order by mut.mutyp_userType");
					return $query->result();
		}

		public function getallmodule()
		{
					$result=$this->db->query("SELECT mm_id_pk,mm_module_name FROM tblmvbmainmodules WHERE mm_menu_id='0' and mm_submenu_id='0' and 	mm_sub_submenu_id='0' and mm_status='1'");
				    return $result->result();
		}

		public function getallsubmodule($id="")
		{
					$result=$this->db->query("SELECT mm_id_pk,mm_module_name,mm_menu_id FROM tblmvbmainmodules WHERE mm_menu_id='".$id."' and mm_submenu_id='0' and mm_sub_submenu_id='0' and mm_status='1'");
				    return $result->result();
		}

		public function getallsubsubmodule($menu_id,$sub_module_id)
		{
					$result=$this->db->query("SELECT mm_id_pk,mm_module_name FROM tblmvbmainmodules WHERE mm_menu_id='".$menu_id."' and mm_submenu_id='".$sub_module_id."' and mm_sub_submenu_id='0' and mm_status='1'");
				    return $result->result();
		}

		public function addUserType()
		{
					$created_date=date('Y-m-d H:i:s');
					$created_by=$this->session->userdata('admin_id');

					$user_type_name=$this->input->post('txtUserTypeName');

					$data=array('mutyp_userType'=>trim($user_type_name),
								'mutyp_createdDate'=>$created_date,
								'mutyp_createdBy'=>$created_by,
								'mutyp_modifiedDate'=>$created_date,
								'mutyp_modifiedBy'=>$created_by,
								'mutyp_status'=>'1');					
									
					$this->db->insert('tblmvbsysmainusertypes',$data);

					$insert_id=$this->db->insert_id();

					$modules=$this->input->post('modules');


					for($k=0;$k<count($modules);$k++)
					{
									$data_mapping=array('map_module_id_fk'=>$modules[$k],
														'map_MainUsersId_fk'=>$insert_id,
														'map_createdDate'=>$created_date,
														'map_createdBy'=>$created_by,
														'map_modifiedDate'=>$created_date,
														'map_modifiedBy'=>$created_by,
														'map_status'=>'1');									
									
									$this->db->insert('tblmvbmainmodulemapping',$data_mapping);
					}

			//---------------------------------- Start Save Transaction Logs ---------------------------------//

			setSAActivityLogs('Transaction_activity','user_type_add');			

			//--------------------------------- End Save Transaction Logs ------------------------------------//


					return $insert_id;
		}

		public function editUserType()
		{
					$user_type_id=$this->input->post('hidden_user_type_id');

					$created_date=date('Y-m-d H:i:s');
					$created_by=$this->session->userdata('admin_id');

					$user_type_name=$this->input->post('txtUserTypeName');


			//---------------------------------- Start Save Transaction Logs ---------------------------------//

			$transaction_logs_details='';		

			$result_user_type_details=$this->db->query("Select mutyp_userType from tblmvbsysmainusertypes where mutyp_id_pk='".$user_type_id."'");	
			
			$row_user_type_details=$result_user_type_details->result();

			if($user_type_name!=$row_user_type_details[0]->mutyp_userType)
			{
						$transaction_logs_details.='Edited for User Type Id - '.$user_type_id.' // ';

						$transaction_logs_details.='Before User Type name - '.$row_user_type_details[0]->mutyp_userType.' && After User Type Name - '.$user_type_name;
			}	

			setSAActivityLogs('Transaction_activity','user_type_edit',$transaction_logs_details);			

			//--------------------------------- End Save Transaction Logs ------------------------------------//

					$data=array('mutyp_userType'=>trim($user_type_name),								
								'mutyp_modifiedDate'=>$created_date,
								'mutyp_modifiedBy'=>$created_by);					
									
					$this->db->where('mutyp_id_pk',$user_type_id);				
					$this->db->update('tblmvbsysmainusertypes',$data);

					$this->db->query("delete from tblmvbmainmodulemapping where map_MainUsersId_fk='".$user_type_id."'");
					
					$modules=$this->input->post('modules');

					for($k=0;$k<count($modules);$k++)
					{
									$data_mapping=array('map_module_id_fk'=>$modules[$k],
														'map_MainUsersId_fk'=>$user_type_id,
														'map_createdDate'=>$created_date,
														'map_createdBy'=>$created_by,
														'map_modifiedDate'=>$created_date,
														'map_modifiedBy'=>$created_by,
														'map_status'=>'1');									
									
									$this->db->insert('tblmvbmainmodulemapping',$data_mapping);


					}

					return $user_type_id;
		}

		public function getIdWiseUserType($id)
		{
				$query=$this->db->query("SELECT mut.mutyp_id_pk,mut.mutyp_userType FROM tblmvbsysmainusertypes mut where mut.mutyp_id_pk='".$id."'");
				
				return $query->row_array();
		}

		public function getIdWiseUserTypePrivileges($id)
		{
				$temp_array=array();

				$query=$this->db->query("SELECT map_module_id_fk FROM tblmvbmainmodulemapping where map_MainUsersId_fk='".$id."'");
				
				$user_type_privileges=$query->result();

				for($x=0;$x<count($user_type_privileges);$x++)
				{
						array_push($temp_array,$user_type_privileges[$x]->map_module_id_fk);
				}				

				return $temp_array;
		}


		public function changeUserTypeIdStatus($status,$usertypeid)
		{
				$assign_id_for_status_change='';

				$transaction_logs_details='';

				for($i=0;$i < count($usertypeid);$i ++)
				{
						$data=array('mutyp_status'=>$status);
						$this->db->where('mutyp_id_pk',$usertypeid[$i]);
						$this->db->update('tblmvbsysmainusertypes',$data);

						$assign_id_for_status_change.=$usertypeid[$i].',';
				}

			//------------------------------ Start Save Transaction Logs -----------------------------------//

			if($status=='0')
			{					
					$current_status='Deactivate';
			}
			else
			{					
					$current_status='Activate';
			}

			$transaction_logs_details.='Status change to '.$current_status.' for IDs - '.$assign_id_for_status_change;

			setSAActivityLogs('Transaction_activity','user_type_status',$transaction_logs_details);

			//-------------------------------  End Save Transaction Logs -----------------------------------//
				
				return true;
		}


		public function getModuleId($module_code)
		{
				$admin_user_type_id=$this->session->userdata('admin_user_type_id');

				$final_status=false;	

				$query_module_id=$this->db->query("SELECT mm_id_pk FROM tblmvbmainmodules where mm_module_code='".$module_code."'");
				
				$row_module_id=$query_module_id->result();

				if($admin_user_type_id!=1)
				{
					if(count($row_module_id)>0)
					{
							if($row_module_id[0]->mm_id_pk!=0)
							{
									$query_access_rights_id=$this->db->query("SELECT map_id_pk FROM tblmvbmainmodulemapping where map_module_id_fk='".$row_module_id[0]->mm_id_pk."' and map_MainUsersId_fk='".$admin_user_type_id."'");
							
									$row_access_rights_id=$query_access_rights_id->result();

									if(count($row_access_rights_id)>0)
									{
											$final_status=true;	
									}
							}
					}
				}
				else
				{
						$final_status=true;
				}

				return $final_status;
		}
		
		
		
		
		
		
		public function userProfile()
		{
                      
			$created_date=date('Y-m-d H:i:s');
			$location=$this->input->post('selLocation');
			if (! empty($_FILES['txtUpload']['name']))
			{
				$image=time() . $_FILES['txtUpload']['name'];
				move_uploaded_file($_FILES['txtUpload']['tmp_name'],"./uploads/adminprofile/$image");
                                chown(getcwd()."/uploads/adminprofile/$image", "mvbcellx");

			} else
			{
				$image=$this->input->post('txtPrevious');;
			}
			$created_by=$this->session->userdata('admin_id');
			
			$transaction_logs_details="Profile has been changed for Id='".$created_by."'";
		
			setSAActivityLogs('Transaction_activity','user_management_edit_profile',$transaction_logs_details);
		
			//-----------------------------  End Save Transaction Logs -----------------------------------//
		
				
			$data=array(
					'sysmu_location'=>$location,
					'sysmu_profile'=>$image,
					'sysmu_modifiedDate'=>$created_date,
					'sysmu_modifiedBy'=>$created_by);
				
			$this->db->where('sysmu_id_pk',$created_by);
			$this->db->update('tblmvbsysmainusers',$data);
				
				
			return $created_by;
		
		}
		

	
	
	public function changeOtp($pass,$admin_id)
	{
		$created_date=date('Y-m-d H:i:s');

		$pass=$this->encryption->encrypt($pass);
			
	
	    $transaction_logs_details='Password Changed  By User - '.$admin_id.' // ';
	
		setSAActivityLogs('Transaction_activity','user_management_Change Password',$transaction_logs_details);
	
		//-----------------------------  End Save Transaction Logs -----------------------------------//
	
			
		$data=array(
				'sysmu_password'=>$pass,
				'sysmu_modifiedDate'=>$created_date,
				'sysmu_modifiedBy'=>$admin_id);
			
		$this->db->where('sysmu_id_pk',$admin_id);
		$this->db->update('tblmvbsysmainusers',$data);
			
			
		return $admin_id;
	
	}

	public function checkUserTypeExists($user_type_id)
	{
			$query_usertype=$this->db->query("SELECT sysmu_id_pk FROM tblmvbsysmainusers where sysmu_userTypeId_fk='".$user_type_id."'");

                       
				
			$row_usertype=$query_usertype->result();

			return $row_usertype;
	}	

	public function getClientUserWise($id)
	{
			$query_client_details=$this->db->query("SELECT cl.*,SUM(cp.clntp_finalPrice) as total_rev_new_ac,SUM(clntp_smsCredit) as total_sms_purchased,SUM(clntp_emailCredit) as total_email_purchased FROM tblmvbclients cl left join tblmvbclientpackage cp on (cl.clnt_id_pk=cp.clntp_clntId_fk) where clnt_createdBy='".$id."' order by cl.clnt_id_pk");                       
				
			$row_client_details=$query_client_details->result();

			return $row_client_details;	
	}


	public function sendMandrillEmail($customer_email,$subject,$description)
	{
				$from_email_id='info@myvisitorsbook.in';

				try 
                {
                    $mandrill = new Mandrill('iuRU9pFj9JXaKLwJuYM2Fw');//new : t57dyzbulLFY5_eOzDsHIA (tokri account)   
                    //old:eR7u9tMyZL6LWKiBXROv7w   (sandesh account)
                    $template_name = 'Sample template';
                    $template_content = array(array('name' => 'main',//the name of the mc:edit editable region to inject into. Required
                                                    'content' =>'Hi *|NAME|*, thanks for signing up. '//the content to inject. Required
                                                    ),
                    							array('name' => 'footer',//the name of the mc:edit editable region to inject into. Required
                                                    'content' =>'Copyright 2017'//the content to inject. Required
                                                    )
                                            );
                    $message = array(
                                    'html' => '<p>'.$description.'</p>',//send html template if template not available on mailchimp
                                    'text' => 'Example text content',//optional full text content to be sent
                                    'subject' => $subject,//the message subject
                                    'from_email' => $from_email_id,//the sender email address
                                    'from_name' => 'MVB',//optional from name to be used
                                    'to' => array(
                                                    array(
                                                        'email' => $customer_email,//the email address of the recipient. Required
                                                        //the optional display name to use for the recipient
                                                        'type' => 'to'//the header type to use for the recipient, defaults to "to" if not provided. oneof(to, cc, bcc)
                                                        )
                                                ),
                                    'headers' => array('Reply-To' => $from_email_id),//optional extra headers to add to the message (most headers are allowed)
                                    'important' => true,//whether or not this message is important, and should be delivered ahead of non-important messages
                                    'track_opens' => null,//whether or not to turn on open tracking for the message
                                    'track_clicks' => null,//whether or not to turn on click tracking for the message
                                    'auto_text' => null,//whether or not to automatically generate a text part for messages that are not given text
                                    'auto_html' => null,//whether or not to automatically generate an HTML part for messages that are not given HTML
                                    'inline_css' => null,//whether or not to automatically inline all CSS styles provided in the message HTML - only for HTML documents less than 256KB in size
                                    'url_strip_qs' => null,//whether or not to strip the query string from URLs when aggregating tracked URL data
                                    'preserve_recipients' => null,//whether or not to expose all recipients in to "To" header for each email
                                    'view_content_link' => null,//set to false to remove content logging for sensitive emails
                                    'bcc_address' => null,//an optional address to receive an exact copy of each recipient's email
                                    'tracking_domain' => null,//a custom domain to use for tracking opens and clicks instead of mandrillapp.com
                                    'signing_domain' => null,//a custom domain to use for SPF/DKIM signing instead of mandrill (for "via" or "on behalf of" in email clients)
                                    'return_path_domain' => null,//a custom domain to use for the messages's return-path
                                    'merge' => true,//whether to evaluate merge tags in the message. Will automatically be set to true if either merge_vars or global_merge_vars are provided.
                                    'merge_language' => 'mailchimp',//the merge tag language to use when evaluating merge tags, either mailchimp or handlebars. oneof(mailchimp, handlebars)
                                    'global_merge_vars' => array(
                                                                array(
                                                                    'name' => 'MOBILE_NO',//the name of the mc:edit editable region to inject into. Required
                                                                    'content' => ''//$result[0]->vis_mobile//the content to inject. Required
                                                                ),
                                                                array(
                                                                    'name' => 'EMAIL_VAR',//the name of the mc:edit editable region to inject into. Required
                                                                    'content' => ''//base_url().'user/activate/'.$user_id//the content to inject. Required
                                                                )
                                                            ),
                                    'merge_vars' => array(
                                                            array(
                                                                'rcpt' => $customer_email,//the email address of the recipient that the merge variables should apply to. required
                                                                'vars' => array(
                                                                    array(
                                                                        'name' => 'MOBILE_NO',//the name of the mc:edit editable region to inject into. Required
                                                                        'content' => ''//$result[0]->vis_mobile//the content to inject. Required
                                                                    ),
                                                                    array(
                                                                        'name' => 'EMAIL_VAR',//the name of the mc:edit editable region to inject into. Required
                                                                        'content' => ''//base_url().'user/activate/'.$user_id//the content to inject. Required
                                                                    ),
                                                                    array(
                                                                        'name' => 'NAME',//the name of the mc:edit editable region to inject into. Required
                                                                        'content' => ''//$result[0]->vis_firstName//the content to inject. Required
                                                                    )
                                                                )
                                                            )
                                                        ),
                                    'tags' => array('password-resets'),//a single tag - must not start with an underscore. required
                                    'subaccount' => 'mvb_visitors',//the unique id of a subaccount for this message - must already exist or will fail with an error
                                    'google_analytics_domains' => array(),//an array of strings indicating for which any matching URLs will automatically have Google Analytics parameters appended to their query string automatically.
                                    'google_analytics_campaign' => null,//optional string indicating the value to set for the utm_campaign tracking parameter. If this isn't provided the email's from address will be used instead.
                                    'metadata' => array(),//metadata an associative array of user metadata. Mandrill will store this metadata and make it available for retrieval. In addition, you can select up to 10 metadata fields to index and make searchable using the Mandrill search api.
                                    'recipient_metadata' => array(
                                        array(
                                            'rcpt' => $customer_email,//the email address of the recipient that the metadata is associated with
                                            'values' => array('user_id' => '')//an associated array containing the recipient's unique metadata. If a key exists in both the per-recipient metadata and the global metadata, the per-recipient metadata will be used.
                                        )
                                    ),
                                    'attachments' => array(
                            //            array(
                            //                'type' => 'text/plain',//the MIME type of the attachment
                            //                'name' => 'myfile.txt',//the file name of the attachment
                            //                'content' => 'ZXhhbXBsZSBmaWxl'
                            //            )
                                    ),
                                    'images' => array(
                            //            array(
                            //                'type' => 'image/png',
                            //                'name' => 'IMAGECID',
                            //                'content' => 'ZXhhbXBsZSBmaWxl'
                            //            )
                                    )
                                );
                    $async = false;//enable a background sending mode that is optimized for bulk sending. In async mode, messages/send will immediately return a status of "queued" for every recipient. To handle rejections when sending in async mode, set up a webhook for the 'reject' event. Defaults to false for messages with no more than 10 recipients; messages with more than 10 recipients are always sent asynchronously, regardless of the value of async.
                    $ip_pool = 'Main Pool';//the name of the dedicated ip pool that should be used to send the message. If you do not have any dedicated IPs, this parameter has no effect. If you specify a pool that does not exist, your default pool will be used instead.
                    $send_at = null;//when this message should be sent as a UTC timestamp in YYYY-MM-DD HH:MM:SS format. If you specify a time in the past, the message will be sent immediately. An additional fee applies for scheduled email, and this feature is only available to accounts with a positive balance.
                    $result = $mandrill->messages->send($message, $async, $ip_pool, $send_at);
                    
                    return $result;
                } 
                catch(Mandrill_Error $e) 
                {
                    // Mandrill errors are thrown as exceptions
                    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
                    // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
                    throw $e;
                }
	}


	public function getEditStateListing($country_id)
	{
			$result=$this->db->query("Select * from tblmvbstate where stat_countryId_fk='".$country_id."' and stat_delete='0'");

			$row=$result->result();

			return $row;
	}

	public function getEditLocationListing($state_id)
	{
			$result=$this->db->query("Select * from tblmvbcity where cty_stateId_fk='".$state_id."' and cty_delete='0'");

			$row=$result->result();

			return $row;
	}

	public function getLocationDetails($location_id)
	{
			$result=$this->db->query("Select * from tblmvbcity where cty_id_pk='".$location_id."'");

			$row=$result->result();

			return $row[0]->cty_name;
	}


}
	
?>