<?php

class Datamgmt extends CI_Controller{
	public function getData(){
		$uname= $this->input->post('uname');
		$pwd= $this->input->post('pwd');
		$this->load->model('Datam');
		$data['modelmsg']=$this->Datam->saveIt($uname,$pwd);
		//$this->Datam->saveIt($uname,$pwd);
		//$data['notice']="Data Successfully Saved";
		//$data['notice2']="This is test";
		
		$this->load->view('message',$data);
	}
	
	public function recData(){
		$this->load->model('Datam');
		$datas=$this->Datam->retData();
		//passing value from controller to view
		$data['datas']=$datas;
		$this->load->view('message',$data);
		//var_dump($datas->result());
	}
	
	public function searchUser(){
		$this->load->model('Datam');
		$uname=$this->input->post('uname');
		$datas=$this->Datam->retData1($uname);
		//passing value from controller to view
		$data['datas']=$datas;
		$this->load->view('message',$data);
		//var_dump($datas->result());
	}
	
	public function updateIt(){
		$this->load->model('Datam');
		$this->Datam->updateData();
	}
	
	public function deleteIt(){
		$this->load->model('Datam');
		$this->Datam->deleteData();
	}
	
	public function checkLib(){
		$this->load->library("mylib");
		$this->mylib->firstFun();
	}
}

?>


