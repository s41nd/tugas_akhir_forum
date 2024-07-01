<?php
    include_once 'db_connect.php';
    
    // Mendapatkan username dan password dari form atau input
    // $username = $_POST['username'];
    // $password = $_POST['password'];

    $username="mengerti";
    $password="mencoba";
    $hashed_password="";
    $role="";


    // Prepare SQL statement
    $stmt = $conn->prepare('SELECT * FROM user WHERE username = ?');
    $stmt->bind_param('s', $username);
    $stmt->execute();
    
    // Bind result variables
    $stmt->bind_result($id, $username, $hashed_password,$role);
    
    if ($stmt->fetch()) {
        // Verifikasi kata sandi
        if (password_verify($password, $hashed_password)) {
            // Kata sandi cocok
            echo "Login success";
            echo "ID : $username + PASSWORD : $password + PASSWORD HASHING: $hashed_password";

            // Redirect or set session variables upon successful login
        } else {
            // Kata sandi tidak cocok
            echo "Invalid username or password";
        }
    } else {
        // Pengguna tidak ditemukan
        echo "Invalid username or password";
    }
    
    // Close statement
    
?>