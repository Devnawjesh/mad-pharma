<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Purchase extends CI_Controller {
	    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('purchase_model');
        $this->load->model('supplier_model');
        $this->load->model('medicine_model');
        $this->load->model('configuration_model');
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

    public function Create(){ 
         if($this->session->userdata('user_login_access') != False) {
        $data = array();
        $data['supplierList'] = $this->supplier_model->getAllSupplier();
        $data['bankinfo'] = $this->user_model->Getbankinfowithsupplier();     
        $this->load->view('backend/Add_purchase',$data);
        }
    else{
		redirect(base_url() , 'refresh');
	}             

    }
    public function GetSupplierByid(){
            $midbatch = $_POST['search'];
               if(empty($midbatch)){
                   die();
               }
               $this->purchase_model->GetSuppIDbatch($midbatch);
    }
    public function GetPurchaseparam(){
if ($this->session->userdata('user_login_access') != False) {
        $param = $_GET['param'];
        $purval = $this->purchase_model->GetPurchaseparam($param);
        echo json_encode($purval);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    public function medicinebysupplierId(){
        if ($this->session->userdata('user_login_access') != False) {
            $id          = $this->input->get('id');
            $medicine    = $this->medicine_model->getSupplierMedicine($id);
            foreach ($medicine as $value) {
                echo "<tr>
                            <td>
                            <input type='hidden' class='form-control medicine' id='medicine' name='medicine[]' placeholder='Ounce' readonly value='$value->product_id'>
                            <input type='text' class='form-control' placeholder='Ounce' name='mname[]' readonly value='$value->product_name.($value->strength)'>
                            </td>
                            <td><input type='text' class='form-control' name='gname[]' placeholder='Ounce' readonly value='$value->generic_name'></td>
                            <td><input type='text' class='form-control' name='model[]' placeholder='Ounce' readonly value='$value->form'></td>
                            <td><input type='text' class='form-control datepicker' name='expiredate[]' value='$value->expire_date' id='datepicker' required></td>
                            <td><input type='text' class='form-control' name='stock[]' placeholder='0.00' readonly value='$value->instock'></td>                            
                            <td><input type='text' class='form-control qty' name='qty[]' placeholder='0.00' value='' required></td>                                                          
                            <td><input type='text' class='form-control tradeprice' name='tradeprice[]' placeholder='0.00' value='$value->trade_price'></td>
                            <td><input type='text' class='form-control mrp' name='mrp[]' placeholder='0.00' value='$value->mrp'></td>
                            <td><input type='text' class='form-control wholesaler' name='wholesaler[]' placeholder='0.00' value='$value->w_discount'></td>
                            <td><input type='text' class='form-control total' name='total[]' placeholder='0.00' value='0'></td>
                            <td><input type='hidden' class='form-control tdiscount' name='tdiscount[]' placeholder='0.00'  value='0'></td>
                    </tr>";
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    public function medicineInfoByMedicineID(){
        $id= $this->input->get('id');
        $data = array();
        $data['medicinevalue'] = $this->medicine_model->getMedicineBymedicineId($id);
        echo json_encode($data);
    }
    public function purchase(){
        if ($this->session->userdata('user_login_access') != False) {
        $data = array();
        $data['Purchase'] = $this->purchase_model->getPurchaseInfo();        
        $this->load->view('backend/purchase',$data);
        } else {
            redirect(base_url(), 'refresh');
        }        
    }
    public function Purchase_Review(){
        $supplier   =   $this->input->post('supplier');
        $invoice    =   $this->input->post('invoice');
        $entrydate  =   $this->input->post('entrydate');
        $details    =   $this->input->post('details');
        $mtype    =   $this->input->post('mtype');
        $bankid    =   $this->input->post('bankid');
        if(!empty($bankid)){
            $bankname = $this->purchase_model->GetBankName($bankid);
        }
        $bankinfo = $this->user_model->Getbankinfowithsupplier();
        $cheque    =   $this->input->post('cheque');
        $issuedate    =   $this->input->post('issuedate');
        $rname    =   $this->input->post('rname');
        $rcontact    =   $this->input->post('rcontact');
        $paydate    =   $this->input->post('paydate');
        /*$tdiscount  =   round($this->input->post('tdiscount'));*/
        $grandamount =  round($this->input->post('grandamount'));
        $paid =  round($this->input->post('paid'));
        $due =  round($this->input->post('due'));
        $invoiceid    = $this->purchase_model->GePurchaseInvoice($invoice);
        if(!empty($invoiceid)){
            echo "This Invoice is Already exist";
            die();
        }
        $date       =   strtotime(date('m/d/Y'));
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('supplier', 'Supplier', 'trim|required|xss_clean');
        $this->form_validation->set_rules('qty[]', 'Quantity', 'trim|xss_clean');
       $supplierval = $this->supplier_model->GetSupplierValueById($supplier);
        if($this->form_validation->run() == FALSE){
		    $response['status'] = 'error';
            $response['message'] = validation_errors();
            $this->output->set_output($response);
        } else {
                echo " 
                                        <div class='row'>
                                            <div class='col-md-3'>
                                                <div class='form-group' style='margin-bottom: 15px'>
                                                <label class='control-label'>Company</label>
                                                <input type='hidden' class='form-control supplier' id='supplier' name='supplier' placeholder='Supplier' readonly value='$supplier'>
                                                <input type='text' class='form-control' style='border: 1px solid rgba(222, 218, 218, 0.15);' placeholder='Ounce' name='' readonly value='$supplierval->s_name'>                                                
                                                </div>
                                            </div>
                                            <div class='col-md-3'>
                                                <div class='form-group' style='margin-bottom: 15px'>
                                                    <label class='control-label'>Invoice No</label>
                                                    <input type='number' style='border: 1px solid rgba(222, 218, 218, 0.15);' id='firstName' name='invoice' class='form-control' placeholder='Invoice No' value='$invoice' required='1'>
                                                </div>
                                            </div>                                            
                                            <div class='col-md-2'>
                                                <div class='form-group' style='margin-bottom: 15px'>
                                                    <label class='control-label'>Date</label>
                                                    <input type='text' style='border: 1px solid rgba(222, 218, 218, 0.15);' id='datepicker' class='form-control datepicker' placeholder='' name='entrydate' required value='$entrydate'>
                                                </div>
                                            </div>
                                            <div class='col-md-4'>
                                                <div class='form-group' style='margin-bottom: 15px'>
                                                    <label class='control-label'>Note</label>
                                                    <input type='text' style='border: 1px solid rgba(222, 218, 218, 0.15);' name='details' class='form-control' placeholder='Details' value='$details'>
                                                </div>
                                            </div>
                                        </div>
                <table class='table table-bordered m-t-10 pos_table purchase'>
                    <thead>
                        <tr>
                            <th style='width: 144px;'>Medicine Name </th>
                            <th>G.Name</th>
                            <th>Form</th>
                            <th>Expiry Date</th>
                            <th>Quantity</th>
                            <th>Trade Price</th>
                            <th>M.R.P.</th>
                            <th>W.Discount</th>
                            <th>Total Amount</th>
                            <th>Barcode(Qty)</th>
                        </tr>
                    </thead>
                    <tbody id='addPurchaseItem'>";            
            
                foreach($_POST['qty'] as $row=>$name){
                if(!empty($_POST['qty'][$row])){
                $medicine   =   $_POST['medicine'][$row];
                $mname   =   $_POST['mname'][$row];
                $qty        =   $_POST['qty'][$row];
                $modal   =   $_POST['model'][$row];
                $instock    =   $_POST['stock'][$row];
                $tradeprice =   $_POST['tradeprice'][$row];
                $mrp        =   $_POST['mrp'][$row];
                $wholesaller=   $_POST['wholesaler'][$row];
                /*$discount   =   $_POST['discount'][$row];*/
                $total      =   $_POST['total'][$row];
                $expire     =   $_POST['expiredate'][$row];
                $gname     =   $_POST['gname'][$row];
                $medicineval    = $this->medicine_model->getMedicineBymedicineId($medicine);    
                echo "<tr>
                            <td><input type='hidden' class='form-control medicine' id='medicine' name='medicine[]' placeholder='Ounce' readonly value='$medicine'>
                            <input type='text' class='form-control' placeholder='Ounce' readonly value='$mname'>
                            </td>
                            <td><input type='text' class='form-control' name='gname[]' placeholder='Ounce' readonly value='$gname'></td>
                            <td><input type='text' class='form-control' name='modal[]' placeholder='Ounce' readonly value='$modal'></td>
                            <td><input type='text' class='form-control datepicker' name='expiredate[]' value='$expire' id='datepicker' required>
                            <input type='hidden' class='form-control' name='stock[]' placeholder='0.00' readonly value='$instock' >
                            </td>                            
                            <td><input type='text' class='form-control qtyval' name='qty[]' placeholder='0.00' value='$qty' autocomplete='off' required></td>                                                          
                            <td><input type='text' class='form-control tardepriceval' name='tradeprice[]' placeholder='0.00' value='$tradeprice'></td>
                            <td><input type='text' class='form-control mrpval' name='mrp[]' placeholder='0.00' value='$mrp'></td>
                            <td><input type='text' class='form-control wholesaler' name='wholesaler[]' placeholder='0.00' value='$wholesaller' required></td>
                            <td><input type='text' class='form-control totalval' name='totalval[]' placeholder='0.00' value='$total'></td>
                            <td><input type='text' class='form-control' name='barqty[]' placeholder='0.00' value='' autocomplete='off' required></td>
                    </tr>";
                    }
                } 
            echo "</tbody>
                        <tfood>
                            <tr>
                                    
                                    <td class='text-right font-weight-bold' colspan=8>Grand Total:</td>
                                    <td><input type='text' class='form-control gtotalval' name='grandamount' placeholder='0.00' readonly value='$grandamount'></td>
                                    <td></td>
                            </tr>
                            <tr>
                                                <td class='text-right font-weight-bold' colspan=8>Total Paid:</td>

                                                <td><input type='text' class='form-control rpaid' name='paid' placeholder='0.00' value='$paid'></td>
                                                
                                            </tr>
                                            <tr>
                                                <td class='text-right font-weight-bold' colspan=8>Total Due:</td>

                                                <td><input type='text' class='form-control rdue' name='due' placeholder='0.00' readonly='' value='$due'></td>
                                                
                                            </tr>
                                            <tr id='payform'>
                                                <td colspan=2><select name='mtype' id='mtype' class='form-control'>
                                                            <option value='$mtype'>$mtype</option>
                                                            
                                                        </select>
                                            <input type='hidden' class='form-control mtype' id='mtype' name='mtype' placeholder='Supplier' readonly value='$mtype'>
                                                        </td>";
                                                if(!empty($bankid)){
                                                echo"<td id='bankid' colspan=2><select class='select2 form-control' name='bankid' style='width:100%' >
                                                           <option value='$bankname->bank_id'>$bankname->bank_name</option>";
                                                            foreach($bankinfo as $value){
                                                                echo"<option value='$value->bank_id'>$value->bank_name</option>";
                                                            }
                                                        echo"</select></td>
                                                
                                                <td id='cheque'><input type='text' name='cheque'  class='form-control' placeholder='Cheque No...' value='$cheque'></td>
                                                <td id='issuedate'><input type='text' name='issuedate'  class='form-control datepicker' placeholder='Issue Date' value='$issuedate'></td>";
                                                }
                                                echo"<td><input type='text' name='rname' id='rname' class='form-control' placeholder='Receiver Name' value='$rname'></td> 
                                                <td><input type='text' name='rcontact' id='rcontact' class='form-control' placeholder='Receiver Contact' value='$rcontact'></td>
                                                <td><input type='text' name='paydate' class='form-control datepicker' placeholder='Pay Date' value='$paydate'></td> 
                                                        
                                                
                                            </tr>                            
                        </tfood>            
            </table>";
        }
    }
    public function Save_Purchase(){
        $purid      =   'P'.rand(2000,10000000);
        $supplier   =   $this->input->post('supplier');
        $invoice    =   $this->input->post('invoice');
        $entrydate  =   strtotime($this->input->post('entrydate'));
        $details    =   $this->input->post('details');
        date_default_timezone_set("Asia/Dhaka");
        $date       =   strtotime(date('m/d/Y'));
        $mtype    =   $this->input->post('mtype');
        $bankid    =   $this->input->post('bankid');
        $entryid = $this->session->userdata('user_login_id');
        if(!empty($bankid)){
         $bankname = $this->purchase_model->GetBankName($bankid);
        }
        $bankinfo = $this->user_model->Getbankinfowithsupplier();
        $cheque    =   $this->input->post('cheque');
        $issuedate    =   $this->input->post('issuedate');
        $rname    =   $this->input->post('rname');
        $rcontact    =   $this->input->post('rcontact');
        $paydate    =   $this->input->post('paydate');
        /*$tdiscount  =   round($this->input->post('tdiscount'));*/
        $grandamount =  round($this->input->post('grandamount'));
        $paid =  round($this->input->post('paid'));
        $duev =  round(abs($this->input->post('due')));       
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('supplier', 'Supplier', 'trim|required|xss_clean');
        $this->form_validation->set_rules('qty[]', 'Quantity', 'trim|xss_clean');
        $this->form_validation->set_rules('invoice', 'Invoice', 'trim|required|xss_clean');
        $checksameinvoice = $this->purchase_model->GePurchaseInvoice($invoice);
        if(!empty($checksameinvoice)){
            echo "This Invoice is Already exist";
            die();
        }
        if($this->form_validation->run() == FALSE){
		    $response['status'] = 'error';
            $response['message'] = validation_errors();
            $this->output->set_output(json_encode($response));
        } else {
                $data = array();
                $data = array(
                    'p_id' => $purid,
                    'sid' => $supplier,
                    'invoice_no' => $invoice,
                    'pur_date' => $entrydate,
                    'pur_details' => $details,
                    /*'total_discount' => $tdiscount,*/
                    'gtotal_amount' => $grandamount,
                    'entry_date' => $date,
                    'entry_id' => $entryid
                ); 
            $success = $this->purchase_model->Save_Purchase($data);
            if($this->db->affected_rows()){
                /*Root Accounts Start*/
                $account = $this->user_model->GetAccountBalance();
                $id = $account->id;
                $amount = $account->amount - $paid;
                    $data = array(
                        'amount'   =>  $amount
                    );
                $success = $this->user_model->UPDATE_ACCOUNT($id,$data); 
                /*Root Accounts end*/
                
                $supplierbalance = $this->supplier_model->Getsupplierbalance($supplier);
                $total = $supplierbalance->total_amount + $grandamount; 
                $due = $supplierbalance->total_due + $duev;
                $paids = $supplierbalance->total_paid + $paid;
                $data = array();
                $data = array(
                    'total_amount' => $total,
                    'total_paid' => $paids,
                    'total_due' => $due
                );
                $success = $this->supplier_model->update_Supplier_balance($supplier,$data); 
                $data = array();
                $data = array(
                    'supp_id' => $supplier,
                    'pur_id' => $purid,
                    'type' => $mtype,
                    'bank_id' => $bankid,
                    'cheque_no' => $cheque,
                    'issue_date' => $issuedate,
                    'receiver_name' => $rname,
                    'receiver_contact' => $rcontact,
                    'date' => $paydate,
                    'paid_amount' => $paid
                );
                $success = $this->purchase_model->Insert_Supplier_amount($data);
                $data = array();
                $data = array(
                    'supplier_id' => $supplier,
                    'pur_id' => $purid,
                    'date' => $paydate,
                    'total_amount' => $grandamount,
                    'paid_amount' => $paid,
                    'due_amount' => $duev
                );
                $success = $this->purchase_model->Insert_Supplier_PayHistory($data);                 
                foreach($_POST['qty'] as $row=>$name){
                if(!empty($_POST['qty'][$row])){
                $medicine   =   $_POST['medicine'][$row];
                $qty        =   $_POST['qty'][$row];
                $tradeprice =   $_POST['tradeprice'][$row];
                $mrp        =   $_POST['mrp'][$row];
                /*$discount   =   $_POST['discount'][$row];*/
                $total      =   $_POST['totalval'][$row];
                $expire     =   strtotime($_POST['expiredate'][$row]);                    
                    $data = array(
                        'pur_id'   =>  $purid,
                        'mid'      =>  $medicine,
                        'supp_id'      =>$supplier,
                        'qty'      =>  $qty,
                        'supplier_price'=>$tradeprice,
                        /*'discount'   =>  $discount,*/
                        'expire_date'   =>  $expire,
                        'total_amount'  =>  $total
                    );
                $success = $this->purchase_model->Save_Purchase_History($data);
                    }
                }                
                foreach($_POST['qty'] as $row=>$name){
                if(!empty($_POST['qty'][$row])){
                $medicine   =   $_POST['medicine'][$row];
                $qty        =   $_POST['qty'][$row];
                $mrp        =   $_POST['mrp'][$row];
                $wholesaller=   $_POST['wholesaler'][$row];
                $expire     =   $_POST['expiredate'][$row];     
                //$medicinestock = $this->purchase_model->getMedicineStock($medicine);
                //$instock = $medicinestock->instock + $qty;
                $medicinestock = $this->purchase_model->getmedicineByMId($medicine);
                $instock = $medicinestock->instock + $qty;
                    if(empty($wholesaller)){
                        $wholesaller = $medicinestock->w_discount; 
                    }
                   
                    $data = array(
                        'product_id'   =>  $medicine,
                        'instock'      =>  $instock,
                        'mrp'           =>  $mrp,
                        'w_discount'    =>  $wholesaller,
                        'expire_date'   =>  $expire
                    );
                $success = $this->purchase_model->Update_Medicine($medicine,$data);
                }
                   
                }
            $response['status'] = 'success';
            $response['message'] = "Successfully Added";
            $response['curl'] = base_url()."Purchase/Create";
            $this->output->set_output(json_encode($response)); 
            }
        }
    }
    public function Save_Purchase_Invoice(){
        $purid      =   'P'.rand(2000,10000000);
        $supplier   =   $this->input->post('supplier');
        $invoice    =   $this->input->post('invoice');
        $createdate  =   $this->input->post('entrydate');
        $entrydate  =   strtotime($this->input->post('entrydate'));
        $details    =   $this->input->post('details');
         date_default_timezone_set("Asia/Dhaka");
        $date       =   strtotime(date('m/d/Y'));
        $mtype    =   $this->input->post('mtype');
        $bankid    =   $this->input->post('bankid');
        $entryid = $this->session->userdata('user_login_id');
        if(!empty($bankid)){
            $bankname = $this->purchase_model->GetBankName($bankid);
        }
        $bankinfo = $this->user_model->Getbankinfowithsupplier();
        $cheque    =   $this->input->post('cheque');
        $issuedate    =   $this->input->post('issuedate');
        $rname    =   $this->input->post('rname');
        $rcontact    =   $this->input->post('rcontact');
        $paydate    =   $this->input->post('paydate');
        /*$tdiscount  =   round($this->input->post('tdiscount'));*/
        $grandamount =  round($this->input->post('grandamount'));
        $paid =  round($this->input->post('paid'));
        $duev =  round(abs($this->input->post('due')));         
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('supplier', 'Supplier', 'trim|required|xss_clean');
        $this->form_validation->set_rules('qty[]', 'Quantity', 'trim|xss_clean');
        $this->form_validation->set_rules('invoice', 'Invoice', 'trim|required|xss_clean');
        $checksameinvoice = $this->purchase_model->GePurchaseInvoice($invoice);
        if(!empty($checksameinvoice)){
            echo "This Invoice is Already exist";
            die();
        }
        if($this->form_validation->run() == FALSE){
            echo validation_errors();
        } else {
                $supplierbalance = $this->supplier_model->Getsupplierbalance($supplier);
                $total = $supplierbalance->total_amount + $grandamount; 
                $due = $supplierbalance->total_due + $duev;
                $paids = $supplierbalance->total_paid + $paid;
                $data = array();
                $data = array(
                    'total_amount' => $total,
                    'total_paid' => $paids,
                    'total_due' => $due
                );
                $success = $this->supplier_model->update_Supplier_balance($supplier,$data);             
                $data = array();
                $data = array(
                    'p_id' => $purid,
                    'sid' => $supplier,
                    'invoice_no' => $invoice,
                    'pur_date' => $entrydate,
                    'pur_details' => $details,
                    /*'total_discount' => $tdiscount,*/
                    'gtotal_amount' => $grandamount,
                    'entry_date' => $date,
                    'entry_id' => $entryid
                ); 
            $success = $this->purchase_model->Save_Purchase($data);
                $data = array();
                $data = array(
                    'supp_id' => $supplier,
                    'pur_id' => $purid,
                    'type' => $mtype,
                    'bank_id' => $bankid,
                    'cheque_no' => $cheque,
                    'issue_date' => $issuedate,
                    'receiver_name' => $rname,
                    'receiver_contact' => $rcontact,
                    'date' => $paydate,
                    'paid_amount' => $paid
                );
                $success = $this->purchase_model->Insert_Supplier_amount($data);
                $data = array();
                $data = array(
                    'supplier_id' => $supplier,
                    'pur_id' => $purid,
                    'date' => $paydate,
                    'total_amount' => $grandamount,
                    'paid_amount' => $paid,
                    'due_amount' => $duev
                );
                $success = $this->purchase_model->Insert_Supplier_PayHistory($data);             
            if($this->db->affected_rows()){
                /*Root Accounts Start*/
                $account = $this->user_model->GetAccountBalance();
                $id = $account->id;
                $amount = $account->amount - $paid;
                    $data = array(
                        'amount'   =>  $amount
                    );
                $success = $this->user_model->UPDATE_ACCOUNT($id,$data); 
                /*Root Accounts end*/                
                foreach($_POST['qty'] as $row=>$name){
                    if(!empty($_POST['qty'][$row])){
                $medicine   =   $_POST['medicine'][$row];
                $qty        =   $_POST['qty'][$row];
                $tradeprice =   $_POST['tradeprice'][$row];
                $mrp        =   $_POST['mrp'][$row];
                /*$discount   =   $_POST['discount'][$row];*/
                $total      =   $_POST['totalval'][$row];
                $expire     =   strtotime($_POST['expiredate'][$row]);                    
                    $data = array(
                        'pur_id'   =>  $purid,
                        'mid'      =>  $medicine,
                        'supp_id'      =>$supplier,
                        'qty'      =>  $qty,
                        'supplier_price'=>$tradeprice,
                        /*'discount'   =>  $discount,*/
                        'expire_date'   =>  $expire,
                        'total_amount'  =>  $total
                    );
                $success = $this->purchase_model->Save_Purchase_History($data);
                    }
                }                
                foreach($_POST['qty'] as $row=>$name){
                if(!empty($_POST['qty'][$row])){
                $medicine   =   $_POST['medicine'][$row];
                $qty        =   $_POST['qty'][$row];
                $mrp        =   $_POST['mrp'][$row];
                $wholesaller=   $_POST['wholesaler'][$row];
                $expire     =   $_POST['expiredate'][$row];     
                //$medicinestock = $this->purchase_model->getMedicineStock($medicine);
                //$instock = $medicinestock->instock + $qty;
                $medicinestock = $this->purchase_model->getmedicineByMId($medicine);
                $instock = $medicinestock->instock + $qty;
                 if(empty($wholesaller)){
                        $wholesaller = $medicinestock->w_discount; 
                    }
                    $data = array(
                        'product_id'   =>  $medicine,
                        'instock'      =>  $instock,
                        'mrp'           =>  $mrp,
                        'w_discount'    =>  $wholesaller,
                        'expire_date'   =>  $expire
                    );
                $success = $this->purchase_model->Update_Medicine($medicine,$data);
                }
                   
                }
                $settings   = $this->configuration_model->getAllSettings();
                $supplierval = $this->supplier_model->GetSupplierValueById($supplier);
                echo "<div class='row'>
                    <div class='col-md-12'>
                        <div class='card card-body printableArea' id='printableArea'>
                            <h5>INVOICE: <span class='pull-right text-muted'>#$invoice</span></h5>
                            <hr>
                            <div class='row'>
                                <div class='col-md-12' style='margin-top: -32px;'>
                                    <div class='pull-left'>
                                        <address>
                                            <h3> &nbsp;<b class='text-muted'>$settings->name</b></h3>
                                            <p class='text-muted m-l-5'>$settings->address</p>
                                        </address>
                                    </div>
                                    <div class='pull-right text-right'>
                                        <address>
                                            <h3 class='text-muted'>To,</h3>
                                            <h5 class='text-muted'>$supplierval->s_name</h5>
                                            <p class='text-muted m-l-10'>$supplierval->s_address,
                                                <br> $supplierval->s_email,
                                                <br> $supplierval->s_phone</p>
                                            <p class='text-muted m-t-5'><b>Invoice Date :</b> <i class='fa fa-calendar'></i> $createdate</p>
                                        </address>
                                    </div>
                                </div>
                                <div class='col-md-12'>
                                    <div class='table-responsive m-t-10' style='clear: both;'>
                                        <table class='table table-hover'>
                                            <thead>              
                                                <tr>
                                                    <th class=''>Medicine</th>
                                                    <th>Quantity</th>
                                                    <th class=''>Trade Price</th>
                                                    <th class=''>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>";
                                        foreach($_POST['qty'] as $row=>$name){
                                        if(!empty($_POST['qty'][$row])){
                                        $medicine   =   $_POST['medicine'][$row];
                                        $qty        =   $_POST['qty'][$row];
                                        $mrp        =   $_POST['mrp'][$row];
                                        $tradeprice =   $_POST['tradeprice'][$row];    
                                        $wholesaller=   $_POST['wholesaler'][$row];
                                        $expire     =   $_POST['expiredate'][$row];
                                        /*$discount   =   $_POST['discount'][$row];*/
                                        $total      =   $_POST['totalval'][$row];    
                                        //$medicinestock = $this->purchase_model->getMedicineStock($medicine);
                                        //$instock = $medicinestock->instock + $qty;
                                        $medicinestock = $this->purchase_model->getmedicineByMId($medicine);
                                                echo "<tr>
                                                    <td class=''>$medicinestock->product_name</td>
                                                    <td>$qty</td>
                                                    <td class=''>$tradeprice </td>
                                                    <td class=''> $total </td>
                                                </tr>";
                                        }
                                        }
                                            echo "</tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class='col-md-12'>
                                    <div class='pull-right m-t-5 text-right'>
                                        <p style='margin-bottom: auto'>Sub - Total amount: $grandamount</p>
                                        <p style='margin-bottom: auto'>Sub - Total Paid: $paid</p>
                                        <p style='margin-bottom: auto'>Sub - Total Due: $duev </p>
                                        <hr>
                                    </div>
                                    <div class='clearfix'></div>
                                    <hr>
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
    }
    public function Save_Purchase_Bar(){
        $purid      =   'P'.rand(2000,10000000);
        $supplier   =   $this->input->post('supplier');
        $invoice    =   $this->input->post('invoice');
        $createdate  =   $this->input->post('entrydate');
        $entrydate  =   strtotime($this->input->post('entrydate'));
        $details    =   $this->input->post('details');
        $mtype    =   $this->input->post('mtype');
        $bankid    =   $this->input->post('bankid');
        if(!empty($bankid)){
            $bankname = $this->purchase_model->GetBankName($bankid);
        }
        $bankinfo = $this->user_model->Getbankinfowithsupplier();
        $cheque    =   $this->input->post('cheque');
        $issuedate    =   $this->input->post('issuedate');
        $rname    =   $this->input->post('rname');
        $rcontact    =   $this->input->post('rcontact');
        $paydate    =   $this->input->post('paydate');
        /*$tdiscount  =   round($this->input->post('tdiscount'));*/
        $grandamount =  round($this->input->post('grandamount'));
        $paid =  round($this->input->post('paid'));
        $duev =  round(abs($this->input->post('due')));
         date_default_timezone_set("Asia/Dhaka");
        $date       =   strtotime(date('m/d/Y'));
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('supplier', 'Supplier', 'trim|required|xss_clean');
        $this->form_validation->set_rules('qty[]', 'Quantity', 'trim|xss_clean');
        $this->form_validation->set_rules('invoice', 'Invoice', 'trim|required|xss_clean');
        $checksameinvoice = $this->purchase_model->GePurchaseInvoice($invoice);
        if(!empty($checksameinvoice)){
            echo "This Invoice is Already exist";
            die();
        }
        if($this->form_validation->run() == FALSE){
            echo validation_errors();
        } else {               
                
                        foreach($_POST['barqty'] as $row=>$name):
                            if(!empty($_POST['barqty'][$row])){
                                $medicine   =   $_POST['medicine'][$row];     
                                $qty     =   $_POST['barqty'][$row];     
                                //$medicinestock = $this->purchase_model->getMedicineStock($medicine);
                                //$instock = $medicinestock->instock + $qty;
                                $medicinestock = $this->purchase_model->getmedicineByMId($medicine);
                                $base = base_url();
                                for($i=1;$i<=$qty;$i++){
                                echo "<div id='printArr' style='margin-bottom: 1mm;'>
            
                                        <p class='' style=''>$medicinestock->product_name</p>
                                        <p class='' style=''>$medicinestock->strength &nbsp; &nbsp; $medicinestock->form</p>
                                        <img class='' src='$base/assets/images/barcode/$medicinestock->batch_no.png' alt='Card image' style='max-width: 100%;height: auto;'>
                                        <p style=''>$medicinestock->expire_date</p></div>";
                                };
                            };
                        endforeach;
            }
              
    }    
    /*Purchase History by purchase ID*/
    public function Purchase_History(){
        $id = base64_decode($this->input->get('H'));
        $data = array();
        $data['purchasehistory'] = $this->purchase_model->GetPurchaseHistory($id);
        $this->load->view('backend/purchase_history',$data);
    }
    public function GetPurchaseSpecificdata(){
        $pid = $this->input->get('id');
        $purchaseval = $this->purchase_model->getPurchaseInvoiceData($pid);
        $indate = date('Y-m-d',$purchaseval->pur_date);
        $purchasedetails = $this->purchase_model->getPurchaseDetailsInvoiceData($pid);
        echo "<div class='card-body'>
                                <div class=''>
                                    <form action='Return_Confirm' method='post' class='form-horizontal' enctype='multipart/form-data' id='purchaserForm' > 

                                        <div class='row'>
                                            <div class='col-md-3'>
                                                <div class='form-group'>
                                                <label class='control-label'>Company Name</label>
                                                <input type='text' name='company' class='form-control' placeholder='' value='$purchaseval->s_name' autocomplete='off' readonly>
                                                <input type='hidden' name='sid' class='form-control' placeholder='' value='$purchaseval->s_id' autocomplete='off'>
                                                <input type='hidden' name='purid' class='form-control' placeholder='' value='$purchaseval->p_id' autocomplete='off'>
                                                </div>
                                            </div>
                                            <div class='col-md-2'>
                                                <div class='form-group'>
                                                    <label class='control-label'>Invoice No</label>
                                                    <input type='number' id='firstName' name='invoice' class='form-control' placeholder='Invoice No' value='$purchaseval->invoice_no' autocomplete='off' readonly>
                                                </div>
                                            </div>                                            
                                            <div class='col-md-2'>
                                                <div class='form-group'>
                                                    <label class='control-label'>Invoice Date</label>
                                                    <input type='text' id='datepicker' class='form-control datepicker' placeholder='' name='entrydate' autocomplete='off' value='$indate' readonly>
                                                </div>
                                            </div>
                                            <div class='col-md-5'>
                                                <div class='form-group'>
                                                    <label class='control-label'>Note</label>
                                                    <textarea type='text' name='details' class='form-control' placeholder='Details' rows='1' cols='8' readonly>$purchaseval->pur_details</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    <tfood>
                                            </tfood><table class='table table-bordered m-t-5 purchase'>

                                        <thead>
                                            <tr>
                                                <th>Medicine  </th>
                                                <th>STR</th>
                                                <th>Purchase Qty</th>
                                                <th>Return Qty</th>
                                                <th>TD</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id='addPurchaseItem'>";
                        foreach($purchasedetails as $value):
            echo"<tr>
                            <td><input type='text' name='medicisne' class='form-control' placeholder='Medicine' value='$value->product_name' autocomplete='off' readonly><input type='hidden' name='mid[]' class='form-control' placeholder='Medicine' value='$value->mid' autocomplete='off'><input type='hidden' name='ph[]' class='form-control' placeholder='Medicine' value='$value->ph_id' autocomplete='off'>
                            </td>
                            <td><input type='text' class='form-control' name='strenth[]' placeholder='Ounce' readonly value='$value->strength' readonly></td>
                            <td><input type='number' class='form-control pqty' name='pqty[]' placeholder='' readonly value='$value->qty'></td>                            
                            <td><input type='number' class='form-control rqty' name='rqty[]' placeholder='0.00' min='0' max='$value->qty' value='' ></td>                                                          
                            <td><input type='text' class='form-control td' name='td[]' placeholder='' value='$value->supplier_price' readonly></td>
                            <td><input type='text' class='form-control total' name='total[]' placeholder='' value='0'></td>
                    </tr>";
                    endforeach;
                    echo"</tbody>
                                        <tbody><tr>
                                                <td class='text-right'> <input type='submit' id='purchasesubmit' class='btn btn-primary btn-block' value='Return'> </td>
                                                <td class='text-right font-weight-bold' colspan=4>Grand Total:</td>

                                                <td><input type='text' class='form-control gtotal' name='grandamount' placeholder='' readonly value=''></td>
                                            </tr>
                                        
                                    </tbody>
                                    
                                    </table>
                                    </form>
                                </div>
                            </div>";
    }
 
}