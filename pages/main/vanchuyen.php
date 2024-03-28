<?php
include("link.php");
?>
<style>
  clearfix:after {
    clear: both;
    content: "";
    display: block;
    height: 0;
  }

  .arrow-steps .step {
    font-size: 14px;
    text-align: center;
    color: #777;
    cursor: default;
    margin: 0 1px 0 0;
    padding: 10px 0px 10px 0px;
    width: 15%;
    float: left;
    position: relative;
    background-color: #ddd;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  .arrow-steps .step a {
    color: #777;
    text-decoration: none;
  }

  .arrow-steps .step:after,
  .arrow-steps .step:before {
    content: "";
    position: absolute;
    top: 0;
    right: -17px;
    width: 0;
    height: 0;
    border-top: 19px solid transparent;
    border-bottom: 17px solid transparent;
    border-left: 18px solid #ddd;
    z-index: 2;
  }

  .arrow-steps .step:before {
    right: auto;
    left: 0;
    border-left: 17px solid #fff;
    z-index: 0;
  }

  .arrow-steps .step:first-child:before {
    border: none;
  }

  .arrow-steps .step:first-child {
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
  }

  .arrow-steps .step:last-child {
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
  }

  .arrow-steps .step span {
    position: relative;
  }

  *.arrow-steps .step.done span:before {
    opacity: 1;
    content: "";
    position: absolute;
    top: -2px;
    left: -10px;
    font-size: 11px;
    line-height: 21px;
  }

  .arrow-steps .step.current {
    color: #fff;
    background-color: #87CEFA;
  }

  .arrow-steps .step.current a {
    color: #fff;
    text-decoration: none;
  }

  .arrow-steps .step.current:after {
    border-left: 18px solid #87CEFA;
  }

  .arrow-steps .step.done {
    color: #173352;
    background-color: #4169E1;
  }

  .arrow-steps .step.done a {
    color: #173352;
    text-decoration: none;
  }

  .arrow-steps .step.done:after {
    border-left: 18px solid #4169E1;
  }
