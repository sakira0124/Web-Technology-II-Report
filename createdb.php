<?php
error_reporting(E_ERROR);
try{
    $conn=new mysqli("localhost","root","","");
    if($conn->connect_errono!=0){
        throw new Exception('connection failed');
    }
$sql="CREATE DATABASE IF NOT EXISTS sdc";
if($conn->query($sql))
        {
    echo"database created successfully";
    }
    else
        {
            throw new Exception('database creation failed');
}
}
catch(Exception $e){
    die(e->getMessage());
}
?>
