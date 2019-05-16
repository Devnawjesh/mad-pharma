<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Counter extends CI_Controller {
	    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('login_model');
    }
	public function index()
	{
		#Redirect to Admin dashboard after authentication
        if ($this->session->userdata('user_login_access') == 1)
           redirect(base_url() . 'dashboard');
            #$data=array();
            #$data['settingsvalue'] = $this->crud_model->GetSettingsValue();
			$this->load->view('backend/counter');
	}
	public function signIn(){	
	$response = array();
    //Recieving post input of email, password from request
    $email = $this->input->post('email');
    $password = sha1($this->input->post('password'));
    $counter = $this->input->post('counter');
	//$remember = $this->input->post('remember');
    date_default_timezone_set("Asia/Dhaka");
    $time = strtotime(date('Y-m-d H:i:s'));
        //echo $time;
	$this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
	$this->form_validation->set_rules('email', 'User Email', 'trim|xss_clean|required|min_length[7]');
	$this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|required|min_length[6]');
	$this->form_validation->set_rules('counter', 'Counter Number', 'trim|xss_clean|required');
	if($this->form_validation->run() == FALSE){
		$data['message'] = 'Email or password is invalid.';
		//$this->load->view('backend/login',$data);	
		//redirect(base_url(),'refresh');		
	}
	else{
        //Validating login
        $login_status = $this->validate_login($email, $password, $counter, $time);
        $response['login_status'] = $login_status;
        if ($login_status == 'success') {
                    $data = array(
                    'em_id' => $this->session->userdata('user_login_id'),
                    'date' => date("Y/m/d"),
                    'login' => $time,
                    'logout' => 0,
                    'counter' => $this->session->userdata('user_type'),
                    'status' => 1
                );
                $success = $this->login_model->Create_Login_Status($data);                   
        		setcookie('email',$email,time() + (86400 * 30));
        		setcookie('password',$this->input->post('password'),time() + (86400 * 30));
        		redirect(base_url() . 'login', 'refresh');
        }
		else{
			$data['message'] = 'Email or password is invalid.';
			$this->load->view('backend/login',$data);
            redirect(base_url(),'refresh');	

		}

	}

	}

    //Validating login from request

    function validate_login($email = '', $password = '',$counter='', $time='') {

        $credential = array('email' => $email, 'password' => $password,'status' => 'ACTIVE');

        // Checking login credential for admin
        $query =$this->login_model->getUser($credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            if($row->em_role =='SALESMAN'){
            $this->session->set_userdata('user_login_access', '1');
            $this->session->set_userdata('user_login_id', $row->em_id);
            $this->session->set_userdata('name', $row->em_name);
            $this->session->set_userdata('email', $row->email);
            $this->session->set_userdata('user_image', $row->em_image);
            $this->session->set_userdata('user_type', $row->em_role);
            $this->session->set_userdata('cnumber', $counter);
            $this->session->set_userdata('login_time', $time);    
            return 'success';
        } else {
                return 'false';
            }
        }
	}
