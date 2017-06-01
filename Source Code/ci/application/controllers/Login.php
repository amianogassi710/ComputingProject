<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function getLoginDetails()
	{
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$this->load->model('LoginDetails');
		$data['loginmsg']=$this->LoginDetails->details($username,$password);
		$this->load->view('HomePage');
	}
}
