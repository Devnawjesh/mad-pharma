<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Invoice extends CI_Controller {



	    function __construct() {

        parent::__construct();

        $this->load->database();

        $this->load->model('login_model');

        $this->load->model('user_model');

        $this->load->model('medicine_model');

        $this->load->model('customer_model');
        $this->load->model('supplier_model');
        $this->load->model('invoice_model');
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
                $data = array();
                $data['customer'] = $this->invoice_model->getAllCustomer();
                $data['medicineList'] = $this->medicine_model->getAllMedicine();
                $this->load->view('backend/invoice',$data);
            }
            else{

        		redirect(base_url() , 'refresh');
        	}            

        }
    public function Pos_Create(){
        if($this->session->userdata('user_login_access') != False) {
                $data = array();
                $data['customer'] = $this->invoice_model->getAllCustomer();
                $data['medicineList'] = $this->medicine_model->getAllSuperMedicine();
                $this->load->view('backend/invoice-pos',$data);
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
    public function GetProductparam(){
           if($this->session->userdata('user_login_access') != False) {
            $midbatch = $_POST['search'];
               if(empty($midbatch)){
                   die();
               }
               $this->invoice_model->GetMIDbatch($midbatch);
            }
        else{
    		redirect(base_url() , 'refresh');
    	}       
    }
    public function GetExpiryDtaeAselect(){
           if($this->session->userdata('user_login_access') != False) {
            $pid = $this->input->get('id');
               if(empty($pid)){
                   die();
               }
          $medicine = $this->invoice_model->SpecificMedicine($pid);
          date_default_timezone_set("Asia/Dhaka");
          $today = strtotime(date('Y/m/d'));
          $expire = strtotime($medicine->expire_date);
          $date = str_replace('/', '-',$medicine->expire_date);
          $expired = strtotime($date);
          $a = date('Y/m/d',$expired);
          $b = strtotime($a);               
             if($today > $b){
            echo "EXP:$medicine->expire_date";
             }
            }
        else{
    		redirect(base_url() , 'refresh');
    	}       
    } 
    /*Get similar generic name data*/
    public function GetSimilarGenericdata(){
           if($this->session->userdata('user_login_access') != False) {
            $pid = $this->input->get('id');
               if(!empty($pid)){
                 $product = $this->invoice_model->SpecificMedicine($pid);
                   $pn = $product->generic_name;
                 $generic = $this->invoice_model->GetSimilarGenericdata($pn);
                  /* echo"<option>Select Here</option>";*/
               foreach($generic as $value){
                   echo "
                   <option value='$value->product_id'>$value->product_name</option>";
               }
                   }
            }
        else{
    		redirect(base_url() , 'refresh');
    	}       
    }
    public function GetCustomerId(){
        if($this->session->userdata('user_login_access') != False) {
        $cid = $_POST['search'];
        if(empty($cid)){
            die();
        } 
        $this->invoice_model->SpecificCustomer($cid);
/*        if (!empty($customer)){
            while($row = $customer->result() ) {
                $data[] = array("value"=>$row['c_id'],"label"=>$row['c_name']);
            } 
            foreach($customer as $row){
                $data['value'] = $row['c_id'];
                $data['label'] = $row['c_name'];
                $data[] = $data;
            }
         echo json_encode($data);
            }*/
        }
        else{
    		redirect(base_url() , 'refresh');
    	}             
    }
    public function GetProductValueForPOSField(){
        if($this->session->userdata('user_login_access') != False) {
        $pid = $this->input->get('id');
        $data['mvalue'] = $this->invoice_model->SpecificMedicine($pid);
         echo json_encode($data);
            }
        else{
    		redirect(base_url() , 'refresh');
    	}         
    }
    public function Pos_Info(){
        if($this->session->userdata('user_login_access') != False) {
        $cid = $this->input->post('customer_id');
        $pid = $this->input->post('proid');
        $qty = $this->input->post('qty');
        $mrp = $this->input->post('mrp');
            if(empty($pid)){
                die();
            }
            
            if(empty($cid)){
            $ctype= 'Walkin';
            } else {                
                $customer = $this->invoice_model->GetCusTomerForCheckType($cid);
                $ctype= $customer->c_type;
            }
            if($ctype=='Wholesale'){
            $product = $this->invoice_model->SpecificMedicine($pid);
            date_default_timezone_set("Asia/Dhaka");
            $today = strtotime(date('Y/m/d'));
            $expire = strtotime($product->expire_date);
            $date = str_replace('/', '-',$product->expire_date);
            $expired = strtotime($date);
            $a = date('Y/m/d',$expired);
            $b = strtotime($a);               
             if($today > $b){
                        echo '<script language="javascript">';
                        echo 'alert(Expired)';  //not showing an alert box.
                        echo '</script>';
                        die();
             }                
                if($qty > $product->instock){
                        echo '<script language="javascript">';
                        echo 'alert(Invalid Quantity)';  //not showing an alert box.
                        echo '</script>';
                    die();
                }
                if(empty($qty)){
                        echo '<script language="javascript">';
                        echo 'alert(Invalid Quantity)';  //not showing an alert box.
                        echo '</script>';
                    die();
                }
                if($product->discount =='YES'){
                $wdiscount = $product->w_discount;
                $bsize = $product->box_size;
                $bprice = $product->box_price;
                if($bsize > $qty){
                $discount = ($mrp * $qty)*($wdiscount/100);
                $total = ($mrp * $qty) - $discount;
                $totall = ($mrp * $qty);
                } elseif($bsize < $qty){
                    $totall = ($mrp * $qty);
                    $oneq = $qty % $bsize;
                    $mrpp = $oneq*$mrp;
                    $two = ($qty-$oneq)/$bsize;
                    $discount = $mrpp*($wdiscount/100);
                    $boxprice = $bprice*$two;
                    $total = ($mrpp - $discount) + $boxprice;
                } elseif($bsize = $qty){
                    $totall = ($mrp * $qty);
                    $discount = 0;
                    $total = $bprice;
                    }
                } elseif($product->discount =='NO') {
                $wdiscount = $product->w_discount;
                $bsize = $product->box_size;
                $bprice = $product->box_price;
                if($bsize > $qty){
                $totall = ($mrp * $qty);
                } elseif($bsize < $qty){
                    $totall = ($mrp * $qty);
                    $oneq = $qty % $bsize;
                    $mrpp = $oneq*$mrp;
                    $two  = ($qty-$oneq)/$bsize;
                    $discount = 0;
                    $boxprice = $bprice*$two;
                    $total = $mrpp + $boxprice;
                } elseif($bsize = $qty){
                    $totall = ($mrp * $qty);
                    $discount = 0;
                    $total = $bprice;
                    }
                }
                echo "          <tr class='premove'>
                                  <td><input type='hidden' class='pid' value='$pid' name='pid[]'><input type='text' value='$product->product_name($product->strength)' name='' readonly></td>
                                  <td><input type='text' class='qty' value='$qty' name='qty[]' readonly>
                                  <input type='hidden' class='mrp' value='$mrp' name='mrp[]'></td>
                                  <td><input type='hidden' class='total' value='$total' name='total[]' readonly><input type='text' class='totall' value='$totall' name='totall[]' readonly>
                                  <input type='hidden' class='discount' value='$discount' name='discount[]'></td>
                                  <td class='text-nowrap'>
                                    <a href='' id='tremove' data-total='$total' data-totall='$totall' data-discount='$discount' data-original-title='Close'> 
                                      <i class='fa fa-close text-danger'>
                                      </i> 
                                    </a>
                                  </td>
                                </tr>";
            } elseif($ctype=='Regular'){
                $product = $this->invoice_model->SpecificMedicine($pid);
            date_default_timezone_set("Asia/Dhaka");
            $today = strtotime(date('Y/m/d'));
            $expire = strtotime($product->expire_date);
            $date = str_replace('/', '-',$product->expire_date);
            $expired = strtotime($date);
            $a = date('Y/m/d',$expired);
            $b = strtotime($a);               
             if($today > $b){
                        echo '<script language="javascript">';
                        echo 'alert(Expired)';  //not showing an alert box.
                        echo '</script>';
                        die();
             }                
                if($qty > $product->instock){
                        echo '<script language="javascript">';
                        echo 'alert(Invalid Quantity)';  //not showing an alert box.
                        echo '</script>';
                    die();
                }                
                if(empty($qty)){
                        echo '<script language="javascript">';
                        echo 'alert(Invalid Quantity)';  //not showing an alert box.
                        echo '</script>';
                    die();
                }
        $product = $this->invoice_model->SpecificMedicine($pid);        
        $date = date('Y-m',strtotime('-1 month'));
        $balance = $this->customer_model->GetCustomerMonthlyIncome($cid,$date);
        $to= 0 ;
        foreach($balance as $value){
           $to += $value->total_amount; 
        }
        $totalsales = $to;
        $target = $customer->target_amount;
            if($product->discount =='YES'){    
            if($totalsales > $target){
                $totall = ($mrp * $qty);
                $percent = ($customer->regular_discount + $customer->target_discount)/100;
                $discount = $totall*$percent;
                $total = $totall - $discount;
            } else{
                $totall = ($mrp * $qty);
                $percent = $customer->regular_discount/100;
                $discount = $totall*$percent;
                $total = $totall - $discount;                
            }
            } else if($product->discount =='NO'){
                $totall = ($mrp * $qty);
                $discount = 0;
                $total = ($mrp * $qty) - $discount;   
            }
                echo "          <tr class='premove'>
                                  <td><input type='hidden' class='pid' value='$pid' name='pid[]'><input type='text' value='$product->product_name($product->strength)' readonly></td>
                                <td><input type='text' class='qty' value='$qty' name='qty[]' readonly><input type='hidden' class='mrp' value='$mrp' name='mrp[]'></td>
                                  <td><input type='hidden' class='total' value='$total' name='total[]' readonly>
                                  <input type='hidden' class='discount' value='$discount' name='discount[]'>
                                  <input type='text' class='totall' value='$totall' name='totall[]' readonly></td>
                                  <td class='text-nowrap'>
                                    <a href='' id='tremove' data-total='$total' data-totall='$totall' data-discount='$discount' data-original-title='Close'> 
                                      <i class='fa fa-close text-danger'>
                                      </i> 
                                    </a>
                                  </td>
                                </tr>";                
            } elseif($ctype=='Walkin') {
                $product = $this->invoice_model->SpecificMedicine($pid);
            date_default_timezone_set("Asia/Dhaka");
            $today = strtotime(date('Y/m/d'));
            $expire = strtotime($product->expire_date);
            $date = str_replace('/', '-',$product->expire_date);
            $expired = strtotime($date);
            $a = date('Y/m/d',$expired);
            $b = strtotime($a);               
             if($today > $b){
                        echo '<script language="javascript">';
                        echo 'alert(Expired)';  //not showing an alert box.
                        echo '</script>';
                        die();
             }                
                if($qty > $product->instock){
                        echo '<script type="javascript/text">';
                        echo 'alert(Invalid Quantity)';  //not showing an alert box.
                        echo '</script>';
                    die();
                }                
                if(empty($qty)){
                        echo '<script type="javascript/text">';
                        echo 'alert(Invalid Quantity)';  //not showing an alert box.
                        echo '</script>';
                    die();
                }
        $product = $this->invoice_model->SpecificMedicine($pid);       
                $totall = ($mrp * $qty);
                $total = ($mrp * $qty);
                echo "          <tr class='premove'>
                                  <td><input type='hidden' class='pid' value='$pid' name='pid[]'><input type='text' value='$product->product_name($product->strength)' readonly></td>
                                <td><input type='text' class='qty' value='$qty' name='qty[]' readonly><input type='hidden' class='mrp' value='$mrp' name='mrp[]'></td>
                                  <td><input type='hidden' class='total' value='$total' name='total[]' readonly>
                                  <input type='hidden' class='discount' value='0' name='discount[]'>
                                  <input type='text' class='totall' value='$totall' name='totall[]' readonly></td>
                                  <td class='text-nowrap'>
                                    <a href='' id='tremove' data-total='$total' data-totall='$totall' data-discount='0' data-original-title='Close'> 
                                      <i class='fa fa-close text-danger'>
                                      </i> 
                                    </a>
                                  </td>
                                </tr>";                
            }
            }
        else{
    		redirect(base_url() , 'refresh');
    	} 
    }
    public function Save(){
        $salesid      =   'S'.rand(2000,10000000);
        $customer   =   $this->input->post('customerid');
        $invoice    =   rand(1000000000,50000000000);
        date_default_timezone_set("Asia/Dhaka");
        $entrydate  =   strtotime(date("Y/m/d"));
        $time = strtotime(date('Y-m-d H:i:s'));
        $monthyear  =   date('Y-m');
        $gdiscount  =   round($this->input->post('gdiscount'));
        $gtotal  =   round($this->input->post('payable'));
        $paid =  round($this->input->post('paid'));
        $due =  round($this->input->post('due'));
        $qty =  $this->input->post('qty[]');
        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('customerid', 'Supplier', 'trim|required|xss_clean');
        $this->form_validation->set_rules('paid', 'Paid Amount', 'trim|required|xss_clean');
        $this->form_validation->set_rules('qty[]', 'Quantity', 'trim|required|xss_clean');


        if($this->form_validation->run() == FALSE){
		    $response['status'] = 'error';
            $response['message'] = validation_errors();
            $this->output->set_output(json_encode($response));
        } else {
                $data = array();
                $data = array(
                    'sale_id' => $salesid,
                    'cus_id' => $customer,
                    'invoice_no' => $invoice,
                    'total_discount' => $gdiscount,
                    'total_amount' => $gtotal,
                    'paid_amount' => $paid,
                    'due_amount' => $due,
                    'create_date' => $entrydate,
                    'sales_time' => $time
                ); 
            $success = $this->invoice_model->Save_Payment($data);
            $balance = $this->customer_model->GetCustomerBalance($customer);
            $totalbalance = $balance->total_balance + $gtotal;
            $totalpaid = $balance->total_paid + $paid;
            $totaldue = $balance->total_due + $due;
                $data = array();
                $data = array(
                    'total_balance' => $totalbalance,
                    'total_paid' => $totalpaid,
                    'total_due' => $totaldue
                ); 
            $success = $this->invoice_model->Update_Customer_Balance($customer,$data);            
            if($this->db->affected_rows()){
                $account = $this->user_model->GetAccountBalance();
                $id = $account->id;
                $amount = $account->amount + $gtotal;
                $paid = $account->paid + $paid;
                $due = $account->due + $due;
                    $data = array(
                        'amount'   =>  $amount,
                        'paid'      =>  $paid,
                        'due'      =>  $due
                    );
                $success = $this->user_model->UPDATE_ACCOUNT($id,$data);                
                foreach($_POST['productid'] as $row=>$name){
                $medicine   =   $_POST['productid'][$row];
                $qty        =   $_POST['qty'][$row];
                $mrp        =   $_POST['smrp'][$row];
                $total      =   round($_POST['total'][$row]);
                $discount   =   round($_POST['discount'][$row]);
                $totaldiscount      =   round($_POST['tdiscount'][$row]);                   
                    $data = array(
                        'mid'   =>  $medicine,
                        'sale_id'      =>  $salesid,
                        'qty'      =>  $qty,
                        'rate'  =>    $mrp,
                        'total_price'   =>  $total,
                        'discount'   =>  $discount,
                        'total_discount'  =>  $totaldiscount
                    );
                $success = $this->invoice_model->Save_Sales_History($data);
                }                
                foreach($_POST['productid'] as $row=>$name){
                $medicine   =   $_POST['productid'][$row];
                $qty        =   $_POST['qty'][$row];
                $mrp        =   $_POST['smrp'][$row];
                $total      =   round($_POST['total'][$row]);
                $discount   =   round($_POST['discount'][$row]);
                $totaldiscount      =   round($_POST['tdiscount'][$row]);      
                //$medicinestock = $this->purchase_model->getMedicineStock($medicine);
                //$instock = $medicinestock->instock + $qty;
                $medicinestock = $this->purchase_model->getmedicineByMId($medicine);
                $instock = $medicinestock->instock - $qty;    
                $soldqty = $medicinestock->sale_qty + $qty;    
                    $data = array(
                        'instock'  =>  $instock,
                        'sale_qty'  =>  $soldqty
                    );
                $success = $this->purchase_model->Update_Medicine($medicine,$data);
                }
            $response['status'] = 'success';
            $response['message'] = "Successfully Added";
            $response['curl'] = base_url()."invoice/Create";
            $this->output->set_output(json_encode($response));
            }
        }
    }
    public function GetPosMedicineForDOM(){
        $mid = $this->input->get('id');
        $cid = $this->input->get('cusid');
        if(empty($mid)){
            die();
        }
        $customer = $this->invoice_model->SpecificCustomer($cid); 
        $medicine = $this->invoice_model->SpecificMedicine($mid);
        if($customer->c_type =='Wholesale'){
            echo "<tr>
                    <td><input type='hidden' name='mid[]' value='$medicine->product_id' class='form-control'><button type='button' class='btn bg-purple btn-block btn-xs edit' id=''><span style='color:white;    font-size: 15px' id=''>$medicine->product_name</span></button></td>
                    <td><button type='button' class='btn bg-purple btn-block btn-xs edit' id=''><span style='color:white;    font-size: 15px' id=''>$medicine->generic_name</span></button></td>
                    <td><input type='text' name='instock[]' value='$medicine->instock' class='form-control instock' readonly></td>
                    <td><input type='number' name='qty[]' value='' max='$medicine->instock' class='form-control qty'></td>
                    <td><input type='number' name='mrp[]' value='$medicine->mrp' class='form-control mrp' readonly></td>
                    <td><input type='number' name='discount[]' value='$medicine->w_discount' class='form-control discount' readonly></td>
                    <td><input type='text' name='total[]' value='0' class='form-control total'><input type='hidden' name='tdiscount[]' value='0' class='form-control tdiscount' ></td>
                    <td></td>
        </tr>";
        } elseif($customer->c_type =='Regular'){
        $date = date('Y-m',strtotime('-1 month'));
        $balance = $this->customer_model->GetCustomerMonthlyIncome($cid,$date);
        $total= 0 ;
        foreach($balance as $value){
           $total += $value->total_amount; 
        }
        $totalsales = $total;
        $target = $customer->target_amount;
            if($totalsales > $target){
                $discount = 5 + $customer->target_discount;
            } else{
                $discount = 5;
            }
            echo "<tr>
                    <td><input type='hidden' name='mid[]' value='$medicine->product_id' class='form-control'><button type='button' class='btn bg-purple btn-block btn-xs edit' id=''><span style='color:white;    font-size: 15px' id=''>$medicine->product_name</span></button></td>
                    <td><button type='button' class='btn bg-purple btn-block btn-xs edit' id=''><span style='color:white;    font-size: 15px' id=''>$medicine->generic_name</span></button></td>
                    <td><input type='text' name='instock[]' value='$medicine->instock' class='form-control instock' readonly></td>
                    <td><input type='text' name='qty[]' value='' max='$medicine->instock' class='form-control qty'></td>
                    <td><input type='text' name='mrp[]' value='$medicine->mrp' class='form-control mrp' readonly></td>
                    <td><input type='text' name='discount[]' value='$discount' class='form-control discount' readonly></td>
                    <td><input type='text' name='total[]' value='0' class='form-control total'><input type='hidden' name='tdiscount[]' value='0' class='form-control tdiscount'></td>
                    <td></td>
        </tr>";            
        }
    }
    public function Save_Pos(){
        $salesid    =   'S'.rand(2000,10000000);
        $customer   =   $this->input->post('cid');
        $invoice    =   rand(10000000,50000000);
        date_default_timezone_set("Asia/Dhaka");
        $entrydate  =   strtotime(date("Y/m/d"));
        $monthyear  =   date('Y-m');
         $time = strtotime(date('Y-m-d H:i:s'));
        $gdiscount  =   round($this->input->post('gdiscount'));
        $grandamount =  round($this->input->post('payable'));
        $payi =  round($this->input->post('pay'));
        $duea =  round($this->input->post('due'));
        $return =  round($this->input->post('return'));
        if($duea >= 0){
            $paya = $grandamount - $duea;  
        } elseif($duea < 0){
            $paya = $grandamount;
        }
        $entry = $this->session->userdata('user_login_id');
        if($this->session->userdata('cnumber')){
            $type = $this->session->userdata('cnumber');
        } else {
             $type = $this->session->userdata('user_type');
        }
       
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('pay', 'Pay Amount', 'trim|required|xss_clean');
        if($this->form_validation->run() == FALSE){
		    $response['status'] = 'error';
            $response['message'] = validation_errors();
            $this->output->set_output(json_encode($response));
        } else {
        if(empty($customer)){
            $customer = 'WalkIn';
        } else {
                $cbalance = $this->customer_model->GetCustomerBalance($customer);
                $total = $cbalance->total_balance + $grandamount; 
                $due = $cbalance->total_due + $duea;
                $paid = $grandamount - $duea;
                $paidval = $cbalance->total_paid + $paid;
                $data = array();
                $data = array(
                    'total_balance' => $total,
                    'total_paid' => $paidval,
                    'total_due' => $due
                );
            $success = $this->invoice_model->Update_Customer_Balance($customer,$data);
        }            
            $paid = $grandamount - $duea;
                $data = array();
                $data = array(
                    'sale_id' => $salesid,
                    'cus_id' => $customer,
                    'entryid' => $entry,
                    'invoice_no' => $invoice,
                    'total_discount' => $gdiscount,
                    'total_amount' => $grandamount,
                    'paid_amount' => $paid,
                    'due_amount' => $duea,
                    'create_date' => $entrydate,
                    'counter' => $type,
                    'pay_status' => 'Pay',
                    'monthyear' => $monthyear,
                    'sales_time' => $time
                ); 
            $success = $this->invoice_model->Save_Sales($data);
            if($this->db->affected_rows()){
                $account = $this->user_model->GetAccountBalance();
                $id = $account->id;
                $amount = $account->amount + $grandamount;
                $paid = $account->paid + $paya;
                $due = $account->due + $duea;
                    $data = array(
                        'amount'   =>  $amount,
                        'paid'      =>  $paid,
                        'due'      =>  $due
                    );
                $success = $this->user_model->UPDATE_ACCOUNT($id,$data);                  
                foreach($_POST['qty'] as $row=>$name){
                if(!empty($_POST['qty'][$row])){
                $medicine   =   $_POST['pid'][$row];
                $qty        =   $_POST['qty'][$row];
                $mrp        =   $_POST['mrp'][$row];
                $discount   =   $_POST['discount'][$row];
                $total     =   $_POST['total'][$row];                   
                    $data = array(
                        'sale_id'   =>  $salesid,
                        'mid'      =>  $medicine,
                        'qty'      =>$qty,
                        'rate'      =>  $mrp,
                        'total_price'=> $total,
                        'discount'   =>  $discount
                    );
                $success = $this->invoice_model->Save_Sales_History($data);
                    }
                }                
                foreach($_POST['qty'] as $row=>$name){
                if(!empty($_POST['qty'][$row])){
                $medicine   =   $_POST['pid'][$row];
                $qty        =   $_POST['qty'][$row];
                $mrp        =   $_POST['mrp'][$row];
                $discount   =   $_POST['discount'][$row];
                $total     =   $_POST['total'][$row];     
                //$medicinestock = $this->purchase_model->getMedicineStock($medicine);
                //$instock = $medicinestock->instock + $qty;
                $medicinestock = $this->purchase_model->getmedicineByMId($medicine);
                $instock = $medicinestock->instock - $qty;    
                $soldqty = $medicinestock->sale_qty + $qty;    
                    $data = array(
                        'instock'  =>  $instock,
                        'sale_qty'  =>  $soldqty
                    );
                $success = $this->purchase_model->Update_Medicine($medicine,$data);
                }
  
                }

            $response['status'] = 'success';
            $response['message'] = "Successfully Added";
            $response['curl'] = base_url()."invoice/Pos_Create";
            $this->output->set_output(json_encode($response));                
            }
        }             
    }
    public function Hold_Pos(){
        $salesid    =   'S'.rand(2000,10000000);
        $customer   =   $this->input->post('cid');
        $invoice    =   rand(10000000,50000000);
        date_default_timezone_set("Asia/Dhaka");
        $entrydate  =   strtotime(date("Y/m/d"));
        $monthyear  =   date('Y-m');
         $time = strtotime(date('Y-m-d H:i:s'));
        $gdiscount  =   round($this->input->post('gdiscount'));
        $grandamount =  round($this->input->post('payable'));
        $payi =  round($this->input->post('pay'));
        $duea =  round($this->input->post('due'));
        $return =  round($this->input->post('return'));
        if($duea >= 0){
            $paya = $grandamount - $duea;  
        } elseif($duea < 0){
            $paya = $grandamount;
        }        
        $entry = $this->session->userdata('user_login_id');
        if($this->session->userdata('cnumber')){
            $type = $this->session->userdata('cnumber');
        } else {
             $type = $this->session->userdata('user_type');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        //$this->form_validation->set_rules('cid', 'customer', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pay', 'Pay Amount', 'trim|required|xss_clean');

        if($this->form_validation->run() == FALSE){
		    $response['status'] = 'error';
            $response['message'] = validation_errors();
            $this->output->set_output(json_encode($response));
        } else {
        if(empty($customer)){
            $customer = 'WalkIn';
        } else {
                $cbalance = $this->customer_model->GetCustomerBalance($customer);
                $total = $cbalance->total_balance + $grandamount; 
                $due = $cbalance->total_due + $duea;
                $paid = $grandamount - $duea;
                $paidval = $cbalance->total_paid + $paid;
                $data = array();
                $data = array(
                    'total_balance' => $total,
                    'total_paid' => $paidval,
                    'total_due' => $due
                );
            $success = $this->invoice_model->Update_Customer_Balance($customer,$data);
        }            
            $paid = $grandamount - $duea;
                $data = array();
                $data = array(
                    'sale_id' => $salesid,
                    'cus_id' => $customer,
                    'entryid' => $entry,
                    'invoice_no' => $invoice,
                    'total_discount' => $gdiscount,
                    'total_amount' => $grandamount,
                    'paid_amount' => $paid,
                    'due_amount' => $duea,
                    'create_date' => $entrydate,
                    'counter' => $type,
                    'pay_status' => 'Hold',
                    'monthyear' => $monthyear,
                    'sales_time' => $time
                ); 
            $success = $this->invoice_model->Save_Sales($data);
            if($this->db->affected_rows()){
                $account = $this->user_model->GetAccountBalance();
                $id = $account->id;
                $amount = $account->amount + $grandamount;
                $paid = $account->paid + $paya;
                $due = $account->due + $duea;
                    $data = array(
                        'amount'   =>  $amount,
                        'paid'      =>  $paid,
                        'due'      =>  $due
                    );
                $success = $this->user_model->UPDATE_ACCOUNT($id,$data);                
                foreach($_POST['qty'] as $row=>$name){
                    if(!empty($_POST['qty'][$row])){
                $medicine   =   $_POST['pid'][$row];
                $qty        =   $_POST['qty'][$row];
                $mrp        =   $_POST['mrp'][$row];
                $discount   =   $_POST['discount'][$row];
                $total     =   $_POST['total'][$row];                   
                    $data = array(
                        'sale_id'   =>  $salesid,
                        'mid'      =>  $medicine,
                        'qty'      =>$qty,
                        'rate'      =>  $mrp,
                        'total_price'=> $total,
                        'discount'   =>  $discount
                    );
                $success = $this->invoice_model->Save_Sales_History($data);
                    }
                }                
                foreach($_POST['qty'] as $row=>$name){
                if(!empty($_POST['qty'][$row])){
                $medicine   =   $_POST['pid'][$row];
                $qty        =   $_POST['qty'][$row];
                $mrp        =   $_POST['mrp'][$row];
                $discount   =   $_POST['discount'][$row];
                $total     =   $_POST['total'][$row];     
                //$medicinestock = $this->purchase_model->getMedicineStock($medicine);
                //$instock = $medicinestock->instock + $qty;
                $medicinestock = $this->purchase_model->getmedicineByMId($medicine);
                $instock = $medicinestock->instock - $qty;    
                $soldqty = $medicinestock->sale_qty + $qty;    
                    $data = array(
                        'instock'  =>  $instock,
                        'sale_qty'  =>  $soldqty
                    );
                $success = $this->purchase_model->Update_Medicine($medicine,$data);
                }
            $response['status'] = 'success';
            $response['message'] = "Successfully Hold";
            $response['curl'] = base_url()."invoice/Pos_Create";
            $this->output->set_output(json_encode($response));  
                }

            }
        }             
    } 
    public function Save_Pos_invoice(){
        $salesid    =   'S'.rand(2000,10000000);
        $customer   =   $this->input->post('cid');
        $invoice    =   rand(10000000,50000000);
        date_default_timezone_set("Asia/Dhaka");
        $entrydate  =   strtotime(date("Y/m/d"));
        $monthyear  =   date('Y-m');
         $time = strtotime(date('Y-m-d H:i:s'));
        $gdiscount  =   round($this->input->post('gdiscount'));
        $grandamount =  round($this->input->post('payable'));
        $payi =  round($this->input->post('pay'));
        $change =  round($this->input->post('return'));
        
        $duea =  round($this->input->post('due'));
        $return =  round($this->input->post('return'));
        if($duea >= 0){
            $paya = $grandamount - $duea;  
        } elseif($duea < 0){
            $paya = $grandamount;
        }        
        $entry = $this->session->userdata('user_login_id');
        if($this->session->userdata('cnumber')){
            $type = $this->session->userdata('cnumber');
        } else {
             $type = $this->session->userdata('user_type');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        //$this->form_validation->set_rules('cid', 'customer', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pay', 'Pay Amount', 'trim|required|xss_clean');
        if($this->form_validation->run() == FALSE){
		    //$response['status'] = 'error';
            echo validation_errors();
            //echo validation_errors();
            //$this->output->set_output(json_encode($response));
        } else {
        if(empty($customer)){
            $customer = 'WalkIn';
        } else {
                $cbalance = $this->customer_model->GetCustomerBalance($customer);
                $total = $cbalance->total_balance + $grandamount; 
                $due = $cbalance->total_due + $duea;
                $paid = $grandamount - $duea;
                $paidval = $cbalance->total_paid + $paid;
                $data = array();
                $data = array(
                    'total_balance' => $total,
                    'total_paid' => $paidval,
                    'total_due' => $due
                );
            $success = $this->invoice_model->Update_Customer_Balance($customer,$data);
        }           
            $paid = $grandamount - $duea;
                $data = array();
                $data = array(
                    'sale_id' => $salesid,
                    'cus_id' => $customer,
                    'entryid' => $entry,
                    'invoice_no' => $invoice,
                    'total_discount' => $gdiscount,
                    'total_amount' => $grandamount,
                    'paid_amount' => $paid,
                    'due_amount' => $duea,
                    'create_date' => $entrydate,
                    'counter' => $type,
                    'pay_status' => 'Pay',
                    'monthyear' => $monthyear,
                    'sales_time' => $time
                ); 
            $success = $this->invoice_model->Save_Sales($data);
            if($this->db->affected_rows()){
                $account = $this->user_model->GetAccountBalance();
                $id = $account->id;
                $amount = $account->amount + $grandamount;
                $paid = $account->paid + $paya;
                $due = $account->due + $duea;
                    $data = array(
                        'amount'   =>  $amount,
                        'paid'      =>  $paid,
                        'due'      =>  $due
                    );
                $success = $this->user_model->UPDATE_ACCOUNT($id,$data);               
                foreach($_POST['qty'] as $row=>$name){
                    if(!empty($_POST['qty'][$row])){
                $medicine   =   $_POST['pid'][$row];
                $qty        =   $_POST['qty'][$row];
                $mrp        =   $_POST['mrp'][$row];
                $discount   =   $_POST['discount'][$row];
                $total     =   $_POST['total'][$row];                   
                    $data = array(
                        'sale_id'   =>  $salesid,
                        'mid'      =>  $medicine,
                        'qty'      =>$qty,
                        'rate'      =>  $mrp,
                        'total_price'=> $total,
                        'discount'   =>  $discount
                    );
                $success = $this->invoice_model->Save_Sales_History($data);
                    }
                }                
                foreach($_POST['qty'] as $row=>$name){
                if(!empty($_POST['qty'][$row])){
                $medicine   =   $_POST['pid'][$row];
                $qty        =   $_POST['qty'][$row];
                $mrp        =   $_POST['mrp'][$row];
                $discount   =   $_POST['discount'][$row];
                $total     =   $_POST['total'][$row];     
                //$medicinestock = $this->purchase_model->getMedicineStock($medicine);
                //$instock = $medicinestock->instock + $qty;
                $medicinestock = $this->purchase_model->getmedicineByMId($medicine);
                $instock = $medicinestock->instock - $qty;    
                $soldqty = $medicinestock->sale_qty + $qty;    
                    $data = array(
                        'instock'  =>  $instock,
                        'sale_qty'  =>  $soldqty
                    );
                $success = $this->purchase_model->Update_Medicine($medicine,$data);
                }
                
                }
                    $settings   = $this->configuration_model->getAllSettings();
                    //$customer = $this->invoice_model->GetCusTomerForCheckType($customer);
                    $createdate =date("jS  M Y ");
                    $createtime = date("h:i A");
                $paid = $grandamount - $duea;
echo " <div class='card-body pos_receipt'>
        <div class='receipt_header'>
          <div class='row'>
          <div class='col-md-12'>
          <p class='company-info' style='padding-bottom:5px;margin-top:-10px;'>
            <span style='text-align:center;'><img src='http://soft.safewaypharmabd.com/assets/images/logo_greyscale.png' class='img-responsive text-center' style='width:120px;height:auto;'></span>
            
            <span style='text-align:center;font-size: 12px;font-weight: 600;color: #000;line-height:15px;'> $settings->address</span>
            <span style='text-align:center;font-size: 13px;font-weight: 600;color: #000;line-height:15px;margin-bottom:5px;padding-bottom:5px;border-bottom:1px dashed;'>Contact: $settings->contact, 01831801494</span>
            <span style='float:left;font-size: 13px;font-weight: 600;color: #000;line-height:15px;'>$createtime</span><span style='float:right;font-size: 13px;font-weight: 600;color: #000'>$createdate</span>
          </p>
          </div>
          <div class='col-md-12'>
          <p class='customer-details;margin-bottom:5px;'>
            <span style='float:left;right;font-size: 12px;font-weight: 600;color: #000'>ID: $customer</span>
            <span style='float:right;right;font-size: 12px;font-weight: 600;color: #000'>Invoice# $invoice</span><br>
            
          </p>
          </div>
          </div>
        </div>
        <div class='receipt_body'>
          <table style='font-size:8px'>
          <thead>
            <th style='right;font-size: 13px;font-weight: 600;color: #000'>SL</th>
            <th style='right;font-size: 13px;font-weight: 600;color: #000'>Item/Desc</th>
            <th style='right;font-size: 13px;font-weight: 600;color: #000'>Qty.</th>
            <th style='text-align:right;right;font-size: 13px;font-weight: 600;color: #000'>Amount</th>
          </thead> 
          <tbody>";
                $id = 0;
        foreach($_POST['qty'] as $row=>$name):
                
                if(!empty($_POST['qty'][$row])){
                $id +=1;
                $medicine   =   $_POST['pid'][$row];
                $qty        =   $_POST['qty'][$row];
                $mrp        =   $_POST['mrp'][$row];
                $discount   =   $_POST['discount'][$row];
                $total     =   $_POST['total'][$row];
                $mresult = $this->medicine_model->GetMedicineValueById($medicine);
                    
            echo"<tr>
            <td style='right;font-size: 12px;font-weight: 600;color: #000'>";echo $id; echo"</td>
              <td class='medicine_name' style='right;font-size: 11px;font-weight: 600;color: #000'>
                $mresult->product_name
              </td>
              <td style='right;font-size: 12px;font-weight: 600;color: #000'>$qty * $mresult->mrp</td>
              <td style='right;font-size: 12px;font-weight: 600;color: #000'>$total Tk.</td>              
            </tr>";
                }
                endforeach;
          echo "</tbody></table>
          
          <table style='font-size:8px'>
            <tr>
              <td colspan='9'></td>
              <td style='right;font-size: 12px;font-weight: 600;color: #000'>Net Due: $duea Tk.</td>
            </tr>
            <tr>
            <td></td>
            <td></td>
              <td colspan='7'></td>
              <td style='right;font-size: 12px;font-weight: 600;color: #000'>Paid: $paid Tk.</td>
            </tr>
            <tr>
                <td colspan='9'></td>
              <td style='right;font-size: 12px;font-weight: 600;color: #000'>Change: $change Tk.</td>
            </tr>
          </table>
        </div>
        <div style='padding-left:25px;border-top:1px solid gray; width:38%;color:#000;'>Signature</div>
        <div class='receipt_footer'>
          <span style='text-align:center' style='right;font-size: 15px;font-weight: 600;color: #000'>THANK YOU</span>
        </div>                          
      </div>";
            }
        }             
    }
    public function Invoice_Create(){
        $sales = $this->input->get('I');
        if(!empty($sales)){
            $data['settings']   = $this->configuration_model->getAllSettings();
           $data['invoice'] = $this->invoice_model->Get_Invoice_Value($sales); 
           $data['invoicedetails'] = $this->invoice_model->Get_Invoice_Value_Details($sales); 
            $this->load->view('backend/invoice_view',$data);
        }
    }
    public function pos_print(){
        
        if($this->session->userdata('user_login_access') != False) {
                $this->load->view('backend/pos-print');
        } else {
            redirect(base_url() , 'refresh');
        }
    }
    public function barcode_print(){
        
        if($this->session->userdata('user_login_access') != False) {
                $this->load->view('backend/barcode-print');
        } else {
            redirect(base_url() , 'refresh');
        }
    }
    public function manage_Invoice(){
    if($this->session->userdata('user_login_access') != False) {
        $data['invoice'] = $this->invoice_model->GetAllInvoiceData();
        $this->load->view('backend/manage_invoice',$data);
    }
    else{
            
    }
    }
}