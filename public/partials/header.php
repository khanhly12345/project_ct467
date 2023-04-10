<?php include "../admin/connect.php";
if(!isset($_SESSION['check'])) {
	echo "<script>window.location = 'login.php  '</script>";
    $_SESSION['check_login'] = "<div class='error'>You need to login to the manager</div>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Siêu Thị</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../img/logo.webp">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="loader-container">
        <div class="loader">
        
        </div>
    </div>
    <div class="header">
        <div class="container">
            <div class="wrrap_main">
                <div class="nav">
                    <img src="../img/logo.webp" alt="">
                    <ul>
                        <li>
                            <a href="index.php?id=user" class="user">Admin</a>
                        </li>
                        <li>
                            <a href="supplier.php?id=supplier" class="supplier">Supplier</a>
                        </li>
                        <li>
                            <a href="product.php?id=product" class="product">Product</a>
                        </li>
                        
                        <li>
                            <a href="order.php?id=order" class="order">Order</a>
                        </li>
                        <li>
                            <a href="logout.php" class="logOut">LogOut</a>
                        </li>
                    </ul>
                    <div class="log">
                        <a href="reg.php">Đăng ký /</a>  <a href="login.php">Đăng nhập</a>
                    </div>
                </div>
            </div>
        </div>
    </div>