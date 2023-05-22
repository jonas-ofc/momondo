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
_validate_email();
_validate_user_first_name(); 
_validate_user_last_name();
_validate_password_strength();
_validate_confirm_password();


// Check if the user's email matches an email

$noMatcUsers = [];

 foreach ($users as $user) {
    if($user['user_email'] === $_POST['email']){
        http_response_code(400);
        echo json_encode('A user already exist with that email');
        exit;
  } if(!$user['user_email'] != $_POST['email']){
    array_push($noMatcUsers, $user);
}
}

if(count($noMatcUsers) === count($users)){
    http_response_code(200);
    session_start();
    $_SESSION['user_name'] = $_POST['user-first-name'];
    $_SESSION['rights'] = "user";
    $userdata =['user-first-name'=>$_POST['user-first-name'],'user-last-name'=>$_POST['user-last-name'], 'user-email'=>$_POST['email'], 'user-password'=>$_POST['password']]; 
    echo json_encode($userdata);
    exit;
  }

  