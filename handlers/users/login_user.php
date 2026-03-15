<?php


include "../../core/validation.php";
include "../../core/function.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);


  if(loginUser($email,$password)){

    setmassage("success","Login successful");
    header("Location: ../../index.php");
    exit;

}else{

    setmassage("danger","Email or password incorrect");
    header("Location: ../../login.php");
    exit;

}


}