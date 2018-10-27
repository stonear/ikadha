<?php
class Auth_db extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function auth_admin($username)
	{
		$query = $this->db->query("SELECT * FROM admin WHERE username = ?", array($username));
		return $query->result();
	}
	function auth_user($username)
	{
		$query = $this->db->query("SELECT * FROM user WHERE username = ?", array($username));
		return $query->result();
	}
}
?>