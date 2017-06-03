<?php

class ManagerModel extends CI_Model{
	public function addNewCategory($categoryName){
		$array=array(
			"categoryName"=>$categoryName,
		);
		$this->db->insert("category",$array); //Active Records
		return "Data saved";
	}

	public function listAllCategory(){
		$q=$this->db->get('category');
		return $q->result();
	}
	
	public function findCategory($categoryID){
		$this->db->where("categoryID",$categoryID);
		$result=$this->db->get("category");
		return $result->result();
	}
	
	public function updateCategory($categoryID, $categoryName){
	$arr=array("categoryID"=>$categoryID,
		"categoryName"=>$categoryName);
		$this->db->where("categoryID",$categoryID);
		$this->db->update('category',$arr);
		return "data updated";
	}
	
	public function removeCategory($categoryID){
		$this->db->where("categoryID",$categoryID);
		$result=$this->db->delete("category");
		return "data deleted";
	}
	
	public function addNewItem($itemName,$itemPrice,$categoryID,$itemDescription){
		$array=array(
			"itemName"=>$itemName,
			"itemPrice"=>$itemPrice,
			"categoryID"=>$categoryID,
			"itemDescription"=>$itemDescription
		);
		$this->db->set('date','NOW()',FALSE);
		$this->db->insert("item",$array);
		return "Data saved";
	}
	
	public function listAllItem(){
		$q=$this->db->get('item');
		return $q->result();
	}
	
	public function listAllCustomer(){
		$q=$this->db->get('customer');
		return $q->result();
	}

	public function insertdata(){
		echo "Amam";
	}
}


?>