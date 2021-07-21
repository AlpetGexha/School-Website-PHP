<?php
$msg = "";
$msgs  = "";
include "config.php";
session_start();
ob_start();
setlocale(LC_TIME, array('da_DA.UTF-8', 'da_DA@euro', 'da_DA', 'Albanian'));

//****************Regjistrimi ****************//
if (isset($_POST['register_submit'])) {
  $emri = mysqli_real_escape_string($db, $_POST['emri']);
  $mbiemri = mysqli_real_escape_string($db, $_POST['mbiemri']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);


  // Marrja e usernamit dhe emailit qe ekzitonjn ne Data Basë 
  $s_username = "SELECT * FROM users WHERE username='$username'";
  $s_email = "SELECT * FROM users WHERE email='$email'";
  $result_username = mysqli_query($db, $s_username);
  $result_email = mysqli_query($db, $s_email);
  $usernamelength = strlen($username);
  $passwordlength = strlen($password);
  if ($usernamelength < 3) {
    $msg = "Username-i duhet t&euml; jet&euml; s&euml; paku 3 karaktere";
  }
  if ($usernamelength > 50) {
    $msg = " Username-i nuk mund t&euml; jet&euml; m&euml; i madh se 50 karaktere";
  }

  if ($passwordlength < 6) {
    $msg = " Fjal&euml;kalimi duhet t&euml; jet&euml; s&euml; paku 6 karaktere";
  }
  if ($passwordlength > 255) {
    $msg = "Fjal&euml;kalimi nuk mund t&euml; jet&euml; më i madh se 255 karaktere";
  }
  if (mysqli_num_rows($result_username) > 0) { //Errori për emailin qe ekziton 
    $msg = "P&euml;doruesi ekziton tashm&euml;";
  } else { //Nese jane ne rregull te thenat atëherë insertoj te thenat në Data Basë, encypto passwordin dhe shko ne llogin 
    $password1 = password_hash($password, PASSWORD_DEFAULT);
    $insert = "INSERT into users(emri,mbiemri,username,password,email)VALUES('$emri','$mbiemri','$username','$password1','$email')";
    mysqli_query($db, $insert);
    if ($insert) {
      $msgs = "Ju shtuat me sukses z/znj. $emri $mbiemri si Administrator n&euml; faqe, n&euml;se ka ndodhur ndonj&euml; gabim kontaktoni menj&euml;here me mir&euml;mbajt&euml;sit e faq&euml;s!";
    }
  }
}

