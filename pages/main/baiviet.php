<?php
    $sql_bv = "SELECT * FROM baiviet WHERE baiviet.baiviet_id='$_GET[id]' LIMIT 1";
    $query_bv = mysqli_query($mysqli, $sql_bv);
    $query_bv_ALL = mysqli_query($mysqli, $sql_bv);

    $row_bv_title = mysqli_fetch_array($query_bv);
?>  

<style>
    #h1-meo{
    color: #329bdc;
    font-weight: bold;
    font-family: cursive;
    text-align: center;
    }
    #p-meo{
        text-align: justify;
    }
    #ul-meo{
        list-style: decimal;
    }
    .help-hinhanh{
        width: 250px;
        height: 250px;
        padding-top: 10px;
        padding-bottom: 10px;
    }
    #li-meo{
        font-size: 20px;
        font-weight: bold;
        color: #f069de;
        margin: 10px;
    }
</style>
<h4 style="display: inline-block; border-bottom: 3px solid #080;"> 
    <?php echo $row_bv_title['tenbaiviet'] ?></h4>
<ul class="">
    <?php
        while ($row_bv = mysqli_fetch_array($query_bv_ALL)) {
    ?>

    <li style="list-style: none; width: 900px;">
        <div class="container">
            <img class="img-fluid pt-5" src="../../images/meo-html.png" alt="">
            <h1 id="h1-meo"><?php echo $row_bv_title['tenbaiviet'] ?></h1>
            <div>
                <?php echo $row_bv_title['noidung'] ?>
            </div>
           
        </div>
    </li>
    <?php
        }
    ?>
    
