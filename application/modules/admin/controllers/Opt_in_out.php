<?php

class Opt_in_out extends CI_Controller
{
    
    public function __construct()
    {
       parent::__construct();
		
		$this->load->database();
		$this->load->model('opt_in_out_model');
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
    	if ($this->session->userdata('admin_admin_email') == '')
    	{
    		redirect('admin/');
    	}
    
     return true;
    }
    
    public function index()
    {
       // $this->Checklogin();
        $this->Checklogin();

        //---------------------------------- Start Save Transaction Logs ---------------------------//
            
            setAActivityLogs('Transaction_activity','OPT_temp_request_view');

        //-------------------------------  End Save Transaction Logs ------------------------------//
        
        $data ['result']=$this->opt_in_out_model->getAllOPT();
		$data ['include']='admin/opt_in_out/opt_in_out';
		$data ['admin_section']='opt_in_out';
		$this->load->view('backend/container',$data);
    }     


    public function verifyOptName()
    {
                $opt_name=$_POST['txtoptname'];

                //print_r($_POST);

                // $admin_user_id=$this->session->userdata('admin_admin_id');

                $result=$this->db->query("SELECT optreq_id_pk FROM tblmvboptrequest where optreq_opt_name='".$opt_name."'");
                $row=$result->result();

                //echo $row[0]->sysmu_otp.'=='.$otp;

                if(count($row)>0)
                {
                        echo 'false';
                }
                else
                {
                        echo 'true';
                }
    }

    public function addOptInOut()
    {
            $this->Checklogin();
            if (isset($_POST['txtoptname']))
            {
                $result=$this->opt_in_out_model->addOptInOut();
               
                if ($result > 0)
                {
                    $this->session->set_flashdata('success','OPT IN/OUT has been added successfully.');
                    redirect('admin/opt_in_out');
                } 
                else
                {
                    $this->session->set_flashdata('error','Unable to save OPT IN/OUT details.');
                    redirect($this->agent->referrer());
                }
              
            } 
            else
            {
                $data ['result']=$this->opt_in_out_model->getAllOPT();
                $data ['include']='opt_in_out/opt_in_out';
                $data ['admin_section']='opt_in_out';
                $this->load->view('backend/container',$data);
            }
    }


    public function deleteOptInOut()
    {
            $this->Checklogin();

            $opt_id=$_POST['opt_id'];
           
            $result=$this->opt_in_out_model->deleteOptInOut($opt_id); 
    }
  
}
?>