//****************Login****************//
if (isset($_POST['login_submit'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  $sql = "SELECT * from users where username = '$username'";
  $results = mysqli_query($db, $sql);
  $row = $results->fetch_assoc();

  if (mysqli_num_rows($results) != 1) { //Nese perdoruesi nuk ekziton
    $msg = "Ky p&euml;rdorues nuk ekziston ";  //errori per username
  } else if (password_verify($password, $row['password'])) { //Nese passwordi edhe gabim  dhe passwordi per encyptim
    $_SESSION['username'] = $username; //Username
    $_SESSION['loggedIn'] = true; //Nese passwordi edhe ne rregull
    header('Location:admin/index.php'); //Shko në faqe kryesore
  } else {
    $msg = "Fjalekalimi &euml;sht&euml; gabim"; //errori per Password

  }
}

//****************Aplikimi Online****************//
if (isset($_POST['apliko_submit'])) {
  $emri = mysqli_real_escape_string($db, $_POST['emri']);
  $mbiemri = mysqli_real_escape_string($db, $_POST['mbiemri']);
  $emri_p = mysqli_real_escape_string($db, $_POST['emri_p']);
  $ditelindja = mysqli_real_escape_string($db, $_POST['ditelindja']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $telefoni = mysqli_real_escape_string($db, $_POST['telefoni']);
  $drejtimet = mysqli_real_escape_string($db, $_POST['drejtimet']);

  //insertimi i të thënave per Aplikimin
  $insert = "INSERT into aplikimet (emri,mbiemri,emriprindi,ditelindja,email,telefoni,drejtimet) VALUES('$emri','$mbiemri','$emri_p','$ditelindja','$email','$telefoni','$drejtimet')";
  mysqli_query($db, $insert);

  if ($insert) {
    //$msg = "U kry bac nes hajde en shkoll";
    $msg = " <br> <b> $emri  $mbiemri</b> p&euml;r drejtimin e <b>$drejtimet-s</b> <br> Do ju kontaktojm s&euml; shpejti n&euml;: <br> Telefon: <b>$telefoni</b> apo n&euml; <br>  Email: <b>$email</b> <br><br> Sh&euml;ndet! ";
  }
  //hape nje file me emrin aplikimet.txt , "a+" Read/Write
  $file = fopen("aplikimet.txt", "a+");
  $teksti =  $emri . "\n" . $mbiemri . "\n" . $emri_p . "\n" . $ditelindja . "\n" . $email . "\n" . $telefoni . "\n" . $drejtimet .  "\n*********************************************************************\n";
  fwrite($file, $teksti);
}


//****************Kontakit ****************//
if (isset($_POST['contact_submit'])) {
  $emri = mysqli_real_escape_string($db, $_POST['emri']);
  $mbiemri = mysqli_real_escape_string($db, $_POST['mbiemri']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $telefoni = mysqli_real_escape_string($db, $_POST['telefoni']);
  $mesazhi = mysqli_real_escape_string($db, $_POST['mesazhi']);


  //insertimi i të thënave per contact
  $insert = "INSERT into mesazhi(emri,mbiemri,email,telefoni,mesazhi)VALUES('$emri','$mbiemri','$email','$telefoni','$mesazhi')";

  if ($insert) {
    $msg = "Mesazhi u dergua me sukses";
  }
  //hape nje file me emrin contact.txt , "a+" Read/Write
  $file = fopen("contact.txt", "a+");

  $teksti = $emri . "\n " . $mbiemri . "\n" . $email . "\n " . $telefoni . "\n" . $mesazhi . "\n*********************************************************************\n";
  mysqli_query($db, $insert);

  fwrite($file, $teksti);
}


//**************** Stafi Drejtori ****************//
if (isset($_POST['stafi_drejtori'])) {
  $emri = mysqli_real_escape_string($db, $_POST['emri']);
  $pershrimi = mysqli_real_escape_string($db, $_POST['pershrimi']);

  $fileSize = $_FILES['image']['size'];
  $targetDir = "../assets/img/stafi/";
  $fileName = basename($_FILES["image"]["name"]);
  $fileTEMP = $_FILES["image"]["tmp_name"];
  $targetFile = $targetDir . $fileName;
  $fileType = pathinfo($targetFile, PATHINFO_EXTENSION);
  $imageQuality = 60;


  // Allow certain file formats
  $allowTypes = array('jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG', 'gif');
  if (in_array($fileType, $allowTypes)) {

    // Upload file to server
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {

      if ($fileSize < 10485760) {

        // Insert image file name into database
        $insert = "INSERT INTO drejtori (emri,pershrimi,image)VALUES('$emri','$pershrimi','$fileName')";

        mysqli_query($db, $insert);
        if ($insert) {
          $msg = "Postime me Emrin: $emri " . "\n" . " dhe pershrimin: $pershrimi " . "\n" . "foto :$fileName ";
          //header('Location:../stafi.php');
        } else {
          $msg = "Ngarkimi i fotografis&euml; d&euml;shtoi, ju lutemi provoni p&euml;rs&euml;ri";
        }
      } else {
        $msg = "Foto &euml;sht&euml; shum&euml; e madhe. MAXIMUMI 10mb";
      }
    }
  } else {
    $msg = 'Vet&euml;m FOTO( JPG, JPEG, PNG, & GIF) lejohen t&euml; ngarkohen.';
  }
  // compressImage($_FILES["image"]["tmp_name"],$targetFile,60);

}

//**************** Stafi - Sekretarja ****************//
if (isset($_POST['stafi_sekretarja'])) {
  $emri = mysqli_real_escape_string($db, $_POST['emri']);
  $pershrimi = mysqli_real_escape_string($db, $_POST['pershrimi']);

  $fileSize = $_FILES['image']['size'];
  $targetDir = "../assets/img/stafi/";
  $fileName = basename($_FILES["image"]["name"]);
  $fileTEMP = $_FILES["image"]["tmp_name"];
  $targetFile = $targetDir . $fileName;
  $fileType = pathinfo($targetFile, PATHINFO_EXTENSION);
  $imageQuality = 60;


  // Allow certain file formats
  $allowTypes = array('jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG', 'gif');
  if (in_array($fileType, $allowTypes)) {

    // Upload file to server
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {

      if ($fileSize < 10485760) {

        // Insert image file name into database
        $insert = "INSERT INTO sekretaira (emri,pershkrimi,image)VALUES('$emri','$pershrimi','$fileName')";

        mysqli_query($db, $insert);
        if ($insert) {
          $msg = "Postime me Emrin: $emri " . "\n" . " dhe pershrimin: $pershrimi " . "\n" . "foto :$fileName ";
          //header('Location:../stafi.php');
        } else {
          $msg = "Ngarkimi i fotografis&euml; d&euml;shtoi, ju lutemi provoni p&euml;rs&euml;ri";
        }
      } else {
        $msg = "Foto &euml;sht&euml; shum&euml; e madhe. MAXIMUMI 10mb";
      }
    }
  } else {
    $msg = 'Vet&euml;m FOTO( JPG, JPEG, PNG, & GIF) lejohen t&euml; ngarkohen.';
  }
  // compressImage($_FILES["image"]["tmp_name"],$targetFile,60);

}



//**************** Stafi Kordinatori ****************//
if (isset($_POST['stafi_kordinatori'])) {
  $emri = mysqli_real_escape_string($db, $_POST['emri']);
  $pershrimi = mysqli_real_escape_string($db, $_POST['pershrimi']);

  $fileSize = $_FILES['image']['size'];
  $targetDir = "../assets/img/stafi/";
  $fileName = basename($_FILES["image"]["name"]);
  $fileTEMP = $_FILES["image"]["tmp_name"];
  $targetFile = $targetDir . $fileName;
  $fileType = pathinfo($targetFile, PATHINFO_EXTENSION);
  $imageQuality = 60;


  // Allow certain file formats
  $allowTypes = array('jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG', 'gif');
  if (in_array($fileType, $allowTypes)) {

    // Upload file to server
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {

      if ($fileSize < 10485760) {

        // Insert image file name into database
        $insert = "INSERT INTO kordinatori (emri,pershkrimi,image)VALUES('$emri','$pershrimi','$fileName')";

        mysqli_query($db, $insert);
        if ($insert) {
          $msg = " Postime me Emrin: $emri " . "\n" . " dhe pershrimin: $pershrimi" . "\n" . "foto :$fileName ";
          //header('Location:../stafi.php');
        } else {
          $msg = "Ngarkimi i fotografis&euml; d&euml;shtoi, ju lutemi provoni p&euml;rs&euml;ri";
        }
      } else {
        $msg = "Foto &euml;sht&euml; shum&euml; e madhe. MAXIMUMI 10mb";
      }
    }
  } else {
    $msg = 'Vet&euml;m FOTO( JPG, JPEG, PNG, & GIF) lejohen t&euml; ngarkohen.';
  }
  // compressImage($_FILES["image"]["tmp_name"],$targetFile,60);

}


//**************** Stafi Mesimdhenesit ****************//
if (isset($_POST['stafi_mesimdhenesit'])) {
  $emri = mysqli_real_escape_string($db, $_POST['emri']);
  $pershrimi = mysqli_real_escape_string($db, $_POST['pershrimi']);
  $lenda = mysqli_real_escape_string($db, $_POST['lenda']);

  $fileSize = $_FILES['image']['size'];
  $targetDir = "../assets/img/stafi/";
  $fileName = basename($_FILES["image"]["name"]);
  $fileTEMP = $_FILES["image"]["tmp_name"];
  $targetFile = $targetDir . $fileName;
  $fileType = pathinfo($targetFile, PATHINFO_EXTENSION);
  $imageQuality = 60;


  // Allow certain file formats
  $allowTypes = array('jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG', 'gif');
  if (in_array($fileType, $allowTypes)) {

    // Upload file to server
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {

      if ($fileSize < 10485760) {

        // Insert image file name into database
        $insert = "INSERT INTO mesimdhenesit (emri,pershkrimi,lenda,image)VALUES('$emri','$pershrimi','$lenda','$fileName')";

        mysqli_query($db, $insert);
        if ($insert) {
          $msg = " Postime me Emrin: $emri " . "\n" . " dhe pershrimin: $pershrimi" . "\n" . "Lenda: $lenda'" . "\n" . "foto :$fileName ";
          //header('Location:../stafi.php');
        } else {
          $msg = "Ngarkimi i fotografis&euml; d&euml;shtoi, ju lutemi provoni p&euml;rs&euml;ri";
        }
      } else {
        $msg = "Foto &euml;sht&euml; shum&euml; e madhe. MAXIMUMI 10mb";
      }
    }
  } else {
    $msg = 'Vet&euml;m FOT  O( JPG, JPEG, PNG, & GIF) lejohen t&euml; ngarkohen.';
  }
  // compressImage($_FILES["image"]["tmp_name"],$targetFile,60);
}


//**************** Stafi Shërbimi teknik ****************//
if (isset($_POST['stafi_sherbimiteknik'])) {
  $emri = mysqli_real_escape_string($db, $_POST['emri']);
  $pershrimi = mysqli_real_escape_string($db, $_POST['pershrimi']);

  $fileSize = $_FILES['image']['size'];
  $targetDir = "../assets/img/stafi/";
  $fileName = basename($_FILES["image"]["name"]);
  $fileTEMP = $_FILES["image"]["tmp_name"];
  $targetFile = $targetDir . $fileName;
  $fileType = pathinfo($targetFile, PATHINFO_EXTENSION);
  $imageQuality = 60;


  // Allow certain file formats
  $allowTypes = array('jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG', 'gif');
  if (in_array($fileType, $allowTypes)) {

    // Upload file to server
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {

      if ($fileSize < 10485760) {

        // Insert image file name into database
        $insert = "INSERT INTO sherbimiteknik (emri,pershkrimi,image)VALUES('$emri','$pershrimi','$fileName')";

        mysqli_query($db, $insert);
        if ($insert) {
          $msg = " Postime me Emrin: $emri " . "\n" . " dhe pershrimin: $pershrimi" . "\n" . "foto :$fileName ";
          //header('Location:../stafi.php');
        } else {
          $msg = "Ngarkimi i fotografis&euml; d&euml;shtoi, ju lutemi provoni p&euml;rs&euml;ri";
        }
      } else {
        $msg = "Foto &euml;sht&euml; shum&euml; e madhe. MAXIMUMI 10mb";
      }
    }
  } else {
    $msg = 'Vet&euml;m FOTO( JPG, JPEG, PNG, & GIF) lejohen t&euml; ngarkohen.';
  }
  // compressImage($_FILES["image"]["tmp_name"],$targetFile,60);

}


/**************** drejtimet inforamtika ****************/
if (isset($_POST['drejtimet_inforamtika'])) {
  $emri = mysqli_real_escape_string($db, $_POST['title']);
  $pershkrimi = mysqli_real_escape_string($db, $_POST['pershkrimi']);

  $fileSize = $_FILES['image']['size'];
  $targetDir = "../assets/img/stafi/";
  $fileName = basename($_FILES["image"]["name"]);
  $fileTEMP = $_FILES["image"]["tmp_name"];
  $targetFile_drejtori = $targetDir . $fileName;
  $fileType = pathinfo($targetFile_drejtori, PATHINFO_EXTENSION);
  $imageQuality = 60;


  $allowTypes = array('jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG', 'gif');
  if (in_array($fileType, $allowTypes)) {


    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile_drejtori)) {

      if ($fileSize < 10485760) {


        $insert = "INSERT INTO informatika (title,pershkrimi,image)VALUES('$emri','$pershkrimi','$fileName')";
        mysqli_query($db, $insert);
        if ($insert) {
          $msg = " Postime me Emrin: $emri " . "\n" . " dhe pershkrimin: $pershkrimi" . "\n" . "foto :$fileName <a href='../informatika.php'>Kliko per te shikuar postimin</a>  ";
        } else {
          $msg = "Ngarkimi i fotografis&euml; d&euml;shtoi, ju lutemi provoni p&euml;rs&euml;ri";
        }
      } else {
        $msg = "Foto &euml;sht&euml; shum&euml; e madhe. MAXIMUMI 10mb";
      }
    }
  } else {
    $msg = 'Vet&euml;m FOTO( JPG, JPEG, PNG, & GIF) lejohen t&euml; ngarkohen.';
  }
}


/**************** drejtimet Automekaniki ****************/
if (isset($_POST['drejtimet_automekaniki'])) {
  $emri = mysqli_real_escape_string($db, $_POST['title']);
  $pershkrimi = mysqli_real_escape_string($db, $_POST['pershkrimi']);

  $fileSize = $_FILES['image']['size'];
  $targetDir = "../assets/img/stafi/";
  $fileName = basename($_FILES["image"]["name"]);
  $fileTEMP = $_FILES["image"]["tmp_name"];
  $targetFile_drejtori = $targetDir . $fileName;
  $fileType = pathinfo($targetFile_drejtori, PATHINFO_EXTENSION);
  $imageQuality = 60;


  $allowTypes = array('jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG', 'gif');
  if (in_array($fileType, $allowTypes)) {


    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile_drejtori)) {

      if ($fileSize < 10485760) {


        $insert = "INSERT INTO automekanik (title,pershkrimi,image)VALUES('$emri','$pershkrimi','$fileName')";
        mysqli_query($db, $insert);
        if ($insert) {
          $msg = " Postime me Emrin: $emri " . "\n" . " dhe pershkrimin: $pershkrimi" . "\n" . "foto :$fileName <a href='../automekaniki.php'>Kliko per te shikuar postimin</a> ";
        } else {
          $msg = "Ngarkimi i fotografis&euml; d&euml;shtoi, ju lutemi provoni p&euml;rs&euml;ri";
        }
      } else {
        $msg = "Foto &euml;sht&euml; shum&euml; e madhe. MAXIMUMI 10mb";
      }
    }
  } else {
    $msg = 'Vet&euml;m FOTO( JPG, JPEG, PNG, & GIF) lejohen t&euml; ngarkohen.';
  }
}


