<?php
include "config.php";
include "server.php";
$id = $_REQUEST['id'];

mysqli_query($db, "UPDATE post set views = views +1  WHERE id ='$id' ");

$sql = "SELECT p.id,p.photo,p.date,p.views,p.titulli,p.body,p.category ,u.username , p.userid FROM users u, post p WHERE p.userid = u.id  and p.id = '$id' ORDER BY id DESC ";
$result = mysqli_query($db, $sql);
$row = $result->fetch_assoc();
$c_category = $row['category'];

$c_sql = "SELECT * from post_categories where id = '$c_category' ";
$c_result = mysqli_query($db, $c_sql);
$c_row = $c_result->fetch_assoc();

?>
<?php get_header($c_row['emri']); ?>

<?php
require_once 'admin/conn.php';
updateInfo();
?>

<div class="banner">
    <h1><?= $c_row['emri'] ?></h1>
    <img src="assets/img/drejtimet/<?= $c_row['emriPhoto']; ?>"><br>
</div>

<style>
    .container-layout {
        text-align: center;
    }
</style>

<br /><br />

<div class="container drejtimet mt-5">
    <div class="row">
        <div class='col-lg-8'>
            <div class="d-flex justify-content-center flex-wrap">

                <div class='g-0 bg-light  container-layout'>
                    <h1 class='mt-0'><?= $row['titulli']; ?></h1>
                    <p> U postua me: <?= strftime('%e %B, %Y', strtotime($row['date'])); ?></p>
                    <div class='col-md-12 mb-md-0 p-md-4'>
                        <img src='assets/img/drejtimet_post/<?= $row['photo']; ?>' class='w-100' alt='foto'>
                    </div>
                    <div class='col-md-12 p-4 '>
                        <p><?= $row['body'] ?></p>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-2">

            <?php if ($c_row['colum_table'] != null) : ?>
                <div class="card m-auto first-card	" style="width: 18rem;padding: 20px; background: #FCFCFC;">
                    <h5 class="card-title text-center p-2"><b><?= $c_row['emri'] ?></b></h5>
                    <div class="user-media media mb-4">
                        <p>
                            <?= $c_row['colum_table'] ?>
                        </p>
                    </div>

                </div>
            <?php endif; ?>
            <br>
            <?php include "assets/php/colum_table.php"; ?>
        </div>
    </div>

</div>

<br> <br>
<?php get_footer(); ?>