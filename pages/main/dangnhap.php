<?php
include("link.php");
?>
<?php
// session_start();
// include("config/connect.php");
if (isset($_POST['dangnhap'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Sử dụng prepared statement để ngăn chặn SQL Injection
    $stmt = $mysqli->prepare("SELECT * FROM user_register WHERE email=? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row_data = $result->fetch_assoc();

        // Sử dụng password_verify để kiểm tra mật khẩu
        if (password_verify($password, $row_data['matkhau'])) {
            $_SESSION['dangky'] = $row_data['tenkhachhang'];
            $_SESSION['email'] = $row_data['email'];
            $_SESSION['id_khachhang'] = $row_data['id_dangky'];

            header('Location: index.php');
        } else {
            echo '<script>alert("Email hoặc Mật khẩu sai. Vui lòng nhập lại!!!")</script>';
        }
    } else {
        echo '<script>alert("Email hoặc Mật khẩu sai. Vui lòng nhập lại!!!")</script>';
    }

    $stmt->close();
}
ob_end_flush();
?>

<body>
    <div class="container pt-3" style="width: 700px;">
        <div style="background-color: #fff7f1;">
            <form action="" autocomplete="off" method="post">
                <div class="text-center">
                    <h2 class="font-weight-bold pt-4">ĐĂNG NHẬP</h2>
                </div>
                <hr />

                <div class="form-group row pt-4">
                    <label class="col-2 offset-2 pt-1" for="">Email:</label>
                    <div class="col-7" style="width: 350px;">
                        <input type="text" class="form-control" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Nhập email của bạn" />
                    </div>
                </div>
                <div class="form-group row pt-3">
                    <label class="col-2 offset-2 pt-1" for="password">Mật khẩu:</label>
                    <div class="col-7" style="width: 350px;">
                        <input type="password" class="form-control" id="password" name="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$" required placeholder="Nhập vào mật khẩu" />
                    </div>
                </div>
                <div class="col-4 offset-4 pt-4">
                    <div class="offset-2">
                        <button name="dangnhap" class="btn btn-warning me-2 signin2 text-white" style="background-color:#008e00; border-color:#3CB371 ;" type="submit">Đăng nhập</button>
                        <button class="btn btn-secondary" type="reset">Hủy</button>
                    </div>
                </div>
            </form>

            <hr />

        </div>
    </div>
    <style>
        .signin2:hover{
            background-color: black !important;
        }
    </style>
</body>

</html>