/**************** drejtimet Ndertimtari ****************/
if (isset($_POST['drejtimet_ndertimtari'])) {
  $emri = mysqli_real_escape_string($db, $_POST['title']);
  $pershkrimi = mysqli_real_escape_string($db, $_POST['pershkrimi']);

  $fileSize = $_FILES['image']['size'];
  $targetDir = "../assets/img/stafi/";
  $fileName = basename($_FILES["image"]["name"]);
  $fileTEMP = $_FILES["image"]["tmp_name"];
  $targetFile_drejtori = $targetDir . $fileName;
  $fileType = pathinfo($targetFile_drejtori, PATHINFO_EXTENSION);
  $imageQuality = 60;


  $allowTypes = array('jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG', 'gif');
  if (in_array($fileType, $allowTypes)) {


    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile_drejtori)) {

      if ($fileSize < 10485760) {


        $insert = "INSERT INTO ndertimtari (title,pershkrimi,image)VALUES('$emri','$pershkrimi','$fileName')";
        mysqli_query($db, $insert);
        if ($insert) {
          $msg = " Postime me Emrin: $emri " . "\n" . " dhe pershkrimin: $pershkrimi" . "\n" . "foto :$fileName <a href='../ndertimatari.php'>Kliko per te shikuar postimin</a> ";
        } else {
          $msg = "Ngarkimi i fotografis&euml; d&euml;shtoi, ju lutemi provoni p&euml;rs&euml;ri";
        }
      } else {
        $msg = "Foto &euml;sht&euml; shum&euml; e madhe. MAXIMUMI 10mb";
      }
    }
  } else {
    $msg = 'Vet&euml;m FOTO( JPG, JPEG, PNG, & GIF) lejohen t&euml; ngarkohen.';
  }
}




