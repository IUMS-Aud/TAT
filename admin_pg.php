<?php

    require_once("Config/config.php");

    if (!is_login() || $_SESSION['person']['user']!="Admin") {
        redirect('index.php');
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>تمرین توجهی وزوز گوش - پنل مدیریت</title>
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
            <a class="link_btn" style="margin-right: 10%; text-align: center; width: 80%;" href="new_user.php">ایجاد کاربر جدید &nbsp;&nbsp;&nbsp; </a>
            <br><br>


            <hr>
            <br>
            <a class="link_btn" style="margin-right: 10%; text-align: center; width: 80%;" href="help.php">ورود به تمرینات &nbsp;&nbsp;&nbsp; </a>
            <br><br>
            <a class="link_btn" style="margin-right: 10%; text-align: center; width: 80%;" href="?logout=1">خروج از برنامه &nbsp;&nbsp;&nbsp; <i class="fas fa-sign-out-alt  fa-lg" style="vertical-align: middle;"></i> </a>
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
