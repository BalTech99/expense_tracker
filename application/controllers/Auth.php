<?php 

class Auth extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		$this->load->library('form_validation');
		if ($this->session->userdata('email')) {
				redirect('dashboard');
			}	

	}

	public function login(){
		$this->load->view('auth/login');
	}

	public function doLogin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');


		$user = $this->db->get_where('users', ['username' => ucfirst($username)])->row_array();
		if ($user) {
			if (password_verify($password, $user['password'])) {
				$this->session->set_userdata($user);
				redirect('dashboard/index');
			}
			else{
				$this->session->set_flashdata('error', 'Invalid username or password');
				redirect('auth/login');
			}
		}
		else{
				$this->session->set_flashdata('error', 'Invalid username or password');
				redirect('auth/login');
				
			
		}

	}

	public function register(){
		$model = $this->user_model;
		$validation = $this->form_validation;

		

		
		$validation->set_rules($model->rules());
		if ($validation->run()) {
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$this->db->where("(username= '".$username."' OR email='".$email."')", NULL, FALSE);
			$check = $this->db->get('users');

			if ($check->row()) {
				$this->session->set_flashdata('error', 'Username or email already taken');
				return redirect('auth/register');
			}
			if ($model->save()) {
				$this->session->set_flashdata('success', 'User Registered please login');
				return redirect('auth/login');
			}
		}

		$this->load->view('auth/register');
	}
}

 ?>