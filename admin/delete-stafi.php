<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $sql = "DELETE FROM `drejtori` WHERE `id`='$id'";
    $result = $db->query($sql);



    if ($result == TRUE) {
        header('Location: aplikimet-admin.php');    
    }
}
?>