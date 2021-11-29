<?php
include "config.php";
include "server.php";
$id = $_REQUEST['id'];


$sql = "SELECT * from post_categories where id='$id'";
$result = mysqli_query($db, $sql);
$row = $result->fetch_assoc();

if ($row === null) {
	header("Location: index");
}

$k_id = $row['id'];
?>

<?php get_header($row['emri']); ?>

<div class="banner">
	<h1><?= $row['emri'] ?></h1>
	<img src="assets/img/drejtimet/<?= $row['emriPhoto']; ?>" alt="<?= htmlspecialchars($row['emriPhoto']) ?>"><br>
</div>


<div class="container drejtimet mt-5">
	<div class="row">
		<div class='col-lg-8'>
			<div class="d-flex justify-content-center flex-wrap">
				<?php
				// $sql = "SELECT * from post where category = '$k_id' order by id DESC";
				// $result = mysqli_query($db, $sql);
				$x = new Pagination();
				$sql = "SELECT * from post where category = '$k_id' order by id DESC";
				$x->InsertData("post", "$sql", 10, "where category = '$k_id'");

				foreach ($x->result as $key => $row) : ?>

					<div class='row g-0 bg-light  container-layout'>
						<h1 class='mt-0'><?= $row['titulli']; ?></h1>
						<div class='col-md-6 mb-md-0 p-md-4'>
							<img src='assets/img/drejtimet_post/<?= $row['photo']; ?>' class='w-100 ' alt='<?= htmlspecialchars($row["titulli"]) ?>'>
						</div>
						<div class='col-md-6 p-4 ps-md-0 '>
							<p class='body-cart-text'><?= substr($row['body'], 0, 300) . "..." ?></p>
							<a class='btn btn-outline-primary' href='single?id=<?= $row['id']; ?>'>Lexo m&euml; shum&euml;</a>
						</div>
						<p> U postua me: <?= strftime('%e %B, %Y', strtotime($row['date'])); ?></p>
					</div>

				<?php endforeach; ?>
				<?php

				if ($x->total_pages ==  0) {
					echo "<p style = 'text-align:center;  color:red;  font-size:20px;' >Nuk ka postime </p>";
				} else {
					$x->getNavPages("&id=$k_id");
				}

				?>
			</div>

		</div>

		<div class="col-2">
			<?php
			$sql = "SELECT * from post_categories ";
			$result = mysqli_query($db, $sql);
			$row = $result->fetch_assoc();
			?>
			<?php if ($row['colum_table'] != null) : ?>
				<div class="card m-auto first-card	" style="width: 18rem;padding: 20px; background: #FCFCFC;">
					<h5 class="card-title text-center p-2"><b><?= $row['emri'] ?></b></h5>
					<div class="user-media media mb-4">
						<p>
							<?= $row['colum_table'] ?>
						</p>
					</div>

				</div>
			<?php endif; ?>
			<br>
			<?php include "assets/php/colum_table.php"; ?>
		</div>
	</div>

</div>
</div>
</div>
<br> <br>
<?php get_footer(); ?>