//kategorit per navbar
function get_kadegoirt_menu($table)
{
  require("config.php");
  $sql = "SELECT * FROM $table ";
  if ($result = mysqli_query($db, $sql)) {

    foreach ($result as $get_kadegoirt_menu1 => $kategori_memu) {
      echo '<a class="dropdown-item" href="kategoria.php?id=' . $kategori_memu['id'] . '">' . $kategori_memu['emri'] . '</a>
		';
    }
  }

  mysqli_close($db);
}

//kategorit per navbar
function get_kat_link($table)
{
  require("config.php");
  $sql = "SELECT * from post_categories where lamia='$table'";
  if ($result = mysqli_query($db, $sql)) {

    foreach ($result  as $row) {
      echo  ' <a href="kategoria.php?id=' . $row['id'] . '">  <li> ' . $row['emri'] . ' </li>  </a>';
    }
  }

  mysqli_close($db);
}



//****************Krijimi i postimeve****************//

if (isset($_POST['create_post_submit'])) {
  $p_titulli = mysqli_real_escape_string($db, $_POST['p_titulli']);
  $p_pershkrimi = mysqli_real_escape_string($db, $_POST['p_pershkrimi']);
  $p_kategorit = mysqli_real_escape_string($db, $_POST['p_kategorit']);
  $p_tags = mysqli_real_escape_string($db, $_POST['p_tags']);
  $u_id = mysqli_real_escape_string($db, $_SESSION['username']);


  //Marrja e id nga useri 
  $sql = "SELECT id from users where username='$u_id'";
  $results = mysqli_query($db, $sql);
  $row = $results->fetch_assoc();
  $user_id = $row['id'];
  //Image name
  $fileName = mysqli_real_escape_string($db, basename($_FILES["image"]["name"]));
  //shto extension
  $fileAcualeExt = strtolower(end(explode('.', $fileName)));
  $fileNameNew =  "NexhmedinNixha" . uniqid('.', true) . "." . $fileAcualeExt;

  //direktori i fotos
  $fileDestination = "../assets/img/drejtimet_post/" . $fileNameNew;


  $allowTypes = array('jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG', 'gif');

  if (in_array($fileAcualeExt, $allowTypes)) {

    // Upload image s
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $fileDestination)) {

      if ($_FILES['image']['size'] < 10485760) {
        //compressImage($_FILES["image"]["tmp_name"], $fileDestination, 60);
        // Insert ne databases
        $insert = "INSERT INTO post (userid,titulli,body,tags,category,photo)VALUES('$user_id','$p_titulli','$p_pershkrimi','$p_tags','$p_kategorit','$fileNameNew')";
        mysqli_query($db, $insert);
        if ($insert) {
          $msg = "Postimi  u postua";
          header("Location:create_post.php");
        } else {
          $msg = "Ngarkimi i fotografis&euml; d&euml;shtoi, ju lutemi provoni p&euml;rs&euml;ri";
        }
      } else {
        $msg = "Foto &euml;sht&euml; shum&euml; e madhe. MAXIMUMI 10mb";
      }
    }
  } else {
    $msg = 'Vet&euml;m FOTO( JPG, JPEG, PNG, & GIF) lejohen t&euml; ngarkohen.';
  }
}


