<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	protected $data;
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('address_db');
		$this->load->model('admin_db');
		$this->load->model('berita_db');
		$this->load->model('cp_db');
		$this->load->model('user_db');
		$this->load->model('log_db');

		if($this->session->userdata('status') != 'login' or $this->session->userdata('role') != 'Administrator')
		{
      		redirect('auth');
    	}

		$this->data['username'] = $this->session->userdata('username');
		$this->data['role'] = $this->session->userdata('role');
	}
	public function index()
	{
		$jumlah_pengunjung[0] = $this->log_db->jumlah_pengunjung(date("m", strtotime("now")), date("Y", strtotime("now")))[0]->jumlah_pengunjung;

		$base = strtotime(date('Y-m',time()) . '-01 00:00:01');
		for ($i = 1; $i <= 6; $i++)
		{
			//https://stackoverflow.com/questions/9058523/php-date-and-strtotime-return-wrong-months-on-31st
    		$jumlah_pengunjung[$i] = $this->log_db->jumlah_pengunjung(date("m", strtotime("-".$i." month", $base)), date("Y", strtotime("-".$i." month", $base)))[0]->jumlah_pengunjung;
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
	public function berita()
	{
		$data = array
		(
			'username' => $this->data['username'],
			'role' => $this->data['role'],
			'title' => 'Berita',
			'module' => 'berita',

			'berita' => $this->berita_db->select_berita(0),

			'message' => $this->session->flashdata('message'),
			'message_bg' => $this->session->flashdata('message_bg')
		);
		$this->load->view('master-layout', $data);
	}
	public function tambah_berita()
	{
		$data = array
		(
			'username' => $this->data['username'],
			'role' => $this->data['role'],
			'title' => 'Berita',
			'module' => 'tambahberita',

			'message' => $this->session->flashdata('message'),
			'message_bg' => $this->session->flashdata('message_bg')
		);
		$this->load->view('master-layout', $data);
	}
	public function tambah_berita2()
	{
		$judul = $this->input->post('judul');
		$konten = $this->input->post('konten');

		$this->berita_db->create_berita($this->data['username'], $judul, $konten);

		$this->session->set_flashdata('message', 'Berhasil menambah berita');
		$this->session->set_flashdata('message_bg', 'bg-green');
		redirect('Admin/berita');
	}
	public function update_berita($id = '')
	{
		$berita = $this->berita_db->select_berita_byID($id);
		if (!count($berita)) redirect('Admin/berita');

		$data = array
		(
			'username' => $this->data['username'],
			'role' => $this->data['role'],
			'title' => 'Berita',
			'module' => 'updateberita',

			'berita' => $berita,

			'message' => $this->session->flashdata('message'),
			'message_bg' => $this->session->flashdata('message_bg')
		);
		$this->load->view('master-layout', $data);
	}
	public function update_berita2()
	{
		$id = $this->input->post('id');
		$judul = $this->input->post('judul');
		$konten = $this->input->post('konten');

		$this->berita_db->update_berita($id, $judul, $konten);

		$this->session->set_flashdata('message', 'Berhasil memperbarui berita');
		$this->session->set_flashdata('message_bg', 'bg-green');
		redirect('Admin/berita');
	}
	public function hapus_berita($id)
	{
		$this->berita_db->delete_berita($id);

		$this->session->set_flashdata('message', 'Berhasil menghapus berita');
		$this->session->set_flashdata('message_bg', 'bg-green');
		redirect('Admin/berita');
	}
	public function tinymce_upload()
	{
        $path = './berita/';
		if (!is_dir('berita'))
		{
			mkdir('./berita', 0777, true);
		}
		$config['upload_path']		= $path; 
		$config['allowed_types']	= 'jpg|png|jpeg';
		$config['overwrite']		= TRUE;
		$config['max_size']			= 0;
		$config['max_width']		= 0;
		$config['max_height']		= 0;
		$config['file_ext_tolower']	= TRUE;
		$config['remove_spaces'] = TRUE;
		$this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file'))
        {
            $this->output->set_header('HTTP/1.0 500 Server Error');
            exit;
        }
        else
        {
            $file = $this->upload->data();
            $this->output
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode(['location' => base_url().'berita/'.$file['file_name']]))
                ->_display();
            exit;
        }
    }
	public function admin()
	{
		$data = array
		(
			'username' => $this->data['username'],
			'role' => $this->data['role'],
			'title' => 'Admin',
			'module' => 'admin',

			'admin' => $this->admin_db->read(),
			'message' => $this->session->flashdata('message'),
			'message_bg' => $this->session->flashdata('message_bg')
		);
		$this->load->view('master-layout', $data);
	}
	public function tambah_admin()
	{
		$username = $this->input->post('username');
		$username = $this->security->xss_clean($username);
		$password = $this->input->post('password');
		$password = $this->security->xss_clean($password);
		$password = password_hash($password, PASSWORD_BCRYPT);
		if ($this->admin_db->exist($username) == FALSE)
		{
			$this->admin_db->create($username, $password);
			$this->session->set_flashdata('message', 'Berhasil menambah admin '.$username);
			$this->session->set_flashdata('message_bg', 'bg-green');
		}
		else
		{
			$this->session->set_flashdata('message', 'Admin '.$username.' telah terdaftar di database');
			$this->session->set_flashdata('message_bg', 'bg-red');
		}
		redirect('Admin/admin');
	}
	public function update_admin($username_old = '')
	{
		$username_old = $this->security->xss_clean($username_old);
		$username = $this->input->post('username');
		$username = $this->security->xss_clean($username);
		$password = $this->input->post('password');
		$password = $this->security->xss_clean($password);
		$password = password_hash($password, PASSWORD_BCRYPT);
		$this->admin_db->update($username, $password, $username_old);
		$this->data['nama'] = $username;
		$this->session->set_userdata('nama', $username);
		$this->session->set_flashdata('message', 'Berhasil memperbarui admin '.$username);
		$this->session->set_flashdata('message_bg', 'bg-green');
		redirect('Admin/admin');
	}
	public function hapus_admin($username = '')
	{	
		if ($username == $this->data['username'])
		{
			$this->session->set_flashdata('message', 'Tidak dapat menghapus diri sendiri -___-');
			$this->session->set_flashdata('message_bg', 'bg-red');
			redirect('Admin/admin');
		}

		$this->admin_db->delete($username);
		$this->session->set_flashdata('message', 'Berhasil menghapus admin '.$username);
		$this->session->set_flashdata('message_bg', 'bg-green');
		redirect('Admin/admin');
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
	public function update_cp()
	{
		$nama = $this->input->post('nama');
		$nama = $this->security->xss_clean($nama);
		$no = $this->input->post('no');
		$no = $this->security->xss_clean($no);

		$this->cp_db->update($nama, $no);
		$this->session->set_flashdata('message', 'Berhasil memperbarui contact person');
		$this->session->set_flashdata('message_bg', 'bg-green');
		redirect('Admin/cp');
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
	public function tambah_alumni()
	{
		$lulus_mts = $this->input->post('mts');
		$lulus_mts = $this->security->xss_clean($lulus_mts);
		$lulus_ma = $this->input->post('ma');
		$lulus_ma = $this->security->xss_clean($lulus_ma);
		$lulus_mmh = $this->input->post('mmh');
		$lulus_mmh = $this->security->xss_clean($lulus_mmh);

		$data = array
		(
			'username' => $this->data['username'],
			'role' => $this->data['role'],
			'title' => 'Alumni',
			'module' => 'tambah_alumni',

			'lulus_mts' => $lulus_mts,
			'lulus_ma' => $lulus_ma,
			'lulus_mmh' => $lulus_mmh,

			'provinces' => $this->address_db->provinces(),

			'message' => $this->session->flashdata('message'),
			'message_bg' => $this->session->flashdata('message_bg')
		);
		$this->load->view('master-layout', $data);
	}
	public function get_kabupaten()
	{
		$province_id = $this->input->post('province_id');
		$province_id = $this->security->xss_clean($province_id);

		$regencies = $this->address_db->regencies($province_id);
		echo json_encode($regencies);
	}
	public function get_kecamatan()
	{
		$regency_id = $this->input->post('regency_id');
		$regency_id = $this->security->xss_clean($regency_id);

		$districts = $this->address_db->districts($regency_id);
		echo json_encode($districts);
	}
	public function get_kelurahan()
	{
		$district_id = $this->input->post('district_id');
		$district_id = $this->security->xss_clean($district_id);

		$villages = $this->address_db->villages($district_id);
		echo json_encode($villages);
	}
	public function check_alumni()
	{
		$username = $this->input->post('username');
		$username = $this->security->xss_clean($username);
		
		$alumni = array
		(
			'exist' => $this->user_db->exist($username)
		);
        echo json_encode($alumni);
	}
	public function tambah_alumni2()
	{
		$username = $this->input->post('username');
		$username = $this->security->xss_clean($username);
		$password = password_hash('Pass12345', PASSWORD_BCRYPT);
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

		if ($this->user_db->exist($username))
		{
			$this->session->set_flashdata('message', 'Alumni dengan username '.$username.' telah terdaftar di database');
			$this->session->set_flashdata('message_bg', 'bg-red');
		}
		else
		{
			$this->user_db->create2($username, $password, $nama, $jenis_kelamin, $tempat_lahir, $tanggal_lahir, $email, $noHP, $noWA, $masuk_tahun, $lulus_mts, $lulus_ma, $lulus_mmh, $provinsi, $kabupaten, $kecamatan, $kelurahan, $alamat, $buff_alamat, $label_aktifitas, $aktifitas, $label_pendidikan, $pendidikan, $last_login);
			$this->session->set_flashdata('message', 'Berhasil menambah alumni dengan username '.$username);
			$this->session->set_flashdata('message_bg', 'bg-green');
		}
		$this->session->set_flashdata('lulus_mts', $lulus_mts);
		$this->session->set_flashdata('lulus_ma', $lulus_ma);
		$this->session->set_flashdata('lulus_mmh', $lulus_mmh);
		redirect('Admin/alumni');
	}
	public function update_alumni()
	{
		$username = $this->input->post('username');
		$username = $this->security->xss_clean($username);

		$temp_username = $this->session->flashdata('nik');
		
		if (isset($temp_username)) $username = $temp_username;

		$user = $this->user_db->read2($username);

		if ($this->user_db->exist($username))
		{
			$data = array
			(
				'username' => $this->data['username'],
				'role' => $this->data['role'],
				'title' => 'Alumni',
				'module' => 'update_alumni',

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
		else
		{
			$lulus_mts = $this->input->post('mts');
			$lulus_mts = $this->security->xss_clean($lulus_mts);
			$lulus_ma = $this->input->post('ma');
			$lulus_ma = $this->security->xss_clean($lulus_ma);
			$lulus_mmh = $this->input->post('mmh');
			$lulus_mmh = $this->security->xss_clean($lulus_mmh);

			$this->session->set_flashdata('lulus_mts', $lulus_mts);
			$this->session->set_flashdata('lulus_ma', $lulus_ma);
			$this->session->set_flashdata('lulus_mmh', $lulus_mmh);
			redirect('Admin/alumni');
		}
	}
	public function update_alumni2($username = '')
	{
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
		$this->session->set_flashdata('message', 'Berhasil memperbarui alumni dengan username '.$username);
		$this->session->set_flashdata('message_bg', 'bg-green');

		$this->session->set_flashdata('lulus_mts', $lulus_mts);
		$this->session->set_flashdata('lulus_ma', $lulus_ma);
		$this->session->set_flashdata('lulus_mmh', $lulus_mmh);

		$this->session->set_flashdata('nik', $username);
		redirect('Admin/update_alumni');
	}
	public function hapus_alumni($username = '')
	{
		$lulus_mts = $this->input->post('mts');
		$lulus_mts = $this->security->xss_clean($lulus_mts);
		$lulus_ma = $this->input->post('ma');
		$lulus_ma = $this->security->xss_clean($lulus_ma);
		$lulus_mmh = $this->input->post('mmh');
		$lulus_mmh = $this->security->xss_clean($lulus_mmh);

		$this->session->set_flashdata('lulus_mts', $lulus_mts);
		$this->session->set_flashdata('lulus_ma', $lulus_ma);
		$this->session->set_flashdata('lulus_mmh', $lulus_mmh);

		$this->user_db->delete($username);
		$this->session->set_flashdata('message', 'Berhasil menghapus alumni');
		$this->session->set_flashdata('message_bg', 'bg-green');

		redirect('Admin/alumni');
	}
	public function kartu_alumni($username = '')
	{
		if ($this->user_db->exist($username))
		{
			$user = $this->user_db->read2($username);

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
		else redirect('Admin/alumni');
	}
	public function foto_alumni($username = '')
	{
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
		$this->session->set_flashdata('nik', $username);
		redirect('Admin/update_alumni/');
	}
	public function reset_password()
	{
		$username = $this->input->post('username');
		$username = $this->security->xss_clean($username);
		$password = $this->input->post('password');
		$password = password_hash($password, PASSWORD_BCRYPT);
		if ($this->user_db->exist($username))
		{		
			$this->user_db->update_password($username, $password);
			$this->session->set_flashdata('message', 'Berhasil reset password alumni dengan username '.$username);
			$this->session->set_flashdata('message_bg', 'bg-green');
		}
		else
		{
			$this->session->set_flashdata('message', 'Alumni dengan username '.$username.' tidak terdaftar di sistem');
			$this->session->set_flashdata('message_bg', 'bg-red');
		}
		redirect('Admin');
	}
}