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
     // $nickname_new = "JAKA SEMBUNG"; //
     $nickname_new = $_POST['nickname']; // DPET NYA DARI VARIABLE YG ADA KIRIM DENGAN name = nickname;
     $description_new = $_POST['description'];


    if($_FILES['profile_image']['name']){
        $file_name = $_FILES['profile_image']['name'];
        $file_tmp = $_FILES['profile_image']['tmp_name'];
        $file_type = $_FILES['profile_image']['type'];

        // Simpan gambar di dalam folder tertentu (misalnya 'uploads/')
         $uploads_dir = '../assets/img/';
         move_uploaded_file($file_tmp, $uploads_dir . $file_name);
         
        $file_path = $uploads_dir . $file_name;
        $stmt = $conn->prepare('UPDATE profile SET profile_img = ? WHERE user_id = ?');
        $stmt->bind_param('si', $file_name, $user_id);
        $stmt->execute();
    }
    else
    {
        echo "<script>alert('gambar tidak terdeteksi');window.location='../profile.php'</script>"; 
    }
    
    // Persiapan statement untuk insert ke tabel user
    $e_profile = $conn->prepare('UPDATE profile SET nickname = ?, description = ? WHERE user_id = ?');
    $e_profile->bind_param('ssi', $nickname_new, $description_new, $user_id);
    
    // Lakukan eksekusi statement untuk insert ke tabel user
    if ($e_profile->execute()) {
        $_SESSION['nickname'] = $nickname_new;
        $_SESSION['description'] = $description_new;
        $_SESSION['profile_img'] = $file_name;
        
        echo "<script>alert('Ganti Profile Sukses KE : $nickname_new');window.location='../profile.php'</script>";
    } else {
        echo "<script>alert('Ganti Profile gagal');window.location='../profile.php'</script>";
    }
?>