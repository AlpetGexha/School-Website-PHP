<?php
include "pdo.php";
include "../server.php";
$msg = "";
ob_start();

IamAdmin();
$x = new Pagination();
$sql = "SELECT * from aplikimet ORDER BY id DESC";
$x->InsertData("aplikimet", "$sql", 30);

?>


<?php get_AdminHeader("Index"); ?>


<div id="layoutSidenav_content">

    <div class="container-fluid mt-5">
        <h3 class="title">Aplikimet</h3>
        <form action="#" method="POST">
            <div class="r-table">
                <input class="btn btn-danger btn-sm" type='submit' value='Delete_box' name='multi_delete_box_apk' id="delete-btn">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col"> <input type="checkbox" name="select-all" id="select-all" /></th>
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

                        foreach ($x->result as $key => $row) : ?>
                            <tr>
                                <td><input type='checkbox' name='multi_delete[]' value='<?= $row['id'] ?>'></td>

                                <td><?= $row['emri']; ?></td>
                                <td><?= $row['mbiemri']; ?></td>
                                <td><?= $row['emriprindi']; ?></td>
                                <td><?= strftime('%e %B, %Y', strtotime($row['ditelindja'])); ?></td>
                                <td><?= $row['email']; ?></td>
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
        </form>
        <?php $x->getNavPages();  ?>
    </div>
</div>
<script>
    $('#select-all').click(function(event) {
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