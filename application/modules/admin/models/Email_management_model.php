<?php

class Email_management_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}

	public function getAllfield()
	{	

		$result=$this->db->query("SELECT * FROM tblmvbemailmanagement where em_client_id=1 ");
		$CampaignDetails=$result->result();
		// print_r($CampaignDetails);
		foreach($CampaignDetails as $campaignRecord)
		{
			$smsCount=0;
			if ($campaignRecord->em_email_type == '1')
			{
				$campType='Group';
				// tblmvbgroups where grp_branchId_fk=1
				// $smsCount +=$smsCount;
			} else
			{
				$campType='NA';
			}
			$smsCount=$this->getCampainwiseSMSCount($campaignRecord->em_id_pk);
			$campDBArray[]=array(
								'campaignTitle'=>$campaignRecord->em_campaign_name,
								'scheduleDateTime'=>$campaignRecord->em_email_schedule_date,
								'campaignContent'=>$campaignRecord->em_email_content,
								'campaignContactGroup'=>$campType);
		}
		return $campDBArray;
	
	}

	public function getCampainwiseSMSCount($campId=0)
	{
		$query=$this->db->query("select seu_id_pk from tblmvbsendemailusers where seu_em_id_fk='" . $campId . "'");
		return $query->num_rows();
	
	}

	public function getuserGroup()
	{   
                $branch_id=$this->session->userdata('branch_id');    
                
		$result=$this->db->query("SELECT * FROM tblmvbgroups where grp_branchId_fk='".$branch_id."'");
		return $result->result();
	
	}

	public function getuser()
	{
		$result=$this->db->query("SELECT * FROM tblmvbvisitors where vis_branchId_fk=1");
		return $result->result();
	
	}

	public function getTemplateRequest()
	{
		// $result=$this->db->query("select stemp.* from tblmvbsmstemplate as stemp left join tblmvbsmstemprequest as stempreq ON(stemp.sms_id_pk=stempreq.str_id_pk)");
            // where str_client_id_fk=1
		$result=$this->db->query("select * from tblmvbemailtemprequest where etr_status = '1' and etr_admin_status='approved' ");
		
		return $result->result();
	
	}

	public function getSmsSignature()
	{
		$result=$this->db->query("select * from  tblmvbsmssignature where sig_clientId_fk=1");
		return $result->result();
	
	}

	public function getSenderId()
	{
		// $result=$this->db->query("select csId.* from tblmvbclients as cs left join tblmvbsenderid as csId ON(cs.clnt_id_pk=csId.sid_clientId_fk)");
		$result=$this->db->query("select * from tblmvbsenderid where sid_clientId_fk=1");
		return $result->result();
	
	}

	public function getUserDetailsbyIdforEmail($userId="")
	{
		$userDBArray=array();
		
		$result=$this->db->query("select * from tblmvbvisitors where vis_id_pk='" . $userId . "'");
		$userRecord=$result->result();
		// print_r($userRecord);
		// echo $userRecord[0]->vis_firstName;die();
		$masterColumn=array(
							'Title'=>$userRecord[0]->vis_title,
							'First Name'=>$userRecord[0]->vis_firstName,
							'Middle Name'=>$userRecord[0]->vis_middleName,
							'Last Name'=>$userRecord[0]->vis_lastName,
							'Mobile Number'=>$userRecord[0]->vis_mobile,
							'Email Id'=>$userRecord[0]->vis_email,
							'Address'=>$userRecord[0]->vis_address,
							'Zip Code'=>$userRecord[0]->vis_zipCode,
							'Country'=>$userRecord[0]->vis_countryId_fk,
							'State'=>$userRecord[0]->vis_stateId_fk,
							'City'=>$userRecord[0]->vis_cityId_fk,
							'Website'=>$userRecord[0]->vis_website,
							'Landline Number'=>$userRecord[0]->vis_landline,
							'Fax'=>$userRecord[0]->vis_fax,
							'Contact Group',
							'Business Category'=>$userRecord[0]->vis_businessCategory,
							'Business Name'=>$userRecord[0]->vis_businessName,
							'DOB'=>$userRecord[0]->vis_dob,
							'Anniversary Date'=>$userRecord[0]->vis_anniversaryDate);
		
		$client_id=$this->session->userdata('client_id');
		$result_custom_fields=$this->db->query("Select cfi_label,cfi_value From tblmvbcustomfields where (cfi_clientId='" . $client_id . "' OR cfi_clientId='0') and cfi_status='1'");
		
		$row_custom_fields=$result_custom_fields->result();
		$arrayC=array();
		if (count($row_custom_fields) > 0)
		{
			for($k=0;$k < count($row_custom_fields);$k ++)
			{
				$labelArray[]=$row_custom_fields[$k]->cfi_label;
				$valueArray[]=$row_custom_fields[$k]->cfi_value;
				// $arrayC=array_combine($label, $value);
				// $html.='<li class="list-group-item">'.$row_custom_fields[$k]->cfi_label.' </li>';
				// array_push($masterColumn,$arrayC);
			}
			$arrayC=array_combine($labelArray,$valueArray);
			$arrayFinal=array_merge($masterColumn,$arrayC);
		} /*
		   * echo "<pre>";
		   * print_r($arrayFinal);
		   * print_r($masterColumn);die();
		   */
		return $arrayFinal;
	
	}

	public function EmailString($messageString="",$userId="")
	{
		$newstr=array();
		$newReValue=array();
		$newstr1="";
		$i=0;
		$replaceColumnValue=$this->getUserDetailsbyIdforEmail($userId);
		/*
		 * echo $messageString;
		 * die();
		 */
		// $masterColumn=array('First Name','Middle Name','Last Name');
		$masterColumn=array(
							'First Name',
							'Middle Name',
							'Last Name',
							'Mobile Number',
							'Email Id',
							'Address',
							'Zip Code',
							'Country',
							'State',
							'City',
							'Website',
							'Landline Number',
							'Fax',
							'Contact Group',
							'Business Name',
							'Business Category',
							'DOB',
							'Anniversary Date');
		$client_id=$this->session->userdata('client_id');
		$result_custom_fields=$this->db->query("Select cfi_label From tblmvbcustomfields where (cfi_clientId='" . $client_id . "' OR cfi_clientId='0') and cfi_status='1'");
		
		$row_custom_fields=$result_custom_fields->result();
		
		if (count($row_custom_fields) > 0)
		{
			for($k=0;$k < count($row_custom_fields);$k ++)
			{
				// $html.='<li class="list-group-item">'.$row_custom_fields[$k]->cfi_label.' </li>';
				array_push($masterColumn,$row_custom_fields[$k]->cfi_label);
			}
		}
		/*
		 * echo "<pre>";
		 * print_r($replaceColumnValue);die();
		 */
		// $replaceColumnValue=array('First Name'=>'Prashant','Middle Name'=>'Devidas','Last Name'=>'Ingle','DOB'=>'01-09-1988');
		foreach($masterColumn as $masterValue)
		{
			// $expostData=explode($masterValue, $postData['txtMessage']);
			// print_r($expostData);die();
			if (strstr($messageString,$masterValue))
			{
				// echo "1";
				array_push($newReValue,[
											$masterValue,
											$replaceColumnValue[$masterValue]]);
				
				if ($i != 0)
				{
					$replaceStr=$newMessageStruserWise;
				} else
				{
					$replaceStr=$messageString;
				}
				$newMessageStruserWise=str_replace('##' . $masterValue . '##',$replaceColumnValue[$masterValue],$replaceStr);
				$i ++;
			} else
			{
			}
		}
		return $newMessageStruserWise;
	
	}
         public function deductEmailBalance($branch_id,$count)
        {
                $this->db->query("Update tblmvbbranches set brn_emailCredit=brn_emailCredit-'".$count."' where brn_id_pk='".$branch_id."'");

                return true;
        }
	public function addCampaingRecord($postData="")
	{
  		$branch_id=$this->session->userdata('branch_id');
  		$client_id=$this->session->userdata('client_id');
  		$admin_user_id=$this->session->userdata('admin_admin_id');
		$schDtTime=explode('-',$postData['schedule_dt_time']);
		$shc_dt=date('Y-m-d',strtotime($schDtTime[0]));
		$shc_time=date('H:i s',strtotime($schDtTime[1]));
		$scheduleDateTime=$shc_dt . " " . $shc_time;
		
		if (isset($postData['schedule']))
		{
			$status=1;
		} 
		else
		{
			$status=0;
		}

		if ($postData['chk1'] == 'group')
		{
			$campType=1;
		} 
		else
		{
			$campType=0;
		}
		
		$campaignDBArray=array(
							'em_campaign_name'=>$postData['campaignName'],
							'em_subject_name'=>$postData['subject_name'],
							'em_email_template_id'=>$postData['selectTemplate'],
							'em_email_content'=>$postData['txtMessage'],
							'em_email_schedule_date'=>$scheduleDateTime,
							'em_email_schedule_status'=>$status,
							'em_email_type'=>$campType,
							'em_created_by'=>$admin_user_id,
							'em_client_id'=>$client_id,
							'em_created_date'=>date("Y-m-d H:i:s"));
		$this->db->insert('tblmvbemailmanagement',$campaignDBArray);
		$LastCampainId=$this->db->insert_id();
		$idlist=implode(",",$data);
		// echo 'time is - '.$shc_dt.'<br>'.$shc_time;
		$type=$postData['chk1'];
		
		$i=0;
		if (! empty($postData['selectSearchName']))
		{
			foreach($postData['selectSearchName'] as $searchName)
			{
		 		$check_sms_balance=$this->getBranchBalance($branch_id);
                
                if($check_sms_balance > 0)
                {

								$userMessageStr=$this->EmailString($postData['txtMessage'],$searchName);
								$EmailId=$this->getUserEmailId($searchName);
								$final_email_sent=$this->sendMandrillEmail($EmailId->vis_email,$subject_name,$userMessageStr);
								$cmapainUserDBArray=array('seu_em_id_fk'=>$LastCampainId,
														'seu_visitor_id'=>$searchName,
														'seu_group_id'=>0,
														'seu_client_id_fk'=>$client_id,
														'seu_branchId_fk'=>$branch_id,
														'seu_message_details'=>$userMessageStr,
														'seu_cDate'=>date('Y-m-d H:i:s'),
														'seu_emailstatus'=>1);
								$this->db->insert('tblmvbsendemailusers',$cmapainUserDBArray);

								if($status==0)
								{
										$email_sent_status=$final_email_sent[0]->sent;

										$email_reject_reason=$final_email_sent[0]->reject_reason;

										$email_status_id=$final_email_sent[0]->_id;	

										$cmapainUserDBArray=array('seu_em_id_fk'=>$LastCampainId,
																'seu_visitor_id'=>$searchName,
																'seu_group_id'=>0,
																'seu_client_id_fk'=>$client_id,
						                                        'seu_branchId_fk'=>$branch_id,
																'seu_message_details'=>$userMessageStr,
																'seu_cDate'=>date('Y-m-d H:i:s'),
																'seu_emailstatus'=>1,
																'seu_emailsendstatus'=>$email_sent_status,
																'seu_failed_reason'=>$email_reject_reason,
																'seu_sendFor'=>'send_email_normal',
																'seu_scheduled'=>$status);
											
										$this->db->insert('tblmvbsendemailuserslogs',$cmapainUserDBArray);
								}		

								$otherdata=$otherdata . implode(",",$cmapainUserDBArray);
								
								setAActivityLogs('Transaction_activity','AAddEmailform_Add',"Added Data :- " . $idlist . "  field Values:-" . $otherdata);
                                
                                $this->deductEmailBalance($branch_id,1);
				}
				else
				{
								if($status==0)
								{
	                                    $cmapainUserDBArray=array(
														'seu_em_id_fk'=>$LastCampainId,
														'seu_visitor_id'=>$searchName,
														'seu_group_id'=>0,
														'seu_client_id_fk'=>$client_id,
				                                        'seu_branchId_fk'=>$branch_id,
														'seu_message_details'=>$userMessageStr,
														'seu_failed_reason'=>'Insufficient email credit',
														'seu_cDate'=>date('Y-m-d H:i:s'),
														'seu_emailstatus'=>0,
														'seu_emailsendstatus'=>0,
														'seu_sendFor'=>'send_email_normal',
														'seu_scheduled'=>$status);
										
										$this->db->insert('tblmvbsendemailuserslogs',$cmapainUserDBArray);
								}
				}
			}
		}
		if (! empty($postData['selectgroup']))
		{
			foreach($postData['selectgroup'] as $searchGroup)
			{
				if ($searchGroup > 0)
				{
					// $searchNameId=$searchGroup;
					$visitorIdfromGroup=$this->getVisitorFromgroup($searchGroup);
					/*
					 * print_r($visitorIdfromGroup);
					 * die();
					 */
					foreach($visitorIdfromGroup as $GroupVId)
					{
                                $check_sms_balance=$this->getBranchBalance($branch_id);
                                if($check_sms_balance > 0 )
                                {
												$userMessageStr=$this->EmailString($postData['txtMessage'],$GroupVId->gv_visitorId_fk);
												
												$EmailId=$this->getUserEmailId($userId);
												$final_email_sent=$this->sendMandrillEmail($EmailId->vis_email,$subject_name,$userMessageStr);
												$cmapainUserDBArray=array(
																		'seu_em_id_fk'=>$LastCampainId,
																		'seu_visitor_id'=>$GroupVId->gv_visitorId_fk,
																		'seu_client_id_fk'=>$client_id,
			                                        					'seu_branchId_fk'=>$branch_id,
																		'seu_group_id'=>$searchGroup,
																		'seu_cDate'=>date('Y-m-d H:i:s'),
																		'seu_emailstatus'=>1,
																		'seu_message_details'=>$userMessageStr);
												$this->db->insert('tblmvbsendemailusers',$cmapainUserDBArray);

												if($status==0)
												{
														$email_sent_status=$final_email_sent[0]->sent;

														$email_reject_reason=$final_email_sent[0]->reject_reason;

														$email_status_id=$final_email_sent[0]->_id;	

														$cmapainUserDBArray=array(
															'seu_em_id_fk'=>$LastCampainId,
															'seu_visitor_id'=>$GroupVId->gv_visitorId_fk,
															'seu_group_id'=>$searchGroup,
															'seu_client_id_fk'=>$client_id,
					                                        'seu_branchId_fk'=>$branch_id,
															'seu_message_details'=>$userMessageStr,
															'seu_cDate'=>date('Y-m-d H:i:s'),
															'seu_emailstatus'=>1,
															'seu_emailsendstatus'=>$email_sent_status,
															'seu_failed_reason'=>$email_reject_reason,
															'seu_sendFor'=>'send_email_normal',
															'seu_scheduled'=>$status);
		                                                    
		                                                $this->db->insert('tblmvbsendemailuserslogs',$cmapainUserDBArray);
                                            	}

												$otherdata=$otherdata . implode(",",$cmapainUserDBArray);
												setAActivityLogs('Transaction_activity','AAddEmailform_Add',"Added Data :- " . $idlist . "  field Values:-" . $otherdata);

                                                $this->deductEmailBalance($branch_id,1);
                                }
                                else
                                {
                                		if($status==0)
										{
                                                    $cmapainUserDBArray=array(
													'seu_em_id_fk'=>$LastCampainId,
													'seu_visitor_id'=>$GroupVId->gv_visitorId_fk,
													'seu_group_id'=>$searchGroup,
													'seu_client_id_fk'=>$client_id,
			                                        'seu_branchId_fk'=>$branch_id,
													'seu_message_details'=>$userMessageStr,
													'seu_failed_reason'=>'Insufficient email credit',
													'seu_cDate'=>date('Y-m-d H:i:s'),
													'seu_emailstatus'=>0,
													'seu_emailsendstatus'=>0,
													'seu_sendFor'=>'send_email_normal',
													'seu_scheduled'=>$status);
                                                    
                                                    $this->db->insert('tblmvbsendemailuserslogs',$cmapainUserDBArray);
                                        }
                                }
					}
					
					// $searchNameId=
				} 
				else
				{
					$searchNameId=0;
				}
			}
		}
		if (! empty($postData['advanceSearchUserId']))
		{
			$exuserId=explode(",",$postData['advanceSearchUserId']);
			/*
			 * print_r($exuserId);
			 * die();
			 */
			foreach($exuserId as $userId)
			{
                            $check_sms_balance=$this->getBranchBalance($branch_id);
                            if($check_sms_balance > 0 )
                            {
									$userMessageStr=$this->EmailString($postData['txtMessage'],$userId);
									
									$EmailId=$this->getUserEmailId($userId);
									$final_email_sent=$this->sendMandrillEmail($EmailId->vis_email,$subject_name,$userMessageStr);
									$cmapainUserDBArray=array(
															'seu_em_id_fk'=>$LastCampainId,
															'seu_visitor_id'=>$userId,
															'seu_group_id'=>0,
															'seu_client_id_fk'=>$client_id,
								                            'seu_branchId_fk'=>$branch_id,
															'seu_cDate'=>date('Y-m-d H:i:s'),
															'seu_emailstatus'=>1,
															'seu_message_details'=>$userMessageStr);
									$this->db->insert('tblmvbsendemailusers',$cmapainUserDBArray);

									if($status==0)
									{
											$email_sent_status=$final_email_sent[0]->sent;

											$email_reject_reason=$final_email_sent[0]->reject_reason;

											$email_status_id=$final_email_sent[0]->_id;

											$cmapainUserDBArray=array(
													'seu_em_id_fk'=>$LastCampainId,
													'seu_visitor_id'=>$userId,
													'seu_group_id'=>0,
													'seu_client_id_fk'=>$client_id,
			                                        'seu_branchId_fk'=>$branch_id,
													'seu_message_details'=>$userMessageStr,
													'seu_cDate'=>date('Y-m-d H:i:s'),
													'seu_emailstatus'=>1,
													'seu_emailsendstatus'=>$email_sent_status,
													'seu_failed_reason'=>$email_reject_reason,
													'seu_sendFor'=>'send_email_normal',
													'seu_scheduled'=>$status);
			                                
			                                $this->db->insert('tblmvbsendemailuserslogs',$cmapainUserDBArray);
		                            }

									$otherdata=$otherdata . implode(",",$cmapainUserDBArray);
									
									setAActivityLogs('Transaction_activity','AAddEmailform_Add',"Added Data :- " . $idlist . "  field Values:-" . $otherdata);
					                                
					                $this->deductEmailBalance($branch_id,1);
                            }
                            else
                            {
                            	if($status==0)
								{
	                                $cmapainUserDBArray=array(
											'seu_em_id_fk'=>$LastCampainId,
											'seu_visitor_id'=>$userId,
											'seu_group_id'=>$searchGroup,
											'seu_client_id_fk'=>$client_id,
	                                        'seu_branchId_fk'=>$branch_id,
											'seu_message_details'=>$userMessageStr,
											'seu_failed_reason'=>'Insufficient email credit',
											'seu_cDate'=>date('Y-m-d H:i:s'),
											'seu_emailstatus'=>0,
											'seu_emailsendstatus'=>0,
											'seu_sendFor'=>'send_email_normal',
											'seu_scheduled'=>$status);
	                                
	                                $this->db->insert('tblmvbsendemailuserslogs',$cmapainUserDBArray);
                            	}
                            }
			}
		}
		
		return true;
	
	}
	public function getBranchBalance($branch_id)
	{
		$result=$this->db->query("select brn_emailCredit from tblmvbbranches where brn_id_pk='".$branch_id."'");
		return $result[0]->brn_emailCredit();
	}

	
	// public function sendEMAIL($emailId="",$emailStr="")
	// {
		
	// 	 * $this->email->from('ravi@velociters.com', 'Ravi');
	// 	 * $this->email->to('prashant.velociter@gmail.com');
	// 	 * //$this->email->cc('another@another-example.com');
	// 	 * //$this->email->bcc('them@their-example.com');
	// 	 * $this->email->subject('Email Test');
	// 	 * $this->email->message($emailStr);
	// 	 * $this->email->send();
		 
	// 	$this->email->from('ravi@velociters.com');
	// 	$this->email->to($emailId);
	// 	$this->email->subject('Email Test');
	// 	$this->email->message($emailStr);
	// 	if ($this->email->send())
	// 	{
	// 		echo "Email Sent";
	// 		// die();
	// 	} else
	// 	{
	// 		show_error($this->email->print_debugger());
	// 		// die();
	// 	}
	
	// }

	public function getUserEmailId($userId=0)
	{
		$result=$this->db->query("select * from tblmvbvisitors where vis_id_pk='" . $userId . "'");
		return $result->result();
	
	}

	public function getVisitorFromgroup($groupId=0)
	{
		$result=$this->db->query("select gv_visitorId_fk from tblmvbgroupvisitors where gv_grpId_fk=" . $groupId . "");
		return $result->result();
	
	}


	public function sendMandrillEmail($customer_email,$subject,$description)
	{
				$from_email_id='';

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


}