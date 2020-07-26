<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('user_model');
	    $this->load->library('form_validation');
	    	
	}
	
	public function my_profile(){

		$model = $this->user_model;
		$data['my_profile'] = $model->user_detail();
		$this->template->load('layouts/main', 'users/profile', $data);

	}

	public function update_profile(){
		$model = $this->user_model;
		$validation = $this->form_validation;

			$model->update();
			$this->session->set_flashdata('success', 'Berhasil di update');
			redirect('users/my_profile');
	}

	public function upload_pic(){

		$model = $this->user_model;
		if ($model->uploadImageOnly()) {
			$url = base_url().''.$this->session->userdata('photo_profile');
				echo '<img src="'.$url.'" class="float-left rounded-circle" style="height:100px; width:100px;">';
			
		}


	}
	
}

 ?>