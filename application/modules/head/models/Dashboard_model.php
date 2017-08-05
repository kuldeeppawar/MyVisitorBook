<?php

class Dashboard_Model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}
	
	public function getAllclient()
	{
		$result=$this->db->query("SELECT `clnt_id_pk`, `clnt_name`, `clnt_mobile`, `clnt_email`, `clnt_password`, `clnt_countryId_fk`, `clnt_stateId_fk`, `clnt_cityId_fk`, 
			                      `clnt_address`, `clnt_packageId_fk`, `clnt_totalSmsCredit`, `clnt_totalEmailCredit`, `clnt_validity`, `clnt_createdDate`, `clnt_createdBy`,
			                      `clnt_modifiedDate`, `clnt_modifiedBy`, `clnt_status` FROM `tblmvbclients`");
		
		$result=$result->result();
		
		return count($result);
		
    }
    
    public function getTodayclient()
    {
    	$date=date('Y-m-d');
    	$result=$this->db->query("SELECT `clnt_id_pk`, `clnt_name`, `clnt_mobile`, `clnt_email`, `clnt_password`, `clnt_countryId_fk`, `clnt_stateId_fk`, `clnt_cityId_fk`, 
			                      `clnt_address`, `clnt_packageId_fk`, `clnt_totalSmsCredit`, `clnt_totalEmailCredit`, `clnt_validity`, `clnt_createdDate`, `clnt_createdBy`,
			                      `clnt_modifiedDate`, `clnt_modifiedBy`, `clnt_status` FROM `tblmvbclients`  Where clnt_createdDate = '".$date."'");
    
 	     $result=$result->result();
    
       return count($result) ;
    
    }
    
    public function getMonthclient()
    {
    	$date=date('m');
    	$result=$this->db->query("SELECT `clnt_id_pk`, `clnt_name`, `clnt_mobile`, `clnt_email`, `clnt_password`, `clnt_countryId_fk`, `clnt_stateId_fk`, `clnt_cityId_fk`,
			                      `clnt_address`, `clnt_packageId_fk`, `clnt_totalSmsCredit`, `clnt_totalEmailCredit`, `clnt_validity`, `clnt_createdDate`, `clnt_createdBy`,
			                      `clnt_modifiedDate`, `clnt_modifiedBy`, `clnt_status` FROM `tblmvbclients`  Where MONTH(clnt_createdDate) = '".$date."'");
    
    	$result=$result->result();
    
    	return count($result) ;
    
    }
    
    public function getTotalnewearning()
    {
    	$date=date('m');
    	$result=$this->db->query("SELECT SUM(ord_discountPrice) as total FROM tblmvborders WHERE ord_packageType='New'
                                 ");
    
    	$result=$result->result();
        if($result[0]->total!='')
        {	
    	return $result[0]->total;
        }
        else 
        {
        	return 0;
        }	
    }
    
    public function getTotalrechargeearning()
    {
    	$date=date('m');
    	$result=$this->db->query("SELECT SUM(ord_discountPrice) as total FROM tblmvborders WHERE ord_packageType='Renew'
                                 ");
    
    	$result=$result->result();
    
      if($result[0]->total!='')
        {	
    	return $result[0]->total;
        }
        else 
        {
        	return 0;
        }	
    
    }
    
    public function getTotalrecharge()
    {
    	$result=$this->db->query("SELECT * FROM tblmvborders WHERE ord_packageType='Renew'");
    
    	$result=$result->result();
        
    	return count($result);
    	
    }
    
    public function getTotalrecharmonth()
    {
    	$date=date('m');
    	$result=$this->db->query("SELECT * FROM tblmvborders WHERE ord_packageType='Renew' AND MONTH (ord_purchaseDate)='".$date."' ");
    
    	
        return count($result->result());
    
   }
   
   public function getTotaldaysale()
   {
   	$date=date('m');
   	$result=$this->db->query("SELECT * FROM tblmvborders WHERE ord_packageType='New' AND ord_purchaseDate='".$date."' ");
   
   	 
   	return count($result->result());
   
   }
   
   public function getTotaldayrecharge()
   {
   	$date=date('m');
   	$result=$this->db->query("SELECT * FROM tblmvborders WHERE ord_packageType='Renew' AND ord_purchaseDate='".$date."' ");
   	 
   	 
   	return count($result->result());
   	 
   }
    
    
    public function getMonthsms()
    {
    	$date=date('m');
    	$result=$this->db->query("SELECT `ssu_id_pk`, `ssu_sm_id_fk`, `ssu_visitor_id`, `ssu_group_id`, `ssu_message_details`, `ssu_cDate`, 
    		                      `ssu_smsstatus` FROM `tblmvbsendsmsusers` WHERE Month(ssu_cDate)='".$date."'");
    	
    	$result=$result->result();
    	
    	return count($result) ;
     }
    	
    public function getMonthemail()
    {
    	$date=date('m');
    	$result=$this->db->query("SELECT `seu_id_pk`, `seu_em_id_fk`, `seu_visitor_id`, `seu_group_id`, `seu_message_details`, `seu_cDate`, `seu_emailstatus`
    		                      FROM `tblmvbsendemailusers`WHERE Month(seu_cDate)='".$date."'");
    	
    	$result=$result->result();
    	
    	return count($result) ;
   }
   
   public function getSenderId()
   {
   	
   	  $result=$this->db->query("SELECT tblmvbsystemusers.sysu_name,tblmvbsystemusers.sysu_mobile,tblmvbsenderid.sid_content FROM tblmvbsystemusers LEFT JOIN 
   	  	                        tblmvbsenderid on tblmvbsystemusers.sysu_id_pk=tblmvbsenderid.sid_clientId_fk WHERE tblmvbsenderid.sid_adminStatus=0");
   	  
   	  return $result->result();
   	
   }
   
   public function getEMailtemplate()
   {
   
	   	$result=$this->db->query("SELECT tblmvbsystemusers.sysu_name,tblmvbsystemusers.sysu_mobile,tblmvbemailtemprequest.etr_template_name FROM tblmvbsystemusers 
	   		                      LEFT JOIN tblmvbemailtemprequest ON tblmvbsystemusers.sysu_id_pk=tblmvbemailtemprequest.etr_client_id_fk WHERE
	   		                      tblmvbemailtemprequest.etr_admin_status='pending'");
	   
	   	return $result->result();
   
   }
   
   public function getSmstemplate()
   {
   	 
   	$result=$this->db->query("SELECT tblmvbsystemusers.sysu_name,tblmvbsystemusers.sysu_mobile,tblmvbsmstemprequest.str_template_name FROM tblmvbsystemusers 
   		                      LEFT JOIN tblmvbsmstemprequest ON tblmvbsystemusers.sysu_id_pk=tblmvbsmstemprequest.str_client_id_fk WHERE 
   		                      tblmvbsmstemprequest.str_admin_status='pending'");
   
   	return $result->result();
   	 
   }
   
   public function getTotalclientlogin()
   {
   	  $result=$this->db->query("SELECT sysu_id_pk FROM tblmvbsystemusers WHERE sysu_isLogin='1' AND sysu_parentClient='1'");
   	  
   	  return count($result->result());
   }
   
    
   public  function  getToprevenueclients()
   {
   	 
   	   $result=$this->db->query("SELECT tblmvbclients.clnt_id_pk,tblmvbclients.clnt_name,tblmvbclients.clnt_mobile,SUM(tblmvborders.ord_discountPrice) as price,
   	   	                        COUNT(tblmvborders.ord_id_pk) as total FROM tblmvbclients LEFT JOIN tblmvborders ON tblmvbclients.clnt_id_pk=tblmvborders.ord_clntId_fk
                                GROUP BY tblmvbclients.clnt_id_pk  ORDER by price DESC LIMIT 5");
   	   return $result->result();
   	
   }
   
   public  function  getToprevenuesales()
   {
   	 
   	$result=$this->db->query("SELECT tblmvbsysmainusers.sysmu_id_pk,tblmvbsysmainusers.sysmu_username,tblmvbsysmainusers.sysmu_mobile, SUM(tblmvborders.ord_discountPrice) 
   		                      as price ,COUNT(tblmvborders.ord_id_pk) as total FROM tblmvbsysmainusers LEFT JOIN tblmvborders ON 
   		                      tblmvbsysmainusers.sysmu_id_pk=tblmvborders.ord_createdBy GROUP BY tblmvbsysmainusers.sysmu_id_pk ORDER by price DESC LIMIT 5");
   	return $result->result();
   
   }
   
   
   
   public  function  getToprevenuereseller()
   {
   	 
   	$result=$this->db->query("SELECT tblmvbsysmainusers.sysmu_id_pk,tblmvbsysmainusers.sysmu_username,tblmvbsysmainusers.sysmu_mobile, SUM(tblmvborders.ord_discountPrice)
   		                      as price ,COUNT(tblmvborders.ord_id_pk) as total FROM tblmvbsysmainusers LEFT JOIN tblmvborders ON 
   		                      tblmvbsysmainusers.sysmu_id_pk=tblmvborders.ord_createdBy WHERE tblmvbsysmainusers.sysmu_userTypeId_fk='4'
   		                      GROUP BY tblmvbsysmainusers.sysmu_id_pk ORDER by price DESC LIMIT 5");
   	return $result->result();
   	 
   }
    
   
   public function getClientpayments()
   {
   	 $result=$this->db->query("SELECT ord_purchaseDate,ord_paymentMode,ord_paymentType,ord_discountPrice,clnt_name,clnt_mobile FROM tblmvborders LEFT JOIN 
   	 	                       tblmvbclients ON ord_clntId_fk=clnt_id_pk ORDER BY ord_id_pk DESC LIMIT 5");
   	 
   	 return $result->result();
   }
   
   
   
}


?>
