<div class="container" style="background-color: #fdfcfa;">
        <form action="modules/quanlydanhmucbaiviet/xuly.php" method="post">

            <table class="container table" style="width: 45%;">
                <br>
                <h4 class="text-center fw-bold">Thêm danh mục bài viết:</h4>
                <tr>
                    <div class="pt-1">
                        <th>Tên danh mục bài viết</th>
                        <td><input type="text" name="tendanhmucbaiviet"></td>
                    </div>
                </tr>
                <tr>
                    <th>Thứ tự</th>
                    <td><input type="text" name="thutu"></td>
                </tr>    
            </table>
            <div class="col-7 offset-5">
                <input class="btn btn-success" type="submit" name="themdanhmucbaiviet" value="Thêm danh mục bài viết">
            </div>
            <br>
        </form>