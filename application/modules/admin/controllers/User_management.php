<?php

class User_management extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('user_management_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('user_agent');
		$this->load->library('email');
		$this->load->library('encryption');
	
	}

	public function Checklogin()
	{
		if ($this->session->userdata('admin_admin_email') == '')
		{
			redirect('admin/');
		}
	
	}
	
	// ---Function used to load listing of system user --//
	public function index()
	{
		$this->Checklogin();
		
		setAActivityLogs('Transaction_activity','Adduser_view');
		$data ['resultUser']=$this->user_management_model->getSystemuser();
		$data ['include']='user_management/manage_user';
		$data ['admin_section']='manage_user_management';
		$this->load->view('backend/container',$data);
	
	}

	//--Function Used to add user---//
	public function addUser()
	{
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
			$result=$this->user_management_model->addUser();
			
			if ($result > 0)
			{
				$this->session->set_flashdata('success','User has been added successfully.');
				redirect('admin/user_management');
			} else
			{
				$this->session->set_flashdata('error','Unable to save user details.');
				redirect($this->agent->referrer());
			}
		} else
		{
			$data ['resultUsertype']=$this->user_management_model->getUsertypelist();
			$data ['resultCountry']=$this->user_management_model->getCountrylist();
			$data ['resultBranch']=$this->user_management_model->getBranchdetails();
			$data ['include']='user_management/add_user';
			$data ['admin_section']='add_new_user';
			$this->load->view('backend/container',$data);
		}
	
	}

	 //---Function used to add user--//
	public function editUser($id='')
	{
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
			$result=$this->user_management_model->editUser();
			
			if ($result > 0)
			{
				$this->session->set_flashdata('success','User has been updated successfully.');
				redirect('admin/user_management');
			} else
			{
				$this->session->set_flashdata('error','Unable to update user details.');
				redirect($this->agent->referrer());
			}
		} else
		{
			$d=$this->user_management_model->getSpecificuser($id);
			if(count($d)>0)
			{	
				$data ['resultUser']=$d;
		        $data ['resultUsertype']=$this->user_management_model->getUsertypelist();
				$data ['resultCountry']=$this->user_management_model->getCountrylist();
				$data ['resultBranch']=$this->user_management_model->getBranchdetails();
				$data ['resultState']=$this->user_management_model->getStatelist($d[0]->sysu_countryId_fk);
				$data ['resultCity']=$this->user_management_model->getCitylist($d[0]->sysu_stateId_fk);
				$data ['include']='user_management/edit_user';
				$data ['admin_section']='edit_new_user';
				$this->load->view('backend/container',$data);
			}
			else 
			{
				$this->session->set_flashdata('success','Something Went Wrong.');
				redirect('admin/user_management');
			}	
		}
	
	}
	
	// --functin used to deactivate/activate User status--//
	public function changeuserStatus()
	{
		$this->Checklogin();
		$status=$this->input->post('id');
		$userid=$this->input->post('userId');
		$idlist=exploade(",",$userid);
		
		if ($status == 0 || $status == 1)
		{
			$a=$this->user_management_model->changeuserStatus($status,$userid);
			
			if ($status == 0)
			{
				setAActivityLogs('Transaction_activity','Adduser_status','User Deactivated list'.$idlist);
				$this->session->set_flashdata('success','User has been deactivated successfully');
			} else
			{
				setAActivityLogs('Transaction_activity','Adduser_status','User Activated list'.$idlist);
				$this->session->set_flashdata('success','User has been activated successfully');
			}
			echo true;
		} else
		{
			
			$this->session->set_flashdata('error','Something went wrong');
			echo true;
		}
	
	}
	
	// --Function Used To validate Email--//
	public function getValidateemail()
	{
		$this->Checklogin();
		$result=$this->user_management_model->getUserbyemail();
		echo $result;
	
	}
	
	// --function used to reset password--//
	public function resetUserpassword()
	{
		$this->Checklogin();
		
		$userid=$this->input->post('userId');
		
		if (! empty($userid))
		{
			$a=$this->user_management_model->resetUserpassword($userid);
			
			$this->session->set_flashdata('success','User Password Reset successfully');
			echo true;
		} else
		{
			
			$this->session->set_flashdata('error','Something went wrong');
			echo true;
		}
	
	}
	
	// --Function Used to get User Details---//
	public function getUserprofile()
	{
		
		$this->Checklogin();
		
		$id=$this->input->post('userId');
		
		$resultUser=$this->user_management_model->getSpecificuser($id);
		$resultUsertype=$this->user_management_model->getAllusertype();
		$resultLocations=$this->user_management_model->getLocations();
		$result=$this->user_management_model->getSystemuser();
		
		
		
		?>
				
     <?php
	
	}
	
	//---Function used to reset password---//
	
	public function resetUserspecificpassword()
	{
		
		$userid=$this->input->post('userId');
		$password=$this->input->post('password');
		
	
		if ($userid !="")
		{
			    $password=$this->encryption->encrypt($password);
				$data=array('sysmu_password'=>$password);
				$this->db->where('sysmu_id_pk',$userid);
				$this->db->update('tblmvbsysmainusers',$data);
			
				
		} else
		{
				
			
			echo false;
		}
		
	}
	
	
  //---function used to get state list----//	
	public function getState()
	{
	
		$this->Checklogin();
		$id=$this->input->post('val');
	
		if ($id > 0)
		{
			
			$resultState=$this->user_management_model->getStatelist($id);
			$msg="<option value=''>Select State</option>";
				
			for($i=0;$i<count($resultState);$i++)
			{
				$disable="";
				if($resultState[$i]->stat_status==0)
				{
					$disable="disabled";
				}
					
				$msg=$msg.'<option  value="'.$resultState[$i]->stat_id_pk.'"'  . $disable.'  >'.$resultState[$i]->stat_name.'</option>';
				
				
			}
			
			echo $msg;
		} else
		{
				
			echo false;
		}
	
	}
	
	
	//---function used to get City list----//
	public function getCity()
	{
	
		$this->Checklogin();
		$id=$this->input->post('val');
	
		if ($id > 0)
		{
				
			$resultCity=$this->user_management_model->getCitylist($id);
			$msg="<option value=''>Select City</option>";
	
			for($i=0;$i<count($resultCity);$i++)
			{
				$disable="";
				if($resultCity[$i]->cty_status==0)
				{
					$disable="disabled";
				}
					
				$msg=$msg.'<option  value="'.$resultCity[$i]->cty_id_pk.'"'  . $disable.'  >'.$resultCity[$i]->cty_name.'</option>';
	
				
			}
				
			echo $msg;
		} else
		{
	
			echo false;
		}
	
	}
	
 

	public function manage_user_type()
	{
		 
			$this->Checklogin();

		//---------------------------------- Start Save Transaction Logs ---------------------------------//

			setAActivityLogs('Transaction_activity','user_type_view');			

		//--------------------------------- End Save Transaction Logs ------------------------------------//

			$data ['result']=$this->user_management_model->getUserType();
			$data ['include']='user_management/manage_user_type_management';
			$data ['admin_section']='manage_user_type_management';
			$this->load->view('backend/container',$data);
	}
	

	public function addUserType()
	{
			$this->Checklogin();
			if (isset($_POST ['btnSubmit']))
			{
				$result=$this->user_management_model->addUserType();
				
				if ($result > 0)
				{
					$this->session->set_flashdata('success','User Type has been added successfully.');
					redirect('admin/user_management/manage_user_type');
				} 
				else
				{
					$this->session->set_flashdata('error','Unable to save user details.');
					redirect($this->agent->referrer());
				}
			} 
			else
			{
				$data ['module']=$this->user_management_model->getallmodule();
				$data ['resultUsertype']=$this->user_management_model->getAllUserTypeList();
				$data ['include']='user_management/add_user_type';
				$data ['admin_section']='add_user_type';
				$this->load->view('backend/container',$data);
			}
	}

	public function editUserType($id="")
	{
			$this->Checklogin();

			if (isset($_POST ['btnSubmit']))
			{

				$result=$this->user_management_model->editUserType();
				
				if ($result > 0)
				{ 
					$this->session->set_flashdata('success','User Type has been added successfully.');
					redirect('admin/user_management/manage_user_type');
				} 
				else
				{ 
					$this->session->set_flashdata('error','Unable to save user details.');
					redirect($this->agent->referrer());
				}
			} 
			else
			{

				$data ['info']=$this->user_management_model->getIdWiseUserType($id);
				$data ['user_type_privileges']=$this->user_management_model->getIdWiseUserTypePrivileges($id);					
				$data ['module']=$this->user_management_model->getallmodule();
				$data ['resultUsertype']=$this->user_management_model->getAllUserTypeList();
				$data ['include']='user_management/edit_user_type';
				$data ['admin_section']='edit_user_type';
				$this->load->view('backend/container',$data);
			}
	}


	public function getUserTypePrivileges()
	{
			$user_type_id=$_POST['user_type_id'];

			$module=$this->user_management_model->getallmodule();
			$info=$this->user_management_model->getIdWiseUserType($user_type_id);
			$user_type_privileges=$this->user_management_model->getIdWiseUserTypePrivileges($user_type_id);

			// $temp_array=array();

			// for($b=0;$b<count($user_type_privileges);$b++)
			// {
			// 		array_push($temp_array,);
			// }

            

			//$user_type_privileges=$this->user_management_model->getUserTypePrivileges($user_type_id);
?>
			
			 <form id="frmUserType" name="frmUserType" method="POST" action="<?php echo base_url();?>admin/user_management/editUserType/<?php echo $user_type_id;?>">

                            <div class="col-md-8">

                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label>User Type Name </label>

                                            <input type="text" class="form-control" placeholder="Enter User Type Name" id="txtUserTypeName" name="txtUserTypeName" value="<?php echo $info['utyp_userType'];?>" required>

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-12">

                                        <h3 class="text-left" style="font-size: 18px; margin-top: 0px;">Assign Privileges:</h3>

                                    </div>

                                </div>

                                <?php
                                
                                for($i=0;$i<count($module);$i++)
                                {             
                                		 $count_sub=1;

                                ?>
                                        <div class="col-lg-6">
                                                <div class="checkbox" class="form-control">
                                                    <label for="cname" class="control-label col-lg-3"></label>
                                                    <input type="checkbox" class="main_module" onclick="checked_all(this,'<?php echo $module[$i]->mod_module_name?>_module',<?php echo $module[$i]->mod_id_pk;?>);" id="<?php echo $module[$i]->mod_module_name?>" name="modules[]" value="<?php echo $module[$i]->mod_id_pk?>" <?php if(in_array($module[$i]->mod_id_pk,$user_type_privileges)){?> checked <?php } ?>>&nbsp; <font style="font-weight:bold;"><?php echo $module[$i]->mod_module_name?></font>
                                                </div>
                                                <div class="submodule_checkbox" class="form-control"  id="<?php echo $module[$i]->mod_module_name?>_module" style="margin-left:160px;">
                                                    <?php
                                                    $sub_modulename=$this->user_management_model->getallsubmodule($module[$i]->mod_id_pk);
                                                     for($j=0;$j<count($sub_modulename);$j++)
                                                     {                  
                                                    ?>
                                                            <input type="checkbox" id="all_modules_<?php echo $module[$i]->mod_id_pk;?>_<?php echo $count_sub;?>" class="module_<?php echo $sub_modulename[$j]->mod_menu_id?>" value="<?php echo $sub_modulename[$j]->mod_id_pk;?>" name="modules[]"  onclick="checked_all_sub(this,'<?php echo $module[$i]->mod_module_name?>_module',<?php echo $j+1;?>),checkSubmoduleCheck(<?php echo $sub_modulename[$j]->mod_menu_id?>,'<?php echo $module[$i]->mod_module_name?>');" <?php if(in_array($sub_modulename[$j]->mod_id_pk,$user_type_privileges)){?> checked <?php } ?>>&nbsp; <?php echo $sub_modulename[$j]->mod_module_name;?><br>

                                                            <div class="sub_submodule_checkbox" class="form-control"  id="<?php echo $sub_modulename[$j]->mod_module_name?>_module" style="margin-left:90px;">

                                                            <?php
                                                                $sub_sub_modulename=$this->user_management_model->getallsubsubmodule($module[$i]->mod_id_pk,$sub_modulename[$j]->mod_id_pk);

                                                                for($k=0;$k<count($sub_sub_modulename);$k++)
                                                                {
                                                            ?>
                                                                        <input type="checkbox" id="all_sub_modules_<?php echo $module[$i]->mod_id_pk;?>_<?php echo $count_sub;?>" class="sub_module_<?php echo $module[$i]->mod_id_pk;?>_<?php echo $j+1?>" value="<?php echo $sub_sub_modulename[$k]->mod_id_pk;?>" name="modules[]"
                                                                        	onclick="checkSubSubmoduleCheck(<?php echo $j+1?>,<?php echo $count_sub;?>,'<?php echo $module[$i]->mod_module_name?>',<?php echo $sub_modulename[$j]->mod_menu_id?>);"
                                                                         <?php if(in_array($sub_sub_modulename[$k]->mod_id_pk,$user_type_privileges)){?> checked <?php } ?>>&nbsp; <?php echo $sub_sub_modulename[$k]->mod_module_name;?>
                                                                        <br>
                                                            <?php
                                                                }
                                                             ?>
                                                            </div>      
                                                     <?php
                                                        $count_sub++;   
                                                     }   
                                                    ?>
                                                </div>  
                                        </div>
                                <?php
                                    }
                                ?>    

                                <input type="hidden" id="hidden_sub_module" name="hidden_sub_module" value="<?php echo $count_sub?>">

                                <!-- <table class="table table-bordered">

                                    <tbody>

                                        <tr>

                                            <td width="220">

                                                <label class="">

                                                    <input type="checkbox"> System User Management <span></span> </label>

                                            </td>

                                            <td width="670">
                                                <div class="inp3">

                                                    <label class="">

                                                        <input type="checkbox" value=""> View

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Add

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Edit

                                                    </label>

                                                </div>
                                            </td>

                                        </tr>

                                        <tr>

                                            <td>

                                                <label class="">

                                                    <input type="checkbox"> User Management <span></span> </label>

                                            </td>

                                            <td>
                                                <div class="inp3">

                                                    <label class="">

                                                        <input type="checkbox" value=""> View

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Add

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Edit

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Active

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Deactive

                                                    </label>

                                                </div>
                                            </td>

                                        </tr>

                                        <tr>

                                            <td>

                                                <label class="">

                                                    <input type="checkbox"> User Type Management <span></span> </label>

                                            </td>

                                            <td>
                                                <div class="inp3">

                                                    <label class="">

                                                        <input type="checkbox" value=""> View

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Add

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Edit

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Active

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Deactive

                                                    </label>

                                                </div>
                                            </td>

                                        </tr>

                                        <tr>

                                            <td>

                                                <label class="">

                                                    <input type="checkbox"> Festival Management <span></span> </label>

                                            </td>

                                            <td>
                                                <div class="inp3">

                                                    <label class="">

                                                        <input type="checkbox" value=""> View

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Add

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Edit

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Active

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Deactive
                                                        <label class="">

                                                            <input type="checkbox" value=""> Import

                                                        </label>

                                                </div>
                                            </td>

                                        </tr>

                                        <tr>

                                            <td>

                                                <label class="">

                                                    <input type="checkbox"> Discount Management <span></span> </label>

                                            </td>

                                            <td>
                                                <div class="inp3">

                                                    <label class="">

                                                        <input type="checkbox" value=""> View

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Add

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Edit

                                                    </label>

                                                </div>
                                            </td>

                                        </tr>

                                        <tr>

                                            <td>

                                                <label class="">

                                                    <input type="checkbox"> Generate Coupon <span></span> </label>

                                            </td>

                                            <td>
                                                <div class="inp3">

                                                    <label class="">

                                                        <input type="checkbox" value=""> View

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Add Coupon</label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Download unused Coupon</label>

                                                </div>
                                            </td>

                                        </tr>

                                        <tr>

                                            <td>
                                                <label class="">

                                                    <input type="checkbox"> Package Management <span></span> </label>
                                            </td>

                                            <td>
                                                <div class="inp3">

                                                    <label class="">

                                                        <input type="checkbox" value=""> View

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Add

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Edit

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Active

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> De-active

                                                    </label>

                                                </div>
                                            </td>

                                        </tr>

                                        <tr>

                                            <td>
                                                <label class="">

                                                    <input type="checkbox"> Sender Id Management <span></span> </label>
                                            </td>

                                            <td>
                                                <div class="inp3">

                                                    <label class="">

                                                        <input type="checkbox" value=""> View

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Add

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Edit

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Active

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> De-active

                                                    </label>

                                                </div>
                                            </td>

                                        </tr>

                                        <tr>

                                            <td>
                                                <label class="">

                                                    <input type="checkbox"> FAQ's Management <span></span> </label>
                                            </td>

                                            <td>
                                                <div class="inp3">

                                                    <label class="">

                                                        <input type="checkbox" value=""> View

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Add

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Edit

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Active

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Push/Revoke

                                                    </label>

                                                </div>
                                            </td>

                                        </tr>

                                        <tr>

                                            <td>
                                                <label class="">

                                                    <input type="checkbox"> Email Management <span></span> </label>
                                            </td>

                                            <td>
                                                <div class="inp3">

                                                    <label class="">

                                                        <input type="checkbox" value=""> View

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Add

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Edit

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Active

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> De-active

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Push/Revoke

                                                    </label>

                                                </div>
                                            </td>

                                        </tr>

                                        <tr>

                                            <td>
                                                <label class="">

                                                    <input type="checkbox"> Communication Management <span></span> </label>
                                            </td>

                                            <td>
                                                <div class="inp3">

                                                    <label class="">

                                                        <input type="checkbox" value=""> View

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Send SMS</label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> View SMS</label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Send Email</label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> View Email</label>

                                                </div>
                                            </td>

                                        </tr>

                                        <tr>

                                            <td>
                                                <label class="">

                                                    <input type="checkbox"> Backup Management <span></span> </label>
                                            </td>

                                            <td>
                                                <div class="inp3">

                                                    <label class="">

                                                        <input type="checkbox" value=""> Download Backup</label>

                                                </div>
                                            </td>

                                        </tr>

                                        <tr>

                                            <td>
                                                <label class="">

                                                    <input type="checkbox"> Order Management <span></span> </label>
                                            </td>

                                            <td>
                                                <div class="inp3">

                                                    <label class="">

                                                        <input type="checkbox" value=""> View

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Add

                                                    </label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> View Emails/SMS</label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Refill Manually</label>

                                                    <label class="">

                                                        <input type="checkbox" value=""> Order Details</label>

                                                </div>
                                            </td>

                                        </tr>

                                    </tbody>

                                </table> -->

                                <div class="col-md-12">

                                    <div class="modal-footer">

                                        <button type="submit" class="btn btn-primary" name="btnSubmit">Save</button>

                                        <a href="#" class="btn btn-danger">Cancel</a> </div>

                                </div>

                            </div>


             <input type="hidden" id="hidden_user_type_id" name="hidden_user_type_id" value="<?php echo $info['utyp_id_pk'];?>"/>    

            </form> 

     <?php					
	}



	public function changeUserTypeIdStatus()
	{
				$this->Checklogin();
				$status=$this->input->post('id');
				$usertypeid=$this->input->post('user_type_id');
					
				$idlist=implode(",",$usertypeid);
				if ($status == 0 || $status == 1)
				{
					$a=$this->user_management_model->changeUserTypeIdStatus($status,$usertypeid);
					
					
					if ($status == 0)
					{
						setAActivityLogs('Transaction_activity','Usertype_status','User Deactivated ' . $idlist );
						$this->session->set_flashdata('success','User Type Id has been deactivated successfully');
					} 
					else
					{
						setAActivityLogs('Transaction_activity','Usertype_status','User Activated ' . $idlist );
						$this->session->set_flashdata('success','User Type Id has been activated successfully');
					}
					echo true;
				}
				else
				{
					
					$this->session->set_flashdata('error','Something went wrong');
					echo true;
				}
	}


	public function deleteUserType()
	{
			$user_type_deleted='';

			$user_type_id=$_POST['user_type_id'];	

			$explode_parts=implode(",",$user_type_id);

			$this->db->query("update tblmvbusertypes set utyp_show_status='0' where find_in_set(utyp_id_pk,'".$explode_parts."')");


			$user_type_deleted=' Deleted User Type Ids - '.$explode_parts;

			//---------------------------- Start Save Transaction Logs ---------------------------------//

			setAActivityLogs('Transaction_activity','user_type_delete',$user_type_deleted);			

			//---------------------------- End Save Transaction Logs ------------------------------------//
	}
	
	public function selectLanguage()
	{
		$adminId=$this->session->userdata('admin_admin_id');
		$language=$this->input->post('selLanguage');
		
		if($language!="")
		{
			$this->db->query("update tblmvbsystemusers set sysu_languageId_fk='".$language."' where sysu_id_pk='".$adminId."'");
			setAActivityLogs('Transaction_activity','userLanguage_change',"Language change User:-".$adminId." language".$language);
			$this->session->set_flashdata('success','Default Language Set');
		}
		
        redirect($_SERVER['HTTP_REFERER']) ;
		
		
		
	}

}
