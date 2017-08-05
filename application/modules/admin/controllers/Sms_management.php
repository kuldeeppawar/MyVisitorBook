<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sms_management extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();

        $this->load->model('sms_management_model');

        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->library('jwt-master/JWT');
        $this->load->library('encryption');
        $this->load->library('PHPExcel');


        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    }

    // ==================== all page session check ===================== //
    public function Checklogin() {
        if ($this->session->userdata('admin_admin_email') == '') {
            redirect('admin/');
        }
    }

    public function index() {
        $this->Checklogin();
        $data['resultCampaign'] = $this->sms_management_model->getAllfield();
        $data ['include'] = 'admin/sms_management/getSmscampainform';
        $data ['admin_section'] = 'manage_sms';
        //setSAActivityLogs('Transaction_activity','SAAddvisitorform_view');
        $this->load->view('backend/container', $data);
    }

    // --Function Used to Load Additional field list--//
    public function getSmsCampaignform() {
        $this->Checklogin();
        $data['resultField'] = $this->sms_management_model->getAllfield();
        $data ['include'] = 'admin/sms_management/addvisitor_field';
        $data ['admin_section'] = 'manage_sms';
        //setSAActivityLogs('Transaction_activity','SAAddvisitorform_view');
        $this->load->view('backend/container', $data);
    }

    public function bulk_sms() {
        $this->Checklogin();
		$user="";
		$way="";
		if (isset($_POST['user']))
		{
			$user=$this->input->post("user");
		}
		if (isset($_POST['way']))
		{
			$way=$this->input->post("way");
		}

		$data['user']=$user;
		$data['way']=$way;
        $data['resultGroup'] = $this->sms_management_model->getuserGroup();
        $data['resultUser'] = $this->sms_management_model->getuser();
        $data['resultTemplateReq'] = $this->sms_management_model->getTemplateRequest();
        $data['resultSmsSignature'] = $this->sms_management_model->getSmsSignature();
        $data['resultSenders'] = $this->sms_management_model->getSenderId();
        $data['resultgetFieldsOptionsAll'] = $this->getFieldsOptionsAll();
        $data['resultgetFieldOperation'] = $this->getFildOperation();        
        $data ['include'] = 'admin/sms_management/bulk_sms';
        $data ['admin_section'] = 'manage_sms';
        //setAActivityLogs('Transaction_activity','SAAddvisitorform_view');
        $this->load->view('backend/container', $data);
    }

    public function addCampaign() {

        $this->Checklogin();
        
        
        
        //$this->sms_management_model->addCampaingRecord();
        if (isset($_POST['submit'])) {
            $postData = $this->input->post();
            print_r($_POST);
            //it not schedule
            // if(!isset($_POST['schedule']))
            // {
                    //$check_selection = $_POST['chk1'];
                    //if(!empty($_POST['selectSearchName']))
                    //{
                    //    $selectSearchName = $_POST['selectSearchName'];
                    //    for($k=0;$k<count($selectSearchName);$k++)
                    //    {
                    //       echo "<br/>". $_POST['selectSearchName'][$k];
                    //       
                    //       $arr = $this->sms_management_model->getVisitorMobile($_POST['selectSearchName'][$k]);
                    //       echo "<br/>------MObile No---------------<br/>";
                    //               print_r($arr);
                    //       echo "<br/>-------------------<br/>";
                    //       
                    //       //Check Branch Balance SMS Count
                    //
                    //        $msg = $this->input->post('txtMessage');
                    //        $replaced_string=$this->sms_management_model->SMSString($msg,$_POST['selectSearchName'][$k]);
                    //                 
                    //        $check_msg_length=strlen($replaced_string);
                    //       
                    //       if($check_msg_length<=160)
                    //        {
                    //               $sms_count=1;
                    //        }
                    //        else 
                    //        {
                    //               $sms_count=round($check_msg_length/160);
                    //        }
                    //       
                    //       $check_sms_balance=$this->sms_management_model->getBranchBalance($branch_id);
                    //       
                    //       if($sms_count<=$check_sms_balance)
                    //       {
                    ////                 $sender=$arr[0]->vis_mobile;
                    ////                 $this->sendsms($sender, $replaced_string);
                    ////                 
                    //                 
                    //       }
                    //       
                    //     //  $sender=$arr[0]->vis_mobile;
                    //      //  $msg = $this->input->post('txtMessage');
                    //     //   $replaced_string=$this->sms_management_model->SMSString($msg,$advanceSearchUserId[$k]);
                    //     //   $this->sendsms($sender, $replaced_string);
                    //         
                    //       //phone number encrypted asel decrepted karava lagel
                    //       //branch id kadhaycha --- session madhun kadhaycha
                    //       // branch cha sms balacne kiti ahe check karaycha 
                    //       // branch cha sms count deduct hoil
                    //       // check text message length english 160  non english 150 then deduct count from sms balane
                    //       
                    //    }
                    //}
                    //
                    //elseif(!empty($_POST['selectSearchGroup']))
                    //{
                    //    $selectSearchGroup = $_POST['selectSearchGroup'];
                    //    for($k=0;$k<count($selectSearchGroup);$k++)
                    //    {
                    //       echo "<br/>". $_POST['selectSearchGroup'][$k];
                    //        
                    //      $get_group_visitors=$this->sms_management_model->getGroupVisitors($_POST['selectSearchGroup'][$k]);    
                    //      
                    //      for($vt=0;$vt<count($get_group_visitors);$vt++)
                    //      {    
                    //            $sender=$get_group_visitors[$vt]->vis_mobile;
                    //            $msg = $this->input->post('txtMessage');
                    //            $replaced_string=$this->sms_management_model->SMSString($msg,$advanceSearchUserId[$k]);
                    //            $this->sendsms($sender, $replaced_string); 
                    //      
                    //      }
                    //      
                    //      
                    //       
                    //       //phone number encrypted asel decrepted karava lagel
                    //       //branch id kadhaycha --- session madhun kadhaycha
                    //       // branch cha sms balacne kiti ahe check karaycha  tblmvbbranches smscount
                    //       // branch cha sms count deduct hoil tblmvbbranches smscount deduct
                    //       // check text message length english 160  non english 150 then deduct count from sms 
                    //       // balance check whether message lenght 160 if it exceeds lenght 160 then count sms whatever the count will be in tblmvbsendsmsusers 
                    //        //send notification if balance gets 0 to admin user
                    //       
                    //    }
                    //}
                    //
                    //elseif(!empty($_POST['advanceSearchUserId']))
                    //{
                    //    $advanceSearchUserId = explode(",",$_POST['advanceSearchUserId']);
                    //    for($k=0;$k<count($advanceSearchUserId);$k++)
                    //    {
                    //        echo "<br/>".$advanceSearchUserId[$k];
                    //        $arr = $this->sms_management_model->getVisitorMobile($advanceSearchUserId[$k]);
                    //        $sender = $arr[0]->vis_mobile;
                    //        $msg = $this->input->post('txtMessage');
                    //        $replaced_string=$this->sms_management_model->SMSString($msg,$advanceSearchUserId[$k]);
                    //        $this->sendsms($sender, $replaced_string);
                    //       //phone number encrypted asel decrepted karava lagel
                    //       //branch id kadhaycha --- session madhun kadhaycha
                    //       // branch cha sms balacne kiti ahe check karaycha 
                    //       // branch cha sms count deduct hoil
                    //       // check text message length english 160  non english 150 then deduct count from sms balane
                    //       
                    //    }
                    //}
                    $send_sms_users=$this->sms_management_model->addCampaingRecord($postData);
                
                    if($send_sms_users)
                    {
                                $this->session->set_flashdata('success', 'Campaing has been added successfully.');
                                redirect('admin/sms_management');
                    }
                    else
                    {
                                $this->session->set_flashdata('error', 'Unable to save Campaing.');
                                redirect('admin/sms_management');
                    }   
            // }
            // else
            // {
                //schedule and save in system. sms will send through cron job
                
                    // $send_sms_users=$this->sms_management_model->addScheduleCampaingRecord($postData);
                
                    // if($send_sms_users)
                    // {
                    //             $this->session->set_flashdata('success', 'Campaing has been added successfully.');
                    //             redirect('admin/sms_management');
                    // }
                    // else
                    // {
                    //             $this->session->set_flashdata('error', 'Unable to save Campaing.');
                    //             redirect('admin/sms_management');
                    // }    
                    
            //}


    //exit();        
//               if (!isset($_POST['schedule'])) 
//               {
//                $senderid = $this->input->post('selectSenderId');
//                $arr = $this->sms_management_model->getSenderMobile($senderid);
//                $sender = $arr[0]->vis_mobile;
//                $msg = $this->input->post('txtMessage');
//                $this->sendsms($sender, $msg);
//                }
//                $postData = $this->input->post();
//                if ($this->sms_management_model->addCampaingRecord($postData)) {
//                $this->session->set_flashdata('success', 'Campaing has been added successfully.');
//                redirect('admin/sms_management');
//            } else {
//                $this->session->set_flashdata('error', 'Unable to save Campaing.');
//                redirect('admin/sms_management');
//            }
       } else {
           redirect('admin/branch');
       }




        //print_r($postData);
    }

    public function sendsms($sender, $msg) {

        $request = "http://49.50.69.90/api/smsapi.aspx?username=mykeyword&password=mykeyword@123&from=KEYWRD&to=91" . $sender . "&message=" . urlencode($msg);
        $data = '';
        $objURL = curl_init($request);
        curl_setopt($objURL, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($objURL, CURLOPT_POST, 1);
        curl_setopt($objURL, CURLOPT_POSTFIELDS, $data);
        $retval = trim(curl_exec($objURL));
        curl_close($objURL);
    }

    public function getFieldsOptions() {
        $fields_type = $_POST['type_fields_id'];

        $html = '';

        if ($fields_type == 'basic_fields') {
            $html.='<li class="list-group-item">Title</li>

                            <li class="list-group-item">First Name</li>

                            <li class="list-group-item">Middle Name</li>

                            <li class="list-group-item">Last Name</li>

                            <li class="list-group-item">Mobile Number</li>

                            <li class="list-group-item">Email Id</li>';
        } else if ($fields_type == 'contact_details') {
            $html.='<li class="list-group-item">Address</li>

                            <li class="list-group-item">Zip Code</li>

                            <li class="list-group-item">Country</li>

                            <li class="list-group-item">State</li>

                            <li class="list-group-item">City</li>

                            <li class="list-group-item">Website</li>

                            <li class="list-group-item">Landline Number</li>

                            <li class="list-group-item">Fax</li>';
        } else if ($fields_type == 'personal_info') {
            $html.='<li class="list-group-item">Contact Group</li>

                            <li class="list-group-item">Business Category</li>

                            <li class="list-group-item">Business Name</li>

                            <li class="list-group-item">DOB</li>

                            <li class="list-group-item">Anniversary Date</li>';
        } else {
            $client_id = $this->session->userdata('client_id');

            $result_custom_fields = $this->db->query("Select cfi_label From tblmvbcustomfields where (cfi_clientId='" . $client_id . "' OR cfi_clientId='0') and cfi_status='1'");

            $row_custom_fields = $result_custom_fields->result();

            if (count($row_custom_fields) > 0) {
                for ($k = 0; $k < count($row_custom_fields); $k++) {
                    $html.='<li class="list-group-item">' . $row_custom_fields[$k]->cfi_label . ' </li>';
                }
            }
        }

        echo $html;
    }

    public function getFildOperation() {
        $html = array('1' => 'starts with', '2' => 'ends with', '3' => 'equals', '4' => 'not equal to', '5' => 'contains', '6' => 'does not contains', '7' => 'less than', '8' => 'greater than', '9' => 'less than or equal to', '10' => 'greater than or equal to', '11' => 'between');
        return $html;
    }

    public function getFieldsOptionsAll() {
        $html = '';
        $html = array('Title', 'First Name', 'Middle Name', 'Last Name', 'Mobile Number', 'Email Id', 'Address', 'Zip Code', 'Country', 'State', 'City', 'Website', 'Landline Number', 'Fax', 'Contact Group', 'Business Category', 'Business Name', 'DOB', 'Anniversary Date');
        $client_id = $this->session->userdata('client_id');
        $result_custom_fields = $this->db->query("Select cfi_label From tblmvbcustomfields where (cfi_clientId='" . $client_id . "' OR cfi_clientId='0') and cfi_status='1'");

        $row_custom_fields = $result_custom_fields->result();

        if (count($row_custom_fields) > 0) {
            for ($k = 0; $k < count($row_custom_fields); $k++) {
                // $html.='<li class="list-group-item">'.$row_custom_fields[$k]->cfi_label.' </li>';
                array_push($html, $row_custom_fields[$k]->cfi_label);
            }
        }



        return $html;
    }

    public function formConditionqry($column, $txt, $key, $cond) {
        $masterColumn = array('Title' => 'vis_title', 'First Name' => 'vis_firstName', 'Middle Name' => 'vis_middleName', 'Last Name' => 'vis_lastName', 'Mobile Number' => 'vis_mobile', 'Email Id' => 'vis_email', 'Address' => 'vis_address', 'Zip Code' => 'vis_zipCode', 'Country' => 'vis_countryId_fk', 'State' => 'vis_stateId_fk', 'City' => 'vis_cityId_fk', 'Website' => 'vis_website', 'Landline Number' => 'vis_landline', 'Fax' => 'vis_fax', 'Contact Group', 'Business Category' => 'vis_businessCategory', 'Business Name' => 'vis_businessName', 'DOB' => 'vis_dob', 'Anniversary Date' => 'vis_anniversaryDate');
        //$vvv=array_key_exists($column, $masterColumn);
        $columnKeyvalue = isset($masterColumn[$column]) ? $masterColumn[$column] : null;
        // print_r($vvv);
        if ($cond == 1) {
            $cond = " AND ";
        } else if ($cond == 2) {
            $cond = " OR ";
        } else {
            $cond = " ";
        }
        if ($key == 1) {
            return $qry = " " . $columnKeyvalue . " like '" . $txt . "%' " . $cond . "";
        } else if ($key == 2) {
            return $qry = " " . $columnKeyvalue . " like '%" . $txt . "' " . $cond . "";
        } else if ($key == 3) {
            return $qry = " " . $columnKeyvalue . "='" . $txt . "' " . $cond . "";
        } else if ($key == 4) {
            return $qry = " " . $columnKeyvalue . "<>'" . $txt . "' " . $cond . "";
        } else if ($key == 5) {
            return $qry = " " . $columnKeyvalue . " IN ('" . $txt . "') " . $cond . "";
        } else if ($key == 6) {
            return $qry = " " . $columnKeyvalue . " NOT IN ('" . $txt . "') " . $cond . "";
        } else if ($key == 7) {
            return $qry = " " . $columnKeyvalue . " < '" . $txt . "' " . $cond . "";
        } else if ($key == 8) {
            return $qry = " " . $columnKeyvalue . " > '" . $txt . "' " . $cond . "";
        } else if ($key == 9) {
            return $qry = " " . $columnKeyvalue . " <= '" . $txt . "' " . $cond . "";
        } else if ($key == 10) {
            return $qry = " " . $columnKeyvalue . " >= '" . $txt . "' " . $cond . "";
        } else if ($key == 11) {
            return $qry = " " . $columnKeyvalue . " BETWEEN '' AND '" . $txt . "' " . $cond . "";
        } else {
            
        }
    }

    public function getFilterCount() {
        $postData = $this->input->post();
        $columnName = $postData['searchField1'];
        $condition = $postData['searchField2'];
        $searchKeyword = $postData['searchField3'];
        $cond_operation = $postData['searchField4'];

        $branch_id=$this->session->userdata('branch_id');

        //echo count($columnName);
        $str = "";
        $strQry = "";
        for ($i = 0; $i < count($columnName); $i++) {
            if ($i <> (count($columnName) - 1)) {

                if ($cond_operation == 1) {
                    $str1 = $cond_operation;
                } else if ($cond_operation == 2) {
                    $str1 = $cond_operation;
                } else {
                    $str1 = "";
                }
            } else {
                $str1 = "";
            }
            $strQry .=" " . $this->formConditionqry($columnName[$i], $searchKeyword[$i], $condition[$i], $str1);

            //print_r($columnName);
            //echo $columnName;
        }
        //echo $query= " select * from tblmvbvisitors where"." ".$strQry;

        $query = $this->db->query("select * from tblmvbvisitors where vis_branch_id='".$branch_id."' and vis_mobile NOT IN (Select oo_mobile from tblmvboptout where oo_status='1') and" . " " . $strQry);
        $query1 = $this->db->query("select GROUP_CONCAT(vis_id_pk) as visitorId from tblmvbvisitors where vis_branch_id='".$branch_id."' and vis_mobile NOT IN (Select oo_mobile from tblmvboptout where oo_status='1') and" . " " . $strQry);
        $visitors = $query1->result();
        //echo $this->db->last_query();
        //print_r($query->num_rows());
        //print_r($visitors);
        echo $query->num_rows() . "@~~@" . $visitors[0]->visitorId;
    }

    //
    public function downloadCampCSV222() {

        $file_name = 'recordcsv' . time() . '.csv';



        $condition = "INTO OUTFILE '" . base_url() . 'uploads/' . $file_name . "'
                   FIELDS ENCLOSED BY '\"' TERMINATED BY ','
                   ESCAPED BY '\"'
                   LINES TERMINATED BY '\r\n'";


        $result = $this->db->query("SELECT sm_sms_content " . $condition . " FROM tblmvbsmsmangement where sm_client_id=1 ");
        $row_ddd = array();

        //$row_ddd=$result->result();

        if ($result->num_rows() > 0) {
            // query returned results
        } else {
            // query returned no results
        }



        $a = 1;
        if ($a == 1) {

            $file = $file_name; //path to the file on disk
            $filename = 'uploads/' . basename($file);

            if (file_exists($filename)) {
                //set appropriate headers
                header('Content-Description: File Transfer');
                header('Content-Type: application/csv');
                header('Content-Disposition: attachment; filename=' . $file);
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($filename));
                ob_clean();
                flush();
                //read the file from disk and output the content.
                readfile($filename);
            }
        }
        exit();
    }

    public function downloadCampCSV123123() {
        $result = $this->db->query("SELECT * FROM tblmvbsmsmangement where sm_client_id=1 ");
        $CampaignDetails = $result->result();

        $contents = '"Sr No","Campaign Name","Sent On /Scheduling Date","Message Details","Contact Group","SMS Count"';
        //}
        $contents .="\n\n";

        // Get Records from the table
        // while ($row = mysql_fetch_array($sql_1)) {
        $smsCount = 0;
        $a = 1;
        for ($i = 0; $i < count($CampaignDetails); $i++) {
            $query = $this->db->query("select ssu_id_pk from tblmvbsendsmsusers where ssu_sm_id_fk='" . $CampaignDetails[$i]->sm_id_pk . "'");

            $smsCount = $query->num_rows();
            if ($CampaignDetails[$i]->sm_sms_type == '1') {
                $campType = 'Group';
                //tblmvbgroups where grp_branchId_fk=1
                //$smsCount +=$smsCount;
            } else {
                $campType = 'NA';
            }
            if ($CampaignDetails[$i]->sm_sms_content == '') {
                $content = "NA";
            } else {
                $content = $CampaignDetails[$i]->sm_sms_content;
            }
            //echo $CampaignDetails[$i]->$i;die();
            $contents .='"' . $a . '","' . $CampaignDetails[$i]->sm_campaign_name . '","' . $CampaignDetails[$i]->sm_sms_schedule_date . '","' . mb_convert_encoding($content, 'UTF-16LE', 'UTF-8') . '","' . $campType . '","' . $smsCount . '" ';
            $contents.="\n";
            $a++;
        }
        /* echo $contents;
          die(); */
        $contents = strip_tags($contents);


        //header to make force download the file
        /* Header("Cache-Control: public"); 
          Header("Content-Type: application/octet-stream");
          Header("Content-Type: text/csv; charset=utf-8"); */
        //$contents=chr(255).chr(254).mb_convert_encoding($contents, 'UTF-16LE', 'UTF-8');

        Header("Content-Disposition: attachment;filename=campign_Record.csv ");
        //$contents=chr(255).chr(254).mb_convert_encoding($contents, 'UTF-16LE', 'UTF-8');
        print $contents;
        exit;
    }

    public function downloadCampCSV() {
        $result = $this->db->query("SELECT * FROM tblmvbsmsmangement where sm_client_id=1 ");
        $CampaignDetails = $result->result();
        //$result_nutritions=$this->product_model->getAllNutritions();
        $objPHPExcel = new PHPExcel();

        // Set properties
        $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
                ->setLastModifiedBy("Maarten Balliauw")
                ->setTitle("Office 2007 XLSX Test Document")
                ->setSubject("Office 2007 XLSX Test Document")
                ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                ->setKeywords("office 2007 openxml php")
                ->setCategory("Test result file");

        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Content');
        /*  $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Nutrition Name');
          $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Id');
          $objPHPExcel->getActiveSheet()->setCellValue('F1', 'Unit Name'); */
        $row = 3;
        for ($i = 0; $i < count($CampaignDetails); $i++) {
            $row++;
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A' . $row, mb_convert_encoding(html_entity_decode($CampaignDetails[$i]->sm_sms_content), 'UTF-16LE', 'UTF-8'));
            //$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$row, $result_nutritions[$i]->name);
        }


        $objPHPExcel->getActiveSheet()->setTitle('Simple');


        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);


        // Redirect output to a client’s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="nutrition_unit.csv"');
        header('Cache-Control: max-age=0');

        //$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        //$objWriter->save('php://output');

        $objWriter = new PHPExcel_Writer_CSV($objPHPExcel);
        $objWriter->save('php://output');


        exit;
    }
    
    // public function cron_sms_file() 
    // {
        
    //     // date comarison 
    //     $result_cron_sms = $this->db->query("select * from tblmvbsmsmangement where sm_sms_schedule_status='1' and DATE_FORMAT('%Y-%m-%d',sm_sms_schedule_date)='".date('Y-m-d')."' ");
    //     $row_cron_sms = $result_cron_sms->result();
    //     if(count($row_cron_sms) > 0 )
    //     {
    //         for($r=0;$r<count($row_cron_sms);$r++)
    //         {
    //                     $branch_id=$row_cron_sms[$r]->branch_id;
    //                     $client_id=$row_cron_sms[$r]->client_id

    //                     $branch_balance_details=$this->getBranchBalance($branch_id);

    //                     $random_number=rand(100000,999999);

    //                     $branch_balance=$branch_balance_details;                        

    //                     $counter=0;
    //                     $limit_counter=10000;

    //                     $sms_gateway_api=$this->getSmsGatewayApiDetails();

    //                     $gateway_username=$sms_gateway_api[0]->username;

    //                     $gateway_password=$sms_gateway_api[0]->password;

    //                     $client_sender_id=$this->getClientSenderIdDefault($client_id); 

    //                     $sms_id =  $row_cron_sms[$r]->sm_id_pk;
    //                     $sms_schedule_date =  $row_cron_sms[$r]->sm_sms_schedule_date;


    //                //if($sms_schedule_date!='0000-00-00 00:00:00')
    //                //{

    //                     $result_cron_sms_user = $this->db->query("select * from tblmvbsendsmsusers where ssu_sm_id_fk='".$sms_id."' ");
    //                     $row_cron_sms_user = $result_cron_sms_user->result();
    //                     if(count($row_cron_sms_user) > 0 )
    //                     {
    //                             $total_visitor_count=30000;//count($row_cron_sms_user)/10000;      //eg- 30000

    //                             $final_total_visitor_counter=4;//ceil($total_visitor_count)+1;            //eg - 4 

    //                             $total_sms_char_length=170;//strlen($row_cron_sms[$r]->sm_sms_content);

    //                             if($total_sms_char_length<=160)
    //                             {
    //                                     $sms_count=1;
    //                                     $total_sms_to_send=30000*$sms_count;//count($row_cron_sms_user)*$sms_count;

    //                                     if($branch_balance>=$total_sms_to_send)
    //                                     {
    //                                             $no_of_visitors=30000;//count($row_cron_sms_user);   
    //                                     }
    //                                     else
    //                                     {
    //                                             $no_of_visitors=$total_sms_to_send/$sms_count;  
    //                                     }
    //                             }
    //                             else
    //                             {
    //                                     $sms_count=ceil($total_sms_char_length/160);              //eg - 2

    //                                     $total_sms_to_send=30000*$sms_count;//count($row_cron_sms_user)*$sms_count; 
    //                                     //eg - 30000*2 = 60000 

    //                                     if($branch_balance>=$total_sms_to_send)                          //eg - 25000>=60000
    //                                     {
    //                                             $no_of_visitors=30000;//count($row_cron_sms_user);                                //
    //                                     }
    //                                     else
    //                                     {
    //                                             $no_of_visitors=$branch_balance/$sms_count;   
    //                                             //eg - 25000/2 = 12500            
    //                                     }   
    //                             }


    //                             for($k=0;$k<$final_total_visitor_counter;$k++)
    //                             {
    //                                     $xmlstring='';
                                    // add this '//?->' to end of below line
    //                             $xmlstring .= '<?xml version=\"1.0\" encoding=\"utf-8\" //                                             <data>';

    //                                     for(;$counter<$limit_counter;$counter++)
    //                                     {
    //                                                $userMessageStr =  $row_cron_sms_user[$counter]->ssu_message_details;

    //                                                $visitor_id =  $row_cron_sms_user[$counter]->ssu_visitor_id;

    //                                                $group_id = $row_cron_sms_user[$counter]->ssu_group_id;

    //                                                $MobileNo=$this->getUserMobileNo($visitor_id);
                          
    //                                                if($counter<=$no_of_visitors)
    //                                                {
    //                                                         $xmlstring.='<user>
    //                                                                         <name>'.$gateway_username.'</name>
    //                                                                         <password>'.$gateway_password.'</password>
    //                                                                         <from>'.$client_sender_id.'</from>
    //                                                                         <to>'.$MobileNo.'</to>
    //                                                                         <text>'.$userMessageStr.'</text> 
    //                                                                         <coding>0</coding>
    //                                                                     </user>';
                                                                                                                                
                                                                       
    //                                                         $cmapainUserLogs=array(
    //                                                         'ssul_sm_id_fk'=>$sms_id,
    //                                                         'ssul_group_id_fk'=>$group_id,
    //                                                         'ssul_visitor_id_fk'=>$visitor_id,
    //                                                         'ssul_client_id_fk'=>$client_id,
    //                                                         'ssul_branchId_fk'=>$branch_id,    
    //                                                         'ssul_message_details'=>$userMessageStr,
    //                                                         'ssul_cDate'=>date('Y-m-d H:i:s'),
    //                                                         'ssu_smsstatus'=>0,    
    //                                                         'ssul_smssendstatus'=>0,
    //                                                         'ssul_failed_reason'=>'Not Delivered',
    //                                                         'ssul_ack_id'=>0,
    //                                                         'ssul_msg_id'=>0,
    //                                                         'ssul_smsCount'=>$sms_count,
    //                                                         'ssul_sendFor'=>'send_sms_normal',
    //                                                         'ssul_unique_identifier'=>$random_number,
    //                                                         'ssul_scheduled'=>$status);
                                                            
    //                                                         $this->db->insert('tblmvbsendsmsuserslogs',$cmapainUserLogs);                          
    //                                                }
    //                                                else
    //                                                {
    //                                                         $cmapainUserLogs=array(
    //                                                                         'ssul_sm_id_fk'=>$sms_id,
    //                                                                         'ssul_group_id_fk'=>0,
    //                                                                         'ssul_visitor_id_fk'=>$visitor_id,
    //                                                                         'ssul_client_id_fk'=>$client_id,
    //                                                                         'ssul_branchId_fk'=>$branch_id,    
    //                                                                         'ssul_message_details'=>$userMessageStr,
    //                                                                         'ssul_cDate'=>date('Y-m-d H:i:s'),
    //                                                                         'ssu_smsstatus'=>0,    
    //                                                                         'ssul_smssendstatus'=>0,
    //                                                                         'ssul_failed_reason'=>'Insuficient SMS credit',
    //                                                                         'ssul_ack_id'=>0,
    //                                                                         'ssul_msg_id'=>0,
    //                                                                         'ssul_smsCount'=>$sms_count,
    //                                                                         'ssul_sendFor'=>'send_sms_normal',
    //                                                                         'ssul_scheduled'=>$status);
                                                                            
    //                                                         $this->db->insert('tblmvbsendsmsuserslogs',$cmapainUserLogs);

    //                                                         $counter_to_sent=0;

    //                                                         if($counter_to_sent==0)
    //                                                         {
    //                                                                 $this->sendAdminNotifyEMAIL('Insuficient Balance - Send SMS');

    //                                                                 $counter_to_sent++;
    //                                                         }
    //                                                }
    //                                     }

    //                                     $url = 'http://49.50.67.32/nxmlapi/xmlsmsapi.jsp';
                               
    //                                     $objURL = curl_init($url);
    //                                     curl_setopt($objURL, CURLOPT_HTTPHEADER,"content-type: application/xml");
    //                                     curl_setopt($objURL, CURLOPT_RETURNTRANSFER, 1); 
    //                                     curl_setopt($objURL, CURLOPT_POST,1);
    //                                     curl_setopt($objURL, CURLOPT_POSTFIELDS,$xmlstring);
    //                                     $retval = trim(curl_exec($objURL));

    //                                     curl_close($objURL);    
    //                                     $xml = new SimpleXMLElement($retval); 


    //                                     $sms_ack_id=$xml->ackid;
                                        

    //                                     foreach($xml->msgid as $msg_id)
    //                                     {
    //                                                $explode_msg_id=explode(","$msg_id);

    //                                                $explode_parts_msgid=$explode_msg_id[0];
    //                                                $explode_parts_mobno=$explode_msg_id[1];

    //                                                $result_visitor_details=$this->db->query("Select vis_id_pk from tblmvbvisitors where vis_mobile='".$explode_parts_mobno."'");

    //                                                $row_visitor_details=$result_visitor_details->result();

    //                                                $this->db->query("Update tblmvbsendsmsuserslogs set ssul_failed_reason='NULL',ssul_ack_id='".$sms_ack_id."',ssul_msg_id='".$explode_parts_msgid."' where ssul_visitor_id_fk='".$visitor_id."' and ssul_sm_id_fk='".$sms_id."' and ssul_unique_identifier='".$random_number."' and DATE(ssul_cDate)='".date('Y-m-d')."'");
    //                                     }


    //                                     $count_success_delivered=count($xml->msgid);

    //                                     $total_balance_deduct=$count_success_delivered*$sms_count;

    //                                     $this->db->query("Update tblmvbbranches set brn_smsCredit=brn_smsCredit-'".$total_balance_deduct."' where brn_id_pk='".$branch_id."'");


    //                                     if($limit_counter>=30000)//count($row_cron_sms_user)
    //                                     {
    //                                             $limit_counter=30000;//count($row_cron_sms_user);
    //                                     }   
    //                                     else
    //                                     {
    //                                             $limit_counter+=10000;                   
    //                                     }
    //                             }





    //                                 // for($su=0;$su<count($row_cron_sms_user);$su++)
    //                                 // {
    //                                 //    $txtMessage =  $row_cron_sms_user[$su]->ssu_message_details;
    //                                 //    $user_id =  $row_cron_sms_user[$su]->ssu_visitor_id;
    //                                 //    $branch_id =  $row_cron_sms_user[$su]->ssu_branchId_fk;
    //                                 //     // check balance of              
    //                                 //     $check_msg_length=strlen($txtMessage);
    //                                 //     if($check_msg_length<=160)
    //                                 //      {
    //                                 //             $sms_count=1;
    //                                 //      }
    //                                 //      else 
    //                                 //      {
    //                                 //             $sms_count=round($check_msg_length/160);
    //                                 //      }
    //                                 //      //branch wise check sms balance here 
    //                                 //     $check_sms_balance=$this->sms_management_model->getBranchBalance($branch_id);
    //                                 //     if($sms_count<=$check_sms_balance)
    //                                 //     {
    //                                 //         // send sms functionality
                                             
    //                                 //         // schedule status against use sms status chages   - status : ssu_smsstatus table : tblmvbsendsmsusers
    //                                 //         $userMessageStr=$this->SMSString($txtMessage,$user_id);
                                            
    //                                 //         $MobileNo=$this->getUserMobileNo($user_id);
    //                                 //         $result_mobile = $this->sms_management_model->checkVisitorsOptout($MobileNo);
    //                                 //                       if($result_mobile==false)
    //                                 //                       {
    //                                 //         $this->sendSMS($MobileNo->vis_mobile,$userMessageStr);
                                          
    //                                 //         $this->db->query("update set ssu_smsstatus = '1' from tblmvbsendsmsusers where ssu_visitor_id ='".$user_id."' ");
    //                                 //         //log ki entry 
                                            
    //                                 //         //update sms count in branch 
                                            
    //                                 //         $this->db->query("update set brn_smsCredit = brn_smsCredit - '".$sms_count."' from tblmvbbranches where brn_id_pk ='".$branch_id."' ");
                                           
    //                                 //         $cmapainUserLogs=array('ssul_sm_id_fk'=>$sms_id,
    //                                 //                                 'ssul_visitor_id_fk'=>$user_id,
    //                                 //                                 'ssul_branchId_fk'=>$branch_id,    
    //                                 //                                 'ssul_message_details'=>$userMessageStr,
    //                                 //                                 'ssul_cDate'=>date('Y-m-d H:i:s'),    
    //                                 //                                 'ssul_smssendstatus'=>1);

    //                                 //         $this->db->insert('tblmvbsendsmsuserslogs',$cmapainUserLogs);
    //                                 //                       }
    //                                 //                       else{
    //                                 //                            $cmapainUserLogs=array('ssul_sm_id_fk'=>$sms_id,
    //                                 //                                 'ssul_visitor_id_fk'=>$user_id,
    //                                 //                                 'ssul_branchId_fk'=>$branch_id,    
    //                                 //                                 'ssul_message_details'=>$userMessageStr,
    //                                 //                                  'ssul_failed_reason'=>'mobile_no_opt_out',  
    //                                 //                                 'ssul_cDate'=>date('Y-m-d H:i:s'),    
    //                                 //                                 'ssul_smssendstatus'=>1);

    //                                 //         $this->db->insert('tblmvbsendsmsuserslogs',$cmapainUserLogs); 
    //                                 //                       }
    //                                 //     }
    //                                 //     else
    //                                 //     {
    //                                 //         // log sms failed
    //                                 //            $cmapainUserLogs=array('ssul_sm_id_fk'=>$sms_id,
    //                                 //                                     'ssul_visitor_id'=>$user_id,
    //                                 //                                     'ssul_branchId_fk'=>$branch_id,    
    //                                 //                                     'ssul_message_details'=>$userMessageStr,
    //                                 //                                     'ssul_cDate'=>date('Y-m-d H:i:s'),
    //                                 //                                     'ssul_failed_reason'=>'insuficient_balance',    
    //                                 //                                     'ssul_smssendstatus'=>0);
                                                                
    //                                 //             $this->db->insert('tblmvbsendsmsuserslogs',$cmapainUserLogs);
                                                                
    //                                 //             $this->sendAdminNotifyEMAIL('Insuficient Balance - Send SMS'); 
    //                                 //     }
    //                                 // }
    //                     }
    //                     else
    //                     {
    //                         // user not found 
    //                     }                    
    //                     // update sms management status
    //                //}
    //         }
    //     }
    //     else
    //     {
    //         // shedule sms not found
    //     }   
    // }
    
    public function getUserMobileNo($userId=0)
    {
		$result=$this->db->query("select * from tblmvbvisitors where vis_id_pk='".$userId."'");
		return $result->result();
    }    


    public function getOTP()
    {
                    $otp=  rand(1000, 9999);

                    $admin_user_id=$this->session->userdata('admin_id');    

                    $msg1 = urlencode("Hey! Welcome to Tokri.com. OTP(One Time Password) for export CSV  is ".$otp.".");
                     
                    //$url1 = "http://trans.kapsystem.com/api/v3/index.php?method=sms&api_key=A474c43f4d3174a71ae8a4e7978ddacea&to=".$global_mobile_no."&sender=ITOKRI&message=".$msg1."&format=php&custom=1,2&flash=0";

                    // $url1="";


                    // $c = curl_init(); 
                    // curl_setopt($c, CURLOPT_URL, $url1); 
                    // curl_setopt($c, CURLOPT_HEADER, 1); // get the header 
                    // curl_setopt($c, CURLOPT_NOBODY, 1); // and *only* get the header 
                    // curl_setopt($c, CURLOPT_RETURNTRANSFER, 1); // get the response as a string from curl_exec(), rather than echoing it 
                    // curl_setopt($c, CURLOPT_FRESH_CONNECT, 1); // don't use a cached version of the url 
                    // if (!curl_exec($c)) { return false; } 

                    // $httpcode = curl_getinfo($c, CURLINFO_HTTP_CODE); 
                    // curl_close($c);

                    
                    $this->db->query("Update tblmvbsysmainusers set sysmu_otp='".$otp."' where sysmu_id_pk='".$admin_user_id."'");


                    //------------------------------ Start Save Transaction Logs ---------------------------//
            
                    setSAActivityLogs('Transaction_activity','opt_in_export');

                //-------------------------------  End Save Transaction Logs ------------------------------//
    }


    public function verifyExport()
    {                   
                    $otp=$_POST['txtotp'];

                    $admin_user_id=$this->session->userdata('admin_id');    

                    $result=$this->db->query("SELECT sysmu_otp FROM tblmvbsysmainusers WHERE sysmu_id_pk='".$admin_user_id."'");
                    $row=$result->result();

                    if($row[0]->sysmu_otp==$otp)
                    {
                            $result_sys_main_user=$this->db->query("SELECT oo.oo_id_pk,cl.clnt_id_pk,cl.clnt_name,(Select smu.sysmu_username FROM tblmvbsysmainusers smu where oo.oo_optoutBy=smu.sysmu_id_pk) as opt_out_by,(Select smu.sysmu_username FROM tblmvbsysmainusers smu where oo.oo_optinBy=smu.sysmu_id_pk) as opt_in_by,CONCAT(vis.vis_firstName,' ',vis.vis_lastName) as customer_name,vis.vis_email,vis.vis_mobile,(CASE oo.oo_status WHEN 0 THEN 'OPT-Out' WHEN 1 THEN 'OPT-In' END) as status,DATE_FORMAT(oo.oo_createdDate,'%d-%m-%Y') as created_date,oo.oo_status FROM tblmvboptout oo left join tblmvbvisitors vis on (oo.oo_mobile_no=vis.vis_mobile) left join tblmvbbranches brh on (brh.brn_id_pk=vis.vis_branchId_fk) left join tblmvbclients cl on (brh.brn_id_pk=cl.clnt_id_pk) group by oo.oo_id_pk order by oo.oo_id_pk ");

                            $row_sys_main_user=$result_sys_main_user->result();

                            $contents = '"Name","Mobile No.","Email Id","Client User Id","Client Name","Status","OPT Out By","OPT In By","Date"';
    
                            $contents .="\n\n"; 

                            for ($i = 0; $i < count($row_sys_main_user); $i++) 
                            {
                                        $contents.='"'.$row_sys_main_user[$i]->customer_name.'","'.$row_sys_main_user[$i]->vis_mobile.'","'.$row_sys_main_user[$i]->vis_email.'","'.$row_sys_main_user[$i]->clnt_id_pk.'","'.$row_sys_main_user[$i]->clnt_name.'","'.$row_sys_main_user[$i]->status.'","'.$row_sys_main_user[$i]->opt_out_by.'","'.$row_sys_main_user[$i]->opt_in_by.'","'.$row_sys_main_user[$i]->created_date.'"';
        
                                        $contents.="\n";
                            }


                            $contents = strip_tags($contents);

                            Header("Content-Disposition: attachment; filename=export_opt_out_details.csv");
                            print $contents;
                            exit;
                    }
    }


    public function verifyOTP()
    {
                $otp=$_POST['txtotp'];

                //print_r($_POST);

                $admin_user_id=$this->session->userdata('admin_id');

                $result=$this->db->query("SELECT sysmu_otp FROM tblmvbsysmainusers WHERE sysmu_id_pk='".$admin_user_id."'");
                $row=$result->result();


                //echo $row[0]->sysmu_otp.'=='.$otp;

                if($row[0]->sysmu_otp==$otp)
                {
                        echo 'true';
                }
                else
                {
                        echo 'false';
                }
    }


    public function getSmsGatewayApiDetails()
    {
            $result=$this->db->query("SELECT * FROM smscgateway_bk");
            
            $row=$result->result();

            return $row;
    }


    public function getClientSenderIdDefault($client_id)
    {
            $result=$this->db->query("SELECT * FROM tblmvbsenderidrequest where sid_clientId_fk='".$client_id."' and sid_default='1' and sid_admin_status='approved'");
            
            $row=$result->result();

            return $row[0]->sid_content;
    }
    

}
