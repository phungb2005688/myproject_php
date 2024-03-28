<?php
    $sql_lietke_dh = "SELECT * FROM cart, user_register WHERE cart.id_khachhang = user_register.id_dangky 
        ORDER BY cart.id_cart DESC"; 
    $query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
?>

<h5 class="fw-bold offset-1 pt-3">Liệt kê đơn hàng</h5>
<div class="pt-3" style="margin-left: 10px;">
    <table class="table" style="width: 1130px; background-color:white;">
        <!-- <thead style="background: #F0E9E9;"> -->
        <thead style="background: #d9f7f4;">

        <tr>
                <th>id</th>
                <th>Mã đơn</th>
                <th>Tên khách hàng</th>
                <th>Địa chỉ</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Tình trạng</th>
                <th>Ngày đặt</th>
                <th>Quản lý</th>
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
                <td><?php echo $row['tenkhachhang'] ?></td>
                <td><?php echo $row['diachi'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['sdt'] ?></td>
                <td>
                    <?php
                        if($row['cart_status'] == 1){
                            echo '<a href="modules/quanlydonhang/xuly.php?code='.$row['code_cart'].'" class="text-decoration-none">
                                Đơn mới</a>';
                        } else{
                            echo 'Đã xử lý';
                        }
                    ?>
                </td>

                <td><?php echo $row['cart_date'] ?></td>
                <td>
                    <a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart'] ?>" 
                        class="text-decoration-none text-warning" style="font-weight: 600;">Xem đơn hàng</a>
                </td>
            </tr>
        </tbody>
        <?php
            }
        ?>
    </table>
    <br>
</div>
    
