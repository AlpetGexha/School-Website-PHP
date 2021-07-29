<?php
include "../config.php";
include "../server.php";
$msg = "";
       
ob_start();
IamAdmin();

?>
<?php get_AdminHeader("Index"); ?>


<div id="layoutSidenav_content">

    <div class="container-fluid">
        <?= get_dashbord(); ?>
    </div>

</div>


</body>

</html>