<?php
include "config.php";
include "server.php";
?>
<?php get_header("Faqja Kyresore"); ?>
<style>
    .col {
        padding: 15px;
    }
</style>


<div class="foto-kryesore">
    <img src="assets/img/foto-ballina.jpg" style="width: 100%;" alt="Foto Kryesore">
    <div class="foto-kryesore-text">
        <h1 class="index-font"><b> Shkolla e Mesme e Lart&euml; Teknike <br>"Nexhmedin Nixha" </b></h1><br>
    </div>
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
                <img src="assets/img/2.jpg" alt="Shkolla2">
            </div>
        </div>
    </div>

</div>

<div class="fact-section spad set-bg" style="width: 100%;">
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
                <div class="col">

                    <div class="drejtimi-heading">
                        <h2>Makineri</h2>
                        <ul>
                            <?php get_kat_link("1"); ?>
                        </ul>
                    </div>
                </div>

                <div class="col">

                    <div class="drejtimi-heading">
                        <h2>Trafik rrugor</h2>
                        <ul>
                            <?php get_kat_link("2"); ?>
                        </ul>
                    </div>

                </div>

                <div class="col">
                    <div class="drejtimi-heading">
                        <h2>Elektroteknika</h2>
                        <ul>
                            <?php get_kat_link("3"); ?>
                        </ul>
                    </div>

                </div>

                <div class="col">

                    <div class="drejtimi-heading">
                        <h2>Nd&euml;rtimtari</h2>
                        <ul>
                            <?php get_kat_link("4"); ?>
                        </ul>
                    </div>

                </div>

                <div class="col">
                    <div class="drejtimi-heading">
                        <h2>Tekstil</h2>
                        <ul>
                            <?php get_kat_link("5"); ?>
                        </ul>
                    </div>
                </div>


                <div class="col">
                    <div class="drejtimi-heading">
                        <h2>Art pamor</h2>
                        <ul>
                            <?php get_kat_link("6"); ?>
                        </ul>
                    </div>

                </div>
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
            $sql = "SELECT * FROM stafi ";
            if ($result = mysqli_query($db, $sql)) {
                foreach ($result as $get_kadegoirt_menu1 => $row) {
            ?>
                    <!-- https://picsum.photos/200/150/?random -->
                    <div class="item">
                        <div class="card">
                            <img class="card-img-top" src="assets/img/stafi/<?= $row['stafiPhoto'];?>">
                            <div class="card-block">
                                <h4 class="card-title"><?= $row['stafiEmri'] . $row['stafiMbiemri'];  ?></h4>
                                <div class="card-text">
                                    <?= $row['stafiEmri']; ?>
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
<br> <br> <br>
<?php get_footer(); ?>

</html>