<?php
    include_once 'db_connect.php';

    $id = $_SESSION['id'];


    if (!isset($id)) {
        header("Location: ../index.php");
    }

     // Ambil ID pengguna dari sesi
     $user_id = $_SESSION['id'];
     $profile_id = $_SESSION['profile_id'];
     $type = 'POST';
     $create_at = date('Y-m-d H:i:s'); //TETEP FORMAT NYA JADI JAM
     $status ='ACTIVE';

     $title = $_POST['title']; 
     $content = $_POST['content'];
    
    // Persiapan statement untuk insert ke tabel user
    $c_post = $conn->prepare('INSERT INTO post (type, create_at, title, content, status, profile_id, profile_user_id) 
                                 VALUES (?, ?, ?, ?, ?, ?, ?)');
    $c_post->bind_param('sssssii', $type, $create_at, $title, $content, $status,$profile_id,$user_id);
    
    // Lakukan eksekusi statement untuk insert ke tabel user
    if ($c_post->execute()) {
        echo "<script>alert('TAMBAH POST Sukses KE');window.location='../myPost.php'</script>";
    } else {
        echo "<script>alert('TAMBAH POST gagal');window.location='../myPost.php'</script>";
    }
?>