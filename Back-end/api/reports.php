<?php
include('dbconfig.php');

// $postdata=file_get_contents('php://input');

// if(isset($postdata) && !empty($postdata)){

//     $request=json_decode($postdata);

//      $pat=mysqli_real_escape_string($conn,$request->pName);
//      $report=mysqli_real_escape_string($conn,$request->Report);
//      $desc=mysqli_real_escape_string($conn,$request->Desc);

//     $query1=mysqli_query($conn,"SELECT * FROM `doc_pati_lab` WHERE first_name='$pat'");
//     $row1=mysqli_fetch_assoc($query1);
//      $pat_id=$row1['doc_id'];

//     $sql=mysqli_query($conn,
//     "INSERT INTO `reports` (`pat_id`,`rep_type`,`rep_desc`,`created_date`) 
//      VALUES('$pat_id','$report','$desc',NOW())");

//      if($sql == TRUE){
//          http_response_code(201);
//      } else {
//          http_response_code(422);
//      }
// }

$target_dir="medical/src/assets/reports/";
$images=$_FILES["myFile"]["name"];
$target_file=$target_dir.basename($_FILES["myFile"]["name"]);
move_uploaded_file($_FILES["myFile"]["tmp_name"],$target_file);

 $pat=$_POST['pName'];
 $rep=$_POST['Report'];
 $desc=$_POST['Desc'];

$query1=mysqli_query($conn,"SELECT * FROM `doc_pati_lab` WHERE first_name='$pat'");
$row1=mysqli_fetch_assoc($query1);
 $pat_id=$row1['doc_id'];

 $sql=mysqli_query($conn,
 "INSERT INTO `reports` (`pat_id`,`rep_type`,`rep_desc`,`re_image`,`created_date`) 
  VALUES('$pat_id','$rep','$desc','$images',NOW())");
  if($sql == TRUE){
      http_response_code(201);
  } else {
      http_response_code(422);
  }

?>