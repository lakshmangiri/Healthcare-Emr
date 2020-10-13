<?php
include('dbconfig.php');

$sql=mysqli_query($conn,"SELECT * FROM `apponintment`");
$data=array();
for($i=0;$row=mysqli_fetch_assoc($sql);$i++){
    $doc=$row['doc_id'];
    $pat=$row['pat_id'];

    $sql1=mysqli_query($conn,"SELECT * FROM `doc_pati_lab` WHERE `doc_id`='$doc'");
    $row1=mysqli_fetch_assoc($sql1);

    $sql2=mysqli_query($conn,"SELECT * FROM `doc_pati_lab` WHERE `doc_id`='$pat'");
    $row2=mysqli_fetch_assoc($sql2);


$data[]=array(
    "id"=>$row['app_id'],
    "doc"=>$row1['first_name'],
    "pat"=>$row2['first_name'],
    "appdate"=>$row['app_date'],
    "date"=>$row['created_date']
);
}
echo json_encode($data);

?>