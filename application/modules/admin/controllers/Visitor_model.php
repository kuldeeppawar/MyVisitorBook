<?php

class Visitor_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}
	
	// --Function used get all Visitors---//
	public function getAllVisitors()
	{
		$branchId=$this->session->userdata('branch_id');
		$result=$this->db->query("SELECT tblmvbvisitors.vis_id_pk,tblmvbvisitors.vis_firstName,tblmvbvisitors.vis_lastName,tblmvbvisitors.vis_mobile,tblmvbvisitors.vis_email,
				                  tblmvbvisitors.vis_businessName, tblmvbvisitors.vis_createdDate,tblmvbcity.cty_name,MAX(tblmvbvisitorlog.vl_visitDate) as vl_visitDate
				                  FROM tblmvbvisitors LEFT JOIN tblmvbcity on tblmvbvisitors.vis_cityId_fk=tblmvbcity.cty_id_pk LEFT JOIN tblmvbvisitorlog on 
				                  tblmvbvisitorlog.vl_visitorId_fk=tblmvbvisitors.vis_id_pk WHERE tblmvbvisitors.vis_branchId_fk='".$branchId."' and tblmvbvisitors.vis_status!='2'
				                  GROUP BY tblmvbvisitors.vis_id_pk");
		
		
		return $result->result();
	
	}
	
	//----function to get all group of branch---//
	public  function  getAllgroup()
	{
		$branchId=$this->session->userdata('branch_id');
		$result=$this->db->query("	SELECT `grp_id_pk`, `grp_branchId_fk`, `grp_name`, `grp_createdDate`, `grp_createdBy`, `grp_modifiedDate`, `grp_modifiedBy`,
				                 `grp_status` FROM `tblmvbgroups` WHERE grp_branchId_fk='".$branchId."' and grp_status!='2'");
		return $result->result();
		
	}

	
	// --Function used to get  Country--//
	Public function getCountrylist()
	{
		$result=$this->db->query("select cntr_id_pk,cntr_name,cntr_status from tblmvbcountry ");
		return $result->result();
	
	}
	
	
	// --Function used to get  State--//
	Public function getStatelist($id)
	{
		$result=$this->db->query("select stat_id_pk,stat_name,stat_status from tblmvbstate  WHERE stat_countryId_fk='".$id."'");
		return $result->result();
	
	}
	
	// --Function used to get  State--//
	Public function getCitylist($id)
	{
		$result=$this->db->query("select cty_id_pk,cty_name,cty_status,cty_stateId_fk,cty_countryId_fk from tblmvbcity  WHERE cty_stateId_fk='".$id."'");
		return $result->result();
	
	}
	
	
	//--function used to get specific visitors details--//
	public function getVisitordetails($id)
	{
		$result=$this->db->query("SELECT `vis_id_pk`, `vis_branchId_fk`, `vis_title`, `vis_firstName`, `vis_middleName`, `vis_lastName`, `vis_mobile`, `vis_email`, 
				                 `vis_businessCategory`, `vis_businessName`, `vis_countryId_fk`, `vis_stateId_fk`, `vis_cityId_fk`, `vis_address`, `vis_zipCode`, 
				                 `vis_website`, `vis_landline`, `vis_fax`, `vis_profile`, `vis_dob`, `vis_anniversaryDate`, `vis_note` 
				                 FROM `tblmvbvisitors` WHERE vis_id_pk='".$id."'");
		
		return $result->result();
		
	}
	
	//--function used to delete vistor--//
	public function deleteVisitor($id)
	{
		$result=$this->db->query("Update tblmvbvisitors set  vis_status='2' WHERE vis_id_pk='".$id."'");
	
		return true;
	
	}
	
	
	//--function used to get specific visitors group details--//
	public function getVisitorgroupdetails($id)
	{
		$result=$this->db->query("SELECT `gv_id_pk`, `gv_grpId_fk`, `gv_visitorId_fk`, `gv_addedDate`, `gv_addedBy`, `gv_status` FROM `tblmvbgroupvisitors`
				                  WHERE gv_visitorId_fk='".$id."'");
		/*echo $this->db->last_query();
		die();*/
		return $result->result();
	
	}
	
	public function getGroupVisitor($id=0,$groupId=0){
		$result=$this->db->query("SELECT `gv_id_pk`, `gv_grpId_fk`, `gv_visitorId_fk`, `gv_addedDate`, `gv_addedBy`, `gv_status` FROM `tblmvbgroupvisitors`
				                  WHERE gv_visitorId_fk='".$id."' and gv_grpId_fk='".$groupId."'");
	
		//return $result->result();	
		if($result->num_rows() > 0)
		{
			echo "selected";
		}else{
			echo "";
		}
	}
	//--Function get visitor comment--//
	public function getAllcomment($id)
	{
		$result=$this->db->query("SELECT tblmvbvisitorcomment.vc_id_pk,tblmvbvisitorcomment.vc_subject,tblmvbvisitorcomment.vc_comment,tblmvbvisitorcomment.vc_date,
				                  tblmvbvisitorcomment.vc_sysuserId_fk,tblmvbsystemusers.sysu_name,tblmvbsystemusers.sysu_profile FROM tblmvbvisitorcomment LEFT JOIN tblmvbsystemusers on
		                          tblmvbvisitorcomment.vc_sysuserId_fk=tblmvbsystemusers.sysu_id_pk WHERE tblmvbvisitorcomment.vc_visId_fk='".$id."'
				                  order by tblmvbvisitorcomment.vc_date desc ");

		return $result->result();
	}
	
	//--Function get visitor comment--//
	public function getVisitoruser($id)
	{
		$result=$this->db->query("SELECT tblmvbvisitorcomment.vc_id_pk,tblmvbvisitorcomment.vc_subject,tblmvbvisitorcomment.vc_comment,tblmvbvisitorcomment.vc_date,
				                  tblmvbvisitorcomment.vc_sysuserId_fk,tblmvbsystemusers.sysu_name,tblmvbsystemusers.sysu_profile FROM tblmvbvisitorcomment LEFT JOIN tblmvbsystemusers on
		                          tblmvbvisitorcomment.vc_sysuserId_fk=tblmvbsystemusers.sysu_id_pk WHERE tblmvbvisitorcomment.vc_visId_fk='".$id."'
				                  group by tblmvbvisitorcomment.vc_sysuserId_fk  ");
	
		return $result->result();
	}
	
	//--Function get specific comment--//
	public function getComment($id)
	{
		$result=$this->db->query("SELECT tblmvbvisitorcomment.vc_id_pk,tblmvbvisitorcomment.vc_subject,tblmvbvisitorcomment.vc_comment,tblmvbvisitorcomment.vc_date,
				                  tblmvbsystemusers.sysu_name,tblmvbsystemusers.sysu_profile FROM tblmvbvisitorcomment LEFT JOIN tblmvbsystemusers on
		                          tblmvbvisitorcomment.vc_sysuserId_fk=tblmvbsystemusers.sysu_id_pk WHERE  tblmvbvisitorcomment.vc_id_pk='".$id."'
				                  order by tblmvbvisitorcomment.vc_date desc ");
	
		return $result->result();
	}
	
	
	
	// --Function used get all Visitors---//
	public function getSpecificVisitors($id)
	{
	
		$result=$this->db->query("SELECT tblmvbvisitors.vis_id_pk,tblmvbvisitors.vis_firstName,tblmvbvisitors.vis_lastName,tblmvbvisitors.vis_mobile,tblmvbvisitors.vis_email,
				                  tblmvbvisitors.vis_businessName, tblmvbvisitors.vis_createdDate,tblmvbvisitors.vis_businessCategory,tblmvbvisitors.vis_address, tblmvbvisitors.vis_zipCode,
				                  tblmvbvisitors.vis_website,tblmvbvisitors.vis_website,tblmvbvisitors.vis_landline,tblmvbvisitors.vis_fax, tblmvbvisitors.vis_profile,tblmvbvisitors.vis_dob,
				                  tblmvbvisitors.vis_anniversaryDate,tblmvbvisitors.vis_note, tblmvbcity.cty_name,MAX(tblmvbvisitorlog.vl_visitDate) as vl_visitDate FROM tblmvbvisitors
				                  LEFT JOIN tblmvbcity on tblmvbvisitors.vis_cityId_fk=tblmvbcity.cty_id_pk LEFT JOIN tblmvbvisitorlog on tblmvbvisitorlog.vl_visitorId_fk=tblmvbvisitors.vis_id_pk
				                  WHERE tblmvbvisitors.vis_id_pk='".$id."'");
	
	
		return $result->result();
	
	}
	
  //--function used to get visitor group details---//
  public function getVisitorgroup($id)
  {
  	 $result=$this->db->query("SELECT tblmvbgroups.grp_name,tblmvbgroups.grp_id_pk FROM tblmvbgroups LEFT JOIN tblmvbgroupvisitors on 
  	 		                   tblmvbgroups.grp_id_pk=tblmvbgroupvisitors.gv_grpId_fk WHERE tblmvbgroupvisitors.gv_visitorId_fk='".$id."'");
	
	
	 return $result->result();
  }	
	
	// --- Function used to add Visitor---//
	public function addVisitor()
	{
		
		$selTitle=$this->input->post('selTitle');
		$txtFirstname=$this->input->post('txtFirstname');
		$txtMiddlename=$this->input->post('txtMiddlename');
		$txtLastname=$this->input->post('txtLastname');
		$txtMobilenumber=$this->input->post('txtMobilenumber');
		$txtEmail=$this->input->post('txtEmail');
		$txtAddress=$this->input->post('txtAddress');
		$selCountry=$this->input->post('selCountry');
		$selState=$this->input->post('selState');
		$selCity=$this->input->post('selCity');
		$txtZip=$this->input->post('txtZip');
		$txtWebsite=$this->input->post('txtWebsite');
		$txtLandline=$this->input->post('txtLandline');
		$txtFax=$this->input->post('txtFax');
		$selGroup=$this->input->post('selGroup');
		$selBusiness=$this->input->post('selBusiness');
		$txtBusinessname=$this->input->post('txtBusinessname');
		$txtBirtdate=date("Y-m-d",strtotime($this->input->post('txtBirtdate')));
		$txtAnniversary=date("Y-m-d",strtotime($this->input->post('txtAnniversary')));
		$txtInfo=$this->input->post('txtInfo');
		

		$adminId=$this->session->userdata('admin_admin_id');
		$clientId=$this->session->userdata('client_id');
		$parentClient=$this->session->userdata('parent_client');
		$branchId=$this->session->userdata('branch_id');
		$date=date('Y-m-d h:i:s');
		
		
		$file_name="";
		if ($_FILES ["txtFile"] ["name"]!="")
		{
			
			$file_name=time() . $_FILES ["txtFile"] ["name"];
			 move_uploaded_file($_FILES ["txtFile"] ["tmp_name"],"./uploads/visitor_image/" . $file_name);
		}
		
		
			$data=array('vis_branchId_fk'=>$branchId,
						'vis_title'=>$selTitle,
						'vis_firstName'=>$txtFirstname,
						'vis_middleName'=>$txtMiddlename,
						'vis_lastName'=>$txtLastname,
						'vis_mobile'=>$txtMobilenumber,
						'vis_email'=>$txtEmail,
						'vis_businessCategory'=>$selBusiness,
						'vis_businessName'=>$txtBusinessname,
						'vis_countryId_fk'=>$selCountry,
						'vis_stateId_fk'=>$selState,
						'vis_cityId_fk'=>$selCity,
						'vis_address'=>$txtAddress,
						'vis_zipCode'=>$txtZip,
						'vis_website'=>$txtWebsite,
						'vis_landline'=>$txtLandline,
					    'vis_profile'=>$file_name,
						'vis_fax'=>$txtFax,
						'vis_dob'=>$txtBirtdate,
						'vis_anniversaryDate'=>$txtAnniversary,
						'vis_note'=>$txtInfo,
						'vis_createdDate'=>$date,
						'vis_createdBy'=>$adminId,
						'vis_modifiedDate'=>$date,
						'vis_modifiedBy'=>$adminId,
				 		'vis_status'=>1
				        );
			$this->db->insert('tblmvbvisitors',$data);

			$insert_id=$this->db->insert_id();
			$idlist=implode(",",$data);
			$otherdata='';
	    for($i=0;$i<count($selGroup);$i++)
	    {
	    	$datagroup=array('gv_grpId_fk'=>$selGroup[$i],
	    			'gv_visitorId_fk'=>$insert_id,
	    			'gv_addedDate'=>$date,
	    			'gv_addedBy'=>$adminId,
	    			'gv_status'=>1
	    	);
	    	$this->db->insert('tblmvbgroupvisitors',$datagroup);
	    	$otherdata=$otherdata.implode(",",$data);
	    }
		
		
		$datavisit=array('vl_visitorId_fk'=>$insert_id,
						 'vl_branchId_fk'=>$branchId,
						 'vl_visitDate'=>$date
		                );
		$this->db->insert('tblmvbvisitorlog',$datavisit);
		
		
		
	
		setAActivityLogs('Transaction_activity','AAddvisitorform_Add',"Added Data :- ".$idlist."  field Values:-".$otherdata);
		
		
		
		$custom_count=$this->input->post('custom_count');
		$head_count=$this->input->post('head_count');
		
		for($i=0;$i<$head_count;$i++)
		{
			
			$dt=implode(",",$this->input->post("head_".$i));
			$datavisit=array('vvf_visitorfieldId_fk'=>$this->input->post("head1_".$i),
							 'vvf_visitorId_fk'=>$insert_id,
							 'vvf_value'=>$dt
			                 );
			$this->db->insert('tblmvbvisitorvisitfield',$datavisit);
			
		}	
		
		for($i=0;$i<$custom_count;$i++)
		{
			$dt=implode(",",$this->input->post("custom_".$i));
			$datavisit=array('vcf_customfieldId_fk'=>$this->input->post("custom1_".$i),
							 'vcf_visitorId_fk'=>$insert_id,
							 'vcf_value'=>$dt
			);
			$this->db->insert('tblmvbvisitorcustomfield',$datavisit);
				
		}
		
		
		
		
		return $insert_id;
	
	}
	
	// --- Function used to editVisitor---//
	public function editVisitor()
	{
		$selTitle=$this->input->post('selTitle');
		$insert_id=$this->input->post('txtId');
		$txtFirstname=$this->input->post('txtFirstname');
		$txtMiddlename=$this->input->post('txtMiddlename');
		$txtLastname=$this->input->post('txtLastname');
		$txtMobilenumber=$this->input->post('txtMobilenumber');
		$txtEmail=$this->input->post('txtEmail');
		$txtAddress=$this->input->post('txtAddress');
		$selCountry=$this->input->post('selCountry');
		$selState=$this->input->post('selState');
		$selCity=$this->input->post('selCity');
		$txtZip=$this->input->post('txtZip');
		$txtWebsite=$this->input->post('txtWebsite');
		$txtLandline=$this->input->post('txtLandline');
		$txtFax=$this->input->post('txtFax');
		$selGroup=$this->input->post('selGroup');
		$selBusiness=$this->input->post('selBusiness');
		$txtBusinessname=$this->input->post('txtBusinessname');
		$txtBirtdate=date("Y-m-d",strtotime($this->input->post('txtBirtdate')));
		$txtAnniversary=date("Y-m-d",strtotime($this->input->post('txtAnniversary')));
		$txtInfo=$this->input->post('txtInfo');
		

		$adminId=$this->session->userdata('admin_admin_id');
		$clientId=$this->session->userdata('client_id');
		$parentClient=$this->session->userdata('parent_client');
		$branchId=$this->session->userdata('branch_id');
		$date=date('Y-m-d h:i:s');
		
		
		$file_name=$this->input->post('txtProfile');
		if ($_FILES ["txtFile"] ["name"]!="")
		{
			
			$file_name=time() . $_FILES ["txtFile"] ["name"];
			 move_uploaded_file($_FILES ["txtFile"] ["tmp_name"],"./uploads/visitor_image/" . $file_name);
		}
		
		
			$data=array('vis_branchId_fk'=>$branchId,
						'vis_title'=>$selTitle,
						'vis_firstName'=>$txtFirstname,
						'vis_middleName'=>$txtMiddlename,
						'vis_lastName'=>$txtLastname,
						'vis_mobile'=>$txtMobilenumber,
						'vis_email'=>$txtEmail,
						'vis_businessCategory'=>$selBusiness,
						'vis_businessName'=>$txtBusinessname,
						'vis_countryId_fk'=>$selCountry,
						'vis_stateId_fk'=>$selState,
						'vis_cityId_fk'=>$selCity,
						'vis_address'=>$txtAddress,
						'vis_zipCode'=>$txtZip,
						'vis_website'=>$txtWebsite,
						'vis_landline'=>$txtLandline,
					    'vis_profile'=>$file_name,
						'vis_fax'=>$txtFax,
						'vis_dob'=>$txtBirtdate,
						'vis_anniversaryDate'=>$txtAnniversary,
						'vis_note'=>$txtInfo,
						'vis_modifiedDate'=>$date,
						'vis_modifiedBy'=>$adminId
				 		);
			$this->db->where('vis_id_pk',$insert_id);
			$this->db->update('tblmvbvisitors',$data);
			$idlist=implode(",",$data);
		
		$this->db->query("delete from tblmvbgroupvisitors where gv_visitorId_fk='".$insert_id."'")	;
			
	    for($i=0;$i<count($selGroup);$i++)
	    {
	    	$datagroup=array('gv_grpId_fk'=>$selGroup[$i],
			    			'gv_visitorId_fk'=>$insert_id,
			    			'gv_addedDate'=>$date,
			    			'gv_addedBy'=>$adminId,
			    			'gv_status'=>1
	    	);
	    	$this->db->insert('tblmvbgroupvisitors',$datagroup);
	    	$otherdata=$otherdata.implode(",",$data);
	    }
	   	   
		
	    
	    $custom_count=$this->input->post('custom_count');
	    $head_count=$this->input->post('head_count');
	    
	    $this->db->query("Delete from tblmvbvisitorvisitfield where vvf_visitorId_fk='".$insert_id."' ");
	    $this->db->query("Delete from tblmvbvisitorcustomfield where vcf_visitorId_fk='".$insert_id."' ");
	    
	    for($i=0;$i<$head_count;$i++)
	    {
	    		
	    	$dt=implode(",",$this->input->post("head_".$i));
	    	$datavisit=array('vvf_visitorfieldId_fk'=>$this->input->post("head1_".$i),
	    			         'vvf_visitorId_fk'=>$insert_id,
	    			         'vvf_value'=>$dt
	    	                );
	    	$this->db->insert('tblmvbvisitorvisitfield',$datavisit);
	    		
	    }
	    
	    for($i=0;$i<$custom_count;$i++)
	    {
	    	$dt=implode(",",$this->input->post("custom_".$i));
	    	$datavisit=array('vcf_customfieldId_fk'=>$this->input->post("custom1_".$i),
	    			         'vcf_visitorId_fk'=>$insert_id,
	    			         'vcf_value'=>$dt
	    	                 );
	    	$this->db->insert('tblmvbvisitorcustomfield',$datavisit);
	    
	    }
	    
		
		setAActivityLogs('Transaction_activity','AAddvisitorform_Edit',"Added Data :- ".$idlist."  field Values:-".$otherdata);
		
		return $insert_id;
		

	
	}

	// --function used to get specific user details--//
	public function getSpecificuser($id)
	{
		$query=$this->db->query("SELECT `sysu_id_pk`, `sysu_branchId_fk`, `sysu_userTypeId_fk`, `sysu_clientId_fk`, `sysu_parentClient`, `sysu_name`, `sysu_mobile`,
					                `sysu_email`, `sysu_password`, `sysu_countryId_fk`, `sysu_stateId_fk`, `sysu_cityId`, `sysu_address`,  `sysu_status` FROM
					                `tblmvbsystemusers` WHERE sysu_id_pk='" . $id . "'");
		return $query->result();
	
	}
	
	
	
	// --- Function used to Upload csv of visitors---//
	function uploadCsv()
	{
		ini_set('auto_detect_line_endings',true);
		if (isset($_FILES ['txtFile']))
		{
			$error=array();
			$line_error=1;
			$base_url=base_url();
			$file_name=time() . $_FILES ["txtFile"] ["name"];
			move_uploaded_file($_FILES ["txtFile"] ["tmp_name"],"./uploads/visitor_csv/" . $file_name);
				
			$upfile="./uploads/visitor_csv/$file_name";
			$fp=fopen($upfile,"r");
			$n=0;
				
			while ( $line1=fgets($fp) )
			{
				$importData=str_getcsv($line1,',','"');
	
				if ($importData [0] != '')
				{
					if ($n > 0)
					{
	                    $selTitle=$importData[0];
						$txtFirstname=$importData[1];
						$txtMiddlename=$importData[2];
						$txtLastname=$importData[3];
						$txtMobilenumber=$importData[4];
						$txtEmail=$importData[5];
						$selBusiness=$importData[6];
						$txtBusinessname=$importData[7];
						
						$resultCity=$this->getCitylist($importData[8]);
						
						$selCountry=0;
						$selState=0;
						$selCity=$importData[8];
						if(count($resultCity)>0)
						{
							$selCountry=$resultCity[0]->cty_countryId_fk;
							$selState=$resultCity[0]->cty_stateId_fk;
						}
					
						$txtAddress=$importData[9];
						$txtZip=$importData[10];
						$txtWebsite=$importData[11];
						$txtLandline=$importData[12];
						$txtFax=$importData[13];
						$selGroup=0;
						
						$txtBirtdate=date("Y-m-d",strtotime($importData[14]));
						$txtAnniversary=date("Y-m-d",strtotime($importData[15]));
						$txtInfo="";
						$file_name="";
				
						$adminId=$this->session->userdata('admin_admin_id');
						$clientId=$this->session->userdata('client_id');
						$parentClient=$this->session->userdata('parent_client');
						$branchId=$this->session->userdata('branch_id');
						$date=date('Y-m-d h:i:s');
						
							$data=array('vis_branchId_fk'=>$branchId,
										'vis_title'=>$selTitle,
										'vis_firstName'=>$txtFirstname,
										'vis_middleName'=>$txtMiddlename,
										'vis_lastName'=>$txtLastname,
										'vis_mobile'=>$txtMobilenumber,
										'vis_email'=>$txtEmail,
										'vis_businessCategory'=>$selBusiness,
										'vis_businessName'=>$txtBusinessname,
										'vis_countryId_fk'=>$selCountry,
										'vis_stateId_fk'=>$selState,
										'vis_cityId_fk'=>$selCity,
										'vis_address'=>$txtAddress,
										'vis_zipCode'=>$txtZip,
										'vis_website'=>$txtWebsite,
										'vis_landline'=>$txtLandline,
									    'vis_profile'=>$file_name,
										'vis_fax'=>$txtFax,
										'vis_dob'=>$txtBirtdate,
										'vis_anniversaryDate'=>$txtAnniversary,
										'vis_note'=>$txtInfo,
										'vis_createdDate'=>$date,
										'vis_createdBy'=>$adminId,
										'vis_modifiedDate'=>$date,
										'vis_modifiedBy'=>$adminId,
								 		'vis_status'=>1
								        );
							$this->db->insert('tblmvbvisitors',$data);
							$insert_id=$this->db->insert_id();
		
							
						}
							
						$n ++;
					
				}
	
	
			}
				
			return true;
		}
	
		
		return false;
	
	}
	
	
	// --- Function used to add Groupd---//
	public function addGroup()
	{
	
		$txtName=$this->input->post('grpName');
		$adminId=$this->session->userdata('admin_admin_id');
		$branchId=$this->session->userdata('branch_id');
		$date=date('Y-m-d h:i:s');
	
		$data=array('grp_branchId_fk'=>$branchId,
				    'grp_name'=>$txtName,
					'grp_createdDate'=>$date,
					'grp_createdBy'=>$adminId,
					'grp_modifiedDate'=>$date,
					'grp_modifiedBy'=>$adminId,
					'grp_status'=>1
			         );
		$this->db->insert('tblmvbgroups',$data);
		$insert_id=$this->db->insert_id();
		
		setAActivityLogs('Transaction_activity','AAddvisitorform_group',"group Added Id :- ".$insert_id."  by:-".$adminId);
		return $insert_id;
	
	}
	
	// --- Function used to add Comment---//
	public function saveComment()
	{
	
		$txtSubject=$this->input->post('subject');
		$txtComment=$this->input->post('comment');
		$txtVisitor=$this->input->post('visitorId');
		$txtDate=	date("Y-m-d h:i:s",strtotime($this->input->post('date')));
		$adminId=$this->session->userdata('admin_admin_id');
		$date=date('Y-m-d h:i:s');
		
		$data=array('vc_visId_fk'=>$txtVisitor,
					'vc_sysuserId_fk'=>$adminId,
					'vc_subject'=>$txtSubject,
					'vc_comment'=>$txtComment,
					'vc_date'=>$txtDate,
				    'vc_addedDate'=>$date,
					'vc_status'=>1	);
		$this->db->insert('tblmvbvisitorcomment',$data);
		$insert_id=$this->db->insert_id();
	
		setAActivityLogs('Transaction_activity','AAddvisitorform_comment',"Added Comment Id :- ".$insert_id."  comment:-".$txtComment);
		return $insert_id;
	
	}
	
	
	//-----get Additional fields---//
	public function getAdditionalfields()
	{
		$result=$this->db->query("SELECT tblmvbvisitfield.visitfield_id_pk,tblmvbvisitfield.visitfield_length,tblmvbvisitfield.visitfield_type,
			                      tblmvbvisitfield.visitfield_name,tblmvbvisitfield.visitfield_selection,tblmvbvisitfield.visitfield_category,
			                      GROUP_CONCAT(tblmvbvisitfieldvalue.visitval_value) as val,tblmvbquickadditional.additional_visitfieldid_fk 
			                      FROM `tblmvbvisitfield` LEFT JOIN tblmvbvisitfieldvalue on tblmvbvisitfield.visitfield_id_pk=tblmvbvisitfieldvalue.visitval_fieldId_fk
			                      LEFT JOIN tblmvbquickadditional on tblmvbquickadditional.additional_visitfieldid_fk=tblmvbvisitfield.visitfield_id_pk
			                      WHERE tblmvbvisitfield.visitfield_status='1' AND tblmvbquickadditional.additional_visitfieldid_fk!='' 
			                      GROUP BY tblmvbvisitfield.visitfield_id_pk");
		
		
		return $result->result();
		
	}
	
	
	//------get Custom fields----//
	public function getCustomfields()
	{
		$client_id=$this->session->userdata("client_id");
		$result=$this->db->query("SELECT tblmvbcustomfields.cfi_id_pk,tblmvbcustomfields.cfi_field_type,tblmvbcustomfields.cfi_picklist_type, tblmvbcustomfields.cfi_length,
			                      GROUP_CONCAT(tblmvbcustomfieldvalue.cfv_value) as val,tblmvbcustomfields.cfi_label FROM tblmvbcustomfields LEFT JOIN tblmvbcustomfieldvalue ON
			                      tblmvbcustomfields.cfi_id_pk=tblmvbcustomfieldvalue.cfv_fieldId_fk WHERE tblmvbcustomfields.cfi_clientId='".$client_id."' AND 
			                      tblmvbcustomfields.cfi_status='1' GROUP BY tblmvbcustomfields.cfi_id_pk");
		
		return $result->result();
		
	}
	
	//----get visiti field value---//
	public function getvisitfieldvalue($visitfield_id_pk,$VisitorId)
	{
		
		$result=$this->db->query("SELECT `vvf_id_pk`, `vvf_visitorfieldId_fk`, `vvf_visitorId_fk`, `vvf_value` FROM `tblmvbvisitorvisitfield` WHERE
			                      vvf_visitorfieldId_fk='".$visitfield_id_pk."' AND  vvf_visitorId_fk='".$VisitorId."'   ");
		
		return $result->result();
		
	}
	
	public function getcustomfieldvalue($visitfield_id_pk,$VisitorId)
	{
		$result=$this->db->query("SELECT `vcf_id_pk`, `vcf_customfieldId_fk`, `vcf_visitorId_fk`, `vcf_value` FROM `tblmvbvisitorcustomfield` WHERE 
			                      vcf_customfieldId_fk='".$visitfield_id_pk."' AND  vcf_visitorId_fk='".$VisitorId."'   ");
		
		return $result->result();
	}
	
	
}
