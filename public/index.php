<?php
echo 23423; die;
ini_set('display_errors', 1);
//error_reporting(E_ALL);
//
//$actual_link = $al = "http" . ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? "s://" : "://") . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//$redirect_link = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//
//if (strpos($actual_link, 'aziziriviera.azizidevelopments.com') !== false || strpos($actual_link, 'azizivictoria.azizidevelopments.com') !== false ||
//        strpos($actual_link, 'alfurjan.azizidevelopments.com') !== false || strpos($actual_link, 'azizigrand.azizidevelopments.com') !== false ||
//        strpos($actual_link, 'azizimirage.azizidevelopments.com') !== false || strpos($actual_link, 'meydanavenue.azizidevelopments.com') !== false) {
//    header("Location: https://azizidevelopments.com", true, 301);
//    exit();
//}
//
///* Redirects URL */
//include_once 'db-con.php';
//$row = $mysqli->query("Select `destination` FROM url_redirects where `source`=" . '"' . $actual_link . '"' . " AND `status`='Active'")->fetch_row();
//if (!empty($row[0])) {
//    header("Location: {$row[0]}", true, 301);
//    exit();
//}
//
//if ((strpos($actual_link, 'www') !== false)) {
//    header("Location: $redirect_link");
//}
//
//if (strpos($actual_link, '35.168.87.174') !== false) {
//    $url = str_replace(['/index.php', '/index.html'], '', $actual_link);
//    header("Location: https://azizidevelopments.com", true, 301);
//    exit();
//}
//
//if (strpos($actual_link, 'index.php') !== false) {
//    $url = str_replace(['/index.php', '/index.html'], '', $actual_link);
//    header("Location: $url", true, 301);
//    exit();
//}
//
//$status = 0;
//
//if (strpos($al, 'online') !== false || strpos($al, 'agent-login') !== false || strpos($al, 'debug') !== false || strpos($al, 'payfort') !== false || strpos($al, 'contact') !== false || strpos($al, 'wbtest') !== false || strpos($al, 'ips-form') !== false || strpos($al, 'form-referral') !== false) {
//    $status = 0;
//}
//
//$key = md5($actual_link);
//$file = "/var/www/html/azizi/public/caches/$key.html";
//if (file_exists($file) && $status) {
//    echo file_get_contents($file);
//    exit();
//}

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */
/*
  |--------------------------------------------------------------------------
  | Register The Auto Loader
  |--------------------------------------------------------------------------
  |
  | Composer provides a convenient, automatically generated class loader for
  | our application. We just need to utilize it! We'll simply require it
  | into the script here so that we don't have to worry about manual
  | loading any of our classes later on. It feels nice to relax.
  |
 */

require __DIR__ . '/../bootstrap/autoload.php';

/*
  |--------------------------------------------------------------------------
  | Turn On The Lights
  |--------------------------------------------------------------------------
  |
  | We need to illuminate PHP development, so let us turn on the lights.
  | This bootstraps the framework and gets it ready for use, then it
  | will load up this application so that we can run it and send
  | the responses back to the browser and delight our users.
  |
 */

$app = require_once __DIR__ . '/../bootstrap/app.php';

/*
  |--------------------------------------------------------------------------
  | Run The Application
  |--------------------------------------------------------------------------
  |
  | Once we have the application, we can handle the incoming request
  | through the kernel, and send the associated response back to
  | the client's browser allowing them to enjoy the creative
  | and wonderful application we have prepared for them.
  |
 */

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
        $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);

