<?php
session_start();
include("panel/globale.php");
if(isset($_SESSION['email']) && $_SESSION['mode']==1){
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="asset/images/thembal.png">
    <meta name="theme-color" content="#1bb566">
    <title>Dashboard</title>
    <link rel="stylesheet" href="asset/css/dashboard.css">
    <style>
        .sect {
    flex-basis: 96%;
}
    </style>
</head>
<body>
      <div class="message"></div>
      <div class="header">
                <i class="nav_bars fa-solid fa-bars"></i> 
                <img class="logo" src="asset/images/logo_br.png" alt="" srcset=""> 
                <div class="loout">
                    Logout
                </div>
            </div>
<div class="body">


<div class="sect">
    <div class="title">
        Write File
    </div>
        <form id="form" onsubmit="return false">
        <div class="input">
        <lable for="name">name</lable>
        <input type="text" name="name" style="display:block;">
        </div>
        <div class="input">
        <lable for="phone">phone</lable>
        <input type="text" name="phone" style="display:block;">
        </div>
        <div class="input">
        <lable for="company">company</lable>
        <input type="text" name="company" style="display:block;">
        </div>
        <div class="input">
        <lable for="role">role</lable>
        <input type="text" name="role" style="display:block;">
        </div>
        <div class="input">
        <lable for="email">email</lable>
        <input type="email" name="email" style="display:block;">
        </div>
        <div class="input">
        <lable for="industry">industry</lable>
        <input type="text" name="industry" style="display:block;">
        </div>
        <div class="input">
        <lable for="address">address</lable>
        <input type="text" name="address" style="display:block;">
        </div>
        <div class="input">
        <lable for="city">city</lable>
        <input type="text" name="city" style="display:block;">
        </div>
        <div class="input">
        <lable for="zipcode">zipcode</lable>
        <input type="text" name="zipcode" style="display:block;">
        </div>
        <div class="input">
        <lable for="emp_range">emp_range</lable>
        <input type="text" name="emp_range" style="display:block;">
        </div>
        <div class="input">
        <lable for="timezone">timezone</lable>
        <input type="text" name="timezone" style="display:block;">
        </div>
        <div class="buttons">
            <button class="btn submit" id="submit">Submit</button>
            <button class="btn clear" id="clear">Clear</button>
        </div>
        </form>
</div>
<div class="sect">
    <div class="title">
        File Data
    </div>
    <div class="table">
        <table>
            
        </table>
    </div>
</div>
</div>
 <script src="js/jquery.js "></script>
            <script src="postdata.js"></script>
</body>
</html>
<?php
}else{
    header("location: login.php");
}
?>
