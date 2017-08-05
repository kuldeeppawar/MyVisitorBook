<?php

class Dashboard_Model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}

	public function getAllclient()
	{
		
		$admin_id=$this->session->userdata('reseller_id');
		$result=$this->db->query("SELECT `clnt_id_pk`, `clnt_name`, `clnt_mobile`, `clnt_email`, `clnt_password`, `clnt_countryId_fk`, `clnt_stateId_fk`, `clnt_cityId_fk`,
			                     `clnt_address`, `clnt_packageId_fk`, `clnt_totalSmsCredit`, `clnt_totalEmailCredit`, `clnt_validity`, `clnt_expiryDate`, `clnt_createdDate`,
			                     `clnt_createdBy`, `clnt_modifiedDate`, `clnt_modifiedBy`, `clnt_status` FROM `tblmvbclients` WHERE clnt_createdBy='".$admin_id."'");
		
		$result=$result->result();
		
		return count($result);
	
	}

	public function getTodayclient()
	{
		$admin_id=$this->session->userdata('reseller_id');
		$date=date('Y-m-d');
		$result=$this->db->query("SELECT `clnt_id_pk`, `clnt_name`, `clnt_mobile`, `clnt_email`, `clnt_password`, `clnt_countryId_fk`, `clnt_stateId_fk`, `clnt_cityId_fk`,
			                     `clnt_address`, `clnt_packageId_fk`, `clnt_totalSmsCredit`, `clnt_totalEmailCredit`, `clnt_validity`, `clnt_expiryDate`, `clnt_createdDate`,
			                     `clnt_createdBy`, `clnt_modifiedDate`, `clnt_modifiedBy`, `clnt_status` FROM `tblmvbclients` WHERE clnt_createdBy='".$admin_id."'
			                      AND clnt_createdDate like '%$date%' ");
		
		$result=$result->result();
		
		return count($result);
	
	}

	public function getMonthsms()
	{
		$date=date('m');
		$result=$this->db->query("SELECT `ssu_id_pk`, `ssu_sm_id_fk`, `ssu_visitor_id`, `ssu_group_id`, `ssu_message_details`, `ssu_cDate`, 
    		                      `ssu_smsstatus` FROM `tblmvbsendsmsusers` WHERE Month(ssu_cDate)='" . $date . "'");
		
		$result=$result->result();
		
		return count($result);
	
	}

	public function getMonthemail()
	{
		$date=date('m');
		$result=$this->db->query("SELECT `seu_id_pk`, `seu_em_id_fk`, `seu_visitor_id`, `seu_group_id`, `seu_message_details`, `seu_cDate`, `seu_emailstatus`
    		                      FROM `tblmvbsendemailusers`WHERE Month(seu_cDate)='" . $date . "'");
		
		$result=$result->result();
		
		return count($result);
	
	}

	public function getAllPackages()
	{
		$result=$this->db->query("SELECT pkg_name, pkgd_finalPrice,	pkgd_dealerPayMethod,pkgd_dealerAmount FROM tblmvbpackages LEFT JOIN tblmvbpackagedetails ON tblmvbpackages.pkg_id_pk = tblmvbpackagedetails.pkgd_packId_fk
			                      WHERE pkg_status='1'");
		
		return $result->result();
	
	}

	public function getAllRenewPackages()
	{
		$result=$this->db->query("SELECT rpkg_packageName,rpkg_finalPrice,rpkg_dealerPayMethod,rpkg_dealerAmount FROM tblmvbrenewpackage
			                      WHERE rpkg_status='1'");
		
		return  $result->result();
		
	}

}

?>
