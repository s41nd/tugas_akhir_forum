<?php
    include_once 'db_connect.php';
    
    // Mendapatkan username dan password dari form atau input
    // $username = $_POST['username'];
    // $password = $_POST['password'];

    $username="mencoba";
    $password="mengerti";

    // Prepare SQL statement
    $stmt = $conn->prepare('SELECT * FROM user WHERE username = ?');
    $stmt->bind_param('s', $username);
    $stmt->execute();

    $stmt->bind_result($id, $db_username, $hashed_password);
    
    // Execute the query
    $result = $stmt->get_result();

    if ($stmt->fetch()) {
        // Verifikasi kata sandi
        if (password_verify($password, $hashed_password)) {
            
            // Kata sandi cocok
            echo "Login success";
            // Redirect or set session variables upon successful login
        } else {
            // Kata sandi tidak cocok
            echo "Invalid username or password";
        }
    } else {
        // Pengguna tidak ditemukan
        echo "Invalid username or password";
    }

    // if ($result->num_rows == 1) {
    //     echo "login sebagai", "+ ",$username, " +";
    //     echo "Login success";
    //     // Redirect to another page or set session variables upon successful login
    // } else {
    //     echo "Invalid username or password";
    // }
?>

<!-- <?php
    // include_once 'db_connect.php'; // Assuming db_connect.php contains database connection code
    

    // // $username = $_POST['username'];
    // // $password = $_POST['password'];
    // $username="test";
    // $password="test";

    // // Prepare SQL statement
    // $stmt = $conn->prepare('SELECT * FROM user WHERE username = :username');
    // $stmt->bindParam(':username', $username);
    // $stmt->execute();
    
    // // Get the user row
    // $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // if ($user) {
    //     // Verify password - replace 'password_hash_from_database' with the actual hashed password from the database

    //     if (password_verify($password, $user['password_hash_from_database'])) {
    //         echo "Login success";
    //         // You can set session variables or redirect the user to another page upon successful login
    //     } else {
    //         echo "Invalid username or password";
    //     }
    // } else {
    //     echo "Invalid username or password";
    // }
?> -->

<!-- <?php
    // include_once 'db_connect.php';

    // $username="test";
    // $password="test";

    // $stmt = $conn->prepare('SELECT * FROM user WHERE username = :username AND password = :password');
    // $stmt->bindParam(':username', $username);
    // $stmt->bindParam(':passwords', $passwords);
    // $stmt->execute();
    
    
    // // $username = $_POST['username'];
    // // $password = $_POST['password'];

    // // $username="";
    // // $password="test";
    
    
    // $result = $stmt->get_result();

    // if($result-> rowcount()== 1){
    //     echo "Login success";
    // }
    // else{

    //     echo "Invalid username or password";
    // }
?> -->