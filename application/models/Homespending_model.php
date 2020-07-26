<?php 

class Homespending_model extends CI_Model{

	private $table ="home_spending";
	public $id;
	public $home_id;
	public $user_id;
	public $date;
	public $item_name;
	public $total;


	public function save(){
		$post = $this->input->post();
		$this->id = uniqid();
		$this->home_id = $post['home_id'];
		$this->user_id = $this->session->userdata('id');
		$this->date = date("Y-m-d");
		$this->item_name = $post['item_name'];
		$this->total = $post['total'];


		return $this->db->insert($this->table, $this);
	}
}


 ?>