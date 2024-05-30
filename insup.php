<?php
session_start();
include("panel/globale.php");

$all = $db->query("SELECT crm_agent.name, crm_agent.status, crm_agent.email, crm_team.campaign, crm_campaign.Prospect_lists, data_list.data FROM crm_team JOIN crm_agent ON crm_team.id = crm_agent.team JOIN crm_campaign ON crm_team.campaign IN ( crm_campaign.id ) JOIN data_list ON data_list.id IN (crm_campaign.Prospect_lists) WHERE crm_agent.email = '".$_SESSION['email']."' AND crm_agent.mode=1 ");

$table = mysqli_fetch_all($all[1], MYSQLI_ASSOC);
$_POST['table'] = $table[0]['data'];
// file upload function
function files($file,$email){
$target_dir = "upload/";
$target_file = $target_dir .(isset($email) && $email !=""?$email:rand())."_" .basename($file["name"]);

if(file_exists($target_file)){
    unlink($target_file);
}

if (move_uploaded_file($file["tmp_name"],"../".$target_file)) {
    $out[0] = 'success';
    $out[1] = $target_file;
}else{
    $out[0] = 'error'; 
}
  return $out;
}

// error upload function
function errorlog($page,$error,$sql){
    $error['id'] = ($db->max("error_log") == NULL? 1 : (int)$db->max("error_log") + 1);
    $error['page'] = $_POST['page'];
    $error['error'] = $db->sanitize($res[1]);
    $error['query'] = $db->sanitize($res[2]);
    $error['status'] = "not solved";
    $db->insert("error_log",$error);
}

// image upload function
function image($file){
    $errors = array();
    $allowed_ext = array('jpg','jgeg','gif','png',"svg");
    $file_ext = explode('.',basename($file["name"]));
    $type = pathinfo($file['tmp_name'], PATHINFO_EXTENSION);
    $data = file_get_contents($file["tmp_name"]);
    $base64 = 'data:image/' . $file_ext[1] . ';base64,' . base64_encode($data);
    if(in_array($file_ext[1],$allowed_ext) === false)
    {
        $errors[]='Extension not allowed';
    }

    if ($data != "") {
        $out[0] = 'success';
        $out[1] = $base64;
    }else{
        $out[0] = 'error';
        foreach ($errors as $key => $value) {
            $out[1] = implode(",",$value);
        }
    }
      return $out;

}

if (isset($_POST)) {
    foreach ($_POST as $key => $value) {
        if ($value !="" && $key != 'id' && $key != 'file' && $key != 'image' && $key != 'page' && $key != 'password' && $key != 'table' && $key != 'avoid' && !in_array($key,(array)$_POST['avoid'])) {
            $data[$key] = $value;
        }
    }

// file upload    
if (isset($_FILES['file']['name']) && $_FILES['file']['name']!=""){
    $s = files($_FILES['file'],$_POST['email']);
    if($s[0] == 'success' ){
        $data['file'] = $s[1];
    }else{ 
       // errorlog($_POST['page'],"File Not Uploaded","");
    }
}
// image upload 
if (isset($_FILES['image']['name']) && $_FILES['image']['name']!=""){
    $s = image($_FILES['image']);
    if($s[0] == 'success' ){
        $data['image'] = $s[1];
    }else{
        //errorlog($_POST['page'],"Image Data has been no Genrated",$s[2]);
    }
}
// Password genration
if(isset($_POST['password']) && $_POST['password'] != ""){
    $data['password'] =  hash('sha512',hash('sha512',$_POST['password']).$_POST['email']);
}
$data['asset'] = $_SESSION['id'];
// insert Update
if(isset($_POST['id'])){
    $res = $db->update($_POST['table'],$data," id=".$_POST['id']);
}else{
    $data['id'] = ($db->max($_POST['table']) == NULL? 1 : (int)$db->max($_POST['table']) + 1);
    $res = $db->insert($_POST['table'],$data);
}

if ($res[0] == 'success') {
    $op = mysqli_fetch_all($res[1], MYSQLI_ASSOC);
//echo json_encode($op);
}else{
    $res[0] = "error";
}


echo json_encode($res);
}
?>