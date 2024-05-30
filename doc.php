<?php
//session_start();
include("panel/globale.php");
$allowss = ['superadmin','hr'];
if(isset($_GET['id']) && in_array($_SESSION['priority'],$allowss)){
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/theme.css">
    <style>
        .dd {
        display: flex;
    flex-direction: column;
    gap: 20px;
    align-items: center;
}
button.verify {
    background: green;
    color: #fff;
}
.message {
    color: #fff;
}
    </style>
</head>
<body>
    <div class="messg">
<div class="message"></div>
</div>
    <?php 
     $r = $db->read("crm_doc",' WHERE agent_id='.$_GET['id']);
     if($r[0]=='success'){
          $op = mysqli_fetch_all($r[1], MYSQLI_ASSOC);
         
          echo '
          <div class="wrap">
          <div class="dd">';
           if($op[0]['pan'] !=""){
               echo '
          <embed src="https://crm.oceanone.co.in/asset/'.$op[0]['pan'].'" scrolling="auto" width="100%" height="500px" />
          ';
          
                     if($op[0]['pan_status']!=1){
                          echo '<button class="verify pan" id="'.$op[0]['agent_id'].'"> Verify </button>
                          ';
                          }else{
                              echo '<span class="veri"> Verified </span>';
                          }
                          echo '<a href="https://crm.oceanone.co.in/asset/'.$op[0]['pan'].'" download> Download</a>';
           }else{
               echo '<span> Pan Card Not Uploaded </span>';
           }
           
         
          
          echo '
          
          </div>
          <div class="dd">';
          
           if($op[0]['adhar'] !=""){
               echo '
          <embed src="https://crm.oceanone.co.in/asset/'.$op[0]['adhar'].'" scrolling="auto" width="100%" height="500px" />
          ';
          
                     if($op[0]['adhar_status']!=1){
                          echo '<button class="verify adhar" id="'.$op[0]['agent_id'].'"> Verify </button>';
                          }else{
                              echo '<span class="veri"> Verified </span>';
                        }
          
                echo '<a href="https://crm.oceanone.co.in/asset/'.$op[0]['adhar'].'" download> Download</a>';
           }else{
               echo '<span> Adhar Card Not Uploaded </span>';
           }
           
         
          
          echo '
          </div>
           </div>
          ';
     }
     ?>
</body>
<script src="asset/js/message.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $(".messg").hide();
    
 $(".pan").click(function(){

    $.ajax({
        type: "POST",
        url: "docup.php",
        data: {pan_status : 1, id : this.id},
        success: function (response) {
            var data = JSON.parse(response);
            if(data[0]=="success"){
            $(".message").html("Verified");
            $(".pan").hide();
            done();
            }else{
                $(".message").html('Error! Please Try again sometime'+data[1]);
                error();
            }
        }
    });
 });
 $(".adhar").click(function(){
     
    $.ajax({
        type: "POST",
        url: "docup.php",
        data: {adhar_status : 1, id: this.id},
        success: function (response) {
            var data = JSON.parse(response);
            if(data[0]=="success"){
            $(".message").html("Verified");
            $(".adhar").hide();
            done();
            }else{
                $(".message").html('Error! Please Try again sometime'+data[1]);
                error();
            }
        }
    });
 });
});
</script>
</html>


<?php  
    
}
?>