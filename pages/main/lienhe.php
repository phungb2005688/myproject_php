<?php
    $sql_lh = "SELECT * FROM lienhe WHERE id=1"; 
    $query_lh = mysqli_query($mysqli, $sql_lh);
?> 

<div class="container" style="background-color: #fff7f1; height: 500px; width: 850px;">
<br>
    <h4 class="text-center fw-bold m-3">LIÊN HỆ VỚI CHÚNG TÔI</h4>
    <?php
        while ($dong = mysqli_fetch_array($query_lh)) {
    ?>
    <p><?php echo $dong['thongtinlienhe']?></p>
    <?php
        }
    ?>
