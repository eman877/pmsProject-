<?php


include "../../core/validation.php";
include "../../core/function.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name =  trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirm_password = trim($_POST["confirm_password"]);
 
  $error = validaterigester ($name,$email,$password,$confirm_password );

  if (!empty($error)){
    setmassage("danger" ,$error);  
    header("Location:../../register.php");
   exit;
} 


if (createUser($name,$email,$password,$confirm_password)){
     setmassage("success" ,"register correctelly");  
     header("Location:../../register.php"); 
     exit;
     
}

  
}


?>