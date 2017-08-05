<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Coupon extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->model('coupon_model');
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
		
		//---------------------------------- Start Save Transaction Logs ---------------------------------//

		setSAActivityLogs('Transaction_activity','coupon_view');			

		//--------------------------------- End Save Transaction Logs ------------------------------------//

		$data ['result']=$this->coupon_model->getAllGenerateCoupon();
		$data ['include']='head/coupon/manage_coupon';
		$data ['admin_section']='manage_coupon';
		$this->load->view('backend/container_sa',$data);
	
	}
	
	// ---Function used to add new coupon-//
	public function addGenerateCoupon()
	{		
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{	
			$data ['admin_section']='coupon';
			$id=$this->coupon_model->addGenerateCoupon();
			if ($id)
			{
				$this->session->set_flashdata('success','Coupon has been added successfully.');
				redirect('head/coupon');
			} 
			else
			{
				$this->session->set_flashdata('error','Unable to save Coupon.');
				$data ['include']='head/coupon/add_coupon';
				$data ['admin_section']='add_coupon';
				$this->load->view('backend/container_sa',$data);
			}
		} 
		else
		{
			$data ['pkg_type']=$this->coupon_model->getPackageType();
			$data ['include']='head/coupon/add_coupon';
			$data ['admin_section']='add_coupon';
			$this->load->view('backend/container_sa',$data);
		}	
	}
	
	// ---Function used to edit coupon-//
	public function editGenerateCoupon()
	{		
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
			$data ['admin_section']='coupon';
			$id=$this->coupon_model->editGenerateCoupon();
			if ($id)
			{
				$this->session->set_flashdata('success','Coupon has been updated successfully.');
				redirect('head/coupon');
			} else
			{
				$this->session->set_flashdata('error','Unable to edit Coupon.');
				$data ['include']='head/coupon/coupon';
				$data ['admin_section']='manage_coupon';
				$this->load->view('backend/container_sa',$data);
			}
		} else
		{
			redirect('head/coupon');
		}	
	}
	
	//--- Function to check coupon code is already exists or not ---//
	public function checkCouponCode()
	{
			$coupon_code = $this->input->post('coupon_code');
            
            $coupon_status=$this->coupon_model->checkCouponCode($coupon_code);
	        
	        if($coupon_status > 0){
	            $result = 'false';
	        }else{
	            $result = 'true';
	        }
	        echo $result;
	}

	public function manageCouponMapping()
	{
		    $this->Checklogin();

		//---------------------------------- Start Save Transaction Logs ---------------------------------//

		setSAActivityLogs('Transaction_activity','coupon_mapping_view');			

		//--------------------------------- End Save Transaction Logs ------------------------------------//
		
		    $data ['result']=$this->coupon_model->getAllMappedCouponsList();
		    $data ['system_user']=$this->coupon_model->getAllSystemUsers();
		    $data ['clients']=$this->coupon_model->getAllClients();
		    $data ['include']='head/coupon/manage_coupon_mapping';
		    $data ['admin_section']='manage_coupon_mapping';
		    $this->load->view('backend/container_sa',$data);
	}


	public function addCouponMapping()
	{
				$this->Checklogin();
				if (isset($_POST ['btnSubmit']))
				{	
					$data ['admin_section']='coupon';
					$id=$this->coupon_model->addCouponMapping();
					if ($id)
					{
						$this->session->set_flashdata('success','Coupon Mapping has been added successfully.');
						redirect('head/coupon/manageCouponMapping');
					} 
					else
					{
						$this->session->set_flashdata('error','Unable to save Coupon Mapping.');
						$data ['include']='head/coupon/manage_coupon_mapping';
						$data ['admin_section']='manage_coupon_mapping';
						$this->load->view('backend/container_sa',$data);
					}
				} 
	}


	public function getSenderIdRecord()
	{
					$coupon_map_id=$_POST['coupon_map_id'];

					$coupon_details=$this->coupon_model->getCouponDetails($coupon_map_id);

					$coupon_mapping=$this->coupon_model->getCouponMapping($coupon_map_id);
					

	?>
					<div class="row">
                          <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable allchekbox no-footer" id="sample_1_2" role="grid" aria-describedby="sample_1_2_info">
                            <thead>
                              <tr>                                
                            <th><?php getLocalkeyword('Coupon Sr. No.');?> 
                            </th>
                            <th> <?php getLocalkeyword('Coupon Date');?>
                            </th>
                            <th> <?php getLocalkeyword('Assign Date');?>
                            </th>
                            <th> <?php getLocalkeyword('Coupon Type');?>
                            </th>
                            <th><?php getLocalkeyword('Coupon Value');?>
                            </th>
                            <th><?php getLocalkeyword('Coupon Validity');?>
                            </th>
                            <th><?php getLocalkeyword('Coupon Start Date - End Date');?>
                            </th>
                            <th><?php getLocalkeyword('Status');?>
                            </th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                          		for($cd=0;$cd<count($coupon_details);$cd++)
                          		{
                          				$datetime1 = new DateTime($coupon_details[$cd]->start_date);
										$datetime2 = new DateTime($coupon_details[$cd]->end_date);
										$interval = $datetime1->diff($datetime2);
										$elapsed = $interval->format('%a days');
                          ?>			
			                            <tr class="odd gradeX">			                              
			                              <td><?php echo $coupon_details[$cd]->gc_serial_no;?></td>
			                              <td><?php echo $coupon_details[$cd]->created_date;?></td>
			                              <td><?php echo $coupon_mapping[0]->created_date;?></td>
			                              <td><?php echo $coupon_details[$cd]->pkg_name;?></td>
			                              <td><?php echo $coupon_details[$cd]->gc_usage_limit;?></td>
			                              <td><?php echo $elapsed;?></td>
			                              <td><?php echo $coupon_details[$cd]->start_date.' to '.$coupon_details[$cd]->end_date;?>
			                              </td>
			                              <td><?php echo $coupon_details[$cd]->gc_status;?></td>
			                            </tr>
	                       <?php
	                       		}
	                       ?>                                 
                          </tbody>
                          </table>
                        </div>


	<?php
	}

	public function verifyCoupon()
	{
			$coupon_code=$_POST['txtCouponcode'];

			$result=$this->db->query("SELECT gc_coupon_code FROM tblmvbcoupons WHERE gc_coupon_code='".$coupon_code."'");
			$row=$result->result();


			//echo $row[0]->sysmu_otp.'=='.$otp;

			if($row[0]->gc_coupon_code==$coupon_code)
			{
					echo 'false';
			}
			else
			{
					echo 'true';
			}
	}


}

