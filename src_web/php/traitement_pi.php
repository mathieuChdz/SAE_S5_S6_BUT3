<?php

session_start();

$arg1 = $_POST['iterations'];
/*$resultat = exec("mpiexec -n 4 --host node1,node2,node3,node4 python3 /Module_CalculNombresPremiers/nombres_Premiers.py $arg1");*/

/*$resultat = exec("python3 Module_CalculNombresPremiers/nombres_Premiers.py $arg1");*/
$resultat = exec("mpiexec -n 4 --host node1,node2,node3,node4 python3 Module_MonteCarlo/montecarloPImpi.py $arg1 > resultat.txt 2>&1", $output, $return_var);
$_SESSION['resultat'] = $resultat;

header("Location: ../module_monte_carlo.php?N=$arg1#resultat");

?>