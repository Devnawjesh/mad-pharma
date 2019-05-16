<?php



	class Medicine_model extends CI_Model{





	function __consturct(){

	parent::__construct();

	

	}

    public function Add_medicine_info($data){

		$this->db->insert('medicine',$data);

	}

    public function getAllCompany(){
        $sql = "SELECT * FROM `company` ORDER BY 'id' DESC";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
public function getAllSuperMedicine(){
        $sql = "SELECT * FROM `medicine` WHERE `favourite`='1'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function Getshortproduct(){
        $sql = "SELECT `medicine`.*,
        `supplier`.`s_id`,`s_name`
        FROM `medicine`
        LEFT JOIN `supplier` ON `medicine`.`supplier_id`=`supplier`.`s_id` 
        WHERE `medicine`.`instock` <= `medicine`.`short_stock`";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function GetStockVal(){
        $sql = "SELECT `medicine`.*,
        `supplier`.`s_id`,`s_name`
        FROM `medicine`
        LEFT JOIN `supplier` ON `medicine`.`supplier_id`=`supplier`.`s_id`";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function GetStockOutproduct(){
        $sql = "SELECT `medicine`.*,
        `supplier`.`s_id`,`s_name`
        FROM `medicine`
        LEFT JOIN `supplier` ON `medicine`.`supplier_id`=`supplier`.`s_id` 
        WHERE `medicine`.`instock`<='0'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    } 

    public function GetStockExpiresoonproduct($today,$month){
        $sql = "SELECT `medicine`.*,
        `supplier`.`s_id`,`s_name`
        FROM `medicine`
        LEFT JOIN `supplier` ON `medicine`.`supplier_id`=`supplier`.`s_id` 
        WHERE DATE_FORMAT(STR_TO_DATE(`expire_date`, '%d/%m/%Y'), '%Y-%m-%d')
        BETWEEN 
        '$today'
        AND 
        '$month'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function GetexpiredMedicine($today){
        $sql = "SELECT `medicine`.*,
        `supplier`.`s_id`,`s_name`
        FROM `medicine`
        LEFT JOIN `supplier` ON `medicine`.`supplier_id`=`supplier`.`s_id`  
        WHERE DATE_FORMAT(STR_TO_DATE(`expire_date`, '%d/%m/%Y'), '%Y-%m-%d') <= '$today'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    } 

    public function getAllMedicine(){
    $sql = "SELECT `medicine`.*,
      `supplier`.`s_id`,`s_name`
      FROM `medicine`
      LEFT JOIN `supplier` ON `medicine`.`supplier_id`=`supplier`.`s_id`";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    } 

    public function GetMedicineValueById($id){
        $sql = "SELECT * FROM `medicine` WHERE `medicine`.`product_id`='$id'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }  

    public function getSupplierMedicine($id){
        $sql = "SELECT * FROM `medicine` WHERE `medicine`.`supplier_id`='$id'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function getMedicineBymedicineId($id){
        $sql = "SELECT * FROM `medicine` WHERE `medicine`.`product_id`='$id'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }    
    public function Update_medicine_info($id,$udata){
            $this->db->where('product_id',$id);
            $this->db->update('medicine',$udata);
    }
/*
    public function DeleteMedicineID($id){
   $this->db->delete('medicine', array('id_user' => $id)); 
   $this->db->delete('sales', array('id_pemohon' => $id));
   $this->db->delete('customer_ledger', array('id_peserta' => $id));
    }*/    

}

?>