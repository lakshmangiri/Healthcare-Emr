<?php
include('dbconfig.php');

$sql=mysqli_query($conn,"SELECT * FROM `doc_pati_lab`");
$data=array();
for($i=0;$row=mysqli_fetch_assoc($sql);$i++){
  if($row['type'] =='1') {
    $type="Patient";
  } 
  else if($row['type'] =='2') {
    $type="Lab Assistant";
    } 
    else {
      $type="Doctor";
    }
$data[]=array(
    "id"=>$row['doc_id'],
    "fname"=>$row['first_name'],
    "lname"=>$row['last_name'],
    "mobile"=>$row['mobile'],
    "email"=>$row['email_id'],
    "password"=>$row['password'],
    "type"=>$type
);
}
echo json_encode($data);

?>