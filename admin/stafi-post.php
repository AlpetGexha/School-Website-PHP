<?php
include "../config.php";
include "../server.php";
$msg = "";
ob_start();

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
    header("Location:../login.php");
    die();
}
?>

<!DOCTYPE html>
<html>

<head>
    <?php include('../assets/php/title_bar_img.php'); ?>
    <title>Main</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>

<?php include "../assets/php/admin-navbar.php"; ?>

<div class="container mt-5">

    <table class="table">
        <h1>Drejtori</h1>
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">foto</th>
                <th scope="col">Emri & Mbiemri</th>
                <th scope="col">pershkrimi </th>
                <th scope="col">Opsionet</th>
            </tr>
        <tbody>

            <?php

            //Userat
            $sql = "SELECT * from drejtori ";
            $results = mysqli_query($db, $sql);

            while (($row = $results->fetch_assoc()) != null) {

                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . "<img width='85' height='85' src='../assets/img/stafi/" . $row['image'] . "' alt='Profile Pic'>" . "</td>";
                echo "<td>" . $row['emri'] . "</td>";
                echo "<td><textarea >" . $row['pershrimi'] . "</textarea></td>";
                echo "
                    <td>
                    <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#stafi_" . $row['id'] . "'>
                Fshije
                </button> </td> ";
                echo "</tr>";
                echo '
              <div class="modal fade" id="stafi_' . $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Fshije Aplikimin</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      A jeni i sigurt q&euml; d&euml;shironi ta fshini postin e Drejtorit
                      <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">JO</button>
                        <a href="delete-stafi.php? id=' . $row['id'] . ' "class="btn btn-danger"id="delete_btn" >PO! Fshije</a> 
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              ';
            }
            ?>



            <table class="table">
                <h1>Sekretaria</h1>
                <thead>
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">foto</th>
                        <th scope="col">Emri & Mbiemri</th>
                        <th scope="col">pershkrimi </th>
                        <th scope="col">Opsionet</th>
                    </tr>
                <tbody>

                    <?php

                    //Userat
                    $sql = "SELECT * from sekretaira ";
                    $results = mysqli_query($db, $sql);

                    while (($row = $results->fetch_assoc()) != null) {

                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . "<img width='85' height='85' src='../assets/img/stafi/" . $row['image'] . "' alt='Profile Pic'>" . "</td>";
                        echo "<td>" . $row['emri'] . "</td>";
                        echo "<td><textarea >" . $row['pershkrimi'] . "</textarea></td>";
                        echo "
                    <td>
                    <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#stafi_" . $row['id'] . "'>
                Fshije
                </button> </td> ";
                        echo "</tr>";
                        echo '
              <div class="modal fade" id="stafi_' . $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Fshije Aplikimin</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      A jeni i sigurt q&euml; d&euml;shironi ta fshini postin e Sekretarit
                      <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">JO</button>
                        <a href="delete/stafi-delete.php? id=' . $row['id'] . ' "class="btn btn-danger"id="delete_btn" >PO! Fshije</a> 
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              ';
                    }
                    ?>

                    <table class="table">
                        <h1>Kordinatroi</h1>
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">foto</th>
                                <th scope="col">Emri & Mbiemri</th>
                                <th scope="col">pershkrimi </th>
                                <th scope="col">Opsionet</th>
                            </tr>
                        <tbody>

                            <?php

                            //Userat
                            $sql = "SELECT * from kordinatori ";
                            $results = mysqli_query($db, $sql);

                            while (($row = $results->fetch_assoc()) != null) {

                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . "<img width='85' height='85' src='../assets/img/stafi/" . $row['image'] . "' alt='Profile Pic'>" . "</td>";
                                echo "<td>" . $row['emri'] . "</td>";
                                echo "<td><textarea >" . $row['pershkrimi'] . "</textarea></td>";
                                echo "
                    <td>
                    <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#kordinatori_" . $row['id'] . "'>
                Fshije
                </button> </td> ";
                                echo "</tr>";
                                echo '
              <div class="modal fade" id="kordinatori_' . $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Fshije Aplikimin</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      A jeni i sigurt q&euml; d&euml;shironi ta fshini postin e Kordiantorit
                      <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">JO</button>
                        <a href="delete/stafi-delete-kordinatori.php? id=' . $row['id'] . ' "class="btn btn-danger"id="delete_btn" >PO! Fshije</a> 
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              ';
                            }


                            ?>
                            <table class="table">
                                <h1>M&euml;simdh&euml;n&euml;sit</h1>
                                <thead>
                                    <tr>
                                        <th scope="col">#ID</th>
                                        <th scope="col">foto</th>
                                        <th scope="col">Emri & Mbiemri</th>
                                        <th scope="col">pershkrimi </th>
                                        <th scope="col">L&euml;nda M&euml;simore </th>
                                        <th scope="col">Opsionet</th>
                                    </tr>
                                <tbody>

                                    <?php

                                    //Userat
                                    $sql = "SELECT * from mesimdhenesit ";
                                    $results = mysqli_query($db, $sql);

                                    while (($row = $results->fetch_assoc()) != null) {

                                        echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . "<img width='85' height='85' src='../assets/img/stafi/" . $row['image'] . "' alt='Profile Pic'>" . "</td>";
                                        echo "<td>" . $row['emri'] . "</td>";
                                        echo "<td><textarea >" . $row['pershkrimi'] . "</textarea></td>";
                                        echo "<td>" . $row['lenda'] . "</td>";
                                        echo "
                    <td>
                    <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#stafi_" . $row['id'] . "'>
                Fshije
                </button> </td> ";
                                        echo "</tr>";
                                        echo '
              <div class="modal fade" id="stafi_' . $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Fshije Aplikimin</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      A jeni i sigurt q&euml; d&euml;shironi ta fshini postin e M&euml;simth&euml;nesit
                      <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">JO</button>
                        <a href="delete/stafi-delete-mesimdhenesit.php? id=' . $row['id'] . ' "class="btn btn-danger"id="delete_btn" >PO! Fshije</a> 
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              ';
                                    }
                                    ?>


                                    <table class="table">
                                        <h1>Sherbimi Teknik</h1>
                                        <thead>
                                            <tr>
                                                <th scope="col">#ID</th>
                                                <th scope="col">foto</th>
                                                <th scope="col">Emri & Mbiemri</th>
                                                <th scope="col">pershkrimi </th>
                                                <th scope="col">L&euml;nda M&euml;simore </th>
                                                <th scope="col">Opsionet</th>
                                            </tr>
                                        <tbody>

                                            <?php

                                            //Userat
                                            $sql = "SELECT * from sherbimiteknik ";
                                            $results = mysqli_query($db, $sql);

                                            while (($row = $results->fetch_assoc()) != null) {

                                                echo "<tr>";
                                                echo "<td>" . $row['id'] . "</td>";
                                                echo "<td>" . "<img width='85' height='85' src='../assets/img/stafi/" . $row['image'] . "' alt='Profile Pic'>" . "</td>";
                                                echo "<td>" . $row['emri'] . "</td>";
                                                echo "<td><textarea >" . $row['pershkrimi'] . "</textarea></td>";
                                                echo "<td>" . $row['lenda'] . "</td>";
                                                echo "
                    <td>
                    <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#sherbimiteknik_" . $row['id'] . "'>
                Fshije
                </button> </td> ";
                                                echo "</tr>";
                                                echo '
              <div class="modal fade" id="sherbimiteknik_' . $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Fshije Aplikimin</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      A jeni i sigurt q&euml; d&euml;shironi ta fshini postin e Sherbimit Teknik
                      <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">JO</button>
                        <a href="delete/stafi-delete-sherbimiteknik.php? id=' . $row['id'] . ' "class="btn btn-danger"id="delete_btn" >PO! Fshije</a> 
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              ';
                                            }
                                            ?>


                                            </body>

</html>