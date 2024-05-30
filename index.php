<?php
//session_start();
include("panel/globale.php");
$arr = ['agent','visitor'];
if(isset($_SESSION['email']) && in_array($_SESSION['priority'],$arr)){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="asset/images/thembal.png">
    <meta name="theme-color" content="#1bb566">
    <title>Dashboard</title>
    <link rel="stylesheet" href="asset/css/dashboard.css">
</head>
<body>
<div class="messg">
<div class="message"></div>
</div>
    <div class="header">
                <i class="nav_bars fa-solid fa-bars"></i> 
                <img class="logo" src="asset/images/logo_br.png" alt="" srcset=""> 
                <div class="loout">
                    Logout
                </div>
    </div>
    <div class="main">
    <?php if($_SESSION['priority'] == 'agent'){ ?>
        <div class="left">
          <ul><?php if(isset($_SESSION['name'])){ ?>
            <li class="menu-heading"> <?php echo $_SESSION['name']; ?></li>
            <?php } ?>
            <li class="menu-heading">Menu</li>
            <li class="menu" ><span data-toggle="tab"><i class="fa fa-solid fa-gauge fa-lg"></i> Dashboard</span></li>
            <li class="menu" ><span data-toggle="tab" ><i class="fa fa-solid fa-phone fa-lg"></i> Calling</span></li>
            <li class="menu" ><span data-toggle="tab"><i class="fa fa-solid fa-bell fa-lg"></i> Call Back</span></li>
            <li class="menu" ><span data-toggle="tab"><i class="fa fa-solid fa-bell fa-lg"></i> Blank Disposition</span></li>
            <li class="menu" ><span data-toggle="tab"><i class="fa fa-solid fa-gear fa-lg"></i>Settings</span></li>
          </ul>
        </div>
        <?php } ?>
        <div class="right"> 
        <div id="body">
            
        </div>
      </div> 
      <script src="js/jquery.js"></script>
      
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="js/<?php echo (isset($_SESSION['priority']) && $_SESSION['priority'] =='agent'?"script.js":"script2.js")?>"></script> 
</body>
</html>
<?php
}else{
    header("location: login.php");
}
?>
