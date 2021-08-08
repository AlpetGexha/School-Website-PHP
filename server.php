<?php
$msg = "";
$msgs  = "";
include "config.php";
session_start();
ob_start();
setlocale(LC_TIME, array('da_DA.UTF-8', 'da_DA@euro', 'da_DA', 'Albanian'));
include "server-style.php";

function IamAdmin()
{
  if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
    header("Location:../login.php");
    die();
  }
}

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
  $login_username = mysqli_real_escape_string($db, $_POST['username']);
  $password_username = mysqli_real_escape_string($db, $_POST['password']);

  $sql = "SELECT * from users where username = '$login_username'";
  $results = mysqli_query($db, $sql);
  $row = $results->fetch_assoc();

  if (mysqli_num_rows($results) != 1) { //Nese perdoruesi nuk ekziton
    $msg = "Ky p&euml;rdorues nuk ekziston ";  //errori per username
  } else if (password_verify($password_username, $row['password'])) { //Nese passwordi edhe gabim  dhe passwordi per encyptim
    $_SESSION['username'] = $login_username; //Username
    $_SESSION['loggedIn'] = true; //Nese passwordi edhe ne rregull
    header('Location:admin/index.php'); //Shko në faqe kryesore
  } else {
    $msg = "Fjalekalimi &euml;sht&euml; gabim"; //errori per Password

  }
}

if (isset($_POST['login_logout'])) {
  session_destroy();
  header("Location:login.php");
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
    echo "<script>alert(' $emri  $mbiemri për drejtimin e $drejtimet-s Do ju kontaktojm së shpejti në: Telefon: $telefoni apo në;   Email: $email Shëndet!'); location.href='apliko_online.php';</script> ";
  }
  //hape nje file me emrin aplikimet.txt , "a+" Read/Write
  // $file = fopen("aplikimet.txt", "a+");
  // $teksti =  $emri . "\n" . $mbiemri . "\n" . $emri_p . "\n" . $ditelindja . "\n" . $email . "\n" . $telefoni . "\n" . $drejtimet .  "\n*********************************************************************\n";
  // fwrite($file, $teksti);
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

  mysqli_query($db, $insert);
}


//****************Krijimi i postimeve****************//

