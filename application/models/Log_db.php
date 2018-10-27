<?php
class Log_db extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function log($username, $log)
	{
		$query = $this->db->query("INSERT INTO log(username, log, waktu) VALUES (?, ?, CURRENT_TIMESTAMP)", array($username, $log));
	}
	function jumlah_pengunjung($month, $year)
	{
		$query = $this->db->query("SELECT COUNT(*) AS jumlah_pengunjung FROM log WHERE EXTRACT(month FROM waktu) = ? AND EXTRACT(year FROM waktu) = ? AND log = 'login'", array($month, $year));
		return $query->result();
	}
}
?>