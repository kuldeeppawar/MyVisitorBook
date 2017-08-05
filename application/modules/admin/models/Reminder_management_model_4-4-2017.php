<?php

class Reminder_management_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function getAllReminders()
	{
			$events = array();

			$branch_id=$this->session->userdata('branch_id');

			//	where rem_branch_id_fk='".$branch_id."'

			$result=$this->db->query("Select rem_id_pk,rem_from_date,rem_to_date,rem_reminder_text From tblmvbreminder");
			$row=$result->result();

			for($i=0;$i<count($row);$i++)
			{
					$e = array();
				    $e['id'] =$row[$i]->rem_id_pk;
				    $e['title'] = $row[$i]->rem_reminder_text;
				    $e['start'] = $row[$i]->rem_from_date;
				    $e['end'] = $row[$i]->rem_to_date;

				    array_push($events, $e);
			}

			echo json_encode($events);
	}
}
?>