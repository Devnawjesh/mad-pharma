<?php

	class Purchase_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
    public function Add_medicine_info($data){
		$this->db->insert('medicine',$data);
	}
    public function Insert_Supplier_amount($data){
		$this->db->insert('supp_payment',$data);
	}
    public function Save_Purchase($data){
		$this->db->insert('purchase',$data);
	}
    public function Save_Purchase_History($data){
		$this->db->insert('purchase_history',$data);
	}
    public function Insert_Supplier_PayHistory($data){
		$this->db->insert('supp_account',$data);
	}
    public function Save_Purchase_return($data){
		$this->db->insert('purchase_return',$data);
	}
    public function Save_Purchase_Retun_History($data){
		$this->db->insert('purchase_return_details',$data);
	}
    public function GetSupplierValue($param){
        $sql = "SELECT * FROM `supplier` WHERE `s_name` LIKE '$param%'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function GetPurchaseparam($param){
        $sql = "SELECT * FROM `purchase` WHERE `p_id` LIKE '$param%' OR `invoice_no` LIKE '$param%'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getmedicineByMId($medicine) {
        $sql = "SELECT * FROM `medicine` WHERE `product_id`='$medicine'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function getPurchaseInfo() {
    $sql = "SELECT `purchase`.*,
      `supplier`.`s_id`,`s_name`
      FROM `purchase`
      LEFT JOIN `supplier` ON `purchase`.`sid`=`supplier`.`s_id`";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getPurchaseInvoiceData($pid) {
    $sql = "SELECT `purchase`.*,
      `supplier`.`s_id`,`s_name`
      FROM `purchase`
      LEFT JOIN `supplier` ON `purchase`.`sid`=`supplier`.`s_id`
      WHERE `purchase`.`p_id`='$pid'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function Update_Medicine($medicine,$data) {
        $this->db->where('product_id',$medicine);
        $this->db->update('medicine',$data);
    }
    public function update_P_balance($purid,$data) {
        $this->db->where('p_id',$purid);
        $this->db->update('purchase',$data);
    }
    public function Update_Purchase_History_Details($ph,$data){
        $this->db->where('ph_id',$ph);
        $this->db->update('purchase_history',$data);
    }
    public function Update_Supplier_PayHistory($pid,$data){
        $this->db->where('pur_id',$pid);
        $this->db->update('supp_account',$data);
    }
    public function GetPurchaseHistory($id) {
    $sql = "SELECT `purchase_history`.*,
      `medicine`.`product_name`,`strength`,
      `supplier`.`s_id`,`s_name`
      FROM `purchase_history`
      LEFT JOIN `medicine` ON `purchase_history`.`mid`=`medicine`.`product_id`
      LEFT JOIN `supplier` ON `purchase_history`.`supp_id`=`supplier`.`s_id`
      WHERE `purchase_history`.`pur_id`='$id'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;        
    }
    public function getPurchaseDetailsInvoiceData($pid) {
    $sql = "SELECT `purchase_history`.*,
      `medicine`.*
      FROM `purchase_history`
      LEFT JOIN `medicine` ON `purchase_history`.`mid`=`medicine`.`product_id`
      WHERE `purchase_history`.`pur_id`='$pid'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;        
    }
    public function GePurchaseInvoice($invoice){
        $sql = "SELECT * FROM `purchase` WHERE `invoice_no`='$invoice'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function GetBankName($bankid){
        $sql = "SELECT `bank_id`,`bank_name` FROM `bank` WHERE `bank_id`='$bankid'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function GePurchaseDetAILSSs($pid){
        $sql = "SELECT * FROM `purchase` WHERE `p_id`='$pid'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;
    } 
    public function GePurchaseHISDetAILSSs($ph){
        $sql = "SELECT * FROM `purchase_history` WHERE `ph_id`='$ph'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
  function GetSuppIDbatch($midbatch){
    $this->db->select('*');
    $this->db->limit(10);
    $this->db->like('s_name', $midbatch);
    $this->db->or_like('s_id', $midbatch);  
    $this->db->or_like('s_phone', $midbatch);  
    $query = $this->db->get('supplier');
    if($query->num_rows() > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['s_name']));
        $new_row['value']=htmlentities(stripslashes($row['s_id']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }        
}
?>