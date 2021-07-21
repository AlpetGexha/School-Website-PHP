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
        <h1>Mir&euml;serdhe <b style="color:red"><?php echo "" . $row['username'] . "" ?> </b>n&euml; panelin menagjues t&euml; uebfaq&euml;s.</h1>
    </div>
    
</body>

</html>