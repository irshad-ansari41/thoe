<?php
echo 3223423;die;
define('CRM_HOST', 'thoe.bitrix24.com'); // your CRM domain name
define('CRM_PORT', '443'); // CRM server port
define('CRM_PATH', '/crm/configs/import/lead.php'); // CRM server REST service path
define('CRM_AUTH', '9037daaaffdc545097d8315c43b7bbb8'); // authorization hash
// define variables and set to empty values
$redirect_url = "https://www.thoe.com/en";
echo 2323213; die;
$post = filter_input_array(INPUT_POST);

$postData = array(
    'TITLE' => clear_input($post["name"]),
    'PHONE_WORK' => clear_input($post["phone"]),
    'EMAIL_WORK' => clear_input($post["email"]),
    'SOURCE_ID' => clear_input($post["source"]),
    'AUTH' => clear_input(CRM_AUTH)
);

if (defined('CRM_AUTH')) {
    $AUTH = CRM_AUTH;
} else {
    $LOGIN = CRM_LOGIN;
    $PASSWORD = CRM_PASSWORD;
}

$fp = fsockopen("ssl://" . CRM_HOST, CRM_PORT, $errno, $errstr, 30);
if ($fp) {
    // prepare POST data
    $strPostData = '';
    foreach ($postData as $key => $value) {
        $strPostData .= ($strPostData == '' ? '' : '&') . $key . '=' . urlencode($value);
    }

    // prepare POST headers
    $str = "POST " . CRM_PATH . " HTTP/1.0\r\n";
    $str .= "Host: " . CRM_HOST . "\r\n";
    $str .= "Content-Type: application/x-www-form-urlencoded\r\n";
    $str .= "Content-Length: " . strlen($strPostData) . "\r\n";
    $str .= "Connection: close\r\n\r\n";

    $str .= $strPostData;


    // send POST to CRM
    fwrite($fp, $str);

    // get CRM headers
    $result = '';
    while (!feof($fp)) {
        $result .= fgets($fp, 128);
    }
    fclose($fp);

    // cut response headers
    $response = explode("\r\n\r\n", $result);

    $output = '<pre>' . print_r($response[1], 1) . '</pre>';
    return '1';
    //header('Location: ' . $redirect_url);
} else {
    echo 'Connection Failed! ' . $errstr . ' (' . $errno . ')';
}

function clear_input($data) {
    return $input = htmlspecialchars(stripslashes(trim(!empty($data) ? $data : '')));
}
