<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Localization extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->model('localization_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('encryption');
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');
	
	}
	
	// ==================== all page session check =====================
	public function Checklogin()
	{
		if ($this->session->userdata('admin_email') == '')
		{
			redirect('head/');
		}
	
	}

	public function index()
	{
		
		$this->Checklogin();
		setSAActivityLogs('Transaction_activity','SALocalization_view');
		$data ['result']=$this->localization_model->getAllKeywords();
		$data ['resultLanguage']=$this->localization_model->getAlllanguage();
		$data ['include']='head/localization/keywords';
		$data ['admin_section']='manage_location';
		$this->load->view('backend/container_sa',$data);
	   
	}
	
	// ---Function used to add new Keyword-//
	public function addKeyword()
	{
		
		$this->Checklogin();
		if (isset($_POST ['submit']))
		{
			$data ['admin_section']='Keyword';
			$id=$this->localization_model->addKeyword();
			if ($id)
			{
				$this->session->set_flashdata('success','Keyword has been added successfully.');
				redirect('head/localization');
			} else
			{
				$this->session->set_flashdata('error','Unable to save Keyword.');
				redirect('head/localization');
				
			}
		} else
		{
			redirect('head/localization');
		}
	
	}
	
	// ---Function used to edit Keyword-//
	public function editKeyword()
	{
		
		$this->Checklogin();
		if (isset($_POST ['submit']))
		{
			
			$id=$this->localization_model->editKeyword();
			if ($id)
			{
				$this->session->set_flashdata('success','Keyword has been edit successfully.');
				redirect('head/localization');
			} else
			{
				$this->session->set_flashdata('error','Unable to Modify Keyword.');
				redirect('head/localization');
			}
		} else
		{
			redirect('head/localization');
		}
	
	}
	
	
	
	//--function used to validate otp--//
	public function validateOtp()
	{
	
		$this->Checklogin();
		$pass=$this->input->post('Password');
		$admin_id=$this->session->userdata('admin_id');
		$result=$this->localization_model->getSpecificuser($admin_id);
	
		if(count($result)>0)
		{
			$storedPassword=$this->encryption->decrypt($result[0]->sysmu_password);
				
			if($storedPassword==$pass)
			{
				echo 1;
			}
			else
			{
				echo 0;
			}
				
		}
		else
		{
			echo 0;
		}
	
	
	}
	
	// ----Function Used To download city csv----//
	public function getKeywordcsv()
	{
		$this->Checklogin();
		
		$result=$this->db->query("select kewd_name,keywd_id_pk from tblmvbkeywords ");
		$row=$result->result();
		
		$contents='"Keyword Id","Keyword Name"';
		
		$contents.="\n";
		for($i=0;$i < count($row);$i ++)
		{
			
			$contents.='"' . $row [$i]->keywd_id_pk. '","' . $row [$i]->kewd_name . '"';
			$contents.="\n";
		}
		setSAActivityLogs('Transaction_activity','SALocalization Keyword_csvdownload');
		$contents=strip_tags($contents);
		
		// header to make force download the file
		Header("Content-Disposition: attachment; filename=keyword.csv");
		print $contents;
		exit();
	
	}

   
    	
	// ---Function used to upload Csv--//
	public function uploadkeywordCsv()
	{
	
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
			$id=$this->localization_model->uploadkeywordCsv();
			if ($id)
			{
				$this->session->set_flashdata('success',' CSV uploaded successfully.');
				redirect('head/localization');
			} else
			{
				$this->session->set_flashdata('success',' Something Went Wrong.');
				redirect('head/localization');
			}
		} else
		{
			redirect('head/localization');
		}
	
	}	
	
	
	// ---Function used to upload Csv--//
	public function uploadCsv()
	{
	
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
			$id=$this->localization_model->uploadCsv();
			if ($id)
			{
				$this->session->set_flashdata('success',' CSV uploaded successfully.');
				redirect('head/localization');
			} else
			{
				$this->session->set_flashdata('success',' Something Went Wrong.');
				redirect('head/localization');
			}
		} else
		{
			redirect('head/localization');
		}
	
	}
	
	
	//-----function used to get specific keyword---//
	public function getLocalkeywords($id='')
	{
		
		$id=base64_decode($id);
		$this->Checklogin();
		setSAActivityLogs('Transaction_activity','SALocalizationkey_view');
		$data ['result']=$this->localization_model->getLocalkeywords($id);
		$data ['resultLanguage']=$this->localization_model->getAlllanguage();
		$data ['include']='head/localization/subkeywords';
		$data ['admin_section']='manage_location';
		$data ['id']=$id;
		$this->load->view('backend/container_sa',$data);
		
	}
	
	// ---Function used to add new Keyword-//
	public function addlocalKeyword()
	{
	
		$this->Checklogin();
		$idList=base64_encode($this->input->post('keyword_id'));
		
		
		if (isset($_POST ['submit']))
		{
			$data ['admin_section']='Keyword';
			$id=$this->localization_model->addlocalKeyword();
			if ($id)
			{
				$this->session->set_flashdata('success','Keyword has been added successfully.');
				redirect('head/localization/getLocalkeywords/'.$idList);
			} else
			{
				$this->session->set_flashdata('error','Unable to save Keyword.');
				redirect('head/localization/getLocalkeywords/'.$idList);
	
			}
		} else
		{
			redirect('head/localization/getLocalkeywords/'.$idList);
		}
	
	}
	
	// ---Function used to edit Keyword-//
	public function editlocalKeyword()
	{
		$idList=base64_encode($this->input->post('keyword_id'));
		$this->Checklogin();
		if (isset($_POST ['submit']))
		{
				
			$id=$this->localization_model->editlocalKeyword();
			if ($id)
			{
				$this->session->set_flashdata('success','Keyword has been edit successfully.');
				redirect('head/localization/getLocalkeywords/'.$idList);
			} else
			{
				$this->session->set_flashdata('error','Unable to Modify Keyword.');
				redirect('head/localization/getLocalkeywords/'.$idList);
			}
		} else
		{
			redirect('head/localization/getLocalkeywords/'.$idList);
		}
	
	}
	
	
}

