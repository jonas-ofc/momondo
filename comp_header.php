<?php 
require_once __DIR__.'/_dictionary.php';
session_start();
if(!isset($_GET['lang'])){$_SESSION['lang'] = "en";};
if(isset($_GET['lang'])){$_SESSION['lang'] = $_GET['lang'];};

/* $theSession = session_encode();
 */

 $lang = $_SESSION['lang'];
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $_page ?? 'No title!' ?></title>

    
    <link rel="stylesheet" href="style_comp_header.css">
    <link rel="stylesheet" href=<?= $_css ?? 'style_app.css' ?>>

      

</head>
  <body>

  <header>

  <nav>
  <div id="section_one">
    <button onclick="displayNav()">
  <img src="icon_burger.svg" alt="burger">
  </button>

  

  <div id="login-link">  
 <a href="/login?lang=<?=$lang?>" <?= $_page == 'login' ? 'class="active"' : '' ?>>
 <img src="/icon_login.svg" alt="login icon">
  <p class="nav-text">   <?= $header_dictionary[$lang.'_login'] ?></p></a>
  </div>
  </div>
  <div id="section_two">

  <div> 
 <a href="/?lang=<?=$lang?>" <?= $_page == 'flights' ? 'class="active"' : '' ?>>
 <img src="/icon_flights.svg" alt="flights icon">
  <p class="nav-text"><?= $header_dictionary[$lang.'_flights'] ?></p></a>
  </div>
  <div> 
  <a href="/stays?lang=<?=$lang?>" <?= $_page == 'stays' ? 'class="active"' : '' ?>>
  <img src="/icon_stays.svg" alt="stays icon"><p class="nav-text"><?= $header_dictionary[$lang.'_stays'] ?></p></a>
  </div>
  <div> 
  <a href="/car_hire?lang=<?=$lang?>" <?= $_page == 'car hire' ? 'class="active"' : '' ?>>
  <img src="/icon_car_hire.svg" alt="care hire icon"><p class="nav-text"><?= $header_dictionary[$lang.'_car_rental'] ?></p></a>
  </div>
  <div> 
  <a href="/campers?lang=<?=$lang?>" <?= $_page == 'campers' ? 'class="active"' : '' ?> >
  <img src="icon_campers.svg" alt="campers icon"><p class="nav-text"><?= $header_dictionary[$lang.'_campers'] ?></p></a>
  </div>
 
    
   </div>
   <div> 
  <a href="/?lang=<?=$lang?>" <?= $_page == 'explore' ? 'class="active"' : '' ?> >
  <img src="icon_explore.svg" alt="explore icon"><p class="nav-text"><?= $header_dictionary[$lang.'_explore'] ?></p></a>
  </div>
  <div> 
  <a href="/?lang=<?=$lang?>" <?= $_page == 'restricions' ? 'class="active"' : '' ?> >
  <img src="icon_travel_restrictions.svg" alt="restricions icon"><p class="nav-text"><?= $header_dictionary[$lang.'_restrictions'] ?></p></a>
  </div>
  </nav>

  <div id="right_nav">
    <div id="logo">
      <img src="/icon_momondo.svg" alt="momondo"></div>

    <div id="right_sub_nav">
  
      <a href=""><?= $header_dictionary[$language.'_trips'] ?></a>
      <?php      
      
     /*  session_start();   */
      if( isset($_SESSION['user_name']) ){
        
      echo ' <button type="button" onclick="showSignout()" id="right-login">
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
      viewBox="0 0 500 500">
      <g id="UrTavla">
      <circle style="fill:rgba(255, 255, 255);stroke:#010101;stroke-width:1.6871;stroke-miterlimit:10;" cx="250" cy="250" r="245">
      </circle>
      <text fill="rgb(33, 3, 58);" x="50%" y="50%" text-anchor="middle"  dy=".3em" >'.$_SESSION['user_name'][0].'</text>
      </g>
      </svg>'.$_SESSION['user_name'].'<img src="icon_down-arrow.svg"></button>';
    };
 
   
    if( ! isset($_SESSION['user_name']) ){
      
      echo '<button id="right-login" onclick="displayLogin()" href=""><img src="icon_login.svg">Login</button>';
    }
    ?>

