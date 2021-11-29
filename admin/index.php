<?php
include "../config.php";
include "../server.php";
$msg = "";

ob_start();
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
    header("Location:../login");
    die();
}

?>
<?php get_AdminHeader("Index"); ?>


<div id="layoutSidenav_content">

    <div class="container-fluid">
        <?= get_dashbord(); ?>
    </div>

</div>


</body>

</html>