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

<div class="container mt-5 h-100">
    <div class="row justify-content-md-center h-100">
        <div class="card-wrapper">
            <div class="card fat">
                <div class="card-body"> 
                <?php if (!empty($msg)) {
                                            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong> ' . $msg . ' </strong> </div>';
                                        }
                                        if (!empty($msgs)) {
                                            echo ' <div class="alert alert-success alert-dismissible fade show" role="alert"> <strong> ' . $msgs . ' </strong> </div>';
                                        } ?> <h4 class="card-title">Shto admin n&euml; Webfaqe</h4>
                    <form method="POST" class="my-login-validation" action="#">
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
                        <div class="form-group"> <label for="username">P&euml;rdoruesi</label> <input id="username" type="text" class="form-control" placeholder="P&euml;rdoruesi" name="username" value="" required autofocus="" oninvalid="this.setCustomValidity(' Ju lutem shkruani p&euml;rdoruesin');" oninput="this.setCustomValidity('');"> </div>
                        <div class="form-group"> <label for="email">Adresa Elektronike</label> <input id="email" type="email" class="form-control" placeholder="adresa@domain.com" name="email" value="" required autofocus="" oninvalid="this.setCustomValidity('Ju lutem shkruani adresen elektronike (e-mail)');" oninput="this.setCustomValidity('');"> </div>
                        <div class="form-group"> <label for="password">Fjal&euml;kalimi</label> <input id="password" type="password" placeholder="Fjal&euml;kalimi" class="form-control" name="password" required data-eye oninvalid="this.setCustomValidity('Ju lutem shkruani fjal&euml;kalimin');" oninput="this.setCustomValidity('');"> </div>
                        <div class="form-group m-0"> <button type="submit" name="register_submit" class="btn btn-primary btn-block"> Shtoje si Administrator </button>
                            <p style="color: red; text-align:center"><b>Kujdes!<br> Ky user do ti kete te gjitha akseset e Administratorit!</b></p>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>