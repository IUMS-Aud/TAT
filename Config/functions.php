<?php
    require_once 'config.php';

    $message = '';
    $error = '';

    // function to redirect pages
    function redirect($url){        header("Location: " . $url);    }

    // function to check is user login ?
    function is_login(){
        if (isset($_SESSION['person'])) {  return true;   } else {    return false;   }
    }

    // logout user
    if (isset($_GET['logout'])) {    unset($_SESSION['person']);    }


    // -----------------------------------------------------------------------------------------------------

    // function to test Form inputs and convert utf code

    // function to check data for hackers or sql injections;
    function be_safe_data($data){
        $data = strip_tags($data);
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        //$data = utf_to_asc($data);
        return $data;
    }

    function be_safe_utf($data){
        $data = strip_tags($data);
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        //$data = utf_to_asc($data);
        return $data;
    }



    function utf_to_asc($data){
        // for convert utf-8 catacters to ansi
        $data = str_replace("ا","Ç",$data);
        $data = str_replace("ب","È",$data);
        $data = str_replace("پ","",$data);
        $data = str_replace("ت","Ê",$data);
        $data = str_replace("ث","Ë",$data);
        $data = str_replace("ج","Ì",$data);
        $data = str_replace("چ","",$data);
        $data = str_replace("ح","Í",$data);
        $data = str_replace("خ","Î",$data);
        $data = str_replace("د","Ï",$data);
        $data = str_replace("ذ","Ð",$data);
        $data = str_replace("ر","Ñ",$data);
        $data = str_replace("ز","Ò",$data);
        $data = str_replace("ژ","Ž",$data);
        $data = str_replace("س","Ó",$data);
        $data = str_replace("ش","Ô",$data);
        $data = str_replace("ص","Õ",$data);
        $data = str_replace("ض","Ö",$data);
        $data = str_replace("ط","Ø",$data);
        $data = str_replace("ظ","Ù",$data);
        $data = str_replace("ع","Ú",$data);
        $data = str_replace("غ","Û",$data);
        $data = str_replace("ف","Ý",$data);
        $data = str_replace("ق","Þ",$data);
        $data = str_replace("ک","˜",$data);
        $data = str_replace("ك","˜",$data);
        $data = str_replace("گ","",$data);
        $data = str_replace("ل","á",$data);
        $data = str_replace("م","ã",$data);
        $data = str_replace("ن","ä",$data);
        $data = str_replace("و","æ",$data);
        $data = str_replace("ه","å",$data);
        $data = str_replace("ی","í",$data);
        $data = str_replace("ي","í",$data);
        $data = str_replace("آ","Â",$data);
        $data = str_replace("ؤ","Ä",$data);
        $data = str_replace("ئ","Æ",$data);
        $data = str_replace("ء","Á",$data);
        $data = str_replace("أ","Ã",$data);
        $data = str_replace("إ","Å",$data);
        $data = str_replace("،","¡",$data);
        $data = str_replace("‌","",$data);
        $data = str_replace("؛‌","º",$data);

         return $data;
    }

    // function to convert ansi data from sql to utf-8
    function asc_to_utf($data){
        $data = str_replace("Ç","ا",$data);
        $data = str_replace("È","ب",$data);
        $data = str_replace("","پ",$data);
        $data = str_replace("Ê","ت",$data);
        $data = str_replace("Ë","ث",$data);
        $data = str_replace("Ì","ج",$data);
        $data = str_replace("","چ",$data);
        $data = str_replace("Í","ح",$data);
        $data = str_replace("Î","خ",$data);
        $data = str_replace("Ï","د",$data);
        $data = str_replace("Ð","ذ",$data);
        $data = str_replace("Ñ","ر",$data);
        $data = str_replace("Ò","ز",$data);
        $data = str_replace("Ž","ژ",$data);
        $data = str_replace("Ó","س",$data);
        $data = str_replace("Ô","ش",$data);
        $data = str_replace("Õ","ص",$data);
        $data = str_replace("Ö","ض",$data);
        $data = str_replace("Ø","ط",$data);
        $data = str_replace("Ù","ظ",$data);
        $data = str_replace("Ú","ع",$data);
        $data = str_replace("Û","غ",$data);
        $data = str_replace("Ý","ف",$data);
        $data = str_replace("Þ","ق",$data);
        $data = str_replace("˜","ک",$data);
        $data = str_replace("˜","ك",$data);
        $data = str_replace("","گ",$data);
        $data = str_replace("á","ل",$data);
        $data = str_replace("ã","م",$data);
        $data = str_replace("ä","ن",$data);
        $data = str_replace("æ","و",$data);
        $data = str_replace("å","ه",$data);
        $data = str_replace("í","ی",$data);
        $data = str_replace("í","ي",$data);
        $data = str_replace("Â","آ",$data);
        $data = str_replace("Ä","ؤ",$data);
        $data = str_replace("Æ","ئ",$data);
        $data = str_replace("Á","ء",$data);
        $data = str_replace("Ã","أ",$data);
        $data = str_replace("Å","إ",$data);
        $data = str_replace("¡","،",$data);
        $data = str_replace("","‌",$data);
        $data = str_replace("º","؛",$data);


        return $data;
    }

/*
    function visit_page_rep($a2, $a3, $a4){
        global $db_path;

        $query = "INSERT INTO visitrep_tbl (a2, a3, a4) value ('$a2', $a3, '$a4')". " ON DUPLICATE KEY UPDATE a3=(a3 + 1), a4='$a4'";

        $query = mysqli_query($db_path, $query);
        if ($query) { return true; }else{ return false; }
    }
*/

    // -----------------------------------------------------------------------------------------------------
    // functions for check Username has been registerd befor

    // function to send samll SELECT query and return true or false
    function MySQL_Select_res($query){
        global $db_path;
        $query_res = mysqli_query($db_path, $query);
        if (mysqli_num_rows($query_res) > 0) { return true; }else{ return false; }
    }

    // function to send SELECT query and return All results
    function MySQL_Select($query){
        global $db_path;
        $query_res = mysqli_query($db_path, $query);
        return $query_res;

    }

    // function to send INSERT or UPDATE or DELETE or other query to and return true or false
    function MySQL_Query($query) {
        global $db_path;
        $query_res = mysqli_query($db_path, $query);
        if ($query_res) { return true; }else{ return false; }
    }

?>