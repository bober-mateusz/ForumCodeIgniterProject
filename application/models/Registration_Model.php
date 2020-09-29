<?php
class Registration_Model extends CI_Model {

    function AddUser($username,$password,$email){
    
    $password =  hash('ripemd160', $password);
    $query = "call Add_User('$username','$password',0,0,0,'$email')";
    $this->db->query($query);
    }

}

?>