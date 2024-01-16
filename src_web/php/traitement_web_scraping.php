<?php

session_start();

if (isset($_POST["send"])){
    #echo $_POST["send"];

    if ($_POST["send"] == "titre_fr"){
        $res = exec("python3 Module_WebScraping/webscrapingv2_01.py 1");
    }
    elseif ($_POST["send"] == "resultat_fr"){
        $res = exec("python3 Module_WebScraping/webscrapingv2_01.py 2");
    }
    elseif ($_POST["send"] == "titre_en"){
        $res = exec("python3 Module_WebScraping/webscrapingv2_01.py 3");
    }
    elseif ($_POST["send"] == "resultat_en"){
        $res = exec("python3 Module_WebScraping/webscrapingv2_01.py 4");
    }
    else{

    }

    $_SESSION["output"] = $res;

    header("Location: ../module_web_scraping.php?btn=".$_POST["send"]);

}

?>