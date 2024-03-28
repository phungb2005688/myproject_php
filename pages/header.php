<?php
ob_start();
$sql_danhmuc = "SELECT * FROM danhmuc_sp ORDER BY id_danhmuc ASC";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
?>
<?php
if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    unset($_SESSION['dangky']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RINEL</title>
    <link rel="shortcut icon" href="./images/a.png"  type="images">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <link rel="stylesheet" href="./css/style.css">
    <style>
        .carousel_css {
            z-index: 10;
            height: 330px;
            margin: auto;
            width: 1000px;
        }

        .active2 {
            border-radius: 5px;
            background-color: black;
            border: 1px solid #000;
        }
    </style>
</head>

<body>


    <nav class="fixed-top navbar navbar-expand-lg " style="background-color: green ;">

        <div class="container-fluid">

            <!-- NÚT MENU -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar" aria-controls="navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- LOGO -->
            <a href="index.php"><img class="navbar-brand" style="width: 60px; height: 50px;" src="./images/a.png" alt=""></a>

            <?php

            $uri = $_SERVER['REQUEST_URI'];
            $url = explode("?", $uri);
            $checkexist = strpos($uri, "quanly") != false;
            if (strpos($uri, "quanly") != false) {
                $quanly = $_GET['quanly'];
            }

            ?>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="col-7 navbar-nav me-5 ">

                    <li class="nav-item">
                        <a class="nav-link active text-white <?= $url[0] == '/CT466/index.php' && $checkexist == false ? 'active2' : '' ?>" aria-current="page" href="index.php">TRANG CHỦ</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            DANH MỤC
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                            ?>
                                <li><a class="dropdown-item" href="index.php?quanly=muahang&id=<?php echo $row_danhmuc['id_danhmuc'] ?>">
                                        <?php echo $row_danhmuc['tendanhmuc'] ?>
                                    </a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active text-white <?= $quanly == 'tintuc' ? 'active2' : '' ?>" aria-current="page" href="index.php?quanly=tintuc">TIN TỨC </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white <?= $quanly == 'lichsudonhang' ? 'active2' : '' ?>" aria-current="page" href="index.php?quanly=lichsudonhang">ĐƠN HÀNG</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active text-white <?= $quanly == 'lienhe' ? 'active2' : '' ?>" aria-current="page" href="index.php?quanly=lienhe">LIÊN HỆ</a>
                    </li>

                    <?php
                    if (isset($_SESSION['dangky'])) {
                    ?>


                        <li class="nav-item">
                            <a class="nav-link active text-white me-2 <?= $quanly == 'thaydoimatkhau' ? 'active2' : '' ?>" href="index.php?quanly=thaydoimatkhau">ĐỔI MẬT KHẨU</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="index.php?dangxuat=1"><i style="font-size: 25px;" class="fa fa-sign-out"></i></a>
                        </li>

                    <?php
                    } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link active text-white <?= $quanly == 'dangky' ? 'active2' : '' ?>" href="index.php?quanly=dangky">ĐĂNG KÝ</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <!--===== TÌM KIẾM =====-->

                <div class="col-4">
                    <form action="index.php?quanly=timkiem" method="POST" class="d-flex">
                        <input class="form-control me-2" type="search" name="tukhoa" placeholder="Tìm kiếm sản phẩm..." aria-label="Search">
                        <button class="btn me-2" name="timkiem" type="submit" style="background-color: white;">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                </div>
                <!--===== GIỎ HÀNG =====-->
                <ul class="col-1 navbar-nav" >
                    <li class="nav-item">
                        <a class="btn " href="index.php?quanly=giohang" >
                            <i class="bi bi-cart text-white <?= $quanly == 'giohang' ? 'active2' : '' ?>" style="margin-left: -10px; padding: 5px 10px; font-size: 20px; border: 1px solid #fff; border-radius: 5px;"></i></a>
                    </li>
                </ul>

            </div>

        </div>
    </nav>
    <hr />
    <hr />