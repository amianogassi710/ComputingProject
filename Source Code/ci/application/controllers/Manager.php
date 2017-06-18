<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Manager extends CI_Controller {

	// Add New Category
	public function addCategory() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('categoryName', 'categoryName', 'required|trim|max_length[20]');
		
		if($this->form_validation->run()){
			$categoryName=$this->input->post('categoryName');
			
			$this->load->model('ManagerModel');
			$data['ManagerMessage']=$this->ManagerModel->addNewCategory
							($categoryName);
			echo "Done";
		} else {
            $this->load->view('AddNewCategory');
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
		$sessionData=$this->session->userdata('customerID');
		if($sessionData!=''){
			$this->load->model('ManagerModel');
			$data['records']=$this->ManagerModel->listAllCategory();
			$this->load->view('AddNewItems',$data);
		} else{
			$this->load->view('Login');
		}
	}
	
	public function addItems() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('itemName', 'Item Name', 'required|trim|max_length[25]');
		$this->form_validation->set_rules('itemPrice', 'Item Price', 'required|numeric|trim|max_length[4]');
		$this->form_validation->set_rules('categoryID', 'Category ID', 'required');
		$this->form_validation->set_rules('itemDescription', 'Item Description', 'required|trim|max_length[100]');
		
		if($this->form_validation->run()){
			$config['upload_path']="assets/images/itemImage";
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
			$this->load->model('ManagerModel');
			$data['records']=$this->ManagerModel->listAllCategory();
            $this->load->view('AddNewItems',$data);
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
redirect('Manager/checkStatus');	}
	
	
	
	public function viewOrder(){
		$sessionData=$this->session->userdata('customerID');

		if($sessionData!=''){
			$this->load->model('ManagerModel');
			
			$data['records']=$this->ManagerModel->viewCustomerOrder();
			$this->load->view('viewOrder',$data);
			
		} else{
			echo "sorry";
		}
	}	

		
	
	public function check(){
		$this->load->view('ss');
	}
	
	
	// List All Items with Category	
	public function listItemWithCategory()
	{
		$this->load->library('pagination');
		$this->load->model('ManagerModel');


		$config['base_url'] = base_url('Manager/listItemWithCategory');
		
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
		$data['itemList'] = $this->ManagerModel->getItem($config["per_page"], $data['page'], $data['searchFor'], $data['orderField'], $data['orderDirection']);
		$config['total_rows'] = $this->ManagerModel->countItem($config["per_page"], $data['page'], $data['searchFor'], $data['orderField'], $data['orderDirection']);
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('SelectAllItems', $data);
	}
	
	public function extract(){
		$this->load->model('ManagerModel');
		$data['record']=$this->ManagerModel->extImage();
		$this->load->view('image',$data);

	}
	
	public function updateStatus(){
		$deliverStatus= $this->input->post('deliverStatus');
		$paymentStatus= $this->input->post('paymentStatus');
		$orderID= $this->input->post('orderID');
		$this->load->model('ManagerModel');
		$data['record']=$this->ManagerModel->updateItemStatus($deliverStatus,$paymentStatus,$orderID);
		redirect('Manager/viewOrder');
	}
	
	public function confirmOrderDelivery($orderID){
		$this->load->model('ManagerModel');
		$check=$this->ManagerModel->confirmOrder($orderID);
		redirect('Manager/viewOrder');
	}
 
}
?>