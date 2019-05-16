<?php

	class Help_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
    public function getPhonebook(){
        $sql = "SELECT * FROM `phone_book` ORDER BY 'id' DESC";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    } 
    public function GetDoctorInfo(){
        $sql = "SELECT * FROM `doctor` ORDER BY 'id' DESC";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    } 
    public function GetHospitalInfo(){
        $sql = "SELECT * FROM `hospital` ORDER BY 'id' DESC";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }  
    public function GetAmbulance(){
        $sql = "SELECT * FROM `ambulance` ORDER BY 'id' DESC";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }   
    public function GetFireService(){
        $sql = "SELECT * FROM `fire_service` ORDER BY 'id' DESC";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }   
    public function GetPolice(){
        $sql = "SELECT * FROM `police` ORDER BY 'id' DESC";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }   
    
    public function insertDoctor($data){
        $this->db->insert('doctor', $data);
        return true;
    } 
    
    public function insertHospital($data){
        $this->db->insert('hospital', $data);
        return true;
    }
    public function insertAmbulance($data){
        $this->db->insert('ambulance', $data);
        return true;
    }
    public function insertFireService($data){
        $this->db->insert('fire_service', $data);
        return true;
    }
    public function insertPolice($data){
        $this->db->insert('police', $data);
        return true;
    }
    public function insertPhonebook($data){
        $this->db->insert('phone_book', $data);
        return true;
    }
}
?>