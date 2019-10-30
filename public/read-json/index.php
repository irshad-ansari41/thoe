<?php

//declare(strict_types = 1);
require_once __DIR__ . '/vendor/autoload.php';
require_once '../db-con.php';

$testfile = __DIR__ . '/data.json';
$listener = new \JsonStreamingParser\Listener\InMemoryListener();
$stream = fopen($testfile, 'rb');

try {
    $parser = new \JsonStreamingParser\Parser($stream, $listener);
    $parser->parse();
    fclose($stream);
} catch (Exception $e) {
    fclose($stream);
    throw $e;
}

$prefix = 'sc_';
foreach ($listener->getJson() as $value) {
    

    /* Locations */
    $query1 = "Select id FROM {$prefix}locations where LocationID='{$value['LocationID']}' limit 1";
    $locations = $mysqli->query($query1);
    $location = $locations->fetch_assoc();
    if (empty($location)) {
        $mysqli->query("INSERT INTO {$prefix}locations SET LocationID='{$value['LocationID']}',LocationName='{$value['LocationName']}'");
        $location_id = $mysqli->insert_id;
    } else {
        $mysqli->query("UPDATE {$prefix}locations SET LocationName='{$value['LocationName']}' WHERE LocationID='{$value['LocationID']}'");
        $location_id = $location['id'];
    }

    /* Communities */
    $query2 = "Select id FROM {$prefix}communities where CommunityID='{$value['CommunityID']}' limit 1";
    $communities = $mysqli->query($query2);
    $community = $communities->fetch_assoc();
    if (empty($community)) {
        $mysqli->query("INSERT INTO {$prefix}communities SET location_id='$location_id',CommunityID='{$value['CommunityID']}',CommunityName='{$value['CommunityName']}'");
        $community_id = $mysqli->insert_id;
    } else {
        $mysqli->query("UPDATE {$prefix}communities SET location_id='{$location_id}',CommunityName='{$value['CommunityName']}' WHERE CommunityID='{$value['CommunityID']}'");
        $community_id = $community['id'];
    }

    /* Properties */
    $query3 = "Select id FROM {$prefix}properties where PropertyID='{$value['PropertyID']}' limit 1";
    $properties = $mysqli->query($query3);
    $property = $properties->fetch_assoc();
    if (empty($property)) {
        $mysqli->query("INSERT INTO {$prefix}properties SET community_id='{$community_id}',PropertyID='{$value['PropertyID']}', PropertyName='{$value['PropertyName']}'");
        $property_id = $mysqli->insert_id;
    } else {
        $mysqli->query("UPDATE {$prefix}properties SET community_id='{$community_id}', PropertyName='{$value['PropertyName']}' WHERE PropertyID='{$value['PropertyID']}'");
        $property_id = $property['id'];
    }

    /* Units */
    $query4 = "Select * FROM {$prefix}units where UnitID='{$value['UnitID']}' limit 1";
    $units = $mysqli->query($query4);
    $unit = $units->fetch_assoc();
    if (empty($unit)) {
        $sql = "INSERT INTO {$prefix}units SET UnitID='{$value['UnitID']}',property_id='{$property_id}', UnitNo='{$value['UnitNo']}',
        RefNo='{$value['RefNo']}',Type='{$value['Type']}',Category='{$value['Category']}',View='{$value['View']}',`Floor`='{$value['Floor']}',
        Bedrooms='{$value['Bedrooms']}',Bathrooms='{$value['Bathrooms']}',UnitArea='{$value['UnitArea']}',BalconyArea='{$value['BalconyArea']}',
        TotalArea='{$value['TotalArea']}',Price='{$value['Price']}',Status='{$value['Status']}',created_at='" . date('Y-m-d h:i:s') . "';";
        $mysqli->query($sql);
    } else {
        $sql = "UPDATE {$prefix}units SET property_id='{$property_id}', UnitNo='{$value['UnitNo']}',
      RefNo='{$value['RefNo']}',Type='{$value['Type']}',Category='{$value['Category']}',View='{$value['View']}',`Floor`='{$value['Floor']}',
      Bedrooms='{$value['Bedrooms']}',Bathrooms='{$value['Bathrooms']}',UnitArea='{$value['UnitArea']}',BalconyArea='{$value['BalconyArea']}',
      TotalArea='{$value['TotalArea']}',Price='{$value['Price']}',Status='{$value['Status']}', updated_at='" . date('Y-m-d h:i:s') . "' WHERE UnitID='{$value['UnitID']}';";
        $mysqli->query($sql);
    }
    //echo $sql . '<br/><br/>';
}

echo '<pre>';
echo "<a href='https://azizidevelopments.com/admin/sale-center/units'>Back to Units List</a>";
//print_r($listener->getJson());
echo '</pre>';
