<?php

class Head extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('head_model');
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
		if ($this->input->post('username')!='' && $this->input->post('password')!='')
		{
			
			if ($this->head_model->checkLogin($this->input->post('username'),$this->input->post('password')))
			{
				redirect('head/dashboard');
			} else
			{
				$data ['error_message']="Please enter valid username or password.";
			}
		}
		
		$data ['include']='head/login';
		$this->load->view('head/login',$data);
	
	}

	public function forgot_password()
	{
		if (isset($_POST ['submit']))
		{
			$email_address=$_POST ['email'];
			
			$query_user=$this->db->query("SELECT * from tblmvbsysmainusers where sysmu_email='" . $email_address . "'");
			$array_user_id=$query_user->result();
			
			$message='';
			if (count($array_user_id) > 0)
			{
				// Send e-Mail to Employee....
				$subject="Forgot Password";
				$message.="Dear " . $array_user_id [0]->sysmu_username . ",<br><br>";
				$message.="Your Login Information is as follow:<br>";
				$message.="User Name: " . $array_user_id [0]->sysmu_email . "<br>";
				$message.="Password: " . $array_user_id [0]->sysmu_password . "<br>";
				$message.="Thanks <br> For additional Information You can contact us.";
				$toEmail=$email_address;
				$this->sendEmail($toEmail,$subject,$message);
				
				echo true;
			} else
			{
				echo false;
			}
		} else
		{
			echo false;
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
		if (isset($_POST ['SUBMIT']))
		{
			$this->form_validation->set_error_delimiters('<div class="error">','</div>');
			
			$this->form_validation->set_rules('user','Username','trim|required|xss_clean');
			$this->form_validation->set_rules('email','Email id','trim|required|xss_clean|valid_email');
			
			if ($this->form_validation->run() != FALSE)
			{
				$user=$this->form_validation->xss_clean($this->input->post('user'));
				$email=$this->form_validation->xss_clean($this->input->post('email'));
				$this->head_model->update_setting($user,$email);
			}
		}
		
		$present_info=$this->head_model->admin_setting();
		$data ['admin']=$present_info;
		$data ['include']='siteadmin/dashboard/setting';
		$this->load->view('backend/container',$data);
	
	}

	public function check_email()
	{
		$email=$this->input->post('email');
		$email=$this->encryption->encrypt($email);	
		$query_user=$this->db->query("SELECT * from tblmvbsysmainusers where sysmu_email='" . $email . "'");
		$array_user_id=$query_user->result();
		 
		
		if (count($array_user_id) > 0)
		{
			$result='true';
		} else
		{
			$result='false';
		}
		
		echo $result;
	
	}
	
	public function logout()
	{
		
		$this->db->query("UPDATE `tblmvbsysmainusers` SET `sysmu_isLogin` = '0' WHERE sysmu_id_pk = '".$this->session->userdata('admin_id') ."'");
		$this->session->sess_destroy();
		redirect('head');
	}

	public function getAllHeaderDetails()
	{
				$get_senderid_count=$this->head_model->getSenderidCount();

				$get_sms_request_count=$this->head_model->getSmsRequestCount();

				$get_email_request_count=$this->head_model->getEmailRequestCount();

				$get_opt_request_count=$this->head_model->getOptRequestCount();

				echo $get_senderid_count.'~'.$get_sms_request_count.'~'.$get_email_request_count.'~'.$get_opt_request_count;				
	}


	public function getAllRequestDetails()
	{
				$get_type=$_POST['notify'];

				$current_datetime=date('Y-m-d H:i:s');

				$datetime2=new DateTime($datetime2);

				if($get_type=='sender_id')
				{
						$senderid_request=$this->head_model->getAllSenderidRequest();

						for($sr=0;$sr<count($senderid_request);$sr++)
						{
								$datetime1=new DateTime($senderid_request[$sr]->created_time);

								$difference=$datetime1->diff($datetime2);

								if($difference->d>0)
								{
										$duration_time=$difference->d.' days';
								}
								else if($difference->h>0)
								{
										$duration_time=$difference->h.' hours';
								}
								else if($difference->i>0)
								{
										$duration_time=$difference->i.' minutes';
								}
								else
								{
										$duration_time='just now';
								}
						?>									
							<li>
								<a href="javascript:;" onclick="setShowStatus('sender_id','<?php echo $senderid_request[$sr]->notify_id;?>');"> <span class="time"><?php echo $duration_time;?></span> <span class="details"> 
									<span class="label label-sm label-icon label-success"> <i class="fa fa-plus"></i>
										</span> <?php echo $senderid_request[$sr]->client_name.' sender id request';?>
									</span>
								</a>
							</li>
						<?php	
						}
				}
				else if($get_type=='sms_temp')
				{
						$sms_temp_request=$this->head_model->getAllSmsTempRequest();

						for($smr=0;$smr<count($sms_temp_request);$smr++)
						{

								$datetime1=new DateTime($sms_temp_request[$smr]->created_time);

								$difference=$datetime1->diff($datetime2);

								if($difference->d>0)
								{
										$duration_time=$difference->d.' days';
								}
								else if($difference->h>0)
								{
										$duration_time=$difference->h.' hours';
								}
								else if($difference->i>0)
								{
										$duration_time=$difference->i.' minutes';
								}
								else
								{
										$duration_time='just now';
								}
						?>
							<li>
								<a href="javascript:;" onclick="setShowStatus('sms_temp','<?php echo $sms_temp_request[$smr]->notify_id;?>');"> 
								<span class="time"><?php echo $duration_time;?></span> 
									<span class="details"> 
										<span class="label label-sm label-icon label-success"> <i class="fa fa-plus"></i>
										</span> <?php echo $sms_temp_request[$smr]->client_name.' sms template request';?>
									</span>
								</a>
							</li>
						<?php	
						}
				}
				else if($get_type=='email_temp')
				{
						$email_temp_request=$this->head_model->getAllEmailTempRequest();

						for($emr=0;$emr<count($email_temp_request);$emr++)
						{
								$datetime1=new DateTime($email_temp_request[$emr]->created_time);

								$difference=$datetime1->diff($datetime2);

								if($difference->d>0)
								{
										$duration_time=$difference->d.' days';
								}
								else if($difference->h>0)
								{
										$duration_time=$difference->h.' hours';
								}
								else if($difference->i>0)
								{
										$duration_time=$difference->i.' minutes';
								}
								else
								{
										$duration_time='just now';
								}
						?>										
							<li>
								<a href="javascript:;" onclick="setShowStatus('email_temp','<?php echo $email_temp_request[$emr]->notify_id;?>');"> 
								<span class="time"><?php echo $duration_time;?></span> 
									<span class="details"> 
										<span class="label label-sm label-icon label-success"> <i class="fa fa-plus"></i>
										</span> <?php echo $email_temp_request[$emr]->client_name.' email template request';?>
									</span>
								</a>
							</li>
						<?php	
						}
				}
				else
				{
						$otp_request=$this->head_model->getAllOptRequest();

						for($or=0;$or<count($otp_request);$or++)
						{
								$datetime1=new DateTime($otp_request[$or]->created_time);

								$difference=$datetime1->diff($datetime2);

								if($difference->d>0)
								{
										$duration_time=$difference->d.' days';
								}
								else if($difference->h>0)
								{
										$duration_time=$difference->h.' hours';
								}
								else if($difference->i>0)
								{
										$duration_time=$difference->i.' minutes';
								}
								else
								{
										$duration_time='just now';
								}	
						?>
							<li>
								<a href="javascript:;" onclick="setShowStatus('opt_request','<?php echo $otp_request[$or]->notify_id;?>');"> 
								<span class="time"><?php echo $duration_time;?></span> 
									<span class="details"> 
										<span class="label label-sm label-icon label-success"> <i class="fa fa-plus"></i>
										</span> <?php echo $otp_request[$or]->client_name.' OPT request';?>
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

			if($notify_type=='sender_id')
			{
					$this->db->query("update tblmvbnotifyrequest set ntfy_show_status='1' where ntfy_request_type='sender_id' and ntfy_id_pk='".$notify_id."'");
			}
			else if($notify_type=='sms_temp')
			{
					$this->db->query("update tblmvbnotifyrequest set ntfy_show_status='1' where ntfy_request_type='sms_temp' and ntfy_id_pk='".$notify_id."'");
			}
			else if($notify_type=='email_temp')
			{
					$this->db->query("update tblmvbnotifyrequest set ntfy_show_status='1' where ntfy_request_type='email_temp' and ntfy_id_pk='".$notify_id."'");
			}
			else
			{
					$this->db->query("update tblmvbnotifyrequest set ntfy_show_status='1' where ntfy_request_type='opt_request' and ntfy_id_pk='".$notify_id."'");
			}

	}

}