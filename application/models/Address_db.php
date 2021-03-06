<?php
class Address_db extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function provinces()
	{
		$query = $this->db->query("SELECT * FROM provinces");
		return $query->result();
	}
	function regencies($province_id)
	{
		$query = $this->db->query("SELECT * FROM regencies WHERE province_id = ?", array($province_id));
		return $query->result();
	}
	function districts($regency_id)
	{
		$query = $this->db->query("SELECT * FROM districts WHERE regency_id = ?", array($regency_id));
		return $query->result();
	}
	function villages($district_id)
	{
		$query = $this->db->query("SELECT * FROM villages WHERE district_id = ?", array($district_id));
		return $query->result();
	}
	function regencies_all()
	{
		$query = $this->db->query("SELECT * FROM regencies");
		return $query->result();
	}
	function districts_all()
	{
		$query = $this->db->query("SELECT * FROM districts");
		return $query->result();
	}
	function villages_all()
	{
		$query = $this->db->query("SELECT * FROM villages");
		return $query->result();
	}
	function province_id()
	{
		$query = $this->db->query("SELECT MAX(id) AS id FROM provinces");
		return $query->result();
	}
	function regency_id($province_id)
	{
		$query = $this->db->query("SELECT MAX(id) AS id FROM regencies WHERE province_id = ?", array($province_id));
		return $query->result();
	}
	function district_id($regency_id)
	{
		$query = $this->db->query("SELECT MAX(id) AS id FROM districts WHERE regency_id = ?", array($regency_id));
		return $query->result();
	}
	function village_id($district_id)
	{
		$query = $this->db->query("SELECT MAX(id) AS id FROM villages WHERE district_id = ?", array($district_id));
		return $query->result();
	}
}
?>