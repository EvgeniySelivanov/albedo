<?php
require_once 'App/Helpers/Messages.php';
 
function validateEmail($email){
    $pattern = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/";
    if(!preg_match($pattern, $email)) 
    {   
        return false;
    }
   
    else{
        return true;
    }


}