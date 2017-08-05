<?php
class Dashboard_Model extends CI_Model
{
    public function __construct()
    {
            parent::__construct();
    }
    
    public function getAllSMSCount()
    {
    	$branch_id=$this->session->userdata('branch_id');
    
    	$result_sms=$this->db->query("Select count(ssu.ssu_id_pk) as sms_count from tblmvbsendsmsusers ssu left join tblmvbsmsmanagement sm on (sm.sm_id_pk=ssu.ssu_sm_id_fk) where ssu.ssu_branchId_fk='".$branch_id."'");
    
    	$row_sms=$result_sms->result();
    
    
    	return $row_sms[0]->sms_count;
    }
    
    
    public function getAllEmailCount()
    {
        $branch_id=$this->session->userdata('branch_id');

    	$result_email=$this->db->query("Select count(seu.seu_id_pk) as email_count from tblmvbsendemailusers seu left join tblmvbemailmanagement em on (em.em_id_pk=seu.seu_em_id_fk) where seu.seu_branchId_fk='".$branch_id."'");
    
    	$row_email=$result_email->result();
    
    	return $row_email[0]->email_count;
    }
    
    
    public function getAllSUCount()
    {
    	$branch_id=$this->session->userdata('branch_id');
    
    	$result_system_users=$this->db->query("Select count(su.sysu_id_pk) as system_users_count from tblmvbsystemusers su where su.sysu_branchId_fk='".$branch_id."'");
    
    	$row_system_users=$result_system_users->result();
    
    	return $row_system_users[0]->system_users_count;
    }
    
    public function getAllVisitorsCount()
    {
    	$branch_id=$this->session->userdata('branch_id');
    
    	$result_visitors=$this->db->query("Select count(vt.vis_id_pk) as visitors_count from tblmvbvisitors vt where vt.vis_branchId_fk='".$branch_id."'");
    
    	$row_visitors=$result_visitors->result();
    
    	return $row_visitors[0]->visitors_count;
    }
    
    public function addQuickVisitor()
    {
    	$branch_id=$this->session->userdata('branch_id');
    
    	$title=$this->input->post('seltitle');
    	$first_name=$this->input->post('txtfirstname');
    	$middle_name=$this->input->post('txtmiddlename');
    	$last_name=$this->input->post('txtlastname');
    	$mobile=$this->input->post('txtmobile');
    	$email=$this->input->post('txtemail');
    	$business_name=$this->input->post('txtbusiness');
    	$dob=$this->input->post('txtdob');
    	$anniversary=$this->input->post('txtanniversary');
    	$note=$this->input->post('txtnote');
    
    	$date=date('Y-m-d h:i:s');
    
    
    	$data=array('vis_branchId_fk'=>$branch_id,
    			'vis_title'=>$title,
    			'vis_firstName'=>$first_name,
    			'vis_middleName'=>$middle_name,
    			'vis_lastName'=>$last_name,
    			'vis_mobile'=>$mobile,
    			'vis_email'=>$email,
    			'vis_businessName'=>$business_name,
    			'vis_dob'=>$dob,
    			'vis_anniversaryDate'=>$anniversary,
    			'vis_note'=>$note,
    			'vis_createdDate'=>$date);
    
    	$this->db->insert('tblmvbvisitors',$data);
    	$insert_id=$this->db->insert_id();
    
    	return $insert_id;
    }
    
    public function trackRevisitors()
    {
    	$branch_id=$this->session->userdata('branch_id');
    
    	$mobile=$this->input->post('txtmobile');
    	$purpose=$this->input->post('txtpurpose');
    
    	$result_visitors_id=$this->db->query("Select vis_id_pk from tblmvbvisitors where vis_mobile='".$mobile."'");
    
    	$row_visitors_id=$result_visitors_id->result();
    
    	$visitors_id=$row_visitors_id[0]->vis_id_pk;
    
    	$date=date('Y-m-d h:i:s');
    
    	$data=array('rv_branch_id_fk'=>$branch_id,
    			'rv_visitors_id'=>$visitors_id,
    			'rv_purpose'=>$purpose,
    			'rv_date'=>$date);
    
    	$this->db->insert('tblmvbrevisitors',$data);
    	$insert_id=$this->db->insert_id();
    
    	return $insert_id;
    }

