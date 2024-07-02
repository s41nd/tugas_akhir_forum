<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header('location:login.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>DASHBOARD FORUM</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport"/>

    <div> <!--FONT-->
      <script src="assets/js/plugin/webfont/webfont.min.js"></script>
      <script>
        WebFont.load({
          google: { families: ["Public Sans:300,400,500,600,700"] },
          custom: {
            families: [
              "Font Awesome 5 Solid",
              "Font Awesome 5 Regular",
              "Font Awesome 5 Brands",
              "simple-line-icons",
            ],
            urls: ["assets/css/fonts.min.css"],
          },
          active: function () {
            sessionStorage.fonts = true;
          },
        });
      </script>
    </div>  

    <div> <!-- CSS Files -->
      <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
      <link rel="stylesheet" href="assets/css/plugins.min.css" />
      <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />
    </div> 

    <div> <!-- CSS RESPONSIVE -->
      <link rel="stylesheet" href="assets/css/demo.css" />
    </div>

  </head>

  <body>
    <div> <!--INCLUDED HARUS DI COPY-->
      <!--   Core JS Files   -->
      <script src="assets/js/core/jquery-3.7.1.min.js"></script>
      <script src="assets/js/core/popper.min.js"></script>
      <script src="assets/js/core/bootstrap.min.js"></script>
      <!-- jQuery Scrollbar -->
      <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
      <!-- Kaiadmin JS -->
      <script src="assets/js/kaiadmin.min.js"></script>
    </div>

    <div class="wrapper">
      <!-- Sidebar -->

      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          
          <div class="logo-header" data-background-color="dark"> <!-- Logo Header NORMAL SIZE-->
            <a href="index.php" class="logo">
              <h4 style="color:aliceblue">FORUM GAME</h4>
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div> <!-- End Logo Header --> 
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner"> <!--SIDE BAR-->
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item active">
                <a
                  data-bs-toggle="collapse"
                  href="#dashboard"
                  class="collapsed"
                  aria-expanded="false"
                >
                  <i class="fas fa-home"></i>
                  <p>HOME</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="dashboard">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="../forum/index.html">
                        <span class="sub-item">Dashboard</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>

              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Components</h4>
              </li>

              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#post">
                  <i class="fas fa-layer-group"></i>
                  <p>POST</p>
                  <span class="caret"></span>
                </a>

                <div class="collapse" id="post">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="#">
                        <span class="sub-item">New Post</span>
                      </a>
                    </li>
                    
                    <li>
                      <a href="#">
                        <span class="sub-item">Popular Post</span>
                      </a>
                    </li>

                    <li>
                      <a href="#">
                        <span class="sub-item" style="color: yellow;">CREAT POSTING</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>

              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#course">
                  <i class="fas fa-pen-square"></i>
                  <p>Course</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="course">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="forms/forms.html">
                        <span class="sub-item">New Course</span>
                      </a>
                    </li>

                    <li>
                      <a href="forms/forms.html">
                        <span class="sub-item">Popular Course</span>
                      </a>
                    </li>

                    <li>
                      <a href="forms/forms.html">
                        <span class="sub-item" style="color: yellow;">CREATE COURSE</span>
                      </a>
                    </li>

                  </ul>
                </div>
              </li>

              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#ban">
                  <i class="fas fa-ban"></i>
                  <p>BAN REPORT</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="ban">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="#">
                        <span class="sub-item">BAN REPORT LIST</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>

            </ul>
          </div>
        </div> <!-- End Sidebar -->
      </div>

      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo"> <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="index.html" class="logo">
                <h1 style="color: antiquewhite;">FORUM GAME ONLINE</h1>
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div> <!-- End Logo Header -->

          </div> 
          <!-- Navbar Header -->
          <nav
            class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
          >
            <div class="container-fluid">
              <nav
                class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex"
              >
                <div class="input-group" style="background-color: gray;">
                  <div class="input-group-prepend">
                    <button type="submit" class="btn btn-search pe-1">
                      <i class="fa fa-search search-icon" style="color: aliceblue;"></i>
                    </button>
                  </div>

                  <input
                    type="text"
                    placeholder="Search ..."
                    class="form-control"
                  />
                </div>
              </nav>
              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <li
                  class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none"
                >
                  <a
                    class="nav-link dropdown-toggle"
                    data-bs-toggle="dropdown"
                    href="#"
                    role="button"
                    aria-expanded="false"
                    aria-haspopup="true"
                  >
                    <i class="fa fa-search"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-search animated fadeIn">
                    <form class="navbar-left navbar-form nav-search" style="background-color:gray;">
                      <div class="input-group">
                        <input
                          type="text"
                          placeholder="Search ..."
                          class="form-control"
                        />
                      </div>
                    </form>
                  </ul>
                </li>

                <li class="nav-item topbar-user dropdown hidden-caret">
                  <a
                    class="dropdown-toggle profile-pic"
                    data-bs-toggle="dropdown"
                    href="#"
                    aria-expanded="false"
                  >
                    <div class="avatar-sm" id="profile">
                      <img
                        src="assets/img/profile.jpg"
                        alt="..."
                        class="avatar-img rounded-circle"
                      />
                    </div>
                    <span class="profile-username">
                      <span class="op-7">Hi, </span>
                      <span class="fw-bold"><?=$_SESSION['nickname']?></span> <!--INI NANTI NICKNAME-->
                    </span>
                  </a>
                  <ul class="dropdown-menu dropdown-user animated fadeIn" style="background-color:#ffead3;">
                    <div class="dropdown-user-scroll scrollbar-outer">
                      
                      <li>
                        <div class="user-box">
                          <div class="avatar-lg">
                            <img
                              src="assets/img/profile.jpg"
                              alt="image profile"
                              class="avatar-img rounded"
                            />
                          </div>
                          <div class="u-text">
                            <h4><?=$_SESSION['username']?></h4> <!-- INI NANTI  username -->
                            <p class="text-muted"><?=$_SESSION['role']?></p> <!-- INI NANTI ROLE -->
                            <a
                              href="profile.php"
                              class="btn btn-xs btn-secondary btn-sm"
                              >View Profile</a
                            >
                          </div>
                        </div>
                      </li>

                      <li>
                        <div class="dropdown-divider"></div>
                        <a href="config/logout.php" class="dropdown-item">Logout</a>
                      </li>

                    </div>
                  </ul>
                </li>

              </ul>
            </div>
          </nav>
          <!-- End Navbar -->
        </div>
<!--------------------------------------------------------------------------------------------------------------------------------->
<!--MULAI KE ISI-->

        <div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
              <div>
                <h3 class="fw-bold mb-3">WELCOME TO FORUM </h3>
                <!-- <h6 class="op-7 mb-2">What's New On post</h6> -->
              </div>
              <div class="ms-md-auto py-2 py-md-0">
                <!-- <a href="#" class="btn btn-label-info btn-round me-2">Filter</a> -->

                <!-- <a href="#" class="btn btn-primary btn-round">Filter</a> -->
                <div class="btn-group dropstart">
                  <button
                    type="button"
                    class="btn btn-black btn-border dropdown-toggle"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    Filter
                  </button>
                  <!--ISI DROPDOWN FILTER-->
                  <ul class="dropdown-menu" role="menu">
                    <li>
                      <a class="dropdown-item" href="#">HOT</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">NEW</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">TOP</a
                      >
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="row">

              <div class="col">
                <div class="card card-stats card-round">
                  <div class="card-body">

                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-primary bubble-shadow-small"
                        >
                          <i class="fas fa-users"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Last<br>Activity</p>
                          <h4 class="card-title">0</h4>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-info bubble-shadow-small"
                        >
                          <i class="fas fa-user-check"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Update<br>Post</p>
                          <h4 class="card-title">0</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-success bubble-shadow-small"
                        >
                          <i class="fa fa-book"></i>
                        </div>
                      </div>

                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Update<br>Course</p>
                          <h4 class="card-title">0</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-secondary bubble-shadow-small"
                        >
                          <i class="fa fa-users"></i>
                        </div>
                      </div>

                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Friend<br>Activity</p>
                          <h4 class="card-title">0</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col ">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-warning bubble-shadow-small"
                        >
                          <i class="fas fa-user-clock"></i>
                        </div>
                      </div>

                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Last<br>Update</p>
                          <h4 class="card-title">0</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <!--ISI POSRT-->
          </div>
        </div>
        
      </div>
      <!-- End Custom template -->
    </div>
  </body>
</html>
