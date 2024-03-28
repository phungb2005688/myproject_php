<?php
include ("link.php");
?>
<?php
    session_start();
    include("config/connect.php");
    if(isset($_POST['dangnhap'])){
        $taikhoan = $_POST['username'];
        $password = md5($_POST['password']);
        $sql = "SELECT * FROM tbl_admin WHERE username='".$taikhoan."' AND password='".$password."' LIMIT 1";
        $row = mysqli_query($mysqli, $sql);
        $count = mysqli_num_rows($row);//đếm số dòng của $row
        if($count > 0){
            $_SESSION['dangnhap'] = $taikhoan;
            header("Location: index.php");
        } else{
            echo '<script>alert("Tài khoản hoặc Mật khẩu không đúng. Vui lòng nhập lại!!!");</script>';
           # header("Location: login.php");
        }
    }
?>
<body>
    <div class="container pt-3" style="width: 700px;">
        <div style="background-color: rgb(236, 251, 236);">
            <form action="" autocomplete="off" method="post">
                <div class="text-center">
                    <h2 class="font-weight-bold pt-4">ĐĂNG NHẬP ADMIN</h2>
                </div>
                <hr/>
            
                <div class="form-group row pt-4">
                    <label class="col-2 offset-2 pt-1" for="">Tên:</label>
                    <div class="col-7" style="width: 350px;">
                        <input type="text" class="form-control" name="username" placeholder="Nhập tên của bạn" />
                    </div>
                </div>
                <div class="form-group row pt-3">
                    <label class="col-2 offset-2 pt-1" for="password">Mật khẩu:</label>
                    <div class="col-7" style="width: 350px;">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Nhập vào mật khẩu" />
                    </div>
                </div>
                <div class="col-4 offset-4 pt-4" >
                    <div class="offset-2">
                        <button name="dangnhap" class="btn btn-warning me-2" style="background-color:#54c888; border-color:#3CB371 ;" type="submit">Đăng nhập</button>
                        <button class="btn btn-secondary" type="reset">Hủy</button>
                    </div>
                </div>
            </form>
            
            <hr/>

        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</html>
