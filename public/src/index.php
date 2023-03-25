<?php include "../partials/header.php"?>
    <main class="main">
        <div class="container wrap_main">
            <div class="wrap_content">
                <h1>MANAGER USER</h1>
                <br>
                <?php 
                  if(isset($_SESSION['login'])) {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                  }
                  if(isset($_SESSION['edit'])) {
                    echo $_SESSION['edit'];
                    unset($_SESSION['edit']);
                  }
                  if(isset($_SESSION['delete'])) {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                  }
                ?>

                <br>
                <hr>
                <table class="table table-hover ">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fullname</th>
                        <th scope="col">Account</th>
                        <th scope="col">Password</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $query = "call procedure_user()";
                        $sth = $pdo->prepare($query);
                        $sth->execute();
                        $n = 0;
                        while($row = $sth->fetch()) {
                          $n++;
                          ?>
                            <tr>
                              <th scope="row"><?php echo $n?></th>
                              <td><?php echo $row['fullname']?></td>
                              <td><?php echo $row['account']?></td>
                              <td><?php echo $row['password']?></td>
                              <td><a href='edit_user.php?id=<?php echo $row['id']?>' class="btn btn-primary">Edit</a> <a href='delete_user.php?id=<?php echo $row['id']?>' class="btn btn-danger">Delete</a></td>
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