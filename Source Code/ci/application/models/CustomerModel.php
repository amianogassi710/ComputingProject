<?php

class CustomerModel extends CI_Model{
	public function getRegister($firstname,$lastname,$email,$username,
				$password,$mobilenumber,$district,$street){
		$array=array(
			"customerFirstName"=>$firstname,
			"customerLastName"=>$lastname,
			"email"=>$email,
			"username"=>$username,
			"password"=>$password,
			"mobileNumber"=>$mobilenumber,
			"district"=>$district,
			"street"=>$street
		);
		$this->db->insert("customer",$array); //Active Records
		return "Data saved";
	}
	
	public function checkLogin ($username,$password){
		$query=$this->db->where(['username'=>$username,'password'=>$password])->get('customer');
		if($query->num_rows()){
			return $query->row()->customerID;
		} else {
			return FALSE;
		}
	}
	
}


?>