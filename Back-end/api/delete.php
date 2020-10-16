<?php
include('dbconfig.php');
$id=$_GET['id'];

$sql=mysqli_query($conn,"DELETE FROM `login` WHERE `login_id`='$id'");
if($sql == TRUE){
    echo "";
}
?>