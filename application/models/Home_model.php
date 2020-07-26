<?php 

class Home_model extends CI_Model {

	private $table = "home";
	public $id;
	public $owner_id;
	public $home_name;
	public $home_desc;
	public $created_at;
	public $updated_at;

	public function rules(){

		return [
			['field'=> 'home_name', 'label' => 'Home Name', 'rules' => 'required'],
			['field'=> 'home_desc', 'label' => 'Home Description', 'rules' => 'required']

		];
	}

	public function list(){
		$user_id = $this->session->userdata('id');
		return $this->db->get_where($this->table, ['owner_id' => $user_id])->result();
	}

	public function save(){
		$post = $this->input->post();
		$this->id = uniqid();
		$this->owner_id = $this->session->userdata('id');
		$this->home_name = isset($post['home_name']) ? $post['home_name'] : null;
		$this->home_desc = isset($post['home_desc']) ? $post['home_desc'] : null;
		$this->created_at = date("Y-m-d H:i:s");

		$this->db->insert($this->table, $this);

		$data = [
			'id' => uniqid(),
			'home_id' => $this->id,
			'participant' => $this->owner_id,
			'created_at' => date("Y-m-d H:i:s")

		];

		$this->db->insert('home_member', $data);

	


	}
}

 ?>