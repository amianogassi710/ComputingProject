<?php

class C extends CI_Controller {


public function pagination($page_num=1,$sortfield='',$order='') {		
			
		$this->load->model('site_model');		
		$search_keywords_array = array();
		$search_orderby_array = array();
		$search_orderby_string = '';
		
		//pagination
		
    	$page_number = $this->uri->segment(2);		
		$config['base_url'] = base_url().'pagination/';
		$config['uri_segment'] = 2;
		
		if(!empty($sortfield)) $search_orderby_array[] = $sortfield.' '.$order;
		
		if($this->input->post()) {		
			
			$countryName = $this->input->post('countryName');
			$countryCode = $this->input->post('countryCode');
			
			$currencyCode = $this->input->post('currencyCode');
			$population = $this->input->post('population');
			$capital = $this->input->post('capital');
			$continentName = $this->input->post('continentName');
			$continent = $this->input->post('continent');
			$areaInSqKm = $this->input->post('areaInSqKm');			
			
			if(!empty($countryName)) { 
				$search_keywords_array['countryName'] =  $countryName;
				$this->site_model->searchterm_handler('countryName',$countryName); 
			} else {
				$this->session->unset_userdata('countryName');	
			}
			if(!empty($countryCode)) { 
				$search_keywords_array['countryCode'] =  $countryCode;
				$this->site_model->searchterm_handler('countryCode',$countryCode);
			} else {
				$this->session->unset_userdata('countryCode');	
			}			
			if(!empty($currencyCode)) {
				 $search_keywords_array['currencyCode'] =  $currencyCode;
				 $this->site_model->searchterm_handler('currencyCode',$currencyCode);
			} else {
				$this->session->unset_userdata('currencyCode');	
			}
			if(!empty($population)) {
				 $search_orderby_array[] = 'population '.$population;
				 $this->site_model->searchterm_handler('population','population '.$population);
			} else {
				$this->session->unset_userdata('population');	
			}
			if(!empty($capital)) {
				$search_keywords_array['capital'] =  $capital;
				$this->site_model->searchterm_handler('capital',$capital);
			} else {
				$this->session->unset_userdata('capital');	
			}
			if(!empty($continentName)) {
				 $search_keywords_array['continentName'] =  $continentName;
				 $this->site_model->searchterm_handler('continentName',$continentName);
			} else {
				$this->session->unset_userdata('continentName');	
			}
			if(!empty($continent)) {
				 $search_keywords_array['continent'] =  $continent;
				 $this->site_model->searchterm_handler('continent',$continent);
			} else {
				$this->session->unset_userdata('continent');	
			}
			if(!empty($areaInSqKm)) {
				 $search_orderby_array[] = 'areaInSqKm '.$areaInSqKm;
				 $this->site_model->searchterm_handler('areaInSqKm','areaInSqKm '.$areaInSqKm);
			} else {
				$this->session->unset_userdata('areaInSqKm');	
			}
			
			$reset = $this->input->post('reset');
			if(!empty($reset)) {
				$this->session->unset_userdata('countryCode');
				$this->session->unset_userdata('countryName');				
				$this->session->unset_userdata('currencyCode');
				$this->session->unset_userdata('population');
				$this->session->unset_userdata('capital');
				$this->session->unset_userdata('continentName');
				$this->session->unset_userdata('continent');
				$this->session->unset_userdata('areaInSqKm');
				$search_keywords_array = array();
				redirect('pagination/');
			}			
			
		} else {		
			if($this->session->userdata("countryName"))
				$search_keywords_array['countryName'] = $this->session->userdata("countryName");
			if($this->session->userdata("countryCode"))
				$search_keywords_array['countryCode'] = $this->session->userdata("countryCode");
				
			if($this->session->userdata("currencyCode"))
				$search_keywords_array['currencyCode'] = $this->session->userdata("currencyCode");
			if($this->session->userdata("population"))
				$search_orderby_array[] = $this->session->userdata("population");
			if($this->session->userdata("capital"))
				$search_keywords_array['capital'] = $this->session->userdata("capital");
			if($this->session->userdata("continentName"))
				$search_keywords_array['continentName'] = $this->session->userdata("continentName");
			if($this->session->userdata("continent"))
				$search_keywords_array['continent'] = $this->session->userdata("continent");
			if($this->session->userdata("areaInSqKm"))
				$search_orderby_array[] = $this->session->userdata("areaInSqKm");
		}
		$search_orderby_string = implode(",",$search_orderby_array);
		
		$config['per_page'] = 10;
		$config['num_links'] = 5;
		if(empty($page_number)) $page_number = 1;
		$offset = ($page_number-1) * $config['per_page'];
		
		$config['use_page_numbers'] = TRUE;
		
		$data["countriesdata"] = $this->site_model->countriesdata($config['per_page'],$offset,$search_keywords_array,$search_orderby_string);
		
		$this->db->select('*')->from('tbl_countries');
		$this->db->like($search_keywords_array);
		$query_result = $this->db->get();
		
		$config['total_rows'] = $query_result->num_rows();				
		$this->pagination->cur_page = $offset;
				
		$this->pagination->initialize($config);
		$data['page_links'] = $this->pagination->create_links();
		//var_dump(var_dump($config));	
			
		$this->load->view('countriespage',$data);
}
}
?>