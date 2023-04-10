<?php
    include "../admin/connect.php";
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM supplier WHERE id=?";
        $sth = $pdo->prepare($query);
        $sth->execute([
            $id
        ]);
        if($sth == true) {
            $_SESSION['delete_supplier'] = "<div class='success'>Delete successfully</div>";
            echo "<script>window.location = 'supplier.php?id=supplier'</script>";
        }else{
            $_SESSION['delete_supplier'] = "<div class='success'>Failed Delete </div>";
            echo "<script>window.location = 'supplier.php?id=supplier'</script>";
        }
    }

?>