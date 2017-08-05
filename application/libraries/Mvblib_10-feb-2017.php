<?php

if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Mvblib
{
		private $ci;

		public $page_url;

		public function __construct()
		{
					//$page_url=$_SERVER['REQUEST_URI'];

					$page_url=$this->router->fetch_class().'/'.$this->router->fetch_method();	

					$this->ci=& get_instance();

					$this->ci->load->database();

		            $admin_user_type_id=$this->ci->session->userdata('admin_user_type_id');

		            if($admin_user_id!='')
		           {
		           		$getUserRolesa=$this->getUserRoles($admin_user_type_id);
		       			$moduleId=$this->getPageUrlId($page_url);
		       			if($this->matchURL($getUserRolesa,$moduleId))
		       			{
		       				return true;
		       			}
		       			else
		       			{
		       				echo '<br><font size="6" color="red">You are not authorized to access this page</font>'; exit; die;
		       			}
		           }
		           else
		           {
		       			
		           }
		}


		public function getUserRoles($admin_user_id)
		{
					$result_user_qry=$this->ci->db->query("SELECT sysmu_userTypeId_fk	FROM tblmvbsysmainusers where sysmu_id_pk='".$admin_user_id."'");

				    $row_user_role=$result_user_qry->row();

				    return $row_user_role->sysmu_userTypeId_fk;
		}

		public function matchURL($getUserRolesa,$moduleId)
		{
					$returnStatus = false;
					$result_page_qry=$this->ci->db->query("SELECT map_id_pk from tblmvbmainmodulemapping where map_MainUsersId_fk='".$getUserRolesa."' AND map_module_id_fk='".$moduleId."'");

					if(count($result_page_qry->result()) > 0)
					{
						$returnStatus = true;
					}
					else
					{
						$returnStatus = false;
					}
					return $returnStatus;
		}


		public function getPageUrlId($page_url)
		{
				$result_page_url=$this->ci->db->query("Select mm_id_pk from tblmvbmainmodules where mm_controller_name='".$page_url."'");

				$row_page_url=$result_page_url->row();

				return $row_page_url->mm_id_pk;
		}

}

?>