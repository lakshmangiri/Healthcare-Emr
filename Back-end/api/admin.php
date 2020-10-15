<?php
include('dbconfig.php');

$postdata=file_get_contents('php://input');

if(isset($postdata) && !empty($postdata)){

    $request=json_decode($postdata);

     $name=mysqli_real_escape_string($conn,trim($request->Name));
     $password=mysqli_real_escape_string($conn,trim($request->Password));

         $sql="SELECT * FROM `admin`";
         $result=mysqli_query($conn,$sql);
         $row=mysqli_fetch_assoc($result);
         $data=array();
         
     if($name==$row['username'] && $password==$row['password']){
         $status=1;
        //  $data[]=array(
        //      "status"=>$status
        //  ); 
        echo $status;
     } else {
        //  http_response_code(422);
        $status=2;
        echo $status;
     }
    //  echo json_encode($data);
}


?>