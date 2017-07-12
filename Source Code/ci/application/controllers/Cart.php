<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	// Show Items Of Cart
	public function viewCartDetails(){
		$sessionData=$this->session->userdata('customerID');
		if($sessionData!=''){
			$this->load->model('CartModel');
			
			$cartItem=$this->CartModel->viewItemsInCart
							($sessionData);
			$this->load->view('MyCart',['cartItem'=>$cartItem]);
		} else{
			redirect('Customer/Login');
		}
	}
	
	// Delete Items From Cart
	public function deleteCartItem($orderID){
		$sessionData=$this->session->userdata('customerID');
		if($sessionData!=''){
			$this->load->model('CartModel');
			$check=$this->CartModel->deleteItemInCart($orderID);
			redirect(site_url('Cart/viewCartDetails'));
		} else{
			redirect('Customer/Login');
		}	
	}
	
	// Update Item In Cart
	public function updateCartItem(){
		$sessionData=$this->session->userdata('customerID');
		if($sessionData!=''){
			$itemQuantity=$this->input->post('itemQuantity');
			$cartID=$this->input->post('orderID');
			$this->load->model('CartModel');
			$check=$this->CartModel->updateItemInCart($cartID,$itemQuantity);
			if ($check){
				redirect(site_url('Cart/viewCartDetails'));
			} else{
				echo "<script>
						alert('Cart Not Updated');
						window.location.href='viewCartDetails';
					</script>";
			}
		} else{
			redirect('Customer/Login');
		}	
		
	}
	
	// Generate Invoice
	public function generateInvoice(){
		$sessionData=$this->session->userdata('customerID');
		if($sessionData!=''){		
			$this->load->model('CartModel');
			$data[]=$this->CartModel->confirmUserOrder($sessionData);
			$data['records']=$this->CartModel->generateBill($sessionData);
			$datas['record']=$this->CartModel->generateTotal($sessionData);
			$all=$data + $datas;
			$this->load->view('orderedOut',$all);
		} else{
			redirect('Customer/Login');
		}
	}
}

?>