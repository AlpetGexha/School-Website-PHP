<?php
include 'config.php';
include 'server.php';
?>
<!DOCTYPE html>

<head>
    <?php include('assets/php/title_bar_img.php'); ?>
    <!-- ------------ linkat ------------------ -->


    <?php include('assets/php/title_bar_img.php'); ?>
    <title>Apliko Online - SHMLT "Nexhmedin Nixha" – Gjakovë</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Apliko Online</title>
</head>

<body>

    <style>
        .my-login-page .card-wrapper {
            width: 520px !important;
        }

        /* Ditelindja */
        input {
            position: relative;
            width: 150px;
            height: 20px;
            color: white;
        }

        #ditelinjda:before {
            position: absolute;
            top: 3px;
            left: 3px;
            content: attr(data-date);
            display: inline-block;
            color: black;
        }

        input::-webkit-datetime-edit,
        input::-webkit-inner-spin-button,
        input::-webkit-clear-button {
            display: none;
        }

        input::-webkit-calendar-picker-indicator {
            position: absolute;
            top: 3px;
            right: 0;
            color: black;
            opacity: 1;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>


    <?php include('assets/php/navbar.php'); ?>

    <body class="my-login-page">
        <div class="my-login-page">
            <div class="container mt-5 h-100">
                <div class="row justify-content-md-center h-100">
                    <div class="card-wrapper">
                        <div class="card fat">
                            <div class="card-body">
                                <?php
                                if (!empty($msg)) {
                                    echo '
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Aplikacioni u dergua me sukses! Faleminderit p&euml;r aplikimin: </strong>  <br>
                                    ' . $msg . '
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;<a href="apliko_online.php"></a></span>
                                    </button>
                                </div>';
                                }
                                ?>
                                <h4 class="card-title">Aplikoni Tani</h4>

                                <form method="POST" class="my-login-validation" action="#">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label>Emri</label>
                                                <input id="emri" type="text" class="form-control" placeholder="Emri" name="emri" value="" required="" autofocus="" oninvalid="this.setCustomValidity('Ju lutem shkruani emrin');" oninput="this.setCustomValidity('');">
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <div class="row"></div>
                                                <label>Mbiemri</label>
                                                <input id="mbiemri" type="text" class="form-control" placeholder="Mbiemri" name="mbiemri" value="" required="" oninvalid="this.setCustomValidity('Ju lutem shkruani mbiemrin');" oninput="this.setCustomValidity('');">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Emri i prindit</label>
                                        <input id="emri_p" type="text" class="form-control" placeholder="Emri i prindit" name="emri_p" value="" required="" oninvalid="this.setCustomValidity('Ju lutem shkruani emrin e prindit');" oninput="this.setCustomValidity('');">
                                    </div>
                                    <div class="form-group">
                                        <label>Dit&euml;linjda</label>
                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
                                        <input id="ditelinjda" type="date" data-date="" data-date-format="DD MMMM YYYY" value="2004-08-09" class="form-control" placeholder="dita/muaji/viti" name="ditelindja" value="" required="" oninvalid="this.setCustomValidity('Ju lutem shkruani Dit&euml;linjda');" oninput="this.setCustomValidity('');">
                                        <p>Kliko ikon&euml;n e kalendarit p&euml;r t&euml; ndryshuar dat&euml;n e lindjes</p>
                                    </div>

                                    <div class="form-group">
                                        <label>Adresa Elektronike</label>
                                        <input id="email" type="email" class="form-control" placeholder="Adresa Elektronike" name="email" value="" required="" oninvalid="this.setCustomValidity('Ju lutem shkruani emailin');" oninput="this.setCustomValidity('');">
                                    </div>

                                    <div class="form-group">
                                        <label>Numri i telefonit</label>
                                        <input id="telefoni" type="tel" class="form-control" placeholder="044 123 456" name="telefoni" value="" required="" oninvalid="this.setCustomValidity('Ju lutem shkruani numrin e telefonit');" oninput="this.setCustomValidity('');">
                                    </div>

                                    <div class="form-group">
                                        <label for="disabledTextInput" class="form-label">Drejtimi</label>
                                        <select name="drejtimet" class="custom-select mb-3">
                                            <option selected disabled required=""> Çfar&euml; drejtimi jeni t&euml; interesuar</option>
                                            <option value="Automekanik">Makineri - Automekanik </option>
                                            <option value="Operator-Prodhimi">Makineri - Operator Prodhimi</option>
                                            <option value="Transport-Rrugor">Trafik rrugor - Transport Rrugor</option>
                                            <option value="Informatik&euml;">Elektroteknik&euml; - Informatik&euml;</option>
                                            <option value="Instalues-Elektrik">Elektroteknik&euml; - Instalues Elektrik</option>
                                            <option value="Energjetik&euml;">Elektroteknik&euml; - Energjetik&euml;</option>
                                            <option value="Arkitektur">Ndertimtari - Arkitektur</option>
                                            <option value="Ndertimtari">Ndertimtari - Ndertimtari</option>
                                            <option value="Rrobaqep&euml;si">Tekstil - Rrobaqep&euml;si</option>
                                            <option value="Dizajn-i-veshjeve">Art pamor - Dizajn i veshjeve</option>
                                        </select>
                                    </div>


                                    <div class="form-group m-0">
                                        <button type="submit" name="apliko_submit" class="btn btn-primary btn-block">
                                            D&euml;rgo aplikimin
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br> <br>
            <?php include('assets/php/footer.php'); ?>

            <!-- ------------ Boostrap js 5.0 ------------------ -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
            <!-- ------------ Jquery JS 3.5.1------------------ -->
            <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>


            <script src="assets/js/function.js"></script>
        </div>
    </body>

    </html>