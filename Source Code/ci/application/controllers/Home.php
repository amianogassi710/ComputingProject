<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$this->load->view('Homepage');
	}
	
	public function login()
	{
		$this->load->view('Login');
	}
	
	public function signup()
	{
		$this->load->view('Signup');
	}
	
	public function itemList()
	{
	if($this->session->userdata('customerID')){
		$this->load->view('ItemList');
	} else{
		$this->load->view('Login');
	}
	}
	
	public function addCategory(){
		$this->load->view('AddNewCategory');
	}		
	
	public function updateCategory(){
		$this->load->view('UpdateCategory');
	}	
	
	public function addItem(){
		$this->load->view('AddNewItems');
	}	
	
	public function admin(){
		$this->load->view('AdminDashboard');
	}	
	
	public function updateItems(){
		$this->load->view('UpdateItems');
	}
	
	public function deactivateCustomer(){
		$load=TRUE;
		$data['load']=$load;
		$this->load->view('DeactivateCustomer',$data);
	}
}
