<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pagination_Controller extends CI_Controller {

	public function index(){
		$this->load->helper('url');
        $this->load->database();
        $this->load->library('pagination');

        //load the department_model
        $this->load->model('Pagination_Model');
		//pagination settings
        $config['base_url'] = site_url('Pagination_Controller/index');
        $config['total_rows'] = $this->db->count_all('item');
        $config['per_page'] = "10";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //call the model function to get the department data
        $data['deptlist'] = $this->Pagination_Model->get_department_list($config["per_page"], $data['page']);           

        $data['pagination'] = $this->pagination->create_links();

        //load the department_view
        $this->load->view('pagination_view',$data);
    }
	public function sort(){
		$this->load->helper('url');
        $this->load->database();
        $this->load->library('pagination');

        //load the department_model
        $this->load->model('Pagination_Model');
		//pagination settings
        $config['base_url'] = site_url('Pagination_Controller/index');
        $config['total_rows'] = $this->db->count_all('item');
        $config['per_page'] = "10";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //call the model function to get the department data
        $data['deptlist'] = $this->Pagination_Model->get_department_list1($config["per_page"], $data['page']);           

        $data['pagination'] = $this->pagination->create_links();

        //load the department_view
        $this->load->view('pagination_view',$data);
    }
	}

?>