<?php

class Datam extends CI_Model{
	public function saveIt($uname,$pwd){
		//$this->db->query("insert into user(name, password) values('$uname', '$pwd')");
		
		//active record
		$arr=array(
			"name"=>$uname,
			"password"=>$pwd
		);
		$this->db->insert("user",$arr);
		return "saved";
	}
	
	public function retData(){
		
		//$this->db->where("name","prashant");
		$this->db->limit(2);
		return $this->db->get("user");
	}
	
	public function retData1($uname){
		$this->db->where("name",$uname);
		return $this->db->get("user");
	}
	
	public function updateData(){
		$datas=array(
		"name"=>"Sarance"
		);
		$this->db->where("id",2);
		$this->db->update("user",$datas);
	}
	
	public function deleteData(){
		
		$this->db->where("id",5);
		$this->db->delete("user");
	}
	
}

?>