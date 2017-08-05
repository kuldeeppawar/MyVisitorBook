<?php

class Sms_management_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}
	public function getAllfield(){
		$result=$this->db->query("SELECT * FROM tblmvbsmsmanagement where sm_client_id=1 ");
	    $CampaignDetails=$result->result();
	    //print_r($CampaignDetails);
	    foreach($CampaignDetails as $campaignRecord){
	    	$smsCount=0;
	    	if($campaignRecord->sm_sms_type=='1'){
	    		$campType='Group';
	    		//tblmvbgroups where grp_branchId_fk=1
	    		//$smsCount +=$smsCount;
	    	}else{
	    		$campType='NA';
	    	}
	    	$smsCount=$this->getCampainwiseSMSCount($campaignRecord->sm_id_pk);
	    	$campDBArray[]=array(
	    		'campaignTitle'=>$campaignRecord->sm_campaign_name,
	    		'scheduleDateTime'=>$campaignRecord->sm_sms_schedule_date,
	    		'campaignContent'=>$campaignRecord->sm_sms_content,
	    		'campaignContactGroup'=>$campType,
	    		'campaignSmsCount'=>$smsCount
	    		);

	    }
	    return $campDBArray;
	}
        public function getSenderMobile($senderid)
	{
		$result=$this->db->query("select vis_mobile from tblmvbvisitors where vis_id_pk='" . $senderid . "'");
		return $result->result();
	
	}
        
        public function getVisitorMobile($senderid)
	{
		$result=$this->db->query("select vis_mobile from tblmvbvisitors where vis_id_pk='" . $senderid . "'");
		$row=$result->result();
                return $row[0]->vis_mobile;
	
	}
        
	public function getCampainwiseSMSCount($campId=0){
		$query=$this->db->query("select ssu_id_pk from tblmvbsendsmsusers where ssu_sm_id_fk='".$campId."'");	
	    return $query->num_rows();
	}
	public function getuserGroup(){

		$branch_id=$this->session->userdata('branch_id');

		$result=$this->db->query("SELECT * FROM tblmvbgroups where grp_branchId_fk='".$branch_id."'");
		return $result->result();
	} 
	public function getuser()
	{
		$branch_id=$this->session->userdata('branch_id');

		$result=$this->db->query("SELECT vis_id_pk,vis_firstName,vis_lastName from tblmvbvisitors where vis_branchId_fk='".$branch_id."' and vis_mobile NOT IN (Select oo_mobile_no from tblmvboptout where oo_status='1') group by vis_id_pk");
		return $result->result();
	} 
	public function getTemplateRequest()
	{
		$client_id=$this->session->userdata('client_id');

		$branch_id=$this->session->userdata('branch_id');

		//$result=$this->db->query("select stemp.* from tblmvbsmstemplate as stemp left join tblmvbsmstemprequest as stempreq  ON(stemp.sms_id_pk=stempreq.str_id_pk)");
		$result=$this->db->query("select * from tblmvbsmstemprequest where str_client_id_fk='".$client_id."' and str_branchId_fk='".$branch_id."' and str_admin_status='approved'");
		return $result->result();
	}
	public function getSmsSignature(){
		$result=$this->db->query("select * from  tblmvbsmssignature where sig_clientId_fk=1");
		return $result->result();
	}
	public function getSenderId(){
		//$result=$this->db->query("select csId.* from tblmvbclients as cs left join tblmvbsenderid as csId ON(cs.clnt_id_pk=csId.sid_clientId_fk)");
		$result=$this->db->query("select * from tblmvbsenderid where sid_clientId_fk=1");
		return $result->result();
	}
	public function getUserDetailsbyIdforSms($userId=""){
		$userDBArray=array();

		$result=$this->db->query("select * from tblmvbvisitors where vis_id_pk='".$userId."'");
		$userRecord=$result->result();
		//print_r($userRecord);
		//echo $userRecord[0]->vis_firstName;die();
		$masterColumn=array('Title'=>$userRecord[0]->vis_title,'First Name'=>$userRecord[0]->vis_firstName,'Middle Name'=>$userRecord[0]->vis_middleName,'Last Name'=>$userRecord[0]->vis_lastName,'Mobile Number'=>$userRecord[0]->vis_mobile,'Email Id'=>$userRecord[0]->vis_email,'Address'=>$userRecord[0]->vis_address,'Zip Code'=>$userRecord[0]->vis_zipCode,'Country'=>$userRecord[0]->vis_countryId_fk,'State'=>$userRecord[0]->vis_stateId_fk,'City'=>$userRecord[0]->vis_cityId_fk,'Website'=>$userRecord[0]->vis_website,'Landline Number'=>$userRecord[0]->vis_landline,'Fax'=>$userRecord[0]->vis_fax,'Contact Group','Business Category'=>$userRecord[0]->vis_businessCategory,'Business Name'=>$userRecord[0]->vis_businessName,'DOB'=>$userRecord[0]->vis_dob,'Anniversary Date'=>$userRecord[0]->vis_anniversaryDate);
		/*echo "<pre>";
		print_r($masterColumn);
		print_r($userRecord);
		die();*/
		$client_id=$this->session->userdata('client_id');
        $result_custom_fields=$this->db->query("Select cfi_label,cfi_value From tblmvbcustomfields where (cfi_clientId='".$client_id."' OR cfi_clientId='0') and cfi_status='1'");

        $row_custom_fields=$result_custom_fields->result();
        $arrayC=array();
        if(count($row_custom_fields)>0)
        {
                for($k=0;$k<count($row_custom_fields);$k++)
                { 
                		$labelArray[]=$row_custom_fields[$k]->cfi_label;
                		$valueArray[]=$row_custom_fields[$k]->cfi_value;
                		//$arrayC=array_combine($label, $value);
                       // $html.='<li class="list-group-item">'.$row_custom_fields[$k]->cfi_label.' </li>';
                		//array_push($masterColumn,$arrayC);
                }
                $arrayC=array_combine($labelArray, $valueArray);
                $arrayFinal=array_merge($masterColumn,$arrayC);

        }/*echo "<pre>";
         print_r($arrayFinal);
         print_r($masterColumn);die();*/
		return $arrayFinal;
	}
	public function SMSString($messageString="",$userId="")
	{
		$client_id=$this->session->userdata('client_id');

		$newstr=array();
		$newReValue=array();
		$newstr1="";
		$i=0;
		$replaceColumnValue=$this->getUserDetailsbyIdforSms($userId);
		/*echo $messageString;
		die();*/
		//$masterColumn=array('First Name','Middle Name','Last Name');
		$masterColumn=array('Title','First Name','Middle Name','Last Name','Mobile Number','Email Id','Address','Zip Code','Country','State','City','Website','Landline Number','Fax','Contact Group','Business Name','Business Category','DOB','Anniversary Date');
		$client_id=$this->session->userdata('client_id');
        $result_custom_fields=$this->db->query("Select cfi_label From tblmvbcustomfields where (cfi_clientId='".$client_id."' OR cfi_clientId='0') and cfi_status='1'");

        $row_custom_fields=$result_custom_fields->result();

        if(count($row_custom_fields)>0)
        {
                for($k=0;$k<count($row_custom_fields);$k++)
                { 
                       // $html.='<li class="list-group-item">'.$row_custom_fields[$k]->cfi_label.' </li>';
                		array_push($masterColumn,$row_custom_fields[$k]->cfi_label);
                }
        }

     
        /*echo "<pre>";
        print_r($replaceColumnValue);die();*/
		//$replaceColumnValue=array('First Name'=>'Prashant','Middle Name'=>'Devidas','Last Name'=>'Ingle','DOB'=>'01-09-1988');
		foreach($masterColumn as $masterValue)
		{
			//$expostData=explode($masterValue, $postData['txtMessage']);
			//print_r($expostData);die();
			if(strstr($messageString,$masterValue))
			{
				//echo "1";
				array_push($newReValue,[$masterValue,$replaceColumnValue[$masterValue]]);
				 
				if($i<>0)
				{
					$replaceStr=$newMessageStruserWise;
				}
				else
				{
					$replaceStr=$messageString;
				}
				  $newMessageStruserWise=str_replace('##'.$masterValue.'##',$replaceColumnValue[$masterValue], $replaceStr);
				$i++;
			}
			else
			{
					$newMessageStruserWise=$messageString;	 
			}
		}

		return $newMessageStruserWise;
	}
        public function deductSmsBalance($branch_id,$sms_count)
        {
                $this->db->query("Update tblmvbbranches set brn_smsCredit=brn_smsCredit-'".$sms_count."' where brn_id_pk='".$branch_id."'");

                return true;
        }
   
	public function addCampaingRecord($postData="")
	{
		//print_r($postData['txtMessage']);
		 
		//$replaceColumnValue=$this->getUserDetailsbyIdforSms('1');
		/*print_r($UserDetails);
		die();*/

		$branch_id=$this->session->userdata('branch_id');
		$client_id=$this->session->userdata('client_id');
		$admin_user_id=$this->session->userdata('admin_admin_id');
		$schDtTime = explode('-',$postData['schedule_dt_time']);
		$shc_dt = date('Y-m-d',strtotime($schDtTime[0]));
		$shc_time =  date('H:i s',strtotime($schDtTime[1]));
		$scheduleDateTime=$shc_dt." ".$shc_time;
		
		if(isset($postData['schedule'])) 
		{ 
			$status=1; 
		}
		else
		{ 
			$status=0; 
		}

		if($postData['chk1']=='group')
		{
			$campType=1;	
		}
		else
		{
			$campType=0;
		}
		
		$campaignDBArray=array(
				'sm_campaign_name'=>$postData['campaignName'],
				'sm_sms_template_id'=>$postData['selectTemplate'],
				'sm_sms_signature_id'=>$postData['selectSignature'],
				'sm_sms_sender_id'=>$postData['selectSenderId'],
				'sm_sms_content'=>$postData['txtMessage'],
				'sm_sms_schedule_date'=>$scheduleDateTime,
				'sm_sms_schedule_status'=>$status,
				'sm_sms_type'=>$campType,
				'sm_created_by'=>$admin_user_id,
				'sm_client_id'=>$client_id,
				'sm_branch_id'=>$branch_id,
				'sm_created_date'=>date("Y-m-d H:i:s")
			);
		$this->db->insert('tblmvbsmsmanagement',$campaignDBArray);

		$LastCampainId=$this->db->insert_id();
		//echo 'time is - '.$shc_dt.'<br>'.$shc_time;
		$type=$postData['chk1'];

		$branch_balance=$this->getBranchBalance($branch_id);

		$random_number=rand(100000,999999);

        $counter=0;

        if(count($postData['selectSearchName'])>=10000)
        {
        		$limit_counter=10000;
        }
        else
        {
        		$limit_counter=count($postData['selectSearchName']);
        }


        $sms_gateway_api=$this->getSmsGatewayApiDetails();

        $gateway_username="MyVBokxml03";//$sms_gateway_api[0]->username

        $gateway_password="MyVBokxml03";//$sms_gateway_api[0]->password


        $client_sender_id="MyVBok";//$this->getClientSenderIdDefault($postData['selectSenderId']);

        $sms_signature_details=$this->getSmsSignatureDetails($postData['selectSignature']);

        $msg_str_count=strlen($postData['txtMessage'].$sms_signature_details);
		 
		$i=0;
		if(!empty($postData['selectSearchName']))
        { 
        				$total_visitor_count=count($postData['selectSearchName'])/10000;//30000;//      //eg- 30000

				        $final_total_visitor_counter=ceil($total_visitor_count)+1;//;            //eg - 4 

				        $total_sms_char_length=$msg_str_count;//                            //eg - 170

				        if($total_sms_char_length<=160)
				        {
				                $sms_count=1;
				                $total_sms_to_send=count($postData['selectSearchName'])*$sms_count;//;

				                if($branch_balance>=$total_sms_to_send)
				                {
				                        $no_of_visitors=count($postData['selectSearchName']);//   
				                }
				                else
				                {
				                        $no_of_visitors=$total_sms_to_send/$sms_count;  
				                }
				        }
				        else
				        {
				                $sms_count=ceil($total_sms_char_length/160);              //eg - 2

				                $total_sms_to_send=count($postData['selectSearchName'])*$sms_count;// 
				                //eg - 30000*2 = 60000 

				                if($branch_balance>=$total_sms_to_send)                          //eg - 25000>=60000
				                {
				                        $no_of_visitors=count($postData['selectSearchName']);//                                //
				                }
				                else
				                {
				                        $no_of_visitors=$branch_balance/$sms_count;   
				                        //eg - 25000/2 = 12500            
				                }   
				        }

		        		for($k=0;$k<$final_total_visitor_counter;$k++)
		                {
		                		$xmlstring='';

		                		$xmlstring .= '<?xml version=\"1.0\" encoding=\"utf-8\" ?>
                                        <data>';

		                        for(;$counter<$limit_counter;$counter++)
		                        {
		                        		   $userMessageStr=$this->SMSString($postData['txtMessage'],$postData['selectSearchName'][$counter]);

		                        		   $final_msg_str=$userMessageStr.'


		                        		   				'.$sms_signature_details;

		                        		   $MobileNo=$this->getUserMobileNo($postData['selectSearchName'][$counter]);
                  
		                                   if($counter<$no_of_visitors)
		                                   {
		                                            $xmlstring.='<user>
							                                        <name>'.$gateway_username.'</name>
							                                        <password>'.$gateway_password.'</password>
							                                        <from>'.$client_sender_id.'</from>
							                                        <to>'.$MobileNo.'</to>
							                                        <text>'.$final_msg_str.'</text> 
							                                        <coding>0</coding>
							                                    </user>';

							                                    

							                        $cmapainUserDBArray=array(
		                                                    'ssu_sm_id_fk'=>$LastCampainId,
		                                                    'ssu_visitor_id'=>$postData['selectSearchName'][$counter],
		                                                    'ssu_group_id'=>0,
		                                                    'ssu_smsCount'=>$sms_count,
		                                                    'ssu_client_id_fk'=>$client_id,
		                                                    'ssu_branchId_fk'=>$branch_id,    
		                                                    'ssu_message_details'=>$userMessageStr,
		                                                    'ssu_cDate'=>date('Y-m-d H:i:s'),
		                                                    'ssu_smsstatus'=>1);
		                                                    
		                                                    $this->db->insert('tblmvbsendsmsusers',$cmapainUserDBArray);

		                                                    
		                                                    if($status==0)
		                                                    {	
				                                                    $cmapainUserLogs=array(
				                                                    'ssul_sm_id_fk'=>$LastCampainId,
				                                                    'ssul_group_id_fk'=>0,
				                                                    'ssul_visitor_id_fk'=>$postData['selectSearchName'][$counter],
				                                                    'ssul_client_id_fk'=>$client_id,
				                                                    'ssul_branchId_fk'=>$branch_id,    
				                                                    'ssul_message_details'=>$userMessageStr,
				                                                    'ssul_cDate'=>date('Y-m-d H:i:s'),
				                                                    'ssu_smsstatus'=>0,    
				                                                    'ssul_smssendstatus'=>0,
				                                                    'ssul_failed_reason'=>'Not Delivered',
				                                                    'ssul_ack_id'=>0,
				                                                    'ssul_msg_id'=>0,
				                                                    'ssul_smsCount'=>$sms_count,
				                                                    'ssul_sendFor'=>'send_sms_normal',
				                                                    'ssul_unique_identifier'=>$random_number,
																	'ssul_scheduled'=>$status);

				                                                    $this->db->insert('tblmvbsendsmsuserslogs',$cmapainUserLogs);
		                                                	} 
		                                   }
		                                   else
		                                   {
		                                            $cmapainUserLogs=array(
				                                                    'ssul_sm_id_fk'=>$LastCampainId,
				                                                    'ssul_group_id_fk'=>0,
				                                                    'ssul_visitor_id_fk'=>$postData['selectSearchName'][$counter],
				                                                    'ssul_client_id_fk'=>$client_id,
				                                                    'ssul_branchId_fk'=>$branch_id,    
				                                                    'ssul_message_details'=>$userMessageStr,
				                                                    'ssul_cDate'=>date('Y-m-d H:i:s'),
				                                                    'ssu_smsstatus'=>0,    
				                                                    'ssul_smssendstatus'=>0,
				                                                    'ssul_smsCount'=>$sms_count,
				                                                    'ssul_failed_reason'=>'Insuficient SMS credit',
				                                                    'ssul_ack_id'=>0,
				                                                    'ssul_msg_id'=>0,
				                                                    'ssul_sendFor'=>'send_sms_normal',
																	'ssul_scheduled'=>$status);
				                                                    
				                                    $this->db->insert('tblmvbsendsmsuserslogs',$cmapainUserLogs);

				                                    $counter_to_sent=0;

                                                    if($counter_to_sent==0)
                                                    {
                                                    		//$this->sendAdminNotifyEMAIL('Insuficient Balance - Send SMS');

                                                    		$counter_to_sent++;
                                                    }
		                                   }
		                        }

		                        $xmlstring .= '</data>';


		                        $url = 'http://49.50.67.32/nxmlapi/xmlsmsapi.jsp';
                       
		                        $objURL = curl_init($url);
		                        curl_setopt($objURL, CURLOPT_HTTPHEADER,"content-type: application/xml");
		                        curl_setopt($objURL, CURLOPT_RETURNTRANSFER, 1); 
		                        curl_setopt($objURL, CURLOPT_POST,1);
		                        curl_setopt($objURL, CURLOPT_POSTFIELDS,$xmlstring);
		                        $retval = trim(curl_exec($objURL));

		                        curl_close($objURL);    
		                        $xml = new SimpleXMLElement($retval); 

		                        $sms_ack_id=$xml->ackid;
		                        
		                        foreach($xml->msgid as $msg_id)
		                        {
		                                   $explode_msg_id=explode(",",$msg_id);

		                                   $explode_parts_msgid=$explode_msg_id[0];
		                                   $explode_parts_mobno=$explode_msg_id[1];

		                                   $result_visitor_details=$this->db->query("Select vis_id_pk from tblmvbvisitors where vis_mobile='".$explode_parts_mobno."'");

        								   $row_visitor_details=$result_visitor_details->result();

        								   $this->db->query("Update tblmvbsendsmsuserslogs set ssu_smsstatus='1',ssul_smssendstatus='1',ssul_failed_reason='NULL',ssul_ack_id='".$sms_ack_id."',ssul_msg_id='".$explode_parts_msgid."' where ssul_visitor_id_fk='".$postData['selectSearchName'][$counter]."' and ssul_sm_id_fk='".$LastCampainId."' and ssul_unique_identifier='".$random_number."' and DATE(ssul_cDate)='".date('Y-m-d')."'");
		                        }


		                        $count_success_delivered=count($xml->msgid);

		                        $total_balance_deduct=$count_success_delivered*$sms_count;

		                        $this->db->query("Update tblmvbbranches set brn_smsCredit=brn_smsCredit-'".$total_balance_deduct."' where brn_id_pk='".$branch_id."'");


		                        if(count($postData['selectSearchName'])>=10000)
		                        {	
			                        if($limit_counter>=count($postData['selectSearchName']))//
			                        {
			                                $limit_counter=count($postData['selectSearchName']);//
			                        }   
			                        else
			                        {
			                                $limit_counter+=10000;                   
			                        }
			                    }
			                    else
			                    {
			                    			$limit_counter=count($postData['selectSearchName']);		
			                    }    
		                }


               //          foreach($postData['selectSearchName'] as $searchName)
               //          {
               //                          $userMessageStr=$this->SMSString($postData['txtMessage'],$searchName);
                                        
               //                          $check_msg_length=strlen($userMessageStr);
       
               //                          if($check_msg_length<=160)
               //                           {
               //                                  $sms_count=1;
               //                           }
               //                           else 
               //                           {
               //                                  $sms_count=round($check_msg_length/160);
               //                           }

               //                          $check_sms_balance=$this->getBranchBalance($branch_id);

               //                          if($sms_count<=$check_sms_balance)
               //                          {  
               //                                      $MobileNo=$this->getUserMobileNo($searchName);
               //                                      $result_mobile = $this->checkVisitorsOptout($MobileNo);
               //                                      if($result_mobile==false)
               //                                      {
		             //                                         $this->sendSMS($MobileNo->vis_mobile,$userMessageStr);
		             //                                        $cmapainUserDBArray=array(
		             //                                        'ssu_sm_id_fk'=>$LastCampainId,
		             //                                        'ssu_visitor_id'=>$searchName,
		             //                                        'ssu_group_id'=>0,
		             //                                        'ssu_smsCount'=>$sms_count,
		             //                                        'ssu_client_id_fk'=>$client_id,
		             //                                        'ssu_branchId_fk'=>$branch_id,    
		             //                                        'ssu_message_details'=>$userMessageStr,
		             //                                        'ssu_cDate'=>date('Y-m-d H:i:s'),
		             //                                        'ssu_smsstatus'=>1);
		                                                    
		             //                                        $this->db->insert('tblmvbsendsmsusers',$cmapainUserDBArray);
		                                                    
		             //                                        if($status==0)
		             //                                        {	
				           //                                          $cmapainUserLogs=array(
				           //                                          'ssul_sm_id_fk'=>$LastCampainId,
				           //                                          'ssul_group_id_fk'=>0,
				           //                                          'ssul_visitor_id_fk'=>$searchName,
				           //                                          'ssul_client_id_fk'=>$client_id,
				           //                                          'ssul_branchId_fk'=>$branch_id,    
				           //                                          'ssul_message_details'=>$userMessageStr,
				           //                                          'ssul_cDate'=>date('Y-m-d H:i:s'),
				           //                                          'ssu_smsstatus'=>1    
				           //                                          'ssul_smssendstatus'=>1,
				           //                                          'ssul_sendFor'=>'send_sms_normal',
															// 		'ssul_scheduled'=>$status);
				                                                    
				           //                                          $this->db->insert('tblmvbsendsmsuserslogs',$cmapainUserLogs);
		             //                                    	}

		             //                                    	$otherdata=$otherdata . implode(",",$cmapainUserDBArray);
								
															// setAActivityLogs('Transaction_activity','AAddEmailform_Add',"Added Data :- " . $idlist . "  field Values:-" . $otherdata);
		                                                    
		                                                    
		             //                                        $this->deductSmsBalance($branch_id,$sms_count);  
               //                                      }
               //                                      else
               //                                      {
	              //                                       	if($status==0)
	              //                                       	{	
	              //                                             		$cmapainUserLogs=array(
				           //                                          'ssul_sm_id_fk'=>$LastCampainId,
				           //                                          'ssul_group_id_fk'=>0,
				           //                                          'ssul_visitor_id_fk'=>$searchName,
				           //                                          'ssul_client_id_fk'=>$client_id,
				           //                                          'ssul_branchId_fk'=>$branch_id,    
				           //                                          'ssul_message_details'=>$userMessageStr,
				           //                                          'ssul_cDate'=>date('Y-m-d H:i:s'),
				           //                                          'ssul_failed_reason'=>'mobile_no_opt_out',   
				           //                                          'ssul_smsstatus'=>0,
															// 		'ssul_smssendstatus'=>0,
															// 		'ssul_sendFor'=>'send_sms_normal',
															// 		'ssul_scheduled'=>$status);
				                                                    
				           //                                          $this->db->insert('tblmvbsendsmsuserslogs',$cmapainUserLogs);
	              //                                       	}
               //                                      }                                                    
               //                          }
               //                          else
               //                          {
               //                                      $cmapainUserLogs=array(
               //                                      'ssul_sm_id_fk'=>$LastCampainId,
               //                                      'ssul_visitor_id'=>$searchName,
               //                                      'ssul_branchId_fk'=>$branch_id,    
               //                                      'ssul_message_details'=>$userMessageStr,
               //                                      'ssul_cDate'=>date('Y-m-d H:i:s'),
               //                                      'ssul_failed_reason'=>'insuficient_balance',    
               //                                      'ssul_smssendstatus'=>0);
                                                    
               //                                      $this->db->insert('tblmvbsendsmsuserslogs',$cmapainUserLogs);

                                                    
               //                          }
               //          }
		}
		if(!empty($postData['selectgroup']))
        {
                    foreach($postData['selectgroup'] as $searchGroup)
                    {
							if($searchGroup > 0)
			                {
								//$searchNameId=$searchGroup;	
								$visitorIdfromGroup=$this->getVisitorFromgroup($searchGroup);
								/*print_r($visitorIdfromGroup);
								die();*/

								$total_visitor_count=30000;//count($visitorIdfromGroup)/10000;      //eg- 30000

						        $final_total_visitor_counter=4;//ceil($total_visitor_count)+1;            //eg - 4 

						        $total_sms_char_length=170;//$msg_str_count;                            //eg - 170

						        if($total_sms_char_length<=160)
						        {
						                $sms_count=1;
						                $total_sms_to_send=30000*$sms_count;//count($visitorIdfromGroup)*$sms_count;

						                if($branch_balance>=$total_sms_to_send)
						                {
						                        $no_of_visitors=30000;//count($visitorIdfromGroup);   
						                }
						                else
						                {
						                        $no_of_visitors=$total_sms_to_send/$sms_count;  
						                }
						        }
						        else
						        {
						                $sms_count=ceil($total_sms_char_length/160);              //eg - 2

						                $total_sms_to_send=30000*$sms_count;//count($visitorIdfromGroup)*$sms_count; 
						                //eg - 30000*2 = 60000 

						                if($branch_balance>=$total_sms_to_send)                          //eg - 25000>=60000
						                {
						                        $no_of_visitors=30000;//count($visitorIdfromGroup);                                //
						                }
						                else
						                {
						                        $no_of_visitors=$branch_balance/$sms_count;   
						                        //eg - 25000/2 = 12500            
						                }   
						        }


				        		for($k=0;$k<$final_total_visitor_counter;$k++)
				                {
				                		$xmlstring='';

				                		$xmlstring .= '<?xml version=\"1.0\" encoding=\"utf-8\" ?>
		                                        <data>';

				                        for(;$counter<$limit_counter;$counter++)
				                        {
				                        		   $userMessageStr=$this->SMSString($postData['txtMessage'],$visitorIdfromGroup[$counter]->gv_visitorId_fk);

				                        		   $final_msg_str=$userMessageStr.'<br><br>'.$sms_signature_details;

				                        		   $MobileNo=$this->getUserMobileNo($visitorIdfromGroup[$counter]->gv_visitorId_fk);
		                  
				                                   if($counter<=$no_of_visitors)
				                                   {
				                                            $xmlstring.='<user>
									                                        <name>'.$gateway_username.'</name>
									                                        <password>'.$gateway_password.'</password>
									                                        <from>'.$client_sender_id.'</from>
									                                        <to>'.$MobileNo.'</to>
									                                        <text>'.$final_msg_str.'</text> 
									                                        <coding>0</coding>
									                                    </user>';

									                        $cmapainUserDBArray=array(
				                                                    'ssu_sm_id_fk'=>$LastCampainId,
				                                                    'ssu_visitor_id'=>$visitorIdfromGroup[$counter]->gv_visitorId_fk,
				                                                    'ssu_group_id'=>$searchGroup,
				                                                    'ssu_smsCount'=>$sms_count,
				                                                    'ssu_client_id_fk'=>$client_id,
				                                                    'ssu_branchId_fk'=>$branch_id,    
				                                                    'ssu_message_details'=>$userMessageStr,
				                                                    'ssu_cDate'=>date('Y-m-d H:i:s'),
				                                                    'ssu_smsstatus'=>1);
				                                                    
				                                                    $this->db->insert('tblmvbsendsmsusers',$cmapainUserDBArray);
				                                                    
				                                                    if($status==0)
				                                                    {	
						                                                    $cmapainUserLogs=array(
						                                                    'ssul_sm_id_fk'=>$LastCampainId,
						                                                    'ssul_group_id_fk'=>$searchGroup,
						                                                    'ssul_visitor_id_fk'=>$visitorIdfromGroup[$counter]->gv_visitorId_fk,
						                                                    'ssul_client_id_fk'=>$client_id,
						                                                    'ssul_branchId_fk'=>$branch_id,    
						                                                    'ssul_message_details'=>$userMessageStr,
						                                                    'ssul_cDate'=>date('Y-m-d H:i:s'),
						                                                    'ssu_smsstatus'=>0,    
						                                                    'ssul_smssendstatus'=>0,
						                                                    'ssul_failed_reason'=>'Not Delivered',
						                                                    'ssul_ack_id'=>0,
						                                                    'ssul_msg_id'=>0,
						                                                    'ssul_sendFor'=>'send_sms_normal',
						                                                    'ssul_unique_identifier'=>$random_number,
																			'ssul_scheduled'=>$status);
						                                                    
						                                                    $this->db->insert('tblmvbsendsmsuserslogs',$cmapainUserLogs);
				                                                	} 
				                                   }
				                                   else
				                                   {
				                                            $cmapainUserLogs=array(
						                                                    'ssul_sm_id_fk'=>$LastCampainId,
						                                                    'ssul_group_id_fk'=>$searchGroup,
						                                                    'ssul_visitor_id_fk'=>$visitorIdfromGroup[$counter]->gv_visitorId_fk,
						                                                    'ssul_client_id_fk'=>$client_id,
						                                                    'ssul_branchId_fk'=>$branch_id,    
						                                                    'ssul_message_details'=>$userMessageStr,
						                                                    'ssul_cDate'=>date('Y-m-d H:i:s'),
						                                                    'ssu_smsstatus'=>0,    
						                                                    'ssul_smssendstatus'=>0,
						                                                    'ssul_failed_reason'=>'Insuficient SMS credit',
						                                                    'ssul_ack_id'=>0,
						                                                    'ssul_msg_id'=>0,
						                                                    'ssul_sendFor'=>'send_sms_normal',
																			'ssul_scheduled'=>$status);
						                                                    
						                                    $this->db->insert('tblmvbsendsmsuserslogs',$cmapainUserLogs);

						                                    $counter_to_sent=0;

		                                                    if($counter_to_sent==0)
		                                                    {
		                                                    		$this->sendAdminNotifyEMAIL('Insuficient Balance - Send SMS');

		                                                    		$counter_to_sent++;
		                                                    }
				                                   }
				                        }



				                        $url = 'http://49.50.67.32/nxmlapi/xmlsmsapi.jsp';
		                       
				                        $objURL = curl_init($url);
				                        curl_setopt($objURL, CURLOPT_HTTPHEADER,"content-type: application/xml");
				                        curl_setopt($objURL, CURLOPT_RETURNTRANSFER, 1); 
				                        curl_setopt($objURL, CURLOPT_POST,1);
				                        curl_setopt($objURL, CURLOPT_POSTFIELDS,$xmlstring);
				                        $retval = trim(curl_exec($objURL));

				                        curl_close($objURL);    
				                        $xml = new SimpleXMLElement($retval); 


				                        $sms_ack_id=$xml->ackid;
				                        

				                        foreach($xml->msgid as $msg_id)
				                        {
				                                   $explode_msg_id=explode(",",$msg_id);

				                                   $explode_parts_msgid=$explode_msg_id[0];
				                                   $explode_parts_mobno=$explode_msg_id[1];

				                                   $result_visitor_details=$this->db->query("Select vis_id_pk from tblmvbvisitors where vis_mobile='".$explode_parts_mobno."'");

		        								   $row_visitor_details=$result_visitor_details->result();

		        								   $this->db->query("Update tblmvbsendsmsuserslogs set ssul_ack_id='".$sms_ack_id."',ssul_msg_id='".$explode_parts_msgid."' where ssul_visitor_id_fk='".$visitorIdfromGroup[$counter]->gv_visitorId_fk."' and ssul_sm_id_fk='".$LastCampainId."' and ssul_unique_identifier='".$random_number."' and DATE(ssul_cDate)='".date('Y-m-d')."'");
				                        }


				                        $count_success_delivered=count($xml->msgid);

				                        $total_balance_deduct=$count_success_delivered*$sms_count;

				                        $this->db->query("Update tblmvbbranches set brn_smsCredit=brn_smsCredit-'".$total_balance_deduct."' where brn_id_pk='".$branch_id."'");


				                        if($limit_counter>=30000)//count($visitorIdfromGroup)
				                        {
				                                $limit_counter=30000;//count($visitorIdfromGroup);
				                        }   
				                        else
				                        {
				                                $limit_counter+=10000;                   
				                        }
				                }


								// foreach($visitorIdfromGroup as $GroupVId)
			     //                {
								// 							$userMessageStr=$this->SMSString($postData['txtMessage'],$GroupVId->gv_visitorId_fk);
			     //                                            $check_msg_length=strlen($userMessageStr);
			       
			     //                                            if($check_msg_length<=160)
			     //                                             {
			     //                                                    $sms_count=1;
			     //                                             }
			     //                                             else 
			     //                                             {
			     //                                                    $sms_count=round($check_msg_length/160);
			     //                                             }

			     //                                            $check_sms_balance=$this->sms_management_model->getBranchBalance($branch_id);

			     //                                            if($sms_count<=$check_sms_balance)
			     //                                            {
			     //                                                    $MobileNo=$this->getUserMobileNo($GroupVId->gv_visitorId_fk);
			     //                                                    $this->sendSMS($MobileNo->vis_mobile,$userMessageStr);
			     //                                                    $cmapainUserDBArray=array(
			     //                                                    'ssu_sm_id_fk'=>$LastCampainId,
			     //                                                    'ssu_visitor_id'=>$GroupVId->gv_visitorId_fk,
			     //                                                    'ssu_group_id'=>$searchGroup,
			     //                                                    'ssu_message_details'=>$userMessageStr,
			     //                                                    'ssu_cDate'=>date('Y-m-d H:i:s'),
			     //                                                    'ssu_smsstatus'=>1,
			     //                                                    );		
			     //                                                    $this->db->insert('tblmvbsendsmsusers',$cmapainUserDBArray);

			     //                                                    $cmapainUserLogs=array(
				    //                                                 'ssul_sm_id_fk'=>$LastCampainId,
				    //                                                 'ssul_visitor_id_fk'=>$GroupVId->gv_visitorId_fk,
				    //                                                 'ssul_branchId_fk'=>$branch_id,    
				    //                                                 'ssul_message_details'=>$userMessageStr,
				    //                                                 'ssul_cDate'=>date('Y-m-d H:i:s'),    
				    //                                                 'ssul_smssendstatus'=>1);
				                                                    
				    //                                                 $this->db->insert('tblmvbsendsmsuserslogs',$cmapainUserLogs);
			     //                                                        $this->deductSmsBalance($branch_id,$sms_count);
			     //                                            }
			     //                                            else
					   //                                      {
					   //                                                  $cmapainUserLogs=array(
					   //                                                  'ssul_sm_id_fk'=>$LastCampainId,
					   //                                                  'ssul_visitor_id'=>$GroupVId->gv_visitorId_fk,
					   //                                                  'ssul_branchId_fk'=>$branch_id,    
					   //                                                  'ssul_message_details'=>$userMessageStr,
					   //                                                  'ssul_cDate'=>date('Y-m-d H:i:s'),
					   //                                                  'ssul_failed_reason'=>'insuficient_balance',    
					   //                                                  'ssul_smssendstatus'=>0);
					                                                    
					   //                                                  $this->db->insert('tblmvbsendsmsuserslogs',$cmapainUserLogs);
					                                                    
					   //                                                  $this->sendAdminNotifyEMAIL('Insuficient Balance - Send SMS');
					   //                                      }
			     //                }
									
								//$searchNameId=
							}
			                else
			                {
								$searchNameId=0;
							}
					}
		}
		if(!empty($postData['advanceSearchUserId']))
		{
				$exuserId=explode(",",$postData['advanceSearchUserId']);
			/*print_r($exuserId);
			die();*/

				$total_visitor_count=30000;//count($exuserId)/10000;      //eg- 30000

		        $final_total_visitor_counter=4;//ceil($total_visitor_count)+1;            //eg - 4 

		        $total_sms_char_length=170;//$msg_str_count;                            //eg - 170

		        if($total_sms_char_length<=160)
		        {
		                $sms_count=1;
		                $total_sms_to_send=30000*$sms_count;//count($visitorIdfromGroup)*$sms_count;

		                if($branch_balance>=$total_sms_to_send)
		                {
		                        $no_of_visitors=30000;//count($visitorIdfromGroup);   
		                }
		                else
		                {
		                        $no_of_visitors=$total_sms_to_send/$sms_count;  
		                }
		        }
		        else
		        {
		                $sms_count=ceil($total_sms_char_length/160);              //eg - 2

		                $total_sms_to_send=30000*$sms_count;//count($visitorIdfromGroup)*$sms_count; 
		                //eg - 30000*2 = 60000 

		                if($branch_balance>=$total_sms_to_send)                          //eg - 25000>=60000
		                {
		                        $no_of_visitors=30000;//count($visitorIdfromGroup);                                //
		                }
		                else
		                {
		                        $no_of_visitors=$branch_balance/$sms_count;   
		                        //eg - 25000/2 = 12500            
		                }   
		        }


        		for($k=0;$k<$final_total_visitor_counter;$k++)
                {
                		$xmlstring='';

                		$xmlstring .= '<?xml version=\"1.0\" encoding=\"utf-8\" ?>
                                <data>';

                        for(;$counter<$limit_counter;$counter++)
                        {
                        		   $userMessageStr=$this->SMSString($postData['txtMessage'],$exuserId[$counter]);

                        		   $final_msg_str=$userMessageStr.'<br><br>'.$sms_signature_details;

                        		   $MobileNo=$this->getUserMobileNo($visitorIdfromGroup[$counter]->gv_visitorId_fk);
          
                                   if($counter<=$no_of_visitors)
                                   {
                                            $xmlstring.='<user>
					                                        <name>'.$gateway_username.'</name>
					                                        <password>'.$gateway_password.'</password>
					                                        <from>'.$client_sender_id.'</from>
					                                        <to>'.$MobileNo.'</to>
					                                        <text>'.$final_msg_str.'</text> 
					                                        <coding>0</coding>
					                                    </user>';

					                        $cmapainUserDBArray=array(
                                                    'ssu_sm_id_fk'=>$LastCampainId,
                                                    'ssu_visitor_id'=>$exuserId[$counter],
                                                    'ssu_group_id'=>0,
                                                    'ssu_smsCount'=>$sms_count,
                                                    'ssu_client_id_fk'=>$client_id,
                                                    'ssu_branchId_fk'=>$branch_id,    
                                                    'ssu_message_details'=>$userMessageStr,
                                                    'ssu_cDate'=>date('Y-m-d H:i:s'),
                                                    'ssu_smsstatus'=>1);
                                                    
                                                    $this->db->insert('tblmvbsendsmsusers',$cmapainUserDBArray);
                                                    
                                                    if($status==0)
                                                    {	
		                                                    $cmapainUserLogs=array(
		                                                    'ssul_sm_id_fk'=>$LastCampainId,
		                                                    'ssul_group_id_fk'=>0,
		                                                    'ssul_visitor_id_fk'=>$exuserId[$counter],
		                                                    'ssul_client_id_fk'=>$client_id,
		                                                    'ssul_branchId_fk'=>$branch_id,    
		                                                    'ssul_message_details'=>$userMessageStr,
		                                                    'ssul_cDate'=>date('Y-m-d H:i:s'),
		                                                    'ssu_smsstatus'=>0,    
		                                                    'ssul_smssendstatus'=>0,
		                                                    'ssul_failed_reason'=>'Not Delivered',
		                                                    'ssul_ack_id'=>0,
		                                                    'ssul_msg_id'=>0,
		                                                    'ssul_sendFor'=>'send_sms_normal',
		                                                    'ssul_unique_identifier'=>$random_number,
															'ssul_scheduled'=>$status);
		                                                    
		                                                    $this->db->insert('tblmvbsendsmsuserslogs',$cmapainUserLogs);
                                                	} 
                                   }
                                   else
                                   {
                                            $cmapainUserLogs=array(
		                                                    'ssul_sm_id_fk'=>$LastCampainId,
		                                                    'ssul_group_id_fk'=>0,
		                                                    'ssul_visitor_id_fk'=>$exuserId[$counter],
		                                                    'ssul_client_id_fk'=>$client_id,
		                                                    'ssul_branchId_fk'=>$branch_id,    
		                                                    'ssul_message_details'=>$userMessageStr,
		                                                    'ssul_cDate'=>date('Y-m-d H:i:s'),
		                                                    'ssu_smsstatus'=>0,    
		                                                    'ssul_smssendstatus'=>0,
		                                                    'ssul_failed_reason'=>'Insuficient SMS credit',
		                                                    'ssul_ack_id'=>0,
		                                                    'ssul_msg_id'=>0,
		                                                    'ssul_sendFor'=>'send_sms_normal',
															'ssul_scheduled'=>$status);
		                                                    
		                                    $this->db->insert('tblmvbsendsmsuserslogs',$cmapainUserLogs);

		                                    $counter_to_sent=0;

                                            if($counter_to_sent==0)
                                            {
                                            		$this->sendAdminNotifyEMAIL('Insuficient Balance - Send SMS');

                                            		$counter_to_sent++;
                                            }
                                   }
                        }



                        $url = 'http://49.50.67.32/nxmlapi/xmlsmsapi.jsp';
               
                        $objURL = curl_init($url);
                        curl_setopt($objURL, CURLOPT_HTTPHEADER,"content-type: application/xml");
                        curl_setopt($objURL, CURLOPT_RETURNTRANSFER, 1); 
                        curl_setopt($objURL, CURLOPT_POST,1);
                        curl_setopt($objURL, CURLOPT_POSTFIELDS,$xmlstring);
                        $retval = trim(curl_exec($objURL));

                        curl_close($objURL);    
                        $xml = new SimpleXMLElement($retval); 


                        $sms_ack_id=$xml->ackid;
                        

                        foreach($xml->msgid as $msg_id)
                        {
                                   $explode_msg_id=explode(",",$msg_id);

                                   $explode_parts_msgid=$explode_msg_id[0];
                                   $explode_parts_mobno=$explode_msg_id[1];

                                   $result_visitor_details=$this->db->query("Select vis_id_pk from tblmvbvisitors where vis_mobile='".$explode_parts_mobno."'");

								   $row_visitor_details=$result_visitor_details->result();

								   $this->db->query("Update tblmvbsendsmsuserslogs set ssul_ack_id='".$sms_ack_id."',ssul_msg_id='".$explode_parts_msgid."' where ssul_visitor_id_fk='".$exuserId[$counter]."' and ssul_sm_id_fk='".$LastCampainId."' and ssul_unique_identifier='".$random_number."' and DATE(ssul_cDate)='".date('Y-m-d')."'");
                        }


                        $count_success_delivered=count($xml->msgid);

                        $total_balance_deduct=$count_success_delivered*$sms_count;

                        $this->db->query("Update tblmvbbranches set brn_smsCredit=brn_smsCredit-'".$total_balance_deduct."' where brn_id_pk='".$branch_id."'");


                        if($limit_counter>=30000)//count($exuserId)
                        {
                                $limit_counter=30000;//count($exuserId);
                        }   
                        else
                        {
                                $limit_counter+=10000;                   
                        }
                }



								// foreach($exuserId as $userId)
								// {
								// 		$userMessageStr=$this->SMSString($postData['txtMessage'],$userId);
										 
						  //               $check_msg_length=strlen($userMessageStr);

						  //               if($check_msg_length<=160)
						  //                {
						  //                       $sms_count=1;
						  //                }
						  //                else 
						  //                {
						  //                       $sms_count=round($check_msg_length/160);
						  //                }

						  //               $check_sms_balance=$this->sms_management_model->getBranchBalance($branch_id);

							 //                if($sms_count<=$check_sms_balance)
							 //                {
								// 					$MobileNo=$this->getUserMobileNo($userId);
								// 			 		$this->sendSMS($MobileNo->vis_mobile,$userMessageStr);
								// 					$cmapainUserDBArray=array(
								// 					'ssu_sm_id_fk'=>$LastCampainId,
								// 					'ssu_visitor_id'=>$userId,
								// 					'ssu_group_id'=>0,
								// 					'ssu_message_details'=>$userMessageStr,
								// 					'ssu_cDate'=>date('Y-m-d H:i:s'),
								// 					'ssu_smsstatus'=>1,
								// 				);
								// 					$this->db->insert('tblmvbsendsmsusers',$cmapainUserDBArray);
						  //                                                       $this->deductSmsBalance($branch_id,$sms_count);
								// 			}
								// 			else{
								// 				 $cmapainUserLogs=array(
							 //                            'ssul_sm_id_fk'=>$LastCampainId,
							 //                            'ssul_visitor_id'=>$userId,
							 //                            'ssul_branchId_fk'=>$branch_id,    
							 //                            'ssul_message_details'=>$userMessageStr,
							 //                            'ssul_cDate'=>date('Y-m-d H:i:s'),
							 //                            'ssul_failed_reason'=>'insuficient_balance',    
							 //                            'ssul_smssendstatus'=>0);
							                            
							 //                            $this->db->insert('tblmvbsendsmsuserslogs',$cmapainUserLogs);
							                            
							 //                            $this->sendAdminNotifyEMAIL('Insuficient Balance - Send SMS');
								// 			}
								// }
		}
		 
		return true;
}



        public function addScheduleCampaingRecord($postData="")
        {
		//print_r($postData['txtMessage']);
		 
		//$replaceColumnValue=$this->getUserDetailsbyIdforSms('1');
		/*print_r($UserDetails);
		die();*/

		 $branch_id=$this->session->userdata('branch_id');
		$schDtTime = explode('-',$postData['schedule_dt_time']);
		$shc_dt = date('Y-m-d',strtotime($schDtTime[0]));
		$shc_time =  date('H:i s',strtotime($schDtTime[1]));
		$scheduleDateTime=$shc_dt." ".$shc_time;
		if($scheduleDateTime==date("Y-m-d H:i:s")) { $status=1; }else{ $status=0 ; }
		if($postData['chk1']=='group'){
			$campType=1;
			
		}else{
			$campType=0;
		}
		
		$campaignDBArray=array(
				'sm_campaign_name'=>$postData['campaignName'],
				'sm_sms_template_id'=>$postData['selectTemplate'],
				'sm_sms_signature_id'=>$postData['selectSignature'],
				'sm_sms_sender_id'=>$postData['selectSenderId'],
				'sm_sms_content'=>$postData['txtMessage'],
				'sm_sms_schedule_date'=>$scheduleDateTime,
				'sm_sms_schedule_status'=>$status,
				'sm_sms_type'=>$campType,
				'sm_created_by'=>1,
				'sm_client_id'=>1,
				'sm_created_date'=>date("Y-m-d H:i:s")
			);
		$this->db->insert('tblmvbsmsmangement',$campaignDBArray);
		$LastCampainId=$this->db->insert_id();
		//echo 'time is - '.$shc_dt.'<br>'.$shc_time;
		$type=$postData['chk1'];
		 
		 
		$i=0;
		if(!empty($postData['selectSearchName']))
                {
                        foreach($postData['selectSearchName'] as $searchName)
                        {
                            
                           
                                         
                                                    $userMessageStr=$this->SMSString($postData['txtMessage'],$searchName);
                                        
                                                    //$MobileNo=$this->getUserMobileNo($searchName);
                                                    //$this->sendSMS($MobileNo->vis_mobile,$userMessageStr);
                                                    $cmapainUserDBArray=array(
                                                    'ssu_sm_id_fk'=>$LastCampainId,
                                                    'ssu_visitor_id'=>$searchName,
                                                    'ssu_group_id'=>0,
                                                    'ssu_smsCount'=>0,
                                                    'ssu_branchId_fk'=>$branch_id,    
                                                    'ssu_message_details'=>$userMessageStr,
                                                    'ssu_cDate'=>date('Y-m-d H:i:s'),
                                                    'ssu_smsstatus'=>0);
                                                    
                                                    $this->db->insert('tblmvbsendsmsusers',$cmapainUserDBArray);
                        }
		}
		if(!empty($postData['selectgroup']))
                {
                        foreach($postData['selectgroup'] as $searchGroup)
                        {
				if($searchGroup > 0)
                                {
					//$searchNameId=$searchGroup;	
					$visitorIdfromGroup=$this->getVisitorFromgroup($searchGroup);
					/*print_r($visitorIdfromGroup);
					die();*/
					foreach($visitorIdfromGroup as $GroupVId)
                                        {
                                                        $userMessageStr=$this->SMSString($postData['txtMessage'],$GroupVId->gv_visitorId_fk);
                                                
                                                        //$MobileNo=$this->getUserMobileNo($GroupVId->gv_visitorId_fk);
                                                        //$this->sendSMS($MobileNo->vis_mobile,$userMessageStr);
                                                        $cmapainUserDBArray=array(
                                                        'ssu_sm_id_fk'=>$LastCampainId,
                                                        'ssu_visitor_id'=>$GroupVId->gv_visitorId_fk,
                                                        'ssu_group_id'=>$searchGroup,
                                                        'ssu_smsCount'=>0,    
                                                        'ssu_message_details'=>$userMessageStr,
                                                        'ssu_cDate'=>date('Y-m-d H:i:s'),
                                                        'ssu_smsstatus'=>0,
                                                        );		
                                                        $this->db->insert('tblmvbsendsmsusers',$cmapainUserDBArray);
                                                
                                        }
						
					//$searchNameId=
				}
                                else
                                {
					$searchNameId=0;
				}
                        }
                }
		if(!empty($postData['advanceSearchUserId'])){
			$exuserId=explode(",",$postData['advanceSearchUserId']);
			/*print_r($exuserId);
			die();*/
			foreach($exuserId as $userId)
                        {
				$userMessageStr=$this->SMSString($postData['txtMessage'],$userId);
				 
				//$MobileNo=$this->getUserMobileNo($userId);
		 		//$this->sendSMS($MobileNo->vis_mobile,$userMessageStr);
				$cmapainUserDBArray=array(
				'ssu_sm_id_fk'=>$LastCampainId,
				'ssu_visitor_id'=>$userId,
				'ssu_group_id'=>0,
                                'ssu_smsCount'=>0,
				'ssu_message_details'=>$userMessageStr,
				'ssu_cDate'=>date('Y-m-d H:i:s'),
				'ssu_smsstatus'=>0);
				$this->db->insert('tblmvbsendsmsusers',$cmapainUserDBArray);
			}				
		}
		 
		return true;
}

                                                      

	public function sendSMS($sender="",$msg=""){
		$request = "http://49.50.69.90/api/smsapi.aspx?username=mykeyword&password=mykeyword@123&from=KEYWRD&to=91".$sender."&message=".urlencode($msg);
	$data = '';
	$objURL = curl_init($request);
	curl_setopt($objURL, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt($objURL,CURLOPT_POST,1);
	curl_setopt($objURL, CURLOPT_POSTFIELDS,$data);
	$retval = trim(curl_exec($objURL));
	curl_close($objURL);	
	}
	public function getUserMobileNo($userId=0)
	{
		$result=$this->db->query("select * from tblmvbvisitors where vis_id_pk='".$userId."'");
		
		$row=$result->result();

		$mobile_no=$row[0]->vis_mobile;

		return $mobile_no;
	}
	public function getVisitorFromgroup($groupId=0){
		$result=$this->db->query("select gv_visitorId_fk from tblmvbgroupvisitors where gv_grpId_fk=".$groupId."");
		return $result->result();
	}
        
        
        public function  getGroupVisitors($group_id)
        {
                $result=$this->db->query("select vis_mobile from tblmvbgroupvisitors gv left join tblmvbvisitors vt on (gv.gv_visitorId_fk=vt.vis_id_pk) where gv.gv_grpId_fk='".$group_id."'");
		return $result->result();
        }
        
		
	public function getBranchBalance($branch_id)
	{

		$result=$this->db->query("select brn_smsCredit from tblmvbbranches where brn_id_pk='".$branch_id."'");

		$row=$result->result();

		return $row[0]->brn_smsCredit;
	}
        
        
        public function sendAdminNotifyEMAIL($emailStr="")
	{
		/*
		 * $this->email->from('ravi@velociters.com', 'Ravi');
		 * $this->email->to('prashant.velociter@gmail.com');
		 * //$this->email->cc('another@another-example.com');
		 * //$this->email->bcc('them@their-example.com');
		 * $this->email->subject('Email Test');
		 * $this->email->message($emailStr);
		 * $this->email->send();
		 */


		$client_id=$this->session->userdata('client_id');
		$branch_id=$this->session->userdata('branch_id');

		$admin_user_id=$this->session->userdata('admin_admin_id');

		$data_notify_sms_balance=array('sntfy_clientId_fk'=>$client_id,
									   'sntfy_branchId_fk'=>$branch_id,
									   'sntfy_admin_id_fk'=>$admin_user_id,
									   'sntfy_createdDate'=>date('Y-m-d H:i:s'),
									   'sntfy_show_status'=>0,
									   'sntfy_request_type'=>'sms_low_balance');

		$this->db->insert('tblmvbsanotify',$data_notify_sms_balance);

            
        $admin_email=$this->session->userdata('admin_admin_email');
            
		$this->email->from($admin_email);
		$this->email->to($admin_email);
		$this->email->subject($emailStr);
		$this->email->message($emailStr);
		if ($this->email->send())
		{
			echo "Email Sent";
			// die();
		} else
		{
			show_error($this->email->print_debugger());
			// die();
		}
	
	}
        
        public function checkVisitorsOptout($mobile_no) 
        {
                $result_visitors_optout=$this->db->query("Select * from tblmvboptout where oo_mobile_no='".$mobile_no."' and oo_status='0'");
                $row_visitors_optout=$result_visitors_optout->result();
                if(count($row_visitors_optout)>0)
                {
                    $status=true;
                }
                else
                {
                    $status=false;
                }
                return $status; 
        } 


        public function getClientSenderIdDefault($sender_id)
        {
        		$result_senderid=$this->db->query("Select sid_content from tblmvbsenderidrequest where sid_id_pk='".$sender_id."'");
                $row_senderid=$result_senderid->result();

                return $row_senderid[0]->sid_content;
        }


        public function getSmsSignatureDetails($signature_id)
        {
        			$result_signature=$this->db->query("Select sig_content from tblmvbsmssignature where sig_id_pk='".$signature_id."'");
                	$row_signature=$result_signature->result();

               	 	return $row_signature[0]->sig_content;
        }


        public function getSmsGatewayApiDetails()
	    {
	            $result=$this->db->query("SELECT * FROM smscgateway_bk");
	            
	            $row=$result->result();

	            return $row;
	    }
}