//****************Krijimi i kategorive****************//

if (isset($_POST['add_lamia'])) {
  $c_kategory = ucfirst(mysqli_real_escape_string($db, $_POST['lamia_add']));
  $sql = "SELECT * from lamia WHERE lamiaid= '$c_kategory' ";
  $result = mysqli_query($db, $sql);


  if (mysqli_num_rows($result) > 0) {
    $msg = "Kjo Lami ekzioston";
  } else {

    $insert = "INSERT into lamia(lamiaid) VALUE('$c_kategory')";
    mysqli_query($db, $insert);

    header("Location:create-lami.php");
  }
}

if (isset($_POST['add_drejtime'])) {
  $drejtimi = ucfirst(mysqli_real_escape_string($db, $_POST['emri_drejtimi_add']));
  $lamia = mysqli_real_escape_string($db, $_POST['drejtimi_kategoria']);
  $fileName = mysqli_real_escape_string($db, basename($_FILES["image"]["name"]));
  $sql = "SELECT * from post_categories WHERE emri= '$drejtimi' ";
  $result = mysqli_query($db, $sql);


  if (mysqli_num_rows($result) > 0) {
    $msg = "Ky Drejtim ekzioston";
  }

  //shto extension
  $fileAcualeExt = strtolower(end(explode('.', $fileName)));
  $fileNameNew =  "NexhmedinNixha" . uniqid('.', true) . "." . $fileAcualeExt;

  //direktori i fotos
  $fileDestination = "../assets/img/drejtimet/" . $fileNameNew;


  $allowTypes = array('jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG', 'gif');

  if (in_array($fileAcualeExt, $allowTypes)) {

    // Upload image s
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $fileDestination)) {

      if ($_FILES['image']['size'] < 10485760) {
        //compressImage($_FILES["image"]["tmp_name"], $fileDestination, 60);
        // Insert ne databases
        $insert = "INSERT into post_categories(lamia,emri,emriPhoto) VALUE('$lamia','$drejtimi','$fileNameNew')";
        mysqli_query($db, $insert);
        header("Location:create-lami.php");
        if ($insert) {
          $msg = "Postimi  u postua";
        } else {
          $msg = "Ngarkimi i fotografis&euml; d&euml;shtoi, ju lutemi provoni p&euml;rs&euml;ri";
        }
      } else {
        $msg = "Foto &euml;sht&euml; shum&euml; e madhe. MAXIMUMI 10mb";
      }
    }
  } else {
    $msg = 'Vet&euml;m FOTO( JPG, JPEG, PNG, & GIF) lejohen t&euml; ngarkohen.';
  }
}

