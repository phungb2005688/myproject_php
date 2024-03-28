<?php
    $sql_lietke_sp = "SELECT * FROM sanpham, danhmuc_sp WHERE sanpham.id_danhmuc = danhmuc_sp.id_danhmuc
      ORDER BY id_sanpham DESC"; 
    $query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
?>

<h5 class="fw-bold offset-1"><br> Liệt kê sản phẩm</h5>
<table class="container table" style="width: 90%; background-color: white;">
    <thead style="background: #d9f7f4;">
      <tr>
        <th>id</th>
        <th style="width: 150px;">Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Danh mục</th>
        <th>Mã SP</th>
        <th style="width: 280px;">Tóm tắt</th>
        <th>Trạng thái</th>
        <th style="width: 100px;">Quản lý</th>
      </tr>
    </thead>
    
    <?php
        $i = 0;
        while($row = mysqli_fetch_array($query_lietke_sp)) {
            $i++;
    ?>

    <tbody>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['tensanpham'] ?></td>
        <td><img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="100px"></td>
        <td><?php echo $row['giasp'] ?></td>
        <td class="text-center"><?php echo $row['soluong'] ?></td>
        <td><?php echo $row['tendanhmuc'] ?></td>
        <td><?php echo $row['masp'] ?></td>
        <td><?php echo $row['tomtat'] ?></td>
        <td><?php if ($row['tinhtrang'] == 1){
                    echo 'Kích hoạt';
                  } else{
                      echo 'Ẩn';
                  } 
            ?>
        </td>

        <td>            
          <a class="text-decoration-none" 
             href="?action=quanlysp&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>"><i style="font-size: 25px; color: green" class="fa fa-pencil-square-o"></i></a>
             <span style="padding-left: 5px; padding-right: 5px; font-size: 20px;"> | </span>

            <a class="text-decoration-none"
             href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>"><i style="font-size: 25px; color: #ff4d5b" class="fa fa-trash"></i></a> 
            
        </td>
      </tr>
    </tbody>
    <?php
        }
    ?>
  </table>

