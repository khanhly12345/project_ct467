<?php include "../partials/header.php"?>
    <main class="main">
        <div class="container wrap_main">
            <div class="wrap_content">
                <h1>MANAGER SUPPLIER</h1><br>
                <a href="add_supplier.php?id=supplier" class="btn btn-primary">Add Supplier</a>
                <br>
                <br>
                <?php 
                  if(isset($_SESSION['add'])) {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                  }
                  if(isset($_SESSION['edit_supplier'])) {
                    echo $_SESSION['edit_supplier'];
                    unset($_SESSION['edit_supplier']);
                  }
                  if(isset($_SESSION['delete_supplier'])) {
                    echo $_SESSION['delete_supplier'];
                    unset($_SESSION['delete_supplier']);
                  }

                ?>

                <br>
                <hr>
                <table class="table table-hover ">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name Supplier</th>
                        <th scope="col">Code Supplier</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $query = "call procedure_supplier()";
                        $sth = $pdo->prepare($query);
                        $sth->execute();
                        $n = 0;
                        while($row = $sth->fetch()) {
                          $n++;
                          ?>
                            <tr>
                              <th scope="row"><?php echo $n?></th>
                              <td><?php echo $row['name_supllier']?></td>
                              <td><?php echo $row['code_supllier']?></td>
                              <td><?php echo $row['phone']?></td>
                              <td><?php echo $row['address']?></td>
                              <td><a href='edit_supplier.php?id=<?php echo $row['id']?>' class="btn btn-primary">Edit</a> <a href='delete_supplier.php?id=<?php echo $row['id']?>' class="btn btn-danger">Delete</a></td>
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