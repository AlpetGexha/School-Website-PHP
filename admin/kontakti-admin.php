<?php
$msg = "";
include "../server.php";
include "../config.php";
IamAdmin();

$x = new Pagination();
$sql = "SELECT * from kontakit ";
$x->InsertData("kontakit", "$sql");
// $y = new Pagination();
// $ysql = "SELECT * from kontakit ";
// $y->InsertData("kontakit", "$ysql");

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
        <form action="#" method="POST">
            <input class="btn btn-danger btn-sm" type='submit' value='Delete_box' name='multi_delete_box_sms' id="delete-btn">

            <div class="r-table">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col"> <input type="checkbox" name="select-all" id="select-all" /></th>
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
                            if ($result !== 0) {
                                if ($sql) {
                                    foreach ($result as $key => $ko_row) {
                                        //$ko_row['id']
                        ?><tr>
                                            <td><input type="checkbox" name="multi_delete[]" value="<?= $ko_row['id'] ?>" /></td>
                                            <td> <?= $i++ ?> </td>
                                            <td> <?= $ko_row['email'] ?></td>
                                            <td> <textarea class="" rows="2" cols="40" readonly=""><?= $ko_row['sms'] ?></textarea></td>
                                            <td> <a class="btn btn-danger" data-toggle="modal" data-target="#modal_sms_ <?= $ko_row['id'] ?>">Fshije</a> </td>
                                        </tr> <?php
                                            }
                                        }
                                    }
                                }
                                                ?>

                    </tbody>
                </table>
            </div>
        </form>
        <?php $x->getNavPages(); ?>
    </div>

</div>
<script>
    $(' #select-all').click(function(event) {
        if (this.checked) {
            $(':checkbox').each(function() {
                this.checked = true;
            });
        } else {
            $(':checkbox').each(function() {
                this.checked = false;
            });
        }
    });
</script>

</body>

</html>