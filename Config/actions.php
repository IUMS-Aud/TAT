<?php
    require_once 'config.php';

    // Login users
    if (isset($_POST['do-login'])) {

        // get data from inputs and convert to ansi
        $a5 = be_safe_data($_POST["a5"]);
        $a6 = md5(be_safe_data($_POST["a6"]));

        // Check for username and password
        $query = "SELECT * FROM tr_user_tbl WHERE df=1 AND a5='$a5' AND a6='$a6'";
        $query_res = MySQL_Select($query);

        if (mysqli_num_rows($query_res) > 0) {

            $user_data = asc_to_utf(mysqli_fetch_array($query_res));

            $_SESSION['person'] = array();
            $_SESSION['person']['id'] = $user_data['id'];
            $_SESSION['person']['prvn'] = $user_data['a2'];
            $_SESSION['person']['name'] = $user_data['a3'];
            $_SESSION['person']['gender'] = $user_data['a4'];
            $_SESSION['person']['user'] = $user_data['a5'];
            $_SESSION['person']['access'] = $user_data['a7'];
            $_SESSION['person']['group'] = $user_data['a8'];
            $_SESSION['person']['age'] = $user_data['a9'];

        } else {
            $error = 'title: ""' . ', html: "نام کاربری یا رمز عبور اشتباه است"';
        }

    }

    // Register new Users
    if (isset($_POST['Register_User'])){

        // get data from inputs and convert to ansi

        $a2 = be_safe_data($_POST["a2"]);
        $a3 = be_safe_data($_POST["a3"]);
        $a4 = $_POST["a3"];
        $a5 = be_safe_data($_POST["a5"]);
        $a6 = md5(be_safe_data($_POST["a6"]));
        $a7 = "1";
        $a8 = $_POST["a8"];
        $a9 = be_safe_data($_POST["a9"]);

        $error = '';

        // Chek for important fields
        $query = "SELECT id FROM tr_user_tbl WHERE df='1' AND (a2='$a2' OR a3='$a3' OR a5='$a5')";
        if (MySQL_Select_res($query)) {     $error = $error . 'شماره پرونده یا نام بیمار یا کد کاربری تکراری است!' . '<br>';     }

        if ($error=='') {

            $query = "INSERT INTO tr_user_tbl (id, df, a2, a3, a4, a5, a6, a7, a8, a9) VALUES ('NULL', '1','$a2', '$a3', '$a4', '$a5', '$a6', '$a7', '$a8', '$a9')";
            if (MySQL_Query($query)) {
                $message = 'title: ""' . ', html: "کاربر جدید با موفقیت ثبت شد"';

            } else {
                $error = 'title: ""' . ', html: "خطایی در فرایند ثبت اطلاعات رخ داده است!"';
            }
        }else{
            $error = 'title: ""' . ', html: "' . $error . '"';
        }

                /*

        if(MySQL_Query($query)){

            $_SESSION['TAT']['Session'] = 'End';

        }else{
            $error = 'title: ""' . ', html: "متاسفانه خطایی در ثبت تمرین رخ داده است، دوباره تمرین را انجام دهید"';
        }

                */


    }




    // ---------------------------------------------------------------------------------------------------------

    // Start Training session
    if (isset($_POST['start_TAT'])){

        $_SESSION['TAT'] = array();

            $_SESSION['TAT']['a2'] = $_SESSION["person"]["prvn"];
            $_SESSION['TAT']['a3'] = $_SESSION["person"]["name"];
            $_SESSION['TAT']['a4'] = '1';
            $_SESSION['TAT']['a5'] = date("Ymd");                                                    // TAT_dt
            $_SESSION['TAT']['a6'] = $_POST["a6"];                                                          // TAT_Num
            $_SESSION['TAT']['a7'] = date("H:i:s");
            $_SESSION['TAT']['a8'] = $_POST["a8"];
            $_SESSION['TAT']['a9'] = $_POST["a9"];

            if($_POST["a8"]==2){       $_SESSION['TAT']['a9'] = $_SESSION['TAT']['a9'] + 11;        }       // Freq_Num

            $_SESSION['TAT']['a10'] = $_POST["a10"];                                                        // Freq_Vol
            $_SESSION['TAT']['a11'] = $_POST["a11"];
            $_SESSION['TAT']['a12'] = $_POST["a12"];
            $_SESSION['TAT']['a13'] = $_POST["a13"];
            $_SESSION['TAT']['a14'] = $_POST["a14"];                                                        // TAT_Vol
            $_SESSION['TAT']['a15'] = $_SESSION['person']['group'];
            $_SESSION['TAT']['a16'] = $_SESSION['person']['age'];
            $_SESSION['TAT']['a17'] = $_SESSION['person']['gender'];
            $_SESSION['TAT']['a18'] = 0;
            $_SESSION['TAT']['a19'] = 0;
            $_SESSION['TAT']['a20'] = 0;
            $_SESSION['TAT']['a21'] = 0;
            $_SESSION['TAT']['a22'] = 0;
            $_SESSION['TAT']['a23'] = 0;
            $_SESSION['TAT']['a24'] = 0;
            $_SESSION['TAT']['a25'] = 0;
            $_SESSION['TAT']['a26'] = 0;
            $_SESSION['TAT']['a27'] = 0;
            $_SESSION['TAT']['a28'] = 0;
            $_SESSION['TAT']['a29'] = 0;
            $_SESSION['TAT']['a30'] = '1-1';

            $_SESSION['TAT']['TAT_Time'] = time();          // get start time in second >> return big number from 1970
            $_SESSION['TAT']['STG_Time'] = 0;
            $_SESSION['TAT']['STG_True'] = 0;
            $_SESSION['TAT']['Level'] = '1#1#1#8';         // stg # lvl # rpt # btn
            $_SESSION['TAT']['GoNext'] = 'True';
            $_SESSION['TAT']['Session'] = 'Start';

        //redirect("SE1.php?stg=1&lvl=1&rpt=1&btn=8");
        $SE_Name = "SE" . $_SESSION['person']['group'] . ".php";
        redirect($SE_Name);

    }


    // ---------------------------------------------------------------------------------
    // check for Answer

    if(isset($_POST['SE_Answer_F'])){

        $_SESSION['TAT']['GoNext'] = 'True';

        $stg = explode('#', $_SESSION['TAT']['Level']);     // stg # lvl # rpt # btn

        // Check for a18 to a29
        $_Response_time = round(microtime(true), 3) - $_POST["STG_Time"];

        if (intval($stg[0])==1){

            $_SESSION['TAT']['a18'] = time() - $_SESSION['TAT']['TAT_Time'];
            $_SESSION['TAT']['a21'] = $_SESSION['TAT']['a21'] + 1;
            $_SESSION['TAT']['a27'] = $_SESSION['TAT']['a27'] + $_Response_time;

        }elseif (intval($stg[0])==2) {

            $_SESSION['TAT']['a19'] = (time() - $_SESSION['TAT']['TAT_Time']) - $_SESSION['TAT']['a18'];
            $_SESSION['TAT']['a22'] = $_SESSION['TAT']['a22'] + 1;
            $_SESSION['TAT']['a28'] = $_SESSION['TAT']['a28'] + $_Response_time;

        }elseif (intval($stg[0])==3) {
            $_SESSION['TAT']['a20'] = (time() - $_SESSION['TAT']['TAT_Time']) - ($_SESSION['TAT']['a18'] + $_SESSION['TAT']['a19']);
            $_SESSION['TAT']['a23'] = $_SESSION['TAT']['a23'] + 1;
            $_SESSION['TAT']['a29'] = $_SESSION['TAT']['a29'] + $_Response_time;
        }

        $error = 'title: ""' . ', html: " پاسخ شما اشتباه است. دوباره سعی کنید"';
    }

    if(isset($_POST['SE_Answer_T'])){

        $_SESSION['TAT']['GoNext'] = 'True';

        $stg = explode('#', $_SESSION['TAT']['Level']);     // stg # lvl # rpt # btn

        // Check for a18 to a29
        $_Response_time = round(microtime(true), 3) - $_POST["STG_Time"];

        $_SESSION['TAT']['STG_True'] = $_SESSION['TAT']['STG_True']  + 1;

        if (intval($stg[0])==1){

            $_SESSION['TAT']['a18'] = time() - $_SESSION['TAT']['TAT_Time'];
            $_SESSION['TAT']['a24'] = $_SESSION['TAT']['a24'] + $_Response_time;

        }elseif (intval($stg[0])==2) {

            $_SESSION['TAT']['a19'] = (time() - $_SESSION['TAT']['TAT_Time']) - $_SESSION['TAT']['a18'];
            $_SESSION['TAT']['a25'] = $_SESSION['TAT']['a25'] + $_Response_time;

        }elseif (intval($stg[0])==3) {
            $_SESSION['TAT']['a20'] = (time() - $_SESSION['TAT']['TAT_Time']) - ($_SESSION['TAT']['a18'] + $_SESSION['TAT']['a19']);
            $_SESSION['TAT']['a26'] = $_SESSION['TAT']['a26'] + $_Response_time;
        }


        // check and go to next level

        $stg[2] = intval($stg[2]) + 1;

        $max_rpt = 0;
        if ($_SESSION['person']['group']==1){            $max_rpt = intval($stg[3]);
        }else{                                           $max_rpt = intval($stg[3]) * 2;
        }

        if ($stg[2] > $max_rpt){

                 if(intval($stg[1])==1){         $_SESSION['TAT']['Level'] = '1#2#1#10';
            }elseif(intval($stg[1])==2){         $_SESSION['TAT']['Level'] = '1#3#1#12';
            }elseif(intval($stg[1])==3){         $_SESSION['TAT']['Level'] = '1#4#1#14';
            }elseif(intval($stg[1])==4){         $_SESSION['TAT']['Level'] = '1#5#1#16';
            }elseif(intval($stg[1])==5){         $_SESSION['TAT']['Level'] = '2#6#1#15';
            }elseif(intval($stg[1])==6){         $_SESSION['TAT']['Level'] = '2#7#1#18';
            }elseif(intval($stg[1])==7){         $_SESSION['TAT']['Level'] = '2#8#1#21';
            }elseif(intval($stg[1])==8){         $_SESSION['TAT']['Level'] = '2#9#1#24';
            }elseif(intval($stg[1])==9){         $_SESSION['TAT']['Level'] = '3#10#1#20';
            }elseif(intval($stg[1])==10){        $_SESSION['TAT']['Level'] = '3#11#1#24';
            }elseif(intval($stg[1])==11){        $_SESSION['TAT']['Level'] = '3#12#1#28';
            }elseif(intval($stg[1])==12){        $_SESSION['TAT']['Level'] = '3#13#1#32';
            }elseif(intval($stg[1])==13){        $_SESSION['TAT']['Level'] = '3#13#1#32';
            }else{                               redirect("results.php");
            }
        }else{
            $_SESSION['TAT']['Level'] =  $stg[0] . '#' . $stg[1] . '#' . $stg[2] . '#' . $stg[3];
        }

    }



?>