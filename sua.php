<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title>Thêm sinh viên</title>
</head>
<body>
    <?php 
        require_once 'ketnoi.php'; 
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "SELECT * FROM sinhvien WHERE id = $id";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result) == 1){
                    $row = $result->fetch_array();
                    $id = $row['id'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $lop = $row['lop'];
                }
        }
        if (isset($_POST['edit'])){
            $idup = $_POST['id'];
            $nameup = $_POST['name'];
            $emailup = $_POST['email'];
            $lopup = $_POST['lop'];

            $sql = "UPDATE sinhvien SET id='$idup', name='$nameup', email='$emailup', lop='$lopup' WHERE id=$id ";
                if(mysqli_query($conn, $sql)){
                    echo "<script>alert('Update thành công'); window.location='quanlysinhvien.php'</script>";
                }
                else{
                    echo "<script>alert('Update không thành công');</script>";
                }
        }
    ?>
    <div class="container">
        <form method="POST" action="">
        <div class="form-group">
            <label for="id">id</label>
            <input class="form-control" name="id" value="<?php echo $id; ?>">
        </div>
        <div class="form-group">
            <label for="name">name</label>
            <input class="form-control" name="name" value="<?php echo $name; ?>">
        </div>
        <div class="form-group">
            <label for="email">email</label>
            <input class="form-control" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="form-group">
            <label for="lop">lop</label>
            <input class="form-control" name="lop" value="<?php echo $lop; ?>">
        </div>
        <button type="submit" class="btn btn-primary" name="edit">Sửa</button>
        </form>
    </div>
</body>
</html>