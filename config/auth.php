<?php
    include 'db_connect.php';
    // Mendapatkan username dan password dari form atau input
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = "";
    
    // Prepare SQL statement to fetch user details
    $stmt = $conn->prepare('SELECT u.id, u.username, u.password, u.role, p.nickname, p.description, p.profile_img 
                           FROM user u 
                           INNER JOIN profile p ON u.id = p.user_id 
                           WHERE u.username = ?');
    $stmt->bind_param('s', $username);
    $stmt->execute();
    
    // Bind result variables
    $stmt->bind_result($id, $username, $hashed_password, $role, $nickname, $description, $profile_img);
    
    if ($stmt->fetch()) {
        // Verifikasi kata sandi
        if (password_verify($password, $hashed_password)) {
            // Kata sandi cocok
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            $_SESSION['id'] = $id;
            
            // Jika nickname dari profil tersedia, set juga session untuk nickname
            if (!empty($nickname)) {
                $_SESSION['nickname'] = $nickname;
                $_SESSION['description'] = $description;
                $_SESSION['profile_img'] = $profile_img;
            }
            header("Location: ../index.php");
            
        } else {
            // Jika kata sandi tidak cocok
            echo "<script>alert('Password yang Anda masukkan salah'); window.location='../login.php';</script>";
        }
    }
    
    else {
        // Jika pengguna tidak ditemukan
        echo "<script>alert('Username tidak ditemukan'); window.location='../login.php';</script>";
    }  
?>