if (isset($_POST['add_lenda'])) {

  $lenda = ucfirst(mysqli_real_escape_string($db, $_POST['lenda_add']));

  $insert = "INSERT into lendet(lendetEmri) VALUE('$lenda')";
  mysqli_query($db, $insert);

  header("Location:stafi-admin.php");
}



if (isset($_POST['create_staf'])) {
  $s_emri = ucfirst(mysqli_real_escape_string($db, $_POST['s_emri']));
  $s_mbiemri = ucfirst(mysqli_real_escape_string($db, $_POST['s_mbiemri']));
  $s_lenda = mysqli_real_escape_string($db, $_POST['s_lenda']);



  //Image name
  $fileName = mysqli_real_escape_string($db, basename($_FILES["image"]["name"]));
  //shto extension
  $fileAcualeExt = strtolower(end(explode('.', $fileName)));
  $fileNameNew =  "NNStaf" . uniqid('.', true) . "." . $fileAcualeExt;

  //direktori i fotos
  $fileDestination = "../assets/img/stafi/" . $fileNameNew;


  $allowTypes = array('jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG', 'gif');

  if (in_array($fileAcualeExt, $allowTypes)) {

    // Upload image s
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $fileDestination)) {

      if ($_FILES['image']['size'] < 10485760) {
        //compressImage($_FILES["image"]["tmp_name"], $fileDestination, 60);
        // Insert ne databases
        $insert = "INSERT INTO stafi(stafiPhoto, stafiEmri, stafiMbiemri, stafiLenda )VALUES('$fileNameNew','$s_emri','$s_mbiemri','$s_lenda')";
        mysqli_query($db, $insert);
        if ($insert) {
          $msg = "Postimi  u postua";
          header("Location:stafi-admin.php?ez");
        } else {
          $msg = "Ngarkimi i fotografis&euml; d&euml;shtoi, ju lutemi provoni p&euml;rs&euml;ri";
        }
      } else {
        $msg = "Foto &euml;sht&euml; shum&euml; e madhe. MAXIMUMI 10mb";
      }
    }
  } else {
    $msg = 'Vet&euml;m FOTO( JPG, JPEG, PNG, & GIF) lejohen t&euml; ngarkohen.';
  }
}


