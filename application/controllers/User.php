<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('address_db');
		$this->load->model('berita_db');
		$this->load->model('cp_db');
		$this->load->model('user_db');
		$this->load->model('log_db');

		if($this->session->userdata('status') != 'login' or $this->session->userdata('role') != 'User')
		{
      		redirect('auth');
    	}

		$this->data['username'] = $this->session->userdata('username');
		$this->data['role'] = $this->session->userdata('role');
	}
	public function index()
	{
		$jumlah_pengunjung[0] = $this->log_db->jumlah_pengunjung(date("m", strtotime("now")), date("Y", strtotime("now")))[0]->jumlah_pengunjung;

		for ($i = 1; $i <= 6; $i++)
		{
    		$jumlah_pengunjung[$i] = $this->log_db->jumlah_pengunjung(date("m", strtotime("-".$i." month")), date("Y", strtotime("-".$i." month")))[0]->jumlah_pengunjung;
		}
		$data = array
		(
			'username' => $this->data['username'],
			'role' => $this->data['role'],
			'title' => 'Dashboard',
			'module' => 'dashboard',

			'jumlah_mts' => $this->user_db->count_mts(),
			'jumlah_ma' => $this->user_db->count_ma(),
			'jumlah_mmh' => $this->user_db->count_mmh(),
			'jumlah_total' => $this->user_db->count_total(),
			'jumlah_pengunjung' => $jumlah_pengunjung,

			'berita' => $this->berita_db->select_berita_byTahun(date("Y")),

			'message' => $this->session->flashdata('message'),
			'message_bg' => $this->session->flashdata('message_bg')
		);
		$this->load->view('master-layout', $data);
	}
	public function berita_lama($tahun = "")
	{
		$data = array
		(
			'username' => $this->data['username'],
			'role' => $this->data['role'],
			'title' => 'Dashboard',
			'module' => 'beritalama',

			'berita' => $this->berita_db->select_berita_byTahun($tahun),
			'tahun' => $this->berita_db->select_tahun(),
			'tahun_selected' => $tahun,

			'message' => $this->session->flashdata('message'),
			'message_bg' => $this->session->flashdata('message_bg')
		);
		$this->load->view('master-layout', $data);
	}
	public function password()
	{
		$data = array
		(
			'username' => $this->data['username'],
			'role' => $this->data['role'],
			'title' => 'Password',
			'module' => 'password',

			'message' => $this->session->flashdata('message'),
			'message_bg' => $this->session->flashdata('message_bg')
		);
		$this->load->view('master-layout', $data);
	}
	public function password2()
	{
		$password1 = $this->input->post('password1');
		$password1 = $this->security->xss_clean($password1);
		$password2 = $this->input->post('password2');
		$password2 = $this->security->xss_clean($password2);
		$password3 = $this->input->post('password3');
		$password3 = $this->security->xss_clean($password3);

		$password_DB = $this->user_db->select_password($this->data['username']);
		if (password_verify($password1, $password_DB[0]->password))
		{
			if ($password2 == $password3)
			{
				$this->user_db->update_password($this->data['username'], password_hash($password2, PASSWORD_BCRYPT));

				$this->session->set_userdata('password', password_hash($password2, PASSWORD_BCRYPT));

				$this->session->set_flashdata('message', 'Kata sandi berhasil diperbarui');
				$this->session->set_flashdata('message_bg', 'bg-green');
			}
			else
			{
				$this->session->set_flashdata('message', 'Kata sandi baru tidak sesuai');
				$this->session->set_flashdata('message_bg', 'bg-red');
			}
		}
		else
		{
			$this->session->set_flashdata('message', 'Kata sandi lama tidak sesuai');
			$this->session->set_flashdata('message_bg', 'bg-red');
		}
		redirect('User/password');
	}
	public function profil()
	{
		$user = $this->user_db->read2($this->data['username']);
		$data = array
		(
			'username' => $this->data['username'],
			'role' => $this->data['role'],
			'title' => 'Profil',
			'module' => 'profil',

			'user' => $user,
			'provinces' => $this->address_db->provinces(),
			'regencies' => $this->address_db->regencies($user[0]->provinsi),
			'districts' => $this->address_db->districts($user[0]->kabupaten),
			'villages' => $this->address_db->villages($user[0]->kecamatan),

			'message' => $this->session->flashdata('message'),
			'message_bg' => $this->session->flashdata('message_bg')
		);
		$this->load->view('master-layout', $data);
	}
	public function update_profil()
	{
		$username = $this->data['username'];

		$nama = $this->input->post('nama');
		$nama = $this->security->xss_clean($nama);

		$nama = ucwords(strtolower($nama));

		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$jenis_kelamin = $this->security->xss_clean($jenis_kelamin);
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tempat_lahir = $this->security->xss_clean($tempat_lahir);
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$tanggal_lahir = $this->security->xss_clean($tanggal_lahir);
		$email = $this->input->post('email');
		$email = $this->security->xss_clean($email);
		$noHP = $this->input->post('noHP');
		$noHP = $this->security->xss_clean($noHP);
		$noWA = $this->input->post('noWA');
		$noWA = $this->security->xss_clean($noWA);
		$masuk_tahun = $this->input->post('masuk_tahun');
		$masuk_tahun = $this->security->xss_clean($masuk_tahun);
		$mts = $this->input->post('mts');
		$mts = $this->security->xss_clean($mts);
		if (empty($mts))
		{
			$lulus_mts = -1;
		}
		else
		{
			$lulus_mts = $this->input->post('lulus_mts');
			$lulus_mts = $this->security->xss_clean($lulus_mts);
		}
		$ma = $this->input->post('ma');
		$ma = $this->security->xss_clean($ma);
		if (empty($ma))
		{
			$lulus_ma = -1;
		}
		else
		{
			$lulus_ma = $this->input->post('lulus_ma');
			$lulus_ma = $this->security->xss_clean($lulus_ma);
		}
		$mmh = $this->input->post('mmh');
		$mmh = $this->security->xss_clean($mmh);
		if (empty($mmh))
		{
			$lulus_mmh = -1;
		}
		else
		{
			$lulus_mmh = $this->input->post('lulus_mmh');
			$lulus_mmh = $this->security->xss_clean($lulus_mmh);
		}
		$provinsi = $this->input->post('provinsi');
		$provinsi = $this->security->xss_clean($provinsi);
		$kabupaten = $this->input->post('kabupaten');
		$kabupaten = $this->security->xss_clean($kabupaten);
		$kecamatan = $this->input->post('kecamatan');
		$kecamatan = $this->security->xss_clean($kecamatan);
		$kelurahan = $this->input->post('kelurahan');
		$kelurahan = $this->security->xss_clean($kelurahan);
		$alamat = $this->input->post('alamat');
		$alamat = $this->security->xss_clean($alamat);

		$buff_alamat = '';
		$villages = $this->address_db->villages($kecamatan);
		$found = false;
		foreach($villages as $v)
		{
			if ($kelurahan == $v->id)
			{
				$buff_alamat .= ucwords(strtolower($v->name));
				$found = true;
			}
		}
		if (!$found) $buff_alamat .= '-';
		$buff_alamat .= ', ';
		$districts = $this->address_db->districts($kabupaten);
		$found = false;
		foreach($districts as $d)
		{
			if ($kecamatan == $d->id)
			{
				$buff_alamat .= ucwords(strtolower($d->name));
				$found = true;
			}
		}
		if (!$found) $buff_alamat .= '-';
		$buff_alamat .= ', ';
		$regencies = $this->address_db->regencies($provinsi);
		$found = false;
		foreach($regencies as $r)
		{
			if ($kabupaten == $r->id)
			{
				$buff_alamat .= ucwords(strtolower($r->name));
				$found = true;
			}
		}
		if (!$found) $buff_alamat .= '-';
		$buff_alamat .= ', ';
		$provinces = $this->address_db->provinces();
		$found = false;
		foreach($provinces as $p)
		{
			if ($provinsi == $p->id)
			{
				$buff_alamat .= ucwords(strtolower($p->name));
				$found = true;
			}
		}
		if (!$found) $buff_alamat .= '-';

		$label_aktifitas = $this->input->post('label_aktifitas');
		$label_aktifitas = $this->security->xss_clean($label_aktifitas);
		$aktifitas = $this->input->post('aktifitas');
		$aktifitas = $this->security->xss_clean($aktifitas);
		$label_pendidikan = $this->input->post('label_pendidikan');
		$label_pendidikan = $this->security->xss_clean($label_pendidikan);
		$pendidikan = $this->input->post('pendidikan');
		$pendidikan = $this->security->xss_clean($pendidikan);
		$last_login = date("d-m-Y", time());

		$this->user_db->update($username, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $email, $noHP, $noWA, $masuk_tahun, $lulus_mts, $lulus_ma, $lulus_mmh, $provinsi, $kabupaten, $kecamatan, $kelurahan, $alamat, $buff_alamat, $label_aktifitas, $aktifitas, $label_pendidikan, $pendidikan, $last_login);
		$this->session->set_flashdata('message', 'Berhasil memperbarui profil');
		$this->session->set_flashdata('message_bg', 'bg-green');

		$this->session->set_flashdata('nama', $nama);
		redirect('User/profil');
	}
	public function foto_alumni()
	{
		$username = $this->data['username'];

		if ($this->user_db->exist($username))
		{
			if (!is_dir('uploads'))
			{
				mkdir('./uploads', 0777, true);
			}

			$config['upload_path']		= './uploads/'; 
			$config['allowed_types']	= 'jpg|png';
			$config['overwrite']		= TRUE;
			$config['max_size']			= 1024;
			$config['max_width']		= 0;
			$config['max_height']		= 0; 
			$config['file_name']		= $username.'.jpg';
			$config['file_ext_tolower']	= TRUE;
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload("img"))
			{
				//$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('message', $this->upload->display_errors());
				$this->session->set_flashdata('message_bg', 'bg-red');
			}
			else
			{ 
				$data = array('upload_data' => $this->upload->data());
				$this->session->set_flashdata('message', 'Berhasil memperbarui foto');
				$this->session->set_flashdata('message_bg', 'bg-green');
			}
		}
		redirect('User/profil/');
	}
	public function kartu()
	{
		$user = $this->user_db->read2($this->data['username']);

		$data = array
		(
			'username' => $this->data['username'],
			'role' => $this->data['role'],
			'title' => 'Alumni',
			'module' => 'kartu_alumni',

			'user' => $user,
			'provinces' => $this->address_db->provinces(),
			'regencies' => $this->address_db->regencies($user[0]->provinsi),
			'districts' => $this->address_db->districts($user[0]->kabupaten),
			'villages' => $this->address_db->villages($user[0]->kecamatan),

			'message' => $this->session->flashdata('message'),
			'message_bg' => $this->session->flashdata('message_bg')
		);
		// $this->load->view('master-layout', $data);
		$this->load->view('kartu_alumni', $data);
	}
	public function alumni()
	{
		$lulus_mts = 0;
		$lulus_ma = 0;
		$lulus_mmh = 0;
		$lulus_pondok = 0;

		$lulus_mts = $this->input->post('mts');
		$lulus_mts = $this->security->xss_clean($lulus_mts);
		$lulus_ma = $this->input->post('ma');
		$lulus_ma = $this->security->xss_clean($lulus_ma);
		$lulus_mmh = $this->input->post('mmh');
		$lulus_mmh = $this->security->xss_clean($lulus_mmh);

		$temp_lulus_mts = $this->session->flashdata('lulus_mts');
		$temp_lulus_ma = $this->session->flashdata('lulus_ma');
		$temp_lulus_mmh = $this->session->flashdata('lulus_mmh');
		
		if (isset($temp_lulus_mts)) $lulus_mts = $temp_lulus_mts;
		if (isset($temp_lulus_ma)) $lulus_ma = $temp_lulus_ma;
		if (isset($temp_lulus_mmh)) $lulus_mmh = $temp_lulus_mmh;

		$data = array
		(
			'username' => $this->data['username'],
			'role' => $this->data['role'],
			'title' => 'Alumni',
			'module' => 'alumni',

			'tahun_mts' => $this->user_db->tahun_mts(),
			'lulus_mts' => $lulus_mts,
			'tahun_ma' => $this->user_db->tahun_ma(),
			'lulus_ma' => $lulus_ma,
			'tahun_mmh' => $this->user_db->tahun_mmh(),
			'lulus_mmh' => $lulus_mmh,
			'alumni' => $this->user_db->read($lulus_mts, $lulus_ma, $lulus_mmh),

			'message' => $this->session->flashdata('message'),
			'message_bg' => $this->session->flashdata('message_bg')
		);
		$this->load->view('master-layout', $data);
	}
	public function detail_alumni($username = '')
	{
		$user = $this->user_db->read2($username);

		$data = array
		(
			'username' => $this->data['username'],
			'role' => $this->data['role'],
			'title' => 'Alumni',
			'module' => 'detail_alumni',

			'user' => $user,

			'message' => $this->session->flashdata('message'),
			'message_bg' => $this->session->flashdata('message_bg')
		);
		$this->load->view('master-layout', $data);
	}
	public function cp()
	{
		$data = array
		(
			'username' => $this->data['username'],
			'role' => $this->data['role'],
			'title' => 'Contact Person',
			'module' => 'contact_person',

			'cp' => $this->cp_db->read(),
			'message' => $this->session->flashdata('message'),
			'message_bg' => $this->session->flashdata('message_bg')
		);
		$this->load->view('master-layout', $data);
	}
}
