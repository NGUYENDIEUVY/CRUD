<?php
include 'ketnoi.php';

if (isset($_POST['btn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username, email, password)
    VALUES ('$username', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        header('location: login2.php');
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
}
?>


<form action="signup.php" method="post">
    username: <input type="text" name="username">
    password: <input type="text" name="password">
    email: <input type="text" name="email">
    <button type="submit" name="btn">Sign up</button>
</form>