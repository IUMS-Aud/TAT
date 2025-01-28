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


// -------------------------------------------------------------------------------------------------
// SE Stage start
function Stage_start(stg,lvl){

    var cnt = 0;
    var btn_num = [];
    var btn_color = [];

        if (lvl==1){
            btn_num = ["1","2","3","5","1","2","3","5"];

            for(var i=1;i<=4;i++){  btn_color.push("#00A7F4");  }
            for(var i=5;i<=8;i++){  btn_color.push("#F4B72C");  }

            cnt = 8;


        }else if(lvl==2){
            var btn_num = ["1","2","3","5","6","1","2","3","5","6"];

            for(var i=1;i<=5;i++) { btn_color.push("#00A7F4");  }
            for(var i=6;i<=10;i++){ btn_color.push("#F4B72C");  }

            cnt = 10;


        }else if(lvl==3){
            var btn_num = ["1","2","3","5","6","7","1","2","3","5","6","7"];

            for(var i=1;i<=6;i++){  btn_color.push("#00A7F4");  }
            for(var i=7;i<=12;i++){ btn_color.push("#F4B72C");  }
            cnt = 12;


        }else if(lvl==4){
            var btn_num = ["1","2","3","5","6","7","8","1","2","3","5","6","7","8"];

            for(var i=1;i<=7;i++){  btn_color.push("#00A7F4");  }
            for(var i=8;i<=14;i++){ btn_color.push("#F4B72C");  }

            cnt = 14;


        }else if(lvl==5){
            var btn_num = ["1","2","3","5","6","7","8","9","1","2","3","5","6","7","8","9"];

            for(var i=1;i<=8;i++){  btn_color.push("#00A7F4");  }
            for(var i=9;i<=16;i++){ btn_color.push("#F4B72C");  }

            cnt = 16;

        }else if(lvl==6){
            var btn_num = ["1","2","3","5","6","1","2","3","5","6","1","2","3","5","6"];

            for(var i=1;i<=5;i++){  btn_color.push("#00A7F4");   }
            for(var i=6;i<=10;i++){ btn_color.push("#F4B72C");   }
            for(var i=11;i<=15;i++){ btn_color.push("#FF6964");  }

            cnt = 15;


        }else if(lvl==7){
            var btn_num = ["1","2","3","5","6","7","1","2","3","5","6","7","1","2","3","5","6","7"];

            for(var i=1;i<=6;i++){  btn_color.push("#00A7F4");   }
            for(var i=7;i<=12;i++){ btn_color.push("#F4B72C");   }
            for(var i=13;i<=18;i++){ btn_color.push("#FF6964");  }

            cnt = 18;


        }else if(lvl==8){
            var btn_num = ["1","2","3","5","6","7","8","1","2","3","5","6","7","8","1","2","3","5","6","7","8"];

            for(var i=1;i<=7;i++){  btn_color.push("#00A7F4");   }
            for(var i=8;i<=14;i++){ btn_color.push("#F4B72C");   }
            for(var i=15;i<=21;i++){ btn_color.push("#FF6964");  }

            cnt = 21;


        }else if(lvl==9){
            var btn_num = ["1","2","3","5","6","7","8","9","1","2","3","5","6","7","8","9","1","2","3","5","6","7","8","9"];

            for(var i=1;i<=8;i++){  btn_color.push("#00A7F4");   }
            for(var i=9;i<=16;i++){ btn_color.push("#F4B72C");   }
            for(var i=17;i<=24;i++){ btn_color.push("#FF6964");  }

            cnt = 24;


        }else if(lvl==10){
            var btn_num = ["1","2","3","5","6","1","2","3","5","6","1","2","3","5","6","1","2","3","5","6"];

            for(var i=1;i<=5;i++){  btn_color.push("#00A7F4");   }
            for(var i=6;i<=10;i++){ btn_color.push("#F4B72C");   }
            for(var i=11;i<=15;i++){ btn_color.push("#FF6964");  }
            for(var i=16;i<=20;i++){ btn_color.push("#59BB36");  }

            cnt = 20;


        }else if(lvl==11){
            var btn_num = ["1","2","3","5","6","7","1","2","3","5","6","7","1","2","3","5","6","7","1","2","3","5","6","7"];

            for(var i=1;i<=6;i++){  btn_color.push("#00A7F4");   }
            for(var i=7;i<=12;i++){ btn_color.push("#F4B72C");   }
            for(var i=13;i<=18;i++){ btn_color.push("#FF6964");  }
            for(var i=19;i<=24;i++){ btn_color.push("#59BB36");  }

            cnt = 24;


        }else if(lvl==12){
            var btn_num = ["1","2","3","5","6","7","8","1","2","3","5","6","7","8","1","2","3","5","6","7","8","1","2","3","5","6","7","8"];

            for(var i=1;i<=7;i++)  { btn_color.push("#00A7F4");  }
            for(var i=8;i<=14;i++) { btn_color.push("#F4B72C");  }
            for(var i=15;i<=21;i++){ btn_color.push("#FF6964");  }
            for(var i=21;i<=28;i++){ btn_color.push("#59BB36");  }

            cnt = 28;


        }else if(lvl==13){
            var btn_num = ["1","2","3","5","6","7","8","9","1","2","3","5","6","7","8","9","1","2","3","5","6","7","8","9","1","2","3","5","6","7","8","9"];

            for(var i=1;i<=8;i++)  { btn_color.push("#00A7F4");  }
            for(var i=9;i<=16;i++) { btn_color.push("#F4B72C");  }
            for(var i=17;i<=24;i++){ btn_color.push("#FF6964");  }
            for(var i=25;i<=32;i++){ btn_color.push("#59BB36");  }

            cnt = 32;
        }

    for (var i=1; i<=cnt; i++){

        var btn = document.getElementById("SE_BTN_" + i);
        var rnd = Math.floor(Math.random() * btn_num.length);


        btn.style.backgroundColor = btn_color[rnd];
        btn.value = btn_color[rnd];

        btn.innerHTML = btn_num[rnd];

        btn_num.splice(rnd,1);
        btn_color.splice(rnd,1);
    }

}


