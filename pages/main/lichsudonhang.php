<?php
    if(isset($_SESSION['id_khachhang'])){
        $id_khachhang = $_SESSION['id_khachhang'];
        $sql_lietke_dh = "SELECT * FROM cart, user_register WHERE cart.id_khachhang = user_register.id_dangky
        AND cart.id_khachhang = '$id_khachhang' ORDER BY cart.id_cart DESC"; 
        $query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);

?>

<h5 class="fw-bold offset-1 pt-2">Lịch sử đơn hàng</h5>
<div class="pt-2" style="margin-left: 50px;">
    <table class="table" style=" width: auto;; background-color:white;">
        <thead style="background: #d9f7f4">
            <tr>
                <th>id</th>
                <th>Mã đơn</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
                <th>Email</th>
                <th>Ngày đặt</th>
                <th>Thanh toán</th>
            </tr>
        </thead>
      
        <?php
            $i = 0;
            while($row = mysqli_fetch_array($query_lietke_dh)) {
                $i++;
        ?>

        <tbody>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['code_cart'] ?></td>
                <td><?php echo $row['diachi'] ?></td> 
                <td><?php echo $row['sdt'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['cart_date'] ?></td>
                <td><?php echo $row['cart_payment'] ?></td>
            </tr>
        </tbody>
        <?php
            }
        ?>
    </table>
    <br>
</div>
<?php
} else{
 ?>   
    <div class="pt-2" style="margin-left: 50px;">
    <table class="table" style=" width: auto;; background-color:white;">
        <thead style="background: #d9f7f4;">
            <tr>
                <th>id</th>
                <th>Mã đơn</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
                <th>Email</th>
                <th>Ngày đặt</th>
                <th>Thanh toán</th>
            </tr>
        </thead>
    </table>
    <br>
</div>
<?php
}
?>
    
