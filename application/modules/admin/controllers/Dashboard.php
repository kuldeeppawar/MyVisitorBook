<?php

class Dashboard extends CI_Controller
{
    
    public function __construct()
    {
       parent::__construct();
		
		$this->load->database();
		$this->load->model('dashboard_model');
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
      
        $this->Checklogin();
//         $data ['sms_count']=$this->dashboard_model->getAllSMSCount();
//         $data ['email_count']=$this->dashboard_model->getAllEmailCount();
//         $data ['visitors_count']=$this->dashboard_model->getAllVisitorsCount();
//         $data ['system_users_count']=$this->dashboard_model->getAllSUCount();
//         $data ['latest_visitors']=$this->dashboard_model->getAllLatestVisitors();
//         $data ['recent_revisit']=$this->dashboard_model->getAllRecentRevisit();
//         $data ['upcoming_birth']=$this->dashboard_model->getAllUpcomingBirth();
//         $data ['latest_revisitors']=$this->dashboard_model->getAllLatestRevisitors();
//         $data ['customer_smssent']=$this->dashboard_model->getAllCustomerSmssent();
        
           $data ['sms_count']=$this->dashboard_model->getAllSMSCount();
           $data ['email_count']=$this->dashboard_model->getAllEmailCount();
           $data ['visitors_count']=$this->dashboard_model->getAllVisitorsCount();
           $data ['system_users_count']=$this->dashboard_model->getAllSUCount();


            $data ['latest_visitors']=$this->dashboard_model->getAllLatest5Visitors();
            $data ['recent_revisit']=$this->dashboard_model->getAllRecent5Revisit();
            $data ['upcoming_birth']=$this->dashboard_model->getAllUpcoming5Birth();
            $data['recent_activities']=$this->dashboard_model->getAllRecent5Activities();


            $data['contact_group']=$this->dashboard_model->getAllContactGroup();

            $data['country_list']=$this->dashboard_model->getAllCountryList();

            $data['recent_activities']=$this->dashboard_model->getAllRecent5Activities();

            // $data['state']=$this->dashboard_model->getAllContactGroup();
            // $data['city']=$this->dashboard_model->getAllContactGroup();

            $data ['latest_revisitors']=$this->dashboard_model->getAllLatest5Revisitors();
            $data ['quick_add_mgt']=$this->dashboard_model->getAllQuickAddManagement();
            $data['add_quick_field']=$this->dashboard_model->getAddQuickAddManagement();


        $data ['include']='admin/dashboard/dashboard';
		$data ['admin_section']='manage_dashboard';
		$this->load->view('backend/container',$data);
    }
     

     public function getCustomerSmsSentData()
    {
            $customer_sent=$this->dashboard_model->getAllCustomerSmssent();

            //echo $customer_sent;
            
            if(count($customer_sent)>0)
            {
                    echo json_encode($customer_sent, true);
            }
            else
            {
                    echo json_encode();
            }  
    }


    public function getAllCustomerAddedTrends()
    {
            $customer_added_trends=$this->dashboard_model->getAllCustomerAddedTrends();

            if(count($customer_added_trends)>0)
            {
                    echo json_encode($customer_added_trends, true);
            }
            else
            {
                    echo json_encode();
            }
    }


    public function getLatestVisitors()
    {      
            $this->Checklogin();

            $data ['latest_visitors']=$this->dashboard_model->getAllLatestVisitors(); 

            $data ['include']='admin/dashboard/manage_latest_visitors';
            $data ['admin_section']='manage_latest_visitors';
            $this->load->view('backend/container',$data);
    }

    public function getRecentRevisitors()
    {      
            $this->Checklogin();

            $data ['recent_revisitors']=$this->dashboard_model->getAllRecentRevisitors(); 

            $data ['include']='admin/dashboard/manage_recent_revisitors';
            $data ['admin_section']='manage_recent_revisitors';
            $this->load->view('backend/container',$data);
    }


    public function getUpcomingBirthAnni()
    {
            $this->Checklogin();

            $data ['upcoming_birthanni']=$this->dashboard_model->getAllUpcomingBirthAnni(); 

            $data ['include']='admin/dashboard/manage_upcoming_birthanni';
            $data ['admin_section']='manage_upcoming_birthanni';
            $this->load->view('backend/container',$data);
    }
  
    public function getLatestRevisitors()
    {
            $this->Checklogin();

            $data ['top_revisitors']=$this->dashboard_model->getLatestRevisitors(); 

            $data ['include']='admin/dashboard/manage_top_revisitors';
            $data ['admin_section']='manage_top_revisitors';
            $this->load->view('backend/container',$data);
    }

    public function getRecentActivities()
    {
            $this->Checklogin();

            $data ['recent_activities']=$this->dashboard_model->getRecentActivities(); 

            $data ['include']='admin/dashboard/manage_recent_activities';
            $data ['admin_section']='manage_top_revisitors';
            $this->load->view('backend/container',$data);
    }

    public function getAllStateList()
    {
            $country_id=$_POST['countryId'];

            $state_list=$this->dashboard_model->getAllStateList($country_id);

            for($sl=0;$sl<count($state_list);$sl++)
            {
    ?>
                    <option value="<?php echo $state_list[$sl]->stat_id_pk;?>"><?php echo $state_list[$sl]->stat_name;?></option>
    <?php            
            }
    }


    public function getAllCityList()
    {
            $state_id=$_POST['stateId'];

            $city_list=$this->dashboard_model->getAllCityList($state_id);

            for($cl=0;$cl<count($city_list);$cl++)
            {
    ?>
                    <option value="<?php echo $city_list[$cl]->cty_id_pk;?>"><?php echo $city_list[$cl]->cty_name;?></option>
    <?php            
            }
    }
  

    public function addQuickVisitor()
    {
    	$result_visitor=$this->dashboard_model->addQuickVisitor();
    
    	if($result_visitor>0)
    	{
    		redirect($this->agent->referrer());
    	}
    	else
    	{
    
    	}
    }
    
    public function trackRevisitors()
    {
    	$result_revisitor=$this->dashboard_model->trackRevisitors();
    
    	if($result_revisitor>0)
    	{
    		redirect($this->agent->referrer());
    	}
    	else
    	{
    
    	}
    }
}
?>