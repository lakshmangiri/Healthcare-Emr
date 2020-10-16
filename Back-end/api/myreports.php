<?php
include('dbconfig.php');

$sql=mysqli_query($conn,"SELECT * FROM `reports`");
$data=array();
for($i=0;$row=mysqli_fetch_assoc($sql);$i++){
    $pat=$row['pat_id'];
    $sql2=mysqli_query($conn,"SELECT * FROM `doc_pati_lab` WHERE `doc_id`='$pat'");
    $row2=mysqli_fetch_assoc($sql2);


$data[]=array(
    "id"=>$row['rep_id'],
    "pat"=>$row2['first_name'],
    "type"=>$row['rep_type'],
    "desc"=>$row['rep_desc'],
    "image"=>$row['re_image'],
    "date"=>$row['created_date']
);
}
echo json_encode($data);

?>