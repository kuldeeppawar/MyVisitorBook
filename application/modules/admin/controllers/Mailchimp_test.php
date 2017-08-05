<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Mailchimp_test extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        
        $this->load->database();
       
        $this->load->helper('url');
        $this->load->library('session');
        
    }
    
    // ==================== all page session check =====================
    public function Checklogin()
    {
        //echo "12";        
    }
    public function test(){
        $this->Checklogin();
        $this->sendsmsAPI3('8866422197','MyVBok','Content data','MyVBokxml03','MyVBokxml03');
        //$this->sendsmsAPI3();
    }

    //$count="",$sender="",$msg="",$un="",$pass=""

    public function sendsmsAPI3($count="",$sender="",$msg="",$un="",$pass="")
    {
                        $random_number=rand(100000,999999);

                        echo "first instance ->".$random_number;

                        echo "<br>";


                        $flash = 0; // 0 for normal sms and 1 for flash sms
                        $unicode = 2; //do not change this value --> 0 for text and 1 for binary value
        
                            
                        $sendmsg = str_replace("&","&amp;",$msg);
                        $sendmsg = str_replace("\n"," &#x0A;",$sendmsg);

                        $xmlstring = '<?xml version=\"1.0\" encoding=\"utf-8\" ?>
                                        <data>';

                        $xmlstring.='<user>
                                        <name>'.$un.'</name>
                                        <password>'.$pass.'</password>
                                        <from>'.$sender.'</from>
                                        <to>'.$count.'</to>
                                        <text>'.$msg.'</text> 
                                        <coding>0</coding>
                                    </user>';

                        $xmlstring .='</data>';

                        
                        // $url = 'http://49.50.67.32/nxmlapi/xmlsmsapi.jsp';
                       
                        // $objURL = curl_init($url);
                        // curl_setopt($objURL, CURLOPT_HTTPHEADER,"content-type: application/xml");
                        // curl_setopt($objURL, CURLOPT_RETURNTRANSFER, 1); 
                        // curl_setopt($objURL, CURLOPT_POST,1);
                        // curl_setopt($objURL, CURLOPT_POSTFIELDS,$xmlstring);
                        // $retval = trim(curl_exec($objURL));

                        // curl_close($objURL);    
                        // $xml = new SimpleXMLElement($retval); 
                        

                        // foreach($xml->msgid as $msg_id)
                        // {
                        //            echo $msg_id; 
                        // }


                        echo "second instance ->".$random_number;

                        echo "<br>";


                        // echo "<pre>";
                        // print_r($xml);
    }



    public function checkSmsXmlLogin()
    {
                $branch_balance=25000;

                $total_visitor_count=30000;//count($postData['selectSearchName'])/10000;      //eg- 30000

                $final_total_visitor_counter=4;//ceil($total_visitor_count)+1;            //eg - 4 

                $total_sms_char_length=170;//strlen(sms_string);                            //eg - 170

                if($total_sms_char_length<=160)
                {
                        $sms_count=1;
                        $total_sms_to_send=30000*$sms_count;//count($postData['selectSearchName'])*$sms_count;

                        if($branch_balance>=$total_sms_to_send)
                        {
                                $no_of_visitors=30000;//count($postData['selectSearchName']);   
                        }
                        else
                        {
                                $no_of_visitors=$total_sms_to_send/$sms_count;  
                        }
                }
                else
                {
                        $sms_count=ceil($total_sms_char_length/160);              //eg - 2

                        $total_sms_to_send=30000*$sms_count;//count($postData['selectSearchName'])*$sms_count; 
                        //eg - 30000*2 = 60000 

                        if($branch_balance>=$total_sms_to_send)                          //eg - 25000>=60000
                        {
                                $no_of_visitors=30000;//count($postData['selectSearchName']);                                //
                        }
                        else
                        {
                                $no_of_visitors=$branch_balance/$sms_count;   
                                //eg - 25000/2 = 12500            
                        }   
                }

               
                $counter=0;
                $limit_counter=10000;


                for($k=0;$k<$final_total_visitor_counter;$k++)
                {
                        for(;$counter<$limit_counter;$counter++)
                        {
                                   if($counter<=$no_of_visitors)
                                   {
                                            echo $counter." -> sms sent";

                                            echo "<br>";
                                   }
                                   else
                                   {
                                            echo $counter." -> sms not sent due to insufficient balance";

                                            echo "<br>";
                                   }
                        }


                        echo "Limit Counter - ".$limit_counter;

                        echo "<br>";

                        echo "Counter - ".$counter;


                        if($limit_counter>=30000)//count($postData['selectSearchName'])
                        {
                                $limit_counter=30000;//count($postData['selectSearchName']);
                        }   
                        else
                        {
                                $limit_counter+=10000;                   
                        }
                }  

                exit;      
    }

            
    
}

