<?php
    include_once 'db_connect.php';

    $id = $_SESSION['id'];

    if (!isset($id)) {
        header("Location: ../index.php");
        if (!isset($_SESSION['username']))
        {
            echo "<script>alert('nickname tidak terdeteksi');window.location='../index.php'</script>"; 
        }
    }
    
    
    // Ambil ID pengguna dari sesi
    $user_id = $_SESSION['id'];
    // $nickname_new = "JAKA SEMBUNG"; // SEMENTARA INPUT MANUAL, NANTI KALAU UI PROFILE JADI DDI MASUKKAN DI $_POST['nickname']
    $nickname_new = $_POST['nickname']; // DPET NYA DARI VARIABLE YG ADA KIRIM DENGAN name = nickname;
    $description_new = $_POST['description'];
    
    // Persiapan statement untuk insert ke tabel user
    $e_profile = $conn->prepare('UPDATE profile SET nickname = ?, description = ? WHERE user_id = ?');
    $e_profile->bind_param('ssi', $nickname_new, $description_new, $user_id);
    
    // Lakukan eksekusi statement untuk insert ke tabel user
    if ($e_profile->execute()) {
        $_SESSION['nickname'] = $nickname_new;
        $_SESSION['description'] = $description_new;
        echo "<script>alert('Ganti Profile Sukses : $nickname_new');window.location='../index.php'</script>";
    } else {
        echo "<script>alert('Ganti Profile gagal');window.location='../profile.php'</script>";
    }
?>