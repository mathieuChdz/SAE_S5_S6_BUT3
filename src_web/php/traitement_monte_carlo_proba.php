<?php

session_start();


if (isset($_POST['envoyer'], $_POST['e_t'], $_POST['m'])){

    // vérification que les paramètres ne sont pas nulles
    if ($_POST['t1']!=null or $_POST['t2']!=null){
        if ($_POST['envoyer']!=null and $_POST['e_t']!=null and $_POST['m']!=null){

            if ($_POST['t1']!=null){
                $arg3 = $_POST['t1'];
            }
            else{
                $arg3 = "0";
            }
    
            if ($_POST['t2']!=null){
                $arg4 = $_POST['t2'];
            }
            else{
                $arg4 = "0";
	    }
    
            $arg1 = $_POST['m'];
            $arg2 = $_POST['e_t'];
    
            $resultat = exec("mpiexec -n 4 --host node1,node2,node3,node4 python3 Module_Proba/montecarlompi.py $arg1 $arg2 $arg3 $arg4 > resultat.txt 2>&1", $output, $return_var);
            $_SESSION['resultat'] = $resultat;
            header("Location: ../module_proba_monte_carlo.php?res=true#resultat");
    
            // vide les valeurs du formulaire
            unset($_POST);
        }
        else{
          header("Location: ../module_proba_monte_carlo.php");
        }
    }
    else{
        header("Location: ../module_proba_monte_carlo.php?err=1");
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
