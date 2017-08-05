<?php

class Sms_settings extends CI_Controller
{
    public function __construct()
    {
       parent::__construct();
		
		$this->load->database();
		$this->load->model('sms_settings_model');
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
            
            setAActivityLogs('Transaction_activity','Sms_settings_view');

        //-------------------------------  End Save Transaction Logs ------------------------------//
        
        $data ['result']=$this->sms_settings_model->getAllSmsSettings();
		$data ['include']='admin/sms_settings/manage_sms_settings';
		$data ['admin_section']='manage_sms_settings';
		$this->load->view('backend/container',$data);
    }     

    public function addSmsSettings()
    {
            $this->Checklogin();
            if (isset($_POST ['btnSubmit']))
            {
                $result=$this->sms_settings_model->addSmsSettings();
                
                if ($result > 0)
                {
                    $this->session->set_flashdata('success','SMS template has been added successfully.');
                    redirect('admin/sms_settings');
                } 
                else
                {
                    $this->session->set_flashdata('error','Unable to save SMS template details.');
                    redirect($this->agent->referrer());
                }
            } 
            else
            {
                $data ['result']=$this->sms_settings_model->addSmsSettings();
                $data ['include']='sms_settings/manage_sms_settings';
                $data ['admin_section']='manage_sms_settings';
                $this->load->view('backend/container',$data);
            }
    }


    public function getFieldsOptions()
    {
             $fields_type=$_POST['type_fields_id'];            

             $html='';

             if($fields_type=='basic_fields')
             {
                    $html.='<li class="list-group-item">Title </li>

                            <li class="list-group-item">First Name</li>

                            <li class="list-group-item">Middle Name</li>

                            <li class="list-group-item">Last Name</li>

                            <li class="list-group-item">Mobile Number </li>

                            <li class="list-group-item">Email Id</li>';
             }
             else if($fields_type=='contact_details')
             {
                    $html.='<li class="list-group-item">Address </li>

                            <li class="list-group-item">Zip Code</li>

                            <li class="list-group-item">Country</li>

                            <li class="list-group-item">State</li>

                            <li class="list-group-item">City </li>

                            <li class="list-group-item">Website</li>

                            <li class="list-group-item">Landline Number </li>

                            <li class="list-group-item">Fax</li>';
             }
             else if($fields_type=='personal_info')
             {
                    $html.='<li class="list-group-item">Contact Group </li>

                            <li class="list-group-item">Business Category</li>

                            <li class="list-group-item">Business Name</li>

                            <li class="list-group-item">DOB</li>

                            <li class="list-group-item">Anniversary Date</li>';
             }
             else
             {
                    $client_id=$this->session->userdata('client_id');

                    $result_custom_fields=$this->db->query("Select cfi_label From tblmvbcustomfields where (cfi_clientId='".$client_id."' OR cfi_clientId='0') and cfi_status='1'");

                    $row_custom_fields=$result_custom_fields->result();

                    if(count($row_custom_fields)>0)
                    {
                            for($k=0;$k<count($custom_fields);$k++)
                            { 
                                    $html.='<li class="list-group-item">'.$custom_fields[$k]->cfi_label.' </li>';
                            }
                    }
             }

             echo $html;
    }



    public function getTemplateDetails()
    {
            $sms_temp_id=$_POST['temp_id'];   

            $result=$this->db->query("SELECT str_template_name,str_description From tblmvbsmstemprequest where str_id_pk='".$sms_temp_id."'");
                
            $row=$result->result();

            $html='';

            ?><form id="email_temp_form" name="email_temp_form" method="POST" action="<?php echo base_url()?>admin/sms_settings/editSmsSettings">    
                                    <div class="form-group">

                                        <label><?php getLocalkeyword('SMS Template Name');?> <span class="mandatory">*</span></label>

                                        <input type="text" class="form-control" placeholder="SMS Template Name" id="txttemplatename" name="txttemplatename" value="<?php echo $row[0]->str_template_name;?>" required>

                                    </div>

                                    <div class="form-group">

                                        <label><?php getLocalkeyword('Enter Content');?></label>
                                        <textarea class="form-control" rows="3" placeholder="SMS Body" style=" height: 240px;" id="txtemailcontent" name="txtemailcontent"
                                         required><?php echo $row[0]->str_description; ?></textarea>
                                    </div>

                                    <div class="form-group">
                                    <input type="hidden" id="hidden_temp_id" name="hidden_temp_id" value="<?php echo $sms_temp_id ;?>"/>
                                        <button type="submit" class="btn btn-primary" name="btnSubmit">Save</button>
                                        <a href="<?php echo base_url()?>'admin/sms_settings" class="btn btn-danger">Cancel</a>

                                    </div>
                                </form><?php 

                              
    }

