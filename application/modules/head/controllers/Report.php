<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Report extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('report_model');
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
		
		$data['resultReport']=$this->report_model->getAllreport();
		$data ['include']='head/report/reportlist';
		$this->load->view('backend/container_sa',$data);
		setSAActivityLogs('Transaction_activity','SAReport_view');
	   
	}
	
	
	public function addReport()
	{
		
		
		$data['resultTable']=$this->report_model->getAlltable();
		$data ['include']='head/report/createreport';
		$this->load->view('backend/container_sa',$data);
		setSAActivityLogs('Transaction_activity','SAReport_addview');
	}
	
	
	public function getData()
	{
		
		$val=$this->input->post('val');
		
		for($i=0;$i<count($val);$i++)
		{
			
			$result=$this->db->query("DESCRIBE  ".$val[$i]);
			$result=$result->result();
			?>
			<optgroup label="<?php echo $val[$i];?>">
			  <?php 
			   for($j=0;$j<count($result);$j++)
			   {
			   	 ?>
			   	    <option value="<?php echo $result[$j]->Field;?>"><?php echo $result[$j]->Field;?></option>
			   	 <?php 
			   }
			  ?>
			</optgroup>
			<?php 
			
			
		}
		
	}
	
	
	public function getIntegerField()
	{
		$val=$this->input->post('val');
		
		?>
			<table class="table table-bordered table-hover" style="width: 80% !important;">
					<thead>
						<tr class="calculationHeaders blockHeader" style="background-color: #948f8f;">
							<th style="width: 40%;"><?php getLocalkeyword('Columns');?></th>
							<th style="width: 10%;"><?php getLocalkeyword('Sum');?></th>
							<th style="width: 10%;"><?php getLocalkeyword('Average');?></th>
							<th style="width: 10%;"><?php getLocalkeyword('Lowest Value');?></th>
							<th style="width: 10%;"><?php getLocalkeyword('Highest Value');?></th>
						</tr>
					</thead>
					<tbody>
					    <?php 
					       
					       for($i=0;$i<count($val);$i++)
					       {
					    		
					    	$result=$this->db->query("DESCRIBE  ".$val[$i]);
					    	$result=$result->result();
					    	for($j=0;$j<count($result);$j++)
					    	{   
					    		if($result[$j]->Type=="int(11)"||$result[$j]->Type=="int(10)"||$result[$j]->Type=="int(9)"||
					    			$result[$j]->Type=="int(8)"||$result[$j]->Type=="int(7)"||$result[$j]->Type=="int(6)"||
					    			$result[$j]->Type=="int(5)"||$result[$j]->Type=="int(4)"||$result[$j]->Type=="int(3)"||
					    			$result[$j]->Type=="int(2)"||$result[$j]->Type=="int(1)"||$result[$j]->Type=="double"||$result[$j]->Type=="float")
					    		{
					    	      ?>
									<tr class="calculationFieldRow">
										<td><?php echo $val[$i];?> -<?php echo $result[$j]->Field;?>
										    <input type="hidden" name="txtnumericFields[]" value="<?php echo $result[$j]->Field;?>" >
										</td>
										<td width="15%">
											<div style="text-align: center">
												<input class="calculationType" type="checkbox" name="<?php echo $result[$j]->Field;?>_sum" value="1">
											</div>
										</td>
										<td width="15%">
											<div style="text-align: center">
												<input class="calculationType" type="checkbox" name="<?php echo $result[$j]->Field;?>_avg" value="2">
											</div>
										</td>
										<td width="15%">
											<div style="text-align: center">
												<input class="calculationType" type="checkbox" name="<?php echo $result[$j]->Field;?>_low" value="3">
											</div>
										</td>
										<td width="15%">
											<div style="text-align: center">
												<input class="calculationType" type="checkbox" name="<?php echo $result[$j]->Field;?>_high" value="4">
											</div>
										</td>
									</tr>
								  <?php 
					    		}
					    	}
					       }
							?>	
						
					</tbody>
				</table>
		<?php 
		
	}

	
	public function getJoinConditions()
	{
		$val=$this->input->post('val');
		if(count($val)>1)
		{	
		?>
		   				<div class="row">
						<span class="col-lg-12">
							<div class="">
							<div class="col-lg-3 col-md-3 col-sm-3">
										<span><strong><?php getLocalkeyword('Join Conditions');?></strong></span>&nbsp;<span></span>
									</div>
									<?php 
									 for($k=1;$k<count($val);$k++)
									 {	
									?>
										<div class="row">
											<br><br>
												<div class="col-lg-3 col-md-3 col-sm-3">
													<div class="">
														<select class="form-control select2 fixedConditions" id="selJoin<?php echo $k;?>" style="width:300px" name="selJoin<?php echo $k;?>">
																<option value="">Select...</option>
														<?php 
														    for($i=0;$i<count($val);$i++)
													  	    {
															    $result=$this->db->query("DESCRIBE  ".$val[$i]);
																$result=$result->result();
																for($j=0;$j<count($result);$j++)
																{
															    ?>
															     <option value="<?php echo $result[$j]->Field;?>"><?php echo "<b>".$val[$i]."<b>-".$result[$j]->Field;?></option>
															   <?php 
																}
															 }
															 ?>
														</select>
													</div>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-3">
													<div class="">
														<select class="form-control select2 fixedConditions" style="width:300px" id="selJoinwith<?php echo $k;?>" name="selJoinwith<?php echo $k;?>">
															<option value="">Select...</option>
															<?php 
														    for($i=0;$i<count($val);$i++)
													  	    {
															    $result=$this->db->query("DESCRIBE  ".$val[$i]);
																$result=$result->result();
																for($j=0;$j<count($result);$j++)
																{
															    ?>
															     <option value="<?php echo $result[$j]->Field;?>"><?php echo "<b>".$val[$i]."<b>-".$result[$j]->Field;?></option>
															   <?php 
																}
															 }
															 ?>
														</select>
													</div>
												</div>
												<br>
										</div>
								<?php 
									 }
									?>
							</div>
					
					</div>
		
		<?php 
		}
		
	}
	
	
	public function getFixedcondition()
	{
		
		$val=$this->input->post('val');
		?>
			<div class="row">
				<br>
				<div class="col-lg-3 col-md-3 col-sm-3">
					<div class="">
						<select class="form-control select2 fixedConditions" style="width:300px" name="selectFixcilent" id="selectFixcilent">
							<option value="">Select Client Field</option>
							<?php 
							    for($i=0;$i<count($val);$i++)
						  	    {
								    $result=$this->db->query("DESCRIBE  ".$val[$i]);
									$result=$result->result();
									for($j=0;$j<count($result);$j++)
									{
								    ?>
								     <option value="<?php echo $result[$j]->Field;?>"><?php echo "<b>".$val[$i]."<b>-".$result[$j]->Field;?></option>
								   <?php 
									}
								 }
							 ?>
						</select>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3">
					<div class="">
						<select class="form-control select2 fixedConditions " style="width:300px"  name="selectFixbranch" id="selectFixbranch">
							<option value="">Select Branch Field</option>
								<?php 
							    for($i=0;$i<count($val);$i++)
						  	    {
								    $result=$this->db->query("DESCRIBE  ".$val[$i]);
									$result=$result->result();
									for($j=0;$j<count($result);$j++)
									{
								    ?>
								     <option value="<?php echo $result[$j]->Field;?>"><?php echo "<b>".$val[$i]."<b>-".$result[$j]->Field;?></option>
								   <?php 
									}
								 }
							 ?>
						</select>
					</div>
				</div>
			</div>
		<?php 
		
	}
	
	function saveReport()
	{

		
		if(isset($_POST['txtName']))
		{	
		  	
		  $id=$this->report_model->saveReport();
		  if($id)
		  {
		  	$this->session->set_flashdata('success','Report Saved Successfully.');
		  	redirect('head/report');
		  }	
		  else 
		  {
		  	$this->session->set_flashdata('success','Something Went Wrong.');
		  	redirect('head/report');
		  }
		   
		}
		else 
		{
			$this->session->set_flashdata('success','Something Went Wrong.');
			redirect('head/report');
		}	
		
		
		
	}
	
	
	

	public function pushrevokeReport()
	{
	
		$this->Checklogin();
		$status=$this->input->post('id');
		$reportId=$this->input->post('report');
		$idlist=implode(",",$reportId);
	
		if ($status == 0 || $status == 1)
		{
			$a=$this->report_model->pushrevokeReport($status,$reportId);
				
			if ($status == 0)
			{
	
				setSAActivityLogs('Transaction_activity','SAReport_Revoke',"Revoked report :- ".$idlist);
				setSAActivityLogs('Transaction_activity','SAReport_revoke',$idlist);
				$this->session->set_flashdata('success','Report has been revoked successfully');
			} else
			{
				setSAActivityLogs('Transaction_activity','SAReport_Push',"Push rport :- ".$idlist);
				setSAActivityLogs('Transaction_activity','SAReport_push',$idlist);
				$this->session->set_flashdata('success','Report has been pushed successfully');
			}
			echo true;
		} else
		{
				
			$this->session->set_flashdata('error','Something went wrong');
			echo true;
		}
	
	}
	
	
	public function editReport($id="0")
	{
		$id=base64_decode($id);
	    if($id!=0)
	    {	
	
	    	$data['resultReport']=$this->report_model->getReport($id);
			$data['resultTable']=$this->report_model->getAlltable();
			
			
			$data ['include']='head/report/editreport';
			$this->load->view('backend/container_sa',$data);
			setSAActivityLogs('Transaction_activity','SAReport_editreportview');
	    }
	    else 
	    {
	    	$this->session->set_flashdata('success','Something Went Wrong.');
		  	redirect('head/report');
	    }	
	}
	
	function modifiedReport()
	{
	
	
		if($_POST['report_id']!='')
		{
			 
			$id=$this->report_model->modifiedReport();
			if($id)
			{
				$this->session->set_flashdata('success','Report Updated Successfully.');
				redirect('head/report');
			}
			else
			{
				$this->session->set_flashdata('success','Something Went Wrong.');
				redirect('head/report');
			}
			 
		}
		else
		{
			$this->session->set_flashdata('success','Something Went Wrong.');
			redirect('head/report');
		}
	
	
	
	}
	
	
	
}

