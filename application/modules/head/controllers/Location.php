<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Location extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->model('location_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('user_agent');
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
		
		setSAActivityLogs('Transaction_activity','SALocationcountry_view');
		$data ['result']=$this->location_model->getAllCountry();
		$data ['include']='head/location/location';
		$data ['admin_section']='manage_location';
		$this->load->view('backend/container_sa',$data);
	   
	}
	
	// ---Function used to add new country-//
	public function addCountry()
	{
		
		$this->Checklogin();
		if (isset($_POST ['submit']))
		{
			
			
			$data ['admin_section']='location';
			$id=$this->location_model->addCountry();
			if ($id)
			{
				$this->session->set_flashdata('success','Country has been added successfully.');
				redirect('head/location');
			} else
			{
				$this->session->set_flashdata('error','Unable to save Country.');
				$data ['include']='head/location/location';
				$data ['admin_section']='manage_location';
				$this->load->view('backend/container_sa',$data);
			}
		} else
		{
			redirect('head/location');
		}
	
	}
	
	// ---Function used to add new country-//
	public function editCountry()
	{
		
		$this->Checklogin();
		if (isset($_POST ['submit']))
		{
			
		
			$data ['admin_section']='location';
			$id=$this->location_model->editCountry();
			if ($id)
			{
				$this->session->set_flashdata('success','Country has been updated successfully.');
				redirect('head/location');
			} else
			{
				$this->session->set_flashdata('error','Unable to edit Country.');
				$data ['include']='head/location/location';
				$data ['admin_section']='manage_location';
				$this->load->view('backend/container_sa',$data);
			}
		} else
		{
			redirect('head/location');
		}
	
	}
	
	
	
	// --functin used to deactivate country--//
	public function changecountryStatus()
	{
		$this->Checklogin();
		$status=$this->input->post('id');
		$country=$this->input->post('country');
		$idlist=implode(",",$country);
		
		if ($status == 0 || $status == 1)
		{
			$a=$this->location_model->changecountryStatus($status,$country);
			if ($status == 0)
			{

				setSAActivityLogs('Transaction_activity','SALocationcountry_status',"Updates Status Deactivated :- ".$idlist);
                                if(count($country)>1)
                               {
				   $this->session->set_flashdata('success','Countries has been deactivated successfully');
                               }
                               else
                              {
                                   $this->session->set_flashdata('success','Country has been deactivated successfully');    
                              }
  
			} else
			{
				setSAActivityLogs('Transaction_activity','SALocationcountry_status',"Updates Status Activated :- ".$idlist);
                                if(count($country)>1)
                                {
                                       $this->session->set_flashdata('success','Countries has been activated successfully');   
                                }
                                else
                                {                                  
				       $this->session->set_flashdata('success','Country has been activated successfully');
                                }
			}
			echo true;
		} else
		{
			
			$this->session->set_flashdata('error','Something went wrong');
			echo true;
		}
	
	}
	
	// --Function used to get all state--//
	public function getallState($id)
	{
		
		$this->Checklogin();

                $country_id=base64_decode($id); 

		setSAActivityLogs('Transaction_activity','SALocationstate_view');
		$data ['result']=$this->location_model->getallState($country_id);
		$data ['include']='head/location/state';
		$data ['admin_section']='manage_location';
		$data ['country_id']=$country_id;
		$this->load->view('backend/container_sa',$data);
	
	}
	
	// ---Function used to add new state-//
	public function addState()
	{
	
		$this->Checklogin();
		if (isset($_POST ['submit']))
		{
			
		
			$data ['admin_section']='location';
			$cid=$this->input->post('txtCountry');
			$id=$this->location_model->addState($cid);
			if ($id)
			{
				$this->session->set_tempdata('success','State has been added successfully.',3);
				redirect('head/location/getallState/' . base64_encode($cid));
			} else
			{
				$this->session->set_tempdata('error','Unable to save State.',3);
				redirect('head/location/getallState/' . base64_encode($cid));
			}
		} else
		{
			redirect('head/location');
		}
	
	}
	
	// ---Function used to add new State-//
	public function editState()
	{
		
		$this->Checklogin();
		if (isset($_POST ['submit']))
		{
			$data ['admin_section']='location';
			$cid=$this->input->post('txtCountry');
			$id=$this->location_model->editState();
			if ($id)
			{
				$this->session->set_tempdata('success','State has been updated successfully.',3);
				redirect('head/location/getallState/' . base64_encode($cid));
			} else
			{
				redirect('head/location/getallState/' . base64_encode($cid));
			}
		} else
		{
			redirect('head/location');
		}
	
	}
	
	// --functin used to deactivate/activate state--//
	public function changestateStatus()
	{
	
		$this->Checklogin();
		$status=$this->input->post('id');
		$state=$this->input->post('state');
       
		$idlist=implode(",",$state);
		
		if($status == 0 || $status == 1)
		{
			$a=$this->location_model->changestateStatus($status,$state);
			
			if($status == 0)
			{
                                if(count($state)>1)
                                {                                 
				       					//$this->session->set_flashdata('success','States has been deactivated successfully');

                                		$module_name_to_show='States';
                                }
                                else
                                {
                                       //$this->session->set_flashdata('success','State has been deactivated successfully');

                                       $module_name_to_show='State'; 
                                }

                                $this->session->set_tempdata('success',$module_name_to_show.' has been deactivated successfully',3); 

                    			setSAActivityLogs('Transaction_activity','SALocationstate_status',"Updates Status Deactivated :- ".$idlist);            
			} 
			else
			{
				
                                if(count($state)>1)
                                {
                                		$module_name_to_show='States'; 
				       					//$this->session->set_flashdata('success','States has been activated successfully');
                                }
                                else
                                {
                                		$module_name_to_show='State'; 
                                       //$this->session->set_flashdata('success','State has been activated successfully');      
                                }
                                
                                $this->session->set_tempdata('success',$module_name_to_show.' has been activated successfully',3);

                                //setSAActivityLogs('Transaction_activity','SALocationstate_status',"Updates Status Activated :- ".$idlist);
			}
			echo true;
		} else
		{
			
			$this->session->set_flashdata('error','Something went wrong');
			echo true;
		}
	
	}
	
	// --Function used to get all City--//
	public function getallCity($id,$country)
	{
		
		$this->Checklogin();
         
                $state_id=base64_decode($id);

                $country_id=base64_decode($country);         

		$data ['result']=$this->location_model->getallCity($state_id);
		$data ['include']='head/location/city';
		$data ['admin_section']='manage_location';
		$data ['state_id']=$state_id;
		$data ['country_id']=$country_id;
		$a=setSAActivityLogs('Transaction_activity','SALocationcity_view');
		$this->load->view('backend/container_sa',$data);
	
	}
	
	// ---Function used to add new City-//
	public function addCity()
	{
		
		$this->Checklogin();
		if (isset($_POST ['submit']))
		{
			$data ['admin_section']='location';
			$cid=$this->input->post('txtCountry');
			$sid=$this->input->post('txtState');
			
			$id=$this->location_model->addCity();
			if ($id)
			{
				$this->session->set_tempdata('success','City has been added successfully.',3);
				redirect('head/location/getallcity/' . base64_encode($sid) . '/' . base64_encode($cid));
			} else
			{
				$this->session->set_flashdata('error','Unable to save city.');
				redirect('head/location/getallcity/' . base64_encode($sid) . '/' . base64_encode($cid));
			}
		} else
		{
			redirect('head/location');
		}
	
	}
	
	// ---Function used to add new City-//
	public function editCity()
	{
		$this->Checklogin();
		if (isset($_POST ['submit']))
		{
			
		
			$data ['admin_section']='location';
			$cid=$this->input->post('txtCountry');
			$sid=$this->input->post('txtState');
			$id=$this->location_model->editCity();
			if ($id)
			{
				$this->session->set_tempdata('success','City has been updated successfully.',3);
				redirect('head/location/getallcity/' . base64_encode($sid) . '/' . base64_encode($cid));
			} else
			{
				redirect('head/location/getallcity/' . base64_encode($sid) . '/' . base64_encode($cid));
				;
			}
		} else
		{
			redirect('head/location');
		}
 	
	}
	
	// --functin used to deactivate/activate city--//
	public function changecityStatus()
	{
		$status=$this->input->post('id');
		$city=$this->input->post('city');
		$idlist=implode(",",$city);
		$this->Checklogin();
		if ($status == 0 || $status == 1)
		{
			$a=$this->location_model->changecityStatus($status,$city);
			
			if ($status == 0)
			{
				setSAActivityLogs('Transaction_activity','SALocationcity_status',"Updates Status Deactivated :- ".$idlist);
                                if(count($city)>1)
                                {
				       					//$this->session->set_flashdata('success','Cities has been deactivated successfully');

                                		$module_name_to_show='Cities';
                                }
                                else
                                {
                                        //$this->session->set_flashdata('success','City has been deactivated successfully');

                                		$module_name_to_show='City';
                                }  

                                $this->session->set_tempdata('success',$module_name_to_show.' has been deactivated successfully',3);
			} 
			else
			{
				
                                if(count($city)>1)
                                { 
				        				//$this->session->set_flashdata('success','Cities has been activated successfully');

                                		$module_name_to_show='Cities';
                                }
                                else
                                {
                                        //$this->session->set_flashdata('success','City has been activated successfully');

                                        $module_name_to_show='City'; 
                                }

                                $this->session->set_tempdata('success',$module_name_to_show.' has been activated successfully',3);

                				setSAActivityLogs('Transaction_activity','SALocationcity_status',"Updates Status Activated :- ".$idlist);                
			}
			echo true;
		} else
		{
			
			$this->session->set_flashdata('error','Something went wrong');
			echo true;
		}
	
	}
	
	// ----Function Used To download city csv----//
	public function getCitycsv($id="")
	{
		$this->Checklogin();
		
		$result=$this->db->query("select * from tblmvbcity where cty_stateId_fk='".$id."'");
		$row=$result->result();
		
		$contents='"City Id","City Name","Status"';
		
		$contents.="\n";
		for($i=0;$i < count($row);$i ++)
		{
			$a="Active";
			if ($row [$i]->cty_status == 0)
			{
				$a="Deactive";
			}
			$contents.='"' . $row [$i]->cty_id_pk . '","' . $row [$i]->cty_name . '","' . $a . '"';
			$contents.="\n";
		}
		setSAActivityLogs('Transaction_activity','SALocationcity_csvdownload');
		$contents=strip_tags($contents);
		
		// header to make force download the file
		Header("Content-Disposition: attachment; filename=City.csv");
		print $contents;
		exit();
	
	}

   
        // ----Function Used To download state csv----//
	public function getStatecsv($id="")
	{
		$this->Checklogin();
		
		$result=$this->db->query("select * from tblmvbstate where stat_countryId_fk='".$id."'");
		$row=$result->result();
		
		$contents='"State Id","State Name","Status"';
		
		$contents.="\n";
		for($i=0;$i < count($row);$i ++)
		{
			$a="Active";
			if ($row [$i]->cty_status == 0)
			{
				$a="Deactive";
			}
			$contents.='"' . $row [$i]->stat_id_pk. '","' . $row [$i]->	stat_name . '","' . $a . '"';
			$contents.="\n";
		}
		setSAActivityLogs('Transaction_activity','SALocationstate_csvdownload');
		$contents=strip_tags($contents);
		
		// header to make force download the file
		Header("Content-Disposition: attachment; filename=State.csv");
		print $contents;
		exit();
	
	}

        

         // ----Function Used To download state csv----//
	public function getCountrycsv()
	{
		$this->Checklogin();
		
		$result=$this->db->query("select * from tblmvbcountry");
		$row=$result->result();
		
		$contents='"Country Id","Country Name","Status"';
		
		$contents.="\n";
		for($i=0;$i < count($row);$i ++)
		{
			$a="Active";
			if ($row [$i]->cntr_status == 0)
			{
				$a="Deactive";
			}
			$contents.='"' . $row [$i]->cntr_id_pk. '","' . $row [$i]->cntr_name . '","' . $a . '"';
			$contents.="\n";
		}
		setSAActivityLogs('Transaction_activity','SALocationcountry_csvdownload');
		$contents=strip_tags($contents);
		
		// header to make force download the file
		Header("Content-Disposition: attachment; filename=Country.csv");
		print $contents;
		exit();
	
	}

    public function getOTP()
	{
					$otp=  rand(1000, 9999);

					$admin_user_id=$this->session->userdata('admin_id');

					$result=$this->db->query("select sysu_mobile from tblmvbsystemusers where sysu_id_pk='".$admin_user_id."'");
					$row=$result->result();	

					$mobile_no=$this->encryption->decrypt($row[0]->sysu_mobile);

				    $msg1 = urlencode("OTP(One Time Password) for export CSV  is ".$otp.".");

				    $request = "http://49.50.69.90/api/smsapi.aspx?username=mykeyword&password=mykeyword@123&from=KEYWRD&to=91".$mobile_no."&message=".urlencode($msg1);			    

					$data = '';
					$objURL = curl_init($request);
					curl_setopt($objURL, CURLOPT_RETURNTRANSFER, 1); 
					curl_setopt($objURL,CURLOPT_POST,1);
					curl_setopt($objURL, CURLOPT_POSTFIELDS,$data);
					$retval = trim(curl_exec($objURL));

					curl_close($objURL);

                     
                    //$url1 = "http://trans.kapsystem.com/api/v3/index.php?method=sms&api_key=A474c43f4d3174a71ae8a4e7978ddacea&to=".$global_mobile_no."&sender=ITOKRI&message=".$msg1."&format=php&custom=1,2&flash=0";

                    // $url1="";


                    // $c = curl_init(); 
                    // curl_setopt($c, CURLOPT_URL, $url1); 
                    // curl_setopt($c, CURLOPT_HEADER, 1); // get the header 
                    // curl_setopt($c, CURLOPT_NOBODY, 1); // and *only* get the header 
                    // curl_setopt($c, CURLOPT_RETURNTRANSFER, 1); // get the response as a string from curl_exec(), rather than echoing it 
                    // curl_setopt($c, CURLOPT_FRESH_CONNECT, 1); // don't use a cached version of the url 
                    // if (!curl_exec($c)) { return false; } 

                    // $httpcode = curl_getinfo($c, CURLINFO_HTTP_CODE); 
                    // curl_close($c);

                    
                    $this->db->query("Update tblmvbsysmainusers set sysmu_otp='".$otp."' where sysmu_id_pk='".$admin_user_id."'");


                    //------------------------------ Start Save Transaction Logs ---------------------------//
			
					setSAActivityLogs('Transaction_activity','OTP_sent_for_export');

				//-------------------------------  End Save Transaction Logs ------------------------------//

					echo $otp;

	} 

	public function verifyOTP()
	{
				$otp=$_POST['txtotp'];

				//print_r($_POST);

				$admin_user_id=$this->session->userdata('admin_id');

				$result=$this->db->query("SELECT sysmu_otp FROM tblmvbsysmainusers WHERE sysmu_id_pk='".$admin_user_id."'");
				$row=$result->result();


				//echo $row[0]->sysmu_otp.'=='.$otp;

				if($row[0]->sysmu_otp==$otp)
				{
						echo 'true';
				}
				else
				{
						echo 'false';
				}
	}


	public function verifyExport()
	{					
                    $hidden_type=$_POST['hidden_type'];

                    if($hidden_type=='country_module')
                    {
							$otp=$_POST['txtotp'];

							$admin_user_id=$this->session->userdata('admin_id');	

						    $result=$this->db->query("SELECT sysmu_otp FROM tblmvbsysmainusers WHERE sysmu_id_pk='".$admin_user_id."'");
							$row=$result->result();

							if($row[0]->sysmu_otp==$otp)
							{
									$result=$this->db->query("select * from tblmvbcountry where cntr_delete='0'");
									$row=$result->result();
				
									$contents='"Country Id","Country Name","Status"';
				
									$contents.="\n";

									for($i=0;$i < count($row);$i ++)
									{
										$a="Active";
										if ($row [$i]->cntr_status == 0)
										{
											$a="Deactive";
										}
										$contents.='"' . $row [$i]->cntr_id_pk. '","' . $row [$i]->cntr_name . '","' . $a . '"';
										$contents.="\n";
									}
									setSAActivityLogs('Transaction_activity','SALocationcountry_csvdownload');
									$contents=strip_tags($contents);
									
									// header to make force download the file
									Header("Content-Disposition: attachment; filename=Country.csv");
									print $contents;
									exit;
							}
					}
					else if($hidden_type=='state_module')
					{
                        	$otp=$_POST['txtotp'];

                        	$country_id=$_POST['hidden_country_id'];

							$admin_user_id=$this->session->userdata('admin_id');	

						    $result=$this->db->query("SELECT sysmu_otp FROM tblmvbsysmainusers WHERE sysmu_id_pk='".$admin_user_id."'");
							$row=$result->result();

							if($row[0]->sysmu_otp==$otp)
							{
										$result=$this->db->query("select * from tblmvbstate where stat_countryId_fk='".$country_id."' and stat_delete='0'");
										$row=$result->result();
										
										$contents='"State Id","State Name","Status"';
										
										$contents.="\n";
										for($i=0;$i < count($row);$i ++)
										{
											$a="Active";
											if ($row [$i]->stat_status == 0)
											{
												$a="Deactive";
											}
											$contents.='"' . $row [$i]->stat_id_pk. '","' . $row [$i]->	stat_name . '","' . $a . '"';
											$contents.="\n";
										}
										setSAActivityLogs('Transaction_activity','SALocationstate_csvdownload');
										$contents=strip_tags($contents);
										
										// header to make force download the file
										Header("Content-Disposition: attachment; filename=State.csv");
										print $contents;
										exit();
							}
					}
					else
					{ 
							$otp=$_POST['txtotp'];

							$state_id=$_POST['hidden_state_id'];

							$admin_user_id=$this->session->userdata('admin_id');	

						    $result=$this->db->query("SELECT sysmu_otp FROM tblmvbsysmainusers WHERE sysmu_id_pk='".$admin_user_id."'");
							$row=$result->result();

							if($row[0]->sysmu_otp==$otp)
							{
										$result=$this->db->query("select * from tblmvbcity where cty_stateId_fk='".$state_id."' and cty_delete='0'");
										$row=$result->result();
										
										$contents='"City Id","City Name","Status"';
										
										$contents.="\n";
										for($i=0;$i < count($row);$i ++)
										{
											$a="Active";
											if ($row [$i]->cty_status == 0)
											{
												$a="Deactive";
											}
											$contents.='"' . $row [$i]->cty_id_pk . '","' . $row [$i]->cty_name . '","' . $a . '"';
											$contents.="\n";
										}
										setSAActivityLogs('Transaction_activity','SALocationcity_csvdownload');
										$contents=strip_tags($contents);
										
										// header to make force download the file
										Header("Content-Disposition: attachment; filename=City.csv");
										print $contents;
										exit();
							}
					}
	}

        public function deleteState()
       {
                        $state_deleted='';

			$state_id=$_POST['state_id'];	

			$explode_parts=implode(",",$state_id);

			$this->db->query("update tblmvbstate set stat_delete='1' where find_in_set(stat_id_pk,'".$explode_parts."')");

			if(count($state_id)>1)
			{
						$module_name_to_show='States';
			}
			else
			{
						$module_name_to_show='State';
			}

			$this->session->set_tempdata('success',$module_name_to_show.' deleted successfully',3);


			$user_type_deleted=' Deleted State Ids - '.$explode_parts;

			//---------------------------- Start Save Transaction Logs ---------------------------------//

			setSAActivityLogs('Transaction_activity','state_deleted',$user_type_deleted);			

			//---------------------------- End Save Transaction Logs ------------------------------------//
       }
 
       public function deleteCity()
       {
            $city_deleted='';

			$city_id=$_POST['city_id'];	

			$explode_parts=implode(",",$city_id);

			$this->db->query("update tblmvbcity set cty_delete='1' where find_in_set(cty_id_pk,'".$explode_parts."')");

			if(count($city_id)>1)
			{
					$module_name_to_show='Cities';
			}
			else
			{
					$module_name_to_show='City';
			}

            $this->session->set_tempdata('success',$module_name_to_show.' deleted successfully',3);   


			$user_type_deleted=' Deleted City Ids - '.$explode_parts;

			//---------------------------- Start Save Transaction Logs ---------------------------------//

			setSAActivityLogs('Transaction_activity','city_deleted',$user_type_deleted);			

			//---------------------------- End Save Transaction Logs ------------------------------------//
       } 


       public function deleteCountry()
       {
            $city_deleted='';

			$country_id=$_POST['country_id'];	

			$explode_parts=implode(",",$country_id);

			$this->db->query("update tblmvbcountry set cntr_delete='1' where find_in_set(cntr_id_pk,'".$explode_parts."')");

			if(count($country_id)>1)
			{
					$module_name_to_show='Countries';
			}
			else
			{
					$module_name_to_show='Country';
			}

            $this->session->set_flashdata('success',$module_name_to_show.' deleted successfully');   


			$user_type_deleted=' Deleted Country Ids - '.$explode_parts;

			//---------------------------- Start Save Transaction Logs ---------------------------------//

			setSAActivityLogs('Transaction_activity','country_deleted',$user_type_deleted);			

			//---------------------------- End Save Transaction Logs ------------------------------------//
       } 


}

