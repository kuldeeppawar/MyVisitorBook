<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Package extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->model('package_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('pagination');
		
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
		setSAActivityLogs('Transaction_activity','SAPackage_view');
		$data ['result']=$this->package_model->getPackagedetails();
		$data ['include']='head/package/package';
		$data ['admin_section']='Manage Package';
		$this->load->view('backend/container_sa',$data);
	
	}
	
	// ---Function used to add New Package-//
	public function addPackage()
	{
		
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
			
			
			$data ['admin_section']='Add Package';
			$id=$this->package_model->addPackage();
			if ($id)
			{
				$this->session->set_flashdata('success','Package has been added successfully.');
				redirect('head/package');
			} else
			{
				$this->session->set_flashdata('error','Unable to save package.');
				$data ['resulttax']=$this->package_model->getAlltax();
				$data ['include']='head/package/add_package';
				$data ['admin_section']='manage_package';
				$this->load->view('backend/container_sa',$data);
			}
		} else
		{
			
			$data ['resulttax']=$this->package_model->getAlltax();
			$data ['include']='head/package/add_package';
			$data ['admin_section']='manage_package';
			$this->load->view('backend/container_sa',$data);
		}
	
	}
	
	// ---Function used to add edit Package-//
	public function editPackage($id='0')
	{
		$this->Checklogin();
		$id=base64_decode($id);
		if (isset($_POST ['btnSubmit']))
		{
			
			
			$data ['admin_section']='Package';
			$id=$this->package_model->editPackage();
			if ($id)
			{
				$this->session->set_flashdata('success','Package has been updated successfully.');
				redirect('head/package');
			} else
			{
				$this->session->set_flashdata('error','Unable to edit Package.');
				redirect('head/package');
			}
		} else
		{
			
			$data ['result']=$this->package_model->getPackage($id);
			$data ['result_tax']=$this->package_model->getPackagetax($id);
			$data ['result_service']=$this->package_model->getPackageservice($id);
			$data ['result_package']=$this->package_model->getPackagedetail($id);
			$data ['resulttax']=$this->package_model->getAlltax();
			$data ['package_id']=$id;
			$data ['include']='head/package/edit_package';
			$data ['admin_section']='manage_package';
			$this->load->view('backend/container_sa',$data);
		}
	
	}
	
	// --functin used to deactivate/activate Package status--//
	public function changepackageStatus()
	{
		
		
		$this->Checklogin();
		$status=$this->input->post('id');
		$package_id=$this->input->post('package_id');
		$idlist=implode(",",$package_id);
		if ($status == 0 || $status == 1)
		{
			$a=$this->package_model->changepackageStatus($status,$package_id);
			
			if ($status == 0)
			{
				setSAActivityLogs('Transaction_activity','SAPackage_status',"Updates Status Deactivated :- ".$idlist);

					if(count($package_id)>1)
					{	
							$this->session->set_flashdata('success','Packages has been deactivated successfully');
					}
					else
					{
							$this->session->set_flashdata('success','Package has been deactivated successfully');
					}	
			} 
			else
			{
				setSAActivityLogs('Transaction_activity','SAPackage_status',"Updates Status Activated :- ".$idlist);

					if(count($package_id)>1)
					{
							$this->session->set_flashdata('success','Packages has been activated successfully');
					}
					else
					{
							$this->session->set_flashdata('success','Package has been activated successfully');
					}		
			}
			echo true;
		} else
		{
			
			$this->session->set_flashdata('error','Something went wrong');
			echo true;
		}
	
	}
	
	// --Function used to load renewable package management--//
	public function renewalPackage()
	{
		
		$this->Checklogin();
		$data ['result']=$this->package_model->getrenewalPackagedetails();
		$data ['include']='head/package/renewal_package';
		$data ['admin_section']='Manage Package';
		setSAActivityLogs('Transaction_activity','SAPackagerenew_view');
		$this->load->view('backend/container_sa',$data);
	
	}
	
	// --Function used to add renew package--//
	public function addRenewalpackage()
	{
		
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
			
		
			$data ['admin_section']='Add RenewPackage';
			$id=$this->package_model->addRenewalpackage();
			if ($id)
			{
				$this->session->set_flashdata('success','Package has been added successfully.');
				redirect('head/package/renewalPackage');
			} else
			{
				$this->session->set_flashdata('error','Unable to save package.');
				redirect('head/package/renewalPackage');
			}
		} else
		{
			
			$data ['resulttax']=$this->package_model->getAlltax();
			$data ['include']='head/package/add_new_renewal_pck';
			$data ['admin_section']='Manage Package';
			$this->load->view('backend/container_sa',$data);
		}
	
	}
	
	// --functin used to deactivate/activate Renewable Package status--//
	public function changepackagerenewStatus()
	{
		
		$this->Checklogin();
		$status=$this->input->post('id');
		$package_id=$this->input->post('package_id');
                      
                  
		$idlist=implode(",",$package_id);
		
		if ($status == 0 || $status == 1)
		{
			$a=$this->package_model->changepackagerenewStatus($status,$package_id);
			
			if ($status == 0)
			{
				setSAActivityLogs('Transaction_activity','SAPackagerenew_status',"Updates Status Deactivated :- ".$idlist);
                                if(count($package_id)>1)
                                { 
				     $this->session->set_flashdata('success','Packages has been deactivated successfully');
			        }
                                else
                                {
                                     $this->session->set_flashdata('success','Package has been deactivated successfully');       
                                }
                        } else
			{
				setSAActivityLogs('Transaction_activity','SAPackagerenew_status',"Updates Status Activated :- ".$idlist);
                                if(count($package_id)>1)
                                {   
				      $this->session->set_flashdata('success','Packages has been activated successfully');
			        }
                                else
                               {
                                      $this->session->set_flashdata('success','Package has been activated successfully');       
                               }   
                        }
			echo true;
		} else
		{
			
			$this->session->set_flashdata('error','Something went wrong');
			echo true;
		}
	
	}
	
	// ---Function used to add edit renewal Package-//
	public function editrenewalPackage($id=0)
	{
		$id=base64_decode($id);
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
			$data ['admin_section']='Package';
			$id=$this->package_model->editrenewalPackage();
			if ($id)
			{
				$this->session->set_flashdata('success','Package has been updated successfully.');
				redirect('head/package/renewalPackage');
			} else
			{
				$this->session->set_flashdata('error','Unable to edit Package.');
				redirect('head/package/renewalPackage');
			}
		} else
		{
			$data ['result']=$this->package_model->getRenewalpackage($id);
			$data ['result_tax']=$this->package_model->getRenwalpackagetax($id);
			$data ['resulttax']=$this->package_model->getAlltax();
			$data ['package_id']=$id;
			$data ['include']='head/package/edit_renewal_pck';
			$data ['admin_section']='manage_package';
			$this->load->view('backend/container_sa',$data);
		}
	
	}

	public function verifyPackageName()
	{
			$package_name=$_POST['txtPackagename'];

			$result=$this->db->query("Select pkg_name from tblmvbpackages where pkg_name='".$package_name."'");
			
			$row=$result->result();

			if(count($row)>0)
			{
				echo 'false';
			}
			else
			{
				echo 'true';
			}
	}

	public function verifyRenewPackageName()
	{
			$package_name=$_POST['txtPackagename'];

			$result=$this->db->query("Select rpkg_packageName from tblmvbrenewpackage where rpkg_packageName='".$package_name."'");
			
			$row=$result->result();

			if(count($row)>0)
			{
				echo 'false';
			}
			else
			{
				echo 'true';
			}	
	}

}

