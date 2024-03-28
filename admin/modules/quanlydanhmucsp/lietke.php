<?php
$sql_lietke_dmsp = "SELECT * FROM danhmuc_sp ORDER BY thutu DESC";
$query_lietke_dmsp = mysqli_query($mysqli, $sql_lietke_dmsp);
?>

<h5 class="fw-bold offset-1">Liệt kê danh mục sản phẩm</h5>
<div class="pt-3">
  <table class="offset-1 table" style="width: 500px; background-color:white;">
    <thead style="background: #d9f7f4;">
      <tr>
        <th>id</th>
        <th>Tên danh mục</th>
        <th>Quản lý</th>
      </tr>
    </thead>

    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_dmsp)) {
      $i++;
    ?>

      <tbody>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $row['tendanhmuc'] ?></td>
          <td>
            <a href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>" class="text-decoration-none"><i style="font-size: 25px; color: green" class="fa fa-pencil-square-o"></i></a>
            <span style="padding-left: 5px; padding-right: 5px; font-size: 20px;"> | </span>
            <a href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>" class="text-decoration-none"><i style="font-size: 25px; color: #ff4d5b" class="fa fa-trash"></i></a>
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