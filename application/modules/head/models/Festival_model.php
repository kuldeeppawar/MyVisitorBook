<?php

class Festival_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}
	
	// --Function used get all festival list---//
	public function getAllFestival()
	{
		$result=$this->db->query("SELECT tblmvbfestival.fest_id_pk,tblmvbfestival.fest_name,tblmvbfestival.fest_date,tblmvbfestival.fest_createdDate,tblmvbfestival.fest_category,
	    		                  tblmvbfestival.fest_status,tblmvbstate.stat_id_pk,tblmvbstate.stat_name ,tblmvbsysmainusers.sysmu_username from tblmvbfestival tblmvbfestival
	    		                   LEFT JOIN 
	                              tblmvbstate tblmvbstate on (tblmvbstate.stat_id_pk=tblmvbfestival.fest_stateId_fk) LEFT JOIN 
                                  tblmvbsysmainusers tblmvbsysmainusers on (tblmvbsysmainusers.sysmu_id_pk=tblmvbfestival.fest_createdBy) ORDER BY tblmvbfestival.fest_id_pk DESC");
		
		return $result->result();
	
	}
	
	// -- function get Active state --//
	public function getActivestate()
	{
		$result=$this->db->query("SELECT `stat_id_pk`, `stat_countryId_fk`, `stat_name` FROM `tblmvbstate` WHERE  stat_status='1' and stat_delete='0'");
		return $result->result();
	
	}
	
	// -- function get All state --//
	public function getAllstate()
	{
		$result=$this->db->query("SELECT `stat_id_pk`, `stat_countryId_fk`, `stat_name` FROM `tblmvbstate` ");
		return $result->result();
	
	}
	
	//---function used to get specific festival details--//
	public function getSpecfestival($id)
	{
		$result=$this->db->query("SELECT `fest_id_pk`, `fest_name`, `fest_date`, `fest_category`, `fest_createdDate`, `fest_createdBy`, `fest_modifiedDate`,
				                    `fest_modifiedBy`, `fest_status` FROM `tblmvbfestival` WHERE fest_id_pk='".$id."'");
		return $result->result();
	}
	
	
	// --- Function used to add Festival---//
	public function addFestival()
	{
		$locations=$this->input->post('selLocation');
		$festival_name=$this->input->post('txtFestivalname');
		$festival_date=$this->input->post('txtFestivaldate');
		$admin_id=$this->session->userdata('admin_id');
		$date=date('Y-m-d h:i:s');
		$mandatory=$this->input->post('chkMandetory');
		
		$newDate=date("Y-m-d",strtotime($festival_date));
		
		$a="";
		if (isset($mandatory))
		{
			$a=1;
		} else
		{
			$a=0;
		}
		
		
		
		for($i=0;$i < count($locations);$i ++)
		{
			// $data=array('festl_festId_fk'=>$insert_id,'festl_stateId_fk'=>$locations[$i],'festl_status'=>'1');
			// $this->db->insert('tblmvbfestivallocation',$data);

			$data=array('fest_name'=>$festival_name,'fest_createdDate'=>$date,'fest_createdBy'=>$admin_id,'fest_modifiedDate'=>$date,'fest_modifiedBy'=>$admin_id,'fest_stateId_fk'=>$locations[$i],'fest_category'=>$a,'fest_date'=>$newDate,'fest_status'=>'1');
		
			$this->db->insert('tblmvbfestival',$data);
			$insert_id=$this->db->insert_id();
		}
		
		setSAActivityLogs('Transaction_activity','SAFestival_add');
		
		
		
		return $insert_id;
	
	}
	
	// --- Function used to edit Festival---//
	public function editFestival()
	{
		$name=$this->input->post('txtEditfestival');
		$id=$this->input->post('txtEditfestivalid');
		$admin_id=$this->session->userdata('admin_id');
		$festival_date=$this->input->post('txtEditfestivaldate');
		$date=date('Y-m-d h:i:s');
		$mandatory=$this->input->post('chkMandetoryedit');
		$newDate=date("Y-m-d",strtotime($festival_date));
		$a="";
		if (isset($mandatory))
		{
			$a=1;
		} else
		{
			$a=0;
		}
		
		$festival_details=$this->getSpecfestival($id);
		
		$updatedData="";
		
		if($name!=$festival_details[0]->fest_name)
		{
			$updatedData=$updatedData."Old Name:-".$festival_details[0]->fest_name." and New Name:-".$name;
		}
		if($newDate!=$festival_details[0]->fest_date)
		{
			$updatedData=$updatedData."Old fest_date:-".$festival_details[0]->fest_date." and New fest_date:-".$newDate;
		}
		if($a!=$festival_details[0]->fest_category)
		{
			$updatedData=$updatedData."Old Category:-".$festival_details[0]->fest_category." and New Category:-".$a;
		}	
		
		
		
		
		$data=array('fest_name'=>$name,'fest_modifiedDate'=>$date,'fest_modifiedBy'=>$admin_id,'fest_category'=>$a,'fest_date'=>$newDate);
		
		$this->db->where('fest_id_pk',$id);
		$this->db->update('tblmvbfestival',$data);
		
		setSAActivityLogs('Transaction_activity','SAFestival_edit',$updatedData);
		
		return true;
	
	}
	
	// --- Function used to change status of state---//
	public function changecityStatus($status,$festivalid)
	{
		for($i=0;$i<count($festivalid);$i ++)
		{
			$data=array('fest_status'=>$status);
			$this->db->where('fest_id_pk',$festivalid[$i]);
			$this->db->update('tblmvbfestival',$data);
		
                        // if($status=='1')
                        // {
                        //              $result_festival_location=$this->db->query("SELECT festl_id_pk FROM tblmvbfestivallocation WHERE festl_status='1' and festl_festId_fk='".$festivalid [$i]."'");
		        
                        //              $row_festival_location=$result_festival_location->result();

                        //              if(count($row_festival_location)>0)
                        //              {
                        //                        $this->db->query("update tblmvbfestival set fest_status='1' where fest_id_pk='".$festivalid [$i]."'");
                        //              }
                        // }
                        // else
                        // {
                        //              $result_festival_location=$this->db->query("SELECT festl_id_pk FROM tblmvbfestivallocation WHERE festl_status='1' and festl_festId_fk='".$festivalid [$i]."'");
		        
                        //              $row_festival_location=$result_festival_location->result();

                        //              if(count($row_festival_location)==0)
                        //              {
                        //                        $this->db->query("update tblmvbfestival set fest_status='0' where fest_id_pk='".$festivalid [$i]."'");
                        //              } 
                        // }  
        }

		return true;
	}
	
	// --- Function used to Upload csv of City---//
	function uploadFestivalcsv()
	{
		ini_set('auto_detect_line_endings',true);
		if (isset($_FILES ['flFestivalcsv']))
		{
			$error=array();
			$line_error=1;
			$base_url=base_url();
			$file_name=time() . $_FILES ["flFestivalcsv"] ["name"];
			
			$ext=explode(".",$file_name);
			
			$ext_count=count($ext);
			
			if($ext[$ext_count-1]=="csv")
			{	
			
			
					move_uploaded_file($_FILES ["flFestivalcsv"] ["tmp_name"],"./uploads/festival_csv/" . $file_name);
					
					$upfile="./uploads/festival_csv/$file_name";
					$fp=fopen($upfile,"r");
					$n=0;
					
					while ( $line1=fgets($fp) )
					{
						$line=str_getcsv($line1,',','"');
						
						if ($line [0] != '')
						{
							if ($n > 0)
							{
								
								$locations=$line [2];
								$locations=explode(",",$locations);
								$festival_name=$line [0];
								$festival_date=date('Y-m-d',strtotime($line [1]));
								$admin_id=$this->session->userdata('admin_id');
								$date=date('Y-m-d h:i:s');
								$mandatory=$line [3];
								$newDate=date("Y-m-d",strtotime($festival_date));
								
								
								
								for($i=0;$i < count($locations);$i ++)
								{
									$data=array('fest_name'=>$festival_name,'fest_createdDate'=>$date,'fest_createdBy'=>$admin_id,'fest_modifiedDate'=>$date,'fest_modifiedBy'=>$admin_id,'fest_category'=>$mandatory,'fest_stateId_fk'=>$locations[$i],'fest_date'=>$newDate,'fest_status'=>'1');
								
									$this->db->insert('tblmvbfestival',$data);
									$insert_id=$this->db->insert_id();

									// $data=array('festl_festId_fk'=>$insert_id,'festl_stateId_fk'=>$locations [$i],'festl_status'=>'1');
									// $this->db->insert('tblmvbfestivallocation',$data);
								}
							}
							
							$n ++;
							setSAActivityLogs('Transaction_activity','SAFestival_addcsv');
						}
						
						
					}
					
					return true;
			}
			return false;
		}
		
		return false;
	
	}
	
	//---function used to get client---/
	public function getAllClient()
	{
		$result=$this->db->query("SELECT tblmvbsystemusers.sysu_id_pk,tblmvbsystemusers.sysu_name,tblmvbsystemusers.sysu_mobile, tblmvbsystemusers.sysu_email,tblmvbcity.cty_name
			              FROM tblmvbsystemusers LEFT JOIN tblmvbcity ON tblmvbsystemusers.sysu_cityId=tblmvbcity.cty_id_pk WHERE tblmvbsystemusers.sysu_parentClient='1'");
		return $result->result();
	}

	
	// --Function used get all festival list---//
	public function getClientFestival($clientId)
	{
		$location=$this->getClientlocation($clientId);
		$cityList=0;
	
		if(count($location)>0)
		{
			$cityList=$location[0]->brn_stateId_fk;
		}
	
	
		$result=$this->db->query("SELECT tblmvbfestival.fest_id_pk,tblmvbbranches.brn_id_pk,tblmvbbranches.brn_name,tblmvbbranches.brn_clientId_fk,
                                  tblmvbfestivallocation.festl_id_pk,tblmvbbranchfestival.brnfs_id_pk,tblmvbfestival.fest_name,tblmvbfestival.fest_date,
				                  tblmvbfestival.fest_createdDate,tblmvbfestival.fest_category,tblmvbfestivallocation.festl_status,tblmvbstate.stat_id_pk,
				                  tblmvbstate.stat_name from tblmvbfestival tblmvbfestival LEFT JOIN tblmvbfestivallocation tblmvbfestivallocation on
				                  (tblmvbfestivallocation.festl_festId_fk=tblmvbfestival.fest_id_pk)LEFT JOIN tblmvbstate on
				                  (tblmvbstate.stat_id_pk=tblmvbfestivallocation.festl_stateId_fk) LEFT JOIN  tblmvbbranches on
				                  (tblmvbbranches.brn_stateId_fk=tblmvbstate.stat_id_pk )LEFT JOIN tblmvbbranchfestival on
				                  (tblmvbbranchfestival.brnfs_festId_fk=tblmvbfestival.fest_id_pk and tblmvbbranchfestival.brns_brnId_fk=tblmvbbranches.brn_id_pk)
                                  WHERE find_in_set(tblmvbfestivallocation.festl_stateId_fk,'".$cityList."') and
				                  tblmvbfestival.fest_status='1' AND tblmvbbranches.brn_clientId_fk='".$clientId."' ORDER BY tblmvbfestival.fest_date DESC");
	
		return $result->result();
	
	}
	
	//---Function used to get Client locations---//
	public  function getClientlocation($clientId)
	{
	
		$result=$this->db->query("SELECT `sysu_id_pk`, `sysu_branchId_fk`, `sysu_userTypeId_fk`, `sysu_clientId_fk`, `sysu_parentClient`, `sysu_profile`,
			                      `sysu_name`, `sysu_mobile`, `sysu_email`, `sysu_password`, `sysu_countryId_fk`, `sysu_stateId_fk`, `sysu_cityId`, `sysu_address`, 
			                      `sysu_createdDate`, `sysu_createdBy`, `sysu_modifiedDate`, `sysu_modifiedby`, `sysu_status`
			                       FROM `tblmvbsystemusers` WHERE sysu_id_pk='".$clientId."'");
		$result=$result->result();
	    $parentClient=$result[0]->sysu_parentClient;
	  
		$sql="";
	
	
		if($parentClient==0)
		{
			$sql="SELECT brn_id_pk,brn_clientId_fk,brn_name,brn_stateId_fk FROM tblmvbbranches WHERE brn_id_pk='".$branchId."'";
		}
		else
		{
			$sql="SELECT GROUP_CONCAT(brn_id_pk) as brn_id_pk,brn_clientId_fk,brn_name,GROUP_CONCAT(brn_stateId_fk) as brn_stateId_fk FROM tblmvbbranches WHERE brn_clientId_fk='".$clientId."'";
		}
			
	
		$resultLoction=$this->db->query($sql);
		 
		$resultLoction=$resultLoction->result();
		 
	
	
		return $resultLoction;
	}
	
	
	// --- Function used to add Festival---//
	public function getConfirmfestival($festival,$admin_id)
	{
		$idlist="";
	
		$date=date('Y-m-d h:i:s');
		
	
		$location=$this->getClientlocation($admin_id);
		$brnList=0;
	
		if(count($location)>0)
		{
			$brnList=$location[0]->brn_id_pk;
		}
	
	
		if(count($festival)>0)
		{
			$this->db->query("DELETE FROM tblmvbbranchfestival WHERE find_in_set(brns_brnId_fk,'".$brnList."') ");
				
				
			$otherdata="";
				
			for($i=0;$i < count($festival);$i ++)
			{
				$info=explode('-',$festival[$i]);
	
	
				$data=array('brnfs_festId_fk'=>$info[0],
						    'brns_brnId_fk'=>$info[1],
						    'brns_createdBy'=>$admin_id,
						    'brns_createdDate'=>$date,
						    'brns_status'=>'1');
					
				$this->db->insert('tblmvbbranchfestival',$data);
				$otherdata=$otherdata.implode(",",$data);
				
			
			}
			setSAActivityLogs('Transaction_activity','SAFestival_confirm',$otherdata);
			$insert_id=$this->db->insert_id();
			return $insert_id;
		}
		else
		{
			return  false;
		}
	}

	public function checkFestivalsTemplate($festival_id)
	{
				$result=$this->db->query("select email_id_pk from tblmvbemailtemplate where email_festId_fk='".$festival_id."'");
				
				$row=$result->result();

				return $row;	
	}
	
	
}
