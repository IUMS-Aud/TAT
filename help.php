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
            <?php

                include ("hlp" . $_SESSION['person']['group'] . ".php");


                if ($_SESSION['person']['user']=="Admin"){
                    echo'<br><hr><br>';
                    echo '<a class="link_btn" style="margin-right: 10%; text-align: center; width: 80%;" href="admin_pg.php">ورود به پنل مدیریت &nbsp;&nbsp;&nbsp; </a>';
                }

            ?>
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
