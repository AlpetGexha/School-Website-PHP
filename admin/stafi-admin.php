<?php
include "../config.php";
include "../server.php";
$msg = "";
ob_start();

IamAdmin();

$lenda_sql = "SELECT * from lendet";
$lenda_result = mysqli_query($db, $lenda_sql);
$lenda_row = $lenda_result->fetch_assoc();


$x = new Pagination();
$sql = "SELECT s.stafiID , s.stafiPhoto, s.stafiEmri, s.stafiMbiemri, s.stafiLenda, l.lendetEmri from stafi s, lendet l WHERE s.stafiLenda = l.lendetID ";
$x->InsertData("post", "$sql", 10)


?>

<?php get_AdminHeader("Stafi"); ?>
<div id="layoutSidenav_content">

    <div class="container mt-5">
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
                        <h4 class="card-title">Provesionet</h4>
                        <form method="POST" action="#">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Shto Provesione" name="lenda_add" required="" autofocus="" aria-describedby="button-addon2" oninvalid="this.setCustomValidity('Shkruani L&euml;');" oninput="this.setCustomValidity('');">
                                <button class="btn btn-outline-primary" type="submit" name="add_lenda" id="button-addon2">Shto</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row justify-content-md-center mt-4">
                    <div class="card-wrapper">
                        <div class="card fat">
                            <div class="card-body">
                                <h4 class="card-title">Krijo Staf</h4>

                                <form method="POST" action="#" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Emri</label>
                                                <input id="p_titulli" type="text" class="form-control" placeholder="Emri" name="s_emri" required="" oninvalid="this.setCustomValidity('Shkruani titullin');" oninput="this.setCustomValidity('');">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Mbiemri</label>
                                                <input id="p_titulli" type="text" class="form-control" placeholder="Mbiemri" name="s_mbiemri" required="" oninvalid="this.setCustomValidity('Shkruani titullin');" oninput="this.setCustomValidity('');">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="disabledTextInput" class="form-label">L&euml;nd&euml;t</label>
                                        <select name="s_lenda" class="custom-select mb-3">
                                            <option disabled required=""> Çfar&euml; kategorie &euml;sht&euml; postimi </option>
                                            <?php
                                            if ($lenda_result = mysqli_query($db, $lenda_sql)) {
                                                $i = 1;
                                                foreach ($lenda_result as $key => $lenda_row) {
                                                    echo ' <option value=" ' . $lenda_row['lendetID'] . ' ">'    . $lenda_row['lendetEmri'] . '</option>     ';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="mb-3 p_upload">
                                        <label>Foto</label>
                                        <input class="form-control" type="file" id="formFile" name="image" require="" oninvalid="this.setCustomValidity('Zgjithni Foto');" oninput="this.setCustomValidity('');">
                                    </div>

                                    <div class="form-group m-0">
                                        <button type="submit" name="create_staf" class="btn btn-primary btn-block">
                                            Posto
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-8">
                        <div class="r-table">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Emri</th>
                                        <th scope="col">Profesioni</th>
                                        <th scope="col">Opsionet</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php

                                    foreach ($x->result as $key => $stafi_row) {

                                        //$c_row['id']
                                        echo ' <tr>
                        <td> ' . $i++ . ' </td> 
                         <td> <img src="../assets/img/stafi/' . $stafi_row['stafiPhoto'] . '" class="table-img" alt="Foto" loading="lazy">  </td> 
                       
                        <td> ' . $stafi_row['stafiEmri'] . ' ' . $stafi_row['stafiMbiemri'] . ' </td>
                        <td> ' . $stafi_row['lendetEmri'] . '</td>
                        <td> 
                        <a class="btn btn-danger"  data-toggle="modal" data-target="#modal_stafi_delete_' . $stafi_row["stafiID"] . ' ">Fshije</a> /
                        <a class="btn btn-primary"  data-toggle="modal" data-target="#modal_stafi_edit_' . $stafi_row["stafiID"] . ' ">Nrysho</a> </td>
                         </tr>  ';
                                        get_op_modal(
                                            "stafi_delete_",
                                            $stafi_row['stafiID'],
                                            "Fshirja e Stafit <b> " . $stafi_row['stafiEmri'] . " </b>",
                                            "A d&euml; jeni i sigurt qe d&euml;shironi ta fshini nga stafi<b><i>  " . $stafi_row['stafiEmri'] . " " . $stafi_row['stafiMbiemri'] . " </i></b>  ",
                                            "Po Fshije"

                                        );

                                        get_op_modal(
                                            "stafi_edit_",
                                            $stafi_row['stafiID'],
                                            "Ndrysho Stafin <b> " . $stafi_row['stafiEmri'] . " </b>",
                                            '                          
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Emri</label>
                                            <input id="p_titulli" type="text" class="form-control" placeholder="Emri" name="s_emri" required="" value="' . $stafi_row['stafiEmri'] . '">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Mbiemri</label>
                                            <input id="p_titulli" type="text" class="form-control" placeholder="Mbiemri" name="s_mbiemri" required=""  value="' . $stafi_row['stafiMbiemri'] . '">
                                        </div>
                                    </div>
                                </div>
                            
                            <div class="form-group">
                                    </div>
                        ',
                                            "Ndrysho",
                                            "primary"

                                        );
                                    }


                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <?php $x->getNavPages();  ?>
                    </div>
                    <div class="col-md-4">
                        <div class="r-table">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Profesionet</th>
                                        <th scope="col">Opsionet</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    if ($lenda_result = mysqli_query($db, $lenda_sql)) {
                                        $i = 1;
                                        foreach ($lenda_result as $key => $lenda_row) {

                                            //$c_row['id']
                                            echo ' <tr>
                        <td> ' . $i++ . ' </td> 
                        <td> ' . $lenda_row['lendetEmri'] . '</td>
                        <td> <a class="btn btn-danger"  data-toggle="modal" data-target="#modal_lendet_delete_' . $lenda_row["lendetID"] . ' ">Fshije</a> </td>
                        </tr>  ';
                                            get_op_modal(
                                                "lendet_delete_",
                                                $lenda_row['lendetID'],
                                                "Fshirja e Profesionit <b> " . $lenda_row['lendetEmri'] . " </b>",
                                                "A d&euml; jeni i sigurt qe d&euml;shironi ta fshini <b><i>  " . $lenda_row['lendetEmri'] . "</i></b>  ",
                                                "Po Fshije"

                                            );
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <!--                if ($lenda_result = mysqli_query($db, $lenda_sql)) {
                                            
                                                foreach ($lenda_result as $key => $lenda_row) {
                                                     <option value=" ' . $lenda_row['lendetID'] . ' ">'    . $lenda_row['lendetEmri'] . '</option>;
                                                }
                                            } -->
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    </body>

    </html>