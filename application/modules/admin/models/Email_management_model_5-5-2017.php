<?php

class Email_management_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}
	public function getAllfield(){
		$result=$this->db->query("SELECT * FROM tblmvbemailmanagement where em_client_id=1 ");
	    $CampaignDetails=$result->result();
	    //print_r($CampaignDetails);
	    foreach($CampaignDetails as $campaignRecord){
	    	$smsCount=0;
	    	if($campaignRecord->em_email_type=='1'){
	    		$campType='Group';
	    		//tblmvbgroups where grp_branchId_fk=1
	    		//$smsCount +=$smsCount;
	    	}else{
	    		$campType='NA';
	    	}
	    	$smsCount=$this->getCampainwiseSMSCount($campaignRecord->em_id_pk);
	    	$campDBArray[]=array(
	    		'campaignTitle'=>$campaignRecord->em_campaign_name,
	    		'scheduleDateTime'=>$campaignRecord->em_email_schedule_date,
	    		'campaignContent'=>$campaignRecord->em_email_content,
	    		'campaignContactGroup'=>$campType
	    		);

	    }
	    return $campDBArray;
	}
	public function getCampainwiseSMSCount($campId=0){
		$query=$this->db->query("select seu_id_pk from tblmvbsendemailusers where seu_em_id_fk='".$campId."'");	
	    return $query->num_rows();
	}
	public function getuserGroup(){
		$result=$this->db->query("SELECT * FROM tblmvbgroups where grp_branchId_fk=1");
		return $result->result();
	} 
	public function getuser(){
		$result=$this->db->query("SELECT * FROM tblmvbvisitors where vis_branchId_fk=1");
		return $result->result();
	} 
	public function getTemplateRequest(){
		//$result=$this->db->query("select stemp.* from tblmvbsmstemplate as stemp left join tblmvbsmstemprequest as stempreq  ON(stemp.sms_id_pk=stempreq.str_id_pk)");
		$result=$this->db->query("select * from tblmvbemailtemplate ");
		//where str_client_id_fk=1
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
	public function getUserDetailsbyIdforEmail($userId=""){
		$userDBArray=array();

		$result=$this->db->query("select * from tblmvbvisitors where vis_id_pk='".$userId."'");
		$userRecord=$result->result();
		//print_r($userRecord);
		//echo $userRecord[0]->vis_firstName;die();
		$masterColumn=array('Title'=>$userRecord[0]->vis_title,'First Name'=>$userRecord[0]->vis_firstName,'Middle Name'=>$userRecord[0]->vis_middleName,'Last Name'=>$userRecord[0]->vis_lastName,'Mobile Number'=>$userRecord[0]->vis_mobile,'Email Id'=>$userRecord[0]->vis_email,'Address'=>$userRecord[0]->vis_address,'Zip Code'=>$userRecord[0]->vis_zipCode,'Country'=>$userRecord[0]->vis_countryId_fk,'State'=>$userRecord[0]->vis_stateId_fk,'City'=>$userRecord[0]->vis_cityId_fk,'Website'=>$userRecord[0]->vis_website,'Landline Number'=>$userRecord[0]->vis_landline,'Fax'=>$userRecord[0]->vis_fax,'Contact Group','Business Category'=>$userRecord[0]->vis_businessCategory,'Business Name'=>$userRecord[0]->vis_businessName,'DOB'=>$userRecord[0]->vis_dob,'Anniversary Date'=>$userRecord[0]->vis_anniversaryDate);

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
	public function EmailString($messageString="",$userId=""){
		$newstr=array();
		$newReValue=array();
		$newstr1="";
		$i=0;
		$replaceColumnValue=$this->getUserDetailsbyIdforEmail($userId);
		/*echo $messageString;
		die();*/
		//$masterColumn=array('First Name','Middle Name','Last Name');
		$masterColumn=array('First Name','Middle Name','Last Name','Mobile Number','Email Id','Address','Zip Code','Country','State','City','Website','Landline Number','Fax','Contact Group','Business Name','Business Category','DOB','Anniversary Date');
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
		foreach($masterColumn as $masterValue){
			//$expostData=explode($masterValue, $postData['txtMessage']);
			//print_r($expostData);die();
			if(strstr($messageString,$masterValue)){
				//echo "1";
				array_push($newReValue,[$masterValue,$replaceColumnValue[$masterValue]]);
				 
				if($i<>0){
					$replaceStr=$newMessageStruserWise;
				}else{
					$replaceStr=$messageString;
				}
				  $newMessageStruserWise=str_replace('##'.$masterValue.'##',$replaceColumnValue[$masterValue], $replaceStr);
				$i++;
			}else{
				 
			}
		}
		return $newMessageStruserWise;
	}
	public function addCampaingRecord($postData=""){

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
				'em_campaign_name'=>$postData['campaignName'],
				'em_email_template_id'=>$postData['selectTemplate'],
				'em_email_content'=>$postData['txtMessage'],
				'em_email_schedule_date'=>$scheduleDateTime,
				'em_email_schedule_status'=>$status,
				'em_email_type'=>$campType,
				'em_created_by'=>1,
				'em_client_id'=>1,
				'em_created_date'=>date("Y-m-d H:i:s")
			);
		$this->db->insert('tblmvbemailmanagement',$campaignDBArray);
		$LastCampainId=$this->db->insert_id();
		$idlist=implode(",",$data);
		//echo 'time is - '.$shc_dt.'<br>'.$shc_time;
		$type=$postData['chk1'];
		 
		 
		$i=0;
		if(!empty($postData['selectSearchName'])){
		foreach($postData['selectSearchName'] as $searchName){
				$userMessageStr=$this->EmailString($postData['txtMessage'],$searchName);
				$EmailId=$this->getUserEmailId($searchName);
				$this->sendEMAIL($EmailId->vis_email,$userMessageStr);
				$cmapainUserDBArray=array(
				'seu_em_id_fk'=>$LastCampainId,
				'seu_visitor_id'=>$searchName,
				'seu_group_id'=>0,
				'seu_message_details'=>$userMessageStr,
				'seu_cDate'=>date('Y-m-d H:i:s'),
				'seu_emailstatus'=>1,
			);	
				$this->db->insert('tblmvbsendemailusers',$cmapainUserDBArray);
				$otherdata=$otherdata.implode(",",$cmapainUserDBArray);
				setAActivityLogs('Transaction_activity','AAddEmailform_Add',"Added Data :- ".$idlist."  field Values:-".$otherdata);
		}
		}
		if(!empty($postData['selectgroup'])){
		foreach($postData['selectgroup'] as $searchGroup){
				if($searchGroup > 0){
					//$searchNameId=$searchGroup;	
					$visitorIdfromGroup=$this->getVisitorFromgroup($searchGroup);
					/*print_r($visitorIdfromGroup);
					die();*/
					foreach($visitorIdfromGroup as $GroupVId){
						$userMessageStr=$this->EmailString($postData['txtMessage'],$GroupVId->gv_visitorId_fk);
						 
						$EmailId=$this->getUserEmailId($userId);
		 				$this->sendEMAIL($EmailId->vis_email,$userMessageStr);
						$cmapainUserDBArray=array(
						'seu_em_id_fk'=>$LastCampainId,
						'seu_visitor_id'=>$GroupVId->gv_visitorId_fk,
						'seu_group_id'=>$searchGroup,
						'seu_cDate'=>date('Y-m-d H:i:s'),
						'seu_emailstatus'=>1,
						'seu_message_details'=>$userMessageStr
						);		
						$this->db->insert('tblmvbsendemailusers',$cmapainUserDBArray);
						$otherdata=$otherdata.implode(",",$cmapainUserDBArray);
						setAActivityLogs('Transaction_activity','AAddEmailform_Add',"Added Data :- ".$idlist."  field Values:-".$otherdata);
					}
						
					//$searchNameId=
				}else{
					$searchNameId=0;
				}
				
				
		}
		}
		if(!empty($postData['advanceSearchUserId'])){
			$exuserId=explode(",",$postData['advanceSearchUserId']);
			/*print_r($exuserId);
			die();*/
			foreach($exuserId as $userId){
				$userMessageStr=$this->EmailString($postData['txtMessage'],$userId);

				$EmailId=$this->getUserEmailId($userId);
				$this->sendEMAIL($EmailId->vis_email,$userMessageStr);
				$cmapainUserDBArray=array(
				'seu_em_id_fk'=>$LastCampainId,
				'seu_visitor_id'=>$userId,
				'seu_group_id'=>0,
				'seu_cDate'=>date('Y-m-d H:i:s'),
				'seu_emailstatus'=>1,
				'seu_message_details'=>$userMessageStr
			);
				$this->db->insert('tblmvbsendemailusers',$cmapainUserDBArray);
				$otherdata=$otherdata.implode(",",$cmapainUserDBArray);
				setAActivityLogs('Transaction_activity','AAddEmailform_Add',"Added Data :- ".$idlist."  field Values:-".$otherdata);
			}
				
				
		}
		 
		return true;
}	
	public function sendEMAIL($emailId="",$emailStr=""){
		/*$this->email->from('ravi@velociters.com', 'Ravi');
		$this->email->to('prashant.velociter@gmail.com');
		//$this->email->cc('another@another-example.com');
		//$this->email->bcc('them@their-example.com');
		$this->email->subject('Email Test');
		$this->email->message($emailStr);
		$this->email->send();		*/
		$this->email->from('ravi@velociters.com');
		$this->email->to('prashant.velociter@gmail.com');
		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');
		if($this->email->send()){
			echo "Email Sent";
			//die();
		}else{
			show_error($this->email->print_debugger());	
			//die();
		}
		
	}
	public function getUserEmailId($userId=0){
		$result=$this->db->query("select * from tblmvbvisitors where vis_id_pk='".$userId."'");
		return $result->result();
	}
	public function getVisitorFromgroup($groupId=0){
		$result=$this->db->query("select gv_visitorId_fk from tblmvbgroupvisitors where gv_grpId_fk=".$groupId."");
		return $result->result();
	}
}