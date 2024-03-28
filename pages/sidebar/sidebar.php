<div class="sidebar">

    <ul class="list_sidebar">
        <div style="width: 220px; margin-left: 20px; margin-top: 10px;">
            <h6 class="text-center pt-2 pb-2" style="font-size: 18px; border: 2px solid #ffbe8f; border-radius: 8px;">
                DANH MỤC SẢN PHẨM</h6>

        </div>
        <?php
        $sql_danhmuc = "SELECT * FROM danhmuc_sp ORDER BY id_danhmuc ASC";
        $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
        while ($row = mysqli_fetch_array($query_danhmuc)) {
        ?>
            <li>
                <div style="margin-left: 30px; width: 190px; border: 1px dashed #080; border-radius: 5px;">
                    <a style="padding: 2px; padding-left:5px; color: black; font-weight: 500;" href="index.php?quanly=muahang&id=<?php echo $row['id_danhmuc'] ?>"><?php echo $row['tendanhmuc'] ?></a>
                </div>
            </li>
        <?php
        }
        ?>

    </ul>

    <ul class="list_sidebar">
    <div style="width: 220px; margin-left: 20px; margin-top: 10px;">
            <h6 class="text-center pt-2 pb-2" style="font-size: 18px; border: 2px solid #ffbe8f; border-radius: 8px;">
                DANH MỤC BÀI VIẾT</h6>

        </div>
        <!-- <h6 style="font-size: 18px;" class="text-center pt-2 pb-2">DANH MỤC BÀI VIẾT</h6> -->
        <?php
        $sql_danhmuc_bv = "SELECT * FROM danhmucbaiviet ORDER BY id_baiviet ASC";
        $query_danhmuc_bv = mysqli_query($mysqli, $sql_danhmuc_bv);
        while ($row = mysqli_fetch_array($query_danhmuc_bv)) {
        ?>
            <li>
                
            <div style="margin-left: 30px; width: 190px; border: 1px dashed #080; border-radius: 5px;">
                    <a style="padding: 2px; padding-left:5px; color: black; font-weight: 500;" href="index.php?quanly=danhmucbaiviet&id=<?php echo $row['id_baiviet'] ?>"><?php echo $row['tendanhmuc_baiviet'] ?></a>
                </div>
        </li>
        <?php
        }
        ?>

    </ul>
</div>