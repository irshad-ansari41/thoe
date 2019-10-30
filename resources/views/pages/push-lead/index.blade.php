
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Push Leads</title>
        <style>
            #main{width:1000px;margin: 20px}
            textarea{width: 100%;height: 100px; }
            span{background: gray; color: #fff; padding: 10px; border: 1px solid #000; border-radius: 3px;}
            .input{padding: 0 5px; margin: 5px; width: 600px; height: 35px; border-radius: 4px; border: 1px solid #666;}
            .submit{height: 35px; background: #03A9F4; color: #fff; border-radius: 4px; border: 0;}
        </style>
    </head>
    <body>

        <div id='main'>
            <?php
            if (!empty($_GET['status']) && $_GET['status'] == 'success') {
                echo "<h4 style='color:green'>Success</h4>";
            }
            if (!empty($_GET['status']) && $_GET['status'] == 'failed') {
                echo "<h4 style='color:red'>Failed</h4>";
            }
            ?>
            <form method="post" action="{{route('push-lead.index')}}">
                <input list="name" name="name"  placeholder="Full Name *" class="input" required>
                <datalist id="name" >
                    <option value="Unknown Name">
                </datalist><br/>
                <input list="email" name="email" placeholder="Email" class="input">
                <datalist id="email" >
                    <option value="Unknown_<?= mt_rand() ?>@fake.com">
                </datalist><br/>
                <input list="number" name="phone" placeholder="Phone Number" class="input">
                <datalist id="number" >
                    <option value="0000000000">
                </datalist><br/>
                <select name="language" class="input">
                    <option value="English">English</option>
                    <option value="Arabic">Arabic</option>
                </select>
                <br/>
                <input list="source" name="source" placeholder="Source *" class="input" required>
                <datalist id="source" >
                    <option value="99 Acres">
                    <option value="Bayut">
                    <option value="Facebook">
                    <option value="Instagram">
                    <option value="Property Finder">
                    <option value="Website">
                </datalist>
                <br/>
                <input type="text" name="city" placeholder="City" class="input"><br/>
                <input type="text" name="campaign" placeholder="Campaign" class="input"><br/>
                <textarea type="text" name="comment" placeholder="Comment"  rows="4" class="input"></textarea><br/>
                <input type='submit' name="insert" value="Push Lead" class="input submit"><br/>
            </form>
        </div>
        <hr/>
        <div id='main'>
            <h3>Import Lead Files</h3>
            <form method="post" action="{{route('push-lead.linkedin-import')}}" enctype="multipart/form-data">
                <input type="file" name="lead[]" multiple="true"><br/><br/>
                <input type='submit' name="insert" value="Push Lead" class="input submit"><br/>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
    </body>
</html>







