<div class="container" style="background-color: #fdfcfa;">
    <h4 class="text-center fw-bold m-3">Thêm bài viết:</h4>
    <form action="modules/quanlybaiviet/xuly.php" method="post" enctype="multipart/form-data">

        <table class="container table" style="width: 80%">
            <tr>
                <th>Tên bài viết</th>
                <td><input style="width: 300px;" type="text" name="tenbaiviet"></td>
            </tr>
            
            <tr>
                <th>Hình ảnh</th>
                <td><input type="file" name="hinhanh"></td>
            </tr>
            <tr>
                <th>Tóm tắt</th>
                <td><textarea name="tomtat" rows="3" cols="50" id="" style="resize: none;"></textarea></td>
            </tr>    
            <tr>
                <th>Nội dung</th>
                <td><textarea name="noidung" rows="5" cols="50" id="" style="resize: none;"></textarea></td>
            </tr>
            <tr>
                <th>Danh mục bài viết</th>
                <td>
                    <select name="danhmuc" id="" style="width: 200px; height: 30px;">
                        <?php
                            $sql_danhmuc = "SELECT * FROM danhmucbaiviet ORDER BY id_baiviet DESC";
                            $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                            while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                        ?>
            
                        <option value="<?php echo $row_danhmuc['id_baiviet']?>"><?php echo $row_danhmuc['tendanhmuc_baiviet']?></option>
                        <?php
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Tình trạng</th>
                <td>
                    <select name="tinhtrang" id="" style="width: 200px; height: 30px;">
                        <option value="1">Kích hoạt</option>
                        <option value="0">Ẩn</option>
                    </select>
                </td>
            </tr>
        </table>
        <div class="col-7 offset-5">
            <input class="btn btn-success" type="submit" name="thembaiviet" value="Thêm bài viết">
        </div>
    </form> 