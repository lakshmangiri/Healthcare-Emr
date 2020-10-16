<?php
include('dbconfig.php');

$sql=mysqli_query($conn,"SELECT * FROM `doc_pati_lab` WHERE `type`='1'");
$data=array();
for($i=0;$row=mysqli_fetch_assoc($sql);$i++){
 
$data[]=array(
    "id"=>$row['doc_id'],
    "fname"=>$row['first_name']
);
}
echo json_encode($data);

?>