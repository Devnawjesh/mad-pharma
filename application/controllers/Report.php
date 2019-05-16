<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Report extends CI_Controller {



	    function __construct() {

        parent::__construct();

        $this->load->database();

        $this->load->model('login_model');

        $this->load->model('user_model');

        $this->load->model('medicine_model');

        $this->load->model('customer_model');

        $this->load->model('supplier_model');

        $this->load->model('invoice_model');

  

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

    public function Create(){

        if($this->session->userdata('user_login_access') != False) {
                $data = array();
                $data['customer'] = $this->invoice_model->getAllCustomer();
                $this->load->view('backend/invoice',$data);
            }
            else{

        		redirect(base_url() , 'refresh');
        	}            

        }

       public function View(){

           if($this->session->userdata('user_login_access') != False) {

            $data['supplierList'] = $this->supplier_model->getAllSupplier();

            $this->load->view('backend/List_supplier',$data);

            }

        else{

    		redirect(base_url() , 'refresh');

    	}       

    } 

    public function Save(){

        $id = $this->input->post('sid');

        $name = $this->input->post('sname');

        $phone = $this->input->post('sphone');

        $sid = 'S'.rand(100,25000);        

        $email = $this->input->post('semail');

        $address = $this->input->post('saddress');

        $note = $this->input->post('snote');

        $entrydate = date("m-d-Y");

        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters();

        $this->form_validation->set_rules('sname', 'name', 'trim|required|min_length[1]|max_length[150]|xss_clean');

        $this->form_validation->set_rules('sphone', 'phone', 'trim|xss_clean');

        if($this->form_validation->run() === FALSE){

		    $response['status'] = 'error';

            $response['message'] = validation_errors();

            $this->output->set_output(json_encode($response));

        } else {            

         if($_FILES['img_url']['name']){

            $file_name = $_FILES['img_url']['name'];

			$fileSize = $_FILES["img_url"]["size"]/1024;

			$fileType = $_FILES["img_url"]["type"];

			$new_file_name='';

            $new_file_name .= $sid;



            $config = array(

                'file_name' => $new_file_name,

                'upload_path' => "./assets/images/supplier",

                'allowed_types' => "gif|jpg|png|jpeg",

                'overwrite' => False,

                'max_size' => "40480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)

                'max_height' => "1200",

                'max_width' => "1200"

            );

    

            $this->load->library('Upload', $config);

            $this->upload->initialize($config);                

            if (!$this->upload->do_upload('img_url')) {

            $response['status'] = 'error';

            $response['message'] = $this->upload->display_errors();

            $this->output->set_output(json_encode($response));                

			}

			else {

                $path = $this->upload->data();

                $img_url = $path['file_name'];

                $data = array();

                $data = array(

                    's_id' => $sid,

                    's_name' => $name,

                    's_email' => $email,

                    's_phone' => $phone,

                    's_address' => $address,

                    's_img' => $img_url,

					's_note'=> $note,

					'entrydate'=> $entrydate

                );

        $success = $this->supplier_model->Add_Supplier_info($data);

        $response['status'] = 'success';    

        $response['message'] = "Successfully Created";

        $response['curl'] = base_url()."Supplier/View"; 

        $this->output->set_output(json_encode($response)); 

            }

        } else {

                $data = array();

                $data = array(

                    's_id' => $sid,

                    's_name' => $name,

                    's_email' => $email,

                    's_phone' => $phone,

                    's_address' => $address,

					's_note'=> $note,

					'entrydate'=> strtotime($entrydate)

                );

        $success = $this->supplier_model->Add_Supplier_info($data);

        $response['status'] = 'success';    

        $response['message'] = "Successfully Created";

        $response['curl'] = base_url(). "Supplier/View"; 

        $this->output->set_output(json_encode($response));     

            }

        }

    }

}