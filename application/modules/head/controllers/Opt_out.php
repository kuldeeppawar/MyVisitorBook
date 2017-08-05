<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Opt_out extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->model('opt_out_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('jwt-master/JWT');
		$this->load->library('encrypt');
		$this->load->library('email');
		
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');
	
	}
	
	// ==================== all page session check ===================== //
	public function Checklogin()
	{
		if ($this->session->userdata('admin_email') == '')
		{
			redirect('head/');
		}
	
	}
	
	// --Load FAQ--//
	public function index()
	{		
		$this->Checklogin();

		//---------------------------------- Start Save Transaction Logs ---------------------------//
			
			setSAActivityLogs('Transaction_activity','Opt_out_view');

		//-------------------------------  End Save Transaction Logs ------------------------------//
		
		$data ['result']=$this->opt_out_model->getAllOptout();
		$data ['include']='head/opt_out/opt_out';
		$data ['admin_section']='opt_out';
		$this->load->view('backend/container_sa',$data);
	}


	public function addOptOut()
	{		
				$this->Checklogin();
				if (isset($_POST ['btnSubmit']))
				{	
					$data ['admin_section']='opt_out';

					$id=$this->opt_out_model->addOptOut();
					if ($id)
					{
						$this->session->set_flashdata('success','OPT out number has been added successfully.');
						redirect('head/opt_out');
					} 
					else
					{
						$this->session->set_flashdata('error','Unable to save OPT out.');
						redirect('head/opt_out');
// 						$data ['include']='head/opt_out/opt_out';
// 						$data ['admin_section']='opt_out';
// 						$this->load->view('backend/container_sa',$data);
					}
				} 
				else
				{
					$data ['include']='head/opt_out/opt_out';
					$data ['admin_section']='opt_out';
					$this->load->view('backend/container_sa',$data);
				}								
	}

	public function addOptIn()
	{		
				$this->Checklogin();
				
				$data ['admin_section']='opt_out';
				$id=$this->opt_out_model->addOptIn();

				echo $id;												
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

					echo $otp;

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


	public function verifyMobile()
	{
				$mobile_no=$_POST['txtmobileno'];

				//print_r($_POST);

				$admin_user_id=$this->session->userdata('admin_id');

				$result=$this->db->query("SELECT vis_id_pk FROM tblmvbvisitors WHERE vis_mobile='".$mobile_no."'");
				$row=$result->result();


				//echo $row[0]->sysmu_otp.'=='.$otp;

				if(count($row)>0)
				{
						echo 'true';
				}
				else
				{
						echo 'false';
				}	
	}

	
}

