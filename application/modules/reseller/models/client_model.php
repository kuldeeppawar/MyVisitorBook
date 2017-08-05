<?php

class Client_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}

	public function getPackage()
	{
		$result=$this->db->query("select * from tblmvbpackages where pkg_status=1");
		return $result->result();
	
	}
	
	// function to get Order Details
	public function getOrderDetails($id)
	{
	    $result=$this->db->query("SELECT ord_id_pk,ord_packageId_fk,ord_createdBy,ord_discountPrice,ord_paymentMode,ord_purchaseDate,ord_packageType,
			                      pkg_name,rpkg_packageName,ord_price,ord_couponValue,ord_paymentType FROM tblmvborders LEFT JOIN tblmvbpackages ON
			                      tblmvborders.ord_packageId_fk=tblmvbpackages.pkg_id_pk LEFT JOIN tblmvbrenewpackage ON
			                      tblmvborders.ord_packageId_fk=tblmvbrenewpackage.rpkg_id_pk WHERE ord_clntId_fk='" . $id . "' order by ord_id_pk;");
		$res=$result->result();
		setRSActivityLogs("Transaction_activity","View Order","Viewd Order Details of CLient " . $id);
		if (count($res) > 0)
		{
			return $result->result();
		} else
		{
			return array();
		}
	
	}

	public function lastModifiedClients()
	{
		$result=$this->db->query("select clnt_name from tblmvbclients order by clnt_modifiedDate desc");
		$res=$result->result();
		if (count($res) > 0)
		{
			return $result->result();
		} else
		{
			return array();
		}
	
	}

	public function getClientdetails($id)
	{
		$result=$this->db->query("SELECT * FROM tblmvbsystemusers WHERE sysu_clientId_fk='" . $id . "'");
		$res=$result->result();
		setRSActivityLogs("Transaction_activity","View Client","Viewed all Information of Client " . $id);
		if (count($res) > 0)
		{
			return $result->result();
		} else
		{
			return array();
		}
	
	}

	public function getAllClients()
	{
		$id=$this->session->userdata('reseller_id');
		$result=$this->db->query("select clnt_id_pk,clnt_name,clnt_email,clnt_mobile,clnt_address from tblmvbclients where clnt_status=1 and clnt_createdBy='" . $id . "'");
		$res=$result->result();
		setRSActivityLogs("Transaction_activity","View Client","Viewed All Clients");
		if (count($res) > 0)
		{
			return $res;
		} else
		{
			return array();
		}
	
	}

}
