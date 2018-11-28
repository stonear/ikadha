<?php
class Cp_db extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function read()
	{
		$query = $this->db->query("SELECT * FROM cp");
		return $query->result();
	}
	function update($no)
	{
		$query = $this->db->query("UPDATE cp SET no = ? WHERE id = 0", array($no));
	}
}
?>