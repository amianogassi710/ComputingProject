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
		
	public function addCategory(){
		$sessionData=$this->session->userdata('customerID');
		if($sessionData!=''){	
			$this->load->view('AddNewCategory');
		} else{
			redirect('Customer/Login');
		}
	}		
	
	public function deactivateCustomer(){
		$load=TRUE;
		$data['load']=$load;
		$this->load->view('DeactivateCustomer',$data);
	}
	
	public function adminDashboard(){
		$sessionData=$this->session->userdata('customerID');
		if($sessionData!=''){	
			$this->load->view('AdminDashboard');
		} else{
			redirect('Customer/Login');
		}
	}
	
	public function viewTransaction(){
		$load=TRUE;
		$data1['load']=$load;
		$this->load->view('ViewTransaction',$data1);
	}
	
	
	
}
