<?php

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('admin_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('user_agent');
		$this->load->library('email');
		$this->load->library('encryption');
	
	}
	
	// --Function Used to Login for admin --//
	public function index()
	{

		if ($this->input->post('txtUsername')!='' && $this->input->post('txtPassword')!='')
		{	
				
			
			$data=$this->admin_model->checkLogin($this->input->post('txtUsername'),$this->input->post('txtPassword'));

			if($data)
			{
				$data_package=$this->admin_model->checkPackageExpiration($this->session->userdata('client_id'));

				if($data_package)
				{	
							if($this->session->userdata('branch_id')!=0)
							{	
							  redirect('admin/dashboard');
							}
							else 
							{
								redirect('admin/branch/selectBranch');
							}
						
				} 
				else
				{
							$this->session->set_flashdata('error','Your package has been expired');	

				}
			}
			else
			{
					
					$this->session->set_flashdata('success','Invalid Credentials.');
			
					redirect(base_url() . "admin");	
			}
		}
		
		$data['include']='admin/login';
		$this->load->view('admin/login',$data);
	
	}
 	
	public function forgot_password()
	{
		if (isset($_POST['submit']))
		{
			$email_address=$_POST['email'];
			
			$query_user=$this->db->query("SELECT sysu_name,sysu_email,sysu_password from tblmvbsystemusers");
			$array_user_id=$query_user->result();
			
			$message='';
			if (count($array_user_id) > 0)
			{
                                $flag=0;
                                for($i=0;$i<count($array_user_id);$i++)
                                {
                                    $emaildb=$this->encryption->decrypt($array_user_id[$i]->sysu_email);
                                    $password=$this->encryption->decrypt($array_user_id[$i]->sysu_password);
                                    if($email_address==$emaildb)
                                    {
                                        $flag=1;
                                        	// Send e-Mail to Employee....
                                            $subject="Forgot Password";
                                            $message.="Dear " . $array_user_id[$i]->sysu_username . ",<br><br>";
                                            $message.="Your Login Information is as follow:<br>";
                                            $message.="User Name: " . $emaildb. "<br>";
                                            $message.="Password: " . $password . "<br>";
                                            $message.="Thanks <br> For additional Information You can contact us.";
                                            $toEmail=$email_address;
                                            $this->sendEmail($toEmail,$subject,$message);
                                    }
                                
                                }
                                if($flag==1)
                                {
                                    $this->session->set_flashdata('success','Password has been mailed You');
				
                                    echo true;
                                }
                                else
                                {
                                    $this->session->set_flashdata('success','No Records Found Email');
				
                                    return false;
                                }
                                
			} else
			{
				$this->session->set_flashdata('success','No Records Found Email');
				
                                    return false;
			}
		} else
		{
			$this->session->set_flashdata('success','Something went wrong');
				
                                    return false;
		}
	
	}

	public function sendEmail($toEmail,$subject,$message)
	{
		$this->email->from('yash@velociters.com','Tokri');
		$this->email->to($toEmail);
		$this->load->library('email');
		$this->email->set_mailtype("html");
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();
	
	}

	public function setting()
	{
		if (isset($_POST['SUBMIT']))
		{
			$this->form_validation->set_error_delimiters('<div class="error">','</div>');
			
			$this->form_validation->set_rules('user','Username','trim|required|xss_clean');
			$this->form_validation->set_rules('email','Email id','trim|required|xss_clean|valid_email');
			
			if ($this->form_validation->run() != FALSE)
			{
				$user=$this->form_validation->xss_clean($this->input->post('user'));
				$email=$this->form_validation->xss_clean($this->input->post('email'));
				$this->admin_model->update_setting($user,$email);
			}
		}
		
		$present_info=$this->admin_model->admin_setting();
		$data['admin']=$present_info;
		$data['include']='siteadmin/dashboard/setting';
		$this->load->view('backend/container',$data);
	
	}

	public function check_email()
	{
		$email=$this->input->post('email');
		
		$query_user=$this->db->query("SELECT * from tblmvbsystemusers ");
		$array_user_id=$query_user->result();
		$f=0;
		if (count($array_user_id) > 0)
		{
                    for($i=0;$i<count($array_user_id);$i++)
                       {
                        $emaildb=$this->encryption->decrypt($array_user_id[$i]->sysu_email);
                         if($email==$emaildb)
                                    {
                                        $result='true';
                                    }
                       }
                       $result='true';
		} else
		{
			$result='false';
		}
		
		echo $result;
	
	}

	public function logout()
	{
	
		$this->db->query("UPDATE `tblmvbsystemusers` SET `sysu_isLogin` = '0' WHERE sysu_id_pk = '".$this->session->userdata('admin_admin_id') ."'");
		$this->session->sess_destroy();
		redirect('admin');
	}

	public function getAllHeaderDetails()
	{
				$get_sms_email_count=$this->admin_model->getSmsEmailNotifyCount();

				$get_email_counter=$this->admin_model->getEmailCounterCount();

				$get_sms_counter=$this->admin_model->getSmsCounterCount();

				$get_low_balance=$this->admin_model->getLowBalanceCount();

				echo $get_sms_email_count.'~'.$get_email_counter.'~'.$get_sms_counter.'~'.$get_low_balance;	
	}


	public function getAllRequestDetails()
	{
				$get_type=$_POST['notify'];

				$current_datetime=date('Y-m-d H:i:s');

				$datetime2=new DateTime($current_datetime);

				if($get_type=='sms_email_notify')
				{
						$senderid_request=$this->admin_model->getAllSmsEmailNotify();

						for($sr=0;$sr<count($senderid_request);$sr++)
						{
								if($senderid_request[$sr]->sntfy_request_type=='email_request_approval')
								{
										$notification_type='email_notify';

										$notification_show='Your email request has been approved';
								}
								else
								{
										$notification_type='sms_notify';

										$notification_show='Your sms request has been approved';
								}

								$datetime1=new DateTime($senderid_request[$sr]->created_time);

								$difference=$datetime1->diff($datetime2);

								if($difference->d>0)
								{
										if($difference->d>1)
										{
												$show_days=' days';
										}
										else
										{
												$show_days=' day';
										}		

										$duration_time=$difference->d.$show_days;
								}
								else if($difference->h>0)
								{
										if($difference->h>1)
										{
												$show_hours=' hours';
										}
										else
										{
												$show_hours=' hour';
										}

										$duration_time=$difference->h.$show_hours;
								}
								else if($difference->i>0)
								{
										if($difference->i>1)
										{
												$show_minutes=' minutes';
										}
										else
										{
												$show_minutes=' minute';
										}

										$duration_time=$difference->i.$show_minutes;
								}
								else
								{
										$duration_time='just now';
								}
						?>									
							<li>
								<a href="javascript:;" onclick="setShowStatus('sms_email_notify','<?php echo $senderid_request[$sr]->notify_id;?>','<?php echo $notification_type;?>')"> <span class="time"><?php echo $duration_time;?></span> <span class="details"> 
									<span class="label label-sm label-icon label-success"> <i class="fa fa-plus"></i>
										</span> <?php echo $notification_show;?>
									</span>
								</a>
							</li>
						<?php	
						}
				}			
				else
				{
						$low_balance=$this->admin_model->getAllLowBalance();

						for($or=0;$or<count($low_balance);$or++)
						{
								if($low_balance[$or]->low_balance_type=='Email Balance is low')
								{
										$notification_type='email_balance_low';

										$notification_show='Email balance is low';
								}
								else
								{
										$notification_type='sms_balance_low';

										$notification_show='SMS balance is low';
								}


								$datetime1=new DateTime($low_balance[$or]->created_time);

								$difference=$datetime1->diff($datetime2);

								if($difference->d>0)
								{
										$duration_time=$difference->d.' day(s)';
								}
								else if($difference->h>0)
								{
										$duration_time=$difference->h.' hour(s)';
								}
								else if($difference->i>0)
								{
										$duration_time=$difference->i.' minute(s)';
								}
								else
								{
										$duration_time='just now';
								}	
						?>
							<li>
								<a onclick="setShowStatus('low_balance','<?php echo $low_balance[$or]->notify_id;?>','<?php echo $notification_type;?>')"> 
								<span class="time"><?php echo $duration_time;?></span> 
									<span class="details"> 
										<span class="label label-sm label-icon label-success"> <i class="fa fa-plus"></i>
										</span> <?php echo str_replace("_"," ",$low_balance[$or]->low_balance_type);?>
									</span>
								</a>
							</li>										
						<?php
						}
				}
	}


	public function setNotifyShowStatus()
	{
			$notify_type=$_POST['type'];

			$notify_id=$_POST['notifyid'];

			$this->db->query("update tblmvbsanotify set sntfy_show_status='1' where sntfy_id_pk='".$notify_id."'");
	}

	
}