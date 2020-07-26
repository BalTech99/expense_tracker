<?php 

class Dashboard extends CI_Controller{


	public function __construct(){

		parent::__construct();
		
		$this->load->model('user_model');
		$this->load->model('spending_model');
	    $this->load->library('form_validation');
	    if (!$this->session->userdata('email')) {
	    	redirect('auth/login');
	    }
	    
	}

	public function index(){
		$this->template->set('title', 'Dasboard Page');
		$spending_model = $this->spending_model;
		$user_id = $this->session->userdata('id');

		$data['my_spending'] = $spending_model->my_list();
		$data['dailyTotal'] = $this->_dailyTotal($user_id);
		$data['monthlyTotal'] = $this->_monthlyTotal($user_id);
		$data['yearlyTotal'] = $this->_yearlyTotal($user_id);
		$data['overallTotal'] = $this->_overallTotal($user_id);
		$data['dailyChart'] = $this->_dailyChart($user_id);

		
		return $this->template->load('layouts/main', 'dashboard/index',$data);

	}

	

	
	

	public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect('auth/login');
    }

    private function _dailyTotal($user_id){
		$query = $this->db->query("SELECT SUM(total) AS total FROM spending WHERE date = CURRENT_DATE() AND user_id = '".$user_id."' GROUP BY user_id");
		return $query->row();
	}
	private function _monthlyTotal($user_id){
		$query = $this->db->query("SELECT SUM(total) AS total FROM spending WHERE MONTH(date) = MONTH(CURRENT_DATE()) AND user_id = '".$user_id."' GROUP BY user_id");
		return $query->row();
	}
	private function _yearlyTotal($user_id){
		$query = $this->db->query("SELECT SUM(total) AS total FROM spending WHERE EXTRACT(YEAR FROM date) = EXTRACT(YEAR FROM CURRENT_DATE()) AND user_id = '".$user_id."' GROUP BY user_id");
		return $query->row();
	}
	private function _overallTotal($user_id){
		$query = $this->db->query("SELECT SUM(total) AS total FROM spending WHERE user_id = '".$user_id."' GROUP BY user_id");
		return $query->row();
	}

	private function _dailyChart($user_id){
		$query = $this->db->query("SELECT date, SUM(total) AS total FROM spending WHERE user_id = '".$user_id."' GROUP BY date");
		return json_encode($query->result());
	}


}

 ?>