<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Emailtemplate extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->model('emailtemplate_model');
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
		$data['resultTemplate']=$this->emailtemplate_model->getAlltemplate();
		$data['resultStates']=$this->emailtemplate_model->getActiveStates();	
		$data['resultFestival']=$this->emailtemplate_model->getActivefestival();
		$data ['include']='head/emailtemplate/email_template';
		$data ['admin_section']='manage_email';
		setSAActivityLogs('Transaction_activity','SAEmailtemplate_view');
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
			$id=$this->emailtemplate_model->addTemplate();
			if ($id)
			{
				$this->session->set_flashdata('success','Email template has been added successfully.');
				redirect('head/emailtemplate');
			} else
			{
				$this->session->set_flashdata('error','Unable to save email template.');
				redirect('head/emailtemplate');
			}
		} else
		{
			redirect('head/emailtemplate');
		}
	
	}
	
	// ---Function used to edit Template-//
	public function editTemplate()
	{
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
			
			
			$data ['admin_section']='Edit Template';
			$id=$this->emailtemplate_model->editTemplate();
			if ($id)
			{
				$this->session->set_flashdata('success','Email template has been updated successfully.');
				redirect('head/emailtemplate');
			} else
			{
				$this->session->set_flashdata('error','Unable to edit email template.');
				redirect('head/emailtemplate');
			}
		} else
		{
			redirect('head/emailtemplate');
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
			$a=$this->emailtemplate_model->changetemplateStatus($status,$tempId);
			
			if ($status == 0)
			{
				setSAActivityLogs('Transaction_activity','SAEmailtemplate_status',"Updates Status Deactivated :- ".$idlist);
                if(count($tempId)>1)
                {
                	$this->session->set_flashdata('success','Email templates has been deactivated successfully');
                } 
                else
                {
					$this->session->set_flashdata('success','Email template has been deactivated successfully');
				}
			} 
			else
			{
				setSAActivityLogs('Transaction_activity','SAEmailtemplate_status',"Updates Status Activated :- ".$idlist);

				if(count($tempId)>1)
				{
						$this->session->set_flashdata('success','Email templates has been activated successfully');
				}
				else
				{
						$this->session->set_flashdata('success','Email template has been activated successfully');
				}
				
			}
			echo true;
		} else
		{
			
			$this->session->set_flashdata('error','Something went wrong');
			echo true;
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
			$a=$this->emailtemplate_model->submitPushrevoke($status,$tempId);

			
			if ($status == 0)
			{
					setSAActivityLogs('Transaction_activity','SAEmailtemplate_status',"Updates Status Revoke :- ".$idlist);
					if(count($tempId)>1)
					{
						$this->session->set_flashdata('success','Email templates has been Revoked successfully');
					}
					else
					{
						$this->session->set_flashdata('success','Email template has been Revoked successfully');	
					}
			} 
			else
			{
				setSAActivityLogs('Transaction_activity','SAEmailtemplate_status',"Updates Status  Push:- ".$idlist);

				if(count($tempId)>1)
				{
						$this->session->set_flashdata('success','Email templates has been pushed successfully');
				}
				else
				{	
						$this->session->set_flashdata('success','Email template has been pushed successfully');
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
			$a=$this->emailtemplate_model->getTemplate($id);
			$resultFestival=$this->emailtemplate_model->getAllfestival();
		    $msg="";
		    $select="";
		    $disable="";
			
			for($i=0;$i<count($resultFestival);$i++)
			{
				if($resultFestival[$i]->fest_id_pk==$a[0]->email_festId_fk)
				{
					$select="Selected";
				}
				
				if($resultFestival[$i]->fest_id_pk!=$a[0]->email_festId_fk && $resultFestival[$i]->fest_status)
				{
					$disable="disable";
				}
			
				 $msg=$msg.'<option  '.$select.'  value="'.$resultFestival[$i]->fest_id_pk.'/'. date("d-m-Y", strtotime($resultFestival[$i]->fest_date)).'"'  . $disable.'  >'.$resultFestival[$i]->fest_name.'</option>';
				 $select="";
				 $disable="";
            }
            //$display ['fest']=$msg;
            $display ['fest']=$a[0]->email_festId_fk.'/'.date("d-m-Y", strtotime($a [0]->fest_date));
 			$display ['templateName']=$a [0]->email_templateName;
			$display ['description']=$a [0]->email_description;
			$display ['a']=$a [0]->email_festId_fk."/".date("d-m-Y", strtotime($a [0]->fest_date));
			$display ['state']=$a[0]->email_stateId_fk;
			$display ['festDate']= date("d-m-Y", strtotime($a [0]->fest_date));
			
			echo json_encode($display);
		} else
		{
			
			echo false;
		}
	}

	public function deleteETM()
	{
			$template_id=$_POST['template_id'];

			$delete_email_template=$this->emailtemplate_model->deleteETM($template_id);

			if($delete_email_template)
			{
					$this->session->set_flashdata('success','Email template has been deleted successfully');
					echo "true";
			}
			else
			{
					$this->session->set_flashdata('error','Unable to delete email template');
					echo "true";
			}
	}

}

