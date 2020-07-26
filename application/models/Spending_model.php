<?php 

class Spending_model extends CI_Model{

	private $table = "spending";
	public $id;
	public $date;
	public $item_name;
	public $total;
	public $user_id;
	public $created_at;
	public $updated_at;

	public function rules(){
		return [
            ['field' => 'item_name',
            'label' => 'Item Name',
            'rules' => 'required'],
            
            ['field' => 'total',
            'label' => 'Total',
            'rules' => 'required']
        ];
	}

	public function my_list(){
		$id = $this->session->userdata['id'];
		$query = $this->db->query('SELECT * FROM '.$this->table.' WHERE user_id = "'.$id.'" AND date = CURDATE() ');
		return $query->result();
	}

	public function save(){
		$post = $this->input->post();

		$this->id = uniqid();
		$this->date = date("Y-m-d");
		$this->item_name = isset($post['item_name']) ? $post['item_name'] : null;
		$this->total = isset($post['total']) ? $post['total'] : null;
		$this->user_id = $this->session->userdata['id'];
		$this->created_at = date("Y-m-d H:i:s");

		$this->db->insert($this->table, $this);
		return true;


	}

	public function update($id){
		$post = $this->input->post();

		$data = [];
		$data = [
			'item_name' => $post['item_name'],
			'total' => $post['total']
		];

		$this->db->where('id',$id);
		return $this->db->update($this->table, $data);
	}
	public function findById($id){
		return $this->db->get_where($this->table, ['id' => $id])->row();
	}

	public function delete($id){
		return $this->db->delete($this->table, ['id' => $id]);
	}

	public function homeList(){
		$user_id = $this->session->userdata('id');

		$this->db->select('home.id, home.home_name');
		$this->db->from('home_member');
		$this->db->join('home', 'home.id = home_member.home_id');
		$this->db->where("home_member.participant = '".$user_id."' ");
		$query = $this->db->get();

		return $query->result();
	}
}

 ?>