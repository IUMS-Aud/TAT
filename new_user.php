<?php
    require_once("Config/config.php");

    if (!is_login() || $_SESSION['person']['user']!="Admin") {
        redirect('index.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>ایجاد کاربر جدید</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="ie=IE11,chrome=1" />
        <meta name="HandheldFriendly" content="true" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <script src="JS/lib-jQuery.js"></script>
        <script src="JS/scripts-JS.js"></script>
        <script src="JS/scripts-jQuery.js"></script>

        <link rel="stylesheet" href="Style/web-icon-lib.css" />
        <link rel="stylesheet" href="Style/base-styles.css" />
        <link rel="stylesheet" href="Style/setting.css">

        <script src="JS/lib-swalert.js"></script>
        <link rel="stylesheet" href="Style/swalert-lib.css">
        <link rel="stylesheet" href="Style/animate-lib.css">
        <script src="JS/lib-swalert-polyfill.js"></script>

    </head>
    <body>

        <div class="forms_box">

            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

                <p style="text-align: center">
                    ایجاد کاربر جدید
                </p>
                <br>

                <label for="">شماره پرونده</label>&nbsp;&nbsp;
                <div class="text_inp">
                    <input name="a2" value="<?php if(isset($_POST['Register_User']) && isset($_POST['a2'])){ echo $_POST['a2'];} ?>" required>
                    <span class="text_inp_border"></span>
                </div>

                <br><br>

                <label for="">نام و نام خانوادگی</label>&nbsp;&nbsp;
                <div class="text_inp">
                    <input name="a3" value="<?php if(isset($_POST['Register_User']) && isset($_POST['a3'])){ echo $_POST['a3'];} ?>" required>
                    <span class="text_inp_border"></span>
                </div>

                <br><br>

                <label for="">جنسیت:</label>
                    <input type="radio" id="a4_1_rdb" name="a4" value="1" checked><label for="a4_1_rdb" >&nbsp;مرد&nbsp;</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" id="a4_2_rdb" name="a4" value="2" ><label for="a4_2_rdb">&nbsp;زن&nbsp;</label>

                <br><br>

                <label for="">سن (به سال وارد شود)</label>&nbsp;&nbsp;
                <div class="text_inp">
                    <input name="a9" value="<?php if(isset($_POST['Register_User']) && isset($_POST['a9'])){ echo $_POST['a9'];} ?>" required>
                    <span class="text_inp_border"></span>
                </div>

                <br><br>

                <label for="">کد کاربری</label>&nbsp;&nbsp;
                <div class="text_inp">
                    <input name="a5" value="<?php if(isset($_POST['Register_User']) && isset($_POST['a5'])){ echo $_POST['a5'];} ?>" required>
                    <span class="text_inp_border"></span>
                </div>

                <br><br>

                <label for="">رمز عبور</label>&nbsp;&nbsp;
                <div class="text_inp">
                    <input type="password" name="a6" autocomplete="off" required>
                    <span class="text_inp_border"></span>
                </div>

                <br><br>

                <label for="">گروه تمرینی</label>
                <br>
                    <input type="radio" id="a8_1_rdb" name="a8" value="1" checked><label for="a8_1_rdb" >&nbsp;بینایی شنوایی&nbsp;</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" id="a8_2_rdb" name="a8" value="2" ><label for="a8_2_rdb">&nbsp;فقط شنوایی&nbsp;</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" id="a8_3_rdb" name="a8" value="3" ><label for="a8_3_rdb">&nbsp;فقط بینایی&nbsp;</label>

                <br><br><br>

                <button type="submit" name="Register_User">
                    <i class="fal fa-check fa-2x"></i>&nbsp;&nbsp;&nbsp; ثبت اطلاعات
                </button>

                <br><br>

                <a class="link_btn" style="margin-right: 10%; text-align: center; width: 80%;" href="admin_pg.php">بازگشت &nbsp;&nbsp;&nbsp; </a>


            </form>

        </div>

    </body>
</html>

    <script>
        //Loading_Freq();
    </script>

<?php
    if($message){
        echo '<script language="JavaScript"> swal({' . $message . ', type:"success", allowOutsideClick: false, confirmButtonText:"ok"});</script>';
    }

    if ($error) {
        echo '<script language="JavaScript"> swal({' . $error . ', type:"error", allowOutsideClick: false, confirmButtonText:"ok"});</script>';
    }
?>
