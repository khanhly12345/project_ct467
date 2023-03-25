
<?php
require __DIR__ . "/vendor/autoload.php";
require "../admin/connect.php";

use Dompdf\Dompdf;

$dompdf = new Dompdf;
$today = date("F j, Y, g:i a"); 
$html = "<h1 style='text-align: center'>COUPON</h1>
<table style='width: 100%; position: relative; left: 80px'><tbody>
";
$html .= "<tr>
<td>Product</td>
<td>Quantity</td>
<td>Supplier</td>
</tr>";

$query = "SELECT * FROM order_items";
$sth = $pdo->prepare($query);
$sth->execute();
while($row = $sth->fetch()) { 
    $html .= "
            <tr>
                <td >".$row['product']."</td>
                <td >".$row['quantity']."</td>
                <td >".$row['supplier']."</td>
            </tr>

            ";
    
}
$date = "<span style='position: relative; top: 10px; left: 450px''>".$today."</span>";
$html .= "</tbody></table>".$date;
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream("coupon.pdf");

$query2 = "DELETE FROM order_items";
$sth2 = $pdo->query($query2);
$sth2->execute();


?>