function get_op_modal($modal_name, $m_id, $title, $text, $btn_text, $color = "danger", $btn_cancel = "Anuloje", $path = "../server.php")
{
  echo '
        <div class="modal fade" id="modal_' . $modal_name . '' . $m_id . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">' . $title . '</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="' . $path . '" method="POST" enctype="multipart/form-data">
                ' . $text . '
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">' . $btn_cancel . '</button>
                <button type="submit" class="btn btn-' . $color . '" id="submit" value="' . $m_id . '" name="' . $modal_name . '">' . $btn_text . '</button> 
                
                </div>
            </div>
            </div>
            </form>
        </div>
        </div>
        ';
}


if (isset($_POST['stafi_delete_'])) {
  $id = $_POST['stafi_delete_'];

  $sql = "DELETE  FROM stafi WHERE  stafiId = '$id'";
  $result = mysqli_query($db, $sql);


  if (!$result == TRUE) {
    $msg = "False";
  } else {
    header('Location:admin/stafi-admin.php');
    $msg = "True";
  }
}

if (isset($_POST['stafi_edit_'])) {
  $id = $_POST['stafi_edit_'];
  $s_emri = ucfirst(mysqli_real_escape_string($db, $_POST['s_emri']));
  $s_mbiemri = ucfirst(mysqli_real_escape_string($db, $_POST['s_mbiemri']));
  $s_lenda = mysqli_real_escape_string($db, $_POST['s_lenda']);

  //updati nga edit.php 
  $update = "UPDATE stafi set stafiEmri = '$s_emri', stafiMbiemri = '$s_mbiemri', stafiLenda = '$s_lenda'  where stafiID=$id";
  $result = mysqli_query($db, $update);


  if (!$result == TRUE) {
    $msg = "False";
  } else {
    header('Location:admin/stafi-admin.php');
    $msg = "True";
  }

}


function get_header($tabName, $body = null)
{
?>
  <!DOCTYPE html>
  <html>

  <head>
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/logo.png'>
    <title>SHMLT "Nexhmedin Nixha" – Gjakovë <?= "- " . $tabName ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/dark-mode.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  </head>

  <body class="<?= $body ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <div class="header-section">
      <div class="container ">
        <!-- d-flex no-wrap justify-content-center -->
        <img style="width: 105px; height: 90px;" src="assets/img/logo.png" alt="Logo e shkolles ">
        <a href="index.php" class="site-logo">
          <h5 style="width:auto;"><b>Shkolla e Mesme e Lart&euml; Teknike<br> "Nexhmedin Nixha"</b></h5>
        </a>
      </div>
    </div>
    <nav class="navbar sticky-top navbar-expand-lg bg-light navbar-light ">
      <div class="container-xxl" aria-label="Main navigation">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse justify-content-md-center navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Faqja Kryesore</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#Stafi">
                Stafi
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Drejtimet
              </a>
              <div class="dropdown-menu">
                <?php get_kadegoirt_menu("post_categories") ?>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="qendra-per-karier.php">Qendra p&euml;r Karrier&euml;</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="apliko_online.php">Apliko Online</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="darkMode">
                <label class="form-check-label" for="darkMode">Dark Mode</label>
              </div>
            </li>
          </ul>

        </div>

      </div>
    </nav>
    <script src="assets/js/dark-mode.js"></script>
  <?php
}

