<?php
    $sql_lh = "SELECT * FROM lienhe WHERE id=1"; 
    $query_lh = mysqli_query($mysqli, $sql_lh);
?> 

<div class="container" style="background-color: #fdfcfa;">
    <h4 class="text-center fw-bold m-3">Quản lý thông tin website</h4>
    <?php
        while ($dong = mysqli_fetch_array($query_lh)) {
    ?>
    <form action="modules/thongtinweb/xuly.php?id=<?php echo $dong['id'] ?>" method="post" enctype="multipart/form-data">

        <table class="container table" style="width: 80%">
            
            <tr>
                <th>Thông tin liên hệ</th>
                <td><textarea name="thongtinlienhe" rows="5" cols="50" id="" style="resize: none;"><?php echo $dong['thongtinlienhe'] ?></textarea></td>
            </tr>
            
        </table>            

        <div style="margin-left: 500px; margin-bottom: 10px;">
            <input class="btn btn-success" type="submit" name="submitlienhe" value="Cập nhật">
        </div>
        <?php
            }
        ?>
    </form>
