<?php

class Home extends CI_Controller
{
    
    public function __construct()
    {
       parent::__construct();
		
		$this->load->database();
		$this->load->model('home_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('jwt-master/JWT');
		$this->load->library('encrypt');
		
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');
    }

    // ==================== all page session check ===================== //
    public function Checklogin()
    {
//     	if ($this->session->userdata('admin_email') == '')
//     	{
//     		redirect('head/');
//     	}
    
     return true;
    }
    
    public function index()
    {
      
       // $this->Checklogin();
		$data ['include']='home/home';
		$data ['admin_section']='manage_dashboard';
		$this->load->view('frontend/container',$data);
    }
     
  

}
?>