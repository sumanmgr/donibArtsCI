<?php class User extends CI_Model{

	function getUser($username, $password){
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query =  $this->db->get('user');
		return $query->result();
	}
	
	function getUserById($user_id){
		$this->db->where('user_id', $user_id);
		$query =  $this->db->get('user');
		return $query->row();
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
	
	function getOtherDetail($user){
		$table  = ($user->user_type == 'p') ? 'photographer' : 'customer';
			$this->db->where('user_id', $user->user_id);
			return $this->db->get($table)->row();
	}

	function addUser($userData){
		$this->db->insert('user', $userData);
		if ($this->db->affected_rows()	>0){
			$newUser = $this->db->insert_id();
			if($userData['user_type'] == 'p'){
				$this->db->insert('gallery', array('gallery_name'=>'Portfolio', 'photographer_id'=>$newUser));
				if ($this->db->affected_rows()	>0){
					$galleryId =  $this->db->insert_id();
					$this->db->insert('portfolio', array('PID'=>$newUser, 'galleryID'=>$galleryId));
				}
				
				$this->db->insert('photographer', array('experties'=>'', 'user_id'=> $newUser));
			}
			
			
			if($userData['user_type'] == 'c'){
				$this->db->insert('customer', array('reward_point'=>5, 'user_id'=>$newUser));
			}
			return $newUser;;
		}
		
			return false;
	}
	function updateUser($userData, $user, $datavalue){
		$this->db->where('user_id', $user->user_id);
		$this->db->update('user', $userData);
		$return = TRUE;
		if ($this->db->affected_rows()	>0){
			$return = TRUE;
		}
			if($user->user_type == 'p'){
				$this->db->set('experties', $datavalue['experties']);
				$this->db->set('perHourRate', $datavalue['perHourRate']);
				$this->db->where('user_id',$user->user_id);
				$this->db->update('photographer');
			}
			if($user->user_type == 'c'){
				$this->db->set('refrence', $datavalue);
				$this->db->where('user_id',$user->user_id);
				$this->db->update('customer' );
			}
		
		if ($this->db->affected_rows()	>0){
			$return = TRUE;
		}
			return $return;
	}
	function getPhotographerById($id){
		$this->db->where('user_type', 'p');
		$this->db->where('user_id', $id);
		$query =  $this->db->get('user');
		return $query->row();	
	}
	
	function getRewardData($userId){
		$this->db->where('user_id', $userId);
		$query =  $this->db->get('customer');
		$rewardPoint =  $query->row();	
		return $rewardPoint;
	}

	function getUserByUsername($username){
		$this->db->where('username', $username);
		return $this->db->get('user')->result();
	}
}
?>