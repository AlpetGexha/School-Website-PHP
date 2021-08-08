<?php
include "config.php";
?>
<?php
function get_header($tabName, $classbody = null)
{
?>
  <!DOCTYPE html>
  <html>

  <head>
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/logo.png'>
    <title>SHMLT "Nexhmedin Nixha" – Gjakovë <?= "- " . $tabName ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/dark-mode.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  </head>

  <body class="<?= $classbody ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <div class="header-section">
      <div class="container ">
        <!-- d-flex no-wrap justify-content-center -->
        <img style="width: 105px; height: 90px;" src="assets/img/logo.png" alt="Logo e shkolles ">
        <a href="index.php" class="site-logo">
          <h5 style="width:auto;"><b>Shkolla e Mesme e Lart&euml; Teknike<br> "Nexhmedin Nixha"</b></h5>
        </a>
      </div>
    </div>
    <nav class="navbar sticky-top navbar-expand-lg bg-light navbar-light ">
      <div class="container-xxl" aria-label="Main navigation">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse justify-content-md-center navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Faqja Kryesore</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="index.php#Stafi">
                Stafi
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Drejtimet
              </a>
              <div class="dropdown-menu">
                <?php get_kadegoirt_menu("post_categories") ?>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="apliko_online.php">Apliko Online</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="darkMode">
                <label class="form-check-label" for="darkMode">Dark Mode</label>
              </div>
            </li>
          </ul>

        </div>

      </div>
    </nav>
    <script src="assets/js/dark-mode.js"></script>
  <?php
}

function get_footer()
{
  ?>
    <footer class="footer-section">
      <div class="container footer-top">
        <div class="row">

          <div class="col-sm-6 col-lg-3 footer-widget">
            <div class="about-widget">
              <h6 class="fw-title">Na ndiqni</h6>
              <div class="social pt-1">
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="https://www.facebook.com/SHKOLLA-E-MESME-TEKNIKE-NEXHMEDIN-NIXHA-209838089061578/community/" target="_blank"><i class="fab fa-facebook"></i></a>
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-lg-3 footer-widget">
            <h6 class="fw-title">Linqe tjera</h6>
            <div class="dobule-link">
              <ul>
                <li><a href="https://masht.rks-gov.net/en" target="_blank">MASHT - Ministria Arsimit Shkencë dhe Teknologjisë</a></li>
                <li><a href="https://www.facebook.com/KomunaeGjakoves/" target="_blank">Kuvendi Komunal Gjakovë</a></li>
                <li><a href="apliko_online.php">Apliko Online</a></li>
              </ul>
            </div>
          </div>

          <div class="col-sm-6 col-lg-3 footer-widget">
            <h6 class="fw-title">Postimet e fundit</h6>
            <ul class="recent-admin">
              <li>
                <?php require  'config.php';
                $sql_footer = "SELECT * FROM post ORDER BY id DESC LIMIT 5";
                $result_footer = mysqli_query($db, $sql_footer);
                // $row_footer = $result_footer->fetch_assoc();
                ?>
                <div class="row">
                  <?php foreach ($result_footer as $row_footer) : ?>
                    <div class="col-lg-2"><img src="assets/img/drejtimet_post/<?= $row_footer['photo'] ?>" alt="img"> </div>
                    <div class="col-lg-10"> <a href="single.php?id=<?= $row_footer['id'] ?>"> <?= $row_footer['titulli']  ?> </a> </div>

                  <?php endforeach; ?>
                  <?php if (mysqli_num_rows($result_footer) == 0) : ?>
                    <p>Nuk ka postime ende</p>
                  <?php endif; ?>
                </div>
              </li>
            </ul>
          </div>

          <div class="col-sm-6 col-lg-3 footer-widget">
            <h6 class="fw-title">Kontakt</h6>
            <ul class="contact">
              <li>
                <p><i class="fa fa-map-marker"></i> Rr.Marin Barleti, Gjakovë,<br> Kosovë</p>
              </li>
              <li>
                <p><i class="fa fa-phone"></i> 044 123 456 </p>
              </li>
              <li>
                <p><i class="fa fa-envelope"></i>shkollateknikegj@gmail.com</p>
              </li>
              <li>
                <p><i class="fa fa-envelope"></i> <a href="contact.php">
                    Kontaktonani nëpermjet webit</a></p>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="copyright">
        <div class="container">
          <p>
            © 2021 Shkolla e Mesme e Lart&euml; Teknike "Nexhmedin Nixha" - Gjakovë
          </p>
        </div>
      </div>
    </footer>
  </body>

  </html>
<?php
}



