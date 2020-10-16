<?php
header('Access-Control-Allow-Origin: http://localhost:4200/');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$servername="localhost";
$username="root";
$passsword="";
$dbname="medical";

$conn=new mysqli($servername,$username,$passsword,$dbname);
if($conn->connect_error){
    die("Cannot Be Connected".$conn->connect_error);
}
?>