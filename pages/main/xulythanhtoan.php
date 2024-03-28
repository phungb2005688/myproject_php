<?php
    session_start();
    include("../../admin/config/connect.php");
    require("../../mail/sendmail.php");
    require("../../carbon/autoload.php");

    use Carbon\Carbon;
    use Carbon\CarbonInterval;

    $now = Carbon::now('Asia/Ho_Chi_Minh');
    $id_khachhang = $_SESSION['id_khachhang'];
    $code_order = rand(0,9999);
    $cart_payment = $_POST['payment'];

    //Lay id thong tin van chuyen
    $id_dangky = $_SESSION['id_khachhang'];
    $sql_get_vanchuyen =  mysqli_query($mysqli,"SELECT * FROM shipping WHERE id_dangky = '$id_dangky' LIMIT 1");
    $row_get_vc = mysqli_fetch_array($sql_get_vanchuyen);
    $id_shipping = $row_get_vc['id_shipping'];
    $tongtien = 0;
    foreach($_SESSION['cart'] as $key => $value){
        $thanhtien = $value['soluong'] * $value['giasp'];
        $tongtien += $thanhtien;
    }

    if($cart_payment == 'tienmat' || $cart_payment == 'chuyenkhoan'){
        //insert cart
        $insert_cart = "INSERT INTO cart(id_khachhang, code_cart, cart_status, cart_date, cart_payment, cart_shipping) VALUE('".$id_khachhang."', '".$code_order."',1, 
            '".$now."', '".$cart_payment."', '".$id_shipping."')";
        $cart_query = mysqli_query($mysqli, $insert_cart);
        //thêm giỏ hàng chi tiết
        foreach($_SESSION['cart'] as $key => $value){
            $id_sanpham = $value['id'];
            $soluong = $value['soluong'];
            // ==================================
            $insert_order_details = "INSERT INTO cart_details(id_sanpham, code_cart, soluongmua) VALUE('".$id_sanpham."', '".$code_order."', '".$soluong."')";
            mysqli_query($mysqli, $insert_order_details);
        }
        header('Location: ../../index.php?quanly=camon');
    }
    
        $tieude = "Đơn đặt hàng tại RINEL Cosmetic Shop đã thành công!!";
        $noidung = "<p>Cảm ơn quý khách đã đặt hàng của <b>RINEL Cosmetic</b>, mã đơn hàng của bạn là: ".$code_order."</p>";
        $noidung = "<h4>Đơn đặt hàng bao gồm: </h4>";

        foreach($_SESSION['cart'] as $key => $val){
            $noidung.= "<ul style='border: 1px solid #f1e8d9; list-style: none; margin: 10px; padding: 10px; width: 400px;'>
                    <li>".$val['tensanpham']."</li>
                    <li>".'Giá sản phẩm: ' .number_format($val['giasp'], 0, ',', '.')."đ</li>
                    <li>".'Số lượng: '.$val['soluong']."</li>
                    </ul>";
        }
        $maildathang = $_SESSION['email'];
        $mail = new Mailer();
        $mail->dathangmail($tieude, $noidung, $maildathang);
    
    header("Location: ../../index.php?quanly=camon");

    unset($_SESSION['cart']);
    ob_end_flush();

?>