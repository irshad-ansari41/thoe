<?php

$name = 'Property-Feed';
// filename for download 
$date = date('d-M-Y');
$filename = str_replace(' ', '-', "{$name}-{$date}.xls");
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel;");
header("Pragma: no-cache");
header("Expires: 0");

echo "<table id='leads' border=1 style='border-collapse:collapse' cellpadding=5 cellspacing=5 >";

echo "<tr style='font-weight: bold;'>";
echo "<td>RefNo</td>";
echo "<td>PropertyName</td>";
echo "<td>CommunityName</td>";
echo "<td>LocationName</td>";
echo "<td>Type</td>";
echo "<td>Category</td>";
echo "<td>View</td>";
echo "<td>Status</td>";
echo "<td>Floor</td>";
echo "<td>Bedrooms</td>";
echo "<td>Bathrooms</td>";
echo "<td>UnitArea</td>";
echo "<td>BalconyArea</td>";
echo "<td>TotalArea</td>";
echo "<td>Price</td>";
echo "</tr>";

foreach ($units as $key => $value) {
    $total_price = $value->UnitArea + $value->BalconyArea;
    echo "<tr>";
    echo "<td>" . $value->RefNo . "</td>";
    echo "<td>" . $value->PropertyName . "</td>";
    echo "<td>" . $value->CommunityName . "</td>";
    echo "<td>" . $value->LocationName . "</td>";
    echo "<td>" . $value->Type . "</td>";
    echo "<td>" . $value->Category . "</td>";
    echo "<td>" . $value->View . "</td>";
    echo "<td>" . $value->Status . "</td>";
    echo "<td>" . $value->Floor . "</td>";
    echo "<td>" . $value->Bedrooms . "</td>";
    echo "<td>" . $value->Bathrooms . "</td>";
    echo "<td>" . $value->UnitArea . "</td>";
    echo "<td>" . $value->BalconyArea . "</td>";
    echo "<td>" . $total_price . "</td>";
    echo "<td>" . $value->Price . "</td>";
    echo "</tr>";
}

echo "</table>";
exit;
