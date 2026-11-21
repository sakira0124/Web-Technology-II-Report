<?php
error_reporting(E_ERROR);
    try
{
        $conn=new mysqli("localhost","root","","");
        if($conn->connect_errno!=0)
            {
            throw new Exception('connection failed');
            }
    $sql="CREATE DATABASE IF NOT EXISTS collegedb";
    if($conn->query($sql))
            {
                echo"database created successfully";
            }
        else
            {
                throw new Exception('database creation failed');
            }
        $conn->select_db("collegedb");
        $sql="create table IF NOT EXISTS  students
        (id int auto_increment primary key,
        name varchar(100),email varchar(100) UNIQUE,
        phone varchar(15),course varchar(100),
        dob date,username varchar(100),
        password varchar(100),
        semester int)";
    if($conn->query($sql))
        {
        echo("'<br>'table created successfully");
        }
    else {
        echo("table creation failed");
    }
    
    $sql="insert ignore into students (name,email,phone,course,dob,username,password,semester) values
    ('caroline','caroline@example.com','1234567890','Computer Science','2000-01-01','caroline','password',2),
    ('tom','tom@gmail.com','12332112332','Information Technology','2000-02-02','tom','password',3),
    ('jerry','jerry@gmail.com','1234567891','Business Administration','2000-03-03','jerry','password',4)";
    if($conn->query($sql))
    {
        echo("'<br>'data inserted successfully");
    }
    else
    {
        echo("data insertion failed");
    }
    
    $sql="select *from students";
    $data=[];
    if($result=$conn->query($sql))
        if($result->num_rows>0)
            {
                while($row=$result->fetch_assoc()){
                    array_push($data,$row);
                }
            }
            echo'<pre>';
            print_r($data);
    $sql="update students set name='carol' where id=1";
    if($conn->query($sql))
        {
        echo("'<br>'table updated successfully");
        }
    else {
        echo("table update failed");
    }
    $sql="delete from students where id between 4 and 15";
    if($conn->query($sql))
        {
        echo("'<br>'table deleted successfully");
        }
    else {
        echo("table deletion failed");
    }

}
    catch(Exception $e)
    {
        die($e->getMessage());
    }
