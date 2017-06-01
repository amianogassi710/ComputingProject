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
		$this->load->view('ItemList');
	}
	
	public function addCategory(){
		$this->load->view('AddNewCategory');
	}	
	
	public function selectCategory(){
		$this->load->controller('Manager/selectCategory');
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
}
