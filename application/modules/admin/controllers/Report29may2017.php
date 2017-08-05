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
		if ($this->session->userdata('admin_admin_email') == '')
		{
			redirect('admin/');
		}
	
	}

	public function index()
	{
		
		$this->Checklogin();
		
		$data['resultReport']=$this->report_model->getAllreport();
		$data ['include']='admin/report/reportlist';
		$this->load->view('backend/container',$data);
	
		setAActivityLogs('Transaction_activity','AAReport_view');
	   
	}
	
	
	
	public function getReportfield()
	{
		$reportId=$this->input->post('val');
		
		$resultreport=$this->report_model->getReport($reportId);
		
		$resultCondtion=$this->report_model->getresultCondition($reportId);
		 
		$val=explode(",",$resultreport[0]->report_table);
		
		if(count($resultCondtion)>0)
		{	
		
		     for($m=0;$m<count($resultCondtion);$m++)
		     {	
				for($i=0;$i<count($val);$i++)
				{
						
					$result=$this->db->query("DESCRIBE  ".$val[$i]);
					$result=$result->result();
					for($j=0;$j<count($result);$j++)
					{
					  if($result[$j]->Field==$resultCondtion[$m]->rpc_field)
					  {
					    $x=1;
					  	$type="text";
					     if($result[$j]->Type=="int(11)"||$result[$j]->Type=="int(10)"||$result[$j]->Type=="int(9)"||
					    			$result[$j]->Type=="int(8)"||$result[$j]->Type=="int(7)"||$result[$j]->Type=="int(6)"||
					    			$result[$j]->Type=="int(5)"||$result[$j]->Type=="int(4)"||$result[$j]->Type=="int(3)"||
					    			$result[$j]->Type=="int(2)"||$result[$j]->Type=="int(1)"||$result[$j]->Type=="double"||$result[$j]->Type=="float")
					    		{
					    			$type="number";
					    		}
					       else if($result[$j]->Type=="datetime"||$result[$j]->Type=="date")
					       {
					       	 $type="date";
					       }
					       
					  	 ?> <input type="hidden" name="txtValidate" id="txtValidate" value="2">
							<div class="form-group">
                                <label class="control-label col-md-3"><?php echo $resultCondtion[$m]->rpc_field;?>
                              
                                </label>
                                <div class="col-md-4">
                                 <input type="<?php echo $type?>" name="txtConditions<?php echo $x; ?>" id="txtConditions<?php echo $x; ?>" 
                                     class="form-control" required="required"> </div>
                            </div>
                            <input type="hidden" name="txtCount" id="txtCount" value="<?php echo $x; ?>">
				        <?php
				        $x++;
					  }
					}  
							
							
			    }
			
		     }
		}
		else 
		{
			?>
			 <input type="hidden" name="txtValidate" id="txtValidate" value="1">
			<?php 
		}	
	
	}

	
	
	public function getReportcsv()
	{
		$reportId=$this->input->post('selReport');
		$optCondition1=$this->input->post('txtConditions1');
		$optCondition2=$this->input->post('txtConditions2');
		$optCondition3=$this->input->post('txtConditions3');
	
		setAActivityLogs('Transaction_activity','AAreport_Downloaded',"reportId:-".$reportId);
		//---get result details---//
		$resultreport=$this->report_model->getReport($reportId);
	
		//----get Result Conditions----//
		$resultCondtion=$this->report_model->getresultCondition($reportId);
		
		//----get Report group and order by---//
		$resultGroup=$this->report_model->getreportGroup($reportId);
		
		
		//----get report joins----//
		$resultJoins=$this->report_model->getreportJoins($reportId);
		
		//----get numeric fields from report----//
		$resultNumeric=$this->report_model->getNumericdetails($reportId);
			
		
		
		
		$selTable=$resultreport[0]->report_table;
		
		$arrTable=explode(",",$selTable);
		
		$selfield=$resultreport[0]->report_field;
		$clientfield=$resultreport[0]->report_fixclient;
		$branchfield=$resultreport[0]->repot_fixbranch;
		$groupCondition=$orderCondition=$fixedConditions="";
		$numericfield=array();
		$aliasnumericfield=array();
		$generatedQuery="";
		
	
		///fixed conditions checking//
		if ($clientfield != "" && $branchfield != '')
		{
			$fixedConditions="WHERE " . $clientfield . "$this->session->userdata('client_id') " . $branchfield . "=".$this->session->userdata('branch_id');
		} else if ($clientfield != "" && $branchfield == '')
		{
			$fixedConditions="WHERE " . $clientfield . "=".$this->session->userdata('branch_id');
		} else
		{
			$fixedConditions="WHERE " . $branchfield . "=".$this->session->userdata('branch_id');
		}
			
			// ---optional conditions---//
		for($i=0;$i < count($resultCondtion);$i ++)
		{
			$j=$i+1;
			if($j==1)
			{
				$optCondition=$optCondition1;
			}	
			if($j==2)
			{
				$optCondition=$optCondition2;
			}
			if($j==3)
			{
				$optCondition=$optCondition3;
			}
		
			if ($resultCondtion[$i]->rpc_condition == "equals")
			{
				$fixedConditions.=" AND " . $resultCondtion[$i]->rpc_field . " = ".$optCondition." ";
			}
			if ($resultCondtion[$i]->rpc_condition  == "not equal to")
			{
				$fixedConditions.=" AND " . $resultCondtion[$i]->rpc_field . " !=".$optCondition." ";
			}
			if ($resultCondtion[$i]->rpc_condition  == "starts with")
			{
				$fixedConditions.=" AND " . $resultCondtion[$i]->rpc_field . " LIKE ".$optCondition." %";
			}
			if ($resultCondtion[$i]->rpc_condition == "ends with")
			{
				$fixedConditions.=" AND " . $resultCondtion[$i]->rpc_field . " LIKE % ".$optCondition."";
			}
			if ($resultCondtion[$i]->rpc_condition  == "contains")
			{
				$fixedConditions.=" AND " .$resultCondtion[$i]->rpc_field. " IN(".$optCondition.")";
			}
			if ($resultCondtion[$i]->rpc_condition  == "does not contain")
			{
				$fixedConditions.=" AND " . $resultCondtion[$i]->rpc_field . " NOT IN(".$optCondition.")";
			}
			if ($resultCondtion[$i]->rpc_condition  == "is empty")
			{
				$fixedConditions.=" AND " . $resultCondtion[$i]->rpc_field . " =''";
			}
			if ($resultCondtion[$i]->rpc_condition  == "is not empty")
			{
				$fixedConditions.=" AND " . $resultCondtion[$i]->rpc_field . " !=''";
			}
			
			
		}
			
		
		
		// ---group and order by fields---//
		for($i=0;$i < count($resultGroup);$i ++)
		{
			
			$dataGroup=$resultGroup[$i]->ro_id_group;
			if ($dataGroup == "1")
			{
				$groupCondition="GROUP BY " . $resultGroup[$i]->ro_id_field;
			}
			
			$dataOrder=$resultGroup[$i]->ro_id_ascdesc;
			
			if ($dataOrder == "ASC" || $dataOrder == "DESC")
			{
				
				$orderCondition="ORDER BY " . $resultGroup[$i]->ro_id_field . " " . $dataOrder;
			}
		}
		
		// ---numeric fields calculations--//
		for($i=0;$i < count($resultNumeric);$i ++)
		{
			
			
			$data_sum=$resultNumeric[$i]->rpn_sum;
			$data_avg=$resultNumeric[$i]->rpn_avg;
			$data_low=$resultNumeric[$i]->rpn_low;
			$data_high=$resultNumeric[$i]->rpn_high;
			
			if ($data_sum == 1)
			{
				array_push($numericfield,"SUM(" . $resultNumeric[$i]->rpn_field . ") AS " . $resultNumeric[$i]->rpn_field. "_sum");
				array_push($aliasnumericfield, $resultNumeric[$i]->rpn_field."_sum");
				
			}
			
			if ($data_avg == 2)
			{
				array_push($numericfield,"AVG(" . $resultNumeric[$i]->rpn_field . ") AS " . $resultNumeric[$i]->rpn_field . "_avg");
				array_push($aliasnumericfield, $resultNumeric[$i]->rpn_field."_avg");
			}
			if ($data_sum == 3)
			{
				array_push($numericfield,"MIN(" . $resultNumeric[$i]->rpn_field . ") AS " . $resultNumeric[$i]->rpn_field . "_low");
				array_push($aliasnumericfield, $resultNumeric[$i]->rpn_field."_low");
			}
			if ($data_sum == 1)
			{
				array_push($numericfield,"MAX(" . $resultNumeric[$i]->rpn_field . ") AS " . $resultNumeric[$i]->rpn_field . "_max");
				array_push($aliasnumericfield, $resultNumeric[$i]->rpn_field."_max");
			}
		}
		
		$numericfieldstr=implode(",",$numericfield);
		$aliasnumericfieldstr=implode(",",$aliasnumericfield);
	
		
		
		
		if (count($arrTable) > 1)
		{
			$joinConditions="";
			
			
			
			if (count($arrTable) == 4)
			{
				$join1=$resultJoins[0]->rj_joinfirstfield;
				$join2=$resultJoins[1]->rj_joinfirstfield;
				$join3=$resultJoins[2]->rj_joinfirstfield;
				
				$joinWith1=$resultJoins[0]->rj_joinsecondfield;
				$joinWith2=$resultJoins[1]->rj_joinsecondfield;
				$joinWith3=$resultJoins[2]->rj_joinsecondfield;
				
				$joinConditions=$arrTable[0] . " LEFT JOIN " . $arrTable[1] . " ON " . $join1 . "=" . $joinWith1 . " LEFT JOIN " . $arrTable[2] . " ON " . $join2 . "=" . $joinWith2 . " LEFT JOIN " . $arrTable[3] . " ON " . $join3 . "=" . $joinWith3;
			}
			
			if (count($arrTable) == 3)
			{
				$join1=$resultJoins[0]->rj_joinfirstfield;
				$join2=$resultJoins[1]->rj_joinfirstfield;
			
				
				$joinWith1=$resultJoins[0]->rj_joinsecondfield;
				$joinWith2=$resultJoins[1]->rj_joinsecondfield;
				
				
				$joinConditions=$arrTable[0] . " LEFT JOIN " . $arrTable[1] . " ON " . $join1 . "=" . $joinWith1 . " LEFT JOIN " . $arrTable[2] . " ON " . $join2 . "=" . $joinWith2;
			}
			if (count($arrTable) == 2)
			{
				$join1=$resultJoins[0]->rj_joinfirstfield;
				
				$joinWith1=$resultJoins[0]->rj_joinsecondfield;
				
				$joinConditions=$arrTable[0] . " LEFT JOIN " . $arrTable[1] . " ON " . $join1 . "=" . $joinWith1;
			}
			
			if ($numericfieldstr == "")
			{
			
				$generatedQuery= "SELECT " . $selfield . "  From " . $joinConditions . "  " . $fixedConditions . " " . $groupCondition . " " . $orderCondition;
			}
			
			else
			{
				$generatedQuery= "SELECT " . $selfield .",".$numericfieldstr. "  From " . $joinConditions ." ".$fixedConditions. " ". $groupCondition . " " . $orderCondition;
			}
			
		} else
		{
			
		
			
			if ($numericfieldstr == "")
			{
				
				$generatedQuery= "SELECT " . $selfield . "  From " . $selTable . "  " . $fixedConditions . " " . $groupCondition . " " . $orderCondition;
			} 

			else
			{
				$generatedQuery= "SELECT " . $selfield .",".$numericfieldstr. "  From " . $selTable ." ".$fixedConditions. " ". $groupCondition . " " . $orderCondition;
			}
		}
		

	
		 $result=$this->db->query($generatedQuery);
		 $result=$result->result();
		
	 	 $fieldCount=explode(",",$selfield);
		 $numericCount=explode(",",$aliasnumericfieldstr);
		
		 $string="";
		if($aliasnumericfieldstr!="")
		{	
		  
		      for($a=0;$a<count($fieldCount);$a++)
		  	  {
		  		  if($a==0)
  				  {
  						
  				  	 $string.="$fieldCount[$a]";
  				  }
  				  
  				  else
				  {
		  			 $string.=",";
		  			 $string.="$fieldCount[$a]";
				  }
				  
		      }
		  
  			  for($a=0;$a<count($numericCount);$a++)
  			  {
  			
					$string.=",";
					$string.="$numericCount[$a]";
  
  			   }
            
		   $contents=$string;
		} 
		else 
		{
		
			for($a=0;$a<count($fieldCount);$a++)
			{
				if($a==0)
				{
			
					$string.="$fieldCount[$a]";
				}
			
				else
				{
					$string.=","."$fieldCount[$a]";
				}
			
			}
		
			$contents=$string;
		}	
		
		
		$contents.="\n\n";
		
		
		
		
	
	  	for($i=0;$i < count($result);$i ++)
	    {
			
	    	    $string="";
    	
		    	
			    		for($a=0;$a<count($fieldCount);$a++)
			    		{
			    			if($a==0)
			    			{
			    	
			    				$string.=$result[$i]->$fieldCount[$a];
			    			}
			    	
			    			else
			    			{
			    				$string.=",";
			    				$string.=$result[$i]->$fieldCount[$a];
			    			}
	            
			    	
			    	     }
			    	
			    	   if($aliasnumericfieldstr!="")
			    	   {	
			    		for($a=0;$a<count($numericCount);$a++)
			    		{
			    				
	 		    			$string.=",";
	 		    			$string.=$result[$i]->$numericCount[$a];
			    	
			    		}
			    	   }	
			    
			    		$contents.=$string;
		    	
		    	       $contents.="\n";
		    	
		}
		
		
	
		$contents=strip_tags($contents);
		
		
	//	header to make force download the file
		Header("Content-Disposition: attachment; filename=report.csv");
		print $contents;
		exit();

	   
	}
}

