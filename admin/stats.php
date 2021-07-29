<?php

include "../config.php";
include "../server.php";
$msg = "";
ob_start();

IamAdmin();


?>

<?php get_AdminHeader("Index"); ?>


<div id="layoutSidenav_content">
    <div class="container-fluid mt-4">
        <div class="alert alert-success">
            <strong><?php
                    require_once('conn.php');
                    $sql = "SELECT COUNT(DISTINCT ip_address) AS alias FROM visitor_info";
                    $results = $db->prepare($sql);
                    $results->execute();
                    $unique_visitors = $results->fetch()['alias'];
                    echo "NUMRI TOTAL I VIZITORVE:" . $unique_visitors;

                    ?></strong>
        </div>
        <div class="alert alert-info">
            <strong><?php
                    require 'conn.php';
                    $sql = "SELECT MAX(views) AS maximum FROM post";
                    $results = $db->prepare($sql);
                    $results->execute();
                    $maxcount = $results->fetch()['maximum'];
                    echo strtoupper("Postimi me i shikuar :" . $maxcount);

                    ?></strong>
        </div>

        <div class="r-table">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Postimet</th>
                        <th scope="col">Count</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    include("conn.php");
                    try {
                        //connect to mysqls
                        $db = new PDO('mysql:host=localhost;dbname=nexhmedinnixha', $username, $password);
                        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    } catch (Exception $ex) {
                        echo 'Not Connected ' . $ex->getMessage();
                    }


                    $stmt = $db->prepare('SELECT * FROM post LIMIT 10');
                    $stmt->execute();
                    $results = $stmt->fetchAll();
                    $row_count = $stmt->rowCount();
                    if ($row_count == 0) {

                        $error = "Nuk ka info";
                    }
                    $i = 1;
                    foreach ($results as $row) {
                        echo '
								<tr>s
								<td>' . $i++ . '</td>
								<td>' . $row['titulli'] . '</td>
								<td>' . $row['views'] . '</td>
								</tr>';
                    }
                    ?>

                </tbody>
            </table>
        </div>
        <div class="alert alert-info">
            <strong><?php
                    require 'conn.php';
                    $sql = "SELECT sum(views) AS countt FROM post";
                    $results = $db->prepare($sql);
                    $results->execute();
                    $maxcount = $results->fetch()['countt'];
                    echo "Totali i t&euml; gjithave postimeve  :" . $maxcount;

                    ?></strong>
        </div><br>

        <div class="r-table">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">IP ADDRESS</th>
                        <th scope="col">USER AGENT</th>
                        <th scope="col">KOHA E PRANUAR</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    include("../config.php");
                    try {

                        $db = new PDO('mysql:host=localhost;dbname=nexhmedinnixha', $username, $password);
                        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    } catch (Exception $ex) {
                        echo 'Not Connected ' . $ex->getMessage();
                    }


                    $stmt = $db->prepare('SELECT * FROM visitor_info ORDER BY time_accessed DESC LIMIT 25');
                    $stmt->execute();
                    $rows = $stmt->fetchAll();
                    $row_count = $stmt->rowCount();
                    if ($row_count == 0) {

                        $error = "Nuk ka  info";
                    }
                    foreach ($rows as $row) {
                        echo '
								<tr>
								<td>' . $row['ip_address'] . '</td>
								<td>' . $row['user_agent'] . '</td>
								<td>' . $row['time_accessed'] . '</td>
								</tr>';
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>

    </body>

    </html>