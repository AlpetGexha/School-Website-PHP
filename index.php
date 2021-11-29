<?php
include "config.php";

include "server.php";
if ($_GET === null) {
    header("Locasion: index");
}

echo Session::getFlash('sukses');

get_header("Faqja Kyresore"); ?>
<style>
    .col {
        padding: 15px;
    }
</style>
<?php 
?>
<div class="foto-kryesore">
    <div>
        <img src="assets/img/foto-ballina.jpg" style="width: 100%;" alt="<?= htmlspecialchars("Foto Kryesore Nexhmedin Nixha") ?>">
        <!--       
	   <div class=" foto-kryesore-text">
            <h1 class="index-font"><b> Shkolla e Mesme e Lart&euml; Teknike <br>"Nexhmedin Nixha" </b></h1><br>
        </div>
		-->
        </img>
    </div>

</div>

<div class="container mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-title text-white">
                    <h3><b>Synimet tona për nxënësit tanë</b></h3>
                    <p></p>
                </div>
                <div class="enroll-list text-white">
                    <div class="enroll-list-item">
                        <span>1</span>
                        <h5>Edukimi</h5>
                        <p>Përgatitja e nxënësëve në aspektin teorik me literaturë cilësore dhe staf akademik të
                            përgatitur.</p>
                    </div>
                    <div class="enroll-list-item">
                        <span>2</span>
                        <h5>Zhvilimi aftësive profesionale</h5>
                        <p><i>Implementimi i mesimeve nga aspekti teorik ne aspektin praktik dretpërdrejt ne tregun
                                prodhues vendor.</i>
                        </p>
                    </div>
                    <div class="enroll-list-item">
                        <span>3</span>
                        <h5>Përgatitje për tregun e punës dhe studime themelore</h5>
                        <p><i>Të aftë/gatshëm për tregun, dhe plotsoje nevojat e tregut prodhues.</i></p>
                    </div>
                    <div class="enroll-list-item">
                        <span>4</span>
                        <h5>Lorem ipsum</h5>
                        <p><i>Lorem ipsum dolor sit amet consectetur adipisicing elit</i></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1 p-lg-0 p-4 m-auto">
                <img src="assets/img/2.jpg" alt="<?= htmlspecialchars("Nexhmedin Nixha Synimet") ?>">
            </div>
        </div>
    </div>

</div>

<div class=" fact-section spad set-bg" style="width: 100%;">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3 fact">
                <div class="fact-icon">
                    <i class="fas fa-school"></i>
                </div>
                <div class="fact-text">
                    <h2>40+</h2>
                    <p></p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 fact">
                <div class="fact-icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div class="fact-text">
                    <h2>35+</h2>
                    <p>Staf Akademik</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 fact">
                <div class="fact-icon">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div class="fact-text">
                    <h2>1400+</h2>
                    <p>Nxënës</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 fact">
                <div class="fact-icon">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <div class="fact-text">
                    <h2>11+</h2>
                    <p>Profile mësimore</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="drejtimet">
        <div class="container">
            <div class="row">
                <h1 class="drejtimi-h1">Drejtimet</h1>
                <?php

                //**************** Shfaqja e drejtimeve ****************//
                $sql = "SELECT * FROM lamia";
                $result = mysqli_query($db, $sql);
                $row = mysqli_fetch_assoc($result);

                foreach ($result as $row) {
                    echo '
                    <div class="col">
                        <div class="drejtimi-heading">
                            <h2>' . $row['lamiaid'] . '</h2>
                            <ul>';
                    echo get_kat_link($row['idLamia']);
                    echo '          
                            </ul>
                        </div>
                    </div>
                    
                  ';
                }
                ?>
            </div>
        </div>
    </div>
    <div class="container stafi" id="Stafi">
        <h2 class="drejtimi-h1">Stafi</h2>
        <i>
            <p style="text-align: center;">Shkolla ka një staf të kualifikuar në të gjitha drejtimet. Stafi ynë ndihmon studentët tanë që të arrijnë qëllimet e tyre akademike.</p>
        </i>

        <div class="owl-carousel owl-theme">
            <?php
            $sql = "SELECT s.stafiPhoto, s.stafiEmri, s.stafiMbiemri, s.stafiLenda, l.lendetID,  l.lendetEmri  FROM stafi s, lendet l where s.stafiLenda = l.lendetID  ";
            if ($result = mysqli_query($db, $sql)) {
                foreach ($result as $get_kadegoirt_menu1 => $row) {
            ?>
                    <!-- https://picsum.photos/200/150/?random -->
                    <div class="stafi_card">
                        <div class="card">
                            <img class="card-img-top" src="assets/img/stafi/<?= $row['stafiPhoto']; ?> " alt="<?= htmlspecialchars($row['stafiEmri'] . " " . $row['stafiMbiemri'] . " - Nexhmedin Nixha"); ?>">
                            <div class="card-block">
                                <h4 class="card-title"><b><?= $row['stafiEmri'] . " " . $row['stafiMbiemri'];  ?></b></h4>
                                <div class="card-text mb-2">
                                    <i><?= $row['lendetEmri']; ?></i>
                                </div>
                            </div>
                        </div>
                    </div>

            <?php }
            } ?>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 5,
                nav: true,
                loop: false
            }
        }
    })
</script>

<div class="container mt-5 text-center" id="Kontakti">
    <div class="row">
        <div class="col-lg-6">
            <h1>Kontakti</h1>
            <p>Nese keni dicka p&euml;r t&euml; kontaktuar apo dicka p&euml;r tu ankuar ju lutem dergoni nje mesazh</p>
            <p>P&euml;r %do k&euml;rkes, ankes, apo pytje jeni t&euml; lir&euml; t&euml; na kontaktoni </p>
        </div>
        <div class="col-lg-6 text-left">
            <div class="row">
                <div class="card-wrapper">
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Na Kontaktoni</h4>
                            <form method="POST" action="server.php">

                                <div class="form-group">
                                    <label>E-mail(opsion)</label>
                                    <input id="p_titulli" type="emial" class="form-control" placeholder="E-mail" name="ko_mail">
                                </div>

                                <label>Mesazhi</label>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" placeholder="Përshkrimi" id="floatingTextarea2" style="height: auto;" name="ko_mesazhi" required="" oninvalid="this.setCustomValidity('Shkruani Mesazhin');" oninput="this.setCustomValidity('')"></textarea>
                                    <label for="floatingTextarea2">Mesazhi</label>
                                </div>

                                <div class="form-group m-0">
                                    <button type="submit" name="kontakit_submit" class="btn btn-primary btn-block">
                                        Dergo
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<?php get_footer(); ?>

</html>