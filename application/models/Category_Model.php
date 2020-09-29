<?php
class Category_Model extends CI_Model {

function getCategoryNames()
{
    $categoryNames = array();
    $query = "SELECT DISTINCT (CategoryName)
    FROM categories
    ORDER BY categoryID ASC;";
    $resultCategories = $this->db->query($query);
    $categoryNames = $resultCategories->result();
    return $categoryNames;
}

function getCategories()
{
    $query = 'SELECT * FROM categories';
    $resultCategories = $this->db->query($query);
    $data = $resultCategories->result();
    return $data;
}

function RemoveCategory($categoryID)
{
    $query = "CALL Remove_Category($categoryID)";
    $result = $this->db->query($query);
}


function addCategory($categoryName)
{
    $query = 'CALL add_Category("'.$categoryName.'")';
    $result = $this->db->query($query);
}






}

?>