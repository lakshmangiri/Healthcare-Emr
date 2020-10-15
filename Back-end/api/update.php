n<?php
include('dbconfig.php');

$postdata=file_get_contents('php://input');

if(isset($postdata) && !empty($postdata)){

    $request=json_decode($postdata);

   echo $id=mysqli_real_escape_string($conn,(int)$_GET['id']);
    $name=mysqli_real_escape_string($conn,$request->Name);
    $email=mysqli_real_escape_string($conn,$request->Email);
    $password=mysqli_real_escape_string($conn,$request->Password);

    $sql=mysqli_query($conn,"UPDATE `login` SET `name`='$name', `email`='$email', `password`='$password'
     WHERE `login_id`='$id'");

     if($sql == TRUE){
         echo "success";
     } else {
         http_response_code(422);
     }
}

?>