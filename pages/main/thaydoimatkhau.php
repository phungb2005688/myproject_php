<?php
    if(isset($_POST['doimatkhau'])){
        $taikhoan = $_POST['email'];
        $password_old = $_POST['password_cu'];
        $password_new1 = $_POST['password_moi'];
        $password_new2 = $_POST['password_cmoi'];
    
        // Sử dụng prepared statement để ngăn chặn SQL Injection
        $stmt = $mysqli->prepare("SELECT matkhau FROM user_register WHERE email=? LIMIT 1");
        $stmt->bind_param("s", $taikhoan);
        $stmt->execute();
        $stmt->bind_result($hashed_password);
        $stmt->fetch();
        $stmt->close();
    
        if(password_verify($password_old, $hashed_password) && ($password_new1 != $password_old) && ($password_new1 == $password_new2)){
            // Sử dụng bcrypt để hash mật khẩu mới
            $hashed_new_password = password_hash($password_new1, PASSWORD_DEFAULT);
    
            $stmt_update = $mysqli->prepare("UPDATE user_register SET matkhau=? WHERE email=?");
            $stmt_update->bind_param("ss", $hashed_new_password, $taikhoan);
    
            if($stmt_update->execute()){
                echo '<script>alert("Mật khẩu đã được thay đổi");</script>';
            } else {
                echo '<script>alert("Đã xảy ra lỗi khi cập nhật mật khẩu");</script>';
            }
    
            $stmt_update->close();
        } elseif(password_verify($password_old, $hashed_password) && ($password_new1 == $password_old)){
            echo '<script>alert("Mật khẩu mới không được trùng với mật khẩu cũ!");</script>';
        } elseif(password_verify($password_old, $hashed_password) && ($password_new1 != $password_new2)){
            echo '<script>alert("Mật khẩu mới không giống nhau!!!");</script>';
        } else{
            echo '<script>alert("Email hoặc Mật khẩu cũ không đúng. Vui lòng nhập lại!!!");</script>';
        }
    }
?>
<body>
    <div class="container pt-3" style="width: 700px;">
        <div style="background-color: #fff7f1;">
            <form action="" autocomplete="off" method="post">
                <div class="text-center">
                    <h2 class="font-weight-bold pt-4">ĐỔI MẬT KHẨU</h2>
                </div>
                <hr/>
            
                <div class="form-group row pt-4">
                    <label class="col-3 offset-2 pt-1" for="">Email:</label>
                    <div class="col-7" style="width: 350px;">
                        <input type="text" class="form-control" name="email" placeholder="Nhập email của bạn" />
                    </div>
                </div>
                <div class="form-group row pt-3">
                    <label class="col-3 offset-2 pt-1" for="password">Mật khẩu cũ:</label>
                    <div class="col-7" style="width: 350px;">
                        <input type="password" class="form-control" id="password" name="password_cu" placeholder="Nhập mật khẩu cũ" />
                    </div>
                </div>
                <div class="form-group row pt-3">
                    <label class="col-3 offset-2 pt-1" for="password">Mật khẩu mới:</label>
                    <div class="col-7" style="width: 350px;">
                        <input type="password" class="form-control" id="password" name="password_moi" placeholder="Nhập mật khẩu mới" />
                    </div>
                </div>
                <div class="form-group row pt-3">
                    <label class="col-3 offset-2 pt-1" for="password">Nhập lại mật khẩu:</label>
                    <div class="col-7" style="width: 350px;">
                        <input type="password" class="form-control" id="password" name="password_cmoi" placeholder="Nhập lại mật khẩu mới" />
                    </div>
                </div>
                <div class="col-4 offset-4 pt-4" >
                    <div class="offset-2">
                        <button name="doimatkhau" class="btn text-white me-2 changepw" style="background-color:#008e00; border-color:#3CB371 ;" 
                            type="submit">Đổi mật khẩu</button>
                        <button class="btn btn-secondary" type="reset">Hủy</button>
                    </div>
                </div>
            </form>
            
            <hr/>

        </div>
    </div>
    <style>
        .changepw:hover{
            background-color: black !important;
        }
    </style>
</body>