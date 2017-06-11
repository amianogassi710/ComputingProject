<?php

class CustomerModel extends CI_Model{
	
	// Register User
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
	
	// Customer Login
	public function checkLogin ($username,$password){
		$query=$this->db->where(['username'=>$username,'password'=>$password])->get('customer');
		if($query->num_rows()){
			return $query->row()->customerID;
		} else {
			return FALSE;
		}
	}
	
	// Show Menu For Customer	
	function get_city($limit, $start, $st = "", $orderField, $orderDirection)
    {
        
        $query = $this->db->select('*')
						->from('item')
						->join('category','category.categoryID=item.categoryID')
						->or_like('item.itemName', $st)
						->or_like('category.categoryName', $st)
						// ->or_like('item.itemDescription', $st)
						->limit($limit, $start)
						->order_by($orderField, $orderDirection)
						->get();
        return $query->result();
        
    }

    function count_city($limit, $start, $st = "", $orderField, $orderDirection)
    {
        
		$query = $this->db->select('*')
						->from('item')
						->join('category','category.categoryID=item.categoryID')
						->or_like('item.itemName', $st)
						->or_like('category.categoryName', $st)
						// ->or_like('item.itemDescription', $st)
						->order_by($orderField, $orderDirection)
						->get();
        return $query->num_rows();
	}
	
	// Add Items To Cart
	public function addItemToCart($sessionData,$itemID){
		echo $sessionData;
		echo "<br>";
		//echo $itemID;
		echo "<br>";
		$array=array(
			"customerID"=>$sessionData,
			"itemID"=>$itemID
		);
	    $this->db->set('dateAdded', 'NOW()', FALSE);
	    $this->db->set('timeAdded', 'NOW()', FALSE);
		$this->db->insert("cart",$array); //Active Records
		return "Data saved";
	}
	
	public function updateUserProfile($sessionData){
		$this->db->where("customerID",$sessionData);
		$result=$this->db->get("customer");
		return $result->result();
	}
	
	public function updateCustomerProfile($customerID,$firstname,$lastname,$email,$username,
				$mobilenumber,$district,$street){
		$array=array(
			"customerFirstName"=>$firstname,
			"customerLastName"=>$lastname,
			"email"=>$email,
			"username"=>$username,
			"mobileNumber"=>$mobilenumber,
			"district"=>$district,
			"street"=>$street
		);
		$this->db->where("customerID",$customerID);
		$this->db->update('customer',$array);
		return "data updated";
	}

}


?>