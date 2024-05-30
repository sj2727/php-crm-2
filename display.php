<?php
//session_start();
include("panel/globale.php");
if(isset($_GET['id']) && $_SESSION['priority']=='superadmin'){
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
        <img class="screen" src="" width="auto" height="550px">
    
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){

function screen(){
    $(".screen").attr("src",'image/<?php echo $_GET['id']; ?>.png');
}

setInterval(function () { console.log("load"); screen(); }, 1000);
});
</script>
</html>


<?php  
    
}
?>