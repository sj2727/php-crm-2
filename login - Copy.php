<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="login.css">
   <!-- Font Awesome Cdn Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   <link rel="stylesheet" href="../dashboard/pages/css/p1.css">
</head>
<body>
  
<div class="message"></div>
  <div class="wrapper">
    <h1>Hello Again!</h1>
    <p>Welcome back you've <br> been missed!</p>
    <form id="form" onsubmit="return false">
      <input type="email" name="email" placeholder="Enter username">
      <input type="password" name="password" placeholder="Password">
      <p class="recover">
        <a href="#">Recover Password</a>
      </p>
    </form>
    <button id="sign-in">Sign in</button>
    <p class="or">
      ----- or continue with -----
    </p>
    <div class="icons">
      <i class="fab fa-google"></i>
      <i class="fab fa-github"></i>
      <i class="fab fa-facebook"></i>
    </div>
    <div class="not-member">
      Not a member? <a href="register.php">Register Now</a>
    </div>
  </div>
</body>
<script src="js/jquery.js"></script>
<script src="js/login.js"></script>
</html>
