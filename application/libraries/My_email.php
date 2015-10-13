<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Email extends CI_Email {

     var $CI;
     var $_mail;
     
     function __construct()
     {
        parent::__construct();
        $CI =& get_instance(); 
     }
     
     function config($data){
        $this->_mail=array(
            "from_sender"       => "votrunghieu007@gmail.com",
            "name_sender"       => "Trung tâm hỗ trợ khách hàng sagohano",
            "subject_sender"    => "Email kich hoat",
        );

        if(isset($data['subject_sender'])){
            $this->_mail['subject_sender'] = $data['subject_sender'];
        }
        $this->_mail['to_receiver'] = $data['to_receiver'];        
        $this->_mail['message'] = $data['message'];
     }
     
     function sendmail(){
            $config['protocol']    = 'smtp';
            $config['smtp_host']    = 'ssl://smtp.gmail.com';
            $config['smtp_port']    = '465';
            $config['smtp_timeout'] = '7';
            //$config['smtp_user']    = 'toitenlong@gmail.com'; // địa chỉ gmail
            //$config['smtp_pass']    = '024918263'; // pass gmail
            $config['smtp_user']    = 'votrunghieu007@gmail.com'; // địa chỉ gmail
            $config['smtp_pass']    = 'tramitrunghieu100891'; // pass gmail
            $config['charset']    = 'utf-8';
            $config['newline']    = "\r\n";
            $config['mailtype'] = 'html';
            $config['validation'] = TRUE;
            $this->initialize($config);
            $this->from($this->_mail['from_sender'], $this->_mail['name_sender']);
            $this->to($this->_mail['to_receiver']); 
        
            $this->subject($this->_mail['subject_sender']);
            $this->message($this->_mail['message']);
            $this->send();
    }
	
	public function config_shop($data){
		 $this->_mail=array(
            "from_sender"       => $data['from_sender'],
            "name_sender"       => $data['name_sender'],
            "subject_sender"    => $data['name_sender'],
			"smtp_user"			=> $data['smtp_user'],
			"smtp_pass"			=> $data['smtp_pass']
        );
        $this->_mail['to_receiver'] = $data['to_receiver'];        
        $this->_mail['message'] = $data['message'];
	}
	
	public function sendmail_shop(){
		$config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = $this->_mail['smtp_user']; // địa chỉ gmail
        $config['smtp_pass']    = $this->_mail['smtp_pass']; // pass gmail
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html';
        $config['validation'] = TRUE;
        $this->initialize($config);
        $this->from($this->_mail['from_sender'], $this->_mail['name_sender']);
        $this->to($this->_mail['to_receiver']); 
        
        $this->subject($this->_mail['subject_sender']);
        $this->message($this->_mail['message']);
        $this->send();
	}
	
}
