<?php
    include_once 'db_connect.php';
    
    // Mendapatkan username dan password dari form atau input
    // $username = $_POST['username'];
    // $password = $_POST['password'];
    // $nickname = $_POST['nickname'];
    // $role = "MEMBER";

    // // TDI COBA BUAT PASSWORD MENCOBA PASS NYA MENGERTI
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // // Prepare SQL statement
    // $t_user = $conn->prepare('INSERT INTO user (username, password, role) VALUES (?, ?, ?)');
    // $t_user->bind_param('sss', $username, $hashed_password, $role);
    // $t_profile= $conn->prepare('INSERT INTO profile (nickname,user_id) VALUES(?, $t_user.id)');
    // $t_profile->bind_param('s',$nickname)
    
    // if ($stmt->execute()) {
    //     // echo '<script>alert("REGISTRASI SUKSES")</script>';
    //     echo "<script>alert('Registrasi sukses');window.location='../login.php'</script>";
    // } else {
    //     echo "Error: " . $conn->error;
    //     // echo '<script>alert("Error : $conn->error")</script>';
    // }
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = 'MEMBER'; 
    $nickname = $_POST['nickname']; 
    
    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Persiapan statement untuk insert ke tabel user
    $stmt_user = $conn->prepare('INSERT INTO user (username, password, role) VALUES (?, ?, ?)');
    $stmt_user->bind_param('sss', $username, $hashed_password, $role);
    
    // Lakukan eksekusi statement untuk insert ke tabel user
    if ($stmt_user->execute()) {
        $user_id = $stmt_user->insert_id; // Dapatkan ID yang baru saja disisipkan
        
        // Persiapan statement untuk insert ke tabel profile
        $stmt_profile = $conn->prepare('INSERT INTO profile (nickname, user_id) VALUES (?, ?)');
        $stmt_profile->bind_param('si', $nickname, $user_id); // Menggunakan 'si' karena user_id adalah integer
        
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