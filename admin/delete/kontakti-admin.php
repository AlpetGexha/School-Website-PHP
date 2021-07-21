<?php
include '../../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];


    //fshirja e aplikimit
    $sql = "DELETE FROM `mesazhi` WHERE `id`='$id'";
    $result = $db->query($sql);



    if ($result == TRUE) {
        header('Location: ../../admin/kontakti-admin.php');    
    }
}