<div id="signout-box"  style="display:none">
  <a href=""><?= $header_dictionary[$lang.'_your_trips'] ?></a>
  <a href=""><?= $header_dictionary[$lang.'_help_faq'] ?></a>
  <a href=""><?= $header_dictionary[$lang.'_your_account'] ?></a>
  <a id="signout-button" href="bridge_logout.php"><?= $header_dictionary[$lang.'_sign_out'] ?></a>
</div>

<!-- Country Flag Fixer extention for chrome to fix flag not showing -->

      <button id="display_countries" onclick="displayCountries()" onblur="hideCountries()" style="font-size:x-large;text-decoration:none;background:none;color: inherit;
	border: none;
	padding: 0;
	cursor: pointer;
	outline: inherit;text-align:center;align-items:center; font-family: DejaVu Sans, Symbola, Everson Mono, Dingbats, Segoe UI Symbol,
 Quivira, SunExt-A, FreeSerif, Universalia, unifont;"><p><?= $flag_dictionary[$lang.'_flag'] ?></p></button>



<!-- HEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEER -->




 <div style="display:none" id="show-countries">
  <a id="lang-dk" href="?lang=dk">&#127465&#127472</a>
  <a id="lang-eng" href="?lang=en">🇬🇧</a>
</div>



<!-- HEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEER -->

<button onclick="displayCurrencies()" onblur="hideCurrencies()" style="font-size:large;text-decoration:none;background:none;color: inherit;
	border: none;
	padding: 0;
	cursor: pointer;
	outline: inherit;" href="">kr.</button>

  
    </div>
  
  </div>

  </header>
  
  <div class="templates">

<div id="login-popup" >

<div class="login-wrapper">

<div class="login-nav">
  <img src="icon_momondo.svg" alt="">
  <div class="close-icon" onclick="closeLoginBox()">
  ❌
  </div>
</div>

<img src="img-login-cover.svg" alt="">
<p><?=$login_dictionary[$lang.'_p']?></p>
<form id="login_form"  onsubmit="validate(loginValidation()); return false";>
   <!--  <label for="email">Email:</label> -->
    <input name="email" type="text" placeholder="email@email.com" data-validate="email" maxlength="30">
    
   <!--  <label for="password">Password:</label> -->
    <input name="password" type="password" placeholder="password" data-validate="password" maxlength="30">
    <p></p>
    <div class="login-button-wrapper">
    <button type="button" onclick="displaySignup()">Sign Up</button>
    <button>Login</button></div>
</form>

</div>



</div>
<div class="signup-wrapper">

<div class="signup">
<div class="login-nav">
  <img src="icon_momondo.svg" alt="">
  <div class="close-icon" onclick="closeSignupBox()">
  ❌
  </div>
</div>

<!-- <img src="img-login-cover.svg" alt=""> -->
<h2>Create an account</h2>
<p></p>
<!-- onblur="validate(signupValidation()); return false" -->

<form id="signup_form"  onsubmit="validate(signupValidation); return false";>
   <!--  <label for="email">Email:</label> -->
    
   <input name="user-first-name" type="text" maxlength="30" placeholder="First name" data-validate="str" data-min="2" data-max="10">
   <p></p>
   <input name="user-last-name" type="text" maxlength="30" placeholder="Last name" data-validate="str" data-min="2" data-max="10">
   <p></p>
   <input name="email" onblur="validateEmail()" maxlength="30" type="text" placeholder="email@email.com" data-validate="email">
    <p></p>
   <!--  <label for="password">Password:</label> -->
   
   <input name="password" onblur="validatePassword()" maxlength="30" type="password" placeholder="password"  data-match-name="password" data-validate="password">  
   <p></p>
   <input name="confirm-password" onblur="validateConfirmPassword()" type="password" maxlength="30" placeholder="confirm password" data-validate="match" data-match-name="password">
    <p></p>
    <div class="signup-button-wrapper">
    <button onclick="">Sign Up</button>
    </div>
