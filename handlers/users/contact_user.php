<?php
include "../../core/validation.php";
include "../../core/function.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

  $error = validatecontact ($name,$email,$message);

  if (!empty($error)){
    setmassage("danger" ,$error);  
    header("Location:../../contact.php");
   exit;
} 

 if (contact($name,$email,$message)){
     setmassage("success" ,"contact send successfully");  
     header("Location:../../contact.php"); 
     exit;
}

}