</style>
<div class="container">

    <div class="arrow-steps clearfix">
        <div class="step done "> <span> <a href="index.php?quanly=giohang" >Giỏ hàng</a></span> </div>
        <div class="step current"> <span><a href="index.php?quanly=vanchuyen" >Vận chuyển</a></span> </div>
        <div class="step"> <span><a href="index.php?quanly=thongtinthanhtoan" >Thanh toán</a><span> </div>
    </div>
    <br>
    <?php 
    if(isset($_POST['themvanchuyen'])){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $note = $_POST['note'];
        $id_dangky = $_SESSION['id_khachhang'];
        $sql_vanchuyen =  mysqli_query($mysqli,"INSERT INTO shipping(name, phone, address, note, id_dangky) VALUES ('$name', '$phone', '$address', '$note', '$id_dangky')");
       if(isset($sql_vanchuyen)){
        echo '<script>alert("Thêm thông tin vận chuyển thành công!")</script>';
       }
    } else if(isset($_POST['capnhatvanchuyen'])){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $note = $_POST['note'];
        $id_dangky = $_SESSION['id_khachhang'];
        $sql_vanchuyen =  mysqli_query($mysqli,"UPDATE shipping SET name='$name', phone='$phone', 
            address='$address', note='$note', id_dangky='$id_dangky' WHERE id_dangky='$id_dangky'");
       if(isset($sql_vanchuyen)){
        echo '<script>alert("Cập nhật thông tin vận chuyển thành công!")</script>';
       }
    }
    ?>
    <form action="" class="col-lg-7" method="POST">
        <div class="mb-4" style="margin-left: 3%;">
            <div class="card-header border-1" style="background-color: #acdff1; border-radius: 5px;">
                <h4 class="font-weight-semi-bold m-2 py-1" >Thông tin giao hàng</h4>
            </div>
            <div class="row">
                <?php 
                    $id_dangky = $_SESSION['id_khachhang'];
                    $sql_get_vanchuyen =  mysqli_query($mysqli,"SELECT * FROM shipping WHERE id_dangky = '$id_dangky' LIMIT 1");
                    $count = mysqli_num_rows($sql_get_vanchuyen);
                    if($count > 0){
                        $row_get_vc = mysqli_fetch_array($sql_get_vanchuyen);
                        $name = $row_get_vc['name'];
                        $phone = $row_get_vc['phone'];
                        $address = $row_get_vc['address'];
                        $note = $row_get_vc['note'];
                    } 
                    else{
                        $name = '';
                        $phone = '';
                        $address = '';
                        $note = '';
                    }

                ?>
                <div class="col-md-6 form-group">
                    <label class="m-2">Họ và tên</label>
                    <input name="name" class="form-control" type="text" value="<?php echo $name ?>" placeholder="Nguyễn Văn A">
                </div>
                <div class="col-md-6 form-group">
                    <label class="m-2">Số điện thoại</label>
                    <input name="phone" class="form-control" type="text" value="<?php echo $phone ?>"placeholder="0124681012">
                </div>
                
                <div class="col-md-12 form-group">
                    <label class="m-2">Địa chỉ</label>
                    <input name="address" class="form-control" type="text" value="<?php echo $address ?>" placeholder="Đường 3/2 ....">
                </div>
                <div class="col-md-12 form-group">
                    <label class="m-2">Ghi chú</label>
                    <input name="note" class="form-control" type="text" placeholder="Nhập ....">
                </div>
                <?php
                    if(($name != '') && ($phone != '')){
                ?>
                <div class="col-md-12 text-end">
                    <button name="capnhatvanchuyen" class="btn btn-block btn-success my-3  border"
                        type="submit">Cập nhật vận chuyển</button>
                </div>
                <?php
                    } elseif($name == '' && $phone == ''){
                ?>
                <div class="col-md-12 text-end">
                    <button name="themvanchuyen" class="btn btn-block btn-primary my-3 py-2 border"
                        type="submit">Thêm vận chuyển</button>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </form>
    <section class="h-100" style="background-color: #eee; width: 925px; border-radius:15px; margin-top: -20px;">
        <div class="container h-100 py-5">
            
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">

                    <div class="d-flex justify-content-between align-items-center mb-4" style="height: 10px;">
                        <h3 class="fw-normal mb-0 text-black">Giỏ hàng</h3>
                    </div>
                    
                    <?php
                    if(isset($_SESSION['cart'])){
                        $i = 0;
                        $tongtien = 0;
                        foreach($_SESSION['cart'] as $cart_item){
                        $total = $cart_item['soluong'] * $cart_item['giasp'];
                        $tongtien += $total;
                        $i++;
                    ?>
                    <div class="card rounded-3 mb-4">
                        <div class="card-body p-4" style="height: 120px;">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-md-1 col-lg-1 col-xl-1">
                                <!-- HÌNH ẢNH -->
                                    <img src="admin/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>" 
                                    style="width: 85px; height: 85px;" class="img-fluid rounded-3" alt="" >
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-3">
                                <!-- TÊN SẢN PHẨM -->
                                    <p class="fw-bold mb-0"><?php echo $cart_item['tensanpham']; ?></p>
                                </div>
                                <div class="col-md-2 col-lg-2 col-xl-1 d-flex">
                                    <!-- SỐ LƯỢNG -->
                                    <a  href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id']; ?>" class="me-3 text-decoration-none">
                                    <i class="bi bi-file-minus"></i>
                                    </a>
                                    <h5 class="mb-0 me-3"><?php echo $cart_item['soluong']; ?></h5>

                                    <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id']; ?>" class="text-decoration-none">
                                    <i class="bi bi-file-plus"></i>
                                    </a>
                                    <!-- ================================================= -->
                                </div>
                            
                                <div class="col-md-3 col-lg-2 col-xl-2 offset-sm-1">
                                <!-- GIÁ -->
                                    <h5 class="mb-0"><?php echo number_format($cart_item['giasp'],0,',','.').' VND' ; ?></h5>
                                </div>
                                <div class="col-md-3 col-lg-2 col-xl-2 text-end">
                                <!-- THÀNH TIỀN -->
                                    <h5 class="mb-0"><?php echo number_format($total,0,',','.').' VND'; ?></h5>
                                    <!-- <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a> -->
                                </div>
                                <div class="col-md-1 col-lg-1 col-xl-1">
                                    <!-- QUẢN LÝ (XÓA 1 SẢN PHẨM) -->
                                    <a href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                    <!-- TỔNG TIỀN -->
                    <div class="col">
                        <div class="rounded-3 mb-4"style="height: 10px;">
                        <div class="row d-flex text-end align-items-center">
                            <h4>Tổng tiền: <?php echo number_format($tongtien,0,',','.').'đ'; ?></h4>
                        </div>
                        </div>
                    </div>
                    
                    <div style="clear: both;"></div>
                    <?php
                    if(isset($_SESSION['dangky'])){
                    ?>
                    <div class="text-center m-3" style="height: 10px;">
                        <a href="index.php?quanly=thongtinthanhtoan"><button type="button" class="btn btn-success btn-block">
                        Hình thức thanh toán</button></a>
                    </div>
                    <?php
                    } else{
                    ?>
                    <div class="text-center m-3">
                        <a href="index.php?quanly=dangky"><button type="button" 
                            class="btn btn-warning btn-block">Đăng ký để đặt hàng</button></a>
                    </div>
                    
                    <?php
                    }
                    ?>
                    <?php   
                    } else{
                    ?>
                    <div class="col">
                        <div class="card rounded-3 mb-4">
                            <div class="card-body p-4">
                                <div class="row d-flex text-center align-items-center">
                                    <h4>Hiện tại giỏ hàng đang trống</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                    
                </div>
            </div>
        </div>
    </section>
</div>