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
		$arr=array(
				"categoryID"=>$categoryID,
				"categoryName"=>$categoryName
			);
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
	
	// Delete Item
	public function searchItemsWithCategory($categoryID){
		$this->db->select('*');
		$this->db->from('item');
		$this->db->where('categoryID',$categoryID);

		$query = $this->db->get();
		return $query->result();
	}
	
	public function removeItem($itemID){
		$this->db->where("itemID",$itemID);
		$result=$this->db->delete("item");
		return "data deleted";
	}
	//Aman
	
	// List All Customers
	public function listAllCustomer(){
		$q=$this->db->get('customer');
		return $q->result();
	}

	// Deactivate Customer
	public function searchSpecificCustomer
				($customerID,$customerFirstName,$customerLastName){
		$this->db->select('*');
		$this->db->from('customer');
		$this->db->where('customerID',$customerID);
		$this->db->or_where('customerFirstName',$customerFirstName);
		$this->db->or_where('customerLastName',$customerLastName);

		$query = $this->db->get();
		return $query->result();
	}
	
	public function deactivateCustomer($customerID){
		$this->db->where('customerID',$customerID);
		$result=$this->db->delete("customer");
		return "data deleted";
	}
	
	// Change Item Status
	public function checkItemStatus(){
		$this->db->select('*');
		$this->db->from('item');
		$query = $this->db->get();
		return $query->result();	
	}
	
	public function changeItemStatus($itemID,$itemStatus){
		$arr=array("itemID"=>$itemID,
				"itemStatus"=>$itemStatus
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
	
	// View Customer Order
	public function viewCustomerOrder(){
		$this->db->select('*');
		$this->db->from('orders');
		$this->db->where('confirmUserOrder','Yes');
		
		
		$this->db->order_by("customerID");
		$query = $this->db->get();
		return $query->result();
	}
		
	function getItem($limit, $start, $st = "", $orderField, $orderDirection)
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

    function countItem($limit, $start, $st = "", $orderField, $orderDirection)
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
	
	// Update Item Status
	public function updateItemStatus($deliverStatus,$paymentStatus,$orderID){
		$arr=array("orderID"=>$orderID,
		"deliveryStatus"=>$deliverStatus,
		"paymentStatus"=>$paymentStatus);
		$this->db->set('statusUpdatedTime','NOW()',FALSE);
		$this->db->where("orderID",$orderID);
		$this->db->update('orders',$arr);
		return "data updated";
	}
	
	public function confirmOrder($orderID){
		$this->db->where("orderID",$orderID);
		$result=$this->db->delete("orders");
		return "data deleted";
	}

	// View Customer Order History
	public function viewCustomerOrderHistory(){
		$this->db->select('*');
		$this->db->from('ordershistory');		
		$query = $this->db->get();
		return $query->result();
	}

	public function viewPaymentTransaction($Sdate,$Edate){
		$this->db->select('*');
// $this->db->select_sum('totalAmount');

		$this->db->from('orders');		
		$this->db->where('dateAdded >=', $Sdate);
		$this->db->where('dateAdded <=', $Edate);
		$result= $this->db->get();
		return $result->result();

	
		
}

}	

?>