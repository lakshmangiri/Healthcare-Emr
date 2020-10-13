<?php
include('dbconfig.php');

$id=$_GET['id'];

$sql="SELECT `login_id`,`name`,`email`,`password` FROM `login` WHERE `login_id`='$id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
// $data[]=array(
//     "name"=>$row['name'],
//     "email"=>$row['email'],
//     "password"=>$row['password']
// );
echo json_encode($row);

?>