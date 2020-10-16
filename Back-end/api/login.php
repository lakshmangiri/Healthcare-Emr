<?php
include('dbconfig.php');

$sql=mysqli_query($conn,"SELECT * FROM `login`");
$data=array();
for($i=0;$row=mysqli_fetch_assoc($sql);$i++){
  
$data[]=array(
    "id"=>$row['login_id'],
    "name"=>$row['name'],
    "email"=>$row['email'],
    "password"=>$row['password']
);
}
echo json_encode($data);

?>