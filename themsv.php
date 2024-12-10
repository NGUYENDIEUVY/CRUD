<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title>Thêm sinh viên</title>
</head>
<body>
    <?php require_once 'ketnoi.php' ?>
    <?php 
        if(isset($_POST['add']))
        {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $lop = $_POST['lop'];

            if($conn -> query("INSERT INTO sinhvien (id, name, email, lop) VALUES (N'$id', N'$name', N'$email', N'$lop')"))
            {
                echo "<script>alert('Thêm thành công!')</script>";
                header('Location: quanlysinhvien.php');
            }
            else 
            {
                echo "<script>alert('Thêm thất bại!')</script>";
            }
        }
        $conn->close();
    ?>
    <div class="container">
        <form method="POST" action="">
        <div class="form-group">
            <label for="id">id</label>
            <input name="id" class="form-control" placeholder="Enter id">
        </div>
        <div class="form-group">
            <label for="name">name</label>
            <input name="name" class="form-control" placeholder="name">
        </div>
        <div class="form-group">
            <label for="email">email</label>
            <input name="email" class="form-control" placeholder="email">
        </div>
        <div class="form-group">
            <label for="lop">lop</label>
            <input name="lop" class="form-control" placeholder="lop">
        </div>
        <button type="submit" class="btn btn-primary" name="add">Thêm</button>
        </form>
    </div>
</body>
</html>