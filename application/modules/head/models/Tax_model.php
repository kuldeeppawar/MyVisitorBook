<?php

class Tax_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	
	}
	
	// --Function used get all Tax list---//
	public function getAlltax()
	{
		$result=$this->db->query("SELECT tax_id_pk,tax_name,tax_validFrom,tax_validTo,tax_percentValue, (CASE WHEN tax_status = '1' THEN 'Active' ELSE 'Deactive' END) AS taxstatus FROM tblmvbtax order by tax_id_pk DESC");
		
		return $result->result();
	
	}
	
	// --- Function used to add Tax---//
	public function addTax()
	{
		$taxname=$this->input->post('txtTaxname');
		$taxvalue=$this->input->post('txtTaxvalue');
		$taxvalidfrom=date("Y-m-d",strtotime($this->input->post('txtValidfrom')));
		$taxvalidto=date("Y-m-d",strtotime($this->input->post('txtValidto')));
		$admin_id=$this->session->userdata('admin_id');
		$date=date('Y-m-d h:i:s');
		
		$data=array('tax_name'=>$taxname,'tax_createdDate'=>$date,'tax_createdBy'=>$admin_id,'tax_modifiedDate'=>$date,'tax_modifiedBy'=>$admin_id,'tax_validFrom'=>$taxvalidfrom,'tax_validTo'=>$taxvalidto,'tax_percentValue'=>$taxvalue,'tax_status'=>'1');
		
		$this->db->insert('tblmvbtax',$data);
		$insert_id=$this->db->insert_id();
		
		
		$idlist=implode(",",$data);
		setSAActivityLogs('Transaction_activity','SATax_add',$idlist);
		return $insert_id;
	
	}
	
	// --- Function used to edit Tax---//
	public function editTax()
	{
		$taxid=$this->input->post('txteditTaxid');
		$taxname=$this->input->post('txteditTaxname');
		$taxvalue=$this->input->post('txteditTaxvalue');
		$taxvalidfrom=date("Y-m-d",strtotime($this->input->post('txteditValidfrom')));
		$taxvalidto=date("Y-m-d",strtotime($this->input->post('txteditValidto')));
		$admin_id=$this->session->userdata('admin_id');
		$date=date('Y-m-d h:i:s');
		
		$data=array('tax_name'=>$taxname,'tax_modifiedDate'=>$date,'tax_modifiedBy'=>$admin_id,'tax_validFrom'=>$taxvalidfrom,'tax_validTo'=>$taxvalidto,'tax_percentValue'=>$taxvalue,'tax_status'=>'1');
		
		$this->db->where('tax_id_pk',$taxid);
		$this->db->update('tblmvbtax',$data);
		
		$idlist=implode(",",$data);
		setSAActivityLogs('Transaction_activity','SATax_edit',$idlist);
		
		return true;
	
	}
	
	// --- Function used to change status of Tax---//
	public function changetaxStatus($status,$tax)
	{
		for($i=0;$i < count($tax);$i ++)
		{
			$data=array('tax_status'=>$status);
			$this->db->where('tax_id_pk',$tax [$i]);
			
			$this->db->update('tblmvbtax',$data);
		}
		
		return true;
	
	}

}
