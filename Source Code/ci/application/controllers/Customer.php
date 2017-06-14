<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	// Register User
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
	
	// Customer Login
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
					$this->session->set_userdata('customerID',$loginID);
					$this->session->set_userdata('username',$username);
					return redirect('Home/adminDashboard');
				} else{
					$this->session->set_userdata('customerID',$loginID);
					$this->session->set_userdata('username',$username);
					return redirect('Customer/viewItem');
				}
			} else {
				echo ("Password not match");
			}
		} else {
			$this->load->view('Login');
		}
	}
	
	// Show Menu For Customer
	public function viewItem(){
		$sessionData=$this->session->userdata('customerID');
		if($sessionData!=''){	
		
			$this->load->library('pagination');
			$this->load->model('CustomerModel');


			$config['base_url'] = base_url('Customer/viewItem');
			
			$config['per_page'] = ($this->input->get('limitRows')) ? $this->input->get('limitRows') : 10;
			$config['enable_query_strings'] = TRUE;
			$config['page_query_string'] = TRUE;
			$config['reuse_query_string'] = TRUE;


			 // integrate bootstrap pagination
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
		   
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = 'Prev';
			$config['prev_tag_open'] = '<li class="prev">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = 'Next';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="'.$config['base_url'].'?per_page=0">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

			$data['page'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
			$data['searchFor'] = ($this->input->get('query')) ? $this->input->get('query') : NULL;
			$data['orderField'] = ($this->input->get('orderField')) ? $this->input->get('orderField') : '';
			$data['orderDirection'] = ($this->input->get('orderDirection')) ? $this->input->get('orderDirection') : '';
			$data['citylist'] = $this->CustomerModel->getItem($config["per_page"], $data['page'], $data['searchFor'], $data['orderField'], $data['orderDirection']);
			$config['total_rows'] = $this->CustomerModel->countItem($config["per_page"], $data['page'], $data['searchFor'], $data['orderField'], $data['orderDirection']);
			$this->pagination->initialize($config);
			$data['pagination'] = $this->pagination->create_links();
			$this->load->view('ListAllItems', $data);
		} else{
			redirect('Customer/Login');
		}
	}
	
	// Add Items To Cart
	public function addToCart($itemID){
		$sessionData=$this->session->userdata('customerID');
		if($sessionData!=''){
			$this->load->model('CustomerModel');
			
			$data['CartMessage']=$this->CustomerModel->addItemToCart
							($sessionData,$itemID);
			redirect(site_url('Customer/viewItem'));					
		} else{
			$this->load->view('Login');
		}
	}
	
	public function updateProfile(){
		$sessionData=$this->session->userdata('customerID');
		if($sessionData!=''){
			$this->load->model('CustomerModel');
			
			$profile=$this->CustomerModel->updateUserProfile
							($sessionData);
				
		$this->load->view('ProfileUpdate',['profile'=>$profile]);
		} else{
			$this->load->view('Login');
		}
	}
	
	public function updateCustomerDetails(){
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('firstName', 'Firstname', 'required|trim|max_length[20]');
		$this->form_validation->set_rules('lastName', 'Lastname', 'required|max_length[15]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|max_length[40]');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[7]|max_length[20]');
		$this->form_validation->set_rules('mobileNumber', 'Mobile Number', 'required|numeric|exact_length[10]');
		$this->form_validation->set_rules('district', 'District', 'required');
		$this->form_validation->set_rules('street', 'Street', 'required|max_length[50]');
		
		if($this->form_validation->run()){
			$customerID=$this->input->post('customerID');
			$firstname=$this->input->post('firstName');
			$lastname=$this->input->post('lastName');
			$email=$this->input->post('email');
			$username=$this->input->post('username');
			$mobilenumber=$this->input->post('mobileNumber');
			$district=$this->input->post('district');
			$street=$this->input->post('street');		
			
			$this->load->model('CustomerModel');
			
			$data['CustomerMessage']=$this->CustomerModel->updateCustomerProfile
							($customerID,$firstname,$lastname,$email,$username,
							$mobilenumber,$district,$street);
							
			redirect(site_url('Customer/updateProfile'));					
		} else {
			echo validation_errors();
		}
	}
	
	public function orderOut(){
		echo "here is your order";
	}
	
	public function logout(){
		$this->session->sess_destroy();
        redirect('Customer/Login');
	}
	
	
}

?>