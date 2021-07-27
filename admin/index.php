<?php
include "../config.php";
include "../server.php";
$msg = "";
ob_start();

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
    header("Location:../login.php");

    die();
}

$username = $_SESSION['username'];
$sql = "SELECT * from users where username = '$username'";
$results11 = mysqli_query($db, $sql);
$row = $results11->fetch_assoc();

?>

<?php get_AdminHeader("Index"); ?>



<div id="layoutSidenav_content">

    <div class="container-fluid">

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
                                    <p class="announcement-heading">8</p>
                                    <p class="announcement-text"><strong>Blogs</strong></p>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer announcement-bottom">
                                <div class="row">
                                    <div class="col-xs-6">
                                        View
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
                                    <p class="announcement-heading">6</p>
                                    <p class="announcement-text"><strong>Categories</strong></p>
                                </div>
                            </div>
                        </div>
                        <a href="blog_categories_view.php">
                            <div class="panel-footer announcement-bottom">
                                <div class="row">
                                    <div class="col-xs-6">
                                        View
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
                                    <p class="announcement-text"><strong>Web Details!</strong></p>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer announcement-bottom">
                                <div class="row">
                                    <div class="col-xs-6">
                                        View
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
                                    <p class="announcement-text"><strong>Editor's Choice</strong></p>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer announcement-bottom">
                                <div class="row">
                                    <div class="col-xs-6">
                                        view
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
    </div>
</div>

</body>

</html>