<?php
$error = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_FILES['cv']['error'] == 0) {
    if ($_FILES['cv']['size'] < 100000) {
    $types = ['application/pdf','application/msword','application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
    if (in_array($_FILES['cv']['type'],$types)) {
        if (move_uploaded_file($_FILES['cv']['tmp_name'],'cvs/' . $_FILES['cv']['name'])) {
        echo "File upload success";
        } else {
        $error['profile'] = 'File upload error';
        }
    } else {
    $error['profile'] = 'File type not allowed';
    }
    } else {
    $error['profile'] = 'File size exceed: 100kb allowed';
    }
    } else {
    $error['profile'] = 'Please choose file';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h1>Upload Your CV</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="cv" id="cv"><br><br>
        <input type="submit" value="Upload CV" name="submit_cv">

    </form>
</body>
</html>
