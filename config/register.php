<?php
    // INI REGISTER YG UDH ADA VERIFIKASI USERNAME
    include_once 'db_connect.php';
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = 'MEMBER'; 
    $nickname = $_POST['nickname'];
    $profile_img = 'no_profile.png'; 

    // Persiapan statement untuk mencari username di tabel user
    $stmt_check_username = $conn->prepare('SELECT username FROM user WHERE username = ?');
    $stmt_check_username->bind_param('s', $username);

    // Lakukan eksekusi statement untuk mencari username
    $stmt_check_username->execute();

    // Ambil hasil query
    $stmt_check_username->store_result();

    // Periksa jumlah baris yang ditemukan
    if ($stmt_check_username->num_rows > 0) {
        // Username sudah ada, berikan feedback ke pengguna
        echo "<script>alert('Username sudah terdaftar');window.location='../register.php'</script>";
    } else {
        // Username belum terdaftar, lanjutkan proses insert
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
                echo "<script>alert('Registrasi gagal di profile');window.location='../register.php'</script>";
            }
        } else {
            echo "<script>alert('Registrasi gagal di user');window.location='../register.php'</script>";
        }
    }
?>