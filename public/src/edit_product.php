<?php include "../partials/header.php"?>
    <main class="main">
        <div class="container wrap_main">
            <div class="wrap_content">
                <h1>EDIT PRODUCT</h1>
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
                        $query = "SELECT * FROM product where id=$id";
                        $sth = $pdo->prepare($query);
                        $sth->execute();
                        $row = $sth->fetch();
                        $ncc = $row['ncc'];
                    }
                    
                ?>
                <form action="" method="post">
                    <table style="margin-top: 40px">
                        <tbody>
                            <tr>
                                <td>Name Product: </td>
                                <td><input type="text" name="name" id="fullname" class="form-control" value="<?php echo $row['name']?>"></td>
                            </tr>
                            <tr>
                                <td>Price:</td>
                                <td><input type="text" name="price" id="fullname" class="form-control" value="<?php echo $row['price']?>"></td>
                            </tr>
                            <tr>
                                <td>Quantity:</td>
                                <td><input type="text" name="quantity" id="username" class="form-control" value="<?php echo $row['quantity']?>"></td>
                            </tr> 
                            <tr>
                                <td>Supplier:</td>
                                <td><input type="text" name="supplier" id="username" class="form-control" value="<?php echo $row['ncc']?>"></td>
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
                            $query = "UPDATE product SET name=?,price=?,quantity=?,ncc=? where id = ?";
                                            
                            $sth = $pdo->prepare($query);
                            $sth->execute([
                                $_POST['name'],
                                $_POST['price'],
                                $_POST['quantity'],
                                $_POST['supplier'],
                                $id,
                            ]);
                            if($sth) {
                                $_SESSION['edit_product'] = "<div class='success'>Edit successfully</div>";
                                echo "<script>window.location = 'product.php'</script>";
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