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
        header("Location:../login");
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
        Session::flash('sukses', 'Përdoruesi u shtua me sukses');
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
        header('Location:admin/index'); //Shko në faqe kryesore
        Session::flash('sukses', 'Whazzzzap NIGA');
    } else {
        $msg = "Fjalekalimi &euml;sht&euml; gabim"; //errori per Password

    }
}

if (isset($_POST['login_logout'])) {
    session_destroy();
    header("Location:login");
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

    Session::flash('sukses', 'Aplikimi u dërgua me sukses');
    //    echo "<script>alert(' $emri  $mbiemri për drejtimin e $drejtimet-s Do ju kontaktojm së shpejti në: Telefon: $telefoni apo në;   Email: $email Shëndet!'); location.href='apliko_online';</script> ";
    // header("Location: apliko_online");

    //hape nje file me emrin aplikimet.txt , "a+" Read/Write
    // $file = fopen("aplikimet.txt", "a+");
    // $teksti =  $emri . "\n" . $mbiemri . "\n" . $emri_p . "\n" . $ditelindja . "\n" . $email . "\n" . $telefoni . "\n" . $drejtimet .  "\n*********************************************************************\n";
    // fwrite($file, $teksti);
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
                    Session::flash('sukses', 'Postimi u postua me sukses');
                } else {
                    Session::flash('error', 'Ngarkimi i fotografis&euml; d&euml;shtoi, ju lutemi provoni p&euml;rs&euml;ri');
                }
            } else {
                Session::flash('error', 'Foto &euml;sht&euml; shum&euml; e madhe. MAXIMUMI 10mb');
            }
        }
    } else {
        Session::flash('error', 'Vet&euml;m FOTO( JPG, JPEG, PNG, & GIF) lejohen t&euml; ngarkohen.');
    }
}

//**************** Kontakti ****************//
if (isset($_POST['kontakit_submit'])) {
    $email = mysqli_real_escape_string($db, $_POST['ko_mail']);
    $sms = mysqli_real_escape_string($db, $_POST['ko_mesazhi']);

    $sql = "INSERT INTO `kontakit`(`email`, `sms`)  VALUES ('$email','$sms')";
    mysqli_query($db, $sql);

    Session::flash('sukses', 'Mesazhi u dergua me sukses');

    header("Location: index");
}

//****************Krijimi i kategorive****************//

if (isset($_POST['add_lamia'])) {
    $c_kategory = ucfirst(mysqli_real_escape_string($db, $_POST['lamia_add']));
    $sql = "SELECT * from lamia WHERE lamiaid= '$c_kategory' ";
    $result = mysqli_query($db, $sql);


    if (mysqli_num_rows($result) > 0) {
        $_SESSION['errors'] = "Kjo Lami ekzioston";
        Session::flash('error', 'Kjo Lami ekzioston', 'danger');
    } else {
        $insert = "INSERT into lamia(lamiaid) VALUE('$c_kategory')";
        mysqli_query($db, $insert);

        Session::flash('sukses', 'Lamia u shtua me sukses');
        // header("Location: create-lami");
    }
}

if (isset($_POST['add_drejtime'])) {
    $drejtimi = ucfirst(mysqli_real_escape_string($db, $_POST['emri_drejtimi_add']));
    $lamia = mysqli_real_escape_string($db, $_POST['drejtimi_kategoria']);
    $table = mysqli_real_escape_string($db, $_POST['colum_table_add']);
    $fileName = mysqli_real_escape_string($db, basename($_FILES["image"]["name"]));
    $sql = "SELECT * from post_categories WHERE emri= '$drejtimi' ";
    $result = mysqli_query($db, $sql);


    if (mysqli_num_rows($result) > 0) {
        Session::flash('error', 'Ky Drejtim ekzioston');
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
                $insert = "INSERT into post_categories(lamia,emri,emriPhoto,colum_table) VALUE('$lamia','$drejtimi','$fileNameNew','$table')";
                mysqli_query($db, $insert);
                // header("Location:create-lami");
                if ($insert) {
                    Session::flash('sukses', 'Drejtimi u postua me sukses');
                } else {
                    Session::flash('error', 'Ngarkimi i fotografis&euml; d&euml;shtoi, ju lutemi provoni p&euml;rs&euml;ri');
                }
            } else {
                Session::flash('error', 'Foto &euml;sht&euml; shum&euml; e madhe. MAXIMUMI 10mb');
            }
        }
    } else {
        Session::flash('error', 'Vet&euml;m FOTO( JPG, JPEG, PNG, & GIF) lejohen t&euml; ngarkohen.');
    }
}

//****************kategorit per navbar ****************//
function get_kat_link($table)
{
    require("config.php");
    $sql = "SELECT * from post_categories where lamia='$table'";
    if ($result = mysqli_query($db, $sql)) {

        foreach ($result  as $row) {
            echo  ' <a href="kategoria?id=' . $row['id'] . '">  <li> ' . $row['emri'] . ' </li>  </a>';
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
      <a class="dropdown-item" href="kategoria?id=' . $kategori_memu['id'] . '">' . $kategori_memu['emri'] . '</a>
	      	';
        }
    }

    mysqli_close($db);
}


