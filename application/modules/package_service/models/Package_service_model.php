<?php

class Package_service_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	
	}

	public function getallPackages()
	{
		
		
		$res=$this->db->query("SELECT tblmvbpackages.*,tblmvbpackagedetails.* FROM tblmvbpackages LEFT JOIN tblmvbpackagedetails on
							   tblmvbpackages.pkg_id_pk=tblmvbpackagedetails.pkgd_packId_fk WHERE tblmvbpackages.pkg_status='1'");
		return $res->result();
	}

    public function getallrenewalPackages()
    {

    	$result=$this->db->query("SELECT `rpkg_id_pk`, `rpkg_packageType`, `rpkg_packageName`, `rpkg_smsCredit`, `rpkg_smsPrice`, `rpkg_emailCredit`, `rpkg_emailPrice`, 
    		                     `rpkg_validity`, `rpkg_tax`, `rpkg_total`, `rpkg_discount`, `rpkg_finalPrice`, `rpkg_dealerAmount`, `rpkg_salerAmount`,
    		                     `rpkg_dealerPayMethod`, `rpkg_salerPayMethod`, `rpkg_createdBy`, `rpkg_createdDate`, `rpkg_modifiedBy`, `rpkg_modifiedDate`, `rpkg_status`
    		                      FROM `tblmvbrenewpackage` WHERE rpkg_status=1");
		
		return $result->result();
    	
    	
    }


}
