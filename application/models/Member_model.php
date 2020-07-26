<?php 

class Member_model extends CI_Model {

	private $table ="home_member";
	public $id;
	public $home_id;
	public $participant;
	public $created_at;


	public function getMember($id){

		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('users', 'users.id = home_member.participant');
		$this->db->where("home_member.home_id = '".$id."' ");
		$query = $this->db->get()->result();
		return $query;
	}

	public function save($id) {
	  $post = $this->input->post();
	  $user = $this->db->get_where('users', ['email' => $post['participant']])->row();
	  if ($user) {
	  	$check = $this->db->get_where($this->table, ['participant' => $user->id, 'home_id' => $id])->row();
	  	if ($check) {
	  		$this->session->set_flashdata('error', 'participant already in this home');
			return redirect('member/index/'.$id);
	  	}
	  	else{
	  		  $this->id = uniqid();
			  $this->participant = $user->id;
			  $this->home_id = $id;
			  $this->created_at = date("Y-m-d H:i:s");

			  return $this->db->insert($this->table, $this);
	  	}
	  }
	  else{
	  	$this->session->set_flashdata('error', 'email not registered');
			return redirect('member/index/'.$id);
	  }

	 

	  
	}

	public function myHome(){
		$user_id = $this->session->userdata('id');

		$this->db->select("*");
		$this->db->from($this->table);
		$this->db->join('users','users.id = home_member.participant');
		$this->db->join('home','home.id = home_member.home_id');
		$this->db->where("home_member.participant = '".$user_id."' ");
		$query = $this->db->get();
		return $query->result();
	}
	public function homeDetail($id) {
		$this->db->select("*");
		$this->db->from($this->table);
		$this->db->join('users', 'users.id = home_member.participant');
		$this->db->where("home_member.home_id = '".$id."' ");
		$query = $this->db->get();

		return $query->result();

	}

	public function homeOwner($id){
		$this->db->select("*");
		$this->db->from("home");
		$this->db->join("users","users.id = home.owner_id ");
		$this->db->where("home.id = '".$id."' ");
		$query = $this->db->get();
		return $query->row();
	}
}

 ?>