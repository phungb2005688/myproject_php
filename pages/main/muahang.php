<?php
    $sql_pro = "SELECT * FROM sanpham WHERE sanpham.id_danhmuc='$_GET[id]' ORDER BY id_sanpham ASC";
    $query_pro = mysqli_query($mysqli, $sql_pro);
    //Lay ten danh muc
    $sql_cate = "SELECT * FROM danhmuc_sp WHERE danhmuc_sp.id_danhmuc='$_GET[id]' LIMIT 1";
    $query_cate = mysqli_query($mysqli, $sql_cate);
    $row_title = mysqli_fetch_array($query_cate);

?>  
<h4 style="display: inline-block; border-bottom: 3px solid #080;"> 
    Danh mục sản phẩm: <?php echo $row_title['tendanhmuc'] ?></h4>
<ul class="product_list">
    <?php
        while ($row_pro = mysqli_fetch_array($query_pro)) {
    ?>
    <li>
        <a class="text-decoration-none" href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham']?>">
            <img src="admin/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>" alt="">
            <p class="title_produce"><?php echo $row_pro['tensanpham'] ?></p>
            <p class="price_produce">Giá: <?php echo number_format($row_pro['giasp'],0,',','.')?> VND</p>
        </a>
    </li>
    <?php
        }
    ?>
    

    
<?php    