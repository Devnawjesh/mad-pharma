<?php



	class Customer_model extends CI_Model{





	function __consturct(){

	parent::__construct();

	

	}

    public function Add_customer_info($data){

		$this->db->insert('customer',$data);

	}
    public function Create_Customer_balance($data){

		$this->db->insert('customer_ledger',$data);

	}

    public function getAllCustomer(){

        $sql = "SELECT * FROM `customer` ORDER BY 'id' DESC";

        $query = $this->db->query($sql);

        $result = $query->result();

        return $result;

    } 

    public function getAllRCustomer(){

        $sql = "SELECT * FROM `customer` WHERE `c_type`='Regular'";

        $query = $this->db->query($sql);

        $result = $query->result();

        return $result;

    } 

    public function GetCustomerBalance($customer){
        $sql = "SELECT * FROM `customer_ledger` WHERE `customer_id`='$customer'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;
    } 

    public function getCustomerById($id){

        $sql = "SELECT * FROM `customer` WHERE `customer`.`id`='$id'";

        $query = $this->db->query($sql);

        $result = $query->row();

        return $result;
    }
    public function getAllWCustomer(){

        $sql = "SELECT * FROM `customer` WHERE `c_type`='Wholesale'";

        $query = $this->db->query($sql);

        $result = $query->result();

        return $result;

    }  

    public function UpdateCustomerById($id){
        $this->db->where('id' , $id);
        $this->db->update('customer');
    }  

    public function GetCustomerIdValue($id){
        $this->db->where('c_id' , $id);
        $result = $this->db->get('customer');
        return $result->row();
    }   

    //Get All Email form Cutomer table
    public function getEmailId($email){
        $this->db->where('c_email',$email);
        return $this->db->get('customer')->num_rows();;
    }
    //Get Regular Customer Value By Id
    public function GetRegularValueById($id){
        $sql = "SELECT * FROM `customer` WHERE `customer`.`id`='$id'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;

    }
    //Get Regular Customer Value By Id
    public function phone_book(){
        $sql = "SELECT * FROM `customer`";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;

    }
    //Get Customer Value By Id
    public function GetCustomerValueForPOS($id){
        $sql = "SELECT * FROM `customer` WHERE `customer`.`c_id`='$id'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;

    }
    //Get Customer Value By Id
    public function GetCustomerValueById($id){

        $sql = "SELECT * FROM `customer` WHERE `customer`.`c_id`='$id'";

        $query = $this->db->query($sql);

        $result = $query->row();

        return $result;

    }
    //Get Regular Customer Value By Id
    public function GetCustomerMonthlyIncome($id,$date){
        $sql = "SELECT * FROM `sales` WHERE `sales`.`cus_id`='$id' AND `sales`.`monthyear`='$date'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    //Get Regular Customer Value By Id
    public function getAllCustomerBalance(){
    $sql = "SELECT `customer_ledger`.*,
      `customer`.`c_id`,`c_name`
      FROM `customer_ledger`
      LEFT JOIN `customer` ON `customer_ledger`.`customer_id`=`customer`.`c_id`";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    //Get Regular Customer Value By Id
    public function GetCustomerBALANCEValue($id){
    $sql = "SELECT `customer_ledger`.*,
      `customer`.`c_id`,`c_name`
      FROM `customer_ledger`
      LEFT JOIN `customer` ON `customer_ledger`.`customer_id`=`customer`.`c_id`
      WHERE `customer_ledger`.`customer_id`='$id'";
      $query = $this->db->query($sql);
      $result = $query->row();
      return $result;
    }
    public function Update_customer_info($id,$udata){
        $this->db->where('c_id',$id);
        $this->db->update('customer',$udata);
    }
    public function Update_Balance($cid,$data){
        $this->db->where('customer_id',$cid);
        $this->db->update('customer_ledger',$data);
    }
    public function Does_email_exists($email,$phone) {
		$user = $this->db->dbprefix('customer');
        $sql = "SELECT `c_email`,`cus_contact` FROM $user
		WHERE `c_email`='$email' OR `cus_contact`='$phone'";
		$result=$this->db->query($sql);
        if ($result->row()) {
            return $result->row();
        } else {
            return false;
        }
    }        
}

?>