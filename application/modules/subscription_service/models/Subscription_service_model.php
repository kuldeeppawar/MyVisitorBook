<?php

class Subscription_service_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	
	}

  //------function used for subscription----//
  public function subscribe($mydata)
  {
  	
  		$email=$mydata['email'];
  		$flag=$mydata['subscription_flag'];
  		$created_date=date('Y-m-d H:i:s');
  	
  		
  		$result=$this->db->query("SELECT sb_email,sb_status FROM tblmvbsubscription WHERE sb_email='".$email."'");
  		
  		$emailDetails= $result->result();
  		
  		$data="";
  		if(count($emailDetails)>0)
  		{
  			if($emailDetails[0]->sb_status=='1' && $flag=='1')
  			{
  				$data=2;
  			}
  			else if ($emailDetails[0]->sb_status=='0' && $flag=='1')
  			{
  				
  				$this->db->query("update tblmvbsubscription set sb_status='1' where sb_email='".$email."' ");
  				$data=1;
  			}
  			else if ($emailDetails[0]->sb_status=='1' && $flag=='0')
  			{
  				$this->db->query("update tblmvbsubscription set sb_status='0',sb_unsubscribe_date='".$created_date."' where sb_email='".$email."' ");
  				$data=3;
  			}	
  			else 
  			{
  				$this->db->query("update tblmvbsubscription set sb_status='0',sb_unsubscribe_date='".$created_date."' where sb_email='".$email."' ");
  				$data=3;
  			}	
  			
  			
  		}
  		else 
  		{
  			
  			$data=array('sb_email'=>$email,
  						'sb_subscribe_date'=>$created_date,
  						'sb_status'=>'1'
  						);
  			
  			$this->db->insert('tblmvbsubscription',$data);
  			$insert_id=$this->db->insert_id();
  			
  			$data=1;
  		}	
  	
  		return $data;
  }
}
