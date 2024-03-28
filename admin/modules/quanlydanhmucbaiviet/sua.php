
<?php
    $sql_sua_danhmucbv = "SELECT * FROM danhmucbaiviet WHERE id_baiviet='$_GET[idbaiviet]' LIMIT 1"; 
    $query_sua_danhmucbv = mysqli_query($mysqli, $sql_sua_danhmucbv);
?> 
<div class="container" style="background-color: #fdfcfa;">
    <br>
    <h4 class="text-center fw-bold">Sửa danh mục bài viết:</h4>

    <form action="modules/quanlydanhmucbaiviet/xuly.php?idbaiviet=<?php echo $_GET['idbaiviet'] ?>" method="post">
        <?php
            while($dong = mysqli_fetch_array($query_sua_danhmucbv)) {

        ?>
        <table class="container table" style="width: 45%">
            <tr>
                <div class="pt-1">
                    <th>Tên danh mục bài viết</th>
                    <td><input type="text" value="<?php echo $dong['tendanhmuc_baiviet'] ?>" name="tendanhmucbaiviet"></td>
                </div>
            </tr>
            <tr>
                <th>Thứ tự</th>
                <td><input type="text" value="<?php echo $dong['thutu'] ?>" name="thutu"></td>
            </tr>    
        </table>
        <div class="col-7 offset-5">
            <input class="btn btn-success" type="submit" name="suadanhmucbaiviet" value="Cập nhật danh mục bài viết">
        </div>
        <br>
        <?php
            }
        ?>
    </form>


  </div>