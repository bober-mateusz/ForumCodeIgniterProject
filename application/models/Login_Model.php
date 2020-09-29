<?php
class Login_Model extends CI_Model {

function verifyLogin($username,$password)
{
    
    $password =  hash('ripemd160', $password);
    $query = "SELECT * FROM users WHERE users.userName = "."'$username'"."AND users.userPassword="."'$password'";

    $login = $this->db->query($query);
    if($login->num_rows() > 0)
    {       
        foreach ($login->result() as $row) {
            $_SESSION['ID'] = $row->userID;
            $_SESSION['username'] = $row->userName;
            $_SESSION['admin'] = $row->admin;
            $_SESSION['bannedStatus'] = $row->bannedStatus;
            $_SESSION['loggedIn'] = True;
        }
        return True;
    }
    else 
    {
        $_SESSION['loggedIn'] = False;
        return False;
    }
}

function banUser($username)
{
    $query = 'CALL Ban_User("'.$username.'")';
    if ($this->db->query($query))
    {
        return "User has been Sucessfully Banned";
    }
    else {
        return "There was an issue with banning the user please try again";
    }
}


function UnBanUser($username)
{
    $query = 'CALL Unban_User("'.$username.'")';
    if ($this->db->query($query))
    {
        return "User has been Sucessfully UnBanned";
    }
    else {
        return "There was an issue with Unbanning the user please try again";
    }
}

function getUserdata($userID)
{
    $query = "SELECT * FROM users where users.userID = $userID";
    $result = $this->db->query($query);
    $res = $result->first_row();
    return $res;

}






}

?>