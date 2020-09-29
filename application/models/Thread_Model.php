<?php
class Thread_Model extends CI_Model 
{

    /*
    function getCategoryIDs()
    {
        $categoryIDs = array();
        $query = "Call Get_Category_IDs()";
        $resultCategories = $this->db->query($query);
        $categoryQuery = $resultCategories->result();
        foreach($categoryQuery as $category)
        {
            (int)$categoryInteger = $category->categoryID;
            array_push($categoryIDs,$categoryInteger);
        }
        return $categoryIDs;
    }
    */
    function createThread($threadName,$threadDesc,$categoryID)
    {
        $query = $this->db->query('CALL Add_Thread('.'"'.$threadName.'"'.",".'"'.$threadDesc.'"'.",".'"'.$categoryID.'"'.')');


    }

    function getThreads()
    {
        $categories = array();
        $query = $this->db->query("Call Get_threads();");
        //Returns all Results from threads as an array, Puts them into categories
        $categories = $query->result_array();
        //Find a way to split up data based on row and category
        $arr = array();
        foreach($categories as $key => $value){
            $arr[$value['CategoryID']][$key] = $value;
         }
        $data = $arr;
        return $data;
    }

    function removeThread($threadID)
    {
        //Removes thread
        $query = $this->db->query("CALL Remove_Thread($threadID)");
    }

    function removeThreadsOnCategoryID($categoryID)
    {
        $query = $this->db->query("CALL Remove_Threads_On_CategoryID($categoryID)");
    }



}
?>