// ------------------------------------------------------------------------------------------------------------------
// SE Cue start
function Cue_start(stg,lvl){

    // Get or Set data
    var cue_time = 200;
    var cue_num_array = ["1","2","3","5","6","7","8","9"];
    var cue_color_array = ["#00A7F4", "#F4B72C", "#FF6964", "#59BB36"];
//  var cue_snd_array_freq1 = ["2","3","4"];
//  var cue_snd_array_freq2 = ["9","10","11"];

    var cue_num = "";
    var cue_color = "";
//  var cue_snd_1 = "";
//  var cue_snd_2 = "";

    var TAT_Freq_Num = document.getElementById("TAT_Freq_Num").value;
    var TAT_Freq_Vol = document.getElementById("TAT_Freq_Vol").value;
    var TAT_TAT_Vol = document.getElementById("TAT_TAT_Vol").value;

    var TAT_TAT_Num = document.getElementById("TAT_TAT_Num").value;
    var noise_mode = "";
    var cue_mode = "";
    if (parseInt(TAT_TAT_Num) % 2){
        noise_mode = "L";
//      cue_mode = "R";
    }else{
        noise_mode = "R";
//      cue_mode = "L";
    }

    // set cue number and color
    if (lvl==1) {
        cue_num = cue_num_array[Math.floor(Math.random() * 4)];
        cue_color = cue_color_array[Math.floor(Math.random() * 2)];
        cue_time = 2000;

    }else if(lvl==2) {
        cue_num = cue_num_array[Math.floor(Math.random() * 5)];
        cue_color = cue_color_array[Math.floor(Math.random() * 2)];
        cue_time = 1800;

    }else if(lvl==3) {
        cue_num = cue_num_array[Math.floor(Math.random() * 6)];
        cue_color = cue_color_array[Math.floor(Math.random() * 2)];
        cue_time = 1600;

    }else if(lvl==4) {
        cue_num = cue_num_array[Math.floor(Math.random() * 7)];
        cue_color = cue_color_array[Math.floor(Math.random() * 2)];
        cue_time = 1400;

    }else if(lvl==5) {
        cue_num = cue_num_array[Math.floor(Math.random() * 8)];
        cue_color = cue_color_array[Math.floor(Math.random() * 2)];
        cue_time = 1200;

    }else if(lvl==6) {
        cue_num = cue_num_array[Math.floor(Math.random() * 5)];
        cue_color = cue_color_array[Math.floor(Math.random() * 3)];
        cue_time = 1200;

    }else if(lvl==7) {
        cue_num = cue_num_array[Math.floor(Math.random() * 6)];
        cue_color = cue_color_array[Math.floor(Math.random() * 3)];
        cue_time = 1000;

    }else if(lvl==8) {
        cue_num = cue_num_array[Math.floor(Math.random() * 7)];
        cue_color = cue_color_array[Math.floor(Math.random() * 3)];
        cue_time = 800;

    }else if(lvl==9) {
        cue_num = cue_num_array[Math.floor(Math.random() * 8)];
        cue_color = cue_color_array[Math.floor(Math.random() * 3)];
        cue_time = 600;

    }else if(lvl==10) {
        cue_num = cue_num_array[Math.floor(Math.random() * 5)];
        cue_color = cue_color_array[Math.floor(Math.random() * 4)];
        cue_time = 800;

    }else if(lvl==11) {
        cue_num = cue_num_array[Math.floor(Math.random() * 6)];
        cue_color = cue_color_array[Math.floor(Math.random() * 4)];
        cue_time = 600;

    }else if(lvl==12) {
        cue_num = cue_num_array[Math.floor(Math.random() * 7)];
        cue_color = cue_color_array[Math.floor(Math.random() * 4)];
        cue_time = 400;

    }else if(lvl==13) {
        cue_num = cue_num_array[Math.floor(Math.random() * 8)];
        cue_color = cue_color_array[Math.floor(Math.random() * 4)];
        cue_time = 200;
    }


/*
    // set cue sound
    if (lvl<6) {
        if (TAT_Freq_Num >6){
            cue_snd_1 = cue_snd_array_freq1[Math.floor(Math.random() * 2)];
            cue_snd_2 = cue_snd_array_freq1[Math.floor(Math.random() * 2)];
        }else{
            cue_snd_1 = cue_snd_array_freq2[Math.floor(Math.random() * 2)];
            cue_snd_2 = cue_snd_array_freq2[Math.floor(Math.random() * 2)];
        }

    }else {
        if (TAT_Freq_Num >6){
            cue_snd_1 = cue_snd_array_freq1[Math.floor(Math.random() * 3)];
            cue_snd_2 = cue_snd_array_freq1[Math.floor(Math.random() * 3)];
        }else{
            cue_snd_1 = cue_snd_array_freq2[Math.floor(Math.random() * 3)];
            cue_snd_2 = cue_snd_array_freq2[Math.floor(Math.random() * 3)];
        }
    }
*/


    // set SE BTN Answer True
//  if (cue_snd_1==cue_snd_2) {
        for (var i=1; i<=32; i++){
            var obj_name = document.getElementById("SE_BTN_" + i);

            if (obj_name){

                if (obj_name.value==cue_color && obj_name.innerHTML==cue_num){
                    obj_name.name = "SE_Answer_T";
                    break;
                }
            }
        }

/*
    }else{
        document.getElementById("SE_BTN_0").name = "SE_Answer_T";

    }
*/


    // Set Cue Num and Sound into input box
    document.getElementById("SE_Cue_Num").value = cue_num;
//  document.getElementById("SE_Cue_snd").value = cue_snd_2;
    document.getElementById("SE_Cue_tim").value = cue_time;


    // Start Noise Sound
    var Freq_aud = document.getElementById("Freq_aud");

        if (TAT_Freq_Num<12){
            Freq_aud.src = "Voice/Freq_" + noise_mode + "/T_" + TAT_Freq_Num + ".mp3";
        }else{
            Freq_aud.src = "Voice/Freq_" + noise_mode + "/N_" + (TAT_Freq_Num - 11) + ".mp3";
        }

        //Freq_aud.play();
        //Freq_aud.volume = (TAT_Freq_Vol / 100);
        //Freq_aud.loop = true;


    // start cue
    document.getElementById("SE_Start_Plus").style.display = "block";

    setTimeout(function(){

            // Show Cue Color
            document.getElementById("Cue_Color_back").style.display = "block";
            document.getElementById("Cue_Color_back").style.backgroundColor = cue_color;


/*
            // Play Cue Sound
            var Cue_snd_aud = document.getElementById("Cue_snd_aud");

                Cue_snd_aud.src = "Voice/CUE_" + cue_mode + "/" + cue_snd_1 + ".mp3";

                Cue_snd_aud.play();
                Cue_snd_aud.volume = (TAT_TAT_Vol / 100);
*/
            // Stop Cue
            setTimeout(function () {
                document.getElementById("Cue_Color_back").style.display = "none";
                document.getElementById("SE_Start_Plus").style.display = "block";

//                Cue_snd_aud.pause();
//                Cue_snd_aud.currentTime = 0;


                // Show Answer Cue
                setTimeout(function(){

                    document.getElementById("SE_Start_Plus").style.display = "none";
                    Cue_Answer()

                },2000);

            }, cue_time);

        }

    ,2000);

}


