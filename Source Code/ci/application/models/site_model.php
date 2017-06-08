<?php

class site_model extends CI_Model {


public function countriesdata($per_page,$offset,$search_keywords_array,$search_orderby_string) {		
	$sdata = array();
	$this->db->select('*')->from('item');
	if(count($search_keywords_array)>0) $this->db->like($search_keywords_array);
	
	if(!empty($search_orderby_string)) $this->db->order_by($search_orderby_string);
	
	$this->db->limit($per_page,$offset);
	$query_result = $this->db->get();
	//echo $this->db->last_query(); // shows last executed query
	
	if($query_result->num_rows() > 0) {
		foreach ($query_result->result_array() as $row)
		{
			$sdata[] = array('itemID' => $row['itemID'],'itemName' => $row['itemName'],'itemPrice' => $row['itemPrice'],'categoryID' => $row['categoryID'],'itemName' => $row['itemName'],'categoryID' => $row['categoryID'],'itemName' => $row['itemName'],'itemName' => $row['itemName'],'categoryID' => $row['categoryID']);
		}			
	}
	return $sdata;
}



public function searchterm_handler($field,$searchterm)
{
	if($searchterm)
	{
		$this->session->set_userdata($field, $searchterm);
		return $searchterm;
	}
	elseif($this->session->userdata($field))
	{
		$searchterm = $this->session->userdata($field);
		return $searchterm;
	}
	else
	{
		$searchterm ="";
		return $searchterm;
	}
}
}
?>