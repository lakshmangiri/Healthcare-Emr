<?php
include('dbconfig.php');

$postdata=file_get_contents('php://input');

if(isset($postdata) && !empty($postdata)){

    $request=json_decode($postdata);

     $pat=mysqli_real_escape_string($conn,$request->pName);
     $doc=mysqli_real_escape_string($conn,$request->dName);
     $date=mysqli_real_escape_string($conn,$request->Date);

    $query=mysqli_query($conn,"SELECT * FROM `doc_pati_lab` WHERE first_name='$doc'");
    $row=mysqli_fetch_assoc($query);
     $doc_id=$row['doc_id'];

    $query1=mysqli_query($conn,"SELECT * FROM `doc_pati_lab` WHERE first_name='$pat'");
    $row1=mysqli_fetch_assoc($query1);
     $pat_id=$row1['doc_id'];

    $sql=mysqli_query($conn,
    "INSERT INTO `apponintment` (`pat_id`,`doc_id`,`app_date`,`created_date`) 
     VALUES('$pat_id','$doc_id','$date',NOW())");

     if($sql == TRUE){
         http_response_code(201);
     } else {
         http_response_code(422);
     }
}

?>