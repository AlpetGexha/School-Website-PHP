<?php
$c_kategory = "";
$drejtimi = "";
$lamia = "";

include "../server.php";
include "../config.php";
IamAdmin();

$c_sql = "SELECT p.id, p.lamia, p.emri, p.emriPhoto,p.colum_table, l.idLamia , l.lamiaid from post_categories p, lamia l where p.lamia = l.idLamia  order by p.id";
$c_result = mysqli_query($db, $c_sql);
$c_row = $c_result->fetch_assoc();


$ca_sql = "SELECT * from lamia";
$ca_result = mysqli_query($db, $ca_sql);
$ca_row = $c_result->fetch_assoc();
?>

<?php get_AdminHeader("Kategory Admin"); ?>

<div id="layoutSidenav_content">


    <div class="container mt-5 h-100">
        <?php if (!empty($_SESSION['errors'])) : ?>
            <div class="alert alert-danger" role="alert">
                <strong> <?= $_SESSION['errors']; ?> </strong> <br>
            </div>
        <?php endif; ?>
        <div class="row justify-content-md-center h-100 ">
            <div class="card-wrapper">
                <div class="card fat">
                    <div class="card-body">
                        <h4 class="card-title">Kategori</h4>
                        <form method="POST" action="#">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Shto Kategori" name="lamia_add" required="" value="<?= $c_kategory ?>" autofocus="" aria-describedby="button-addon2" oninvalid="this.setCustomValidity('Shkruani kategorin');" oninput="this.setCustomValidity('');">
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
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="colum_table_add" placeholder="P&euml;rshkrimi" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">P&euml;rshkrimi</label>
                                <p class="fw-light text-muted">Mund edhe t&euml; mos e shkruani tani. Keni mund&euml;si ta plot&euml;soni m&euml; posht&euml;</p>
                            </div>

                            <div class="input-group mb-3">
                                <input class="form-control" type="file" id="formFile" name="image" require="" accept=".jpg .png .jpeg " oninvalid="this.setCustomValidity('Zgjithni Foto');" oninput="this.setCustomValidity('');"> <button class="btn btn-outline-primary" type="submit" name="add_drejtime" id="button-addon2">Shto</button>
                            </div>

                        </form>

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="r-table">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Lamia</th>
                                        <th scope="col">Kategorit</th>
                                        <th scope="col">Tabela</th>
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
                        <td> <textarea class="form-control" readonly="" placeholder="P&euml;rshkrimi" id="floatingTextarea2" style="height: 10px">' . $c_row['colum_table'] . '</textarea> </td>
                        <td>
                        <a class="btn btn-danger"  data-toggle="modal" data-target="#modal_drejtimi_delete_' . $c_row["id"] . ' ">Fshije</a>
                        <a class="btn btn-primary"  data-toggle="modal" data-target="#modal_category_edit_' . $c_row["id"] . ' ">Ndrysho</a>
                        </td>
                        </tr>  ';


                                            get_op_modal(
                                                "drejtimi_delete_",
                                                $c_row["id"],
                                                "Fshirja i Kategorive",
                                                'A jeni i sigut q&euml; d&euml;shirni ta fshni Drejtimin e <b><i> ' . $c_row['emri'] . '</b></i> ',
                                                "Fshije!",

                                            );

                                            get_op_modal(
                                                "category_edit_",
                                                $c_row["id"],
                                                "Ndryshimi i Kategorive",
                                                '<h6>L&euml;nda</h6>
                                    <input type="text" class="form-control mt-2" name="edit_category_name" autofocus="" required="" value="' . $c_row['emri'] . '">
                                    <h6 class="mt-4">Teksti</h6>
                                    <textarea class="form-control"  id="floatingTextarea2" style="height: 220px" name="edit_category_text"> ' . $c_row['colum_table'] . '</textarea>',
                                                "Ndrysho",
                                                "primary",

                                            );
                                        }
                                    }

                                    ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="r-table">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Lamia</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    if ($ca_result = mysqli_query($db, $ca_sql)) {
                                        $i = 1;
                                        foreach ($ca_result as $key => $ca_row) {
                                            echo ' <tr>
                                    <td> ' . $i++ . ' </td> 
                                    <td> ' . $ca_row['lamiaid'] . ' </td>
                                    <td> <a class="btn btn-danger"  data-toggle="modal" data-target="#modal_category_delete_' . $ca_row["idLamia"] . ' ">Fshije</a> </td>
                                    </tr>  
                                    ';
                                            get_op_modal(
                                                "category_delete_",
                                                $ca_row['idLamia'],
                                                "Fshirja e Postimit",
                                                "A d&euml; jeni i sigurt qe d&euml;shironi ta fshini Lamin<b><i>  " . $ca_row['lamiaid'] . " </i></b>  ",
                                                "Po Fshije"

                                            );
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
    </div>
</div>

</body>

</html>