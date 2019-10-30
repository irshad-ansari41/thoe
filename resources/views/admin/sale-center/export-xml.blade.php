<?php

function get_property_plan($id) {
    if (!empty($id)) {
        $property = DB::table('tbl_properties')->select('nfcstatus')->where('id', $id)->first();
        $arr = explode(' ', $property->nfcstatus);
        if (!empty($arr[1])) {
            if ($arr[0] == 'Q1') {
                $date = "$arr[1]-03-31";
            } elseif ($arr[0] == 'Q2') {
                $date = "$arr[1]-06-30";
            } elseif ($arr[0] == 'Q3') {
                $date = "$arr[1]-09-30";
            } elseif ($arr[0] == 'Q4') {
                $date = "$arr[1]-03-31";
            }
            $earlier = new DateTime(date('Y-m-d'));
            $later = new DateTime($date);
            $diff = $later->diff($earlier)->format("%a");
            return $diff >= 60 ? 'Off Plan' : 'Close to Completion';
        }
    }
    return '';
}

$sep = "\n";

/**
 * Short Version 
 */
$xml = '<?xml version="1.0" encoding="UTF-8"?>';
$xml .= '<Communities>' . $sep;
foreach ($full as $key1 => $value1) {
    if (!empty($key1)) {
        $xml .= '<Community>' . $sep;
        $xml .= "<Community_Name>" . $key1 . "</Community_Name>" . $sep;
        $xml .= '<Properties>' . $sep;
        foreach ($value1 as $key2 => $value2) {
            $xml .= '<Property>' . $sep;
            $xml .= "<Property_Name>" . $key2 . "</Property_Name>" . $sep;
            foreach ($value2 as $key3 => $value3) {
                $av = array_values($value3);
                $property_old_id = !empty($av[0]->property_old_id) ? $av[0]->property_old_id : '';
                $plan = get_property_plan($property_old_id);
                $planxml[$plan] = "<Property_Plan>" . $plan . "</Property_Plan>" . $sep;
                if (!empty($key3)) {
                    $xml .= "<$key3>" . $sep;
                    foreach ($value3 as $key4 => $value4) {
                        $xml .= "<Unit>" . $key4 . "</Unit>" . $sep;
                    }
                    $xml .= "</$key3>" . $sep;
                }
            }
            $xml .= implode('', $planxml) . $sep;
            $xml .= '</Property>' . $sep;
        }
        $xml .= '</Properties>' . $sep;
        $xml .= '</Community>' . $sep;
    }
}
$xml .= '</Communities>' . $sep;

file_put_contents(APP_PATH . '/uploads/property-unit-full-inventory.xml', $xml);


/**
 * Short Version 
 */
$xml = '<?xml version="1.0" encoding="UTF-8"?>';
$xml .= '<Communities>' . $sep;

foreach ($short as $key1 => $value1) {
    if (!empty($key1)) {
        $xml .= '<Community>' . $sep;
        $xml .= "<Community_Name>" . $key1 . "</Community_Name>" . $sep;
        $Commercial = '';
        $planxml = [];
        foreach ($value1 as $key2 => $value2) {
            if (!empty($key2) && $key2 == 'Commercial') {
                $Commercial = "<$key2>Yes</$key2>" . $sep;
            } else if (!empty($key2)) {
                $xml .= "<$key2>" . $sep;
                foreach ($value2 as $key3 => $value3) {
                    $property_old_id = !empty($value3->property_old_id) ? $value3->property_old_id : '';
                    $plan = get_property_plan($property_old_id);
                    $planxml[$plan] = !empty($plan) ? "<Property_Plan>" . $plan . "</Property_Plan>" . $sep : '';
                    $xml .= "<Unit>" . $key3 . "</Unit>" . $sep;
                }
                $xml .= "</$key2>" . $sep;
            }
        }
        $xml .= $Commercial;
        $xml .= implode('', $planxml) . $sep;
        $xml .= '</Community>' . $sep;
    }
}
$xml .= '</Communities>' . $sep;

file_put_contents(APP_PATH . '/uploads/property-unit-short-inventory.xml', $xml);


echo "<div style='margin:100px; padding:15px; text-align:center;background:#e1e1e1;border:1px solid #ccc'>XML Unit file Updated. "
 . "<br><br>Open file <a href='" . APP_URL . '/uploads/property-unit-full-inventory.xml' . "' target=_blank>Full Vesion</a> \n\n"
 . "<br><br>Open file <a href='" . APP_URL . '/uploads/property-unit-short-inventory.xml' . "' target=_blank>Short Vesion</a> \n\n"
 . "<br><br>you will be redirected to \n\n <a href='" . SITE_URL . "'>" . SITE_URL . "</a></div>";
