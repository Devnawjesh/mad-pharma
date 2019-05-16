<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Accounts extends CI_Controller {



	function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('user_model');
        $this->load->model('medicine_model');
        $this->load->model('customer_model');
        $this->load->model('user_model');
        $this->load->model('supplier_model');
        $this->load->model('sales_model');
    }

    public function index(){
    	if ($this->session->userdata('user_login_access') != 1) 
    		redirect(base_url('login'));
    	if ($this->session->userdata('user_login_access') == 1) 
    		$data = array();
    		redirect('dashboard/Dashboard');
    }
    

    public function Account(){
    	if ($this->session->userdata('user_login_access') != False) {
    		$this->load->view('backend/account');
    	}else{	
    		redirect(base_url());
    	}
    }
    public function Report(){
    	if ($this->session->userdata('user_login_access') != False) {
            $data['closing'] = $this->sales_model->GetAllClosingReport();
    		$this->load->view('backend/closing_report',$data);
    	}else{	
    		redirect(base_url());
    	}
    }
    

    public function Summary(){
    	if ($this->session->userdata('user_login_access') != False) {
    		$this->load->view('backend/summary');
    	}else{	
    		redirect(base_url());
    	}
    }
    

    public function Closing(){
        if ($this->session->userdata('user_login_access') != False) {
            date_default_timezone_set("Asia/Dhaka");
            $today = strtotime(date('m/d/Y'));
            $todays = date('m/d/Y');
            $data['todaysale'] = $this->sales_model->GetTotalTodaySales($today);
            $data['todaypurchase'] = $this->sales_model->GetTotalTodayPurchase($todays);
            $this->load->view('backend/closing',$data);
        }else{  
            redirect(base_url());
        }
    }
    

    public function Closing_report(){
        if ($this->session->userdata('user_login_access') != False) {
            $this->load->view('backend/closing_report');
        }else{  
            redirect(base_url());
        }
    }
    

    public function Tax(){
    	if ($this->session->userdata('user_login_access') != False) {
    		$this->load->view('backend/tax');
    	}else{	
    		redirect(base_url());
    	}
    }
    

    public function Bank(){
    	if ($this->session->userdata('user_login_access') != False) {
            $data['bankinfo'] = $this->user_model->Getbankinfowithsupplier();
    		$this->load->view('backend/bank',$data);
    	}else{	
    		redirect(base_url());
    	}
    }
    

    public function Payment(){
    	if ($this->session->userdata('user_login_access') != False) {
            $data['bankinfo'] = $this->user_model->Getbankinfowithsupplier();
    		$this->load->view('backend/payment',$data);
    	}else{	
    		redirect(base_url());
    	}
    }
    public function Save()
    {
        if($this->session->userdata('user_login_access') != False) {
            $ttype = $this->input->post('transection_type');
            //die($ttype);
            $transection = $this->input->post('transaction');
            $mtype = $this->input->post('mtype');
            $issudate = $this->input->post('issuedate');
            $details = $this->input->post('details');
            $cheque = $this->input->post('cheque');
            $bank = $this->input->post('bankid');
            $pamount = $this->input->post('pamount');
            $ramount = $this->input->post('ramount');
            if(!empty($pamount)){
                $amount = $pamount;
            }
            else{
                $amount = $ramount;
            }
            date_default_timezone_set("Asia/Dhaka");
            $entrydate  =   strtotime(date("Y/m/d"));
            $entry = $this->session->userdata('user_login_id');
             $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters();
                $data=array(
                    'transection_type'=> $ttype,
                    'transection_name'=> $transection,
                    'description'=> $details,
                    'mtype'=> $mtype,
                    'cheque'=> $cheque,
                    'issuedate'=> $issudate,
                    'bankid'=> $bank,
                    'amount'=> $amount,
                    'entry_id'=> $entry,
                    'date'=> $entrydate
                );
                $success = $this->user_model->insertPAYMENT($data);                
                if($this->db->affected_rows()){
                    if($ttype == 'Receipt'){
                $account = $this->user_model->GetAccountBalance();
                $id = $account->id;
                $accounts = $account->amount + $ramount;
                    $data = array(
                        'amount'   =>  $accounts
                    );
                $success = $this->user_model->UPDATE_ACCOUNT($id,$data);
                    $response['status'] = 'success';
                    $response['message'] = "Successfully Payment Receipt";
                    $response['curl'] = base_url()."Accounts/Payment";
                    $this->output->set_output(json_encode($response));                          
                    } elseif($ttype =='Payment'){
                $account = $this->user_model->GetAccountBalance();
                $id = $account->id;
                        //die($amount);
                $accounts = $account->amount - $pamount;
                        
                    $data = array(
                        'amount'=> $accounts
                    );
                $success = $this->user_model->UPDATE_ACCOUNT($id,$data); 
                    $response['status'] = 'success';
                    $response['message'] = "Successfully Payment Receipt";
                    $response['curl'] = base_url()."Accounts/Payment";
                    $this->output->set_output(json_encode($response));                          
                    }                  
                }

            //}
        }
        else{
            redirect(base_url() , 'refresh');
        } 
    }
    public function Save_Closing()
    {
        if($this->session->userdata('user_login_access') != False) {
            date_default_timezone_set("Asia/Dhaka");
            $entrydate  =   date("Y/m/d");
            $opening = $this->input->post('opening');
            $cashin = $this->input->post('cashin');
            $cashout = $this->input->post('cashout');
            $cashhand = $this->input->post('cashhand');
            $cbalance = $this->input->post('cbalance');
            $adjustment = $this->input->post('adjustment');
            $entryid = $this->session->userdata('user_login_id');
                    $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
            $this->form_validation->set_rules('opening','Opening Balance','trim|required|xss_clean');
            $this->form_validation->set_rules('cbalance','Closing Balance','trim|required|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $feedback['error'] = validation_errors();
                echo json_encode($feedback);
            } else {
                $data=array(
                    'date'=> $entrydate,
                    'opening_balance'=> $opening,
                    'cash_in'=> $cashin,
                    'cash_out'=> $cashout,
                    'cash_in_hand'=> $cashhand,
                    'closing_balance'=> $cbalance,
                    'adjustment'=> $adjustment,
                    'entry_id'=> $entryid
                );
                $success = $this->user_model->Save_Closing($data);
                if($this->db->affected_rows()){                   
                    $response['status'] = 'success';
                    $response['message'] = "Successfully Added";
                    $response['curl'] = base_url()."Accounts/Closing";
                    $this->output->set_output(json_encode($response));                    
                }

            }
        }
        else{
            redirect(base_url() , 'refresh');
        } 
    } 
    public function Save_BANK()
    {
        if($this->session->userdata('user_login_access') != False) {
            $bname = $this->input->post('bname');
            $aname = $this->input->post('aname');
            $anumber = $this->input->post('anumber');
            $branch = $this->input->post('branch');
            $this->load->library('image_lib');
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters();            
            $this->form_validation->set_rules('bname','Bank Name','trim|required|xss_clean');
            $this->form_validation->set_rules('aname','Account Name','trim|required|xss_clean');
            $this->form_validation->set_rules('anumber','Account Number','trim|required|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $response['status'] = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response)); 
            } else {
                if($_FILES['signature']['name']){
                $file_name = $_FILES['signature']['name'];
                $fileSize = $_FILES["signature"]["size"]/1024;
                $fileType = $_FILES["signature"]["type"];
                $new_file_name='';
                $new_file_name .= $aname;
                $config = array(
                'file_name' => $new_file_name,
                'upload_path' => "./assets/images/signature",
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => False,
                'max_size' => "40480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "1200",
                'max_width' => "1200"
                );
                $this->load->library('Upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('signature')) {
                    $response['status'] = 'error';
                    $response['message'] = $this->upload->display_errors();
                    $this->output->set_output(json_encode($response));
                }
                else {
            $image_data =   $this->upload->data();
            $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  $image_data['full_path'],
              //'create_thumb'    => TRUE,    
              'maintain_ratio'  =>  TRUE,
              'width'           =>  120,
              'height'          =>  80,
            );
            $this->image_lib->clear();
            $this->image_lib->initialize($configer);
            $this->image_lib->resize();                    
                    $path = $this->upload->data();
                    $img_url = $path['file_name'];
                    $data = array();
                    $data=array(
                    'bank_name'=> $bname,
                    'account_name'=> $aname,
                    'account_number'=> $anumber,
                    'branch'=> $branch,
                    'signature'=> $img_url
                    );
                    $success = $this->supplier_model->Save_BANK($data);                    
                    $response['status'] = 'success';
                    $response['message'] = "Successfully Created";
                    $response['curl'] = base_url()."accounts/bank";
                    $this->output->set_output(json_encode($response));
                }
                }
             else {                
                $data=array(
                    'bank_name'=> $bname,
                    'account_name'=> $aname,
                    'account_number'=> $anumber,
                    'branch'=> $branch
                );
                $success = $this->supplier_model->Save_BANK($data);                   
                    $response['status'] = 'success';
                    $response['message'] = "Successfully Added";
                    $response['curl'] = base_url()."accounts/bank";
                    $this->output->set_output(json_encode($response));                    
                }

            }
        }
        else{
            redirect(base_url() , 'refresh');
        } 
    } 

}