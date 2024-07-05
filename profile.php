<?php
      include_once 'config/db_connect.php';
      
      if(!isset($_SESSION['username'])){
        header('location:login.php');
      }

  if("CUMA BATAS PANGGIL badge"){
    $query_check_badge_user = $conn->prepare("SELECT b.icon, b.name, b.description
                                              FROM badge b INNER JOIN profile_has_badge1 phb ON b.id = phb.badge_id
                                              WHERE phb.profile_id = ?");
    $query_check_badge_user->bind_param('i', $_SESSION['profile_id']);
    $query_check_badge_user->execute();

    $badge_result = $query_check_badge_user->get_result();
    $badge_array = $badge_result->fetch_all(MYSQLI_ASSOC);
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
    <div>   <!--INI SCRIPT-->
      <!--   Core JS Files   -->
      <script src="assets/js/core/jquery-3.7.1.min.js"></script>
      <script src="assets/js/core/popper.min.js"></script>
      <script src="assets/js/core/bootstrap.min.js"></script>
      <!-- jQuery Scrollbar -->
      <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
      <!-- Kaiadmin JS -->
      <script src="assets/js/kaiadmin.min.js"></script>
    </div>  <!--INI SCRIPT END-->

    <div class="wrapper">
      
      <div class="sidebar" data-background-color="dark"> <!-- Sidebar -->
        <div class="sidebar-logo">
          
          <div class="logo-header" data-background-color="dark"> <!-- Logo Header NORMAL SIZE-->
            <a href="index.php" class="logo">
              <h4 style="color:aliceblue">FORUM GAME </h4>
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
                      <a href="../forum/index.php">
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
      </div> <!-- Sidebar END-->

      <div class="main-panel"> <!-- MAIN PANEL -->

        <div class="main-header"> <!-- MAIN HADER --> <!--SEARH BAR + PROFILE-->
          <div class="main-header-logo"> <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="index.php" class="logo">
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
                    <div class="avatar-sm">
                      <img
                        src="assets/img/<?=$_SESSION['profile_img']?>"
                        alt="..."
                        class="avatar-img rounded-circle"
                      />
                    </div>
                    <span class="profile-username">
                      <span class="op-7">Hi,</span>
                      <span class="fw-bold"><?=$_SESSION['nickname']?></span>
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
                            <h4><?=$_SESSION['role']?></h4>
                            <p class="text-muted"><?=$_SESSION['username']?></p>
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
                        <a class="dropdown-item" href="config/logout.php">Logout</a>
                      </li>
                    </div>
                  </ul>
                </li>

              </ul>
            </div>
          </nav>
          <!-- End Navbar -->
        </div> <!-- MAIN HADER END-->

        <div class="container"> <!-- MAIN CONTAINER -->
          <div class="page-inner"> <!-- PAGE  INNER-->

            <button class="btn btn-success btn-sm">
              FOLLOW
            </button>

            <button class="btn btn-danger btn-sm">
              UNFOLLOW
            </button>

            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
              EDIT
            </button>
            
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> <!-- FORM EDIT AWAL -->

              <div class="modal-dialog modal-dialog-centered" role="document">

                <form class="modal-content" action="config/edit_profile.php" method="POST" enctype="multipart/form-data">

                  <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">EDIT PROFILE</h5>
                  </div>
                  
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label"> Nickname Baru: </label>
                      <input  type="text" class="form-control" placeholder="ISI NICKNAME BARU DI SINI !!" name="nickname"/>
                    </div>

                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label"> Deskripsi Profile:</label>
                      <textarea class="form-control" name="description" placeholder="ISI DESKRIPSI DI SINI !!" > </textarea>  
                    </div>

                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">GANTI FOTO PROFILE :</label>
                      <br>
                      <input type="file" name="profile_image" accept=".jpg, .jpeg, .png" value=""> 
                    </div>

                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                      Close
                    </button>
                    <button type="submit" class="btn btn-primary">SIMPAN PERUBAHAN</button>
                  </div>
                </form>

              </div>

            </div> <!-- FORM EDIT AKHIR -->
          

            <div class="row"> <!--ROW-->

                <div class="col-md-6"> <!--KIRI PROFILE-->
                  
                  <div class="card"> <!--CARD-->

                      <div class="card-header"> <!--JUDUL CARD PROFILE-->
                          <h4 class="card-title"><?=$_SESSION['nickname']?> 'S Profile</h4>
                      </div>

                      <div class="card-body">
                        <ul
                          class="nav nav-pills nav-secondary"
                          id="pills-tab"
                          role="tablist"
                        >

                          <li class="nav-item">
                            <a
                              class="nav-link active"
                              id="pills-home-tab"
                              data-bs-toggle="pill"
                              href="#pills-home"
                              role="tab"
                              aria-controls="pills-home"
                              aria-selected="true"
                              >Profile</a
                            >
                          </li>

                          <li class="nav-item">
                            <a
                              class="nav-link"
                              id="pills-profile-tab"
                              data-bs-toggle="pill"
                              href="#pills-profile"
                              role="tab"
                              aria-controls="pills-profile"
                              aria-selected="false"
                              >Archivement</a
                            >
                          </li>
                          
                        </ul>

                        <div class="tab-content mt-2 mb-3" id="pills-tabContent"> <!-- INI DETIAL ISI-->

                          <div
                            class="tab-pane fade show active"
                            id="pills-home"
                            role="tabpanel"
                            aria-labelledby="pills-home-tab"
                          > <!--ISI BAR-->
                            <img src="assets/img/<?=$_SESSION['profile_img']?>" class="avatar avatar-xxl">
                            
                            <br>
                            <p class="card-title">
                              DESKRIPSI AKUN
                            </p>

                            <p > <!--INI DESKRIPSI-->
                              <?=$_SESSION['description']?>
                            </p>
                            
                          </div>
                          
                          <div
                            class="tab-pane fade"
                            id="pills-profile"
                            role="tabpanel"
                            aria-labelledby="pills-profile-tab"
                          >
                            <?php foreach($badge_array as $badge) :?>

                              <img
                                class="avatar avatar-xxl" 
                                src="assets/img/badge/<?=$badge['icon']?>"
                                alt="..."
                                
                              />
                              <p>
                                
                                <?=$badge['name']?>
                                <?=$badge['description']?>
                              </p>
                              
                            <?php endforeach;?>
                          </div>

                        </div>

                      </div>

                  </div>  <!--CARD ENDD-->
                  

                </div> <!--KIRI PROFILE END-->
                
                <div class="col-md-6"> <!-- AWAL KANAN-->
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Profile Detail</h4>
                    </div>
                    
                    <div class="card-body">
                      <div class="row">
                        <div class="col-5 col-md-4"> <!--NAV BAR-->
                          <div
                            class="nav flex-column nav-pills nav-secondary"
                            id="v-pills-tab"
                            role="tablist"
                            aria-orientation="vertical"
                          >
                            <a
                              class="nav-link active"
                              id="v-pills-home-tab"
                              data-bs-toggle="pill"
                              href="#v-pills-home"
                              role="tab"
                              aria-controls="v-pills-home"
                              aria-selected="true"
                              >Follow</a
                            >

                            <a
                              class="nav-link"
                              id="v-pills-profile-tab"
                              data-bs-toggle="pill"
                              href="#v-pills-profile"
                              role="tab"
                              aria-controls="v-pills-profile"
                              aria-selected="false"
                              >Mutual Follow</a
                            >
                            
                          </div>
                        </div>

                        <div class="col-7 col-md-8"> <!--ISI NAV BAR-->
                          
                          <div class="tab-content" id="v-pills-tabContent">

                            <div
                              class="tab-pane fade show active"
                              id="v-pills-home"
                              role="tabpanel"
                              aria-labelledby="v-pills-home-tab"
                            > 
                              <p>
                                FOLLOW LIST
                              </p>

                              <p>
                                "INI ISI LIST FOLLOW"
                              </p>

                            </div>

                            <div
                              class="tab-pane fade"
                              id="v-pills-profile"
                              role="tabpanel"
                              aria-labelledby="v-pills-profile-tab"
                            >
                              <p>
                                INI NANTI
                              </p>
                              <p>
                                "INI NANTI LIST FOLLOW"
                              </p>

                            </div>

                            <div
                              class="tab-pane fade"
                              id="v-pills-messages"
                              role="tabpanel"
                              aria-labelledby="v-pills-messages-tab"
                            >
                              <p>
                                Pityful a rethoric question ran over her cheek,
                                then she continued her way. On her way she met a
                                copy. The copy warned the Little Blind Text, that
                                where it came from it would have been rewritten a
                                thousand times and everything that was left from
                                its origin would be the word "and" and the Little
                                Blind Text should turn around and return to its
                                own, safe country.
                              </p>

                              <p>
                                But nothing the copy said could convince her and
                                so it didn’t take long until a few insidious Copy
                                Writers ambushed her, made her drunk with Longe
                                and Parole and dragged her into their agency,
                                where they abused her for their
                              </p>
                            </div>
                            
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                  </div>

                </div> <!-- AWAL KANAN END-->

            </div> <!--ROW-->
          </div> <!-- PAGE  INNER END-->
        </div> <!-- MAIN CONTAINER  END-->

      
      
      </div> <!-- MAIN PANEL END-->        

    </div>

  </body>

</html>
