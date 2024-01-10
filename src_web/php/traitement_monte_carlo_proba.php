<?php

session_start();


if (isset($_POST['envoyer'], $_POST['e_t'], $_POST['t'], $_POST['m'])){

    // vérification que les paramètres ne sont pas nulles
    if ($_POST['envoyer']!=null and $_POST['e_t']!=null and $_POST['t']!=null and $_POST['m']!=null){
        $arg1 = $_POST['m'];
        $arg2 = $_POST['e_t'];
        $arg3 = $_POST['t'];

        echo $arg1;
        echo $arg2;
        echo $arg3;

        $resultat = exec("python3 Module_Proba/montecarlompi.py $arg1 $arg2 $arg3 > resultat.txt 2>&1", $output, $return_var);
        $_SESSION['resultat'] = $resultat;
        header("Location: ../module_proba_monte_carlo.php?res=true");

        // vide les valeurs du formulaire
        unset($_POST);
    }
    else{
      header("Location: ../module_proba_monte_carlo.php");
    }
}
else{
    header("Location: ../module_proba_monte_carlo.php");
}
  

/*$resultat = exec("mpiexec -n 4 --host node1,node2,node3,node4 python3 /Module_CalculNombresPremiers/nombres_Premiers.py $arg1");*/

/*$resultat = exec("python3 Module_CalculNombresPremiers/nombres_Premiers.py $arg1");*/

/*$_SESSION['resultat'] = $resultat;*/

/*header("Location: ../module_proba.php?M=$arg1&m=$arg2&et=$arg3&t=$arg4");*/

?>