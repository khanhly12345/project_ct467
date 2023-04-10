<?php include "../admin/connect.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lí Siêu Thị</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../img/logo.webp">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <main class="main">
        <div class="container">
            <div class="wrrap_h1">
                <h1 style="color: #0dcaf0; text-align: center; position: relative" class="h1">MANAGER SUPERMARKET</h1>
            </div>
            <div id="login">
                <h3 class="text-center text-white pt-5">Login form</h3>
                <div class="container">
                    <div id="login-row" class="row justify-content-center align-items-center">
                        <div id="login-column" class="col-md-6">
                            <div id="login-box" class="col-md-12">
                                <form id="login-form" class="form-login" action="" method="post">
                                    <h3 class="text-center text-info">Login</h3>
                                    <?php 
                                        if(isset($_SESSION['register'])){
                                            echo $_SESSION['register'];
                                            unset($_SESSION['register']);
                                        }
                                        if(isset($_SESSION['check_login'])){
                                            echo $_SESSION['check_login'];
                                            unset($_SESSION['check_login']);
                                        }
                                    ?>
                                    <div class="form-group">
                                        <label for="username" class="text-info">Username:</label><br>
                                        <input type="text" name="username" id="username" class="form-control" required>
                                    </div>
                                    <div class="form-group" style="padding-top: 20px">
                                        <label for="password" class="text-info">Password:</label><br>
                                        <input type="password" name="password" id="password" class="form-control" required>
                                    </div>
                                    <div class="form-group" style="position: relative; left: 240px; top: 30px">
                                        <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                                    </div>
                                    <div id="register-link" class="text-right" style="position: relative; left: 230px; top: 30px">
                                        <a href="reg.php" class="text-info" style="text-decoration: none;">Register here</a>
                                    </div>
                                </form>
                                <?php 
                                    if(isset($_POST['submit'])) {
                                        $username = $_POST['username'];
                                        $password = md5($_POST['password']);
                                        $query = "SELECT * From user where account='$username' AND password='$password'";
                                        $sth = $pdo->prepare($query);
                                        $sth->execute();
                                        $row = $sth->fetch();
                                        $count = $sth->rowCount();
                                        if($count > 0) {
                                            $_SESSION['login'] = "<div class='success'>Login successfully</div>";
                                            $_SESSION['check'] = $row['id'];
                                            echo "<script>window.location = 'index.php'</script>";
                                        }else{
                                            echo "ktc";
                                            
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="validation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
</html>