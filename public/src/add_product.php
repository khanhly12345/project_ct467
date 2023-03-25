<?php include "../partials/header.php"?>
    <main class="main">
        <div class="container wrap_main">
            <div class="wrap_content">
                <h1>ADD PRODUCT</h1>
                <hr>
                <?php 
                    if(isset($_SESSION['edit'])) {
                        echo $_SESSION['edit'];
                        unset($_SESSION['edit']);
                    }
                ?>
                <form action="" method="post">
                    <table style="margin-top: 40px">
                        <tbody>
                            <tr>
                                <td>Name Product:</td>
                                <td><input type="text" name="name" id="fullname" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Pirce:</td>
                                <td><input type="text" name="price" id="fullname" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Quantity:</td>
                                <td><input type="text" name="quantity" id="username" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Supplier:</td>
                                <td><input type="text" name="supplier" id="username" class="form-control"></td>
                            </tr>
                            <tr>
                                <td><button class="btn btn-primary" style="margin-top: 10px" name="submit">Submit</button></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
               <?php 
                    try{

                        if(isset($_POST['submit'])) {
                                $query = "call procedure_product_insert(?,?,?,?)";
                                $sth = $pdo->prepare($query);
                                $sth->execute([
                                    $_POST['name'],
                                    $_POST['price'],
                                    $_POST['quantity'],
                                    $_POST['supplier'],
                                ]);
                                if($sth) {
                                    $_SESSION['add_product'] = "<div class='success'>Add successfully</div>";
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