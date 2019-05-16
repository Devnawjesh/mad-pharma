<?php
/**
* 
*/
class Configuration_model extends CI_Model
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->database();
	}

	public function getAllSettings()
	{
		$sql = "SELECT * FROM `settings` WHERE `id` = 1";
		$query = $this->db->query($sql);
		$result = $query->row();
		return $result;
	}

	public function Update_settings_info($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('settings',$data);
	}
}