<?php

class Reminder_management_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function getCustomColumn()
	{
			$client_id=$this->session->userdata('client_id');

			// $client_id=1;

			// $result=$this->db->query("Select cfi_id_pk,cfi_label,cfi_value From tblmvbcustomfields where cfi_clientId='".$client_id."' and cfi_field_type='date'
			// 	UNION
			// 	Select visitfield_type,visitfield_name,visitfield_id_pk From tblmvbvisitfield where visitfield_type='date' and visitfield_status='1'
			// 	");

			$result=$this->db->query("Select cf.cfi_id_pk as field_id,cf.cfi_label as label_name,(CASE When cf.cfi_id_pk>0 THEN 'Admin' ELSE '' END) as user_field_type From tblmvbcustomfields cf left join tblmvbcustomfieldvalue cfv on (cf.cfi_id_pk=cfv.cfv_fieldId_fk) where cf.cfi_clientId='".$client_id."' and cf.cfi_field_type='date' and cf.cfi_status='1'
				UNION
				Select vf.visitfield_id_pk as field_id,vf.visitfield_name as label_name,(CASE When vf.visitfield_id_pk>0 THEN 'Superadmin' ELSE '' END) as user_field_type From tblmvbvisitfield vf left join tblmvbvisitfieldvalue vfv on (vf.visitfield_id_pk=vfv.visitval_fieldId_fk) where vf.visitfield_type='date' and vf.visitfield_status='1'
				");              

			$row=$result->result();	

			return $row;
	}

	public function getSmsTemplate()
	{
			$branch_id=$this->session->userdata('branch_id');

			$result=$this->db->query("Select str_id_pk,str_template_name From tblmvbsmstemprequest where str_branchId_fk='".$branch_id."' and str_admin_status='approved'");
			$row=$result->result();	

			return $row;
	}

	public function getAllReminders()
	{
			$events = array();

			$branch_id=$this->session->userdata('branch_id');

			//	where rem_branch_id_fk='".$branch_id."'

			$result=$this->db->query("Select rem_id_pk,rem_from_date,rem_to_date,rem_reminder_text,rem_reminder_type From tblmvbreminder");
			$row=$result->result();

			for($i=0;$i<count($row);$i++)
			{
					if($row[$i]->rem_reminder_type=='basic_type')
					{
							$start_date=$row[$i]->rem_from_date;
							$end_date=$row[$i]->rem_to_date;
					}
					else
					{
							$start_date=date('Y-m-d',strtotime($row[$i]->rem_from_date));
							$end_date=date('Y-m-d',strtotime($row[$i]->rem_to_date));
					}

					if(strlen($row[$i]->rem_reminder_text)>10)
					{
							$reminder_text=substr($row[$i]->rem_reminder_text, 0, 10) . "...";
					}
					else
					{
							$reminder_text=$row[$i]->rem_reminder_text;
					}

					$e = array();
				    $e['id'] =$row[$i]->rem_id_pk;
				    $e['title'] = $reminder_text;
				    $e['start'] = $start_date;
				    $e['end'] = $end_date;
				    $e['tooltip'] = $row[$i]->rem_reminder_text;

				    array_push($events, $e);
			}

			echo json_encode($events);
	}

	public function setReminder()
	{
				$hidden_reminder_type=$_POST['hidden_reminder_type'];				

                if($hidden_reminder_type=='basic_type')
                {
						$recipient_mobile_number=$this->input->post('txtrecipientmobile');
						$recipient_name=$this->input->post('txtrecipientname');
						$report_to=$this->input->post('selLocation');
						$reminder_text=$this->input->post('txtremindertext');
						$reminder_date=$this->input->post('txtdate');
						$reminder_type=$this->input->post('selreminder_type');
						$current_date=date('Y-m-d H:i:s');

						$client_id=$this->session->userdata('client_id');
						$branch_id=$this->session->userdata('branch_id');
						$admin_id=$this->session->userdata('admin_admin_id');

						$final_report_to=implode(",",$report_to);

						
						$data=array(
									'rem_client_id_fk'=>$client_id,
									'rem_branch_id_fk'=>$branch_id,
									'rem_mobile_no'=>$recipient_mobile_number,
									'rem_recipent_name'=>$recipient_name,
									'rem_report_to'=>$final_report_to,
									'rem_reminder_text'=>$reminder_text,
									'rem_reminder_type'=>$hidden_reminder_type,
									'rem_from_date'=>$reminder_date,
									'rem_to_date'=>$reminder_date,
									'rem_createdDate'=>$current_date,
									'rem_createdBy'=>$admin_id,
									'rem_modifiedDate'=>$current_date,
									'rem_modifiedBy'=>$admin_id);


						//---------------------------------- Start Save Transaction Logs ---------------------------//          
                    			
                    			setAActivityLogs('Transaction_activity','basic_reminder_added');

                		//-------------------------------  End Save Transaction Logs ------------------------------//
				}
				else
				{		
						$custom_column=$this->input->post('selcustomcolumn');

						$parts_custom_column=explode("~",$custom_column);

						$custom_column_id=$parts_custom_column[0];

						$custom_user_field_type=$parts_custom_column[1];

						
						$sms_template=$this->input->post('selsmstemplate');
						$interval=$this->input->post('selinterval');
						$before_days=$this->input->post('txtbeforedays');
						$reminder_start_date=$this->input->post('txtfromdate');
						$reminder_end_date=$this->input->post('txttodate');
						$report_to=$this->input->post('selCustomLocation');
						$reminder_text=$this->input->post('txtcustomremindertext');
						$before_days=$this->input->post('txtbeforedays');
						$optional=$this->input->post('chkoptional');
						$current_date=date('Y-m-d H:i:s');

						if(isset($optional))
						{
							  $checkbox_optional='1';
						}
						else
						{
							  $checkbox_optional='0';
						}		

						$final_report_to=implode(",",$report_to);


						$client_id=$this->session->userdata('client_id');
						$branch_id=$this->session->userdata('branch_id');
						$admin_id=$this->session->userdata('admin_admin_id');
						
						$data=array('rem_branch_id_fk'=>$branch_id,
									'rem_client_id_fk'=>$client_id,
									'rem_column'=>$custom_column_id,
									'rem_template'=>$sms_template,
									'rem_interval'=>$interval,
									'rem_report_to'=>$final_report_to,
									'rem_reminder_text'=>$reminder_text,
									'rem_reminder_type'=>$hidden_reminder_type,
									'rem_from_date'=>$reminder_start_date,
									'rem_to_date'=>$reminder_end_date,
									'rem_before_days'=>$before_days,
									'rem_optional'=>$checkbox_optional,
									'rem_user_field_type'=>$custom_user_field_type,
									'rem_createdDate'=>$current_date,
									'rem_createdBy'=>$admin_id,
									'rem_modifiedDate'=>$current_date,
									'rem_modifiedBy'=>$admin_id);

						//---------------------------------- Start Save Transaction Logs ---------------------------//          
                    			
                    			setAActivityLogs('Transaction_activity','custom_reminder_added');

                		//-------------------------------  End Save Transaction Logs ------------------------------//
				}

				$this->db->insert('tblmvbreminder',$data);
				$insert_id=$this->db->insert_id();

				return $insert_id;
	}

	public function getAdminReportTo()
	{
			// $branch_id=$this->session->userdata('branch_id');
			// $client_id=$this->session->userdata('client_id');

			$branch_id=1;
			$client_id=1;

			$result=$this->db->query("Select sysu_id_pk,sysu_name From tblmvbsystemusers where sysu_status='1' and sysu_branchId_fk='".$branch_id."' and sysu_clientId_fk='".$client_id."'");
			$row=$result->result();

			return $row;
	}



}
?>