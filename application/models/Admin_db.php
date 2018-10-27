<?php
class Admin_db extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function create($username, $password)
	{
		$query = $this->db->query("INSERT INTO admin(username, password) VALUES (?, ?)", array($username, $password));
	}
	function read()
	{
		$query = $this->db->query("SELECT * FROM admin");
		return $query->result();
	}
	function update($username, $password, $username_old)
	{
		$query = $this->db->query("UPDATE admin SET username = ?, password = ? WHERE username = ?", array($username, $password, $username_old));
	}
	function delete($username)
	{
		$query = $this->db->query("DELETE FROM admin WHERE username = ?", array($username));
	}
	function exist($username)
	{
		$query = $this->db->query("SELECT * FROM admin WHERE username = ?", array($username));
		if ($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>