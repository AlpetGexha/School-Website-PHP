<?php
$msg = "";
include "../server.php";
include "../config.php";


$c_sql = "SELECT p.id, p.lamia, p.emri, p.emriPhoto, l.idLamia , l.lamiaid from post_categories p, lamia l where p.lamia = l.idLamia  order by p.id";
$c_result = mysqli_query($db, $c_sql);
$c_row = $c_result->fetch_assoc();


$ca_sql = "SELECT * from lamia";
$ca_result = mysqli_query($db, $ca_sql);
$ca_row = $c_result->fetch_assoc();
?>

<?php get_AdminHeader("Kategory Admin"); ?>

<div id="layoutSidenav_content">

    <div class="container mt-5 h-100">
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
        <div class="row justify-content-md-center h-100 ">
            <div class="card-wrapper">
                <div class="card fat">
                    <div class="card-body">
                        <h4 class="card-title">Kategori</h4>
                        <form method="POST" action="#">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Shto Kategori" name="lamia_add" required="" autofocus="" aria-describedby="button-addon2" oninvalid="this.setCustomValidity('Shkruani kategorin');" oninput="this.setCustomValidity('');">
                                <button class="btn btn-outline-primary" type="submit" name="add_lamia" id="button-addon2">Shto</button>
                            </div>
                        </form>
                    </div>

                    <div class="card-body">
                        <h4 class="card-title">Drejtime</h4>
                        <form method="POST" action="#" enctype="multipart/form-data">

                            <div class="input-group mb-3">
                                <input id="p_titulli" type="text" class="form-control" placeholder="Emri i Drejtimit" name="emri_drejtimi_add" required="" oninvalid="this.setCustomValidity('Shkruani Drejtimin');" oninput="this.setCustomValidity('');">
                                <select name="drejtimi_kategoria" class="custom-select mb-3">
                                    <option disabled required=""> Çfar&euml; kategorie &euml;sht&euml; postimi </option>
                                    <?php

                                    foreach ($ca_result as $key => $ca_row) {
                                        echo '  <option value=" ' . $ca_row['idLamia'] . ' ">'    . $ca_row['lamiaid'] . '</option>     ';
                                    }

                                    ?>
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <input class="form-control" type="file" id="formFile" name="image" require="" oninvalid="this.setCustomValidity('Zgjithni Foto');" oninput="this.setCustomValidity('');"> <button class="btn btn-outline-primary" type="submit" name="add_drejtime" id="button-addon2">Shto</button>
                            </div>

                        </form>

                    </div>

                </div>
                <div class="r-table">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Lamia</th>
                                <th scope="col">Kategorit</th>
                                <th scope="col">Opsionet</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if ($c_result = mysqli_query($db, $c_sql)) {
                                $i = 1;
                                foreach ($c_result as $key => $c_row) {

                                    //$c_row['id']
                                    echo ' <tr>
                        <td> ' . $i++ . ' </td> 
                        <td> ' . $c_row['lamiaid'] . ' </td>
                        <td> ' . $c_row['emri'] . ' </td>
                        <td> <a class="btn btn-danger"  data-toggle="modal" data-target="#modal_category_' . $c_row["id"] . ' ">Fshije</a> </td>
                        </tr>  ';
                                }
                            }

                            ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>