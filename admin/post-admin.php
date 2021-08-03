<?php
include "pdo.php";
include "../server.php";
$msg = "";
ob_start();
IamAdmin();


$x = new Pagination();
$sql = "SELECT p.id, p.titulli, p.body, p.category, p.date,p.photo, c.emri, u.username from post p, post_categories c, users u WHERE p.category = c.id and p.userid = u.id order by p.id DESC";
$x->InsertData("post", "$sql")

?>

<?php get_AdminHeader("Postimet"); ?>



<div id="layoutSidenav_content">
    <div class="container-fluid mt-5 h-100">
        <h3 class="title">Postimet</h3>
        <div class="r-table">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Titulli</th>
                        <th scope="col">P&euml;rshkrimi</th>
                        <th scope="col">Kategoria</th>
                        <th scope="col">Postuesis</th>
                        <th scope="col">Data</th>
                        <th scope="col">Opsionet</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $i = 1;
                    foreach ($x->result as $key => $post_row) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td> <img src="../assets/img/drejtimet_post/<?= $post_row['photo']; ?>" class="table-img" alt="Foto" loading="lazy"> </td>
                            <td><?= $post_row['titulli']; ?></td>
                            <td> <textarea class="" rows="2" cols="40" readonly=""> <?= $post_row['body']; ?></textarea></td>
                            <td><?= $post_row['emri']; ?></td>
                            <td><?= $post_row['username']; ?></td>
                            <td><?= strftime('%e %B, %Y', strtotime($post_row['date']))  ?></td>
                            <td> <a class="btn btn-danger" data-toggle="msodal" data-target="#modal_post_delete_<?= $post_row['id']; ?> ">Fshije</a> /
                                <a class="btn btn-primary" data-toggle="modal" data-target="#modal_post_edit_<?= $post_row['id']; ?> ">Nrysho</a>
                            </td>
                        </tr>
                        <?php
                        get_op_modal(
                            "post_delete_",
                            $post_row['id'],
                            "Fshirja e Postimit",
                            "A d&euml; jeni i sigurt qe d&euml;shironi ta fshini Postimin<b><i>  " . $post_row['titulli'] . " </i></b>  ",
                            "Po Fshije"

                        );

                        get_op_modal(
                            "post_edit_",
                            $post_row['id'],
                            "Ndrysho Postimin",
                            '                          
                                     <h6>Titulli</h6>
                                        <input type="text" class="form-control mt-2" name="post_titulli" autofocus="" required="" value="' . $post_row['titulli'] . '">
                                    <h6 class="mt-4">Teksti</h6>
                                    <textarea class="form-control" required="" placeholder="" id="floatingTextarea2" style="height: 220px" name="post_body"> ' . $post_row['body'] .
                                '</textarea>
                                
                        ',
                            "Ndrysho",
                            "primary"

                        );
                        ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php $x->getNavPages();  ?>
    </div>

</div>
</div>

</body>

</html>