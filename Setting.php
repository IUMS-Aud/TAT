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
        <link rel="stylesheet" href="Style/setting.css">

        <script src="JS/lib-swalert.js"></script>
        <link rel="stylesheet" href="Style/swalert-lib.css">
        <link rel="stylesheet" href="Style/animate-lib.css">
        <script src="JS/lib-swalert-polyfill.js"></script>

    </head>
    <body>

        <div id="LOADING_div" style="display: block; position: fixed; width: 100%; height: 100%; top:0px; left: 0px; background-color: #efefef; z-index: 9999; ">
            <i class="fas fa-cog fa-spin fa-3x" style="color: #009997; position: absolute; top: calc(50% - 20px); left: calc(50% - 20px);"></i>
        </div>

        <div class="forms_box">

            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

                <p style="text-align: center">
                    <?php
                        // Check for Last TAT_Conf
                        $query = "SELECT id, a2, a3, a5, a6, a7 FROM tr_tat_conf WHERE df=1 AND a2='" . $_SESSION['person']['prvn'] . "' ORDER BY id DESC LIMIT 1";
                        $query_res = MySQL_Select($query);
                        if (mysqli_num_rows($query_res) > 0) {
                            $data = mysqli_fetch_array($query_res);

                            echo $data["a3"] . ' گرامی به برنامه تمرینی شماره ' . ($data["a6"] + 1) . ' خوش آمدید. ';
                            echo '<br>';

                            // زمان بین تمرین قبلی و تمرین جدید
                            $d1 = substr($data["a5"],0,4) . '-' . substr($data["a5"],4,2) . '-' . substr($data["a5"],6,2) . ' ' . $data["a7"];

                            date_default_timezone_set('IRAN');
                            $d2 = date("Y-m-d H:i:s");

                            $diff = strtotime($d2) - strtotime($d1);

                            if (intval($data["a6"]) <= 22 ){

                                if (floor($diff/86400) >= 1) {
                                    echo ' از زمان تمرین قبلی شما ' . (floor($diff / 86400)) . ' روز گذشته است. ';
                                }else{
                                    echo ' از زمان تمرین قبلی شما حدود ' . (floor($diff / 3600)) . ' ساعت گذشته است. ';

                                    $error = 'title: ""' . ', html: "از زمان تمرین قبلی شما کمتر از 24 ساعت گذشته است <br> لذا در حال حاضر امکان تکرار تمرین وجود ندارد"';
                                }
                            }else{

                                    $error = 'title: ""' . ', html: "برنامه تمرینات شما به پایان رسیده است <br> لذا در حال حاضر امکان تکرار تمرین وجود ندارد"';
                            }

                            echo '<br><br>';

                            echo ' <input type="hidden" name="a6" value="' . ($data["a6"] + 1) . '">';

                        } else {
                            echo $_SESSION['person']['name'] . ' گرامی به برنامه تمرینی شماره ' . "1" . ' خوش آمدید. ';
                            echo ' <input  type="hidden" name="a6" value="1">';
                        }
                    ?>
                </p>
                <br>

                <label for=""><i class="fal fa-podcast fa-2x"></i>&nbsp;&nbsp;در حال حاضر وزوز را در کدام گوش خود می‌شنوید؟</label>
                    <br><br>
                    <input type="radio" id="a11_1_rdb" name="a11" value="1" onclick="Setting_Freq();"><label for="a11_1_rdb">&nbsp;گوش راست&nbsp;</label>
                    <input type="radio" id="a11_2_rdb" name="a11" value="2" onclick="Setting_Freq();"><label for="a11_2_rdb">&nbsp;گوش چپ&nbsp;</label>
                    <input type="radio" id="a11_4_rdb" name="a11" value="4" checked onclick="Setting_Freq();"><label for="a11_4_rdb">&nbsp;هر دو &nbsp;</label>
                    <input type="radio" id="a11_3_rdb" name="a11" value="3" onclick="Setting_Freq();"><label for="a11_3_rdb">&nbsp;وسط سر&nbsp;</label>

                <br><br><br>

                <label for=""><i class="fal fa-deaf fa-2x"></i>&nbsp;&nbsp;وزوز گوش شما بیشتر شبیه کدام صدا است؟</label>
                <br><br>
                    <input type="radio" id="a8_1_rdb" name="a8" value="1" checked onclick="Setting_Freq();"><label for="a8_1_rdb">&nbsp;شبیه صدای سوت&nbsp;</label>
                    &nbsp;&nbsp;
                    <input type="radio" id="a8_2_rdb" name="a8" value="2" onclick="Setting_Freq();"><label for="a8_2_rdb">&nbsp;شبیه صدای باد&nbsp;</label>
                <br><br><br>

                <label for=""><i class="fal fa-deaf fa-2x"></i>&nbsp;&nbsp;زیر و بمی وزوز گوش خود را مشخص کنید</label>
                <br>
                &nbsp;&nbsp;&nbsp;
                <input type="range" id="a9_inp" name="a9" min="1" max="11" value="6" style="width: 90%" onchange="Setting_Freq();">
                <br><br><br>

                <label for=""><i class="fal fa-volume-up fa-2x"></i>&nbsp;&nbsp;بلندی صدای وزوز گوش خود را مشخص کنید</label>
                <br>
                &nbsp;&nbsp;&nbsp;
                <input type="range" id="a10_inp" name="a10" min="1" max="100" value="50" style="width: 90%" onchange="Setting_Freq();">
                <br><br><br>

                <label for=""><i class="fal fa-volume-up fa-2x"></i>&nbsp;&nbsp;بلندی صدای تمرین را در سطحی که راحت هستید مشخص کنید</label>
                <br>
                &nbsp;&nbsp;&nbsp;
                <input type="range" id="a14_inp" name="a14" min="1" max="100" value="50" style="width: 90%" onchange="Setting_TAT_vol();">
                <br><br><br>

                <label for=""><i class="fal fa-heart-rate fa-lg"></i> به بلندی وزوز گوش خود چه امتیازی می‌دهید؟ &nbsp; <span id="a12_rate">1 از 10</span></label>
                <br>
                <div class="rate_ico">
                    <img src="Images/emoji-rate/1.png">
                    <img src="Images/emoji-rate/2.png">
                    <img src="Images/emoji-rate/3.png">
                    <img src="Images/emoji-rate/4.png">
                </div>
                &nbsp;&nbsp;&nbsp;
                <input type="range" id="a12_inp" name="a12" min="1" max="10" value="1" style="width: 90%" onchange="Setting_TAT_Rate('a12');">
                <br><br><br>

                <label for=""><i class="fal fa-heart-rate fa-lg"></i> وزوز گوش شما به چه میزان آزاردهنده است؟ &nbsp;&nbsp;&nbsp;&nbsp;<span id="a13_rate">1 از 10</span></label>
                <br>
                <div class="rate_ico">

                    <img src="Images/emoji-rate/1.png">
                    <img src="Images/emoji-rate/2.png">
                    <img src="Images/emoji-rate/3.png">
                    <img src="Images/emoji-rate/4.png">

                </div>
                &nbsp;&nbsp;&nbsp;
                <input type="range" id="a13_inp" name="a13" min="1" max="10" value="1" style="width: 90%" onchange="Setting_TAT_Rate('a13');">
                <br><br><br>

                <audio id="Freq_aud"><source src="" type="audio/mpeg"></audio>
                <audio id="TAT_aud"><source src="" type="audio/mpeg"></audio>

                <audio id="LOAD_aud"><source src="" type="audio/mpeg"></audio>

                <!--<input type="submit" name="do-login" value="تایید و ورود">-->
                <button type="submit" name="start_TAT">
                    <i class="fal fa-check fa-2x"></i>&nbsp;&nbsp;&nbsp; شروع تمرین
                </button>

                <br><br>

            </form>

        </div>

    </body>
</html>

    <script>
        Loading_Freq();
    </script>

<?php
    if($message){
        echo '<script language="JavaScript"> swal({' . $message . ', type:"success", allowOutsideClick: false, confirmButtonText:"ok"});</script>';
    }

    if ($error) {
        //echo '<script language="JavaScript"> swal({' . $error . ', type:"error", allowOutsideClick: false, confirmButtonText:"ok"});</script>';
        echo '<script language="JavaScript"> swal({' . $error . ', type:"error", allowOutsideClick: false, confirmButtonText:"ok"}).then(function() {window.location="Setting.php?logout=1"});</script>';
    }
?>