    public function getAllLatest5Visitors()
    {
            $branch_id=$this->session->userdata('branch_id');

            $result_visitors_id=$this->db->query("Select vis_firstName,vis_lastName,vis_mobile,vis_email,DATE_FORMAT(vis_createdDate,'%d/%m/%Y, %h:%i %p') as created_date from tblmvbvisitors where vis_branchId_fk='".$branch_id."' order by vis_createdDate desc limit 0,5");

            $row_visitors_id=$result_visitors_id->result();

            return $row_visitors_id;
    }

    public function getAllRecent5Revisit()
    {
            $branch_id=$this->session->userdata('branch_id');

            $result_revisitors_id=$this->db->query("Select vs.vis_firstName,vs.vis_lastName,vs.vis_mobile,vs.vis_email,DATE_FORMAT(rv.rv_date,'%d/%m/%Y, %h:%i %p') as created_date,rv.rv_purpose from tblmvbrevisitors rv left join tblmvbvisitors vs on (rv.rv_visitors_id=vs.vis_id_pk) where rv_branch_id_fk='".$branch_id."' order by rv.rv_date desc limit 0,5");

            $row_revisitors_id=$result_revisitors_id->result();

            return $row_revisitors_id;
    }


    public function getAllRecent5Activities()
    {
            $admin_user_id=$this->session->userdata('admin_admin_id');
            $branch_id=$this->session->userdata('branch_id');

            $result_recent_activities=$this->db->query("Select tl.atl_type,au.sysu_name from tblmvbatransactionlogs tl left join tblmvbsystemusers au on (tl.atl_admin_user_id_fk=au.sysu_id_pk) where tl.atl_branch_id_fk='".$branch_id."' and tl.atl_admin_user_id_fk='".$admin_user_id."' order by atl_activity_time desc limit 0,6");

            $row_recent_activities=$result_recent_activities->result();

            return $row_recent_activities;           
    }

