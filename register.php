<?php 
  include "config/db_connect.php";
?>
<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style_register.css" />

    <!-- Boxicons CSS -->
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="container">
      <header>Sign Up Forum</header>
      <form action="config/register.php" METHOD="POST"> <!--INI BUAT LINK-->
        <div class="field email-field">
          <div class="input-field">
            <input type="email" placeholder="Enter your email as username" class="email" name=username />
          </div>
          <span class="error email-error">
            <i class="bx bx-error-circle error-icon"></i>
            <p class="error-text">Tolong masukkan email yang valid sebagai username.</p>
          </span>
        </div>
        <div class="field email-field">
          <div class="input-field">
            <input type="" placeholder="MASUKKAN NICKNAME MU" class="email" name=nickname />
          </div>
          <span class="error email-error">
            <i class="bx bx-error-circle error-icon"></i>
            <p class="error-text">Tolong masukkan email yang valid sebagai username.</p>
          </span>
        </div>
        <div class="field create-password">
          <div class="input-field">
            <input
              type="password"
              placeholder="Create password"
              class="password"
              name="password"
            />
            <i class="bx bx-hide show-hide"></i>
          </div>
          <span class="error password-error">
            <i class="bx bx-error-circle error-icon"></i>
            <p class="error-text">
              password minimal 8 digit.
            </p>
          </span>
        </div>
        <div class="field confirm-password">
          <div class="input-field">
            <input
              type="password"
              placeholder="Confirm password"
              class="cPassword"
            />
            <i class="bx bx-hide show-hide"></i>
          </div>
          <span class="error cPassword-error">
            <i class="bx bx-error-circle error-icon"></i>
            <p class="error-text">password tidak sesuai</p>
          </span>
        </div>
        <div class="input-field button">
          <input type="submit" value="Submit Now" />
        </div>
      </form>
    </div>

    <!-- JavaScript -->
    <script src="assets/js/script_register.js"></script>
  </body>
</html>
