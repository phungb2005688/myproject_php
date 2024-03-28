<?php
    session_start();
    if(!isset($_SESSION['dangnhap'])){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN - Quản lý</title>
    <link rel="shortcut icon" href="../images/a.png" type="images">
    <link rel="stylesheet" href="./css/style-admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script> 
    <link rel="stylesheet" href="https://support.google.com/mail/thread/4477145/no-app-passwords-under-security-signing-in-to-google-panel?hl=en">

</head>

<body>
    <div class="my-1"></div>
    <div style="margin-left: 500px;">
            <a href="index.php" class="text-decoration-none"><h5 class="title_admin">WELCOME ADMIN</h5></a>

    </div>
    <div class="wrapper">
    <?php
        include('config/connect.php');
        #BANNER/HEADER
        include("modules/header.php");

        #MENU
        #include("modules/menu.php");

        #MAIN
        include("modules/main.php");

        #FOOTER
        #include("modules/footer.php");
    ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
            CKEDITOR.replace('tomtat');
            CKEDITOR.replace('noidung');
            CKEDITOR.replace('thongtinlienhe');
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            thongke();
            var char = new Morris.Area({
                // ID of the element in which to draw the chart.
                element: 'chart',

                xkey: 'date',
                ykeys: ['date', 'order', 'sales', 'quantity'],
                labels: ['Ngày đặt', 'Đơn hàng', 'Danh thu', 'Số lượng bán']
            });


            $('.select-date').change(function(){
                var thoigian = $(this).val();
                if(thoigian == '7ngay'){
                    var text = '7 ngày qua';
                } else if(thoigian == '28ngay'){
                    var text = '28 ngày qua';
                }else if(thoigian == '90ngay'){
                    var text = '90 ngày qua';
                }else {
                    var text = '356 ngày qua';
                }
                $('#text-date').text(text);
                $.ajax({
                    url:"modules/thongke.php",
                    method:"POST",
                    dataType:"JSON",
                    data: {thoigian:thoigian},

                    success: function(data){
                        char.setData(data);
                        $('#text-date').text(text);
                    }
                })
            })

            function thongke(){
                var text = '365 ngày';
                $('#text-date').text(text);

                $.ajax({
                    url:"modules/thongke.php",
                    method:"POST",
                    dataType:"JSON",

                    success: function(data){
                        char.setData(data);
                        $('#text-date').text(text);
                    }
                })
            }
        });
    </script>
    <?php
    #FOOTER
        include("modules/footer.php");
    ?>
</body>
</html>