<?php
    include('../../config/connect.php');

    $thongtinlienhe = $_POST['thongtinlienhe'];
    $id = $_GET['id'];

    if (isset($_POST['submitlienhe'])) {
        //SỬA
        $sql_update = "UPDATE lienhe SET thongtinlienhe='".$thongtinlienhe."' WHERE id ='$id' ";
        mysqli_query($mysqli, $sql_update);
        header('Location:../../index.php?action=quanlyweb&query=capnhat');
    }
    
?>