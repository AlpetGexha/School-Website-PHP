<?php
include "config.php";
include "server.php";
$id = $_REQUEST['id'];


$sql = "SELECT * from post_categories where id='$id'";
$result = mysqli_query($db, $sql);
$row = $result->fetch_assoc();
$k_id = $row['id'];
?>

<?php get_header($row['emri']); ?>

<div class="banner">
	<h1><?= $row['emri'] ?></h1>
	<img src="assets/img/drejtimet/<?= $row['emriPhoto']; ?>"><br>
</div>


<div class="container drejtimet mt-5">
	<div class="row">
		<div class='col-lg-8'>
			<div class="d-flex justify-content-center flex-wrap">
				<?php
				$sql = "SELECT * from post where category = '$k_id' order by id DESC";
				$result = mysqli_query($db, $sql);

				while (($row = $result->fetch_assoc()) != null) {
					echo "
					
					<div class='row g-0 bg-light  container-layout'>
						<h1 class='mt-0'>" . $row['titulli'] . "</h1>
						<div class='col-md-6 mb-md-0 p-md-4'>
							<img  src='assets/img/drejtimet_post/" . $row['photo'] . "' class='w-100' alt='foto'>
						</div>
						<div class='col-md-6 p-4 ps-md-0 '>
							<p class='body-cart-text'>" . $row['body'] .
						"</p>
						<a class='btn btn-outline-primary'  href='single.php?id=" . $row["id"] ."'>Lexo m&euml; shum&euml;</a>
						</div>						
						<p > U postua me: " . strftime('%e %B, %Y', strtotime($row['date'])) . " </p>
					</div>
					";
				}
				if (mysqli_num_rows($result) == 0) {
					echo "<p style = 'text-align:center;  color:red;  font-size:20px;' >Nuk ka postime </p>";
				}
				?>
			</div>
		</div>

		<div class="col-2">
			<div class="card m-auto first-card	" style="width: 18rem;padding: 20px; background: #FCFCFC;">
				<h5 class="card-title text-center p-2"><b>Informatika</b></h5>
				<div class="user-media media mb-4">
					<p>
						&Euml;sht&euml; profil n&euml; kuad&euml;r t&euml; drejtimit t&euml; Elektroteknik&euml;s.
						Brenda k&euml;tij profili nx&euml;n&euml;sit mund t&euml; m&euml;sojn&euml; p&euml;r: <br>

						Aplikacionet e Office-it,<br>
						Sistemet Operative,<br>
						Rrjetet Kompjuterike,<br>

						Algoritme,<br>
						Baza t&euml; t&euml; dh&euml;nave,<br>
						Gjuh&euml; Programuese (C++),<br>
						Web disejn,<br>
						Arkitektur&euml; Kompjuteri.<br><br>

						Viti i Ri shkollor …
						Drejtimi i Informatik&euml;s n&euml; vitin e ri shkollor, 2021 fillon i p&euml;rgatitur sa i p&euml;rket gadishm&euml;ris&euml; s&euml; kabineteve p&euml;r t’iu sh&euml;rbyer nx&euml;n&euml;sve sa m&euml; mir&euml;.
						N&euml; k&euml;t&euml; kontekst vlen&euml; t&euml; theksohet se ekzistojn&euml; dy kabinete t&euml; paisur me kompjuter&euml; solid&euml; p&euml;r pun&euml;. Ata jan&euml; t&euml; lidhur n&euml; rrjetin e Internetit, k&euml;shtuq&euml; nx&euml;n&euml;sit mund t&euml; shfryt&euml;zojn&euml; informacione edhe nga Interneti.

						P&euml;r t&euml; shfryt&euml;zuar materiale p&euml;r m&euml;sim, klikoni m&euml; posht&euml; !
					</p>
				</div>

			</div><br>
			<?php include "assets/php/colum_table.php"; ?>
		</div>
	</div>

</div>
</div>
</div>
<br> <br>
<?php get_footer(); ?>