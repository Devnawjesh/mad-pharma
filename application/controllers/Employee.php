<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('user_model');
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
    public function Create(){
        if($this->session->userdata('user_login_access') != False) {
        $this->load->view('backend/Add_Employee');
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }
    public function GetEmployeeById(){
        if($this->session->userdata('user_login_access') != False) {
        $id= $this->input->get('id');
        $data= array();
        $data['employee'] = $this->user_model->GetEmployeeValueById($id);
        echo json_encode($data);
        }
        else{
            redirect(base_url() , 'refresh');
        }        
    }
    public function View(){
        $data['userList'] = $this->user_model->getAllUser();
        $this->load->view('backend/List_employee',$data);
    }
    public function Save(){
        $id = $this->input->post('emid');
        $name = $this->input->post('emname');
        $emid = 'U'.rand(100,500);        
        $phone = $this->input->post('emphone');
        $email = $this->input->post('ememail');
        $address = $this->input->post('emaddress');
        $password = $this->input->post('passone');
        $confirm = $this->input->post('passtwo');
        $role = $this->input->post('emroll');
        $status = $this->input->post('emstatus');
        $note = $this->input->post('emnote');
        $entrydate = date("d/m/Y");
        $this->load->library('image_lib');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('emname', 'name', 'trim|required|min_length[5]|max_length[150]|xss_clean');
        $this->form_validation->set_rules('emphone', 'phone', 'trim|required|min_length[10]|max_length[13]|xss_clean');
        $this->form_validation->set_rules('ememail', 'email', 'trim|required|min_length[7]|max_length[150]|xss_clean');
        $this->form_validation->set_rules('emaddress', 'address', 'trim|required|min_length[5]|max_length[256]|xss_clean');
        if($this->form_validation->run() == FALSE){
		    $response['status'] = 'error';
            $response['message'] = validation_errors();
            $this->output->set_output(json_encode($response));
        } else {
           if($this->login_model->Does_email_exists($email) && $password == $confirm){
            $response['status'] = 'error';
            $response['message'] = "Email is already exist";
            $this->output->set_output(json_encode($response));
            } else {
            
         if($_FILES['img_url']['name']){
            $file_name = $_FILES['img_url']['name'];
			$fileSize = $_FILES["img_url"]["size"]/1024;
			$fileType = $_FILES["img_url"]["type"];
			$new_file_name='';
            $new_file_name .= $emid;

            $config = array(
                'file_name' => $new_file_name,
                'upload_path' => "./assets/images/users",
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => False,
                'max_size' => "20240000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "4000",
                'max_width' => "4000"
            );
    
            $this->load->library('Upload', $config);
            $this->upload->initialize($config);                
            if (!$this->upload->do_upload('img_url')) {
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
              'width'           =>  160,
              'height'          =>  100,
            );
            $this->image_lib->clear();
            $this->image_lib->initialize($configer);
            $this->image_lib->resize();                 
                $path = $this->upload->data();
                $img_url = $path['file_name'];
                $data = array();
                $data = array(
                    'em_id' => $emid,
                    'em_name' => $name,
                    'email' => $email,
                    'password' => sha1($password),
                    'em_role' => $role,
                    'em_contact' => $phone,
                    'em_address' => $address,
					'em_image'=>$img_url,
					'em_details'=>$note,
					'em_entrydate'=>strtotime($entrydate),
					'em_ip'=>$this->input->ip_address(),
					'status'=>$status
                );
        $success = $this->user_model->Add_user_info($data);
        $response['status'] = 'success';    
        $response['message'] = "Successfully Added";
        $response['curl'] = base_url()."Employee/View"; 
        $this->output->set_output(json_encode($response)); 
            }
        } else {
                $data = array();
                $data = array(
                    'em_id' => $emid,
                    'em_name' => $name,
                    'email' => $email,
                    'password' => sha1($password),
                    'em_role' => $role,
                    'em_contact' => $phone,
                    'em_address' => $address,
					'em_details'=>$note,
					'em_entrydate'=>strtotime($entrydate),
					'em_ip'=>$this->input->ip_address(),
					'status'=>$status
                );
        $success = $this->user_model->Add_user_info($data);
        $response['status'] = 'success';    
        $response['message'] = "Successfully Created";
        $response['curl'] = base_url(). "Employee/View"; 
        $this->output->set_output(json_encode($response));     
            }
                    
        }
        }
    }
    public function Update(){
        $id = $this->input->post('eid');
        $name = $this->input->post('emname');       
        $phone = $this->input->post('emphone');
        $email = $this->input->post('ememail');
        $address = $this->input->post('emaddress');
        $role = $this->input->post('emroll');
        $status = $this->input->post('emstatus');
        $note = $this->input->post('emnote');
        $this->load->library('image_lib');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('emname', 'name', 'trim|required|min_length[5]|max_length[150]|xss_clean');
        $this->form_validation->set_rules('emphone', 'phone', 'trim|required|min_length[10]|max_length[13]|xss_clean');
        $this->form_validation->set_rules('ememail', 'email', 'trim|required|min_length[7]|max_length[150]|xss_clean');
        $this->form_validation->set_rules('emaddress', 'address', 'trim|required|min_length[5]|max_length[256]|xss_clean');
        if($this->form_validation->run() == FALSE){
		    $response['status'] = 'error';
            $response['message'] = validation_errors();
            $this->output->set_output(json_encode($response));
        } else {
         if($_FILES['img_url']['name']){
            $file_name = $_FILES['img_url']['name'];
			$fileSize = $_FILES["img_url"]["size"]/1024;
			$fileType = $_FILES["img_url"]["type"];
			$new_file_name='';
            $new_file_name .= $id;

            $config = array(
                'file_name' => $new_file_name,
                'upload_path' => "./assets/images/users",
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => False,
                'max_size' => "20240000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "4000",
                'max_width' => "4000"
            );
    
            $this->load->library('Upload', $config);
            $this->upload->initialize($config);                
            if (!$this->upload->do_upload('img_url')) {
            $response['status'] = 'error';
            $response['message'] = $this->upload->display_errors();
            $this->output->set_output(json_encode($response));                
			}
			else {
                $image = $this->user_model->GetEmployeeValueById($id);
            $checkimage = "./assets/images/users/$image->em_image";                 
                if(!empty($image->em_image)){
            	unlink($checkimage);
				} 
            $image_data =   $this->upload->data();
            $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  $image_data['full_path'],
              //'create_thumb'    => TRUE,    
              'maintain_ratio'  =>  TRUE,
              'width'           =>  160,
              'height'          =>  100,
            );
            $this->image_lib->clear();
            $this->image_lib->initialize($configer);
            $this->image_lib->resize();                 
                $path = $this->upload->data();
                $img_url = $path['file_name'];
                $data = array();
                $data = array(
                    'em_name' => $name,
                    'email' => $email,
                    'em_role' => $role,
                    'em_contact' => $phone,
                    'em_address' => $address,
					'em_image'=>$img_url,
					'em_details'=>$note,
					'em_ip'=>$this->input->ip_address(),
					'status'=>$status
                );
        $success = $this->user_model->Update_user_info($id,$data);
        $response['status'] = 'success';    
        $response['message'] = "Successfully Added";
        $response['curl'] = base_url()."Employee/View"; 
        $this->output->set_output(json_encode($response)); 
            }
        } else {
                $data = array();
                $data = array(
                    'em_name' => $name,
                    'email' => $email,
                    'em_role' => $role,
                    'em_contact' => $phone,
                    'em_address' => $address,
					'em_details'=>$note,
					'em_ip'=>$this->input->ip_address(),
					'status'=>$status
                );
        $success = $this->user_model->Update_user_info($id,$data);
        $response['status'] = 'success';    
        $response['message'] = "Successfully Created";
        $response['curl'] = base_url(). "Employee/View"; 
        $this->output->set_output(json_encode($response));     
            }
        }
    }
    public function Reset_Password(){
        if($this->session->userdata('user_login_access') != False) {
        $id = $this->input->post('emid');
        $onep = $this->input->post('new1');
        $twop = $this->input->post('new2');
            if($onep == $twop){
                $data = array();
                $data = array(
                    'password'=> sha1($onep)
                );
        $success = $this->user_model->Reset_Password($id,$data);
        #$this->session->set_flashdata('feedback','Successfully Updated');
        #redirect("employee/view?I=" .base64_encode($id));
        $response['status'] = 'success';   
        $response['message'] = "Successfully Updated";
        $response['curl'] = base_url(). "dashboard/Dashboard";         
        $this->output->set_output(json_encode($response));  
            } else {
        $response['status'] = 'error';   
        $response['message'] = "Please enter valid password";
                
        $this->output->set_output(json_encode($response));  
            }

        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }    
}