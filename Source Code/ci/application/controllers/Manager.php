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
	
	//List All Customers
	public function listCustomer() {
		$this->load->model('ManagerModel');
		$data['records']=$this->ManagerModel->listAllCustomer();
		$this->load->view('SelectAllCustomer',$data);
	}
	
	// Update Items
	public function listItemUpdate() {
		// $this->load->model('ManagerModel');
		// $data['records']=$this->ManagerModel->listAllItem();
		// $this->load->view('UpdateItems',$data);
		$this->load->model('ManagerModel');
		$data['records']=$this->ManagerModel->listAllItem();
		$datas['record']=$this->ManagerModel->listAllCategory();
		$load=TRUE;
		$data1['load']=$load;
		$all=$data + $datas + $data1;
		$this->load->view('UpdateItemList',$all);
	}
	
	public function selectItemDescription(){
		$itemID=$this->input->post('itemID');
			
		$this->load->model('ManagerModel');
		$data['itemDesc']=$this->ManagerModel->searchItem
				($itemID);
		$load=FALSE;
		$data1['load']=$load;
		$all=$data + $data1;
		$this->load->view('UpdateItemList',$all);
		
	}
	
	public function editItem($itemID){
		$this->load->model('ManagerModel');
		$item=$this->ManagerModel->findItem($itemID);
		$this->load->view('UpdateItems',['item'=>$item]);
	}
	
	public function updateItem(){
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('hiddenID', 'Hidden ID', 'required');
		$this->form_validation->set_rules('itemName', 'Item Name', 'required|trim|max_length[25]');
		$this->form_validation->set_rules('itemPrice', 'Item Price', 'required|numeric|trim|max_length[4]');
		$this->form_validation->set_rules('itemDescription', 'Item Description', 'required|trim|max_length[100]');
		
		if($this->form_validation->run()){
			$itemID=$this->input->post('hiddenID');
			$itemName=$this->input->post('itemName');
			$itemPrice=$this->input->post('itemPrice');
			$itemDescription=$this->input->post('itemDescription');
				
			$this->load->model('ManagerModel');
			$check=$this->ManagerModel->updateItem($itemID,$itemName,
							$itemPrice,$itemDescription);
			if ($check){
			echo "Done";
			} else{
				echo "Not done";
			}
		}else {
			echo validation_errors();
		}
	}
	
	// Delete Item
	public function listCategoryForDelete() {
		$this->load->model('ManagerModel');
		$data['records']=$this->ManagerModel->listAllCategory();
		$load=TRUE;
		$data1['load']=$load;
		$all=$data + $data1;
		$this->load->view('DeleteItem',$all);
	}
	
	public function searchItemsWithCategory(){
		$categoryID=$this->input->post('categoryID');
		$this->load->model('ManagerModel');
		$data['records']=$this->ManagerModel->searchItemsWithCategory
				($categoryID);
		$load=FALSE;
		$data1['load']=$load;
		$all=$data + $data1;
		$this->load->view('DeleteItem',$all);
	}
	
	public function deleteItem($itemID){
		$this->load->model('ManagerModel');
		$check=$this->ManagerModel->removeItem($itemID);
		if ($check){
			echo "Done";
		} else{
			echo "Not done";
		}
	}
	
	// Deactivate Customer
	public function searchCustomer(){
		$customerID=$this->input->post('customerID');
		$customerFirstName=$this->input->post('customerFirstName');
		$customerLastName=$this->input->post('customerLastName');
		$this->load->model('ManagerModel');
		$data['records']=$this->ManagerModel->searchSpecificCustomer
				($customerID,$customerFirstName,$customerLastName);
		$load=FALSE;
		$data1['load']=$load;
		$all=$data + $data1;
		$this->load->view('DeactivateCustomer',$all);
	}
	
	public function deleteCustomer($customerID){
		$this->load->model('ManagerModel');
		$check=$this->ManagerModel->deactivateCustomer($customerID);
		if ($check){
			echo "Done";
		} else{
			echo "Not done";
		}
	}
	
	// Change Item Status
	public function checkStatus(){
		$this->load->model('ManagerModel');
		$check['records']=$this->ManagerModel->checkItemStatus();
		$this->load->view('ChangeItemStatus',$check);
	}
	
	public function changeStatus(){
		$itemID= $this->input->post('itemID');
		$itemStatus= $this->input->post('itemStatus');
		$this->load->model('ManagerModel');
		$check['records']=$this->ManagerModel->changeItemStatus($itemID,$itemStatus);
		echo "done";
	}
	
	// List All Items with Category
	public function listItemWithCategory() {
		$this->load->model('ManagerModel');
		$data['records']=$this->ManagerModel->listAllItem();
		$datas['record']=$this->ManagerModel->listAllCategory();
		$all=$data + $datas;
		$this->load->view('SelectAllItems',$all);
	}

	public function hello(){
		$fullname=$this->input->post('fullname');
		$this->load->model('ManagerModel');
			$data['ManagerMessage']=$this->ManagerModel->loadItemWithCategory
							($fullname);
		echo "<pre>";
		print_r ($data);
		
		foreach( $data as $e ) {
			echo '<tr><th>', $e[0], '</th><td>', join('</td><td>', $e[1]), "</td></tr>\n";
		}		
	}
	
	
	
	public function check(){
		$this->load->view('ss');
	}
 
}
?>