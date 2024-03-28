<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script> 

<?php
    $sql_sua_sp = "SELECT * FROM sanpham WHERE id_sanpham='$_GET[idsanpham]' LIMIT 1"; 
    $query_sua_sp = mysqli_query($mysqli, $sql_sua_sp);
?> 

<!-- ====================================================================================== -->
<h4 class="text-center fw-bold m-3">Cập nhật sản phẩm:</h4>
<?php
    while ($row = mysqli_fetch_array($query_sua_sp)) {    
?>
<div class="container"style="background-color: #fdfcfa;">
    <form action="modules/quanlysp/xuly.php?idsanpham=<?php echo $_GET['idsanpham'] ?>" method="post" enctype="multipart/form-data">

        <table class="container table" style="width: 80%">
            <tr>
                <th>Tên sản phẩm</th>
                <td><input style="width: 300px;" type="text" value="<?php echo $row['tensanpham'] ?>" name="tensanpham"></td>
            </tr>
            <tr>
                <th>Mã sản phẩm</th>
                <td><input type="text" value="<?php echo $row['masp'] ?>" name="masp"></td>
            </tr>  
            <tr>
                <th>Giá sản phẩm</th>
                <td><input type="text" value="<?php echo $row['giasp'] ?>" name="giasp"></td>
            </tr>  
            <tr>
                <th>Số lượng</th>
                <td><input type="text" value="<?php echo $row['soluong'] ?>" name="soluong"></td>
            </tr>  
            <tr>
                <th>Hình ảnh</th>
                <td>
                    <input type="file" name="hinhanh">
                    <img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="100px">
                </td>
            </tr>
            <tr>
                <th>Tóm tắt</th>
                <td><textarea name="tomtat" rows="3" cols="50" id="" style="resize: none;"><?php echo $row['tomtat'] ?></textarea></td>
            </tr>    
            <tr>
                <th>Nội dung</th>
                <td><textarea name="noidung" rows="5" cols="50" id="" style="resize: none;"><?php echo $row['noidung'] ?></textarea></td>
            </tr>
            <tr>
                <th>Danh mục sản phẩm</th>
                <td>
                    <select name="danhmuc" id="" style="width: 200px; height: 30px;">
                        <?php
                            $sql_danhmuc = "SELECT * FROM danhmuc_sp ORDER BY id_danhmuc DESC";
                            $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                            while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                                if($row_danhmuc['id_danhmuc'] == $row['id_danhmuc']){
                        ?>
            
                        <option selected value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc']?></option>
                        <?php
                            } else{
                        ?>
                        <option value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc']?></option>
                        <?php
                                }
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Tình trạng</th>
                <td>
                    <select name="tinhtrang" id="" style="width: 200px; height: 30px;">
                    <?php
                        if($row['tinhtrang'] == 1){  
                    ?>    
                    <option value="1" selected>Kích hoạt</option>
                    <option value="0">Ẩn</option>
                    <?php
                        } else{
                    ?>
                    <option value="1">Kích hoạt</option>
                    <option value="0" selected>Ẩn</option>
                    <?php
                        }
                    ?>
                    </select>
                </td>
            </tr>
        </table>
        <div class="col-7 offset-5">
            <input class="btn btn-success" type="submit" name="suasanpham" value="Cập nhật sản phẩm">
        </div>
        <br>
    </form>
<?php
    }
?>
</div>