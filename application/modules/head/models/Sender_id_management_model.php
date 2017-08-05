<?php

class Sender_id_management_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}


	public function getAllSenderId()
	{
			$result=$this->db->query("SELECT tblmvbsenderidrequest.sid_id_pk,tblmvbsenderidrequest.sid_clientId_fk,tblmvbclients.sysu_id_pk,tblmvbsystemusers.sysu_name,tblmvbclients.sysu_mobile,tblmvbclients.sysu_email,tblmvbusertypes.utyp_userType,GROUP_CONCAT(tblmvbsenderidrequest.sid_content) as sender_codes,GROUP_CONCAT(tblmvbsenderidrequest.sid_default) as sender_codes_default,GROUP_CONCAT(tblmvbsenderidrequest.sid_status) as sender_codes_status,tblmvbsenderidrequest.sid_status from tblmvbsenderidrequest left join tblmvbclients on (tblmvbsenderidrequest.sid_clientId_fk=tblmvbclients.sysu_id_pk) left join tblsystemusers on () left join tblmvbusertypes on (tblmvbsystemusers.sysu_userTypeId_fk=tblmvbusertypes.utyp_id_pk) where tblmvbsystemusers.sysu_parentClient='1'  group by tblmvbsenderidrequest.sid_clientId_fk order by tblmvbsenderidrequest.sid_clientId_fk desc");

		
			return $result->result();
	}

	public function getAllClient()
	{
			$result=$this->db->query("SELECT clnt_name,clnt_id_pk from tblmvbclients where clnt_status='1'");
		
			return $result->result();
	}
	
	
	
	// --- Function used to add Generate Coupon---//
	public function addSenderId()
	{
		$client_type_id=$this->input->post('selClientId');
		$admin_user_id=$this->session->userdata('admin_id');
		
		$sender_codes=$this->input->post('txtSenderCode');

		$default_sender_code=$this->input->post('chkDefaultSenderCode');

		$active_sender_code=$this->input->post('chkActive');		

		$created_date=date('Y-m-d H:i:s');				
		
		// $data=array('ms_client_id_fk'=>$client_type_id,'ms_createdDate'=>$created_date,'ms_createdBy'=>$admin_user_id,'ms_modifiedDate'=>$created_date,'ms_modifiedBy'=>$admin_user_id,'ms_status'=>'1');
				
		// $this->db->insert('tblmvbmainsenderid',$data);
		// $insert_id=$this->db->insert_id();

		for($m=0;$m<count($sender_codes);$m++)
		{
		                   if(in_array($m,$default_sender_code))
		                   {
		                   	      $defaultSenderCode='1';
		                   }
		                   else
		                   {
		                   	      $defaultSenderCode='0'; 
		                   }

		                   if(in_array($m,$active_sender_code))
		                   {
		                   	      $activeSenderCode='1';
		                   }
		                   else
		                   {
		                   	      $activeSenderCode='0';	
		                   } 
		   
				            $data_sender_codes=array('sid_clientId_fk'=>$client_type_id,'sid_requestDate'=>$created_date,'sid_createdBy'=>$admin_user_id,'sid_modifiedDate'=>$created_date,'sid_modifiedBy'=>$admin_user_id,'sid_content'=>$sender_codes[$m],'sid_default'=>$defaultSenderCode,'sid_status'=>$activeSenderCode,'sid_admin_status'=>'approved','sid_created_by'=>'superadmin');
		
							$this->db->insert('tblmvbsenderidrequest',$data_sender_codes);	

							$insert_id=$this->db->insert_id();       
		}

		
     //    for($v=0;$v<count($sender_codes);$v++)
     //    {
     //               if(in_array($v,$default_sender_code))
     //               {
     //               	      $defaultSenderCode='1';
     //               }
     //               else
     //               {
     //               	      $defaultSenderCode='0'; 
     //               }

     //               if(in_array($v,$active_sender_code))
     //               {
     //               			$activeSenderCode='1';
     //               }
     //               else
     //               {
     //               			$activeSenderCode='0';	
     //               }


     //    			$data_sender_codes=array('sc_sender_id_fk'=>$insert_id,'sc_sender_code'=>$sender_codes[$v],'sc_default'=>$defaultSenderCode,'sc_status'=>$activeSenderCode);
				
					// $this->db->insert('tblmvbmainsenderidcodes',$data_sender_codes);					
     //    }      

        //---------------------------------- Start Save Transaction Logs ---------------------------------//

			setSAActivityLogs('Transaction_activity','Sender_id_management_add');			

		//--------------------------------- End Save Transaction Logs ------------------------------------//
		
		
		return $insert_id;
	
	}
	
	//--- Function used to edit Festival---//
	public function editSenderId()
	{			
		$transaction_acticity_logs='';

		$created_date=date('Y-m-d H:i:s');

		$client_type_id=$this->input->post('hidden_client_id');

		$admin_user_id=$this->session->userdata('admin_id');		

		$sender_codes=$_POST['hidden_sender_id'];

		$default_sender_code=$this->input->post('chkDefaultSenderCodeEdit');

		$active_sender_code=$this->input->post('chkActiveEdit');

		$sender_id_codes=$_POST['txtSenderCodeEdit'];		

        //---------------------------------- Start Save Transaction Logs ---------------------------------//

		$result_sender_id_codes=$this->db->query("SELECT group_concat(sid_content) as sender_codes from tblmvbsenderidrequest where find_in_set(sid_id_pk,'".implode(",",$sender_codes)."')");
		
		$row_sender_id_codes=$result_sender_id_codes->result();

		$transaction_acticity_logs.='Edited For Sender Id - '.implode(",",$sender_codes).' , Old Sender Id Codes - '.$row_sender_id_codes[0]->sender_codes.' 
		    New Sender Id Codes - '.implode(",",$sender_id_codes);

		setSAActivityLogs('Transaction_activity','Sender_id_management_edit',$transaction_acticity_logs);			

		//--------------------------------- End Save Transaction Logs ------------------------------------//

		for($v=0;$v<count($sender_codes);$v++)
        {
                   if(in_array($v,$default_sender_code))
                   {
                   	      $defaultSenderCode='1';
                   }
                   else
                   {
                   	      $defaultSenderCode='0'; 
                   }

                   if(in_array($v,$active_sender_code))
                   {
                   			$activeSenderCode='1';
                   }
                   else
                   {
                   			$activeSenderCode='0';	
                   }


        			if($sender_codes[$v]!='')
                   {
		        			$data_sender_codes=array('sid_content'=>$sender_id_codes[$v],'sid_default'=>$defaultSenderCode,'sid_status'=>$activeSenderCode,'sid_modifiedDate'=>$created_date,'sid_modifiedBy'=>$admin_user_id);

		        			// echo "Updated";

		        			// echo "<pre>";

		        			// echo $sender_codes[$v];

		        			// print_r($data_sender_codes);
						
							$this->db->where('sid_id_pk',$sender_codes[$v]);
							$this->db->update('tblmvbsenderidrequest',$data_sender_codes);
				   }
				   else
				   {
				   			$data_sender_codes=array('sid_clientId_fk'=>$client_type_id,'sid_content'=>$sender_id_codes[$v],'sid_default'=>$defaultSenderCode,'sid_requestDate'=>$created_date,'sid_createdBy'=>$admin_user_id,'sid_status'=>$activeSenderCode,'sid_modifiedDate'=>$created_date,'sid_modifiedBy'=>$admin_user_id,'sid_created_by'=>'superadmin','sid_admin_status'=>'approved');
						
							// echo "Add";

		     //    			echo "<pre>";

		     //    			print_r($data_sender_codes);	


							$this->db->insert('tblmvbsenderidrequest',$data_sender_codes);		
				   }					
        }
		
		return true;
	
		}

	

	public function getClientDetails($sender_id)
	{
				$result=$this->db->query("SELECT sysu_name,sysu_lname from tblmvbsystemusers where sysu_id_pk='".$sender_id."'");
		
				return $result->result();
	}

	public function getSenderIdRecord($sender_id)
	{
				$result=$this->db->query("SELECT tblmvbsenderidrequest.sid_content,tblmvbsenderidrequest.sid_id_pk,tblmvbsenderidrequest.sid_default,tblmvbsenderidrequest.sid_status,tblmvbsenderidrequest.sid_admin_status from tblmvbsenderidrequest where tblmvbsenderidrequest.sid_clientId_fk='".$sender_id."'");
		
				return $result->result();
	}

	public function changesenderidStatus($status,$sender_id)
	{
		  for($i=0;$i < count($sender_id);$i ++)
		{
			$data=array('ms_status'=>$status);
			$this->db->where('ms_id_pk',$sender_id[$i]);
			$this->db->update('tblmvbmainsenderid',$data);
		}

		//---------------------------------- Start Save Transaction Logs ---------------------------------//

		if($status=='0')
		{
				$changed_status='Deactivate';
		}
		else
		{
				$changed_status='Activate';
		}	

		$transaction_activity_logs='';

		$all_sender_id=implode(",",$sender_id);

		$transaction_activity_logs.='Change Status to '.$changed_status.' For Sender Ids - '.$all_sender_id;

		setSAActivityLogs('Transaction_activity','Sender_id_management_add',$transaction_activity_logs);			

		//--------------------------------- End Save Transaction Logs ------------------------------------//
		
		return true;
	}
	
	
}
