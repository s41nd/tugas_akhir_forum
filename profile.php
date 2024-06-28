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
            <a href="index.html" class="logo">
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
                    <div class="avatar-sm">
                      <img
                        src="assets/img/profile.jpg"
                        alt="..."
                        class="avatar-img rounded-circle"
                      />
                    </div>
                    <span class="profile-username">
                      <span class="op-7">Hi,</span>
                      <span class="fw-bold">Hizrian</span>
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
                            <h4>Hizrian</h4>
                            <p class="text-muted">hello@example.com</p>
                            <a
                              href="profile.html"
                              class="btn btn-xs btn-secondary btn-sm"
                              >View Profile</a
                            >
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Logout</a>
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
          <div class="page-inner"> <!--ISI POSRT-->
            <div class="row">

              <div class="col-md-6"> <!--KIRI PROFILE-->
                <div class="card">

                  <div class="card-header">
                    <h4 class="card-title">"NAMA" Profile</h4>
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
                        <p>
                          "INI NANTI GAMBAR PROFILE"
                        </p>

                        <p>
                          "INI NANTI DESKRIPSI  "
                        </p>
                        
                      </div>
                      
                      <div
                        class="tab-pane fade"
                        id="pills-profile"
                        role="tabpanel"
                        aria-labelledby="pills-profile-tab"
                      >
                        <p>
                          Even the all-powerful Pointing has no control about
                          the blind texts it is an almost unorthographic life
                          One day however a small line of blind text by the name
                          of Lorem Ipsum decided to leave for the far World of
                          Grammar.
                        </p>
                        <p>
                          The Big Oxmox advised her not to do so, because there
                          were thousands of bad Commas, wild Question Marks and
                          devious Semikoli, but the Little Blind Text didn’t
                          listen. She packed her seven versalia, put her initial
                          into the belt and made herself on the way.
                        </p>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
              
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
                              Follow List
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
              
              
            </div> 
          </div> <!--END ISI POSRT-->
        </div> 
      </div>
    </div>
  </body>
</html>
