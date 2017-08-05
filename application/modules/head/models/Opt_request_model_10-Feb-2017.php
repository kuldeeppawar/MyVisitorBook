<?php



class Opt_request_model extends CI_Model

{



	public function __construct()

	{

		parent::__construct();

	

	}

	

	// --Function used get all FAQ---//

	public function getAllOPTrequest()

	{

				$result=$this->db->query("SELECT ort.optreq_id_pk,DATE_FORMAT(cl.clnt_createdDate,'%d/%m/%Y,%h:%i %p') as created_date,cl.clnt_name,ot.opt_id_pk,ort.optreq_id_pk,DATE_FORMAT(ort.optreq_requestDate,'%d/%m/%Y,%h:%i %p') as requested_date,DATE_FORMAT(ort.optreq_app_rej_date,'%d/%m/%Y,%h:%i %p') as app_rejt_date,ot.opt_name,ort.optreq_comment,cl.clnt_name,(CASE ort.optreq_status WHEN 0 THEN 'Pending' WHEN 1 THEN 'Approved' WHEN 2 THEN 'Rejected' END) as request_status,ort.optreq_comment FROM tblmvboptrequest ort left join tblmvbopt ot on (ort.optreq_opt_id_fk=ot.opt_id_pk) left join tblmvbclients cl on (ot.opt_client_id_fk=cl.clnt_id_pk) order by ort.optreq_id_pk");

				

				return $result->result();	

	}



	public function setStatus($value,$optreq_id,$comment)

	{

				$current_date=date('Y-m-d H:i:s');



				for($str=0;$str<count($optreq_id);$str++)

				{

						$data=array('optreq_comment'=>$comment,'optreq_status'=>$value,'optreq_app_rej_date'=>$current_date);

		

						$this->db->where('optreq_id_pk',$optreq_id[$str]);

						$this->db->update('tblmvboptrequest',$data);

				}



				//---------------------------------- Start Save Transaction Logs ---------------------------//



				$all_sms_temp_request_ids=implode(",",$optreq_id);



				$transaction_logs_details='';



				$transaction_logs_details.='Status change to '.$value.' for OPT Template Request IDs - '.$all_sms_temp_request_ids;



				setSAActivityLogs('Transaction_activity','OPT_temp_request_status',$transaction_logs_details);



				//-------------------------------  End Save Transaction Logs ------------------------------//

	}



	public function updateOPTName()

	{

				$opt_id=$_POST['hidden_opt_id'];



				for($str=0;$str<count($optreq_id);$str++)

				{

							$data=array('optreq_comment'=>$comment,'optreq_status'=>$value,'optreq_appr_rejt_date'=>$current_date);

		

							$this->db->where('optreq_id_pk',$optreq_id[$str]);

							$this->db->update('tblmvboptrequest',$data);

				}

	}



	public function getOPTName($opt_id)

	{

				$result=$this->db->query("SELECT ot.opt_name,ot.opt_id_pk FROM tblmvboptrequest ort left join tblmvbopt ot on (ort.optreq_opt_id_fk=ot.opt_id_pk) where ort.optreq_id_pk='".$opt_id."'");

				

				return  $result->result();



				

	}



	public function editOPTName()

	{

				$opt_id=$_POST['hidden_opt_id'];	

				$opt_name=$_POST['edit_opt_name'];



				$data=array('opt_name'=>$opt_name);

		

				$this->db->where('opt_id_pk',$opt_id);

				$this->db->update('tblmvbopt',$data);



				//---------------------------------- Start Save Transaction Logs ---------------------------//



				$transaction_logs_details='';



				$transaction_logs_details.='OPT Name change to '.$opt_name.' for OPT Id - '.$opt_id;



				setSAActivityLogs('Transaction_activity','OPT_name_edit',$transaction_logs_details);



				//-------------------------------  End Save Transaction Logs ------------------------------//



	}





}

