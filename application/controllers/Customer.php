<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Customer extends CI_Controller {



	    function __construct() {

        parent::__construct();

        $this->load->database();

        $this->load->model('login_model');

        $this->load->model('user_model');

        $this->load->model('medicine_model');

        $this->load->model('customer_model');

  

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

        $this->load->view('backend/Add_customer');

        }

    else{

		redirect(base_url() , 'refresh');

	}            

    }

   public function View(){

       if($this->session->userdata('user_login_access') != False) {

        $data['customerList'] = $this->customer_model->getAllCustomer();

        $this->load->view('backend/List_customer',$data);

        }

    else{

		redirect(base_url() , 'refresh');

	}       

    }

   public function Regular(){

       if($this->session->userdata('user_login_access') != False) {

        $data['RegulatList'] = $this->customer_model->getAllRCustomer();

        $this->load->view('backend/Regular_customer',$data);

        }

    else{

		redirect(base_url() , 'refresh');

	}            

    }

   public function Wholesale(){

       if($this->session->userdata('user_login_access') != False) {

        $data['wholesaleList'] = $this->customer_model->getAllWCustomer();

        $this->load->view('backend/Wholesale_customer',$data);

        }

    else{

		redirect(base_url() , 'refresh');

	}        

    }
    public function Save(){
        $name   =     $this->input->post('cname');
        $pname   =     $this->input->post('pname');
        $phone  =    $this->input->post('cphone');
        $cid    =      'C'.rand(100,1000000);        
        $batchno    =   rand(5000000,10000000);        
        $email  =    $this->input->post('cemail');
        $address =  $this->input->post('caddress');
        $group  =    $this->input->post('ctype');
        $tamount =  $this->input->post('tamount');
        $rdiscount= $this->input->post('rdiscount');
        $tdiscount = $this->input->post('tdiscount');
        $note =     $this->input->post('cnote');
        $entrydate = strtotime(date("m/d/Y"));
        $oldmail =  $this->customer_model->getEmailId($email);
         $this->load->library('image_lib');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('cname', 'name', 'trim|required|min_length[1]|max_length[150]|xss_clean');
        $this->form_validation->set_rules('cphone', 'phone', 'trim|xss_clean');

        if($this->form_validation->run() === FALSE){
		    $response['status']   = 'error';
            $response['message']  = validation_errors();
            $this->output->set_output(json_encode($response));

        } else {
            if($this->customer_model->Does_email_exists($email,$phone)){
            $response['status'] = 'error';
            $response['message'] = "Your Email Or Phone number already exist";
            $this->output->set_output(json_encode($response));
            } else {
         if($_FILES['img_url']['name']){
            $file_name   = $_FILES['img_url']['name'];
			$fileSize    = $_FILES["img_url"]["size"]/1024;
			$fileType    = $_FILES["img_url"]["type"];
			$new_file_name='';
            $new_file_name .= $cid;
            $config = array(
                'file_name' => $new_file_name,
                'upload_path' => "./assets/images/customer",
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => False,
                'max_size' => "40480000",
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
            $image_data =   $this->upload->data();
            $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  $image_data['full_path'],    
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
                    'c_id'      => $cid,
                    'c_name'    => $name,
                    'pharmacy_name'=> $pname,
                    'c_email'   => $email,
                    'c_type'    => $group,
                    'cus_contact' => $phone,
                    'c_address' => $address,
                    'regular_discount' => $rdiscount,
					'target_amount'=> $tamount,
					'target_discount'=> $tdiscount,
					'c_note'   => $note,
					'c_img'    => $img_url,
					'barcode'    => $batchno,
					'entrydate'=> $entrydate
                );
                $success = $this->customer_model->Add_customer_info($data);
                if($this->db->affected_rows()){
                $data = array();
                $data = array(
                    'customer_id' => $cid,
                    'total_balance' => 0,
                    'total_paid' => 0,
                    'total_due' => 0,
                );
                $success = $this->customer_model->Create_Customer_balance($data);
                    if($this->db->affected_rows()){
		              //load library
        		      $this->load->library('zend');
        		      //load in folder Zend
        		      $this->zend->load('Zend/Barcode');
        		      //generate barcode
                      $barcode = $batchno;
        		      $file = Zend_Barcode::draw('code128', 'image', array('text' => $barcode,'barHeight'=> 30), array());
                      $store_image = imagepng($file,"./assets/images/cbarcode/{$barcode}.png");                        
                $response['status'] = 'success';    
                $response['message'] = "Successfully Created";
                $response['curl'] = base_url()."Customer/Create"; 
                $this->output->set_output(json_encode($response));                       
                    }                     
                   
                }

            }
        } else {
                $data = array();
                $data = array(
                    'c_id' => $cid,
                    'c_name' => $name,
                    'pharmacy_name'=> $pname,
                    'c_email' => $email,
                    'c_type' => $group,
                    'cus_contact' => $phone,
                    'c_address' => $address,
                    'regular_discount' => $rdiscount,
					'target_amount'=>$tamount,
					'target_discount'=>$tdiscount,
                    'c_note'=> $note,
                    'barcode'    => $batchno,
					'entrydate'=> $entrydate
                );
                $success = $this->customer_model->Add_customer_info($data);
                if($this->db->affected_rows()){
                $data = array();
                $data = array(
                    'customer_id' => $cid,
                    'total_balance' => 0,
                    'total_paid' => 0,
                    'total_due' => 0,
                );
                    $success = $this->customer_model->Create_Customer_balance($data);
                    if($this->db->affected_rows()){
		              //load library
        		      $this->load->library('zend');
        		      //load in folder Zend
        		      $this->zend->load('Zend/Barcode');
        		      //generate barcode
                      $barcode = $batchno;
        		      $file = Zend_Barcode::draw('code128', 'image', array('text' => $barcode,'barHeight'=> 30), array());
                      $store_image = imagepng($file,"./assets/images/cbarcode/{$barcode}.png");                        
                $response['status'] = 'success';    
                $response['message'] = "Successfully Created";
                $response['curl'] = base_url()."Customer/Create"; 
                $this->output->set_output(json_encode($response));                       
                    }                      
                } 
            }
        }
        }
    }
    public function Save_Canvas(){
        $name   =     $this->input->post('cname');
        $pname   =     $this->input->post('pname');
        $phone  =    $this->input->post('cphone');
        $cid    =      'C'.rand(10000000,20000000);        
        $batchno    =   rand(3000000,4900000);        
        $email  =    $this->input->post('cemail');
        $address =  $this->input->post('caddress');
        $group  =    $this->input->post('ctype');
        $tamount =  $this->input->post('tamount');
        $rdiscount= $this->input->post('rdiscount');
        $tdiscount = $this->input->post('tdiscount');
        $note =     $this->input->post('cnote');
        $entrydate = strtotime(date("m/d/Y"));
        $oldmail =  $this->customer_model->getEmailId($email);
        $this->load->library('image_lib');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('cname', 'name', 'trim|required|min_length[1]|max_length[150]|xss_clean');
        $this->form_validation->set_rules('cphone', 'phone', 'trim|xss_clean');
        if($this->form_validation->run() == FALSE){
		    $response['status'] = 'error';
            $response['message'] = validation_errors();
            $this->output->set_output(json_encode($response));
        } else {
            if($this->customer_model->Does_email_exists($email,$phone)){
            $response['status'] = 'error';
            $response['message'] = "Your Email Or Phone number already exist";
            $this->output->set_output(json_encode($response));
            } else {            
        $img = $_POST['dataURL'];
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $fileData = base64_decode($img);
        $fileName = $cid.'.png';
        $fdata = file_put_contents("./assets/images/customer/$fileName", $fileData);                            
            $image_data =   $this->upload->data();
            $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  './assets/images/customer/$fileName',    
              'maintain_ratio'  =>  TRUE,
              'width'           =>  160,
              'height'          =>  100,
            );
            $this->image_lib->clear();
            $this->image_lib->initialize($configer);
            $this->image_lib->resize();
                
                $data = array();
                $data = array(
                    'c_id' => $cid,
                    'c_name' => $name,
                    'pharmacy_name'=> $pname,
                    'c_email' => $email,
                    'c_type' => $group,
                    'cus_contact' => $phone,
                    'c_address' => $address,
                    'regular_discount' => $rdiscount,
					'target_amount'=>$tamount,
					'target_discount'=>$tdiscount,
                    'c_img'    => $fileName,
                    'c_note'=> $note,
                    'barcode'    => $batchno,
					'entrydate'=> $entrydate
                );
                $success = $this->customer_model->Add_customer_info($data);
                if($this->db->affected_rows()){
                $data = array();
                $data = array(
                    'customer_id' => $cid,
                    'total_balance' => 0,
                    'total_paid' => 0,
                    'total_due' => 0,
                );
                    $success = $this->customer_model->Create_Customer_balance($data);
                    if($this->db->affected_rows()){
		              //load library
        		      $this->load->library('zend');
        		      //load in folder Zend
        		      $this->zend->load('Zend/Barcode');
        		      //generate barcode
                      $barcode = $batchno;
        		      $file = Zend_Barcode::draw('code128', 'image', array('text' => $barcode,'barHeight'=> 30), array());
                      $store_image = imagepng($file,"./assets/images/cbarcode/{$barcode}.png");                        
                $response['status'] = 'success';    
                $response['message'] = "Successfully Created";
                $response['curl'] = base_url()."Customer/Create"; 
                $this->output->set_output(json_encode($response));                       
                    }                      
                }
        }
        }

    }    
    public function Update(){
        $id     =       $this->input->post('cid');
        $name   =     $this->input->post('cname');
        $pname   =     $this->input->post('pname');
        $phone  =    $this->input->post('cphone');       
        $email  =    $this->input->post('cemail');
        $address =  $this->input->post('caddress');
        $group  =    $this->input->post('ctype');
        $tamount =  $this->input->post('tamount');
        $rdiscount= $this->input->post('rdiscount');
        $tdiscount = $this->input->post('tdiscount');
        $note =     $this->input->post('cnote');
        $entrydate = strtotime(date("m/d/Y"));
        $oldmail =  $this->customer_model->getEmailId($email);
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('cname', 'name', 'trim|required|min_length[1]|max_length[150]|xss_clean');
        $this->form_validation->set_rules('cphone', 'phone', 'trim|xss_clean');

        if($this->form_validation->run() === FALSE){
		    $response['status']   = 'error';
            $response['message']  = validation_errors();
            $this->output->set_output(json_encode($response));

        } else {
         if($_FILES['img_url']['name']){
            $file_name   = $_FILES['img_url']['name'];
			$fileSize    = $_FILES["img_url"]["size"]/1024;
			$fileType    = $_FILES["img_url"]["type"];
			$new_file_name='';
            $new_file_name .= $id;
            $config = array(
                'file_name' => $new_file_name,
                'upload_path' => "./assets/images/customer",
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => False,
                'max_size' => "40480000",
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
            $image = $this->customer_model->GetCustomerValueById($id);
            $checkimage = "./assets/images/customer/$image->c_img";                 
                if(!empty($image->c_img)){
            	unlink($checkimage);
				}                
                $path = $this->upload->data();
                $img_url = $path['file_name'];
                $udata = array();
                $udata = array(
                    'c_name'    => $name,
                    'pharmacy_name' => $pname,
                    'c_email'   => $email,
                    'c_type'    => $group,
                    'cus_contact' => $phone,
                    'c_address' => $address,
                    'regular_discount' => $rdiscount,
					'target_amount'=>$tamount,
					'target_discount'=>$tdiscount,
					'c_note'   => $note,
					'c_img'    => $img_url
                );
                $success = $this->customer_model->Update_customer_info($id,$udata); 
                $response['status'] = 'success';    
                $response['message'] = "Successfully Updated";
                $response['curl'] = base_url()."Customer/View"; 
                $this->output->set_output(json_encode($response));
                
            }
        } else {
                $udata = array();
                $udata = array(
                    'c_name'    => $name,
                    'pharmacy_name' => $pname,
                    'c_email'   => $email,
                    'c_type'    => $group,
                    'cus_contact' => $phone,
                    'c_address' => $address,
                    'regular_discount' => $rdiscount,
					'target_amount'=>$tamount,
					'target_discount'=>$tdiscount,
					'c_note'   => $note
                );
                $success = $this->customer_model->Update_customer_info($id,$udata); 
                $response['status'] = 'success';    
                $response['message'] = "Successfully Updated";
                $response['curl'] = base_url()."Customer/View"; 
                $this->output->set_output(json_encode($response));   
            }
        }
    }
    /*Get monthly income for regular customer*/
    public function GetCustomerMonthlyIncome(){
        $id =$this->input->get('id');
        if(!empty($id)){
        $date = date('Y-m');
        $balance = $this->customer_model->GetCustomerMonthlyIncome($id,$date);
        $dues = $this->customer_model->GetCustomerBalance($id);
        $targetbalance = $this->customer_model->GetCustomerIdValue($id);
        $total= 0 ;
        foreach($balance as $value){
           $total += $value->total_amount; 
        }
/*        echo date('F Y',strtotime('-1 month')).' : '.$total.' '."Target:".$targetbalance->target_amount.'   '."Discount:".$targetbalance->target_discount.'%';*/
                              echo"<div class='dues'>";
            if($dues->total_due > 0){ 
                                  echo"<h4 class='previous-due-header'><span class='previous-dues'>Previous Dues= </span> $dues->total_due TK</h4>";
            }
                              echo"</div>
                               <div class='borderc'>
                                   <h5 class='discount-info'><span>";echo date('F Y').' : '. "</span>$total Tk</h5>
                                   <h5 class='discount-info'><span>Target Amount:</span>$targetbalance->target_amount Tk</h5>
                                   <h5 class='discount-info'><span>Discount Applied:</span>";if($targetbalance->target_amount < $total){ echo $targetbalance->target_discount; } else {
                                      echo $targetbalance->regular_discount;
                                   } echo" %</h5>
                               </div>";            
        }
    }

    // Get Gagular Customer Data
    public function GetRegularById(){ 
        if($this->session->userdata('user_login_access') != False) {
        $id= $this->input->get('id');
        $data= array();
        $data['mvalue'] = $this->customer_model->GetRegularValueById($id);
        echo json_encode($data);
        }
        else{
            redirect(base_url() , 'refresh');
        }        
    }

    // Get Customer Data
    public function GetCustomerId(){ 
        if($this->session->userdata('user_login_access') != False) {
        $id= $this->input->get('id');
        $data['mvalue'] = $this->customer_model->GetCustomerValueForPOS($id);
        echo json_encode($data);
        }
        else{
            redirect(base_url() , 'refresh');
        }        
    }

    // Get Customer Data
    public function GetCustomerValueforPOS(){ 
        if($this->session->userdata('user_login_access') != False) {
        $id= $this->input->get('id');
        $data= array();
        $data['mvalue'] = $this->customer_model->GetCustomerValueForPOS($id);
        echo json_encode($data);
        }
        else{
            redirect(base_url() , 'refresh');
        }        
    }

    // Get Customer balance Data
    public function GetCustomerBalanceBYId(){ 
        if($this->session->userdata('user_login_access') != False) {
        $id= $this->input->get('id');
        $data= array();
        $data['mvalue'] = $this->customer_model->GetCustomerBALANCEValue($id);
        echo json_encode($data);
        }
        else{
            redirect(base_url() , 'refresh');
        }        
    }
    public function Balance(){
       if($this->session->userdata('user_login_access') != False) {

        $data['balancesheet'] = $this->customer_model->getAllCustomerBalance();

        $this->load->view('backend/customer_balance',$data);

        }

    else{

		redirect(base_url() , 'refresh');

	}  
    }
    public function GetBarcodeDom(){ 
        if($this->session->userdata('user_login_access') != False) {
		$cid= $this->input->get('id');
		$mvalue = $this->customer_model->GetCustomerValueForPOS($cid);
                $base = base_url();
		echo "<div class='modal-body'>
                <div id='printAr' class='text-center'>
                <p style='text-align:center;margin:2px 0 -10px 0;font-size:11px'><strong>$mvalue->c_name</strong></p>
                <div class='card-body'>
                <p class='chead' style='text-align:center'>$mvalue->cus_contact</p>
                <img class='' src='$base/assets/images/cbarcode/$mvalue->barcode.png' alt='Card image'>
                </div>
                </div>
            </div>";
        }
        else{
    		redirect(base_url() , 'refresh');
    	}
}
    public function Update_Balance(){
        if($this->session->userdata('user_login_access') != False) {
            $cid = $this->input->post('id');
            $total = $this->input->post('total');
            $paid = $this->input->post('paid');
            $due = $this->input->post('due');
            $pay = $this->input->post('pay');
            if($pay < 0){
                $response['status'] = 'error';
                $response['message'] = "Please Enter Valid Input";
                $this->output->set_output(json_encode($response));
            } else {
            $this->form_validation->set_rules('pay','Pay','trim|required|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $response['status'] = 'error';
                $response['message'] = validation_errors();
                $this->output->set_output(json_encode($response)); 
            } else {
                $tpaid = abs($paid + $pay);
                $tdue = abs($due - $pay);
                $data=array(
                    'customer_id'=> $cid,
                    'total_paid'=> $tpaid,
                    'total_due'=> $tdue
                );
                $success = $this->customer_model->Update_Balance($cid,$data);
                $response['status'] = 'success';    
                $response['message'] = "Successfully Balance Updated";
                $response['curl'] = base_url()."Customer/Balance"; 
                $this->output->set_output(json_encode($response));                 
            }
        }
        }
        else{
            redirect(base_url() , 'refresh');
        } 
    }
}