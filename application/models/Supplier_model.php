<?php



	class Supplier_model extends CI_Model{





	function __consturct(){

	parent::__construct();
	}
    public function Add_Supplier_info($data){
		$this->db->insert('supplier',$data);
	}
    public function Save_BANK($data){
		$this->db->insert('bank',$data);
	}
    public function Create_Supplier_balance($data){
		$this->db->insert('supplier_ledger',$data);
	}
    public function getAllSupplier(){
        $sql = "SELECT * FROM `supplier` ORDER BY 'id' DESC";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }  
    public function DeleteSupplierID($id){
        $this->db->delete('supplier', array('id' => $id));
    }    

    public function GetSupplierValueById($id){
        $sql = "SELECT * FROM `supplier` WHERE `supplier`.`s_id`='$id'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }    

    public function GetSupplierMBySID($id){
        $sql = "SELECT * FROM `medicine` WHERE `medicine`.`supplier_id`='$id'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }     

    public function GETSUPPLIERPURCHASEBALANCE($pid){
        $sql = "SELECT * FROM `supp_account` WHERE `supp_account`.`pur_id`='$pid'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }        

    public function Getsupplierbalance($supplier){
        $sql = "SELECT * FROM `supplier_ledger` WHERE `supplier_ledger`.`supplier_id`='$supplier'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }    
    public function Does_supplier_email_exists($email,$phone){
		$user = $this->db->dbprefix('supplier');
        $sql = "SELECT `s_email`,`s_phone` FROM $user
		WHERE `s_email`='$email' OR `s_phone`='$phone'";
		$result=$this->db->query($sql);
        if ($result->row()) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function Update_Supplier_info($id,$data){
        $this->db->where('s_id',$id);
        $this->db->update('supplier',$data);
    }
    public function update_Supplier_balance($supplier,$data){
        $this->db->where('supplier_id',$supplier);
        $this->db->update('supplier_ledger',$data);
    }
    public function getAllSupplierBalance(){
        $sql = "SELECT `supplier_ledger`.*,
        `supplier`.`s_name`
        FROM `supplier_ledger`
        LEFT JOIN `supplier` ON `supplier_ledger`.`supplier_id`=`supplier`.`s_id`";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;        
    }
    public function GetSupplierDuesValueById($id){
        $sql = "SELECT `supp_account`.*,
        `purchase`.`invoice_no`,`pur_date`,
        `supplier`.`s_name`
        FROM `supp_account`
        LEFT JOIN `supplier` ON `supp_account`.`supplier_id`=`supplier`.`s_id`
        LEFT JOIN `purchase` ON `supp_account`.`pur_id`=`purchase`.`p_id`
        WHERE `supp_account`.`supplier_id`='$id' AND `supp_account`.`due_amount` > '0'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;        
    } 
    public function GetSupplierInvoiceValueById($id){
        $sql = "SELECT `supp_account`.*,
        `purchase`.`invoice_no`,`pur_date`,
        `supplier`.`s_name`
        FROM `supp_account`
        LEFT JOIN `supplier` ON `supp_account`.`supplier_id`=`supplier`.`s_id`
        LEFT JOIN `purchase` ON `supp_account`.`pur_id`=`purchase`.`p_id`
        WHERE `supp_account`.`supplier_id`='$id' AND `supp_account`.`due_amount` = '0'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;        
    } 
    public function GetSupplierPaymentValueById($id){
        $sql = "SELECT `supp_account`.*,
        `purchase`.`invoice_no`,`pur_date`,
        `supplier`.`s_name`,`s_address`,`s_email`,`s_phone`
        FROM `supp_account`
        LEFT JOIN `supplier` ON `supp_account`.`supplier_id`=`supplier`.`s_id`
        LEFT JOIN `purchase` ON `supp_account`.`pur_id`=`purchase`.`p_id`
        WHERE `supp_account`.`pur_id`='$id'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;        
    }  
    public function GetSupplierAllPayment($pid){
        $sql = "SELECT `supp_payment`.*,
        `bank`.`bank_name`
        FROM `supp_payment`
        LEFT JOIN `bank` ON `supp_payment`.`bank_id`=`bank`.`bank_id`
        WHERE `supp_payment`.`pur_id`='$pid'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;        
    }    
}

?>