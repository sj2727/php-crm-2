<?php 
session_start();
include("panel/globale.php");


if ( isset($_POST) ) {
foreach ($_POST as $key => $val) {
    if($key != "file"){
        $data[$key] = $val;
    }
}

$target_dir = "upload/";
$target_file = $target_dir .(isset($_POST['email'])?$_POST['email']:rand())."_" .basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    echo " ";
  } else {
    echo "<div> Sorry For Inconvinience, There is technical error <br> Please Try again sometime !!.. </div>";
  }


$data['resume'] = $target_file;
$data['id'] = ($db->max("crm_resume") == NULL? 1 : (int)$db->max("crm_resume") + 1);
$data['status'] =0;
$res = $db->insert("crm_resume",$data);
if($res[0] == 'success'){
    echo '<div> Application Send Successfully </div>';
}else{
    
}
//echo json_encode($res);
}

?>
<style>
    div {
    margin: 0 auto;
    display: flex;
    width: 100%;
    height: 100%;
    align-items: center;
    justify-content: center;
    font-size: 30px;
}
</style>