<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {

	// Add New Category
	public function addCategory() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('categoryName', 'Category Name', 'required|trim|max_length[20]');
		
		if($this->form_validation->run()){
			$categoryName=$this->input->post('categoryName');
			
			$this->load->model('ManagerModel');
			$data['ManagerMessage']=$this->ManagerModel->addNewCategory
							($categoryName);
			echo "Done";
		} else {
			echo validation_errors();
		}
	}
	
	// Select All Category
	public function listCategory() {
		$this->load->model('ManagerModel');
		$data['records']=$this->ManagerModel->listAllCategory();
		$this->load->view('SelectAllCategory',$data);
	}
	
	// Update Category
	public function listCategoryUpdate() {
		$this->load->model('ManagerModel');
		$data['records']=$this->ManagerModel->listAllCategory();
		$this->load->view('UpdateCategoryList',$data);
	}
	
	public function editCategory($categoryID){
		$this->load->model('ManagerModel');
		$category=$this->ManagerModel->findCategory($categoryID);
		$this->load->view('UpdateCategory',['category'=>$category]);
	}
	
	public function updateCategory(){
		$categoryID=$this->input->post('hiddenID');
		$categoryName=$this->input->post('categoryName');

		$this->load->model('ManagerModel');
		$check=$this->ManagerModel->updateCategory($categoryID,$categoryName);
		if ($check){
			echo "Done";
		} else{
			echo "Not done";
		}
	}
	
	// Delete Category
	public function listCategoryDelete() {
		$this->load->model('ManagerModel');
		$data['records']=$this->ManagerModel->listAllCategory();
		$this->load->view('DeleteCategoryList',$data);
	}
		
	public function deleteCategory($categoryID){
		$this->load->model('ManagerModel');
		$check=$this->ManagerModel->removeCategory($categoryID);
		if ($check){
			echo "Done";
		} else{
			echo "Not done";
		}
	}
	
	// Add New Items
	public function listCategoryAddItem() {
		$this->load->model('ManagerModel');
		$data['records']=$this->ManagerModel->listAllCategory();
		$this->load->view('AddNewItems',$data);
	}
	
	public function addItems() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('itemName', 'Item Name', 'required|trim|max_length[25]');
		$this->form_validation->set_rules('itemPrice', 'Item Price', 'required|numeric|trim|max_length[4]');
		$this->form_validation->set_rules('categoryID', 'Category ID', 'required');
		$this->form_validation->set_rules('itemDescription', 'Item Description', 'required|trim|max_length[100]');
		
		if($this->form_validation->run()){
			$config['upload_path']="assets/images";
			$config['allowed_types']='gif|jpg|png';
				
			$this->load->library('upload',$config);
			$this->upload->do_upload('itemImage');
			
			$data=array('upload_data'=>$this->upload->data());
			
			$itemName=$this->input->post('itemName');
			$itemImage=$data['upload_data']['file_name'];
			$itemPrice=$this->input->post('itemPrice');
			$categoryID=$this->input->post('categoryID');
			$itemDescription=$this->input->post('itemDescription');
				
			$this->load->model('ManagerModel');
			$this->ManagerModel->addNewItems
								($itemName,$itemImage,$itemPrice,$categoryID,$itemDescription);
			echo "Done";
		}else {
			echo validation_errors();
		}
	}
	
	// List All Items with Category
	public function listItemWithCategory() {
		$this->load->model('ManagerModel');
		$data['records']=$this->ManagerModel->listAllItem();
		$datas['record']=$this->ManagerModel->listAllCategory();
		$all=$data + $datas;
		$this->load->view('SelectAllItems',$all);
	}
	
	public function listCustomer() {
		$this->load->model('ManagerModel');
		$data['records']=$this->ManagerModel->listAllCustomer();
		$this->load->view('SelectAllCustomer',$data);
	}

	public function hello(){
		$fullname=$this->input->post('fullname');
		$this->load->model('ManagerModel');
			$data['ManagerMessage']=$this->ManagerModel->loadItemWithCategory
							($fullname);
			// echo "Done";
		// echo $fullname;		
		
		echo "<pre>";
			print_r ($data);
		}
	
	
	public function check(){
		$this->load->view('ss');
	}
 
}
?>