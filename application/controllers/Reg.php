<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reg extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('admin_db');
		$this->load->model('user_db');
	}
	public function index()
	{
		$data = array
		(
			'title' => 'Registrasi',
			'message' => $this->session->flashdata('message'),
			'message_bg' => $this->session->flashdata('message_bg')
		);
		$this->load->view('reg', $data);
	}
	public function post()
	{
		$username = $this->input->post('username');
		if (preg_match('/\s/', $username))
		{
			$this->session->set_flashdata('message', 'Username '.$username.' mengandung spasi');
				$this->session->set_flashdata('message_bg', 'bg-red');
				redirect('reg');
		}
		$password = $this->input->post('password');
		$password2 = $this->input->post('password2');

		if ($password == $password2)
		{
			$password = password_hash($password, PASSWORD_BCRYPT);
			if ($this->user_db->exist($username) == FALSE and $this->admin_db->exist($username) == FALSE)
			{
				$this->user_db->create($username, $password);
				$data = array
				(
					'title' => 'Success'
				);
				$this->load->view('noreply', $data);
			}
			else
			{
				$this->session->set_flashdata('message', 'Username '.$username.' telah digunakan sebelumnya');
				$this->session->set_flashdata('message_bg', 'bg-red');
				redirect('reg');
			}
		}
		else
		{
			$this->session->set_flashdata('message', 'Password tidak sesuai');
			$this->session->set_flashdata('message_bg', 'bg-red');
			redirect('reg');
		}
	}
}