// -------------------------------------------------------------------
function Cue_Answer(){
    document.getElementById("ANS_BTN").style.display = "none";
    document.getElementById("SE_BTN").style.display = "block";
    document.getElementById("Stage_time").value = (Date.now()/1000);


    var cue_num = document.getElementById("SE_Cue_Num").value;
    var cue_snd = document.getElementById("SE_Cue_snd").value;
    var cue_tim = document.getElementById("SE_Cue_tim").value;
    var TAT_TAT_Vol = document.getElementById("TAT_TAT_Vol").value;


    var TAT_TAT_Num = document.getElementById("TAT_TAT_Num").value;
    //var noise_mode = "";
    var cue_mode = "";
    if (parseInt(TAT_TAT_Num) % 2){
        //noise_mode = "L";
        cue_mode = "R";
    }else{
        //noise_mode = "R";
        cue_mode = "L";
    }

/*
    // Play Cue Sound
    var Cue_snd_aud = document.getElementById("Cue_snd_aud");
    var Cue_num_aud = document.getElementById("Cue_num_aud");

        Cue_snd_aud.src = "Voice/CUE_" + cue_mode + "/" + cue_snd + ".mp3";

        Cue_snd_aud.play();
        Cue_snd_aud.volume = (TAT_TAT_Vol / 100);
*/
    // show cue num
    document.getElementById("Cue_Num_back").style.display = "block";
    document.getElementById("Cue_Num_Num").innerHTML = cue_num;

        setTimeout(function () {
            document.getElementById("Cue_Num_back").style.display = "none";

/*
            Cue_snd_aud.pause();
            Cue_snd_aud.currentTime = 0;


            Cue_num_aud.src = "Voice/Num_" + cue_mode + "/" + cue_num + ".mp3";
            Cue_num_aud.play();
            Cue_num_aud.volume = (TAT_TAT_Vol / 100);
            var buttons = document.getElementsByClassName("SE_btn");
            for (let i = 0; i < buttons.length; i++) {
              buttons[i].disabled = false;
            }
*/

        }, cue_tim);


}

