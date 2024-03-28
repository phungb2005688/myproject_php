<?php
    include('../../config/connect.php');

    $tenbaiviet = $_POST['tenbaiviet'];

    //HINH ANH
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $hinhanh = time().'_'.$hinhanh;

    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $tinhtrang = $_POST['tinhtrang'];
    $danhmuc = $_POST['danhmuc'];    

    //THEM
    if(isset($_POST['thembaiviet'])) {
        $sql_them = "INSERT INTO baiviet(tenbaiviet, hinhanh, tomtat, noidung, tinhtrang, id_danhmuc) VALUE (
                    '".$tenbaiviet."','".$hinhanh."','".$tomtat."','".$noidung."','".$tinhtrang."','".$danhmuc."')";
        mysqli_query($mysqli, $sql_them);
        move_uploaded_file($hinhanh_tmp, 'uploads/'.$hinhanh);
        header('Location:../../index.php?action=quanlybaiviet&query=them');
    } 
    elseif (isset($_POST['suabaiviet'])) {
    //SUA
        if(!empty($_FILES['hinhanh']['name'])){
            move_uploaded_file($hinhanh_tmp, 'uploads/'.$hinhanh);
            
            $sql_update = "UPDATE baiviet SET tenbaiviet='".$tenbaiviet."', hinhanh='".$hinhanh."', tomtat='".$tomtat."', 
                noidung='".$noidung."', tinhtrang='".$tinhtrang."', id_danhmuc='".$danhmuc."' WHERE baiviet_id ='$_GET[idbaiviet]'";
            //Xoa hinh anh cũ
            $sql = "SELECT * FROM baiviet WHERE baiviet_id='$_GET[idbaiviet]' LIMIT 1";
            $query = mysqli_query($mysqli, $sql);
            while($row = mysqli_fetch_array($query)){
                unlink('uploads/'.$row['hinhanh']);
            }
        } else{
            $sql_update = "UPDATE baiviet SET tenbaiviet='".$tenbaiviet."', tomtat='".$tomtat."', noidung='".$noidung."', tinhtrang='".$tinhtrang."', 
                id_danhmuc='".$danhmuc."' WHERE baiviet_id='$_GET[idbaiviet]'";
        }
         
        mysqli_query($mysqli, $sql_update);
        header('Location:../../index.php?action=quanlybaiviet&query=them');
    } 
    else{
    //XOA
        $id = $_GET['idbaiviet'];
        $sql = "SELECT * FROM baiviet WHERE baiviet_id ='.$id.' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        while($row = mysqli_fetch_array($query)){
            unlink('uploads/'.$row['hinhanh']);
        }
        $sql_xoa = "DELETE FROM baiviet WHERE baiviet_id ='".$id."'";
        mysqli_query($mysqli, $sql_xoa);
        header('Location:../../index.php?action=quanlybaiviet&query=them');
    }
?>