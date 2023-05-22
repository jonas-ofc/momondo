<?php
require_once __DIR__.'/_x.php';


$users =
[ 
    ['user_name'=>'Abemand','user_last_name'=>'Abekage1', 'user_email'=>'email@email.com', 'user_password'=>'email'],
    ['user_name'=>'Kagemand','user_last_name'=>'Abekage2', 'user_email'=>'email2@email.com', 'user_password'=>'email2'],
    ['user_name'=>'Jørgen','user_last_name'=>'Abekage3', 'user_email'=>'email3@email.com', 'user_password'=>'email3'],
    ['user_name'=>'Obama','user_last_name'=>'Abekage4', 'user_email'=>'email4@email.com', 'user_password'=>'email4'],

]; 

// VALIDATE
/* _validate_get_email();
 */
// Check if the user's email matches an email

$noMatcUsers = [];

 foreach ($users as $user) {
    if($user['user_email'] === $_GET['email']){
        http_response_code(400);
        echo json_encode('A user already exist with that email');
        exit;
  } if(!$user['user_email'] != $_GET['email']){
    array_push($noMatcUsers, $user);
}
}

if(count($noMatcUsers) === count($users)){
    http_response_code(200);
    exit;
  }
