<?php
$msg = "";
include "../server.php";
include "../config.php";
IamAdmin();



$x = new Pagination();
$sql = "SELECT u.id, u.emri, u.mbiemri, u.username,u.email,u.j_data, r.role from users u, roles r WHERE u.role = r.id order by u.id DESC ";
$x->InsertData("users", "$sql");

?>

<?php get_AdminHeader("Kategory Admin"); ?>


<div id="layoutSidenav_content">

    <div class="container-fluid mt-5 h-100">
        <?= Session::getFlash('sukses'); ?>
        <h3 class="title">P&euml;rdoruesit</h3>

        <div class="r-table">
            <table class=" table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Emri</th>
                        <th scope="col">Mbiemri</th>
                        <th scope="col">Username</th>
                        <th scope="col">E-Mail</th>
                        <th scope="col">Role</th>
                        <th scope="col">Data</th>
                        <th scope="col">Opsionet</th>
                    </tr>
                </thead>

                <tbody>

                    <?php

                    $i = 1;
                    foreach ($x->result as $key => $user_row) {
                        //$ko_row['id']
                        echo ' <tr>
                                    <td> ' . $i++ . ' </td> 
                                    <td> ' . $user_row["emri"] . ' </td> 
                                    <td> ' . $user_row["mbiemri"] . ' </td> 
                                    <td> ' . $user_row["username"] . ' </td> 
                                    <td> ' . $user_row['email'] . ' </td> 
                                    <td> ' . $user_row['role'] . ' </td> 
                                    <td> ' .  date('j F, Y ,h:i:s A', strtotime($user_row['j_data'])) . ' </td> 
                                    <td> <a class="btn btn-danger"  data-toggle="modal" data-target="#modal_' . $user_row["id"] . ' ">Fshije</a> </td>
                                </tr>  ';
                    }


                    ?>

                </tbody>
            </table>
        </div>
        <?php $x->getNavPages();  ?>
    </div>
</div>

</body>

</html>