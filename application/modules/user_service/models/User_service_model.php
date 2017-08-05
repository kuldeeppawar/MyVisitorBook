<?php

class User_service_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	
	}

	public function checkMobileNumber($mobile_number)
	{
		$result=$this->db->query("select sysu_mobile from tblmvbsystemusers");
		$row=$result->result();
		
		for($i=0;$i < count($row);$i ++)
		{
			$mobile=$this->encryption->decrypt($row[$i]->sysu_mobile);
			if ($mobile_number == $mobile)
			{
				return 0;
			}
		}
		return 1;
	
	}

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

	public function addClient($data)
	{
		$Mobilenumber=$this->encryption->encrypt($data['mobile_number']);
		$Email=$this->encryption->encrypt($data['email_id']);
		$Password=$this->encryption->encrypt($data['password']);
		$usertypeId=1;
		$adminId=$data['adminid'];
		$branchId=1;
		$date=date('Y-m-d h:i:s');
		$res=$this->db->query("SELECT tblmvbpackages.*,tblmvbpackagedetails.* FROM tblmvbpackages LEFT JOIN tblmvbpackagedetails on
							   tblmvbpackages.pkg_id_pk=tblmvbpackagedetails.pkgd_packId_fk WHERE tblmvbpackages.pkg_id_pk='" . $data['package_id'] . "'");
		$result=$res->result();
		
		$expiry =date('Y-m-d', strtotime('+'.$result[0]->pkg_validity.' month', date('Y-m-d')));
		
		// entries for client table
		$data1=array('clnt_name'=>$data['fname'],
					 'clnt_mobile'=>$Mobilenumber,
					 'clnt_email'=>$Email,
					 'clnt_password'=>$Password,
					 'clnt_countryId_fk'=>$data['countryid'],
					 'clnt_stateId_fk'=>$data['stateid'],
					 'clnt_cityId_fk'=>$data['cityid'],
					 'clnt_address'=>$data['address'],
					 'clnt_packageId_fk'=>$data['package_id'],
					 'clnt_totalSmsCredit'=>$result[0]->pkg_smsCredit,
					 'clnt_totalEmailCredit'=>$result[0]->pkg_emailCredit,
					 'clnt_validity'=>$result[0]->pkg_validity,
				     'clnt_expiryDate'=>$expiry,
					 'clnt_createdDate'=>$date,
					 'clnt_createdBy'=>$adminId,
					 'clnt_modifiedDate'=>$date,
					 'clnt_modifiedBy'=>$adminId,
					 'clnt_status'=>1);
		$this->db->insert('tblmvbclients',$data1);
		
		$clientId=$this->db->insert_id();
		
	
 	   $data2=array('sysu_branchId_fk'=>$branchId,
					'sysu_userTypeId_fk'=>$usertypeId,
					'sysu_parentClient'=>'1',
					'sysu_clientId_fk'=>$clientId,
					'sysu_name'=>$data['fname'],
					'sysu_mname'=>$data['mname'],
					'sysu_lname'=>$data['lname'],
					'sysu_title'=>$data['title'],
					'sysu_mobile'=>$Mobilenumber,
					'sysu_email'=>$Email,
					'sysu_password'=>$Password,
					'sysu_countryId_fk'=>$data['countryid'],
					'sysu_stateId_fk'=>$data['stateid'],
					'sysu_cityId'=>$data['cityid'],
					'sysu_address'=>$data['address'],
					'sysu_zipcode'=>$data['zipcode'],
					'sysu_website'=>$data['website'],
					'sysu_landline_no'=>$data['lno'],
					'sysu_fax'=>$data['fax'],
					'sysu_bussiness_name'=>$data['bname'],
					'sysu_bussiness_category'=>$data['bcategory'],
					'sysu_date_of_birth'=>$data['dob'],
					'sysu_aniversary_date'=>$data['anidate'],
					'sysu_Info'=>$data['odetails'],
					'sysu_addInfo'=>$data['addInfo'],
					'sysu_profile'=>$data['profile'],
					'sysu_createdDate'=>$date,
					'sysu_createdBy'=>$adminId,
					'sysu_modifiedDate'=>$date,
					'sysu_modifiedBy'=>$adminId,
					'sysu_status'=>1);
		$this->db->insert('tblmvbsystemusers',$data2);
		
	   $dataorder=array('ord_purchaseDate'=>$date,
						'ord_price'=>$data['payment_value'],
						'ord_couponId_fk'=>$data['coupon_id'],
						'ord_couponValue'=>$data['coupon_value'],
						'ord_createdBy'=>$adminId,
						'ord_createdDate'=>$date,
						'ord_clntId_fk'=>$clientId,
						'ord_packageId_fk'=>$data['package_id'],
						'ord_packageType'=>"New",
						'ord_discountPrice'=>$data['payment_value'],
						'ord_paymentMode'=>$data['payment_mode'],
						'ord_paymentType'=>$data['payment_type'],
						'ord_paymentNote'=>$data['payment_note']);
		$this->db->insert('tblmvborders',$dataorder);
		$id=$this->db->insert_id();
		
		
		$dataorder=array('op_order_id'=>$id,
						 'op_payment_mode'=>$data['payment_mode'],
						 'op_payment_value'=>$data['payment_value'],
						 'op_note'=>$data['payment_note'],
						 'op_date'=>$date,
						 'op_createdBy'=>0);
		$this->db->insert('tblmvborderpayments',$dataorder);
		
		
		
		
		 $datapackage=array('clntp_packId_fk'=>$data['package_id'],
							'clntp_clntId_fk'=>$clientId,
							'clntp_startDate'=>date("Y-m-d"),
							'clntp_endDate'=>$expiry,
							'clntp_orderId_fk'=>$id,
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
							'clntp_createdBy'=>0
								);
		$this->db->insert('tblmvbclientpackage',$datapackage);
		
		
		// code to send mail
		$subject="Registration Successfull";
		$message.="Dear " . $data['fname'] . ",<br><br>";
		$message.="Your Login Information is as follow:<br>";
		$message.="User Name: " . $data['email_id'] . "<br>";
		$message.="Password: " . $data['password'] . "<br>";
		$message.="Order Id: " . $id . "<br>";
		$message.="Thanks <br> For additional Information You can contact us.";
		$toEmail=$data['email_id'];
		$this->sendEmail($toEmail,$subject,$message);
		

		
		return $id;
		
		
		

		
		
		
	
		
		
		
		
		
		
		
		
		
	
	}

	public function sendEmail($toEmail,$subject,$message)
	{
		$this->email->from('info@myvisitorbook.com','MyVisitorBook');
		$this->email->to($toEmail);
		$this->load->library('email');
		$this->email->set_mailtype("html");
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();
	
	}

}
