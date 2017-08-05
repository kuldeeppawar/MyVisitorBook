<?php

class Opt_out_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}
	
	// --Function used get all FAQ---//
	public function getAllOptout()
	{
				$result=$this->db->query("SELECT oo.oo_id_pk,cl.clnt_id_pk,cl.clnt_name,(Select smu.sysmu_username FROM tblmvbsysmainusers smu where oo.oo_optoutBy=smu.sysmu_id_pk) as opt_out_by,(Select smu.sysmu_username FROM tblmvbsysmainusers smu where oo.oo_optinBy=smu.sysmu_id_pk) as opt_in_by,CONCAT(vis.vis_firstName,' ',vis.vis_lastName) as customer_name,vis.vis_email,vis.vis_mobile,(CASE oo.oo_status WHEN 0 THEN 'OPT-Out' WHEN 1 THEN 'OPT-In' END) as status,DATE_FORMAT(oo.oo_createdDate,'%d-%m-%Y') as created_date,oo.oo_status FROM tblmvboptout oo left join tblmvbvisitors vis on (oo.oo_mobile_no=vis.vis_mobile) left join tblmvbbranches brh on (brh.brn_id_pk=vis.vis_branchId_fk) left join tblmvbclients cl on (brh.brn_id_pk=cl.clnt_id_pk) group by oo.oo_id_pk order by oo.oo_id_pk ");
				
				return $result->result();	
	}


	public function addOptOut()
	{
				$created_date=date('Y-m-d H:i:s');

				$mobile_no=$_POST['txtmobileno'];	

				$created_by=$this->session->userdata('admin_id');	

				$status='0';		
		
				$data=array('oo_mobile_no'=>$mobile_no,'oo_optoutBy'=>$created_by,'oo_createdDate'=>$created_date,'oo_status'=>$status);
						
				$this->db->insert('tblmvboptout',$data);
				$insert_id=$this->db->insert_id();

				//---------------------------------- Start Save Transaction Logs ---------------------------//
			
					setSAActivityLogs('Transaction_activity','opt_out_add');

				//-------------------------------  End Save Transaction Logs ------------------------------//
	}

	public function addOptIn()
	{
				$created_date=date('Y-m-d H:i:s');

				$opt_ids=$_POST['opt_out_id'];

				$created_by=$this->session->userdata('admin_id');	

				$status='1';								

				$this->db->query("Update tblmvboptout set oo_optinBy='".$created_by."',oo_createdDate='".$created_date."',oo_status='".$status."' where oo_id_pk in (".implode(',',$opt_ids).")");
	

				//---------------------------------- Start Save Transaction Logs ---------------------------//
			
					setSAActivityLogs('Transaction_activity','opt_in_add');

				//-------------------------------  End Save Transaction Logs ------------------------------//
	}

	
}
