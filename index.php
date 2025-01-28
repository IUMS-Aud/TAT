<?php

    require_once("Config/config.php");

    if (is_login()) {
        redirect('help.php');
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
            <br>
            <p id="logo_img">
                <img src="Images/Logo.png" alt="">
                <br>
                دانشگاه علوم پزشکی و خدمات درمانی ایران
                <br>
                دانشکده علوم توانبخشی
                <br>
                گروه شنوایی شناسی
            </p>
            <br><br>
            <h1 id="slogan">تمرین توجهی وزوز گوش</h1>
            <br>
            <hr>
            <br><br>
            <p>کاربر گرامی: <br> جهت انجام تمرینات ابتدا باید وارد حساب کاربری خود شوید. </p>
            <br>

            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

                <label for=""><i class="fal fa-user fa-2x"></i></label>&nbsp;&nbsp;
                <div class="text_inp">
                    <input name="a5" placeholder="نام کاربری یا کد ملی خود را وارد نمایید" required>
                    <span class="text_inp_border"></span>
                </div>
                <br><br>

                <label for=""><i class="fal fa-lock fa-2x"></i></label>&nbsp;&nbsp;
                <div class="text_inp">
                    <input name="a6" type="password" placeholder="رمز عبور خود را وارد نمایید" autocomplete="off" required>
                    <span class="text_inp_border"></span>
                </div>
                <br><br>

                <input type="hidden" name="refurl" value="<?php echo base64_encode($_SERVER['HTTP_REFERER']); ?>" >

                <!--<input type="submit" name="do-login" value="تایید و ورود">-->
                <button type="submit" name="do-login">
                    <i class="fal fa-check fa-2x"></i>&nbsp;&nbsp;&nbsp; تایید و ورود
                </button>

                <br><br>

            </form>
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
