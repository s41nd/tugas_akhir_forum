<?php
  require_once 'config/db_connect.php';
  
  if(!isset($_SESSION['username'])){
    header('location:login.php');
  }

  if("CUMA BATAS PANGGIL MENU")
  {
      $query_check_menu_by_role = $conn->prepare("SELECT m.menu, m.role
                                        FROM user u LEFT JOIN menu m ON u.role = m.role
                                        WHERE u.id = ? && u.role = ?");
    $query_check_menu_by_role->bind_param('is', $_SESSION['id'], $_SESSION['role']);
    $query_check_menu_by_role->execute();

    // if ($query_check_menu_by_role === false) {
    //   die('Query execution failed: ' . $conn->error);
    // } 
    $result1 = $query_check_menu_by_role->get_result();
    $menu_array = $result1->fetch_all(MYSQLI_ASSOC);

    $query_check_submenu_by_role = $conn->prepare("SELECT m.role, m.menu, sm.submenu, sm.url
                                                  FROM submenu sm INNER JOIN menu m ON sm.menu_id = m.id
                                                  WHERE m.role = ?");
    $query_check_submenu_by_role->bind_param('s',$_SESSION['role']);
    $query_check_submenu_by_role->execute();

    $result3 = $query_check_submenu_by_role->get_result();
    $submenu_array = $result3->fetch_all(MYSQLI_ASSOC);
  }

  // CUMA BUAT CHECK
  // if (!empty($menu_array)) {
  //   // Lakukan sesuatu dengan $menu_array
  //     foreach ($menu_array as $menu_item) {        
  //         echo "Menu: " . $menu_item['menu'] . "<br>";
  //     }
  //   } 
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

        <div class="sidebar-wrapper scrollbar scrollbar-inner"> <!--SIDE BAR RESPON-->
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item">
                  <?php foreach ($menu_array as $menu) : ?>
                    <a data-bs-toggle="collapse" href="#<?= htmlspecialchars($menu['menu']) ?>" class="collapsed" aria-expanded="false">
                      <i class="fas 
                        <?php
                        // Menetapkan kelas ikon berdasarkan nama menu
                        if ($menu['menu'] == "HOME") {
                          echo "fa-home";
                        } elseif ($menu['menu'] == "POST") {
                          echo "fa-layer-group";
                        } elseif ($menu['menu'] == "COURSE") {
                          echo "fa-pen-square";
                        } elseif ($menu['menu'] == "REPORT") {
                          echo "fa-ban";
                        }
                        ?>">
                      </i>
                      <p><?= htmlspecialchars($menu['menu']) ?></p>
                      <span class="caret"></span>
                    </a>

                    <div class="collapse" id="<?= htmlspecialchars($menu['menu']) ?>">
                      <ul class="nav nav-collapse">
                        <?php foreach ($submenu_array as $submenu) :
                          if ($submenu['menu'] == $menu['menu']) :
                        ?>
                            <li>
                              <a href="<?= htmlspecialchars($submenu['url']) ?>">
                                <span class="sub-item"><?= htmlspecialchars($submenu['submenu']) ?></span>
                              </a>
                            </li>
                        <?php
                          endif;
                        endforeach;
                        ?>
                      </ul>
                    </div>

                  <?php endforeach; ?>
                </li>
            </ul>
          </div>
        </div> <!--SIDE BAR RESPON-->
        
      </div>

      <div class="main-panel">

          <div class="main-header">
            
            <div class="main-header-logo">

              <div class="logo-header" data-background-color="dark">
                <a href="index.html" class="logo"> <h1 style="color: antiquewhite;">FORUM GAME ONLINE</h1> </a>
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

              </div>

          </div>

          <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
            <div class="container-fluid"> 
            
            <!--PHP BUAT MENU BAR-->
            <?php if($_SESSION['role'] == "MEMBER") {?>
              <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex" >
                <div class="input-group" style="background-color: gray;">

                  <div class="input-group-prepend">
                    <button type="submit" class="btn btn-search pe-1">
                      <i class="fa fa-search search-icon" style="color: aliceblue;"></i>
                    </button>
                  </div>

                  <input type="text" placeholder="Search ..." class="form-control"/>
                </div>
              </nav>
            <?php } ?>

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
                        src="assets/img/<?=$_SESSION['profile_img']?>"
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
                              src="assets/img/<?=$_SESSION['profile_img']?>"
                              alt="image profile"
                              class="avatar-img rounded"
                            />
                          </div>
                          <div class="u-text">
                            <h4><?=$_SESSION['role']?></h4> <!-- INI NANTI  username -->
                            <p class="text-muted"><?=$_SESSION['username']?></p> <!-- INI NANTI ROLE -->
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

          <?php if($_SESSION['role'] == 'MEMBER') {?>
            <div class="container">
              <div class="page-inner">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
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

                <!--ISI DETAIL UPDATE-->

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


                <!--ISI POST-->
                <div style=" text-align: center;">
                  <div class="card bg-black text-white">
                    HALO
                  </div>
                </div>  
                <!--ISI POST END-->
              </div>
              
            </div>
          <?php } ?>
            
            <!--AKHIR MAIN PANEL-->     
      </div>
    </div>

  </body>
</html>
