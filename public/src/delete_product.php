<?php
    include "../admin/connect.php";
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM product WHERE id=?";
        $sth = $pdo->prepare($query);
        $sth->execute([
            $id
        ]);
        if($sth == true) {
            $_SESSION['delete_product'] = "<div class='success'>Delete successfully</div>";
            echo "<script>window.location = 'product.php'</script>";
        }else{
            $_SESSION['delete_product'] = "<div class='error'>Failed Delete </div>";
            echo "<script>window.location = 'product.php'</script>";
        }
    }

?>