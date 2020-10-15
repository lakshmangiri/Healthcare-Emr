<?php
include('dbconfig.php');

$sql=mysqli_query($conn,"SELECT * FROM `reports` WHERE rep_type='scan report'");
$data=array();
for($i=0;$row=mysqli_fetch_assoc($sql);$i++){
 
$data[]=array(
    "rep"=>$row['rep_id'],
    "type"=>$row['rep_type'],
    "desc"=>$row['rep_desc'],
    "image"=>$row['re_image'],
    "date"=>$row['created_date']
);
}
echo json_encode($data);

?>