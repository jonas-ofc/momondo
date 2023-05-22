<?php

define('_REGEX_EMAIL', '/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/');

define('_USER_NAME_MIN_LEN', 2);
define('_USER_NAME_MAX_LEN', 20);
define('_USER_LAST_NAME_MIN_LEN', 2);
define('_USER_LAST_NAME_MAX_LEN', 20);
define('_USER_PASSWORD_MIN_LEN', 3);
define('_USER_PASSWORD_MAX_LEN', 20);




/* function _validate_email(){
  $error_message = 'email missing or invalid';
  if( ! isset($_POST['email']) ){ _respond($error_message, 400); }
  $_POST['email'] = trim($_POST['email']);
  if( ! preg_match(_REGEX_EMAIL, $_POST['email']) ){ _respond($error_message, 400); }
  return $_POST['email'];
} */

function _validate_email(){
    $error_message = 'email missing or invalid';
    if( ! isset($_POST['email']) ){ _respond($error_message, 400); }
    $_POST['email'] = trim($_POST['email']);
    if( ! preg_match(_REGEX_EMAIL, $_POST['email']) ){ _respond($error_message, 400); }
    if(! filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ) ){
      $error_message = 'email is not valid';
      _respond($error_message, 400); }
    return $_POST['email'];
  }

  function _validate_get_email(){
    $error_message = 'email missing or invalid';
    if( ! isset($_GET['email']) ){ _respond($error_message, 400); }
    $_GET['email'] = trim($_GET['email']);
    if( ! preg_match(_REGEX_EMAIL, $_GET['email']) ){ _respond($error_message, 400); }
    if(! filter_var( $_GET['email'], FILTER_VALIDATE_EMAIL ) ){
      $error_message = 'email is not valid';
      _respond($error_message, 400); }
    return $_GET['email'];
  }

  
 // ##############################
function _validate_user_first_name(){
  $error_message = 'user-first-name min '._USER_NAME_MIN_LEN.' max '._USER_NAME_MAX_LEN.' characters';
  if( ! isset($_POST['user-first-name']) ){ _respond($error_message, 400); }
  $_POST['user-first-name'] = trim($_POST['user-first-name']);
  if( strlen($_POST['user-first-name']) < _USER_NAME_MIN_LEN ){ _respond($error_message, 400); }   
  if( strlen($_POST['user-first-name']) > _USER_NAME_MAX_LEN ){ _respond($error_message, 400); }   
  return $_POST['user-first-name'];
} 


// ##############################
function _validate_user_last_name(){
  $error_message = 'user-last-name min '._USER_LAST_NAME_MIN_LEN.' max '._USER_LAST_NAME_MAX_LEN.' characters';
  if( ! isset($_POST['user-last-name']) ){ _respond($error_message, 400); }
  $_POST['user-last-name'] = trim($_POST['user-last-name']);
  if( strlen($_POST['user-last-name']) < _USER_LAST_NAME_MIN_LEN ){ _respond($error_message, 400); }   
  if( strlen($_POST['user-last-name']) > _USER_LAST_NAME_MAX_LEN ){ _respond($error_message, 400); }   
  return $_POST['user-last-name'];
}


function _validate_password_strength(){
  // Given password
$password = $_POST['password'];

// Validate password strength
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
/* $specialChars = preg_match('@[^\w]@', $password); */

if(!$uppercase || !$lowercase || !$number /* || !$specialChars  */|| strlen($password) < _USER_PASSWORD_MIN_LEN || strlen($password) > _USER_PASSWORD_MAX_LEN) {
   
  $error_message = 'Password should be at least 3 characters in length and should include at least one upper case letter, one number, and one special character.';
  _respond($error_message, 400);

}

}


function _validate_confirm_password(){
  // Given password
if($_POST['password']!=$_POST['confirm-password']){
  $error_message = 'Password should match';
  _respond($error_message, 400);
  exit;
}

}




  // ##############################
function _validate_fileToUpload(){
  if($_FILES['fileToUpload']['error'] === UPLOAD_ERR_INI_SIZE) {
    _respond('fileToUpload too large', 400);
  }
  
  $fileToUpload_temp_name = $_FILES["fileToUpload"]["tmp_name"]; // C:\xampp\tmp\php791.tmp || C:\xampp\tmp\php5245.tmp
  $target_dir = "img/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // just reads the extension of the file
  $image_mime = mime_content_type($_FILES["fileToUpload"]["tmp_name"]); // reads the mime inside the file
  $accepted_image_formats = ['image/png', 'image/jpeg'];
  if( ! in_array($image_mime, $accepted_image_formats) ){
    http_response_code(400);
    echo 'image not allowed';
    exit();
  }
  $random_image_name = bin2hex(random_bytes(16));
  switch($image_mime){
    case 'image/png':
      $random_image_name .= '.png';
    break;
    case 'image/jpeg':
      $random_image_name .= '.jpeg';
    break;
  }

  if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], 'img/'. $random_image_name)){
  
    header('Location: /login');
    exit();
  }  
}

// ##############################
function _respond( $message = '',  $http_response_code = 200 ){
  header('Content-Type: application/json');
  http_response_code($http_response_code);
  $response = is_array($message) ? $message : ['info'=>$message];
  echo json_encode($response);
  exit();
}