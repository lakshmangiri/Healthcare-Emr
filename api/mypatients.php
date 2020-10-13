<?php
include('dbconfig.php');

$sql=mysqli_query($conn,"SELECT * FROM `doc_pati_lab` WHERE `type`='1'");
$data=array();
for($i=0;$row=mysqli_fetch_assoc($sql);$i++){
 
$data[]=array(
    "rep"=>$row['doc_id'],
    "fname"=>$row['first_name'],
    "lname"=>$row['last_name'],
    "mobile"=>$row['mobile'],
    "email"=>$row['email_id'],
    "date"=>$row['created_date']
);
}
echo json_encode($data);

?>