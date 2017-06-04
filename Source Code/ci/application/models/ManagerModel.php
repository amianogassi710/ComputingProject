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
	
	public function listAllCustomer(){
		$q=$this->db->get('customer');
		return $q->result();
	}	
	
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
	public function getImage($image){
		$arr=array(
			'filepath'=>$image
		);
		$this->db->insert("images",$arr);
	}
	public function retriveImage($path){
		$this->db->where('id',$path);
		return $this->db->get("images");
	}

	public function insert_data($name, $path_name){
    $data = array(
                  'name'    => $name,
                  'filepath'    => $path_name
                 );
print_r ($data);exit;
    $this->db->insert('images', $data);

    return $this->db->insert_id();
}

function register_user($itemPrice,$image)
    {

          $data= array('name'=>$itemPrice,
        'filepath'=>$image
        );
       $res= $this->db->insert('images', $data); //register is my table name
        return $res;
        var_dump($res);
    }

}
?>