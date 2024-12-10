<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<?php require_once "ketnoi.php" ?>
<?php 
    session_start();

    if(!isset($_SESSION['mySession'])){
        header('location: login2.php');
    }

    if(isset($_POST['btn'])){
        $noidung = $_POST['noidung'];
    }
    else{
        echo $noidung = false;
    } 
?>

<?php
// Xác định số bản ghi trên mỗi trang
$rows_per_page = 2; 

// Xác định trang hiện tại
$current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Tính OFFSET
$offset = ($current_page - 1) * $rows_per_page;

// Đếm tổng số bản ghi phù hợp
$total_rows_query = "SELECT COUNT(*) as count FROM sinhvien WHERE name LIKE '%$noidung%'";
$total_rows_result = mysqli_query($conn, $total_rows_query);
$total_rows = mysqli_fetch_assoc($total_rows_result)['count'];

// Tính tổng số trang
$total_pages = ceil($total_rows / $rows_per_page);
?>


<br>
<a href="logout.php" class="container">
    <button type="submit" name="dangxuat">Đăng xuất</button>
</a>
<form action="" method="POST" class="container">
    Tìm kiếm: <input type="text" name="noidung">
    <button type="submit" name="btn">Tìm kiếm</button>
</form>
<br>
<div class="container">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
            <th scope="col">lop</th>
            <th scope="col">xoa</th>
            </tr>
        </thead>
    <?php 
        $sql = "SELECT * FROM sinhvien WHERE name LIKE '%$noidung%' ORDER BY id ASC LIMIT $rows_per_page OFFSET $offset";
        $result = mysqli_query($conn, $sql);
        
            
        while($row = mysqli_fetch_array($result)){ ?>
        <tr>  
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['lop']; ?></td>
            <td> <a href="ketnoi.php?delete=<?php echo $row['id']; ?>">Xóa</a>-<a href="sua.php?id=<?php echo $row['id']; ?>">Sửa</a></td>
            </tr> 
    <?php   } ?>
    
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) {?>
            <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['lop']; ?></td>
            <td> <a href="ketnoi.php?delete=<?php echo $row['id']; ?>">Xóa</a>-<a href="sua.php?id=<?php echo $row['id']; ?>">Sửa</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>  
</div>

<div class="container">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <!-- Nút "Previous" -->
            <?php if ($current_page > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $current_page - 1; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            <?php endif; ?>

            <!-- Các số trang -->
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item <?php echo $i == $current_page ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>

            <!-- Nút "Next" -->
            <?php if ($current_page < $total_pages): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $current_page + 1; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>


</body>
</html>