     public function editSmsSettings()
     {
            $this->Checklogin();           

            if (isset($_POST ['btnSubmit']))
            {
                $result=$this->sms_settings_model->editSmsSettings();
                
                if ($result)
                {
                    $this->session->set_flashdata('success','SMS Settings has been updated successfully.');
                    redirect('admin/sms_settings');
                } 
                else
                {
                    $this->session->set_flashdata('error','Unable to save SMS Settings.');
                    redirect($this->agent->referrer());
                }
            }             
     }


     public function getRecordById()
     {
            $temp_id=$_POST['hidden_temp_id'];

            $html='';

            $result=$this->sms_settings_model->getAllSmsSettings();

            $row=$this->sms_settings_model->getRecordById($temp_id);

            ?><div class="row">

            <div class="col-md-4">

                <div class="portlet light bordered">

                    <div class="portlet-title1">

                        <a style="font-size:18px;padding: 2px 0px;"><?php getLocalkeyword('Available SMS Templates');?>:</a>

                        <div class="row">
                            <div id="send_email2" class="modal fade" role="dialog">

                                <div class="modal-dialog">

                                    <!-- Modal content-->

                                    <div class="col-md-10">

                                        <div class="modal-content">

                                            <div class="modal-header">

                                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                <h2 class="modal-title text-center"><i class="fa fa-envelope-o"></i> Send Email</h2>

                                            </div>

                                            <div class="modal-body">

                                                <div class="portlet-body form">

                                                    <form role="form">

                                                        <div class="form-body">
                                                            <div class="row">

                                                                <div class="col-md-12">

                                                                    <div class="form-group">

                                                                        <label>Email-id <span class="mandatory"></span></label>

                                                                        <input type="text" class="form-control" value="abc@gmail.com" readonly>

                                                                    </div>

                                                                    <div class="form-group">

                                                                        <label>Subject <span class="mandatory"></span></label>

                                                                        <input type="text" class="form-control">

                                                                    </div>

                                                                    <div class="form-group">

                                                                        <label>Message <span class="mandatory"></span></label>

                                                                        <textarea class="form-control" rows="4"></textarea>

                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>

                                                    </form>

                                                </div>

                                            </div>

                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-primary">Send Email</button>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div id="myModal_m12" class="modal fade" role="dialog">

                                <div class="modal-dialog">

                                    <div class="modal-content">

                                        <div class="modal-header">

                                            <button type="button" class="close" data-dismiss="modal">×</button>

                                            <h2 class="modal-title text-center" style="font-size: 18px !important;"> <i class="fa fa-trash"></i> Are you sure to Delete? </h2>

                                        </div>

                                        <div class="modal-footer"> <a href class="btn btn-primary">Yes</a>

                                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="portlet-body" style="height:650px; overflow: auto;" id="test-list">

                        <ul class="list list-group All_list">
                             <?php 
                                    for($j=0;$j<count($result);$j++)
                                    {                                    
                                        ?><li class="list-group-item">
                                            <input type="checkbox" height="20" width="20" value="<?php echo $result[$j]->etr_id_pk;?>" onclick="getTemplateDetails();" 
                                             <?php   if($result[$j]->str_id_pk==$temp_id)
                                            {
                                                    echo 'checked';
                                            }           
                                            ?>/><?php echo $result[$j]->str_template_name?></li>
                                              <?php                              
                                    }
                                  ?></ul>
                        <ul class="pagination pull-right"></ul>        
                    </div>

                </div>

                <ul class="pagination pagination-sm pull-right">

                    <li>

                        <a href="javascript:;">

                            <i class="fa fa-angle-left"></i>

                        </a>

                    </li>

                    <li>

                        <a href="javascript:;"> 1 </a>

                    </li>

                    <li class="active">

                        <a href="javascript:;"> 2 </a>

                    </li>

                    <li>

                        <a href="javascript:;"> 3 </a>

                    </li>

                    <li>

                        <a href="javascript:;"> 4 </a>

                    </li>

                    <li>

                        <a href="javascript:;"> 5 </a>

                    </li>

                    <li>

                        <a href="javascript:;"> 6 </a>

                    </li>

                    <li>

                        <a href="javascript:;">

                            <i class="fa fa-angle-right"></i>

                        </a>

                    </li>

                </ul>

            </div>

            <div class="col-md-8">

                <div class="row">

                    <div class="" style=" margin-bottom: 10px; padding: 10px 0px; margin-left: 12px; margin-right: 12px;">

                        <div class="col-md-2">

                        </div>

                        <div class="col-md-7">

                        </div>

                        <div class="col-md-3">

                            <a onclick="closProfileDiv();" class="close_section pull-right" title="Close" id="close"><i style="color: #616161; padding-top: 10px;" class="fa fa-times fa-3x"></i></a> </div>

                    </div>
                    <div id="send_emailm1" class="modal fade" role="dialog">

                        <div class="modal-dialog">

                            <!-- Modal content-->

                            <div class="col-md-10">

                                <div class="modal-content">

                                    <div class="modal-header">

                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                        <h2 class="modal-title text-center"><i class="fa fa-envelope-o"></i> Send Email</h2>

                                    </div>

                                    <div class="modal-body">

                                        <div class="portlet-body form">

                                            <form role="form">

                                                <div class="form-body">
                                                    <div class="row">

                                                        <div class="col-md-12">

                                                            <div class="form-group">

                                                                <label>Email-id <span class="mandatory"></span></label>

                                                                <input type="text" class="form-control" value="abc@gmail.com" readonly>

                                                            </div>

                                                            <div class="form-group">

                                                                <label>Subject <span class="mandatory"></span></label>

                                                                <input type="text" class="form-control">

                                                            </div>

                                                            <div class="form-group">

                                                                <label>Message <span class="mandatory"></span></label>

                                                                <textarea class="form-control" rows="4"></textarea>

                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>

                                            </form>

                                        </div>

                                    </div>

                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-primary">Send Email</button>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div id="myModal_mm1" class="modal fade" role="dialog">

                        <div class="modal-dialog">

                            <div class="modal-content">

                                <div class="modal-header">

                                    <button type="button" class="close" data-dismiss="modal">×</button>

                                    <h2 class="modal-title text-center" style="font-size: 18px !important;"> <i class="fa fa-trash"></i> Are you sure to Delete? </h2>

                                </div>

                                <div class="modal-footer"> <a href class="btn btn-primary">Yes</a>

                                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-12">
                        
                        <div class="col-md-6" id="email_temp_dynamic">
                                <form id="email_temp_form" name="email_temp_form" method="POST" action="<?php echo base_url()?>admin/sms_settings/editSmsSettings">    
                                    <div class="form-group">

                                        <label><?php getLocalkeyword('SMS Template Name');?> <span class="mandatory">*</span></label>

                                        <input type="text" class="form-control" placeholder="SMS Template Name" id="txttemplatename" name="txttemplatename" required value="<?php echo $row[0]->str_template_name; ?>">

                                    </div>

                                    <div class="form-group">

                                        <label><?php getLocalkeyword('Enter Content');?></label>

                                        <!--   <img src="../assets/pages/img/editor.png" /> -->

                                        <textarea class="form-control" rows="3" placeholder="SMS Body" style=" height: 240px;" id="txtemailcontent" name="txtemailcontent" required><?php echo $row[0]->str_description;?></textarea>
                                    </div>

                                    <div class="form-group">
                                    <input type="hidden" id="hidden_temp_id" name="hidden_temp_id" value="<?php echo $row[0]->str_id_pk; ?>"/>
                                        <button type="submit" class="btn btn-primary" name="btnSubmit"><?php getLocalkeyword('Save');?></button>

                                        <a href="'.base_url().'admin/sms_settings" class="btn btn-danger"><?php getLocalkeyword('Cancel');?></a>

                                    </div>
                                </form>    
                        </div>
                        
                        <div class="col-md-6">

                            <div class="row">

                                <div class="col-md-12" style="height:73px;"></div>

                                <div class="col-md-12">

                                    <label><?php getLocalkeyword('Select Fields');?></label>

                                    <select class="form-control" id="selfields" name="selfields" onchange="getFieldsOptions(this.value);">

                                        <option value="">Select Fields</option>

                                        <option value="basic_fields">Basic Fields</option>

                                        <option value="contact_details">Contact Details</option>

                                        <option value="personal_info">Personal Info</option>

                                        <option value="custom_fields">Custom Fields</option>

                                    </select>

                                </div>

                                <div class="col-md-12">

                                    <ul class="list-group" style="height:200px; overflow:auto;border: solid 1px #b3b3b3;" id="get_fields_details">
                                    </ul>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-12"> </div>

        </div><?php 


        

     }


     public function deleteSmsTemp()
    {
            $this->Checklogin();

            $temp_id=$_POST['temp_id'];
           
            $result=$this->sms_settings_model->deleteSmsTemp($temp_id); 
    }
}
?>