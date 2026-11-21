<?php
$error=[];
if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $NAME=$_POST['name'];
        $EMAIL=$_POST['email'];
        // if(isset($NAME) && isset($EMAIL))
        // {
        //     echo " Name: ".$NAME."<br>";
        //     echo " Email: ".$EMAIL."<br>";
        // }
        // else
        // {
           if (!preg_match('/^([A-Z][a-z\s]+){2,}$/',$NAME)) {
        $error['name'] = 'Enter valid name';
        }
        else {
        $error['name'] = 'Enter name';
        }
        //}
    } ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body><h1>Category Create</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label>Enter name:</label>
        <input type="text" name="name" placeholder="Enter your name"><br>
        <?php echo $error['name']??''; ?>
        <label>Enter rank:</label>
        <input type="number" name="rank" placeholder="Enter your rank"><br>
        
        <label>Enter status:</label>
        <input type="radio" name="status" value="public">Public
        <input type="radio" name="status" value="private">Private<br>
        <input type="submit" value="Save" placeholder="Save">
        <input type="submit" value="Reset" placeholder="Reset">
</form>
</body>
</html>
