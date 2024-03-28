
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script> 

    <div class="container" style="background-color: #fdfcfa;">
        <form action="modules/quanlydanhmucsp/xuly.php" method="post">

            <table class="container table" style="width: 45%;">
                <br>
                <h4 class="text-center fw-bold">Thêm danh mục sản phẩm:</h4>
                <tr>
                    <div class="pt-1">
                        <th>Tên danh mục</th>
                        <td><input type="text" name="tendanhmuc"></td>
                    </div>
                </tr>
                <tr>
                    <th>Thứ tự</th>
                    <td><input type="text" name="thutu"></td>
                </tr>    
            </table>
            <div class="col-7 offset-5">
                <input class="btn btn-success" type="submit" name="themdanhmuc" value="Thêm danh mục sản phẩm">
            </div>
            <br>
            <!-- <input class="btn btn-success" type="submit" name="themdanhmuc" value="Thêm danh mục sản phẩm"> -->
        </form>



    