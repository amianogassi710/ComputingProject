<?php

class CartModel extends CI_Model{
	
	// Show Items Of Cart
	public function viewItemsInCart($sessionData){
		$this->db->where("customerID",$sessionData);
		$this->db->order_by("orderID");
		$result=$this->db->get("orders");
		return $result->result();
	}
	
	// Delete Items From Cart
	public function deleteItemInCart($cartID){
		$this->db->where('cartID',$cartID);
		$result=$this->db->delete("cart");
		return "data deleted";
	}

	// Update Item in Cart
	public function updateItemInCart($cartID, $itemQuantity){
		$arr=array("cartID"=>$cartID,
			"quantity"=>$itemQuantity
				);
	    $this->db->set('dateAdded', 'NOW()', FALSE);

	    $this->db->set('timeAdded', 'NOW()', FALSE);
		$this->db->where("cartID",$cartID);
		$this->db->update('cart',$arr);
		return "data updated";
	}
	
	// Generate Invoice
	public function generateBill($sessionData){
		$this->db->select('*');
		$this->db->from('orders');
		$this->db->where("customerID", $sessionData);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function generateTotal($sessionData){
		$this->db->select('sum(totalAmount) as Total');
		$this->db->from('orders');
		$this->db->where("customerID", $sessionData);
		$query = $this->db->get();
		return $query->result();
	}
	
	
	public function confirmUserOrder($sessionData){
		$array=array(
			"confirmUserOrder"=>'Yes',
		);
		$this->db->where("customerID",$sessionData);
		$this->db->update("orders",$array); //Active Records
		return "Data saved";
	}
}

?>