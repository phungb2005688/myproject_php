<?php
    $sql_lietke_dmbv = "SELECT * FROM danhmucbaiviet ORDER BY thutu DESC"; 
    $query_lietke_dmbv = mysqli_query($mysqli, $sql_lietke_dmbv);
?>

    <h5 class="fw-bold offset-1">Liệt kê danh mục bài viết</h5>
    <div class="pt-3">
      <table class="offset-1 table" style="width: 500px; background-color:white;">
        <thead style="background: #d9f7f4">
          <tr>
            <th>id</th>
            <th>Tên danh mục bài viết</th>
            <th>Quản lý</th>
          </tr>
        </thead>
      
        <?php
            $i = 0;
            while($row = mysqli_fetch_array($query_lietke_dmbv)) {
                $i++;
        ?>

        <tbody>
          <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row['tendanhmuc_baiviet'] ?></td>
            <td>
              <a href="?action=quanlydanhmucbaiviet&query=sua&idbaiviet=<?php echo $row['id_baiviet'] ?>" 
                    class="text-decoration-none"><i style="font-size: 25px; color: green" class="fa fa-pencil-square-o"></i></a>
                                <span style="padding-left: 5px; padding-right: 5px; font-size: 20px;"> | </span>

                <a href="modules/quanlydanhmucbaiviet/xuly.php?idbaiviet=<?php echo $row['id_baiviet'] ?>" 
                    class="text-decoration-none"><i style="font-size: 25px; color: #ff4d5b" class="fa fa-trash"></i></a>

                </td>
          </tr>
        </tbody>
        <?php
            }
        ?>
      </table>
    </div>
    <br>
  </div>

