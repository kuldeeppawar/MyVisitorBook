<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Festival extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->model('festival_model');
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
		if ($this->session->userdata('admin_email') == '')
		{
			redirect('head/');
		}
	
	}

	public function index()
	{
	
		$this->Checklogin();
		setSAActivityLogs('Transaction_activity','SAFestival_view');
		$data ['result']=$this->festival_model->getAllFestival();
		$data ['resultActivestate']=$this->festival_model->getActivestate();
		$data ['resultState']=$this->festival_model->getAllstate();
		$data ['include']='head/festival/festival';
		$data ['admin_section']='manage_festival';
		$this->load->view('backend/container_sa',$data);
	
	}
	
	// ---Function used to add new festival-//
	public function addFestival()
	{
		
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
		
			$data ['admin_section']='festival';
			$id=$this->festival_model->addFestival();
			if ($id)
			{
				$this->session->set_flashdata('success','Festival has been added successfully.');
				redirect('head/festival');
			} else
			{
				$this->session->set_flashdata('error','Unable to save festival.');
				$data ['include']='head/festival/festival';
				$data ['admin_section']='manage_festival';
				$this->load->view('backend/container_sa',$data);
			}
		} else
		{
			redirect('head/festival');
		}
	
	}
	
	// ---Function used to add new Festival-//
	public function editFestival()
	{
		
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
			
		
			$data ['admin_section']='Festival';
			$id=$this->festival_model->editFestival();
			if ($id)
			{
				$this->session->set_flashdata('success','Festival has been updated successfully.');
				redirect('head/festival');
			} else
			{
				$this->session->set_flashdata('error','Unable to update festival.');
				$data ['include']='head/festival/festival';
				$data ['admin_section']='manage_festival';
				$this->load->view('backend/container_sa',$data);
			}
		} else
		{
			redirect('head/festival');
		}
	
	}
	
	// --functin used to deactivate/activate city--//
	public function changecityStatus()
	{
		$this->Checklogin();
		$status=$this->input->post('id');
		$festivalid=$this->input->post('festivalid');
		$stateid=$this->input->post('stateid');
		$idlist=implode(",",$stateid);
	
		if ($status == 0 || $status == 1)
		{
			$a=$this->festival_model->changecityStatus($status,$festivalid);

			
			if ($status == 0)
			{
                             if(count($festivalid)>1)
                            {
				      					$this->session->set_flashdata('success','Festivals  has been deactivated successfully');
			    			}
                            else
                            {
                                      $this->session->set_flashdata('success','Festival  has been deactivated successfully');
                            }  
	
							setSAActivityLogs('Transaction_activity','SAFestival_status',"Updates Status Deactivated :- ".$idlist);
			} 
			else
			{
                            if(count($festivalid)>1)
                            {
			              				  $this->session->set_flashdata('success','Festivals  has been activated successfully');
							}
                            else
                            {
                                          $this->session->set_flashdata('success','Festival  has been activated successfully');
                            }
			   				
			   				setSAActivityLogs('Transaction_activity','SAFestival_status',"Updates Status Activated :-".$idlist);
			}
			echo true;
		} 
		else
		{
			
			$this->session->set_flashdata('error','Something went wrong');
			echo true;
		}
	
	}
	
	// ---Function used to upload Csv--//
	public function uploadFestivalcsv()
	{
		
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
			
		
			$data ['admin_section']='Festival';
			$id=$this->festival_model->uploadFestivalcsv();
			if ($id)
			{
				$this->session->set_flashdata('success','Festival CSV uploaded successfully.');
				redirect('head/festival');
			} else
			{
				$this->session->set_flashdata('error','Unable to upload csv.');
					redirect('head/festival');
			}
		} else
		{
			redirect('head/festival');
		}
	
	}

	//----load userfestival lst=--//    
	public function userFestival()
	{
	
		$this->Checklogin();
		setSAActivityLogs('Transaction_activity','SAuserFestival_view');
		$data ['result']=$this->festival_model->getAllClient();
		$data ['include']='head/festival/user_festival';
		$data ['admin_section']='manage_festival';
		$this->load->view('backend/container_sa',$data);
	
   }
   
   //-----ajax function load user festival----//
   public function getuserFestivals()
   {
   	
   	  $id=$this->input->post('id');
   	  $resultFestival=$this->festival_model->getClientFestival($id);
   	
   	  ?>
   	 
   	  <div class="user_list_box">
		<a onclick="closProfileDiv();" class="close_section pull-right" title="Close" id="close"><i style="color: #616161; padding-top: 10px; margin-left: 7px; font-size: 35px;" class="fa fa-times fa-3x"></i></a>
		<div class="row">
			<!--modal-->
			<!--end modal-->
			<div class="col-md-12">
				<div class="table-toolbar">
					<div class="row">
						<div class="col-md-3 ">
							<ul class="nav navbar-nav pl0">
								<li class="dropdown dropdown-user"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="font-size: 18px; padding: 2px 0px;">Recently updated <i class="fa fa-angle-down"></i>
								</a>
									<ul class="dropdown-menu dropdown-menu-default">
										<li><a href="#">All Contacts</a></li>
										<li><a href="#">My Contacts </a></li>
										<li><a href="#">Recently viewed</a></li>
										<li><a href="#">Not updated in 30 Days</a></li>
									</ul></li>
							</ul>
						</div>
						<?php
						if(getAccessRights('mvbFmUfmConfirm'))
						{
						?>	
								<div class="col-md-5  pull-right">
									<div class="pull-right">
										<div class="btn-group">
											<a id="sample_editable_1_new hvr-float-shadow" class="btn btn-primary" onclick="getConfirmfestival()"> 
											<?php getLocalkeyword('Confirm Festival');?>
											</a>
										</div>
										</li>
										</ul>
										<!-- modal ends -->
									</div>
								</div>
						<?php
						}
						?>
					</div>
					<!--<div class="selected_rows">
						1/17 row(s) selected <a id="selectall1">select all</a>
					</div>-->
					<div class="portlet light">
						<div class="portlet-body">
							<table class="table table-hover table-checkable order-column" id="sample_2" style="width: 100% !important;">
								<thead>
									<tr>
										<th style="width: 35px;"><input type="checkbox" id="checkall1" data-set="" name="all" /> <span id="growl-primary1"></span> </label></th>
										<th><?php getLocalkeyword('Sr.No');?></th>
										<th><?php getLocalkeyword('Festival Name');?></th>
										<th><?php getLocalkeyword('Festival Date');?></th>
										<th><?php getLocalkeyword('Status');?></th>
										<th><?php getLocalkeyword('Action');?></th>
									</tr>
								</thead>
								<tbody>
									
									  <?php 
											  
											  
											  
											     for($i=0;$i<count($resultFestival);$i++)
											     {
											     	
											     	$j=$i+1;
											     	$dt="chk".$j;
											      ?>
												<tr class="odd gradeX">
													<td>
													<input name="chk1<?php echo $j;?>"    type="checkbox" data-ptag="sb1" id="chk1<?php echo $j;?>" 
													 <?php if($resultFestival[$i]->fest_category==1){ echo "checked  ";  echo "disabled  ";  echo "class='check_box chkdisable'" ;   }
													          else if($resultFestival[$i]->brnfs_id_pk >0 ){ echo "checked  ";  echo "class='check_box'" ;}   
													          else{  echo "class='check_box'"; }
													 ?>       value="<?php echo $resultFestival[$i]->fest_id_pk."-".$resultFestival[$i]->brn_id_pk;?>">
													</td>
													<td><?php echo $j?></td>
													<td><?php echo $resultFestival[$i]->fest_name;?></td>
													<td><?php echo $resultFestival[$i]->fest_date;?></td>
													<td><?php if($resultFestival[$i]->brnfs_id_pk>0)
													            {
													            	echo "Selected";
													            }
													            else 
													            {
													            	echo "Not Selected";
													            }	
														?></td>
													<td><input type="checkbox"  class="make-switch" name="chk1<?php echo $j;?>"   data-on-text="&nbsp;Select&nbsp;" data-off-text="&nbsp;Unselect&nbsp;" data-size="small"
													    <?php  if($resultFestival[$i]->fest_category==1 )
													          { echo "checked  ";  echo "disabled";  }
													          else if($resultFestival[$i]->brnfs_id_pk>0)
													           { echo "checked  ";}
													          
													       ?>>
													     
													     </td>
												</tr>
												<?php 
											     }
												
												?>
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
function getConfirmfestival()
{
     var count=<?php echo count($resultFestival)?>;
  
     var festival=[];
     
     for (var i=1;i<=count;i++)
     {
   	  if($('#chk1'+i).is(':checked'))
   	  {
   		festival.push($("#chk1"+i).val()); 
   	  }
      } 

     
     if (festival.length === 0) {
   	   alert ("Please Select Festivals Name");
   	      
   	}
     else
     {
          var id=<?php echo $id?>;

          $.post("<?php echo base_url();?>head/festival/getConfirmfestival",{festival:festival,id:id},function(data){
               location.reload(true);
               });
           
      }  
    

}




</script>
   	  <?php 
   	
   }
   
   
   //--Function used to get confirm festival for branch--//
   
   public function getConfirmfestival()
   {
   	$this->Checklogin();
   	 
   	$festival=$this->input->post('festival');
   	$id=$this->input->post('id');
   
   
   	if (count($festival)>0)
   	{
   		
   		$a=$this->festival_model->getConfirmfestival($festival,$id);
   
   		 
   		$this->session->set_flashdata('success','Festival confirmed successfully');
   		 
   		echo true;
   	} else
   	{
   
   		$this->session->set_flashdata('error','Something went wrong');
   		echo true;
   	}
   
   }

   public function checkFestivalsTemplate($festival_id)
   {
   			$checkFestival=$this->festival_model->checkFestivalsTemplate($festival_id);

   			if(count($checkFestival)>0)
   			{
   					echo "true";
   			}
   			else
   			{
   					echo "false";
   			}
   }
}

