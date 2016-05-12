<?php class User extends CI_Model{

	function getUser($username, $password){
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query =  $this->db->get('user');
		return $query->result();
	}

	function getAll_users(){
		$query =  $this->db->get('user');
		return $query->result();	
	}

	function getAllPhotographers(){
		$this->db->where('user_type', 'p');
		$query =  $this->db->get('user');
		return $query->result();	
	}

	function addUser($userData){
		$this->db->insert('user', $userData);
		if ($this->db->affected_rows()	>0){
			return $this->db->insert_id();
		}
		
			return false;
	}
	function getPhotographerById($id){
		$this->db->where('user_type', 'p');
		$this->db->where('user_id', $id);
		$query =  $this->db->get('user');
		return $query->row();	
	}
}
?>