<?php
class Navigation_Model extends CI_Model {
    public function getNavigation()
    {
        $data = array();
        if(isset($_SESSION['ID']))
        {
            if ($_SESSION['loggedIn'] == True && $_SESSION['admin'] == 1)
            {
                array_push($data,"BanUser","UnbanUser","CreateThread","CreateCategory","logouts");
            }
            else if ($_SESSION['loggedIn'] == True)
            {
                array_push($data,"Forums","logouts");
                return $data;
            }
            else
            {
                array_push($data,"Logins","Registrations","Forums");
            }
        }
        else {

            array_push($data,"Logins","Registrations","Forums");
        }
        return $data;

    }
    }
    


?>