    public function getAllUpcoming5Birth()
    {
            $branch_id=$this->session->userdata('branch_id');


            $result_birth=$this->db->query("Select vis_firstName,
                                            vis_lastName,
                                            vis_mobile,
                                            vis_email,
                                            (CASE 
                                            WHEN vis_anniversaryDate!='0000-00-00'
                                            THEN 
                                            (CASE WHEN DATE_FORMAT(vis_anniversaryDate,'%m-%d')>DATE_FORMAT(CURDATE(),'%m-%d') 
                                            THEN 
                                            (CASE WHEN DATE_FORMAT(vis_dob,'%m-%d')>DATE_FORMAT(vis_anniversaryDate,'%m-%d') 
                                            THEN vis_dob ELSE vis_anniversaryDate END) ELSE vis_dob END)
                                            ELSE
                                            vis_dob
                                            END) as event_date,

                                            (CASE 
                                            WHEN vis_anniversaryDate!='0000-00-00'
                                            THEN 
                                            (CASE WHEN DATE_FORMAT(vis_anniversaryDate,'%m-%d')>DATE_FORMAT(CURDATE(),'%m-%d') 
                                            THEN 
                                            (CASE WHEN DATE_FORMAT(vis_dob,'%m-%d')>DATE_FORMAT(vis_anniversaryDate,'%m-%d') 
                                            THEN 'DOB' ELSE 'Anniversary' END) ELSE 'DOB' END)
                                            ELSE
                                            'DOB'
                                            END) AS event_title 
                                            from tblmvbvisitors 
                                            where vis_branchId_fk='1' 
                                            and (DATE_FORMAT(vis_dob,'%m-%d')>DATE_FORMAT(CURDATE(),'%m-%d') or DATE_FORMAT(vis_anniversaryDate,'%m-%d')>DATE_FORMAT(CURDATE(),'%m-%d'))
                                            group by vis_id_pk,DATE_FORMAT(vis_dob,'%m-%d'),DATE_FORMAT(vis_anniversaryDate,'%m-%d')
                                            order by 
                                            (CASE 
                                            WHEN vis_anniversaryDate!='0000-00-00'
                                            THEN 
                                            (CASE WHEN DATE_FORMAT(vis_anniversaryDate,'%m-%d')>DATE_FORMAT(CURDATE(),'%m-%d') 
                                            THEN 
                                            (CASE WHEN DATE_FORMAT(vis_dob,'%m-%d')>DATE_FORMAT(vis_anniversaryDate,'%m-%d') 
                                            THEN vis_dob ELSE vis_anniversaryDate END) ELSE vis_dob END)
                                            ELSE
                                            vis_dob
                                            END)
                                            limit 0,5");

            $row_birth=$result_birth->result();

            return $row_birth;    
    }


    public function getAllLatest5Revisitors()
    {
            $branch_id=$this->session->userdata('branch_id');

            $result_latest_revisitors=$this->db->query("Select vs.vis_firstName,vs.vis_lastName,vs.vis_mobile,vs.vis_email,count(rv.rv_visitors_id) from tblmvbrevisitors rv left join tblmvbvisitors vs on (rv.rv_visitors_id=vs.vis_id_pk) where rv.rv_branch_id_fk='".$branch_id."' group by rv.rv_visitors_id order by count(rv.rv_visitors_id) desc limit 0,5");

            $row_latest_revisitors=$result_latest_revisitors->result();

            return $row_latest_revisitors;
    }


    public function getAllLatestVisitors()
    {
    	$branch_id=$this->session->userdata('branch_id');
    
    	$result_visitors_id=$this->db->query("Select vis_firstName,vis_lastName,vis_mobile,vis_email,DATE_FORMAT(vis_createdDate,'%d/%m/%Y, %h:%i %p') as created_date from tblmvbvisitors where vis_branchId_fk='".$branch_id."' order by vis_createdDate desc limit 0,5");
    
    	$row_visitors_id=$result_visitors_id->result();
    
    	return $row_visitors_id;
    }
    
    public function getAllRecentRevisit()
    {
    	$branch_id=$this->session->userdata('branch_id');
    
    	$result_revisitors_id=$this->db->query("Select vs.vis_firstName,vs.vis_lastName,vs.vis_mobile,vs.vis_email,DATE_FORMAT(rv.rv_date,'%d/%m/%Y, %h:%i %p') as created_date,rv.rv_purpose from tblmvbrevisitors rv left join tblmvbvisitors vs on (rv.rv_visitors_id=vs.vis_id_pk) where rv_branch_id_fk='".$branch_id."' order by rv.rv_date desc limit 0,5");
    
    	$row_revisitors_id=$result_revisitors_id->result();
    
    	return $row_revisitors_id;
    }
    
    public function getAllUpcomingBirth()
    {
    	$branch_id=$this->session->userdata('branch_id');
    
    	$result_birth_anni=$this->db->query("Select vis_firstName,vis_lastName,vis_mobile,vis_email,DATE_FORMAT(vis_dob,'Y-m-d') as event_date from tblmvbvisitors where vis_branchId_fk='".$branch_id."' and (vis_dob>'".date(Y-m-d)."')
                UNION
                Select vis_firstName,vis_lastName,vs.vis_mobile,vis_email,DATE_FORMAT(vis_dob,'Y-m-d') as event_date from tblmvbvisitors where vis_branchId_fk='".$branch_id."' and (vis_anniversaryDate>'".date(Y-m-d)."')
                limit 0,5");
    
    	$row_birth_anni=$result_birth_anni->result();
    
    	return $row_birth_anni;
    }
    
    // public function getAllLatestRevisitors()
    // {
    // 	$branch_id=$this->session->userdata('branch_id');
    
    // 	$result_latest_revisitors=$this->db->query("Select vs.vis_firstName,vs.vis_lastName,vs.vis_mobile,vs.vis_email,count(rv.rv_visitors_id) from tblmvbrevisitors rv left join tblmvbvisitors vs on (rv.rv_visitors_id=vs.vis_id_pk) where rv.rv_branch_id_fk='".$branch_id."' group by rv.rv_visitors_id order by count(rv.rv_visitors_id) desc limit 0,5");
    
    // 	$row_latest_revisitors=$result_latest_revisitors->result();
    
    // 	return $row_latest_revisitors;
    // }
    
    public function getAllCustomerSmssent()
    {
            $branch_id=$this->session->userdata('branch_id');

            $result_customers=$this->db->query("Select MONTHNAME(vs.ssu_cDate) as customer_mnths,count(vs.ssu_id_pk) as total_customer,SUM(vs.ssu_smsCount) as total_sms_sent from tblmvbsendsmsusers vs where vs.ssu_branchId_fk='".$branch_id."' group by DATE_FORMAT(vs.ssu_cDate,'%m')");

            $row_customers=$result_customers->result();

            // $result_sms_sent=$this->db->query("Select count(ssu_id_pk) as total_sms_sent from tblmvbsendsmsusers where ssu_branchId_fk='".$branch_id."'");

            // $row_sms_sent=$result_sms_sent->result();

            return $row_customers;
    }

    public function getAllCustomerAddedTrends()
    {
            $branch_id=$this->session->userdata('branch_id');

            $query_sms_sent=$this->db->query("Select DATE_FORMAT(vis_createdDate,'%Y') as visitor_year,count(vis_id_pk) as total_visitors from tblmvbvisitors where vis_branchId_fk='".$branch_id."' group by DATE_FORMAT(vis_createdDate,'%Y') DESC");

            $row_sms_sent=$query_sms_sent->result();    

            return $row_sms_sent;
    }

    // public function getAllLatestVisitors()
    // {
    //             $branch_id=$this->session->userdata('branch_id');

    //             $result_visitors_id=$this->db->query("Select vis_id_pk,vis_firstName,vis_lastName,vis_mobile,vis_email,DATE_FORMAT(vis_createdDate,'%d/%m/%Y, %h:%i %p') as created_date from tblmvbvisitors where vis_branchId_fk='".$branch_id."' order by vis_createdDate desc");

    //             $row_visitors_id=$result_visitors_id->result();

    //             return $row_visitors_id;
    // }

    public function getAllRecentRevisitors()
    {
                $branch_id=$this->session->userdata('branch_id');

                $result_revisitors_id=$this->db->query("Select vs.vis_firstName,vs.vis_lastName,vs.vis_mobile,vs.vis_email,DATE_FORMAT(rv.rv_date,'%d/%m/%Y, %h:%i %p') as created_date,rv.rv_purpose from tblmvbrevisitors rv left join tblmvbvisitors vs on (rv.rv_visitors_id=vs.vis_id_pk) where rv_branch_id_fk='".$branch_id."' order by rv.rv_date desc");

                $row_revisitors_id=$result_revisitors_id->result();

                return $row_revisitors_id;
    }


    public function getRecentActivities()
    {
                $admin_user_id=$this->session->userdata('admin_admin_id');
                $branch_id=$this->session->userdata('branch_id');

                $result_recent_activities=$this->db->query("Select tl.atl_type,au.sysu_name,tl.atl_activity_time from tblmvbatransactionlogs tl left join tblmvbsystemusers au on (tl.atl_admin_user_id_fk=au.sysu_id_pk) where tl.atl_branch_id_fk='".$branch_id."' and tl.atl_admin_user_id_fk='".$admin_user_id."' order by atl_activity_time desc");

                $row_recent_activities=$result_recent_activities->result();

                return $row_recent_activities;
    }

    public function getAllUpcomingBirthAnni()
    {
                $branch_id=$this->session->userdata('branch_id');

                $result_birth=$this->db->query("Select vis_firstName,
                                            vis_lastName,
                                            vis_mobile,
                                            vis_email,
                                            (CASE 
                                            WHEN vis_anniversaryDate!='0000-00-00'
                                            THEN 
                                            (CASE WHEN DATE_FORMAT(vis_anniversaryDate,'%m-%d')>DATE_FORMAT(CURDATE(),'%m-%d') 
                                            THEN 
                                            (CASE WHEN DATE_FORMAT(vis_dob,'%m-%d')>DATE_FORMAT(vis_anniversaryDate,'%m-%d') 
                                            THEN vis_dob ELSE vis_anniversaryDate END) ELSE vis_dob END)
                                            ELSE
                                            vis_dob
                                            END) as event_date,

                                            (CASE 
                                            WHEN vis_anniversaryDate!='0000-00-00'
                                            THEN 
                                            (CASE WHEN DATE_FORMAT(vis_anniversaryDate,'%m-%d')>DATE_FORMAT(CURDATE(),'%m-%d') 
                                            THEN 
                                            (CASE WHEN DATE_FORMAT(vis_dob,'%m-%d')>DATE_FORMAT(vis_anniversaryDate,'%m-%d') 
                                            THEN 'DOB' ELSE 'Anniversary' END) ELSE 'DOB' END)
                                            ELSE
                                            'DOB'
                                            END) AS event_title 
                                            from tblmvbvisitors 
                                            where vis_branchId_fk='1' 
                                            and (DATE_FORMAT(vis_dob,'%m-%d')>DATE_FORMAT(CURDATE(),'%m-%d') or DATE_FORMAT(vis_anniversaryDate,'%m-%d')>DATE_FORMAT(CURDATE(),'%m-%d'))
                                            group by vis_id_pk,DATE_FORMAT(vis_dob,'%m-%d'),DATE_FORMAT(vis_anniversaryDate,'%m-%d')
                                            order by 
                                            (CASE 
                                            WHEN vis_anniversaryDate!='0000-00-00'
                                            THEN 
                                            (CASE WHEN DATE_FORMAT(vis_anniversaryDate,'%m-%d')>DATE_FORMAT(CURDATE(),'%m-%d') 
                                            THEN 
                                            (CASE WHEN DATE_FORMAT(vis_dob,'%m-%d')>DATE_FORMAT(vis_anniversaryDate,'%m-%d') 
                                            THEN vis_dob ELSE vis_anniversaryDate END) ELSE vis_dob END)
                                            ELSE
                                            vis_dob
                                            END)");

                $row_birth=$result_birth->result();

                return $row_birth;
    }

    public function getLatestRevisitors()
    {
                $branch_id=$this->session->userdata('branch_id');

                $result_latest_revisitors=$this->db->query("Select vs.vis_firstName,vs.vis_lastName,vs.vis_mobile,vs.vis_email,count(rv.rv_visitors_id) from tblmvbrevisitors rv left join tblmvbvisitors vs on (rv.rv_visitors_id=vs.vis_id_pk) where rv.rv_branch_id_fk='".$branch_id."' group by rv.rv_visitors_id order by count(rv.rv_visitors_id) desc");

                $row_latest_revisitors=$result_latest_revisitors->result();

                return $row_latest_revisitors;
    }

    public function getAllQuickAddManagement()
    {
                $result_quick_mgt=$this->db->query("select predefine_id_pk,predefine_name,predefine_show from tblmvbquickpredefine");

                $row_quick_mgt=$result_quick_mgt->result();

                return $row_quick_mgt;
    }

    public function getAddQuickAddManagement()
    {
                $result_quick_mgt=$this->db->query("select qa.additional_id_pk,qa.additional_visitfieldid_fk,vf.visitfield_type,vf.visitfield_name,vf.visitfield_length,vf.visitfield_selection from tblmvbquickadditional qa left join tblmvbvisitfield vf on (qa.additional_visitfieldid_fk=vf.visitfield_id_pk) where qa.additional_status='1' and vf.visitfield_status='1' and vf.visitfield_delete='0'");

                $row_quick_mgt=$result_quick_mgt->result();

                return $row_quick_mgt;
    }


    public function getAllPicklistData($visitfield_id)
    {
                $result_picklist=$this->db->query("select visitval_value from tblmvbvisitfieldvalue where visitval_fieldId_fk='".$visitfield_id."'");

                $row_picklist=$result_picklist->result();

                return $row_picklist;
    }


    public function getAllContactGroup()
    {
                $branch_id=$this->session->userdata('branch_id');

                $result_contact=$this->db->query("select grp_id_pk,grp_name from tblmvbgroups where grp_branchId_fk='".$branch_id."' and grp_status='1'");

                $row_contact=$result_contact->result();

                return $row_contact;
    }

    public function getAllCountryList()
    {
                $branch_id=$this->session->userdata('branch_id');

                $result_country=$this->db->query("select cntr_id_pk,cntr_name from tblmvbcountry where cntr_status='1'");

                $row_country=$result_country->result();

                return $row_country;
    }    

    public function getAllStateList($country_id)
    {
                $result_state=$this->db->query("select stat_id_pk,stat_name from tblmvbstate where stat_countryId_fk='".$country_id."' and stat_status='1'");

                $row_state=$result_state->result();

                return $row_state;       
    }

    public function getAllCityList($state_id)
    {
                $result_city=$this->db->query("select cty_id_pk,cty_name from tblmvbcity where cty_stateId_fk='".$state_id."' and cty_status='1'");

                $row_city=$result_city->result();

                return $row_city;
    }
    
}
?>
