<?php
    include_once 'db_connect.php';
    
    // Mendapatkan username dan password dari form atau input
    // $username = $_POST['username'];
    // $password = $_POST['password'];

    // TDI COBA BUAT PASSWORD MENCOBA PASS NYA MENGERTI
    $username="mengerti";
    $password="mencoba";
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL statement
    $stmt = $conn->prepare('INSERT INTO user (username, password) VALUES (?, ?)');
    $stmt->bind_param('ss', $username, $hashed_password);
    
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $conn->error;
    }
?>