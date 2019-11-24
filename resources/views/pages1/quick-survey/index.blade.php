<!DOCTYPE>
<html>
    <head>
        <META HTTP-EQUIV='Content-Type' CONTENT='text/html; charset=UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Quick Survey</title>
        <link href='//fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="<?=SITE_URL?>/assets/favicon/apple-icon-57x57.png">
        <link rel="stylesheet prefetch" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <style>
            @import "//fonts.googleapis.com/css?family=Roboto:400,300,600,400italic";
            *{margin:0;padding:0;box-sizing:border-box;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-webkit-font-smoothing:antialiased;-moz-font-smoothing:antialiased;-o-font-smoothing:antialiased;font-smoothing:antialiased;text-rendering:optimizeLegibility}
            body{font-family:'PT Sans',sans-serif;font-weight:100;font-size:14px;line-height:30px;color:#777;background:#1B619A}
            p{line-height:25px}
            a{color:#777;text-decoration:none}
            .container{max-width:400px;width:100%;margin:0 auto;position:relative;background:#fff}
            .btn-primary{width: 100%;}
        </style>

    </head>
    <body><br/>
        <?php
        $get = filter_input_array(INPUT_GET);
        $scale = ['5' => 'Excellent', '4' => 'Good', '3' => 'Neutral', '2' => 'Poor', '1' => 'Very Poor'];
        $color = ['5' => '#8ec640', '4' => '#f3ce10', '3' => '#f79520', '2' => '#f1592c', '1' => '#ec1f27'];
        $source = ['1' => 'Online', '2' => 'Radio', '3' => 'Magazine', '4' => 'Outdoor', '5' => 'Social Media', '6' => 'Friend/Referral'];
        ?>
        <div class="container">  
            <div class="row" >
                <div class="col-lg-12">
                    <div style="text-align: center;;height: 90px; width: 100%; background: #fff; top: 0; z-index: 9999; max-width: 1000px; margin-top:50px;">
                        <a href="<?=SITE_URL?>/en/quick-survey"><img alt="logo" src="//azizidevelopments.in/assets/images/logo-retina-light1.png" style="width: 150px;margin-top:10px;margin-left:10px;"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="min-height: 400px;">  
            <h3 style="text-align:center">استبيان رضا العملاء</h3>
            <h3 style="text-align:center">Customer Satisfaction Survey</h3><br/>
            <div class="row" >
                <div class="col-sm-6">
                    <a href="<?=SITE_URL?>/en/quick-survey" class="btn btn-primary">English</a>
                </div>
                <div class="col-sm-6">
                    <a href="<?=SITE_URL?>/ar/quick-survey" class="btn btn-primary">العربية</a>
                </div>
            </div>
        </div>        
    </body>
</html>