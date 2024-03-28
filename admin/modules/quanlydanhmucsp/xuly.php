<?php
    include('../../config/connect.php');
 
    $tenloaisp = $_POST['tendanhmuc'];
    $thutu = $_POST['thutu'];
    //THEM
    if(isset($_POST['themdanhmuc'])) {
        $sql_them = "INSERT INTO danhmuc_sp(tendanhmuc, thutu) VALUE ('".$tenloaisp."','".$thutu."')";
        mysqli_query($mysqli, $sql_them);
        header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
    } elseif (isset($_POST['suadanhmuc'])) {
        //SUA
        $sql_update = "UPDATE danhmuc_sp SET tendanhmuc='".$tenloaisp."', thutu='".$thutu."' WHERE id_danhmuc='$_GET[iddanhmuc]'";
        mysqli_query($mysqli, $sql_update);
        header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
    } else{
        //XOA
        $id = $_GET['iddanhmuc'];
        $sql_xoa = "DELETE FROM danhmuc_sp WHERE id_danhmuc='".$id."'";
        mysqli_query($mysqli, $sql_xoa);
        header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
    }
?>