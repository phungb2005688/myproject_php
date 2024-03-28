<?php
    $sql_bv = "SELECT * FROM baiviet WHERE baiviet.id_danhmuc='$_GET[id]' ORDER BY baiviet_id DESC";
    $query_bv = mysqli_query($mysqli, $sql_bv);
    //Lay ten danh muc
    $sql_cate = "SELECT * FROM danhmucbaiviet WHERE danhmucbaiviet.id_baiviet='$_GET[id]' LIMIT 1";
    $query_cate = mysqli_query($mysqli, $sql_cate);
    $row_title = mysqli_fetch_array($query_cate);

?>  
<h4 style="display: inline-block; border-bottom: 3px solid #080;"> 
    Danh mục bài viết: <?php echo $row_title['tendanhmuc_baiviet'] ?></h4>
<ul class="">
    <?php
        while ($row_bv = mysqli_fetch_array($query_bv)) {
    ?>


    <li style="list-style: none; width: 900px;">
        <div class="row">                
            <div class="col-3 pt-5">
                <a class="text-decoration-none" href="index.php?quanly=baiviet&id=<?php echo $row_bv['baiviet_id']?>">
                    <img style="width: 250px; height: 200px;" src="admin/modules/quanlybaiviet/uploads/<?php echo $row_bv['hinhanh'] ?>" alt="">
                </a>
                
            </div> 
            <div class="col-8 pt-5" style="margin-left: 5%;">
                <a class="text-decoration-none" href="index.php?quanly=baiviet&id=<?php echo $row_bv['baiviet_id']?>">
                    <h5 style="color: black;"><?php echo $row_bv['tenbaiviet']?></h5>
                </a>
                <p><?php echo $row_bv['tomtat']?></p>
                <hr>

            </div>
        </div>
    </li>
    <?php
        }
    ?>
    
