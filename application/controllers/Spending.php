<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Spending extends CI_Controller{
 public $CI = NULL;
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata('email')) {
	    	redirect('dashboard/login');
	    }
		$this->load->model('spending_model');
		$this->load->model('homespending_model');
	    $this->load->library('form_validation');
	    $this->CI = & get_instance();
	    
	}

	public function index(){
		$user_id = $this->session->userdata('id');
		$data['daily'] = $this->_daily($user_id); 
		$data['monthly'] = $this->_monthly($user_id); 
		$data['yearly'] = $this->_yearly($user_id); 
		return $this->template->load('layouts/main', 'spending/index', $data);
		

	}

	public function add_modal(){

		$model = $this->spending_model;
		$validation = $this->form_validation;
		$data['home'] = $model->homeList();
		$validation->set_rules($model->rules());
		if ($validation->run()) {
			$model->save();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect("dashboard/index");
			
		
		}
		

		$this->load->view('spending/add', $data);
	}
	public function update($id){
		$model = $this->spending_model;
		$validation = $this->form_validation;
		$validation->set_rules($model->rules());
			if ($this->input->post()) {
				$model->update($id);
			$this->session->set_flashdata('success', 'Berhasil diupdate');
			redirect("dashboard/index");
			}
		$data['spending'] = $model->findById($id);
		$this->load->view('spending/update_modal',$data);
	}

	public function add_home_modal(){
		$model = $this->homespending_model;
		if ($this->input->post()) {
			$model->save();
			redirect('dashboard/index');
		}
	}

	public function delete($id){
		$model = $this->spending_model;
		$model->delete($id);
			$this->session->set_flashdata('success', 'Berhasil dihapus');
		
		
		
	}

	private function _daily($user_id){
		$query = $this->db->query("SELECT date, SUM(total) AS total FROM spending WHERE user_id = '".$user_id."' GROUP BY date");
		return $query->result();
	}
	private function _monthly($user_id){
		$query = $this->db->query("SELECT MONTHNAME(date) AS month_name, SUM(total) AS total FROM spending WHERE user_id = '".$user_id."' GROUP BY month_name");
		return $query->result();
	}

	private function _yearly($user_id){
		$query = $this->db->query("SELECT YEAR(date) AS year, SUM(total) AS total FROM spending WHERE user_id = '".$user_id."' GROUP BY year");
		return $query->result();
	}
	public function allList(){
		$this->template->load('layouts/main', 'spending/myspending/all');

	}

	public function tableAll($start = null, $end = null){
		$user_id = $this->session->userdata('id');
		if ($start != null || $end != null) {
		$query = $this->db->query("SELECT * FROM spending WHERE user_id = '".$user_id."' AND date >= '".$start."'  AND date <= '".$end."'  ORDER BY id DESC ");

		$data['start'] = $start;
		$data['end'] =  $end;
			
		}
		else{
		$query = $this->db->query("SELECT * FROM spending WHERE user_id = '".$user_id."'  ORDER BY id DESC  	");

		}
		$data['allList'] = $query->result();

		$this->load->view('spending/myspending/table_all', $data);

	}

	public function tableAllDaily($start = null, $end = null){
		$user_id = $this->session->userdata('id');
		if ($start != null || $end != null) {
		$query = $this->db->query("SELECT date, SUM(total) AS total FROM spending WHERE user_id = '".$user_id."' AND date >= '".$start."'  AND date <= '".$end."'   GROUP BY date");

		$data['start'] = $start;
		$data['end'] =  $end;

		
			
		}
		else{
		$query = $this->db->query("SELECT date, SUM(total) AS total FROM spending WHERE user_id = '".$user_id."' GROUP BY date");

		}
		$data['allTotalDaily'] = $query->result();
		$this->load->view('spending/myspending/table_daily', $data);

	}

	public function printDaily($start = null, $end = null){
    	$user_id = $this->session->userdata('id');

		if ($start != null || $end != null) {
		$query = $this->db->query("SELECT * FROM spending WHERE user_id = '".$user_id."' AND date >= '".$start."'  AND date <= '".$end."'  ORDER BY id DESC ");

		}
		else{
		$query = $this->db->query("SELECT * FROM spending WHERE user_id = '".$user_id."'  ORDER BY id DESC  	");

		}

		$start_date = isset($start) ? $start : '';
		$end_date = isset($end) ? $end : '';
 		
    	$mpdf = new mPDF();
    	$data['daily'] = $query->result();
		$html = $this->load->view('spending/pdf/daily',$data,true);
    	$mpdf->SetTitle('My Daily Total Spending');
		$mpdf->WriteHTML($html);
		$mpdf->Output('My Daily Total Spending '.$start.' '.$end.' .pdf','D');
	}

	public function printDailyTotal($start = null, $end = null){
    	$user_id = $this->session->userdata('id');
    	if ($start != null || $end != null) {
		$query = $this->db->query("SELECT date, SUM(total) AS total FROM spending WHERE user_id = '".$user_id."' AND date >= '".$start."'  AND date <= '".$end."'   GROUP BY date");


		
			
		}
		else{
		$query = $this->db->query("SELECT date, SUM(total) AS total FROM spending WHERE user_id = '".$user_id."' GROUP BY date");

		}
		$data['allTotalDaily'] = $query->result();

		$start_date = isset($start) ? $start : '';
		$end_date = isset($end) ? $end : '';
 		
    	$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('spending/pdf/dailyTotal',$data,true);
    	$mpdf->SetTitle('My Daily Total Spending');
		$mpdf->WriteHTML($html);
		$mpdf->Output('My Daily Total Spending '.$start.' '.$end.' .pdf','D');

	}

	public function printMonthly(){
		$user_id = $this->session->userdata('id');
		$data['monthly'] = $this->_monthly($user_id);

		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('spending/pdf/monthly',$data,true);
    	$mpdf->SetTitle('My Monthly Total Spending');
		$mpdf->WriteHTML($html);
		$mpdf->Output('My Monthly Total Spending.pdf','D');


	}

	public function printYearly(){
		$user_id = $this->session->userdata('id');
		$data['yearly'] = $this->_yearly($user_id);

		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('spending/pdf/yearly',$data,true);
    	$mpdf->SetTitle('My Yearly Total Spending');
		$mpdf->WriteHTML($html);
		$mpdf->Output('My Yearly Total Spending.pdf','D');


	}

	

}

 ?>