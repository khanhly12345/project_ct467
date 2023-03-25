<?php include "../partials/header.php"?>
    <main class="main">
        <div class="container wrap_main">
            <div class="wrap_content">
                <h1>Edit USER</h1>
                <hr>
                <?php 
                    if(isset($_SESSION['edit'])) {
                        echo $_SESSION['edit'];
                        unset($_SESSION['edit']);
                    }
                ?>
                <?php 
                    if(isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $query = "SELECT * FROM user where id=$id";
                        $sth = $pdo->prepare($query);
                        $sth->execute();
                        $row = $sth->fetch();
                    }
                    
                ?>
                <form action="" method="post">
                    <table style="margin-top: 40px">
                        <tbody>
                            <tr>
                                <td>Full name:</td>
                                <td><input type="text" name="fullname" id="fullname" class="form-control" value="<?php echo $row['fullname']?>"></td>
                            </tr>
                            <tr>
                                <td>Account:</td>
                                <td><input type="text" name="account" id="fullname" class="form-control" value="<?php echo $row['account']?>"></td>
                            </tr>
                            <tr>
                                <td>Password:</td>
                                <td><input type="password" name="password" id="username" class="form-control" value=""></td>
                            </tr>
                            <tr>
                                <td>Confirm Password:</td>
                                <td><input type="password" name="newpassword" id="username" class="form-control" value=""></td>
                            </tr>
                            <tr>
                                <input type="hidden" name="oldpassword" class="form-control" value="<?php echo $row['password']?>">
                                <input type="hidden" name="id" class="form-control" value="<?php echo $id?>">
                                <td><button class="btn btn-primary" style="margin-top: 10px" name="submit">Submit</button></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
               <?php 
                    try{

                        if(isset($_POST['submit'])) {
                            $password = md5($_POST['password']);
                            $oldpassword = $_POST['oldpassword'];
                            $newpassword = md5($_POST['newpassword']);   
                            if($password == $oldpassword) {
                                $id = $_POST['id'];
                                $query = "UPDATE user SET fullname=?,account=?,password=? where id = ?";
                                $sth = $pdo->prepare($query);
                                $sth->execute([
                                    $_POST['fullname'],
                                    $_POST['account'],
                                    $newpassword,
                                    $id
                                ]);
                                $_SESSION['edit'] = "<div class='success'>Edit successfully</div>";
                                echo "<script>window.location = 'index.php'</script>";
                            }else{
                                $_SESSION['edit'] = "<div class='error'>Password not match</div>";
                                echo "<script>window.location = 'edit_user.php?id=$id  '</script>";
                            }
                        }
                    }catch(PDOException $e) {
                        echo $e->getMessage();
                    }
                    
               ?>
            </div>
        </div>
    </main>
<?php include "../partials/footer.php"?>