<?php
    include('../../config/connect.php');

    $tendanhmucbaiviet = $_POST['tendanhmucbaiviet'];
    $thutu = $_POST['thutu'];
    //THEM
    if(isset($_POST['themdanhmucbaiviet'])) {
        $sql_them = "INSERT INTO danhmucbaiviet(tendanhmuc_baiviet, thutu) VALUE ('".$tendanhmucbaiviet."','".$thutu."')";
        mysqli_query($mysqli, $sql_them);
        header('Location:../../index.php?action=quanlydanhmucbaiviet&query=them');
    } 
    elseif (isset($_POST['suadanhmucbaiviet'])) {
        //SUA
        $sql_update = "UPDATE danhmucbaiviet SET tendanhmuc_baiviet='".$tendanhmucbaiviet."', thutu='".$thutu."' WHERE id_baiviet='$_GET[idbaiviet]'";
        mysqli_query($mysqli, $sql_update);
        header('Location:../../index.php?action=quanlydanhmucbaiviet&query=them');
    } 
    else{
        //XOA
        $id = $_GET['idbaiviet'];
        $sql_xoa = "DELETE FROM danhmucbaiviet WHERE id_baiviet='".$id."'";
        mysqli_query($mysqli, $sql_xoa);
        header('Location:../../index.php?action=quanlydanhmucbaiviet&query=them');
    }
?>