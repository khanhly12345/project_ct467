<?php include "../partials/header.php"?>
    <main class="main">
        <div class="container wrap_main">
            <div class="wrap_content">
                <h1>ADD SUPPLIER</h1>
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
                                <td>Name Supplier:</td>
                                <td><input type="text" name="name" id="fullname" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Code Supllier:</td>
                                <td><input type="text" name="code_supllier" id="fullname" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td><input type="text" name="phone" id="fullname" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td><input type="text" name="address" id="username" class="form-control"></td>
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
                                $query = "call procedure_supplier_insert(?,?,?,?)";
                                $sth = $pdo->prepare($query);
                                $sth->execute([
                                    $_POST['name'],
                                    $_POST['code_supllier'],
                                    $_POST['phone'],
                                    $_POST['address'],
                                ]);
                                if($sth) {
                                    $_SESSION['add'] = "<div class='success'>Add successfully</div>";
                                    echo "<script>window.location = 'supplier.php?id=supplier'</script>";
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