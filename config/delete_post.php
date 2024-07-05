<?php
    include_once 'db_connect.php';

    $id = $_SESSION['id'];


    if (!isset($id)) {
        header("Location: ../index.php");
    }

     // Ambil ID pengguna dari sesi
     $profile_user_id = $_SESSION['id'];
     $profile_id = $_SESSION['profile_id'];
     $post_id =$_POST['post_id'];
    
    // Persiapan statement untuk insert ke tabel user
    $d_post = $conn->prepare('DELETE FROM post WHERE `post`.`id` = ? AND `post`.`profile_id` = ? AND `post`.`profile_user_id` = ?');
    
    $d_post->bind_param('iii', $post_id, $profile_id, $profile_user_id);
    
    // Lakukan eksekusi statement untuk insert ke tabel user
    if ($d_post->execute()) {
        echo "<script>alert('HAPUS POST Sukses');window.location='../myPost.php'</script>";
    } else {
        echo "<script>alert('HAPUS POST gagal');window.location='../myPost.php'</script>";
    }
?>