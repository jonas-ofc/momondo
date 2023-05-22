 <?php
session_start();
 
if($_GET['rights'] === "admin"){

 header("Location: /?user=$user_name"); 
}; 

if($_GET['rights'] === "user"){
echo "user";
}; 
