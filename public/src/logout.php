<?php
include "../admin/connect.php";
session_destroy();
echo "<script>window.location = 'index.php'</script>";