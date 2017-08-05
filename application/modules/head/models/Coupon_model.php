<?php

class Coupon_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}


	public function getAllGenerateCoupon()
	{
				$result=$this->db->query("SELECT tblmvbcoupons.gc_id_pk,tblmvbcoupons.gc_serial_no,tblmvbcoupons.gc_coupon_code,tblmvbpackages.pkg_name,tblmvbcoupons.gc_usage_limit,tblmvbcoupons.gc_usage_limit_type,DATE_FORMAT(tblmvbcoupons.gc_start_date,'%d %b %Y') as start_date,DATE_FORMAT(tblmvbcoupons.gc_end_date,'%d %b %Y') as end_date,datediff(tblmvbcoupons.gc_end_date,tblmvbcoupons.gc_start_date) as validity,tblmvbcoupons.gc_customer_name,(CASE WHEN tblmvbcoupons.gc_used_date='0000-00-00' THEN '--' ELSE tblmvbcoupons.gc_used_date END) as used_date,tblmvbcoupons.gc_status,(CASE WHEN tblmvbcoupons.gc_used_by='0' THEN '--' ELSE tblmvbcoupons.gc_used_by END) as used_by from tblmvbcoupons left join tblmvbpackages on (tblmvbcoupons.gc_pkg_type_id_fk=tblmvbpackages.pkg_id_pk) ORDER BY tblmvbcoupons.gc_id_pk DESC");
		
				return $result->result();
	}
	
	// --Function used get all festival list---//
	public function getPackageType()
	{
				$result=$this->db->query("SELECT pkg_name,pkg_id_pk from tblmvbpackages");
				
				return $result->result();
	
	}
	
	
	
	// --- Function used to add Generate Coupon---//
	public function addGenerateCoupon()
	{
		$pkg_type_id=$this->input->post('selPackagetypeid');
		$coupon_code=$this->input->post('txtCouponcode');
		$description=$this->input->post('txtDescription');
		$no_of_customer=$this->input->post('txtNoofcustomer');
		$customer_name=$this->input->post('txtCustomername');
		$mobile_no=$this->input->post('txtMobileno');
		$email_id=$this->input->post('txtEmailid');
		$start_date=date('Y-m-d',strtotime($this->input->post('txtStartdate')));
		$end_date=date('Y-m-d',strtotime($this->input->post('txtEnddate')));
		$usage_limit=$this->input->post('txtUsagelimit');
		$usage_limit_type=$this->input->post('optradio');

        $admin_user_id=$this->session->userdata('admin_id'); 



  //       if($usage_limit_type=='validity')
  //       {
		// 		$validity_in_days=$this->session->userdata('txtValidityindays');
		// }
		// else
		// {
		// 		$validity_in_days=0;
		// }


		$created_date=date('Y-m-d H:i:s');				
		
		$data=array('gc_pkg_type_id_fk'=>$pkg_type_id,'gc_coupon_code'=>$coupon_code,'gc_description'=>$description,'gc_no_of_customer'=>$no_of_customer,'gc_customer_name'=>$customer_name,'gc_mobile_no'=>$mobile_no,'gc_email_id'=>$email_id,'gc_start_date'=>$start_date,'gc_end_date'=>$end_date,'gc_usage_limit'=>$usage_limit,'gc_usage_limit_type'=>$usage_limit_type,'gc_createdDate'=>$created_date,'gc_createdBy'=>$admin_user_id,'gc_modifiedDate'=>$created_date,'gc_modifiedBy'=>$admin_user_id);
				
		$this->db->insert('tblmvbcoupons',$data);
		$insert_id=$this->db->insert_id();

		$serial_no=100000+$insert_id;
		
		$this->db->query("update tblmvbcoupons set gc_serial_no='".$serial_no."' where gc_id_pk='".$insert_id."'");

		//---------------------------------- Start Save Transaction Logs ---------------------------------//

			setSAActivityLogs('Transaction_activity','coupon_add');			

		//--------------------------------- End Save Transaction Logs ------------------------------------//
				
		return $insert_id;
	
	}
	
	// --- Function used to edit Festival---//
	// public function editGenerateCoupon()
	// {
	// 	$name=$this->input->post('txtEditfestival');
	// 	$id=$this->input->post('txtEditfestivalid');
	// 	$admin_id=$this->session->userdata('admin_id');
	// 	$festival_date=$this->input->post('txtEditfestivaldate');
	// 	$date=date('Y-m-d h:i:s');
	// 	$mandatory=$this->input->post('chkMandetoryedit');
	// 	$newDate=date("Y-m-d",strtotime($festival_date));
		
	// 	$a="";
	// 	if (isset($mandatory))
	// 	{
	// 		$a=1;
	// 	} else
	// 	{
	// 		$a=0;
	// 	}
		
	// 	$data=array('fest_name'=>$name,'fest_modifiedDate'=>$date,'fest_modifiedBy'=>$admin_id,'fest_category'=>$a,'fest_date'=>$newDate);
		
	// 	$this->db->where('fest_id_pk',$id);
	// 	$this->db->update('tblmvbfestival',$data);
		
	// 	return true;
	
	// }

	public function checkCouponCode($coupon_code)
	{        
		   $query = $this->db->query("Select * from tblmvbcoupons where gc_coupon_code='".$coupon_code."' and gc_status='Used'");
	       $cnt = $query->num_rows();
	       
           return $cnt;
	}

	public function getAllMappedCouponsList()
	{
			  $query = $this->db->query("Select cm.cm_sysuser_id_fk,
			  									cm.cm_client_id_fk,
												cm.cm_id_pk,
												(Select count(gc.gc_id_pk) from tblmvbcoupons gc 
												where (gc.gc_serial_no>=cm.cm_sr_no_from 
												and gc.gc_serial_no>=cm.cm_sr_no_to)) as No_of_coupons,
												(Select count(gc.gc_id_pk) from tblmvbcoupons gc 
												where (gc.gc_serial_no>=cm.cm_sr_no_from and 
												gc.gc_serial_no>=cm.cm_sr_no_to) and gc.gc_status='Used') as Used_coupons 
												from tblmvbcouponmapping cm");	      	       
           	  return  $query->result();
	}



	public function addCouponMapping()
	{
				$final_sysuser_id=0;
				$final_client_id=0;

				$created_date=date('Y-m-d H:i:s');
				$admin_user_id=$this->session->userdata('admin_id');
				$sr_no_from=$this->input->post('txtsrnofrom');
				$sr_no_to=$this->input->post('txtsrnoto');

				$system_user_id=$this->input->post('selSysUserID');
				$client_id=$this->input->post('selClientID');
				
				if($system_user_id!=0)
				{
						$final_sysuser_id=$system_user_id;
				}
				else
				{
						$final_client_id=$client_id;
				}

				$data=array('cm_sr_no_from'=>$sr_no_from,'cm_sr_no_to'=>$sr_no_to,'cm_sysuser_id_fk'=>$final_sysuser_id,'cm_client_id_fk'=>$final_client_id,'cm_createdDate'=>$created_date,'cm_createdBy'=>$admin_user_id,'cm_modifiedDate'=>$created_date,'cm_modifiedBy'=>$admin_user_id,'cm_status'=>'1');

				$this->db->insert('tblmvbcouponmapping',$data);
				$insert_id=$this->db->insert_id();

		//---------------------------------- Start Save Transaction Logs ---------------------------------//

				setSAActivityLogs('Transaction_activity','coupon_mapping_add');			

		//--------------------------------- End Save Transaction Logs ------------------------------------//

				return $insert_id;
	}


	public function getAllSystemUsers()
	{
			$query = $this->db->query("Select sysmu_id_pk,sysmu_username from tblmvbsysmainusers where sysmu_status='1' and sysmu_userTypeId_fk!='1'");
	        $cnt = $query->result();

	        return $cnt;
	}

	public function getAllClients()
	{
			$query = $this->db->query("Select sysu_id_pk,sysu_name from tblmvbsystemusers where sysu_status='1'");
	        $cnt = $query->result();

	        return $cnt;
	}

	public function getUserDetails($user_id,$user_type)
	{
				if($user_type=='client')
				{
							$query = $this->db->query("Select ut.utyp_userType,su.sysu_name as user_name from tblmvbsystemusers su left join tblmvbusertypes ut on (su.sysu_userTypeId_fk=ut.utyp_id_pk) where su.sysu_id_pk='".$user_id."'");

	        				$row = $query->result();
				}
				else
				{
							$query = $this->db->query("Select sut.mutyp_userType,smu.sysmu_username as user_name from tblmvbsysmainusers smu left join tblmvbsysmainusertypes sut on (smu.sysmu_userTypeId_fk=sut.mutyp_id_pk) where smu.sysmu_id_pk='".$user_id."'");

	        				$row = $query->result();
				}

				return $row;
	}
	

	public function getCouponDetails($coupon_map_id)
	{

				$data_array=array();

				$query = $this->db->query("Select cm_id_pk,cm_sr_no_from,cm_sr_no_to,cm_createdDate from tblmvbcouponmapping where cm_id_pk='".$coupon_map_id."'");

	        	$row = $query->result();

	        	
	        	$query_coupon_details = $this->db->query("Select gc.gc_pkg_type_id_fk,gc.gc_serial_no,DATE_FORMAT(gc.gc_start_date,'%d %b %Y') as start_date,DATE_FORMAT(gc.gc_end_date,'%d %b %Y') as end_date,gc.gc_usage_limit,gc.gc_status,pk.pkg_name,DATE_FORMAT(gc.gc_createdDate,'%d %b %Y') as created_date from tblmvbcoupons gc left join tblmvbpackages pk on (gc.gc_pkg_type_id_fk=pk.pkg_id_pk) where gc.gc_serial_no>='".$row[0]->cm_sr_no_from."' and gc.gc_serial_no<='".$row[0]->cm_sr_no_to."'");

	        	$row_coupon_details = $query_coupon_details->result();

	        	return $row_coupon_details;
	}

	public function getCouponMapping($coupon_map_id)
	{
				$query = $this->db->query("Select cm_id_pk,cm_sr_no_from,cm_sr_no_to,DATE_FORMAT(cm_createdDate,'%d %b %Y') as created_date from tblmvbcouponmapping where cm_id_pk='".$coupon_map_id."'");

	        	$row = $query->result();

	        	return $row;
	}
	
}
