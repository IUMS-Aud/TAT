<?php

    require_once("Config/config.php");

    if (!is_login()) {                    redirect('index.php');        }
    if (!(isset($_SESSION['TAT']))){      redirect('Setting.php');      }

    if ($_SESSION['TAT']['Session']=='Start'){



        $query = "INSERT INTO tr_tat_conf (id, df, a2, a3, a4, a5, a6, a7, a8, a9, a10, a11, a12, a13, a14, a15, a16, a17, a18, a19, a20, a21, a22, a23, a24, a25, a26, a27, a28, a29, a30, a31) VALUES (NULL, 1, ";
        $query = $query . $_SESSION['TAT']['a2'] . ", '" . $_SESSION['TAT']['a3'] . "', '" . $_SESSION['TAT']['a4'] . "', " . $_SESSION['TAT']['a5'] . ", ";
        $query = $query . $_SESSION['TAT']['a6'] . ", '" . $_SESSION['TAT']['a7'] . "',  " . $_SESSION['TAT']['a8'] . ",  " . $_SESSION['TAT']['a9'] . ",  " . $_SESSION['TAT']['a10'] . ", ";
        $query = $query . $_SESSION['TAT']['a11'] . ", " . $_SESSION['TAT']['a12'] . ",  " . $_SESSION['TAT']['a13'] . ", " . $_SESSION['TAT']['a14'] . ", " . $_SESSION['TAT']['a15'] . ", ";
        $query = $query . $_SESSION['TAT']['a16'] . ", " . $_SESSION['TAT']['a17'] . ",  " . $_SESSION['TAT']['a18'] . ", " . $_SESSION['TAT']['a19'] . ", " . $_SESSION['TAT']['a20'] . ", '";
        $query = $query . $_SESSION['TAT']['a21'] . "', '" . $_SESSION['TAT']['a22'] . "', '" . $_SESSION['TAT']['a23'] . "', '" . $_SESSION['TAT']['a24'] . "', '" . $_SESSION['TAT']['a25'] . "', '";
        $query = $query . $_SESSION['TAT']['a26'] . "', '" . $_SESSION['TAT']['a27'] . "', '" . $_SESSION['TAT']['a28'] . "', '" . $_SESSION['TAT']['a29'] . "', '" . $_SESSION['TAT']['a30'] . "', ";
        $query = $query . $_SESSION['TAT']['STG_True'] . ")";

        if(MySQL_Query($query)){

            $_SESSION['TAT']['Session'] = 'End';

        }else{
            $error = 'title: ""' . ', html: "متاسفانه خطایی در ثبت تمرین رخ داده است، دوباره تمرین را انجام دهید"';
        }

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

        <link rel="stylesheet" href="Style/results.css">


        <script src="JS/lib-swalert.js"></script>
        <link rel="stylesheet" href="Style/swalert-lib.css">
        <link rel="stylesheet" href="Style/animate-lib.css">
        <script src="JS/lib-swalert-polyfill.js"></script>


    </head>
    <body>

        <div class="forms_box">
            <h1 id="slogan">پایان تمرین</h1>
            <br>
            <hr>
            <br>
            <p>کاربر گرامی: <br> زمان تمرین شما به پایان رسیده است. اکنون می توانید از برنامه خارج شوید </p>

            <br><br><br>

            <p style="text-align: center; color: green;">نمودار تعداد پاسخ‌های صحیح در هر جلسه</p>
            <div id="True_Box_back" class="x_line_box">

                <div class="x_line_chart_box">

                    <?php
                        // search for number of True answer
                        $a2 = $_SESSION['TAT']['a2'];
                        $count_s = 0;
                        $query = "SELECT a31 FROM tr_tat_conf WHERE a2='$a2' ORDER BY a6";
                        $query_res = MySQL_Select($query);

                        if (mysqli_num_rows($query_res) > 0) {

                            while ( $row = mysqli_fetch_array($query_res)) {
                                $count_s = $count_s + 1;
                                echo '<div id="True_Box_line_' . $count_s . '" class="x_line_chart" style="background-color:yellowgreen;">' . $row["a31"] . '</div>';
                            }
                        } else {
                            for ($i=1; $i<=22; $i++) {
                                echo '<div id="True_Box_line_' . $i . '" class="x_line_chart">0</div>';
                            }
                        }
                    ?>
                </div>

                <div class="V_Text"><div>250</div><div>200</div><div>150</div><div>100</div><div>50</div></div>
                <div class="V_Border"></div>
                <div class="H_Border"></div>

                <div class="S_Border">
                    <?php
                        for ($i=1; $i<=22; $i++) { echo '<div>' . ' جلسه ' . $i . '</div>';}
                    ?>
                </div>

            </div>



            <br>
            <br>
            <br>
            <p style="text-align: center; color: red;">نمودار نسبت پاسخ‌های اشتباه در هر جلسه</p>
            <div id="False_Box_back" class="x_line_box">


                <div class="x_line_chart_box">

                    <?php
                        // search for number of False answer
                        $a2 = $_SESSION['TAT']['a2'];
                        $count_s = 0;
                        $query = "SELECT a21, a22, a23, a31 FROM tr_tat_conf WHERE a2='$a2' ORDER BY a6";
                        $query_res = MySQL_Select($query);

                        if (mysqli_num_rows($query_res) > 0) {

                            while ( $row = mysqli_fetch_array($query_res)) {
                                $count_s = $count_s + 1;

                                $false_answer = intval($row["a21"]) + intval($row["a22"]) + intval($row["a23"]);
                                $true_answer = intval($row["a31"]);
                                $nesbat = floor(($false_answer * 100) / ($false_answer + $true_answer));

                                echo '<div id="False_Box_line_' . $count_s . '" class="x_line_chart" style="background-color:#cd7065;">' . $nesbat . '</div>';
                            }
                        } else {
                            for ($i=1; $i<=22; $i++) {
                                echo '<div id="False_Box_line_' . $i . '" class="x_line_chart">0</div>';
                            }
                        }
                    ?>
                </div>

                <div class="V_Text"><div>% 100</div><div>% 80</div><div>% 60</div><div>%40</div><div>%20</div></div>
                <div class="V_Border"></div>
                <div class="H_Border"></div>
                <div class="S_Border">
                    <?php
                        for ($i=1; $i<=22; $i++) { echo '<div>' . ' جلسه ' . $i . '</div>';}
                    ?>
                </div>

            </div>

            <br><br><br>
            <a class="link_btn" style="margin-right: 10%; text-align: center; width: 80%;" href="?logout=1">خروج از تمرین &nbsp;&nbsp;&nbsp; <i class="fas fa-sign-out-alt  fa-lg" style="vertical-align: middle;"></i> </a>

            <br><br>


            <script>

                for ( var i=1; i<=22; i++){

                    // True Line
                    if (document.getElementById("True_Box_line_" + i)){
                        var h = parseInt(document.getElementById("True_Box_line_" + i).innerText);

                            document.getElementById("True_Box_line_" + i).style.height =  h + "px";
                            document.getElementById("True_Box_line_" + i).style.marginTop =  (250 - h) + "px";
                    }

                    // False Line
                    if (document.getElementById("False_Box_line_" + i)){
                        var h = parseInt(document.getElementById("False_Box_line_" + i).innerText);
                            h = (h*250) / 100;

                            document.getElementById("False_Box_line_" + i).style.height =  h + "px";
                            document.getElementById("False_Box_line_" + i).style.marginTop =  (250 - h) + "px";
                    }
                }
            </script>

        </div>

    </body>
</html>

<?php
    if($message){
        echo '<script language="JavaScript"> swal({' . $message . ', type:"success", allowOutsideClick: false, confirmButtonText:"ok"});</script>';
    }

    if ($error) {
        echo '<script language="JavaScript"> swal({' . $error . ', type:"error", allowOutsideClick: false, confirmButtonText:"ok"}).then(function() {window.location="Setting.php?logout=1"});</script>';
    }
?>









