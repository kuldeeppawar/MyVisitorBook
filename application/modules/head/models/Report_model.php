<?php

class Report_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}
	
	public function getAllreport()
	{
		
		$result=$this->db->query("SELECT `report_id_pk`, `report_name`, `report_description`, `report_table`, `report_field`, `report_fixclient`, `repot_fixbranch`, 
			                     `report_pushrevoke`, `report_createdBy`, `report_createdDate`, `report_modifiedby`, `report_modifiedDate`, `report_status`
			                      FROM `tblmvbreport`");
		return $result->result();
		
	}
	
	
	public function getReport($id)
	{
		$result=$this->db->query("SELECT `report_id_pk`, `report_name`, `report_description`, `report_table`, `report_field`, `report_fixclient`, `repot_fixbranch`,
			                     `report_pushrevoke`, `report_createdBy`, `report_createdDate`, `report_modifiedby`, `report_modifiedDate`, `report_status`
			                      FROM `tblmvbreport` WHERE report_id_pk='".$id."' ");
		return $result->result();
	}
	
	public function getAlltable()
	{
		$result=$this->db->query("SHOW TABLES");
		return $result->result();
		
		
	}
	
	
	public function getreportGroup($reportId)
	{
		$result=$this->db->query("SELECT `ro_id_pk`, `ro_id_fk`, `ro_id_field`, `ro_id_group`, `ro_id_ascdesc` FROM `tblmvbreportorder` WHERE ro_id_fk='".$reportId."' ");
		return $result->result();
		
	}
	
	public function getreportJoinfirst($reportId,$field,$k)
	{
		$result=$this->db->query("SELECT `rj_id_pk`, `rj_reportId_fk`, `rj_joinfirstfield`, `rj_joinsecondfield` FROM `tblmvbreportjoins` 
			                      WHERE rj_reportId_fk='".$reportId."' AND  rj_joinfirstfield='".$field."' AND rj_joinposition='".$k."'");
		return $result->result();
	
	}
	
	public function getreportJoinsecond($reportId,$field,$k)
	{
		$result=$this->db->query("SELECT `rj_id_pk`, `rj_reportId_fk`, `rj_joinfirstfield`, `rj_joinsecondfield` FROM `tblmvbreportjoins` 
			                       WHERE rj_reportId_fk='".$reportId."' AND  rj_joinsecondfield='".$field."' AND rj_joinposition='".$k."'");
		return $result->result();
	
	}
	
	
	public function getNumericdetails($reportId,$field)
	{
		
		$result=$this->db->query("SELECT `rpn_id_pk`, `rpn_reportid_fk`, `rpn_field`, `rpn_sum`, `rpn_avg`, `rpn_low`, `rpn_high` FROM `tblmvbreportnumeric`
			                      WHERE rpn_reportid_fk='".$reportId."' AND rpn_field='".$field."'");
		return $result->result();
		
	}
	
	
	public function getresultCondition($reportId)
	{
		$result=$this->db->query("SELECT `rpc_id_pk`, `rpc_reportid_fk`, `rpc_field`, `rpc_condition` FROM `tblmvbreportcondition`
			                       WHERE rpc_reportid_fk='".$reportId."'");
		return $result->result();
	}
	
	
	public function saveReport()
	{
		$reportName=$this->input->post('txtName');
	    $description=$this->input->post('txtDescription');
	    $selTable=$this->input->post('seltable');
	    $selfield=$this->input->post('selfield');
	    $selgroupField=$this->input->post('selgroupField');
	    $numericfields=$this->input->post('txtnumericFields');
	    $clientfield=$this->input->post('selectFixcilent');
	    $branchfield=$this->input->post('selectFixbranch');
	    $optConditionsfield=$this->input->post('optConditionfields');
	    $optConditions=$this->input->post('optCondition');
	    
	    $date=date("Y-m-d H:i:s");
	    $adminId=$this->session->userdata('admin_id');
	    
	    $selTable1=implode(",",$selTable);
	    $selfield=implode(",",$selfield);
	    
	    
	    $data=array('report_name'=>$reportName,
		    		'report_description'=>$description,
		    		'report_table'=>$selTable1,
		    		'report_field'=>$selfield,
		    		'report_fixclient'=>$clientfield,
		    		'repot_fixbranch'=>$branchfield,
		    		'report_createdBy'=>$adminId,
	    		    'report_createdDate'=>$date,
		    		'report_modifiedby'=>$adminId,
		    		'report_modifiedDate'=>$date,
		    		'report_status'=>1);
	    $this->db->insert('tblmvbreport',$data);
	    $insert_id=$this->db->insert_id();
	    
  	    //---group and order by fields---//
   	       for($i=0;$i<count($selgroupField);$i++)
 		   {
    		    	$j=$i+1;
    		    	$dataGroup=$this->input->post('rdbGroup'.$j);
    		    	$dataOrder=$this->input->post('rdbOrder'.$j);
    	 		    	
    			    	$data=array('ro_id_fk'=>$insert_id,
    			    			    'ro_id_field'=>$selgroupField[$i],
    			    			    'ro_id_group'=>$dataGroup,
    			    			    'ro_id_ascdesc'=>$dataOrder);
    			    	$this->db->insert('tblmvbreportorder',$data);
    			    	
    	  }
    	  
    	 for($i=0;$i<count($numericfields);$i++)
    	  {
    	  		    	$data_sum=$this->input->post($numericfields[$i]."_sum");
    	  		    	$data_avg=$this->input->post($numericfields[$i]."_avg");
    	  		    	$data_low=$this->input->post($numericfields[$i]."_low");
    	  		    	$data_high=$this->input->post($numericfields[$i]."_high");
    	   
    	  		    	$data=array('rpn_reportid_fk'=>$insert_id,
    	  			    			'rpn_field'=>$numericfields[$i],
    	  			    			'rpn_sum'=>$data_sum,
    	  			    			'rpn_avg'=>$data_avg,
    	  			    			'rpn_low'=>$data_low,
    	  			    			'rpn_high'=>$data_high);
    	  			   $this->db->insert('tblmvbreportnumeric',$data);
    	 }
    	  
       
    	if(count($selTable)>1)
    	{	
	        for($i=1;$i<count($selTable);$i++)
	        {
	        	$join=$this->input->post("selJoin".$i);
	        	$joinWith=$this->input->post("selJoinwith".$i);
	        	
	        	$data=array('rj_reportId_fk'=>$insert_id,
		        			'rj_joinfirstfield'=>$join,
	        			    'rj_joinposition'=>$i,
		        			'rj_joinsecondfield'=>$joinWith);
	           $this->db->insert('tblmvbreportjoins',$data);
	        }
    	}
	    			    
    	 
        for($i=0;$i<count($optConditionsfield);$i++)
         {
         	
         	$data=array('rpc_reportid_fk'=>$insert_id,
         			    'rpc_field'=>$optConditionsfield[$i],
         			    'rpc_condition'=>$optConditions[$i]);
         	$this->db->insert('tblmvbreportcondition',$data);
        
        }
   
        setSAActivityLogs('Transaction_activity','SAReport_Add',"Added Report".$insert_id);
     
     return $insert_id;
	}
	


	
	public function pushrevokeReport($status,$report)
	{
	
		$admin_id=$this->session->userdata('admin_id');
		$date=date('Y-m-d h:i:s');
		for($i=0;$i < count($report);$i ++)
		{
			$data=array('report_pushrevoke'=>$status,'report_modifiedDate'=>$date,'report_modifiedby'=>$admin_id);
			$this->db->where('report_id_pk',$report [$i]);
			$this->db->update('tblmvbreport',$data);
		}
	
		return true;
	
	}


	
	public function modifiedReport()
	{
		$reportName=$this->input->post('txtName');
		$reportId=$this->input->post('report_id');
		$description=$this->input->post('txtDescription');
		$selTable=$this->input->post('seltable');
		$selfield=$this->input->post('selfield');
		$selgroupField=$this->input->post('selgroupField');
		$numericfields=$this->input->post('txtnumericFields');
		$clientfield=$this->input->post('selectFixcilent');
		$branchfield=$this->input->post('selectFixbranch');
		$optConditionsfield=$this->input->post('optConditionfields');
		$optConditions=$this->input->post('optCondition');
		 
		$date=date("Y-m-d H:i:s");
		$adminId=$this->session->userdata('admin_id');
		 
		$selTable1=implode(",",$selTable);
		$selfield=implode(",",$selfield);
		 
		 
		$data=array('report_name'=>$reportName,
				    'report_description'=>$description,
					'report_table'=>$selTable1,
					'report_field'=>$selfield,
					'report_fixclient'=>$clientfield,
					'repot_fixbranch'=>$branchfield,
					'report_modifiedby'=>$adminId,
					'report_modifiedDate'=>$date);
		$this->db->where('report_id_pk',$reportId);
		$this->db->update('tblmvbreport',$data);
		$insert_id=$reportId;
		
		$this->db->query("Delete From tblmvbreportorder where ro_id_fk='".$reportId."'");
		$this->db->query("Delete From tblmvbreportnumeric where rpn_reportid_fk='".$reportId."'");
		$this->db->query("Delete From tblmvbreportjoins where rj_reportId_fk='".$reportId."'");
		$this->db->query("Delete From tblmvbreportcondition where rpc_reportid_fk='".$reportId."'");
		 
		//---group and order by fields---//
		for($i=0;$i<count($selgroupField);$i++)
		{
			$j=$i+1;
			$dataGroup=$this->input->post('rdbGroup'.$j);
			$dataOrder=$this->input->post('rdbOrder'.$j);
				
			$data=array('ro_id_fk'=>$insert_id,
					'ro_id_field'=>$selgroupField[$i],
					'ro_id_group'=>$dataGroup,
					'ro_id_ascdesc'=>$dataOrder);
			$this->db->insert('tblmvbreportorder',$data);
	
		}
		 
		for($i=0;$i<count($numericfields);$i++)
		{
			$data_sum=$this->input->post($numericfields[$i]."_sum");
			$data_avg=$this->input->post($numericfields[$i]."_avg");
			$data_low=$this->input->post($numericfields[$i]."_low");
			$data_high=$this->input->post($numericfields[$i]."_high");
	
			$data=array('rpn_reportid_fk'=>$insert_id,
					'rpn_field'=>$numericfields[$i],
					'rpn_sum'=>$data_sum,
					'rpn_avg'=>$data_avg,
					'rpn_low'=>$data_low,
					'rpn_high'=>$data_high);
			$this->db->insert('tblmvbreportnumeric',$data);
		}
		 
		 
		if(count($selTable)>1)
		{
			for($i=1;$i<count($selTable);$i++)
			{
				$join=$this->input->post("selJoin".$i);
				$joinWith=$this->input->post("selJoinwith".$i);
	
				$data=array('rj_reportId_fk'=>$insert_id,
						'rj_joinfirstfield'=>$join,
						'rj_joinposition'=>$i,
						'rj_joinsecondfield'=>$joinWith);
				$this->db->insert('tblmvbreportjoins',$data);
			}
		}
	
	
		for($i=0;$i<count($optConditionsfield);$i++)
		{
	
			$data=array('rpc_reportid_fk'=>$insert_id,
					'rpc_field'=>$optConditionsfield[$i],
					'rpc_condition'=>$optConditions[$i]);
			$this->db->insert('tblmvbreportcondition',$data);
	
		}
		setSAActivityLogs('Transaction_activity','SAReport_Add',"Updated Report".$insert_id);
		 
		return $insert_id;
	}
	
	
	
	
	
	
	
	
	
	


// 	    //---group and order by fields---//
// 	    for($i=0;$i<count($selgroupField);$i++)
// 	    {
// 	    	$j=$i+1;
// 	    	$dataGroup=$this->input->post('rdbGroup'.$j);
// 	    	if($dataGroup=="1")
// 	    	{
// 	    		$groupCondition="GROUP BY ".$selgroupField[$i];
// 	    	}
	    
// 	    	$dataOrder=$this->input->post('rdbOrder'.$j);
	    
// 	    	if($dataOrder=="ASC" || $dataOrder=="DESC")
// 	    	{
// 	    		$orderCondition="ORDER BY ".$selgroupField[$i]." ". $dataOrder;
// 	    	}
// 	    }
	     
// 	    //---numeric fields calculations--//
// 	    for($i=0;$i<count($numericfields);$i++)
// 	    {
// 	    	$data_sum=$this->input->post($numericfields[$i]."_sum");
// 	    	$data_avg=$this->input->post($numericfields[$i]."_avg");
// 	    	$data_low=$this->input->post($numericfields[$i]."_low");
// 	    	$data_high=$this->input->post($numericfields[$i]."_high");
	    	 
// 	    	if($data_sum==1)
// 	    	{
// 	    		array_push($numericfield,"SUM(".$numericfields[$i].") AS ".$numericfields[$i]."_sum");
// 	    	}
	    	 
// 	    	if($data_avg==2)
// 	    	{
// 	    		array_push($numericfield,"AVG(".$numericfields[$i].") AS ".$numericfields[$i]."_avg");
// 	    	}
// 	    	if($data_sum==3)
// 	    	{
// 	    		array_push($numericfield,"MIN(".$numericfields[$i].") AS ".$numericfields[$i]."_low");
// 	    	}
// 	    	if($data_sum==1)
// 	    	{
// 	    		array_push($numericfield,"MAX(".$numericfields[$i].") AS ".$numericfields[$i]."_max");
// 	    	}
// 	    }
	     
// 	    $numericfield=implode(",",$numericfield);
// 	    $selfield =implode(",",$selfield);
	     
// 	    if(count($selTable)>1)
// 	    {
// 	    	$joinConditions="";
	    
// 	    	if(count($selTable)==4)
// 	    	{
// 	    		$join1=$this->input->post("selJoin1");
// 	    		$join2=$this->input->post("selJoin2");
// 	    		$join3=$this->input->post("selJoin3");
	    		 
// 	    		$joinWith1=$this->input->post("selJoinwith1");
// 	    		$joinWith2=$this->input->post("selJoinwith2");
// 	    		$joinWith3=$this->input->post("selJoinwith3");
	    
// 	    		$joinConditions=$selTable[0]." LEFT JOIN ".$selTable[1]." ON ".$join1."=".$joinWith1.
// 	    		" LEFT JOIN ".$selTable[2]." ON ".$join2."=".$joinWith2.
// 	    		" LEFT JOIN ".$selTable[3]." ON ".$join3."=".$joinWith3;
	    		 
	    		 
// 	    	}
	    
// 	    	if(count($selTable)==3)
// 	    	{
// 	    		$join1=$this->input->post("selJoin1");
// 	    		$join2=$this->input->post("selJoin2");
	    
// 	    		$joinWith1=$this->input->post("selJoinwith1");
// 	    		$joinWith2=$this->input->post("selJoinwith2");
	    
// 	    		$joinConditions=$selTable[0]." LEFT JOIN ".$selTable[1]." ON ".$join1."=".$joinWith1.
// 	    		" LEFT JOIN ".$selTable[2]." ON ".$join2."=".$joinWith2;
	    
	    
// 	    	}
// 	    	if(count($selTable)==2)
// 	    	{
// 	    		$join1=$this->input->post("selJoin1");
	    		 
// 	    		$joinWith1=$this->input->post("selJoinwith1");
	    		 
// 	    		$joinConditions=$selTable[0]." LEFT JOIN ".$selTable[1]." ON ".$join1."=".$joinWith1;
	    
	    
// 	    	}
	    
// 	    }
// 	    else
// 	    {
	    
// 	    	$selTable=implode(",",$selTable);
	    
// 	    	if($numericfield=="")
// 	    	{
	    		 
	    
	    
// 	    		echo "SELECT ".$selfield."  From ".$selTable."  ".$fixedConditions." ".$groupCondition." ".$orderCondition;
	    		 
	    		 
// 	    	}
	    	 
// 	    	else
// 	    	{
// 	    		echo "SELECT ".$selfield."  From ".$selTable."  ".$groupCondition." ".$orderCondition;
// 	    	}
// 	    }
	  
	    
// 	    $groupCondition=$orderCondition=$fixedConditions="";
// 	    $numericfield=array();
	    
// 	    if($clientfield!="" && $branchfield!='')
// 	    {
// 	    	$fixedConditions="WHERE ".$clientfield."=##### AND ".$branchfield."=$$$$$";
// 	    }
// 	    else if($clientfield!="" && $branchfield=='')
// 	    {
// 	    	$fixedConditions="WHERE ".$clientfield."=#####";
// 	    }	
// 	    else
// 	    {
// 	    	$fixedConditions="WHERE ".$branchfield."=$$$$$";
// 	    }	
	    
	    
// 	    //---optional conditions---//
	    
// 	    for($i=0;$i<count($optConditionsfield);$i++)
// 	    {
	    	
// 	    	if($optConditions[$i]=="equals")
// 	    	{ 	
// 	      	  $fixedConditions.=" AND ".$optConditionsfield[$i]." = ";
// 	      	}
// 	      	if($optConditions[$i]=="not equal to")
// 	      	{
// 	      		$fixedConditions.=" AND ".$optConditionsfield[$i]." != ";
// 	      	}
// 	      	if($optConditions[$i]=="starts with")
// 	      	{
// 	      		$fixedConditions.=" AND ".$optConditionsfield[$i]." LIKE @@@@@ %";
// 	      	}
// 	      	if($optConditions[$i]=="ends with")
// 	      	{
// 	      		$fixedConditions.=" AND ".$optConditionsfield[$i]." LIKE % @@@@@";
// 	      	}
// 	      	if($optConditions[$i]=="contains")
// 	      	{
// 	      		$fixedConditions.=" AND ".$optConditionsfield[$i]." IN()";
// 	      	}
	      	
// 	      	if($optConditions[$i]=="contains")
// 	      	{
// 	      		$fixedConditions.=" AND ".$optConditionsfield[$i]." IN()";
// 	      	}
// 	      	if($optConditions[$i]=="does not contain")
// 	      	{
// 	      		$fixedConditions.=" AND ".$optConditionsfield[$i]." NOT IN()";
// 	      	}
// 	      	if($optConditions[$i]=="is empty")
// 	      	{
// 	      		$fixedConditions.=" AND ".$optConditionsfield[$i]." =''";
// 	      	}
// 	      	if($optConditions[$i]=="is not empty")
// 	      	{
// 	      		$fixedConditions.=" AND ".$optConditionsfield[$i]." !=''";
// 	      	}
	      	
// 	    }	
	    
	    


		
		
	
	
}
