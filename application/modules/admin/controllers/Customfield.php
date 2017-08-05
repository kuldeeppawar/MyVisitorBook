<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Customfield extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->model('customfield_model');
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
		if ($this->session->userdata('admin_admin_email') == '')
		{
			redirect('admin');
		}
	
	}

    //---client side custom fields add ----//
 	public function getVisitorform()
	{
		$this->Checklogin();
		
		    setAActivityLogs('Transaction_activity','AAcustomfield_view');
		
		    $data['custom']=$this->customfield_model->checkCustomfields();
			$data['resultField']=$this->customfield_model->getAllfield();
			$data['clientPkgDetails']=$this->customfield_model->getClientPkgDetails();
			$data ['include']='admin/customfield/addvisitor_field';
			$data ['admin_section']='manage_customfields';
			$this->load->view('backend/container',$data);
		
	}
	
// ---Function used to add new Visit field-//
	public function addVisitfield()
	{
		
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
			
			$data ['admin_section']='Visit Filed';
			$id=$this->customfield_model->addVisitfield();
			if ($id)
			{
				$this->session->set_flashdata('success','Field has been added successfully.');
				redirect('admin/customfield/getVisitorform');
			} else
			{
				$this->session->set_flashdata('error','Unable to save Field.');
				redirect('admin/customfield/getVisitorform');
			}
		} else
		{
			redirect('admin/customfield/getVisitorform');
		}
	
	}
	
	// ---Function used to edit Field-//
	public function editVisitfield()
	{
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
			
		
			$data ['admin_section']='editField';
			$id=$this->customfield_model->editVisitfield();
			
			if ($id)
			{
				$this->session->set_flashdata('success','Field has been updated successfully.');
				redirect('admin/customfield/getVisitorform');
			} else
			{
				$this->session->set_flashdata('error','Unable to edit Field.');
				redirect('admin/customfield/getVisitorform');
			}
		} else
		{
			redirect('admin/customfield/getVisitorform');
		}
	
	}
	
	// --functin used to deactivate/activate field--//
	public function changefieldStatus()
	{
		$this->Checklogin();
		$status=$this->input->post('id');
		$field=$this->input->post('field');
		$idlist=implode(",",$field);
		
		if ($status == 0 || $status == 1)
		{
			$a=$this->customfield_model->changefieldStatus($status,$field);
			
			if ($status == 0)
			{
				setAActivityLogs('Transaction_activity','AAcustomfield_status',"Updates Status Deactivated :- ".$idlist);
				
				if(count($field)>1)
				{
						$this->session->set_flashdata('success','Fields has been deactivated successfully');
				}
				else
				{
						$this->session->set_flashdata('success','Field has been deactivated successfully');
				}
				
			} else
			{
				setAActivityLogs('Transaction_activity','AAcustomfield_status',"Updates Status Activated :- ".$idlist);

				if(count($field)>1)
				{
						$this->session->set_flashdata('success','Fields has been activated successfully');
				}
				else
				{
						$this->session->set_flashdata('success','Field has been activated successfully');
				}
				
			}
			echo true;
		} else
		{
			
			$this->session->set_flashdata('error','Something went wrong');
			echo true;
		}
	
	}
	
	// --functin used to Get field Details--//
	public function getFieldrecord()
	{
		
		$this->Checklogin();
		$id=$this->input->post('field');
		
		if ($id > 0)
		{
			$resultValue=$this->customfield_model->getVisitfieldvalue($id);
			$resultField=$this->customfield_model->getVisitfield($id);
		   ?>
		   	<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" id="close" class="close" data-dismiss="modal" aria-hidden="true" onclick="javascript:location.reload();">×</button>
							<h4 class="modal-title text-left">
								<i class="fa fa-envelope-o"></i><?php getLocalkeyword('Edit Additional Field');?> 
							</h4>
						</div>
						<div class="modal-body">
							<div class="row add_event">
								<form role="form" id="form1" action="<?php echo base_url()?>admin/customfield/editVisitfield" method="post">
									<div class="col-md-12 col-sm-12">
										<input type="hidden" name="txtFieldid" value="<?php echo $id;?>">
										<div class="form-group">
										      <?php 
										       $fieldType=$resultField[0]->cfi_field_type;
										      ?>
											<label><?php getLocalkeyword('Field Type');?> </label> <select  onchange="viewFielddetails(this.value)" class="form-control" name="selFieldtype" id="selFieldtype" required="required">
												<option value="">--select--</option>
												<option value="text" <?php if($fieldType=="text"){ echo "selected";}?>>Text</option>
												<option value="number" <?php if($fieldType=="number"){ echo "selected";}?>>Number</option>
												<option value="picklist" <?php if($fieldType=="picklist"){ echo "selected";}?>>Picklist</option>
												<option value="date" <?php if($fieldType=="date"){ echo "selected";}?>>Date</option>
												<option value="email" <?php if($fieldType=="email"){ echo "selected";}?>>Email</option>
												<option value="phone" <?php if($fieldType=="phone"){ echo "selected";}?>>Phone</option>
												<option value="textarea" <?php if($fieldType=="textarea"){ echo "selected";}?>>Textarea</option>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div role="form">
											<div class="form-body">
												<div class="form-group" id="multiselct" style="display: none;">
												<?php 
												   $fieldSelection=$resultField[0]->cfi_picklist_type;
												?>
													<label class="radio-inline" onclick="single()"> <input type="radio" name="optradio" id="opt1" value="1"
													 <?php if($fieldSelection=="single"){ echo "checked";}?>><?php getLocalkeyword('Single Select');?> 
													</label> <label class="radio-inline" onclick="single()"> <input type="radio" name="optradio" id="opt2" value="2"
													 <?php if($fieldSelection=="multiple"){ echo "checked";}?>><?php getLocalkeyword('Multi Select');?> 
													</label>
												</div>
												<div class="form-group" id="fieldlabel" style="display: none;">
													<label><?php getLocalkeyword('Field Label');?></label> <input type="text" name="txtTextfieldlabel" id="txtTextfieldlabel" class="form-control input-sm" placeholder="" value="<?php echo $resultField[0]->cfi_label;?>">
												</div>
												<div class="form-group" id="fieldvalue"	 style="display: block;">
													<label><?php getLocalkeyword('Add List Value');?></label>
													
													<div id="field" class="input-group col-md-12">
													
														<?php
														   $total_count=count($resultValue);
														for($i=0;$i<$total_count;$i++)
														{
															$j=$i+1;
														?>
														<input autocomplete="off" class="input  col-md-11" id="field<?php echo $j;?>" name="field[]" type="text" placeholder="" data-items="8" value="<?php echo $resultValue[$i]->cfi_value ?>">
														   <?php 
														   
														    if($total_count==$j)
														   {?>
														   <button id="b1" class="btn add-more" onclick="addMore()" type="button">+</button>
													       <?php }
													       else{
													       ?> 
													    
														  <a id="remove<?php echo $j;?>" class="btn btn-danger remove-me" onclick="removeMore('<?php echo $j;?>')" >-</a></div><div id="field">
													       
													    <?php
													       }
														}
													    ?>
													</div>
													
													
												</div>
												<div class="form-group" id="fieldlength" style="display: none;">
													<label><?php getLocalkeyword('Length');?></label> <input type="text" name="txtTextfieldlength" name="txtTextfieldlength" class="form-control input-sm" placeholder=""  value="<?php echo $resultField[0]->cfi_length;?>">
												</div>
												<div class="form-group" id="date" style="display: none;">
													<div class="input-group input-medium date date-picker" data-date="10/2012" data-date-format="mm/yyyy" data-date-viewmode="years" data-date-minviewmode="months">
														<input type="text" class="form-control" readonly=""> <span class="input-group-btn">
															<button class="btn default" type="button">
																<i class="fa fa-calendar"></i>
															</button>
														</span>
													</div>
												</div>
												<div class="form-group">
													<div class="input-group ">
														<label><?php getLocalkeyword('Manadatory');?></label> <input type="checkbox" name="chkMandatory" id="chkMandatory" class="form-control" value="1"
														  <?php if($resultField[0]->cfi_category==1){ echo "checked";}?>>
													</div>
												</div>
												<div class="modal-footer">
													<button type="submit" name="btnSubmit" class="btn btn-primary"><?php getLocalkeyword('Save');?></button>
													<button type="button" data-dismiss="modal" onclick="javascript:location.reload();" class="btn btn-danger"><?php getLocalkeyword('Cancel');?></button>
												</div>
											</div>
										</div>
										
								
								</div>
								</form>
							</div>
							<div class="modal-footer"></div>
						</div>
					</div>
				</div>
			
		   
		   
		   <?php 
		} else
		{
			
			echo false;
		}
	
	}
	
	//--function used to validate otp--//
	public function validateOtp()
	{
		
		$this->Checklogin();
		$pass=$this->input->post('Password');
		$admin_id=$this->session->userdata('admin_admin_id');
		$result=$this->customfield_model->getSpecificuser($admin_id);
		
		if(count($result)>0)
		{
			    $storedPassword=$this->encryption->decrypt($result[0]->sysu_password);
			    
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
	
}

