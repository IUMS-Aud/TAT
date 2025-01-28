<?php

    require_once("Config/config.php");

    if (!is_login()) {
        redirect('index.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>تمرین توجهی وزوز گوش</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="ie=IE11,chrome=1" />
        <meta name="HandheldFriendly" content="true" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <script src="JS/lib-jQuery.js"></script>
        <script src="JS/scripts-JS.js"></script>
        <script src="JS/scripts-jQuery.js"></script>

        <link rel="stylesheet" href="Style/web-icon-lib.css" />
        <link rel="stylesheet" href="Style/base-styles.css" />
        <link rel="stylesheet" href="Style/login.css">


        <script src="JS/lib-swalert.js"></script>
        <link rel="stylesheet" href="Style/swalert-lib.css">
        <link rel="stylesheet" href="Style/animate-lib.css">
        <script src="JS/lib-swalert-polyfill.js"></script>


    </head>
    <body>
        <div class="forms_box">

            <br><br>
            <p style="text-align: center;">فراموش نکنید که ابتدا صدای دستگاه (گوشی / کامپیوتر) خود را در حالت حداکثر (100 %) قرار دهید و سپس دکمه "ادامه" را بزنید.</p>
            <br><br><br>
            <p style="text-align: center;"><img src="Images/help/vol.gif" alt=""></p>
            <br><br><br>
            <a class="link_btn" style="margin-right: 10%; text-align: center; width: 80%;" href="Setting.php">ادامه &nbsp;&nbsp;&nbsp; <i class="fal fa-angle-double-left fa-2x"></i> </a>

            <br><br><br>

        </div>

    </body>
</html>

<?php
    if($message){
        echo '<script language="JavaScript"> swal({' . $message . ', type:"success", allowOutsideClick: false, confirmButtonText:"ok"});</script>';
    }

    if ($error) {
        echo '<script language="JavaScript"> swal({' . $error . ', type:"error", allowOutsideClick: false, confirmButtonText:"ok"});</script>';
    }
?>
