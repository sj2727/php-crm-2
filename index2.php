<?php
session_start();
include("panel/globale.php");
$arr = ['agent','visitor'];
if(isset($_SESSION['email']) && in_array($_SESSION['priority'],$arr)){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="icon" href="images/thembal.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OceanOne</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="message"></div>
    <div id="header"></div>
    <div id="body"></div>

    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
    <script src="js/<?php echo (isset($_SESSION['priority']) && $_SESSION['priority'] =='agent'?"script.js":"script2.js")?>"></script>
</body>
</html>
<?php
}else{
    header("location: login.php");
}
?>
