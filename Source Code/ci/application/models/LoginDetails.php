<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginDetails extends CI_Model {
	public function details($username,$password)
	{
		$arr=array(
			"name"=>$username,
			"password"=>$password
		);
		$this->db->insert("user",$arr);
		return "saved";
	}
}
