<?php

class Client_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}
	//--- this function is for saving data of new client-----//
	public function addClient()
	{
		$txtCheque=$this->input->post('txtCheque');
		$selTitle=$this->input->post('selTitle');
		$txtFirstname=$this->input->post('txtFirstname');
		$txtMiddlename=$this->input->post('txtMiddlename');
		$txtLastname=$this->input->post('txtLastname');
		$mob=$this->input->post('txtMobilenumber');
		$txtMobilenumber=$this->encryption->encrypt($mob);
		$txtPassword=$this->encryption->encrypt(123456);
		$email=$this->input->post('txtEmail');
		$txtEmail=$this->encryption->encrypt($email);
		$txtAddress=$this->input->post('txtAddress');
		$selCountry=$this->input->post('selCountry');
		$selState=$this->input->post('selState');
		$selCity=$this->input->post('selCity');
		$txtZip=$this->input->post('txtZip');
		$txtWebsite=$this->input->post('txtWebsite');
		$txtLandline=$this->input->post('txtLandline');
		$txtFax=$this->input->post('txtFax');
		$selBusiness=$this->input->post('selBusiness');
		$txtBusinessname=$this->input->post('txtBusinessname');
		$txtBirtdate=date("Y-m-d",strtotime($this->input->post('txtBirtdate')));
		$txtAnniversary=date("Y-m-d",strtotime($this->input->post('txtAnniversary')));
		$txtInfo=$this->input->post('txtInfo');
		$txtaddInfo=$this->input->post('txtaddInfo');
		$txtPvalue=$this->input->post('txtPvalue');
		$adminId=$this->input->post('selTeam');
		$selPackageid=$this->input->post('selPackage');
		$selPtype=$this->input->post('selPtype');
		$selPmode=$this->input->post('selPmode');
		$branchId=0;
		$usertypeId=1;
		$date=date('Y-m-d h:i:s');
		
		//----used query to get all package details---//
		$res=$this->db->query("SELECT tblmvbpackages.*,tblmvbpackagedetails.* FROM tblmvbpackages LEFT JOIN tblmvbpackagedetails on 
							   tblmvbpackages.pkg_id_pk=tblmvbpackagedetails.pkgd_packId_fk WHERE tblmvbpackages.pkg_id_pk='" . $selPackageid . "'");
		$result=$res->result();
		
	
		$effectiveDate=date('Y-m-d');
		$expiry = date('Y-m-d', strtotime('+'.$result[0]->pkg_validity.'month', strtotime($effectiveDate)));
		
		// entries for client table
		$data=array('clnt_name'=>$txtFirstname,
					'clnt_mobile'=>$txtMobilenumber,
					'clnt_email'=>$txtEmail,
					'clnt_countryId_fk'=>$selCountry,
				    'clnt_password'=>$txtPassword,
					'clnt_stateId_fk'=>$selState,
					'clnt_cityId_fk'=>$selCity,
					'clnt_address'=>$txtAddress,
					'clnt_packageId_fk'=>$selPackageid,
					'clnt_totalSmsCredit'=>$result[0]->pkg_smsCredit,
					'clnt_totalEmailCredit'=>$result[0]->pkg_emailCredit,
					'clnt_validity'=>$result[0]->pkg_validity,
				    'clnt_expiryDate'=>$expiry,
					'clnt_createdDate'=>$date,
					'clnt_createdBy'=>$adminId,
					'clnt_modifiedDate'=>$date,
					'clnt_modifiedBy'=>$adminId,
					'clnt_status'=>1);
		$this->db->insert('tblmvbclients',$data);
		
		$clientId=$this->db->insert_id();
		
		$dataorder=array('ord_purchaseDate'=>$date,
						 'ord_price'=>$result[0]->pkgd_finalPrice,
						 'ord_couponId_fk'=>"0",
						 'ord_couponValue'=>"0",
						 'ord_createdBy'=>$adminId,
						 'ord_createdDate'=>$date,
						 'ord_clntId_fk'=>$clientId,
						 'ord_packageId_fk'=>$selPackageid,
						 'ord_packageType'=>"new",
						 'ord_discountPrice'=>$result[0]->pkgd_finalPrice,
						 'ord_paymentMode'=>$selPmode,
						 'ord_paymentType'=>$selPtype,
						 'ord_paymentNote'=>$txtCheque);
		$this->db->insert('tblmvborders',$dataorder);
		
		
		$order_id=$this->db->insert_id();
		$price=$result[0]->pkgd_finalPrice;
		if($selPtype=="partial")
		{
			$price=$txtPvalue;
		}
		
		$dataorder=array('op_order_id'=>$order_id,
						 'op_payment_mode'=>$selPmode,
						 'op_payment_value'=>$price,
						 'op_note'=>$txtCheque,
						 'op_date'=>$date,
						 'op_createdBy'=>$adminId);
		$this->db->insert('tblmvborderpayments',$dataorder);
		
	

 
		$datapackage=array('clntp_packId_fk'=>$selPackageid,
						   'clntp_clntId_fk'=>$clientId,
						   'clntp_startDate'=>date("Y-m-d"),
						   'clntp_endDate'=>$expiry,
				           'clntp_orderId_fk'=>$order_id,
				           'clntp_smsCredit'=>$result[0]->pkg_smsCredit,
						   'clntp_emailCredit'=>$result[0]->pkg_emailCredit,
						   'clntp_smsPrice'=>$result[0]->pkg_smsPrice,
						   'clntp_emailPrice'=>$result[0]->pkg_emailPrice,
						   'clntp_validity'=>$result[0]->pkg_validity,
						   'clntp_smsTemplate'=>$result[0]->pkgd_smsTemplate,
						   'clntp_emailTemplate'=>$result[0]->pkgd_emailTemplate,
						   'clntp_smsBulk'=>$result[0]->pkgd_smsBulk,
						   'clntp_emailBulk'=>$result[0]->pkgd_emailBulk,
						   'clntp_customFields'=>$result[0]->pkgd_customFields,
						   'clntp_visitorRecord'=>$result[0]->pkgd_visitorRecord,
						   'clntp_documentSize'=>$result[0]->pkgd_documentSize,
						   'clntp_moRegstr'=>$result[0]->pkgd_moRegstr,
				           'clntp_branch'=>$result[0]->pkgd_branch,
						   'clntp_userMgt'=>$result[0]->pkgd_userMgt,
						   'clntp_senderId'=>$result[0]->pkgd_senderId,
						   'clntp_emailSupport'=>$result[0]->pkgd_emailSupport,
						   'clntp_techlSupport'=>$result[0]->pkgd_techlSupport,
						   'clntp_scheduleReport'=>$result[0]->pkgd_scheduleReport,
						   'clntp_mobileApp'=>$result[0]->pkgd_mobileApp,
						   'clntp_addressLebeling'=>$result[0]->pkgd_addressLebeling,
						   'clntp_price'=>$result[0]->pkgd_price,
						   'clntp_discount'=>$result[0]->pkgd_discount,
						   'clntp_tax'=>$result[0]->pkgds_tax,
						   'clntp_dealerAmount'=>$result[0]->pkgd_dealerAmount,
						   'clntp_salerAmount'=>$result[0]->pkgd_salerAmount,
					       'clntp_dealerPayMethod'=>$result[0]->pkgd_dealerPayMethod,
						   'clntp_salerPayMethod'=>$result[0]->pkgd_salerPayMethod,
						   'clntp_finalPrice'=>$result[0]->pkgd_finalPrice,
						   'clntp_createdDate'=>$date,
					       'clntp_createdBy'=>$adminId
				           );
		$this->db->insert('tblmvbclientpackage',$datapackage);
		
	
		// using above Client id and package Details we have to insert values in order table
		
		$file_name="";
		if (isset($_FILES["txtFile"]["name"]))
		{
			
			$file_name=time() . $_FILES["txtFile"]["name"];
			move_uploaded_file($_FILES["txtFile"]["tmp_name"],"./uploads/systemusers_images/" . $file_name);
		}
		
		$data2=array('sysu_branchId_fk'=>$branchId,
					 'sysu_userTypeId_fk'=>$usertypeId,
					 'sysu_parentClient'=>1,
					 'sysu_clientId_fk'=>$clientId,
					 'sysu_name'=>$txtFirstname,
					 'sysu_mname'=>$txtMiddlename,
					 'sysu_lname'=>$txtLastname,
					 'sysu_title'=>$selTitle,
				     'sysu_password'=>$txtPassword,
					 'sysu_mobile'=>$txtMobilenumber,
					 'sysu_email'=>$txtEmail,
					 'sysu_countryId_fk'=>$selCountry,
					 'sysu_stateId_fk'=>$selState,
					 'sysu_cityId'=>$selCity,
					 'sysu_address'=>$txtAddress,
					 'sysu_zipcode'=>$txtZip,
					 'sysu_website'=>$txtWebsite,
					 'sysu_landline_no'=>$txtLandline,
					 'sysu_fax'=>$txtFax,
					 'sysu_bussiness_name'=>$txtBusinessname,
					 'sysu_bussiness_category'=>$selBusiness,
					 'sysu_date_of_birth'=>$txtBirtdate,
					 'sysu_aniversary_date'=>$txtAnniversary,
					 'sysu_Info'=>$txtInfo,
					 'sysu_addInfo'=>$txtaddInfo,
					 'sysu_profile'=>$file_name,
					 'sysu_createdDate'=>$date,
					 'sysu_createdBy'=>$adminId,
					 'sysu_modifiedDate'=>$date,
					 'sysu_modifiedBy'=>$adminId,
					 'sysu_status'=>1);
		$this->db->insert('tblmvbsystemusers',$data2);
		
		$insert_id=$this->db->insert_id();
		$message='';
		$subject="Welcome To My Visitor Book";
		$message.="Dear " . $txtFirstname. ",<br><br>";
		$message.="Your Login Information is as follow:<br>";
		$message.="User Name: " . $email . "<br>";
		$message.="Password:123456<br>";
		$message.="Thanks <br> For additional Information You can contact us.";
		$toEmail=$email;
		$this->sendEmail($toEmail,$subject,$message);
		
		setSAActivityLogs('Transaction_activity','SAAddclient',"clientId:-".$clientId);
		return $clientId;
	
	}
	
	
	// function to get Sales team
	public function getSalesTeam()
	{
		$result=$this->db->query("SELECT `sysmu_id_pk`, `sysmu_userTypeId_fk`, `sysmu_username` FROM `tblmvbsysmainusers` WHERE sysmu_userTypeId_fk='4'
			                      AND sysmu_status='1'");
		return $result->result();
	
	}
    
	//--get Package Details--//
	public function getPackage()
	{
		$result=$this->db->query("select * from tblmvbpackages where pkg_status=1");
		return $result->result();
	
	}
	
	// this function to edit client
	public function editClient()
	{
		$selTitle=$this->input->post('selTitle');
		$txtFirstname=$this->input->post('txtFirstname');
		$txtMiddlename=$this->input->post('txtMiddlename');
		$txtLastname=$this->input->post('txtLastname');
		$insert_id=$this->input->post('txtId');
		$client_id=$this->input->post('client_id');
		$mob=$this->input->post('txtMobilenumber');
		$txtMobilenumber=$this->encryption->encrypt($mob);
		$email=$this->input->post('txtEmail');
		$txtEmail=$this->encryption->encrypt($email);
		$txtAddress=$this->input->post('txtAddress');
		$selCountry=$this->input->post('selCountry');
		$selState=$this->input->post('selState');
		$selCity=$this->input->post('selCity');
		$txtZip=$this->input->post('txtZip');
		$txtWebsite=$this->input->post('txtWebsite');
		$txtLandline=$this->input->post('txtLandline');
		$txtFax=$this->input->post('txtFax');
		$txtProfile=$this->input->post('txtProfile');
		$selBusiness=$this->input->post('selBusiness');
		$txtBusinessname=$this->input->post('txtBusinessname');
		$txtBirtdate=date("Y-m-d",strtotime($this->input->post('txtBirtdate')));
		$txtAnniversary=date("Y-m-d",strtotime($this->input->post('txtAnniversary')));
		$txtInfo=$this->input->post('txtInfo');
		$txtaddInfo=$this->input->post('txtaddInfo');
		
		$adminId=$this->session->userdata('admin_id');
		$branchId=0;
		$usertypeId=1;
		$date=date('Y-m-d h:i:s');
		
		$file_name="";
		if (isset($_FILES["txtFile"]["name"]))
		{
			
			$file_name=time() . $_FILES["txtFile"]["name"];
			move_uploaded_file($_FILES["txtFile"]["tmp_name"],"./uploads/systemusers_image/" . $file_name);
		}
		if ($_FILES["txtFile"]["tmp_name"] == "")
		{
			$file_name=$txtProfile;
		}
		 $arr=array('clnt_name'=>$txtFirstname,
					'clnt_mobile'=>$txtMobilenumber,
					'clnt_email'=>$txtEmail,
					'clnt_countryId_fk'=>$selCountry,
					'clnt_stateId_fk'=>$selState,
					'clnt_cityId_fk'=>$selCity,
					'clnt_address'=>$txtAddress,
					'clnt_modifiedDate'=>$date,
					'clnt_modifiedBy'=>$adminId);
		$this->db->where('clnt_id_pk',$client_id);
		$this->db->update('tblmvbclients',$arr);
		
		$data=array('sysu_name'=>$txtFirstname,
					'sysu_mname'=>$txtMiddlename,
					'sysu_lname'=>$txtLastname,
					'sysu_title'=>$selTitle,
					'sysu_mobile'=>$txtMobilenumber,
					'sysu_email'=>$txtEmail,
					'sysu_countryId_fk'=>$selCountry,
					'sysu_stateId_fk'=>$selState,
					'sysu_cityId'=>$selCity,
					'sysu_address'=>$txtAddress,
					'sysu_zipcode'=>$txtZip,
					'sysu_website'=>$txtWebsite,
					'sysu_landline_no'=>$txtLandline,
					'sysu_fax'=>$txtFax,
					'sysu_bussiness_name'=>$txtBusinessname,
					'sysu_bussiness_category'=>$selBusiness,
					'sysu_date_of_birth'=>$txtBirtdate,
					'sysu_aniversary_date'=>$txtAnniversary,
					'sysu_Info'=>$txtInfo,
					'sysu_addInfo'=>$txtaddInfo,
					'sysu_profile'=>$file_name,
					'sysu_modifiedDate'=>$date,
					'sysu_modifiedBy'=>$adminId);
		$this->db->where('sysu_clientId_fk',$insert_id);
		$this->db->update('tblmvbsystemusers',$data);
		
		setSAActivityLogs('Transaction_activity','SAAEditclient',"clientId:-".$client_id."by:-".$adminId);
		
		return true;
	
	}
	
	
	// function to get Order Details
	public function getOrderDetails($id)
	{
		$result=$this->db->query("SELECT ord_id_pk,ord_packageId_fk,ord_createdBy,ord_discountPrice,ord_paymentMode,ord_purchaseDate,ord_packageType,
			                      pkg_name,rpkg_packageName,ord_price,ord_couponValue,ord_paymentType FROM tblmvborders LEFT JOIN tblmvbpackages ON
			                      tblmvborders.ord_packageId_fk=tblmvbpackages.pkg_id_pk LEFT JOIN tblmvbrenewpackage ON
			                      tblmvborders.ord_packageId_fk=tblmvbrenewpackage.rpkg_id_pk WHERE ord_clntId_fk='" . $id . "' order by ord_id_pk;");
		$res=$result->result();
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

	public function getRenewalPackageDetails()
	{
		$result=$this->db->query("select rpkg_id_pk,rpkg_packageName,rpkg_status from tblmvbrenewpackage");
		$res=$result->result();
		if (count($res) > 0)
		{
			return $result->result();
		} else
		{
			return array();
		}
	
	}

	public function getAllPackageDetails()
	{
		$result=$this->db->query("select pkg_id_pk,pkg_name,pkg_status from tblmvbpackages");
		$res=$result->result();
		if (count($res) > 0)
		{
			return $result->result();
		} else
		{
			return array();
		}
	
	}

	//---function used to get client Details----//
	public function getClient($id)
	{
		$result=$this->db->query("SELECT `clnt_id_pk`, `clnt_name`, `clnt_mobile`, `clnt_email`, `clnt_password`, `clnt_countryId_fk`, `clnt_stateId_fk`, `clnt_cityId_fk`,
			                      `clnt_address`, `clnt_packageId_fk`, `clnt_totalSmsCredit`, `clnt_totalEmailCredit`, `clnt_validity`, `clnt_expiryDate`,`clnt_createdDate`,
			                      `clnt_createdBy`, `clnt_modifiedDate`, `clnt_modifiedBy`, `clnt_status` FROM `tblmvbclients` WHERE clnt_id_pk='".$id."'");
		
		return $result->result();
		
	}
	
	
	
	//---Function used to add order placed---//
	public function addNewOrder()
	{
		$id=$this->input->post("clientidforpackages");
		
		$clientDetails=$this->getClient($id);
		
		$paymentvalue=$this->input->post("txtPaymentValue");
		$txtPaymentNote=$this->input->post("txtPaymentNote");
		$paymenttype=$this->input->post("selPaymentType");
		$paymentmode=$this->input->post("selPaymentMode");
		$packagename=$this->input->post("selPackageName");
		$packagetype=$this->input->post("selPackageType");
		$adminId=$this->session->userdata('admin_id');
		$date=date('Y-m-d h:i:s');
		
		
		
		$finalprice=0;
		if($packagetype=="New")
		{
			
			$res=$this->db->query("SELECT tblmvbpackages.*,tblmvbpackagedetails.* FROM tblmvbpackages LEFT JOIN tblmvbpackagedetails on
							      tblmvbpackages.pkg_id_pk=tblmvbpackagedetails.pkgd_packId_fk WHERE tblmvbpackages.pkg_id_pk='" . $selPackageid . "'");
			$result=$res->result();
			$finalprice=$result[0]->pkgd_finalPrice;
		}
		else 
		{
			$resultr=$this->db->query("select rpkg_id_pk,rpkg_finalPrice from tblmvbrenewpackage where rpkg_id_pk='".$packagename."'");
			$resr=$resultr->result();
			$finalprice=$resr[0]->rpkg_finalPrice;
			
		}
		
		if($packagetype='full')
		{
			$paymentvalue=$finalprice;
		}
		$data=array('ord_purchaseDate'=>$date,
					'ord_price'=>$finalprice,
					'ord_couponId_fk'=>"0",
					'ord_couponValue'=>"0",
					'ord_createdBy'=>$adminId,
					'ord_createdDate'=>$date,
					'ord_clntId_fk'=>$id,
					'ord_packageId_fk'=>$packagename,
					'ord_packageType'=>$packagetype,
					'ord_discountPrice'=>$finalprice,
					'ord_paymentMode'=>$paymentmode,
					'ord_paymentType'=>$paymenttype,
					'ord_paymentNote'=>$txtPaymentNote);
		$this->db->insert("tblmvborders",$data);
		$orderId=$this->db->insert_id();
		
		$dataorder=array('op_order_id'=>$orderId,
						 'op_payment_mode'=>$paymentmode,
						 'op_payment_value'=>$paymentvalue,
						 'op_note'=>$txtPaymentNote,
						 'op_date'=>$date,
						 'op_createdBy'=>$adminId);
		$this->db->insert('tblmvborderpayments',$dataorder);
		
		
		
		if($packagetype=="New")
		{
			
			 $res=$this->db->query("SELECT tblmvbpackages.*,tblmvbpackagedetails.* FROM tblmvbpackages LEFT JOIN tblmvbpackagedetails on
								   tblmvbpackages.pkg_id_pk=tblmvbpackagedetails.pkgd_packId_fk WHERE tblmvbpackages.pkg_id_pk='" . $packagename . "'");
			 $result=$res->result();
				
			 $expiry =date('Y-m-d', strtotime('+'.$result[0]->pkg_validity.' month', $clientDetails[0]->clnt_expiryDate));
				
			 $datapackage=array('clntp_packId_fk'=>$packagename,
								'clntp_clntId_fk'=>$id,
								'clntp_startDate'=>date("Y-m-d"),
								'clntp_endDate'=>$expiry,
			 					'clntp_orderId_fk'=>$orderId,
								'clntp_smsCredit'=>$result[0]->pkg_smsCredit,
								'clntp_emailCredit'=>$result[0]->pkg_emailCredit,
								'clntp_smsPrice'=>$result[0]->pkg_smsPrice,
								'clntp_emailPrice'=>$result[0]->pkg_emailPrice,
								'clntp_validity'=>$result[0]->pkg_validity,
								'clntp_smsTemplate'=>$result[0]->pkgd_smsTemplate,
								'clntp_emailTemplate'=>$result[0]->pkgd_emailTemplate,
								'clntp_smsBulk'=>$result[0]->pkgd_smsBulk,
								'clntp_emailBulk'=>$result[0]->pkgd_emailBulk,
								'clntp_customFields'=>$result[0]->pkgd_customFields,
								'clntp_visitorRecord'=>$result[0]->pkgd_visitorRecord,
								'clntp_documentSize'=>$result[0]->pkgd_documentSize,
								'clntp_moRegstr'=>$result[0]->pkgd_moRegstr,
			 		            'clntp_branch'=>$result[0]->pkgd_branch,
								'clntp_userMgt'=>$result[0]->pkgd_userMgt,
								'clntp_senderId'=>$result[0]->pkgd_senderId,
								'clntp_emailSupport'=>$result[0]->pkgd_emailSupport,
								'clntp_techlSupport'=>$result[0]->pkgd_techlSupport,
								'clntp_scheduleReport'=>$result[0]->pkgd_scheduleReport,
								'clntp_mobileApp'=>$result[0]->pkgd_mobileApp,
								'clntp_addressLebeling'=>$result[0]->pkgd_addressLebeling,
								'clntp_price'=>$result[0]->pkgd_price,
								'clntp_discount'=>$result[0]->pkgd_discount,
								'clntp_tax'=>$result[0]->pkgds_tax,
								'clntp_dealerAmount'=>$result[0]->pkgd_dealerAmount,
								'clntp_salerAmount'=>$result[0]->pkgd_salerAmount,
								'clntp_dealerPayMethod'=>$result[0]->pkgd_dealerPayMethod,
								'clntp_salerPayMethod'=>$result[0]->pkgd_salerPayMethod,
								'clntp_finalPrice'=>$result[0]->pkgd_finalPrice,
								'clntp_createdDate'=>$date,
								'clntp_createdBy'=>$adminId
								);
			$this->db->insert('tblmvbclientpackage',$datapackage);
			
		
			$this->db->query("update tblmvbclients set clnt_expiryDate='".$expiry."',clnt_validity='".$result[0]->pkg_validity."',
				              clnt_totalSmsCredit=clnt_totalSmsCredit+'".$result[0]->pkg_smsCredit."', 
				              clnt_totalEmailCredit=clnt_totalEmailCredit+'".$result[0]->pkg_emailCredit."' 
				              where clnt_id_pk='".$id."'"); 
			
			
		}	
		else 
		{
			
			$res=$this->db->query("SELECT `rpkg_id_pk`, `rpkg_packageType`, `rpkg_packageName`, `rpkg_smsCredit`, `rpkg_smsPrice`, `rpkg_emailCredit`, `rpkg_emailPrice`, 
				                  `rpkg_validity`, `rpkg_tax`, `rpkg_total`, `rpkg_discount`, `rpkg_finalPrice`, `rpkg_dealerAmount`, `rpkg_salerAmount`,
				                  `rpkg_dealerPayMethod`, `rpkg_salerPayMetnod` FROM `tblmvbrenewpackage` WHERE rpkg_id_pk='" . $packagename . "'");
			$result=$res->result();
			
			$expiry =date('Y-m-d', strtotime('+'.$result[0]->rpkg_validity.' month', $clientDetails[0]->clnt_expiryDate));
					
			 $datapackage=array('cpr_ordId_fk'=>$orderId,
								'cpr_renewId_fk'=>$packagename,
								'cpr_smsCredit'=>$result[0]->rpkg_smsCredit,
								'cpr_smsPrice'=>$result[0]->rpkg_smsPrice,
								'cpr_emailCredit'=>$result[0]->rpkg_emailCredit,
								'cpr_emailPrice'=>$result[0]->rpkg_emailPrice,
								'cpr_validity'=>$result[0]->rpkg_validity,
								'cpr_tax'=>$result[0]->rpkg_tax,
								'cpr_total'=>$result[0]->rpkg_total,
								'cpr_discount'=>$result[0]->rpkg_discount,
								'cpr_finalPrice'=>$result[0]->rpkg_finalPrice,
								'cpr_dealerAmount'=>$result[0]->rpkg_dealerAmount,
								'cpr_salerAmount'=>$result[0]->rpkg_salerAmount,
								'cpr_dealerPayMethod'=>$result[0]->rpkg_dealerPayMethod,
								'cpr_salerPayMetnod'=>$result[0]->rpkg_salerPayMetnod,
			 		            'cpr_createdBy'=>$adminId,
			 		            'cpr_createdDate'=>$date 
								);
			$this->db->insert('tblmvbclientrenewpackage',$datapackage);
				
			
			$this->db->query("update tblmvbclients set clnt_expiryDate='".$expiry."',
				              clnt_totalSmsCredit=clnt_totalSmsCredit+'".$result[0]->pkg_smsCredit."',
				              clnt_totalEmailCredit=clnt_totalEmailCredit+'".$result[0]->pkg_emailCredit."'
				              where clnt_id_pk='".$id."'");
			
		
		}	
		
		setSAActivityLogs('Transaction_activity','SAOrderclient',"clientId:-".$id."Order:-".$orderId);
		
		return $id;
	
	}

	//---function used to get client details--//
	public function getClientdetails($id)
	{
		$result=$this->db->query("SELECT * FROM tblmvbsystemusers WHERE sysu_clientId_fk='" . $id . "' and sysu_parentClient='1'");
		$res=$result->result();
		if (count($res) > 0)
		{
			return $result->result();
		} else
		{
			return array();
		}
	
	}

	//--function used to get all clients--//
	public function getAllClients()
	{
		$result=$this->db->query("select clnt_id_pk,clnt_name,clnt_email,clnt_mobile,clnt_address,sysmu_username from tblmvbclients
			                      LEFT JOIN tblmvbsysmainusers on tblmvbclients.clnt_createdBy=tblmvbsysmainusers.sysmu_id_pk where 
			                      clnt_status=1");
		$res=$result->result();
		if (count($res) > 0)
		{
			return $res;
		} else
		{
			return array();
		}
	
	}

	//---function used to get Country List---//
	Public function getCountrylist()
	{
		$result=$this->db->query("select cntr_id_pk,cntr_name,cntr_status from tblmvbcountry ");
		return $result->result();
	
	}
	
	// --Function used to get State--//
	Public function getStatelist($id)
	{
		$result=$this->db->query("select stat_id_pk,stat_name,stat_status from tblmvbstate  WHERE stat_countryId_fk='" . $id . "'");
		return $result->result();
	
	}
	
	// --Function used to get State--//
	Public function getCitylist($id)
	{
		$result=$this->db->query("select cty_id_pk,cty_name,cty_status,cty_stateId_fk,cty_countryId_fk from tblmvbcity  WHERE cty_stateId_fk='" . $id . "'");
		return $result->result();
	
	}

	//--function to send email--//
	public function sendEmail($toEmail,$subject,$message)
	{
		$this->email->from('info@myvisitorbook.in','MyVisitorBook');
		$this->email->to($toEmail);
		$this->load->library('email');
		$this->email->set_mailtype("html");
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();
	    return true;
	}

	
	//-----Function Used To check mail is present or not---//
	public function checkEmail($email)
	{
		$result=$this->db->query("select sysu_email from tblmvbsystemusers");
		$row=$result->result();
	
		for($i=0;$i < count($row);$i ++)
		{
			$emaildb=$this->encryption->decrypt($row[$i]->sysu_email);
			if ($emaildb == $email)
			{
				return 0;
			}
		}
		return 1;
	
	}


	public function getCommnMgt($client_id,$msg_type,$filter_date)
	{
			if($filter_date!="")
			{
					$condition="osl_client_id_fk='".$client_id."' and osl_sent_schedule_date='".$filter_date."' and osl_msg_type='".$msg_type."'";			
			}
			else
			{
					$condition="osl_client_id_fk='".$client_id."' and osl_msg_type='".$msg_type."'";
			}

			$result_commn_mgt=$this->db->query("select * from tblmvbordersendlogs where $condition");
			$row_commn_mgt=$result_commn_mgt->result();

			return $row_commn_mgt;			
	}

	public function getClientMobileno($client_id)
	{
			$result_client_mobno=$this->db->query("select clnt_mobile from tblmvbclients where clnt_id_pk='".$client_id."'");
			$row_client_mobno=$result_client_mobno->result();

			return $row_client_mobno[0]->clnt_mobile;
	}
}
