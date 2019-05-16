<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Invantory extends CI_Controller {



	    function __construct() {

        parent::__construct();

        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('user_model');
        $this->load->model('medicine_model');
        $this->load->model('medicine_model');
    }

	public function index()

	{

		#Redirect to Admin dashboard after authentication

		if ($this->session->userdata('user_login_access') != 1)

            redirect(base_url() . 'login', 'refresh');

        if ($this->session->userdata('user_login_access') == 1)

          $data= array();

        redirect('dashboard/Dashboard');

	} 

    public function Stock()
    {
        if($this->session->userdata('user_login_access') != False) {
        $data['stock'] = $this->medicine_model->GetStockVal();
        $this->load->view('backend/stock',$data);
            }
        else{
    		redirect(base_url() , 'refresh');
    	} 
    }
    public function Stock_short()
    {
        if($this->session->userdata('user_login_access') != False) {
        $data['sortstock'] = $this->medicine_model->Getshortproduct();
        $this->load->view('backend/Stock_short',$data);
            }
        else{
    		redirect(base_url() , 'refresh');
    	}            
    }
    public function Stock_out()
    {
        if($this->session->userdata('user_login_access') != False) {
        $data['stockout'] = $this->medicine_model->GetStockOutproduct();
        $this->load->view('backend/Stock_out',$data);
            }
        else{
    		redirect(base_url() , 'refresh');
    	}         
    }
    public function Stock_expire_soon()
    {
        if($this->session->userdata('user_login_access') != False) {
        $today = date("Y-m-d");
        $todaystr = strtotime(date("d/m/Y"));
        $onemonth = strtotime('3 month', $todaystr);
        $month = date("Y-m-d",$onemonth); 
            //die($month);
        $data['expiresoonmedicine'] = $this->medicine_model->GetStockExpiresoonproduct($today,$month);
        $this->load->view('backend/stock_expire_soon',$data);
        }
        else{
    		redirect(base_url() , 'refresh');
    	}     
    }
    public function Stock_expired()
    {
        if($this->session->userdata('user_login_access') != False) {
        $today = date("Y-m-d");
        $data['expired'] = $this->medicine_model->GetexpiredMedicine($today);    
        $this->load->view('backend/Stock_expired',$data);
        }
        else{
    		redirect(base_url() , 'refresh');
    	}            
    }

}