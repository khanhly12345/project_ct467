<?php
    include "../admin/connect.php";
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM order_items WHERE id=?";
        $sth = $pdo->prepare($query);
        $sth->execute([
            $id
        ]);
        if($sth == true) {
            $_SESSION['delete_order'] = "<div class='success'>Delete successfully</div>";
            echo "<script>window.location = 'order.php'</script>";
        }else{
            $_SESSION['delete_order'] = "<div class='error'>Failed Delete </div>";
            echo "<script>window.location = 'order.php'</script>";
        }
    }

?>