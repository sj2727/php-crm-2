
<?php
include("panel/globale.php");
session_start();
$sq ="";
if(isset($_POST['id']) && $_POST['id'] !=""){
$sq =" AND id=".$_POST['id'];
}
$all = $db->query("SELECT crm_agent.name, crm_agent.status, crm_agent.email, crm_team.campaign, crm_campaign.Prospect_lists, data_list.data FROM crm_team JOIN crm_agent ON crm_team.id = crm_agent.team JOIN crm_campaign ON crm_team.campaign IN ( crm_campaign.id ) JOIN data_list ON data_list.id IN (crm_campaign.Prospect_lists) WHERE crm_agent.email = '".$_SESSION['email']."' AND crm_agent.mode=1 ");

$table = mysqli_fetch_all($all[1], MYSQLI_ASSOC);
$op = array();
for ($i=0; $i < sizeof($table); $i++) {

$data = $db->read($table[$i]['data'],' WHERE `asset` ='.$_SESSION['id']." AND DATE(create_on) = CAST( curdate() AS DATE)".$sq);

if ($data[0] == 'success') { 
$d = mysqli_fetch_all($data[1], MYSQLI_ASSOC);
$op[0] ='success';
$op[1] = $d;
$op[2] = $table[$i]['data']; 

    $up['asset']= $_SESSION['id'];
    date_default_timezone_set($_POST['timezone']);
    $date=date_create();
    $up['on_create']= date_format($date,"Y-m-d H:i:s");
    $uu = $db->update($table[$i]['data'],$up," id=".$d[0]['id']);
}else{
    $op[0] ="error";
    $op[1] = "Wait For assigning Data. Contact to admin ";
	$op[2]= $data[1];
}

}
echo json_encode($op);

?>
