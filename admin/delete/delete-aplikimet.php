<?php
include '../../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];


    //fshirja e aplikimit
    $sql = "DELETE FROM `aplikimet` WHERE `id`='$id'";
    $result = $db->query($sql);



    if ($result == TRUE) {
        header('Location: ../aplikimet-admin.php');    
    }
}
?>