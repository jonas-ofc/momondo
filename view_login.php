<?php 

$_page = 'login';
$_css = 'style_login.css'; 

require_once __DIR__.'/comp_header.php';

if(!isset($_SESSION['user_name'])){
    $displayUserContent = "none";
    $displayAdminContent = "none";
    $displayGuestContent = "flex";    
};

if(isset($_SESSION['right'])){
    if($_SESSION['right'] == "guest"){
    $displayUserContent = "none";
    $displayAdminContent = "none";
    $displayGuestContent = "flex";  
}  
};

if(isset($_SESSION['user_name']) && isset($_SESSION['rights'])){
    if($_SESSION['rights'] == 'user'){
        $displayUserContent = "block";
        $displayGuestContent = "none";
        $displayAdminContent = "none";
    }

}

if(isset($_SESSION['user_name']) && isset($_SESSION['rights'])){
    if($_SESSION['rights'] == 'admin'){
        $displayUserContent = "none";
        $displayGuestContent = "none";
        $displayAdminContent = "block";
    }

}
 


?>

<main>
<div class="guest-wrapper" style="display:<?= $displayGuestContent ?>">
<img src="img-login-cover.svg" alt="">
   <p><?=$login_dictionary[$lang.'_p']?></p> 
   <div>
   <button type="button" onclick="displaySignup()">Sign Up</button>

   <button id="right-login" onclick="displayLogin()">Login</button>
   </div>
</div>


<div style="display:<?= $displayUserContent ?>">
<form action="api-upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

</div>
<div style="display:<?= $displayAdminContent ?>"><h3 style="color:black"><?=$admin_dictionary[$lang.'_h3']?></h3></div>


</main>


<?php 

require_once __DIR__.'/comp_footer.php'

?>