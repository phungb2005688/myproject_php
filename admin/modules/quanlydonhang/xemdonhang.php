<?php
    $sql_lietke_dh = "SELECT * FROM cart_details, sanpham WHERE cart_details.id_sanpham = sanpham.id_sanpham 
    AND cart_details.code_cart = '$_GET[code]' ORDER BY cart_details.id_cart_details DESC"; 
    $query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
?>

<h5 class="fw-bold offset-1 pt-3">Xem đơn hàng</h5>
<div class="pt-3">
    <table class="offset-1 table" style="width: 900px; background-color:white;">
        <thead style="background: #d9f7f4;">
            <tr>
            <th>id</th>
            <th>Mã đơn hàng</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>
            </tr>
        </thead>
      
        <?php
            $i = 0;
            $tongtien=0;
            while($row = mysqli_fetch_array($query_lietke_dh)) {
                $i++;
                $thanhtien = $row['giasp'] * $row['soluongmua'];
                $tongtien += $thanhtien;
        ?>

        <tbody>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['code_cart'] ?></td>
                <td><?php echo $row['tensanpham'] ?></td>
                <td><?php echo $row['soluongmua'] ?></td>
                <td><?php echo number_format($row['giasp'],0,',','.')?></td>
                <td><?php echo number_format($row['giasp'] * $row['soluongmua'],0,',','.')?></td>

            </tr>
        </tbody>
        <?php
            }
        ?>
    </table>
</div>
   
<div class="row">
    <div class="col-3 offset-8" style="padding: 0px 0px 15px 80px;">
        
        <h6 class="fw-bold">Tổng tiền: <?php echo number_format($tongtien,0,',','.'); ?></h6>
        
    </div>
    
</div>
    
