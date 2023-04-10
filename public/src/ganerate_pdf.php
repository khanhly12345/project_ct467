
<?php
require __DIR__ . "/vendor/autoload.php";
require "../admin/connect.php";

use Dompdf\Dompdf;

$dompdf = new Dompdf;
$today = date("F j, Y, g:i a"); 
$html = "<h1 style='text-align: center'>COUPON</h1>
<table style='width: 100%; position: relative;'><tbody>";

$query = "SELECT * FROM order_items";
$sth = $pdo->prepare($query);
$sth->execute();
$row2 = $sth->fetch();
$n = 0;
$total = 0;
// select admin
$id = $_SESSION['check'];
$query2 = "SELECT * FROM user where id = $id";
$sth2 = $pdo->prepare($query2);
$sth2->execute();
$row = $sth2->fetch();
// select mvc
$supplier = $row2["supplier"];
$query3 = "SELECT * FROM supplier where code_supllier = '$supplier'";
$sth3 = $pdo->prepare($query3);
$sth3->execute();
$row3 = $sth3->fetch();
$html .= "
<tr style='margin-bottom: 10px'>
    <td colspan='5'>
        Invoice person: ".$row['fullname'].'<br>'."Name supllier: ".$row3["name_supllier"].'<br>'."Phone supllier: ".$row3["phone"].'<br>'."Addresss supllier: ".$row3["address"].'<br>'."Date: ".$today."
    </td>

</tr>
<tr>
    <td>STT</td>
    <td>Product</td>
    <td>Purchase</td>
    <td>Quantity</td>
    <td>Supplier</td>
</tr>";
$query = "SELECT * FROM order_items";
$sth = $pdo->prepare($query);
$sth->execute();
while($row4 = $sth->fetch()) { 
    $n++;
    $total += ($row4['purchase'] * $row4['quantity']);
    $html .= "
            <tr>
                <td >".$n."</td>
                <td >".$row4['product']."</td>
                <td >".currency_format($row4['purchase'])."</td>
                <td >".$row4['quantity']."</td>
                <td >".$row4['supplier']."</td>
            </tr>
            ";
    
}
$html .= "            
    <tr style='marin-top: 20px'>
    <td colspan='5' style='text-align: center; color: red;'> Total: ".currency_format($total)."
    </td>
    </tr>
</tbody></table>";
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream("coupon.pdf");
?>