function get_AdminHeader($tilte_name)
{
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>

    <head>
      <title>Admin <?= "- " . $tilte_name ?> - N.Nixha</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <meta charset="utf-8">
      <link rel="stylesheet" href="../assets/css/style.css">
      <link rel="stylesheet" href="../assets/css/test.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </head>
  </head>

  <body>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>

    <link rel='shortcut icon' type='image/x-icon' href='../assets/img/logo.jpg'>

    <nav class="sb-topnav sticky-top navbar navbar-expand navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">Paneli i Adminit</a>
      <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
      <!-- Navbar-->
    </nav>

    <?php
    require "../config.php";
    $username = $_SESSION['username'];
    $sql_admin = "SELECT u.id, u.emri, u.mbiemri, u.username,u.email,u.j_data, r.role from users u,roles r where u.username = '$username' and u.role = r.id";

    $results_admin = mysqli_query($db, $sql_admin);
    $row_admin = $results_admin->fetch_assoc();
    ?>
    <div id="layoutSidenav">
      <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
          <div class="sb-sidenav-menu">
            <div class="nav sticky-top">

              <div class="sb-sidenav-menu-heading">Dashboard</div>
              <a class="nav-link" href="index.php">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
              </a>
              <div class="sb-sidenav-menu-heading">Main</div>

              <a class="nav-link" href="../admin/aplikimet-admin.php">
                <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                Aplikimet
              </a>

              <a class="nav-link" href="../admin/user_admin.php">
                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                P&euml;doruesits
              </a>

              <a class="nav-link" href="../admin/post-admin.php">
                <div class="sb-nav-link-icon"><i class="fas fa-blog"></i></div>
                Postimet
              </a>

              <a class="nav-link" href="../admin/kontakti-admin.php">
                <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                Mesazhet
              </a>

              <!-- <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                            </a>  -->
              <div class="sb-sidenav-menu-heading">Shto</div>

              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="false" aria-controls="collapsePages2">
                <div class="sb-nav-link-icon"><i class="fas fa-tools"></i></div>
                Krijoni
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse" id="collapsePages2" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                  <a class="nav-link" href="../admin/create-post.php">
                    Postime
                  </a>
                  <a class="nav-link" href="../admin/create-lami.php">
                    Kategori
                  </a>
                  <a class="nav-link" href="../admin/register.php">
                    P&euml;rdorues
                  </a>
                  <a class="nav-link" href="../admin/stafi-admin.php">
                    Stafi & L&euml;nd&euml;t
                  </a>
                </nav>
              </div>
              <div class="sb-sidenav-menu-heading">Index</div>
              <a class="nav-link" href="../index.php">
                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                Faqja kryesore
              </a>
            </div>
          </div>

          <div class="sb-sidenav-footer">
            <div class="small">Admini: <?php echo $row_admin['username']; ?></div>
            <div class="row">
              <div class="col-md-7">
                <div class="small">Roli: <?php echo $row_admin['role']; ?> </div>
              </div>
              <div class="col-md-4">
                <form action="../server.php" method="POST">
                  <button class="btn btn-outline-danger btn-sm" name="login_logout">Shkyqu</button>
                </form>
              </div>
            </div>
          </div>



        </nav>
      </div>


      <script>
        (function($) {
          "use strict";

          // Shtoni gjendje aktive në sidebar nav links
          var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
          $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
            if (this.href === path) {
              $(this).addClass("active");
            }
          });

          // NNdërroni anën e navigation
          $("#sidebarToggle").on("click", function(e) {
            e.preventDefault();
            $("body").toggleClass("sb-sidenav-toggled");
          });
        })(jQuery);
      </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <?php
  }

  function get_dashbord()
  {
    require "config.php";
    $username = $_SESSION['username'];
    $sql = "SELECT * from users where username = '$username'";
    $results11 = mysqli_query($db, $sql);
    $row = $results11->fetch_assoc();

    ?>
      <div id="page-wrapper">
        <div class="row">

          <div class="col-lg-12">
            <h1>Hello <?php echo "" . $row['username'] . "" ?>!</h1>
            <div class="alert alert-success d-flex align-items-center" role="alert">
              <strong><span class="fa fa-bullhorn fa-2x"></span> </strong>
              <div>
                <strong>&nbsp;&nbsp;Mir&euml;serdh&euml;t n&euml; panelin e Administratorit</strong>.
              </div>
            </div>
          </div>
        </div>

        <div class="row">


          <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-rss fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"> <?= get_count("post"); ?> </p>
                    <p class="announcement-text"><strong>Postime</strong></p>
                  </div>
                </div>
              </div>
              <a href="post-admin.php">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Shiko
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>


          <div class="col-lg-3">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-tags fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?= get_count("post_categories"); ?></p>
                    <p class="announcement-text"><strong>Kategori</strong></p>
                  </div>
                </div>
              </div>
              <a href="create-lami.php">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Shiko
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-trophy fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading">2</p>
                    <p class="announcement-text"><strong>ED</strong></p>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Shiko
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-desktop fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading">1</p>
                    <p class="announcement-text"><strong>Detajet e Webit!!</strong></p>
                  </div>
                </div>
              </div>
              <a href="stats.php">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Shiko
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>

        </div>

        <div class="row">

          <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-envelope fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"> <?= get_count("aplikimet"); ?> </p>
                    <p class="announcement-text"><strong>Aplikime</strong></p>
                  </div>
                </div>
              </div>
              <a href="post-admin.php">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Shiko
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>


          <div class="col-lg-3">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-envelope fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?= get_count("kontakit"); ?></p>
                    <p class="announcement-text"><strong>Mesazhe</strong></p>
                  </div>
                </div>
              </div>
              <a href="create-lami.php">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Shiko
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>

        </div>
      </div>
    <?php
  }
