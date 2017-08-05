<?php

function getAccessRights($module_code)
{
		$CI =& get_instance();
	    // $CI->load->model('head/user_management_model');

	    // $r = $CI->user_management_model->getModuleId($module_code);

	    $admin_user_type_id=$CI->session->userdata('admin_user_type_id');

		$final_status=false;	



		$query_module_id=$CI->db->query("SELECT mm_id_pk FROM tblmvbmainmodules where mm_module_code='".$module_code."'");
		
		$row_module_id=$query_module_id->result();

		

		if($admin_user_type_id!=1)
		{
			if(count($row_module_id)>0)
			{
					if($row_module_id[0]->mm_id_pk!=0)
					{

							$query_access_rights_id=$CI->db->query("SELECT map_id_pk FROM tblmvbmainmodulemapping where map_module_id_fk='".$row_module_id[0]->mm_id_pk."' and map_MainUsersId_fk='".$admin_user_type_id."'");
					
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


function getAdminAccessRights($module_code)
{
		$CI =& get_instance();
	    // $CI->load->model('admin/user_management_model');

	    // $r = $CI->user_management_model->getModuleId($module_code);

	    $admin_user_type_id=$CI->session->userdata('admin_admin_user_type_id');
	    $client_id=$CI->session->userdata('client_id');

		$final_status=false;	

		$query_module_id=$CI->db->query("SELECT mod_id_pk FROM tblmvbmodules where mod_module_code='".$module_code."'");
		
		$row_module_id=$query_module_id->result();

		if($admin_user_type_id!=1)
		{
			if(count($row_module_id)>0)
			{
					if($row_module_id[0]->mm_id_pk!=0)
					{
							$query_access_rights_id=$CI->db->query("SELECT mmap_id_pk FROM tblmvbmodulemapping where mmap_module_id_fk='".$row_module_id[0]->mm_id_pk."' and mmap_UsersId_fk='".$admin_user_type_id."' and mmap_client_id_fk='".$client_id."'");
					
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


function setSAActivityLogs($type="",$login_act="",$activity_details="")
{	
		$CI =& get_instance();
		
		if($type=='Login_activity')
		{
				 $CI->load->model('activity_logs_model');

	    		 $r = $CI->activity_logs_model->setLoginLogs($type,$login_act);	  
		}
		else
		{
				 $CI->load->model('activity_logs_model');

	    		 $r = $CI->activity_logs_model->setTransactionLogs($type,$login_act,$activity_details);
		}		
}


function setAActivityLogs($type="",$login_act="",$activity_details="")
{
		$CI =& get_instance();

		if($type=='Login_activity')
		{
				 $CI->load->model('admin_activity_logs_model');

	    		 $r = $CI->admin_activity_logs_model->setLoginLogs($type,$login_act);	  
		}
		else
		{
				 $CI->load->model('admin_activity_logs_model');

	    		 $r = $CI->admin_activity_logs_model->setTransactionLogs($type,$login_act,$activity_details);
		}
}

function setRSActivityLogs($type="",$login_act="",$activity_details="")
{
		$CI =& get_instance();

		if($type=='Login_activity')
		{
				 $CI->load->model('reseller_activity_logs_model');

	    		 $r = $CI->reseller_activity_logs_model->setLoginLogs($type,$login_act);	  
		}
		else
		{
				 $CI->load->model('reseller_activity_logs_model');

	    		 $r = $CI->reseller_activity_logs_model->setTransactionLogs($type,$login_act,$activity_details);
		}
}



//----function get localize keyword---//
function getLocalkeyword($keyword)
{
// 	$CI =& get_instance();
// 	$headId=$CI->session->userdata('admin_id');
// 	$adminId=$CI->session->userdata('admin_admin_id');
// 	$resellerId=$CI->session->userdata('reseller_id');
// 	$language="";
	
// 	if($headId!="")
// 	{	
// 		$result=$CI->db->query("SELECT `sysmu_id_pk`,`sysmu_languageId_fk` FROM `tblmvbsysmainusers` WHERE sysmu_id_pk='".$headId."'");
// 		$result=$result->result();
// 		$language=$result[0]->sysmu_languageId_fk;
// 	}
// 	else if($resellerId!="")
// 		{
// 			$result=$CI->db->query("SELECT `sysmu_id_pk`,`sysmu_languageId_fk` FROM `tblmvbsysmainusers` WHERE sysmu_id_pk='".$resellerId."'");
// 			$result=$result->result();
// 			$language=$result[0]->sysmu_languageId_fk;
// 		}
// 	else if($adminId!="")
// 	{
// 		$result=$CI->db->query("SELECT `sysu_id_pk`, `sysu_languageId_fk` FROM `tblmvbsystemusers` Where sysu_id_pk='".$adminId."'");
// 		$result=$result->result();
// 		$language=$result[0]->sysu_languageId_fk;
		
// 	}	
	
// 	$resultKeyword=$CI->db->query("SELECT tblmvbkeywords.keywd_id_pk,tblmvbkeywords.kewd_name,tblmvblocalization.localise_keyword FROM tblmvbkeywords LEFT JOIN
// 		                           tblmvblocalization ON tblmvbkeywords.keywd_id_pk=tblmvblocalization.localise_keyId_fk WHERE tblmvbkeywords.kewd_name='".$keyword."'
// 		                           AND tblmvblocalization.localise_langId_fk='".$language."'");
// 	$resultKeyword=$resultKeyword->result();


// 	if(count($resultKeyword)>0)
// 	{


// 		$keyword=$resultKeyword[0]->localise_keyword;
// 		echo $keyword;
// 	}
    
//     else 
//     {
//     	$chk=$CI->db->query("SELECT `mk_id_pk`, `mk_keyword`, `mk_languageid_fk` FROM `tblmvbmissingkeyword` WHERE mk_keyword='".$keyword."' AND mk_languageid_fk='".$language."'");
// 		$chk=$chk->result();
    	
//     	if(count($chk)==0)
//     	{	
//         	$data=array('mk_keyword'=>$keyword,
// 				    	'mk_languageid_fk'=>$language);
// 	    	$CI->db->insert('tblmvbmissingkeyword',$data);
//     	}
    	
//     	echo "????????";
//     }

echo $keyword;
}


function checkPackageExpiration($client_id)
{	
		$CI =& get_instance();

		$result_package_details=$CI->db->query("SELECT * FROM tblmvbclientpackage where clntp_clntId_fk='".$client_id."' and ('".date('Y-m-d')."' between clntp_startDate and clntp_endDate)");
		
		$row_package_details=$result_package_details->result();	

		if(count($row_package_details)>0)
		{
				return true;
		}
		else
		{
				return false;
		}	
}



function checkPackageRights($client_id,$type)
{		
				$CI =& get_instance();

				$result_package_details=$CI->db->query("SELECT * FROM tblmvbclientpackage where clntp_clntId_fk='".$client_id."'");

				$row_package_details=$result_package_details->result();

				if($type=='email_template_check')
				{
							$result_email_temp_check=$CI->db->query("SELECT etr_id_pk FROM tblmvbemailtemprequest where etr_client_id_fk='".$client_id."'");
		
							$row_email_temp_check=$result_email_temp_check->result();

							if(count($row_email_temp_check)>=$row_package_details[0]->clntp_emailTemplate)
							{
										return false;
							}
							else
							{
										return true;
							}	
				}
				else if($type=='sms_template_check')
				{
							$result_sms_temp_check=$CI->db->query("SELECT str_id_pk FROM tblmvbsmstemprequest where str_client_id_fk='".$client_id."'");
		
							$row_sms_temp_check=$result_sms_temp_check->result();

							if(count($row_sms_temp_check)>=$row_package_details[0]->clntp_smsTemplate)
							{
										return false;
							}
							else
							{
										return true;
							}
				}
				else if($type=='custom_field')
				{
							$result_custom_field=$CI->db->query("SELECT cfi_id_pk FROM tblmvbcustomfields where cfi_clientId='".$client_id."'");
		
							$row_custom_field=$result_custom_field->result();

							if(count($row_custom_field)==$row_package_details[0]->clntp_customFields)
							{
										return false;
							}
							else
							{
										return true;
							}
				}
				else if($type=='visitor_records')
				{
							$result_visitor_records=$CI->db->query("SELECT vis_id_pk FROM tblmvbvisitors where vis_clientId_fk='".$client_id."'");
		
							$row_visitor_records=$result_visitor_records->result();

							if(count($row_visitor_records)>=$row_package_details[0]->clntp_visitorRecord)
							{
										return false;
							}
							else
							{
										return true;
							}
				}
				else if($type=='mo_registration')
				{
							$result_moreg=$CI->db->query("SELECT mreg_id_pk FROM tblmvbmoreg where mreg_clientId_fk='".$client_id."'");
		
							$row_moreg=$result_moreg->result();

							if(count($row_moreg)>=$row_package_details[0]->clntp_moRegstr)
							{
										return false;
							}
							else
							{
										return true;
							}
				}
				else if($type=='branch')
				{
							$result_branch=$CI->db->query("SELECT brn_id_pk FROM tblmvbbranches where brn_clientId_fk='".$client_id."'");
		
							$row_branch=$result_branch->result();

							if(count($row_branch)>=$row_package_details[0]->clntp_branch)
							{
										return false;
							}
							else
							{
										return true;
							}
				}
				else if($type=='user_management')
				{
							$result_user_mgt=$CI->db->query("SELECT sysu_id_pk FROM tblmvbsystemusers where 	sysu_clientId_fk='".$client_id."'");
		
							$row_user_mgt=$result_user_mgt->result();

							if(count($row_user_mgt)>=$row_package_details[0]->clntp_userMgt)
							{
										return false;
							}
							else
							{
										return true;
							}
				}
				else
				{
							$result_sender_id=$CI->db->query("SELECT sid_id_pk FROM tblmvbsenderidrequest where sid_clientId_fk='".$client_id."'");
		
							$row_sender_id=$result_sender_id->result();

							if(count($row_sender_id)>=$row_package_details[0]->clntp_senderId)
							{
										return false;
							}
							else
							{
										return true;
							}
				}		
}



function getSmsApiCredentials()
{
		$CI =& get_instance();

		$result_sms_api_details=$CI->db->query("SELECT * FROM smscgateway_bk");
		
		$row_sms_api_details=$result_sms_api_details->result();	

		return $row_sms_api_details;		
}


?>
