<?php
include 'config.php';
include 'server.php';
?>
<?php get_header("Apliko Online", "my-login-page"); ?>

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
                                <input id="phone" type="tel" class="form-control" placeholder="Telefoni" name="telefoni" value="" required="" oninvalid="this.setCustomValidity('Ju lutem shkruani numrin e telefonit');" oninput="this.setCustomValidity('');">
                            </div>

                            <div class="form-group">
                                <label for="disabledTextInput" class="form-label">Drejtimi</label>
                                <select name="drejtimet" class="custom-select mb-3">
                                    <option selected disabled required=""> Çfar&euml; drejtimi jeni t&euml; interesuar</option>
                                
                                    <?php
                                    $sql = "SELECT l.idLamia, l.lamiaid, p.id, p.lamia, p.emri FROM lamia l, post_categories p WHERE p.lamia = l.idLamia";
                                    $result = mysqli_query($db,$sql);
                                    $row = $result->fetch_assoc();
                                    
                                    foreach ($result as $row) {
                                        ?>
                                        <option value="<?= $row['emri']; ?>"><?= $row['lamiaid']. " - " . $row['emri']?> </option>
                                        <?php
                                    }
                                    ?>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js" integrity="sha512-d4KkQohk+HswGs6A1d6Gak6Bb9rMWtxjOa0IiY49Q3TeFd5xAzjWXDCBW9RS7m86FQ4RzM2BdHmdJnnKRYknxw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assets/js/function.js"></script>
    <script>
        jQuery(function($) {
            $("#phone").mask("999-999-999");
        });
    </script>
</div>
<?php get_footer(); ?>s