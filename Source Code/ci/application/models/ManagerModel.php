<?php

class ManagerModel extends CI_Model{
	
	// Add New Category
	public function addNewCategory($categoryName){
		$array=array(
			"categoryName"=>$categoryName,
		);
		$this->db->insert("category",$array); //Active Records
		return "Data saved";
	}
	
	// Select All Category
	public function listAllCategory(){
		$q=$this->db->get('category');
		return $q->result();
	}

	// Update Category	
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
	
	// Delete Category
	public function removeCategory($categoryID){
		$this->db->where("categoryID",$categoryID);
		$result=$this->db->delete("category");
		return "data deleted";
	}
	
	// Add New Items
	public function addNewItems($itemName,$itemImage,$itemPrice,$categoryID,$itemDescription){
		$arr=array(
			"itemName"=>$itemName,
			"itemImage"=>$itemImage,
			"itemPrice"=>$itemPrice,
			"categoryID"=>$categoryID,
			"itemDescription"=>$itemDescription
		);
		$this->db->set('date','NOW()',FALSE);
		$this->db->insert("item",$arr);
	}
	
	// List All Items with Category
	public function listAllItem(){
		$q=$this->db->get('item');
		return $q->result();
	}
		
	// List All Customers
	public function listAllCustomer(){
		$q=$this->db->get('customer');
		return $q->result();
	}

	// Update Items
	public function searchItem($itemID){
		$this->db->select('*');
		$this->db->from('item');
		$this->db->join('category','category.categoryID=item.categoryID');
		$this->db->where('itemID',$itemID);

		$query = $this->db->get();
		return $query->result();
	}
	
	public function findItem($itemID){
		$this->db->where("itemID",$itemID);
		$result=$this->db->get("item");
		return $result->result();
	}
	
	public function updateItem($itemID,$itemName,$itemPrice,$itemDescription){
	$arr=array("itemID"=>$itemID,
				"itemName"=>$itemName,
				"itemPrice"=>$itemPrice,
				"itemDescription"=>$itemDescription,
			);
		$this->db->where("itemID",$itemID);
		$this->db->update('item',$arr);
		return "data updated";
	}
	
	
	// List All Items with Category	
	public function loadItemWithCategory($fullname){
		$this->db->select('itemName');
		$this->db->from('item');
		$this->db->join('category', 'category.categoryID = item.categoryID');
		$this->db->where('category.categoryName',$fullname);

		$query = $this->db->get();
		return $query->result();	
	}
	
	
	
	

	public function insertdata(){
		echo "Amam";
	}
	
	public function retriveImage($path){
		$this->db->where('id',$path);
		return $this->db->get("images");
	}

}
?>