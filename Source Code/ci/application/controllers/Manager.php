<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {

	// Add New Category
	public function addCategory() {
		$sessionData=$this->session->userdata('customerID');
		if($sessionData!=''){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('categoryName', 'categoryName', 'required|trim|max_length[20]');
			
			if($this->form_validation->run()){
				$categoryName=$this->input->post('categoryName');
				
				$this->load->model('ManagerModel');
				$data['ManagerMessage']=$this->ManagerModel->addNewCategory($categoryName);
				echo "<script>
						alert('Category Successfully Added');
						window.location.href='addCategory';
					</script>";
			} else {
				$this->load->view('AddNewCategory');
			}	
		} else{
			$this->load->view('Login');
		}	
	}
	
	// Select All Category
	public function listCategory() {
		$sessionData=$this->session->userdata('customerID');
		if($sessionData!=''){
			$this->load->model('ManagerModel');
			$data['records']=$this->ManagerModel->listAllCategory();
			$this->load->view('SelectAllCategory',$data);
		} else{
			$this->load->view('Login');
		}
	}
	
	// Update Category
	public function listCategoryUpdate() {
		$sessionData=$this->session->userdata('customerID');
		if($sessionData!=''){
			$this->load->model('ManagerModel');
			$data['records']=$this->ManagerModel->listAllCategory();
			$this->load->view('UpdateCategoryList',$data);
		} else{
			$this->load->view('Login');
		}
	}
	
	public function editCategory($categoryID){	
		$this->load->model('ManagerModel');
		$category=$this->ManagerModel->findCategory($categoryID);
		$this->load->view('UpdateCategory',['category'=>$category]);
	}
	
	public function updateCategory(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('categoryName', 'categoryName', 'required|trim|max_length[20]');
			
		if($this->form_validation->run()){
			$categoryID=$this->input->post('hiddenID');
			$categoryName=$this->input->post('categoryName');
				
			$this->load->model('ManagerModel');
			$check=$this->ManagerModel->updateCategory($categoryID,$categoryName);
			if ($check){
				echo "<script>
					alert('Category Successfully Updated');
					window.location.href='listCategoryUpdate';
				</script>";
			} else{
				echo "<script>
					alert('Update Failed');
					window.location.href='listCategoryUpdate';
				</script>";
			}
		} else {
			echo "<script>
					alert('Validation Error');
					window.location.href='listCategoryUpdate';
				</script>";
		}			
	}
	
	// Delete Category
	public function listCategoryDelete() {
		$sessionData=$this->session->userdata('customerID');
		if($sessionData!=''){
			$this->load->model('ManagerModel');
			$data['records']=$this->ManagerModel->listAllCategory();
			$this->load->view('DeleteCategoryList',$data);
		} else{
			$this->load->view('Login');
		}	
	}
		
	public function deleteCategory($categoryID){
		$this->load->model('ManagerModel');
		$check=$this->ManagerModel->removeCategory($categoryID);
		if ($check){
			echo "<script>
					alert('Category Successfully Deleted');
					window.location.href='/ci/Manager/listCategoryDelete';
				</script>";
		} else{
			echo "<script>
					alert('Delete Unsuccessfull');
					window.location.href='listCategoryDelete';
				</script>";
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
			echo "<script>
						alert('Item Successfully Added');
						window.location.href='listCategoryAddItem';
					</script>";
		}else {
			$this->load->model('ManagerModel');
			$data['records']=$this->ManagerModel->listAllCategory();
            $this->load->view('AddNewItems',$data);
		}
	}
	
	// List All Items with Category	
	public function listItemWithCategory()
	{
		$sessionData=$this->session->userdata('customerID');
		if($sessionData!=''){
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
		} else{
			$this->load->view('Login');
		}
	}
	
	// Update Items
	public function listItemUpdate() {
		$sessionData=$this->session->userdata('customerID');
		if($sessionData!=''){
			$this->load->model('ManagerModel');
			$data['records']=$this->ManagerModel->listAllItem();
			$load=TRUE;
			$data1['load']=$load;
			$all=$data + $data1;
			$this->load->view('UpdateItemList',$all);
		} else{
			$this->load->view('Login');
		}		
	}
	
	public function selectItemDescription(){
		$sessionData=$this->session->userdata('customerID');
		if($sessionData!=''){
			$itemID=$this->input->post('itemID');
			
			$this->load->model('ManagerModel');
			$data['itemDesc']=$this->ManagerModel->searchItem
					($itemID);
			$load=FALSE;
			$data1['load']=$load;
			$all=$data + $data1;
			$this->load->view('UpdateItemList',$all);
		} else{
			$this->load->view('Login');
		}				
	}
	
	public function editItem($itemID){
		$sessionData=$this->session->userdata('customerID');
		if($sessionData!=''){
			$this->load->model('ManagerModel');
			$item=$this->ManagerModel->findItem($itemID);
			$this->load->view('UpdateItems',['item'=>$item]);
		} else{
			$this->load->view('Login');
		}			
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
				echo "<script>
					alert('Item Successfully Updated');
					window.location.href='listItemUpdate';
				</script>";
			} else{
				echo "<script>
					alert('Item Update Unsuccessfull');
					window.location.href='listItemUpdate';
				</script>";
			}
		}else {
			echo "<script>
					alert('Validation Error');
					window.location.href='listItemUpdate';
				</script>";
		}
	}
	
	// Delete Item
	public function listCategoryForDelete() {
		$sessionData=$this->session->userdata('customerID');
		if($sessionData!=''){
			$this->load->model('ManagerModel');
			$data['records']=$this->ManagerModel->listAllCategory();
			$load=TRUE;
			$data1['load']=$load;
			$all=$data + $data1;
			$this->load->view('DeleteItem',$all);
		} else{
			$this->load->view('Login');
		}	
	}
	
	public function searchItemsWithCategory(){
		$sessionData=$this->session->userdata('customerID');
		if($sessionData!=''){
			$categoryID=$this->input->post('categoryID');
			$this->load->model('ManagerModel');
			$data['records']=$this->ManagerModel->searchItemsWithCategory
					($categoryID);
			$load=FALSE;
			$data1['load']=$load;
			$all=$data + $data1;
			$this->load->view('DeleteItem',$all);
		} else{
			$this->load->view('Login');
		}
	}
	
	public function deleteItem($itemID){
		$this->load->model('ManagerModel');
		$check=$this->ManagerModel->removeItem($itemID);
		if ($check){
			echo "<script>
					alert('Item Successfully Deleted');
					window.location.href='/ci/Manager/listCategoryForDelete';
				</script>";
		} else{
			echo "<script>
					alert('Item Delete Unsuccessfull');
					window.location.href='/ci/Manager/listCategoryForDelete';
				</script>";
		}
	}
	
	//List All Customers
	public function listCustomer() {
		$sessionData=$this->session->userdata('customerID');
		if($sessionData!=''){
			$this->load->model('ManagerModel');
			$data['records']=$this->ManagerModel->listAllCustomer();
			$this->load->view('SelectAllCustomer',$data);
		} else{
			$this->load->view('Login');
		}
	}
	
	// Deactivate Customer
	public function searchCustomer(){
		$sessionData=$this->session->userdata('customerID');
		if($sessionData!=''){
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
		} else{
			$this->load->view('Login');
		}
	}
	
	public function deleteCustomer($customerID){
		$this->load->model('ManagerModel');
		$check=$this->ManagerModel->deactivateCustomer($customerID);
		if ($check){
			echo "<script>
					alert('Customer Successfully Deactivated');
					window.location.href='/ci/Home/deactivateCustomer';
				</script>";
		} else{
			echo "<script>
					alert('Customer Deactivate Unsuccessfull');
					window.location.href='/ci/Home/deactivateCustomer';
				</script>";
		}
	}
	
	// Change Item Status
	public function checkStatus(){
		$sessionData=$this->session->userdata('customerID');
		if($sessionData!=''){
			$this->load->model('ManagerModel');
			$check['records']=$this->ManagerModel->checkItemStatus();
			$this->load->view('ChangeItemStatus',$check);
		} else{
			$this->load->view('Login');
		}
	}
	
	public function changeStatus(){
		$itemID= $this->input->post('itemID');
		$itemStatus= $this->input->post('itemStatus');
		$this->load->model('ManagerModel');
		$check['records']=$this->ManagerModel->changeItemStatus($itemID,$itemStatus);
		redirect('Manager/checkStatus');	
	}
	
	//Aman
	
	
	// View Customer Order
	public function viewOrder(){
		$sessionData=$this->session->userdata('customerID');
		if($sessionData!=''){
			$this->load->model('ManagerModel');
			$data['records']=$this->ManagerModel->viewCustomerOrder();
			$this->load->view('viewOrder',$data);
		} else{
			$this->load->view('Login');
		}
	}	

	// Update Item Status
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
	
	// View Customer Order History
	public function viewOrderHistory(){
		$sessionData=$this->session->userdata('customerID');
		if($sessionData!=''){
			$this->load->model('ManagerModel');
			$data['records']=$this->ManagerModel->viewCustomerOrderHistory();
			$this->load->view('viewOrderHistory',$data);
		} else{
			$this->load->view('Login');
		}
	}	
	
 	// View Transaction	
	public function viewTransaction(){
		$sessionData=$this->session->userdata('customerID');
		if($sessionData!=''){
			$Sdate= $this->input->post('Sdate');
			$Edate= $this->input->post('Edate');
			$this->load->model('ManagerModel');	
			$data['records']=$this->ManagerModel->viewPaymentTransaction($Sdate,$Edate);
			$load=FALSE;
			$data1['load']=$load;
			$all=$data + $data1;
			$this->load->view('ViewTransaction',$all);
		} else{
			$this->load->view('Login');
		}
	}
 
}
?>