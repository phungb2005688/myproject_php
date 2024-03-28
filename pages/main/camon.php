<?php
include("admin/config/connect.php");
require("carbon/autoload.php");

use Carbon\Carbon;
use Carbon\CarbonInterval;

$now = Carbon::now('Asia/Ho_Chi_Minh');
if (isset($_GET['partnerCode'])) {
    $code_order = rand(0, 9999);
    $id_khachhang = $_SESSION['id_khachhang'];

    $partnerCode = $_GET['partnerCode'];
    $orderId = $_GET['orderId'];
    $amount = $_GET['amount'];
    $orderInfo = $_GET['orderInfo'];
    $orderType = $_GET['orderType'];
    $transId = $_GET['transId'];
    $payType = $_GET['payType'];
    $cart_payment = 'momo';
    //lay id thong tin van chuyen
    $sql_get_vanchuyen =  mysqli_query($mysqli, "SELECT * FROM shipping WHERE id_dangky = '$id_khachhang' LIMIT 1");
    $row_get_vc = mysqli_fetch_array($sql_get_vanchuyen);
    $id_shipping = $row_get_vc['id_shipping'];

    //insert database momo
    $insert_momo = "INSERT INTO momo(partner_code, order_id, amount, order_info, order_type, trans_id, pay_type, code_cart) VALUES
        ('" . $partnerCode . "', '" . $orderId . "', '" . $amount . "', '" . $orderInfo . "', '" . $orderType . "', '" . $transId . "', '" . $payType . "', '" . $code_order . "')";
    $cart_query = mysqli_query($mysqli, $insert_momo);

    if ($cart_query) {
        $insert_cart = "INSERT INTO cart(id_khachhang, code_cart, cart_status, cart_date, cart_payment, cart_shipping) VALUE('" . $id_khachhang . "', '" . $code_order . "',1, 
            '" . $now . "', '" . $cart_payment . "', '" . $id_shipping . "')";
        $cart_query = mysqli_query($mysqli, $insert_cart);
        //thêm đơn hàng chi tiết
        foreach ($_SESSION['cart'] as $key => $value) {
            $id_sanpham = $value['id'];
            $soluong = $value['soluong'];
            $insert_order_details = "INSERT INTO cart_details(id_sanpham, code_cart, soluongmua) VALUES ('" . $id_sanpham . "',
                '" . $code_order . "', '" . $soluong . "')";
            mysqli_query($mysqli, $insert_order_details);
        }
        echo '
        <div class="mt-4" style="border-radius: 15px; margin-left: 15%; width: 650px; border: 3px solid #080;">
            <h3 class="pt-2 py-2 text-center" style=" color: black; font-size: 18px;">Giao dịch thanh toán bằng <strong>MOMO</strong> thành công!</h3>
        </div>';
    } else {
        echo 'Giao dịch MOMO thất bại';
    }
}
?>

<div class="mt-4" style="border-radius: 15px; margin-left: 15%; width: 650px; border: 3px solid #080;">
    <div style="border: 3px dashed #080; margin:20px; width: 600px; border-radius: 20px;">
        <h6 class="pt-4 py-2 text-center" style=" color: black; font-size: 18px;">
            Cảm ơn bạn đã đặt hàng của <strong>RINEL Cosmetic</strong>
            <br><br>
            Chúng tôi sẽ liên hệ bạn qua <b>Email</b> trong thời gian sớm nhất!
        </h6>
        <img class="rounded mx-auto d-block" style="width: 300px; height: 250px;" src="https://i.pinimg.com/originals/88/66/7e/88667eaf29f1bbf12d64abaaeae6caa2.gif" alt="">

    </div>
</div>