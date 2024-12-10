<?php 
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'ruff';

    $conn = mysqli_connect('localhost', 'root', '', 'ruff', 4306);
    if ($conn)
    {
        echo 'Ket noi thanh cong';
    }
    else
    {
        echo 'Ket noi ko thanh cong';
    }
    mysqli_set_charset($conn,'UTF8');

    if(isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $conn -> query("DELETE FROM sinhvien WHERE id = $id");
        header('Location: quanlysinhvien.php');
    }
?>