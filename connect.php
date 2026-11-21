<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name             = $_POST['name'] ?? '';
    $email            = $_POST['email'] ?? '';
    $gender           = $_POST['gender'] ?? '';
    $password         = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $phone            = $_POST['phone'] ?? ''; 
   
    if ($password !== $confirm_password) {
        die("Error: Passwords do not match.");
    }

    if (empty($name) || empty($email) || empty($password)) {
        die("Error: Please fill in all required fields.");
    }

   
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    
    $conn = new mysqli("localhost", "root", "", "businessdb");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO registration (name, gender, email, password, phone) VALUES (?, ?, ?, ?, ?)");
    
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

   
    $stmt->bind_param("sssss", $name, $gender, $email, $hashed_password, $phone);
    
    if ($stmt->execute()) {
        echo "Successfully registered!";
    } else {
        echo "Registration failed: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
