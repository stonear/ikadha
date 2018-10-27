<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('auth_db');
		$this->load->model('cp_db');
		$this->load->model('log_db');
	}
	public function index()
	{
		if($this->session->userdata('status') == 'login')
		{
			if ($this->session->userdata('role') == 'Administrator')
			{
				redirect('Admin');
			}
			if ($this->session->userdata('role') == 'User')
			{
				redirect('User');
			}
		}
		else
		{
			$data = array
			(
				'title' => 'Login',
				'cp' => $this->cp_db->read(),
				'message' => $this->session->flashdata('message'),
				'message_bg' => $this->session->flashdata('message_bg')
			);
			$this->load->view('login', $data);
		}
	}
	public function notfound()
	{
		$data = array
		(
			'title' => '404'
		);
		$this->load->view('404', $data);
	}
	public function post()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$admin = $this->auth_db->auth_admin($username);
		if(count($admin) > 0)
		{
			if (password_verify($password, $admin[0]->password))
			{
				$data_session = array
				(
					'username' => $admin[0]->username,
					'status' => 'login',
					'role' => 'Administrator'
				);
				$this->session->set_userdata($data_session);
				redirect('Admin');
			}
		}

		$user = $this->auth_db->auth_user($username);
		if(count($user) > 0)
		{
			if (password_verify($password, $user[0]->password))
			{
				$data_session = array
				(
					'username' => $user[0]->username,
					'nama' => $user[0]->nama,
					'status' => 'login',
					'role' => 'User'
				);
				$this->session->set_userdata($data_session);
				$this->log_db->log($user[0]->username, 'login');
				redirect('User');
			}
		}

		redirect('Auth');
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Auth');
	}
}
