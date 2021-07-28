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




<?php get_AdminHeader("Index"); ?>


<div id="layoutSidenav_content">

  <div class="container-fluid mt-5">
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
          <th scope="col">Data E Regjistrimit</th>
          <th scope="col">Opsionet</th>
        </tr>
      <tbody>


        <?php

        //Userat
        $sql = "SELECT * from aplikimet ";
        $results = mysqli_query($db, $sql);
        $row = $results->fetch_assoc();

        $i = 1;
        foreach ($results as $row) {
          echo '<tr>
								<td>' . $i++ . '</td>
								<td>' . $row['emri'] . '</td>
								<td>' . $row['mbiemri'] . '</td>
								<td>' . $row['emriprindi'] . '</td>
								<td>' . strftime('%e %B, %Y', strtotime($row['ditelindja'])) . '</td>
								<td>' . $row['email'] . '</td>
								<td>' . $row['telefoni'] . '</td>
								<td>' . $row['drejtimet'] . '</td>
								<td>' . strftime('%e %B, %Y', strtotime($row['j_data'])) . '</td>
                <td> <a class="btn btn-danger"  data-toggle="modal" data-target="#modal_aplikimi_delete_' . $row["id"] . ' ">Fshije</a> </td>                      
                </tr>
                ';
          get_op_modal(
            "aplikimi_delete_",
            $row['id'],
            "Fshirja e Aplikimit",
            "A d&euml; jeni i sigurt qe d&euml;shironi ta fshini Aplikimin e<b><i>  " . $row['emri'] . "  " . $row['mbiemri'] . " </i></b>  ",
            "Po Fshije"

          );
        }
        ?>

  </div>
</div>

</body>

</html>