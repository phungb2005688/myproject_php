<?php
include ("link.php");
?>
<style>
    * {
        box-sizing: border-box;
    }

    .details-card {
        width: 80%;
        margin: auto;
    }

    .description-container {
        position: relative;
    }

    .main-description1 {
        position: absolute;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    .main-description h3 {
        font-size: 2rem;
    }

    .add-inputs,
    .add-inputs input {
        float: left;
        margin-right: 10px;
        margin-bottom: 2px;
    }

    .add-inputs button {
        border-radius: 0;
    }

    .add-inputs input {
        height: 48px;
        width: 65px;
        border-radius: 0;
    }


    .product-title {
        font-size: 1.1rem;
        font-weight: bold;
    }

    .product-price {
        font-size: 1.8rem;
    }

    .social-list {
        padding: 0;
        list-style: none;
    }

    .social-list li {
        float: left;
        padding: 6px 8px;
        margin-right: 12px;
    }

    .social-list li a {
        color: black;
        font-size: 2rem;
    }

    .social-list li a i {
        font-size: 2rem;
    }
</style>
</head>
<body>
<div class="container my-1">

<div class="card details-card p-0">
    <div class="row">
     <?php
        $sql_chitiet = "SELECT * FROM sanpham, danhmuc_sp WHERE sanpham.id_danhmuc = danhmuc_sp.id_danhmuc 
            AND sanpham.id_sanpham='$_GET[id]' LIMIT 1";
        $query_chitiet = mysqli_query($mysqli, $sql_chitiet);
        while ($row_chitiet = mysqli_fetch_array($query_chitiet)){
    ?>

        <div class="col-md-6 col-sm-12">
            <img class="img-fluid details-img" style=" margin: 20px; width: 300px; height: 300px;"
                src="admin/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>" alt="">
        </div>
        <div class="col-md-6 col-sm-12 description-container p-5">
            <div class="main-description">
                <form action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham']?>" method="post">
                    <!-- TÊN DANH MỤC -->
                    <p class="product-category mb-0"><?php echo $row_chitiet['tendanhmuc'] ?></p>
                    <!-- TÊN SẢN PHẨM -->
                    <h3><?php echo $row_chitiet['tensanpham'] ?></h3>
                    <hr>
                    <!-- GIÁ SẢN PHẨM -->
                    <p class="product-price"><?php echo number_format($row_chitiet['giasp'],0,',','.') ?> VND</p>

                     <p class="">
                        <button name="themgiohang" type="submit" class="btn btn-success btn-lg" style="background: #fa9c1b; border-color: #fa9c1b;">
                            <i class="bi bi-cart"></i> Thêm vào giỏ hàng</button>
                     </p>   
                    
                    <div style="clear:both"></div>

                    <hr>


                    <p class="product-title mt-4 mb-1">Chi tiết sản phẩm</p>
                    <p class="product-description mb-4">
                        <?php echo ($row_chitiet['noidung']) ?>
                    </p>

                    <hr>
                </form>
                
            </div>
        </div>
    </div>
    <!-- End row -->
</div>
</body>
</html> 

<div class="hinhanh_sanpham">
    <img style="width: 40%;" src="" alt="">
</div>
<div class="chitiet_sanpham">
    <h3></h3>
</div>
<?php
    }
?>