</form>

</div>
</div>
  </div>
  
 <script>

  function displaySignup(){
document.querySelector("#login-popup").style.display = "none";
document.querySelector(".signup-wrapper").style.display ="grid";

  }

  function closeSignupBox(){
  template = document.querySelector(".signup-wrapper");
  template.style.display = "none";
}

 document.addEventListener('click', function handleClickOutsideBox(event) {
  const box = document.getElementById('signout-box');
  const box2 = document.getElementById('right-login');
  if (!box.contains(event.target) && !box2.contains(event.target)) {
    box.style.display = 'none';
  }
});


document.addEventListener('click', function handleClickOutsideBox2(event) {
  const box = document.getElementById('show-countries');
  const box2 = document.getElementById('display_countries');
  
  if (!box2.contains(event.target)) {
    box.style.display = 'none';
  }
});

 function showSignout(){

  const signoutBox = document.querySelector("#signout-box")
if(signoutBox.style.display === "grid"){
  console.log(signoutBox.style.display)
  signoutBox.style.display = "none"
  return
}
if(signoutBox.style.display === "none"){
  console.log(signoutBox.style.display)
  signoutBox.style.display = "grid"
  return
}

} 

function displayCountries(){

  const countriesBox = document.querySelector("#show-countries")
if(countriesBox.style.display === "block"){
  console.log(countriesBox.style.display)
  countriesBox.style.display = "none"
  return
}
if(countriesBox.style.display === "none"){
  console.log(countriesBox.style.display)
  countriesBox.style.display = "block"
  return
}
  console.log("displaying countries")
  
}

function hideCountries(){
  console.log("hiding countries")
  
}

function displayNav(){
  console.log("displaying nav")
  const navText = document.querySelectorAll(".nav-text")
navText.forEach((p)=>{

  console.log(p, p.style.display)
  
if(p.style.display === "block"){
  console.log(p.style.display)
  p.style.display = "none"
  return
}
if(p.style.display === "none"|| p.style.display === ""){
  console.log(p.style.display)
  p.style.display = "block"
  return
}


})


}


function displayLogin(){
  template = document.querySelector("#login-popup");
  template.style.display = "grid";
}


function closeLoginBox(){
  template = document.querySelector("#login-popup");
  template.style.display = "none";
}

async function loginValidation(){
      const the_form = document.querySelector("#login_form")
      console.log(the_form)
      const conn = await fetch('api_login.php', {
        method : "POST",
        body : new FormData(the_form)
      });
      if(!conn.ok ){ 
        Swal.fire(
        'Login failed!',
        'No user with that login',   
        'error'
      ).then(function() {
        
      /* window.location = "view_login.php"; */
});
      
      }   
      const data = await conn.json() // Convert text to JSON
      console.log(data);
    
      Swal.fire(
        'Welcome '+ data['user_name'] +' '+ data['user_last_name'] ,
        'Login Succesfully!',
        'success'
      ).then(function(data) {
        
         window.location = "?";
        /* 
        window.location = "bridge_login.php?rights="+ data['user_rights'] + "&user="+data['user_name'];
      */
      }); 
  
    }
   
  async function signupValidation(){
      const the_form = document.querySelector("#signup_form")
      console.log(the_form)
      const conn = await fetch('api_signup.php', {
        method : "POST",
        body : new FormData(the_form)
      })

      if( !conn.ok ){
        Swal.fire(
        'Signup failed!',
        'FAIIL',   
        'error'
      )
      }
      if( conn.ok ){ 
        console.log("connected")
        
      const data = await conn.json() // Convert text to JSON
     console.log(data);
      document.querySelector(".signup-wrapper").style.display = "none";

      Swal.fire(
        'Welcome '+ data['user-first-name'] +' '+ data['user-last-name'] ,
        'Signup Succesfully!',
        'success'
      ).then(function(data) {

        window.location = "/";
      }); 
      }
    }

 


 </script>
<!--  <script src="_validator.js"></script> -->

 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

