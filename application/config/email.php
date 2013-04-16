<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');  
/* 
| ------------------------------------------------------------------- 
| EMAIL CONFING 
| ------------------------------------------------------------------- 
| Configuration of outgoing mail server. 
| */   
$config['protocol']='smtp';  
$config['smtp_host']='ssl://smtp.gmail.com';  
$config['smtp_port']='465';  
$config['smtp_timeout']='300';  
$config['smtp_user']='homehealthtracking@gmail.com';  
$config['smtp_pass']='hht_0929';  
$config['mailtype']='html';
$config['charset']='utf-8';  
$config['newline']="\r\n";  
  
/* End of file email.php */  
/* Location: ./system/application/config/email.php */ 