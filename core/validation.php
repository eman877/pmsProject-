<?php


function validaterequired($value ,$fildName){
    if (empty($value)){

    return "$fildName is required";
    }
    return null;
};


function validateemail($email){
return filter_var($email, FILTER_VALIDATE_EMAIL) ? null : "invalid email " ;

};

function validatepassword($password){
    if(strlen($password) < 6){
        return "Password must be at least 6 characters";
    }

    return null;

};

function validatecomfirmpassword($password,$confirm_password){
  
  if($password !== $confirm_password) {
    return " Passwords do not match";
  } 
return null;
};


function validaterigester ($name,$email,$password,$confirm_password ){
 
$fields =[
    'name'  => $name,
    'email' => $email,
    'password' => $password ,
    'confirm_password' => $confirm_password
];

foreach($fields as $fieldname =>$value){

$error = validaterequired($value ,$fieldname);

if($error){
    return $error;
}

}

$error= validateemail($email);
if($error){
    return $error;
}

$error= validatepassword($password);
if($error){
    return $error;
}

$error = validatecomfirmpassword($password,$confirm_password);
if($error){
    return $error;
}

};


function validatecontact ($name,$email,$message){
 $fields =[
    'name'  => $name,
    'email' => $email,
    'message' => $message 
];
foreach($fields as $fieldname =>$value){

$error = validaterequired($value ,$fieldname);

if($error){
    return $error;
}

}

$error= validateemail($email);
if($error){
    return $error;
}

}
?>