function logout(){   
        if(!empty($this->session->userdata('login_time'))){
            $id =$this->session->userdata('user_login_id');
            $ltime =$this->session->userdata('login_time');
                date_default_timezone_set("Asia/Dhaka");
                    $data = array(
                    'logout' => strtotime(date('Y-m-d H:i:s')),
                    'status' => 0
                );            
        $success = $this->login_model->Update_Login_Status($ltime,$id,$data); 
            if($this->db->affected_rows()){
        $this->session->sess_destroy();
        $this->session->set_flashdata('feedback', 'logged_out');
        redirect(base_url()."Counter");
            }
        } else {
        $this->session->sess_destroy();
        $this->session->set_flashdata('feedback', 'logged_out');
        redirect(base_url()."Counter");
        }
       
    }
    /*User signup*/
	public function viewSignUp()
	{
    $data=array();
    $data['settingsvalue'] = $this->crud_model->GetSettingsValue();    
	$this->load->view('backend/signup',$data);	
	}

    /*Validating user signup form request*/
	public function User_SignUP(){
	$userid = 'U'.rand(0,499);/* Generate Random user id*/	
	$name = $this->input->post('name');		
	$email = $this->input->post('email');		
	$password = $this->input->post('password');		
	$confirm = $this->input->post('confirm_password');
	$ipaddress=$this->input->ip_address();
	$date = date("m/d/Y");
	$randcode = rand();
	if($password == $confirm){
        /*validating name field*/
		$this->form_validation->set_rules('name','Name','trim|required|min_length[5]|max_length[100]|xss_clean');
        /*Validating email field*/
		$this->form_validation->set_rules('email','Email','trim|required|min_length[7]|max_length[100]|xss_clean');
        /*validating pasword field*/
		$this->form_validation->set_rules('password','Password','trim|required|min_length[5]|max_length[100]|xss_clean');	
        if ($this->form_validation->run() == FALSE) {
            $data['message'] = validation_errors();
			$this->load->view('backend/signup',$data);
		} else {
		if ($this->login_model->Does_email_exists($email)) {
			$this->session->set_flashdata('feedback','Email already exits');
			redirect('login/viewSignUp');						
		}
		else {
			$data=array();
			$data=array(
			'user_id'=>$userid,
			'full_name'=>$name,
			'email'=>$email,
			'password'=>sha1($password),
			'ip_address'=>$ipaddress,
			'status' => 'INACTIVE',
			'confirm_code' => $randcode,
			'user_type' =>'User',
			'created_on' => $date
			);
		$success=$this->login_model->insertUser($data);
		$inserted = $this->db->insert_id();
			if($inserted){	
			$this->confirm_mail_send($email,$randcode);	
			$this->session->set_flashdata('feedback','Kindly check your email To confirm your account');
			 $this->load->view('backend/login');				
			} else {
			$this->session->set_flashdata('feedback','Something went wrong. Please try again');
			$this->load->view('backend/signup');				
			}
		}	
	}
	}	
	else {
	$data['message']="Passwords did not match!!";
	$this->load->view('backend/signup',$data);
	}
	}
	public function confirm_mail_send($email,$randcode){
		$config = Array( 
		'protocol' => 'smtp', 
		'smtp_host' => 'ssl://smtp.googlemail.com', 
		'smtp_port' => 465, 
		'smtp_user' => 'mail.imojenpay.com', 
		'smtp_pass' => ''
		); 		  
         $from_email = "imojenpay@imojenpay.com"; 
         $to_email = $email; 
         //Load email library 
         $this->load->library('email',$config); 
         $this->email->from($from_email, 'Dotdev'); 
         $this->email->to($to_email);
         $this->email->subject('Confirm Your Account'); 
		 $message	 =	"Confirm Your Account";
		 $message	.=	"Click Here : ".base_url()."login/verification_confirm?C=" . $randcode.'</br>'; 
         $this->email->message($message); 
         //Send mail 
         if($this->email->send()){ 
         	$this->session->set_flashdata('feedback','Kindly check your email To reset your password');
		 }
         else {
         $this->session->set_flashdata("feedback","Error in sending Email."); 
		 }			
	}
	public function verification_confirm(){
		$verifycode = $this->input->get('C');
		$userinfo = $this->login_model->GetuserInfoBycode($verifycode);
		if($userinfo){
    		$data = array();
    		$data = array(
    			'status'=>'ACTIVE',
				'confirm_code' => 0
    		);
    		$this->login_model->UpdateStatus($verifycode,$data);
    		if($this->db->affected_rows()){
			$this->session->set_flashdata('feedback','Your Account has been confirmed!! now login');
			$this->load->view('backend/login');
    		}			
		} else {
			$this->session->set_flashdata('feedback','Sorry your account has not been varified');
			$this->load->view('backend/login');  			
		}
	}

	public function forgotten_page(){
        $data=array();
        $data['settingsvalue'] = $this->crud_model->GetSettingsValue();
		$this->load->view('backend/forgot_password',$data);
	}

	public function forgot_password(){
		$email = $this->input->post('email');
		$checkemail = $this->login_model->Does_email_exists($email);
		if($checkemail){
			$randcode = md5(uniqid());
			$data=array();
			$data=array(
				'forgotten_code'=>$randcode
			);

			$updatedata = $this->login_model->UpdateKey($data,$email);
			$updateaffect = $this->db->affected_rows();
			$email=$this->input->post('email');	
			$this->send_mail($email,$randcode);
			$this->session->set_flashdata('feedback','Kindly check your email' .' '.$email. 'To reset your password');
			redirect('login/forgotten_page');				
		} 
		else {
			$this->session->set_flashdata('feedback','Please enter a valid email address!');
			redirect('login/forgotten_page');
		}
	}
      public function send_mail($email,$randcode) {
		$config = Array( 
		'protocol' => 'smtp', 
		'smtp_host' => 'ssl://smtp.googlemail.com', 
		'smtp_port' => 25, 
		'smtp_user' => 'mail.imojenpay.com', 
		'smtp_pass' => ''
		); 		  
         $from_email = "imojenpay@imojenpay.com"; 
         $to_email = $email; 
         //Load email library 
         $this->load->library('email',$config); 
         $this->email->from($from_email, 'Dotdev'); 
         $this->email->to($to_email);
         $this->email->subject('Reset your password!!Dotdev'); 
        $message	.=	"Your or someone request to reset your password" ."<br />";
		$message	.=	"Click  Here : ".base_url()."login/Reset_View?p=" . $randcode."<br />"; 
         $this->email->message($message); 
         //Send mail 
         if($this->email->send()){ 
         	$this->session->set_flashdata('feedback','Kindly check your email To reset your password');
		 }
         else {
         $this->session->set_flashdata("feedback","Error in sending Email."); 
		 }	
      }
	public function Reset_View(){
		$this->load->helper('form');
		$reset_key = $this->input->get('p');
		if($this->login_model->Does_Key_exists($reset_key)){
		$data['key']= $reset_key;
		$this->load->view('backend/reset_page',$data);
		} 
		else {
			$this->session->set_flashdata('feedback','Please enter a valid email address!');
			redirect('login/forgotten_page');
		}
	}

	public function Reset_password_validation(){
		$password = $this->input->post('password');
		$confirm = $this->input->post('confirm');
		$key = $this->input->post('reset_key');
		$userinfo = $this->login_model->GetUserInfo($key);
		if($password == $confirm){
			if($userinfo->password != sha1($password)){
			$data=array();
			$data = array(
				'forgotten_code'=> 0,
			    'password'=>sha1($password)
			    );
		$update = $this->login_model->UpdatePassword($key,$data);
		if($this->db->affected_rows()){
			$data['message'] = 'Successfully Updated your password!!';
		    $this->load->view('backend/login',$data);
		}
		} else {
         	$this->session->set_flashdata('feedback','You enter your old password.Please enter new password');
         	redirect('login/Reset_View?p='.$key);			
		}
		} else {
         	$this->session->set_flashdata('feedback','Password does not match');
         	redirect('login/Reset_View?p='.$key);
		}
	}

}