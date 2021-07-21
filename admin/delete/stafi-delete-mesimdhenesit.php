<?php
include '../../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];


    //fshirja e aplikimit
    $sql = "DELETE FROM `mesimdhenesit` WHERE `id`='$id'";
    $result = $db->query($sql);



    if ($result == TRUE) {
        header('Location: ../../admin/stafi-post.php');    
    }
}
?>