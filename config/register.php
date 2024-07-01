<?php
    include_once 'db_connect.php';
    
    // Mendapatkan username dan password dari form atau input
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = "MEMBER";

    // TDI COBA BUAT PASSWORD MENCOBA PASS NYA MENGERTI
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL statement
    $stmt = $conn->prepare('INSERT INTO user (username, password, role) VALUES (?, ?, ?)');
    $stmt->bind_param('sss', $username, $hashed_password, $role);
    
    if ($stmt->execute()) {
        echo '<script>alert("REGISTRASI SUKSES")</script>';
    } else {
        echo "Error: " . $conn->error;
        // echo '<script>alert("Error : $conn->error")</script>';
    }
?>