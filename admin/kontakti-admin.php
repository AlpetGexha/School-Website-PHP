<?php
$msg = "";
include "../server.php";
include "../config.php";
IamAdmin();
?>

<?php get_AdminHeader("Kategory Admin"); ?>

<div id="layoutSidenav_content">

  <div class="container-fluid mt-5 h-100">
    <?php
    if (!empty($msg)) {
      echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>' . $msg . ' </strong>  <br>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;<a href="apliko_online.php"></a></span>
    </button>
</div>';
    }
    ?>
    <h3 class="title">Kontakit</h3>
    <div class="r-table">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">EMAIL</th>
            <th scope="col">SMS</th>
            <th scope="col">Opsionet</th>
          </tr>
        </thead>

        <tbody>
          <?php
          $c_sql = "SELECT * from kontakit ";
          if ($result = mysqli_query($db, $c_sql)) {
            $i = 1;
            foreach ($result as $key => $ko_row) {

              //$ko_row['id']
              echo ' <tr>
              <td> ' . $i++ . ' </td> 
              <td> ' . $ko_row['email'] . ' </td>
              <td> <textarea class="" rows="2" cols="40" readonly=""> ' . $ko_row["sms"] . '</textarea></td>
              <td> <a class="btn btn-danger"  data-toggle="modal" data-target="#modal_sms_' . $ko_row["id"] . ' ">Fshije</a> </td>
              </tr>  ';
            }
          }

          ?>

        </tbody>
      </table>
    </div>
  </div>

</div>

</body>

</html>