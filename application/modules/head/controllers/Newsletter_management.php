<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Newsletter_management extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('newsletter_management_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('jwt-master/JWT');
		$this->load->library('Mandrill');
		$this->load->library('encrypt');
		$this->load->library('email');
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');
	
	}
	
	// ==================== all page session check ===================== //
	public function Checklogin()
	{
		if ($this->session->userdata('admin_email') == '')
		{
			redirect('head/');
		}
	
	}
	
	// --Load FAQ--//
	public function index()
	{
		$this->Checklogin();
		// ---------------------------------- Start Save Transaction Logs ---------------------------//
		setSAActivityLogs('Transaction_activity','Newsletter_management_view');
		// ------------------------------- End Save Transaction Logs ------------------------------//
		$data['result']=$this->newsletter_management_model->getAllNewsletter();
		$data['include']='head/newsletter_management/manage_newsletter_management';
		$data['admin_section']='manage_newsletter_management';
		$this->load->view('backend/container_sa',$data);
	
	}

	public function sendNewsLetter()
	{
		$newsletter_id=$this->newsletter_management_model->getSubscribeduser();//$_POST['newsletter_id'];
		$subject=$_POST['subject_txt'];
		$description=$_POST['description'];
		// ---------------------------------- Start Save Transaction Logs ---------------------------//
		$all_sms_temp_request_ids=implode(",",$newsletter_id);
		$transaction_logs_details='';
	
		$transaction_logs_details.='Newsletter Sent to Subscriber Emails - ' . $all_sms_temp_request_ids;
		
		setSAActivityLogs('Transaction_activity','Newsletter_management_send');
		// ------------------------------- End Save Transaction Logs ------------------------------//
		
		for($sn=0;$sn < count($newsletter_id);$sn ++)
		{
			// $this->email->from('info@myvisitorbook.in','MyVisitorBook');
			// $this->email->to($newsletter_id[$sn]->sb_email);
			// $this->email->subject($subject);
			// $this->email->message($description);
			// if ($this->email->send())
			// {

				$email_send_mandrill=$this->sendMandrillEmail($newsletter_id[$sn]->sb_email,$subject,$description);

				$this->newsletter_management_model->sendNewsletter($newsletter_id[$sn]->sb_email,$subject,$description,$email_send_mandrill);
			//}
		}
	
		echo "News Letter Has Been Send";
	}

	public function sendMandrillEmail($customer_email,$subject,$description)
	{
				$from_email_id=$this->session->userdata('admin_email');

				try 
                {
                    $mandrill = new Mandrill('iuRU9pFj9JXaKLwJuYM2Fw');//new : t57dyzbulLFY5_eOzDsHIA (tokri account)   
                    //old:eR7u9tMyZL6LWKiBXROv7w   (sandesh account)
                    $template_name = 'Sample template';
                    $template_content = array(array('name' => 'main',//the name of the mc:edit editable region to inject into. Required
                                                    'content' =>'Hi *|NAME|*, thanks for signing up. '//the content to inject. Required
                                                    ),
                    							array('name' => 'footer',//the name of the mc:edit editable region to inject into. Required
                                                    'content' =>'Copyright 2017'//the content to inject. Required
                                                    )
                                            );
                    $message = array(
                                    'html' => '<p>'.$description.'</p>',//send html template if template not available on mailchimp
                                    'text' => 'Example text content',//optional full text content to be sent
                                    'subject' => $subject,//the message subject
                                    'from_email' => $from_email_id,//the sender email address
                                    'from_name' => 'MVB',//optional from name to be used
                                    'to' => array(
                                                    array(
                                                        'email' => $customer_email,//the email address of the recipient. Required
                                                        //the optional display name to use for the recipient
                                                        'type' => 'to'//the header type to use for the recipient, defaults to "to" if not provided. oneof(to, cc, bcc)
                                                        )
                                                ),
                                    'headers' => array('Reply-To' => $from_email_id),//optional extra headers to add to the message (most headers are allowed)
                                    'important' => true,//whether or not this message is important, and should be delivered ahead of non-important messages
                                    'track_opens' => null,//whether or not to turn on open tracking for the message
                                    'track_clicks' => null,//whether or not to turn on click tracking for the message
                                    'auto_text' => null,//whether or not to automatically generate a text part for messages that are not given text
                                    'auto_html' => null,//whether or not to automatically generate an HTML part for messages that are not given HTML
                                    'inline_css' => null,//whether or not to automatically inline all CSS styles provided in the message HTML - only for HTML documents less than 256KB in size
                                    'url_strip_qs' => null,//whether or not to strip the query string from URLs when aggregating tracked URL data
                                    'preserve_recipients' => null,//whether or not to expose all recipients in to "To" header for each email
                                    'view_content_link' => null,//set to false to remove content logging for sensitive emails
                                    'bcc_address' => null,//an optional address to receive an exact copy of each recipient's email
                                    'tracking_domain' => null,//a custom domain to use for tracking opens and clicks instead of mandrillapp.com
                                    'signing_domain' => null,//a custom domain to use for SPF/DKIM signing instead of mandrill (for "via" or "on behalf of" in email clients)
                                    'return_path_domain' => null,//a custom domain to use for the messages's return-path
                                    'merge' => true,//whether to evaluate merge tags in the message. Will automatically be set to true if either merge_vars or global_merge_vars are provided.
                                    'merge_language' => 'mailchimp',//the merge tag language to use when evaluating merge tags, either mailchimp or handlebars. oneof(mailchimp, handlebars)
                                    'global_merge_vars' => array(
                                                                array(
                                                                    'name' => 'MOBILE_NO',//the name of the mc:edit editable region to inject into. Required
                                                                    'content' => ''//$result[0]->vis_mobile//the content to inject. Required
                                                                ),
                                                                array(
                                                                    'name' => 'EMAIL_VAR',//the name of the mc:edit editable region to inject into. Required
                                                                    'content' => ''//base_url().'user/activate/'.$user_id//the content to inject. Required
                                                                )
                                                            ),
                                    'merge_vars' => array(
                                                            array(
                                                                'rcpt' => $customer_email,//the email address of the recipient that the merge variables should apply to. required
                                                                'vars' => array(
                                                                    array(
                                                                        'name' => 'MOBILE_NO',//the name of the mc:edit editable region to inject into. Required
                                                                        'content' => ''//$result[0]->vis_mobile//the content to inject. Required
                                                                    ),
                                                                    array(
                                                                        'name' => 'EMAIL_VAR',//the name of the mc:edit editable region to inject into. Required
                                                                        'content' => ''//base_url().'user/activate/'.$user_id//the content to inject. Required
                                                                    ),
                                                                    array(
                                                                        'name' => 'NAME',//the name of the mc:edit editable region to inject into. Required
                                                                        'content' => ''//$result[0]->vis_firstName//the content to inject. Required
                                                                    )
                                                                )
                                                            )
                                                        ),
                                    'tags' => array('password-resets'),//a single tag - must not start with an underscore. required
                                    'subaccount' => 'mvb_visitors',//the unique id of a subaccount for this message - must already exist or will fail with an error
                                    'google_analytics_domains' => array(),//an array of strings indicating for which any matching URLs will automatically have Google Analytics parameters appended to their query string automatically.
                                    'google_analytics_campaign' => null,//optional string indicating the value to set for the utm_campaign tracking parameter. If this isn't provided the email's from address will be used instead.
                                    'metadata' => array(),//metadata an associative array of user metadata. Mandrill will store this metadata and make it available for retrieval. In addition, you can select up to 10 metadata fields to index and make searchable using the Mandrill search api.
                                    'recipient_metadata' => array(
                                        array(
                                            'rcpt' => $customer_email,//the email address of the recipient that the metadata is associated with
                                            'values' => array('user_id' => '')//an associated array containing the recipient's unique metadata. If a key exists in both the per-recipient metadata and the global metadata, the per-recipient metadata will be used.
                                        )
                                    ),
                                    'attachments' => array(
                            //            array(
                            //                'type' => 'text/plain',//the MIME type of the attachment
                            //                'name' => 'myfile.txt',//the file name of the attachment
                            //                'content' => 'ZXhhbXBsZSBmaWxl'
                            //            )
                                    ),
                                    'images' => array(
                            //            array(
                            //                'type' => 'image/png',
                            //                'name' => 'IMAGECID',
                            //                'content' => 'ZXhhbXBsZSBmaWxl'
                            //            )
                                    )
                                );
                    $async = false;//enable a background sending mode that is optimized for bulk sending. In async mode, messages/send will immediately return a status of "queued" for every recipient. To handle rejections when sending in async mode, set up a webhook for the 'reject' event. Defaults to false for messages with no more than 10 recipients; messages with more than 10 recipients are always sent asynchronously, regardless of the value of async.
                    $ip_pool = 'Main Pool';//the name of the dedicated ip pool that should be used to send the message. If you do not have any dedicated IPs, this parameter has no effect. If you specify a pool that does not exist, your default pool will be used instead.
                    $send_at = null;//when this message should be sent as a UTC timestamp in YYYY-MM-DD HH:MM:SS format. If you specify a time in the past, the message will be sent immediately. An additional fee applies for scheduled email, and this feature is only available to accounts with a positive balance.
                    $result = $mandrill->messages->send($message, $async, $ip_pool, $send_at);
                    
                    return $result;
                } 
                catch(Mandrill_Error $e) 
                {
                    // Mandrill errors are thrown as exceptions
                    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
                    // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
                    throw $e;
                }
	}



}

