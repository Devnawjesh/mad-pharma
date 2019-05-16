<?php

	class Sales_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
/*    public function Add_user_info($data){
		$this->db->insert('user',$data);
	}*/
    public function getTodaysSale($date){
        $sql = "SELECT `sales`.*,
        `customer`.`c_name`
        FROM `sales`
        LEFT JOIN `customer` ON `sales`.`cus_id`=`customer`.`c_id`
        WHERE `sales`.`create_date`='$date'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getTodaysSaleByCounter($date,$counter){
        $sql = "SELECT `sales`.*,
        `customer`.`c_name`,
        `user`.`em_name`
        FROM `sales`
        LEFT JOIN `customer` ON `sales`.`cus_id`=`customer`.`c_id`
        LEFT JOIN `user` ON `sales`.`entryid`=`user`.`em_id`
        WHERE `sales`.`create_date`='$date' AND `sales`.`counter`='$counter'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function GetTotalTodaySales($today){
        $sql = "SELECT `paid_amount` FROM `sales` WHERE `sales`.`create_date`='$today'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    /*public function GetSpecificSales($sid){
        $sql = "SELECT `total_amount` FROM `sales` WHERE `sales`.`sale_id`='$sid'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }*/
    public function GetAllClosingReport(){
        $sql = "SELECT * FROM `closing`";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function GetTotalTodayPurchase($todays){
        $sql = "SELECT `paid_amount` FROM `supp_payment` WHERE `supp_payment`.`date`='$todays'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getByInvoiceFromToEnd($start,$end){
        $sql = "SELECT `sales`.*,
        `customer`.`c_name`
        FROM `sales`
        LEFT JOIN `customer` ON `sales`.`cus_id`=`customer`.`c_id`
        WHERE `create_date` BETWEEN '$start' AND '$end'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getByInvoiceFromToEndByCounter($start,$end,$counter){
        $sql = "SELECT `sales`.*,
        `customer`.`c_name`,
        `user`.`em_id`,`em_name`
        FROM `sales`
        LEFT JOIN `customer` ON `sales`.`cus_id`=`customer`.`c_id`
        LEFT JOIN `user` ON `sales`.`entryid`=`user`.`em_id`
        WHERE `sales`.`counter`='$counter' AND `sales`.`create_date` BETWEEN '$start' AND '$end'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getSalesReport(){
        $sql = "SELECT `sales`.*,
        `customer`.`c_name`
        FROM `sales`
        LEFT JOIN `customer` ON `sales`.`cus_id`=`customer`.`c_id`";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getsalesSpecificData($sid){
        $sql = "SELECT `sales`.*,
        `customer`.`c_name`,`c_id`,`c_type`
        FROM `sales`
        LEFT JOIN `customer` ON `sales`.`cus_id`=`customer`.`c_id`
        WHERE `sales`.`sale_id`='$sid'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;
    } 
    public function getSalesReportForInvoice($id){
        $sql = "SELECT `sales`.*,
        `customer`.`c_name`
        FROM `sales`
        LEFT JOIN `customer` ON `sales`.`cus_id`=`customer`.`c_id`
        WHERE `sales`.`sale_id`='$id'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }  
        /*Sales return report*/
    public function GetSalesReturnReport(){
        $sql = "SELECT `sales_return`.*,
        `customer`.`c_name`,
        `user`.`em_name`,`em_id`
        FROM `sales_return`
        LEFT JOIN `customer` ON `sales_return`.`cus_id`=`customer`.`c_id`
        LEFT JOIN `user` ON `sales_return`.`entry_id`=`user`.`em_id`";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }   
        /*Sales return report details*/
    public function SalesReturnDetails($ID){
        $sql = "SELECT `sales_return_details`.*,
        `medicine`.`product_name`,`product_id`
        FROM `sales_return_details`
        LEFT JOIN `medicine` ON `sales_return_details`.`mid`=`medicine`.`product_id`
        WHERE `sales_return_details`.`sr_id`='$ID'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }  
    public function getSalesDetailsForInvoice($id){
        $sql = "SELECT `sales_details`.*,
        `medicine`.`product_id`,`product_name`,`mrp`,`strength`,`generic_name`
        FROM `sales_details`
        LEFT JOIN `medicine` ON `sales_details`.`mid`=`medicine`.`product_id`
        WHERE `sales_details`.`sale_id`='$id'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    } 
    public function getTodaysPurchase($date){
        $sql = "SELECT `purchase`.*,
        `supplier`.`s_name`
        FROM `purchase`
        LEFT JOIN `supplier` ON `purchase`.`sid`=`supplier`.`s_id`
        WHERE `purchase`.`entry_date`='$date'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    } 
    public function getPurchaseReport(){
        $sql = "SELECT `purchase`.*,
        `supplier`.`s_name`
        FROM `purchase`
        LEFT JOIN `supplier` ON `purchase`.`sid`=`supplier`.`s_id`";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getPurchaseReturnReport(){
        $sql = "SELECT `purchase_return`.*,
        `supplier`.`s_name`,`s_id`
        FROM `purchase_return`
        LEFT JOIN `supplier` ON `purchase_return`.`sid`=`supplier`.`s_id`";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function PurchaseReturnDetails($ID){
        $sql = "SELECT `purchase_return_details`.*,
        `supplier`.`s_name`,`s_id`,
        `medicine`.`product_id`,`product_name`
        FROM `purchase_return_details`
        LEFT JOIN `supplier` ON `purchase_return_details`.`supp_id`=`supplier`.`s_id`
        LEFT JOIN `medicine` ON `purchase_return_details`.`mid`=`medicine`.`product_id`
        WHERE `purchase_return_details`.`r_id`='$ID'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }


    // Get details by invoice number
    public function getByInvoice($invoiceID) {

    $sql = "SELECT `mid` AS `medicine_id`, `qty`, `rate`, `total_price`, `discount`, `total_discount`, (SELECT `medicine`.`product_name` FROM `medicine` WHERE `medicine_id` = `medicine`.`product_id`) AS 'medicine_name'
            FROM `sales_details`
            WHERE `sale_id` IN (SELECT `sale_id` FROM `sales` WHERE `invoice_no` = '$invoiceID')";

    /*$sql = "SELECT `mid`, `qty`, `rate`, `total_price`, `discount`, `total_discount`,
            `medicine`.`product_name`
            FROM `sales_details`
            LEFT JOIN `medicine` ON `medicine`.`product_id` = `sales_details`.`mid`
            WHERE `sale_id` IN (SELECT `sale_id` FROM `sales` WHERE `invoice_no` = '65168533')";*/

        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;        
    } 
    public function Sales_Return_Form($data){
        $this->db->insert('sales_return',$data);
    }  
    public function Save_Sales_Retun_History($data){
        $this->db->insert('sales_return_details',$data);
    }    
}
?>