//****************Krijimi i lendeve****************//

if (isset($_POST['add_lenda'])) {
    $lenda = ucfirst(mysqli_real_escape_string($db, $_POST['lenda_add']));
    $sql = "SELECT * from lendet WHERE lendetEmri= '$lenda' ";
    $result = mysqli_query($db, $sql);


    if (mysqli_num_rows($result) != 0) {
        Session::flash('error', 'Kjo Lami ekziston');
    } else {

        $insert = "INSERT into lendet(lendetEmri) VALUE('$lenda')";
        mysqli_query($db, $insert);
        Session::flash('suksess', 'Lamia u shtua me sukses');
    }
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
                    echo "<script>alert('Stafi u krijua me sukses'); location.href='stafi-admin';</script> ";
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
                <button  type="submit" class="btn btn-' . $color . '" id="submit" value="' . $m_id . '" name="' . $modal_name . '" autofocus>' . $btn_text . '</button> 
                
                </div>
            </div>
            </div>
            </form>
        </div>
        </div>
        ';
}

//****************Multi Delete****************//
//post
if (isset($_POST['multi_delete_box_post'])) {

    if (isset($_POST['multi_delete'])) {
        foreach ($_POST['multi_delete'] as $deleteid) {
            $sql1 = "SELECT photo from post where id = '$deleteid'";
            $results1 = mysqli_query($db, $sql1);
            $row1 = $results1->fetch_assoc();
            $image = $row1['photo'];
            unlink('assets/img/drejtimet_post/' . $image);
            $delete = "DELETE from post WHERE id=" . $deleteid;
            mysqli_query($db, $delete);
            // Session::flash('sukses', '');
            header("Location: post-admin");
        }
    }
}

//aplikimet

if (isset($_POST['multi_delete_box_apk'])) {

    if (isset($_POST['multi_delete'])) {
        foreach ($_POST['multi_delete'] as $deleteid) {
            $delete = "DELETE from aplikimet WHERE id=" . $deleteid;
            mysqli_query($db, $delete);
            // header("Location: aplikimet-admin");
            Session::flash('sukses', 'Aplikimet u fshian me sukses');
        }
    }
}

//sms s

if (isset($_POST['multi_delete_box_sms'])) {

    if (isset($_POST['multi_delete'])) {
        foreach ($_POST['multi_delete'] as $deleteid) {
            $delete = "DELETE from kontakit WHERE id=" . $deleteid;
            mysqli_query($db, $delete);
            // header("Location: kontakti-admin");
            Session::flash('sukses', 'Mesazhet u fshian me sukses');
        }
    }
}

//stafi
if (isset($_POST['multi_delete_box_stafi'])) {

    if (isset($_POST['multi_delete'])) {;
        foreach ($_POST['multi_delete'] as $deleteid) {
            $sql1 = "SELECT stafiPhoto from stafi where stafiID = " . $deleteid;
            $results1 = mysqli_query($db, $sql1);
            $row1 = $results1->fetch_assoc();
            unlink('assets/img/stafi/' . $row1['stafiPhoto']);
            $delete = "DELETE from stafi WHERE stafiID=" . $deleteid;
            mysqli_query($db, $delete);
            Session::flash('sukses', 'Stafi u fshie me sukese');
            header("Location: stafi-admin");
        }
    }
}
//****************Delete****************//
//stafi
if (isset($_POST['stafi_delete_'])) {
    $id = $_POST['stafi_delete_'];

    $sql1 = "SELECT stafiPhoto from stafi where stafiID = '$id'";
    $results1 = mysqli_query($db, $sql1);
    $row1 = $results1->fetch_assoc();
    unlink('assets/img/stafi/' . $row1['stafiPhoto']);
    $sql = "DELETE  FROM stafi WHERE  stafiId = '$id'";
    mysqli_query($db, $sql);

    Session::flash('sukses', 'Stafi u fshia me sukse');
}

//postimet

if (isset($_POST['post_delete_'])) {
    $id = $_POST['post_delete_'];

    $sql1 = "SELECT photo from post where id = '$id'";
    $results1 = mysqli_query($db, $sql1);
    $row1 = $results1->fetch_assoc();
    unlink('assets/img/drejtimet_post/' . $row1['photo']);

    $sql = "DELETE  FROM post WHERE id = '$id'";
    mysqli_query($db, $sql);

    Session::flash('sukses', 'Postimet u fshian me sukses');
}

