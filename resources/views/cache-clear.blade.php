<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Clear Cache</title>
        <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="">
        <link rel="stylesheet prefetch" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <style>
            body{ text-align: center;margin: 30px;font-family: "Lato","Helvetica Neue",helvetica,arial,sans-serif}
            .container{max-width:450px;margin:auto}
            .input{width: 96%;padding: 5px;margin-bottom: 10px;margin-top: 5px;}
            .submit1{width: 100%;background: yellow;padding: 7px;color: #000;border: 0;}
            .submit2{width: 100%;background: brown;padding: 7px;color: #fff;border: 0;}
            .submit3{width: 100%;background: red;padding: 7px;color: #fff;border: 0;}
            .submit4{width: 100%;background: yellowgreen;padding: 7px;color: #fff;border: 0;}
            .submit5{width: 100%;background: green;padding: 7px;color: #fff;border: 0;}
            form{padding: 10px;border: 1px solid #ccc;margin-bottom:20px;}
        </style>
    </head>
    <body>
        <div class="container">
            <h3> https://thoe.com </h3>
            <form method="post">
                {!! csrf_field() !!}
                Remove single cached files
                <input type="hidden" name="action" value="single">
                <input name="page_url" value="<?= !empty($page_url) ? $page_url : '' ?>" placeholder="Page URL" required class="input">
                <input type="submit" class="submit1" value="Clear Signle Cache">
            </form>


            <form method="post">
                {!! csrf_field() !!}
                Remove bulk cached files by URL keyword
                <input type="hidden" name="action" value="bulk">
                <input name="url_keyword" value="" placeholder="URL Keyword" required class="input">
                <input type="submit" class="submit2" value="Clear Bulk Cache">
            </form>

            <form method="post">
                {!! csrf_field() !!}
                Remove All cached files
                <input type="hidden" name="action" value="all">
                <input name="token" value="" placeholder="Enter Your Token No" required class="input">
                <input type="submit" class="submit2" value="Clear All Cache">
            </form>

            <form method="post">
                {!! csrf_field() !!}
                Remove All Session, Views files
                <input type="hidden" name="action" value="files">
                <input name="token" value="<?= !empty($token) ? $token : '' ?>" placeholder="Enter Your Token No" required class="input">
                <input type="submit" class="submit3" value="Delete Session and Views Files">
            </form>


            <form method="post">
                {!! csrf_field() !!}
                <input type="hidden" name="action" value="store">
                <input name="page_url" value="<?= !empty($page_url) ? $page_url : '' ?>" placeholder="Page URL" required class="input">
                <input type="submit" class="submit4" value="Cache Single Pages">
            </form>


            <form method="post">
                {!! csrf_field() !!}
                <input type="hidden" name="action" value="store_all">
                <input name="token" value="<?= !empty($token) ? $token : '' ?>" placeholder="Enter Your Token No" required class="input">
                <input type="submit" class="submit5" value="Cache All Pages">
            </form>

            <br>
            <?= !empty($msg) ? $msg : '' ?>
            <br/><br/>

            <?= !empty($cached) ? $cached : '' ?>
        </div>
    </body>
</html>