<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script> 

<?php
    $sql_sua_dmsp = "SELECT * FROM danhmuc_sp WHERE id_danhmuc='$_GET[iddanhmuc]' LIMIT 1"; 
    $query_sua_dmsp = mysqli_query($mysqli, $sql_sua_dmsp);
?> 
<div class="container" style="background-color: #fdfcfa;">
    <br> 
    <h4 class="text-center fw-bold">Sửa danh mục sản phẩm:</h4>

    <form action="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>" method="post">
        <?php
            while($dong = mysqli_fetch_array($query_sua_dmsp)) {

        ?>
        <table class="container table" style="width: 45%">
            <tr>
                <div class="pt-1">
                    <th>Tên danh mục</th>
                    <td><input type="text" value="<?php echo $dong['tendanhmuc'] ?>" name="tendanhmuc"></td>
                </div>
            </tr>
            <tr>
                <th>Thứ tự</th>
                <td><input type="text" value="<?php echo $dong['thutu'] ?>" name="thutu"></td>
            </tr>    
        </table>
        <div class="col-7 offset-5">
            <input class="btn btn-success" type="submit" name="suadanhmuc" value="Sửa danh mục sản phẩm">
        </div>
        <br>
        <?php
            }
        ?>
    </form>


  </div>