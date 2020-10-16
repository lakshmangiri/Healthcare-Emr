<?php
include('dbconfig.php');

$postdata=file_get_contents('php://input');

if(isset($postdata) && !empty($postdata)){

    $request=json_decode($postdata);

     $email=mysqli_real_escape_string($conn,trim($request->Email));
     $password=mysqli_real_escape_string($conn,trim($request->Password));
     $type=mysqli_real_escape_string($conn,trim($request->Type));

         $sql="SELECT * FROM `doc_pati_lab` WHERE `email_id`='$email' AND `password` ='$password'
         AND `type`='$type'";
         $result=mysqli_query($conn,$sql);
         $row=mysqli_num_rows($result);
         $val=mysqli_fetch_assoc($result);
         if($row==1){
            echo $val['type'];
         }
    
}


?>