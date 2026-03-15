
<?php

//session_start();

function setmassage($type ,$massege){

$_SESSION['message']=[
'type' =>$type,
'text'=>$massege

];

}

function showmessage(){
if(isset($_SESSION['message'])){
 $type = $_SESSION['message']['type'];
 $text = $_SESSION['message']['text'];

 echo "<div class='alert alert-$type'>$text</div>";

unset($_SESSION['message']);
}
}


function createUser($name,$email,$password,$confirm_password){
$path = __DIR__ . "/../data/users.json";
$usersData =[
    'name'  => $name,
    'email' => $email,
    'password' => $password ,
    'confirm_password' => $confirm_password
];
$users = json_decode( file_get_contents($path),true);
$users[] = $usersData;
file_put_contents($path, json_encode($users, JSON_PRETTY_PRINT));
return true ;

}



function loginUser($email, $password){

    session_start();
   
    $users = json_decode(file_get_contents(__DIR__."/../data/users.json"), true);
     
    foreach($users as $user){
    
        if($user['email'] == $email && $user['password'] == $password){
    
            $_SESSION['user'] = $user;
            return true;
         
        }

    }

    return false;
}


function contact($name,$email,$message){
$path = __DIR__ . "/../data/contact.json";
$contactuser =[
    'name'  => $name,
    'email' => $email,
    'message'=>$message
];
$contact = json_decode( file_get_contents($path),true);

$contact[] = $contactuser ;
file_put_contents($path, json_encode($contact, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
return true ;

}