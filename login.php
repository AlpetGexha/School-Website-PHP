<?php
$msg = "";
include "config.php";
include "server.php";
ob_start();


if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    header("Location:admin/index.php");
}
?>

<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta charset="utf-8">
    <title>Kyqja</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>


<body class="my-login-page">
    <div class="container mt-5 h-100">
        <div class="row justify-content-md-center h-100">
            <div class="card-wrapper">
                <div class="card fat">
                    <div class="card-body">
                        <?php
                        if (!empty($msg)) {
                            echo '<p>' . $msg . '</p>';
                        }
                        ?>
                        <h4 class="card-title">Kyquni n&euml; panelin menagjues</h4>
                        <form method="POST" class="my-login-validation" action="#">
                            <div class="form-group">
                                <label for="email">P&euml;rdoruesi</label>
                                <input id="email" type="text" class="form-control" placeholder="P&euml;rdoruesi" name="username" value="" required autofocus="" oninvalid="this.setCustomValidity('Ju lutem shkruani p&euml;rdoruesin');" oninput="this.setCustomValidity('');">
                            </div>
                            <div class="form-group">
                                <label for="password">Fjal&euml;kalimi
                                    <input id="password" type="password" placeholder="Fjal&euml;kalimi" class="form-control" name="password" required data-eye oninvalid="this.setCustomValidity('Ju lutem shkruani fjal&euml;kalimin');" oninput="this.setCustomValidity('');">
                            </div>
                            <div class="form-group m-0">
                                <button type="submit" name="login_submit" class="btn btn-primary btn-block">
                                    Kyquni
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="assets/js/function.js"></script>

</body>

</html>