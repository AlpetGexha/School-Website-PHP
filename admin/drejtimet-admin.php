<?php
include "../config.php";
include "../server.php";
ob_start();

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
    header("Location:../login.php");
    die();
}
?>

<!DOCTYPE html>

<head>
    <?php include('../assets/php/title_bar_img.php'); ?>
    <title>Drejtimet ADMIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Stafi</title>
</head>

<body>

    <style type="text/css">
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Quicksand', sans-serif;
        }

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

    <body>

        <?php include "../assets/php/admin-navbar.php"; ?>
        <br>
        <?php
        if (!empty($msg)) {
            echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Postimi u postua me sukses  </strong>  ' . $msg . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }

        ?>

        <div class="contaier mt-5">
            <center>
                <h1><b>Shto Postime n&euml; drejtime t&euml; shkoll&euml;s</b></h1><br>
                <p style="color: red;"><b>&Ccedil;do postim q&euml; shtohet k&euml;tu paraqitet automatikisht n&euml; faqet speciale p&euml;r drejtimet</b></p>
            </center>
            <nav class="navbar navbar-expand-xxl navbar-light" id="mainNav">
                <div class="container">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        Menu
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#informatika">informatika</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#automekaniki">automekaniki</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#instalues-elektrik">instalues elektrik</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#rrobaqepesi">rrobaqepesi</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#arkitektur">arkitektur</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#operatorp">operatorp</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#transport">transport</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#energjetike">energjetike</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#dizajni">dizajni</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#qk">Qendra p&euml;r karrier</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="informatika" id="informatika">
                <div class="container">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="container mt-5">
                            <div class="center_create_post">
                                <h2>Informatika</h2>
                                <input id="emri_post" type="text" class="inputat_create_post" placeholder="Titulli" required="" name="title" oninvalid="this.setCustomValidity('Ju lutem shkruani emrin e postimit');" oninput="this.setCustomValidity('');">

                                <textarea placeholder="Pershkrimi i artikullit te cilin doni ta postoni" class="inputat_create_post" required="" name="pershkrimi" rows="6" cols="30" id="body" oninvalid="this.setCustomValidity('Ju lutem shkruani tekstin e postimit');" oninput="this.setCustomValidity('');"></textarea>

                                <!-- ----------Upload --------- -->
                                <div class="Upload">
                                    <input class="inputat_create_post" id="upload" type="file" name="image" required="" oninvalid="this.setCustomValidity('Ju lutem zgjidhni n&euml; Foto');" oninput="this.setCustomValidity('');">
                                </div>
                                <input id="btn_create_post" class="btn_create_post" type="submit" name="drejtimet_inforamtika" value="Posto">
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <!-- Automekaniki -->
            <div class="automekaniki" id="automekaniki">
                <div class="container">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="container mt-5">
                            <div class="center_create_post">
                                <h2>Automekaniki</h2>
                                <input id="emri_post" type="text" class="inputat_create_post" placeholder="Titulli" required="" name="title" oninvalid="this.setCustomValidity('Ju lutem shkruani emrin e postimit');" oninput="this.setCustomValidity('');">

                                <textarea placeholder="Pershkrimi i artikullit te cilin doni ta postoni" class="inputat_create_post" required="" name="pershkrimi" rows="6" cols="30" id="body" oninvalid="this.setCustomValidity('Ju lutem shkruani tekstin e postimit');" oninput="this.setCustomValidity('');"></textarea>

                                <!-- ----------Upload --------- -->
                                <div class="Upload">
                                    <input class="inputat_create_post" id="upload" type="file" name="image" required="" oninvalid="this.setCustomValidity('Ju lutem zgjidhni n&euml; Foto');" oninput="this.setCustomValidity('');">
                                </div>
                                <input id="btn_create_post" class="btn_create_post" type="submit" name="drejtimet_automekaniki" value="Posto">
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <!-- Ndertimtari -->
            <div class="ndertimtari" id="ndertimtari">
                <div class="container">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="container mt-5">
                            <div class="center_create_post">
                                <h2>Ndertimtari</h2>
                                <input id="emri_post" type="text" class="inputat_create_post" placeholder="Titulli" required="" name="title" oninvalid="this.setCustomValidity('Ju lutem shkruani emrin e postimit');" oninput="this.setCustomValidity('');">

                                <textarea placeholder="Pershkrimi i artikullit te cilin doni ta postoni" class="inputat_create_post" required="" name="pershkrimi" rows="6" cols="30" id="body" oninvalid="this.setCustomValidity('Ju lutem shkruani tekstin e postimit');" oninput="this.setCustomValidity('');"></textarea>

                                <!-- ----------Upload --------- -->
                                <div class="Upload">
                                    <input class="inputat_create_post" id="upload" type="file" name="image" required="" oninvalid="this.setCustomValidity('Ju lutem zgjidhni n&euml; Foto');" oninput="this.setCustomValidity('');">
                                </div>
                                <input id="btn_create_post" class="btn_create_post" type="submit" name="drejtimet_ndertimtari" value="Posto">
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <!-- instalues elektrik -->
            <div class="instalues-elektrik" id="instalues-elektrik">
                <div class="container">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="container mt-5">
                            <div class="center_create_post">
                                <h2>Ndertimtari</h2>
                                <input id="emri_post" type="text" class="inputat_create_post" placeholder="Titulli" required="" name="title" oninvalid="this.setCustomValidity('Ju lutem shkruani emrin e postimit');" oninput="this.setCustomValidity('');">

                                <textarea placeholder="Pershkrimi i artikullit te cilin doni ta postoni" class="inputat_create_post" required="" name="pershkrimi" rows="6" cols="30" id="body" oninvalid="this.setCustomValidity('Ju lutem shkruani tekstin e postimit');" oninput="this.setCustomValidity('');"></textarea>

                                <!-- ----------Upload --------- -->
                                <div class="Upload">
                                    <input class="inputat_create_post" id="upload" type="file" name="image" required="" oninvalid="this.setCustomValidity('Ju lutem zgjidhni n&euml; Foto');" oninput="this.setCustomValidity('');">
                                </div>
                                <input id="btn_create_post" class="btn_create_post" type="submit" name="drejtimet_instalues" value="Posto">
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <!-- Rrobaqepesi -->
            <div class="rrobaqepesi" id="rrobaqepesi">
                <div class="container">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="container mt-5">
                            <div class="center_create_post">
                                <h2>Rrobaqepesi</h2>
                                <input id="emri_post" type="text" class="inputat_create_post" placeholder="Titulli" required="" name="title" oninvalid="this.setCustomValidity('Ju lutem shkruani emrin e postimit');" oninput="this.setCustomValidity('');">

                                <textarea placeholder="Pershkrimi i artikullit te cilin doni ta postoni" class="inputat_create_post" required="" name="pershkrimi" rows="6" cols="30" id="body" oninvalid="this.setCustomValidity('Ju lutem shkruani tekstin e postimit');" oninput="this.setCustomValidity('');"></textarea>

                                <!-- ----------Upload --------- -->
                                <div class="Upload">
                                    <input class="inputat_create_post" id="upload" type="file" name="image" required="" oninvalid="this.setCustomValidity('Ju lutem zgjidhni n&euml; Foto');" oninput="this.setCustomValidity('');">
                                </div>
                                <input id="btn_create_post" class="btn_create_post" type="submit" name="drejtimet_rrobaqepesi" value="Posto">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- arkitektur -->
            <div class="arkitektur" id="arkitektur">
                <div class="container">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="container mt-5">
                            <div class="center_create_post">
                                <h2>Arkitektur</h2>
                                <input id="emri_post" type="text" class="inputat_create_post" placeholder="Titulli" required="" name="title" oninvalid="this.setCustomValidity('Ju lutem shkruani emrin e postimit');" oninput="this.setCustomValidity('');">

                                <textarea placeholder="Pershkrimi i artikullit te cilin doni ta postoni" class="inputat_create_post" required="" name="pershkrimi" rows="6" cols="30" id="body" oninvalid="this.setCustomValidity('Ju lutem shkruani tekstin e postimit');" oninput="this.setCustomValidity('');"></textarea>

                                <!-- ----------Upload --------- -->
                                <div class="Upload">
                                    <input class="inputat_create_post" id="upload" type="file" name="image" required="" oninvalid="this.setCustomValidity('Ju lutem zgjidhni n&euml; Foto');" oninput="this.setCustomValidity('');">
                                </div>
                                <input id="btn_create_post" class="btn_create_post" type="submit" name="drejtimet_arkitektur" value="Posto">
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <!-- operator prodhimi (sdi a ekziston qekjo :D) -->
            <div class="operatorp" id="operatorp">
                <div class="container">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="container mt-5">
                            <div class="center_create_post">
                                <h2>Operator Prodhimi</h2>
                                <input id="emri_post" type="text" class="inputat_create_post" placeholder="Titulli" required="" name="title" oninvalid="this.setCustomValidity('Ju lutem shkruani emrin e postimit');" oninput="this.setCustomValidity('');">

                                <textarea placeholder="Pershkrimi i artikullit te cilin doni ta postoni" class="inputat_create_post" required="" name="pershkrimi" rows="6" cols="30" id="body" oninvalid="this.setCustomValidity('Ju lutem shkruani tekstin e postimit');" oninput="this.setCustomValidity('');"></textarea>

                                <!-- ----------Upload --------- -->
                                <div class="Upload">
                                    <input class="inputat_create_post" id="upload" type="file" name="image" required="" oninvalid="this.setCustomValidity('Ju lutem zgjidhni n&euml; Foto');" oninput="this.setCustomValidity('');">
                                </div>
                                <input id="btn_create_post" class="btn_create_post" type="submit" name="drejtimet_operatorpr" value="Posto">
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <!-- transport rrugor me bus -->
            <div class="transport" id="transport">
                <div class="container">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="container mt-5">
                            <div class="center_create_post">
                                <h2>Transport Rrugor</h2>
                                <input id="emri_post" type="text" class="inputat_create_post" placeholder="Titulli" required="" name="title" oninvalid="this.setCustomValidity('Ju lutem shkruani emrin e postimit');" oninput="this.setCustomValidity('');">

                                <textarea placeholder="Pershkrimi i artikullit te cilin doni ta postoni" class="inputat_create_post" required="" name="pershkrimi" rows="6" cols="30" id="body" oninvalid="this.setCustomValidity('Ju lutem shkruani tekstin e postimit');" oninput="this.setCustomValidity('');"></textarea>

                                <!-- ----------Upload --------- -->
                                <div class="Upload">
                                    <input class="inputat_create_post" id="upload" type="file" name="image" required="" oninvalid="this.setCustomValidity('Ju lutem zgjidhni n&euml; Foto');" oninput="this.setCustomValidity('');">
                                </div>
                                <input id="btn_create_post" class="btn_create_post" type="submit" name="drejtimet_transportt" value="Posto">
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <!-- energjetike -->
            <div class="energjetike" id="energjetike">
                <div class="container">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="container mt-5">
                            <div class="center_create_post">
                                <h2>Energjetike</h2>
                                <input id="emri_post" type="text" class="inputat_create_post" placeholder="Titulli" required="" name="title" oninvalid="this.setCustomValidity('Ju lutem shkruani emrin e postimit');" oninput="this.setCustomValidity('');">

                                <textarea placeholder="Pershkrimi i artikullit te cilin doni ta postoni" class="inputat_create_post" required="" name="pershkrimi" rows="6" cols="30" id="body" oninvalid="this.setCustomValidity('Ju lutem shkruani tekstin e postimit');" oninput="this.setCustomValidity('');"></textarea>

                                <!-- ----------Upload --------- -->
                                <div class="Upload">
                                    <input class="inputat_create_post" id="upload" type="file" name="image" required="" oninvalid="this.setCustomValidity('Ju lutem zgjidhni n&euml; Foto');" oninput="this.setCustomValidity('');">
                                </div>
                                <input id="btn_create_post" class="btn_create_post" type="submit" name="drejtimet_energjetike" value="Posto">
                            </div>
                        </div>
                    </form>
                </div>
            </div>



            <!-- Dizajni -->
            <div class="dizajni" id="dizajni">
                <div class="container">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="container mt-5">
                            <div class="center_create_post">
                                <h2>Dizajn i Veshjeve</h2>
                                <input id="emri_post" type="text" class="inputat_create_post" placeholder="Titulli" required="" name="title" oninvalid="this.setCustomValidity('Ju lutem shkruani emrin e postimit');" oninput="this.setCustomValidity('');">

                                <textarea placeholder="Pershkrimi i artikullit te cilin doni ta postoni" class="inputat_create_post" required="" name="pershkrimi" rows="6" cols="30" id="body" oninvalid="this.setCustomValidity('Ju lutem shkruani tekstin e postimit');" oninput="this.setCustomValidity('');"></textarea>

                                <!-- ----------Upload --------- -->
                                <div class="Upload">
                                    <input class="inputat_create_post" id="upload" type="file" name="image" required="" oninvalid="this.setCustomValidity('Ju lutem zgjidhni n&euml; Foto');" oninput="this.setCustomValidity('');">
                                </div>
                                <input id="btn_create_post" class="btn_create_post" type="submit" name="drejtimet_dizajni" value="Posto">
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <!-- Qendra per Karriere -->
            <div class="qk" id="qk">
                <div class="container">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="container mt-5">
                            <div class="center_create_post">
                                <h2>Qendra per Karriere</h2>
                                <input id="emri_post" type="text" class="inputat_create_post" placeholder="Titulli" required="" name="title" oninvalid="this.setCustomValidity('Ju lutem shkruani emrin e postimit');" oninput="this.setCustomValidity('');">

                                <textarea placeholder="Pershkrimi i artikullit te cilin doni ta postoni" class="inputat_create_post" required="" name="pershkrimi" rows="6" cols="30" id="body" oninvalid="this.setCustomValidity('Ju lutem shkruani tekstin e postimit');" oninput="this.setCustomValidity('');"></textarea>

                                <!-- ----------Upload --------- -->
                                <div class="Upload">
                                    <input class="inputat_create_post" id="upload" type="file" name="image" required="" oninvalid="this.setCustomValidity('Ju lutem zgjidhni n&euml; Foto');" oninput="this.setCustomValidity('');">
                                </div>
                                <input id="btn_create_post" class="btn_create_post" type="submit" name="drejtimet_qendraqk" value="Posto">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

    </body>

    </html>