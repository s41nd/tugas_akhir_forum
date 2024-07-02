<?php
    include_once 'db_connect.php';
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = 'MEMBER'; 
    $nickname = $_POST['nickname'];
    $profile_img = 'no_profile.png'; 
    
    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Persiapan statement untuk insert ke tabel user
    $stmt_user = $conn->prepare('INSERT INTO user (username, password, role) VALUES (?, ?, ?)');
    $stmt_user->bind_param('sss', $username, $hashed_password, $role);
    
    // Lakukan eksekusi statement untuk insert ke tabel user
    if ($stmt_user->execute()) {
        $user_id = $stmt_user->insert_id; // Dapatkan ID yang baru saja disisipkan
        
        // Persiapan statement untuk insert ke tabel profile
        $stmt_profile = $conn->prepare('INSERT INTO profile (nickname, user_id, profile_img) VALUES (?, ?, ?)');
        $stmt_profile->bind_param('sis', $nickname, $user_id, $profile_img); // Menggunakan 'si' karena user_id adalah integer
        
        // Lakukan eksekusi statement untuk insert ke tabel profile
        if ($stmt_profile->execute()) {
            
            echo "<script>alert('Registrasi sukses');window.location='../login.php'</script>";
        } else {
            // echo "Gagal memasukkan data ke dalam tabel profile: " . $stmt_profile->error;
            echo "<script>alert('Registrasi gagal di profile');window.location='../register.php'</script>";
        }
        
        // $stmt_profile->close(); // Tutup statement untuk insert ke tabel profile
    } else {
        echo "<script>alert('Registrasi gagal di user');window.location='../register.php'</script>";
    }
?>