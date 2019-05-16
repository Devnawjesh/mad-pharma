<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Sales extends CI_Controller {



	    function __construct() {

        parent::__construct();

        $this->load->database();

        $this->load->model('login_model');

        $this->load->model('user_model');

        $this->load->model('medicine_model');
        $this->load->model('customer_model');
        $this->load->model('supplier_model');
        $this->load->model('sales_model');
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

/*    public function Create(){

        $this->load->view('backend/Add_supplier');

    }*/

   public function Today_report(){
       if($this->session->userdata('user_login_access') != False) {
        date_default_timezone_set("Asia/Dhaka");   
       $today = date('Y-m-d');
       $date = strtotime($today);
        $data['todaysreport'] = $this->sales_model->getTodaysSale($date);
        $data['purchasereport'] = $this->sales_model->getTodaysPurchase($date);
        $this->load->view('backend/today_sale',$data);
        }
    else{
		redirect(base_url() , 'refresh');
	}          

    } 

   public function Today_counter_report(){
       if($this->session->userdata('user_login_access') != False) {
        date_default_timezone_set("Asia/Dhaka");   
       $today = date('d-m-Y');
       $date = strtotime($today);
        $counter = $this->session->userdata('cnumber');
        $data['todaysreport'] = $this->sales_model->getTodaysSaleByCounter($date,$counter);
        $this->load->view('backend/today_sale_counter',$data);
        }
    else{
		redirect(base_url() , 'refresh');
	}          

    } 

   public function Sales_report(){
       if($this->session->userdata('user_login_access') != False) {
        $data['salesreport'] = $this->sales_model->getSalesReport();
        $this->load->view('backend/sales_report',$data);
        }
    else{
		redirect(base_url() , 'refresh');
	}           
    } 
   public function Purchase_report(){
       if($this->session->userdata('user_login_access') != False) {
        $data['purchasereport'] = $this->sales_model->getPurchaseReport();
        $this->load->view('backend/purchase_report',$data);
        }

    else{
		redirect(base_url() , 'refresh');
	}       
    }  

   public function Purchase_Return(){
       if($this->session->userdata('user_login_access') != False) {
        $this->load->view('backend/purchase_return');
        }

    else{
		redirect(base_url() , 'refresh');
	}       
    } 

   public function Sales_Return(){
       if($this->session->userdata('user_login_access') != False) {
        $data['salesreport'] = $this->sales_model->getSalesReport();
        $this->load->view('backend/sales_return',$data);
       }
    else{
		redirect(base_url() , 'refresh');
	}           
    } 

   public function Sales_Return_Report(){
       if($this->session->userdata('user_login_access') != False) {
        $data['salesreturnreport'] = $this->sales_model->GetSalesReturnReport();
        $this->load->view('backend/sales_return_report',$data);
       }
    else{
		redirect(base_url() , 'refresh');
	}           
    } 
 
    public function Sales_R_History() {
        if($this->session->userdata('user_login_access') != False) {
            $ID = base64_decode($this->input->get('H'));
            $data['returndetails'] = $this->sales_model->SalesReturnDetails($ID);
            $this->load->view('backend/sales_return_details', $data);
        }
        else{
            redirect(base_url() , 'refresh');
        } 
    }
 
    public function Purchase_R_History() {
        if($this->session->userdata('user_login_access') != False) {
            $ID = base64_decode($this->input->get('H'));
            $data['returndetails'] = $this->sales_model->PurchaseReturnDetails($ID);
            $this->load->view('backend/purchase_return_details', $data);
        }
        else{
            redirect(base_url() , 'refresh');
        } 
    }
   public function SalesReturn(){
    if($this->session->userdata('user_login_access') != False) {   
    $sid = base64_decode($this->input->get('S'));
    $data['salesreport'] = $this->sales_model->getsalesSpecificData($sid);
    $data['allSales'] = $this->sales_model->getSalesDetailsForInvoice($sid);
    $this->load->view('backend/invoice_return',$data);
       }
    else{
		redirect(base_url() , 'refresh');
	}         
    } 

   public function Purchase_Return_Invoice(){
       if($this->session->userdata('user_login_access') != False) {  
       $invoice = $this->input->post('pinvoice');
      $purchasereport = $this->sales_model->getPurchaseReportForReturn($invoice);
        if(!empty($purchasereport)){
            echo $invoice;
       }else{
           
       }
       }
    else{
		redirect(base_url() , 'refresh');
	}           
    } 
    public function sales_report_details() {
        if($this->session->userdata('user_login_access') != False) {
            $invoiceID = $this->input->get('id');
            $data['invoice_details'] = $this->sales_model->getByInvoice($invoiceID);
            $this->load->view('backend/invoice_report', $data);
        }
        else{
            redirect(base_url() , 'refresh');
        } 
    }
   public function Purchase_Return_report(){
       if($this->session->userdata('user_login_access') != False) {
       $data['purchasereturnreport'] = $this->sales_model->getPurchaseReturnReport();
        $this->load->view('backend/purchase_return_report',$data);
        }
        else{
            redirect(base_url() , 'refresh');
        }           
    }
   public function Counter_report(){
       if($this->session->userdata('user_login_access') != False) {
       //$data['counter'] = $this->sales_model->Getcounter();
        $this->load->view('backend/counter_report');
        }
        else{
            redirect(base_url() , 'refresh');
        }           
    } 
    /*Purchase Return*/
   public function Return_Confirm(){
        $purid      =   $this->input->post('purid');
        $rid      =   'R'.rand(100000,500000);
        $supplier   =   $this->input->post('sid');
        $invoice    =   $this->input->post('invoice');
        $entrydate  =   strtotime(date('Y-m-d'));
        /*$tdiscount  =   round($this->input->post('tdiscount'));*/
        $grandamount =  round($this->input->post('grandamount'));
        $this->load->library('form_validation');
                $data = array();
                $data = array(
                    'r_id' => $rid,
                    'pur_id' => $purid,
                    'sid' => $supplier,
                    'invoice_no' => $invoice,
                    'return_date' => $entrydate,
                    'total_deduction' => $grandamount
                ); 
            $success = $this->purchase_model->Save_Purchase_return($data);
            if($this->db->affected_rows()){
                $purinfo = $this->purchase_model->GePurchaseDetAILSSs($purid);
                $total = $purinfo->gtotal_amount - $grandamount; 
                $data = array();
                $data = array(
                    'gtotal_amount' => $total,
                );
                $success = $this->purchase_model->update_P_balance($purid,$data);                
                foreach($_POST['rqty'] as $row=>$name){
                    if(!empty($_POST['rqty'][$row])){
                $medicine   =   $_POST['mid'][$row];
                $rqty        =   $_POST['rqty'][$row];
                $total      =   $_POST['total'][$row];                   
                    $data = array(
                        'r_id'   =>  $rid,
                        'pur_id'   =>  $purid,
                        'mid'      =>  $medicine,
                        'supp_id'      =>$supplier,
                        'return_qty'      => $rqty,
                        'deduction_amount'   =>  $total
                    );
                $success = $this->purchase_model->Save_Purchase_Retun_History($data);
                    }
                }                 
                foreach($_POST['rqty'] as $row=>$name){
                    if(!empty($_POST['rqty'][$row])){
                $medicine   =   $_POST['mid'][$row];
                $rqty        =   $_POST['rqty'][$row];
                $total      =   $_POST['total'][$row];
                $ph      =   $_POST['ph'][$row];
                $purinfo = $this->purchase_model->GePurchaseHISDetAILSSs($ph);
                $qty = $purinfo->qty - $rqty;        
                $b = $purinfo->total_amount - $total;        
                    $data = array(
                        'qty'      => $qty,
                        'total_amount'   => $b
                    );
                $success = $this->purchase_model->Update_Purchase_History_Details($ph,$data);
                    }
                }                
                foreach($_POST['rqty'] as $row=>$name){
                if(!empty($_POST['rqty'][$row])){
                $medicine   =   $_POST['mid'][$row];
                $rqty        =   $_POST['rqty'][$row];
                $qty        =   $_POST['pqty'][$row];
                $total      =   $_POST['total'][$row];       
                //$medicinestock = $this->purchase_model->getMedicineStock($medicine);
                //$instock = $medicinestock->instock + $qty;
                $medicinestock = $this->purchase_model->getmedicineByMId($medicine);
                $instock = $medicinestock->instock - $rqty;
                    $data = array(
                        'instock'      =>  $instock,
                    );
                $success = $this->purchase_model->Update_Medicine($medicine,$data);
                }
                   
                }

            redirect("sales/Purchase_Return");
            }        
    }
    /*Sales Return*/
   public function Sales_Return_Form(){
        $sid      =   $this->input->post('s_id');
        $cid      =   $this->input->post('customer_id');
        $rid      =   'SR'.rand(100000,5000000);
        $invoice  = rand(100000,5000000);
       date_default_timezone_set("Asia/Dhaka");
        $entrydate  =   strtotime(date('Y-m-d'));
        /*$tdiscount  =   round($this->input->post('tdiscount'));*/
        $grandamount =  round($this->input->post('grandamount'));
        $granddeduction =  round($this->input->post('granddeduction'));
       $userid = $this->session->userdata('user_login_id');
        if($this->session->userdata('cnumber')){
            $type = $this->session->userdata('cnumber');
        } else {
             $type = $this->session->userdata('user_type');
        }
        $this->load->library('form_validation');
                $data = array();
                $data = array(
                    'sr_id' => $rid,
                    'cus_id' => $cid,
                    'sale_id' => $sid,
                    'invoice_no' => $invoice,
                    'return_date' => $entrydate,
                    'total_deduction' => $granddeduction,
                    'total_amount' => $grandamount,
                    'entry_id' => $userid,
                    'counter' => $type
                ); 
            $success = $this->sales_model->Sales_Return_Form($data);
            if($this->db->affected_rows()){               
                foreach($_POST['rqty'] as $row=>$name){
                    if(!empty($_POST['rqty'][$row])){
                $medicine   =   $_POST['mid'][$row];
                $rqty        =   $_POST['rqty'][$row];
                $total      =   $_POST['total'][$row];                   
                $deduction      =   $_POST['deduction'][$row];                   
                    $data = array(
                        'sr_id'   =>  $rid,
                        'mid'   =>  $medicine,
                        'r_qty'   =>  $rqty,
                        'r_total'   =>$total,
                        'r_deduction'  => $deduction,
                        'date'   =>  $entrydate
                    );
                $success = $this->sales_model->Save_Sales_Retun_History($data);
                    }
                }                                
                foreach($_POST['rqty'] as $row=>$name){
                if(!empty($_POST['rqty'][$row])){
                $medicine   =   $_POST['mid'][$row];
                $rqty        =   $_POST['rqty'][$row];      
                $medicinestock = $this->purchase_model->getmedicineByMId($medicine);
                $instock = $medicinestock->instock + $rqty;
                    $data = array(
                        'instock'      =>  $instock,
                    );
                $success = $this->purchase_model->Update_Medicine($medicine,$data);
                }
                   
                }
                    $response['status'] = 'success';
                    $response['message'] = "Successfully Created";
                    $response['curl'] = base_url(). "Sales/SalesReturn?S=".base64_encode($sid);
                    $this->output->set_output(json_encode($response));
            }        
    }
    public function GETSALESrePort(){
       if($this->session->userdata('user_login_access') != False) { 
           $start = strtotime($this->input->post('start'));
           $end = strtotime($this->input->post('end'));
           $invoice_details = $this->sales_model->getByInvoiceFromToEnd($start,$end);
                                            foreach($invoice_details as $value):
                                           $create=  date('l jS \of F Y', $value->create_date);
                                            echo"<tr>
                                                <td> $create </td>
                                                <td><a href='sales_report_details?id=$value->invoice_no'> $value->invoice_no</a></td>
                                                <td>$value->c_name</td>
                                                <td>
                                                      $value->total_amount TK
                                                </td>
                                            </tr>";
                                            endforeach;
    }        
    else{
        redirect(base_url() , 'refresh');
    }
    }
    public function GETSALESrePortBycounter(){
       if($this->session->userdata('user_login_access') != False) { 
           $start = strtotime($this->input->post('start'));
           $end = strtotime($this->input->post('end'));
           $counter = $this->input->post('counter');
           $invoice_details = $this->sales_model->getByInvoiceFromToEndByCounter($start,$end,$counter);
                                            foreach($invoice_details as $value):
                                           $create=  date('l jS \of F Y', $value->create_date);
                                            echo"<tr>
                                                <td> $create </td>
                                                <td><a href='sales_report_details?id=$value->invoice_no'> $value->invoice_no</a></td>
                                                <td>$value->c_name</td>
                                                <td>
                                                      $value->total_amount TK
                                                </td>
                                                <td>
                                                      $value->counter
                                                </td>
                                                <td>
                                                      $value->em_name
                                                </td>
                                            </tr>";
                                            endforeach;
    }        
    else{
        redirect(base_url() , 'refresh');
    }
    }
    public function GetSalesInvoiceReport(){
        $id = $this->input->get('id');
        $settings   = $this->configuration_model->getAllSettings();
        $invoice = $this->sales_model->getSalesReportForInvoice($id);
        $invoice_details = $this->sales_model->getSalesDetailsForInvoice($id);
        $createdate = date('d/m/Y',$invoice->create_date);
        $createtime = $invoice->sales_time;
        $customer = $invoice->c_name;
        $invoiceno = $invoice->invoice_no;
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
            <span style='float:right;right;font-size: 12px;font-weight: 600;color: #000'>Invoice# $invoiceno</span><br>
            
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
        foreach($invoice_details as $value):
                $id +=1;
            echo"<tr>
            <td style='right;font-size: 12px;font-weight: 600;color: #000'>";echo $id; echo"</td>
              <td class='medicine_name' style='right;font-size: 12px;font-weight: 600;color: #000'>
                $value->product_name
              </td>
              <td style='right;font-size: 12px;font-weight: 600;color: #000'>$value->qty * $value->mrp</td>
              <td style='right;font-size: 12px;font-weight: 600;color: #000'>$value->total_price tk.</td>              
            </tr>";
                
                endforeach;
          echo "</tbody>
          
          
            <tr>
            <td></td>
            <td></td>
              <td colspan='1' style='right;font-size: 12px;font-weight: 600;color: #000'>Net Due</td>
              <td style='right;font-size: 12px;font-weight: 600;color: #000'> $invoice->due_amount tk.</td>
            </tr>
            <tr>
            <td></td>
            <td></td>
              <td colspan='1' style='right;font-size: 12px;font-weight: 600;color: #000'>Paid</td>
              <td style='right;font-size: 12px;font-weight: 600;color: #000'>$invoice->paid_amount tk.</td>
            </tr>
            <tr>
            <td></td>
            <td></td>
              <td colspan='1' style='right;font-size: 12px;font-weight: 600;color: #000'>Total Amount</td>
              <td style='right;font-size: 12px;font-weight: 600;color: #000'>$invoice->total_amount tk.</td>
            </tr>
          </table>
        </div>
        <div class='receipt_footer'>
          <span style='right;font-size: 12px;font-weight: 600;color: #000'>THANK YOU</span>
        </div>                          
      </div>";        
    }
}