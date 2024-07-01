<?php
    include 'db_connect.php';
    // Mendapatkan username dan password dari form atau input
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hashed_password="";


    // Prepare SQL statement
    $stmt = $conn->prepare('SELECT * FROM user WHERE username = ?');
    $stmt->bind_param('s', $username);
    $stmt->execute();
    
    // Bind result variables
    $stmt->bind_result($id, $username, $hashed_password,$role);
    
    if ($stmt->fetch()) {
        // Verifikasi kata sandi
        if (password_verify($password, $hashed_password))
        {
            // Kata sandi cocok
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            header("Location: ../index.php");
        }
        else
        {
            // echo '<script>alert("PASSWORD SALAH")</script>';
            // header("Location: ../login.php");
            echo "<script>alert('password yang anda masukkan salah');window.location='../login.php'</script>";
        }
    } else {
        echo "<script>alert('password atau usernames yang anda masukkan salah');window.location='../login.php'</script>";
    }
    
    // Close statement
    
?>