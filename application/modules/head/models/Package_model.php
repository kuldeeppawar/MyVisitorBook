<?php

class Package_model extends CI_Model
{

	public function __construct()
	{

		parent::__construct();
	
	}
	
	// --Function used get all Tax list---//
	public function getAlltax()
	{

		$date=date("Y-m-d");
		$result=$this->db->query("SELECT tax_id_pk,tax_name,tax_percentValue FROM tblmvbtax WHERE date(NOW()) BETWEEN tax_validFrom 
	    		                      and tax_validTo and tax_status='1' ");
		
		return $result->result();
	
	}
	
	// --Function userd to get specific package details--//
	public function getPackage($id)
	{

		$result=$this->db->query("Select pkg_id_pk,pkg_name,pkg_smsCredit,pkg_emailCredit,pkg_smsPrice,pkg_emailPrice,pkg_validity,pkg_status
									  from tblmvbpackages where pkg_id_pk='" . $id . "'");
		return $result->result();
	
	}
	
	// --Function userd to get specific package tax--//
	public function getPackagetax($id)
	{

		$result=$this->db->query("Select pkgt_id_pk,pkgt_pkgId_fk,pkgt_taxId_fk,pkgt_taxPercent from tblmvbpackagetax  where pkgt_pkgId_fk='" . $id . "'");
		return $result->result();
	
	}
	
	// --Function userd to get specific package details--//
	public function getPackagedetail($id)
	{

		$result=$this->db->query("Select pkgd_id_pk,pkgd_packId_fk,pkgd_smsTemplate,pkgd_emailTemplate,pkgd_smsBulk,pkgd_emailBulk,pkgd_customFields,pkgd_visitorRecord,pkgd_branch,
				                      pkgd_documentSize,pkgd_moRegstr,pkgd_userMgt,pkgd_senderId,pkgd_emailSupport,pkgd_techlSupport,pkgd_scheduleReport,pkgd_mobileApp,
				                      pkgd_addressLebeling,pkgd_price,pkgd_discount,pkgd_discount,pkgds_tax,pkgd_finalPrice,pkgd_salerAmount,pkgd_dealerAmount,pkgd_dealerPayMethod,pkgd_salerPayMethod from  tblmvbpackagedetails where
				                      pkgd_packId_fk='" . $id . "'");
		return $result->result();
	
	}
	
	// --Function userd to get specific package services details--//
	public function getPackageservice($id)
	{

		$result=$this->db->query("Select pkgds_id_pk,pkgds_packId_fk,pkgds_service from tblmvbpackageservice where pkgds_packId_fk='" . $id . "'");
		return $result->result();
	
	}
	
	// ----Function used to get packagre details//
	public function getPackagedetails()
	{

		$result=$this->db->query("select tblmvbpackages.pkg_id_pk,tblmvbpackages.pkg_name,tblmvbpackages.pkg_smsCredit,tblmvbpackages.pkg_emailCredit,
				                      tblmvbpackages.pkg_smsPrice,tblmvbpackages.pkg_emailPrice,tblmvbpackages.pkg_validity,tblmvbpackages.pkg_status,
				                      tblmvbpackagedetails.pkgd_finalPrice, tblmvbpackagedetails.pkgd_branch from tblmvbpackages tblmvbpackages
                                      LEFT JOIN tblmvbpackagedetails tblmvbpackagedetails on(tblmvbpackages.pkg_id_pk=tblmvbpackagedetails.pkgd_packId_fk) order by tblmvbpackages.pkg_id_pk DESC");
		return $result->result();
	
	}
	
	// --- Function used to add Package---//
	public function addPackage()
	{

		$txtPackagename=$this->input->post('txtPackagename');
		$txtValidity=$this->input->post('txtValidity');
		$txtSmscredit=$this->input->post('txtSmscredit');
		$txtSmscreditprice=$this->input->post('txtSmscreditprice');
		$txtEmailcredit=$this->input->post('txtEmailcredit');
		$txtEmailcreditprice=$this->input->post('txtEmailcreditprice');
		$txtSmstemplate=$this->input->post('txtSmstemplate');
		$txtEmailtemplete=$this->input->post('txtEmailtemplete');
		$txtSmsbulk=$this->input->post('txtSmsbulk');
		$txtEmailbulk=$this->input->post('txtEmailbulk');
		$txtCustomfields=$this->input->post('txtCustomfields');
		$txtVisitorrecord=$this->input->post('txtVisitorrecord');
		$txtMoregistration=$this->input->post('txtMoregistration');
		$txtSenderid=$this->input->post('txtSenderid');
		$txtUsers=$this->input->post('txtUsers');
		
		$optUsers=$this->input->post('optUsers');
		$optSenderid=$this->input->post('optSenderid');
		$optCustomfields=$this->input->post('optCustomfields');
		$optVisitorrecord=$this->input->post('optVisitorrecord');
		$txtDocsize=$this->input->post('txtDocsize');
		$optDocsize=$this->input->post('optDocsize');
		$optMoregistration=$this->input->post('optMoregistration');
		
		$optEmailsupport=$this->input->post('optEmailsupport');
		$optTechsupport=$this->input->post('optTechsupport');
		$optSchedule=$this->input->post('optSchedule');
		$optMobileapp=$this->input->post('optMobileapp');
		$optAddresslebeling=$this->input->post('optAddresslebeling');
		$txtServicename=$this->input->post('txtServicename');
		$seltax=$this->input->post('seltax');
		$taxPercent=$this->input->post('taxPercent');
		$txtPricing=$this->input->post('txtPricing');
		$txtDiscount=$this->input->post('txtDiscount');
		$txtFinalprice=$this->input->post('txtFinalprice');
		$admin_id=$this->session->userdata('admin_id');
		$date=date('Y-m-d h:i:s');
		$txttaxPricing=$this->input->post('txttaxPricing');
		$txtDealerAmount=$this->input->post('txtDealerPayment');
		$txtSalerAmount=$this->input->post('txtSalerPayment');
		$optSalerPayMethod=$this->input->post('radioSaler');
		$optDealerPayMethod=$this->input->post('radioDealer');
		$optBranch=$this->input->post('optBranch');
		$txtBranch=$this->input->post('txtBranch');
		
		// if ($optCustomfields == 0 || $txtCustomfields == " ")
		// {
		// 	$txtCustomfields=0;
		// }
		
		// if ($optVisitorrecord == 0 || $txtVisitorrecord == " ")
		// {
		// 	$txtVisitorrecord=0;
		// }
		
		// if ($optDocsize == 0 || $txtDocsize == "")
		// {
		// 	$txtDocsize=0;
		// }
		
		// if ($optMoregistration == 0 || $txtMoregistration == " ")
		// {
		// 	$txtMoregistration=0;
		// }
		
		// if ($optUsers == 0 || $txtUsers == "")
		// {
		// 	$txtUsers=0;
		// }
		
		// if ($optSenderid == 0 || $txtSenderid == "")
		// {
		// 	$txtSenderid=0;
		// }
		
		// if ($optBranch == 0 || $txtBranch == "")
		// {
		// 	$txtBranch=0;
		// }
		
		$data=array('pkg_name'=>$txtPackagename,
					'pkg_smsCredit'=>$txtSmscredit,
					'pkg_smsPrice'=>$txtSmscreditprice,
					'pkg_emailCredit'=>$txtEmailcredit,
					'pkg_emailPrice'=>$txtEmailcreditprice,
					'pkg_validity'=>$txtValidity,
					'pkg_createdDate'=>$date,
					'pkg_createdBy'=>$admin_id,
					'pkg_modifiedDate'=>$date,
					'pkg_modifiedBy'=>$admin_id,
					'pkg_status'=>'1');
		
		$this->db->insert('tblmvbpackages',$data);
		$insert_id=$this->db->insert_id();
		
		$pckservice="";
		$pcktax="";
		
		for($i=0;$i < count($txtServicename);$i ++)
		{
			$data_package=array(
								'pkgds_packId_fk'=>$insert_id,
								'pkgds_service'=>$txtServicename[$i]);
			
			$this->db->insert('tblmvbpackageservice',$data_package);
			$pckservice=$pckservice . implode(",",$data_package);
		}
		
		for($i=0;$i < count($seltax);$i ++)
		{
			$a=explode("-",$seltax[$i]);
			
			$data_packages=array('pkgt_pkgId_fk'=>$insert_id,
								 'pkgt_taxId_fk'=>$a[0],
								 'pkgt_taxPercent'=>$a[1]);
			
			$this->db->insert('tblmvbpackagetax',$data_packages);
			$pcktax=$pcktax . implode(",",$data_packages);
		}
		
		$data_packageDetail=array('pkgd_packId_fk'=>$insert_id,
								  'pkgd_smsTemplate'=>$txtSmstemplate,
								  'pkgd_emailTemplate'=>$txtEmailtemplete,
								  'pkgd_smsBulk'=>$txtSmsbulk,
								  'pkgd_emailBulk'=>$txtEmailbulk,
								  'pkgd_customFields'=>$txtCustomfields,
								  'pkgd_visitorRecord'=>$txtVisitorrecord,
								  'pkgd_documentSize'=>$txtDocsize,
								  'pkgd_moRegstr'=>$txtMoregistration,
								  'pkgd_userMgt'=>$txtUsers,
				                  'pkgd_branch'=>$txtBranch,
								  'pkgd_senderId'=>$txtSenderid,
								  'pkgd_emailSupport'=>$optEmailsupport,
								  'pkgd_techlSupport'=>$optTechsupport,
								  'pkgd_scheduleReport'=>$optSchedule,
								  'pkgd_mobileApp'=>$optMobileapp,
								  'pkgd_addressLebeling'=>$optAddresslebeling,
								  'pkgd_price'=>$txtPricing,
								  'pkgd_discount'=>$txtDiscount,
								  'pkgd_finalPrice'=>$txtFinalprice,
								  'pkgds_tax'=>$txttaxPricing,
								  'pkgd_dealerAmount'=>$txtDealerAmount,
								  'pkgd_salerAmount'=>$txtSalerAmount,
								  'pkgd_dealerPayMethod'=>$optDealerPayMethod,
								  'pkgd_salerPayMethod'=>$optSalerPayMethod);
		
		$this->db->insert('tblmvbpackagedetails',$data_packageDetail);
		
		// logs
		$pcknew=implode(",",$data);
		$pckdetails=implode(",",$data_packageDetail);
		
		$updatedData="  Package :-" . $pcknew . "  PackageService :-" . $pckservice . "  Packagetax :-" . $pcktax . "  Packagedetails :-" . $pckdetails;
		
		setSAActivityLogs('Transaction_activity','SAPackage_edit',$updatedData);
		
		return $insert_id;
	
	}
	
	// --- Function used to edit Package---//
	public function editPackage()
	{

		$txtPackagename=$this->input->post('txtPackagename');
		$txtValidity=$this->input->post('txtValidity');
		$txtSmscredit=$this->input->post('txtSmscredit');
		$txtSmscreditprice=$this->input->post('txtSmscreditprice');
		$txtEmailcredit=$this->input->post('txtEmailcredit');
		$txtEmailcreditprice=$this->input->post('txtEmailcreditprice');
		$txtSmstemplate=$this->input->post('txtSmstemplate');
		$txtEmailtemplete=$this->input->post('txtEmailtemplete');
		$txtSmsbulk=$this->input->post('txtSmsbulk');
		$txtEmailbulk=$this->input->post('txtEmailbulk');
		$txtCustomfields=$this->input->post('txtCustomfields');
		$txtVisitorrecord=$this->input->post('txtVisitorrecord');
		$txtMoregistration=$this->input->post('txtMoregistration');
		$txtSenderid=$this->input->post('txtSenderid');
		$txtUsers=$this->input->post('txtUsers');
		
		$optUsers=$this->input->post('optUsers');
		$optSenderid=$this->input->post('optSenderid');
		$optCustomfields=$this->input->post('optCustomfields');
		$optVisitorrecord=$this->input->post('optVisitorrecord');
		$txtDocsize=$this->input->post('txtDocsize');
		$optDocsize=$this->input->post('optDocsize');
		$optMoregistration=$this->input->post('optMoregistration');
		
		$optEmailsupport=$this->input->post('optEmailsupport');
		$optTechsupport=$this->input->post('optTechsupport');
		$optSchedule=$this->input->post('optSchedule');
		$optMobileapp=$this->input->post('optMobileapp');
		$optAddresslebeling=$this->input->post('optAddresslebeling');
		$txtServicename=$this->input->post('txtServicename');
		$seltax=$this->input->post('seltax');
		$taxPercent=$this->input->post('taxPercent');
		$txtPricing=$this->input->post('txtPricing');
		$txtDiscount=$this->input->post('txtDiscount');
		$txtFinalprice=$this->input->post('txtFinalprice');
		$admin_id=$this->session->userdata('admin_id');
		$txtDealerAmount=$this->input->post('txtDealerPayment');
		$txtSalerAmount=$this->input->post('txtSalerPayment');
		$optSalerPayMethod=$this->input->post('radioSaler');
		$optDealerPayMethod=$this->input->post('radioDealer');
		$optBranch=$this->input->post('optBranch');
		$txtBranch=$this->input->post('txtBranch');
		
		$date=date('Y-m-d h:i:s');
		$txttaxPricing=$this->input->post('txttaxPricing');
		// if ($optCustomfields == 0 || $txtCustomfields == " ")
		// {
		// 	$txtCustomfields=0;
		// }
		
		// if ($optVisitorrecord == 0 || $txtVisitorrecord == " ")
		// {
		// 	$txtVisitorrecord=0;
		// }
		
		// if ($optDocsize == 0 || $txtDocsize == "")
		// {
		// 	$txtDocsize=0;
		// }
		
		// if ($optMoregistration == 0 || $txtMoregistration == " ")
		// {
		// 	$txtMoregistration=0;
		// }
		
		// if ($optUsers == 0 || $txtUsers == "")
		// {
		// 	$txtUsers=0;
		// }
		
		// if ($optSenderid == 0 || $txtSenderid == "")
		// {
		// 	$txtSenderid=0;
		// }
		
		// if ($optBranch == 0 || $txtBranch == "")
		// {
		// 	$txtBranch=0;
		// }
		
		$insert_id=$this->input->post('txtpackageid');
		
		$data=array('pkg_name'=>$txtPackagename,
					'pkg_smsCredit'=>$txtSmscredit,
					'pkg_smsPrice'=>$txtSmscreditprice,
					'pkg_emailCredit'=>$txtEmailcredit,
					'pkg_emailPrice'=>$txtEmailcreditprice,
					'pkg_validity'=>$txtValidity,
					'pkg_modifiedDate'=>$date,
					'pkg_modifiedBy'=>$admin_id);
		
		$this->db->where('pkg_id_pk',$insert_id);
		$this->db->update('tblmvbpackages',$data);
		
		$this->db->query("delete from tblmvbpackagetax where pkgt_pkgId_fk='" . $insert_id . "'");
		$this->db->query("delete from tblmvbpackageservice where pkgds_packId_fk='" . $insert_id . "'");
		$this->db->query("delete from tblmvbpackagedetails where pkgd_packId_fk='" . $insert_id . "'");
		
		$pckservice="";
		$pcktax="";
		
		for($i=0;$i < count($txtServicename);$i ++)
		{
			$data_package=array(
								'pkgds_packId_fk'=>$insert_id,
								'pkgds_service'=>$txtServicename[$i]);
			
			$this->db->insert('tblmvbpackageservice',$data_package);
			$pckservice=$pckservice . implode(",",$data_package);
		}
		
		for($i=0;$i < count($seltax);$i ++)
		{
			$a=explode("-",$seltax[$i]);
			
			$data_packages=array('pkgt_pkgId_fk'=>$insert_id,
								'pkgt_taxId_fk'=>$a[0],
								'pkgt_taxPercent'=>$a[1]);
			
			$this->db->insert('tblmvbpackagetax',$data_packages);
			
			$pcktax=$pcktax . implode(",",$data_packages);
		}
		
		$data_packageDetail=array(	'pkgd_packId_fk'=>$insert_id,
									'pkgd_smsTemplate'=>$txtSmstemplate,
									'pkgd_emailTemplate'=>$txtEmailtemplete,
									'pkgd_smsBulk'=>$txtSmsbulk,
									'pkgd_emailBulk'=>$txtEmailbulk,
									'pkgd_customFields'=>$txtCustomfields,
									'pkgd_visitorRecord'=>$txtVisitorrecord,
									'pkgd_documentSize'=>$txtDocsize,
									'pkgd_moRegstr'=>$txtMoregistration,
									'pkgd_userMgt'=>$txtUsers,
									'pkgd_senderId'=>$txtSenderid,
			         	            'pkgd_branch'=>$txtBranch,
									'pkgd_emailSupport'=>$optEmailsupport,
									'pkgd_techlSupport'=>$optTechsupport,
									'pkgd_scheduleReport'=>$optSchedule,
									'pkgd_mobileApp'=>$optMobileapp,
									'pkgd_addressLebeling'=>$optAddresslebeling,
									'pkgd_price'=>$txtPricing,
									'pkgd_discount'=>$txtDiscount,
									'pkgd_finalPrice'=>$txtFinalprice,
									'pkgds_tax'=>$txttaxPricing,
									'pkgd_dealerAmount'=>$txtDealerAmount,
									'pkgd_salerAmount'=>$txtSalerAmount,
									'pkgd_dealerPayMethod'=>$optDealerPayMethod,
									'pkgd_salerPayMethod'=>$optSalerPayMethod);
		
		$this->db->insert('tblmvbpackagedetails',$data_packageDetail);
		
		$pcknew=implode(",",$data);
		$pckdetails=implode(",",$data_packageDetail);
		
		$updatedData=" Update Package :-" . $pcknew . " Update PackageService :-" . $pckservice . " Update Packagetax :-" . $pcktax . " Update Packagedetails :-" . $pckdetails;
		
		setSAActivityLogs('Transaction_activity','SAPackage_edit',$updatedData);
		
		return $insert_id;
	
	}
	
	// --- Function used to change status of Package---//
	public function changepackageStatus($status,$package_id)
	{

		for($i=0;$i < count($package_id);$i ++)
		{
			
			$id=base64_decode($package_id[$i]);
			$data=array('pkg_status'=>$status);
			$this->db->where('pkg_id_pk',$id);
			
			$this->db->update('tblmvbpackages',$data);
		}
		return true;
	
	}
	
	// --Function used get all renewal package list---//
	public function getrenewalPackagedetails()
	{

		$result=$this->db->query("SELECT tblmvbrenewpackage.rpkg_id_pk,tblmvbrenewpackage.rpkg_packageType,tblmvbrenewpackage.rpkg_packageName,tblmvbrenewpackage.rpkg_smsCredit,
				                      tblmvbrenewpackage.rpkg_smsPrice,tblmvbrenewpackage.rpkg_emailCredit,tblmvbrenewpackage.rpkg_emailPrice,tblmvbrenewpackage.rpkg_validity,
				                      tblmvbrenewpackage.rpkg_tax,tblmvbrenewpackage.rpkg_total,tblmvbrenewpackage.rpkg_discount,tblmvbrenewpackage.rpkg_finalPrice,tblmvbrenewpackage.rpkg_status,
				                      GROUP_CONCAT(tblmvbtax.tax_id_pk) as tax_id ,GROUP_CONCAT(tblmvbtax.tax_name ) as tax_name,
	                                  GROUP_CONCAT(tblmvbtax.tax_percentValue) as taxpercent FROM `tblmvbrenewpackage` tblmvbrenewpackage LEFT JOIN tblmvbrenewpackagetax 
	                                  tblmvbrenewpackagetax on (tblmvbrenewpackage.rpkg_id_pk=tblmvbrenewpackagetax.rpkgt_rpackId_fk) LEFT JOIN tblmvbtax tblmvbtax
	                                  on(tblmvbrenewpackagetax.rpkgt_taxId_fk=tblmvbtax.tax_id_pk) GROUP BY tblmvbrenewpackage.rpkg_id_pk order by tblmvbrenewpackage.rpkg_id_pk DESC");
		
		return $result->result();
	
	}
	
	// --- Function used to add Package---//
	public function addRenewalpackage()
	{

		$selPackagetype=$this->input->post('selPackagetype');
		$txtPackagename=$this->input->post('txtPackagename');
		$txtSmscredit=$this->input->post('txtSmscredit');
		$txtSmsprice=$this->input->post('txtSmsprice');
		$txtEmail=$this->input->post('txtEmail');
		$txtEmailprice=$this->input->post('txtEmailprice');
		$txtValidity=$this->input->post('txtValidity');
		$seltax=$this->input->post('seltax');
		$taxPercent=$this->input->post('taxPercent');
		$txtPrice=$this->input->post('txtPrice');
		$txtDiscount=$this->input->post('txtDiscount');
		$txtFinalprice=$this->input->post('txtFinalprice');
		$txtTotaltax=$this->input->post('txtTotaltax');
		$optValidity=$this->input->post('optValidity');
		$optEmail=$this->input->post('optEmail');
		$optSms=$this->input->post('optSms');
		$txtDealerAmount=$this->input->post('txtDealerPayment');
		$txtSalerAmount=$this->input->post('txtSalerPayment');
		$optSalerPayMethod=$this->input->post('radioSaler');
		$optDealerPayMethod=$this->input->post('radioDealer');
		
		// if ($optSms == 0 && $txtSmscredit == "0")
		// {
		// 	$txtSmscredit=0;
		// }
		
		// if ($optEmail == 0 && $txtEmail == "0")
		// {
		// 	$txtEmail=0;
		// }
		
		// if ($optValidity == 0 && $txtValidity == "0")
		// {
		// 	$txtValidity=0;
		// }
		
		$admin_id=$this->session->userdata('admin_id');
		$date=date('Y-m-d h:i:s');
		
		$data=array('rpkg_packageType'=>$selPackagetype,
					'rpkg_packageName'=>$txtPackagename,
					'rpkg_smsCredit'=>$txtSmscredit,
					'rpkg_smsPrice'=>$txtSmsprice,
					'rpkg_emailCredit'=>$txtEmail,
					'rpkg_emailPrice'=>$txtEmailprice,
					'rpkg_createdDate'=>$date,
					'rpkg_createdBy'=>$admin_id,
					'rpkg_modifiedDate'=>$date,
					'rpkg_modifiedBy'=>$admin_id,
					'rpkg_validity'=>$txtValidity,
					'rpkg_tax'=>$txtTotaltax,
					'rpkg_total'=>$txtPrice,
					'rpkg_discount'=>$txtDiscount,
					'rpkg_finalPrice'=>$txtFinalprice,
					'rpkg_dealerAmount'=>$txtDealerAmount,
					'rpkg_salerAmount'=>$txtSalerAmount,
					'rpkg_dealerPayMethod'=>$optDealerPayMethod,
					'rpkg_salerPayMethod'=>$optSalerPayMethod,					
					'rpkg_status'=>'1');
		$this->db->insert('tblmvbrenewpackage',$data);
		$insert_id=$this->db->insert_id();
		
		$pcktax="";
		
		for($i=0;$i < count($seltax);$i ++)
		{
			$a=explode("-",$seltax[$i]);
			
			$data_packages=array('rpkgt_rpackId_fk'=>$insert_id,
								'rpkgt_taxId_fk'=>$a[0],
								'rpkgt_taxIdpercent'=>$a[1]);
			
			$this->db->insert('tblmvbrenewpackagetax',$data_packages);
			$pcktax=$pcktax . implode(",",$data_package);
		}
		
		$pcknew=implode(",",$data);
		
		$updatedData="  Add Package :-" . $pcknew . " Add  Packagetax :-" . $pcktax;
		
		setSAActivityLogs('Transaction_activity','SAPackagerenew_ADD',$updatedData);
		
		return $insert_id;
	
	}
	
	// --- Function used to change status of Package---//
	public function changepackagerenewStatus($status,$package_id)
	{

		for($i=0;$i < count($package_id);$i ++)
		{
			$id=base64_decode($package_id[$i]);
			$data=array(
						'rpkg_status'=>$status);
			$this->db->where('rpkg_id_pk',$id);
			
			$this->db->update('tblmvbrenewpackage',$data);
		}
		return true;
	
	}
	
	// --Function userd to get specific renewal package details--//
	public function getRenewalpackage($id)
	{

		$result=$this->db->query("Select rpkg_id_pk,rpkg_packageType,rpkg_packageName,rpkg_smsCredit,rpkg_smsPrice,rpkg_emailCredit,rpkg_emailPrice,rpkg_validity,
				                      rpkg_tax,rpkg_total,rpkg_discount,rpkg_finalPrice,rpkg_status,rpkg_dealerAmount,rpkg_salerAmount,rpkg_dealerPayMethod ,rpkg_salerPayMethod from tblmvbrenewpackage where rpkg_id_pk='" . $id . "'");
		return $result->result();
	
	}
	
	// --Function userd to get specific renewal package tax--//
	public function getRenwalpackagetax($id)
	{

		$result=$this->db->query("Select rpkgt_id_pk,rpkgt_rpackId_fk,rpkgt_taxId_fk,rpkgt_taxIdpercent from tblmvbrenewpackagetax where rpkgt_rpackId_fk='" . $id . "'");
		return $result->result();
	
	}
	
	// --- Function used to edit renewal Package---//
	public function editrenewalPackage()
	{

		$insert_id=$this->input->post('package_id');
		$selPackagetype=$this->input->post('selPackagetype');
		$txtPackagename=$this->input->post('txtPackagename');
		$txtSmscredit=$this->input->post('txtSmscredit');
		$txtSmsprice=$this->input->post('txtSmsprice');
		$txtEmail=$this->input->post('txtEmail');
		$txtEmailprice=$this->input->post('txtEmailprice');
		$txtValidity=$this->input->post('txtValidity');
		$seltax=$this->input->post('seltax');
		$taxPercent=$this->input->post('taxPercent');
		$txtPrice=$this->input->post('txtPrice');
		$txtDiscount=$this->input->post('txtDiscount');
		$txtFinalprice=$this->input->post('txtFinalprice');
		$txtTotaltax=$this->input->post('txtTotaltax');
		$optValidity=$this->input->post('optValidity');
		$optEmail=$this->input->post('optEmail');
		$optSms=$this->input->post('optSms');
		$txtDealerAmount=$this->input->post('txtDealerPayment');
		$txtSalerAmount=$this->input->post('txtSalerPayment');
		$optSalerPayMethod=$this->input->post('radioSaler');
		$optDealerPayMethod=$this->input->post('radioDealer');
		
		if ($optSms == 0 && $txtSmscredit == "0")
		{
			$txtSmscredit=0;
		}
		
		if ($optEmail == 0 && $txtEmail == "0")
		{
			$txtEmail=0;
		}
		
		if ($optValidity == 0 && $txtValidity == "0")
		{
			$txtValidity=0;
		}
		
		$admin_id=$this->session->userdata('admin_id');
		$date=date('Y-m-d h:i:s');
		
		$data=array(
					'rpkg_packageType'=>$selPackagetype,
					'rpkg_packageName'=>$txtPackagename,
					'rpkg_smsCredit'=>$txtSmscredit,
					'rpkg_smsPrice'=>$txtSmsprice,
					'rpkg_emailCredit'=>$txtEmail,
					'rpkg_emailPrice'=>$txtEmailprice,
					'rpkg_modifiedDate'=>$date,
					'rpkg_modifiedBy'=>$admin_id,
					'rpkg_validity'=>$txtValidity,
					'rpkg_tax'=>$txtTotaltax,
					'rpkg_total'=>$txtPrice,
					'rpkg_discount'=>$txtDiscount,
					'rpkg_finalPrice'=>$txtFinalprice,
					'rpkg_dealerAmount'=>$txtDealerAmount,
					'rpkg_salerAmount'=>$txtSalerAmount,
					'rpkg_dealerPayMethod'=>$optDealerPayMethod,
					'rpkg_salerPayMethod'=>$optSalerPayMethod);
		
		$this->db->where('rpkg_id_pk',$insert_id);
		$this->db->update('tblmvbrenewpackage',$data);
		
		$this->db->query("delete from tblmvbrenewpackagetax where rpkgt_rpackId_fk='" . $insert_id . "'");
		$pcktax="";
		for($i=0;$i < count($seltax);$i ++)
		{
			$a=explode("-",$seltax[$i]);
			
			$data_packages=array(
								'rpkgt_rpackId_fk'=>$insert_id,
								'rpkgt_taxId_fk'=>$a[0],
								'rpkgt_taxIdpercent'=>$a[1]);
			
			$this->db->insert('tblmvbrenewpackagetax',$data_packages);
			$pcktax=$pcktax . implode(",",$data_package);
		}
		
		$pcknew=implode(",",$data);
		
		$updatedData="  Edit Package :-" . $pcknew . " Edit  Packagetax :-" . $pcktax;
		
		setSAActivityLogs('Transaction_activity','SAPackagerenew_Edit',$updatedData);
		return $insert_id;
	
	}

}
