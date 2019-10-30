<?php

$name = 'Auto-Select-Units';
// filename for download 
$date = date('d-M-Y');
$filename = str_replace(' ', '-', "{$name}-{$date}.xls");
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel;");
header("Pragma: no-cache");
header("Expires: 0");

echo "<table id='leads' border=1 style='border-collapse:collapse' cellpadding=5 cellspacing=5 >";

echo "<tr style='font-weight: bold;'>";
echo "<td>ID</td>";
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
echo "<td>Summary</td>";
echo "</tr>";

foreach ($units as $v) {
    $summary = '';
    foreach ($v as $key => $value) {
        $unit = $value[0];
        $summary .= "$key - " . count($value) . ', ';
        $total_price = $unit->UnitArea + $unit->BalconyArea;
        echo "<tr>";
        echo "<td>" . $value->id . "</td>";
        echo "<td>" . $unit->RefNo . "</td>";
        echo "<td>" . $unit->PropertyName . "</td>";
        echo "<td>" . $unit->CommunityName . "</td>";
        echo "<td>" . $unit->LocationName . "</td>";
        echo "<td>" . $unit->Type . "</td>";
        echo "<td>" . $unit->Category . "</td>";
        echo "<td>" . $unit->View . "</td>";
        echo "<td>" . $unit->Status . "</td>";
        echo "<td>" . $unit->Floor . "</td>";
        echo "<td>" . $unit->Bedrooms . "</td>";
        echo "<td>" . $unit->Bathrooms . "</td>";
        echo "<td>" . $unit->UnitArea . "</td>";
        echo "<td>" . $unit->BalconyArea . "</td>";
        echo "<td>" . $total_price . "</td>";
        echo "<td>" . $unit->Price . "</td>";
        echo "<td>" . $summary . "</td>";
        echo "</tr>";
    }
}
echo "</table>";
exit;
