<?php include "../partials/header.php"?>
    <main class="main">
        <div class="container wrap_main">
            <div class="wrap_content">
                <h1>EDIT USER</h1>
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
                        $query = "SELECT * FROM supplier where id=$id";
                        $sth = $pdo->prepare($query);
                        $sth->execute();
                        $row = $sth->fetch();
                        $name = $row['name_supllier'];
                    }
                    
                ?>
                <form action="" method="post">
                    <table style="margin-top: 40px">
                        <tbody>
                            <tr>
                                <td>Name Supplier: </td>
                                <td><input type="text" name="name" id="fullname" class="form-control" value="<?php echo $row['name_supllier']?>"></td>
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td><input type="text" name="phone" id="fullname" class="form-control" value="<?php echo $row['phone']?>"></td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td><input type="text" name="address" id="username" class="form-control" value="<?php echo $row['address']?>"></td>
                            </tr>
                            <tr>
                                <input type="hidden" name="id" class="form-control" value="<?php echo $id?>">
                                <td><button class="btn btn-primary" style="margin-top: 10px" name="submit">Submit</button></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
               <?php 
                    try{

                        if(isset($_POST['submit'])) {

                            $id = $_POST['id'];
                            $query = "START TRANSACTION;
                                        UPDATE supplier SET name_supllier=?,phone=?,address=? where id = ?;
                                        UPDATE product SET ncc = ? where ncc = ?;
                                    COMMIT;
                            ";
                            $sth = $pdo->prepare($query);
                            $sth->execute([
                                $_POST['name'],
                                $_POST['phone'],
                                $_POST['address'],
                                $id,
                                $_POST['name'],
                                $name 
                            ]);
                            if($sth) {
                                $_SESSION['edit_supplier'] = "<div class='success'>Edit successfully</div>";
                                echo "<script>window.location = 'supplier.php'</script>";
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