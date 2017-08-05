<?php
class Backup_management_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	//---- function used to save database backup logs-----//
	public function saveDbBackupLogs($filename)
	{
		$created_date=date('Y-m-d H:i:s');
		$admin_user_id=$this->session->userdata('admin_id');
		$data=array('bp_filename'=>$filename,
					'bp_admin_user_id_fk'=>$admin_user_id,
					'bp_createdDate'=>$created_date);
		
		$this->db->insert('tblmvbbackuplogs',$data);
		$insert_id=$this->db->insert_id();
	
		return $insert_id;
	
     }
	
	// --Function to get listing of all backup---//
	public function getAllBackupDetails()
	{
		$query=$this->db->query("Select DATE_FORMAT(bp.bp_createdDate,'%d/%m/%Y %h:%i %p') as backup_date,mu.sysmu_username,mu.sysmu_email
								from tblmvbbackuplogs bp left join tblmvbsysmainusers mu on (bp.bp_admin_user_id_fk=mu.sysmu_id_pk) order by bp.bp_createdDate DESC");
		
		return $query->result();
		
	}

}
