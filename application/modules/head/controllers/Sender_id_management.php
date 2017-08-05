<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Sender_id_management extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->model('sender_id_management_model');
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
		if ($this->session->userdata('admin_email') == " ")
		{
			redirect('head/');
		}
	}

	public function index()
	{
		$this->Checklogin();
		
		$data['result']=$this->sender_id_management_model->getAllSenderId();
		$data['client']=$this->sender_id_management_model->getAllClient();


		$data['include']='head/sender_id_management/manage_sender_id_management';
		$data['admin_section']='manage_sender_id_management';
		$this->load->view('backend/container_sa',$data);
	
	}
	
	// ---Function used to add new coupon-//
	public function addSenderId()
	{		
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{	
			$data ['admin_section']='sender_id_management';
			$id=$this->sender_id_management_model->addSenderId();
			if ($id>0)
			{
				$this->session->set_flashdata('success','Sender id has been added successfully.');
				redirect('head/sender_id_management');
			} 
			else
			{
				$this->session->set_flashdata('error','Unable to save sender id.');
				$data ['include']='head/sender_id_management/manage_sender_id_management';
				$data ['admin_section']='manage_sender_id_management';
				$this->load->view('backend/container_sa',$data);
			}
		} 
		else
		{
			
			$data ['include']='head/sender_id_management/manage_sender_id_management';
			$data ['admin_section']='manage_sender_id_management';
			$this->load->view('backend/container_sa',$data);
		}	
	}
	
	// ---Function used to edit coupon-//
	public function editSenderId()
	{		
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
			$data ['admin_section']='Festival';
			$id=$this->sender_id_management_model->editSenderId();
			if ($id)
			{
				$this->session->set_flashdata('success','Sender id has been updated successfully.');
				redirect('head/sender_id_management');
			} 
			else
			{
				$this->session->set_flashdata('error','Unable to edit sender id.');
				$data ['include']='head/sender_id_management/manage_sender_id_management';
				$data ['admin_section']='manage_sender_id_management';
				$this->load->view('backend/container_sa',$data);
			}
		} 
		else
		{
			redirect('head/sender_id_management');
		}	
	}


	public function getSenderIdRecord()
	{
				$html='';

				$sender_id=$_POST['chk_sender_id'];

				$get_client_details=$this->sender_id_management_model->getClientDetails($sender_id);

				$get_sender_codes=$this->sender_id_management_model->getSenderIdRecord($sender_id);

?>
				<div class="form-group">
                        <p><?php echo $get_client_details[0]->sysu_name.' '.$get_client_details[0]->sysu_lname; ?></p>
                </div>

                <?php
                        $count_codes=1;

                        for($c=0;$c<count($get_sender_codes);$c++)
                        {
		                        ?><div class="form-group">
		                            <label class=""><?php getLocalkeyword('Sender Id');?> </label>
		                            <input type="hidden" id="hidden_client_id" name="hidden_client_id" value="<?php echo $sender_id;?>"/>
		                            <br>
		                            <input class=" input-sm col-md-7" placeholder="" type="text" id="txtSenderCodeEdit_<?php echo $count_codes?>" name="txtSenderCodeEdit[]" 
		                                 value="<?php echo $get_sender_codes[$c]->sid_content;?>">
		                            <label style="margin-top:3px;">
		                                <input id="chkDefaultSenderCodeEdit_<?php echo $count_codes?>" name="chkDefaultSenderCodeEdit[]" type="checkbox" value="<?php echo $c;?>" onclick="uncheck_checkbox_edit('<?php echo $count_codes?>');"
		                                <?php if($get_sender_codes[$c]->sid_default=='1')
		                                {	
		                                      echo 'checked';
		                                }	
		                                ?>><?php getLocalkeyword('Set as Default');?></label>
		                            		<label style="margin-top:3px;"><input type="checkbox" value="<?php echo $c;?>" id="chkActiveEdit" name="chkActiveEdit[]" class="checkbox-inline"';
		                            	<?php if($get_sender_codes[$c]->sid_status=='1')
		                                {	
		                                      echo 'checked';
		                                }		
		                            	?>><?php getLocalkeyword('Active');?></label>
		                            	<input type="hidden" value="<?php echo $get_sender_codes[$c]->sid_id_pk;?>" name="hidden_sender_id[]" id="hidden_sender_id" />
		                        		</div><?php 

		                        $count_codes++;
                    	}
                        
                        ?>
                        <input type="hidden" value="<?php echo count($get_sender_codes); ?>" name="imgcountercloseedit" id="imgcountercloseedit" />
                        <div id="second" class="form-group"></div>
                        <a onclick="add_sender_code_edit('<?php echo count($get_sender_codes) +1;?>','<?php count($get_sender_codes);?>');"><i class="fa fa-plus"></i>
                            <?php getLocalkeyword('Add more');?></a>                       
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit" name="btnSubmit"><?php getLocalkeyword('Save');?></button>
                            <button class="btn btn-danger" data-dismiss="modal" type="button" onclick="resetSenderideditform();"><?php getLocalkeyword('Cancel');?></button>
                        </div>
                        <?php 
	}


	public function changesenderidStatus()
	{
				$this->Checklogin();
				$status=$this->input->post('id');
				$senderid=$this->input->post('sender_id');
				
				
				if ($status == 0 || $status == 1)
				{
					$a=$this->sender_id_management_model->changesenderidStatus($status,$senderid);
					
					if ($status == 0)
					{
						if(count($senderid)>1)
						{
								$this->session->set_flashdata('success','Sender ids has been deactivated successfully');
						}
						else
						{
								$this->session->set_flashdata('success','Sender ids has been deactivated successfully');
						}
					} 
					else
					{
                        if(count($senderid)>1)
                        {
                        		$this->session->set_flashdata('success','Sender ids has been activated successfully');
                        }
                        else
                        {
                        		$this->session->set_flashdata('success','Sender id has been activated successfully');
                        }
					}
					echo true;
				} else
				{
					
					$this->session->set_flashdata('error','Something went wrong');
					echo true;
				}	
	}
	

}

