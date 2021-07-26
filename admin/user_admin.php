<?php
$msg = "";
include "../server.php";
include "../config.php";

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
                    //u.id, u.emri, u.mbiemri, u.username, u.email, u.j_data , u.role, r.role_n from users u, role r WHERE u.role = r.id order by p.id DESC
                    require("../config.php");
                    $user_sql = "SELECT u.id, u.emri, u.mbiemri, u.username,u.email,u.j_data, r.role from users u, roles r WHERE u.role = r.id order by u.id DESC ";
                    if ($result = mysqli_query($db, $user_sql)) {
                        $i = 1;

                        foreach ($result as $key => $user_row) {
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
                    }

                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

</body>

</html>