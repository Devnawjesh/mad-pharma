<?php

	class User_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
    public function Add_user_info($data){
		$this->db->insert('user',$data);
	}
    public function insertSPAYMENT($data){
		$this->db->insert('supp_account',$data);
	}
    public function Save_Closing($data){
		$this->db->insert('closing',$data);
	}
    public function insertPAYMENT($data){
		$this->db->insert('accounts_report',$data);
	}
    public function getAllUser(){
        $sql = "SELECT * FROM `user` ORDER BY 'id' DESC";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function GetEmployeeValueById($id){
        $sql = "SELECT * FROM `user` WHERE `em_id`='$id'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function GetAccountBalance(){
        $sql = "SELECT * FROM `accounts`";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function Getbankinfowithsupplier(){
        $sql = "SELECT * FROM `bank`";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    public function Update_user_info($id,$data){
        $this->db->where('em_id',$id);
        $this->db->update('user',$data);
    } 
    public function UPDATE_ACCOUNT($id,$data){
        $this->db->where('id',$id);
        $this->db->update('accounts',$data);
    } 
    public function UPDATEsPAYMENT($supplier,$data){
        $this->db->where('supplier_id',$supplier);
        $this->db->update('supplier_ledger',$data);
    } 
    public function Reset_Password($id,$data){
        $this->db->where('em_id',$id);
        $this->db->update('user',$data);
    }    
        
}
?>