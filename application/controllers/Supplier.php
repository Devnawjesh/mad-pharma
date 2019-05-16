<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Supplier extends CI_Controller {



	    function __construct() {

        parent::__construct();

        $this->load->database();

        $this->load->model('login_model');

        $this->load->model('user_model');

        $this->load->model('medicine_model');

        $this->load->model('customer_model');

        $this->load->model('supplier_model');
        $this->load->model('purchase_model');
        $this->load->model('configuration_model');

  

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

        $this->load->view('backend/Add_supplier');

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

   public function Balance(){
       if($this->session->userdata('user_login_access') != False) {
        $data['balance'] = $this->supplier_model->getAllSupplierBalance();
        $this->load->view('backend/supplier_balance',$data);
        }
    else{
        redirect(base_url() , 'refresh');
    }       
    } 

    //delete 
    public function Delete(){
       $id      =  $this->input->get('id');
       $data['supplier']   = $this->supplier_model->DeleteSupplierID($id);
       echo "Successfully Deleted";
       redirect(base_url().'supplier/view','refresh');
    } 


    public function Save(){
        $name = $this->input->post('sname');
        $phone = $this->input->post('sphone');
        $sid = 'S'.rand(100,25000);
        $email = $this->input->post('semail');
        $address = $this->input->post('saddress');
        $note = $this->input->post('snote');
        $status = $this->input->post('status');
        $entrydate = date("m-d-Y");
        $this->load->library('image_lib');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('sname', 'name', 'trim|required|min_length[1]|max_length[150]|xss_clean');
        $this->form_validation->set_rules('sphone', 'phone', 'trim|xss_clean');
        if($this->form_validation->run() === FALSE){
            $response['status'] = 'error';
            $response['message'] = validation_errors();
            $this->output->set_output(json_encode($response));
        } else {
            if($this->supplier_model->Does_supplier_email_exists($email,$phone)){
            $response['status'] = 'error';
            $response['message'] = "Your Email Or Phone number is already exist";
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
                    's_id' => $sid,
                    's_name' => $name,
                    's_email' => $email,
                    's_phone' => $phone,
                    's_address' => $address,
                    's_img' => $img_url,
                    's_note'=> $note,
                    'status'=> $status,
                    'entrydate'=> $entrydate
                    );
                    $success = $this->supplier_model->Add_Supplier_info($data);
                    if($this->db->affected_rows()){
                    $data = array();
                    $data = array(
                    'supplier_id' => $sid,
                    'total_amount' => 0,
                    'total_paid' => 0,
                    'total_due' => 0
                );
                    $success = $this->supplier_model->Create_Supplier_balance($data);                    
                    $response['status'] = 'success';
                    $response['message'] = "Successfully Created";
                    $response['curl'] = base_url()."Supplier/Create";
                    $this->output->set_output(json_encode($response));
                }
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
                    'status'=> $status,    
                    'entrydate'=> strtotime($entrydate)
                    );
                    $success = $this->supplier_model->Add_Supplier_info($data);
                    if($this->db->affected_rows()){
                    $data = array();
                    $data = array(
                    'supplier_id' => $sid,
                    'total_amount' => 0,
                    'total_paid' => 0,
                    'total_due' => 0
                );
                    $success = $this->supplier_model->Create_Supplier_balance($data);                       
                    $response['status'] = 'success';
                    $response['message'] = "Successfully Created";
                    $response['curl'] = base_url(). "Supplier/Create";
                    $this->output->set_output(json_encode($response));
            }
        }
    }
    }
    }
    public function Save_Canvas(){
        $name = $this->input->post('sname');
        $phone = $this->input->post('sphone');
        $sid = 'S'.rand(26000,55000);
        $email = $this->input->post('semail');
        $address = $this->input->post('saddress');
        $note = $this->input->post('snote');
        $status = $this->input->post('status');
        date_default_timezone_set("Asia/Dhaka");
        $entrydate = date("m-d-Y");
        $this->load->library('image_lib');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('sname', 'name', 'trim|required|min_length[1]|max_length[150]|xss_clean');
        $this->form_validation->set_rules('sphone', 'phone', 'trim|xss_clean');
        if($this->form_validation->run() === FALSE){
            $response['status'] = 'error';
            $response['message'] = validation_errors();
            $this->output->set_output(json_encode($response));
        } else {
            if($this->supplier_model->Does_supplier_email_exists($email,$phone)){
            $response['status'] = 'error';
            $response['message'] = "Your Email Or Phone number is already exist";
            $this->output->set_output(json_encode($response));
            } else {             
        $img = $_POST['dataURL'];
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $fileData = base64_decode($img);
        $fileName = $sid.'.png';
        $fdata = file_put_contents("./assets/images/supplier/$fileName", $fileData);                            
            $image_data =   $this->upload->data();
            $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  './assets/images/supplier/$fileName',    
              'maintain_ratio'  =>  TRUE,
              'width'           =>  160,
              'height'          =>  100,
            );
            $this->image_lib->clear();
            $this->image_lib->initialize($configer);
            $this->image_lib->resize();    
                    $data = array();
                    $data = array(
                    's_id' => $sid,
                    's_name' => $name,
                    's_email' => $email,
                    's_phone' => $phone,
                    's_address' => $address,
                    's_img' => $fileName,
                    's_note'=> $note,
                    'status'=> $status,
                    'entrydate'=> $entrydate
                    );
                    $success = $this->supplier_model->Add_Supplier_info($data);
                    if($this->db->affected_rows()){
                    $data = array();
                    $data = array(
                    'supplier_id' => $sid,
                    'total_amount' => 0,
                    'total_paid' => 0,
                    'total_due' => 0
                );
                    $success = $this->supplier_model->Create_Supplier_balance($data);                    
                    $response['status'] = 'success';
                    $response['message'] = "Successfully Created";
                    $response['curl'] = base_url()."Supplier/Create";
                    $this->output->set_output(json_encode($response));
                }
        }
        }

    }     
    public function Update(){
        $id = $this->input->post('sid');
        $name = $this->input->post('sname');
        $phone = $this->input->post('sphone');
        $email = $this->input->post('semail');
        $address = $this->input->post('saddress');
        $note = $this->input->post('snote');
        $status = $this->input->post('status');
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
                $new_file_name .= $id;
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
            $image = $this->supplier_model->GetSupplierValueById($id);
            $checkimage = "./assets/images/supplier/$image->s_img";                 
                if(!empty($image->s_img)){
            	unlink($checkimage);
				}                    
                    $path = $this->upload->data();
                    $img_url = $path['file_name'];
                    $data = array();
                    $data = array(
                    's_name' => $name,
                    's_email' => $email,
                    's_phone' => $phone,
                    's_address' => $address,
                    's_img' => $img_url,
                    's_note'=> $note,
                    'status'=> $status
                    );
                    $success = $this->supplier_model->Update_Supplier_info($id,$data);
                    $response['status'] = 'success';
                    $response['message'] = "Successfully Updated";
                    $response['curl'] = base_url()."Supplier/View";
                    $this->output->set_output(json_encode($response));
                }
            } else {
                    $data = array();
                    $data = array(
                    's_name' => $name,
                    's_email' => $email,
                    's_phone' => $phone,
                    's_address' => $address,
                    's_note'=> $note,
                    'status'=> $status
                    );
                    $success = $this->supplier_model->Update_Supplier_info($id,$data);
                    $response['status'] = 'success';
                    $response['message'] = "Successfully Updated";
                    $response['curl'] = base_url()."Supplier/View";
                    $this->output->set_output(json_encode($response));
            }
    }
    }
    public function Save_Bill(){
        $sid = $this->input->post('sid');
        $sname = $this->input->post('sname');
        $pid = $this->input->post('pid');
        $mtype    =   $this->input->post('mtype');
        $bankid    =   $this->input->post('bankid');
        $cheque    =   $this->input->post('cheque');
        $issuedate    =   $this->input->post('issuedate');
        $rname    =   $this->input->post('rname');
        $rcontact    =   $this->input->post('rcontact');
        $paydate    =   $this->input->post('paydate');
        $paid =  round($this->input->post('pay'));  
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('pay', 'Payment', 'trim|required|xss_clean');
        if($this->form_validation->run() === FALSE){
            echo validation_errors();
        } else {
                $supplierbalance = $this->supplier_model->Getsupplierbalance($sid);
                $due = $supplierbalance->total_due - abs($paid);
                $paids = $supplierbalance->total_paid + abs($paid);
                $data = array();
                $data = array(
                    'total_paid' => $paids,
                    'total_due' => $due
                );
                $success = $this->supplier_model->update_Supplier_balance($sid,$data); 
                $data = array();
                $data = array(
                    'supp_id' => $sid,
                    'pur_id' => $pid,
                    'type' => $mtype,
                    'bank_id' => $bankid,
                    'cheque_no' => $cheque,
                    'issue_date' => $issuedate,
                    'receiver_name' => $rname,
                    'receiver_contact' => $rcontact,
                    'date' => $paydate,
                    'paid_amount' => abs($paid)
                );
                $success = $this->purchase_model->Insert_Supplier_amount($data);
            $supplierpurchase = $this->supplier_model->GETSUPPLIERPURCHASEBALANCE($pid);
            $dues = $supplierpurchase->due_amount - abs($paid);
            $paids = $supplierpurchase->paid_amount + abs($paid);
                $data = array();
                $data = array(
                    'paid_amount' => abs($paids),
                    'due_amount' => $dues
                );
            $success = $this->purchase_model->Update_Supplier_PayHistory($pid,$data); 
            if($this->db->affected_rows()){
                /*Main Account Update*/
                $account = $this->user_model->GetAccountBalance();
                $id = $account->id;
                $amount = $account->amount - $paid;
                    $data = array(
                        'amount' => $amount
                    );
                $success = $this->user_model->UPDATE_ACCOUNT($id,$data); 
                /*Main Account Update end*/
                $settings   = $this->configuration_model->getAllSettings();
                $paccount   = $this->supplier_model->GETSUPPLIERPURCHASEBALANCE($pid);
                $pinvoice   = $this->supplier_model->GetSupplierPaymentValueById($pid);
                echo "<div class='row'>
                    <div class='col-md-12'>
                        <div class='card card-body printableArea' id='printableArea'>
                            <h5>INVOICE <span class='pull-right text-muted'>#$pinvoice->invoice_no</span></h5>
                            <hr>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <div class='pull-left'>
                                        <address>
                                            <h3> &nbsp;<b class='text-muted'>$settings->name</b></h3>
                                            <p class='text-muted m-l-5'>$settings->address</p>
                                        </address>
                                    </div>
                                    <div class='pull-right text-right'>
                                        <address>
                                            <h3 class='text-muted'>To,</h3>
                                            <h5 class='text-muted'>$pinvoice->s_name</h5>
                                            <p class='text-muted m-l-10'>$pinvoice->s_address,
                                                <br> $pinvoice->s_email,
                                                <br> $pinvoice->s_phone</p>
                                            <p class='text-muted m-t-5'><b>Invoice Date :</b> <i class='fa fa-calendar'></i> $paydate</p>
                                        </address>
                                    </div>
                                </div>
                                <div class='col-md-12'>
                                    <div class='table-responsive m-t-10' style='clear: both;'>
                                        <table class='table table-hover'>
                                            <thead>              
                                                <tr>
                                                    <th class='text-center'>Receiver Name</th>
                                                    <th>Receiver Contact</th>
                                                    <th class='text-right'>Paid Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody><tr>
                                                    <td class='text-center'>$rname</td>
                                                    <td>$rcontact</td>
                                                    <td class='text-right'>$paid </td>
                                                </tr>
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class='col-md-12'>
                                    <div class='clearfix'></div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";
            }
    }
    }

    //Supplier id
    public function GetSupplierById()
    {
        $id= $this->input->get('id');
        $data= array();
        $data['mvalue'] = $this->supplier_model->GetSupplierValueById($id);
        echo json_encode($data);
    }

    //Supplier id
    public function GetsupplierBalanceBYID()
    {
        $id= $this->input->get('id');
        $data= array();
        $data['mvalue'] = $this->supplier_model->GetSupplierPaymentValueById($id);
        echo json_encode($data);
    }

    //Supplier id
    public function Dues()
    {
        $id= base64_decode($this->input->get('D'));
        $data = array();
        $data['bankinfo'] = $this->user_model->Getbankinfowithsupplier(); 
        $data['duesvalue'] = $this->supplier_model->GetSupplierDuesValueById($id);
        $this->load->view('backend/supplier_dues',$data);
    }

    //Supplier id
    public function Invoice()
    {
        $id= base64_decode($this->input->get('I'));
        $data = array(); 
        $data['duesvalue'] = $this->supplier_model->GetSupplierInvoiceValueById($id);
        $this->load->view('backend/supplier_invoice',$data);
    }

    //All Medicine By Supplier id
    public function Medicine_View()
    {
        $id= $this->input->get('S');
        $data = array(); 
        $data['allSupplier'] = $this->supplier_model->GetSupplierMBySID($id);
        $this->load->view('backend/medicine_view',$data);
    }
    public function GetSupplierInvoice(){
        $pid= $this->input->get('id');
        $settings   = $this->configuration_model->getAllSettings();
                /*$paccount   = $this->supplier_model->GETSUPPLIERPURCHASEBALANCE($pid);*/
                $pinvoice   = $this->supplier_model->GetSupplierPaymentValueById($pid);
                $allpayment   = $this->supplier_model->GetSupplierAllPayment($pid);
                echo "<div class='row'>
                    <div class='col-md-12'>
                        <div class='card card-body printableArea' id='printableArea'>
                            <h5>INVOICE <span class='pull-right text-muted'>#$pinvoice->invoice_no</span></h5>
                            <hr>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <div class='pull-left'>
                                        <address>
                                            <h3> &nbsp;<b class='text-muted'>$settings->name</b></h3>
                                            <p class='text-muted m-l-5'>$settings->address</p>
                                        </address>
                                    </div>
                                    <div class='pull-right text-right'>
                                        <address>
                                            <h3 class='text-muted'>To,</h3>
                                            <h5 class='text-muted'>$pinvoice->s_name</h5>
                                            <p class='text-muted m-l-10'>$pinvoice->s_address,
                                                <br> $pinvoice->s_email,
                                                <br> $pinvoice->s_phone</p>
                                            <p class='text-muted m-t-5'><b>Invoice Date :</b> <i class='fa fa-calendar'></i> $pinvoice->date</p>
                                        </address>
                                    </div>
                                </div>
                                <div class='col-md-12'>
                                    <div class='table-responsive m-t-10' style='clear: both;'>
                                        <table class='table table-hover'>
                                            <thead>              
                                                <tr>
                                                    <th class='text-center'>Receiver Name</th>
                                                    <th>Receiver Contact</th>
                                                    <th class='text-right'>Paid Amount</th>
                                                    <th class='text-right'>Payment Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>";
                                        foreach($allpayment as $value){
                                                echo "<tr>
                                                    <td>$value->receiver_name</td>
                                                    <td>$value->receiver_contact</td>
                                                    <td>$value->paid_amount </td>
                                                    <td>$value->date </td>
                                                </tr>";
                                            }
                                                echo"</tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class='col-md-12 m-t-10'>
                                    <div class='clearfix'>
                                    <div class='col-md-4'>
                                    <div id='signaturename'>
                                        Signature:
                                    </div>

                                    <div id='signature'>
                                    </div>
                                    </div>
                                    <div class='col-md-8'>
                                    </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";
        
    }

}