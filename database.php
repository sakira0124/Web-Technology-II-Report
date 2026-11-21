<?php
error_reporting(E_ERROR);
try{
$conn=new mysqli("localhost","root","","");
if($conn->connect_errono!=0){
    throw new Exception('connection failed');
}
echo "connection success";
}
catch(Exception $e){
    echo "connection failed".$e->getMessage();
}
