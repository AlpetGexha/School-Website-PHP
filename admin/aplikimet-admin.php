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
  <title>Aplikmet Online ADMIN</title>
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
    <thead>
      <tr>
        <th scope="col">#ID</th>
        <th scope="col">Emri</th>
        <th scope="col">Mbiemri</th>
        <th scope="col">Emri i prindit</th>
        <th scope="col">Dit&euml;lindja</th>
        <th scope="col">Email</th>
        <th scope="col">Telefoni</th>
        <th scope="col">Drejtimi</th>
        <th scope="col">Opsionet</th>
      </tr>
    <tbody>


      <?php

      //Userat
      $sql = "SELECT * from aplikimet ";
      $results = mysqli_query($db, $sql);

      while (($row = $results->fetch_assoc()) != null) {

        $timestamp = $row['ditelindja'];

        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['emri'] . "</td>";
        echo "<td>" . $row['mbiemri'] . "</td>";
        echo "<td>" . $row['emriprindi'] . "</td>";
        echo " <td> " . date('F j, Y ', strtotime($timestamp)); " </td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['telefoni'] . "</td>";
        echo "<td>" . $row['drejtimet'] . "</td>";

        echo "
                    <td>
                    <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#aplikemet_" . $row['id'] . "'>
                Fshije
                </button> </td> ";
        echo "</tr>";
        echo '
              <div class="modal fade" id="aplikemet_' . $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Fshije Aplikimin</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      A jeni i sigurt q&euml; d&euml;shironi ta fshini k&euml;t&euml; Aplikim
                      <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">JO</button>
                        <a href="delete/delete-aplikimet.php? id=' . $row['id'] . ' "class="btn btn-danger"id="delete_btn" >PO! Fshije</a> 
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