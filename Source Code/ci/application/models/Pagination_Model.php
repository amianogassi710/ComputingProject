<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagination_Model extends CI_Model {

   function get_department_list($limit, $start)
    {
        $sql = 'select * from item, category where item.categoryID = category.categoryID order by itemID limit ' . $start . ', ' . $limit;
        $query = $this->db->query($sql);
        return $query->result();
    }

   function get_department_list1($limit, $start)
    {
        $sql = 'select * from item, category where item.categoryID = category.categoryID order by itemPrice limit ' . $start . ', ' . $limit;
        $query = $this->db->query($sql);
        return $query->result();
    }
}
?>