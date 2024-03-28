<?php
if (isset($_GET['trang'])) {
    $page = $_GET['trang'];
} else {
    $page = '';
}
if ($page == '' || $page == 1) {
    $begin = 0;
} else {
    $begin = ($page * 10) - 10;
}
$sql_pro = "SELECT * FROM sanpham, danhmuc_sp WHERE sanpham.id_danhmuc = danhmuc_sp.id_danhmuc 
        ORDER BY sanpham.id_sanpham ASC LIMIT $begin, 10";
$query_pro = mysqli_query($mysqli, $sql_pro);
?>
<h4 style="display: inline-block; border-bottom: 3px solid #080;">Sản phẩm mới nhất:</h4>
<ul class="product_list">
    <?php
    while ($row = mysqli_fetch_array($query_pro)) {
    ?>
        <li>
            <a class="text-decoration-none" href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                <img src="admin/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" alt="">
                <p class="title_produce"><?php echo $row['tensanpham'] ?></p>
                <p class="price_produce">Giá: <?php echo number_format($row['giasp'], 0, ',', '.') ?> VND</p>
                <p style="font-weight: 600; text-align: center; color: #ff6f06;"><?php echo $row['tendanhmuc'] ?></p>
            </a>
        </li>
    <?php
    }
    ?>
</ul>
<div style="clear: both;"></div>

<nav aria-label="Page navigation example">
    <?php
    $sql_trang = mysqli_query($mysqli, "SELECT * FROM sanpham");
    $row_count = mysqli_num_rows($sql_trang);
    $trang = ceil($row_count / 10);
    ?>
    <ul class="pagination pt-5" style="padding-left:350px;">
        <?php
        for ($i = 1; $i <= $trang; $i++) {
        ?>

            <li class="page-item">
                <a <?php if ($i == $page) {
                        echo 'style="background-color: #F8C8DC; color: white;"';
                    } else {
                        echo '';
                    } ?> href="index.php?trang=<?php echo $i; ?>" style="font-weight: 600; color: #ccc;" class="page-link fs-4 me-3 ">
                    <?php echo $i; ?></a>
            </li>
        <?php
        }
        ?>

    </ul>
</nav>