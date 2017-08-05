<?php

function getAccessRights($module_code)
{
		$CI =& get_instance();
	    $CI->load->model('user_management_model');

	    $r = $CI->user_management_model->getModuleId($module_code);	    

	    return $r;
}


function setSAActivityLogs($type="",$login_act="",$activity_details="")
{	
		$CI =& get_instance();

		if($type=='Login_activity')
		{
				 $CI->load->model('activity_logs_model');

	    		 $r = $CI->activity_logs_model->setLoginLogs($type,$login_act);	  
		}
		else
		{
				 $CI->load->model('activity_logs_model');

	    		 $r = $CI->activity_logs_model->setTransactionLogs($type,$login_act,$activity_details);
	    		 return $r;
		}	
}




?>
