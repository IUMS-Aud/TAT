// Loading
function Loading_Freq() {

    var LOAD_aud = document.getElementById("LOAD_aud");


        for (i=1;i<=11; i++){

            LOAD_aud.src = "Voice/CUE_L/" + i + ".mp3";                  LOAD_aud.load();
            LOAD_aud.src = "Voice/CUE_R/" + i + ".mp3";                  LOAD_aud.load();

            LOAD_aud.src = "Voice/Freq_Both/T_" + i + ".mp3";            LOAD_aud.load();
            LOAD_aud.src = "Voice/Freq_Both/N_" + i + ".mp3";            LOAD_aud.load();

            LOAD_aud.src = "Voice/Freq_L/T_" + i + ".mp3";               LOAD_aud.load();
            LOAD_aud.src = "Voice/Freq_L/N_" + i + ".mp3";               LOAD_aud.load();

            LOAD_aud.src = "Voice/Freq_R/T_" + i + ".mp3";               LOAD_aud.load();
            LOAD_aud.src = "Voice/Freq_R/N_" + i + ".mp3";               LOAD_aud.load();

            LOAD_aud.src = "Voice/Num_L/" + i + ".mp3";               LOAD_aud.load();
            LOAD_aud.src = "Voice/Num_R/" + i + ".mp3";               LOAD_aud.load();

        }
    setTimeout(function () {

        document.getElementById("LOADING_div").style.display = "none";

    }, 3000);

}

// Setting Frequency Audio sample play
function Setting_Freq(){

    var a9_inp = document.getElementById("a9_inp").value;
    var a10_inp = document.getElementById("a10_inp");
    var a11 = "";

         if (document.getElementById("a11_1_rdb").checked){    a11 = "R";         }
    else if (document.getElementById("a11_2_rdb").checked){    a11 = "L";         }
    else if (document.getElementById("a11_3_rdb").checked){    a11 = "Both";      }
    else if (document.getElementById("a11_4_rdb").checked){    a11 = "Both";      }

    if (document.getElementById("a8_1_rdb").checked == true){        a9_inp = "T_" + a9_inp;
    }else{                                                                    a9_inp = "N_" + a9_inp;
    }

    var Freq_aud = document.getElementById("Freq_aud");

        Freq_aud.src = "Voice/Freq_" + a11 + "/" + a9_inp + ".mp3";

        Freq_aud.play();
        Freq_aud.volume = (a10_inp.value / 100);

}

function Setting_TAT_vol() {

    var a14_inp = document.getElementById("a14_inp");
    var TAT_aud = document.getElementById("TAT_aud");
    var num_arry = ["1","2","3","5","6","7","8","9"];
    var rnd = num_arry[Math.floor(Math.random() * num_arry.length)];

    TAT_aud.src = "";

    if (document.getElementById("a11_1_rdb").checked){       TAT_aud.src = "Voice/Num_L/" + rnd + ".mp3";         }
    else {                                                            TAT_aud.src = "Voice/Num_R/" + rnd + ".mp3";         }

    TAT_aud.play();
    TAT_aud.volume = (a14_inp.value / 100);
}

function Setting_TAT_Rate(r_name){
    document.getElementById(r_name + "_rate").innerHTML = document.getElementById(r_name + "_inp").value + "&nbsp;&nbsp;" + "از 10";
}

