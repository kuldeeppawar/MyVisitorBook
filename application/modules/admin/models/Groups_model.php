<?php

class Groups_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    // --Function used get all groups---//
    public function getAllGroups()
    {
        $branchId=$this->session->userdata('branch_id');
        $adminId=$this->session->userdata('admin_admin_id');
        $result=$this->db->query("SELECT  tblmvbgroups.grp_id_pk,tblmvbgroups.grp_name,tblmvbgroups.grp_status,tblmvbgroups.grp_createdDate,
								 tblmvbgroupvisitors.gv_grpId_fk,COUNT(tblmvbgroupvisitors.gv_visitorId_fk) as group_count FROM tblmvbgroups 
				                 LEFT JOIN tblmvbgroupvisitors on tblmvbgroups.grp_id_pk=tblmvbgroupvisitors.gv_grpId_fk WHERE
				                 tblmvbgroups.grp_branchId_fk='".$branchId."' and tblmvbgroups.grp_status!='2' and tblmvbgroups.grp_createdBy='".$adminId."' GROUP BY tblmvbgroups.grp_id_pk");


        return $result->result();

    }


    //--Get Specific Group Details---//
    public function  getSpecificgroup($id)
    {
        $adminId=$this->session->userdata('admin_admin_id');
        $result=$this->db->query("	SELECT `grp_id_pk`, `grp_branchId_fk`,	grp_description, `grp_name`, `grp_createdDate`, `grp_createdBy`, `grp_modifiedDate`, `grp_modifiedBy`,
				                 `grp_status` FROM `tblmvbgroups` WHERE grp_createdBy=".$adminId." and grp_id_pk='".$id."'");

        return $result->result();
    }


    //---Get Specific group visitor--//
    public function getGroupvisitor($id)
    {
        $result=$this->db->query("SELECT tblmvbvisitors.vis_id_pk,tblmvbvisitors.vis_firstName, tblmvbgroupvisitors.gv_grpId_fk,tblmvbvisitors.vis_lastName,tblmvbvisitors.vis_email, tblmvbvisitors.vis_mobile
				                  ,tblmvbvisitors.vis_profile FROM tblmvbvisitors LEFT JOIN tblmvbgroupvisitors on tblmvbvisitors.vis_id_pk=tblmvbgroupvisitors.gv_visitorId_fk WHERE 
				                  tblmvbgroupvisitors.gv_grpId_fk='".$id."'");
        return  $result->result();
    }

    //--Get Visitor Details--//
    public function getVisitordetails($id)
    {

        $result=$this->db->query("SELECT `vis_id_pk`, `vis_branchId_fk`, `vis_title`, `vis_firstName`, `vis_middleName`, `vis_lastName`, `vis_mobile`, `vis_email`, 
   			                  `vis_businessCategory`, `vis_businessName`, `vis_countryId_fk`, `vis_stateId_fk`, `vis_cityId_fk`, `vis_address`, `vis_zipCode`,
   			                  `vis_website`, `vis_landline`, `vis_fax`, `vis_profile`, `vis_dob`, `vis_anniversaryDate`, `vis_note`, `vis_createdDate`, `vis_createdBy`, 
   			                  `vis_modifiedDate`, `vis_modifiedBy`, `vis_status` FROM `tblmvbvisitors` WHERE vis_id_pk='".$id."'");
        return  $result->result();

    }

    //--Get Visitor Details--//
    public function deleteVisitor($visitorId,$groupId)
    {

        $result=$this->db->query("DELETE FROM `tblmvbgroupvisitors` WHERE gv_grpId_fk='".$groupId."' and gv_visitorId_fk='".$visitorId."'");

//   	$this->db->query("delete from tblmvbgroupvisitors where gv_visitorId_fk='".$visitorId."'");

        return  true;

    }

    //--Get Visitor Details--//
    public function deleteGroup($groupId)
    {

        $result=$this->db->query("Update tblmvbgroups set grp_status='2' WHERE grp_id_pk='".$groupId."' ");

        $result=$this->db->query("Update tblmvbgroupvisitors set gv_grpId_fk='' WHERE gv_grpId_fk='".$groupId."'");


//       $result=$this->db->query("DELETE FROM `tblmvbgroupvisitors` WHERE gv_grpId_fk='".$groupId."' and gv_visitorId_fk='".$visitorId."'");

        return  true;

    }

    // --- Function used to add Groupd---//
    public function addGroups()
    {

        ini_set('auto_detect_line_endings',true);
        $txtName=$this->input->post('txtGroup');
        $txtDescription=$this->input->post('txtDescription');
        $adminId=$this->session->userdata('admin_admin_id');
        $branchId=$this->session->userdata('branch_id');
        $date=date('Y-m-d h:i:s');

        $data=array('grp_branchId_fk'=>$branchId,
            'grp_name'=>$txtName,
            'grp_description'=>$txtDescription,
            'grp_createdDate'=>$date,
            'grp_createdBy'=>$adminId,
            'grp_modifiedDate'=>$date,
            'grp_modifiedBy'=>$adminId,
            'grp_status'=>1
        );
        $this->db->insert('tblmvbgroups',$data);
        $insert_id=$this->db->insert_id();
        $idlist=explode(",",$data);
        if (isset($_FILES ['txtFile']))
        {
            $error=array();
            $line_error=1;
            $base_url=base_url();
            $file_name=time() . $_FILES ["txtFile"] ["name"];
            move_uploaded_file($_FILES ["txtFile"] ["tmp_name"],"./uploads/group_visitor/" . $file_name);

            $upfile="./uploads/group_visitor/$file_name";
            $fp=fopen($upfile,"r");
            $n=0;

            while ( $line1=fgets($fp) )
            {
                $importData=str_getcsv($line1,',','"');

                if ($importData [0] != '')
                {
                    if ($n > 0)
                    {
                        $visitorId=$importData[0];
                        $resultVisit=$this->getVisitordetails($visitorId);
                        if(count($resultVisit)>0 )
                        {
                            if($branchId==$resultVisit[0]->vis_branchId_fk)
                            {
                                $datagroup=array('gv_grpId_fk'=>$insert_id,
                                    'gv_visitorId_fk'=>$visitorId,
                                    'gv_addedDate'=>$date,
                                    'gv_addedBy'=>$adminId,
                                    'gv_status'=>1
                                );
                                $this->db->insert('tblmvbgroupvisitors',$datagroup);
                            }
                        }
                    }
                    $n ++;
                }
            }
        }

        setAActivityLogs('Transaction_activity','AAGroupu_add',"Added Data :- ".$idlist );
        return $insert_id;
    }

    // --- Function used to Edit group---//
    public function editGroup()
    {
        $txtName=$this->input->post('txteditGroup');
        $insert_id=$this->input->post('txtGroupid');
        $txtDescription=$this->input->post('txteditDescription');
        $adminId=$this->session->userdata('admin_id');
        $branchId=$this->session->userdata('branch_id');
        $date=date('Y-m-d h:i:s');

        $data=array('grp_name'=>$txtName,
            'grp_description'=>$txtDescription,
            'grp_modifiedDate'=>$date,
            'grp_modifiedBy'=>$adminId);
        $this->db->where('grp_id_pk',$insert_id);
        $this->db->update('tblmvbgroups',$data);

        $idlist=explode(",",$data);
        setAActivityLogs('Transaction_activity','AAGroupu_edit',"Edited  Group :- ".$insert_id."Data:".$idlist );
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



    // --- Function used to Upload csv of groups---//
    function uploadCsv()
    {
        ini_set('auto_detect_line_endings',true);
        if (isset($_FILES ['txtFile']))
        {
            $adminId=$this->session->userdata('admin_admin_id');
            setAActivityLogs('Transaction_activity','AAGroupu_uploadcsv',"upload By :- ".$adminId );
            $error=array();
            $line_error=1;
            $base_url=base_url();
            $file_name=time() . $_FILES ["txtFile"] ["name"];
            move_uploaded_file($_FILES ["txtFile"] ["tmp_name"],"./uploads/group_csv/" . $file_name);

            $upfile="./uploads/group_csv/$file_name";
            $fp=fopen($upfile,"r");
            $n=0;

            while ( $line1=fgets($fp) )
            {
                $importData=str_getcsv($line1,',','"');

                if ($importData [0] != '')
                {
                    if ($n > 0)
                    {

                        $txtName=$importData[0];
                        $txtDescription=$importData[1];

                        $branchId=$this->session->userdata('branch_id');
                        $date=date('Y-m-d h:i:s');

                        $data=array('grp_branchId_fk'=>$branchId,
                            'grp_name'=>$txtName,
                            'grp_description'=>$txtDescription,
                            'grp_createdDate'=>$date,
                            'grp_createdBy'=>$adminId,
                            'grp_modifiedDate'=>$date,
                            'grp_modifiedBy'=>$adminId,
                            'grp_status'=>1
                        );
                        $this->db->insert('tblmvbgroups',$data);
                    }

                    $n ++;

                }
            }

            return true;
        }
        return false;
    }

}