if (isset($_POST['create_post_submit'])) {
  $p_titulli = mysqli_real_escape_string($db, $_POST['p_titulli']);
  $p_pershkrimi = mysqli_real_escape_string($db, $_POST['p_pershkrimi']);
  $p_kategorit = mysqli_real_escape_string($db, $_POST['p_kategorit']);
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
        $insert = "INSERT INTO post (userid,titulli,body,category,photo)VALUES('$user_id','$p_titulli','$p_pershkrimi','$p_kategorit','$fileNameNew')";
        mysqli_query($db, $insert);
        if ($insert) {
          echo "<script>alert('Postimi u postua me sukses'); location.href='create-post.php';</script> ";
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

    echo "<script>alert('Lamia u shtua me sukses'); location.href='create-lami.php';</script> ";
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
          echo "<script>alert('Drejtimi u shtua me sukses'); location.href='crate-lami.php';</script> ";
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

//****************kategorit per navbar ****************//
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

function get_kadegoirt_menu($table)
{
  require("config.php");
  $sql = "SELECT * FROM $table ";
  if ($result = mysqli_query($db, $sql)) {
    foreach ($result as $kategori_memu) {
      echo '
      <a class="dropdown-item" href="kategoria.php?id=' . $kategori_memu['id'] . '">' . $kategori_memu['emri'] . '</a>
	      	';
    }
  }

  mysqli_close($db);
}


//****************Krijimi i lendeve****************//
if (isset($_POST['add_lenda'])) {

  $lenda = ucfirst(mysqli_real_escape_string($db, $_POST['lenda_add']));

  $insert = "INSERT into lendet(lendetEmri) VALUE('$lenda')";
  mysqli_query($db, $insert);

  echo "<script>alert('Stafi u ndryshua me sukses'); location.href='stafi-admin.php';</script> ";
}


//****************Krijimi i stafit****************//
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
          echo "<script>alert('Stafi u krijua me sukses'); location.href='stafi-admin.php';</script> ";
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


//**************** Modals ****************//
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



//****************Delete****************//
//stafi
if (isset($_POST['stafi_delete_'])) {
  $id = $_POST['stafi_delete_'];

  $sql = "DELETE  FROM stafi WHERE  stafiId = '$id'";
  $result = mysqli_query($db, $sql);


  if (!$result == TRUE) {
    echo "<script>alert('Provoni p&euml;rs&euml;ri'); location.href='admin/stafi-admin.php';</script> ";
  } else {
    echo "<script>alert('Stafi u fshi me sukses!'); location.href='admin/stafi-admin.php';</script> ";
  }
}

//postimet

if (isset($_POST['post_delete_'])) {
  $id = $_POST['post_delete_'];

  $sql1 = "SELECT photo from post where id = '$id'";
  $results1 = mysqli_query($db, $sql1);
  $row1 = $results1->fetch_assoc();
  $image = $row1['photo'];
  unlink('assets/img/drejtimet_post/' . $image);

  $sql = "DELETE  FROM post WHERE  id = '$id'";
  $result = mysqli_query($db, $sql);


  if (!$result == TRUE) {
    echo "<script>alert('Provoni p&euml;rs&euml;ri'); location.href='admin/post-admin.php';</script> ";
  } else {
    echo "<script>alert('Postimi u fshi me sukses!'); location.href='admin/post-admin.php';</script> ";
  }
}

//lamit 
if (isset($_POST['category_delete_'])) {
  $id = $_POST['category_delete_'];

  $sql = "DELETE  FROM lamia WHERE  idLamia = '$id'";
  $result = mysqli_query($db,   $sql);

  if (!$result == TRUE) {
    echo "<script>alert('Provoni p&euml;rs&euml;ri'); location.href='admin/create-lami.php';</script> ";
  } else {
    echo "<script>alert('Lamia u fshi me sukses!'); location.href='admin/create-lami.php';</script> ";
  }
}
//drejtimet 
if (isset($_POST['lendet_delete_'])) {
  $id = $_POST['lendet_delete_'];

  $sql = "DELETE FROM lendet WHERE lendetID = '$id'";
  $result = mysqli_query($db, $sql);

  if (!$result == TRUE) {
    echo "<script>alert('Provoni përsëri'); location.href='admin/stafi-admin.php';</script> ";
  } else {
    echo "<script>alert('Drejtimi u fshi me sukses!'); location.href='admin/stafi-admin';</script> ";
  }
}
//Aplikimet
if (isset($_POST['aplikimi_delete_'])) {
  $id = $_POST['aplikimi_delete_'];

  $sql = "DELETE FROM aplikimet WHERE id = '$id'";
  $result = mysqli_query($db, $sql);

  if (!$result == TRUE) {
    echo "<script>alert('Provoni përsëri'); location.href='admin/stafi-admin.php';</script> ";
  } else {
    echo "<script>alert('Aplikimi u fshi mse sukses!'); location.href='admin/aplikimet-admin.php';</script> ";
  }
}
//drejtimiet
if (isset($_POST['drejtimi_delete_'])) {
  $id = $_POST['drejtimi_delete_'];

  $sql1 = "SELECT emriPhoto from post_categories where id = '$id'";
  $results1 = mysqli_query($db, $sql1);
  $row1 = $results1->fetch_assoc();
  $image = $row1['emriPhoto'];
  unlink('assets/img/drejtimet/' . $image . '');

  $sql = "DELETE  FROM post_categories WHERE  id = '$id'";
  $result = mysqli_query($db, $sql);


  if (
    !$result == TRUE
  ) {
    echo "<script>alert('Provoni p&euml;rs&euml;ri'); location.href='admin/create-lami.php';</script> ";
  } else {
    echo "<script>alert('Drejtimi u fshi me sukses!'); location.href='admin/create-lami.php';</script> ";
  }
}
//****************Edit****************//
if (isset($_POST['stafi_edit_'])) {
  $id = $_POST['stafi_edit_'];
  $s_emri = ucfirst(mysqli_real_escape_string($db, $_POST['s_emri']));
  $s_mbiemri = ucfirst(mysqli_real_escape_string($db, $_POST['s_mbiemri']));
  // $s_lenda = mysqli_real_escape_string($db, $_POST['s_lenda']);

  //updati nga edit.php 
  $update = "UPDATE stafi set stafiEmri = '$s_emri', stafiMbiemri = '$s_mbiemri' /*, stafiLenda = '$s_lenda' */  where stafiID=$id";
  $result = mysqli_query($db, $update);


  if (!$result == TRUE) {
    echo "<script>alert('Provoni p&euml;rs&euml;ri'); location.href='admin/stafi-admin.php';</script> ";
  } else {
    echo "<script>alert('Stafi u ndryshua me sukses'); location.href='admin/stafi-admin.php';</script> ";

    //  header('Location:admin/stafi-admin.php');
  }
}
//postimet

if (isset($_POST['post_edit_'])) {

  $id = $_POST['post_edit_'];
  $titulli = mysqli_real_escape_string($db, $_POST['post_titulli']);
  $body = mysqli_real_escape_string($db, $_POST['post_body']);


  //updati nga edit.php 
  $post_update = "UPDATE post set titulli = '$titulli', body = '$body' where id=$id";
  mysqli_query($db, $post_update);

  if ($post_update) {
    echo "<script>alert('Postimi u ndryshua me sukses'); location.href='admin/post-admin.php';</script> ";
  } else {
    echo "<script>alert('Provoni p&euml;rs&euml;ri'); location.href='admin/post-admin.php';</script> ";
  }
}
//category
if (isset($_POST['category_edit_'])) {

  $id = $_POST['category_edit_'];
  $titulli = mysqli_real_escape_string($db, $_POST['edit_category_name']);
  $body = mysqli_real_escape_string($db, $_POST['edit_category_text']);


  //updati nga edit.php 
  $post_update = "UPDATE post_categories set emri = '$titulli', colum_table	 = '$body' where id=$id";
  mysqli_query($db, $post_update);

  if ($post_update) {
    echo "<script>alert('Drejtimi u ndryshua me sukses'); location.href='admin/create-lami.php';</script> ";
  } else {
    echo "<script>alert('Drejtimi p&euml;rs&euml;ri'); location.href='admin/create-lami.php';</script> ";
  }
}



//****************  Count ****************//
function get_count($tablename)
{
  require("config.php");

  $sql = "SELECT * FROM $tablename";
  if ($result = mysqli_query($db, $sql)) {

    $rowcount = mysqli_num_rows($result);
    printf("%d", $rowcount);

    mysqli_free_result($result);
  }

  mysqli_close($db);
}

//**************** Vizitor Info ****************//
function updateInfo()
{
  $sql = "INSERT INTO " . $GLOBALS['info_table_name'] . " (ip_address, user_agent) VALUES(:ip_address, :user_agent)";
  $query = $GLOBALS['db']->prepare($sql);
  $query->execute([':ip_address' => $_SERVER["REMOTE_ADDR"], ':user_agent' => $_SERVER["HTTP_USER_AGENT"]]);
}

//**************** Pagination ****************//
require_once "admin/pdo.php";
class Pagination extends DB
{

  public function InsertData($table_id, $SELECT, $pageNumber = 25)
  {
    $perPage = $pageNumber;


    // Calculate Total pages
    $stmt = $this->openDB()->query('SELECT count(*) FROM ' . $table_id . ' ');
    $total_results = $stmt->fetchColumn();
    $this->total_pages = ceil($total_results / $perPage);

    // Current pages
    $this->page = isset($_GET['faqja']) ? $_GET['faqja'] : 1;
    $starting_limit = ($this->page - 1) * $perPage;
    $this->previous_page = $this->page - 1;
    $this->next_page = $this->page + 1;

    // Query to fetch users
    $query = "" . $SELECT . " LIMIT $starting_limit,$perPage";

    // Fetch all users for current page
    $this->result = $this->openDB()->query($query)->fetchAll();
  }

  public function getNavPages()
  { ?>
    <hr>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-4">
          <li <p>Faqja <?= $this->page ?> nga <?= $this->total_pages ?></p>
        </div>
        <div class="col-xl-8 d-flex flex-row-reverse bd-highlight">
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item <?php if ($this->page <= 1) {
                                      echo 'disabled';
                                    } ?>">
                <a class="page-link" <?php if ($this->page > 1) {
                                        echo "class='page-link' href='?faqja=" . $this->previous_page . "'";
                                      } ?>>Prapa</a>
              </li>
              <?php for ($i = 1; $i <= $this->total_pages; $i++) :
                if ($i == $this->page) {
                  echo '                
               <li class="page-item active">
                  <a class="page-link " href="?faqja=' . $i . '"> ' . $i . '</a>
                </li>';
                } else {
                  echo '                
               <li class="page-item">
                  <a class="page-link " href="?faqja=' . $i . '"> ' . $i . '</a>
                </li>';
                }
              ?>
              <?php endfor; ?>
              <li class="page-item <?php if (($this->page + 1) >= $this->total_pages) {
                                      echo ' disabled';
                                    } ?>">
                <a class="page-link" <?php if (($this->page + 1) < $this->total_pages) {
                                        echo "href='?faqja=" . $this->next_page . "'";
                                      } ?>>Tjetra</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
<?php
  }
}
