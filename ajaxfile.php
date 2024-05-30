<?php 
session_start();
include("panel/globale.php");
$image = $_POST['image'];

$location = "image/";

$image_parts = explode(";base64,", $image);

$image_base64 = base64_decode($image_parts[1]);


$filename = $_SESSION['email'].".png";

$file = $location . $filename;

date_default_timezone_set("Asia/Calcutta");
    $date=date_create();
    $up['lastactive']= date_format($date,"Y-m-d H:i:s");
    $uu = $db->update("crm_agent",$up," id=".$_SESSION['id']);


file_put_contents($file, $image_base64);
?>