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

<?php get_AdminHeader("Shto Admin"); ?>

<div id="layoutSidenav_content">

    <div class="container mt-5">
        <form method="POST" class="msy-login-validation" action="#">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group"> <label for="name">Emri</label> <input id="emri" type="text" class="form-control" placeholder="Emri" name="emri" value="" required autofocus="" oninvalid="this.setCustomValidity('Ju lutem shkruani emrin');" oninput="this.setCustomValidity('');"> </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <div class="row"></div> <label for="name">Mbiemri</label> <input id="" type="text" class="form-control" placeholder="Mbiemri" name="mbiemri" value="" required autofocus="" oninvalid="this.setCustomValidity('Ju lutem shkruani mbiemrin');" oninput="this.setCustomValidity('');">
                    </div>
                </div>
            </div>
            <div class="form-group"> <label for="username">P&euml;rdoruesi</label> <input id="username" type="text" class="form-control" placeholder="Username" name="username" value="" required autofocus="" oninvalid="this.setCustomValidity(' Ju lutem shkruani p&euml;rdoruesin');" oninput="this.setCustomValidity('');"> </div>
            <div class="form-group"> <label for="email">Adresa Elektronike</label> <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="" required autofocus="" oninvalid="this.setCustomValidity('Ju lutem shkruani adresen elektronike (e-mail)');" oninput="this.setCustomValidity('');"> </div>
            <div class="form-group"> <label for="password">Fjal&euml;kalimi</label> <input id="password" type="password" placeholder="Fjal&euml;kalimi" class="form-control" name="password" required data-eye oninvalid="this.setCustomValidity('Ju lutem shkruani fjal&euml;kalimin');" oninput="this.setCustomValidity('');"> </div>
            <div class="form-group m-0"> <button type="submit" name="register_submit" class="btn btn-primary btn-block"> Shtoje si Administrator </button>
                <p style="color: red; text-align:center"><b>Kujdes!<br> Ky user do ti kete te gjitha akseset e Administratorit!</b></p>
            </div>
    </div>
    </form>
</div>

</div>
</body>

</html>