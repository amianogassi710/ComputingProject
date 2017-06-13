<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	// Show Items Of Cart
	public function viewCartDetails(){
		// echo "Aman"; exit;
		$sessionData=$this->session->userdata('customerID');
		if($sessionData!=''){
			$this->load->model('CartModel');
			
			$cartItem=$this->CartModel->viewItemsInCart
							($sessionData);
			// redirect(site_url('Customer/listItem'));	
		$this->load->view('MyCart',['cartItem'=>$cartItem]);
			
		} else{
			redirect('Customer/Login');
		}
	}
	
	// Delete Items From Cart
	public function deleteCartItem($cartID){
		$this->load->model('CartModel');
		$check=$this->CartModel->deleteItemInCart($cartID);
		if ($check){
			redirect(site_url('Cart/viewCartDetails'));
		} else{
			echo "Not done";
		}
	}
	
	// Update Item In Cart
	public function updateCartItem(){
		$itemQuantity=$this->input->post('itemQuantity');
		$cartID=$this->input->post('cartID');
		$this->load->model('CartModel');
		$check=$this->CartModel->updateItemInCart($cartID,$itemQuantity);
		if ($check){
			redirect(site_url('Cart/viewCartDetails'));
		} else{
			echo "Not done";
		}
	}
	
	
	public function generateInvoice(){
		$sessionData=$this->session->userdata('customerID');
		if($sessionData!=''){
			$this->load->model('CartModel');
			
			$data['records']=$this->CartModel->generateBill($sessionData);
			$datas['record']=$this->CartModel->generateTotal($sessionData);
			$all=$data + $datas;
			$this->load->view('orderedOut',$all);
			
		} else{
			echo "sorry";
		}
	}
}

?>