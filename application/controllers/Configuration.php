<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuration extends CI_Controller {

	    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form','url'));
        $this->load->model('login_model');
        $this->load->model('configuration_model');
        $this->load->model('medicine_model');
        $this->load->model('user_model');
  
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
    public function Settings()
    {
        if($this->session->userdata('user_login_access') != False) {
        $data['settings']   = $this->configuration_model->getAllSettings();
        $this->load->view('backend/settings',$data);

        }
        else{
    		redirect(base_url() , 'refresh');
    	}            
    }

    public function Save()
    {
        $id       = $this->input->post('id');
        $company_name       = $this->input->post('CompanyName');
        $company_title      = $this->input->post('CompanyTitle');
        $company_contact    = $this->input->post('contact');
        $company_address    = $this->input->post('address');
        $email          = $this->input->post('email');
        $description        = $this->input->post('description');

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('companyName', 'Name', 'trim|min_length[1]|max_length[150]|xss_clean');
        $this->form_validation->set_rules('contact', 'phone', 'trim|xss_clean');
        if($this->form_validation->run() == FALSE){
            $this->session->set_userdata('message', 'Error');
            redirect(base_url().'configuration/settings');
        }else{
            if ($_FILES['img_url']['name']) {
                $fileName = $_FILES['img_url']['name'];
                $fileSize    = $_FILES["img_url"]["size"]/1024;
                $fileType    = $_FILES["img_url"]["type"];

                $config = array(
                    'file_name'     => $fileName,
                    'upload_path' => "./assets/images",
                    'allowed_types' => "gif|jpg|png|jpeg",
                    'overwrite' => False,
                    'max_size' => "40480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                    'max_height' => "1200",
                    'max_width' => "1200"
                );
                $this->load->library('Upload', $config);
                $this->upload->initialize($config); 

            if (!$this->upload->do_upload('img_url')) 
            {
                $error = array('error' => $this->upload->display_errors());
                echo $error;exit();
                $this->session->set_flashdata('message','Update Successfully'); 
                redirect(base_url().'configuration/settings','refresh');   
            }else{
                $path = $this->upload->data();
                $logo_image = $path['file_name'];
                $data = array();
                $data = array(
                    'id'            => $id,
                    'name'          => $company_name,
                    'sitetitle'     => $company_title,
                    'contact'       => $company_contact,
                    'address'       => $company_address,
                    'email'         => $email,
                    'description'   => $description,
                    'sitelogo'      => $logo_image,
                );
                $success = $this->configuration_model->Update_settings_info($id,$data);
                $this->session->set_flashdata('message','Update Successfully'); 
                redirect('configuration/settings');
                }
            }else{
                $data = array();
                $data = array(
                    'id'            => $id,
                    'name'          => $company_name,
                    'sitetitle'     => $company_title,
                    'contact'       => $company_contact,
                    'address'       => $company_address,
                    'email'         => $email,
                    'description'   => $description,
                );
                $success = $this->configuration_model->Update_settings_info($id,$data);
                $this->session->set_flashdata('message','Update Successfully'); 
                redirect('configuration/settings');
            }
        }   
    }
}