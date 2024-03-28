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
    $insert_cart = "INSERT INTO cart(id_khachhang, code_cart, cart_status, cart_date) VALUE('".$id_khachhang."', '".$code_order."',1, '".$now."')";
    $cart_query = mysqli_query($mysqli, $insert_cart);
    if($cart_query){
        //thêm giỏ hàng chi tiết
        foreach($_SESSION['cart'] as $key => $value){
            $id_sanpham = $value['id'];
            $soluong = $value['soluong'];
            $insert_order_details = "INSERT INTO cart_details(id_sanpham, code_cart, soluongmua) VALUE('".$id_sanpham."', '".$code_order."', '".$soluong."')";
            mysqli_query($mysqli, $insert_order_details);
        }
        $tieude = "Đơn đặt hàng tại RINEL Cosmetic đã thành công!!";
        // $noidung = ;
        $noidung = "<h4>Đơn đặt hàng bao gồm: </h4>";

        foreach($_SESSION['cart'] as $key => $val){
            $noidung.= "<ul style='border: 1px solid #f1e8d9; list-style: none; margin: 10px; padding: 10px; width: 400px;'>
                    <li>".$val['tensanpham']."</li>
                    <li>".'Giá sản phẩm: ' .number_format($val['giasp'], 0, ',', '.')."đ</li>
                    <li>".'Số lượng: '.$val['soluong']."</li>
                    </ul>
                    <br>
                    <p>Cảm ơn quý khách đã đặt hàng của <b>RINEL Cosmetic</b>, mã đơn hàng của bạn là: ".$code_order."</p>"
                    ;
        }
        $maildathang = $_SESSION['email'];
        $mail = new Mailer();
        $mail->dathangmail($tieude, $noidung, $maildathang);
    }
    header("Location: ../../index.php?quanly=camon");

    unset($_SESSION['cart']);
    ob_end_flush();

?>