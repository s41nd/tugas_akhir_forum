<?php 
  include "config/db_connect.php";
?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HALAMAN LOGIN</title>
  <link rel="stylesheet" href="assets/css/style__login.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
  <div class="wrapper">
    <header>Login Forum</header>
    <form action="config/auth.php" method="POST">
      <div class="field email">
        <div class="input-area">
          <input type="text" placeholder="Email Address" name="username">
          <i class="icon fas fa-envelope"></i>
          <i class="error error-icon fas fa-exclamation-circle"></i>
        </div>
        <div class="error error-txt">Email can't be blank</div>
      </div>

      <div class="field password">
        <div class="input-area">
          <input type="password" placeholder="Password" name="password">
          <i class="icon fas fa-lock"></i>
          <i class="error error-icon fas fa-exclamation-circle"></i>
        </div>
        <div class="error error-txt">Password can't be blank</div>
      </div>
      <!-- <div class="pass-txt"><a href="#">Forgot password?</a></div> -->
      <input type="submit" value="Login" >
    </form>
    <div class="sign-txt">Belum bergabung ? <a href="register.php">Signup now</a></div>
  </div>

  <script src="assets/js/script_login.js"></script>

</body>
</html>