function get_footer()
{
  ?>
    <footer class="footer-section">
      <div class="container footer-top">
        <div class="row">

          <div class="col-sm-6 col-lg-3 footer-widget">
            <div class="about-widget">
              <h6 class="fw-title">Na ndiqni</h6>
              <div class="social pt-1">
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="https://www.facebook.com/SHKOLLA-E-MESME-TEKNIKE-NEXHMEDIN-NIXHA-209838089061578/community/" target="_blank"><i class="fab fa-facebook"></i></a>
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-lg-3 footer-widget">
            <h6 class="fw-title">Linqe tjera</h6>
            <div class="dobule-link">
              <ul>
                <li><a href="https://masht.rks-gov.net/en" target="_blank">MASHT - Ministria Arsimit Shkencë dhe Teknologjisë</a></li>
                <li><a href="https://www.facebook.com/KomunaeGjakoves/" target="_blank">Kuvendi Komunal Gjakovë</a></li>
                <li><a href="apliko_online.php">Apliko Online</a></li>
              </ul>
            </div>
          </div>

          <div class="col-sm-6 col-lg-3 footer-widget">
            <h6 class="fw-title">Menagjmenti</h6>
            <ul class="recent-admin">
              <li>
                <a href="admin/index.php">Paneli Menagjues</a>
              </li>
            </ul>
          </div>

          <div class="col-sm-6 col-lg-3 footer-widget">
            <h6 class="fw-title">Kontakt</h6>
            <ul class="contact">
              <li>
                <p><i class="fa fa-map-marker"></i> Rr.Marin Barleti, Gjakovë,<br> Kosovë</p>
              </li>
              <li>
                <p><i class="fa fa-phone"></i> 044 123 456 </p>
              </li>
              <li>
                <p><i class="fa fa-envelope"></i>shkollateknikegj@gmail.com</p>
              </li>
              <li>
                <p><i class="fa fa-envelope"></i> <a href="contact.php">
                    Kontaktonani nëpermjet webit</a></p>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="copyright">
        <div class="container">
          <p>
            © 2021 Shkolla e Mesme e Lart&euml; Teknike "Nexhmedin Nixha" - Gjakovë
          </p>
        </div>
      </div>
    </footer>
  </body>

  </html>
<?php
}



function get_AdminHeader($tilte_name)
{
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>

    <head>
      <title>Admin <?= "- " . $tilte_name ?> - N.Nixha</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <meta charset="utf-8">
      <link rel="stylesheet" href="../assets/css/style.css">
      <link rel="stylesheet" href="../assets/css/test.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </head>
  </head>

  <body>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>

    <link rel='shortcut icon' type='image/x-icon' href='../assets/img/logo.jpg'>

    <nav class="sb-topnav sticky-top navbar navbar-expand navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Paneli i Adminit</a>
      <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
      <!-- Navbar-->
    </nav>

    <?php
    require "../config.php";
    $username = $_SESSION['username'];
    $sql_admin = "SELECT u.id, u.emri, u.mbiemri, u.username,u.email,u.j_data, r.role from users u,roles r where u.username = '$username' and u.role = r.id";

    $results_admin = mysqli_query($db, $sql_admin);
    $row_admin = $results_admin->fetch_assoc();
    ?>
    <div id="layoutSidenav">
      <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
          <div class="sb-sidenav-menu">
            <div class="nav sticky-top">
              <div class="sb-sidenav-menu-heading">Main</div>


              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="false" aria-controls="collapsePages1">
                <div class="sb-nav-link-icon"><i class="fas fa-tools"></i></div>
                Profiles
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse" id="collapsePages1" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                  <a class="nav-link" href="../admin/profile.php">
                    Profile
                  </a>
                  <a class="nav-link" href="">

                  </a>
                </nav>
              </div>

              <a class="nav-link" href="../admin/admin_user.php">
                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                P&euml;doruesits
              </a>

              <a class="nav-link" href="../admin/admin_post.php">
                <div class="sb-nav-link-icon"><i class="fas fa-blog"></i></div>
                Postimet
              </a>

              <a class="nav-link" href="../admin/admin_sms.php">
                <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                Mesazhet
              </a>
              <!-- <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                            </a>  -->
              <div class="sb-sidenav-menu-heading">Shto</div>

              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="false" aria-controls="collapsePages2">
                <div class="sb-nav-link-icon"><i class="fas fa-tools"></i></div>
                Krijoni
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse" id="collapsePages2" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                  <a class="nav-link" href="../admin/post-admin.php">
                    Postime
                  </a>
                  <a class="nav-link" href="../admin/create-lami.php">
                    Kategori
                  </a>
                  <a class="nav-link" href="../admin/register.php">
                    P&euml;rdorues
                  </a>
                  <a class="nav-link" href="../admin/stafi-admin.php">
                    Stafi & L&euml;nd&euml;t
                  </a>
                </nav>
              </div>
              <div class="sb-sidenav-menu-heading">Index</div>
              <a class="nav-link" href="../index.php">
                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                Faqja kryesore
              </a>
            </div>
          </div>

          <div class="sb-sidenav-footer">
            <div class="small">Admini: <?php echo $row_admin['username']; ?> <a href="../assets/php/logout.php"> Shkyqu </a> </div>
            <div class="small">Roli: <?php echo $row_admin['role']; ?> </div>
          </div>

        </nav>
      </div>


      <script>
        (function($) {
          "use strict";

          // Shtoni gjendje aktive në sidebar nav links
          var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
          $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
            if (this.href === path) {
              $(this).addClass("active");
            }
          });

          // NNdërroni anën e navigation
          $("#sidebarToggle").on("click", function(e) {
            e.preventDefault();
            $("body").toggleClass("sb-sidenav-toggled");
          });
        })(jQuery);
      </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <?php
  }
