<?php 

class User_model extends CI_Model {

	private $table = "users";
	public $id;
	public $first_name;
	public $last_name;
	public $email;
	public $username;
	public $password;
	public $photo_profile;

	public function rules(){
		return [
            ['field' => 'first_name',
            'label' => 'First Name',
            'rules' => 'required'],

            ['field' => 'last_name',
            'label' => 'Last Name'],
            
            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required'],

            ['field' => 'username',
            'label' => 'Username',
            'rules' => 'required'],

            ['field' => 'password',
            'label' => 'Password',
            'rules' => 'required'],
        ];
	}

	

	public function save(){
		$post = $this->input->post();
		
		
		$this->id = uniqid();
		$this->first_name = isset($post['first_name']) ? $post['first_name'] : null;
		$this->last_name = isset($post['last_name']) ? $post['last_name'] : null;
		$this->email = isset($post['email']) ? ucfirst($post['email']) : null;
		$this->username = isset($post['username']) ? ucfirst($post['username']) : null;
		$this->password = isset($post['password']) ? password_hash($post['password'], PASSWORD_DEFAULT) : null;
		$this->photo_profile = "upload/photo_profile/default.png";

		return $this->db->insert($this->table, $this);
	}

	public function user_detail(){
		$id = $this->session->userdata['id'];
		$query = $this->db->get($this->table, ['user_id' => $id]);

		return $query->row();
	}

	public function update(){
		$id = $this->session->userdata['id'];
		$post = $this->input->post();
		$data = [];

		$data = [
			'id' => $this->session->userdata('id'),
			'first_name' => isset($post['first_name']) ? $post['first_name'] : null,
			'last_name' => isset($post['last_name']) ? $post['last_name'] : null,
			'email' => isset($post['email']) ? $post['email'] : null,
			'username' => isset($post['username']) ? $post['username'] : null,
		];
		$this->session->set_userdata($data);

		$this->db->where('id', $id);
		return $this->db->update($this->table, $data);
		
	}

	private function _uploadImage()
{
    $config['upload_path']          = 'upload/photo_profile/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['file_name']            = $this->username.''.uniqid();
    $config['overwrite']			= true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('file')) {
        return $config['upload_path'].''.$this->upload->data("file_name");
    }
    
    print_r($this->upload->display_errors());	
}

public function uploadImageOnly(){

	$photo = $this->_uploadImage();
	$query = "UPDATE users SET photo_profile = '".$photo."' WHERE id = '".$this->session->userdata('id')."' ";
	$this->db->query($query);
	$this->session->unset_userdata('photo_profile');
    $this->session->set_userdata('photo_profile', $photo);

	return true;
}

	

}

 ?>