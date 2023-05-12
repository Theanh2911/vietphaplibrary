<!-- <?php
//Lấy dữ liệu form Đăng nhập: Tên đăng nhập + Mật khẩu

if (isset($_POST['btn_reg'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    echo $username . '-' . $password. '-' .$fullname. '-'.$phone;
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
        <style>
            label {display: block;padding: 8px 0px;}
            input {display: block;}
            #btn_reg {margin-top: 20px}
        </style>
        <h1>From Đăng ký</h1>
        <form method="login.php" action="">
            <label for="fullname">Họ và tên</label>
            <input type="text" name="fullname" id="username"/>
            <label for="username">Tên đăng nhập</label>
            <input type="text" name="username" id="username"/>
            <label for="password">Mật khẩu</label>
            <input type="password" name="password" id="password"/>
            <label for="phone">Số điện thoại</label>
            <input type="text" name="phone" id="username"/>

            <input type="submit" id="btn_reg"name="btn_reg" value="Đăng ký"/>

        </form>
    </body>
</html> -->