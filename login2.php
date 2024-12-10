<?php
include "ketnoi.php";

session_start();
if(isset($_SESSION['mySession'])){
    header('location: quanlysinhvien.php');
}



if(isset($_POST['dangnhap'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows == 1){
        $_SESSION['mySession'] = $username;
        header("location: quanlysinhvien.php");
    }
    else{
        echo "Tài khoản hoặc mật khẩu sai";
    }
    $stmt->close();
}
?>

<form action="login2.php" method="post">

<label>username</label>
<input type="text" name="username">

<label>password</label>
<input type="password" name="password">

<button type="submit" name="dangnhap">Đăng nhập</button>
<button type="submit" name="dangky"><a href="signup.php">Đăng ký</a></button>
</form>
<br>
