<!-- 

            <li class="nav-item">
                <a class="nav-link" href="index.php">Ballina</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="aplikimet-admin.php">Aplikimet</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="drejtimet-admin.php">Postet per drejtime</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="stafi-admin.php">Stafi</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="stafi-post.php">Stafi Post</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="kontakti-admin.php">Kontaktet</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="register.php">Shto Admin</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../index.php">Faqja Kryesore</a>
            </li>

        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">Shkyquni</a>
            </li>
        </ul>
 -->


<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>

<link rel='shortcut icon' type='image/x-icon' href='../assets/img/logo.jpg'>

<nav class="sb-topnav sticky-top navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Paneli i Adminit</a>
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
                    <div class="sb-sidenav-menu-heading">Main</div>


                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="false" aria-controls="collapsePages1">
                        <div class="sb-nav-link-icon"><i class="fas fa-tools"></i></div>
                        Profiles
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages1" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link" href="../admin/profile.php">
                                Profile
                            </a>
                            <a class="nav-link" href="">

                            </a>
                        </nav>
                    </div>

                    <a class="nav-link" href="../admin/admin_user.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        P&euml;doruesits
                    </a>

                    <a class="nav-link" href="../admin/post-admin.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-blog"></i></div>
                        Postimet
                    </a>

                    <a class="nav-link" href="../admin/admin_sms.php">
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
                            <a class="nav-link" href="../admin/create_post.php">
                                Postime
                            </a>
                            <a class="nav-link" href="../admin/create_category.php">
                                Kategori
                            </a>
                            <a class="nav-link" href="../admin/register.php">
                                P&euml;rdorues
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
                <div class="small">Admini: <?php echo $row_admin['username']; ?> <a href="../assets/php/logout.php"> Shkyqu </a> </div>
                <div class="small">Roli: <?php echo $row_admin['role']; ?> </div>
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