//lamit 
if (isset($_POST['category_delete_'])) {
    $id = $_POST['category_delete_'];

    $sql = "DELETE  FROM lamia WHERE idLamia = '$id'";
    mysqli_query($db, $sql);

    Session::flash('sukses', 'Lamia u fshie me sukses');
    header("location: admin/create-lami");
}
//drejtimet 
if (isset($_POST['lendet_delete_'])) {
    $id = $_POST['lendet_delete_'];

    $sql = "DELETE FROM lendet WHERE lendetID = '$id'";
    mysqli_query($db, $sql);

    Session::flash('sukses', 'Drejtimi u fshia me sukses');
    header("location: admin/create-lami");
}
//Aplikimet
if (isset($_POST['aplikimi_delete_'])) {
    $id = $_POST['aplikimi_delete_'];

    $sql = "DELETE FROM aplikimet WHERE id = '$id'";
    mysqli_query($db, $sql);

    Session::flash('sukses', 'Aplikimi u fshia me sukses');
    // header("Location: admin/aplikimet-admin" );
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
    mysqli_query($db, $sql);

    Session::flash('sukses', 'Drejtimi u fshia me sukses');
    header("Location: admin/create-lami");
}
//****************Edit****************//
if (isset($_POST['stafi_edit_'])) {
    $id = $_POST['stafi_edit_'];
    $s_emri = ucfirst(mysqli_real_escape_string($db, $_POST['s_emri']));
    $s_mbiemri = ucfirst(mysqli_real_escape_string($db, $_POST['s_mbiemri']));
    // $s_lenda = mysqli_real_escape_string($db, $_POST['s_lenda']);

    //updati nga edit 
    $update = "UPDATE stafi set stafiEmri = '$s_emri', stafiMbiemri = '$s_mbiemri' /*, stafiLenda = '$s_lenda' */  where stafiID=$id";
    mysqli_query($db, $update);

    Session::flash('sukses', 'Stafi u ndryshua me sukses');
}
//postimet

if (isset($_POST['post_edit_'])) {

    $id = $_POST['post_edit_'];
    $titulli = mysqli_real_escape_string($db, $_POST['post_titulli']);
    $body = mysqli_real_escape_string($db, $_POST['post_body']);


    //updati nga edit 
    $post_update = "UPDATE post set titulli = '$titulli', body = '$body' where id=$id";
    mysqli_query($db, $post_update);

    Session::flash('sukses', 'Postimi u ndryshua me sukses');
    header("Location: admin/post-admin");
}
//category
if (isset($_POST['category_edit_'])) {

    $id = $_POST['category_edit_'];
    $titulli = mysqli_real_escape_string($db, $_POST['edit_category_name']);
    $body = mysqli_real_escape_string($db, $_POST['edit_category_text']);


    //updati nga edit 
    $post_update = "UPDATE post_categories set emri = '$titulli', colum_table	 = '$body' where id=$id";
    mysqli_query($db, $post_update);

    Session::flash('sukses', 'Drejtimi u ndryshua me sukses');
    header("Location: admin/create-lami");
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

require_once "admin/pdo.php";

//**************** Pagination ****************//



class Pagination extends DB
{

    public function InsertData($table_id, $SELECT, $pageNumber = 25, $whereid = "")
    {
        $perPage = $pageNumber;


        // Calculate Total pages
        $stmt = $this->openDB()->query('SELECT count(*) FROM ' . $table_id . " " . $whereid . '   ');
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
        $this->result = $this->openDB()->prepare($query);
        $this->result->execute();
    }

    public function getNavPages($ID = "")
    {
        if (!$this->total_pages ==  0) {
?>
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
                                                                echo "class='page-link' href='?faqja=" . $this->previous_page . $ID . "'";
                                                            } ?>>Prapa</a>
                                </li>
                                <?php for ($i = 1; $i <= $this->total_pages; $i++) :
                                    if ($i == $this->page) {
                                        echo '                
               <li class="page-item active">
                  <a class="page-link " href="?faqja=' . $i . $ID . '"> ' . $i . '</a>
                </li>';
                                    } else {
                                        echo '                
               <li class="page-item">
                  <a class="page-link " href="?faqja=' . $i . $ID . '"> ' . $i . '</a>
                </li>';
                                    }
                                ?>
                                <?php endfor; ?>
                                <li class="page-item <?php if (($this->page + 1) >= $this->total_pages) {
                                                            echo ' disabled';
                                                        } ?>">
                                    <a class="page-link" <?php if (($this->page + 1) < $this->total_pages) {
                                                                echo "href='?faqja=" . $this->next_page . $ID . "'";
                                                            } ?>>Tjetra</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        <?php
        } else {
            echo "<div class='alert alert-info text-center' role='alert'> Nuk ka rezultat </div>";
        }
    }
}



class Session
{
    public static function get(String $name)
    {
        return $_SESSION[$name];
    }

    public static function put(String $name, $value)
    {
        //sesioni                //vlera "md5(uniqid()));"
        return $_SESSION[$name] = $value;
    }

    public static function exist(String $name)
    {
        return (isset($_SESSION[$name])) ? true : false;
    }

    public static function delete(String $name)
    {
        if (self::exist($name)) {
            unset($_SESSION[$name]);
        }
    }

    public static function flash(mixed $name, String $string = '')
    {
        if (self::exist($name)) {
            $session = self::get($name);
            self::delete($name);
            return $session;
        } else {
            self::put($name, $string);
        }
    }

    public static function getFlash(String $name, String $color = 'success')
    {
        if (self::exist($name)) {
        ?>
            <div class="alert alert-<?= $color ?> text-center" role="alert">
                <?php echo self::flash($name); ?>
            </div>
<?php
        }
    }
}
