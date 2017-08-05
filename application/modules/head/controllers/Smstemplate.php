<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Smstemplate extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->model('smstemplate_model');
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
		if ($this->session->userdata('admin_email') == '')
		{
			redirect('head/');
		}
	
	}
	
	// --Function Used to Load Template List--//
	public function index()
	{
		$this->Checklogin();
		$data['resultStates']=$this->smstemplate_model->getActiveStates();
		$data['resultTemplate']=$this->smstemplate_model->getAlltemplate();
		$data['resultFestival']=$this->smstemplate_model->getActivefestival();
		$data ['include']='head/smstemplate/sms_template';
		$data ['admin_section']='manage_sms';
		setSAActivityLogs('Transaction_activity','SASmstemplate_view');
		$this->load->view('backend/container_sa',$data);
	
	}

	public function getFestivalDetails()
	{
			$state_id=$_POST['stateId'];

			$result=$this->db->query("Select * from tblmvbfestival where fest_stateId_fk='".$state_id."' and fest_status='1'");

			$row=$result->result();
	?>		
			<option value="">Select Festival</option>
	<?php
			for($st=0;$st<count($row);$st++)
			{
	?>
					<option value="<?php echo $row[$st]->fest_id_pk.'/'.date('d-m-Y',strtotime($row[$st]->fest_date));?>"><?php echo $row[$st]->fest_name;?></option>
	<?php				
			}
	}
	
	//
	

	// ---Function used to add new Template-//
	public function addTemplate()
	{
		
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
			
			$data ['admin_section']='Email Template';
			$id=$this->smstemplate_model->addTemplate();
			if ($id)
			{
				$this->session->set_flashdata('success','SMS template has been added successfully.');
				redirect('head/smstemplate');
			} else
			{
				$this->session->set_flashdata('error','Unable to save sms template.');
				redirect('head/smstemplate');
			}
		} else
		{
			redirect('head/smstemplate');
		}
	
	}
	
	// ---Function used to edit Template-//
	public function editTemplate()
	{
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
			
			
			$data ['admin_section']='Edit Template';
			$id=$this->smstemplate_model->editTemplate();
			if ($id)
			{
				$this->session->set_flashdata('success','SMS template has been updated successfully.');
				redirect('head/smstemplate');
			} else
			{
				$this->session->set_flashdata('error','Unable to edit sms template.');
				redirect('head/smstemplate');
			}
		} else
		{
			redirect('head/smstemplate');
		}
	
	}
	
	// --functin used to deactivate/activate Template--//
	public function changetemplateStatus()
	{
		$this->Checklogin();
		$status=$this->input->post('id');
		$tempId=$this->input->post('template');
		$idlist=implode(",",$tempId);
		if ($status == 0 || $status == 1)
		{
			$a=$this->smstemplate_model->changetemplateStatus($status,$tempId);
			
			if ($status == 0)
			{
				setSAActivityLogs('Transaction_activity','SASmsltemplate_status',"Updates Status Deactivated :- ".$idlist);
                if(count($tempId)>1)
                {
                		$this->session->set_flashdata('success','SMS templates has been deactivated successfully');
                }  
                else
                {
                		$this->session->set_flashdata('success','SMS template has been deactivated successfully');
                }
				
			} else
			{
				setSAActivityLogs('Transaction_activity','SASmstemplate_status',"Updates Status Activated :- ".$idlist);

				if(count($tempId)>1)
				{
						$this->session->set_flashdata('success','SMS templates has been activated successfully');
				}
				else
				{
						$this->session->set_flashdata('success','SMS template has been activated successfully');
				}
			}
			echo true;
		} else
		{
			
			$this->session->set_flashdata('error','Something went wrong');
			echo true;
		}
	
	}
	
	// --functin used to Get Template Details--//
	public function getTemplate()
	{
		
		$this->Checklogin();
		$id=$this->input->post('id');
		
		if ($id > 0)
		{
			$a=$this->smstemplate_model->getTemplate($id);
			$resultFestival=$this->smstemplate_model->getAllfestival();
		    $msg="";
		    $select="";
		    $disable="";
			
			for($i=0;$i<count($resultFestival);$i++)
			{
				if($resultFestival[$i]->fest_id_pk==$a[0]->sms_festId_fk)
				{
					$select="Selected";
				}
				
				if($resultFestival[$i]->fest_id_pk!=$a[0]->sms_festId_fk && $resultFestival[$i]->fest_status)
				{
					$disable="disable";
				}
			
				 $msg=$msg.'<option  '.$select.'  value="'.$resultFestival[$i]->fest_id_pk.'/'. date("d-m-Y", strtotime($resultFestival[$i]->fest_date)).'"'  . $disable.'  >'.$resultFestival[$i]->fest_name.'</option>';
				 $select="";
				 $disable="";
            }
         
            
            $display ['fest']=$a [0]->sms_festId_fk."/".date("d-m-Y", strtotime($a [0]->fest_date));;
            $display ['count']=$a [0]->sms_charcount;
            $display ['check']=$a [0]->sms_nonenglish;
            $display ['templateName']=$a [0]->sms_templateName;
			$display ['description']=$a [0]->sms_description;
			$display ['a']=$a [0]->sms_festId_fk."/".date("d-m-Y", strtotime($a [0]->fest_date));
			$display ['state']=$a[0]->sms_stateId_fk;
			$display ['festDate']= date("d-m-Y", strtotime($a [0]->fest_date));
			
			echo json_encode($display);
		} else
		{
			
			echo false;
		}
	
	}

	
	
	// --functin used to submitPushrevokeTemplate--//
	public function submitPushrevoke()
	{
		$this->Checklogin();
		$status=$this->input->post('id');
		$tempId=$this->input->post('template');
		$idlist=implode(",",$tempId);
		if ($status == 0 || $status == 1)
		{
			$a=$this->smstemplate_model->submitPushrevoke($status,$tempId);
	
			if ($status == 0)
			{
				setSAActivityLogs('Transaction_activity','SAEmailtemplate_status',"Updates Status Revoke :- ".$idlist);

				if(count($tempId)>1)
				{
						$this->session->set_flashdata('success','SMS templates has been revoked successfully');
				}
				else
				{
						$this->session->set_flashdata('success','SMS template has been revoked successfully');
				}
				
			} else
			{
				setSAActivityLogs('Transaction_activity','SAEmailtemplate_status',"Updates Status  Push:- ".$idlist);

				if(count($tempId)>1)
				{
						$this->session->set_flashdata('success','SMS templates has been pushed successfully');
				}
				else
				{
						$this->session->set_flashdata('success','SMS template has been pushed successfully');
				}
				
			}
			echo true;
		} else
		{
	
			$this->session->set_flashdata('error','Something went wrong');
			echo true;
		}
	
	}

	public function deleteSTM()
	{
			$template_id=$_POST['template_id'];

			$delete_sms_template=$this->smstemplate_model->deleteSTM($template_id);

			if($delete_sms_template)
			{
					$this->session->set_flashdata('success','SMS template has been deleted successfully');
					echo "true";
			}
			else
			{
					$this->session->set_flashdata('error','Unable to delete sms template');
					echo "true";
			}
	}

		
}

