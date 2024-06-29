<?php
    $servernamer_db = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "mydb";

        $conn = new mysqli($servernamer_db, $username_db, $password_db, $dbname);

            if(!$conn)
            {
                die ("koneksi gagal :". $conn->connection_error());
                
            }
            else{
                echo "BERHASIL CONNECT DATABASE";
            }
?>