<?php include "../partials/header.php"?>
    <main class="main">
        <div class="container wrap_main">
            <div class="wrap_content">
                <h1>SEARCH</h1><br>
          
                  <!-- <a href="add_product.php" class="btn btn-primary">Add Product</a> -->
                  <div class="input-group">
                    <form action="search.php" method="post" style="display: flex">
                      <div class="form-outline">
                        <input type="text" id="form1" class="form-control" name="input"/>
                      </div>
                      <button type="submit" name="search" class="btn btn-primary">
                        Search
                      </button>
                    </form>
                  </div>
                <br>
                <?php 
                  if(isset($_SESSION['add_product'])) {
                    echo $_SESSION['add_product'];
                    unset($_SESSION['add_product']);
                  }
                  if(isset($_SESSION['edit_product'])) {
                    echo $_SESSION['edit_product'];
                    unset($_SESSION['edit_product']);
                  }
                  if(isset($_SESSION['delete_product'])) {
                    echo $_SESSION['delete_product'];
                    unset($_SESSION['delete_product']);
                  }
                ?>

                <br>
                <hr>
                <table class="table table-hover ">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name product</th> 
                        <th scope="col">Purchase</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Supplier</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                            $input = $_POST['input'];
                            $query = "SELECT * FROM product WHERE name LIKE '%$input%'";
                            $sth = $pdo->prepare($query);
                            $sth->execute();
                            $n = 0;
                            while($row = $sth->fetch()) {
                            $n++;
                          ?>
                            <tr>
                              <th scope="row"><?php echo $n?></th>
                              <td><?php echo $row['name']?></td>
                              <td><?php echo currency_format($row['purchase'])?></td>
                              <td style="color: red"><?php echo currency_format($row['price'])?></td>
                              <td><?php echo $row['quantity']?></td>
                              <td><?php echo $row['ncc']?></td>
                              <td><a href='edit_product.php?id=<?php echo $row['id']?>' class="btn btn-primary">Edit</a> <a href='delete_product.php?id=<?php echo $row['id']?>' class="btn btn-danger">Delete</a></td>
                            </tr>
                          <?php
                        }
                    ?>
                    </tbody>
                  </table>
            </div>
        </div>
    </main>
    <?php include "../partials/footer.php"?>