<?php 

class Home extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('home_model');
		$this->load->library('form_validation');

	}

	public function index(){
		$model = $this->home_model;

		$data['myhome'] = $model->list();
		return $this->template->load('layouts/main', 'home/index', $data);

	}

	public function add_modal(){
		$model = $this->home_model;
		$validation = $this->form_validation;

		$validation->set_rules($model->rules());
		if ($this->input->post()) {
			$model->save();
			
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect('home/index');
		}

		$this->load->view('home/add_modal');
	}
}


 ?>