<?php
session_start();

if(!isset($_SESSION['id'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  
   <!-- Font Awesome Cdn Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
<div class="message"></div>
<div class="wrapper fadeInDown">
  <div id="formContent">

    <h2 class="active"> Sign In </h2>

    <div class="fadeIn first">
      <img src="asset/images/logo_br.png" id="icon" alt="User Icon" />
    </div>


    <form id="form" onsubmit="return false">
      <input type="email" id="email" class="fadeIn second" name="email" placeholder="login">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" class="fadeIn fourth submit" value="Log In">
    </form>


    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>
<link rel="stylesheet" href="login.css">
<script src="js/jquery.js"></script>
<script src="asset/js/message.js"></script>
<script src="js/login.js"></script>
<?php
}else{
  if ($_SESSION['priority'] == 'agent') {
    header("location: index.php");
  }else{
    header("location: asset/dashboard.php");
  }
}

?>