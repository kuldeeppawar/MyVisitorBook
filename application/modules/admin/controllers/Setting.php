<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Setting extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->model('setting_model');
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
		if ($this->session->userdata('admin_admin_email') == '')
		{
			redirect('admin');
		}
	
	}

	 //---Function Used to Load Mo registration page--//
	public function moRegistration()
	{
	
		$this->Checklogin();
		setAActivityLogs('Transaction_activity','AAmoregistration_view');
		$data ['resultMobile']=$this->setting_model->getAllmobile();
		$data ['include']='admin/setting/moregistration';
		$data ['admin_section']='manage_mobile';
		$this->load->view('backend/container',$data);
	
	}
	
	
	// ---Function used to add new Mo-//
	public function addMo()
	{
	
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
	
			$data ['admin_section']='MO';
			$id=$this->setting_model->addMo();
			if ($id)
			{
				$this->session->set_flashdata('success','Mobile has been added successfully.');
				redirect('admin/setting/moRegistration');
			} else
			{
				$this->session->set_flashdata('success','Unable to save mobile.');
				redirect('admin/setting/moRegistration');
			}
		} else
		{
			redirect('admin/setting/moRegistration');
		}
	
	}
	
	// ---Function used to edit Mo-//
	public function editMo()
	{
	
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
	
			$data ['admin_section']='MO';
			$id=$this->setting_model->editMo();
			if ($id)
			{
				$this->session->set_flashdata('success','Mobile has been updated successfully.');
				redirect('admin/setting/moRegistration');
			} else
			{
				$this->session->set_flashdata('error','Unable to update mobile.');
				redirect('admin/setting/moRegistration');
			}
		} else
		{
			redirect('admin/setting/moRegistration');
		}
	
	}
	
	
	// --functin used to deactivate/activate Mobile Registartion status--//
	public function changeMostatus()
	{
		$this->Checklogin();
		$status=$this->input->post('id');
		$mobileid=$this->input->post('mobileId');
		$idlist=exploade(",",$mobileid);
	
		if ($status == 0 || $status == 1)
		{
			$a=$this->setting_model->changeMostatus($status,$mobileid);
				
			if ($status == 0)
			{
				if(count($mobileid)>1)
				{
						$this->session->set_flashdata('success','Mobile numbers has been deactivated successfully');
				
				}
				else
				{
						$this->session->set_flashdata('success','Mobile number has been deactivated successfully');
				
				}
				setAActivityLogs('Transaction_activity','AAmoregistration_status',"Status Deactivated Id is:-".$idlist);
				
			} else
			{				
				if(count($mobileid)>1)
				{
						$this->session->set_flashdata('success','Mobile numbers has been activated successfully');
				}
				else
				{
						$this->session->set_flashdata('success','Mobile number has been activated successfully');
				}
				setAActivityLogs('Transaction_activity','AAmoregistration_status',"Status Activated Id is:-".$idlist);
			}
			echo true;
		} else
		{
				
			$this->session->set_flashdata('error','Something went wrong');
			echo true;
		}
	
	}
	
	
	// --functin used to deletemo--//
	public function deleteMo()
	{
		$this->Checklogin();
		$mobileid=$this->input->post('mobileId');
		
		if(count($mobileid)>0)
		{
			$a=$this->setting_model->deleteMo($mobileid);
			
			$this->session->set_flashdata('success','Mobile Number has been deleted successfully');
			setAActivityLogs('Transaction_activity','AAmoregistration_delete',"Deleted Id is:-".$mobileid);
			echo true;
		}	
	    else 
	    {
	    	$this->session->set_flashdata('success','Something Went Wrong.......!');
	    	echo true;
	    }	
				
	
			
	
	}
	
	
	
	// --functin used to get Specific mobile No details-//
	public function getSpecificMo()
	{
	
		$mobileid=$this->input->post('mobileId');
	    $result=$this->setting_model->getModetails($mobileid);
	    $this->Checklogin();
		if(count($result)>0)
		{ 
			 ?>
			   <div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h2 class="modal-title text-left">
								<i class="fa fa-clone"></i><?php getLocalkeyword('Edit Mobile No');?> 
								</h3>
						</div>
						<div class="modal-body">
							<div class="portlet-body form">
								<form role="form" action="<?php echo base_url()?>admin/setting/editMo" method="post">
									<div class="form-body">
										<div class="row">
											<div class="col-md-12 pull-left">
												<div class="form-group">
													<label><?php getLocalkeyword('Enter Mo');?> </label>
													 <input type="number" value="<?php echo $result[0]->mreg_no;?>" step="any" min="0" class="form-control" placeholder="Enter New MO " name="txtMobile" required="required">
												     <input type="hidden" name="txtMoid"  value="<?php echo $result[0]->mreg_id_pk;?>">  
												</div>
												<div class="modal-footer">
													<button type="submit" name="btnSubmit" class="btn btn-primary"><?php getLocalkeyword('Save');?></button>
													<button type="button" data-dismiss="modal" class="btn btn-danger"><?php getLocalkeyword('Cancel');?></button>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		
			<?php 
		}	
		else 
		{?>
			 <span>Something Went Wrong........!</span>
			<?php 
		}	
		
		
	}
	

	//---Function Used to Load SMS signature listing page--//
	public function smsSignature()
	{
	
		$this->Checklogin();
		setAActivityLogs('Transaction_activity','AAsmssignature_view');
		$data ['resultSignature']=$this->setting_model->getAllsignature();
		$data ['include']='admin/setting/smssignature';
		$data ['admin_section']='manage_signature';
		$this->load->view('backend/container',$data);
	
	}
	
	// ---Function used to add new SMS Signatre-//
	public function addsmsSignature()
	{
	
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
	
			$data ['admin_section']='Sign';
			$id=$this->setting_model->addsmsSignature();
			if ($id)
			{
				$this->session->set_flashdata('success','Signature has been added successfully.');
				redirect('admin/setting/smsSignature');
			} else
			{
				$this->session->set_flashdata('error','Unable to save signature.');
				redirect('admin/setting/smsSignature');
			}
		} else
		{
			redirect('admin/setting/smsSignature');
		}
	
	}
	
	
	// ---Function used to edit SMS Signatre-//
	public function editsmsSignature()
	{
	
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
	
			$data ['admin_section']='Sign';
			$id=$this->setting_model->editsmsSignature();
			if ($id)
			{
				$this->session->set_flashdata('success','Signature has been updated successfully.');
				redirect('admin/setting/smsSignature');
			} else
			{
				$this->session->set_flashdata('error','Unable to update signature.');
				redirect('admin/setting/smsSignature');
			}
		} else
		{
			redirect('admin/setting/smsSignature');
		}
	
	}
	
	// --functin used to get Specific mobile No details-//
	public function getSpecificsign()
	{
	
		$signId=$this->input->post('signId');
		$result=$this->setting_model->getSpecificsign($signId);
		$this->Checklogin();
		if(count($result)>0)
		{
			?>
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">×</button>
							<h2 class="modal-title text-left">
								<i class="fa fa-trash"></i><?php getLocalkeyword('Edit Signature');?> 
							</h2>
						</div>
						<div class="modal-body">
							<div class="portlet-body form">
								<form role="form" action="<?php echo base_url()?>admin/setting/editsmsSignature" method="post">
									<div class="form-body">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label><?php getLocalkeyword('Signature Title');?><span class="mandatory"></span></label> 
													<input type="text" value="<?php echo $result[0]->sig_title;?>" name="txtTitle" class="form-control" placeholder="Signature Title" required="required" maxlength="20">
												    <input type="hidden" name="txtSignid" value="<?php echo $result[0]->sig_id_pk;?>">
												</div>
												<div class="input-group">
													<div class="mt-checkbox-list" style="padding-top: 2px;">
														<label> <input type="checkbox" name="chkEnglish" value="1"
														        <?php if($result[0]->sig_nonenlish==1){ echo "checked"; } ?>>
														        <?php getLocalkeyword('Non English');?> <span></span>
														</label>
													</div>
												</div>
												<div class="form-group">
													<label><?php getLocalkeyword('SMS Signature Text');?><span class="mandatory"></span></label>
													 <input type="text" name="txtSigntext"  value="<?php echo $result[0]->sig_content;?>" class="form-control" placeholder="SMS Signature Text" required="required" maxlength="20">
												</div>
												<P>* <?php getLocalkeyword('Character limit 20 max');?>.</p>
												<div class="modal-footer">
													<button type="submit" name="btnSubmit" class="btn btn-primary"><?php getLocalkeyword('Save');?></button>
													<button type="button" class="btn btn-danger" data-dismiss="modal"><?php getLocalkeyword('Cancel');?></button>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<?php 
			}	
			else 
			{?>
				 <span>Something Went Wrong........!</span>
				<?php 
			}	
			
			
		}
		
		// --functin used to deletesmsSign--//
		public function deletesmsSign()
		{
			$this->Checklogin();
			$signId=$this->input->post('signId');
		
			if(count($signId)>0)
			{
				$a=$this->setting_model->deletesmsSign($signId);
				setAActivityLogs('Transaction_activity','AAsmssignature_delete',"Signature Id :-".$signId);
				$this->session->set_flashdata('success','Signature has been deleted successfully');
				echo true;
			}
			else
			{
				$this->session->set_flashdata('success','Something Went Wrong.......!');
				echo true;
			}
		
		
				
		
		}
		
		// --functin used to deletesmsSign--//
		public function setDefaultsmssign()
		{
			$this->Checklogin();
			$signId=$this->input->post('signId');
		
			if(count($signId)>0)
			{
				$a=$this->setting_model->setDefaultsmssign($signId);
					
				$this->session->set_flashdata('success','Signature has been set to default successfully');
				setAActivityLogs('Transaction_activity','AAsmssignature_default',"Signature Default :-".$signId);
				echo true;
			}
			else
			{
				$this->session->set_flashdata('success','Something Went Wrong.......!');
				echo true;
			}
		
		
		
		
		}
	
		
		//-------Function used to save address labelling-----------//
		public function  addressLabeling()
		{
			$this->Checklogin();
			setAActivityLogs('Transaction_activity','AAaddresslabelling_view');

			$visitor_id=implode(",",$_POST['all_visitors_id']);
		
			$data['result']=$visitor_id;

			//$data ['result']=$this->setting_model->addressLabeling();
			$data ['include']='admin/setting/labeling';
			$data ['admin_section']='labeling';
			$this->load->view('backend/container',$data);	
		}


		//-------------- Function used for print preview/generate print -------//
		public function labelingAction()
		{
				if(isset($_POST['print_preview']))
				{
						setAActivityLogs('Transaction_activity','AAaddresslabeling_print_preview');
						$visitors_id=$_POST['hidden_visitors_id'];

						$data['resultVisitors']=$this->setting_model->getVisitorsDetails($visitors_id);

						$data['css_setting']='';

						$data ['include']='admin/setting/address_labeling_preview';
						$data ['admin_section']='address_labeling_preview';
						$this->load->view('backend/container',$data);
				}
				else
				{
						$visitors_id=$_POST['hidden_visitors_id'];

						$resultVisitors=$this->setting_model->getVisitorsDetails($visitors_id);

						$css_setting='generate';


				?>
						
						<div class="page-content-wrapper">

                <div class="page-content">

                    <div class="row">

                        <div class="col-md-12">

                                <?php
                                for($vt=0;$vt<count($resultVisitors);$vt++)
                                {    
                                ?>    
                                    <div class="col-md-4" style="float:left; border: groove; padding: 15px;width: 374.17322835px !important;height: 128.50393701px !important;color:black;background: #fff; margin-left: 5px;    margin-right: 5px;margin-bottom:10px;">
                                        <!-- <div class="preview"> -->
                                            <p style="text-align:<?php echo $_POST['rdbAlignment'];?>; font-size:<?php echo $_POST['selFontsize'];?>px; font-family:<?php echo $_POST['selFont'];?>;" >
                                                <font color="<?php echo $_POST['txtColor'];?>">
                                                <?php 
                                                if(isset($_POST['chkStyle_b'])){
                                                ?>    
                                                <b><?php } ?>
                                                <?php
                                                if(isset($_POST['chkStyle_i'])){
                                                ?><i><?php } ?>
                                                <?php 
                                                if(isset($_POST['chkStyle_u']))
                                                {
                                                ?><u><?php } ?>    
                                                    To, <?php echo $resultVisitors[$vt]->vis_firstName.' '.$resultVisitors[$vt]->vis_middleName.' '.$resultVisitors[$vt]->vis_lastName;?><br> <?php echo $resultVisitors[$vt]->vis_address;?>,<br> <?php echo $resultVisitors[$vt]->country_name;?> - <?php echo $resultVisitors[$vt]->vis_zipCode;?><br> Contact: +91 - <?php echo $resultVisitors[$vt]->vis_mobile;?>
                                                <?php 
                                                if(isset($_POST['chkStyle_u'])){
                                                ?>    
                                                </u><?php } ?>
                                                <?php
                                                if(isset($_POST['chkStyle_i'])){
                                                ?></i><?php } ?>
                                                <?php 
                                                if(isset($_POST['chkStyle_b']))
                                                {
                                                ?></b><?php } ?>
                                                </font>    
                                            </p>
                                        
                                    </div>
                                <?php
                                }
                                ?>  
                        </div>

                    </div>

                </div>

                <div class="clearfix"></div>

                <!-- END DASHBOARD STATS 1-->

            </div>


				<?php

						
						// $data ['include']='admin/setting/address_labeling_preview';
						// $data ['admin_section']='address_labeling_preview';
						// $this->load->view('admin/setting/address_labeling_preview',$data);
				}

			//echo $_POST['selFont'];
		}
		
	  public function saveAddresslabeling()
	  {
	  	
	  	$labelsize=$this->input->post('labelsize');
	  	$selFont=$this->input->post('selFont');
	  	$txtId=$this->input->post('txtId');
	  	$txtColor=$this->input->post('txtColor');
	  	$rdbButton=$this->input->post('rdbButton');
	  	$style=$this->input->post('style');
	  	$selFontsize=$this->input->post('selFontsize');
	  	

	  	$data=$this->setting_model->saveAddresslabeling($labelsize,$selFont,$txtId,$txtColor,$rdbButton,$style,$selFontsize);
	    echo $data;
	 
	  }
}

