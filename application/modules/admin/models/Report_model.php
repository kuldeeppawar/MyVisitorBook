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
			                      FROM `tblmvbreport` WHERE report_pushrevoke='1'");
		return $result->result();
		
	}
	
	
	public function getReport($id)
	{
		$result=$this->db->query("SELECT `report_id_pk`, `report_name`, `report_description`, `report_table`, `report_field`, `report_fixclient`, `repot_fixbranch`,
			                     `report_pushrevoke`, `report_createdBy`, `report_createdDate`, `report_modifiedby`, `report_modifiedDate`, `report_status`
			                      FROM `tblmvbreport` WHERE report_id_pk='".$id."' ");
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
	
	
	public function getreportJoins($reportId)
	{
		$result=$this->db->query("SELECT `rj_id_pk`, `rj_reportId_fk`, `rj_joinfirstfield`, `rj_joinsecondfield` FROM `tblmvbreportjoins`
			                      WHERE rj_reportId_fk='".$reportId."'");
		return $result->result();
	
	}
	
	
	public function getreportJoinsecond($reportId,$field,$k)
	{
		$result=$this->db->query("SELECT `rj_id_pk`, `rj_reportId_fk`, `rj_joinfirstfield`, `rj_joinsecondfield` FROM `tblmvbreportjoins` 
			                       WHERE rj_reportId_fk='".$reportId."' AND  rj_joinsecondfield='".$field."' AND rj_joinposition='".$k."'");
		return $result->result();
	
	}
	
	
	public function getNumericdetails($reportId)
	{
		
		$result=$this->db->query("SELECT `rpn_id_pk`, `rpn_reportid_fk`, `rpn_field`, `rpn_sum`, `rpn_avg`, `rpn_low`, `rpn_high` FROM `tblmvbreportnumeric`
			                      WHERE rpn_reportid_fk='".$reportId."' ");
		return $result->result();
		
	}
	
	
	public function getresultCondition($reportId)
	{
		$result=$this->db->query("SELECT `rpc_id_pk`, `rpc_reportid_fk`, `rpc_field`, `rpc_condition` FROM `tblmvbreportcondition`
			                       WHERE rpc_reportid_fk='".$reportId."'");
		return $result->result();
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
