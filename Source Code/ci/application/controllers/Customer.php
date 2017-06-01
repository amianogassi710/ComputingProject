<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function register(){
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('firstname', 'Firstname', 'required|trim|max_length[20]');
		$this->form_validation->set_rules('lastname', 'Lastname', 'required|max_length[15]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|max_length[40]');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[7]|max_length[20]|is_unique[customer.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[7]|max_length[15]');
		$this->form_validation->set_rules('mobilenumber', 'Mobile Number', 'required|numeric|exact_length[10]');
		$this->form_validation->set_rules('district', 'District', 'required');
		$this->form_validation->set_rules('street', 'Street', 'required|max_length[50]');
		
		if($this->form_validation->run()){
			$firstname=$this->input->post('firstname');
			$lastname=$this->input->post('lastname');
			$email=$this->input->post('email');
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$mobilenumber=$this->input->post('mobilenumber');
			$district=$this->input->post('district');
			$street=$this->input->post('street');		
			
			$this->load->model('CustomerModel');
			
			$data['CustomerMessage']=$this->CustomerModel->getRegister
							($firstname,$lastname,$email,$username,$password,
							$mobilenumber,$district,$street);
							
			$this->load->view('Login');
		} else {
			echo validation_errors();
		}
	}	
	
	public function login(){ 
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'UserName', 'required|trim|min_length[7]|max_length[20]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[7]|max_length[15]');
		
		if($this->form_validation->run()){
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			
			$this->load->model('CustomerModel');
			
			$loginID=$this->CustomerModel->checkLogin($username,$password);
			if($loginID){
				if($loginID==1){
					echo "admin";
				} else{
					$this->load->library('session');
					$this->session->set_userdata('customerID',$loginID);
					return redirect('Home/itemList');
				}
			} else {
				echo ("Password not match");
			}
		} else {
			$this->load->view('Login');
		}
	}
	
}

?>