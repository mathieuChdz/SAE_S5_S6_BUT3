<?php

session_start();

$arg1 = $_POST['iterations'];
/*$resultat = exec("mpiexec -n 4 --host node1,node2,node3,node4 python3 /Module_CalculNombresPremiers/nombres_Premiers.py $arg1");*/

/*$resultat = exec("python3 Module_CalculNombresPremiers/nombres_Premiers.py $arg1");*/

$arg2 = $_POST['workers'];


if ($arg2 == "1"){
    $resultat = exec("mpiexec -n 1 --host node1 python3 Module_MonteCarlo/montecarloPImpi.py $arg1 > resultat.txt 2>&1", $output, $return_var);
}

elseif ($arg2 == "2"){
    $resultat = exec("mpiexec -n 2 --host node1,node2 python3 Module_MonteCarlo/montecarloPImpi.py $arg1 > resultat.txt 2>&1", $output, $return_var);
}

elseif ($arg2 == "3"){
    $resultat = exec("mpiexec -n 3 --host node1,node2,node3 python3 Module_MonteCarlo/montecarloPImpi.py $arg1 > resultat.txt 2>&1", $output, $return_var);
}

elseif ($arg2 == "4"){
    $resultat = exec("mpiexec -n 4 --host node1,node2,node3,node4 python3 Module_MonteCarlo/montecarloPImpi.py $arg1 > resultat.txt 2>&1", $output, $return_var);
}


$_SESSION['resultat'] = $resultat;

header("Location: ../module_monte_carlo.php?N=$arg1#resultat");

?>