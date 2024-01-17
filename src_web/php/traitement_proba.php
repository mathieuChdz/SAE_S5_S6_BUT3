<?php

session_start();


if (isset($_POST['envoyer'], $_POST['e_t'], $_POST['t'], $_POST['m'])){

    // vérification que les paramètres ne sont pas nulles
    if ($_POST['envoyer']!=null and $_POST['e_t']!=null and $_POST['t']!=null and $_POST['m']!=null){
        $arg1 = $_POST['t'];
        $arg2 = $_POST['m'];
        $arg3 = $_POST['e_t'];

        echo $arg1;
        echo $arg2;
        echo $arg3;
    
    if (isset($_POST['choix'])){
        // selection de la méthode choisie, execution du script python et renvoie du résultat
        if ($_POST['choix'] == "r_m"){
                echo "ok1";
                $res = exec("python3 Module_Proba/rectangle_medians.py $arg1 $arg2 $arg3");
                header("Location: ../module_proba.php?res=$res&methode=1#resultat");
            }
            if ($_POST['choix'] == "trapezes"){
                echo "ok2";
                $res = exec("python3 Module_Proba/trapeze.py $arg1 $arg2 $arg3");
                header("Location: ../module_proba.php?res=$res&methode=2#resultat");
            }
        
            if ($_POST['choix'] == "simpson"){
                echo "ok3";
                $res = exec("python3 Module_Proba/simpson.py $arg1 $arg2 $arg3");
                header("Location: ../module_proba.php?res=$res&methode=3#resultat");
            }
    }

    // vide les valeurs du formulaire
    unset($_POST);
    }
    else{
      header("Location: ../module_proba.php");
    }
}
else{
    header("Location: ../module_proba.php");
}
  

/*$resultat = exec("mpiexec -n 4 --host node1,node2,node3,node4 python3 /Module_CalculNombresPremiers/nombres_Premiers.py $arg1");*/

/*$resultat = exec("python3 Module_CalculNombresPremiers/nombres_Premiers.py $arg1");*/

/*$_SESSION['resultat'] = $resultat;*/

/*header("Location: ../module_proba.php?M=$arg1&m=$arg2&et=$arg3&t=$arg4");*/

?>