<?php 

class Member extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('member_model');
		$this->load->library('form_validation');
	}

	public function index($id){
		$model = $this->member_model;
		$data['member'] = $model->getMember($id);
		$data['home_id'] = $id;

		$this->template->load('layouts/main','member/index', $data);
	}

	public function add_modal($id){
		$model = $this->member_model;
		if ($this->input->post()) {
			$model->save($id);
			$this->session->set_flashdata('success' ,'Successfully add home member');
			redirect('member/index/'.$id);
		}
		$data['home_id'] = $id;

		$this->load->view('member/add_modal', $data);
	}

	public function myhome(){
		$model = $this->member_model;

		$data['myhome'] = $model->myHome();

		return $this->template->load('layouts/main','member/myhome', $data);
	}

	public function homeDetail($id){
		$model = $this->member_model;
		$data['home'] = $model->homeDetail($id);
		$data['owner'] = $model->homeOwner($id);

		$this->load->view('member/home_detail', $data);
	}
}

 ?>