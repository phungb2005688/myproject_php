<?php
include("link.php");
?>
<?php
$error = "";
if (isset($_POST['dangky'])) {
    $tenkhachhang = $_POST['hovaten'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $diachi = $_POST['diachi'];
    $matkhau = $_POST['matkhau'];

    if (empty($tenkhachhang) || empty($email) || empty($dienthoai) || empty($diachi) || empty($matkhau)) {
        $error .= "Vui lòng điền đầy đủ thông tin!</br>";
    } elseif (strlen($matkhau) == 0) {
        $error .= "Mật khẩu không được để trống!</br>";
    }

    if (empty($error)) {
        // Sử dụng prepared statement
        $stmt = $mysqli->prepare("INSERT INTO user_register(tenkhachhang, email, sdt, matkhau, diachi) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $tenkhachhang, $email, $dienthoai, password_hash($matkhau, PASSWORD_DEFAULT), $diachi);

        if ($stmt->execute()) {
            echo '<script>alert("' . htmlspecialchars("Bạn đã đăng ký thành công. Hãy quay lại trang giỏ hàng") . '")</script>';

            $_SESSION['dangky'] = $tenkhachhang;
            $_SESSION['email'] = $email;

            $_SESSION['id_khachhang'] = $stmt->insert_id;

            header('Location: index.php');
        } else {
            $error .= "Đã xảy ra lỗi khi đăng ký. Vui lòng thử lại sau!</br>";
        }

        $stmt->close();
    }
}
if (isset($_POST['dangnhap'])) {
    header('Location: index.php?quanly=dangnhap');
}
ob_end_flush();
?>

<body>
<style>
.signup{
    background-color: #878787 !important;
}
.signup:hover{
    background-color: #080 !important;
}
.signin:hover{
    background-color: #5b2600 !important;
    border: 1px solid #5b2600 !important;
}
</style>
    <div class="container pt-1" style="width: 880px;">
        <!-- <div style="background-color: rgb(240, 251, 251);"> -->
        <div style="background-color: #fff7f1">

            <div class="text-center">
                <h2 class="font-weight-bold pt-3">ĐĂNG KÝ </h2>
            </div>
            <hr />
            <form action="" method="post">
                <?php
                if ($error != "") {

                ?>
                    <div class="alert alert-danger w-75 m-auto"> <?php echo $error ?></div>
                <?php
                }
                ?>
                <div class="row">
                    <div class="col-5 offset-3 pt-2" style="width: 400px;">
                        <input value="<?= isset($tenkhachhang) ? $tenkhachhang : "" ?>" class="form-control m-3" type="text" name="hovaten"  pattern="[a-zA-Zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễđìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữýỳỵỷỹ\s]+" placeholder="Nhậọ vào tên của bạn">
                        <input value="<?= isset($email) ? $email : "" ?>" class="form-control m-3" type="email" name="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"  placeholder="Nhập Email của bạn">
                        <input value="<?= isset($dienthoai) ? $dienthoai : "" ?>" class="form-control m-3" type="tel" name="dienthoai" pattern="[0-9]{10}"  minlength="8" maxlength="10" placeholder=" Nhập số điện thoại">
                        <input value="<?= isset($diachi) ? $diachi : "" ?>" class="form-control m-3" type="text" name="diachi" placeholder="Nhập địa chỉ của bạn">
                        <input class="form-control m-3" type="password" name="matkhau"  pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$" placeholder="Nhập mật khẩu">
                        <div class="offset-3 pt-2">
                            <button class="btn signup text-white me-4" name="dangky" type="submit">Đăng ký</button>
                            <a href="index.php?quanly=dangnhap"><button class="btn btn-dark signin" name="dangnhap" type="submit">Đăng nhập</button></a>
                        </div>
                        <br>
                    </div>
                </div>
            </form>
        </div>
    </div>


</body>

</html>