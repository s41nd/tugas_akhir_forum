<?php
    // session_start();
    include 'db_connect.php';
    // Mendapatkan username dan password dari form atau input
        $username = $_POST['username'];
        $password = $_POST['password'];

    // $username = "test@gmail.com";
    // $password = "testtest";
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

            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            header("Location: ../index.php");
            // echo "Login success";
            // echo "ID : $username + PASSWORD : $password + PASSWORD HASHING: $hashed_password";
            // Redirect or set session variables upon successful login
        } 
        else {
            // Kata sandi tidak cocok
            // header("Location: ../login.php");
            echo '<script>alert("PASSWORD SALAH")</script>';
            // href("Location: ../login.php");
        }
    } else {

        // Pengguna tidak ditemukan

        // echo '<script>alert("USERNAME TIDAK TERDAFTAR")</script>';
        // href("Location: ../login.php");
    }
    
    // Close statement
    
?>