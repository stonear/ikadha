<?php
class User_db extends CI_Model
{
	var $table = 'user';
    var $column_order = array(null, 'username', 'nama', 'jenis_kelamin', 'alamat');
    var $column_search = array('username', 'nama', 'jenis_kelamin', 'alamat');
    var $order = array('nama' => 'asc');

	function __construct()
	{
		parent::__construct();
	}
	function count_mts()
	{
		$query = $this->db->query("SELECT COUNT(*) AS count FROM user WHERE lulus_mts > 0");
		return $query->result();
	}
	function count_ma()
	{
		$query = $this->db->query("SELECT COUNT(*) AS count FROM user WHERE lulus_ma > 0");
		return $query->result();
	}
	function count_mmh()
	{
		$query = $this->db->query("SELECT COUNT(*) AS count FROM user WHERE lulus_mmh > 0");
		return $query->result();
	}
	function count_total()
	{
		$query = $this->db->query("SELECT COUNT(*) AS count FROM user WHERE nama IS NOT NULL");
		return $query->result();
	}
	function create($username, $password)
	{
		$query = $this->db->query("INSERT INTO user(username, password) VALUES (?, ?)", array($username, $password));
	}
	function create2($username, $password, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $email, $noHP, $noWA, $masuk_tahun, $lulus_mts, $lulus_ma, $lulus_mmh, $provinsi, $kabupaten, $kecamatan, $kelurahan, $alamat, $buff_alamat, $label_aktifitas, $aktifitas, $label_pendidikan, $pendidikan, $last_login)
	{
		$query = $this->db->query("INSERT INTO user(username, password, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, email, noHP, noWA, masuk_tahun, lulus_mts, lulus_ma, lulus_mmh, provinsi, kabupaten, kecamatan, kelurahan, alamat, buff_alamat, label_aktifitas, aktifitas, label_pendidikan, pendidikan, last_login) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array($username, $password, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $email, $noHP, $noWA, $masuk_tahun, $lulus_mts, $lulus_ma, $lulus_mmh, $provinsi, $kabupaten, $kecamatan, $kelurahan, $alamat, $buff_alamat, $label_aktifitas, $aktifitas, $label_pendidikan, $pendidikan, $last_login));
	}
	function read($lulus_mts, $lulus_ma, $lulus_mmh)
	{
		$script = 'SELECT username, nama, jenis_kelamin, buff_alamat, label_pendidikan, pendidikan, label_aktifitas FROM user ';
		if ($lulus_mts != 0 || $lulus_ma != 0 || $lulus_mmh != 0)
		{
			$data = array();
			$script = $script.'WHERE ';
			$need_and = false;
			if ($lulus_mts != 0)
			{
				if ($need_and) $script = $script.'AND ';
				$script = $script.'lulus_mts = ? ';
				$need_and = true;
				array_push($data, $lulus_mts);
			}
			if ($lulus_ma != 0)
			{
				if ($need_and) $script = $script.'AND ';
				$script = $script.'lulus_ma = ? ';
				$need_and = true;
				array_push($data, $lulus_ma);
			}
			if ($lulus_mmh != 0)
			{
				if ($need_and) $script = $script.'AND ';
				$script = $script.'lulus_mmh = ? ';
				$need_and = true;
				array_push($data, $lulus_mmh);
			}
			$query = $this->db->query($script, $data);
			return $query->result();
		}
		else
		{
			$script = 'SELECT username, nama, jenis_kelamin, buff_alamat, label_pendidikan, pendidikan, label_aktifitas FROM user WHERE lulus_mts = 0 AND lulus_ma = 0 AND lulus_mmh = 0';
			$query = $this->db->query($script);
			return $query->result();
		}
	}
	function read2($username)
	{
		$query = $this->db->query("SELECT * FROM user WHERE username = ?", array($username));
		return $query->result();
	}
	function update($username, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $email, $noHP, $noWA, $masuk_tahun, $lulus_mts, $lulus_ma, $lulus_mmh, $provinsi, $kabupaten, $kecamatan, $kelurahan, $alamat, $buff_alamat, $label_aktifitas, $aktifitas, $label_pendidikan, $pendidikan, $last_login)
	{
		$query = $this->db->query("UPDATE user SET nama = ?, jenis_kelamin = ?, tempat_lahir = ?, tanggal_lahir = ?, email = ?, noHP = ?, noWA = ?, masuk_tahun = ?, lulus_mts = ?, lulus_ma = ?, lulus_mmh = ?, provinsi = ?, kabupaten = ?, kecamatan = ?, kelurahan = ?, alamat = ?, buff_alamat = ?, label_aktifitas = ?, aktifitas = ?, label_pendidikan = ?, pendidikan = ?, last_login = ? WHERE username = ?", array($nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $email, $noHP, $noWA, $masuk_tahun, $lulus_mts, $lulus_ma, $lulus_mmh, $provinsi, $kabupaten, $kecamatan, $kelurahan, $alamat, $buff_alamat, $label_aktifitas, $aktifitas, $label_pendidikan, $pendidikan, $last_login, $username));
	}
	function delete($username)
	{
		$query = $this->db->query("DELETE FROM user WHERE username = ?", array($username));
	}
	function exist($username)
	{
		$query = $this->db->query("SELECT * FROM user WHERE username = ?", array($username));
		if ($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function select_password($username)
	{
		$query = $this->db->query("SELECT password FROM user WHERE username = ?", array($username));
		return $query->result();
	}
	function update_password($username, $password)
	{
		$query = $this->db->query("UPDATE user SET password = ? WHERE username = ?", array($password, $username));
	}
	function tahun_mts()
	{
		$query = $this->db->query("SELECT DISTINCT lulus_mts FROM user ORDER BY lulus_mts ASC");
		return $query->result();
	}
	function tahun_ma()
	{
		$query = $this->db->query("SELECT DISTINCT lulus_ma FROM user ORDER BY lulus_ma ASC");
		return $query->result();
	}
	function tahun_mmh()
	{
		$query = $this->db->query("SELECT DISTINCT lulus_mmh FROM user ORDER BY lulus_mmh ASC");
		return $query->result();
	}

	function get_all()
	{
		$query = $this->db->query("SELECT * FROM user");
		return $query->result();
	}
}
?>