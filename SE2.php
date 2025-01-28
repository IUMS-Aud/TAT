<?php

    require_once("Config/config.php");

    if (!is_login()) {                      redirect('index.php');        }
    if (isset($_SESSION['TAT'])){} else {   redirect('Setting.php');      }

    if ($_SESSION['TAT']['GoNext']=='True'){        $_SESSION['TAT']['GoNext'] = 'False';
    }else{                                          redirect('Setting.php');
    }


    if ($_SESSION['TAT']['Session'] == 'End'){       redirect('results.php');    }

    $stg = explode('#', $_SESSION['TAT']['Level']);
    $_SESSION['TAT']['a30'] = $stg[0] . '-' . $stg[1];

    // check for time elapsed from begin
    $cur_time = time();
    if ($cur_time - $_SESSION['TAT']['TAT_Time'] > 1800) {
        redirect('results.php');
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
        <script src="JS/scripts-SE2.js"></script>
        <script src="JS/scripts-jQuery.js"></script>

        <link rel="stylesheet" href="Style/web-icon-lib.css" />
        <link rel="stylesheet" href="Style/base-styles.css" />
        <link rel="stylesheet" href="Style/SE.css">

        <script src="JS/lib-swalert.js"></script>
        <link rel="stylesheet" href="Style/swalert-lib.css">
        <link rel="stylesheet" href="Style/animate-lib.css">
        <script src="JS/lib-swalert-polyfill.js"></script>

        <style>
            .SE_btn {width: 35%;}
            #SE_BTN_0 {width: 72%;        aspect-ratio:1/0.35;    font-size: 220%;}

            <?php
                if ($stg[1]==2 || $stg[1]==3 || $stg[1]==4 || $stg[1]==6){
                    echo '.SE_btn {width: 27%;}';
                    echo '#SE_BTN_0 {width: 60%;    aspect-ratio:1/0.35;    font-size: 220%;}';


                }elseif ($stg[1]==5 || $stg[1]==7 || $stg[1]==8 || $stg[1]==9 || $stg[1]==10 || $stg[1]==11){
                    echo '.SE_btn {width: 22%;}';
                    echo '#SE_BTN_0 {width: 50%;    aspect-ratio:1/0.35;    font-size: 220%;}';


                }elseif ($stg[1]==12 || $stg[1]==13){
                    echo '.SE_btn {width: 17%;}';
                    echo '#SE_BTN_0 {width: 40%;    aspect-ratio:1/0.35;    font-size: 220%;}';
                }

            ?>

        </style>

    </head>

    <body>

        <i id="SE_Start_Plus" class="fal fa-plus fa-5x"></i>

        <div id="Cue_Color_back"></div>

        <form method="post" action="SE2.php">
            <input type="hidden" id="TAT_Freq_Num" value="<?php  echo $_SESSION['TAT']['a9']; ?>">
            <input type="hidden" id="TAT_Freq_Vol" value="<?php  echo $_SESSION['TAT']['a10']; ?>">
            <input type="hidden" id="TAT_TAT_Vol"  value="<?php  echo $_SESSION['TAT']['a14'];  ?>">
            <input type="hidden" id="TAT_TAT_Num"  value="<?php  echo $_SESSION['TAT']['a6'];  ?>">
            <input type="hidden" id="TAT_TAT_Time" value="<?php  echo $_SESSION['TAT']['TAT_Time']; ?>">
            <input type="hidden" id="Stage_time" value="" name="STG_Time">
            <input type="hidden" id="SE_Cue_Num" value="">
            <input type="hidden" id="SE_Cue_snd" value="">
            <input type="hidden" id="SE_Cue_tim" value="">

            <div id="SE_BTN">

                <?php

                    //for ($i=1; $i<=intval($_GET["btn"]) ;$i++){
                    for ($i=1; $i<=intval($stg[3]) ;$i++){
                        echo '<button type="submit" id="SE_BTN_' . $i . '" class="SE_btn" name="SE_Answer_F" value="#fff" disabled="true"></button>';
                    }

                ?>

                <br>
                <button type="submit" id="SE_BTN_0" class="SE_btn" name="SE_Answer_F" value="#fff" disabled="true">هیچکدام</button>
                <!--<button type="submit" id="ANS_BTN_ref" class="SE_btn" name="" value="#fff">مطمئن نیستم</button>-->
            </div>

            <div id="ANS_BTN">

                <!--<button type="submit" id="ANS_BTN_ref" class="ANS_BTN" name="" value="#fff">دوباره Cue</button>-->
                <br><br>
                <button type="button" id="ANS_BTN_cont" class="ANS_BTN" onclick="Cue_Answer();" >پاسخ تمرین</button>

            </div>

        </form>




        <!--
        <a class="link_btn" style="margin-right: 10%; text-align: center; width: 80%;" href="results.php">خروج &nbsp;&nbsp;&nbsp; <i class="fal fa-angle-double-left fa-2x"></i> </a>
        -->

        <audio id="Freq_aud"><source src="" type="audio/mpeg"></audio>
        <audio id="Cue_snd_aud"><source src="" type="audio/mpeg"></audio>
        <audio id="Cue_num_aud"><source src="" type="audio/mpeg"></audio>

            <script>
                //var stg = <?php //echo $_GET["stg"]; ?>;
                //var lvl = <?php //echo $_GET["lvl"] ?>;
                var stg = <?php echo $stg[0]; ?>;
                var lvl = <?php echo $stg[1] ?>;

                Stage_start(stg,lvl);
                Cue_start(stg,lvl);

            </script>

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
