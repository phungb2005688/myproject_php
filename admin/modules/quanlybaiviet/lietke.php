<?php
    $sql_lietke_bv = "SELECT * FROM baiviet, danhmucbaiviet WHERE baiviet.id_danhmuc = danhmucbaiviet.id_baiviet
      ORDER BY baiviet_id DESC"; 
    $query_lietke_bv = mysqli_query($mysqli, $sql_lietke_bv);
?>

<h5 class="fw-bold offset-1"><br> Liệt kê bài viết</h5>
<table class="container table" style="width: 90%; background-color: white;">
    <thead style="background: #d9f7f4;">
      <tr>
        <th>id</th>
        <th style="width: 150px;">Tên bài viết</th>
        <th>Hình ảnh</th>
        <th>Danh mục bài viết</th>
        <th style="width: 280px;">Tóm tắt</th>
        <th>Trạng thái</th>
        <th style="width: 100px;">Quản lý</th>
      </tr>
    </thead>
    
    <?php
        $i = 0;
        while($row = mysqli_fetch_array($query_lietke_bv)) {
            $i++;
    ?>

    <tbody>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['tenbaiviet'] ?></td>
        <td><img src="modules/quanlybaiviet/uploads/<?php echo $row['hinhanh'] ?>" width="100px"></td>
        <td><?php echo $row['tendanhmuc_baiviet'] ?></td>
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
             href="?action=quanlybaiviet&query=sua&idbaiviet=<?php echo $row['baiviet_id'] ?>"><i style="font-size: 25px; color: green" class="fa fa-pencil-square-o"></i></a>
             <span style="padding-left: 5px; padding-right: 5px; font-size: 20px;"> | </span>

            <a class="text-decoration-none"
             href="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row['baiviet_id'] ?>"><i style="font-size: 25px; color: #ff4d5b" class="fa fa-trash"></i></a>
            
        </td>
      </tr>
    </tbody>
    <?php
        }
    ?>
  </table>

