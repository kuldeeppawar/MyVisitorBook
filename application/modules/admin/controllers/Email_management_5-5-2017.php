<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Email_management extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		
		$this->load->model('email_management_model');
		$this->load->library('email');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('jwt-master/JWT');
		$this->load->library('encryption');
		$this->load->library('PHPExcel');
		
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');
	
	}
	
	// ==================== all page session check ===================== //
	public function Checklogin()
	{
		if ($this->session->userdata('admin_admin_email') == '')
		{
			redirect('admin/');
		}
	
	}

	public function index()
	{
		$this->Checklogin();
		$data['resultCampaign']=$this->email_management_model->getAllfield();
		$data['include']='admin/email_management/getEmailcampainform';
		$data['admin_section']='manage_email';
		setAActivityLogs('Transaction_activity','SAAddvisitorform_view');
		$this->load->view('backend/container',$data);
	
	}
	
	// --Function Used to Load Additional field list--//
	public function getEmailcampainform()
	{
		$this->Checklogin();
		$data['resultField']=$this->email_management_model->getAllfield();
		$data['include']='admin/email_management/addvisitor_field';
		$data['admin_section']='manage_sms';
		setAActivityLogs('Transaction_activity','SAAddvisitorform_view');
		$this->load->view('backend/container',$data);
	
	}

	public function bulk_email()
	{
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
		$data['user']=explode(",",$user);
		$data['way']=$way;
		$branch_id=$this->session->userdata("branch_id");
		$user_id=$this->session->userdata("client_id");
		$data['resultGroup']=$this->email_management_model->getuserGroup($branch_id);
		$data['resultUser']=$this->email_management_model->getuser($branch_id);
		$data['resultTemplateReq']=$this->email_management_model->getTemplateRequest($user_id);
		$data['resultSmsSignature']=$this->email_management_model->getSmsSignature($user_id);
		$data['resultSenders']=$this->email_management_model->getSenderId($user_id);
		$data['resultgetFieldsOptionsAll']=$this->getFieldsOptionsAll();
		$data['resultgetFieldOperation']=$this->getFildOperation();
		$data['include']='admin/email_management/bulk_email';
		$data['admin_section']='manage_email';
		setAActivityLogs('Transaction_activity','SAAddvisitorform_view');
		$this->load->view('backend/container',$data);
	
	}

	public function addCampaign()
	{
		$this->Checklogin();
		if (isset($_POST['submit']))
		{
			$postData=$this->input->post();
			if ($this->email_management_model->addCampaingRecord($postData))
			{
				$this->session->set_flashdata('success','Campaing has been added successfully.');
				redirect('admin/email_management');
			} else
			{
				$this->session->set_flashdata('error','Unable to save Campaing.');
				redirect('admin/email_management');
			}
		} else
		{
			$this->session->set_flashdata("error","Unable to save your comapion. Please try again.");
			redirect('admin/email_management');
		}
	
	}

	public function getFieldsOptions()
	{
		$fields_type=$_POST['type_fields_id'];
		
		$html='';
		
		if ($fields_type == 'basic_fields')
		{
			$html.='<li class="list-group-item">Title</li>
                            <li class="list-group-item">First Name</li>
                            <li class="list-group-item">Middle Name</li>
                            <li class="list-group-item">Last Name</li>
                            <li class="list-group-item">Mobile Number</li>
                            <li class="list-group-item">Email Id</li>';
		} else if ($fields_type == 'contact_details')
		{
			$html.='<li class="list-group-item">Address</li>
                            <li class="list-group-item">Zip Code</li>
                            <li class="list-group-item">Country</li>
                            <li class="list-group-item">State</li>
                            <li class="list-group-item">City</li>
                            <li class="list-group-item">Website</li>
                            <li class="list-group-item">Landline Number</li>
                            <li class="list-group-item">Fax</li>';
		} else if ($fields_type == 'personal_info')
		{
			$html.='<li class="list-group-item">Contact Group</li>
                            <li class="list-group-item">Business Category</li>
                            <li class="list-group-item">Business Name</li>
                            <li class="list-group-item">DOB</li>
                            <li class="list-group-item">Anniversary Date</li>';
		} else
		{
			$client_id=$this->session->userdata('client_id');
			
			$result_custom_fields=$this->db->query("Select cfi_label From tblmvbcustomfields where (cfi_clientId='" . $client_id . "' OR cfi_clientId='0') and cfi_status='1'");
			
			$row_custom_fields=$result_custom_fields->result();
			
			if (count($row_custom_fields) > 0)
			{
				for($k=0;$k < count($row_custom_fields);$k ++)
				{
					$html.='<li class="list-group-item">' . $row_custom_fields[$k]->cfi_label . ' </li>';
				}
			}
		}
		
		echo $html;
	
	}

	public function getFildOperation()
	{
		$html=array(
					'1'=>'starts with',
					'2'=>'ends with',
					'3'=>'equals',
					'4'=>'not equal to',
					'5'=>'contains',
					'6'=>'does not contains',
					'7'=>'less than',
					'8'=>'greater than',
					'9'=>'less than or equal to',
					'10'=>'greater than or equal to',
					'11'=>'between');
		return $html;
	
	}

	public function getFieldsOptionsAll()
	{
		$html='';
		$html=array(
					'Title',
					'First Name',
					'Middle Name',
					'Last Name',
					'Mobile Number',
					'Email Id',
					'Address',
					'Zip Code',
					'Country',
					'State',
					'City',
					'Website',
					'Landline Number',
					'Fax',
					'Contact Group',
					'Business Category',
					'Business Name',
					'DOB',
					'Anniversary Date');
		$client_id=$this->session->userdata('client_id');
		$result_custom_fields=$this->db->query("Select cfi_label From tblmvbcustomfields where (cfi_clientId='" . $client_id . "') and cfi_status='1'");
		$row_custom_fields=$result_custom_fields->result();
		if (count($row_custom_fields) > 0)
		{
			for($k=0;$k < count($row_custom_fields);$k ++)
			{
				array_push($html,$row_custom_fields[$k]->cfi_label);
			}
		}
		return $html;
	
	}

	public function formConditionqry($column,$txt,$key,$cond)
	{
		$masterColumn=array(
							'Title'=>'vis_title',
							'First Name'=>'vis_firstName',
							'Middle Name'=>'vis_middleName',
							'Last Name'=>'vis_lastName',
							'Mobile Number'=>'vis_mobile',
							'Email Id'=>'vis_email',
							'Address'=>'vis_address',
							'Zip Code'=>'vis_zipCode',
							'Country'=>'vis_countryId_fk',
							'State'=>'vis_stateId_fk',
							'City'=>'vis_cityId_fk',
							'Website'=>'vis_website',
							'Landline Number'=>'vis_landline',
							'Fax'=>'vis_fax',
							'Contact Group',
							'Business Category'=>'vis_businessCategory',
							'Business Name'=>'vis_businessName',
							'DOB'=>'vis_dob',
							'Anniversary Date'=>'vis_anniversaryDate');
		// $vvv=array_key_exists($column, $masterColumn);
		$columnKeyvalue=isset($masterColumn[$column]) ? $masterColumn[$column] : null;
		// print_r($vvv);
		if ($cond == 1)
		{
			$cond=" AND ";
		} else if ($cond == 2)
		{
			$cond=" OR ";
		} else
		{
			$cond=" ";
		}
		if ($key == 1)
		{
			return $qry=" " . $columnKeyvalue . " like '" . $txt . "%' " . $cond . "";
		} else if ($key == 2)
		{
			return $qry=" " . $columnKeyvalue . " like '%" . $txt . "' " . $cond . "";
		} else if ($key == 3)
		{
			return $qry=" " . $columnKeyvalue . "='" . $txt . "' " . $cond . "";
		} else if ($key == 4)
		{
			return $qry=" " . $columnKeyvalue . "<>'" . $txt . "' " . $cond . "";
		} else if ($key == 5)
		{
			return $qry=" " . $columnKeyvalue . " IN ('" . $txt . "') " . $cond . "";
		} else if ($key == 6)
		{
			return $qry=" " . $columnKeyvalue . " NOT IN ('" . $txt . "') " . $cond . "";
		} else if ($key == 7)
		{
			return $qry=" " . $columnKeyvalue . " < '" . $txt . "' " . $cond . "";
		} else if ($key == 8)
		{
			return $qry=" " . $columnKeyvalue . " > '" . $txt . "' " . $cond . "";
		} else if ($key == 9)
		{
			return $qry=" " . $columnKeyvalue . " <= '" . $txt . "' " . $cond . "";
		} else if ($key == 10)
		{
			return $qry=" " . $columnKeyvalue . " >= '" . $txt . "' " . $cond . "";
		} else if ($key == 11)
		{
			return $qry=" " . $columnKeyvalue . " BETWEEN '' AND '" . $txt . "' " . $cond . "";
		} else
		{
		}
	
	}

	public function getFilterCount()
	{
		$postData=$this->input->post();
		$columnName=$postData['searchField1'];
		$condition=$postData['searchField2'];
		$searchKeyword=$postData['searchField3'];
		$cond_operation=$postData['searchField4'];
		
		// echo count($columnName);
		$str="";
		$strQry="";
		for($i=0;$i < count($columnName);$i ++)
		{
			if ($i != (count($columnName) - 1))
			{
				
				if ($cond_operation == 1)
				{
					$str1=$cond_operation;
				} else if ($cond_operation == 2)
				{
					$str1=$cond_operation;
				} else
				{
					$str1="";
				}
			} else
			{
				$str1="";
			}
			$strQry.=" " . $this->formConditionqry($columnName[$i],$searchKeyword[$i],$condition[$i],$str1);
			
			// print_r($columnName);
			// echo $columnName;
		}
		// echo $query= " select * from tblmvbvisitors where"." ".$strQry;
		
		$query=$this->db->query("select * from tblmvbvisitors where " . " " . $strQry);
		$query1=$this->db->query("select GROUP_CONCAT(vis_id_pk) as visitorId from tblmvbvisitors where " . " " . $strQry);
		$visitors=$query1->result();
		// echo $this->db->last_query();
		// print_r($query->num_rows());
		// print_r($visitors);
		echo $query->num_rows() . "@~~@" . $visitors[0]->visitorId;
	
	}
	//
	public function downloadCampCSV222()
	{
		$file_name='recordcsv' . time() . '.csv';
		
		$condition="INTO OUTFILE '" . base_url() . 'uploads/' . $file_name . "'
                   FIELDS ENCLOSED BY '\"' TERMINATED BY ','
                   ESCAPED BY '\"'
                   LINES TERMINATED BY '\r\n'";
		
		$result=$this->db->query("SELECT sm_sms_content " . $condition . " FROM tblmvbsmsmangement where sm_client_id=1 ");
		$row_ddd=array();
		
		// $row_ddd=$result->result();
		
		if ($result->num_rows() > 0)
		{
			// query returned results
		} else
		{
			// query returned no results
		}
		
		$a=1;
		if ($a == 1)
		{
			
			$file=$file_name; // path to the file on disk
			$filename='uploads/' . basename($file);
			
			if (file_exists($filename))
			{
				// set appropriate headers
				header('Content-Description: File Transfer');
				header('Content-Type: application/csv');
				header('Content-Disposition: attachment; filename=' . $file);
				header('Expires: 0');
				header('Cache-Control: must-revalidate');
				header('Pragma: public');
				header('Content-Length: ' . filesize($filename));
				ob_clean();
				flush();
				// read the file from disk and output the content.
				readfile($filename);
			}
		}
		exit();
	
	}

	public function downloadCampCSV()
	{
		$result=$this->db->query("SELECT * FROM tblmvbemailmanagement where em_client_id=1 ");
		$CampaignDetails=$result->result();
		
		$contents='"Sr No","Campaign Name","Sent On /Scheduling Date","Message Details","Contact Group"';
		// }
		$contents.="\n\n";
		
		// Get Records from the table
		// while ($row = mysql_fetch_array($sql_1)) {
		$smsCount=0;
		$a=1;
		for($i=0;$i < count($CampaignDetails);$i ++)
		{
			$query=$this->db->query("select seu_id_pk from tblmvbsendemailusers where seu_em_id_fk='" . $CampaignDetails[$i]->em_id_pk . "'");
			
			$smsCount=$query->num_rows();
			if ($CampaignDetails[$i]->em_email_type == '1')
			{
				$campType='Group';
				// tblmvbgroups where grp_branchId_fk=1
				
				// $smsCount +=$smsCount;
			} else
			{
				$campType='NA';
			}
			if ($CampaignDetails[$i]->em_email_content == '')
			{
				$content="NA";
			} else
			{
				$content=$CampaignDetails[$i]->em_email_content;
			}
			// echo $CampaignDetails[$i]->$i;die();
			$contents.='"' . $a . '","' . $CampaignDetails[$i]->em_campaign_name . '","' . $CampaignDetails[$i]->em_email_schedule_date . '","' . mb_convert_encoding($content,'UTF-16LE','UTF-8') . '","' . $campType . '"';
			$contents.="\n";
			$a ++;
		}
		/*
		 * echo $contents;
		 * die();
		 */
		$contents=strip_tags($contents);
		
		// header to make force download the file
		/*
		 * Header("Cache-Control: public");
		 * Header("Content-Type: application/octet-stream");
		 * Header("Content-Type: text/csv; charset=utf-8");
		 */
		// $contents=chr(255).chr(254).mb_convert_encoding($contents, 'UTF-16LE', 'UTF-8');
		
		Header("Content-Disposition: attachment;filename=campign_Record.csv ");
		// $contents=chr(255).chr(254).mb_convert_encoding($contents, 'UTF-16LE', 'UTF-8');
		print $contents;
		exit();
	
	}

	public function downloadCampCSV122()
	{
		$result=$this->db->query("SELECT * FROM tblmvbemailmanagement where em_client_id=1 ");
		$CampaignDetails=$result->result();
		// $result_nutritions=$this->product_model->getAllNutritions();
		$objPHPExcel=new PHPExcel();
		
		// Set properties
		$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")->setLastModifiedBy("Maarten Balliauw")->setTitle("Office 2007 XLSX Test Document")->setSubject("Office 2007 XLSX Test Document")->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")->setKeywords("office 2007 openxml php")->setCategory("Test result file");
		
		$objPHPExcel->getActiveSheet()->setCellValue('A1','Content');
		/*
		 * $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Nutrition Name');
		 * $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Id');
		 * $objPHPExcel->getActiveSheet()->setCellValue('F1', 'Unit Name');
		 */
		$row=3;
		for($i=0;$i < count($CampaignDetails);$i ++)
		{
			$row ++;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A' . $row,mb_convert_encoding(html_entity_decode($CampaignDetails[$i]->sm_sms_content),'UTF-16LE','UTF-8'));
			// $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$row, $result_nutritions[$i]->name);
		}
		
		$objPHPExcel->getActiveSheet()->setTitle('Simple');
		
		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);
		
		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="nutrition_unit.csv"');
		header('Cache-Control: max-age=0');
		
		// $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		// $objWriter->save('php://output');
		
		$objWriter=new PHPExcel_Writer_CSV($objPHPExcel);
		$objWriter->save('php://output');
		
		exit();
	
	}

}

