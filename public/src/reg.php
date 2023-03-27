<?php include "../admin/connect.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../img/logo.webp">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <main class="main">
        <div class="container ">
            <div class="wrrap_h1">
                <h1 style="color: #0dcaf0; text-align: center; position: relative" class="h1">MANAGER SUPERMARKET</h1>
            </div>
            <div id="login">
                <h3 class="text-center text-white pt-5">Login form</h3>
                <div class="container">
                    <div id="login-row" class="row justify-content-center align-items-center">
                        <div id="login-column" class="col-md-6">
                            <div id="login-box" class="col-md-12">
                                <form id="login-form" class="form-reg" action="" method="post">
                                    <h3 class="text-center text-info">Register</h3>
                                    
                                    <div class="form-group">
                                        <label for="fullname" class="text-info">Fullname:</label><br>
                                        <input type="text" name="fullname" id="fullname" class="form-control" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="username" class="text-info">Username:</label><br>
                                        <input type="text" name="username" id="username" class="form-control" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="text-info">Password:</label><br>
                                        <input type="password" name="password" id="password" class="form-control" required/>
                                    </div>
                                    <div class="form-group" style="position: relative; left: 240px; top: 15px">
                                        <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                                    </div>
                                    <div id="register-link" class="text-right" style="position: relative; left: 238px; top: 10px">
                                        <a href="login.php" class="text-info" style="text-decoration: none;">Login here</a>
                                    </div>
                                </form>
                                <?php 
                                    if(isset($_POST['submit'])) {
                                        $query = "call procedure_user_insert(?,?,?)";
                                        $sth = $pdo->prepare($query);
                                        $sth->execute([
                                            $_POST['fullname'],
                                            $_POST['username'],
                                            md5($_POST['password'])
                                        ]);
                                        if($sth == true) {
                                            $_SESSION['register'] = "<div class='success'>Register successfully</div>";
                                            echo "<script>window.location = 'login.php  '</script>";
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

