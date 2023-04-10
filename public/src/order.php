<?php include "../partials/header.php"?>
    <main class="main">
        <div class="container wrap_main">
            <div class="wrap_content">
                <h1>ORDER ITEMS</h1><br>

                  <a href="add_order.php?id=order" class="btn btn-primary">Add Items</a>
                <br>
                <?php 
                  if(isset($_SESSION['add_order'])) {
                    echo $_SESSION['add_order'];
                    unset($_SESSION['add_order']);
                  }
                  if(isset($_SESSION['edit_order'])) {
                    echo $_SESSION['edit_order'];
                    unset($_SESSION['edit_order']);
                  }
                  if(isset($_SESSION['delete_order'])) {
                    echo $_SESSION['delete_order'];
                    unset($_SESSION['delete_order']);
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
                        <th scope="col">Quantity</th>
                        <th scope="col">Supplier</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $query = "call procedure_order()";
                        $sth = $pdo->prepare($query);
                        $sth->execute();
                        $n = 0;
                        while($row = $sth->fetch()) {
                          $n++;
                          ?>
                            <tr>
                              <th scope="row"><?php echo "#"?></th>
                              <td><?php echo $row['product']?></td>
                              <td style="color: red"><?php echo currency_format($row['purchase'])?></td>
                              <td><?php echo $row['quantity']?></td>
                              <td><?php echo $row['supplier']?></td>
                              <td><?php echo $row['data']?></td>
                              <td><a href='edit_order.php?id=<?php echo $row['id']?>' class="btn btn-primary">Edit</a> <a href='delete_order.php?id=<?php echo $row['id']?>' class="btn btn-danger">Delete</a></td>
                            </tr>
                          <?php
                        }
                    ?>
                      <tr style="position: relative; left: 450px;">
                        <td colspan="7" style="box-shadow: none !important"><a href="ganerate_pdf.php" class="btn btn-primary">PRINT</a></td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </main>
    <?php include "../partials/footer.php"?>