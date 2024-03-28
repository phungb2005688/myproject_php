<?php
    $sql_sua_bv = "SELECT * FROM baiviet WHERE baiviet_id='$_GET[idbaiviet]' LIMIT 1"; 
    $query_sua_bv = mysqli_query($mysqli, $sql_sua_bv);
?> 

<!-- ======================================================================================= -->
<h4 class="text-center fw-bold m-3">Cập nhật bài viết:</h4>
<?php
    while ($row = mysqli_fetch_array($query_sua_bv)) {    
?>
<div class="container">
    <form action="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $_GET['idbaiviet'] ?>" method="post" enctype="multipart/form-data">

        <table class="container table" style="width: 80%">
            <tr>
                <th>Tên bài viết</th>
                <td><input style="width: 300px;" type="text" value="<?php echo $row['tenbaiviet'] ?>" name="tenbaiviet"></td>
            </tr>
            
            <tr>
                <th>Hình ảnh</th>
                <td>
                    <input type="file" name="hinhanh">
                    <img src="modules/quanlybaiviet/uploads/<?php echo $row['hinhanh'] ?>" width="100px">
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
                <th>Danh mục bài viết</th>
                <td>
                    <select name="danhmuc" id="" style="width: 200px; height: 30px;">
                        <?php
                            $sql_danhmuc = "SELECT * FROM danhmucbaiviet ORDER BY id_baiviet DESC";
                            $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                            while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                                if($row_danhmuc['id_baiviet'] == $row['id_danhmuc']){
                        ?>
            
                        <option selected value="<?php echo $row_danhmuc['id_baiviet']?>"><?php echo $row_danhmuc['tendanhmuc_baiviet']?></option>
                        <?php
                            } else{
                        ?>
                        <option value="<?php echo $row_danhmuc['id_baiviet']?>"><?php echo $row_danhmuc['tendanhmuc_baiviet']?></option>
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
            <input class="btn btn-success" type="submit" name="suabaiviet" value="Cập nhật bài viết">
        </div>
        <br>
    </form>
<?php
    }
?>
</div>