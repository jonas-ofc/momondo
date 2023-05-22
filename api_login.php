<?php


require_once __DIR__.'/_x.php';

//Connect to database

$users =
[ 
    ['user_name'=>'Abemand','user_last_name'=>'Abekage1', 'user_email'=>'email@email.com', 'user_password'=>'email', 'rights' => 'admin'],
    ['user_name'=>'Kagemand','user_last_name'=>'Abekage2', 'user_email'=>'email2@email.com', 'user_password'=>'email2', 'rights' => 'user'],
    ['user_name'=>'Jørgen','user_last_name'=>'Abekage3', 'user_email'=>'email3@email.com', 'user_password'=>'email3', 'rights' => 'user'],
    ['user_name'=>'Obama','user_last_name'=>'Abekage4', 'user_email'=>'email4@email.com', 'user_password'=>'email4', 'rights' => 'user'],

]; 

// VALIDATE
_validate_email();

// Check if the user's email matches the correct email and password

$noMatcUsers = [];

 foreach ($users as $user) {
    if($user['user_email'] === $_POST['email'] && $user['user_password'] === $_POST['password'] ){
      if($user['rights'] === 'admin'){
        http_response_code(200);
        echo json_encode($user);
        session_start();
        $_SESSION['user_name'] = $user['rights'];
        $_SESSION['rights'] = $user['rights'];
        exit;
      };
        http_response_code(200);
        echo json_encode($user);
        session_start();
        $_SESSION['user_name'] = $user['user_name'];
        $_SESSION['rights'] = $user['rights'];
        exit;
      
    }
    
    
    if(!$user['user_email'] != $_POST['email'] || $user['user_password'] != $_POST['password'] ){
        array_push($noMatcUsers, $user);
    }
  } 

  if(count($noMatcUsers) === count($users)){
    http_response_code(400);
    /*   */
    exit;
  }

// SUCCESS

echo json_encode($users);