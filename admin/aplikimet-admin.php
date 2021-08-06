<?php
include "pdo.php";
include "../server.php";
$msg = "";
ob_start();

IamAdmin();
$x = new Pagination();
$sql = "SELECT * from aplikimet ORDER BY id DESC";
$x->InsertData("aplikimet", "$sql", 2);

?>


<?php get_AdminHeader("Index"); ?>


<div id="layoutSidenav_content">


    <div class="container-fluid mt-5">
        <h3 class="title">Aplikimet</h3>
        <div class="r-table">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#ID</th>
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
                    $i = 1;
                    foreach ($x->result as $key => $row) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $row['emri']; ?></td>
                            <td><?= $row['mbiemri']; ?></td>
                            <td><?= $row['emriprindi']; ?></td>
                            <td><?= strftime('%e %B, %Y', strtotime($row['ditelindja'])); ?></td>
                            <td><?= $row['telefoni']; ?></td>
                            <td><?= $row['drejtimet']; ?></td>
                            <td><?= strftime('%e %B, %Y', strtotime($row['j_data']))  ?></td>
                            <td><a class="btn btn-danger" data-toggle="modal" data-target="#modal_aplikimi_delete_<?= $row['id']; ?> ">Fshije</a></td>
                        </tr>
                        <?php
                        get_op_modal(
                            "aplikimi_delete_",
                            $row['id'],
                            "Fshirja e Aplikimit",
                            "A d&euml; jeni i sigurt qe d&euml;shironi ta fshini Aplikimin e<b><i>  " . $row['emri'] . "  " . $row['mbiemri'] . " </i></b>  ",
                            "Po Fshije"

                        );
                        ?>
                    <?php endforeach; ?>
                </tbody>
                </thead>
            </table>

        </div>
        <?php $x->getNavPages();  ?>
    </div>
</div>

</body>

</html>