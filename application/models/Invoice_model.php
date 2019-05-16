<?php



	class Invoice_model extends CI_Model{





	function __consturct(){

	parent::__construct();

	

	}

	public function pos(){
		$this->db->get();
	}
    public function Add_Supplier_info($data){

		$this->db->insert('supplier',$data);

	}
    public function Save_Payment($data){

		$this->db->insert('sales',$data);

	}
    public function Save_Sales_History($data){
		$this->db->insert('sales_details',$data);
	}
    public function Save_Sales($data){
		$this->db->insert('sales',$data);
	}
	// Get All Customer 
	public function getAllCustomer(){
        $sql = "SELECT * FROM `customer` ORDER BY 'id' DESC";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
	}
	// Get specific Customer 
	public function GetCusTomerForCheckType($cid){
        $sql = "SELECT * FROM `customer` WHERE `customer`.`c_id`='$cid'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;
	} 
	public function getAllMedicineByKey($param){
        $sql    = "SELECT * FROM `medicine` WHERE `product_name` LIKE '$param%'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
	} 
	public function GetCInfo($cid){
        $sql    = "SELECT `c_name`,`c_id` FROM `customer` WHERE `c_name` LIKE '$cid%' OR `cus_contact` LIKE '$cid%'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
	}  
/*	public function SpecificCustomer($cid){
        $sql    = "SELECT `c_name`,`c_id` FROM `customer` WHERE `barcode` LIKE '$cid%' OR `cus_contact` LIKE '$cid%'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
	}*/ 
  function SpecificCustomer($q){
    $this->db->select('*');
    $this->db->limit(10);
    $this->db->like('barcode', $q);
    $this->db->or_like('cus_contact', $q);
    $this->db->or_like('c_name', $q);
    $query = $this->db->get('customer');
    if($query->num_rows() > 0){
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['c_name']));
        $new_row['value']=htmlentities(stripslashes($row['c_id']));
        $new_row['ctype']=htmlentities(stripslashes($row['c_type']));
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }       
	public function GetSimilarGenericdata($pn){
        $sql    = "SELECT `product_name`,`product_id`,`generic_name` FROM `medicine` WHERE `generic_name` LIKE '$pn%'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
	}/* 
	public function GetMIDbatch($midbatch){
        $sql    = "SELECT `product_id`,`product_name`,`strength` FROM `medicine` WHERE `product_name` LIKE '$midbatch%' OR `product_id` LIKE '$midbatch%' OR `batch_no` LIKE '$midbatch%'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
	}*/
  function GetMIDbatch($midbatch){
    $this->db->select('*');
    $this->db->limit(10);
    $this->db->like('batch_no', $midbatch);
    $this->db->or_like('product_name', $midbatch);  
    $query = $this->db->get('medicine');
    if($query->num_rows() > 0){
    date_default_timezone_set("Asia/Dhaka");
    $today = strtotime(date('Y/m/d'));
      foreach ($query->result_array() as $row){
        $new_row['label']=htmlentities(stripslashes($row['product_name'].'('.$row['strength'].')'));
        $new_row['value']=htmlentities(stripslashes($row['product_id']));
        $new_row['genval']=htmlentities(stripslashes($row['generic_name']));
        $new_row['mrp']=htmlentities(stripslashes($row['mrp']));
        $new_row['stock']=htmlentities(stripslashes($row['instock']));
          $date = str_replace('/', '-', $row['expire_date']);
          $expire = strtotime($date);
          $a = date('Y/m/d',$expire);
          $b = strtotime($a);
          if($today >= $b){
        $new_row['expiry']=htmlentities(stripslashes($row['expire_date']));
          } else {
         $new_row['expiry']=htmlentities(stripslashes(0));     
          }
        $row_set[] = $new_row; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }        
        /*Specific medicine for pos*/
	public function SpecificMedicine($mid){
        $sql    = "SELECT * FROM `medicine` WHERE `product_id`='$mid'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
	}
        /*Sales medicine for pos*/
	public function Get_Invoice_Value($sales){
    $sql = "SELECT `sales`.*,
      `customer`.*
      FROM `sales`
      LEFT JOIN `customer` ON `sales`.`cus_id`=`customer`.`c_id`
      WHERE `sales`.`sale_id`='$sales'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;
	}
        /*Sales Invoice Data*/
	public function GetAllInvoiceData(){
    $sql = "SELECT `sales`.*,
      `customer`.*
      FROM `sales`
      LEFT JOIN `customer` ON `sales`.`cus_id`=`customer`.`c_id`
     ORDER BY `sales`.`create_date` DESC";
    $query = $this->db->query($sql);
    $result = $query->result();
    return $result;
	}
        /*Sales medicine details for pos*/
	public function Get_Invoice_Value_Details($sales){
    $sql = "SELECT `sales_details`.*,
      `medicine`.*
      FROM `sales_details`
      LEFT JOIN `medicine` ON `sales_details`.`mid`=`medicine`.`product_id`
      WHERE `sales_details`.`sale_id`='$sales'";        
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
	}
	// Get All Product 
	public function getAllProduct(){
        $sql = "SELECT * FROM `medicine` ORDER BY 'id' DESC";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
	}
    public function getAllSupplier(){
        $sql = "SELECT * FROM `supplier` ORDER BY 'id' DESC";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function Update_Customer_Balance($customer,$data){
        $this->db->where('customer_id',$customer);
        $this->db->update('customer_ledger',$data);
    }
    /*Top selling Product*/    
    public function TopSellingProduct(){
        $sql = "select *
            from `medicine`
            group by `product_id`
            order by sum(sale_qty) desc
            LIMIT 5";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;        
    }    

}

?>