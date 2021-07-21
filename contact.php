<?php
$msg = "";
include("config.php");
include "server.php";
// ne fillim kyqu para se te hysh ne index
ob_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- ------------ Foto per title bar ------------------ -->
  <?php include('assets/php/title_bar_img.php'); ?>
  <title>Kontakti - SHMLT "Nexhmedin Nixha" – Gjakovë</title>
  <!-- ------------ META ------------------ -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/booststrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <!-- ------------  ------------------ -->
</head>

<body>
  <style type="text/css">
    .container {
      position: relative;
      width: 100%;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .container:after {
      content: '';
      position: absolute;
      width: 100%;
      height: 100%;
      left: 0;
      top: 0;
      z-index: -1;
    }
  </style>
  <?php include('assets/php/navbar.php'); ?>


  <!-- ------------ Forma Contact ------------------ -->
  <form method="POST" action="#">
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
    <br>
    <div class="container mt-5">

      <div class="contact_box_mesazhi">

        <div class="left_mesazhi">
          <div class="left_mesazhi_tekts">
            <p>Kontaktet me stafin e shkollës mund t’i realizoni përmes:</p> <br>
            <p><i class="fa fa-envelope"></i> Adresës elektronike (e-mail adresës) : shkollateknikegj@gmail.com</p> <br>
            <p><i class="fa fa-phone"></i> Numri i telefonit: 123-456-789</p>
            <p><i class="fa fa-map-marker"></i>Apo ne shkoll&euml; n&euml; rrugen Rr.Marin Barleti, Gjakovë </p>
          </div>
        </div>
        <div class="right_mesazhi">
          <h2>Na Kontaktoni</h2>
          <p style="color: red;">Shkruani mesazhin tuaj, akesat, sugjerime... </p>
          <div class="row">
            <div class="col">
              <input type="text" class="inputat_mesazhi" placeholder="Emri" required="" name="emri" oninvalid="this.setCustomValidity('Ju lutem shkruani emrin');" oninput="this.setCustomValidity('');">
            </div>
            <div class=" col">
              <input type="text" class="inputat_mesazhi" placeholder="Mbiemri" required="" name="mbiemri" oninvalid="this.setCustomValidity('Ju lutem shkruani mbiemrin');" oninput="this.setCustomValidity('');">
            </div>
          </div>

          <input type="email" class="inputat_mesazhi" placeholder="Emaili (nuk &euml;sht&euml; i obliguer vetem n&euml; rant kontakti )" name="email">
          <input type="text" class="inputat_mesazhi" placeholder="Numri i telefonit( nuk &euml;sht&euml; i obliguer vetem n&euml; rant kontakti)" name="telefoni">
          <textarea placeholder="Mesazhi..." class="inputat_mesazhi" id="mesazhi" required="" name="mesazhi" rows="10" cols="60" oninvalid="this.setCustomValidity('Ju lutem shkruani mesazhi');" oninput="this.setCustomValidity('');"></textarea>
          <input id="btn_mesazhi" class="btn_mesazhi" type="submit" name="contact_submit" value="D&euml;rgoni">
        </div>
      </div>
    </div>
  </form>

  <div class="loader loader-default" data-text="Mesazhi duke u derguar"></div>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="assets/js/function.js"> </script>
  <br> <br> <br>
  <?php include('assets/php/footer.php'); ?>
</body>


</html>