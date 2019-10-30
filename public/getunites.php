<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Azizi Developments - Internal Emailer</title>
        <style>
            body{font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
                 font-size: 14px;
                 line-height: 1.42857143;
                 color: #fff;
            }
            .container{width:600px; color:#fff; height: auto; padding: 10px 0px; margin: 0px auto;}
            input{width: 560px; height: 20px; padding: 7px 20px; margin-bottom: 10px; border-radius: 5px; border: none;}
            select{padding: 7px 20px;height: 35px; width: 600px; margin-bottom: 10px; border: 1px solid #eee; color: FIREBRICK;}
            input[type=checkbox]{width: 16px; height: 16px;}
            .emails { height: 250px; overflow: scroll; background: gray; padding: 10px; }
            .error{background: red; padding: 5px; border: none; border-radius: 5px; margin-bottom: 10px;}
            .msg{background: green; padding: 5px; border: none; border-radius: 5px; margin-bottom: 10px;}
        </style>
    </head>
    <body>


      
            
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
                    $('#select_all').change(function () {
                        var checkboxes = $(this).closest('form').find(':checkbox');
                        checkboxes.prop('checked', $(this).is(':checked'));
                    });
        </script>
    </body>
</html>
